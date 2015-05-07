<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
Yii::import('booster.widgets.TbButtonColumn');

/**
 * Description of MyActionButtonColumn
 *
 * @author Admin
 */
class MyActionButtonColumn extends TbButtonColumn {

    protected function initDefaultButtons() {

        $this->buttons = array(
            'delete' => array(
                'visible' => '$this->checkAccess("'.Yii::app()->user->name.'")'
            )
        );
        
        parent::initDefaultButtons();
    }

    protected function checkAccess($name) {
        return ($name == 'admin');
    }
}
