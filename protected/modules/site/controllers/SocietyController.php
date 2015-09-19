<?php

class SocietyController extends Controller {

    private $_import_rows;
    private $_import_worksheet;
    private $_import_status = "";
    private $_import_society;
    private $_import_category;

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
                        Yii::app()->user->setFlash('success', "XLS Imported Successfully!!! <br />{$this->_import_status}");
                        $this->redirect(array('/site/society/import', 'sid' => $model->Society_Id));
                    }else{
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
        
        $return = false;
        
        if (array_key_exists($input_type = strtolower($objWorksheet->getCellByColumnAndRow(0, 2)->getValue()), $screens)) {
            switch ($input_type) {
                case 'authors tabs':
                    $this->_import_rows = $this->importRows('author', 4, $highestRow, 14);
                    $return = $this->importAuthor();
                    break;

                case 'performers tabs':
                    $this->_import_rows = $this->importRows('performer', 4, $highestRow, 14);
                    $return = $this->importPerformer();
                    break;

                default:
                    break;
            }
            unlink($file_path);
            return $return;
        } else {
            throw new CHttpException(400, Yii::t('err', "Its not a Valid File (NOT IN PREDEFINED FORMAT)"));
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
            default:
                break;
        }
        if(!isset($loop_options))
            return false;

        $objWorksheet = $this->_import_worksheet;
        $dateFields = $this->importDateFields();
        foreach ($loop_options as $keyset => $fieldsets) {
            if ($objWorksheet->getCellByColumnAndRow($fieldsets['col'], 2)->getValue() != $fieldsets['start_col']) {
                throw new CHttpException(400, Yii::t('err', "Its not in {$import_category} Basic Information format ({$fieldsets['start_col']} column value missing)"));
            }
            $start_point = true;
            $stop_point = false;
            $row_count = 1;
            $i = 1;
            for ($row = $start_row; $row <= $highestRow; ++$row) {
                if ($start_point && !$stop_point) {
                    $i = 1;
                    if (isset($fieldsets['fieldsets'][$i]))
                        $import_rows[$row_count][$keyset][$fieldsets['fieldsets'][$i]] = !in_array ($fieldsets['fieldsets'][$i], $dateFields) ? $objWorksheet->getCellByColumnAndRow($fieldsets['col'], $row)->getValue() : date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($objWorksheet->getCellByColumnAndRow($fieldsets['col'], $row)->getValue()));
                    $start_point = false;
                }
                if (!$stop_point) {
                    if (isset($fieldsets['fieldsets'][$i]))
                        $import_rows[$row_count][$keyset][$fieldsets['fieldsets'][$i]] = !in_array ($fieldsets['fieldsets'][$i], $dateFields) ? $objWorksheet->getCellByColumnAndRow($fieldsets['col'], $row)->getValue() : date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($objWorksheet->getCellByColumnAndRow($fieldsets['col'], $row)->getValue()));
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
            'Auth_Mnge_Entry_Date',
            'Auth_Mnge_Exit_Date',
            'Auth_Mnge_Entry_Date_2',
            'Auth_Mnge_Exit_Date_2',
            'Perf_Rel_Entry_Date',
            'Perf_Rel_Exit_Date',
            'Perf_Rel_Entry_Date_2',
            'Perf_Rel_Exit_Date_2',
        );
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
            7 => "Auth_Place_Of_Birth_Id",
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
        foreach ($this->_import_rows as $key => $import_row) {
            /* Add Master fields */
            $import_row['basic_val']['Auth_Birth_Country_Id'] = $this->importAddMaster('MasterCountry', 'Country_Name', 'Master_Country_Id', $import_row['basic_val']['Auth_Birth_Country_Id']);
            $import_row['basic_val']['Auth_Nationality_Id'] = $this->importAddMaster('MasterNationality', 'Nation_Name', 'Master_Nation_Id', $import_row['basic_val']['Auth_Nationality_Id']);
            $import_row['basic_val']['Auth_Language_Id'] = $this->importAddMaster('MasterLanguage', 'Lang_Name', 'Master_Lang_Id', $import_row['basic_val']['Auth_Language_Id']);
            $import_row['basic_val']['Auth_Marital_Status_Id'] = $this->importAddMaster('MasterMaritalStatus', 'Marital_State', 'Master_Marital_State_Id', $import_row['basic_val']['Auth_Marital_Status_Id']);
            $import_row['payment_val']['Auth_Pay_Method_id'] = $this->importAddMaster('MasterPaymentMethod', 'Paymode_Name', 'Master_Paymode_Id', $import_row['payment_val']['Auth_Pay_Method_id']);
            $import_row['pseudonym_val']['Auth_Pseudo_Type_Id'] = $this->importAddMaster('MasterPseudonymTypes', 'Pseudo_Code', 'Pseudo_Id', $import_row['pseudonym_val']['Auth_Pseudo_Type_Id']);
            $import_row['copyright_val']['Auth_Mnge_Internal_Position_Id'] = $this->importAddMaster('MasterInternalPosition', 'Int_Post_Name', 'Master_Int_Post_Id', $import_row['copyright_val']['Auth_Mnge_Internal_Position_Id']);
            $import_row['copyright_val']['Auth_Mnge_Managed_Rights_Id'] = $this->importAddMaster('MasterManagedRights', 'Mgd_Rights_Name', 'Master_Mgd_Rights_Id', $import_row['copyright_val']['Auth_Mnge_Managed_Rights_Id']);
            $import_row['copyright_val']['Auth_Mnge_Territories_Id'] = $this->importAddMaster('MasterTerritories', 'Territory_Name', 'Master_Territory_Id', $import_row['copyright_val']['Auth_Mnge_Territories_Id']);
            $import_row['copyright_val']['Auth_Mnge_Region_Id'] = $this->importAddMaster('MasterRegion', 'Region_Name', 'Master_Region_Id', $import_row['copyright_val']['Auth_Mnge_Region_Id']);
            $import_row['copyright_val']['Auth_Mnge_Profession_Id'] = $this->importAddMaster('MasterProfession', 'Profession_Name', 'Master_Profession_Id', $import_row['copyright_val']['Auth_Mnge_Profession_Id']);

            /* Save Records */
            $check_exists = AuthorAccount::model()->findByAttributes(array('Auth_First_Name' => $import_row['basic_val']['Auth_First_Name'], 'Auth_Sur_Name' => $import_row['basic_val']['Auth_Sur_Name']));
            if(empty($check_exists)){
                $model = new AuthorAccount;
                $model->attributes = $import_row['basic_val'];
                if($model->validate()){
                    $success_records++;
                    $model->save(false);
                    
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
                        $rel_model->save(false);
                    }
                }else{
                    $unsuccess_records++;
                }
            }else{
                $duplicate_records++;
            }
            $total_records++;
        }
        $this->_import_status = "Total records: {$total_records}. Successfull records: {$success_records}. Unsuccessfull records: {$unsuccess_records}. Duplicate records: {$duplicate_records}";
        return true;
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

        $copyright_fields = array(
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
            'copyright_val' => array('col' => 6, 'fieldsets' => $copyright_fields, 'start_col' => 'COPYRIGHTS'),
            'death_val' => array('col' => 7, 'fieldsets' => $death_fields, 'start_col' => 'DEATH AND INHERITANCE'),
        );
    }

    public function importPerformer() {
        $total_records = $success_records = $unsuccess_records = $duplicate_records = 0;
        foreach ($this->_import_rows as $key => $import_row) {
            /* Add Master fields */
            $import_row['basic_val']['Perf_Birth_Country_Id'] = $this->importAddMaster('MasterCountry', 'Country_Name', 'Master_Country_Id', $import_row['basic_val']['Perf_Birth_Country_Id']);
            $import_row['basic_val']['Perf_Nationality_Id'] = $this->importAddMaster('MasterNationality', 'Nation_Name', 'Master_Nation_Id', $import_row['basic_val']['Perf_Nationality_Id']);
            $import_row['basic_val']['Perf_Language_Id'] = $this->importAddMaster('MasterLanguage', 'Lang_Name', 'Master_Lang_Id', $import_row['basic_val']['Perf_Language_Id']);
            $import_row['basic_val']['Perf_Marital_Status_Id'] = $this->importAddMaster('MasterMaritalStatus', 'Marital_State', 'Master_Marital_State_Id', $import_row['basic_val']['Perf_Marital_Status_Id']);
            $import_row['payment_val']['Perf_Pay_Method_id'] = $this->importAddMaster('MasterPaymentMethod', 'Paymode_Name', 'Master_Paymode_Id', $import_row['payment_val']['Perf_Pay_Method_id']);
            $import_row['pseudonym_val']['Perf_Pseudo_Type_Id'] = $this->importAddMaster('MasterPseudonymTypes', 'Pseudo_Code', 'Pseudo_Id', $import_row['pseudonym_val']['Perf_Pseudo_Type_Id']);
            $import_row['copyright_val']['Perf_Rel_Internal_Position_Id'] = $this->importAddMaster('MasterInternalPosition', 'Int_Post_Name', 'Master_Int_Post_Id', $import_row['copyright_val']['Perf_Rel_Internal_Position_Id']);
            $import_row['copyright_val']['Perf_Rel_Managed_Rights_Id'] = $this->importAddMaster('MasterManagedRights', 'Mgd_Rights_Name', 'Master_Mgd_Rights_Id', $import_row['copyright_val']['Perf_Rel_Managed_Rights_Id']);
            $import_row['copyright_val']['Perf_Rel_Territories_Id'] = $this->importAddMaster('MasterTerritories', 'Territory_Name', 'Master_Territory_Id', $import_row['copyright_val']['Perf_Rel_Territories_Id']);
            $import_row['copyright_val']['Perf_Rel_Region_Id'] = $this->importAddMaster('MasterRegion', 'Region_Name', 'Master_Region_Id', $import_row['copyright_val']['Perf_Rel_Region_Id']);

            /* Save Records */
            $check_exists = PerformerAccount::model()->findByAttributes(array('Perf_First_Name' => $import_row['basic_val']['Perf_First_Name'], 'Perf_Sur_Name' => $import_row['basic_val']['Perf_Sur_Name']));
            if(empty($check_exists)){
                $model = new PerformerAccount;
                $model->attributes = $import_row['basic_val'];
                if($model->validate()){
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
                }else{
                    $unsuccess_records++;
                }
            }else{
                $duplicate_records++;
            }
            $total_records++;
        }
        $this->_import_status = "Total records: {$total_records}. Successfull records: {$success_records}. Unsuccessfull records: {$unsuccess_records}. Duplicate records: {$duplicate_records}";
        return true;
    }
    
    public function importAddMaster($model, $col_name, $col_id, $name) {
        $id = $model::model()->findByAttributes(array($col_name => $name))->$col_id;
        if(empty($id) && $name != ''){
            $model = new $model;
            $model->setAttribute($col_name, $name);
            $model->save(false);
            $id = $model->$col_id;
        }
        return $id;
    }
}
