<?php

class SoundcarrierController extends Controller {
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

    public function actions() {
        return array(
            'pdf' => 'application.components.actions.pdf',
            'download' => 'application.components.actions.download',
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
                'actions' => array('index', 'view', 'create', 'update', 'admin', 'delete', 'biofiledelete', 'pdf', 'download', 'subtitledelete', 'searchworks', 'insertright', 'getrecordingdetails', 'fixationdelete', 'searchrecords', 'searchrecordperformers', 'publicationdelete'),
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
        $model = $this->loadModel($id);
        $sub_title_model = SoundCarrierSubtitle::model()->findAllByAttributes(array('Sound_Car_Id' => $id));
        $publication_model = SoundCarrierPublication::model()->findByAttributes(array('Sound_Car_Id' => $id));
        $biograph_model = SoundCarrierBiography::model()->findByAttributes(array('Sound_Car_Id' => $id));
        $work_members = SoundCarrierRightholder::model()->findAll('Sound_Car_Id = :int_code And Sound_Car_Right_Work_Type = :work_type', array(':int_code' => $model->Sound_Car_Id, ':work_type' => 'W'));
        $rcd_members = SoundCarrierRightholder::model()->findAll('Sound_Car_Id = :int_code And Sound_Car_Right_Work_Type = :work_type', array(':int_code' => $model->Sound_Car_Id, ':work_type' => 'R'));
        $fixations = SoundCarrierFixations::model()->findAll('Sound_Car_Id = :soundCar_id', array(':soundCar_id' => $model->Sound_Car_Id));
        $publications = SoundCarrierPublication::model()->findAll('Sound_Car_Id = :soundCar_id', array(':soundCar_id' => $model->Sound_Car_Id));
        $document_model = SoundCarrierDocumentation::model()->findByAttributes(array('Sound_Car_Id' => $id));

        $export = isset($_REQUEST['export']) && $_REQUEST['export'] == 'PDF';
        $compact = compact('model', 'export', 'sub_title_model', 'publication_model', 'biograph_model', 'work_members', 'rcd_members', 'publications', 'fixations', 'document_model');
        if ($export) {
            $mPDF1 = Yii::app()->ePdf->mpdf();
            $stylesheet = $this->pdfStyles();
            $mPDF1->WriteHTML($stylesheet, 1);
            $mPDF1->WriteHTML($this->renderPartial('view', $compact, true));
            $mPDF1->Output("SoundCarrier_view_{$id}.pdf", EYiiPdf::OUTPUT_TO_DOWNLOAD);
        } else {
            $this->render('view', $compact);
        }
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new SoundCarrier;

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['SoundCarrier'])) {
            $model->attributes = $_POST['SoundCarrier'];
            if ($model->save()) {
                Myclass::addAuditTrail("Created SoundCarrier successfully.", "headphones");
                Yii::app()->user->setFlash('success', 'SoundCarrier Created Successfully!!! Please Fill Documentation');
                $this->redirect(array('/site/soundcarrier/update', 'id' => $model->Sound_Car_Id, 'tab' => 2));
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
    public function actionUpdate($id, $tab = 1, $edit = NULL, $fixedit = NULL, $pubedit = NULL) {
        $model = $this->loadModel($id);
        $sub_title_model = $edit == NULL ? new SoundCarrierSubtitle : SoundCarrierSubtitle::model()->findByAttributes(array('Sound_Car_Subtitle_Id' => $edit));

        $document_exists = SoundCarrierDocumentation::model()->findByAttributes(array('Sound_Car_Id' => $id));
        $document_model = empty($document_exists) ? new SoundCarrierDocumentation : $document_exists;

        $biograph_exists = SoundCarrierBiography::model()->findByAttributes(array('Sound_Car_Id' => $id));
        $biograph_model = empty($biograph_exists) ? new SoundCarrierBiography : $biograph_exists;

        $publication_model = new SoundCarrierPublication;
        if($pubedit != NULL){
            $publication_exists = SoundCarrierPublication::model()->findByAttributes(array('Sound_Car_Publ_Id' => $pubedit));
            $publication_model = empty($publication_exists) ? new SoundCarrierPublication : $publication_exists;
        }

        $fixation_model = new SoundCarrierFixations;
        if($fixedit != NULL){
            $fixation_exists = SoundCarrierFixations::model()->findByAttributes(array('Sound_Car_Fix_Id' => $fixedit));
            $fixation_model = empty($fixation_exists) ? new SoundCarrierFixations : $fixation_exists;
        }

        $right_holder_exists_1 = SoundCarrierRightholder::model()->findAllByAttributes(array('Sound_Car_Id' => $id, 'Sound_Car_Right_Work_Type' => 'W'));
        $right_holder_exists_2 = SoundCarrierRightholder::model()->findAllByAttributes(array('Sound_Car_Id' => $id, 'Sound_Car_Right_Work_Type' => 'R'));
        $right_holder_model = new SoundCarrierRightholder;

        $biograph_upload_model = new SoundCarrierBiographUploads;
        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation(array($model, $document_model, $biograph_model, $biograph_upload_model, $sub_title_model, $publication_model, $fixation_model, $right_holder_model));

        if (isset($_POST['SoundCarrier'])) {
            $model->attributes = $_POST['SoundCarrier'];
            if ($model->save()) {
                Myclass::addAuditTrail("Updated SoundCarrier successfully.", "headphones");
                Yii::app()->user->setFlash('success', 'SoundCarrier Updated Successfully!!!');
                $this->redirect(array('/site/soundcarrier/update', 'tab' => '1', 'id' => $model->Sound_Car_Id));
            }
        } elseif (isset($_POST['SoundCarrierBiography'])) {
            $biograph_model->attributes = $_POST['SoundCarrierBiography'];
            if ($biograph_model->save()) {
                $bio_id = $biograph_model->Sound_Car_Biogrph_Id;

                $images = CUploadedFile::getInstancesByName('Sound_Car_Biogrph_Upl_File');
                if (isset($images) && count($images) > 0) {
                    foreach ($images as $image => $pic) {
                        $biograph_new_upload_model = new SoundCarrierBiographUploads;
                        $path = DIRECTORY_SEPARATOR . UPLOAD_DIR;
                        $newName = DIRECTORY_SEPARATOR . strtolower(get_class($biograph_new_upload_model)) . DIRECTORY_SEPARATOR . trim(md5(mt_rand())) . '.' . CFileHelper::getExtension($pic->name);
                        $dir = UPLOAD_DIR . DIRECTORY_SEPARATOR . strtolower(get_class($biograph_new_upload_model));
                        if (!is_dir($dir))
                            mkdir($dir);
                        $biograph_new_upload_model->Sound_Car_Biogrph_Id = $bio_id;
                        $biograph_new_upload_model->Sound_Car_Biogrph_Upl_File = $newName;
                        $biograph_new_upload_model->Sound_Car_Biogrph_Upl_Description = $_POST['SoundCarrierBiographUploads']['Sound_Car_Biogrph_Upl_Description'];
                        if ($biograph_new_upload_model->validate()) {
                            $biograph_new_upload_model->save();
                            $pic->saveAs(Yii::getPathOfAlias('webroot') . $path . $newName);
                        }
                    }
                }

                Myclass::addAuditTrail("Saved Sound Carrier Biography successfully.", "headphones");
                Yii::app()->user->setFlash('success', 'Sound Carrier Biography Saved Successfully!!!');
                $this->redirect(array('/site/soundcarrier/update', 'id' => $model->Sound_Car_Id, 'tab' => '5'));
            }
        } elseif (isset($_POST['SoundCarrierDocumentation'])) {
            $document_model->attributes = $_POST['SoundCarrierDocumentation'];
            if ($document_model->save()) {
                Myclass::addAuditTrail("Updated SoundCarrier Documentation successfully.", "headphones");
                $doc_tab = 2;
                $message = 'Sound Carrier Documentation Updated Successfully!!!';
                if(empty($right_holder_exists_2)){
                    $doc_tab = 8;
                    $message = 'Sound Carrier Documentation Updated Successfully!!!. Please Fill RightHolders - Recordings';
                    if(empty($right_holder_exists_1)){
                        $message = 'Sound Carrier Documentation Updated Successfully!!!. Please Fill RightHolders - Works';
                        $doc_tab = 7;
                    }
                }
                Yii::app()->user->setFlash('success', $message);
                $this->redirect(array('/site/soundcarrier/update', 'tab' => $doc_tab, 'id' => $model->Sound_Car_Id));
            }
        } elseif (isset($_POST['SoundCarrierSubtitle'])) {
            $sub_title_model->attributes = $_POST['SoundCarrierSubtitle'];
            if ($sub_title_model->save()) {
                Myclass::addAuditTrail("Saved SoundCarrier Subtitle successfully.", "headphones");
                Yii::app()->user->setFlash('success', 'Sound Carrier Subtitle Saved Successfully!!!');
                $this->redirect(array('/site/soundcarrier/update', 'id' => $model->Sound_Car_Id, 'tab' => '4'));
            }
        } elseif (isset($_POST['SoundCarrierPublication'])) {
            $publication_model->attributes = $_POST['SoundCarrierPublication'];
            if ($publication_model->save()) {
                Myclass::addAuditTrail("Saved SoundCarrier Publication successfully.", "headphones");
                Yii::app()->user->setFlash('success', 'Sound Carrier Publication Saved Successfully!!!');
                $this->redirect(array('/site/soundcarrier/update', 'id' => $model->Sound_Car_Id, 'tab' => '3'));
            }
        } elseif (isset($_POST['SoundCarrierFixations'])) {
            $fixation_model->attributes = $_POST['SoundCarrierFixations'];
            if ($fixation_model->save()) {
                Myclass::addAuditTrail("Saved SoundCarrier Fixations successfully.", "headphones");
                Yii::app()->user->setFlash('success', 'Sound Carrier Fixations Saved Successfully!!!');
                $this->redirect(array('/site/soundcarrier/update', 'id' => $model->Sound_Car_Id, 'tab' => '6'));
            }
        }
        
        $this->render('update', compact('model', 'document_model', 'tab', 'biograph_model', 'biograph_upload_model', 'sub_title_model', 'publication_model', 'fixation_model', 'right_holder_model', 'right_holder_exists_1', 'right_holder_exists_2'));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        try {
            $model = $this->loadModel($id);
            $uploads = $model->soundCarrierBiographies->soundCarrierBiographUploads;
            $model->delete();
            //file remove
            if (!empty($uploads)) {
                foreach ($uploads as $upload) {
                    $path = UPLOAD_DIR . $upload->Sound_Car_Biogrph_Upl_File;
                    if (is_file($path))
                        unlink($path);
                }
            }
            //end
            Myclass::addAuditTrail("Deleted SoundCarrier successfully.", "headphones");
        } catch (CDbException $e) {
            if ($e->errorInfo[1] == 1451) {
                throw new CHttpException(400, Yii::t('err', 'Relation Restriction Error.'));
            } else {
                throw $e;
            }
        }

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax'])) {
            Yii::app()->user->setFlash('success', 'Sound Carrier Deleted Successfully!!!');
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/site/soundcarrier/index'));
        }
    }

    public function actionBiofiledelete($id) {
        $model = SoundCarrierBiographUploads::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        $bio_id = $model->Sound_Car_Biogrph_Id;

        $model->setUploadDirectory(UPLOAD_DIR);
        try {
            $model->delete();
            Myclass::addAuditTrail("Deleted a Biography file from {$model->soundCarBiogrph->soundCar->Sound_Car_Title} successfully.", "user");
        } catch (CDbException $e) {
            if ($e->errorInfo[1] == 1451) {
                throw new CHttpException(400, Yii::t('err', 'Relation Restriction Error.'));
            } else {
                throw $e;
            }
        }

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax'])) {
            Yii::app()->user->setFlash('success', "Deleted a Biography file from {$model->soundCarBiogrph->soundCar->Sound_Car_Title} successfully.");
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/site/soundcarrier/update', 'id' => $model->soundCarBiogrph->Sound_Car_Id, 'tab' => '5'));
        }
    }

