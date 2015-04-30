<?php

class MastermanagedrightsController extends Controller {
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
        $model = new MasterManagedRights;

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['MasterManagedRights'])) {
            $model->attributes = $_POST['MasterManagedRights'];
            if ($model->save()) {
                Myclass::addAuditTrail("Created Master Manage Rights {$model->Mgd_Rights_Name} successfully.", "copyright");
                Yii::app()->user->setFlash('success', 'MasterManagedRights Created Successfully!!!');
                //$this->redirect(array('view','id'=>$model->Master_Mgd_Rights_Id));
                $this->redirect(array('index'));
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
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['MasterManagedRights'])) {
            $model->attributes = $_POST['MasterManagedRights'];
            if ($model->save()) {
                Myclass::addAuditTrail("Updated Master Manage Rights {$model->Mgd_Rights_Name} successfully.", "copyright");
                Yii::app()->user->setFlash('success', 'MasterManagedRights Updated Successfully!!!');
//				$this->redirect(array('view','id'=>$model->Master_Mgd_Rights_Id));
                $this->redirect(array('index'));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
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
            Myclass::addAuditTrail("Deleted Master Manage Rights {$model->Mgd_Rights_Name} successfully.", "copyright");
        } catch (CDbException $e) {
            if ($e->errorInfo[1] == 1451) {
                throw new CHttpException(400, Yii::t('err', 'Relation Restriction Error.'));
            } else {
                throw $e;
            }
        }

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax'])) {
            Yii::app()->user->setFlash('success', 'MasterManagedRights Deleted Successfully!!!');
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $search = false;

        $model = new MasterManagedRights();
        $searchModel = new MasterManagedRights('search');
        $searchModel->unsetAttributes();  // clear any default values
        if (isset($_GET['MasterManagedRights'])) {
            $search = true;
            $searchModel->attributes = $_GET['MasterManagedRights'];
            $searchModel->search();
        }

        $this->render('index', compact('searchModel', 'search', 'model'));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new MasterManagedRights('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['MasterManagedRights']))
            $model->attributes = $_GET['MasterManagedRights'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return MasterManagedRights the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = MasterManagedRights::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param MasterManagedRights $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'master-managed-rights-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
