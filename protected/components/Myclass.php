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

    public static function guid($opt = true) {
        $new_guid = Myclass::create_guid($opt);
        do {
            $exist_count = AuthorAccount::model()->countByAttributes(array('Auth_GUID' => $new_guid));
            $exist_count += PerformerAccount::model()->countByAttributes(array('Perf_GUID' => $new_guid));
            $exist_count += PublisherAccount::model()->countByAttributes(array('Pub_GUID' => $new_guid));
            $exist_count += ProducerAccount::model()->countByAttributes(array('Pro_GUID' => $new_guid));
            $exist_count += Group::model()->countByAttributes(array('Group_GUID' => $new_guid));
            $exist_count += PublisherGroup::model()->countByAttributes(array('Pub_Group_GUID' => $new_guid));

            if ($exist_count > 0) {
                $old_guid = $new_guid;
                $new_guid = Myclass::create_guid($opt);
            } else {
                break;
            }
        } while ($old_guid != $new_guid);
        return $new_guid;
    }

    public static function create_guid($opt = true) {       //  Set to true/false as your default way to do this.
        if (function_exists('com_create_guid')) {
            if ($opt) {
                return com_create_guid();
            } else {
                return trim(com_create_guid(), '{}');
            }
        } else {
            mt_srand((double) microtime() * 10000);    // optional for php 4.2.0 and up.
            $charid = strtoupper(md5(uniqid(rand(), true)));
            $hyphen = chr(45);    // "-"
            $left_curly = $opt ? chr(123) : "";     //  "{"
            $right_curly = $opt ? chr(125) : "";    //  "}"
            $uuid = $left_curly
                    . substr($charid, 0, 8) . $hyphen
                    . substr($charid, 8, 4) . $hyphen
                    . substr($charid, 12, 4) . $hyphen
                    . substr($charid, 16, 4) . $hyphen
                    . substr($charid, 20, 12)
                    . $right_curly;
            return $uuid;
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

        if ($key != NULL)
            return $status[$key];

        return $status;
    }

    public static function getGender($key = NULL) {
        $gender = array(
            'M' => 'Male',
            'F' => 'Female'
        );
        if ($key != NULL)
            return $gender[$key];

        return $gender;
    }

    public static function getGroupClause($key = NULL) {
        $clause = array(
            'M' => 'Made',
            'S' => 'Sale'
        );
        if ($key != NULL)
            return $clause[$key];

        return $clause;
    }

    public static function getClause($key = NULL) {
        $clause = array(
            'M' => 'Made',
            'S' => 'Sale'
        );
        if ($key != NULL)
            return $clause[$key];

        return $clause;
    }

    public static function getSearchStatus($key = NULL) {
        $search = array(
            'A' => 'Active',
            'E' => 'Expired',
            'I' => 'Non-Member',
        );
        if ($key != NULL)
            return $search[$key];

        return $search;
    }

    public static function addAuditTrail($message, $class = 'comment-o') {
        $obj = new AuditTrail();
        $obj->aud_message = $message;
        $obj->aud_class = $class;

        $obj->save();
        return;
    }

    //drop down list
    public static function getMasterMaritalStatus($is_active = TRUE, $key = NULL) {
        if ($is_active && $key == NULL)
            $marital_status = CHtml::listData(MasterMaritalStatus::model()->isActive()->findAll(array('order' => 'Marital_State')), 'Master_Marital_State_Id', 'Marital_State');
        else
            $marital_status = CHtml::listData(MasterMaritalStatus::model()->findAll(array('order' => 'Marital_State')), 'Master_Marital_State_Id', 'Marital_State');
        if ($key != NULL)
            return $marital_status[$key];
        return $marital_status;
    }

    public static function getMasterCountry($is_active = TRUE, $key = NULL) {
        if ($is_active && $key == NULL)
            $countries = CHtml::listData(MasterCountry::model()->isActive()->findAll(array('order' => 'Country_Name')), 'Master_Country_Id', 'Country_Name');
        else
            $countries = CHtml::listData(MasterCountry::model()->findAll(array('order' => 'Country_Name')), 'Master_Country_Id', 'Country_Name');
        if ($key != NULL)
            return $countries[$key];
        return $countries;
    }

    public static function getMasterLanguage($is_active = TRUE, $key = NULL) {
        if ($is_active && $key == NULL)
            $languages = CHtml::listData(MasterLanguage::model()->isActive()->findAll(array('order' => 'Lang_Name')), 'Master_Lang_Id', 'Lang_Name');
        else
            $languages = CHtml::listData(MasterLanguage::model()->findAll(array('order' => 'Lang_Name')), 'Master_Lang_Id', 'Lang_Name');
        if ($key != NULL)
            return $languages[$key];
        return $languages;
    }

    public static function getMasterNationality($is_active = TRUE, $key = NULL) {
        if ($is_active && $key == NULL)
            $nationalities = CHtml::listData(MasterNationality::model()->isActive()->findAll(array('order' => 'Nation_Name')), 'Master_Nation_Id', 'Nation_Name');
        else
            $nationalities = CHtml::listData(MasterNationality::model()->findAll(array('order' => 'Nation_Name')), 'Master_Nation_Id', 'Nation_Name');
        if ($key != NULL)
            return $nationalities[$key];
        return $nationalities;
    }

    public static function getMasterRegion($is_active = TRUE, $key = NULL) {
        if ($is_active && $key == NULL)
            $regions = CHtml::listData(MasterRegion::model()->isActive()->findAll(array('order' => 'Region_Name')), 'Master_Region_Id', 'Region_Name');
        else
            $regions = CHtml::listData(MasterRegion::model()->findAll(array('order' => 'Region_Name')), 'Master_Region_Id', 'Region_Name');
        if ($key != NULL)
            return $regions[$key];
        return $regions;
    }

    public static function getSociety($is_active = TRUE, $key = NULL) {
        if ($is_active && $key == NULL)
            $societies = CHtml::listData(Society::model()->with('socOrg')->isActive()->findAll(array('order' => 'Society_Code')), 'Society_Id', 'Societyname');
        else
            $societies = CHtml::listData(Society::model()->with('socOrg')->findAll(array('order' => 'Society_Code')), 'Society_Id', 'Societyname');
        if ($key != NULL)
            return $societies[$key];
        return $societies;
    }

    public static function getMasterProfession($is_active = TRUE, $key = NULL) {
        if ($is_active && $key == NULL)
            $professions = CHtml::listData(MasterProfession::model()->isActive()->findAll(array('order' => 'Profession_Name')), 'Master_Profession_Id', 'Profession_Name');
        else
            $professions = CHtml::listData(MasterProfession::model()->findAll(array('order' => 'Profession_Name')), 'Master_Profession_Id', 'Profession_Name');
        if ($key != NULL)
            return $professions[$key];
        return $professions;
    }

    public static function getMasterWorkCategory($is_active = TRUE, $key = NULL) {
        if ($is_active && $key == NULL)
            $work_categories = CHtml::listData(MasterWorksCategory::model()->isActive()->findAll(array('order' => 'Work_Category_Name')), 'Master_Work_Category_Id', 'Work_Category_Name');
        else
            $work_categories = CHtml::listData(MasterWorksCategory::model()->findAll(array('order' => 'Work_Category_Name')), 'Master_Work_Category_Id', 'Work_Category_Name');
        if ($key != NULL)
            return $work_categories[$key];
        return $work_categories;
    }

    public static function getMasterTypeRight($occupation, $is_active = TRUE, $key = NULL) {
        if ($is_active && $key == NULL)
            $right_types = CHtml::listData(MasterTypeRights::model()->isActive()->findAll(array(
                                'condition' => 'Type_Rights_Occupation = :occ',
                                'params' => array(':occ' => $occupation),
                            )), 'Master_Type_Rights_Id', 'namewithcode');
        else
            $right_types = CHtml::listData(MasterTypeRights::model()->findAll(array(
                                'condition' => 'Type_Rights_Occupation = :occ',
                                'params' => array(':occ' => $occupation),
                            )), 'Master_Type_Rights_Id', 'namewithcode');
        if ($key != NULL)
            return $right_types[$key];
        return $right_types;
    }

    public static function getMasterTerritory($is_active = TRUE, $key = NULL) {
        if ($is_active && $key == NULL)
            $territories = CHtml::listData(MasterTerritories::model()->isActive()->findAll(array('order' => 'Territory_Name')), 'Master_Territory_Id', 'Territory_Name');
        else
            $territories = CHtml::listData(MasterTerritories::model()->findAll(array('order' => 'Territory_Name')), 'Master_Territory_Id', 'Territory_Name');
        if ($key != NULL)
            return $territories[$key];
        return $territories;
    }

    public static function getMasterManagedRight($is_active = TRUE, $key = NULL) {
        if ($is_active && $key == NULL)
            $managed_rights = CHtml::listData(MasterManagedRights::model()->isActive()->findAll(array('order' => 'Mgd_Rights_Name')), 'Master_Mgd_Rights_Id', 'Mgd_Rights_Name');
        else
            $managed_rights = CHtml::listData(MasterManagedRights::model()->findAll(array('order' => 'Mgd_Rights_Name')), 'Master_Mgd_Rights_Id', 'Mgd_Rights_Name');
        if ($key != NULL)
            return $managed_rights[$key];
        return $managed_rights;
    }

    public static function getMasterInternalPosition($is_active = TRUE, $key = NULL) {
        if ($is_active && $key == NULL)
            $internal_positions = CHtml::listData(MasterInternalPosition::model()->isActive()->findAll(array('order' => 'Int_Post_Name')), 'Master_Int_Post_Id', 'Int_Post_Name');
        else
            $internal_positions = CHtml::listData(MasterInternalPosition::model()->findAll(array('order' => 'Int_Post_Name')), 'Master_Int_Post_Id', 'Int_Post_Name');
        if ($key != NULL)
            return $internal_positions[$key];
        return $internal_positions;
    }

    public static function getMasterPaymentMethod($is_active = TRUE, $key = NULL) {
        if ($is_active && $key == NULL)
            $pay_methods = CHtml::listData(MasterPaymentMethod::model()->isActive()->findAll(array('order' => 'Paymode_Name')), 'Master_Paymode_Id', 'Paymode_Name');
        else
            $pay_methods = CHtml::listData(MasterPaymentMethod::model()->findAll(array('order' => 'Paymode_Name')), 'Master_Paymode_Id', 'Paymode_Name');
        if ($key != NULL)
            return $pay_methods[$key];
        return $pay_methods;
    }

    public static function getMasterPseudonym($is_active = TRUE, $key = NULL) {
        if ($is_active && $key == NULL)
            $psedonyms = CHtml::listData(MasterPseudonymTypes::model()->isActive()->findAll(array('order' => 'Pseudo_Code')), 'Pseudo_Id', 'Pseudo_Code');
        else
            $psedonyms = CHtml::listData(MasterPseudonymTypes::model()->findAll(array('order' => 'Pseudo_Code')), 'Pseudo_Id', 'Pseudo_Code');
        if ($key != NULL)
            return $psedonyms[$key];
        return $psedonyms;
    }

    public static function getMasterRole($is_active = TRUE, $key = NULL) {
        $names = CHtml::listData(MasterRole::model()->findAll(array('order' => 'Role_Code')), 'Master_Role_ID', 'Description');
        if ($key != NULL)
            return $names[$key];
        return $names;
    }

    public static function getMasterModule($is_active = TRUE, $key = NULL) {
        $modules = CHtml::listData(MasterModule::model()->findAll(array('order' => 'Module_Code')), 'Master_Module_ID', 'Description');
        if ($key != NULL)
            return $modules[$key];
        return $modules;
    }

    public static function getMasterLegalForm($is_active = TRUE, $key = NULL) {
        if ($is_active && $key == NULL)
            $legal_forms = CHtml::listData(MasterLegalForm::model()->isActive()->findAll(array('order' => 'Legal_Form_Name')), 'Master_Legal_Form_Id', 'Legal_Form_Name');
        else
            $legal_forms = CHtml::listData(MasterLegalForm::model()->findAll(array('order' => 'Legal_Form_Name')), 'Master_Legal_Form_Id', 'Legal_Form_Name');
        if ($key != NULL)
            return $legal_forms[$key];
        return $legal_forms;
    }

    public static function getMasterDocumentStatus($is_active = TRUE, $key = NULL) {
        if ($is_active && $key == NULL)
            $sts = CHtml::listData(MasterDocumentStatus::model()->isActive()->findAll(array('order' => 'Document_Sts_Code')), 'Master_Document_Sts_Id', 'Document_Sts_Code');
        else
            $sts = CHtml::listData(MasterDocumentStatus::model()->findAll(array('order' => 'Document_Sts_Code')), 'Master_Document_Sts_Id', 'Document_Sts_Code');
        if ($key != NULL)
            return $sts[$key];
        return $sts;
    }

    public static function getMasterCurrency($is_active = TRUE, $key = NULL) {
        if ($is_active && $key == NULL)
            $currencies = CHtml::listData(MasterCurrency::model()->isActive()->findAll(array('order' => 'Currency_Name')), 'Master_Crncy_Id', 'Currency_Name');
        else
            $currencies = CHtml::listData(MasterCurrency::model()->findAll(array('order' => 'Currency_Name')), 'Master_Crncy_Id', 'Currency_Name');
        if ($key != NULL)
            return $currencies[$key];
        return $currencies;
    }

    public static function getMasterLabel($is_active = TRUE, $key = NULL) {
        if ($is_active && $key == NULL)
            $labels = CHtml::listData(MasterLabel::model()->isActive()->findAll(array('order' => 'Label_Name')), 'Master_Label_Id', 'Label_Name');
        else
            $labels = CHtml::listData(MasterLabel::model()->findAll(array('order' => 'Label_Name')), 'Master_Label_Id', 'Label_Name');
        if ($key != NULL)
            return $labels[$key];
        return $labels;
    }

    public static function getProducer($key = NULL) {
        $producers = CHtml::listData(ProducerAccount::model()->findAll(array('order' => 'Pro_Corporate_Name')), 'Pro_Acc_Id', 'Pro_Corporate_Name');
        if ($key != NULL)
            return $producers[$key];
        return $producers;
    }

    public static function getPerformer($key = NULL) {
        $producers = CHtml::listData(PerformerAccount::model()->findAll(array('order' => 'Perf_First_Name')), 'Perf_Acc_Id', 'Perf_First_Name');
        if ($key != NULL)
            return $producers[$key];
        return $producers;
    }

    public static function getMasterDocumentType($is_active = TRUE, $key = NULL) {
        if ($is_active && $key == NULL)
            $document_types = CHtml::listData(MasterDocumentType::model()->isActive()->findAll(array('order' => 'Doc_Type_Name')), 'Master_Doc_Type_Id', 'Doc_Type_Name');
        else
            $document_types = CHtml::listData(MasterDocumentType::model()->findAll(array('order' => 'Doc_Type_Name')), 'Master_Doc_Type_Id', 'Doc_Type_Name');
        if ($key != NULL)
            return $document_types[$key];
        return $document_types;
    }

    public static function getMasterDocument($is_active = TRUE, $key = NULL) {
        if ($is_active && $key == NULL)
            $documents = CHtml::listData(MasterDocument::model()->isActive()->findAll(array('order' => 'Doc_Name')), 'Master_Doc_Id', 'Doc_Name');
        else
            $documents = CHtml::listData(MasterDocument::model()->findAll(array('order' => 'Doc_Name')), 'Master_Doc_Id', 'Doc_Name');
        if ($key != NULL)
            return $documents[$key];
        return $documents;
    }

    public static function getOrganization($key = NULL) {
        $organization = CHtml::listData(Organization::model()->findAll(array('order' => 'Org_Abbrevation')), 'Org_Id', 'Org_Abbrevation');
        if ($key != NULL)
            return $organization[$key];
        return $organization;
    }

    public static function getMasterHierarchy($is_active = TRUE, $key = NULL) {
        if ($is_active && $key == NULL)
            $hierarchy = CHtml::listData(MasterHierarchy::model()->isActive()->findAll(array('order' => 'Hierarchy_Name')), 'Master_Hierarchy_Id', 'Hierarchy_Name');
        else
            $hierarchy = CHtml::listData(MasterHierarchy::model()->findAll(array('order' => 'Hierarchy_Name')), 'Master_Hierarchy_Id', 'Hierarchy_Name');
        if ($key != NULL)
            return $hierarchy[$key];
        return $hierarchy;
    }

    public static function getMasterType($is_active = TRUE, $key = NULL) {
        if ($is_active && $key == NULL)
            $types = CHtml::listData(MasterType::model()->isActive()->findAll(array('order' => 'Type_Name')), 'Master_Type_Id', 'Type_Name');
        else
            $types = CHtml::listData(MasterType::model()->findAll(array('order' => 'Type_Name')), 'Master_Type_Id', 'Type_Name');
        if ($key != NULL)
            return $types[$key];
        return $types;
    }

    public static function getMasterFactor($is_active = TRUE, $key = NULL) {
        if ($is_active && $key == NULL)
            $factors = CHtml::listData(MasterFactor::model()->isActive()->findAll(array('order' => 'Factor')), 'Master_Factor_Id', 'Factor');
        else
            $factors = CHtml::listData(MasterFactor::model()->findAll(array('order' => 'Factor')), 'Master_Factor_Id', 'Factor');
        if ($key != NULL)
            return $factors[$key];
        return $factors;
    }

    public static function getMasterInstrument($is_active = TRUE, $key = NULL) {
        if ($is_active && $key == NULL)
            $instruments = CHtml::listData(MasterInstrument::model()->isActive(array('order' => 'Instrument_Name'))->findAll(), 'Master_Inst_Id', 'Instrument_Name');
        else
            $instruments = CHtml::listData(MasterInstrument::model()->findAll(array('order' => 'Instrument_Name')), 'Master_Inst_Id', 'Instrument_Name');
        if ($key != NULL)
            return $instruments[$key];
        return $instruments;
    }

    //end

    public static function getAuthorconvertIgnorelist() {
        return array('Auth_Acc_Id', 'Created_Date', 'Auth_Addr_Id', 'Rowversion', 'Auth_Biogrph_Id', 'Auth_Death_Inhrt_Id',
            'Auth_Pay_Id', 'Auth_Pseudo_Id', 'Auth_Upl_Id', 'Perf_Acc_Id', 'Perf_Addr_Id', 'Perf_Biogrph_Id', 'Perf_Death_Inhrt_Id',
            'Perf_Pay_Id', 'Perf_Pseudo_Id', 'Perf_Upl_Id');
    }

    public static function getPublisherconvertIgnorelist() {
        return array('Pub_Acc_Id', 'Created_Date', 'Pub_Addr_Id', 'Rowversion', 'Pub_Biogrph_Id', 'Pub_Death_Inhrt_Id',
            'Pub_Pay_Id', 'Pub_Pseudo_Id', 'Pro_Acc_Id', 'Pro_Addr_Id', 'Pro_Biogrph_Id', 'Pro_Death_Inhrt_Id',
            'Pro_Pay_Id', 'Pro_Pseudo_Id');
    }

    public static function reArrayFiles($model, $column) {
        $file_ary = array();
        $file_count = count($_FILES[$model]['name'][$column]);
        $file_keys = array_keys($_FILES[$model]);

        for ($i = 0; $i < $file_count; $i++) {
            foreach ($file_keys as $key) {
                $file_ary[$i][$key] = $_FILES[$model][$key][$column][$i];
            }
        }
        return $file_ary;
    }

}
