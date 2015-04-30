<?php

class PerformeraccountController extends Controller {
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
                'filename' => "Performers_" . time() . ".csv",
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
                'actions' => array('index', 'view', 'create', 'update', 'admin', 'delete', 'filedelete'),
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
        $address_exists = PerformerAccountAddress::model()->findByAttributes(array('Perf_Acc_Id' => $id));
        $address_model = empty($address_exists) ? array() : $address_exists;

        $payment_exists = PerformerPaymentMethod::model()->findByAttributes(array('Perf_Acc_Id' => $id));
        $payment_model = empty($payment_exists) ? array() : $payment_exists;

        $psedonym_exists = PerformerPseudonym::model()->findByAttributes(array('Perf_Acc_Id' => $id));
        $psedonym_model = empty($psedonym_exists) ? array() : $psedonym_exists;

        $death_exists = PerformerDeathInheritance::model()->findByAttributes(array('Perf_Acc_Id' => $id));
        $death_model = empty($death_exists) ? array() : $death_exists;

        $related_exists = PerformerRelatedRights::model()->findByAttributes(array('Perf_Acc_Id' => $id));
        $related_model = empty($related_exists) ? array() : $related_exists;

        $biograph_exists = PerformerBiography::model()->findByAttributes(array('Perf_Acc_Id' => $id));
        $biograph_model = empty($biograph_exists) ? array() : $biograph_exists;

