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
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
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
            if ($model->save()) {
                Myclass::addAuditTrail("Created Producer {$model->Pro_Corporate_Name} successfully.", "money");
                Yii::app()->user->setFlash('success', 'ProducerAccount Created Successfully. Please Fill Related Rights!!!');
                $this->redirect(array('produceraccount/update/id/' . $model->Pro_Acc_Id . '/tab/6'));
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

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation(array($model, $address_model, $related_model, $payment_model, $psedonym_model, $related_model, $succession_model, $biograph_model));

        if (isset($_POST['ProducerAccount'])) {
            $model->attributes = $_POST['ProducerAccount'];
            if ($model->save()) {
                Myclass::addAuditTrail("Updated Producer {$model->Pro_Corporate_Name} successfully.", "money");
                Yii::app()->user->setFlash('success', 'ProducerAccount Updated Successfully!!!');
                $this->redirect(array('produceraccount/update/id/' . $model->Pro_Acc_Id . '/tab/1'));
            }
        } elseif (isset($_POST['ProducerAccountAddress'])) {
            $address_model->attributes = $_POST['ProducerAccountAddress'];
            $address_model->Pro_Unknown_Address = $_POST['ProducerAccountAddress']['Pro_Unknown_Address'] == 0 ? 'N' : 'Y';

            if ($address_model->save()) {
                Myclass::addAuditTrail("Updated Producer Address {$model->Pro_Corporate_Name} successfully.", "money");
                Yii::app()->user->setFlash('success', 'Address Saved Successfully!!!');
                $this->redirect(array('produceraccount/update/id/' . $address_model->Pro_Acc_Id . '/tab/2'));
            }
        } elseif (isset($_POST['ProducerPaymentMethod'])) {
            $payment_model->attributes = $_POST['ProducerPaymentMethod'];

            if ($payment_model->save()) {
                Myclass::addAuditTrail("Updated Producer Payment Method {$model->Pro_Corporate_Name} successfully.", "money");
                Yii::app()->user->setFlash('success', 'Payment Method Saved Successfully!!!');
                $this->redirect(array('produceraccount/update/id/' . $payment_model->Pro_Acc_Id . '/tab/3'));
            }
        } elseif (isset($_POST['ProducerBiography'])) {
            $biograph_model->attributes = $_POST['ProducerBiography'];

            if ($biograph_model->save()) {
//                GroupMembers::model()->deleteAll("Group_Member_Internal_Code = '{$model->Pro_Internal_Code}'");
//                if (isset($_POST['group_ids']) && !empty($_POST['group_ids'])) {
//                    foreach ($_POST['group_ids'] as $gid):
//                        $group = new GroupMembers;
//                        $group->Group_Id = $gid;
//                        $group->Group_Member_Internal_Code = $model->Pro_Internal_Code;
//                        $group->save(false);
//                    endforeach;
//                }
                Myclass::addAuditTrail("Updated Producer Biography {$model->Pro_Corporate_Name} successfully.", "money");
                Yii::app()->user->setFlash('success', 'Biography Saved Successfully!!!');
                $this->redirect(array('produceraccount/update/id/' . $biograph_model->Pro_Acc_Id . '/tab/4'));
            }
        } elseif (isset($_POST['ProducerPseudonym'])) {
            $psedonym_model->attributes = $_POST['ProducerPseudonym'];

            if ($psedonym_model->save()) {
                Myclass::addAuditTrail("Updated Producer Pseudonym {$model->Pro_Corporate_Name} successfully.", "money");
                Yii::app()->user->setFlash('success', 'Pseudonym Saved Successfully!!!');
                $this->redirect(array('produceraccount/update/id/' . $psedonym_model->Pro_Acc_Id . '/tab/5'));
            }
        } elseif (isset($_POST['ProducerRelatedRights'])) {
            $related_model->attributes = $_POST['ProducerRelatedRights'];

            if ($related_model->validate()) {
                if ($related_model->save()) {
                    Myclass::addAuditTrail("Updated Producer Managed Rights {$model->Pro_Corporate_Name} successfully.", "money");
                    Yii::app()->user->setFlash('success', 'Managed Rights Saved Successfully!!!');
                    $this->redirect(array('produceraccount/update/id/' . $related_model->Pro_Acc_Id . '/tab/6'));
                }
            }
        } elseif (isset($_POST['ProducerRelatedRights'])) {
            $related_model->attributes = $_POST['ProducerRelatedRights'];

            if ($related_model->validate()) {
                if ($related_model->save()) {
                    Myclass::addAuditTrail("Updated Producer Related Rights {$model->Pro_Corporate_Name} successfully.", "money");
                    Yii::app()->user->setFlash('success', 'Related Rights Saved Successfully!!!');
                    $this->redirect(array('produceraccount/update/id/' . $related_model->Pro_Acc_Id . '/tab/7'));
                }
            }
        } elseif (isset($_POST['ProducerSuccession'])) {
            $succession_model->attributes = $_POST['ProducerSuccession'];

            if ($succession_model->validate()) {
                if ($succession_model->save()) {
                    Myclass::addAuditTrail("Updated Producer Succession {$model->Pro_Corporate_Name} successfully.", "money");
                    Yii::app()->user->setFlash('success', 'Succession Saved Successfully!!!');
                    $this->redirect(array('produceraccount/update/id/' . $succession_model->Pro_Acc_Id . '/tab/8'));
                }
            }
        }

        $this->render('update', compact(
                        'tab', 'model', 'address_model', 'payment_model', 'psedonym_model', 'succession_model', 'related_model', 'biograph_model', 'related_model'));
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
                $_POST['ajax'] === 'producer-account-form' || $_POST['ajax'] === 'producer-account-address-form' || $_POST['ajax'] === 'producer-managed-rights-form' || $_POST['ajax'] === 'producer-payment-method-form' || $_POST['ajax'] === 'producer-pseudonym-form' || $_POST['ajax'] === 'producer-related-rights-form' || $_POST['ajax'] === 'producer-succession-form' || $_POST['ajax'] === 'producer-biography-form'
                )) {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
