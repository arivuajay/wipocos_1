<?php

class PublisheraccountController extends Controller {
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
            'download' => 'application.components.actions.download',
        );
    }
    
    public function behaviors() {
        return array(
            'exportableGrid' => array(
                'class' => 'application.components.ExportableGridBehavior',
                'filename' => "Publishers_" . time() . ".csv",
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
                'actions' => array('index', 'view', 'create', 'update', 'admin', 'delete', 'biofiledelete', 'download'),
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
        $address_exists = PublisherAccountAddress::model()->findByAttributes(array('Pub_Acc_Id' => $id));
        $address_model = empty($address_exists) ? array() : $address_exists;

        $payment_exists = PublisherPaymentMethod::model()->findByAttributes(array('Pub_Acc_Id' => $id));
        $payment_model = empty($payment_exists) ? array() : $payment_exists;

        $psedonym_exists = PublisherPseudonym::model()->findByAttributes(array('Pub_Acc_Id' => $id));
        $psedonym_model = empty($psedonym_exists) ? array() : $psedonym_exists;

        $death_exists = PublisherSuccession::model()->findByAttributes(array('Pub_Acc_Id' => $id));
        $death_model = empty($death_exists) ? array() : $death_exists;

        $managed_exists = PublisherManageRights::model()->findByAttributes(array('Pub_Acc_Id' => $id));
        $managed_model = empty($managed_exists) ? array() : $managed_exists;

        $biograph_exists = PublisherBiography::model()->findByAttributes(array('Pub_Acc_Id' => $id));
        $biograph_model = empty($biograph_exists) ? array() : $biograph_exists;

        $export = isset($_REQUEST['export']) && $_REQUEST['export'] == 'PDF';
        $compact = compact('model', 'address_model', 'payment_model', 'psedonym_model', 'death_model', 'managed_model', 'biograph_model', 'export');
        if ($export) {
            $mPDF1 = Yii::app()->ePdf->mpdf();
            $stylesheet = $this->pdfStyles();
            $mPDF1->WriteHTML($stylesheet, 1);
            $mPDF1->WriteHTML($this->renderPartial('view', $compact, true));
            $mPDF1->Output("Publisher_view_$id.pdf", EYiiPdf::OUTPUT_TO_DOWNLOAD);
        } else {
            $this->render('view', $compact);
        }
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new PublisherAccount;

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['PublisherAccount'])) {
            $model->attributes = $_POST['PublisherAccount'];
            $model->setAttribute('Pub_Photo', isset($_FILES['PublisherAccount']['name']['Pub_Photo']) ? $_FILES['PublisherAccount']['name']['Pub_Photo'] : '');

            if ($model->validate()) {
                $model->setUploadDirectory(UPLOAD_DIR);
                $model->uploadFile();
                if ($model->save()) {
                    Myclass::addAuditTrail("Created Publisher {$model->Pub_Corporate_Name} successfully.", "microphone");
                    if ($model->Pub_Non_Member == 'N') {
                        $message = 'PublisherAccount Created Successfully. Please Fill Managed Rights!!!';
                        $tab = 6;
                    } else {
                        $message = 'PublisherAccount Created Successfully';
                        $tab = 1;
                    }
                    Yii::app()->user->setFlash('success', $message);
                    $this->redirect(array('/site/publisheraccount/update', 'id' => $model->Pub_Acc_Id, 'tab' => $tab));
                }
            } else {
                $tab = '1';
            }
        } else {
            $model->Pub_Country_Id = 2;
            $model->Pub_Language_Id = 1;
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
    public function actionUpdate($id, $tab = 1) {
        $model = $this->loadModel($id);
        $address_exists = PublisherAccountAddress::model()->findByAttributes(array('Pub_Acc_Id' => $id));
        $address_model = empty($address_exists) ? new PublisherAccountAddress : $address_exists;

        $payment_exists = PublisherPaymentMethod::model()->findByAttributes(array('Pub_Acc_Id' => $id));
        $payment_model = empty($payment_exists) ? new PublisherPaymentMethod : $payment_exists;

        $psedonym_exists = PublisherPseudonym::model()->findByAttributes(array('Pub_Acc_Id' => $id));
        $psedonym_model = empty($psedonym_exists) ? new PublisherPseudonym : $psedonym_exists;

        $succession_exists = PublisherSuccession::model()->findByAttributes(array('Pub_Acc_Id' => $id));
        $succession_model = empty($succession_exists) ? new PublisherSuccession : $succession_exists;

        $managed_exists = PublisherManageRights::model()->findByAttributes(array('Pub_Acc_Id' => $id));
        $managed_model = empty($managed_exists) ? new PublisherManageRights : $managed_exists;

        $biograph_exists = PublisherBiography::model()->findByAttributes(array('Pub_Acc_Id' => $id));
        $biograph_model = empty($biograph_exists) ? new PublisherBiography : $biograph_exists;

        $producer_model = PublisherAccount::model()->checkProducer($model->Pub_Internal_Code, false);
        $related_exists = ProducerRelatedRights::model()->with('proAcc')->find('proAcc.Pro_Internal_Code = :int_code', array(':int_code' => $model->Pub_Internal_Code));
        $related_model = empty($related_exists) ? new ProducerRelatedRights : $related_exists;

        $biograph_upload_model = new PublisherBiographUploads;
        
        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation(array($model, $address_model, $managed_model, $payment_model, $psedonym_model,
            $succession_model, $biograph_model, $related_model));

        if (isset($_POST['PublisherAccount'])) {
            $model->attributes = $_POST['PublisherAccount'];
            $model->setAttribute('Pub_Photo', isset($_FILES['PublisherAccount']['name']['Pub_Photo']) ? $_FILES['PublisherAccount']['name']['Pub_Photo'] : '');

            if ($model->validate()) {
                $model->setUploadDirectory(UPLOAD_DIR);
                $model->uploadFile();
                if ($model->save()) {
                    Myclass::addAuditTrail("Updated Publisher {$model->Pub_Corporate_Name} successfully.", "microphone");
                    Yii::app()->user->setFlash('success', 'PublisherAccount Updated Successfully!!!');
                    $this->redirect(array('/site/publisheraccount/update', 'id' => $model->Pub_Acc_Id, 'tab' => '1'));
                }
            } else {
                $tab = '1';
            }
        } elseif (isset($_POST['PublisherAccountAddress'])) {
            $address_model->attributes = $_POST['PublisherAccountAddress'];

            if ($address_model->save()) {
                Myclass::addAuditTrail("Updated Publisher Address {$model->Pub_Corporate_Name} successfully.", "microphone");
                Yii::app()->user->setFlash('success', 'Address Saved Successfully!!!');
                $this->redirect(array('/site/publisheraccount/update', 'id' => $model->Pub_Acc_Id, 'tab' => '2'));
            }
        } elseif (isset($_POST['PublisherPaymentMethod'])) {
            $payment_model->attributes = $_POST['PublisherPaymentMethod'];

            if ($payment_model->save()) {
                Myclass::addAuditTrail("Updated Publisher Payment Method {$model->Pub_Corporate_Name} successfully.", "microphone");
                Yii::app()->user->setFlash('success', 'Payment Method Saved Successfully!!!');
                $this->redirect(array('/site/publisheraccount/update', 'id' => $model->Pub_Acc_Id, 'tab' => '3'));
            }
        } elseif (isset($_POST['PublisherBiography'])) {
            $biograph_model->attributes = $_POST['PublisherBiography'];

            if ($biograph_model->save()) {
                $bio_id = $biograph_model->Pub_Biogrph_Id;

                $images = CUploadedFile::getInstancesByName('Pub_Biogrph_Upl_File');
                if (isset($images) && count($images) > 0) {
                    foreach ($images as $image => $pic) {
                        $biograph_new_upload_model = new PublisherBiographUploads;
                        $path = DIRECTORY_SEPARATOR . UPLOAD_DIR;
                        $newName = DIRECTORY_SEPARATOR . strtolower(get_class($biograph_new_upload_model)) . DIRECTORY_SEPARATOR . trim(md5(mt_rand())) . '.' . CFileHelper::getExtension($pic->name);
                        $dir = UPLOAD_DIR.DIRECTORY_SEPARATOR . strtolower(get_class($biograph_new_upload_model));
                        if (!is_dir($dir))
                            mkdir($dir);
                        $biograph_new_upload_model->Pub_Biogrph_Id = $bio_id;
                        $biograph_new_upload_model->Pub_Biogrph_Upl_File = $newName;
                        if($biograph_new_upload_model->validate()){
                            $biograph_new_upload_model->save();
                            $pic->saveAs(Yii::getPathOfAlias('webroot') . $path . $newName);
                        }
                    }
                }
                
                PublisherGroupMembers::model()->deleteAll("Pub_Group_Member_GUID = '{$model->Pub_GUID}'");
                if (isset($_POST['group_ids']) && !empty($_POST['group_ids'])) {
                    foreach ($_POST['group_ids'] as $gid):
                        $group = new PublisherGroupMembers;
                        $group->Pub_Group_Id = $gid;
                        $group->Pub_Group_Member_GUID = $model->Pub_GUID;
                        $group->save(false);
                    endforeach;
                }
                Myclass::addAuditTrail("Updated Publisher Biography {$model->Pub_Corporate_Name} successfully.", "microphone");
                Yii::app()->user->setFlash('success', 'Biography Saved Successfully!!!');
                $this->redirect(array('/site/publisheraccount/update', 'id' => $model->Pub_Acc_Id, 'tab' => '4'));
            }
        } elseif (isset($_POST['PublisherPseudonym'])) {
            $psedonym_model->attributes = $_POST['PublisherPseudonym'];

            if ($psedonym_model->save()) {
                Myclass::addAuditTrail("Updated Publisher Pseudonym {$model->Pub_Corporate_Name} successfully.", "microphone");
                Yii::app()->user->setFlash('success', 'Pseudonym Saved Successfully!!!');
                $this->redirect(array('/site/publisheraccount/update', 'id' => $model->Pub_Acc_Id, 'tab' => '5'));
            }
        } elseif (isset($_POST['PublisherManageRights'])) {
            $managed_model->attributes = $_POST['PublisherManageRights'];

            if ($managed_model->validate()) {
                if ($managed_model->save()) {
                    Myclass::addAuditTrail("Updated Publisher Managed Rights {$model->Pub_Corporate_Name} successfully.", "microphone");
                    Yii::app()->user->setFlash('success', 'Managed Rights Saved Successfully!!!');
                    $this->redirect(array('/site/publisheraccount/update', 'id' => $model->Pub_Acc_Id, 'tab' => '6'));
                }
            }
        } elseif (isset($_POST['PublisherRelatedRights'])) {
            $related_model->attributes = $_POST['PublisherRelatedRights'];

            if ($related_model->validate()) {
                if ($related_model->save()) {
                    Myclass::addAuditTrail("Updated Publisher Related Rights {$model->Pub_Corporate_Name} successfully.", "microphone");
                    Yii::app()->user->setFlash('success', 'Related Rights Saved Successfully!!!');
                    $this->redirect(array('/site/publisheraccount/update', 'id' => $model->Pub_Acc_Id, 'tab' => '7'));
                }
            }
        } elseif (isset($_POST['PublisherSuccession'])) {
            $succession_model->attributes = $_POST['PublisherSuccession'];

            if ($succession_model->validate()) {
                if ($succession_model->save()) {
                    Myclass::addAuditTrail("Updated Publisher Succession {$model->Pub_Corporate_Name} successfully.", "microphone");
                    Yii::app()->user->setFlash('success', 'Succession Saved Successfully!!!');
                    $this->redirect(array('/site/publisheraccount/update', 'id' => $model->Pub_Acc_Id, 'tab' => '8'));
                }
            }
        } elseif (isset($_POST['ProducerRelatedRights'])) {
            $related_model->attributes = $_POST['ProducerRelatedRights'];

            if ($related_model->validate()) {
                if ($related_model->save()) {
                    Myclass::addAuditTrail("Updated Producer Managed Rights {$producer_model->Pro_Corporate_Name} successfully.", "money");
                    Yii::app()->user->setFlash('success', 'Managed Rights Saved Successfully!!!');
                    $this->redirect(array('/site/publisheraccount/update', 'id' => $model->Pub_Acc_Id, 'tab' => '9'));
                }
            }
        }

        $this->render('update', compact('tab', 'model', 'address_model', 'payment_model', 'psedonym_model', 'succession_model', 'managed_model', 'biograph_model', 'related_model', 'related_model', 'producer_model', 'biograph_upload_model'));
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
            Myclass::addAuditTrail("Deleted Publisher {$model->Pub_Corporate_Name} successfully.", "microphone");
        } catch (CDbException $e) {
            if ($e->errorInfo[1] == 1451) {
                throw new CHttpException(400, Yii::t('err', 'Relation Restriction Error.'));
            } else {
                throw $e;
            }
        }

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax'])) {
            Yii::app()->user->setFlash('success', 'PublisherAccount Deleted Successfully!!!');
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
        }
    }

    public function actionBiofiledelete($id) {
        $model = PublisherBiographUploads::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        $bio_id = $model->Pub_Biogrph_Id;

        $model->setUploadDirectory(UPLOAD_DIR);
        try {
            $model->delete();
            Myclass::addAuditTrail("Deleted a Biography file from {$model->pubBiogrph->pubAcc->Pub_Corporate_Name} successfully.", "user");
        } catch (CDbException $e) {
            if ($e->errorInfo[1] == 1451) {
                throw new CHttpException(400, Yii::t('err', 'Relation Restriction Error.'));
            } else {
                throw $e;
            }
        }

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax'])) {
            Yii::app()->user->setFlash('success', "Deleted a Biography file from {$model->pubBiogrph->pubAcc->Pub_Corporate_Name} successfully.");
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/site/publisheraccount/update', 'id' => $model->pubBiogrph->Pub_Acc_Id , 'tab' => '4'));
        }
    }
    
    /**
     * Lists all models.
     */
    public function actionIndex() {
        $search = false;

        $model = new PublisherAccount();
        $searchModel = new PublisherAccount('search');
        $searchModel->unsetAttributes();  // clear any default values
        if (isset($_GET['PublisherAccount'])) {
            $search = true;
            $searchModel->attributes = $_GET['PublisherAccount'];
            $searchModel->search_status = $_GET['PublisherAccount']['search_status'];
            $searchModel->search();
        }

        if ($this->isExportRequest()) {
            $model->unsetAttributes();
            $this->exportCSV(array('Publisher Accounts:'), null, false);
            $this->exportCSV($model->search(), array('Pub_Internal_Code', 'Pub_Corporate_Name', 'Pub_Ipi'));
        }

        $this->render('index', compact('searchModel', 'search', 'model'));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new PublisherAccount('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['PublisherAccount']))
            $model->attributes = $_GET['PublisherAccount'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return PublisherAccount the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = PublisherAccount::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param PublisherAccount $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && (
                $_POST['ajax'] === 'publisher-account-form' || $_POST['ajax'] === 'publisher-account-address-form' || $_POST['ajax'] === 'publisher-managed-rights-form' || $_POST['ajax'] === 'publisher-payment-method-form' || $_POST['ajax'] === 'publisher-pseudonym-form' || $_POST['ajax'] === 'publisher-related-rights-form' || $_POST['ajax'] === 'publisher-succession-form' || $_POST['ajax'] === 'publisher-biography-form' || $_POST['ajax'] === 'producer-related-rights-form'
                )) {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
