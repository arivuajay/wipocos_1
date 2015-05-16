<?php

class Myclass extends CController {

    public static function encrypt($value) {
        return hash("sha512", $value);
    }

    public static function refencryption($str) {
        return base64_encode($str);
    }

    public static function refdecryption($str) {
        return base64_decode($str);
    }

    public static function t($str = '', $params = array(), $dic = 'app') {
        return Yii::t($dic, $str, $params);
    }

    public static function getRandomString($length = 9) {
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; //length:36
        $final_rand = '';
        for ($i = 0; $i < $length; $i++) {
            $final_rand .= $chars[rand(0, strlen($chars) - 1)];
        }
        return $final_rand;
    }

    public static function slugify($text) {
        // replace non letter or digits by -
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
        // trim
        $text = trim($text, '-');
        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        // lowercase
        $text = strtolower($text);
        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

    public static function rememberMe($username, $check) {
        if ($check > 0) {
            $time = time();     // Gets the current server time
            $cookie = new CHttpCookie('wipo_admin_username', $username);

            $cookie->expire = $time + 60 * 60 * 24 * 30;               // 30 days
            Yii::app()->request->cookies['wipo_admin_username'] = $cookie;
        } else {
            unset(Yii::app()->request->cookies['wipo_admin_username']);
        }
    }

    public static function getDocumentStatus($key = NULL) {
        $status = array(
            'N' => 'Declared work',
            'I' => 'International File',
            'U' => 'Undeclared National Work',
            'V' => 'Warsaw Rule',
            'W' => 'Foreign Work',
            'Q' => 'Unidentified Work',
            'X' => 'Non-Identified Work',
            'Y' => 'Worldwide Non Documented Work',
        );

        if(isset($key) && $key != NULL)
            return $status[$key];

        return $status;
    }

    public static function getSocialType($key = NULL) {
        $types = array(
            'Author' => 'Author',
            'Performer' => 'Performer',
            'Producer' => 'Producer',
            'Multiple' => 'Multiple',
            'Copyright' => 'Copyright',
        );

        if(isset($key) && $key != NULL)
            return $types[$key];

        return $types;
    }

    public static function getGender($key = NULL){
        $gender = array(
            'M' => 'Male',
            'F' => 'Female'
        );
        if(isset($key) && $key != NULL)
            return $gender[$key];

        return $gender;
    }

    public static function getGroupClause($key = NULL){
        $clause = array(
            'M' => 'Made',
            'S' => 'Sale'
        );
        if(isset($key) && $key != NULL)
            return $clause[$key];

        return $clause;
    }

    public static function getClause($key = NULL){
        $clause = array(
            'M' => 'Made',
            'S' => 'Sale'
        );
        if(isset($key) && $key != NULL)
            return $clause[$key];

        return $clause;
    }

    public static function getSearchStatus($key = NULL){
        $search = array(
            'A' => 'Active',
            'E' => 'Expired',
            'I' => 'Non-Member',
        );
        if(isset($key) && $key != NULL)
            return $search[$key];

        return $search;
    }

    public static function addAuditTrail($message,$class = 'comment-o') {
        $obj = new AuditTrail();
        $obj->aud_message   = $message;
        $obj->aud_class     = $class;

        $obj->save();
        return;
    }
}
