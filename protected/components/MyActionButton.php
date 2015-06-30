<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
Yii::import('booster.widgets.TbButton');
Yii::import('application.components.UserIdentity');

/**
 * Description of MyActionButton
 *
 * @author Admin
 */
class MyActionButton extends TbButton{
    
    public function init() {
        $this->visible = UserIdentity::checkAccess(NULL, Yii::app()->controller->id, $this->url[0]);
        parent::init();
    }
}
