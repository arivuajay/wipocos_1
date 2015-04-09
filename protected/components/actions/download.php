<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Download
 *
 * @author Admin
 */
class Download extends CAction {
    public function run() {
        if (isset($_REQUEST["df"])) {
            $file_path = Myclass::refdecryption($_REQUEST["df"]);
            
            $content = @file_get_contents($file_path);
            if(!$content)
                throw new CHttpException(404, 'The requested page does not exist.');            
            $filename = isset($_REQUEST["fn"]) ? $_REQUEST["fn"] : basename($file_path);
            Yii::app()->request->sendFile($filename, $content);
        }
    }
}
