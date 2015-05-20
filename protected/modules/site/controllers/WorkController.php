<?php

class WorkController extends Controller {
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
        $model = new Work;

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['Work'])) {
            $model->attributes = $_POST['Work'];
            if ($model->save()) {
//                $model->save(false);
                Myclass::addAuditTrail("Created Work successfully.", "sliders");
                Yii::app()->user->setFlash('success', 'Work Created Successfully. Please Fill Doucmentation!!!');
                $this->redirect(array('/site/work/update/id/' . $model->Work_Id . '/tab/4'));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id, $tab = 1, $edit = NULL) {
        $model = $this->loadModel($id);
        $sub_title_model = $edit == NULL ? new WorkSubtitle : WorkSubtitle::model()->findByAttributes(array('Work_Subtitle_Id' => $edit));

        $biograph_exists = WorkBiography::model()->findByAttributes(array('Work_Id' => $id));
        $biograph_model = empty($biograph_exists) ? new WorkBiography : $biograph_exists;

        $document_exists = WorkDocumentation::model()->findByAttributes(array('Work_Id' => $id));
        $document_model = empty($document_exists) ? new WorkDocumentation : $document_exists;

        $publishing_exists = WorkPublishing::model()->findByAttributes(array('Work_Id' => $id));
        $publishing_model = empty($publishing_exists) ? new WorkPublishing : $publishing_exists;

        $sub_publishing_exists = WorkSubPublishing::model()->findByAttributes(array('Work_Id' => $id));
        $sub_publishing_model = empty($sub_publishing_exists) ? new WorkSubPublishing : $sub_publishing_exists;

        $right_holder_model = new WorkRightholder;

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation(array($model, $sub_title_model, $biograph_model, $document_model, $publishing_model,
            $sub_publishing_model, $right_holder_model));

        if (isset($_POST['Work'])) {
            $model->attributes = $_POST['Work'];
            if ($model->save()) {
                Myclass::addAuditTrail("Updated Work successfully.", "sliders");
                Yii::app()->user->setFlash('success', 'Work Updated Successfully!!!');
                $this->redirect(array('/site/work/update/id/' . $model->Work_Id));
            }
        } elseif (isset($_POST['WorkSubtitle'])) {
            $sub_title_model->attributes = $_POST['WorkSubtitle'];
            if ($sub_title_model->save()) {
                Myclass::addAuditTrail("Saved Work Subtitle successfully.", "sliders");
                Yii::app()->user->setFlash('success', 'Work Subtitle Saved Successfully!!!');
                $this->redirect(array('/site/work/update/id/' . $model->Work_Id . '/tab/2'));
            }
        } elseif (isset($_POST['WorkBiography'])) {
            $biograph_model->attributes = $_POST['WorkBiography'];
            if ($biograph_model->save()) {
                Myclass::addAuditTrail("Saved Work Biography successfully.", "sliders");
                Yii::app()->user->setFlash('success', 'Work Biography Saved Successfully!!!');
                $this->redirect(array('/site/work/update/id/' . $model->Work_Id . '/tab/3'));
            }
        } elseif (isset($_POST['WorkDocumentation'])) {
            $document_model->attributes = $_POST['WorkDocumentation'];
            if ($document_model->save()) {
                Myclass::addAuditTrail("Saved Work Documentation successfully.", "sliders");
                Yii::app()->user->setFlash('success', 'Work Documentation Saved Successfully!!!');
                $this->redirect(array('/site/work/update/id/' . $model->Work_Id . '/tab/4'));
            }
        } elseif (isset($_POST['WorkPublishing'])) {
            $publishing_model->attributes = $_POST['WorkPublishing'];
            if ($publishing_model->save()) {
                Myclass::addAuditTrail("Saved Work Publishing successfully.", "sliders");
                Yii::app()->user->setFlash('success', 'Work Publishing Saved Successfully!!!');
                $this->redirect(array('/site/work/update/id/' . $model->Work_Id . '/tab/5'));
            }
        } elseif (isset($_POST['WorkSubPublishing'])) {
            $sub_publishing_model->attributes = $_POST['WorkSubPublishing'];
            if ($sub_publishing_model->save()) {
                Myclass::addAuditTrail("Saved Work Sub Publishing successfully.", "sliders");
                Yii::app()->user->setFlash('success', 'Work Sub Publishing Saved Successfully!!!');
                $this->redirect(array('/site/work/update/id/' . $model->Work_Id . '/tab/6'));
            }
        } elseif (isset($_POST['WorkRightholder'])) {
            $right_holder_model->attributes = $_POST['WorkRightholder'];
            if ($right_holder_model->save()) {
                Myclass::addAuditTrail("Saved Work right holder successfully.", "sliders");
                Yii::app()->user->setFlash('success', 'Work right holder Saved Successfully!!!');
                $this->redirect(array('/site/work/update/id/' . $model->Work_Id . '/tab/7'));
            }
        } elseif (isset($_REQUEST['rght_holder'])) {
            $criteria = new CDbCriteria();
            $pubcriteria = new CDbCriteria();
            if (!empty($_REQUEST['sur'])) {
                $criteria->addCondition("Auth_Sur_Name = '{$_REQUEST['sur']}'");
                $pubcriteria->addCondition("Pub_Corporate_Name = '{$_REQUEST['sur']}'");
            }
            if (!empty($_REQUEST['fn'])) {
                $criteria->addCondition("Auth_First_Name = '{$_REQUEST['fn']}'");
                $pubcriteria->addCondition("Pub_Corporate_Name = '{$_REQUEST['fn']}'");
            }
            if (!empty($_REQUEST['i_code'])) {
                $criteria->addCondition("Auth_Internal_Code = '{$_REQUEST['i_code']}'");
                $pubcriteria->addCondition("Pub_Internal_Code = '{$_REQUEST['i_code']}'");
            }
            if (!empty($_REQUEST['i_name'])) {
                $criteria->addCondition("Auth_Ipi = '{$_REQUEST['i_name']}'");
                $pubcriteria->addCondition("Pub_Ipi = '{$_REQUEST['i_name']}'");
            }
            if (!empty($_REQUEST['i_base'])) {
                $criteria->addCondition("Auth_Ipi_Base_Number = '{$_REQUEST['i_base']}'");
                $pubcriteria->addCondition("Pub_Ipi_Base_Number = '{$_REQUEST['i_base']}'");
            }

            if ($_REQUEST['is_auth'] == '1') {
                $authusers = AuthorAccount::model()->with('authorManageRights')->isStatusActive()->findAll($criteria);
            }
            if ($_REQUEST['is_publ'] == '1') {
                $publusers = PublisherAccount::model()->with('publisherManageRights')->isStatusActive()->findAll($pubcriteria);
            }

            $tab = 7;
        }

        $this->render('update', compact('model', 'sub_title_model', 'tab', 'biograph_model', 'document_model', 'publishing_model', 'sub_publishing_model', 'right_holder_model', 'authusers', 'publusers'));
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
            Myclass::addAuditTrail("Deleted Work successfully.", "sliders");
        } catch (CDbException $e) {
            if ($e->errorInfo[1] == 1451) {
                throw new CHttpException(400, Yii::t('err', 'Relation Restriction Error.'));
            } else {
                throw $e;
            }
        }

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax'])) {
            Yii::app()->user->setFlash('success', 'Work Deleted Successfully!!!');
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $search = false;

        $model = new Work();
        $searchModel = new Work('search');
        $searchModel->unsetAttributes();  // clear any default values
        if (isset($_GET['Work'])) {
            $search = true;
            $searchModel->attributes = $_GET['Work'];
            $searchModel->search();
        }

        $this->render('index', compact('searchModel', 'search', 'model'));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Work('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Work']))
            $model->attributes = $_GET['Work'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Work the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Work::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        $model->setDuration();
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Work $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && (
                $_POST['ajax'] === 'work-form' || $_POST['ajax'] === 'work-subtitle-form' || $_POST['ajax'] === 'work-biography-form' || $_POST['ajax'] === 'work-documentation-form' || $_POST['ajax'] === 'work-publishing-form' || $_POST['ajax'] === 'work-sub-publishing-form' || $_POST['ajax'] === 'work-rightholder-form'
                )) {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
