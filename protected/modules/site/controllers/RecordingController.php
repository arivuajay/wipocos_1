<?php

class RecordingController extends Controller {
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
                'actions' => array('index', 'view', 'create', 'update', 'admin', 'delete', 'subtitledelete', 'searchright',
                    'insertright', 'linkdelete'),
                'expression'=> 'UserIdentity::checkAccess()',
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
        $sub_title_model = RecordingSubtitle::model()->findAllByAttributes(array('Rcd_Id' => $id));
        $publication_model = RecordingPublication::model()->findByAttributes(array('Rcd_Id' => $id));
        $members = RecordingRightholder::model()->findAllByAttributes(array('Rcd_Id' => $id));
        $links = RecordingLink::model()->findAllByAttributes(array('Rcd_Id' => $id));

        $export = isset($_REQUEST['export']) && $_REQUEST['export'] == 'PDF';
        $compact = compact('model', 'export', 'sub_title_model', 'publication_model', 'members', 'links');
        if ($export) {
            $mPDF1 = Yii::app()->ePdf->mpdf();
            $stylesheet = $this->pdfStyles();
            $mPDF1->WriteHTML($stylesheet, 1);
            $mPDF1->WriteHTML($this->renderPartial('view', $compact, true));
            $mPDF1->Output("Recording_view_{$id}.pdf", EYiiPdf::OUTPUT_TO_DOWNLOAD);
        } else {
            $this->render('view', $compact);
        }
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Recording;

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['Recording'])) {
            $model->attributes = $_POST['Recording'];
            if ($model->save()) {
                Myclass::addAuditTrail("Created Recording successfully.", "volume-up");
                Yii::app()->user->setFlash('success', 'Recording Created Successfully!!! Please Fill Rightholders');
                $this->redirect(array('/site/recording/update', 'id' => $model->Rcd_Id, 'tab' => '4'));
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
    public function actionUpdate($id, $tab = 1, $edit = NULL, $edit_link = NULL) {
        $model = $this->loadModel($id);
        $sub_title_model = $edit == NULL ? new RecordingSubtitle : RecordingSubtitle::model()->findByAttributes(array('Rcd_Subtitle_Id' => $edit));

        $publication_exists = RecordingPublication::model()->findByAttributes(array('Rcd_Id' => $id));
        $publication_model = empty($publication_exists) ? new RecordingPublication : $publication_exists;

        $right_holder_exists = RecordingRightholder::model()->findAllByAttributes(array('Rcd_Id' => $id));
        $right_holder_model = new RecordingRightholder;

        $link_model = $edit_link == NULL ? new RecordingLink : RecordingLink::model()->findByAttributes(array('Rcd_Link_Id' => $edit_link));

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation(array($model, $sub_title_model, $publication_model, $right_holder_model, $link_model));

        if (isset($_POST['Recording'])) {
            $model->attributes = $_POST['Recording'];
            if ($model->save()) {
                Myclass::addAuditTrail("Updated Recording successfully.", "volume-up");
                Yii::app()->user->setFlash('success', 'Recording Updated Successfully!!!');
                $this->redirect(array('/site/recording/update', 'id' => $model->Rcd_Id, 'tab' => '1'));
            }
        } elseif (isset($_POST['RecordingSubtitle'])) {
            $sub_title_model->attributes = $_POST['RecordingSubtitle'];
            if ($sub_title_model->save()) {
                Myclass::addAuditTrail("Saved Recording Subtitle successfully.", "volume-up");
                Yii::app()->user->setFlash('success', 'Recording Subtitle Saved Successfully!!!');
                $this->redirect(array('/site/recording/update', 'id' => $model->Rcd_Id, 'tab' => '2'));
            }
        } elseif (isset($_POST['RecordingPublication'])) {
            $publication_model->attributes = $_POST['RecordingPublication'];
            if ($publication_model->save()) {
                Myclass::addAuditTrail("Saved Recording Publication successfully.", "volume-up");
                Yii::app()->user->setFlash('success', 'Recording Publication Saved Successfully!!!');
                $this->redirect(array('/site/recording/update', 'id' => $model->Rcd_Id, 'tab' => '3'));
            }
        } elseif (isset($_POST['RecordingLink'])) {
            $link_model->attributes = $_POST['RecordingLink'];
            if ($link_model->save()) {
                Myclass::addAuditTrail("Saved Recording Artist - Producer successfully.", "volume-up");
                Yii::app()->user->setFlash('success', 'Recording Artist - Producer Saved Successfully!!!');
                $this->redirect(array('/site/recording/update', 'id' => $model->Rcd_Id, 'tab' => '5'));
            }
        }

        $this->render('update', compact('model', 'sub_title_model', 'tab', 'publication_model', 'right_holder_model', 
                'link_model','right_holder_exists'));
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
            Myclass::addAuditTrail("Deleted Recording successfully.", "volume-up");
        } catch (CDbException $e) {
            if ($e->errorInfo[1] == 1451) {
                throw new CHttpException(400, Yii::t('err', 'Relation Restriction Error.'));
            } else {
                throw $e;
            }
        }

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax'])) {
            Yii::app()->user->setFlash('success', 'Recording Deleted Successfully!!!');
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $search = false;

        $model = new Recording();
        $searchModel = new Recording('search');
        $searchModel->unsetAttributes();  // clear any default values
        if (isset($_GET['Recording'])) {
            $search = true;
            $searchModel->attributes = $_GET['Recording'];
            $searchModel->search();
        }

        $this->render('index', compact('searchModel', 'search', 'model'));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Recording('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Recording']))
            $model->attributes = $_GET['Recording'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Recording the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Recording::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        $model->setDuration();
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Recording $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && (
                $_POST['ajax'] === 'recording-form' || $_POST['ajax'] === 'recording-subtitle-form' || $_POST['ajax'] === 'recording-publication-form' || $_POST['ajax'] === 'recording-rightholder-form' || $_POST['ajax'] === 'recording-link-form'
                )) {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionSubtitledelete($id) {
        try {
            $model = RecordingSubtitle::model()->findByPk($id);
            $model->delete();
            Myclass::addAuditTrail("Deleted Recording subtitle {$model->Rcd_Subtitle_Name} successfully.", "volume-up");
        } catch (CDbException $e) {
            if ($e->errorInfo[1] == 1451) {
                throw new CHttpException(400, Yii::t('err', 'Relation Restriction Error.'));
            } else {
                throw $e;
            }
        }

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax'])) {
            Yii::app()->user->setFlash('success', "Deleted Recording subtitle {$model->Rcd_Subtitle_Name} successfully.");
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/site/recording/update', 'id' => $model->rcd->Rcd_Id, 'tab' => 2));
        }
    }

    public function actionLinkdelete($id) {
        try {
            $model = RecordingLink::model()->findByPk($id);
            $model->delete();
            Myclass::addAuditTrail("Deleted Recording Artist - Producer {$model->Rcd_Link_Title} successfully.", "volume-up");
        } catch (CDbException $e) {
            if ($e->errorInfo[1] == 1451) {
                throw new CHttpException(400, Yii::t('err', 'Relation Restriction Error.'));
            } else {
                throw $e;
            }
        }

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax'])) {
            Yii::app()->user->setFlash('success', "Deleted Recording Artist - Producer {$model->Rcd_Link_Title} successfully");
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/site/recording/update', 'id' => $model->rcd->Rcd_Id, 'tab' => 5));
        }
    }

    public function actionSearchright() {
        $criteria = new CDbCriteria();
        $procriteria = new CDbCriteria();
        if (!empty($_REQUEST['searach_text'])) {
            $search_txt = $_REQUEST['searach_text'];
            $criteria->compare('Perf_Sur_Name', $search_txt, true, 'OR');
            $criteria->compare('Perf_First_Name', $search_txt, true, 'OR');
            $criteria->compare('Perf_Internal_Code', $search_txt, true, 'OR');
            $criteria->compare('Perf_Ipi', $search_txt, true, 'OR');
            $criteria->compare('Perf_Ipi_Base_Number', $search_txt, true, 'OR');

            $procriteria->compare('Pro_Corporate_Name', $search_txt, true, 'OR');
            $procriteria->compare('Pro_Internal_Code', $search_txt, true, 'OR');
            $procriteria->compare('Pro_Ipi', $search_txt, true, 'OR');
            $procriteria->compare('Pro_Ipi_Base_Number', $search_txt, true, 'OR');
        }

        if ($_REQUEST['is_perf'] == '1') {
            $perfusers = PerformerAccount::model()->with('performerRelatedRights')->isStatusActive()->findAll($criteria);
        }
        if ($_REQUEST['is_prod'] == '1') {
            $produsers = ProducerAccount::model()->with('producerRelatedRights')->isStatusActive()->findAll($procriteria);
        }
        $this->renderPartial('_search_right', compact('perfusers', 'produsers'));
    }

    public function actionInsertright() {
        if (isset($_POST['RecordingRightholder']) && !empty($_POST['RecordingRightholder'])) {
            $end = end($_POST['RecordingRightholder']);
            $rcd_id = $end['Rcd_Id'];
            RecordingRightholder::model()->deleteAllByAttributes(array('Rcd_Id' => $rcd_id));
            $valid = true;
            foreach ($_POST['RecordingRightholder'] as $values) {
                $model = new RecordingRightholder;
                $model->attributes = $values;
                $valid = $valid && $model->save(false);
                if ($valid)
                    Myclass::addAuditTrail("Created Right Holder saved for {$model->rcd->Rcd_Title} successfully.", "fa fa-at");
            }
            if ($valid)
                Yii::app()->user->setFlash('success', 'RightHolder Saved Successfully!!!');
            $this->redirect(array('/site/recording/update', 'id' => $model->Rcd_Id, 'tab' => 4));
        }
    }

}
