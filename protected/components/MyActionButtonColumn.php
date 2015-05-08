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

        $this->buttons = array(
            'delete' => array(
                'visible' => 'UserIdentity::checkAccess("'.Yii::app()->user->name.'")'
            )
        );
        
        parent::initDefaultButtons();
    }
}
