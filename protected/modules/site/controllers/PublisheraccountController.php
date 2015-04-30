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
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
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
            if ($model->save()) {
                Myclass::addAuditTrail("Created Publisher {$model->Pub_Corporate_Name} successfully.", "microphone");
                Yii::app()->user->setFlash('success', 'PublisherAccount Created Successfully. Please Fill Managed Rights!!!');
                $this->redirect(array('publisheraccount/update/id/' . $model->Pub_Acc_Id . '/tab/6'));
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

        $related_exists = PublisherRelatedRights::model()->findByAttributes(array('Pub_Acc_Id' => $id));
        $related_model = empty($related_exists) ? new PublisherRelatedRights : $related_exists;

        $biograph_exists = PublisherBiography::model()->findByAttributes(array('Pub_Acc_Id' => $id));
        $biograph_model = empty($biograph_exists) ? new PublisherBiography : $biograph_exists;

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation(array($model, $address_model, $managed_model, $payment_model, $psedonym_model, $related_model, $succession_model, $biograph_model));

        if (isset($_POST['PublisherAccount'])) {
            $model->attributes = $_POST['PublisherAccount'];
            if ($model->save()) {
                Myclass::addAuditTrail("Updated Publisher {$model->Pub_Corporate_Name} successfully.", "microphone");
                Yii::app()->user->setFlash('success', 'PublisherAccount Updated Successfully!!!');
                $this->redirect(array('publisheraccount/update/id/' . $model->Pub_Acc_Id . '/tab/1'));
            }
        } elseif (isset($_POST['PublisherAccountAddress'])) {
            $address_model->attributes = $_POST['PublisherAccountAddress'];
            $address_model->Pub_Unknown_Address = $_POST['PublisherAccountAddress']['Pub_Unknown_Address'] == 0 ? 'N' : 'Y';

            if ($address_model->save()) {
                Myclass::addAuditTrail("Updated Publisher Address {$model->Pub_Corporate_Name} successfully.", "microphone");
                Yii::app()->user->setFlash('success', 'Address Saved Successfully!!!');
                $this->redirect(array('publisheraccount/update/id/' . $address_model->Pub_Acc_Id . '/tab/2'));
            }
        } elseif (isset($_POST['PublisherPaymentMethod'])) {
            $payment_model->attributes = $_POST['PublisherPaymentMethod'];

            if ($payment_model->save()) {
                Myclass::addAuditTrail("Updated Publisher Payment Method {$model->Pub_Corporate_Name} successfully.", "microphone");
                Yii::app()->user->setFlash('success', 'Payment Method Saved Successfully!!!');
                $this->redirect(array('publisheraccount/update/id/' . $payment_model->Pub_Acc_Id . '/tab/3'));
            }
        } elseif (isset($_POST['PublisherBiography'])) {
            $biograph_model->attributes = $_POST['PublisherBiography'];

            if ($biograph_model->save()) {
//                GroupMembers::model()->deleteAll("Group_Member_Internal_Code = '{$model->Pub_Internal_Code}'");
//                if (isset($_POST['group_ids']) && !empty($_POST['group_ids'])) {
//                    foreach ($_POST['group_ids'] as $gid):
//                        $group = new GroupMembers;
//                        $group->Group_Id = $gid;
//                        $group->Group_Member_Internal_Code = $model->Pub_Internal_Code;
//                        $group->save(false);
//                    endforeach;
//                }
                Myclass::addAuditTrail("Updated Publisher Biography {$model->Pub_Corporate_Name} successfully.", "microphone");
                Yii::app()->user->setFlash('success', 'Biography Saved Successfully!!!');
                $this->redirect(array('publisheraccount/update/id/' . $biograph_model->Pub_Acc_Id . '/tab/4'));
            }
        } elseif (isset($_POST['PublisherPseudonym'])) {
            $psedonym_model->attributes = $_POST['PublisherPseudonym'];

            if ($psedonym_model->save()) {
                Myclass::addAuditTrail("Updated Publisher Pseudonym {$model->Pub_Corporate_Name} successfully.", "microphone");
                Yii::app()->user->setFlash('success', 'Pseudonym Saved Successfully!!!');
                $this->redirect(array('publisheraccount/update/id/' . $psedonym_model->Pub_Acc_Id . '/tab/5'));
            }
        } elseif (isset($_POST['PublisherManageRights'])) {
            $managed_model->attributes = $_POST['PublisherManageRights'];

            if ($managed_model->validate()) {
                if ($managed_model->save()) {
                Myclass::addAuditTrail("Updated Publisher Managed Rights {$model->Pub_Corporate_Name} successfully.", "microphone");
                    Yii::app()->user->setFlash('success', 'Managed Rights Saved Successfully!!!');
                    $this->redirect(array('publisheraccount/update/id/' . $managed_model->Pub_Acc_Id . '/tab/6'));
                }
            }
        } elseif (isset($_POST['PublisherRelatedRights'])) {
            $related_model->attributes = $_POST['PublisherRelatedRights'];

            if ($related_model->validate()) {
                if ($related_model->save()) {
                Myclass::addAuditTrail("Updated Publisher Related Rights {$model->Pub_Corporate_Name} successfully.", "microphone");
                    Yii::app()->user->setFlash('success', 'Related Rights Saved Successfully!!!');
                    $this->redirect(array('publisheraccount/update/id/' . $related_model->Pub_Acc_Id . '/tab/7'));
                }
            }
        } elseif (isset($_POST['PublisherSuccession'])) {
            $succession_model->attributes = $_POST['PublisherSuccession'];

            if ($succession_model->validate()) {
                if ($succession_model->save()) {
                Myclass::addAuditTrail("Updated Publisher Succession {$model->Pub_Corporate_Name} successfully.", "microphone");
                    Yii::app()->user->setFlash('success', 'Succession Saved Successfully!!!');
                    $this->redirect(array('publisheraccount/update/id/' . $succession_model->Pub_Acc_Id . '/tab/8'));
                }
            }
        }

        $this->render('update', compact(
                        'tab', 'model', 'address_model', 'payment_model', 'psedonym_model', 'succession_model', 'managed_model', 'biograph_model', 'related_model'));
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
                $_POST['ajax'] === 'publisher-account-form' || $_POST['ajax'] === 'publisher-account-address-form' || $_POST['ajax'] === 'publisher-managed-rights-form' || $_POST['ajax'] === 'publisher-payment-method-form' || $_POST['ajax'] === 'publisher-pseudonym-form' || $_POST['ajax'] === 'publisher-related-rights-form' || $_POST['ajax'] === 'publisher-succession-form' || $_POST['ajax'] === 'publisher-biography-form'
                )) {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
