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
                'actions' => array('index', 'view', 'create', 'update', 'admin', 'delete', 'holderremove', 'insertright',
                    'searchright', 'print', 'pdf', 'subtitledelete', 'download', 'filedelete', 'biofiledelete'),
                'expression'=> 'UserIdentity::checkAccess()',
                'users' => array('@'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('contractexpiry'),
                'expression'=> 'UserIdentity::checkAccess(NULL, "contractexpiry", "view")',
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
        $sub_title_model = WorkSubtitle::model()->findAllByAttributes(array('Work_Id' => $id));
        $biograph_model = WorkBiography::model()->findByAttributes(array('Work_Id' => $id));
        $document_model = WorkDocumentation::model()->findByAttributes(array('Work_Id' => $id));
        $publishing_model = WorkPublishing::model()->findByAttributes(array('Work_Id' => $id));
        $sub_publishing_model = WorkSubPublishing::model()->findByAttributes(array('Work_Id' => $id));
        $members = WorkRightholder::model()->findAll('Work_Id = :int_code', array(':int_code' => $model->Work_Id));

        $export = isset($_REQUEST['export']) && $_REQUEST['export'] == 'PDF';
        $compact = compact('model', 'sub_title_model', 'biograph_model', 'document_model', 'publishing_model', 'sub_publishing_model', 'members', 'export');
        if ($export) {
            $mPDF1 = Yii::app()->ePdf->mpdf();
            $stylesheet = $this->pdfStyles();
            $mPDF1->WriteHTML($stylesheet, 1);
            $mPDF1->WriteHTML($this->renderPartial('view', $compact, true));
            $mPDF1->Output("Work_view_$id.pdf", EYiiPdf::OUTPUT_TO_DOWNLOAD);
        } else {
            $this->render('view', $compact);
        }
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
                if ($model->Work_Unknown == 'N') {
                    $message = 'Work Created Successfully. Please Fill Doucmentation!!!';
                    $tab = 4;
                } else {
                    $message = 'Work Created Successfully.';
                    $tab = 1;
                }
                Yii::app()->user->setFlash('success', $message);
                $this->redirect(array('/site/work/update', 'id' => $model->Work_Id, 'tab' => $tab));
            }
        }

        if(isset($_GET['Work'])){
            $model->attributes = $_GET['Work'];
        }
        $this->render('create', array(
            'model' => $model,
            'tab' => 1,
            'focus' => '',
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id, $tab = 1, $edit = NULL, $fileedit = NULL, $umodel = NULL) {
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

        $right_holder_exists = WorkRightholder::model()->findAllByAttributes(array('Work_Id' => $id));
        $right_holder_model = new WorkRightholder;

        $publishing_upload_model = new WorkPublishingUploads('create');
        if ($fileedit != NULL && $umodel == 'pub') {
            $publishing_upload_exists = WorkPublishingUploads::model()->findByPk($fileedit);
            $publishing_upload_model = empty($publishing_upload_exists) ? new WorkPublishingUploads('create') : $publishing_upload_exists;
        }

        $sub_publishing_upload_model = new WorkSubPublishingUploads('create');
        if ($fileedit != NULL && $umodel == 'sub') {
            $sub_publishing_upload_exists = WorkSubPublishingUploads::model()->findByPk($fileedit);
            $sub_publishing_upload_model = empty($sub_publishing_upload_exists) ? new WorkSubPublishingUploads('create') : $sub_publishing_upload_exists;
        }

        $biograph_upload_model = new WorkBiographUploads;
        $focus = 'publisher_contactform';
        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation(array($model, $sub_title_model, $biograph_model, $document_model, $publishing_model,
            $sub_publishing_model, $right_holder_model, $publishing_upload_model, $sub_publishing_upload_model));

        if (isset($_POST['Work'])) {
            $model->attributes = $_POST['Work'];
            if ($model->save()) {
                Myclass::addAuditTrail("Updated Work successfully.", "sliders");
                Yii::app()->user->setFlash('success', 'Work Updated Successfully!!!');
                $this->redirect(array('/site/work/update', 'id' => $model->Work_Id, 'tab' => '1'));
            }
        } elseif (isset($_POST['WorkSubtitle'])) {
            $sub_title_model->attributes = $_POST['WorkSubtitle'];
            if ($sub_title_model->save()) {
                Myclass::addAuditTrail("Saved Work Subtitle successfully.", "sliders");
                Yii::app()->user->setFlash('success', 'Work Subtitle Saved Successfully!!!');
                $this->redirect(array('/site/work/update', 'id' => $model->Work_Id, 'tab' => '2'));
            }
        } elseif (isset($_POST['WorkBiography'])) {
            $biograph_model->attributes = $_POST['WorkBiography'];
            if ($biograph_model->save()) {
                $bio_id = $biograph_model->Work_Biogrph_Id;

                $images = CUploadedFile::getInstancesByName('Work_Biogrph_Upl_File');
                if (isset($images) && count($images) > 0) {
                    foreach ($images as $image => $pic) {
                        $biograph_new_upload_model = new WorkBiographUploads;
                        $path = DIRECTORY_SEPARATOR . UPLOAD_DIR;
                        $newName = DIRECTORY_SEPARATOR . strtolower(get_class($biograph_new_upload_model)) . DIRECTORY_SEPARATOR . trim(md5(mt_rand())) . '.' . CFileHelper::getExtension($pic->name);
                        $dir = UPLOAD_DIR . DIRECTORY_SEPARATOR . strtolower(get_class($biograph_new_upload_model));
                        if (!is_dir($dir))
                            mkdir($dir);
                        $biograph_new_upload_model->Work_Biogrph_Id = $bio_id;
                        $biograph_new_upload_model->Work_Biogrph_Upl_File = $newName;
                        $biograph_new_upload_model->Work_Biogrph_Upl_Description = $_POST['WorkBiographUploads']['Work_Biogrph_Upl_Description'];
                        if ($biograph_new_upload_model->validate()) {
                            $biograph_new_upload_model->save();
                            $pic->saveAs(Yii::getPathOfAlias('webroot') . $path . $newName);
                        }
                    }
                }

                Myclass::addAuditTrail("Saved Work Biography successfully.", "sliders");
                Yii::app()->user->setFlash('success', 'Work Biography Saved Successfully!!!');
                $this->redirect(array('/site/work/update', 'id' => $model->Work_Id, 'tab' => '3'));
            }
        } elseif (isset($_POST['WorkDocumentation'])) {
            $document_model->attributes = $_POST['WorkDocumentation'];
            if ($document_model->save()) {
                Myclass::addAuditTrail("Saved Work Documentation successfully.", "sliders");
                if (empty($document_exists)) {
                    if ($model->Work_Unknown == 'N') {
                        $message = 'Work Documentation Saved Successfully. Please Fill Right Holders!!!';
                        $tab = 7;
                    } else {
                        $message = 'Work Documentation Saved Successfully.';
                        $tab = 4;
                    }
                    Yii::app()->user->setFlash('success', $message);
                    $this->redirect(array('/site/work/update', 'id' => $model->Work_Id, 'tab' => $tab));
                } else {
                    Yii::app()->user->setFlash('success', 'Work Documentation Saved Successfully.');
                    $this->redirect(array('/site/work/update', 'id' => $model->Work_Id, 'tab' => '4'));
                }
            }
        } elseif (isset($_POST['WorkPublishing'])) {
            $publishing_model->attributes = $_POST['WorkPublishing'];
//            if ($publishing_model->Work_Pub_Contact_End == date('Y-m-d') && $publishing_model->Work_Pub_Tacit == 'Y') {
//                $publishing_model->Work_Pub_Contact_End = date("Y-m-d", strtotime(date("Y-m-d", strtotime($publishing_model->Work_Pub_Contact_End)) . " + {$publishing_model->Work_Pub_Renewal_Period} years"));
//            }
            if ($publishing_model->save()) {
                Myclass::addAuditTrail("Saved Work Publishing successfully.", "sliders");
                Yii::app()->user->setFlash('success', 'Work Publishing Saved Successfully!!!');
                $this->redirect(array('/site/work/update', 'id' => $model->Work_Id, 'tab' => '5'));
            }
        } elseif (isset($_POST['WorkSubPublishing'])) {
            $sub_publishing_model->attributes = $_POST['WorkSubPublishing'];
//            if ($sub_publishing_model->Work_Sub_Contact_End == date('Y-m-d') && $sub_publishing_model->Work_Sub_Tacit == 'Y') {
//                $sub_publishing_model->Work_Sub_Contact_End = date("Y-m-d", strtotime(date("Y-m-d", strtotime($sub_publishing_model->Work_Sub_Contact_End)) . " + {$sub_publishing_model->Work_Sub_Renewal_Period} years"));
//            }
            if ($sub_publishing_model->save()) {
                Myclass::addAuditTrail("Saved Work Sub Publishing successfully.", "sliders");
                Yii::app()->user->setFlash('success', 'Work Sub Publishing Saved Successfully!!!');
                $this->redirect(array('/site/work/update', 'id' => $model->Work_Id, 'tab' => '6'));
            }
        } elseif (isset($_POST['WorkRightholder'])) {
            $exist = WorkRightholder::model()->find("Work_Id = :Wid AND Work_Member_Internal_Code = :iCode", array(':Wid' => $_POST['WorkRightholder']['Work_Id'], ':iCode' => $_POST['WorkRightholder']['Work_Member_Internal_Code']));
            if ($exist)
                $right_holder_model = $exist;

            $right_holder_model->attributes = $_POST['WorkRightholder'];

            if ($right_holder_model->save()) {
                Myclass::addAuditTrail("Saved Work right holder successfully.", "sliders");
                Yii::app()->user->setFlash('success', 'Work right holder Saved Successfully!!!');
                $this->redirect(array('/site/work/update', 'id' => $model->Work_Id, 'tab' => '7'));
            }
        } elseif (isset($_POST['WorkPublishingUploads'])) {
            $publishing_upload_model->attributes = $_POST['WorkPublishingUploads'];
            if ($fileedit == NULL) {
                $publishing_upload_model->setAttribute('Work_Pub_Upl_File', isset($_FILES['WorkPublishingUploads']['name']['Work_Pub_Upl_File']) ? $_FILES['WorkPublishingUploads']['name']['Work_Pub_Upl_File'] : '');
            }

            if ($publishing_upload_model->validate()) {
                $publishing_upload_model->setUploadDirectory(UPLOAD_DIR);
                $publishing_upload_model->uploadFile();
                if ($publishing_upload_model->save()) {
                    Myclass::addAuditTrail("{$model->Work_Org_Title}  Publishing Contract Uploaded successfully.", "sliders");
                    Yii::app()->user->setFlash('success', 'Publishing Contract uploaded Successfully!!!');
                    $this->redirect(array('/site/work/update', 'id' => $model->Work_Id, 'tab' => '5'));
                }
            } else {
                $tab = '5';
                $focus = 'contractForm';
            }
        } elseif (isset($_POST['WorkSubPublishingUploads'])) {
            $sub_publishing_upload_model->attributes = $_POST['WorkSubPublishingUploads'];
            if ($fileedit == NULL) {
                $sub_publishing_upload_model->setAttribute('Work_Sub_Upl_File', isset($_FILES['WorkPublishingUploads']['name']['Work_Sub_Upl_File']) ? $_FILES['WorkPublishingUploads']['name']['Work_Sub_Upl_File'] : '');
            }

            if ($sub_publishing_upload_model->validate()) {
                $sub_publishing_upload_model->setUploadDirectory(UPLOAD_DIR);
                $sub_publishing_upload_model->uploadFile();
                if ($sub_publishing_upload_model->save()) {
                    Myclass::addAuditTrail("{$model->Work_Org_Title}  Sub Publishing Contract Uploaded successfully.", "sliders");
                    Yii::app()->user->setFlash('success', 'Sub Publishing Contract uploaded Successfully!!!');
                    $this->redirect(array('/site/work/update', 'id' => $model->Work_Id, 'tab' => '6'));
                }
            } else {
                $tab = '6';
            }
        }

        $publish_validate = $sub_publish_validate = false;
        if (!empty($right_holder_exists)) {
            $ids = array();
            foreach ($right_holder_exists as $right_holder_exist) {
                $ids[$right_holder_exist->Work_Member_GUID] = $right_holder_exist->Work_Member_GUID;
            }
            $rgt_hold = new WorkRightholder();
            $main_publisher = $rgt_hold->getMainPublisher($model->Work_Id);
            $sub_publisher = $rgt_hold->getSubPublisher($model->Work_Id);

            $count = PublisherAccount::model()->countByAttributes(array('Pub_GUID' => $ids));
            if ($main_publisher && $publishing_model->isNewRecord) {
                $publish_validate = true;
                $tab = 5;
            } else if ($sub_publisher && $sub_publishing_model->isNewRecord) {
                $sub_publish_validate = true;
                $tab = 6;
            }
        }


        $this->render('update', compact('model', 'sub_title_model', 'tab', 'biograph_model', 'document_model', 'publishing_model', 'sub_publishing_model', 'right_holder_model', 'right_holder_exists', 'publish_validate', 'sub_publish_validate', 'sub_publisher', 'main_publisher', 'publishing_upload_model', 'sub_publishing_upload_model', 'focus', 'biograph_upload_model'));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        try {
            $model = $this->loadModel($id);
            $uploads = $model->workBiographies->workBiographUploads;
            $pub_uploads = $model->workPublishings->workPublishingUploads;
            $sub_uploads = $model->workSubPublishings->workSubPublishingUploads;
            $model->delete();
            //file remove
            if (!empty($uploads)) {
                foreach ($uploads as $upload) {
                    $path = UPLOAD_DIR . $upload->Work_Biogrph_Upl_File;
                    if (is_file($path))
                        unlink($path);
                }
            }
            if (!empty($pub_uploads)) {
                foreach ($pub_uploads as $upload) {
                    $path = UPLOAD_DIR . $upload->Work_Pub_Upl_File;
                    if (is_file($path))
                        unlink($path);
                }
            }
            if (!empty($sub_uploads)) {
                foreach ($sub_uploads as $upload) {
                    $path = UPLOAD_DIR . $upload->Work_Sub_Upl_File;
                    if (is_file($path))
                        unlink($path);
                }
            }
            //end
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
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionHolderremove($id) {
        try {
            $model = $this->loadRightholderModel($id);
            $model->delete();
            Myclass::addAuditTrail("Deleted RightHolder {$model->Work_Member_Internal_Code} at work {$model->work->Work_Org_Title}.", "sliders");
        } catch (CDbException $e) {
            if ($e->errorInfo[1] == 1451) {
                throw new CHttpException(400, Yii::t('err', 'Relation Restriction Error.'));
            } else {
                throw $e;
            }
        }

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax'])) {
            Yii::app()->user->setFlash('success', 'RightHolder Deleted Successfully!!!');
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/site/work/update', 'id' => $model->Work_Id, 'tab' => '7'));
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

    public function actionContractexpiry() {
        $search = false;
        $search_pub_model = $search_sub_model = array();
        if (isset($_GET['Work'])) {
            $search = true;
            $pub_criteria = new CDbCriteria;
            $pub_criteria->with = array('work');
            if (isset($_GET['Work']['work_name']) && $_GET['Work']['work_name'] != '')
                $pub_criteria->addCondition("work.Work_Org_Title Like '%{$_GET['Work']['work_name']}%'");
            if (isset($_GET['Work']['contract_end_date']) && $_GET['Work']['contract_end_date'] != '')
                $pub_criteria->addCondition("Work_Pub_Contact_End = '{$_GET['Work']['contract_end_date']}'");
            $search_pub_model = WorkPublishing::model()->with('work')->expiry()->findAll($pub_criteria);


            $search = true;
            $sub_criteria = new CDbCriteria;
            $sub_criteria->with = array('work');
            if (isset($_GET['Work']['work_name']) && $_GET['Work']['work_name'] != '')
                $sub_criteria->addCondition("work.Work_Org_Title Like '%{$_GET['Work']['work_name']}%'");
            if (isset($_GET['Work']['contract_end_date']) && $_GET['Work']['contract_end_date'] != '')
                $sub_criteria->addCondition("Work_Sub_Contact_End = '{$_GET['Work']['contract_end_date']}'");
            $search_sub_model = WorkSubPublishing::model()->with('work')->expiry()->findAll($sub_criteria);
        }
        
        $pub_model = WorkPublishing::model()->expiry()->findAll();
        $sub_model = WorkSubPublishing::model()->expiry()->findAll();
            
        $title = 'Contract Expiry';
        if (isset($_GET['filter'])){
            if($_GET['filter'] == 'pub'){
                $sub_model = array();
                $title = 'Contract Expiry (Publisher)';
            }else if($_GET['filter'] == 'sub'){
                $pub_model = array();
                $title = 'Contract Expiry (Sub-Publisher)';
            }
        }
        $this->render('contractexpiry', compact('pub_model', 'sub_model', 'search_pub_model', 'search_sub_model', 'search', 'title'));
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
    public function loadRightholderModel($id) {
        $model = WorkRightholder::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');

        return $model;
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
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Work $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && (
                $_POST['ajax'] === 'work-form' || $_POST['ajax'] === 'work-subtitle-form' || $_POST['ajax'] === 'work-biography-form' || $_POST['ajax'] === 'work-documentation-form' || $_POST['ajax'] === 'work-publishing-form' || $_POST['ajax'] === 'work-sub-publishing-form' || $_POST['ajax'] === 'publishing-upload-form' || $_POST['ajax'] === 'sub-publishing-upload-form' || $_POST['ajax'] === 'work-rightholder-form'
                )) {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionInsertright() {
        if (isset($_POST['WorkRightholder']) && !empty($_POST['WorkRightholder'])) {
            $end = end($_POST['WorkRightholder']);
            $work_id = $end['Work_Id'];

            //audit table insert
            $check_insert_audit = true;
            $main_pub_role = (new WorkRightholder)->getMainPublisherRole();
            $sub_pub_role = (new WorkRightholder)->getSubPublisherRole();
            foreach ($_POST['WorkRightholder'] as $values) {
                if ($values['Work_Right_Role'] == $main_pub_role || $values['Work_Right_Role'] == $sub_pub_role) {
                    $check_insert_audit = false;
                    break;
                }
            }
            if ($check_insert_audit) {
                WorkRightholderAudit::model()->deleteAllByAttributes(array('Work_Id' => $work_id));
                foreach ($_POST['WorkRightholder'] as $values) {
                    $audit_model = new WorkRightholderAudit;
                    foreach ($values as $key => $value) {
                        $attr_name = str_replace('Work_Right_', 'Work_Right_Audit_', $key);
                        $audit_model->setAttribute($attr_name, $value);
                    }
                    $audit_model->save(false);
                }
            }
            //end
            
            $created_by = $updated_by = '';
            $created_date = date('Y-m-d H:i:s');
            $updated_date = "0000-00-00 00:00:00";
            $holders = WorkRightholder::model()->findAllByAttributes(array('Work_Id' => $work_id));
            if(empty($holders)){
                $created_by = Yii::app()->user->id;
            }else{
                $created_by = $holders[0]->Created_By;
                $created_date = $holders[0]->Created_Date;
                $updated_by = Yii::app()->user->id;
                $updated_date = date('Y-m-d H:i:s');
            }
            
            WorkRightholder::model()->deleteAllByAttributes(array('Work_Id' => $work_id));
            $valid = true;
            foreach ($_POST['WorkRightholder'] as $values) {
                $model = new WorkRightholder;
                $model->attributes = $values;
                $model->setAttribute('Created_By', $created_by);
                $model->setAttribute('Updated_By', $updated_by);
                $model->setAttribute('Created_Date', $created_date);
                $model->setAttribute('Rowversion', $updated_date);
                $valid = $valid && $model->save(false);
                if ($valid)
                    Myclass::addAuditTrail("Created Right Holder saved for {$model->work->Work_Org_Title} successfully.", "fa fa-at");
            }
            if ($valid)
                Yii::app()->user->setFlash('success', 'RightHolder Saved Successfully!!!');
            $this->redirect(array('/site/work/update', 'id' => $model->Work_Id, 'tab' => 7));
        }
    }

    public function actionSearchright() {
        $criteria = new CDbCriteria();
        $pubcriteria = new CDbCriteria();
        if (!empty($_REQUEST['searach_text'])) {
            $search_txt = $_REQUEST['searach_text'];
            $criteria->compare('Auth_Sur_Name', $search_txt, true, 'OR');
            $criteria->compare('Auth_First_Name', $search_txt, true, 'OR');
            $criteria->compare('Auth_Internal_Code', $search_txt, true, 'OR');
            $criteria->compare('Auth_Ipi', $search_txt, true, 'OR');
            $criteria->compare('Auth_Ipi_Base_Number', $search_txt, true, 'OR');

            $pubcriteria->compare('Pub_Corporate_Name', $search_txt, true, 'OR');
            $pubcriteria->compare('Pub_Internal_Code', $search_txt, true, 'OR');
            $pubcriteria->compare('Pub_Ipi', $search_txt, true, 'OR');
            $pubcriteria->compare('Pub_Ipi_Base_Number', $search_txt, true, 'OR');
        }

        if ($_REQUEST['is_auth'] == '1') {
            $authusers = AuthorAccount::model()->with('authorManageRights')->isStatusActive()->findAll($criteria);
        }
        if ($_REQUEST['is_publ'] == '1') {
            $publusers = PublisherAccount::model()->with('publisherManageRights')->isStatusActive()->findAll($pubcriteria);
        }
        $this->renderPartial('_search_right', compact('authusers', 'publusers'));
    }

    public function actionSubtitledelete($id) {
        try {
            $model = WorkSubtitle::model()->findByPk($id);
            $model->delete();
            Myclass::addAuditTrail("Deleted Work subtitle {$model->Work_Subtitle_Name} successfully.", "sliders");
        } catch (CDbException $e) {
            if ($e->errorInfo[1] == 1451) {
                throw new CHttpException(400, Yii::t('err', 'Relation Restriction Error.'));
            } else {
                throw $e;
            }
        }

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax'])) {
            Yii::app()->user->setFlash('success', "Deleted Work subtitle {$model->Work_Subtitle_Name} successfully.");
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/site/work/update', 'id' => $model->work->Work_Id, 'tab' => 2));
        }
    }

    public function actionFiledelete($id, $delete_model, $rel_model, $tab) {
        $model = $delete_model::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        $work_id = $model->$rel_model->Work_Id;

        $model->setUploadDirectory(UPLOAD_DIR);
        try {
            $model->delete();
            Myclass::addAuditTrail("Deleted a file {$model->$rel_model->work->Work_Org_Title} successfully.", "sliders");
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
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/site/work/update', 'id' => $work_id, 'tab' => $tab));
        }
    }

    public function actionBiofiledelete($id) {
        $model = WorkBiographUploads::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        $bio_id = $model->Work_Biogrph_Id;

        $model->setUploadDirectory(UPLOAD_DIR);
        try {
            $model->delete();
            Myclass::addAuditTrail("Deleted a Biography file from {$model->workBiogrph->work->Work_Org_Title} successfully.", "user");
        } catch (CDbException $e) {
            if ($e->errorInfo[1] == 1451) {
                throw new CHttpException(400, Yii::t('err', 'Relation Restriction Error.'));
            } else {
                throw $e;
            }
        }

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax'])) {
            Yii::app()->user->setFlash('success', "Deleted a Biography file from {$model->workBiogrph->work->Work_Org_Title} successfully.");
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/site/work/update', 'id' => $model->workBiogrph->Work_Id, 'tab' => '3'));
        }
    }

}
