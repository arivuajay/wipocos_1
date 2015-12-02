<?php

class RecordingController extends Controller {
    /**
     *
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    /**/

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
                    'insertright', 'linkdelete', 'getrecordingdetails', 'newperformer', 'newproducer'),
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

        if (isset($_GET['Recording'])) {
            $model->attributes = $_GET['Recording'];
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

        $author_model = new AuthorAccount;
        $publisher_model = new PublisherAccount;
        $performer_model = new PerformerAccount;
        $producer_model = new ProducerAccount;

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation(array($model, $sub_title_model, $publication_model, $right_holder_model, $link_model, $author_model, $publisher_model, $performer_model, $producer_model));

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

        $this->render('update', compact('model', 'sub_title_model', 'tab', 'publication_model', 'right_holder_model', 'link_model', 'right_holder_exists', 'author_model', 'publisher_model', 'performer_model', 'producer_model'));
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
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Recording $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && (
                $_POST['ajax'] === 'recording-form' || $_POST['ajax'] === 'recording-subtitle-form' || $_POST['ajax'] === 'recording-publication-form' || $_POST['ajax'] === 'recording-rightholder-form' || $_POST['ajax'] === 'recording-link-form' || $_POST['ajax'] === 'author-account-form' || $_POST['ajax'] === 'publisher-account-form' || $_POST['ajax'] === 'performer-account-form' || $_POST['ajax'] === 'producer-account-form'
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
        $autcriteria = new CDbCriteria();
        $pubcriteria = new CDbCriteria();

        if (!empty($_REQUEST['searach_text'])) {
            $search_txt = $_REQUEST['searach_text'];
            $autcriteria->compare('Auth_Sur_Name', $search_txt, true, 'OR');
            $autcriteria->compare('Auth_First_Name', $search_txt, true, 'OR');
            $autcriteria->compare('Auth_Internal_Code', $search_txt, true, 'OR');
            $autcriteria->compare('Auth_Ipi', $search_txt, true, 'OR');
            $autcriteria->compare('Auth_Ipi_Base_Number', $search_txt, true, 'OR');
            $autcriteria->compare('authorPseudonyms.Auth_Pseudo_Name', $search_txt, true, 'OR');

            $pubcriteria->compare('Pub_Corporate_Name', $search_txt, true, 'OR');
            $pubcriteria->compare('Pub_Internal_Code', $search_txt, true, 'OR');
            $pubcriteria->compare('Pub_Ipi', $search_txt, true, 'OR');
            $pubcriteria->compare('Pub_Ipi_Base_Number', $search_txt, true, 'OR');
            $pubcriteria->compare('publisherPseudonyms.Pub_Pseudo_Name', $search_txt, true, 'OR');

            $criteria->compare('Perf_Sur_Name', $search_txt, true, 'OR');
            $criteria->compare('Perf_First_Name', $search_txt, true, 'OR');
            $criteria->compare('Perf_Internal_Code', $search_txt, true, 'OR');
            $criteria->compare('Perf_Ipi', $search_txt, true, 'OR');
            $criteria->compare('Perf_Ipi_Base_Number', $search_txt, true, 'OR');
            $criteria->compare('performerPseudonyms.Perf_Pseudo_Name', $search_txt, true, 'OR');

            $procriteria->compare('Pro_Corporate_Name', $search_txt, true, 'OR');
            $procriteria->compare('Pro_Internal_Code', $search_txt, true, 'OR');
            $procriteria->compare('Pro_Ipi', $search_txt, true, 'OR');
            $procriteria->compare('Pro_Ipi_Base_Number', $search_txt, true, 'OR');
            $procriteria->compare('Pro_Ipi_Base_Number', $search_txt, true, 'OR');
            $procriteria->compare('producerPseudonyms.Pro_Pseudo_Name', $search_txt, true, 'OR');
        }

        if ($_REQUEST['is_perf'] == '1') {
            $perfusers = PerformerAccount::model()->with(array('performerRelatedRights', 'performerPseudonyms'))->isStatusActive()->findAll($criteria);
        }
        if ($_REQUEST['is_prod'] == '1') {
            $produsers = ProducerAccount::model()->with(array('producerRelatedRights', 'producerPseudonyms'))->isStatusActive()->findAll($procriteria);
        }
        if ($_REQUEST['is_auth'] == '1') {
            $authusers = AuthorAccount::model()->with(array('authorManageRights', 'authorPseudonyms'))->isStatusActive()->findAll($autcriteria);
        }
        if ($_REQUEST['is_publ'] == '1') {
            $publusers = PublisherAccount::model()->with(array('publisherPseudonyms', 'publisherManageRights'))->isStatusActive()->findAll($pubcriteria);
        }

        $this->renderPartial('_search_right', compact('authusers', 'publusers','perfusers', 'produsers'));
    }

    public function actionInsertright() {
        if (isset($_POST['RecordingRightholder']) && !empty($_POST['RecordingRightholder'])) {
            $end = end($_POST['RecordingRightholder']);
            $rcd_id = $end['Rcd_Id'];

            $created_by = $updated_by = '';
            $created_date = date('Y-m-d H:i:s');
            $updated_by = "0000-00-00 00:00:00";
            $holders = RecordingRightholder::model()->findAllByAttributes(array('Rcd_Id' => $rcd_id));
            if (empty($holders)) {
                $created_by = Yii::app()->user->id;
            } else {
                $created_by = $holders[0]->Created_By;
                $created_date = $holders[0]->Created_Date;
                $updated_by = Yii::app()->user->id;
                $updated_date = date('Y-m-d H:i:s');
            }

            RecordingRightholder::model()->deleteAllByAttributes(array('Rcd_Id' => $rcd_id));
            $valid = true;
            foreach ($_POST['RecordingRightholder'] as $values) {
                $model = new RecordingRightholder;
                $model->attributes = $values;
                $model->setAttribute('Created_By', $created_by);
                $model->setAttribute('Updated_By', $updated_by);
                $model->setAttribute('Created_Date', $created_date);
                $model->setAttribute('Rowversion', $updated_date);
                $valid = $valid && $model->save(false);
                if ($valid)
                    Myclass::addAuditTrail("Created Right Holder saved for {$model->rcd->Rcd_Title} successfully.", "fa fa-at");
            }
            if ($valid)
                Yii::app()->user->setFlash('success', 'RightHolder Saved Successfully!!!');
            $this->redirect(array('/site/recording/update', 'id' => $model->Rcd_Id, 'tab' => 4));
        }
    }

    public function actionNewperformer() {
        $ret = array();
        if (isset($_POST['PerformerAccount'])) {
            $model = new PerformerAccount;
            $model->attributes = $_POST['PerformerAccount'];

            if ($model->validate()) {
                if ($model->save()) {
                    Myclass::addAuditTrail("Created Performer {$model->Perf_First_Name} {$model->Perf_Sur_Name} successfully.", "music");
                    $ret = array(
                        'sts' => 'success',
                        'id' => $model->Perf_Acc_Id,
                        'first_name' => $model->Perf_First_Name,
                        'last_name' => $model->Perf_Sur_Name,
                        'name' => trim($model->Perf_First_Name . " " . $model->Perf_Sur_Name),
                        'int_code' => $model->Perf_Internal_Code,
                        'uid' => $model->Perf_GUID,
                        'new_int_code' => InternalcodeGenerate::model()->find("Gen_User_Type = :type", array(':type' => InternalcodeGenerate::PERFORMER_CODE))->Fullcode
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

    public function actionNewproducer() {
        $ret = array();
        if (isset($_POST['ProducerAccount'])) {
            $model = new ProducerAccount;
            $model->attributes = $_POST['ProducerAccount'];

            if ($model->validate()) {
                if ($model->save()) {
                    Myclass::addAuditTrail("Created Producer {$model->Pro_Corporate_Name} successfully.", "music");
                    $ret = array(
                        'sts' => 'success',
                        'id' => $model->Pro_Acc_Id,
                        'corporate_name' => $model->Pro_Corporate_Name,
                        'ipi_base_number' => $model->Pro_Ipi_Base_Number,
                        'int_code' => $model->Pro_Internal_Code,
                        'uid' => $model->Pro_GUID,
                        'new_int_code' => InternalcodeGenerate::model()->find("Gen_User_Type = :type", array(':type' => InternalcodeGenerate::PRODUCER_CODE))->Fullcode
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

}
