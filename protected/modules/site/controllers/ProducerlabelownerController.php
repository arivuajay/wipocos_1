<?php

class ProducerlabelownerController extends Controller {
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
                'actions' => array('index', 'view', 'create', 'update', 'admin', 'delete', 'insertlabel'),
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
        $model = new ProducerLabelOwner;

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['ProducerLabelOwner'])) {
            $model->attributes = $_POST['ProducerLabelOwner'];
            if ($model->save()) {
                Myclass::addAuditTrail("Created ProducerLabelOwner successfully.", "file-image-o");
                Yii::app()->user->setFlash('success', 'ProducerLabelOwner Created Successfully!!!');
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

        if (isset($_POST['ProducerLabelOwner'])) {
            $model->attributes = $_POST['ProducerLabelOwner'];
            if ($model->save()) {
                Myclass::addAuditTrail("Updated ProducerLabelOwner successfully.", "file-image-o");
                Yii::app()->user->setFlash('success', 'ProducerLabelOwner Updated Successfully!!!');
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
            Myclass::addAuditTrail("Deleted ProducerLabelOwner successfully.", "file-image-o");
        } catch (CDbException $e) {
            if ($e->errorInfo[1] == 1451) {
                throw new CHttpException(400, Yii::t('err', 'Relation Restriction Error.'));
            } else {
                throw $e;
            }
        }

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax'])) {
            Yii::app()->user->setFlash('success', 'ProducerLabelOwner Deleted Successfully!!!');
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $search = false;

        $model = new ProducerLabelOwner();
        $searchModel = new ProducerLabelOwner('search');
        $searchModel->unsetAttributes();  // clear any default values
        if (isset($_GET['ProducerLabelOwner'])) {
            $search = true;
            $searchModel->attributes = $_GET['ProducerLabelOwner'];
            $searchModel->search();
        }

        $this->render('index', compact('searchModel', 'search', 'model'));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new ProducerLabelOwner('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['ProducerLabelOwner']))
            $model->attributes = $_GET['ProducerLabelOwner'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return ProducerLabelOwner the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = ProducerLabelOwner::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param ProducerLabelOwner $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'producer-label-owner-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    
    public function actionInsertlabel() {
        if(isset($_POST)){
            $valid = true;
            foreach ($_POST['ProducerLabelOwner'] as $values) {
                $model = new ProducerLabelOwner;
                $model->attributes = $values;
                $valid = $valid && $model->save(false);
                if($valid)
                    Myclass::addAuditTrail("Created Producer label {$model->label->Label_Name} successfully.", "file-image-o");
            }
            if($valid)
                $this->redirect(array('/site/producerlabelowner/index'));
        }
    }

}
