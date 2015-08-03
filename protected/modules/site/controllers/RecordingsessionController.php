<?php

class RecordingsessionController extends Controller {
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

    public function behaviors() {
        return array(
            'exportableGrid' => array(
                'class' => 'application.components.ExportableGridBehavior',
                'filename' => "Recording_Sessin_" . time() . ".csv",
//                'csvDelimiter' => ',', //i.e. Excel friendly csv delimiter
        ));
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
                'actions' => array('index', 'view', 'create', 'update', 'admin', 'delete', 'pdf', 'download', 'subtitledelete', 'biofiledelete', 'insertright', 'foliodelete', 'newrecording'),
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

        $sub_title_model = RecordingSessionSubtitle::model()->findAllByAttributes(array('Rcd_Ses_Id' => $id));
        $biograph_model = RecordingSessionBiography::model()->findByAttributes(array('Rcd_Ses_Id' => $id));
        $document_model = RecordingSessionDocumentation::model()->findByAttributes(array('Rcd_Ses_Id' => $id));
        $rcd_members = RecordingSessionRightholder::model()->findAll('Rcd_Ses_Id = :int_code And Rcd_Ses_Right_Work_Type = :work_type', array(':int_code' => $model->Rcd_Ses_Id, ':work_type' => 'R'));
        $folios = RecordingSessionFolio::model()->findAllByAttributes(array('Rcd_Ses_Id' => $id));
        
        $export = isset($_REQUEST['export']) && $_REQUEST['export'] == 'PDF';
        $compact = compact('model', 'export', 'sub_title_model', 'biograph_model', 'document_model', 'rcd_members', 'folios');
        if ($export) {
            $mPDF1 = Yii::app()->ePdf->mpdf();
            $stylesheet = $this->pdfStyles();
            $mPDF1->WriteHTML($stylesheet, 1);
            $mPDF1->WriteHTML($this->renderPartial('view', $compact, true));
            $mPDF1->Output("RecordingSession_view_{$id}.pdf", EYiiPdf::OUTPUT_TO_DOWNLOAD);
        } else {
            $this->render('view', $compact);
        }
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new RecordingSession;

        $performer_model = new PerformerAccount;
        $producer_model = new ProducerAccount;
        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation(array($model, $performer_model, $producer_model));

        if (isset($_POST['RecordingSession'])) {
            $model->attributes = $_POST['RecordingSession'];
            if ($model->save()) {
                Myclass::addAuditTrail("Created RecordingSession successfully.", "cny");
                Yii::app()->user->setFlash('success', 'RecordingSession Created Successfully. Please Fill the Doucmentation!!!');
                $this->redirect(array('/site/recordingsession/update', 'tab' => 2, 'id' => $model->Rcd_Ses_Id));
            }
        }

        $this->render('create', compact('model', 'performer_model', 'producer_model'));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id, $tab = 1, $edit = NULL, $foledit = NULL) {
        $model = $this->loadModel($id);
        $sub_title_model = $edit == NULL ? new RecordingSessionSubtitle : RecordingSessionSubtitle::model()->findByAttributes(array('Rcd_Ses_Subtitle_Id' => $edit));
        $folio_model = $foledit == NULL ? new RecordingSessionFolio : RecordingSessionFolio::model()->findByAttributes(array('Rcd_Ses_Folio_Id' => $foledit));

        $document_exists = RecordingSessionDocumentation::model()->findByAttributes(array('Rcd_Ses_Id' => $id));
        $document_model = empty($document_exists) ? new RecordingSessionDocumentation : $document_exists;
        
        $biograph_exists = RecordingSessionBiography::model()->findByAttributes(array('Rcd_Ses_Id' => $id));
        $biograph_model = empty($biograph_exists) ? new RecordingSessionBiography : $biograph_exists;
        
        $right_holder_exists = RecordingSessionRightholder::model()->findAllByAttributes(array('Rcd_Ses_Id' => $id, 'Rcd_Ses_Right_Work_Type' => 'R'));
        $right_holder_model = new RecordingSessionRightholder;
        
        $biograph_upload_model = new RecordingSessionBiographUploads;
        
        $performer_model = new PerformerAccount;
        $producer_model = new ProducerAccount;
        $recording_model = new Recording;
        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation(array($model, $sub_title_model, $document_model, $biograph_model, $right_holder_model, $folio_model, $performer_model, $producer_model, $recording_model));

        if (isset($_POST['RecordingSession'])) {
            $model->attributes = $_POST['RecordingSession'];
            if ($model->save()) {
                Myclass::addAuditTrail("Updated RecordingSession successfully.", "cny");
                Yii::app()->user->setFlash('success', 'RecordingSession Updated Successfully!!!');
                $this->redirect(array('/site/recordingsession/update', 'id' => $model->Rcd_Ses_Id, 'tab' => 1));
            }
        } elseif (isset($_POST['RecordingSessionSubtitle'])) {
            $sub_title_model->attributes = $_POST['RecordingSessionSubtitle'];
            if ($sub_title_model->save()) {
                Myclass::addAuditTrail("Saved RecordingSession Subtitle successfully.", "file-cny");
                Yii::app()->user->setFlash('success', 'Recording Session Sheet Subtitle Saved Successfully!!!');
                $this->redirect(array('/site/recordingsession/update', 'id' => $model->Rcd_Ses_Id, 'tab' => 3));
            }
        } elseif (isset($_POST['RecordingSessionBiography'])) {
            $biograph_model->attributes = $_POST['RecordingSessionBiography'];
            if ($biograph_model->save()) {
                $bio_id = $biograph_model->Rcd_Ses_Biogrph_Id;

                $images = CUploadedFile::getInstancesByName('Rcd_Ses_Biogrph_Upl_File');
                if (isset($images) && count($images) > 0) {
                    foreach ($images as $image => $pic) {
                        $biograph_new_upload_model = new RecordingSessionBiographUploads;
                        $path = DIRECTORY_SEPARATOR . UPLOAD_DIR;
                        $newName = DIRECTORY_SEPARATOR . strtolower(get_class($biograph_new_upload_model)) . DIRECTORY_SEPARATOR . trim(md5(mt_rand())) . '.' . CFileHelper::getExtension($pic->name);
                        $dir = UPLOAD_DIR . DIRECTORY_SEPARATOR . strtolower(get_class($biograph_new_upload_model));
                        if (!is_dir($dir))
                            mkdir($dir);
                        $biograph_new_upload_model->Rcd_Ses_Biogrph_Id = $bio_id;
                        $biograph_new_upload_model->Rcd_Ses_Biogrph_Upl_File = $newName;
                        $biograph_new_upload_model->Rcd_Ses_Biogrph_Upl_Description = $_POST['RecordingSessionBiographUploads']['Rcd_Ses_Biogrph_Upl_Description'];
                        if ($biograph_new_upload_model->validate()) {
                            $biograph_new_upload_model->save();
                            $pic->saveAs(Yii::getPathOfAlias('webroot') . $path . $newName);
                        }
                    }
                }

                Myclass::addAuditTrail("Saved Recording Session Sheet Biography successfully.", "file-cny");
                Yii::app()->user->setFlash('success', 'Recording Session Sheet Biography Saved Successfully!!!');
                $this->redirect(array('/site/recordingsession/update', 'id' => $model->Rcd_Ses_Id, 'tab' => 4));
            }
        } elseif (isset($_POST['RecordingSessionDocumentation'])) {
            $document_model->attributes = $_POST['RecordingSessionDocumentation'];
            if ($document_model->save()) {
                Myclass::addAuditTrail("Updated RecordingSession Documentation successfully.", "file-cny");
                Yii::app()->user->setFlash('success', 'Recording Session Sheet Documentation Updated Successfully!!!');
                $doc_tab = 2;
                $message = 'Recording Session Documentation Updated Successfully!!!';
                if(empty($right_holder_exists_2)){
                    $doc_tab = 5;
                    $message = 'Recording Session Documentation Updated Successfully!!!. Please Fill Recordings';
                }
                Yii::app()->user->setFlash('success', $message);
                $this->redirect(array('/site/recordingsession/update', 'tab' => $doc_tab, 'id' => $model->Rcd_Ses_Id));
                
                $doc_tab = 2;
                if(empty($right_holder_exists_1) || empty($right_holder_exists_1))
                    $doc_tab = 7;
                $this->redirect(array('/site/recordingsession/update', 'tab' => $doc_tab, 'id' => $model->Rcd_Ses_Id));
            }
        } elseif (isset($_POST['RecordingSessionFolio'])) {
            $folio_model->attributes = $_POST['RecordingSessionFolio'];
            if ($folio_model->save()) {
                Myclass::addAuditTrail("Saved RecordingSession Folio successfully.", "file-cny");
                Yii::app()->user->setFlash('success', 'Recording Session Sheet Folio Saved Successfully!!!');
                $this->redirect(array('/site/recordingsession/update', 'id' => $model->Rcd_Ses_Id, 'tab' => 6));
            }
        }

        if ($this->isExportRequest()) {
            if (isset($_REQUEST['type']) && in_array($_REQUEST['type'], array('W', 'R'))) {
                $type = $_REQUEST['type'];
                $record = 'workexportmatchrecords';
                if ($type == 'W') {
                    $w_title = 'worktitle';
                    $title = 'Recording Session Works:';
                } else if ($type == 'R') {
                    $w_title = 'recordtitle';
                    $title = 'Recording Session Recording:';
                }
                $this->exportCSV(array($title), null, false);
                $this->exportCSV($right_holder_model->workExportList($model->Rcd_Ses_Id, $type), array($w_title, $record)
                );
            }
        }
        $this->render('update', compact('model', 'sub_title_model', 'tab', 'document_model', 'biograph_model', 'biograph_upload_model', 'right_holder_exists', 'right_holder_model', 'folio_model', 'performer_model', 'producer_model', 'recording_model'));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        try {
            $model = $this->loadModel($id);
            $uploads = $model->recordingSessionBiographies->recordingSessionBiographUploads;
            $model->delete();
            //file remove
            if (!empty($uploads)) {
                foreach ($uploads as $upload) {
                    $path = UPLOAD_DIR . $upload->Rcd_Ses_Biogrph_Upl_File;
                    if (is_file($path))
                        unlink($path);
                }
            }
            //end
            Myclass::addAuditTrail("Deleted RecordingSession successfully.", "cny");
        } catch (CDbException $e) {
            if ($e->errorInfo[1] == 1451) {
                throw new CHttpException(400, Yii::t('err', 'Relation Restriction Error.'));
            } else {
                throw $e;
            }
        }

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax'])) {
            Yii::app()->user->setFlash('success', 'RecordingSession Deleted Successfully!!!');
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/site/recordingsession/index'));
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $search = false;

        $model = new RecordingSession();
        $searchModel = new RecordingSession('search');
        $searchModel->unsetAttributes();  // clear any default values
        if (isset($_GET['RecordingSession'])) {
            $search = true;
            $searchModel->attributes = $_GET['RecordingSession'];
            $searchModel->search();
        }

        $this->render('index', compact('searchModel', 'search', 'model'));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new RecordingSession('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['RecordingSession']))
            $model->attributes = $_GET['RecordingSession'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionSubtitledelete($id) {
        try {
            $model = RecordingSessionSubtitle::model()->findByPk($id);
            $model->delete();
            Myclass::addAuditTrail("Deleted Recording Session Sheet subtitle {$model->Rcd_Ses_Subtitle_Name} successfully.", "file-cny");
        } catch (CDbException $e) {
            if ($e->errorInfo[1] == 1451) {
                throw new CHttpException(400, Yii::t('err', 'Relation Restriction Error.'));
            } else {
                throw $e;
            }
        }

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax'])) {
            Yii::app()->user->setFlash('success', "Deleted Work subtitle {$model->Rcd_Ses_Subtitle_Name} successfully.");
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/site/recordingsession/update', 'id' => $model->rcdSes->Rcd_Ses_Id, 'tab' => 3));
        }
    }

    public function actionBiofiledelete($id) {
        $model = RecordingSessionBiographUploads::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');

        $model->setUploadDirectory(UPLOAD_DIR);
        try {
            $model->delete();
            Myclass::addAuditTrail("Deleted a Biography file from {$model->rcdSesBiogrph->rcdSes->Rcd_Ses_Title} successfully.", "file-cny");
        } catch (CDbException $e) {
            if ($e->errorInfo[1] == 1451) {
                throw new CHttpException(400, Yii::t('err', 'Relation Restriction Error.'));
            } else {
                throw $e;
            }
        }

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax'])) {
            Yii::app()->user->setFlash('success', "Deleted a Biography file from {$model->rcdSesBiogrph->rcdSes->Rcd_Ses_Title} successfully.");
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/site/recordingsession/update', 'id' => $model->rcdSesBiogrph->Rcd_Ses_Id, 'tab' => 4));
        }
    }
    
    public function actionFoliodelete($id) {
        $model = RecordingSessionFolio::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');

        try {
            $model->delete();
            Myclass::addAuditTrail("Deleted a Folio from {$model->rcdSes->Rcd_Ses_Title} successfully.", "file-cny");
        } catch (CDbException $e) {
            if ($e->errorInfo[1] == 1451) {
                throw new CHttpException(400, Yii::t('err', 'Relation Restriction Error.'));
            } else {
                throw $e;
            }
        }

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax'])) {
            Yii::app()->user->setFlash('success', "Deleted a Folio from {$model->rcdSes->Rcd_Ses_Title} successfully.");
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/site/recordingsession/update', 'id' => $model->Rcd_Ses_Id, 'tab' => 6));
        }
    }
    
