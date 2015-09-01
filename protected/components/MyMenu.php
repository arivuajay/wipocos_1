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
        $_id = NULL;
        $_controller = Yii::app()->controller->id;
        $_action = Yii::app()->controller->action->id;
        $ignore_list = $this->ignoreActiveList();
        foreach ($this->items as $key => $main_item) {
            foreach ($main_item as $second_key => $second_item) {
                if (is_array($second_item)) {
                    foreach ($second_item as $third_key => $third_item) {
                        if (isset($third_item['url'])) {
                            $controller = $this->splitController($third_item['url'][0]);
                            if (is_array($third_item['url'])) {
                                $this->items[$key][$second_key][$third_key]['visible'] = UserIdentity::checkAccess($_id, $controller, 'view');
                                if (!in_array($_controller, $ignore_list) && !in_array($controller, $ignore_list)) {
                                    $this->items[$key][$second_key][$third_key]['active'] = $_controller == $controller;
                                }
                            }
                            if (isset($third_item['items'])) {
                                foreach ($third_item['items'] as $fourth_key => $fourth_value) {
                                    $controller = $this->splitController($fourth_value['url'][0]);
                                    $this->items[$key][$second_key][$third_key]['items'][$fourth_key]['visible'] = UserIdentity::checkAccess($_id, $controller, 'view');
                                    if (!in_array($_controller, $ignore_list) && !in_array($controller, $ignore_list)) {
                                        $this->items[$key][$second_key][$third_key]['items'][$fourth_key]['active'] = $_controller == $controller;
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        parent::init();
    }

    public function splitController($url) {
        $exp = explode("/", $url);
        if (count($exp) == 1) {
            $controller = Yii::app()->controller->id;
        } else {
            $controller = $exp[2];
        }
        //hard code for groups controller//
        if (in_array($controller, array('group', 'publishergroup'))) {
            $controller = "$exp[5]group";
        }
        //end
        return $controller;
    }

    public static function ignoreActiveList() {
        return array('group', 'publishergroup', 'work');
    }

}
