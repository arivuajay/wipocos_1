<?php

class ContractinvoiceController extends Controller {
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
                'actions' => array('index', 'view', 'create', 'update', 'admin', 'delete', 'pdf', 'download', 'searchcontract', 'getinvoice', 'invoice'),
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
            $mPDF1->Output("ContractInvoice_view_{$id}.pdf", EYiiPdf::OUTPUT_TO_DOWNLOAD);
        } else {
            $this->render('view', $compact);
        }
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($id = NULL) {
        $new_model = new ContractInvoice;
        $cont_model = array();

        if ($id != NULL) {
            $cont_model = TariffContracts::model()->findByPk($id);
        }

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($new_model);

        if (isset($_POST['ContractInvoice'])) {
            $new_model->attributes = $_POST['ContractInvoice'];
            if ($new_model->save()) {
//                $society_name = '';
//                $soceity = Society::model()->findByPk(DEFAULT_SOCIETY_ID);
//                if (!empty($soceity))
//                    $society_name = $soceity->socOrg->Org_Abbrevation;
//                $mail = new Sendmail;
//                $trans_array = array(
//                    "{CURRENT_MONTH}" => date('M'),
//                    "{INVOICE_NO}" => $new_model->Inv_Invoice,
//                    "{SOCIETY_NAME}" => $society_name,
//                    "{CUSTOMER_NAME}" => $new_model->tarfCont->tarfContUser->User_Cust_Name,
//                    "{INVOICE_AMOUNT}" => $new_model->Inv_Amount,
//                );
//                $message = $mail->getMessage(1, $trans_array);
//                $Subject = $mail->getSubject(1, $trans_array);
//                $mail->send('prakash.paramanandam@arkinfotec.com', $Subject, $message);
//                exit;
                Myclass::addAuditTrail("Created ContractInvoice successfully.", "file-text");
                Yii::app()->user->setFlash('success', 'ContractInvoice Created Successfully!!!');
                $this->redirect(array('/site/contractinvoice/update', 'id' => $new_model->Inv_Id));
            }
        }

        $this->render('create', compact('cont_model', 'new_model'));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $new_model = new ContractInvoice;
        $model = $this->loadModel($id);
        $cont_model = array();

        if ($id != NULL) {
            $cont_model = TariffContracts::model()->findByPk($model->Tarf_Cont_Id);
        }

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($new_model);

        if (isset($_POST['ContractInvoice'])) {
            $new_model->attributes = $_POST['ContractInvoice'];
            if ($new_model->save()) {
                Myclass::addAuditTrail("Updated ContractInvoice successfully.", "file-text");
                Yii::app()->user->setFlash('success', 'ContractInvoice Updated Successfully!!!');
                $this->redirect(array('/site/contractinvoice/update', 'id' => $new_model->Inv_Id));
            }
        }

        $this->render('update', compact('cont_model', 'new_model'));
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
            Myclass::addAuditTrail("Deleted ContractInvoice successfully.", "file-text");
        } catch (CDbException $e) {
            if ($e->errorInfo[1] == 1451) {
                throw new CHttpException(400, Yii::t('err', 'Relation Restriction Error.'));
            } else {
                throw $e;
            }
        }

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax'])) {
            Yii::app()->user->setFlash('success', 'ContractInvoice Deleted Successfully!!!');
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/site/contractinvoice/index'));
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $search = false;

        $model = new ContractInvoice();
        $searchModel = new ContractInvoice('search');
        $searchModel->unsetAttributes();  // clear any default values
        if (isset($_GET['ContractInvoice'])) {
            $search = true;
            $searchModel->attributes = $_GET['ContractInvoice'];
            $searchModel->search();
        }

        $this->render('index', compact('searchModel', 'search', 'model'));
    }

    public function actionGetinvoice() {
        if (isset($_GET['id'])) {
//            $model = TariffContracts::model()->findByPk($_GET['id']);
            $model = TariffContracts::model()->with('contractInvoices')->find(
                    array(
                        'condition' => 't.Tarf_Cont_Id = :id',
                        'params' => array('id' => $_GET['id']),
                        'order' => 'contractInvoices.Inv_Next_Date DESC'
                    )
            );
            $this->renderPartial('invoices', compact('model'));
        }
    }

    public function actionSearchcontract() {
        $criteria = new CDbCriteria();
        if (!empty($_REQUEST['searach_text'])) {
            $search_txt = $_REQUEST['searach_text'];
            $criteria->with = array('tarfContUser', 'tarfContInsp', 'tarfContTariff');
            $criteria->compare('tarfContUser.User_Cust_Name', $search_txt, true, 'OR');
            $criteria->compare('tarfContInsp.Insp_Name', $search_txt, true, 'OR');
            $criteria->compare('tarfContTariff.Tarif_Description', $search_txt, true, 'OR');

            $criteria->compare('Tarf_Cont_Internal_Code', $search_txt, true, 'OR');
            $criteria->compare('Tarf_Invoice', $search_txt, true, 'OR');
            $criteria->compare('Tarf_Cont_District', $search_txt, true, 'OR');
            $criteria->compare('Tarf_Cont_Area', $search_txt, true, 'OR');
            $criteria->compare('Tarf_Cont_Balance', $search_txt, true, 'OR');
            $criteria->compare('Tarf_Cont_Amt_Pay', $search_txt, true, 'OR');
            $criteria->compare('Tarf_Cont_From', $search_txt, true, 'OR');
            $criteria->compare('Tarf_Cont_To', $search_txt, true, 'OR');
            $criteria->compare('Tarf_Cont_Sign_Date', $search_txt, true, 'OR');
            $criteria->compare('Tarf_Cont_Portion', $search_txt, true, 'OR');
        }

        $contracts = TariffContracts::model()->findAll($criteria);
        $this->renderPartial('_search_contract', compact('contracts'));
    }

    public function actionInvoice($id) {
        $model = $this->loadModel($id);
        $this->render('invoice', compact('model'));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new ContractInvoice('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['ContractInvoice']))
            $model->attributes = $_GET['ContractInvoice'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return ContractInvoice the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = ContractInvoice::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param ContractInvoice $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'contract-invoice-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
