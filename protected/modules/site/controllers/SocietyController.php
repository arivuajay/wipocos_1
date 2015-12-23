<?php

class SocietyController extends Controller {

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
                'actions' => array('index', 'view', 'create', 'update', 'admin', 'delete', 'import', 'exportimporteddata', 'testexport'),
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
                            'staging' => Yii::app()->wipoimport->getStageRow(),
                            'import_status' => Yii::app()->wipoimport->getImportStatus(),
                            'staging_tables' => Yii::app()->wipoimport->getStageTables(),
                            'imported_table' => Yii::app()->wipoimport->getImportedTable(),
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
        
        Yii::app()->wipoimport->setWorkSheet($objWorksheet);
        Yii::app()->wipoimport->setImportSociety($this->_import_society);
        Yii::app()->wipoimport->setImportCategory($this->_import_category);
        Yii::app()->wipoimport->setHighestColumn($highestColumnIndex);
        
        unlink($file_path);

        $return = false;

        $input_type = strtolower($objWorksheet->getCellByColumnAndRow(0, 2)->getValue());
        if (array_key_exists($input_type, $screens)) {
            if ($input_type != $this->_import_category) {
                Yii::app()->user->setFlash('danger', "Its not a Valid {$this->_import_category} File Format (Seems like {$input_type} File). Recheck your imported file");
                $this->redirect(array('/site/society/import', 'sid' => $this->_import_society));
            }
            switch ($input_type) {
                case 'authors tabs':
                    Yii::app()->wipoimport->importRows('author', 4, $highestRow, 14);
                    $return = Yii::app()->wipoimport->importAuthor();
                    break;

                case 'performers tabs':
                    Yii::app()->wipoimport->importRows('performer', 4, $highestRow, 14);
                    $return = Yii::app()->wipoimport->importPerformer();
                    break;

                case 'publishers tabs':
                    Yii::app()->wipoimport->importRows('publisher', 4, $highestRow, 13);
                    $return = Yii::app()->wipoimport->importPublisher();
                    break;

                case 'producers tabs':
                    Yii::app()->wipoimport->importRows('producer', 4, $highestRow, 12);
                    $return = Yii::app()->wipoimport->importProducer();
                    break;

                case 'works tabs':
                    Yii::app()->wipoimport->importRows('work', 4, $highestRow, 12);
                    $return = Yii::app()->wipoimport->importWork();
                    break;

                case 'recordings tabs':
                    Yii::app()->wipoimport->importRows('recording', 4, $highestRow, 14);
                    $return = Yii::app()->wipoimport->importRecording();
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

//    public function importStringValidation($value, $special_char = false) {
//        $pattern = preg_quote('#$%^&*()+=-[]\';,/{}|\":<>?~', '#');
//        $title_exception = array('EXECUTIVE', 'PRODUCER', 'DISTRIBUTOR', 'COMPOSER', 'MUSICAL', 'ARRANGER (S)', 'FEATURED', 'PERFORMER', 'SESSION', 'VOCALISTS', 'MUSICIANS', 'PERFORMERFEMALE', 'GUEST', 'LYRICIST', 'MUSIC');
//        if ($special_char)
//            return !in_array($value, $title_exception) && $value != '' && !preg_match("#[{$pattern}]#", $value) && !is_array($value) && !is_object($value);
//        else
//            return !in_array($value, $title_exception) && $value != '' && !is_array($value) && !is_object($value);
//    }

    public function actionExportimporteddata() {
        if (!empty(Yii::app()->session['staging']) && !empty(Yii::app()->session['staging_tables']) && !empty(Yii::app()->session['title'])) {
            $staging = Yii::app()->session['staging'];
            $staging_tables = Yii::app()->session['staging_tables'];
            $title = Yii::app()->session['title'];
            $status = Myclass::importViewStatus();
            $ignore_list = Myclass::importViewIgnoreList();

            $filename = str_replace(' ', '', $title) . ".csv";
            $fp = fopen('php://output', 'w');
            header('Content-type: application/csv');
            header('Content-Disposition: attachment; filename=' . $filename);

            fputcsv($fp, array($title));
            fputcsv($fp, array());
            foreach ($staging_tables as $table => $cont) {
                fputcsv($fp, array($cont['title']));
                $header = array();
                $header[] = "S.No";
                foreach ($staging[1][$cont['key']] as $col => $value) {
                    if (!in_array($col, $ignore_list))
                        $header[] = $table::model()->getAttributeLabel($col);
                }
                $header[] = "Status";
                fputcsv($fp, $header);
                $i = 1;
                foreach ($staging as $key => $rows) {
                    $sts = $status[$rows[$cont['key']]['import_status']]['status'];
                    $tr = array();
                    $tr[] = $i++;
                    foreach ($staging[$key][$cont['key']] as $col => $value) {
                        if (!in_array($col, $ignore_list)) {
                            $tr[] = $value;
                        }
                    }
                    $tr[] = $sts;
                    fputcsv($fp, $tr);
                }
                fputcsv($fp, array());
            }
        }
        exit;
    }

    public function actionTestexport() {
        /** Error reporting */
        error_reporting(E_ALL);

        /** Include path * */
        ini_set('include_path', ini_get('include_path') . ';../Classes/');

        /** PHPExcel */
        Yii::import('application.vendors.PHPExcel', true);
//        include 'PHPExcel.php';

        /** PHPExcel_Writer_Excel2007 */
        Yii::import('application.vendors.PHPExcel.Writer.Excel2007', true);
//        include 'PHPExcel/Writer/Excel2007.php';

// Create new PHPExcel object
        echo date('H:i:s') . " Create new PHPExcel object\n";
        $objPHPExcel = new PHPExcel();

// Set properties
        echo date('H:i:s') . " Set properties\n";
        $objPHPExcel->getProperties()->setCreator("Maarten Balliauw");
        $objPHPExcel->getProperties()->setLastModifiedBy("Maarten Balliauw");
        $objPHPExcel->getProperties()->setTitle("Office 2007 XLSX Test Document");
        $objPHPExcel->getProperties()->setSubject("Office 2007 XLSX Test Document");
        $objPHPExcel->getProperties()->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.");


// Add some data
        echo date('H:i:s') . " Add some data\n";
        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Hello');
        $objPHPExcel->getActiveSheet()->SetCellValue('B2', 'world!');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Hello');
        $objPHPExcel->getActiveSheet()->SetCellValue('D2', 'world!');

// Rename sheet
        echo date('H:i:s') . " Rename sheet\n";
        $objPHPExcel->getActiveSheet()->setTitle('Simple');


// Save Excel 2007 file
        echo date('H:i:s') . " Write to Excel2007 format\n";
        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save(UPLOAD_DIR.'/export.xlsx');

// Echo done
        echo date('H:i:s') . " Done writing file.\r\n";
    }

}
