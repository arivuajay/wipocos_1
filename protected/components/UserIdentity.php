<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {

    const ERROR_ACCOUNT_BLOCKED = 3;
    const ERROR_ACCOUNT_DELETED = 4;

    private $_id;

    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    public function authenticate() {
        $user = User::model()->find('username = :U', array(':U' => $this->username));


        if ($user === null):
            $this->errorCode = self::ERROR_USERNAME_INVALID;

        elseif ($user->status == 0):
            $this->errorCode = self::ERROR_ACCOUNT_BLOCKED;
        else:
            $is_correct_password = ($user->password_hash !== Myclass::encrypt($this->password)) ? false : true;

            if ($is_correct_password):
                $this->errorCode = self::ERROR_NONE;
            else:
                $this->errorCode = self::ERROR_USERNAME_INVALID;   // Error Code : 1
            endif;
        endif;

        if ($this->errorCode == self::ERROR_NONE):
            $this->setUserData($user);
        endif;

        return !$this->errorCode;
    }

    public function getId() {
        return $this->_id;
    }

    public function autoLogin() {
        $user = User::model()->find('username = :U', array(':U' => $this->username));
        if ($user === null):
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        else:
            $this->setUserData($user);
        endif;
        return !$this->errorCode;
    }

    protected function setUserData($user) {
        $this->_id = $user->id;
        $this->setState('name', $user->name);
        $this->setState('id', $user->id);
        $this->setState('role', $user->role);
        return;
    }

    public static function checkAccess($id = NULL, $controller = NULL, $action = NULL, $group_role = NULL) {
        $return = true;
        if ($id == NULL)
            $id = Yii::app()->user->id;
        if ($controller == NULL)
            $controller = Yii::app()->controller->id;
        if ($action == NULL)
            $action = Yii::app()->controller->action->id;

        $user = User::model()->find('id = :U', array(':U' => $id));
        //hard code for groups controller//
        if (in_array($controller, array('group', 'publishergroup'))) {
            if ($group_role != '') {
                $controller = $group_role;
            } else {
                $groupCheck = Myclass::checkGroupactions($controller, $action);
                foreach ($groupCheck as $key => $value) {
                    if ($value)
                        $controller = $key;
                }
            }
        }
        //end//
        $screen = MasterScreen::model()->find("Screen_code = :controller", array(':controller' => $controller));
        if (!empty($user) && !empty($screen)) {
            $auth_resources = AuthResources::model()->findByAttributes(array('Master_User_ID' => $user->id, 'Master_Module_ID' => $screen->Module_ID, 'Master_Screen_ID' => $screen->Master_Screen_ID));
            if (empty($auth_resources)) {
                $auth_resources = AuthResources::model()->findByAttributes(array('Master_Role_ID' => $user->role, 'Master_Module_ID' => $screen->Module_ID, 'Master_Screen_ID' => $screen->Master_Screen_ID));
            }
            if (!empty($auth_resources)) {
                $insert_actions = array('create', 'insertright', 'insertlabel', 'newperformer', 'newproducer', 'newrecording');
                $update_actions = array('update');
                $view_actions = array('index', 'view', 'download', 'print', 'pdf', 'searchright', 'contractexpiry', 'invoice', 'backdated', 'searchcontract', 'getinvoice');
                $delete_actions = array('delete', 'filedelete', 'biofiledelete', 'subtitledelete', 'linkdelete', 'holderremove', 'publicationdelete', 'fixationdelete', 'foliodelete');
                $other_actions = array();

                if (in_array($action, $insert_actions)) {
                    $return = $auth_resources->Master_Task_ADD == 1;
                } elseif (in_array($action, $update_actions)) {
                    $return = $auth_resources->Master_Task_UPT == 1;
                } elseif (in_array($action, $view_actions)) {
                    $return = $auth_resources->Master_Task_SEE == 1;
                } elseif (in_array($action, $delete_actions)) {
                    $return = $auth_resources->Master_Task_DEL == 1;
                } elseif (in_array($action, $other_actions)) {
                    $return = true;
                }
            }
        }
        return $return;
    }

    public static function checkAdmin() {
        $return = false;
        if(isset(Yii::app()->user->id)){
            $user = User::model()->find('id = :U', array(':U' => $id));
            $return = $user->role == 1;
        }
        return $return;
    }
    
    public static function checkPrivilages($rank) {
        $return = false;
        if(isset(Yii::app()->user->id)){
            $user = User::model()->find('id = :U', array(':U' => Yii::app()->user->id));
            $return = $user->roleMdl->Rank <= $rank;
        }
        return $return;
    }
}
