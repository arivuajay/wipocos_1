<?php

class SocietyController extends Controller {

    private $_import_rows;
    private $_import_worksheet;
    private $_import_status = "";
    private $_import_society;
    private $_import_category;
    private $_stage_rows;
    private $_stage_tables;

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
                //'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array(''),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('index', 'view', 'create', 'update', 'admin', 'delete', 'import'),
                'expression' => 'UserIdentity::checkAccess()',
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array(''),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Society('create');
        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['Society'])) {
            $model->attributes = $_POST['Society'];
            $model->setAttribute('Society_Logo_File', isset($_FILES['Society']['name']['Society_Logo_File']) ? $_FILES['Society']['name']['Society_Logo_File'] : '');
            if ($model->validate()) {
                $model->setUploadDirectory(UPLOAD_DIR);
                $model->uploadFile();
                if ($model->save()) {
                    Myclass::addAuditTrail("Created a {$model->Society_Code} successfully.", "group");
                    Yii::app()->user->setFlash('success', 'Society Created Successfully!!!');
                    $this->redirect(array('index'));
                }
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $model->setScenario('update');

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['Society'])) {
            $model->attributes = $_POST['Society'];
            if ($_FILES['Society']['name']['Society_Logo_File']) {
                $model->setAttribute('Society_Logo_File', $_FILES['Society']['name']['Society_Logo_File']);
            }

            if ($model->validate()) {
                $model->setUploadDirectory(UPLOAD_DIR);
                $model->uploadFile();
                if ($model->save()) {
                    Myclass::addAuditTrail("Updated a {$model->Society_Code} successfully.", "group");
                    Yii::app()->user->setFlash('success', 'Society Updated Successfully!!!');
                    $this->redirect(array('index'));
                }
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $model = $this->loadModel($id);
        $model->setUploadDirectory(UPLOAD_DIR);
        try {
            $model->delete();
            Myclass::addAuditTrail("Deleted a {$model->Society_Code} successfully.", "group");
        } catch (CDbException $e) {
            if ($e->errorInfo[1] == 1451) {
                throw new CHttpException(400, Yii::t('err', 'Relation Restriction Error.'));
            } else {
                throw $e;
            }
        }

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax'])) {
            Yii::app()->user->setFlash('success', 'Society Deleted Successfully!!!');
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $search = false;

        $model = new Society();
        $searchModel = new Society('search');
        $searchModel->unsetAttributes();  // clear any default values
        if (isset($_GET['Society'])) {
            $search = true;
            $searchModel->attributes = $_GET['Society'];
            $searchModel->search();
        }

        $this->render('index', compact('searchModel', 'search', 'model'));
    }

    public function actionImport($sid) {
        $model = $this->loadModel($sid);
        $model->setScenario('import');

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['Society'])) {
            $model->attributes = $_POST['Society'];
            $model->setAttribute('import_file', isset($_FILES['Society']['name']['import_file']) ? $_FILES['Society']['name']['import_file'] : '');
            if ($model->validate()) {
                if ($_FILES['Society']['name']['import_file']) {
                    $model->import_file = CUploadedFile::getInstance($model, 'import_file');
                    if (!is_dir(UPLOAD_DIR . '/temp/'))
                        mkdir(UPLOAD_DIR . '/temp/');
                    $path = UPLOAD_DIR . '/temp/' . $model->import_file;
                    $model->import_file->saveAs($path);
                    $this->_import_society = $model->Society_Id;
                    $this->_import_category = $model->import_category;
                    $success = $this->importExcel($path);
                    if ($success && $model->save()) {
                        Myclass::addAuditTrail("XLS Imported to Society : {$model->Society_Code} successfully.", "group");
                        $this->render('import', array(
                            'model' => $model,
                            'staging' => $this->_stage_rows,
                            'import_status' => $this->_import_status,
                            'staging_tables' => $this->_stage_tables,
                        ));
                        Yii::app()->end();
//                        Yii::app()->user->setFlash('success', "XLS Imported Successfully!!! <br />{$this->_import_status}");
//                        $this->redirect(array('/site/society/import', 'sid' => $model->Society_Id));
                    } else {
                        Yii::app()->user->setFlash('danger', "XLS not Imported !!! Please Try after sometime");
                        $this->redirect(array('/site/society/import', 'sid' => $model->Society_Id));
                    }
                }
            }
        }
        $this->render('import', array(
            'model' => $model,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Society('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Society']))
            $model->attributes = $_GET['Society'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Society the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Society::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Society $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'society-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function importExcel($file_path) {
        Yii::import('application.vendors.PHPExcel', true);
        $objReader = new PHPExcel_Reader_Excel5;
        $objPHPExcel = $objReader->load(@$file_path);
        $objWorksheet = $objPHPExcel->getActiveSheet();
        $highestRow = $objWorksheet->getHighestRow(); // e.g. 10
        $highestColumn = $objWorksheet->getHighestColumn(); // e.g 'F'
        $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn); // e.g. 5
        $screens = Society::getImportcategoryList();
        $this->_import_worksheet = $objWorksheet;
        unlink($file_path);

        $return = false;

        if (array_key_exists($input_type = strtolower($objWorksheet->getCellByColumnAndRow(0, 2)->getValue()), $screens)) {
            if ($input_type != $this->_import_category) {
                Yii::app()->user->setFlash('danger', "Its not a Valid {$this->_import_category} File Format (Seems like {$input_type} File). Recheck your imported file");
                $this->redirect(array('/site/society/import', 'sid' => $this->_import_society));
            }
            switch ($input_type) {
                case 'authors tabs':
                    $this->_import_rows = $this->importRows('author', 4, $highestRow, 14);
                    $return = $this->importAuthor();
                    break;

                case 'performers tabs':
                    $this->_import_rows = $this->importRows('performer', 4, $highestRow, 14);
                    $return = $this->importPerformer();
                    break;

                case 'publishers tabs':
                    $this->_import_rows = $this->importRows('publisher', 4, $highestRow, 13);
                    $return = $this->importPublisher();
                    break;

                case 'producers tabs':
                    $this->_import_rows = $this->importRows('producer', 4, $highestRow, 12);
                    $return = $this->importProducer();
                    break;

                case 'works tabs':
                    $this->_import_rows = $this->importRows('work', 4, $highestRow, 12);
                    $return = $this->importWork();
                    break;

                case 'recordings tabs':
                    $this->_import_rows = $this->importRows('recording', 4, $highestRow, 14);
                    $return = $this->importRecording();
                    break;

                default:
                    break;
            }
            return $return;
        } else {
            Yii::app()->user->setFlash('danger', "Its not a Valid File (NOT IN PREDEFINED FORMAT)");
            $this->redirect(array('/site/society/import', 'sid' => $this->_import_society));
        }
    }

    public function importStringValidation($value, $special_char = false) {
        $pattern = preg_quote('#$%^&*()+=-[]\';,/{}|\":<>?~', '#');
        $title_exception = array('EXECUTIVE', 'PRODUCER', 'DISTRIBUTOR', 'COMPOSER', 'MUSICAL', 'ARRANGER (S)', 'FEATURED', 'PERFORMER', 'SESSION', 'VOCALISTS', 'MUSICIANS', 'PERFORMERFEMALE', 'GUEST', 'LYRICIST', 'MUSIC');
        if ($special_char)
            return !in_array($value, $title_exception) && $value != '' && !preg_match("#[{$pattern}]#", $value) && !is_array($value) && !is_object($value);
        else
            return !in_array($value, $title_exception) && $value != '' && !is_array($value) && !is_object($value);
    }

    /* Common function for import rows */

    public function importRows($import_category, $start_row, $highestRow, $max_row) {
        switch ($import_category) {
            case 'author':
                $loop_options = $this->importAuthorLoopOptions();
                break;
            case 'performer':
                $loop_options = $this->importPerformerLoopOptions();
                break;
            case 'publisher':
                $loop_options = $this->importPublisherLoopOptions();
                break;
            case 'producer':
                $loop_options = $this->importProducerLoopOptions();
                break;
            case 'work':
                $loop_options = $this->importWorkLoopOptions();
                break;
            case 'recording':
                $loop_options = $this->importRecordingLoopOptions();
                break;
            default:
                break;
        }
        if (!isset($loop_options))
            return false;

        $objWorksheet = $this->_import_worksheet;
        $dateFields = $this->importDateFields();
        $timeFields = $this->importTimeFields();
        foreach ($loop_options as $keyset => $fieldsets) {
            if ($objWorksheet->getCellByColumnAndRow($fieldsets['col'], 2)->getValue() != $fieldsets['start_col']) {
                Yii::app()->user->setFlash('danger', "Its not in {$import_category} Basic Information format ({$fieldsets['start_col']} column value missing)");
                $this->redirect(array('/site/society/import', 'sid' => $this->_import_society));
            }
            $start_point = true;
            $stop_point = false;
            $row_count = $i = 1;
            for ($row = $start_row; $row <= $highestRow; ++$row) {
                if ($start_point && !$stop_point)
                    $i = 1;

                /* Set Value */
                $val = '';
                if (isset($fieldsets['fieldsets'][$i])) {
                    $value = $objWorksheet->getCellByColumnAndRow($fieldsets['col'], $row)->getValue();
                    if (in_array($fieldsets['fieldsets'][$i], $dateFields)) {
                        if (Myclass::is_date($value))
                            $val = date('Y-m-d', strtotime($value));
                        else if (is_int($val))
                            $val = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($value));
                        else
                            $val = 'Invalid format';
                    }else if (in_array($fieldsets['fieldsets'][$i], $timeFields)) {
                        $val = PHPExcel_Style_NumberFormat::toFormattedString($value, 'hh:mm:ss');
                    } else {
                        $val = $value;
                    }
                }
                /* End */

                if ($start_point && !$stop_point) {
                    if (isset($fieldsets['fieldsets'][$i]))
                        $import_rows[$row_count][$keyset][$fieldsets['fieldsets'][$i]] = $val;
                    $start_point = false;
                }

                if (!$stop_point) {
                    if (isset($fieldsets['fieldsets'][$i]))
                        $import_rows[$row_count][$keyset][$fieldsets['fieldsets'][$i]] = $val;
                    if ($i == $max_row)
                        $stop_point = true;
                }

                if ($stop_point) {
                    if ($objWorksheet->getCellByColumnAndRow($fieldsets['col'], $row)->getValue() == $fieldsets['start_col']) {
                        $row++;
                        $row_count++;
                        $start_point = true;
                        $stop_point = false;
                    }
                }
                $i++;
            }
        }
        return $import_rows;
    }

    /* end */

    public function importDateFields() {
        return array(
            'Auth_DOB',
            'Auth_Mnge_Entry_Date',
            'Auth_Mnge_Exit_Date',
            'Auth_Mnge_Entry_Date_2',
            'Auth_Mnge_Exit_Date_2',
            'Perf_Rel_Entry_Date',
            'Perf_Rel_Exit_Date',
            'Perf_Rel_Entry_Date_2',
            'Perf_Rel_Exit_Date_2',
            'Pub_Date',
            'Pub_Reg_Date',
            'Pub_Excerpt_Date',
            'Pub_Mnge_Entry_Date',
            'Pub_Mnge_Exit_Date',
            'Pub_Mnge_Entry_Date_2',
            'Pub_Mnge_Exit_Date_2',
            'Pro_Date',
            'Pro_Reg_Date',
            'Pro_Excerpt_Date',
            'Pro_Rel_Entry_Date',
            'Pro_Rel_Exit_Date',
            'Pro_Rel_Entry_Date_2',
            'Pro_Rel_Exit_Date_2',
            'Work_Doc_Sign_Date',
            'Rcd_Date',
        );
    }

    public function importTimeFields() {
        return array(
            'Work_Duration',
            'Rcd_Duration',
        );
    }

    public function importRequiredFields() {
        return array(
            'author' => array(
                'basic_val' => array(
                    'Auth_Sur_Name',
                    'Auth_DOB',
                    'Auth_Gender',
                ),
                'copyright_val' => array(
                    'Auth_Mnge_Entry_Date',
                    'Auth_Mnge_Internal_Position_Id',
                    'Auth_Mnge_Entry_Date_2',
//                    'Auth_Mnge_Sector',
                    'Auth_Mnge_Managed_Rights_Id',
                    'Auth_Mnge_Territories_Id',
                ),
            ),
        );
    }

    public function importRequiredDateFields() {
        return array(
            'Auth_DOB',
            'Auth_Mnge_Entry_Date',
            'Auth_Mnge_Entry_Date_2',
        );
    }

    public function setImportStatus($total_records, $success_records, $unsuccess_records, $duplicate_records) {
        return "<span class='badge bg-blue'>{$total_records}</span> Total records.&nbsp;&nbsp;&nbsp;<span class='badge bg-green no-bgcolor'>{$success_records}</span> Successfull records.&nbsp;&nbsp;&nbsp;<span class='badge bg-red'>{$unsuccess_records}</span> Unsuccessfull records.&nbsp;&nbsp;&nbsp;<span class='badge bg-yellow'>{$duplicate_records}</span> Duplicate records.";
    }

    public function importValidate($user_type, $key, $model_key) {
        $validate_fields = $this->importRequiredFields();
        $date_validate_fields = $this->importRequiredDateFields();
        $valid = true;
        $this->_stage_rows[$key][$model_key]['success'] = 1;
        if (isset($validate_fields[$user_type][$model_key])) {
            foreach ($this->_stage_rows[$key][$model_key] as $col => $value) {
                if (in_array($col, $validate_fields[$user_type][$model_key])) {
                    if ($value == '')
                        $valid = false;
                    if (in_array($col, $date_validate_fields)) {
                        if ($value != "Invalid format") {
                            $d = DateTime::createFromFormat('Y-m-d', $value);
                            if ($d && $d->format('Y-m-d') != $value)
                                $valid = false;
                        }else {
                            $valid = false;
                        }
                    }
                }
            }
        }
        if (!$valid)
            $this->_stage_rows[$key][$model_key]['success'] = 0;
        return $valid;
    }

    /* Author Importing */

    public function importAuthorLoopOptions() {
        $basic_fields = array(
//            1 => "Auth_Internal_Code",
            2 => "Auth_Sur_Name",
            3 => "Auth_First_Name",
            4 => "Auth_Ipi",
            5 => "Auth_Ipi_Base_Number",
            6 => "Auth_Ipn_Number",
            7 => "Auth_DOB",
            8 => "Auth_Birth_Country_Id",
            9 => "Auth_Nationality_Id",
            10 => "Auth_Language_Id",
            11 => "Auth_Marital_Status_Id",
            12 => "Auth_Identity_Number",
            13 => "Auth_Spouse_Name",
            14 => "Auth_Gender",
        );

        $address_fields = array(
            1 => "Auth_Home_Address_1",
            2 => "Auth_Home_Telephone",
            3 => "Auth_Home_Fax",
            4 => "Auth_Home_Email",
            5 => "Auth_Home_Website",
            6 => "Auth_Home_Address_3",
            7 => "Auth_Mailing_Address_1",
            8 => "Auth_Mailing_Telephone",
            9 => "Auth_Mailing_Fax",
            10 => "Auth_Mailing_Email",
            11 => "Auth_Mailing_Website",
            12 => "Auth_Unknown_Address",
        );

        $payment_fields = array(
            1 => "Auth_Pay_Method_id",
            2 => "Auth_Bank_Account_1",
            3 => "Auth_Bank_Account_2",
            4 => "Auth_Bank_Account_3",
        );

        $biography_fields = array(
            2 => "Auth_Biogrph_Annotation",
        );

        $pseudonym_fields = array(
            1 => "Auth_Pseudo_Type_Id",
            2 => "Auth_Pseudo_Name",
        );

        $copyright_fields = array(
            1 => "Auth_Mnge_Entry_Date",
            2 => "Auth_Mnge_Exit_Date",
            3 => "Auth_Mnge_Internal_Position_Id",
            4 => "Auth_Mnge_Entry_Date_2",
            5 => "Auth_Mnge_Exit_Date_2",
//            6 => "Auth_Mnge_Sector",
            7 => "Auth_Mnge_Managed_Rights_Id",
            8 => "Auth_Mnge_Territories_Id",
            9 => "Auth_Mnge_Region_Id",
            10 => "Auth_Mnge_Profession_Id",
            11 => "Auth_Mnge_File",
        );

        $death_fields = array(
            1 => "Auth_Death_Inhrt_Surname",
            2 => "Auth_Death_Inhrt_Address_1",
            3 => "Auth_Death_Inhrt_Addtion_Annotation",
        );

        return array(
            'basic_val' => array('col' => 1, 'fieldsets' => $basic_fields, 'start_col' => 'BASIC DATA FIELDS'),
            'address_val' => array('col' => 2, 'fieldsets' => $address_fields, 'start_col' => 'ADDRESSES FIELDS'),
            'payment_val' => array('col' => 3, 'fieldsets' => $payment_fields, 'start_col' => 'PAYMENT FIELDS'),
            'biograph_val' => array('col' => 4, 'fieldsets' => $biography_fields, 'start_col' => 'BIOGRAPHY'),
            'pseudonym_val' => array('col' => 5, 'fieldsets' => $pseudonym_fields, 'start_col' => 'PSEUDONYMS'),
            'copyright_val' => array('col' => 6, 'fieldsets' => $copyright_fields, 'start_col' => 'COPYRIGHTS'),
            'death_val' => array('col' => 7, 'fieldsets' => $death_fields, 'start_col' => 'DEATH AND INHERITANCE'),
        );
    }

    public function importAuthor() {
        $total_records = $success_records = $unsuccess_records = $duplicate_records = 0;
        $this->_stage_rows = $this->_import_rows;

        foreach ($this->_stage_rows as $key => $stage) {
            foreach ($stage as $col => $row) {
                $this->_stage_rows[$key][$col]['import_status'] = 0;
            }
        }

        foreach ($this->_import_rows as $key => $import_row) {
            /* Add Master fields */
            $import_row['basic_val']['Auth_Birth_Country_Id'] = Myclass::addMaster('MasterCountry', 'Country_Name', 'Master_Country_Id', $import_row['basic_val']['Auth_Birth_Country_Id']);
            $import_row['basic_val']['Auth_Nationality_Id'] = Myclass::addMaster('MasterNationality', 'Nation_Name', 'Master_Nation_Id', $import_row['basic_val']['Auth_Nationality_Id']);
            $import_row['basic_val']['Auth_Language_Id'] = Myclass::addMaster('MasterLanguage', 'Lang_Name', 'Master_Lang_Id', $import_row['basic_val']['Auth_Language_Id']);
            $import_row['basic_val']['Auth_Marital_Status_Id'] = Myclass::addMaster('MasterMaritalStatus', 'Marital_State', 'Master_Marital_State_Id', $import_row['basic_val']['Auth_Marital_Status_Id']);
            $import_row['basic_val']['Auth_Gender'] = strtoupper(substr($import_row['basic_val']['Auth_Gender'], 0, 1));
            $import_row['payment_val']['Auth_Pay_Method_id'] = Myclass::addMaster('MasterPaymentMethod', 'Paymode_Name', 'Master_Paymode_Id', $import_row['payment_val']['Auth_Pay_Method_id']);
            $import_row['pseudonym_val']['Auth_Pseudo_Type_Id'] = Myclass::addMaster('MasterPseudonymTypes', 'Pseudo_Code', 'Pseudo_Id', $import_row['pseudonym_val']['Auth_Pseudo_Type_Id']);
            $import_row['copyright_val']['Auth_Mnge_Internal_Position_Id'] = Myclass::addMaster('MasterInternalPosition', 'Int_Post_Name', 'Master_Int_Post_Id', $import_row['copyright_val']['Auth_Mnge_Internal_Position_Id']);
            $import_row['copyright_val']['Auth_Mnge_Managed_Rights_Id'] = Myclass::addMaster('MasterManagedRights', 'Mgd_Rights_Name', 'Master_Mgd_Rights_Id', $import_row['copyright_val']['Auth_Mnge_Managed_Rights_Id']);
            $import_row['copyright_val']['Auth_Mnge_Territories_Id'] = Myclass::addMaster('MasterTerritories', 'Territory_Name', 'Master_Territory_Id', $import_row['copyright_val']['Auth_Mnge_Territories_Id']);
            $import_row['copyright_val']['Auth_Mnge_Region_Id'] = Myclass::addMaster('MasterRegion', 'Region_Name', 'Master_Region_Id', $import_row['copyright_val']['Auth_Mnge_Region_Id']);
            $import_row['copyright_val']['Auth_Mnge_Profession_Id'] = Myclass::addMaster('MasterProfession', 'Profession_Name', 'Master_Profession_Id', $import_row['copyright_val']['Auth_Mnge_Profession_Id']);

            if ($this->importValidate('author', $key, 'basic_val')) {
                /* Save Records */
                $check_exists = AuthorAccount::model()->findByAttributes(array('Auth_First_Name' => $import_row['basic_val']['Auth_First_Name'], 'Auth_Sur_Name' => $import_row['basic_val']['Auth_Sur_Name']));
                if (empty($check_exists)) {
                    $model = new AuthorAccount;
                    $model->attributes = $import_row['basic_val'];
                    if ($model->validate()) {
                        $success_records++;
                        $model->save(false);
                        $this->_stage_rows[$key]['basic_val']['import_status'] = 1;

                        foreach ($import_row as $catKey => $values) {
                            $import_row[$catKey]['Auth_Acc_Id'] = $model->Auth_Acc_Id;
                        }

                        $related_records = array(
                            'AuthorAccountAddress' => 'address_val',
                            'AuthorPaymentMethod' => 'payment_val',
                            'AuthorBiography' => 'biograph_val',
                            'AuthorPseudonym' => 'pseudonym_val',
                            'AuthorManageRights' => 'copyright_val',
                            'AuthorDeathInheritance' => 'death_val',
                        );

                        $import_row['copyright_val']['Auth_Mnge_Society_Id'] = $this->_import_society;

                        foreach ($related_records as $relModal => $arrKey) {
                            $rel_model = new $relModal;
                            $rel_model->attributes = $import_row[$arrKey];
                            if ($this->importValidate('author', $key, $arrKey)) {
                                $rel_model->save(false);
                                $this->_stage_rows[$key][$arrKey]['import_status'] = 1;
                            }
                        }
                    } else {
                        $unsuccess_records++;
                    }
                } else {
                    foreach ($stage as $col => $row) {
                        $this->_stage_rows[$key][$col]['import_status'] = 2;
                    }
                    $duplicate_records++;
                }
            } else {
                $unsuccess_records++;
            }
            $total_records++;
        }
        $this->_stage_tables = $this->importAuthorStageTables();
        $this->_import_status = $this->setImportStatus($total_records, $success_records, $unsuccess_records, $duplicate_records);
        return true;
    }

    public function importAuthorStageTables() {
        return array(
            'AuthorAccount' => array(
                'title' => 'Basic Data',
                'key' => 'basic_val',
            ),
            'AuthorAccountAddress' => array(
                'title' => 'Address',
                'key' => 'address_val',
            ),
            'AuthorPaymentMethod' => array(
                'title' => 'Payment',
                'key' => 'payment_val',
            ),
            'AuthorBiography' => array(
                'title' => 'Biograph',
                'key' => 'biograph_val',
            ),
            'AuthorPseudonym' => array(
                'title' => 'Psedonym',
                'key' => 'pseudonym_val',
            ),
            'AuthorManageRights' => array(
                'title' => 'Managed Rights',
                'key' => 'copyright_val',
            ),
            'AuthorDeathInheritance' => array(
                'title' => 'Death Inheritance',
                'key' => 'death_val',
            )
        );
    }

    /* Performer Importing */

    public function importPerformerLoopOptions() {
        $basic_fields = array(
//            1 => "Perf_Internal_Code",
            2 => "Perf_Sur_Name",
            3 => "Perf_First_Name",
            4 => "Perf_Ipi",
            5 => "Perf_Ipi_Base_Number",
            6 => "Perf_Ipn_Number",
            7 => "Perf_Place_Of_Birth_Id",
            8 => "Perf_Birth_Country_Id",
            9 => "Perf_Nationality_Id",
            10 => "Perf_Language_Id",
            11 => "Perf_Marital_Status_Id",
            12 => "Perf_Identity_Number",
            13 => "Perf_Spouse_Name",
            14 => "Perf_Gender",
        );

        $address_fields = array(
            1 => "Perf_Home_Address_1",
            2 => "Perf_Home_Telephone",
            3 => "Perf_Home_Fax",
            4 => "Perf_Home_Email",
            5 => "Perf_Home_Website",
            6 => "Perf_Home_Address_3",
            7 => "Perf_Mailing_Address_1",
            8 => "Perf_Mailing_Telephone",
            9 => "Perf_Mailing_Fax",
            10 => "Perf_Mailing_Email",
            11 => "Perf_Mailing_Website",
            12 => "Perf_Unknown_Address",
        );

        $payment_fields = array(
            1 => "Perf_Pay_Method_id",
            2 => "Perf_Bank_Account_1",
            3 => "Perf_Bank_Account_2",
            4 => "Perf_Bank_Account_3",
        );

        $biography_fields = array(
            2 => "Perf_Biogrph_Annotation",
        );

        $pseudonym_fields = array(
            1 => "Perf_Pseudo_Type_Id",
            2 => "Perf_Pseudo_Name",
        );

        $relrights_fields = array(
            1 => "Perf_Rel_Entry_Date",
            2 => "Perf_Rel_Exit_Date",
            3 => "Perf_Rel_Internal_Position_Id",
            4 => "Perf_Rel_Entry_Date_2",
            5 => "Perf_Rel_Exit_Date_2",
            7 => "Perf_Rel_Managed_Rights_Id",
            8 => "Perf_Rel_Territories_Id",
            9 => "Perf_Rel_Region_Id",
//            10 => "Perf_Rel_Profession_Id",
            11 => "Perf_Rel_File",
        );

        $death_fields = array(
            1 => "Perf_Death_Inhrt_Surname",
            2 => "Perf_Death_Inhrt_Address_1",
            3 => "Perf_Death_Inhrt_Addtion_Annotation",
        );

        return array(
            'basic_val' => array('col' => 1, 'fieldsets' => $basic_fields, 'start_col' => 'BASIC DATA FIELDS'),
            'address_val' => array('col' => 2, 'fieldsets' => $address_fields, 'start_col' => 'ADDRESSES FIELDS'),
            'payment_val' => array('col' => 3, 'fieldsets' => $payment_fields, 'start_col' => 'PAYMENT FIELDS'),
            'biograph_val' => array('col' => 4, 'fieldsets' => $biography_fields, 'start_col' => 'BIOGRAPHY'),
            'pseudonym_val' => array('col' => 5, 'fieldsets' => $pseudonym_fields, 'start_col' => 'PSEUDONYMS'),
            'copyright_val' => array('col' => 6, 'fieldsets' => $relrights_fields, 'start_col' => 'COPYRIGHTS'),
            'death_val' => array('col' => 7, 'fieldsets' => $death_fields, 'start_col' => 'DEATH AND INHERITANCE'),
        );
    }

    public function importPerformer() {
        $total_records = $success_records = $unsuccess_records = $duplicate_records = 0;
        foreach ($this->_import_rows as $key => $import_row) {
            /* Add Master fields */
            $import_row['basic_val']['Perf_Birth_Country_Id'] = Myclass::addMaster('MasterCountry', 'Country_Name', 'Master_Country_Id', $import_row['basic_val']['Perf_Birth_Country_Id']);
            $import_row['basic_val']['Perf_Nationality_Id'] = Myclass::addMaster('MasterNationality', 'Nation_Name', 'Master_Nation_Id', $import_row['basic_val']['Perf_Nationality_Id']);
            $import_row['basic_val']['Perf_Language_Id'] = Myclass::addMaster('MasterLanguage', 'Lang_Name', 'Master_Lang_Id', $import_row['basic_val']['Perf_Language_Id']);
            $import_row['basic_val']['Perf_Marital_Status_Id'] = Myclass::addMaster('MasterMaritalStatus', 'Marital_State', 'Master_Marital_State_Id', $import_row['basic_val']['Perf_Marital_Status_Id']);
            $import_row['payment_val']['Perf_Pay_Method_id'] = Myclass::addMaster('MasterPaymentMethod', 'Paymode_Name', 'Master_Paymode_Id', $import_row['payment_val']['Perf_Pay_Method_id']);
            $import_row['pseudonym_val']['Perf_Pseudo_Type_Id'] = Myclass::addMaster('MasterPseudonymTypes', 'Pseudo_Code', 'Pseudo_Id', $import_row['pseudonym_val']['Perf_Pseudo_Type_Id']);
            $import_row['copyright_val']['Perf_Rel_Internal_Position_Id'] = Myclass::addMaster('MasterInternalPosition', 'Int_Post_Name', 'Master_Int_Post_Id', $import_row['copyright_val']['Perf_Rel_Internal_Position_Id']);
            $import_row['copyright_val']['Perf_Rel_Managed_Rights_Id'] = Myclass::addMaster('MasterManagedRights', 'Mgd_Rights_Name', 'Master_Mgd_Rights_Id', $import_row['copyright_val']['Perf_Rel_Managed_Rights_Id']);
            $import_row['copyright_val']['Perf_Rel_Territories_Id'] = Myclass::addMaster('MasterTerritories', 'Territory_Name', 'Master_Territory_Id', $import_row['copyright_val']['Perf_Rel_Territories_Id']);
            $import_row['copyright_val']['Perf_Rel_Region_Id'] = Myclass::addMaster('MasterRegion', 'Region_Name', 'Master_Region_Id', $import_row['copyright_val']['Perf_Rel_Region_Id']);

            /* Save Records */
            $check_exists = PerformerAccount::model()->findByAttributes(array('Perf_First_Name' => $import_row['basic_val']['Perf_First_Name'], 'Perf_Sur_Name' => $import_row['basic_val']['Perf_Sur_Name']));
            if (empty($check_exists)) {
                $model = new PerformerAccount;
                $model->attributes = $import_row['basic_val'];
                if ($model->validate()) {
                    $success_records++;
                    $model->save(false);

                    foreach ($import_row as $catKey => $values) {
                        $import_row[$catKey]['Perf_Acc_Id'] = $model->Perf_Acc_Id;
                    }

                    $related_records = array(
                        'PerformerAccountAddress' => 'address_val',
                        'PerformerPaymentMethod' => 'payment_val',
                        'PerformerBiography' => 'biograph_val',
                        'PerformerPseudonym' => 'pseudonym_val',
                        'PerformerRelatedRights' => 'copyright_val',
                        'PerformerDeathInheritance' => 'death_val',
                    );

                    $import_row['copyright_val']['Perf_Rel_Society_Id'] = $this->_import_society;

                    foreach ($related_records as $relModal => $arrKey) {
                        $rel_model = new $relModal;
                        $rel_model->attributes = $import_row[$arrKey];
                        $rel_model->save(false);
                    }
                } else {
                    $unsuccess_records++;
                }
            } else {
                $duplicate_records++;
            }
            $total_records++;
        }
        $this->_import_status = $this->setImportStatus($total_records, $success_records, $unsuccess_records, $duplicate_records);
        return true;
    }

    /* Publisher Importing */

    public function importPublisherLoopOptions() {
        $basic_fields = array(
//            1 => "Pub_Internal_Code",
            2 => "Pub_Corporate_Name",
            3 => "Pub_Country_Id",
            4 => "Pub_Ipi",
            5 => "Pub_Ipi_Base_Number",
//            6 => "Pub_Ipn_Number",
            7 => "Pub_Date",
            8 => "Pub_Legal_Form_id",
            9 => "Pub_Reg_Date",
            10 => "Pub_Reg_Number",
            11 => "Pub_Excerpt_Date",
            12 => "Pub_Language_Id",
        );

        $address_fields = array(
            1 => "Pub_Head_Address_1",
            2 => "Pub_Head_Telephone",
            3 => "Pub_Head_Fax",
            4 => "Pub_Head_Email",
            5 => "Pub_Head_Website",
            6 => "Pub_Head_Address_3",
            7 => "Pub_Mailing_Address_1",
            8 => "Pub_Mailing_Telephone",
            9 => "Pub_Mailing_Fax",
            10 => "Pub_Mailing_Email",
            11 => "Pub_Mailing_Website",
            12 => "Pub_Unknown_Address",
        );

        $payment_fields = array(
            1 => "Pub_Pay_Method_id",
            2 => "Pub_Bank_Account",
            3 => "Pub_Pay_Address",
            4 => "Pub_Pay_Iban",
            5 => "Pub_Pay_Swift",
        );

        $biography_fields = array(
            2 => "Pub_Managers",
            3 => "Pub_Biogrph_Annotation",
        );

        $pseudonym_fields = array(
            1 => "Pub_Pseudo_Type_Id",
            2 => "Pub_Pseudo_Name",
        );

        $copyright_fields = array(
            1 => "Pub_Mnge_Entry_Date",
            2 => "Pub_Mnge_Exit_Date",
            3 => "Pub_Mnge_Internal_Position_Id",
            4 => "Pub_Mnge_Entry_Date_2",
            5 => "Pub_Mnge_Exit_Date_2",
            6 => "Pub_Mnge_Avl_Work_Cat_Id",
            7 => "Pub_Mnge_Type_Rght_Id",
            8 => "Pub_Mnge_Managed_Rights_Id",
            9 => "Pub_Mnge_Territories_Id",
            10 => "Pub_Mnge_Region_Id",
            11 => "Pub_Mnge_File",
//            12 => "Pub_Mnge_Subscription",
            13 => "Pub_Mnge_Profession_Id",
        );

        $death_fields = array(
            1 => "Pub_Suc_Name",
            2 => "Pub_Suc_Address_1",
            3 => "Pub_Suc_Annotation",
        );

        return array(
            'basic_val' => array('col' => 1, 'fieldsets' => $basic_fields, 'start_col' => 'BASIC DATA FIELDS'),
            'address_val' => array('col' => 2, 'fieldsets' => $address_fields, 'start_col' => 'ADDRESSES FIELDS'),
            'payment_val' => array('col' => 3, 'fieldsets' => $payment_fields, 'start_col' => 'PAYMENT FIELDS'),
            'biograph_val' => array('col' => 4, 'fieldsets' => $biography_fields, 'start_col' => 'BIOGRAPHY'),
            'pseudonym_val' => array('col' => 5, 'fieldsets' => $pseudonym_fields, 'start_col' => 'PSEUDONYMS'),
            'copyright_val' => array('col' => 6, 'fieldsets' => $copyright_fields, 'start_col' => 'COPYRIGHTS'),
            'death_val' => array('col' => 7, 'fieldsets' => $death_fields, 'start_col' => 'LIQUIDATION AND INHERITANCE'),
        );
    }

    public function importPublisher() {
        $total_records = $success_records = $unsuccess_records = $duplicate_records = 0;
        foreach ($this->_import_rows as $key => $import_row) {
            /* Add Master fields */
            $import_row['basic_val']['Pub_Country_Id'] = Myclass::addMaster('MasterCountry', 'Country_Name', 'Master_Country_Id', $import_row['basic_val']['Pub_Country_Id']);
            $import_row['basic_val']['Pub_Legal_Form_id'] = Myclass::addMaster('MasterLegalForm', 'Legal_Form_Name', 'Master_Legal_Form_Id', $import_row['basic_val']['Pub_Legal_Form_id']);
            $import_row['basic_val']['Pub_Language_Id'] = Myclass::addMaster('MasterLanguage', 'Lang_Name', 'Master_Lang_Id', $import_row['basic_val']['Pub_Language_Id']);
            $import_row['payment_val']['Pub_Pay_Method_id'] = Myclass::addMaster('MasterPaymentMethod', 'Paymode_Name', 'Master_Paymode_Id', $import_row['payment_val']['Pub_Pay_Method_id']);
            $import_row['pseudonym_val']['Pub_Pseudo_Type_Id'] = Myclass::addMaster('MasterPseudonymTypes', 'Pseudo_Code', 'Pseudo_Id', $import_row['pseudonym_val']['Pub_Pseudo_Type_Id']);
            $import_row['copyright_val']['Pub_Mnge_Internal_Position_Id'] = Myclass::addMaster('MasterInternalPosition', 'Int_Post_Name', 'Master_Int_Post_Id', $import_row['copyright_val']['Pub_Mnge_Internal_Position_Id']);
            $import_row['copyright_val']['Pub_Mnge_Managed_Rights_Id'] = Myclass::addMaster('MasterManagedRights', 'Mgd_Rights_Name', 'Master_Mgd_Rights_Id', $import_row['copyright_val']['Pub_Mnge_Managed_Rights_Id']);
            $import_row['copyright_val']['Pub_Mnge_Territories_Id'] = Myclass::addMaster('MasterTerritories', 'Territory_Name', 'Master_Territory_Id', $import_row['copyright_val']['Pub_Mnge_Territories_Id']);
            $import_row['copyright_val']['Pub_Mnge_Region_Id'] = Myclass::addMaster('MasterRegion', 'Region_Name', 'Master_Region_Id', $import_row['copyright_val']['Pub_Mnge_Region_Id']);
            $import_row['copyright_val']['Pub_Mnge_Profession_Id'] = Myclass::addMaster('MasterProfession', 'Profession_Name', 'Master_Profession_Id', $import_row['copyright_val']['Pub_Mnge_Profession_Id']);
            $import_row['copyright_val']['Pub_Mnge_Avl_Work_Cat_Id'] = Myclass::addMaster('MasterWorksCategory', 'Work_Category_Name', 'Master_Work_Category_Id', $import_row['copyright_val']['Pub_Mnge_Avl_Work_Cat_Id']);
            $import_row['copyright_val']['Pub_Mnge_Type_Rght_Id'] = Myclass::addMasterTypeRights($import_row['copyright_val']['Pub_Mnge_Type_Rght_Id'], MasterTypeRights::OCCUPATION_PUBLISHER, MasterTypeRights::PUBLISHER_DOMAIN, MasterTypeRights::PUBLISHER_RANK);

            /* Save Records */
            $check_exists = PublisherAccount::model()->findByAttributes(array('Pub_Corporate_Name' => $import_row['basic_val']['Pub_Corporate_Name']));
            if (empty($check_exists)) {
                $model = new PublisherAccount;
                $model->attributes = $import_row['basic_val'];
                if ($model->validate()) {
                    $success_records++;
                    $model->save(false);

                    foreach ($import_row as $catKey => $values) {
                        $import_row[$catKey]['Pub_Acc_Id'] = $model->Pub_Acc_Id;
                    }

                    $related_records = array(
                        'PublisherAccountAddress' => 'address_val',
                        'PublisherPaymentMethod' => 'payment_val',
                        'PublisherBiography' => 'biograph_val',
                        'PublisherPseudonym' => 'pseudonym_val',
                        'PublisherManageRights' => 'copyright_val',
                        'PublisherSuccession' => 'death_val',
                    );

                    $import_row['copyright_val']['Pub_Mnge_Society_Id'] = $this->_import_society;

                    foreach ($related_records as $relModal => $arrKey) {
                        $rel_model = new $relModal;
                        $rel_model->attributes = $import_row[$arrKey];
                        $rel_model->save(false);
                    }
                } else {
                    $unsuccess_records++;
                }
            } else {
                $duplicate_records++;
            }
            $total_records++;
        }
        $this->_import_status = $this->setImportStatus($total_records, $success_records, $unsuccess_records, $duplicate_records);
        return true;
    }

    /* Producer Importing */

    public function importProducerLoopOptions() {
        $basic_fields = array(
//            1 => "Pro_Internal_Code",
            2 => "Pro_Corporate_Name",
            3 => "Pro_Country_Id",
            4 => "Pro_Ipi",
            5 => "Pro_Ipi_Base_Number",
//            6 => "Pro_Ipn_Number",
            7 => "Pro_Date",
            8 => "Pro_Legal_Form_id",
            9 => "Pro_Reg_Date",
            10 => "Pro_Reg_Number",
            11 => "Pro_Excerpt_Date",
            12 => "Pro_Language_Id",
        );

        $address_fields = array(
            1 => "Pro_Head_Address_1",
            2 => "Pro_Head_Telephone",
            3 => "Pro_Head_Fax",
            4 => "Pro_Head_Email",
            5 => "Pro_Head_Website",
            6 => "Pro_Head_Address_3",
            7 => "Pro_Mailing_Address_1",
            8 => "Pro_Mailing_Telephone",
            9 => "Pro_Mailing_Fax",
            10 => "Pro_Mailing_Email",
            11 => "Pro_Mailing_Website",
            12 => "Pro_Unknown_Address",
        );

        $payment_fields = array(
            1 => "Pro_Pay_Method_id",
            2 => "Pro_Bank_Account",
            3 => "Pro_Pay_Address",
            4 => "Pro_Pay_Iban",
            5 => "Pro_Pay_Swift",
        );

        $biography_fields = array(
            2 => "Pro_Managers",
            3 => "Pro_Biogrph_Annotation",
        );

        $pseudonym_fields = array(
            1 => "Pro_Pseudo_Type_Id",
            2 => "Pro_Pseudo_Name",
        );

        $copyright_fields = array(
            1 => "Pro_Rel_Entry_Date",
            2 => "Pro_Rel_Exit_Date",
            3 => "Pro_Rel_Internal_Position_Id",
            4 => "Pro_Rel_Entry_Date_2",
            5 => "Pro_Rel_Exit_Date_2",
            6 => "Pro_Rel_Avl_Work_Cat_Id",
            7 => "Pro_Rel_Managed_Rights_Id",
            8 => "Pro_Rel_Territories_Id",
            9 => "Pro_Rel_Region_Id",
            10 => "Pro_Rel_File",
//            11 => "Pro_Rel_Subscription",
        );

        $death_fields = array(
            1 => "Pro_Suc_Name",
            2 => "Pro_Suc_Address_1",
            3 => "Pro_Suc_Annotation",
        );

        return array(
            'basic_val' => array('col' => 1, 'fieldsets' => $basic_fields, 'start_col' => 'BASIC DATA FIELDS'),
            'address_val' => array('col' => 2, 'fieldsets' => $address_fields, 'start_col' => 'ADDRESSES FIELDS'),
            'payment_val' => array('col' => 3, 'fieldsets' => $payment_fields, 'start_col' => 'PAYMENT FIELDS'),
            'biograph_val' => array('col' => 4, 'fieldsets' => $biography_fields, 'start_col' => 'BIOGRAPHY'),
            'pseudonym_val' => array('col' => 5, 'fieldsets' => $pseudonym_fields, 'start_col' => 'PSEUDONYMS'),
            'copyright_val' => array('col' => 6, 'fieldsets' => $copyright_fields, 'start_col' => 'RELATED RIGHTS'),
            'death_val' => array('col' => 7, 'fieldsets' => $death_fields, 'start_col' => 'LIQUIDATION AND INHERITANCE'),
        );
    }

    public function importProducer() {
        $total_records = $success_records = $unsuccess_records = $duplicate_records = 0;
        foreach ($this->_import_rows as $key => $import_row) {
            /* Add Master fields */
            $import_row['basic_val']['Pro_Country_Id'] = Myclass::addMaster('MasterCountry', 'Country_Name', 'Master_Country_Id', $import_row['basic_val']['Pro_Country_Id']);
            $import_row['basic_val']['Pro_Legal_Form_id'] = Myclass::addMaster('MasterLegalForm', 'Legal_Form_Name', 'Master_Legal_Form_Id', $import_row['basic_val']['Pro_Legal_Form_id']);
            $import_row['basic_val']['Pro_Language_Id'] = Myclass::addMaster('MasterLanguage', 'Lang_Name', 'Master_Lang_Id', $import_row['basic_val']['Pro_Language_Id']);
            $import_row['payment_val']['Pro_Pay_Method_id'] = Myclass::addMaster('MasterPaymentMethod', 'Paymode_Name', 'Master_Paymode_Id', $import_row['payment_val']['Pro_Pay_Method_id']);
            $import_row['pseudonym_val']['Pro_Pseudo_Type_Id'] = Myclass::addMaster('MasterPseudonymTypes', 'Pseudo_Code', 'Pseudo_Id', $import_row['pseudonym_val']['Pro_Pseudo_Type_Id']);
            $import_row['copyright_val']['Pro_Rel_Internal_Position_Id'] = Myclass::addMaster('MasterInternalPosition', 'Int_Post_Name', 'Master_Int_Post_Id', $import_row['copyright_val']['Pro_Rel_Internal_Position_Id']);
            $import_row['copyright_val']['Pro_Rel_Managed_Rights_Id'] = Myclass::addMaster('MasterManagedRights', 'Mgd_Rights_Name', 'Master_Mgd_Rights_Id', $import_row['copyright_val']['Pro_Rel_Managed_Rights_Id']);
            $import_row['copyright_val']['Pro_Rel_Territories_Id'] = Myclass::addMaster('MasterTerritories', 'Territory_Name', 'Master_Territory_Id', $import_row['copyright_val']['Pro_Rel_Territories_Id']);
            $import_row['copyright_val']['Pro_Rel_Region_Id'] = Myclass::addMaster('MasterRegion', 'Region_Name', 'Master_Region_Id', $import_row['copyright_val']['Pro_Rel_Region_Id']);
            $import_row['copyright_val']['Pro_Rel_Profession_Id'] = Myclass::addMaster('MasterProfession', 'Profession_Name', 'Master_Profession_Id', $import_row['copyright_val']['Pro_Rel_Profession_Id']);
            $import_row['copyright_val']['Pro_Rel_Avl_Work_Cat_Id'] = Myclass::addMaster('MasterWorksCategory', 'Work_Category_Name', 'Master_Work_Category_Id', $import_row['copyright_val']['Pro_Rel_Avl_Work_Cat_Id']);
//            $import_row['copyright_val']['Pro_Rel_Type_Rght_Id'] = Myclass::addMasterTypeRights($import_row['copyright_val']['Pro_Rel_Type_Rght_Id'], MasterTypeRights::OCCUPATION_PRODUCER, MasterTypeRights::PRODUCER_DOMAIN, MasterTypeRights::PRODUCER_RANK);

            /* Save Records */
            $check_exists = ProducerAccount::model()->findByAttributes(array('Pro_Corporate_Name' => $import_row['basic_val']['Pro_Corporate_Name']));
            if (empty($check_exists)) {
                $model = new ProducerAccount;
                $model->attributes = $import_row['basic_val'];
                if ($model->validate()) {
                    $success_records++;
                    $model->save(false);

                    foreach ($import_row as $catKey => $values) {
                        $import_row[$catKey]['Pro_Acc_Id'] = $model->Pro_Acc_Id;
                    }

                    $related_records = array(
                        'ProducerAccountAddress' => 'address_val',
                        'ProducerPaymentMethod' => 'payment_val',
                        'ProducerBiography' => 'biograph_val',
                        'ProducerPseudonym' => 'pseudonym_val',
                        'ProducerRelatedRights' => 'copyright_val',
                        'ProducerSuccession' => 'death_val',
                    );

                    $import_row['copyright_val']['Pro_Rel_Society_Id'] = $this->_import_society;

                    foreach ($related_records as $relModal => $arrKey) {
                        $rel_model = new $relModal;
                        $rel_model->attributes = $import_row[$arrKey];
                        $rel_model->save(false);
                    }
                } else {
                    $unsuccess_records++;
                }
            } else {
                $duplicate_records++;
            }
            $total_records++;
        }
        $this->_import_status = $this->setImportStatus($total_records, $success_records, $unsuccess_records, $duplicate_records);
        return true;
    }

    /* Work Importing */

    public function importWorkLoopOptions() {
        $basic_fields = array(
//            1 => "Work_Internal_Code",
            2 => "Work_Org_Title",
            3 => "Work_Language_Id",
            4 => "Work_Iswc",
            5 => "Work_Wic_Code",
//            6 => "Work_Ipn_Number",
            7 => "Work_Type_Id",
            8 => "Work_Factor_Id",
            9 => "Work_Instrumentation",
            10 => "Work_Duration",
            11 => "Work_Creation",
            12 => "Work_Opus_Number",
        );

        $subtitle_fields = array(
            1 => 'Work_Subtitle_Name',
            2 => 'Work_Subtitle_Type_Id',
            3 => 'Work_Subtitle_Language_Id',
        );

        $document_fields = array(
            1 => 'Work_Doc_Status_Id',
            2 => 'Work_Doc_Inclusion',
            3 => 'Work_Doc_Dispute',
            4 => 'Work_Doc_Type_Id',
            5 => 'Work_Doc_Sign_Date',
            6 => 'Work_Doc_File',
        );

        $biograph_fields = array(
            1 => 'Work_Biogrph_Annotation',
        );

        return array(
            'basic_val' => array('col' => 1, 'fieldsets' => $basic_fields, 'start_col' => 'BASIC DATA FIELDS'),
            'subtitle_val' => array('col' => 2, 'fieldsets' => $subtitle_fields, 'start_col' => 'SUB TITLES'),
            'document_val' => array('col' => 7, 'fieldsets' => $document_fields, 'start_col' => 'DOCUMENTATION'),
            'biograph_val' => array('col' => 8, 'fieldsets' => $biograph_fields, 'start_col' => 'BIOGRAPHY'),
        );
    }

    public function importWork() {
        $total_records = $success_records = $unsuccess_records = $duplicate_records = 0;
        foreach ($this->_import_rows as $key => $import_row) {
            /* Add Master fields */
            $import_row['basic_val']['Work_Language_Id'] = Myclass::addMaster('MasterLanguage', 'Lang_Name', 'Master_Lang_Id', $import_row['basic_val']['Work_Language_Id']);
            $import_row['basic_val']['Work_Type_Id'] = Myclass::addMaster('MasterType', 'Type_Name', 'Master_Type_Id', $import_row['basic_val']['Work_Type_Id']);
            $import_row['basic_val']['Work_Factor_Id'] = Myclass::addMaster('MasterFactor', 'Factor', 'Master_Factor_Id', $import_row['basic_val']['Work_Factor_Id']);
            $import_row['subtitle_val']['Work_Subtitle_Language_Id'] = Myclass::addMaster('MasterLanguage', 'Lang_Name', 'Master_Lang_Id', $import_row['subtitle_val']['Work_Subtitle_Language_Id']);
            $import_row['subtitle_val']['Work_Subtitle_Type_Id'] = Myclass::addMaster('MasterType', 'Type_Name', 'Master_Type_Id', $import_row['subtitle_val']['Work_Subtitle_Type_Id']);
            $import_row['document_val']['Work_Doc_Status_Id'] = Myclass::addMaster('MasterDocumentStatus', 'Document_Sts_Name', 'Master_Document_Sts_Id', $import_row['document_val']['Work_Doc_Status_Id']);
            $import_row['document_val']['Work_Doc_Type_Id'] = Myclass::addMaster('MasterDocument', 'Doc_Name', 'Master_Doc_Id', $import_row['document_val']['Work_Doc_Type_Id']);

            $inst_val = array();
            $instruments = explode(',', $import_row['basic_val']['Work_Instrumentation']);
            foreach ($instruments as $instrument) {
                array_push($inst_val, Myclass::addMaster('MasterInstrument', 'Instrument_Name', 'Master_Inst_Id', $instrument));
            }
            $import_row['basic_val']['Work_Instrumentation'] = json_encode($inst_val);

            /* Save Records */
            $check_exists = Work::model()->findByAttributes(array('Work_Org_Title' => $import_row['basic_val']['Work_Org_Title']));
            if (empty($check_exists)) {
                $model = new Work;
                $model->attributes = $import_row['basic_val'];
                $model->setDuration();
                if ($model->validate()) {
                    $success_records++;
                    $model->save(false);

                    foreach ($import_row as $catKey => $values) {
                        $import_row[$catKey]['Work_Id'] = $model->Work_Id;
                    }

                    $related_records = array(
                        'WorkSubtitle' => 'subtitle_val',
                        'WorkDocumentation' => 'document_val',
                        'WorkBiography' => 'biograph_val',
                    );

                    foreach ($related_records as $relModal => $arrKey) {
                        $rel_model = new $relModal;
                        $rel_model->attributes = $import_row[$arrKey];
                        $rel_model->save(false);
                    }
                } else {
                    $unsuccess_records++;
                }
            } else {
                $duplicate_records++;
            }
            $total_records++;
        }
        $this->_import_status = $this->setImportStatus($total_records, $success_records, $unsuccess_records, $duplicate_records);
        return true;
    }

    /* Recording Importing */

    public function importRecordingLoopOptions() {
        $basic_fields = array(
//            1 => "Rcd_Internal_Code",
            2 => "Rcd_Title",
            3 => "Rcd_Type_Id",
            4 => "Rcd_Duration",
            5 => "Rcd_Date",
            6 => "Rcd_Record_Country_id",
            7 => "Rcd_Product_Country_Id",
            8 => "Rcd_Doc_Status_Id",
            9 => "Rcd_Record_Type_Id",
            10 => "Rcd_Label_Id",
            11 => "Rcd_Reference",
            12 => "Rcd_File",
            13 => "Rcd_Isrc_Code",
            14 => "Rcd_Iswc_Number",
        );

        $subtitle_fields = array(
            1 => 'Rcd_Subtitle_Name',
            2 => 'Rcd_Subtitle_Type_Id',
            3 => 'Rcd_Subtitle_Language_Id',
        );

        return array(
            'basic_val' => array('col' => 1, 'fieldsets' => $basic_fields, 'start_col' => 'BASIC DATA FIELDS'),
            'subtitle_val' => array('col' => 2, 'fieldsets' => $subtitle_fields, 'start_col' => 'SUB TITLES'),
        );
    }

    public function importRecording() {
        $total_records = $success_records = $unsuccess_records = $duplicate_records = 0;
        foreach ($this->_import_rows as $key => $import_row) {
            /* Add Master fields */
            $import_row['basic_val']['Rcd_Type_Id'] = Myclass::addMaster('MasterType', 'Type_Name', 'Master_Type_Id', $import_row['basic_val']['Rcd_Type_Id']);
            $import_row['basic_val']['Rcd_Record_Country_id'] = Myclass::addMaster('MasterCountry', 'Country_Name', 'Master_Country_Id', $import_row['basic_val']['Rcd_Record_Country_id']);
            $import_row['basic_val']['Rcd_Product_Country_Id'] = Myclass::addMaster('MasterCountry', 'Country_Name', 'Master_Country_Id', $import_row['basic_val']['Rcd_Product_Country_Id']);
            $import_row['basic_val']['Rcd_Record_Type_Id'] = Myclass::addMaster('MasterRecordType', 'Rec_Type_Name', 'Master_Rec_Type_Id', $import_row['basic_val']['Rcd_Record_Type_Id']);
            $import_row['basic_val']['Rcd_Label_Id'] = Myclass::addMaster('MasterLabel', 'Label_Name', 'Master_Label_Id', $import_row['basic_val']['Rcd_Label_Id']);
            $import_row['basic_val']['Rcd_Doc_Status_Id'] = Myclass::addMaster('MasterDocumentStatus', 'Document_Sts_Name', 'Master_Document_Sts_Id', $import_row['basic_val']['Rcd_Doc_Status_Id']);
            $import_row['subtitle_val']['Rcd_Subtitle_Language_Id'] = Myclass::addMaster('MasterLanguage', 'Lang_Name', 'Master_Lang_Id', $import_row['subtitle_val']['Rcd_Subtitle_Language_Id']);
            $import_row['subtitle_val']['Rcd_Subtitle_Type_Id'] = Myclass::addMaster('MasterType', 'Type_Name', 'Master_Type_Id', $import_row['subtitle_val']['Rcd_Subtitle_Type_Id']);

            /* Save Records */
            $check_exists = Recording::model()->findByAttributes(array('Rcd_Title' => $import_row['basic_val']['Rcd_Title']));
            if (empty($check_exists)) {
                $model = new Recording;
                $model->attributes = $import_row['basic_val'];
                $model->setDuration();
                if ($model->validate()) {
                    $success_records++;
                    $model->save(false);

                    foreach ($import_row as $catKey => $values) {
                        $import_row[$catKey]['Rcd_Id'] = $model->Rcd_Id;
                    }

                    $related_records = array(
                        'RecordingSubtitle' => 'subtitle_val',
                    );

                    foreach ($related_records as $relModal => $arrKey) {
                        $rel_model = new $relModal;
                        $rel_model->attributes = $import_row[$arrKey];
                        $rel_model->save(false);
                    }
                } else {
                    $unsuccess_records++;
                }
            } else {
                $duplicate_records++;
            }
            $total_records++;
        }
        $this->_import_status = $this->setImportStatus($total_records, $success_records, $unsuccess_records, $duplicate_records);
        return true;
    }

}
