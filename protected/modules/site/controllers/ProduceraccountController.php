<?php

class ProduceraccountController extends Controller {
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
                'filename' => "Producers_" . time() . ".csv",
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
                'actions' => array('index', 'view', 'create', 'update', 'admin', 'delete'),
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
        $address_exists = ProducerAccountAddress::model()->findByAttributes(array('Pro_Acc_Id' => $id));
        $address_model = empty($address_exists) ? array() : $address_exists;

        $payment_exists = ProducerPaymentMethod::model()->findByAttributes(array('Pro_Acc_Id' => $id));
        $payment_model = empty($payment_exists) ? array() : $payment_exists;

        $psedonym_exists = ProducerPseudonym::model()->findByAttributes(array('Pro_Acc_Id' => $id));
        $psedonym_model = empty($psedonym_exists) ? array() : $psedonym_exists;

        $death_exists = ProducerSuccession::model()->findByAttributes(array('Pro_Acc_Id' => $id));
        $death_model = empty($death_exists) ? array() : $death_exists;

        $related_exists = ProducerRelatedRights::model()->findByAttributes(array('Pro_Acc_Id' => $id));
        $related_model = empty($related_exists) ? array() : $related_exists;

        $biograph_exists = ProducerBiography::model()->findByAttributes(array('Pro_Acc_Id' => $id));
        $biograph_model = empty($biograph_exists) ? array() : $biograph_exists;

