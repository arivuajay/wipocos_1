<?php

class AuthoraccountController extends Controller {
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
        $model = new AuthorAccount;
        $address_model = new AuthorAccountAddress;

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['AuthorAccount'])) {
            $model->attributes = $_POST['AuthorAccount'];
            if ($model->save()) {
                Yii::app()->user->setFlash('success', 'AuthorAccount Created Successfully!!!');
                $this->redirect('update/id/'.$model->Auth_Acc_Id);
            }
        }

        $this->render('create', array(
            'model' => $model,
            'address_model' => $address_model,
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
        $address_exists = AuthorAccountAddress::model()->findByAttributes(array('Auth_Acc_Id' => $id));
        $address_model = empty($address_exists) ? new AuthorAccountAddress :  $address_exists;

        $payment_exists = AuthorPaymentMethod::model()->findByAttributes(array('Auth_Acc_Id' => $id));
        $payment_model = empty($payment_exists) ? new AuthorPaymentMethod :  $payment_exists;

        $psedonym_exists = AuthorPseudonym::model()->findByAttributes(array('Auth_Acc_Id' => $id));
        $psedonym_model = empty($psedonym_exists) ? new AuthorPseudonym :  $psedonym_exists;

        $death_exists = AuthorDeathInheritance::model()->findByAttributes(array('Auth_Acc_Id' => $id));
        $death_model = empty($death_exists) ? new AuthorDeathInheritance :  $death_exists;

        $managed_exists = AuthorManageRights::model()->findByAttributes(array('Auth_Acc_Id' => $id));
        $managed_model = empty($managed_exists) ? new AuthorManageRights :  $managed_exists;

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation(array($model, $address_model, $payment_model, $psedonym_model, $death_model, $managed_model));

        if (isset($_POST['AuthorAccount'])) {
            $model->attributes = $_POST['AuthorAccount'];
            if ($model->save()) {
                Yii::app()->user->setFlash('success', 'AuthorAccount Updated Successfully!!!');
                $this->redirect(array('authoraccount/update/id/'.$model->Auth_Acc_Id.'/tab/1'));
            }
        }elseif (isset($_POST['AuthorAccountAddress'])) {
            $address_model->attributes = $_POST['AuthorAccountAddress'];
            $address_model->Auth_Unknown_Address = $_POST['AuthorAccountAddress']['Auth_Unknown_Address'] == 0 ? 'N' : 'Y';
                    
            if ($address_model->save()) {
                Yii::app()->user->setFlash('success', 'Address Saved Successfully!!!');
                $this->redirect(array('authoraccount/update/id/'.$address_model->Auth_Acc_Id.'/tab/2'));
            }
        }elseif (isset($_POST['AuthorPaymentMethod'])) {
            $payment_model->attributes = $_POST['AuthorPaymentMethod'];
                    
            if ($payment_model->save()) {
                Yii::app()->user->setFlash('success', 'Payment Method Saved Successfully!!!');
                $this->redirect(array('authoraccount/update/id/'.$payment_model->Auth_Acc_Id.'/tab/3'));
            }
        }elseif (isset($_POST['AuthorPseudonym'])) {
            $psedonym_model->attributes = $_POST['AuthorPseudonym'];
                    
            if ($psedonym_model->save()) {
                Yii::app()->user->setFlash('success', 'Pseudonym Saved Successfully!!!');
                $this->redirect(array('authoraccount/update/id/'.$psedonym_model->Auth_Acc_Id.'/tab/5'));
            }
        }elseif (isset($_POST['AuthorManageRights'])) {
            $managed_model->attributes = $_POST['AuthorManageRights'];
//            $managed_model->setAttribute('Auth_Rel_File', isset($_FILES['AuthorManageRights']['Auth_Mnge_File']) ? $_FILES['AuthorManageRights']['Auth_Mnge_File'] : '');
                    
            if($managed_model->validate()){
//                $managed_model->setUploadDirectory(UPLOAD_DIR);
//                $managed_model->uploadFile();
                if ($managed_model->save()) {
                    Yii::app()->user->setFlash('success', 'Managed Rights Saved Successfully!!!');
                    $this->redirect(array('authoraccount/update/id/'.$managed_model->Auth_Acc_Id.'/tab/6'));
                }
            }
        }elseif (isset($_POST['AuthorDeathInheritance'])) {
            $death_model->attributes = $_POST['AuthorDeathInheritance'];
                    
            if ($death_model->save()) {
                Yii::app()->user->setFlash('success', 'Death Inheritance Saved Successfully!!!');
                $this->redirect(array('authoraccount/update/id/'.$death_model->Auth_Acc_Id.'/tab/7'));
            }
        }

        $this->render('update', compact('tab','model','address_model','payment_model','psedonym_model','death_model','managed_model'));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax'])) {
            Yii::app()->user->setFlash('success', 'AuthorAccount Deleted Successfully!!!');
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
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
        if (isset($_GET['AuthorAccount'])) {
            $search = true;
            $searchModel->attributes = $_GET['AuthorAccount'];
            $searchModel->search();
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
        if (isset($_POST['ajax']) && ($_POST['ajax'] === 'author-account-form' 
                || $_POST['ajax'] === 'author-account-address-form'
                || $_POST['ajax'] === 'author-payment-method-form'
                || $_POST['ajax'] === 'author-pseudonym-form'
                || $_POST['ajax'] === 'author-death-inheritance-form'
                || $_POST['ajax'] === 'author-related-rights-form'
                || $_POST['ajax'] === 'author-managed-rights-form'
                )) {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
