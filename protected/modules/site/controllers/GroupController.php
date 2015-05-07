<?php

class GroupController extends Controller {
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
                'filename' => "Groups_" . time() . ".csv",
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
    public function actionCreate($type) {
        $model = new Group;

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['Group'])) {
            $model->attributes = $_POST['Group'];
            if ($model->save()) {
                Myclass::addAuditTrail("Created a {$model->Group_Name} successfully.", "users");
                Yii::app()->user->setFlash('success', 'Group Created Successfully. Please Fill Managed Rights!!!');
                $this->redirect(array('group/update/id/' . $model->Group_Id . '/tab/6'));
            }
        }

        $tab = 1;
        $this->render('create', compact('model', 'tab', 'type'));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id, $tab = 1) {
        $model = $this->loadModel($id);

        $payment_exists = GroupPaymentMethod::model()->findByAttributes(array('Group_Id' => $id));
        $payment_model = empty($payment_exists) ? new GroupPaymentMethod : $payment_exists;

        $managed_exists = GroupManageRights::model()->findByAttributes(array('Group_Id' => $id));
        if(empty($managed_exists)){
            $managed_model = new GroupManageRights;
            if($model->Group_Is_Author == '1'){
                $managed_model->Group_Mnge_Type_Rght_Id = DEFAULT_AUTHOR_GROUP_RIGHT_HOLDER_ID;
            }elseif($model->Group_Is_Performer == '1'){
                $managed_model->Group_Mnge_Type_Rght_Id = DEFAULT_PERFORMER_GROUP_RIGHT_HOLDER_ID;
            }
        }else{
            $managed_model = $managed_exists;
        }

        $psedonym_exists = GroupPseudonym::model()->findByAttributes(array('Group_Id' => $id));
        $psedonym_model = empty($psedonym_exists) ? new GroupPseudonym : $psedonym_exists;

        $biograph_exists = GroupBiography::model()->findByAttributes(array('Group_Id' => $id));
        $biograph_model = empty($biograph_exists) ? new GroupBiography : $biograph_exists;

        $address_exists = GroupRepresentative::model()->findByAttributes(array('Group_Id' => $id));
        $address_model = empty($address_exists) ? new GroupRepresentative : $address_exists;

//        $member_exists = GroupMember::model()->findByAttributes(array('Group_Id' => $id));
//        $member_model = empty($member_exists) ? new GroupMember : $member_exists;
        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation(array($model, $payment_model, $managed_model, $biograph_model, $address_model, $psedonym_model));

        if (isset($_POST['Group'])) {
            $model->attributes = $_POST['Group'];
            if ($model->save()) {
                Myclass::addAuditTrail("Updated a {$model->Group_Name} successfully.", "users");
                Yii::app()->user->setFlash('success', 'Group Updated Successfully!!!');
                $this->redirect(array('group/update/id/' . $model->Group_Id . '/tab/1'));
            }
        } elseif (isset($_POST['GroupMembers'])) {
            GroupMembers::model()->deleteAll("Group_Id = '{$model->Group_Id}'");
            if (isset($_POST['user_ids']) && !empty($_POST['user_ids'])) {
                foreach ($_POST['user_ids'] as $uid):
                    $group = new GroupMembers;
                    $group->Group_Id = $model->Group_Id;
                    $group->Group_Member_Internal_Code = $uid;
                    $group->save(false);
                endforeach;
            }
            Myclass::addAuditTrail("Memeber Saved on {$model->Group_Name} successfully.", "users");

            Yii::app()->user->setFlash('success', 'Memeber Saved Successfully!!!');
            $this->redirect(array('group/update/id/' . $model->Group_Id . '/tab/2'));
        } elseif (isset($_POST['GroupPaymentMethod'])) {
            $payment_model->attributes = $_POST['GroupPaymentMethod'];

            if ($payment_model->save()) {
                Myclass::addAuditTrail("Payment Method Saved on {$model->Group_Name} successfully.", "users");
                Yii::app()->user->setFlash('success', 'Payment Method Saved Successfully!!!');
                $this->redirect(array('group/update/id/' . $payment_model->Group_Id . '/tab/3'));
            }
        } elseif (isset($_POST['GroupBiography'])) {
            $biograph_model->attributes = $_POST['GroupBiography'];
            if ($biograph_model->save()) {
                Myclass::addAuditTrail("Biography Saved on {$model->Group_Name} successfully.", "users");
                Yii::app()->user->setFlash('success', 'Biography Saved Successfully!!!');
                $this->redirect(array('group/update/id/' . $biograph_model->Group_Id . '/tab/4'));
            }
        } elseif (isset($_POST['GroupPseudonym'])) {
            $psedonym_model->attributes = $_POST['GroupPseudonym'];

            if ($psedonym_model->save()) {
                Myclass::addAuditTrail("Pseudonym Saved on {$model->Group_Name} successfully.", "users");
                Yii::app()->user->setFlash('success', 'Pseudonym Saved Successfully!!!');
                $this->redirect(array('group/update/id/' . $psedonym_model->Group_Id . '/tab/5'));
            }
        } elseif (isset($_POST['GroupManageRights'])) {
            $managed_model->attributes = $_POST['GroupManageRights'];

            if ($managed_model->validate()) {
                if ($managed_model->save()) {
                    Myclass::addAuditTrail("Managed Rights Saved on {$model->Group_Name} successfully.", "users");
                    Yii::app()->user->setFlash('success', 'Managed Rights Saved Successfully!!!');
                    $this->redirect(array('group/update/id/' . $managed_model->Group_Id . '/tab/6'));
                }
            }
        } elseif (isset($_POST['GroupRepresentative'])) {
            $address_model->attributes = $_POST['GroupRepresentative'];
            $address_model->Group_Unknown_Address = $_POST['GroupRepresentative']['Group_Unknown_Address'] == 0 ? 'N' : 'Y';

            if ($address_model->save()) {
                Myclass::addAuditTrail("Address Saved on {$model->Group_Name} successfully.", "users");
                Yii::app()->user->setFlash('success', 'Address Saved Successfully!!!');
                $this->redirect(array('group/update/id/' . $address_model->Group_Id . '/tab/7'));
            }
        }

        $this->render('update', compact('model', 'payment_model', 'managed_model', 'biograph_model', 'tab', 'address_model', 'psedonym_model'));
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
            Myclass::addAuditTrail("Deleted a {$model->Group_Name} successfully.", "group");
        } catch (CDbException $e) {
            if ($e->errorInfo[1] == 1451) {
                throw new CHttpException(400, Yii::t('err', 'Relation Restriction Error.'));
            } else {
                throw $e;
            }
        }

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax'])) {
            if($model->Group_Is_Author == '1'){
                $role = 'author';
            }elseif($model->Group_Is_Performer == '1'){
                $role = 'performer';
            }
            Yii::app()->user->setFlash('success', 'Group Deleted Successfully!!!');
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('group/index/role/'.$role));
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex($role = NULL) {
        $search = false;
        $model = new Group();
        $searchModel = new Group('search');
        $searchModel->unsetAttributes();  // clear any default values
        if (isset($_GET['Group'])) {
            $search = true;
            $role = $_GET['Group']['is_auth_performer'];
            
            $searchModel->attributes = $_GET['Group'];
            $searchModel->search_status = $_GET['Group']['search_status'];
            $searchModel->is_auth_performer = $role;
            $searchModel->search();
        }
        $model->is_auth_performer = $role;

        if ($this->isExportRequest()) {
            $this->exportCSV(array('Groups:'), null, false);
            $this->exportCSV($model->search(), array('Group_Internal_Code', 'Group_Name'));
        }

        $this->render('index', compact('searchModel', 'search', 'model', 'role'));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Group('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Group']))
            $model->attributes = $_GET['Group'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Group the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Group::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Group $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && (
                $_POST['ajax'] === 'group-form' || $_POST['ajax'] === 'group-payment-method-form' || $_POST['ajax'] === 'group-managed-rights-form' || $_POST['ajax'] === 'group-account-address-form' || $_POST['ajax'] === 'group-pseudonym-form' || $_POST['ajax'] === 'group-biography-form' || $_POST['ajax'] === 'group-member-form'
                )) {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
