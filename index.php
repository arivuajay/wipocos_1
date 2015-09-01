<?php

//error_reporting(E_ALL & ~E_NOTICE  & ~E_DEPRECATED);
error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
// change the following paths if necessary
$yii = dirname(__FILE__) . '/framework/yii.php';
$config = dirname(__FILE__) . '/protected/config/main.php';
include_once(dirname(__FILE__) . '/protected/config/constants.php');

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG', true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);

require_once($yii);
$app = Yii::createWebApplication($config);

$soc_id = DEFAULT_SOCIETY_ID;
if (isset(Yii::app()->user->id)) {
    $user = User::model()->find('id = :U', array(':U' => Yii::app()->user->id));
    if(!empty($user))
        $soc_id = $user->society_id;
}
$society = Society::model()->findByPk($soc_id);
if ($society) {
    defined('DEFAULT_NATIONALITY_ID') || @define('DEFAULT_NATIONALITY_ID', $society->socOrg->Org_Nation_Id);
    defined('DEFAULT_COUNTRY_ID') || @define('DEFAULT_COUNTRY_ID', $society->Society_Country_Id);
    defined('DEFAULT_REGION_ID') || @define('DEFAULT_REGION_ID', $society->Society_Region_Id);
    defined('DEFAULT_LANGUAGE_ID') || @define('DEFAULT_LANGUAGE_ID', $society->Society_Language_Id);
    defined('DEFAULT_FACTOR_ID') || @define('DEFAULT_FACTOR_ID', $society->Society_Factor);
    defined('DEFAULT_TERRITORY_ID') || @define('DEFAULT_TERRITORY_ID', $society->Society_Territory_Id);
    defined('DEFAULT_TYPE_ID') || @define('DEFAULT_TYPE_ID', $society->Society_Type_Id);
    defined('DEFAULT_DOCUMENT_TYPE_ID') || @define('DEFAULT_DOCUMENT_TYPE_ID', $society->Society_Doc_Id);
    defined('DEFAULT_WORK_CATEGORY_ID') || @define('DEFAULT_WORK_CATEGORY_ID', $society->Soceity_Work_Cat_Id);
    defined('DEFAULT_INTERNAL_POSITION_ID') || @define('DEFAULT_INTERNAL_POSITION_ID', $society->Soceity_Int_Pos_Id);
    defined('DEFAULT_MANAGED_RIGHTS_ID') || @define('DEFAULT_MANAGED_RIGHTS_ID', $society->Soceity_Mnge_Rght_Id);
    defined('DEFAULT_DOCUMENT_STATUS_ID') || @define('DEFAULT_DOCUMENT_STATUS_ID', $society->Soceity_Doc_Sts_Id);
    defined('DEFAULT_RECORD_TYPE_ID') || @define('DEFAULT_RECORD_TYPE_ID', $society->Soceity_Rec_Type_Id);
    defined('DEFAULT_MEDIUM_ID') || @define('DEFAULT_MEDIUM_ID', $society->Soceity_Medium_Id);
    defined('DEFAULT_LEGAL_FORM_ID') || @define('DEFAULT_LEGAL_FORM_ID', $society->Soceity_Legal_Form_Id);
}

defined('SITEURL') ||
        @define('SITEURL', Yii::app()->createAbsoluteUrl("/"));
defined('SITENAME') ||
        @define('SITENAME', Yii::app()->name);

defined('DS') ||
        @define('DS', DIRECTORY_SEPARATOR);

$app->run();