    public function actionSubtitledelete($id) {
        try {
            $model = SoundCarrierSubtitle::model()->findByPk($id);
            $model->delete();
            Myclass::addAuditTrail("Deleted Sound Carrier subtitle {$model->Sound_Car_Subtitle_Name} successfully.", "headphones");
        } catch (CDbException $e) {
            if ($e->errorInfo[1] == 1451) {
                throw new CHttpException(400, Yii::t('err', 'Relation Restriction Error.'));
            } else {
                throw $e;
            }
        }

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax'])) {
            Yii::app()->user->setFlash('success', "Deleted Work subtitle {$model->Sound_Car_Subtitle_Name} successfully.");
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/site/soundcarrier/update', 'id' => $model->soundCar->Sound_Car_Id, 'tab' => 4));
        }
    }

    public function actionFixationdelete($id) {
        try {
            $model = SoundCarrierFixations::model()->findByPk($id);
            $model->delete();
            Myclass::addAuditTrail("Deleted Sound Carrier Fixation {$model->soundCar->Sound_Car_Title} successfully.", "headphones");
        } catch (CDbException $e) {
            if ($e->errorInfo[1] == 1451) {
                throw new CHttpException(400, Yii::t('err', 'Relation Restriction Error.'));
            } else {
                throw $e;
            }
        }

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax'])) {
            Yii::app()->user->setFlash('success', "Deleted Sound Carrier Fixation {$model->soundCar->Sound_Car_Title} successfully.");
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/site/soundcarrier/update', 'id' => $model->soundCar->Sound_Car_Id, 'tab' => 6));
        }
    }

    public function actionPublicationdelete($id) {
        try {
            $model = SoundCarrierPublication::model()->findByPk($id);
            $model->delete();
            Myclass::addAuditTrail("Deleted Sound Carrier Publication {$model->soundCar->Sound_Car_Title} successfully.", "headphones");
        } catch (CDbException $e) {
            if ($e->errorInfo[1] == 1451) {
                throw new CHttpException(400, Yii::t('err', 'Relation Restriction Error.'));
            } else {
                throw $e;
            }
        }

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax'])) {
            Yii::app()->user->setFlash('success', "Deleted Sound Carrier Publication {$model->soundCar->Sound_Car_Title} successfully.");
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/site/soundcarrier/update', 'id' => $model->soundCar->Sound_Car_Id, 'tab' => 3));
        }
    }

    public function actionSearchworks() {
        $criteria = new CDbCriteria();
        if (!empty($_REQUEST['searach_text'])) {
            $search_txt = $_REQUEST['searach_text'];
            $criteria->compare('Work_Org_Title', $search_txt, true, 'OR');
            $criteria->compare('Work_Internal_Code', $search_txt, true, 'OR');
            $criteria->compare('Work_Iswc', $search_txt, true, 'OR');
            $criteria->compare('Work_Wic_Code', $search_txt, true, 'OR');
            $criteria->compare('Work_Opus_Number', $search_txt, true, 'OR');
        }

        if ($_REQUEST['is_work'] == '1') {
            $works = Work::model()->findAll($criteria);
        }
        $this->renderPartial('_search_works', compact('works'));
    }

    public function actionSearchrecords() {
        $criteria = new CDbCriteria();
        if (!empty($_REQUEST['searach_text'])) {
            $search_txt = $_REQUEST['searach_text'];
            $criteria->compare('Rcd_Title', $search_txt, true, 'OR');
            $criteria->compare('Rcd_Internal_Code', $search_txt, true, 'OR');
            $criteria->compare('Rcd_Isrc_Code', $search_txt, true, 'OR');
            $criteria->compare('Rcd_Iswc_Number', $search_txt, true, 'OR');
            $criteria->compare('Rcd_Reference', $search_txt, true, 'OR');
        }

        if ($_REQUEST['is_record'] == '1') {
            $recordings = Recording::model()->findAll($criteria);
        }
        $this->renderPartial('_search_recordings', compact('recordings'));
    }

    public function actionSearchrecordperformers() {
        if(isset($_REQUEST['rcd_guid']))
            $recording = Recording::model()->findByAttributes (array('Rcd_GUID' => $_REQUEST['rcd_guid']));
        $this->renderPartial('_search_recording_performers', compact('recording'));
    }

    public function actionInsertright() {
        if (isset($_POST['SoundCarrierRightholder']) && !empty($_POST['SoundCarrierRightholder'])) {
            $end = end($_POST['SoundCarrierRightholder']);
            $sound_car_id = $end['Sound_Car_Id'];
            
            $created_by = $updated_by = '';
            $created_date = date('Y-m-d H:i:s');
            $updated_by = "0000-00-00 00:00:00";
            $holders = SoundCarrierRightholder::model()->findAllByAttributes(array('Sound_Car_Id' => $sound_car_id, 'Sound_Car_Right_Work_Type' => $end['Sound_Car_Right_Work_Type']));
            if(empty($holders)){
                $created_by = Yii::app()->user->id;
            }else{
                $created_by = $holders[0]->Created_By;
                $created_date = $holders[0]->Created_Date;
                $updated_by = Yii::app()->user->id;
                $updated_date = date('Y-m-d H:i:s');
            }
            
            SoundCarrierRightholder::model()->deleteAllByAttributes(array('Sound_Car_Id' => $sound_car_id, 'Sound_Car_Right_Work_Type' => $end['Sound_Car_Right_Work_Type']));
            $valid = true;
            foreach ($_POST['SoundCarrierRightholder'] as $values) {
                $model = new SoundCarrierRightholder;
                $model->attributes = $values;
                $model->setAttribute('Created_By', $created_by);
                $model->setAttribute('Updated_By', $updated_by);
                $model->setAttribute('Created_Date', $created_date);
                $model->setAttribute('Rowversion', $updated_date);
                $valid = $valid && $model->save(false);
                if ($valid)
                    Myclass::addAuditTrail("Created Right Holder saved for {$model->soundCar->Sound_Car_Title} successfully.", "fa fa-at");
            }
            if ($valid)
                Yii::app()->user->setFlash('success', 'RightHolder Saved Successfully!!!');
            $tab = $end['Sound_Car_Right_Work_Type'] == 'W' ? 7 : 8;
            $this->redirect(array('/site/soundcarrier/update', 'id' => $model->Sound_Car_Id, 'tab' => $tab));
        }
        exit;
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $search = false;

        $model = new SoundCarrier();
        $searchModel = new SoundCarrier('search');
        $searchModel->unsetAttributes();  // clear any default values
        if (isset($_GET['SoundCarrier'])) {
            $search = true;
            $searchModel->attributes = $_GET['SoundCarrier'];
            $searchModel->search();
        }

        $this->render('index', compact('searchModel', 'search', 'model'));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new SoundCarrier('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['SoundCarrier']))
            $model->attributes = $_GET['SoundCarrier'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return SoundCarrier the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = SoundCarrier::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param SoundCarrier $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && ($_POST['ajax'] === 'sound-carrier-form' || $_POST['ajax'] === 'soundcarrier-documentation-form' || $_POST['ajax'] === 'soundcarrier-biography-form' || $_POST['ajax'] === 'soundCar-subtitle-form' || $_POST['ajax'] === 'soundcarrier-publication-form' || $_POST['ajax'] === 'sound-carrier-fixations-form' || $_POST['ajax'] === 'sound-carrier-rightholder-form-1' || $_POST['ajax'] === 'sound-carrier-rightholder-form-2')) {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionGetrecordingdetails() {
        if(isset($_POST['guid'])){
            $work = Recording::model()->findByAttributes(array('Rcd_GUID'=> $_POST['guid']));
            if(empty($work)){
                $work = Work::model()->findByAttributes(array('Work_GUID'=> $_POST['guid']));
                $int_code = $work->Work_Internal_Code;
                $type = 'W';
                $duration_hour = $work->duration_hours;
                $duration_minute = $work->duration_minutes;
                $duration_second = $work->duration_seconds;
            }else{
                $int_code = $work->Rcd_Internal_Code;
                $isrw = '';
                $type = 'R';
                $duration_hour = $work->duration_hours;
                $duration_minute = $work->duration_minutes;
                $duration_second = $work->duration_seconds;
            }
            $ret = array(
                'Internal_Code' => $int_code,
                'Isrc_Code' => $isrw,
                'Work_Type' => $type,
                'duration_hours' => $duration_hour,
                'duration_minutes' => $duration_minute,
                'duration_seconds' => $duration_second,
            );
            echo json_encode($ret);
        }
        exit;
    }
}
