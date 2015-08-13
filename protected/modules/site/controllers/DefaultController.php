<?php

/**
 * Site controller
 */
class DefaultController extends Controller {

    public $layout = '//layouts/column1';

    /**
     * @array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    public function actions() {
        return array(
            'download' => 'application.components.actions.download',
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('login', 'error', 'request-password-reset', 'screens', 'dailycron'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('logout', 'index', 'profile'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'actions' => array('invoice'),
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex() {
        $this->render('index');
    }

    public function actionInvoice() {
        $mail = new Sendmail;
        $trans_array = array(
            "{SITENAME}" => SITENAME,
            "{USERNAME}" => 'Prakash',
            "{EMAIL_ID}" => 'prakash.paramanandam@arkinfotec.com',
        );
        $message = $mail->getMessage('invoice', $trans_array);
        $Subject = $mail->translate('{SITENAME}: : Reminder');
        $mail->send('prakash.paramanandam@arkinfotec.com', $Subject, $message);
        $this->render('invoice');
    }

    public function actionLogin() {
        $this->layout = '//layouts/login';

        if (!Yii::app()->user->isGuest) {
            $this->goHome();
        }

        $model = new LoginForm();

        if (isset($_POST['sign_in'])) {
            $model->attributes = $_POST['LoginForm'];
            if ($model->validate() && $model->login()):
                Myclass::addAuditTrail("{$model->username} logged-in successfully.", "user");
                $this->goHome();
            endif;
        }

        $this->render('login', array('model' => $model));
    }

    public function actionLogout() {
        Myclass::addAuditTrail(Yii::app()->user->name . " logged-out successfully.", "user");
        Yii::app()->user->logout();
        $this->redirect(array('/site/default/login'));
    }

    public function actionRequestPasswordReset() {
        $model = new PasswordResetRequestForm();
        if (isset($_POST['PasswordResetRequestForm'])) {
            $model->attributes = $_POST['PasswordResetRequestForm'];
            if ($model->validate()):
                if ($model->sendEmail()) {
                    Yii::app()->user->setFlash('success', 'Check your email for further instructions.');
                    $this->goHome();
                } else {
                    Yii::app()->user->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
                }
            endif;
        }

        $this->render('requestPasswordResetToken', array(
            'model' => $model,
        ));
    }

    public function actionResetPassword($token) {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if (isset($_POST['ResetPasswordForm'])) {
            $model->attributes = $_POST['ResetPasswordForm'];
            if ($model->validate() && $model->resetPassword()):
                Yii::app()->user->setFlash('success', 'New password was saved.');
                $this->goHome();
            endif;
        }

        $this->render('resetPassword', array(
            'model' => $model,
        ));
    }

    public function actionProfile() {
        $id = Yii::app()->user->id;
        $model = User::model()->findByPk($id);
        $model->setScenario('update');

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            if ($model->validate()):
                $model->save(false);
                Myclass::addAuditTrail("Updated a {$model->username} successfully.", "user");
                Yii::app()->user->setFlash('success', 'Profile updated successfully');
                $this->refresh();
            endif;
        }
        $this->render('profile', compact('model'));
    }

    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest) {
                echo $error['message'];
                Yii::app()->end();
            } else {
                $name = Yii::app()->errorHandler->error['code'] . ' Error';
                $message = Yii::app()->errorHandler->error['message'];
                $this->render('error', compact('error', 'name', 'message'));
            }
        }
    }

    public function actionScreens($path) {
        if ($path) {
            $this->render('screens', compact('path'));
        }
    }

    public function actionDailycron() {
        //Publishing Renewal & Share spliting
        $publishings = WorkPublishing::model()->findAllByAttributes(array('Work_Pub_Contact_End' => date('Y-m-d')));

        if (!empty($publishings)) {
            foreach ($publishings as $key => $publishing) {
                if ($publishing->Work_Pub_Tacit == 'Y') {
                    if (WorkPublishing::AUTO_RENEWAL) {
                        $model = WorkPublishing::model()->findByPk($publishing->Work_Pub_Id);
                        $newEndingDate = date("Y-m-d", strtotime(date("Y-m-d", strtotime($publishing->Work_Pub_Contact_End)) . " + {$publishing->Work_Pub_Renewal_Period} years"));
                        $model->Work_Pub_Contact_End = $newEndingDate;
                        $model->save(false);
                    }
                } else {
                    $right_holders = $publishing->work->workRightholders;
                    $sub_pub_role_exists = false;
                    $sub_pub_role = (new WorkRightholder)->getSubPublisherRole();
                    //// Get Authors ////
                    $authors_add_share = array();
                    foreach ($right_holders as $key => $right_holder) {
                        if (!empty($right_holder->workAuthor)) {
                            $authors_add_share[$right_holder->workAuthor->Auth_GUID] = $right_holder;
                        }
                        if ($sub_pub_role_exists == false && $right_holder->Work_Right_Role == $sub_pub_role) {
                            $sub_pub_role_exists = true;
                        }
                    }
                    //// Share Main Publisher shares to Authors ////
                    $main_publisher = (new WorkRightholder)->getMainPublisher($publishing->Work_Id);
                    if (!empty($authors_add_share) && !empty($main_publisher)) {
                        $check_audits = WorkRightholderAudit::model()->findAllByAttributes(array('Work_Id' => $publishing->Work_Id));
                        $authors_list = array();
                        if (!empty($check_audits)) {
                            $broad_share = $mech_share = 0;
                            if ($sub_pub_role_exists) {
                                foreach ($authors_add_share as $author_guid => $author) {
                                    //Example 0.2*0.2 = 0.04 * 20 = 0.8 * 10 = 8
                                    $broad_share = $author->Work_Right_Broad_Share + (($author->Work_Right_Broad_Share / 100) * ($main_publisher->Work_Right_Broad_Share / 100) * $main_publisher->Work_Right_Broad_Share * 10);
                                    $mech_share = $author->Work_Right_Mech_Share + (($author->Work_Right_Mech_Share / 100) * ($main_publisher->Work_Right_Mech_Share / 100) * $main_publisher->Work_Right_Mech_Share * 10);
                                    $authors_list[$author_guid] = array(
                                        'guid' => $author_guid,
                                        'broad_share' => $broad_share,
                                        'mech_share' => $mech_share
                                    );
                                }
                            } else {
                                foreach ($authors_add_share as $author_guid => $author) {
                                    foreach ($check_audits as $check_audit) {
                                        if ($check_audit->Work_Member_GUID == $author_guid) {
                                            $broad_share = $check_audit->Work_Right_Audit_Broad_Share;
                                            $mech_share = $check_audit->Work_Right_Audit_Mech_Share;
                                            break;
                                        }
                                    }
                                    $authors_list[$author_guid] = array(
                                        'guid' => $author_guid,
                                        'broad_share' => $broad_share,
                                        'mech_share' => $mech_share
                                    );
                                }
                            }
                        } else {
                            $broad_share = $main_publisher->Work_Right_Broad_Share / (count($authors_add_share));
                            $mech_share = $main_publisher->Work_Right_Mech_Share / (count($authors_add_share));
                            foreach ($authors_add_share as $author_guid => $author) {
                                $authors_list[$author_guid] = array(
                                    'guid' => $author_guid,
                                    'broad_share' => $auth_right_holder->Work_Right_Broad_Share += $broad_share,
                                    'mech_share' => $auth_right_holder->Work_Right_Mech_Share += $mech_share
                                );
                            }
                        }
                        foreach ($authors_list as $author_guid => $author) {
                            $auth_right_holder = WorkRightholder::model()->findByAttributes(array('Work_Member_GUID' => $author_guid, 'Work_Id' => $publishing->Work_Id));
                            $auth_right_holder->Work_Right_Broad_Share = $author['broad_share'];
                            $auth_right_holder->Work_Right_Mech_Share = $author['mech_share'];
                            $auth_right_holder->save(false);
                        }
                    }
                    //// Remove Main Publisher rightholder from Work////
                    if (!empty($main_publisher))
                        $main_publisher->delete();
                }
            }
        }

        //Sub Publishing Renewal & Share spliting
        $sub_publishings = WorkSubPublishing::model()->findAllByAttributes(array('Work_Sub_Contact_End' => date('Y-m-d')));
        if (!empty($sub_publishings)) {
            foreach ($sub_publishings as $key => $sub_publishing) {
                if ($sub_publishing->Work_Sub_Tacit == 'Y') {
                    if (WorkSubPublishing::AUTO_RENEWAL) {
                        $model = WorkSubPublishing::model()->findByPk($sub_publishing->Work_Sub_Id);
                        $newEndingDate = date("Y-m-d", strtotime(date("Y-m-d", strtotime($sub_publishing->Work_Sub_Contact_End)) . " + {$sub_publishing->Work_Sub_Renewal_Period} years"));
                        $model->Work_Sub_Contact_End = $newEndingDate;
                        $model->save(false);
                    }
                } else {
                    $right_holders = $sub_publishing->work->workRightholders;
                    $main_pub_role_exists = false;
                    $main_pub_role = (new WorkRightholder)->getMainPublisherRole();
                    //// Get Authors ////
                    $authors_add_share = array();
                    foreach ($right_holders as $key => $right_holder) {
                        if (!empty($right_holder->workAuthor)) {
                            $authors_add_share[$right_holder->workAuthor->Auth_GUID] = $right_holder->workAuthor;
                        }
                        if ($main_pub_role_exists == false && $right_holder->Work_Right_Role == $main_pub_role) {
                            $main_pub_role_exists = true;
                        }
                    }
                    $sub_publisher = (new WorkRightholder)->getSubPublisher($sub_publishing->Work_Id);
                    //// Share Sub Publisher shares to Authors ////
                    if (!empty($authors_add_share) && !empty($sub_publisher)) {
                        $check_audits = WorkRightholderAudit::model()->findAllByAttributes(array('Work_Id' => $sub_publishing->Work_Id));
                        $authors_list = array();

                        if (!empty($check_audits)) {
                            if ($main_pub_role_exists) {
                                $main_publisher = (new WorkRightholder)->getMainPublisher($sub_publishing->Work_Id);
                                $main_publisher->Work_Right_Broad_Share = $main_publisher->Work_Right_Broad_Share + $sub_publisher->Work_Right_Broad_Share;
                                $main_publisher->Work_Right_Mech_Share = $main_publisher->Work_Right_Mech_Share + $sub_publisher->Work_Right_Mech_Share;
                                $main_publisher->save(false);
                            } else {
                                foreach ($authors_add_share as $author_guid => $author) {
                                    foreach ($check_audits as $check_audit) {
                                        if ($check_audit->Work_Member_GUID == $author_guid) {
                                            $broad_share = $check_audit->Work_Right_Audit_Broad_Share;
                                            $mech_share = $check_audit->Work_Right_Audit_Mech_Share;
                                            break;
                                        }
                                    }
                                    $authors_list[$author_guid] = array(
                                        'guid' => $author_guid,
                                        'broad_share' => $broad_share,
                                        'mech_share' => $mech_share
                                    );
                                }
                            }
                        } else {
                            $broad_share = $sub_publisher->Work_Right_Broad_Share / (count($authors_add_share));
                            $mech_share = $sub_publisher->Work_Right_Mech_Share / (count($authors_add_share));

                            foreach ($authors_add_share as $author_guid => $author) {
                                $authors_list[$author_guid] = array(
                                    'guid' => $author_guid,
                                    'broad_share' => $auth_right_holder->Work_Right_Broad_Share += $broad_share,
                                    'mech_share' => $auth_right_holder->Work_Right_Mech_Share += $mech_share
                                );
                            }
                        }
                        foreach ($authors_list as $author_guid => $author) {
                            $auth_right_holder = WorkRightholder::model()->findByAttributes(array('Work_Member_GUID' => $author_guid, 'Work_Id' => $publishing->Work_Id));
                            $auth_right_holder->Work_Right_Broad_Share = $author['broad_share'];
                            $auth_right_holder->Work_Right_Mech_Share = $author['mech_share'];
                            $auth_right_holder->save(false);
                        }
                    }
                    //// Remove Sub Publisher rightholder from Work////
                    if (!empty($sub_publisher))
                        $sub_publisher->delete();
                }
            }
        }

        //Contract Invoice Auto generate
        if (ContractInvoice::AUTO_GENERATE) {
            $invoices = ContractInvoice::model()->findAllByAttributes(array('Inv_Next_Date' => date('Y-m-d')));
            foreach ($invoices as $key => $invoice) {
                $checking_date = date('Y-m-d');
                $check_next_invoice_exists = ContractInvoice::model()->find(array(
                    'condition' => "Tarf_Cont_Id = :cont_id And Inv_Next_Date > :date And Inv_Repeat_Count != :count And Inv_Created_Mode = :mode",
                    'params' => array('cont_id' => $invoice->Tarf_Cont_Id, 'date' => $checking_date, 'count' => 0, 'mode' => 'C')
                ));

                if (empty($check_next_invoice_exists)) {
                    $invoice_model = New ContractInvoice;
                    $new_invoice = array(
                        'Inv_Invoice' => Myclass::generateInvoiceno(),
                        'Inv_Date' => $checking_date,
                        'Tarf_Cont_Id' => $invoice->Tarf_Cont_Id,
//                        'Inv_Repeat_Id' => $invoice->Inv_Repeat_Id,
//                        'Inv_Repeat_Count' => $invoice->Inv_Repeat_Count - 1,
                        'Inv_Next_Date' => ContractInvoice::model()->getNextdate($invoice->tarfCont->Tarf_Cont_Pay_Id, $checking_date),
                        'Inv_Amount' => $invoice->Inv_Amount,
                        'Inv_Created_Type' => 'A',
                    );
                    $invoice_model->attributes = $new_invoice;
                    $invoice_model->save(false);
                }
            }
        }
        exit;
    }

}
