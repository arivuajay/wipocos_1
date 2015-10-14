<?php

class DistributionlogsheetController extends Controller {
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
            'pdf' => 'application.components.actions.pdf',
            'download' => 'application.components.actions.download',
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
                'actions' => array('index', 'view', 'create', 'update', 'admin', 'delete', 'pdf', 'download', 'logsheet'),
                'expression' => 'UserIdentity::checkAccess()',
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

        $export = isset($_REQUEST['export']) && $_REQUEST['export'] == 'PDF';
        $compact = compact('model', 'export');
        if ($export) {
            $mPDF1 = Yii::app()->ePdf->mpdf();
            $stylesheet = $this->pdfStyles();
            $mPDF1->WriteHTML($stylesheet, 1);
            $mPDF1->WriteHTML($this->renderPartial('view', $compact, true));
            $mPDF1->Output("DistributionLogsheet_view_{$id}.pdf", EYiiPdf::OUTPUT_TO_DOWNLOAD);
        } else {
            $this->render('view', $compact);
        }
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new DistributionLogsheet;

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['DistributionLogsheet'])) {
            $model->attributes = $_POST['DistributionLogsheet'];
            if ($model->save()) {
                Myclass::addAuditTrail("Created DistributionLogsheet successfully.", "user");
                Yii::app()->user->setFlash('success', 'DistributionLogsheet Created Successfully!!!');
                $this->redirect(array('/site/distributionlogsheet/index'));
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

        if (isset($_POST['DistributionLogsheet'])) {
            $model->attributes = $_POST['DistributionLogsheet'];
            if ($model->save()) {
                Myclass::addAuditTrail("Updated DistributionLogsheet successfully.", "user");
                Yii::app()->user->setFlash('success', 'DistributionLogsheet Updated Successfully!!!');
                $this->redirect(array('/site/distributionlogsheet/index'));
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
            Myclass::addAuditTrail("Deleted DistributionLogsheet successfully.", "user");
        } catch (CDbException $e) {
            if ($e->errorInfo[1] == 1451) {
                throw new CHttpException(400, Yii::t('err', 'Relation Restriction Error.'));
            } else {
                throw $e;
            }
        }

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax'])) {
            Yii::app()->user->setFlash('success', 'DistributionLogsheet Deleted Successfully!!!');
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/site/distributionlogsheet/index'));
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $search = false;

        $model = new DistributionLogsheet();
        $searchModel = new DistributionLogsheet('search');
        $searchModel->unsetAttributes();  // clear any default values
        if (isset($_GET['DistributionLogsheet'])) {
            $search = true;
            $searchModel->attributes = $_GET['DistributionLogsheet'];
            $searchModel->search();
        }

        $this->render('index', compact('searchModel', 'search', 'model'));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new DistributionLogsheet('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['DistributionLogsheet']))
            $model->attributes = $_GET['DistributionLogsheet'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return DistributionLogsheet the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = DistributionLogsheet::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param DistributionLogsheet $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'distribution-logsheet-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionLogsheet($id) {
        $model = DistributionLogsheet::model()->findByAttributes(array('Period_Id' => $id));
        $list_model = new DistributionLogsheetList;
        if(empty($model)){
            $model = new DistributionLogsheet;
            $period_model = DistributionUtlizationPeriod::model()->findByPk($id);
        }else{
            $period_model = $model->period;
        }
        $this->render('logsheet', compact('model', 'period_model', 'list_model'));
    }
}
