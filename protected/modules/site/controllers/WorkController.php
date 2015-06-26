<?php

class WorkController extends Controller {
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
                'actions' => array('index', 'view', 'create', 'update', 'admin', 'delete', 'holderremove', 'insertright',
                    'searchright', 'print', 'pdf', 'subtitledelete', 'download', 'filedelete', 'contractexpiry'),
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
        $sub_title_model = WorkSubtitle::model()->findAllByAttributes(array('Work_Id' => $id));
        $biograph_model = WorkBiography::model()->findByAttributes(array('Work_Id' => $id));
        $document_model = WorkDocumentation::model()->findByAttributes(array('Work_Id' => $id));
        $publishing_model = WorkPublishing::model()->findByAttributes(array('Work_Id' => $id));
        $sub_publishing_model = WorkSubPublishing::model()->findByAttributes(array('Work_Id' => $id));
        $members = WorkRightholder::model()->findAll('Work_Id = :int_code', array(':int_code' => $model->Work_Id));

        $export = isset($_REQUEST['export']) && $_REQUEST['export'] == 'PDF';
        $compact = compact('model', 'sub_title_model', 'biograph_model', 'document_model', 'publishing_model', 'sub_publishing_model', 'members', 'export');
        if ($export) {
            $mPDF1 = Yii::app()->ePdf->mpdf();
            $stylesheet = $this->pdfStyles();
            $mPDF1->WriteHTML($stylesheet, 1);
            $mPDF1->WriteHTML($this->renderPartial('view', $compact, true));
            $mPDF1->Output("Work_view_$id.pdf", EYiiPdf::OUTPUT_TO_DOWNLOAD);
        } else {
            $this->render('view', $compact);
        }
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Work;

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['Work'])) {
            $model->attributes = $_POST['Work'];
            if ($model->save()) {
//                $model->save(false);
                Myclass::addAuditTrail("Created Work successfully.", "sliders");
                if ($model->Work_Unknown == 'N') {
                    $message = 'Work Created Successfully. Please Fill Doucmentation!!!';
                    $tab = 4;
                } else {
                    $message = 'Work Created Successfully.';
                    $tab = 1;
                }
                Yii::app()->user->setFlash('success', $message);
                $this->redirect(array('/site/work/update', 'id' => $model->Work_Id, 'tab' => $tab));
            }
        }

        $this->render('create', array(
            'model' => $model,
            'tab' => 1,
            'focus' => '',
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id, $tab = 1, $edit = NULL, $fileedit = NULL, $umodel = NULL) {
        $model = $this->loadModel($id);
        $sub_title_model = $edit == NULL ? new WorkSubtitle : WorkSubtitle::model()->findByAttributes(array('Work_Subtitle_Id' => $edit));

        $biograph_exists = WorkBiography::model()->findByAttributes(array('Work_Id' => $id));
        $biograph_model = empty($biograph_exists) ? new WorkBiography : $biograph_exists;

        $document_exists = WorkDocumentation::model()->findByAttributes(array('Work_Id' => $id));
        $document_model = empty($document_exists) ? new WorkDocumentation : $document_exists;

        $publishing_exists = WorkPublishing::model()->findByAttributes(array('Work_Id' => $id));
        $publishing_model = empty($publishing_exists) ? new WorkPublishing : $publishing_exists;

        $sub_publishing_exists = WorkSubPublishing::model()->findByAttributes(array('Work_Id' => $id));
        $sub_publishing_model = empty($sub_publishing_exists) ? new WorkSubPublishing : $sub_publishing_exists;

        $right_holder_exists = WorkRightholder::model()->findAllByAttributes(array('Work_Id' => $id));
        $right_holder_model = new WorkRightholder;

        $publishing_upload_model = new WorkPublishingUploads('create');
        if ($fileedit != NULL && $umodel == 'pub') {
            $publishing_upload_exists = WorkPublishingUploads::model()->findByPk($fileedit);
            $publishing_upload_model = empty($publishing_upload_exists) ? new WorkPublishingUploads('create') : $publishing_upload_exists;
        }

        $sub_publishing_upload_model = new WorkSubPublishingUploads('create');
        if ($fileedit != NULL && $umodel == 'sub') {
            $sub_publishing_upload_exists = WorkSubPublishingUploads::model()->findByPk($fileedit);
            $sub_publishing_upload_model = empty($sub_publishing_upload_exists) ? new WorkSubPublishingUploads('create') : $sub_publishing_upload_exists;
        }

        $focus = 'publisher_contactform';
        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation(array($model, $sub_title_model, $biograph_model, $document_model, $publishing_model,
            $sub_publishing_model, $right_holder_model, $publishing_upload_model, $sub_publishing_upload_model));

        if (isset($_POST['Work'])) {
            $model->attributes = $_POST['Work'];
            if ($model->save()) {
                Myclass::addAuditTrail("Updated Work successfully.", "sliders");
                Yii::app()->user->setFlash('success', 'Work Updated Successfully!!!');
                $this->redirect(array('/site/work/update', 'id' => $model->Work_Id, 'tab' => '1'));
            }
        } elseif (isset($_POST['WorkSubtitle'])) {
            $sub_title_model->attributes = $_POST['WorkSubtitle'];
            if ($sub_title_model->save()) {
                Myclass::addAuditTrail("Saved Work Subtitle successfully.", "sliders");
                Yii::app()->user->setFlash('success', 'Work Subtitle Saved Successfully!!!');
                $this->redirect(array('/site/work/update', 'id' => $model->Work_Id, 'tab' => '2'));
            }
        } elseif (isset($_POST['WorkBiography'])) {
            $biograph_model->attributes = $_POST['WorkBiography'];
            if ($biograph_model->save()) {
                Myclass::addAuditTrail("Saved Work Biography successfully.", "sliders");
                Yii::app()->user->setFlash('success', 'Work Biography Saved Successfully!!!');
                $this->redirect(array('/site/work/update', 'id' => $model->Work_Id, 'tab' => '3'));
            }
        } elseif (isset($_POST['WorkDocumentation'])) {
            $document_model->attributes = $_POST['WorkDocumentation'];
            if ($document_model->save()) {
                Myclass::addAuditTrail("Saved Work Documentation successfully.", "sliders");
                if (empty($document_exists)) {
                    if ($model->Work_Unknown == 'N') {
                        $message = 'Work Documentation Saved Successfully. Please Fill Right Holders!!!';
                        $tab = 7;
                    } else {
                        $message = 'Work Documentation Saved Successfully.';
                        $tab = 4;
                    }
                    Yii::app()->user->setFlash('success', $message);
                    $this->redirect(array('/site/work/update', 'id' => $model->Work_Id, 'tab' => $tab));
                } else {
                    Yii::app()->user->setFlash('success', 'Work Documentation Saved Successfully.');
                    $this->redirect(array('/site/work/update', 'id' => $model->Work_Id, 'tab' => '4'));
                }
            }
        } elseif (isset($_POST['WorkPublishing'])) {
            $publishing_model->attributes = $_POST['WorkPublishing'];
            if ($publishing_model->Work_Pub_Contact_End == date('Y-m-d') && $publishing_model->Work_Pub_Tacit == 'Y') {
                $publishing_model->Work_Pub_Contact_End = date("Y-m-d", strtotime(date("Y-m-d", strtotime($publishing_model->Work_Pub_Contact_End)) . " + {$publishing_model->Work_Pub_Renewal_Period} years"));
            }
            if ($publishing_model->save()) {
                Myclass::addAuditTrail("Saved Work Publishing successfully.", "sliders");
                Yii::app()->user->setFlash('success', 'Work Publishing Saved Successfully!!!');
                $this->redirect(array('/site/work/update', 'id' => $model->Work_Id, 'tab' => '5'));
            }
        } elseif (isset($_POST['WorkSubPublishing'])) {
            $sub_publishing_model->attributes = $_POST['WorkSubPublishing'];
            if ($sub_publishing_model->Work_Sub_Contact_End == date('Y-m-d') && $sub_publishing_model->Work_Sub_Tacit == 'Y') {
                $sub_publishing_model->Work_Sub_Contact_End = date("Y-m-d", strtotime(date("Y-m-d", strtotime($sub_publishing_model->Work_Sub_Contact_End)) . " + {$sub_publishing_model->Work_Sub_Renewal_Period} years"));
            }
            if ($sub_publishing_model->save()) {
                Myclass::addAuditTrail("Saved Work Sub Publishing successfully.", "sliders");
                Yii::app()->user->setFlash('success', 'Work Sub Publishing Saved Successfully!!!');
                $this->redirect(array('/site/work/update', 'id' => $model->Work_Id, 'tab' => '6'));
            }
        } elseif (isset($_POST['WorkRightholder'])) {
            $exist = WorkRightholder::model()->find("Work_Id = :Wid AND Work_Member_Internal_Code = :iCode", array(':Wid' => $_POST['WorkRightholder']['Work_Id'], ':iCode' => $_POST['WorkRightholder']['Work_Member_Internal_Code']));
            if ($exist)
                $right_holder_model = $exist;

            $right_holder_model->attributes = $_POST['WorkRightholder'];

            if ($right_holder_model->save()) {
                Myclass::addAuditTrail("Saved Work right holder successfully.", "sliders");
                Yii::app()->user->setFlash('success', 'Work right holder Saved Successfully!!!');
                $this->redirect(array('/site/work/update', 'id' => $model->Work_Id, 'tab' => '7'));
            }
        } elseif (isset($_POST['WorkPublishingUploads'])) {
            $publishing_upload_model->attributes = $_POST['WorkPublishingUploads'];
            if ($fileedit == NULL) {
                $publishing_upload_model->setAttribute('Work_Pub_Upl_File', isset($_FILES['WorkPublishingUploads']['name']['Work_Pub_Upl_File']) ? $_FILES['WorkPublishingUploads']['name']['Work_Pub_Upl_File'] : '');
            }

            if ($publishing_upload_model->validate()) {
                $publishing_upload_model->setUploadDirectory(UPLOAD_DIR);
                $publishing_upload_model->uploadFile();
                if ($publishing_upload_model->save()) {
                    Myclass::addAuditTrail("{$model->Work_Org_Title}  Publishing Contract Uploaded successfully.", "sliders");
                    Yii::app()->user->setFlash('success', 'Publishing Contract uploaded Successfully!!!');
                    $this->redirect(array('/site/work/update', 'id' => $model->Work_Id, 'tab' => '5'));
                }
            } else {
                $tab = '5';
                $focus = 'contractForm';
            }
        } elseif (isset($_POST['WorkSubPublishingUploads'])) {
            $sub_publishing_upload_model->attributes = $_POST['WorkSubPublishingUploads'];
            if ($fileedit == NULL) {
                $sub_publishing_upload_model->setAttribute('Work_Sub_Upl_File', isset($_FILES['WorkPublishingUploads']['name']['Work_Sub_Upl_File']) ? $_FILES['WorkPublishingUploads']['name']['Work_Sub_Upl_File'] : '');
            }

            if ($sub_publishing_upload_model->validate()) {
                $sub_publishing_upload_model->setUploadDirectory(UPLOAD_DIR);
                $sub_publishing_upload_model->uploadFile();
                if ($sub_publishing_upload_model->save()) {
                    Myclass::addAuditTrail("{$model->Work_Org_Title}  Sub Publishing Contract Uploaded successfully.", "sliders");
                    Yii::app()->user->setFlash('success', 'Sub Publishing Contract uploaded Successfully!!!');
                    $this->redirect(array('/site/work/update', 'id' => $model->Work_Id, 'tab' => '6'));
                }
            } else {
                $tab = '6';
            }
        }

        $publish_validate = $sub_publish_validate = false;
        if (!empty($right_holder_exists)) {
            $ids = array();
            foreach ($right_holder_exists as $right_holder_exist) {
                $ids[$right_holder_exist->Work_Member_GUID] = $right_holder_exist->Work_Member_GUID;
            }
            $rgt_hold = new WorkRightholder();
            $main_publisher = $rgt_hold->getMainPublisher($model->Work_Id);
            $sub_publisher = $rgt_hold->getSubPublisher($model->Work_Id);

            $count = PublisherAccount::model()->countByAttributes(array('Pub_GUID' => $ids));
            if ($main_publisher && $publishing_model->isNewRecord) {
                $publish_validate = true;
                $tab = 5;
            } else if ($sub_publisher && $sub_publishing_model->isNewRecord) {
                $sub_publish_validate = true;
                $tab = 6;
            }
        }


        $this->render('update', compact('model', 'sub_title_model', 'tab', 'biograph_model', 'document_model', 'publishing_model', 'sub_publishing_model', 'right_holder_model', 'right_holder_exists', 'publish_validate', 'sub_publish_validate', 'sub_publisher', 'main_publisher', 'publishing_upload_model', 'sub_publishing_upload_model', 'focus'));
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
            Myclass::addAuditTrail("Deleted Work successfully.", "sliders");
        } catch (CDbException $e) {
            if ($e->errorInfo[1] == 1451) {
                throw new CHttpException(400, Yii::t('err', 'Relation Restriction Error.'));
            } else {
                throw $e;
            }
        }

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax'])) {
            Yii::app()->user->setFlash('success', 'Work Deleted Successfully!!!');
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
        }
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionHolderremove($id) {
        try {
            $model = $this->loadRightholderModel($id);
            $model->delete();
            Myclass::addAuditTrail("Deleted RightHolder {$model->Work_Member_Internal_Code} at work {$model->work->Work_Org_Title}.", "sliders");
        } catch (CDbException $e) {
            if ($e->errorInfo[1] == 1451) {
                throw new CHttpException(400, Yii::t('err', 'Relation Restriction Error.'));
            } else {
                throw $e;
            }
        }

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax'])) {
            Yii::app()->user->setFlash('success', 'RightHolder Deleted Successfully!!!');
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/site/work/update', 'id' => $model->Work_Id, 'tab' => '7'));
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $search = false;

        $model = new Work();
        $searchModel = new Work('search');
        $searchModel->unsetAttributes();  // clear any default values
        if (isset($_GET['Work'])) {
            $search = true;
            $searchModel->attributes = $_GET['Work'];
            $searchModel->search();
        }

        $this->render('index', compact('searchModel', 'search', 'model'));
    }

    public function actionContractexpiry() {
//        $model = new Work;
        $model = WorkPublishing::model()->expiry()->findAll();
        $this->render('contractexpiry', compact('model'));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Work('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Work']))
            $model->attributes = $_GET['Work'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Work the loaded model
     * @throws CHttpException
     */
    public function loadRightholderModel($id) {
        $model = WorkRightholder::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');

        return $model;
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Work the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Work::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        $model->setDuration();
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Work $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && (
                $_POST['ajax'] === 'work-form' || $_POST['ajax'] === 'work-subtitle-form' || $_POST['ajax'] === 'work-biography-form' || $_POST['ajax'] === 'work-documentation-form' || $_POST['ajax'] === 'work-publishing-form' || $_POST['ajax'] === 'work-sub-publishing-form' || $_POST['ajax'] === 'publishing-upload-form' || $_POST['ajax'] === 'sub-publishing-upload-form' || $_POST['ajax'] === 'work-rightholder-form'
                )) {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionInsertright() {
        if (isset($_POST['WorkRightholder']) && !empty($_POST['WorkRightholder'])) {
            $end = end($_POST['WorkRightholder']);
            $work_id = $end['Work_Id'];
            WorkRightholder::model()->deleteAllByAttributes(array('Work_Id' => $work_id));
            $valid = true;
            foreach ($_POST['WorkRightholder'] as $values) {
                $model = new WorkRightholder;
                $model->attributes = $values;
                $valid = $valid && $model->save(false);
                if ($valid)
                    Myclass::addAuditTrail("Created Right Holder saved for {$model->work->Work_Org_Title} successfully.", "fa fa-at");
            }
            if ($valid)
                Yii::app()->user->setFlash('success', 'RightHolder Saved Successfully!!!');
            $this->redirect(array('/site/work/update', 'id' => $model->Work_Id, 'tab' => 7));
        }
    }

    public function actionSearchright() {
        $criteria = new CDbCriteria();
        $pubcriteria = new CDbCriteria();
        if (!empty($_REQUEST['searach_text'])) {
            $search_txt = $_REQUEST['searach_text'];
            $criteria->compare('Auth_Sur_Name', $search_txt, true, 'OR');
            $criteria->compare('Auth_First_Name', $search_txt, true, 'OR');
            $criteria->compare('Auth_Internal_Code', $search_txt, true, 'OR');
            $criteria->compare('Auth_Ipi', $search_txt, true, 'OR');
            $criteria->compare('Auth_Ipi_Base_Number', $search_txt, true, 'OR');

            $pubcriteria->compare('Pub_Corporate_Name', $search_txt, true, 'OR');
            $pubcriteria->compare('Pub_Internal_Code', $search_txt, true, 'OR');
            $pubcriteria->compare('Pub_Ipi', $search_txt, true, 'OR');
            $pubcriteria->compare('Pub_Ipi_Base_Number', $search_txt, true, 'OR');
        }

        if ($_REQUEST['is_auth'] == '1') {
            $authusers = AuthorAccount::model()->with('authorManageRights')->isStatusActive()->findAll($criteria);
        }
        if ($_REQUEST['is_publ'] == '1') {
            $publusers = PublisherAccount::model()->with('publisherManageRights')->isStatusActive()->findAll($pubcriteria);
        }
        $this->renderPartial('_search_right', compact('authusers', 'publusers'));
    }

    public function actionSubtitledelete($id) {
        try {
            $model = WorkSubtitle::model()->findByPk($id);
            $model->delete();
            Myclass::addAuditTrail("Deleted Work subtitle {$model->Work_Subtitle_Name} successfully.", "sliders");
        } catch (CDbException $e) {
            if ($e->errorInfo[1] == 1451) {
                throw new CHttpException(400, Yii::t('err', 'Relation Restriction Error.'));
            } else {
                throw $e;
            }
        }

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax'])) {
            Yii::app()->user->setFlash('success', "Deleted Work subtitle {$model->Work_Subtitle_Name} successfully.");
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/site/work/update', 'id' => $model->work->Work_Id, 'tab' => 2));
        }
    }

    public function actionFiledelete($id, $delete_model, $rel_model, $tab) {
        $model = $delete_model::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        $work_id = $model->$rel_model->Work_Id;

        $model->setUploadDirectory(UPLOAD_DIR);
        try {
            $model->delete();
            Myclass::addAuditTrail("Deleted a file {$model->$rel_model->work->Work_Org_Title} successfully.", "sliders");
        } catch (CDbException $e) {
            if ($e->errorInfo[1] == 1451) {
                throw new CHttpException(400, Yii::t('err', 'Relation Restriction Error.'));
            } else {
                throw $e;
            }
        }

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax'])) {
            Yii::app()->user->setFlash('success', 'Uploaded file Deleted Successfully!!!');
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/site/work/update', 'id' => $work_id, 'tab' => $tab));
        }
    }

}
