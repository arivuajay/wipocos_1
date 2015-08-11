<?php

class TariffcontractsController extends Controller {
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
                'actions' => array('index', 'view', 'create', 'update', 'admin', 'delete', 'pdf', 'download', 'searchuser', 'invoice', 'gettariff'),
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
            $mPDF1->Output("TariffContracts_view_{$id}.pdf", EYiiPdf::OUTPUT_TO_DOWNLOAD);
        } else {
            $this->render('view', $compact);
        }
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new TariffContracts;

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['TariffContracts'])) {
            $model->attributes = $_POST['TariffContracts'];
            if ($model->save()) {
                Myclass::addAuditTrail("Created TariffContracts successfully.", "user");
                Yii::app()->user->setFlash('success', 'TariffContracts Created Successfully!!!');
                $this->redirect(array('/site/tariffcontracts/index'));
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

        if (isset($_POST['TariffContracts'])) {
            $model->attributes = $_POST['TariffContracts'];
            if ($model->save()) {
                Myclass::addAuditTrail("Updated TariffContracts successfully.", "user");
                Yii::app()->user->setFlash('success', 'TariffContracts Updated Successfully!!!');
                $this->redirect(array('/site/tariffcontracts/index'));
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
            Myclass::addAuditTrail("Deleted TariffContracts successfully.", "user");
        } catch (CDbException $e) {
            if ($e->errorInfo[1] == 1451) {
                throw new CHttpException(400, Yii::t('err', 'Relation Restriction Error.'));
            } else {
                throw $e;
            }
        }

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax'])) {
            Yii::app()->user->setFlash('success', 'TariffContracts Deleted Successfully!!!');
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/site/tariffcontracts/index'));
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $search = false;

        $model = new TariffContracts();
        $searchModel = new TariffContracts('search');
        $searchModel->unsetAttributes();  // clear any default values
        if (isset($_GET['TariffContracts'])) {
            $search = true;
            $searchModel->attributes = $_GET['TariffContracts'];
            $searchModel->search();
        }

        $this->render('index', compact('searchModel', 'search', 'model'));
    }

    public function actionSearchuser() {
        $criteria = new CDbCriteria();
        if (!empty($_REQUEST['searach_text'])) {
            $search_txt = $_REQUEST['searach_text'];
            $criteria->compare('User_Cust_Code', $search_txt, true, 'OR');
            $criteria->compare('User_Cust_Name', $search_txt, true, 'OR');
            $criteria->compare('User_Cust_Address', $search_txt, true, 'OR');
            $criteria->compare('User_Cust_Email', $search_txt, true, 'OR');
            $criteria->compare('User_Cust_Telephone', $search_txt, true, 'OR');
            $criteria->compare('User_Cust_Website', $search_txt, true, 'OR');
            $criteria->compare('User_Cust_Fax', $search_txt, true, 'OR');
        }

        $users = CustomerUser::model()->findAll($criteria);
        $this->renderPartial('_search_user', compact('users'));
    }
    
    public function actionInvoice($id) {
        $model = $this->loadModel($id);
        $this->render('invoice', compact('model'));
    }
    
    public function actionGettariff() {
        $model = MasterTariff::model()->findByPk($_POST['id']);
        $return = array(
            'standard_amout' => $model->Tarif_Amount
        );
        echo json_encode($return);
        Yii::app()->end();
    }
    
    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new TariffContracts('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['TariffContracts']))
            $model->attributes = $_GET['TariffContracts'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return TariffContracts the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = TariffContracts::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param TariffContracts $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'tariff-contracts-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
