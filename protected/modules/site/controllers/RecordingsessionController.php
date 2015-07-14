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
                'actions' => array('index', 'view', 'create', 'update', 'admin', 'delete', 'pdf', 'download', 'subtitledelete', 'biofiledelete'),
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
        
        $export = isset($_REQUEST['export']) && $_REQUEST['export'] == 'PDF';
        $compact = compact('model', 'export', 'sub_title_model', 'biograph_model', 'document_model');
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

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['RecordingSession'])) {
            $model->attributes = $_POST['RecordingSession'];
            if ($model->save()) {
                Myclass::addAuditTrail("Created RecordingSession successfully.", "user");
                Yii::app()->user->setFlash('success', 'RecordingSession Created Successfully!!!');
                $this->redirect(array('/site/recordingsession/index'));
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
        $sub_title_model = $edit == NULL ? new RecordingSessionSubtitle : RecordingSessionSubtitle::model()->findByAttributes(array('Rcd_Ses_Subtitle_Id' => $edit));

        $document_exists = RecordingSessionDocumentation::model()->findByAttributes(array('Rcd_Ses_Id' => $id));
        $document_model = empty($document_exists) ? new RecordingSessionDocumentation : $document_exists;
        
        $biograph_exists = RecordingSessionBiography::model()->findByAttributes(array('Rcd_Ses_Id' => $id));
        $biograph_model = empty($biograph_exists) ? new RecordingSessionBiography : $biograph_exists;
        
        $biograph_upload_model = new RecordingSessionBiographUploads;
        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation(array($model, $sub_title_model, $document_model, $biograph_model));

        if (isset($_POST['RecordingSession'])) {
            $model->attributes = $_POST['RecordingSession'];
            if ($model->save()) {
                Myclass::addAuditTrail("Updated RecordingSession successfully.", "user");
                Yii::app()->user->setFlash('success', 'RecordingSession Updated Successfully!!!');
                $this->redirect(array('/site/recordingsession/index'));
            }
        } elseif (isset($_POST['RecordingSessionSubtitle'])) {
            $sub_title_model->attributes = $_POST['RecordingSessionSubtitle'];
            if ($sub_title_model->save()) {
                Myclass::addAuditTrail("Saved RecordingSession Subtitle successfully.", "file-audio-o");
                Yii::app()->user->setFlash('success', 'Recording Session Subtitle Saved Successfully!!!');
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

                Myclass::addAuditTrail("Saved Recording Session Biography successfully.", "file-audio-o");
                Yii::app()->user->setFlash('success', 'Recording Session Biography Saved Successfully!!!');
                $this->redirect(array('/site/recordingsession/update', 'id' => $model->Rcd_Ses_Id, 'tab' => 4));
            }
        } elseif (isset($_POST['RecordingSessionDocumentation'])) {
            $document_model->attributes = $_POST['RecordingSessionDocumentation'];
            if ($document_model->save()) {
                Myclass::addAuditTrail("Updated RecordingSession Documentation successfully.", "file-audio-o");
                Yii::app()->user->setFlash('success', 'Recording Session Documentation Updated Successfully!!!');
                $doc_tab = 2;
//                if(empty($right_holder_exists_1) || empty($right_holder_exists_1))
//                    $doc_tab = 7;
                $this->redirect(array('/site/recordingsession/update', 'tab' => $doc_tab, 'id' => $model->Rcd_Ses_Id));
            }
        }

        $this->render('update', compact('model', 'sub_title_model', 'tab', 'document_model', 'biograph_model', 'biograph_upload_model'));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        try {
            $model = $this->loadModel($id);
            $model->delete();
            Myclass::addAuditTrail("Deleted RecordingSession successfully.", "user");
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
            Myclass::addAuditTrail("Deleted Recording Session subtitle {$model->Rcd_Ses_Subtitle_Name} successfully.", "file-audio-o");
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
        $bio_id = $model->Rcd_Ses_Biogrph_Id;

        $model->setUploadDirectory(UPLOAD_DIR);
        try {
            $model->delete();
            Myclass::addAuditTrail("Deleted a Biography file from {$model->rcdSesBiogrph->rcdSes->Rcd_Ses_Title} successfully.", "file-audio-o");
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
        if (isset($_POST['ajax']) && ($_POST['ajax'] === 'recording-session-form' || $_POST['ajax'] === 'rcd-ses-subtitle-form' || $_POST['ajax'] === 'recordingsession-documentation-form' || $_POST['ajax'] === 'recordingsession-biography-form')) {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
