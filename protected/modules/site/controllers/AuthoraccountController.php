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

    public function actions() {
        return array(
            'download' => 'application.components.actions.download',
        );
    }

        public function behaviors() {
        return array(
            'exportableGrid' => array(
                'class' => 'application.components.ExportableGridBehavior',
                'filename' => "Authors_".time().".csv",
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
                'actions' => array('index', 'view', 'create', 'update', 'admin', 'delete', 'filedelete','download'),
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

        $this->render('view', compact('model', 'address_model', 'payment_model', 'psedonym_model', 'death_model', 'managed_model', 'biograph_model'));
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
                Yii::app()->user->setFlash('success', 'AuthorAccount Created Successfully, Please Fill Managed Rights!!!');
                $this->redirect('update/id/' . $model->Auth_Acc_Id . '/tab/6');
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

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation(array(
            $model, $address_model, $payment_model, $psedonym_model, $death_model, $managed_model,
            $biograph_model));

        if (isset($_POST['AuthorAccount'])) {
            $model->attributes = $_POST['AuthorAccount'];
            if ($model->save()) {
                Yii::app()->user->setFlash('success', 'AuthorAccount Updated Successfully!!!');
                $this->redirect(array('authoraccount/update/id/' . $model->Auth_Acc_Id . '/tab/1'));
            }
        } elseif (isset($_POST['AuthorAccountAddress'])) {
            $address_model->attributes = $_POST['AuthorAccountAddress'];
            $address_model->Auth_Unknown_Address = $_POST['AuthorAccountAddress']['Auth_Unknown_Address'] == 0 ? 'N' : 'Y';

            if ($address_model->save()) {
                Yii::app()->user->setFlash('success', 'Address Saved Successfully!!!');
                $this->redirect(array('authoraccount/update/id/' . $address_model->Auth_Acc_Id . '/tab/2'));
            }
        } elseif (isset($_POST['AuthorPaymentMethod'])) {
            $payment_model->attributes = $_POST['AuthorPaymentMethod'];

            if ($payment_model->save()) {
                Yii::app()->user->setFlash('success', 'Payment Method Saved Successfully!!!');
                $this->redirect(array('authoraccount/update/id/' . $payment_model->Auth_Acc_Id . '/tab/3'));
            }
        } elseif (isset($_POST['AuthorBiography'])) {
            $biograph_model->attributes = $_POST['AuthorBiography'];
            $ids = isset($_POST['group_ids']) ? implode(',', $_POST['group_ids']) : '';
            $biograph_model->Auth_Biogrph_Aff_Groups_Ids = $ids;

            if ($biograph_model->save()) {
                Yii::app()->user->setFlash('success', 'Biography Saved Successfully!!!');
                $this->redirect(array('authoraccount/update/id/' . $biograph_model->Auth_Acc_Id . '/tab/4'));
            }
        } elseif (isset($_POST['AuthorPseudonym'])) {
            $psedonym_model->attributes = $_POST['AuthorPseudonym'];

            if ($psedonym_model->save()) {
                Yii::app()->user->setFlash('success', 'Pseudonym Saved Successfully!!!');
                $this->redirect(array('authoraccount/update/id/' . $psedonym_model->Auth_Acc_Id . '/tab/5'));
            }
        } elseif (isset($_POST['AuthorManageRights'])) {
            $managed_model->attributes = $_POST['AuthorManageRights'];

            if ($managed_model->validate()) {
                if ($managed_model->save()) {
                    Yii::app()->user->setFlash('success', 'Managed Rights Saved Successfully!!!');
                    $this->redirect(array('authoraccount/update/id/' . $managed_model->Auth_Acc_Id . '/tab/6'));
                }
            }
        } elseif (isset($_POST['AuthorDeathInheritance'])) {
            $death_model->attributes = $_POST['AuthorDeathInheritance'];

            if ($death_model->save()) {
                Yii::app()->user->setFlash('success', 'Death Inheritance Saved Successfully!!!');
                $this->redirect(array('authoraccount/update/id/' . $death_model->Auth_Acc_Id . '/tab/7'));
            }
        } elseif (isset($_POST['AuthorUpload'])) {
            $upload_model->attributes = $_POST['AuthorUpload'];
            $upload_model->setAttribute('Auth_Upl_File', isset($_FILES['AuthorUpload']['Auth_Upl_File']) ? $_FILES['AuthorManageRights']['Auth_Upl_File'] : '');

            if ($upload_model->validate()) {
                $upload_model->setUploadDirectory(UPLOAD_DIR);
                $upload_model->uploadFile();
                if ($upload_model->save()) {
                    Yii::app()->user->setFlash('success', 'Document saved Successfully!!!');
                    $this->redirect(array('authoraccount/update/id/' . $death_model->Auth_Acc_Id . '/tab/8'));
                }
            } else {
                Yii::app()->user->setFlash('danger', 'Failed to upload document.!!!');
                if ($tab != '8')
                    $this->redirect(array('authoraccount/update/id/' . $id . '/tab/8'));
            }
        }

        $this->render('update', compact(
                        'tab', 'model', 'address_model', 'payment_model', 'psedonym_model', 'death_model', 'managed_model', 'biograph_model', 'upload_model'));
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

    public function actionFiledelete($id) {
        $model = AuthorUpload::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        $auth_acc_id = $model->Auth_Acc_Id;

        $model->setUploadDirectory(UPLOAD_DIR);
        $model->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax'])) {
            Yii::app()->user->setFlash('success', 'Uploaded file Deleted Successfully!!!');
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/site/authoraccount/update/id/' . $auth_acc_id . '/tab/8/fileedit/' . $id));
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
            $searchModel->search();
        }

        if ($this->isExportRequest()) {
            $this->exportCSV(array('Authors Accounts:'), null, false);
            $this->exportCSV($model->search(), array('Auth_Acc_Id', 'Auth_First_Name', 'Auth_Sur_Name', 'Auth_Internal_Code'));
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
        if (isset($_POST['ajax']) && ($_POST['ajax'] === 'author-account-form' || $_POST['ajax'] === 'author-account-address-form' || $_POST['ajax'] === 'author-payment-method-form' || $_POST['ajax'] === 'author-pseudonym-form' || $_POST['ajax'] === 'author-death-inheritance-form' || $_POST['ajax'] === 'author-related-rights-form' || $_POST['ajax'] === 'author-managed-rights-form' || $_POST['ajax'] === 'author-biography-form' || $_POST['ajax'] === 'author-upload-form'
                )) {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
