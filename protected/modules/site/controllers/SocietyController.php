<?php

class SocietyController extends Controller {
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
                'actions' => array('index', 'view', 'create', 'update', 'admin', 'delete', 'dataupload'),
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
                if ($_FILES['Society']['name']['import_file']) {
                    $model->import_file = CUploadedFile::getInstance($model, 'import_file');
                    if (!is_dir(UPLOAD_DIR . '/temp/'))
                        mkdir(UPLOAD_DIR . '/temp/');
                    $path = UPLOAD_DIR . '/temp/' . $model->import_file;
                    $model->import_file->saveAs($path);
                    $this->importExcel($path);
                }
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
//        $file_path = UPLOAD_DIR . '/data/import.xls';
        Yii::import('application.vendors.PHPExcel', true);
        $objReader = new PHPExcel_Reader_Excel5;
        $objPHPExcel = $objReader->load(@$file_path);
        $objWorksheet = $objPHPExcel->getActiveSheet();
        $highestRow = $objWorksheet->getHighestRow(); // e.g. 10
        $highestColumn = $objWorksheet->getHighestColumn(); // e.g 'F'
        $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn); // e.g. 5

        $authors = $performers = $producers = $publishers = $author_performers = $publisher_producers = array();
        $iValid = 0;

        if ($objWorksheet->getCellByColumnAndRow(0, 2)->getValue() == "TITLE") {
            $iValid = 1;
            if ($objWorksheet->getCellByColumnAndRow(1, 2)->getValue() != "PRODUCER") {
                throw new CHttpException(400, Yii::t('err', "Its not in Album Information formate (EXECUTIVE PRODUCER column value missing)"));
            } else if ($objWorksheet->getCellByColumnAndRow(2, 2)->getValue() != "RELEASED") {
                throw new CHttpException(400, Yii::t('err', "Its not in Album Information formate (YEAR FIRST column value missing)"));
            } else if ($objWorksheet->getCellByColumnAndRow(3, 2)->getValue() != "INFORMATION") {
                throw new CHttpException(400, Yii::t('err', "Its not in Album Information formate (CONTACT column value missing)"));
            }
        }


        if ($iValid == 1) {
            for ($row = 3; $row <= $highestRow; ++$row) {
                //set author
                //COMPOSER
                $auth_val_1 = $objWorksheet->getCellByColumnAndRow(7, $row)->getValue();
                if ($this->importStringValidation($auth_val_1)) {
                    array_push($authors, $auth_val_1);
                }
                //ARRANGER (S)
                $auth_val_2 = $objWorksheet->getCellByColumnAndRow(11, $row)->getValue();
                if ($this->importStringValidation($auth_val_2)) {
                    array_push($authors, $auth_val_2);
                }
                //LYRICTS
                $auth_val_3 = $objWorksheet->getCellByColumnAndRow(8, $row)->getValue();
                if ($this->importStringValidation($auth_val_3)) {
                    array_push($authors, $auth_val_3);
                }
                //MUSIC
                $auth_val_4 = $objWorksheet->getCellByColumnAndRow(9, $row)->getValue();
                if ($this->importStringValidation($auth_val_4)) {
                    array_push($authors, $auth_val_4);
                }

                //set performer
                //FEATURED PERFORMER
                $perf_val_1 = $objWorksheet->getCellByColumnAndRow(12, $row)->getValue();
                if ($this->importStringValidation($perf_val_1)) {
                    array_push($performers, $perf_val_1);
                }
                //GUEST PERFORMER
                $perf_val_2 = $objWorksheet->getCellByColumnAndRow(13, $row)->getValue();
                if ($this->importStringValidation($perf_val_2)) {
                    array_push($performers, $perf_val_2);
                }
                //SESSION MUSICIANS
                $perf_val_3 = $objWorksheet->getCellByColumnAndRow(14, $row)->getValue();
                if ($this->importStringValidation($perf_val_3)) {
                    array_push($performers, $perf_val_3);
                }
                //SESSION VOCALISTS
                $perf_val_4 = $objWorksheet->getCellByColumnAndRow(16, $row)->getValue();
                if ($this->importStringValidation($perf_val_4)) {
                    array_push($performers, $perf_val_4);
                }
                //PERFORMER FEMALE
                $perf_val_5 = $objWorksheet->getCellByColumnAndRow(21, $row)->getValue();
                if ($this->importStringValidation($perf_val_5)) {
                    array_push($performers, $perf_val_5);
                }

                //set publisher
                //DISTRIBUTOR
                $pub_val = $objWorksheet->getCellByColumnAndRow(4, $row)->getValue();
                if ($this->importStringValidation($pub_val, true)) {
                    array_push($publishers, $pub_val);
                }

                //set producers
                //EXECUTIVE PRODUCER
                $prod_val = $objWorksheet->getCellByColumnAndRow(1, $row)->getValue();
                if ($this->importStringValidation($prod_val, true)) {
                    array_push($producers, $prod_val);
                }
            }
            //get unique values
            $authors = array_unique($authors);
            $performers = array_unique($performers);
            $publishers = array_unique($publishers);
            $producers = array_unique($producers);

            //get both author & performers, publishers & producers
            $author_performers = array_intersect($authors, $performers);
            $authors = array_diff($authors, $author_performers);
            $performers = array_diff($performers, $author_performers);
            $publisher_producers = array_intersect($publishers, $producers);
            $publishers = array_diff($publishers, $publisher_producers);
            $producers = array_diff($producers, $publisher_producers);

            foreach ($authors as $author) {
                $check_exists = AuthorAccount::model()->find("Auth_First_Name =:name", array(':name' => $author));
                if (empty($check_exists)) {
                    $model = new AuthorAccount;
                    $model->Auth_First_Name = $author;
                    $model->save(false);
                }
            }

            foreach ($performers as $performer) {
                $check_exists = PerformerAccount::model()->find("Perf_First_Name =:name", array(':name' => $performer));
                if (empty($check_exists)) {
                    $model = new PerformerAccount;
                    $model->Perf_First_Name = $performer;
                    $model->save(false);
                }
            }

            foreach ($publishers as $publisher) {
                $check_exists = PublisherAccount::model()->find("Pub_Corporate_Name =:name", array(':name' => $publisher));
                if (empty($check_exists)) {
                    $model = new PublisherAccount;
                    $model->Pub_Corporate_Name = $publisher;
                    $model->save(false);
                }
            }

            foreach ($producers as $producer) {
                $check_exists = ProducerAccount::model()->find("Pro_Corporate_Name =:name", array(':name' => $producer));
                if (empty($check_exists)) {
                    $model = new ProducerAccount;
                    $model->Pro_Corporate_Name = $producer;
                    $model->save(false);
                }
            }

            foreach ($author_performers as $author_performer) {
                $check_exists = AuthorAccount::model()->find("Auth_First_Name =:name", array(':name' => $author_performer));
                if (empty($check_exists)) {
                    $model = new AuthorAccount;
                    $model->Auth_First_Name = $author_performer;
                    $model->Auth_Is_Performer = 'Y';
                    $model->save(false);
                }
            }

            foreach ($publisher_producers as $publisher_producer) {
                $check_exists = PublisherAccount::model()->find("Pub_Corporate_Name =:name", array(':name' => $publisher_producer));
                if (empty($check_exists)) {
                    $model = new PublisherAccount;
                    $model->Pub_Corporate_Name = $publisher_producer;
                    $model->Pub_Is_Producer = 'Y';
                    $model->save(false);
                }
            }
            
            unlink($file_path);
//            for ($row = 2; $row <= $highestRow; ++$row) {
//                for ($col = 0; $col <= $highestColumnIndex; ++$col) {
//                }
//            }
        } else {
            throw new CHttpException(400, Yii::t('err', "Its not a Valid File (NOT IN PREDEFINED FORMAT)"));
        }
    }

    public function importStringValidation($value, $special_char = false) {
        $pattern = preg_quote('#$%^&*()+=-[]\';,/{}|\":<>?~', '#');
        $title_exception = array('EXECUTIVE', 'PRODUCER', 'DISTRIBUTOR', 'COMPOSER', 'MUSICAL', 'ARRANGER (S)', 'FEATURED', 'PERFORMER', 'SESSION', 'VOCALISTS', 'MUSICIANS', 'PERFORMERFEMALE');
        if ($special_char)
            return !in_array($value, $title_exception) && $value != '' && !preg_match("#[{$pattern}]#", $value) && !is_array($value) && !is_object($value);
        else
            return !in_array($value, $title_exception) && $value != '' && !is_array($value) && !is_object($value);
    }

}
