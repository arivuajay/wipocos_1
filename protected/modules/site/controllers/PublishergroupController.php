<?php

class PublishergroupController extends Controller {
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
                'filename' => "Publisher_Producer_Groups" . time() . ".csv",
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
        $model = new PublisherGroup;

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['PublisherGroup'])) {
            $model->attributes = $_POST['PublisherGroup'];
            if ($model->save()) {
                Myclass::addAuditTrail("Created Publisher Group {$model->Pub_Group_Internal_Code} successfully.", "group");
                Yii::app()->user->setFlash('success', 'PublisherGroup Created Successfully. Please Fill Managed Rights!!!');
                $this->redirect(array('publishergroup/update/id/' . $model->Pub_Group_Id . '/tab/6'));
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

        $payment_exists = PublisherGroupCopyrightPayment::model()->findByAttributes(array('Pub_Group_Id' => $id));
        $payment_model = empty($payment_exists) ? new PublisherGroupCopyrightPayment : $payment_exists;

        $rel_payment_exists = PublisherGroupRelatedPayment::model()->findByAttributes(array('Pub_Group_Id' => $id));
        $rel_payment_model = empty($rel_payment_exists) ? new PublisherGroupRelatedPayment : $rel_payment_exists;

        $managed_exists = PublisherGroupManageRights::model()->findByAttributes(array('Pub_Group_Id' => $id));
        $managed_model = empty($managed_exists) ? new PublisherGroupManageRights : $managed_exists;

        $psedonym_exists = PublisherGroupPseudonym::model()->findByAttributes(array('Pub_Group_Id' => $id));
        $psedonym_model = empty($psedonym_exists) ? new PublisherGroupPseudonym : $psedonym_exists;

        $biograph_exists = PublisherGroupBiography::model()->findByAttributes(array('Pub_Group_Id' => $id));
        $biograph_model = empty($biograph_exists) ? new PublisherGroupBiography : $biograph_exists;

        $address_exists = PublisherGroupRepresentative::model()->findByAttributes(array('Pub_Group_Id' => $id));
        $address_model = empty($address_exists) ? new PublisherGroupRepresentative : $address_exists;

        $org_publisher_exists = PublisherGroupOriginalPublisher::model()->findByAttributes(array('Pub_Group_Id' => $id));
        $org_publisher_model = empty($org_publisher_exists) ? new PublisherGroupOriginalPublisher : $org_publisher_exists;

        $sub_publisher_exists = PublisherGroupSubPublisher::model()->findByAttributes(array('Pub_Group_Id' => $id));
        $sub_publisher_model = empty($sub_publisher_exists) ? new PublisherGroupSubPublisher : $sub_publisher_exists;

        $org_share_publisher_exists = PublisherGroupOriginalShare::model()->findByAttributes(array('Pub_Group_Id' => $id));
        $org_share_publisher_model = empty($org_share_publisher_exists) ? new PublisherGroupOriginalShare : $org_share_publisher_exists;

        $sub_share_publisher_exists = PublisherGroupSubShare::model()->findByAttributes(array('Pub_Group_Id' => $id));
        $sub_share_publisher_model = empty($sub_share_publisher_exists) ? new PublisherGroupSubShare : $sub_share_publisher_exists;

        $catalog_exists = PublisherGroupCatalogue::model()->findByAttributes(array('Pub_Group_Id' => $id));
        if (empty($catalog_exists)) {
            $catalog_model = new PublisherGroupCatalogue('create');
        } else {
            $catalog_model = $catalog_exists;
            $catalog_model->setScenario('update');
        }

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation(array($model, $managed_model, $payment_model, $rel_payment_model, $biograph_model,
            $psedonym_model, $address_model, $org_publisher_model, $sub_publisher_model, $org_publisher_model,
            $org_share_publisher_model, $sub_share_publisher_model, $catalog_model));

        if (isset($_POST['PublisherGroup'])) {
            $model->attributes = $_POST['PublisherGroup'];
            if ($model->save()) {
                Myclass::addAuditTrail("Updated Publisher Group {$model->Pub_Group_Internal_Code} successfully.", "group");
                Yii::app()->user->setFlash('success', 'Publisher Group Updated Successfully!!!');
                $this->redirect(array('publishergroup/update/id/' . $model->Pub_Group_Id . '/tab/1'));
            }
        } elseif (isset($_POST['GroupMembers'])) {
            PublisherGroupMembers::model()->deleteAll("Pub_Group_Id = '{$model->Pub_Group_Id}'");
            if (isset($_POST['user_ids']) && !empty($_POST['user_ids'])) {
                foreach ($_POST['user_ids'] as $uid):
                    $group = new PublisherGroupMembers;
                    $group->Pub_Group_Id = $model->Pub_Group_Id;
                    $group->Pub_Group_Member_Internal_Code = $uid;
                    $group->save(false);
                endforeach;
            }

            Myclass::addAuditTrail("Updated Publisher Group Memeber {$model->Pub_Group_Internal_Code} successfully.", "group");
            Yii::app()->user->setFlash('success', 'Memeber Saved Successfully!!!');
            $this->redirect(array('publishergroup/update/id/' . $model->Pub_Group_Id . '/tab/2'));
        } elseif (isset($_POST['PublisherGroupCopyrightPayment'])) {
            $payment_model->attributes = $_POST['PublisherGroupCopyrightPayment'];

            if ($payment_model->save()) {
                Myclass::addAuditTrail("Updated Publisher Group Payment Method {$model->Pub_Group_Internal_Code} successfully.", "group");
                Yii::app()->user->setFlash('success', 'Payment Method Saved Successfully!!!');
                $this->redirect(array('publishergroup/update/id/' . $payment_model->Pub_Group_Id . '/tab/3'));
            }
        } elseif (isset($_POST['PublisherGroupRelatedPayment'])) {
            $rel_payment_model->attributes = $_POST['PublisherGroupRelatedPayment'];

            if ($rel_payment_model->save()) {
                Myclass::addAuditTrail("Updated Publisher Group Payment Method {$model->Pub_Group_Internal_Code} successfully.", "group");
                Yii::app()->user->setFlash('success', 'Payment Method Saved Successfully!!!');
                $this->redirect(array('publishergroup/update/id/' . $rel_payment_model->Pub_Group_Id . '/tab/3'));
            }
        } elseif (isset($_POST['PublisherGroupBiography'])) {
            $biograph_model->attributes = $_POST['PublisherGroupBiography'];
            if ($biograph_model->save()) {
                Yii::app()->user->setFlash('success', 'Biography Saved Successfully!!!');
                Myclass::addAuditTrail("Updated Publisher Group Biography {$model->Pub_Group_Internal_Code} successfully.", "group");
                $this->redirect(array('publishergroup/update/id/' . $biograph_model->Pub_Group_Id . '/tab/4'));
            }
        } elseif (isset($_POST['PublisherGroupPseudonym'])) {
            $psedonym_model->attributes = $_POST['PublisherGroupPseudonym'];

            if ($psedonym_model->save()) {
                Myclass::addAuditTrail("Updated Publisher Group Pseudonym {$model->Pub_Group_Internal_Code} successfully.", "group");
                Yii::app()->user->setFlash('success', 'Pseudonym Saved Successfully!!!');
                $this->redirect(array('publishergroup/update/id/' . $psedonym_model->Pub_Group_Id . '/tab/5'));
            }
        } elseif (isset($_POST['PublisherGroupManageRights'])) {
            $managed_model->attributes = $_POST['PublisherGroupManageRights'];

            if ($managed_model->validate()) {
                if ($managed_model->save()) {
                Myclass::addAuditTrail("Updated Publisher Group Managed Rights {$model->Pub_Group_Internal_Code} successfully.", "group");
                    Yii::app()->user->setFlash('success', 'Managed Rights Saved Successfully!!!');
                    $this->redirect(array('publishergroup/update/id/' . $managed_model->Pub_Group_Id . '/tab/6'));
                }
            }
        } elseif (isset($_POST['PublisherGroupRepresentative'])) {
            $address_model->attributes = $_POST['PublisherGroupRepresentative'];
            $address_model->Pub_Group_Unknown_Address = $_POST['PublisherGroupRepresentative']['Pub_Group_Unknown_Address'] == 0 ? 'N' : 'Y';

            if ($address_model->save()) {
                Myclass::addAuditTrail("Updated Publisher Group Address {$model->Pub_Group_Internal_Code} successfully.", "group");
                Yii::app()->user->setFlash('success', 'Address Saved Successfully!!!');
                $this->redirect(array('publishergroup/update/id/' . $address_model->Pub_Group_Id . '/tab/7'));
            }
        }
 
        if(isset($_POST['PublisherGroupOriginalPublisher']) 
        || isset($_POST['PublisherGroupSubPublisher'])
        || isset($_POST['PublisherGroupOriginalShare'])
        || isset($_POST['PublisherGroupSubShare'])
        || isset($_POST['PublisherGroupOriginalShare'])
        ){
            $tab = 8;
            $validate = false;
            
            if (isset($_POST['PublisherGroupOriginalPublisher'])) {
                $org_publisher_model->attributes = $_POST['PublisherGroupOriginalPublisher'];
                $validate = $org_publisher_model->save() ? true : false;
            } 
            
            if (isset($_POST['PublisherGroupSubPublisher'])) {
                $sub_publisher_model->attributes = $_POST['PublisherGroupSubPublisher'];
                $validate = $sub_publisher_model->save() ? $validate && true : false;
            } 

            if (isset($_POST['PublisherGroupOriginalShare'])) {
                $org_share_publisher_model->attributes = $_POST['PublisherGroupOriginalShare'];
                $validate = $org_share_publisher_model->save() ? $validate && true : false;
            } 

            if (isset($_POST['PublisherGroupSubShare'])) {
                $sub_share_publisher_model->attributes = $_POST['PublisherGroupSubShare'];
                $validate = $sub_share_publisher_model->save() ? $validate && true : false;
            }

            if (isset($_POST['PublisherGroupCatalogue'])) {
                $catalog_model->attributes = $_POST['PublisherGroupCatalogue'];
                if (isset($_FILES['PublisherGroupCatalogue']['name']['Pub_Group_Cat_File'])) {
                    $catalog_model->setAttribute('Pub_Group_Cat_File', $_FILES['PublisherGroupCatalogue']['name']['Pub_Group_Cat_File']);
                }

                if ($catalog_model->validate()) {
                    $catalog_model->setUploadDirectory(UPLOAD_DIR);
                    $catalog_model->uploadFile();
                    if ($catalog_model->save()) {
                        $validate = $validate && true;
                    }
                } else {
                    $validate = false;
                }
            }
            if($validate){
                Yii::app()->user->setFlash('success', 'Sub publishing Catalog saved!!!');
                Myclass::addAuditTrail("Publisher Group Subcontracted Catalogue {$model->Pub_Group_Internal_Code} saved successfully.", "group");
                $this->redirect(array('publishergroup/update/id/' . $model->Pub_Group_Id . '/tab/8'));
            }
        }
        
        $this->render('update', compact('model', 'payment_model', 'managed_model', 'biograph_model', 'tab', 'address_model', 'psedonym_model', 'rel_payment_model', 'org_publisher_model', 'sub_publisher_model', 'org_share_publisher_model', 'sub_share_publisher_model', 'catalog_model'));
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
            Myclass::addAuditTrail("Deleted Publisher Group {$model->Pub_Group_Internal_Code} successfully.", "group");
        } catch (CDbException $e) {
            if ($e->errorInfo[1] == 1451) {
                throw new CHttpException(400, Yii::t('err', 'Relation Restriction Error.'));
            } else {
                throw $e;
            }
        }

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax'])) {
            Yii::app()->user->setFlash('success', 'PublisherGroup Deleted Successfully!!!');
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $search = false;

        $model = new PublisherGroup();
        $searchModel = new PublisherGroup('search');
        $searchModel->unsetAttributes();  // clear any default values
        if (isset($_GET['PublisherGroup'])) {
            $search = true;
            $searchModel->attributes = $_GET['PublisherGroup'];
            $searchModel->search_status = $_GET['PublisherGroup']['search_status'];
            $searchModel->is_pub_producer = $_GET['PublisherGroup']['is_pub_producer'];
            $searchModel->search();
        }
        if ($this->isExportRequest()) {
            $this->exportCSV(array('Groups:'), null, false);
            $this->exportCSV($model->search(), array('Pub_Group_Internal_Code', 'Pub_Group_Corporate_Name'));
        }

        $this->render('index', compact('searchModel', 'search', 'model'));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new PublisherGroup('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['PublisherGroup']))
            $model->attributes = $_GET['PublisherGroup'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return PublisherGroup the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = PublisherGroup::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param PublisherGroup $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && (
                $_POST['ajax'] === 'publisher-group-form' || $_POST['ajax'] === 'publisher-group-managed-rights-form' || $_POST['ajax'] === 'publisher-group-copy-payment-method-form' || $_POST['ajax'] === 'publisher-group-related-payment-method-form' || $_POST['ajax'] === 'publisher-group-biography-form' || $_POST['ajax'] === 'publisher-group-pseudonym-form' || $_POST['ajax'] === 'publisher-group-account-address-form' || $_POST['ajax'] === 'publisher-group-member-form' || $_POST['ajax'] === 'publisher-group-original-publisher-form' || $_POST['ajax'] === 'publisher-group-sub-publisher-form' || $_POST['ajax'] === 'publisher-group-original-share-form' || $_POST['ajax'] === 'publisher-group-sub-share-form' || $_POST['ajax'] === 'publisher-group-catalogue-form'
                )) {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
