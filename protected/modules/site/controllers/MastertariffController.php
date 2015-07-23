<?php

class MastertariffController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */

    /**
     * @return array action filters
     */
    public function filters()
    {
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
    public function accessRules()
    {
            return array(
                    array('allow',  // allow all users to perform 'index' and 'view' actions
                            'actions'=>array(''),
                            'users'=>array('*'),
                    ),
                    array('allow', // allow authenticated user to perform 'create' and 'update' actions
                            'actions'=>array('index','view','create','update','admin','delete','pdf','download'),
                            'expression'=> 'UserIdentity::checkAccess()',
                            'users'=>array('@'),
                    ),
                    array('allow', // allow admin user to perform 'admin' and 'delete' actions
                            'actions'=>array(''),
                            'users'=>array('admin'),
                    ),
                    array('deny',  // deny all users
                            'users'=>array('*'),
                    ),
            );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
            $model = $this->loadModel($id);

            $export = isset($_REQUEST['export']) && $_REQUEST['export'] == 'PDF';
            $compact = compact('model', 'export');
            if ($export) {
                $mPDF1 = Yii::app()->ePdf->mpdf();
                $stylesheet = $this->pdfStyles();
                $mPDF1->WriteHTML($stylesheet, 1);
                $mPDF1->WriteHTML($this->renderPartial('view', $compact, true));
                $mPDF1->Output("MasterTariff_view_{$id}.pdf", EYiiPdf::OUTPUT_TO_DOWNLOAD);
            } else {
                $this->render('view', $compact);
            }
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
            $model=new MasterTariff;

            // Uncomment the following line if AJAX validation is needed
            $this->performAjaxValidation($model);

            if(isset($_POST['MasterTariff']))
            {
                    $model->attributes=$_POST['MasterTariff'];
                    if($model->save()){
                            Myclass::addAuditTrail("Created MasterTariff successfully.", "user");
                            Yii::app()->user->setFlash('success', 'MasterTariff Created Successfully!!!');
                            $this->redirect(array('/site/mastertariff/index'));
                    }
            }

            $this->render('create',array(
                    'model'=>$model,
            ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
            $model=$this->loadModel($id);

            // Uncomment the following line if AJAX validation is needed
            $this->performAjaxValidation($model);

            if(isset($_POST['MasterTariff']))
            {
                    $model->attributes=$_POST['MasterTariff'];
                    if($model->save()){
                            Myclass::addAuditTrail("Updated MasterTariff successfully.", "user");
                            Yii::app()->user->setFlash('success', 'MasterTariff Updated Successfully!!!');
                            $this->redirect(array('/site/mastertariff/index'));
                    }
            }

            $this->render('update',array(
                    'model'=>$model,
            ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
            try {
                $model = $this->loadModel($id);
                $model->delete();
                Myclass::addAuditTrail("Deleted MasterTariff successfully.", "user");
            } catch (CDbException $e) {
                if ($e->errorInfo[1] == 1451) {
                    throw new CHttpException(400, Yii::t('err', 'Relation Restriction Error.'));
                } else {
                    throw $e;
                }
            }

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if(!isset($_GET['ajax'])){
                Yii::app()->user->setFlash('success', 'MasterTariff Deleted Successfully!!!');
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/site/mastertariff/index'));
            }
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $search = false;

        $model = new MasterTariff();
        $searchModel = new MasterTariff('search');
        $searchModel->unsetAttributes();  // clear any default values
        if (isset($_GET['MasterTariff'])) {
            $search = true;
            $searchModel->attributes = $_GET['MasterTariff'];
            $searchModel->search();
        }

        $this->render('index', compact('searchModel', 'search', 'model'));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
            $model=new MasterTariff('search');
            $model->unsetAttributes();  // clear any default values
            if(isset($_GET['MasterTariff']))
                    $model->attributes=$_GET['MasterTariff'];

            $this->render('admin',array(
                    'model'=>$model,
            ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return MasterTariff the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
            $model=MasterTariff::model()->findByPk($id);
            if($model===null)
                    throw new CHttpException(404,'The requested page does not exist.');
            return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param MasterTariff $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
            if(isset($_POST['ajax']) && $_POST['ajax']==='master-tariff-form')
            {
                    echo CActiveForm::validate($model);
                    Yii::app()->end();
            }
    }
}
