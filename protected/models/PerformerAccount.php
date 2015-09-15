<?php

/**
 * This is the model class for table "{{performer_account}}".
 *
 * The followings are the available columns in table '{{performer_account}}':
 * @property integer $Perf_Acc_Id
 * @property string $Perf_Sur_Name
 * @property string $Perf_First_Name
 * @property string $Perf_Internal_Code
 * @property integer $Perf_Ipi
 * @property integer $Perf_Ipi_Base_Number
 * @property integer $Perf_Ipn_Number
 * @property string $Perf_DOB
 * @property integer $Perf_Place_Of_Birth_Id
 * @property integer $Perf_Birth_Country_Id
 * @property integer $Perf_Nationality_Id
 * @property integer $Perf_Language_Id
 * @property string $Perf_Identity_Number
 * @property integer $Perf_Marital_Status_Id
 * @property string $Perf_Spouse_Name
 * @property string $Perf_Gender
 * @property string $Perf_Non_Member
 * @property string $Active
 * @property string $Perf_Is_Author
 * @property string $Perf_Photo
 * @property string $Created_Date
 * @property string $Rowversion
 *
 * The followings are the available model relations:
 * @property MasterMaritalStatus $perfMaritalStatus
 * @property MasterCountry $perfBirthCountry
 * @property MasterLanguage $perfLanguage
 * @property MasterNationality $perfNationality
 * @property MasterRegion $perfPlaceOfBirth
 * @property PerformerAccountAddress[] $performerAccountAddresses
 * @property PerformerBiography[] $performerBiographies
 * @property PerformerDeathInheritance[] $performerDeathInheritances
 * @property PerformerManageRights[] $performerManageRights
 * @property PerformerPaymentMethod[] $performerPaymentMethods
 * @property PerformerPseudonym[] $performerPseudonyms
 * @property PerformerRelatedRights[] $performerRelatedRights
 */
class PerformerAccount extends RActiveRecord {

    public $expiry_date;
    public $hierarchy_level;
    public $record_search;
    public $search_status;
    public $is_performer;

    public $before_save_enable = true;
    public $after_save_enable = true;
    public $after_delete_disable = true;

    public $oldRecord;

    public $internal_increament = true;
    
    const PHOTO_SIZE = 1;
    const MIN_AGE = 20; //in years
    const MAX_AGE = 80; //in years

    public function init() {
        parent::init();
        if ($this->isNewRecord) {
            $this->Perf_Birth_Country_Id = DEFAULT_COUNTRY_ID;
            $this->Perf_Nationality_Id = DEFAULT_NATIONALITY_ID;
            $this->Perf_Language_Id = DEFAULT_LANGUAGE_ID;
            $this->Perf_GUID = Myclass::guid(false);

            $this->Perf_Internal_Code =  InternalcodeGenerate::model()->find("Gen_User_Type = :type",
                    array(':type' => InternalcodeGenerate::PERFORMER_CODE))->Fullcode;
        }
    }

