<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
Yii::import('booster.widgets.TbButtonColumn');
Yii::import('application.components.UserIdentity');

/**
 * Description of MyActionButtonColumn
 *
 * @author Admin
 */
class MyActionButtonColumn extends TbButtonColumn {

    protected function initDefaultButtons() {
        $validate_buttons = array(
            'delete' => array(
                'visible' => 'UserIdentity::checkAccess("'.Yii::app()->user->name.'")'
            )
        );
        $this->buttons = array_merge($this->buttons, $validate_buttons);
        parent::initDefaultButtons();
    }
}