        $this->render('view', compact('model', 'address_model', 'payment_model', 'psedonym_model', 'death_model', 'related_model', 'biograph_model'));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new PerformerAccount;
        $address_model = new PerformerAccountAddress;

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['PerformerAccount'])) {
            $model->attributes = $_POST['PerformerAccount'];
            $model->setAttribute('Perf_DOB', $_POST['PerformerAccount']['Perf_DOB']);
            if ($model->save()) {
                Yii::app()->user->setFlash('success', 'PerformerAccount Created Successfully. Please fill related rights!!!');
                $this->redirect('update/id/' . $model->Perf_Acc_Id . '/tab/6');
            }
        } else {
            $model->Perf_Birth_Country_Id = 2;
            $model->Perf_Nationality_Id = 2;
            $model->Perf_Language_Id = 1;
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
        $address_exists = PerformerAccountAddress::model()->findByAttributes(array('Perf_Acc_Id' => $id));
        $address_model = empty($address_exists) ? new PerformerAccountAddress : $address_exists;

        $payment_exists = PerformerPaymentMethod::model()->findByAttributes(array('Perf_Acc_Id' => $id));
        $payment_model = empty($payment_exists) ? new PerformerPaymentMethod : $payment_exists;

        $psedonym_exists = PerformerPseudonym::model()->findByAttributes(array('Perf_Acc_Id' => $id));
        $psedonym_model = empty($psedonym_exists) ? new PerformerPseudonym : $psedonym_exists;

        $death_exists = PerformerDeathInheritance::model()->findByAttributes(array('Perf_Acc_Id' => $id));
        $death_model = empty($death_exists) ? new PerformerDeathInheritance : $death_exists;

        $related_exists = PerformerRelatedRights::model()->findByAttributes(array('Perf_Acc_Id' => $id));
        $related_model = empty($related_exists) ? new PerformerRelatedRights : $related_exists;

        $biograph_exists = PerformerBiography::model()->findByAttributes(array('Perf_Acc_Id' => $id));
        $biograph_model = empty($biograph_exists) ? new PerformerBiography : $biograph_exists;

        $upload_model = new PerformerUpload('create');
        if ($fileedit != NULL) {
            $upload_exists = PerformerUpload::model()->findByPk($fileedit);
            $upload_model = empty($upload_exists) ? new PerformerUpload('create') : $upload_exists;
        }

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation(array(
            $model, $address_model, $payment_model, $psedonym_model, $death_model, $related_model, $biograph_model));

        if (isset($_POST['PerformerAccount'])) {
            $model->attributes = $_POST['PerformerAccount'];
            $model->setAttribute('Perf_DOB', $_POST['PerformerAccount']['Perf_DOB']);
            if ($model->save()) {
                Yii::app()->user->setFlash('success', 'PerformerAccount Updated Successfully!!!');
                $this->redirect(array('performeraccount/update/id/' . $model->Perf_Acc_Id . '/tab/1'));
            }
        } elseif (isset($_POST['PerformerAccountAddress'])) {
            $address_model->attributes = $_POST['PerformerAccountAddress'];
            $address_model->Perf_Unknown_Address = $_POST['PerformerAccountAddress']['Perf_Unknown_Address'] == 0 ? 'N' : 'Y';

            if ($address_model->save()) {
                Yii::app()->user->setFlash('success', 'Address Saved Successfully!!!');
                $this->redirect(array('performeraccount/update/id/' . $address_model->Perf_Acc_Id . '/tab/2'));
            }
        } elseif (isset($_POST['PerformerPaymentMethod'])) {
            $payment_model->attributes = $_POST['PerformerPaymentMethod'];

            if ($payment_model->save()) {
                Yii::app()->user->setFlash('success', 'Payment Method Saved Successfully!!!');
                $this->redirect(array('performeraccount/update/id/' . $payment_model->Perf_Acc_Id . '/tab/3'));
            }
        } elseif (isset($_POST['PerformerBiography'])) {
            $biograph_model->attributes = $_POST['PerformerBiography'];

            if ($biograph_model->save()) {
                GroupMembers::model()->deleteAll("Group_Member_Internal_Code = '{$model->Perf_Internal_Code}'");
                if (isset($_POST['group_ids']) && !empty($_POST['group_ids'])) {
                    foreach ($_POST['group_ids'] as $gid):
                        $group = new GroupMembers;
                        $group->Group_Id = $gid;
                        $group->Group_Member_Internal_Code = $model->Perf_Internal_Code;
                        $group->save(false);
                    endforeach;
                }
                Yii::app()->user->setFlash('success', 'Biography Saved Successfully!!!');
                $this->redirect(array('performeraccount/update/id/' . $biograph_model->Perf_Acc_Id . '/tab/4'));
            }
        } elseif (isset($_POST['PerformerPseudonym'])) {
            $psedonym_model->attributes = $_POST['PerformerPseudonym'];

            if ($psedonym_model->save()) {
                Yii::app()->user->setFlash('success', 'Pseudonym Saved Successfully!!!');
                $this->redirect(array('performeraccount/update/id/' . $psedonym_model->Perf_Acc_Id . '/tab/5'));
            }
        } elseif (isset($_POST['PerformerRelatedRights'])) {
            $related_model->attributes = $_POST['PerformerRelatedRights'];

            if ($related_model->validate()) {
                if ($related_model->save()) {
                    Yii::app()->user->setFlash('success', 'Related Rights Saved Successfully!!!');
                    $this->redirect(array('performeraccount/update/id/' . $related_model->Perf_Acc_Id . '/tab/6'));
                }
            }
        } elseif (isset($_POST['PerformerDeathInheritance'])) {
            $death_model->attributes = $_POST['PerformerDeathInheritance'];

            if ($death_model->save()) {
                Yii::app()->user->setFlash('success', 'Death Inheritance Saved Successfully!!!');
                $this->redirect(array('performeraccount/update/id/' . $death_model->Perf_Acc_Id . '/tab/7'));
            }
        } elseif (isset($_POST['PerformerUpload'])) {
            $upload_model->attributes = $_POST['PerformerUpload'];
            if ($fileedit == NULL) {
                $upload_model->setAttribute('Perf_Upl_File', isset($_FILES['PerformerUpload']['name']['Perf_Upl_File']) ? $_FILES['PerformerUpload']['name']['Perf_Upl_File'] : '');
            }

            if ($upload_model->validate()) {
                $upload_model->setUploadDirectory(UPLOAD_DIR);
                $upload_model->uploadFile();
                if ($upload_model->save()) {
                    Yii::app()->user->setFlash('success', 'Document saved Successfully!!!');
                    $this->redirect(array('performeraccount/update/id/' . $death_model->Perf_Acc_Id . '/tab/8'));
                }
            } else {
                Yii::app()->user->setFlash('danger', 'Failed to upload document.!!!');
                if ($tab != '8')
                    $this->redirect(array('performeraccount/update/id/' . $id . '/tab/8'));
            }
        }

        $this->render('update', compact(
                        'tab', 'model', 'address_model', 'payment_model', 'psedonym_model', 'death_model', 'related_model', 'biograph_model', 'upload_model'));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        try {
            $this->loadModel($id)->delete();
        } catch (CDbException $e) {
            if ($e->errorInfo[1] == 1451) {
                throw new CHttpException(400, Yii::t('err', 'Relation Restriction Error.'));
            } else {
                throw $e;
            }
        }

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax'])) {
            Yii::app()->user->setFlash('success', 'PerformerAccount Deleted Successfully!!!');
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
        }
    }

    public function actionFiledelete($id) {
        $model = PerformerUpload::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        $perf_acc_id = $model->Perf_Acc_Id;

        $model->setUploadDirectory(UPLOAD_DIR);
        try {
            $model->delete();
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
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/site/performeraccount/update/id/' . $perf_acc_id . '/tab/8/fileedit/' . $id));
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $search = false;

        $model = new PerformerAccount();
        $searchModel = new PerformerAccount('search');
        $searchModel->unsetAttributes();  // clear any default values
        if (isset($_REQUEST['PerformerAccount']['record_search']) && !empty($_REQUEST['PerformerAccount']['record_search'])) {
            $model->unsetAttributes();
            $model->attributes = $_REQUEST['PerformerAccount'];
            $model->search();
        } else if (isset($_GET['PerformerAccount'])) {
            $search = true;
            $searchModel->attributes = $_GET['PerformerAccount'];
            $searchModel->search_status = $_GET['PerformerAccount']['search_status'];
            $searchModel->search();
        }

        if ($this->isExportRequest()) { //<==== [[ADD THIS BLOCK BEFORE RENDER]]
//            set_time_limit(0); //Uncomment to export lage datasets
            //Add to the csv a single line of text
            $this->exportCSV(array('Performers Accounts:'), null, false);
            //Add to the csv a single model data with 3 empty rows after the data
//            $this->exportCSV($model, array_keys($model->attributeLabels()), false, 3);
            //Add to the csv a lot of models from a CDataProvider
            $this->exportCSV($model->search(), array('Perf_Internal_Code', 'Perf_First_Name', 'Perf_Sur_Name', 'Perf_Ipi'));
        }



        $this->render('index', compact('searchModel', 'search', 'model'));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new PerformerAccount('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['PerformerAccount']))
            $model->attributes = $_GET['PerformerAccount'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return PerformerAccount the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = PerformerAccount::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param PerformerAccount $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && (
                $_POST['ajax'] === 'performer-account-form' || $_POST['ajax'] === 'performer-account-address-form' || $_POST['ajax'] === 'performer-payment-method-form' || $_POST['ajax'] === 'performer-pseudonym-form' || $_POST['ajax'] === 'performer-death-inheritance-form' || $_POST['ajax'] === 'performer-related-rights-form' || $_POST['ajax'] === 'performer-managed-rights-form' || $_POST['ajax'] === 'performer-biography-form' || $_POST['ajax'] === 'performer-upload-form'
                )) {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