    public function getFullName() {
        return $this->Perf_First_Name . " " . $this->Perf_Sur_Name;
    }
    
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{performer_account}}';
    }

    public function scopes() {
        $alias = $this->getTableAlias(false, false);
        return array(
            'isActive' => array('condition' => "$alias.Active = '1'"),
            'isStatusActive' => array('condition' => "$alias.Perf_Non_Member = 'N' AND (performerRelatedRights.Perf_Rel_Exit_Date is Null OR performerRelatedRights.Perf_Rel_Exit_Date = '0000-00-00' OR performerRelatedRights.Perf_Rel_Exit_Date >= DATE(NOW()))")
//            'isStatusActive' => array('condition' => "performerRelatedRights.Perf_Rel_Exit_Date is not Null And performerRelatedRights.Perf_Rel_Exit_Date != '0000-00-00' And performerRelatedRights.Perf_Rel_Exit_Date >= DATE(NOW())")
        );
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Perf_Sur_Name, Perf_First_Name, Perf_Internal_Code', 'required'),
            array('Perf_Ipi, Perf_Ipi_Base_Number, Perf_Ipn_Number, Perf_Place_Of_Birth_Id, Perf_Birth_Country_Id, Perf_Nationality_Id, Perf_Language_Id, Perf_Marital_Status_Id, Created_By, Updated_By', 'numerical', 'integerOnly' => true),
            array('Perf_Sur_Name', 'length', 'max' => 50),
            array('Perf_First_Name, Perf_Internal_Code, Perf_Identity_Number, Perf_Spouse_Name', 'length', 'max' => 255),
            array('Perf_Gender, Active', 'length', 'max' => 1),
            array('Created_Date, Rowversion,record_search, Perf_Non_Member, Perf_Is_Author, is_performer, Perf_GUID, Perf_Photo', 'safe'),
            array('Perf_Internal_Code, Perf_GUID', 'unique'),
            array('Perf_Sur_Name', 'nameUnique'),
            array(
                'Perf_First_Name, Perf_Sur_Name, Perf_Spouse_Name',
                'match', 'pattern' => '/^[a-zA-Z\s]+$/',
                'message' => 'Only Alphabets are allowed ',
            ),
            array('Perf_First_Name', 'UniqueAttributesValidator', 'with' => 'Perf_Sur_Name', "message" => "This User Name already Exists"),
            array('Perf_Photo', 'file', 'types'=>'jpg,png,jpeg', 'allowEmpty' => true, 'maxSize' => 1024 * 1024 * self::PHOTO_SIZE, 'tooLarge' => 'File should be smaller than ' . self::PHOTO_SIZE . 'MB'),
//            array('Perf_DOB', 'compare', 'compareValue' => date("Y-m-d", strtotime('-'.self::MIN_AGE.' years')), 'operator' => '<', 'message' => '{attribute} must be lesser than "{compareValue}". Age must be minimum '.self::MIN_AGE.' years'),
            array('Perf_DOB', 'compare', 'allowEmpty' => true, 'compareValue' => date("Y-m-d", strtotime('-'.self::MAX_AGE.' years')), 'operator' => '>', 'message' => '{attribute} must be greater than "{compareValue}". Age may be maximum '.self::MAX_AGE.' years'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Perf_Acc_Id, Perf_Sur_Name, Perf_First_Name, Perf_Internal_Code, Perf_Ipi, Perf_Ipi_Base_Number, Perf_Ipn_Number, Perf_DOB, Perf_Place_Of_Birth_Id, Perf_Birth_Country_Id, Perf_Nationality_Id, Perf_Language_Id, Perf_Identity_Number, Perf_Marital_Status_Id, Perf_Spouse_Name, Perf_Gender, Perf_Non_Member, Active, Created_Date, Rowversion, expiry_date, hierarchy_level, record_search', 'safe', 'on' => 'search'),
            array('Created_By, Updated_By', 'safe'),
        );
    }

    public function nameUnique($attribute, $params) {
        if (strcasecmp($this->Perf_First_Name, $this->Perf_Sur_Name) == 0) {
            $this->addError($attribute, 'First name and Last cannot be equal.');
        }
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'perfMaritalStatus' => array(self::BELONGS_TO, 'MasterMaritalStatus', 'Perf_Marital_Status_Id'),
            'perfBirthCountry' => array(self::BELONGS_TO, 'MasterCountry', 'Perf_Birth_Country_Id'),
            'perfLanguage' => array(self::BELONGS_TO, 'MasterLanguage', 'Perf_Language_Id'),
            'perfNationality' => array(self::BELONGS_TO, 'MasterNationality', 'Perf_Nationality_Id'),
            'perfPlaceOfBirth' => array(self::BELONGS_TO, 'MasterRegion', 'Perf_Place_Of_Birth_Id'),
            'performerAccountAddresses' => array(self::HAS_ONE, 'PerformerAccountAddress', 'Perf_Acc_Id'),
            'performerBiographies' => array(self::HAS_ONE, 'PerformerBiography', 'Perf_Acc_Id'),
            'performerDeathInheritances' => array(self::HAS_ONE, 'PerformerDeathInheritance', 'Perf_Acc_Id'),
//            'performerManageRights' => array(self::HAS_ONE, 'PerformerManageRights', 'Perf_Acc_Id'),
            'performerPaymentMethods' => array(self::HAS_ONE, 'PerformerPaymentMethod', 'Perf_Acc_Id'),
            'performerPseudonyms' => array(self::HAS_ONE, 'PerformerPseudonym', 'Perf_Acc_id'),
            'performerRelatedRights' => array(self::HAS_ONE, 'PerformerRelatedRights', 'Perf_Acc_Id'),
            'performerUploads' => array(self::HAS_MANY, 'PerformerUpload', 'Perf_Acc_id'),
            'groupMembers' => array(self::HAS_MANY, 'GroupMembers', 'Group_Member_Internal_Code',
                'foreignKey' => array('Group_Member_GUID' => 'Perf_GUID')
            ),
            'createdBy' => array(self::BELONGS_TO, 'User', 'Created_By'),
            'updatedBy' => array(self::BELONGS_TO, 'User', 'Updated_By'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Perf_Acc_Id' => 'Id',
            'Perf_Sur_Name' => 'Last Name',
            'Perf_First_Name' => 'First Name',
            'Perf_Internal_Code' => 'Internal Code',
            'Perf_Ipi' => 'IPI Name Number',
            'Perf_Ipi_Base_Number' => 'IPI Base Number',
            'Perf_Ipn_Number' => 'IPN Number',
            'Perf_DOB' => 'Date Of Birth',
            'Perf_Place_Of_Birth_Id' => 'Place Of Birth',
            'Perf_Birth_Country_Id' => 'Birth Country',
            'Perf_Nationality_Id' => 'Nationality',
            'Perf_Language_Id' => 'Language',
            'Perf_Identity_Number' => 'Identity Number',
            'Perf_Marital_Status_Id' => 'Marital Status',
            'Perf_Spouse_Name' => 'Spouse Name',
            'Perf_Gender' => 'Gender',
            'Active' => 'Active',
            'Created_Date' => 'Date of Join',
            'Rowversion' => 'Rowversion',
            'expiry_date' => 'Expiry Date',
            'hierarchy_level' => 'Internal Position',
            'Perf_Non_Member' => 'Non Member',
            'Perf_Is_Author' => 'Author',
            'is_performer' => 'Performer',
            'Perf_Photo' => 'Profile Picture',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;
        $criteria->with = array('performerRelatedRights');

        $criteria->compare('Perf_Acc_Id', $this->Perf_Acc_Id);
        $criteria->compare('Perf_Sur_Name', $this->Perf_Sur_Name, true);
        $criteria->compare('Perf_First_Name', $this->Perf_First_Name, true);
        $criteria->compare('Perf_Internal_Code', $this->Perf_Internal_Code, true);
        $criteria->compare('Perf_Ipi', $this->Perf_Ipi);
        $criteria->compare('Perf_Ipi_Base_Number', $this->Perf_Ipi_Base_Number);
        $criteria->compare('Perf_Ipn_Number', $this->Perf_Ipn_Number);
        $criteria->compare('Perf_DOB', $this->Perf_DOB, true);
        $criteria->compare('Perf_Place_Of_Birth_Id', $this->Perf_Place_Of_Birth_Id);
        $criteria->compare('Perf_Birth_Country_Id', $this->Perf_Birth_Country_Id);
        $criteria->compare('Perf_Nationality_Id', $this->Perf_Nationality_Id);
        $criteria->compare('Perf_Language_Id', $this->Perf_Language_Id);
        $criteria->compare('Perf_Identity_Number', $this->Perf_Identity_Number, true);
        $criteria->compare('Perf_Marital_Status_Id', $this->Perf_Marital_Status_Id);
        $criteria->compare('Perf_Spouse_Name', $this->Perf_Spouse_Name, true);
        $criteria->compare('Perf_Gender', $this->Perf_Gender, true);
        $criteria->compare('Active', $this->Active, true);
        $criteria->compare('Created_Date', $this->Created_Date, true);
        $criteria->compare('Rowversion', $this->Rowversion, true);
        $criteria->compare('performerRelatedRights.Perf_Rel_Exit_Date', $this->expiry_date, true);
        $criteria->compare('performerRelatedRights.Perf_Rel_Internal_Position_Id', $this->hierarchy_level, true);

        $now = new CDbExpression("DATE(NOW())");
        if ($this->search_status == 'A') {
            $criteria->addCondition('performerRelatedRights.Perf_Rel_Exit_Date >= ' . $now . ' OR performerRelatedRights.Perf_Rel_Exit_Date = "0000-00-00" OR performerRelatedRights.Perf_Rel_Exit_Date is null');
            $criteria->compare('Perf_Non_Member', 'N', true);
        } elseif ($this->search_status == 'I') {
            $criteria->compare('Perf_Non_Member', 'Y', true);
        } elseif ($this->search_status == 'E') {
            $criteria->addCondition('performerRelatedRights.Perf_Rel_Exit_Date < ' . $now . ' And performerRelatedRights.Perf_Rel_Exit_Date != "0000-00-00"');
            $criteria->compare('Perf_Non_Member', 'N', true);
        }

        //Restrict to show only performer
        if(!UserIdentity::checkAccess(null, 'authoraccount', 'view')){
            $criteria->compare('Perf_Is_Author', 'N', true);
        }
        //End

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
//            'pagination' => false
            'pagination' => array(
                'pageSize' => PAGE_SIZE,
            )
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return PerformerAccount the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function dataProvider() {
        $criteria = new CDbCriteria;
        if (!empty($this->record_search)) {
            $criteria->compare('Perf_Acc_Id', $this->record_search, true, 'OR');
            $criteria->compare('Perf_Sur_Name', $this->record_search, true, 'OR');
            $criteria->compare('Perf_First_Name', $this->record_search, true, 'OR');
            $criteria->compare('Perf_Internal_Code', $this->record_search, true, 'OR');
            $criteria->compare('Perf_Ipi', $this->record_search, true, 'OR');
            $criteria->compare('Perf_Ipi_Base_Number', $this->record_search, true, 'OR');
            $criteria->compare('Perf_Ipn_Number', $this->record_search, true, 'OR');
            $criteria->compare('Perf_DOB', $this->record_search, true, 'OR');
            $criteria->compare('Perf_Place_Of_Birth_Id', $this->record_search, true, 'OR');
            $criteria->compare('Perf_Birth_Country_Id', $this->record_search, true, 'OR');
            $criteria->compare('Perf_Nationality_Id', $this->record_search, true, 'OR');
            $criteria->compare('Perf_Language_Id', $this->record_search, true, 'OR');
            $criteria->compare('Perf_Identity_Number', $this->record_search, true, 'OR');
            $criteria->compare('Perf_Marital_Status_Id', $this->record_search, true, 'OR');
            $criteria->compare('Perf_Spouse_Name', $this->record_search, true, 'OR');
            $criteria->compare('Perf_Gender', $this->record_search, true, 'OR');
            $criteria->compare('Active', $this->record_search, true, 'OR');
            $criteria->compare('Created_Date', $this->record_search, true, 'OR');
            $criteria->compare('Rowversion', $this->record_search, true, 'OR');
        }

        //Restrict to show only performers
        if(!UserIdentity::checkAccess(null, 'authoraccount', 'view')){
            $criteria->compare('Perf_Is_Author', 'N', true);
        }
        //End
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => false
//            'pagination' => array(
//                'pageSize' => PAGE_SIZE,
//            )
        ));
    }

    protected function beforeSave() {
        if ($this->Perf_Is_Author == 'Y' && $this->before_save_enable) {
            $gen_int_code = InternalcodeGenerate::model()->find("Gen_User_Type = :type", array(':type' => InternalcodeGenerate::AUTHOR_PERFORMER_CODE));
            if ($this->isNewRecord) {
                $this->Perf_Internal_Code = $gen_int_code->Fullcode;
            }else{
                if($this->oldRecord->Perf_Is_Author == 'N'){
                    $this->Perf_Internal_Code = $gen_int_code->Fullcode;
                }
            }
        }
        return parent::beforeSave();
    }

    protected function afterSave() {
        if ($this->isNewRecord) {
            if($this->internal_increament){
                $type = $this->Perf_Is_Author == 'Y' ? InternalcodeGenerate::AUTHOR_PERFORMER_CODE : InternalcodeGenerate::PERFORMER_CODE;
                InternalcodeGenerate::model()->codeIncreament($type);
            }

            if ($this->Perf_Is_Author == 'Y')
                $this->convert($this->Perf_Acc_Id);
        } elseif ($this->after_save_enable && !$this->isNewRecord) {
            $author_model = $this->checkAuthor($this->Perf_Internal_Code, false);

            switch ($this->Perf_Is_Author) {
                case 'N':
                    if (!empty($author_model)) {
                        $author_model->after_delete_disable = false;
                        $author_model->delete();

                        $gen_inter_model = InternalcodeGenerate::model()->find("Gen_User_Type = :type", array(':type' => InternalcodeGenerate::PERFORMER_CODE));
                        $this->after_save_enable = false;
                        $this->internal_increament = false;
                        $this->Perf_Internal_Code = $gen_inter_model->Fullcode;
                        $this->save(false);
                        InternalcodeGenerate::model()->codeIncreament(InternalcodeGenerate::PERFORMER_CODE);
                    }
                    break;
                case 'Y':
                    if($this->oldRecord->Perf_Is_Author == 'N')
                        InternalcodeGenerate::model()->codeIncreament(InternalcodeGenerate::AUTHOR_PERFORMER_CODE);

                    $this->convert($this->Perf_Acc_Id);
                    break;
            }
        }
        return parent::afterSave();
    }

    public function getStatus() {
        if ($this->Perf_Non_Member == 'Y') {
            $status = '<i class="fa fa-circle text-red" title="Non-member"></i>';
        } else {
            $status = '<i class="fa fa-circle text-green" title="Active"></i>';
            if ($this->performerRelatedRights && $this->performerRelatedRights->Perf_Rel_Exit_Date != '' && $this->performerRelatedRights->Perf_Rel_Exit_Date != '0000-00-00') {
                if (strtotime($this->performerRelatedRights->Perf_Rel_Exit_Date) < strtotime(date('Y-m-d'))) {
                    $status = '<i class="fa fa-circle text-yellow" title="Expired"></i>';
                }
            }
        }
        return $status;
    }

    public function checkAuthor($internal_code, $ret_sts = true) {
        $author = AuthorAccount::model()->findByAttributes(array('Auth_Internal_Code' => $internal_code));
        if ($ret_sts)
            return !empty($author);
        return $author;
    }

    protected function afterDelete() {
        $author_model = $this->checkAuthor($this->Perf_Internal_Code, false);
        if (!empty($author_model) && $this->after_delete_disable) {
            $author_model->after_delete_disable = false;
            $author_model->delete();
        }
        return parent::afterDelete();
    }

    public function convert($id) {
        $performer_model = self::model()->findByPk($id);
        $check_exists = $this->checkAuthor($performer_model->Perf_Internal_Code, false);
        $ignore_list = Myclass::getAuthorconvertIgnorelist();
        $author_model = empty($check_exists) ? new AuthorAccount : $check_exists;
        //basic data
        foreach ($performer_model->attributes as $key => $value) {
            $attr_name = str_replace('Perf_', 'Auth_', $key);
            !in_array($key, $ignore_list) ? $author_model->setAttribute($attr_name, $value) : '';
        }
        $author_model->Auth_Is_Performer = 'Y';
        $author_model->before_save_enable = false;
        $author_model->after_save_enable = false;
        if($author_model->isNewRecord)
            $author_model->internal_increament = false;
        $author_model->save(false);
        $auth_acc_id = $author_model->Auth_Acc_Id;

        if (!$this->isNewRecord) {
            $relModels = array(
                'performerAccountAddresses' => 'AuthorAccountAddress',
                'performerPaymentMethods' => 'AuthorPaymentMethod',
                'performerBiographies' => 'AuthorBiography',
                'performerPseudonyms' => 'AuthorPseudonym',
                'performerDeathInheritances' => 'AuthorDeathInheritance',
            );

            foreach ($relModels as $k => $v) {
                if (!empty($performer_model->$k)) {
                    $auth_rel_model = new $v;
                    $auth_rel_model->Auth_Acc_Id = $auth_acc_id;
                    foreach ($performer_model->$k->attributes as $key => $value) {
                        $attr_name = str_replace('Perf_', 'Auth_', $key);
                        !in_array($key, $ignore_list) ? $auth_rel_model->setAttribute($attr_name, $value) : '';
                    }
                    $auth_rel_model->save(false);
                    if($k == 'performerBiographies')
                        $bio_id = $auth_rel_model->Auth_Biogrph_Id;
                }
            }

            //Uploads
            if (!empty($performer_model->performerUploads)) {
                foreach ($performer_model->performerUploads as $upload) {
                    $author_upload_model = new AuthorUpload;
                    $author_upload_model->Auth_Acc_Id = $auth_acc_id;
                    foreach ($upload->attributes as $key => $value) {
                        $attr_name = str_replace('Perf_', 'Auth_', $key);
                        !in_array($key, $ignore_list) ? $author_upload_model->setAttribute($attr_name, $value) : '';
                    }
                    $author_upload_model->save(false);
                }
            }
            
            //Biography Uploads
            if (!empty($performer_model->performerBiographies->performerBiographUploads) && isset($bio_id)) {
                foreach ($performer_model->performerBiographies->performerBiographUploads as $upload) {
                    $author_bio_upload_model = new AuthorBiographUploads;
                    $author_bio_upload_model->Auth_Biogrph_Id = $bio_id;
                    foreach ($upload->attributes as $key => $value) {
                        $attr_name = str_replace('Perf_', 'Auth_', $key);
                        !in_array($key, $ignore_list) ? $author_bio_upload_model->setAttribute($attr_name, $value) : '';
                    }
                    $author_bio_upload_model->save(false);
                }
            }
        }
        return true;
    }

    public function afterTabsave($model, $relation) {
        $author_model = PerformerAccount::checkAuthor($this->perfAcc->Perf_Internal_Code, false);
        if (!empty($author_model)) {
            if (!empty($author_model->$relation)) {
                $dist_model = $author_model->$relation;
            } else {
                $dist_model = new $model;
                $dist_model->Auth_Acc_Id = $author_model->Auth_Acc_Id;
            }
            $ignore_list = Myclass::getAuthorconvertIgnorelist();
            foreach ($this->attributes as $key => $value) {
                $attr_name = str_replace('Perf_', 'Auth_', $key);
                !in_array($key, $ignore_list) ? $dist_model->setAttribute($attr_name, $value) : '';
            }
            $dist_model->after_save_enable = false;
            $dist_model->save(false);
        }
    }

    protected function afterFind() {
        $this->oldRecord = clone $this;
        return parent::afterFind();
    }
    
    public function behaviors() {
        return array(
            'NUploadFile' => array(
                'class' => 'ext.nuploadfile.NUploadFile',
                'fileField' => 'Perf_Photo',
            )
        );
    }
}
