<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
Yii :: import('zii.widgets.CMenu');
Yii::import('application.components.UserIdentity');

class MyMenu extends CMenu {

    public function init() {
        parent::init();
    }
}