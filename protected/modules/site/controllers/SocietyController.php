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
                    if ($_FILES['Society']['name']['import_file']) {
                        $model->import_file = CUploadedFile::getInstance($model, 'import_file');
                        if (!is_dir(UPLOAD_DIR . '/temp/'))
                            mkdir(UPLOAD_DIR . '/temp/');
                        $path = UPLOAD_DIR . '/temp/' . $model->import_file;
                        $model->import_file->saveAs($path);
                        $this->importExcel($path);
                    }
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

        $authors = $performers = $producers = $publishers = $author_performers = $publisher_producers = $female_performers = array();
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
                //set authors
                $auth_cols = array(
                    7 => 'COMPOSER',
                    8 => 'LYRICTS',
                    9 => 'MUSIC',
                    11 => 'ARRANGER (S)',
                );
                foreach ($auth_cols as $col => $v) {
                    $auth_val = $objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
                    if ($this->importStringValidation($auth_val)) {
                        if (!in_array($auth_val, $authors))
                            array_push($authors, $auth_val);
                    }
                }

                //set performer
                $perf_cols = array(
                    12 => 'FEATURED PERFORMER',
                    13 => 'GUEST PERFORMER',
                    14 => 'SESSION MUSICIANS',
                    16 => 'SESSION VOCALISTS',
                    21 => 'PERFORMER FEMALE',
                );
                foreach ($perf_cols as $col => $v) {
                    $perf_val = $objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
                    if ($this->importStringValidation($perf_val)) {
                        if (!in_array($perf_val, $performers))
                            array_push($performers, $perf_val);
                        if ($col == 21) {
                            if (!in_array($perf_val, $female_performers))
                                array_push($female_performers, $perf_val);
                        }
                    }
                }

                //set publisher
                $pub_cols = array(
                    4 => 'DISTRIBUTOR',
                );
                foreach ($pub_cols as $col => $v) {
                    $pub_val = $objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
                    if ($this->importStringValidation($pub_val, true)) {
                        if (!in_array($pub_val, $publishers))
                            array_push($publishers, $pub_val);
                    }
                }

                //set producers
                $pro_cols = array(
                    1 => 'EXECUTIVE PRODUCER',
                );
                foreach ($pro_cols as $col => $v) {
                    $prod_val = $objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
                    if ($this->importStringValidation($prod_val, true)) {
                        if (!in_array($prod_val, $producers))
                            array_push($producers, $prod_val);
                    }
                }
            }

            //get both author & performers, publishers & producers
            $author_performers = array_intersect($authors, $performers);
            $publisher_producers = array_intersect($publishers, $producers);

            foreach ($authors as $author) {
                $check_exists = AuthorAccount::model()->find("Auth_First_Name =:name", array(':name' => $author));
                if (empty($check_exists)) {
                    $model = new AuthorAccount;
                    $model->Auth_First_Name = $author;
                    if(in_array($author, $author_performers)){
                        $model->Auth_Is_Performer = 'Y';
                    }
                    $model->save(false);
                }
            }
            
            $performers = array_diff($performers, $authors);
            foreach ($performers as $performer) {
                $check_exists = PerformerAccount::model()->find("Perf_First_Name =:name", array(':name' => $performer));
                if (empty($check_exists)) {
                    $model = new PerformerAccount;
                    $model->Perf_First_Name = $performer;
                    if(in_array($performer, $female_performers))
                        $model->Perf_Gender = 'F';
                    if(in_array($performer, $author_performers)){
                        $model->Perf_Is_Author = 'Y';
                    }
                    $model->save(false);
                }
            }

            foreach ($publishers as $publisher) {
                $check_exists = PublisherAccount::model()->find("Pub_Corporate_Name =:name", array(':name' => $publisher));
                if (empty($check_exists)) {
                    $model = new PublisherAccount;
                    $model->Pub_Corporate_Name = $publisher;
                    if(in_array($publisher, $publisher_producers)){
                        $model->Pub_Is_Producer = 'Y';
                    }
                    $model->save(false);
                }
            }

            $producers = array_diff($producers, $publishers);
            foreach ($producers as $producer) {
                $check_exists = ProducerAccount::model()->find("Pro_Corporate_Name =:name", array(':name' => $producer));
                if (empty($check_exists)) {
                    $model = new ProducerAccount;
                    $model->Pro_Corporate_Name = $producer;
                    if(in_array($producer, $publisher_producers)){
                        $model->Pro_Is_Publisher = 'Y';
                    }
                    $model->save(false);
                }
            }
            unlink($file_path);
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

}