    public function actionInsertright() {
        if (isset($_POST['RecordingSessionRightholder']) && !empty($_POST['RecordingSessionRightholder'])) {
            $end = end($_POST['RecordingSessionRightholder']);
            $record_ses_id = $end['Rcd_Ses_Id'];
            
            $created_by = $updated_by = '';
            $created_date = date('Y-m-d H:i:s');
            $updated_by = "0000-00-00 00:00:00";
            $holders = RecordingSessionRightholder::model()->findAllByAttributes(array('Rcd_Ses_Id' => $record_ses_id, 'Rcd_Ses_Right_Work_Type' => $end['Rcd_Ses_Right_Work_Type']));
            if(empty($holders)){
                $created_by = Yii::app()->user->id;
            }else{
                $created_by = $holders[0]->Created_By;
                $created_date = $holders[0]->Created_Date;
                $updated_by = Yii::app()->user->id;
                $updated_date = date('Y-m-d H:i:s');
            }
            
            RecordingSessionRightholder::model()->deleteAllByAttributes(array('Rcd_Ses_Id' => $record_ses_id, 'Rcd_Ses_Right_Work_Type' => $end['Rcd_Ses_Right_Work_Type']));
            $valid = true;
            foreach ($_POST['RecordingSessionRightholder'] as $values) {
                $model = new RecordingSessionRightholder;
                $model->attributes = $values;
                $model->setAttribute('Created_By', $created_by);
                $model->setAttribute('Updated_By', $updated_by);
                $model->setAttribute('Created_Date', $created_date);
                $model->setAttribute('Rowversion', $updated_date);
                $valid = $valid && $model->save(false);
                if ($valid)
                    Myclass::addAuditTrail("Created Right Holder saved for {$model->rcdSes->Rcd_Ses_Title} successfully.", "fa file-cny");
            }

            $folio_exists = RecordingSessionFolio::model()->findByAttributes(array('Rcd_Ses_Id' => $record_ses_id));
            if(!empty($folio_exists)){
                $tab = 5;
                $message = 'RightHolder Saved Successfully';
            }else{
                $tab = 6;
                $message = 'RightHolder Saved Successfully. Please Fill List of Folio!!!';
            }
            if ($valid)
                Yii::app()->user->setFlash('success', $message);
            
            $tab = !empty($folio_exists) ? 5 : 6;
            $this->redirect(array('/site/recordingsession/update', 'id' => $model->Rcd_Ses_Id, 'tab' => $tab));
        }
        exit;
    }
    
