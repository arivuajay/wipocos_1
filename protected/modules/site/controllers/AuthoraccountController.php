<?php

class AuthoraccountController extends Controller {
    /**
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

    public function actions() {
        return array(
            'download' => 'application.components.actions.download',
        );
    }

    public function behaviors() {
        return array(
            'exportableGrid' => array(
                'class' => 'application.components.ExportableGridBehavior',
                'filename' => "Authors_" . time() . ".csv",
//                'csvDelimiter' => ',', //i.e. Excel friendly csv delimiter
        ));
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
                'actions' => array('index', 'view', 'create', 'update', 'admin', 'delete', 'filedelete', 'download', 'biofiledelete', 'memberdelete'),
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
        $address_exists = AuthorAccountAddress::model()->findByAttributes(array('Auth_Acc_Id' => $id));
        $address_model = empty($address_exists) ? array() : $address_exists;

        $payment_exists = AuthorPaymentMethod::model()->findByAttributes(array('Auth_Acc_Id' => $id));
        $payment_model = empty($payment_exists) ? array() : $payment_exists;

        $psedonym_exists = AuthorPseudonym::model()->findByAttributes(array('Auth_Acc_Id' => $id));
        $psedonym_model = empty($psedonym_exists) ? array() : $psedonym_exists;

        $death_exists = AuthorDeathInheritance::model()->findByAttributes(array('Auth_Acc_Id' => $id));
        $death_model = empty($death_exists) ? array() : $death_exists;

        $managed_exists = AuthorManageRights::model()->findByAttributes(array('Auth_Acc_Id' => $id));
        $managed_model = empty($managed_exists) ? array() : $managed_exists;

        $biograph_exists = AuthorBiography::model()->findByAttributes(array('Auth_Acc_Id' => $id));
        $biograph_model = empty($biograph_exists) ? array() : $biograph_exists;

        $export = isset($_REQUEST['export']) && $_REQUEST['export'] == 'PDF';
        $compact = compact('model', 'address_model', 'payment_model', 'psedonym_model', 'death_model', 'managed_model', 'biograph_model', 'export');
        if ($export) {
            $mPDF1 = Yii::app()->ePdf->mpdf();
            $stylesheet = $this->pdfStyles();
            $mPDF1->WriteHTML($stylesheet, 1);
            $mPDF1->WriteHTML($this->renderPartial('view', $compact, true));
            $mPDF1->Output("Author_view_$id.pdf", EYiiPdf::OUTPUT_TO_DOWNLOAD);
        } else {
            $this->render('view', $compact);
        }
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new AuthorAccount;
        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['AuthorAccount'])) {
            $model->attributes = $_POST['AuthorAccount'];
            $model->setAttribute('Auth_DOB', $_POST['AuthorAccount']['Auth_DOB']);
            $model->setAttribute('Auth_Photo', isset($_FILES['AuthorAccount']['name']['Auth_Photo']) ? $_FILES['AuthorAccount']['name']['Auth_Photo'] : '');

            if ($model->validate()) {
                $model->setUploadDirectory(UPLOAD_DIR);
                $model->uploadFile();
                if ($model->save()) {
                    Myclass::addAuditTrail("Created a {$model->Auth_First_Name}  {$model->Auth_Sur_Name} successfully.", "user");
                    if ($model->Auth_Non_Member == 'N') {
                        $message = 'AuthorAccount Created Successfully. Please Fill Managed Rights!!!';
                        $tab = 6;
                    } else {
                        $message = 'AuthorAccount Created Successfully';
                        $tab = 1;
                    }
                    Yii::app()->user->setFlash('success', $message);
                    $this->redirect(array('/site/authoraccount/update', 'id' => $model->Auth_Acc_Id, 'tab' => $tab));
                }
            } else {
                $tab = '1';
            }
        }

        $this->render('create', array(
            'model' => $model,
            'tab' => 1
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id, $tab = 1, $fileedit = NULL) {
        $model = $this->loadModel($id);
        $address_exists = AuthorAccountAddress::model()->findByAttributes(array('Auth_Acc_Id' => $id));
        $address_model = empty($address_exists) ? new AuthorAccountAddress : $address_exists;

        $payment_exists = AuthorPaymentMethod::model()->findByAttributes(array('Auth_Acc_Id' => $id));
        $payment_model = empty($payment_exists) ? new AuthorPaymentMethod : $payment_exists;

        $psedonym_exists = AuthorPseudonym::model()->findByAttributes(array('Auth_Acc_Id' => $id));
        $psedonym_model = empty($psedonym_exists) ? new AuthorPseudonym : $psedonym_exists;

        $death_exists = AuthorDeathInheritance::model()->findByAttributes(array('Auth_Acc_Id' => $id));
        $death_model = empty($death_exists) ? new AuthorDeathInheritance : $death_exists;

        $managed_exists = AuthorManageRights::model()->findByAttributes(array('Auth_Acc_Id' => $id));
        $managed_model = empty($managed_exists) ? new AuthorManageRights : $managed_exists;

        $biograph_exists = AuthorBiography::model()->findByAttributes(array('Auth_Acc_Id' => $id));
        $biograph_model = empty($biograph_exists) ? new AuthorBiography : $biograph_exists;

        $upload_model = new AuthorUpload('create');
        if ($fileedit != NULL) {
            $upload_exists = AuthorUpload::model()->findByPk($fileedit);
            $upload_model = empty($upload_exists) ? new AuthorUpload('create') : $upload_exists;
        }

        $performer_model = AuthorAccount::model()->checkPerformer($model->Auth_Internal_Code, false);
        $related_exists = PerformerRelatedRights::model()->with('perfAcc')->find('perfAcc.Perf_Internal_Code = :int_code', array(':int_code' => $model->Auth_Internal_Code));
        $related_model = empty($related_exists) ? new PerformerRelatedRights : $related_exists;

        $biograph_upload_model = new AuthorBiographUploads;

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation(array(
            $model, $address_model, $payment_model, $psedonym_model, $death_model, $managed_model,
            $biograph_model, $related_model));

        if (isset($_POST['AuthorAccount'])) {
            $model->attributes = $_POST['AuthorAccount'];
            $model->setAttribute('Auth_DOB', $_POST['AuthorAccount']['Auth_DOB']);
            $model->setAttribute('Auth_Photo', isset($_FILES['AuthorAccount']['name']['Auth_Photo']) ? $_FILES['AuthorAccount']['name']['Auth_Photo'] : '');

            if ($model->validate()) {
                $model->setUploadDirectory(UPLOAD_DIR);
                $model->uploadFile();
                if ($model->save()) {
                    Myclass::addAuditTrail("Updated {$model->Auth_First_Name}  {$model->Auth_Sur_Name} AuthorAccount successfully.", "user");
                    Yii::app()->user->setFlash('success', 'AuthorAccount Updated Successfully!!!');
                    $this->redirect(array('/site/authoraccount/update', 'id' => $model->Auth_Acc_Id, 'tab' => '1'));
                }
            } else {
                $tab = '1';
            }
        } elseif (isset($_POST['AuthorAccountAddress'])) {
            $address_model->attributes = $_POST['AuthorAccountAddress'];

            if ($address_model->save()) {
                Myclass::addAuditTrail("Updated {$model->Auth_First_Name}  {$model->Auth_Sur_Name} Address successfully.", "user");
                Yii::app()->user->setFlash('success', 'Address Saved Successfully!!!');
                $this->redirect(array('/site/authoraccount/update', 'id' => $model->Auth_Acc_Id, 'tab' => '2'));
            }
        } elseif (isset($_POST['AuthorPaymentMethod'])) {
            $payment_model->attributes = $_POST['AuthorPaymentMethod'];

            if ($payment_model->save()) {
                Myclass::addAuditTrail("Updated {$model->Auth_First_Name}  {$model->Auth_Sur_Name} Payment successfully.", "user");
                Yii::app()->user->setFlash('success', 'Payment Method Saved Successfully!!!');
                $this->redirect(array('/site/authoraccount/update', 'id' => $model->Auth_Acc_Id, 'tab' => '3'));
            }
        } elseif (isset($_POST['AuthorBiography'])) {
            $biograph_model->attributes = $_POST['AuthorBiography'];

            if ($biograph_model->save()) {
                $bio_id = $biograph_model->Auth_Biogrph_Id;

                $images = CUploadedFile::getInstancesByName('Auth_Biogrph_Upl_File');
                if (isset($images) && count($images) > 0) {
                    foreach ($images as $image => $pic) {
                        $biograph_new_upload_model = new AuthorBiographUploads;
                        $path = DIRECTORY_SEPARATOR . UPLOAD_DIR;
                        $newName = DIRECTORY_SEPARATOR . strtolower(get_class($biograph_new_upload_model)) . DIRECTORY_SEPARATOR . trim(md5(mt_rand())) . '.' . CFileHelper::getExtension($pic->name);
                        $dir = UPLOAD_DIR . DIRECTORY_SEPARATOR . strtolower(get_class($biograph_new_upload_model));
                        if (!is_dir($dir))
                            mkdir($dir);
                        $biograph_new_upload_model->Auth_Biogrph_Id = $bio_id;
                        $biograph_new_upload_model->Auth_Biogrph_Upl_File = $newName;
                        $biograph_new_upload_model->Auth_Biogrph_Upl_Description = $_POST['AuthorBiographUploads']['Auth_Biogrph_Upl_Description'];
                        if ($biograph_new_upload_model->validate()) {
                            $biograph_new_upload_model->save();
                            $pic->saveAs(Yii::getPathOfAlias('webroot') . $path . $newName);
                        }
                    }
                }

                GroupMembers::model()->deleteAll("Group_Member_GUID = '{$model->Auth_GUID}'");
                if (isset($_POST['group_ids']) && !empty($_POST['group_ids'])) {
                    foreach ($_POST['group_ids'] as $gid => $val):
                        $group = new GroupMembers;
                        $group->Group_Id = $gid;
                        $group->Group_Member_GUID = $model->Auth_GUID;
                        $group->save(false);
                    endforeach;
                }
                Myclass::addAuditTrail("Updated {$model->Auth_First_Name}  {$model->Auth_Sur_Name} Biography successfully.", "user");
                Yii::app()->user->setFlash('success', 'Biography Saved Successfully!!!');
                $this->redirect(array('/site/authoraccount/update', 'id' => $model->Auth_Acc_Id, 'tab' => '4'));
            }
        } elseif (isset($_POST['AuthorPseudonym'])) {
            $psedonym_model->attributes = $_POST['AuthorPseudonym'];

            if ($psedonym_model->save()) {
                Myclass::addAuditTrail("Updated {$model->Auth_First_Name}  {$model->Auth_Sur_Name} Pseudonym successfully.", "user");
                Yii::app()->user->setFlash('success', 'Pseudonym Saved Successfully!!!');
                $this->redirect(array('/site/authoraccount/update', 'id' => $model->Auth_Acc_Id, 'tab' => '5'));
            }
        } elseif (isset($_POST['AuthorManageRights'])) {
            $managed_model->attributes = $_POST['AuthorManageRights'];

            if ($managed_model->validate()) {
                if ($managed_model->save()) {
                    Myclass::addAuditTrail("Updated {$model->Auth_First_Name}  {$model->Auth_Sur_Name} Managed Rights successfully.", "user");
                    if ($model->Auth_Is_Performer == 'Y' && $related_model->isNewRecord && $model->Auth_Non_Member == 'N') {
                        Yii::app()->user->setFlash('success', 'Managed Rights saved Successfully. Please Fill Related Rights!!!');
                        $this->redirect(array('/site/authoraccount/update', 'id' => $model->Auth_Acc_Id, 'tab' => '9'));
                    } else {
                        Yii::app()->user->setFlash('success', 'Managed Rights Saved Successfully!!!');
                        $this->redirect(array('/site/authoraccount/update', 'id' => $model->Auth_Acc_Id, 'tab' => '6'));
                    }
                }
            }
        } elseif (isset($_POST['AuthorDeathInheritance'])) {
            $death_model->attributes = $_POST['AuthorDeathInheritance'];

            if ($death_model->save()) {
                Myclass::addAuditTrail("Updated {$model->Auth_First_Name}  {$model->Auth_Sur_Name} Death Inheritance successfully.", "user");
                Yii::app()->user->setFlash('success', 'Death Inheritance Saved Successfully!!!');
                $this->redirect(array('/site/authoraccount/update', 'id' => $model->Auth_Acc_Id, 'tab' => '7'));
            }
        } elseif (isset($_POST['AuthorUpload'])) {
            $upload_model->attributes = $_POST['AuthorUpload'];
            if ($fileedit == NULL) {
                $upload_model->setAttribute('Auth_Upl_File', isset($_FILES['AuthorUpload']['name']['Aut_Upl_File']) ? $_FILES['AuthorUpload']['name']['Aut_Upl_File'] : '');
            }

            if ($upload_model->validate()) {
                $upload_model->setUploadDirectory(UPLOAD_DIR);
                $upload_model->uploadFile();
                if ($upload_model->save()) {
                    Myclass::addAuditTrail("Updated {$model->Auth_First_Name}  {$model->Auth_Sur_Name} Document saved successfully.", "user");
                    Yii::app()->user->setFlash('success', 'Document saved Successfully!!!');
                    $this->redirect(array('/site/authoraccount/update', 'id' => $model->Auth_Acc_Id, 'tab' => '8'));
                }
            } else {
                $tab = '8';
            }
        } elseif (isset($_POST['PerformerRelatedRights'])) {
            $related_model->attributes = $_POST['PerformerRelatedRights'];

            if ($related_model->validate()) {
                if ($related_model->save()) {
                    Myclass::addAuditTrail("Updated Performer Related Rights {$performer_model->Perf_First_Name} {$performer_model->Perf_Sur_Name} successfully.", "music");
                    if ($model->Auth_Is_Performer == 'Y' && $managed_model->isNewRecord && $model->Auth_Non_Member == 'N') {
                        Yii::app()->user->setFlash('success', 'Related Rights saved Successfully. Please Fill Managed Rights!!!');
                        $this->redirect(array('/site/authoraccount/update', 'id' => $model->Auth_Acc_Id, 'tab' => '6'));
                    } else {
                        Yii::app()->user->setFlash('success', 'Related Rights Saved Successfully!!!');
                        $this->redirect(array('/site/authoraccount/update', 'id' => $model->Auth_Acc_Id, 'tab' => '9'));
                    }
                }
            }
        }

        $this->render('update', compact('tab', 'model', 'address_model', 'payment_model', 'psedonym_model', 'death_model', 'managed_model', 'biograph_model', 'upload_model', 'performer_model', 'related_model', 'biograph_upload_model'));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        try {
            $model = $this->loadModel($id);
            $upload_docs = $model->authorUploads;
            $uploads = $model->authorBiographies->authorBiographUploads;
            $model->delete();
            //file remove
            if (!empty($upload_docs)) {
                foreach ($upload_docs as $upload) {
                    $path = UPLOAD_DIR . $upload->Auth_Upl_File;
                    if (is_file($path))
                        unlink($path);
                }
            }
            if (!empty($uploads)) {
                foreach ($uploads as $upload) {
                    $path = UPLOAD_DIR . $upload->Auth_Biogrph_Upl_File;
                    if (is_file($path))
                        unlink($path);
                }
            }
            //end
            Myclass::addAuditTrail("Deleted a {$model->Auth_First_Name}  {$model->Auth_Sur_Name} successfully.", "user");
        } catch (CDbException $e) {
            if ($e->errorInfo[1] == 1451) {
                throw new CHttpException(400, Yii::t('err', 'Relation Restriction Error.'));
            } else {
                throw $e;
            }
        }

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax'])) {
            Yii::app()->user->setFlash('success', 'AuthorAccount Deleted Successfully!!!');
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
        }
    }

    public function actionFiledelete($id) {
        $model = AuthorUpload::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        $auth_acc_id = $model->Auth_Acc_Id;

        $model->setUploadDirectory(UPLOAD_DIR);
        try {
            $model->delete();
            Myclass::addAuditTrail("Deleted a file {$model->Auth_Upl_Doc_Name} successfully.", "user");
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
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/site/authoraccount/update/id/' . $auth_acc_id . '/tab/8/fileedit/' . $id));
        }
    }

    public function actionBiofiledelete($id) {
        $model = AuthorBiographUploads::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        $bio_id = $model->Auth_Biogrph_Id;

        $model->setUploadDirectory(UPLOAD_DIR);
        try {
            $model->delete();
            Myclass::addAuditTrail("Deleted a Biography file from {$model->authBiogrph->authAcc->fullname} successfully.", "user");
        } catch (CDbException $e) {
            if ($e->errorInfo[1] == 1451) {
                throw new CHttpException(400, Yii::t('err', 'Relation Restriction Error.'));
            } else {
                throw $e;
            }
        }

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax'])) {
            Yii::app()->user->setFlash('success', "Deleted a Biography file from {$model->authBiogrph->authAcc->fullname} successfully.");
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/site/authoraccount/update', 'id' => $model->authBiogrph->Auth_Acc_Id, 'tab' => '4'));
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $search = false;

        $model = new AuthorAccount();
        $searchModel = new AuthorAccount('search');
        $searchModel->unsetAttributes();  // clear any default values

        if (isset($_REQUEST['AuthorAccount']['record_search']) && !empty($_REQUEST['AuthorAccount']['record_search'])) {
            $model->unsetAttributes();
            $model->attributes = $_REQUEST['AuthorAccount'];
            $model->search();
        } else if (isset($_GET['AuthorAccount'])) {
            $search = true;
            $searchModel->attributes = $_GET['AuthorAccount'];
            $searchModel->search_status = $_GET['AuthorAccount']['search_status'];
            $searchModel->search();
        }


        if ($this->isExportRequest()) {
            $model->unsetAttributes();
            $this->exportCSV(array('Authors Accounts:'), null, false);
            $this->exportCSV($model->search(), array('Auth_Internal_Code', 'Auth_First_Name', 'Auth_Sur_Name', 'Auth_Ipi'));
        }

        $this->render('index', compact('searchModel', 'search', 'model'));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new AuthorAccount('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['AuthorAccount']))
            $model->attributes = $_GET['AuthorAccount'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return AuthorAccount the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = AuthorAccount::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param AuthorAccount $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && ($_POST['ajax'] === 'author-account-form' || $_POST['ajax'] === 'author-account-address-form' || $_POST['ajax'] === 'author-payment-method-form' || $_POST['ajax'] === 'author-pseudonym-form' || $_POST['ajax'] === 'author-death-inheritance-form' || $_POST['ajax'] === 'author-related-rights-form' || $_POST['ajax'] === 'author-managed-rights-form' || $_POST['ajax'] === 'author-biography-form' || $_POST['ajax'] === 'author-upload-form' || $_POST['ajax'] === 'performer-related-rights-form'
                )) {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionMemberdelete() {
        if(isset($_POST['group_id']) && isset($_POST['guid'])){
            GroupMembers::model()->deleteAllByAttributes(array('Group_Member_GUID' => $_POST['guid'], 'Group_Id' => $_POST['group_id']));
            Yii::app()->end();
        }
    }
}
