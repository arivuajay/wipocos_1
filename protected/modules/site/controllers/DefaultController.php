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
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex() {
        $this->render('index');
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
                $this->render('error', compact('error', 'name'));
            }
        }
    }

    public function actionScreens($path) {
        if ($path) {
            $this->render('screens', compact('path'));
        }
    }

    public function actionDailycron() {
        $publishings = WorkPublishing::model()->findAllByAttributes(array('Work_Pub_Contact_End' => date('Y-m-d')));
        $sub_publishings = WorkSubPublishing::model()->findAllByAttributes(array('Work_Sub_Contact_End' => date('Y-m-d')));

        if (!empty($publishings)) {
            foreach ($publishings as $key => $publishing) {
                if ($publishing->Work_Pub_Tacit == 'Y') {
                    $model = WorkPublishing::model()->findByPk($publishing->Work_Pub_Id);
                    $newEndingDate = date("Y-m-d", strtotime(date("Y-m-d", strtotime($publishing->Work_Pub_Contact_End)) . " + {$publishing->Work_Pub_Renewal_Period} years"));
                    $model->Work_Pub_Contact_End = $newEndingDate;
                    $model->save(false);
                } else {
                    $right_holders = $publishing->work->workRightholders;
                    //// Get Authors ////
                    $authors_add_share = array();
                    foreach ($right_holders as $key => $right_holder) {
                        if (!empty($right_holder->workAuthor)) {
                            $authors_add_share[$right_holder->workAuthor->Auth_GUID] = $right_holder->workAuthor->Auth_GUID;
                        }
                    }
                    //// Share Main Publisher shares to Authors ////
                    $main_publisher = (new WorkRightholder)->getMainPublisher($publishing->Work_Id);
                    if (!empty($authors_add_share) && !empty($main_publisher)) {
                        $broad_share = $main_publisher->Work_Right_Broad_Share / (count($authors_add_share));
                        $mech_share = $main_publisher->Work_Right_Mech_Share / (count($authors_add_share));

                        foreach ($authors_add_share as $author_guid) {
                            $auth_right_holder = WorkRightholder::model()->findByAttributes(array('Work_Member_GUID' => $author_guid, 'Work_Id' => $publishing->Work_Id));
                            $auth_right_holder->Work_Right_Broad_Share += $broad_share;
                            $auth_right_holder->Work_Right_Mech_Share += $mech_share;
                            $auth_right_holder->save(false);
                        }
                    }
                    //// Remove Main Publisher rightholder from Work////
                    if(!empty($main_publisher))
                        $main_publisher->delete();
                }
            }
        }

        if (!empty($sub_publishings)) {
            foreach ($sub_publishings as $key => $sub_publishing) {
                if ($publishing->Work_Pub_Tacit == 'Y') {
                    $model = WorkSubPublishing::model()->findByPk($sub_publishing->Work_Sub_Id);
                    $newEndingDate = date("Y-m-d", strtotime(date("Y-m-d", strtotime($sub_publishing->Work_Sub_Contact_End)) . " + {$sub_publishing->Work_Sub_Renewal_Period} years"));
                    $model->Work_Sub_Contact_End = $newEndingDate;
                    $model->save(false);
                } else {
                    $right_holders = $sub_publishing->work->workRightholders;
                    //// Get Authors ////
                    $authors_add_share = array();
                    foreach ($right_holders as $key => $right_holder) {
                        if (!empty($right_holder->workAuthor)) {
                            $authors_add_share[$right_holder->workAuthor->Auth_GUID] = $right_holder->workAuthor->Auth_GUID;
                        }
                    }
                    $sub_publisher = (new WorkRightholder)->getSubPublisher($sub_publishing->Work_Id);
                    //// Share Sub Publisher shares to Authors ////
                    if (!empty($authors_add_share) && !empty($sub_publisher)) {
                        $broad_share = $sub_publisher->Work_Right_Broad_Share / (count($authors_add_share));
                        $mech_share = $sub_publisher->Work_Right_Mech_Share / (count($authors_add_share));

                        foreach ($authors_add_share as $author_guid) {
                            $auth_right_holder = WorkRightholder::model()->findByAttributes(array('Work_Member_GUID' => $author_guid, 'Work_Id' => $sub_publishing->Work_Id));
                            $auth_right_holder->Work_Right_Broad_Share += $broad_share;
                            $auth_right_holder->Work_Right_Mech_Share += $mech_share;
                            $auth_right_holder->save(false);
                        }
                    }
                    //// Remove Sub Publisher rightholder from Work////
                    if(!empty($sub_publisher))
                        $sub_publisher->delete();
                }
            }
        }
        exit;
    }

}