    public function actionNewrecording() {
        $ret = array();
        if (isset($_POST['Recording'])) {
            $model = new Recording;
            $model->attributes = $_POST['Recording'];

            if ($model->validate()) {
                if ($model->save()) {
                    Myclass::addAuditTrail("Created Recording {$model->Rcd_Title} successfully.", "volume-up");
                    $ret = array(
                        'sts' => 'success',
                        'id' => $model->Rcd_Id,
                        'title' => $model->Rcd_Title,
                        'int_code' => $model->Rcd_Internal_Code,
                        'guid' => $model->Rcd_GUID,
                        'role' => 'RC',
                        'new_int_code' => InternalcodeGenerate::model()->find("Gen_User_Type = :type",array(':type' => InternalcodeGenerate::RECORDING_CODE))->Fullcode
                    );
                }
            } else {
                $ret = array(
                    'sts' => 'fail',
                );
            }
        }
        echo json_encode($ret);
    }
    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return RecordingSession the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = RecordingSession::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param RecordingSession $model the model to be validated
     */
    protected function performAjaxValidation($model) {
if (isset($_POST['ajax']) && ($_POST['ajax'] === 'recording-session-form' || $_POST['ajax'] === 'rcd-ses-subtitle-form' || $_POST['ajax'] === 'recordingsession-documentation-form' || $_POST['ajax'] === 'recordingsession-biography-form' || $_POST['ajax'] === 'session-rightholder-form-2' || $_POST['ajax'] === 'recording-session-folio-form' || $_POST['ajax'] === 'performer-account-form' || $_POST['ajax'] === 'producer-account-form' || $_POST['ajax'] === 'recording-form')) {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