        $export = isset($_REQUEST['export']) && $_REQUEST['export'] == 'PDF';
        $compact = compact('model', 'address_model', 'payment_model', 'psedonym_model', 'death_model', 'related_model', 'biograph_model', 'export');
        if ($export) {
            $mPDF1 = Yii::app()->ePdf->mpdf();
            $stylesheet = $this->pdfStyles();
            $mPDF1->WriteHTML($stylesheet, 1);
            $mPDF1->WriteHTML($this->renderPartial('view', $compact, true));
            $mPDF1->Output("Producer_view_$id.pdf", EYiiPdf::OUTPUT_TO_DOWNLOAD);
        } else {
            $this->render('view', $compact);
        }
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new ProducerAccount;

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['ProducerAccount'])) {
            $model->attributes = $_POST['ProducerAccount'];
            $model->setAttribute('Pro_Photo', isset($_FILES['ProducerAccount']['name']['Pro_Photo']) ? $_FILES['ProducerAccount']['name']['Pro_Photo'] : '');

            if ($model->validate()) {
                $model->setUploadDirectory(UPLOAD_DIR);
                $model->uploadFile();
                if ($model->save()) {
                    Myclass::addAuditTrail("Created Producer {$model->Pro_Corporate_Name} successfully.", "money");
                    if ($model->Pro_Non_Member == 'N') {
                        $message = 'ProducerAccount Created Successfully. Please Fill Related Rights!!!';
                        $tab = 6;
                    } else {
                        $message = 'ProducerAccount Created Successfully';
                        $tab = 1;
                    }
                    Yii::app()->user->setFlash('success', $message);
                    $this->redirect(array('/site/produceraccount/update', 'id' => $model->Pro_Acc_Id, 'tab' => $tab));
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
    public function actionUpdate($id, $tab = 1) {
        $model = $this->loadModel($id);
        $address_exists = ProducerAccountAddress::model()->findByAttributes(array('Pro_Acc_Id' => $id));
        $address_model = empty($address_exists) ? new ProducerAccountAddress : $address_exists;

        $payment_exists = ProducerPaymentMethod::model()->findByAttributes(array('Pro_Acc_Id' => $id));
        $payment_model = empty($payment_exists) ? new ProducerPaymentMethod : $payment_exists;

        $psedonym_exists = ProducerPseudonym::model()->findByAttributes(array('Pro_Acc_Id' => $id));
        $psedonym_model = empty($psedonym_exists) ? new ProducerPseudonym : $psedonym_exists;

        $succession_exists = ProducerSuccession::model()->findByAttributes(array('Pro_Acc_Id' => $id));
        $succession_model = empty($succession_exists) ? new ProducerSuccession : $succession_exists;

        $related_exists = ProducerRelatedRights::model()->findByAttributes(array('Pro_Acc_Id' => $id));
        $related_model = empty($related_exists) ? new ProducerRelatedRights : $related_exists;

        $related_exists = ProducerRelatedRights::model()->findByAttributes(array('Pro_Acc_Id' => $id));
        $related_model = empty($related_exists) ? new ProducerRelatedRights : $related_exists;

        $biograph_exists = ProducerBiography::model()->findByAttributes(array('Pro_Acc_Id' => $id));
        $biograph_model = empty($biograph_exists) ? new ProducerBiography : $biograph_exists;

        $publisher_model = ProducerAccount::model()->checkPublisher($model->Pro_Internal_Code, false);
        $managed_exists = PublisherManageRights::model()->with('pubAcc')->find('pubAcc.Pub_Internal_Code = :int_code', array(':int_code' => $model->Pro_Internal_Code));
        $managed_model = empty($managed_exists) ? new PublisherManageRights : $managed_exists;
        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation(array($model, $address_model, $related_model, $payment_model, $psedonym_model, $related_model,
            $succession_model, $biograph_model, $managed_model));

        if (isset($_POST['ProducerAccount'])) {
            $model->attributes = $_POST['ProducerAccount'];
            $model->setAttribute('Pro_Photo', isset($_FILES['ProducerAccount']['name']['Pro_Photo']) ? $_FILES['ProducerAccount']['name']['Pro_Photo'] : '');

            if ($model->validate()) {
                $model->setUploadDirectory(UPLOAD_DIR);
                $model->uploadFile();
                if ($model->save()) {
                    Myclass::addAuditTrail("Updated Producer {$model->Pro_Corporate_Name} successfully.", "money");
                    Yii::app()->user->setFlash('success', 'ProducerAccount Updated Successfully!!!');
                    $this->redirect(array('/site/produceraccount/update', 'id' => $model->Pro_Acc_Id, 'tab' => '1'));
                }
            } else {
                $tab = '1';
            }
        } elseif (isset($_POST['ProducerAccountAddress'])) {
            $address_model->attributes = $_POST['ProducerAccountAddress'];

            if ($address_model->save()) {
                Myclass::addAuditTrail("Updated Producer Address {$model->Pro_Corporate_Name} successfully.", "money");
                Yii::app()->user->setFlash('success', 'Address Saved Successfully!!!');
                $this->redirect(array('/site/produceraccount/update', 'id' => $model->Pro_Acc_Id, 'tab' => '2'));
            }
        } elseif (isset($_POST['ProducerPaymentMethod'])) {
            $payment_model->attributes = $_POST['ProducerPaymentMethod'];

            if ($payment_model->save()) {
                Myclass::addAuditTrail("Updated Producer Payment Method {$model->Pro_Corporate_Name} successfully.", "money");
                Yii::app()->user->setFlash('success', 'Payment Method Saved Successfully!!!');
                $this->redirect(array('/site/produceraccount/update', 'id' => $model->Pro_Acc_Id, 'tab' => '3'));
            }
        } elseif (isset($_POST['ProducerBiography'])) {
            $biograph_model->attributes = $_POST['ProducerBiography'];

            if ($biograph_model->save()) {
                PublisherGroupMembers::model()->deleteAll("Pub_Group_Member_GUID = '{$model->Pro_GUID}'");
                if (isset($_POST['group_ids']) && !empty($_POST['group_ids'])) {
                    foreach ($_POST['group_ids'] as $gid):
                        $group = new PublisherGroupMembers;
                        $group->Pub_Group_Id = $gid;
                        $group->Pub_Group_Member_GUID = $model->Pro_GUID;
                        $group->save(false);
                    endforeach;
                }
                Myclass::addAuditTrail("Updated Producer Biography {$model->Pro_Corporate_Name} successfully.", "money");
                Yii::app()->user->setFlash('success', 'Biography Saved Successfully!!!');
                $this->redirect(array('/site/produceraccount/update', 'id' => $model->Pro_Acc_Id, 'tab' => '4'));
            }
        } elseif (isset($_POST['ProducerPseudonym'])) {
            $psedonym_model->attributes = $_POST['ProducerPseudonym'];

            if ($psedonym_model->save()) {
                Myclass::addAuditTrail("Updated Producer Pseudonym {$model->Pro_Corporate_Name} successfully.", "money");
                Yii::app()->user->setFlash('success', 'Pseudonym Saved Successfully!!!');
                $this->redirect(array('/site/produceraccount/update', 'id' => $model->Pro_Acc_Id, 'tab' => '5'));
            }
        } elseif (isset($_POST['ProducerRelatedRights'])) {
            $related_model->attributes = $_POST['ProducerRelatedRights'];

            if ($related_model->validate()) {
                if ($related_model->save()) {
                    Myclass::addAuditTrail("Updated Producer Managed Rights {$model->Pro_Corporate_Name} successfully.", "money");
                    Yii::app()->user->setFlash('success', 'Managed Rights Saved Successfully!!!');
                    $this->redirect(array('/site/produceraccount/update', 'id' => $model->Pro_Acc_Id, 'tab' => '6'));
                }
            }
        } elseif (isset($_POST['ProducerRelatedRights'])) {
            $related_model->attributes = $_POST['ProducerRelatedRights'];

            if ($related_model->validate()) {
                if ($related_model->save()) {
                    Myclass::addAuditTrail("Updated Producer Related Rights {$model->Pro_Corporate_Name} successfully.", "money");
                    Yii::app()->user->setFlash('success', 'Related Rights Saved Successfully!!!');
                    $this->redirect(array('/site/produceraccount/update', 'id' => $model->Pro_Acc_Id, 'tab' => '7'));
                }
            }
        } elseif (isset($_POST['ProducerSuccession'])) {
            $succession_model->attributes = $_POST['ProducerSuccession'];

            if ($succession_model->validate()) {
                if ($succession_model->save()) {
                    Myclass::addAuditTrail("Updated Producer Succession {$model->Pro_Corporate_Name} successfully.", "money");
                    Yii::app()->user->setFlash('success', 'Succession Saved Successfully!!!');
                    $this->redirect(array('/site/produceraccount/update', 'id' => $model->Pro_Acc_Id, 'tab' => '8'));
                }
            }
        } elseif (isset($_POST['PublisherManageRights'])) {
            $managed_model->attributes = $_POST['PublisherManageRights'];

            if ($managed_model->validate()) {
                if ($managed_model->save()) {
                    Myclass::addAuditTrail("Updated Publisher Managed Rights {$publisher_model->Pub_Corporate_Name} successfully.", "microphone");
                    Yii::app()->user->setFlash('success', 'Managed Rights Saved Successfully!!!');
                    $this->redirect(array('/site/produceraccount/update', 'id' => $model->Pro_Acc_Id, 'tab' => '9'));
                }
            }
        }

        $this->render('update', compact('tab', 'model', 'address_model', 'payment_model', 'psedonym_model', 'succession_model', 'related_model', 'biograph_model', 'related_model', 'publisher_model', 'managed_model'));
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
            Myclass::addAuditTrail("Deleted Producer {$model->Pro_Corporate_Name} successfully.", "money");
        } catch (CDbException $e) {
            if ($e->errorInfo[1] == 1451) {
                throw new CHttpException(400, Yii::t('err', 'Relation Restriction Error.'));
            } else {
                throw $e;
            }
        }

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax'])) {
            Yii::app()->user->setFlash('success', 'ProducerAccount Deleted Successfully!!!');
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $search = false;

        $model = new ProducerAccount();
        $searchModel = new ProducerAccount('search');
        $searchModel->unsetAttributes();  // clear any default values
        if (isset($_GET['ProducerAccount'])) {
            $search = true;
            $searchModel->attributes = $_GET['ProducerAccount'];
            $searchModel->search_status = $_GET['ProducerAccount']['search_status'];
            $searchModel->search();
        }

        if ($this->isExportRequest()) {
            $model->unsetAttributes();
            $this->exportCSV(array('Producers Accounts:'), null, false);
            $this->exportCSV($model->search(), array('Pro_Internal_Code', 'Pro_Corporate_Name'));
        }

        $this->render('index', compact('searchModel', 'search', 'model'));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new ProducerAccount('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['ProducerAccount']))
            $model->attributes = $_GET['ProducerAccount'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return ProducerAccount the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = ProducerAccount::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param ProducerAccount $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && (
                $_POST['ajax'] === 'producer-account-form' || $_POST['ajax'] === 'producer-account-address-form' || $_POST['ajax'] === 'producer-managed-rights-form' || $_POST['ajax'] === 'producer-payment-method-form' || $_POST['ajax'] === 'producer-pseudonym-form' || $_POST['ajax'] === 'producer-related-rights-form' || $_POST['ajax'] === 'producer-succession-form' || $_POST['ajax'] === 'producer-biography-form' || $_POST['ajax'] === 'publisher-managed-rights-form'
                )) {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
