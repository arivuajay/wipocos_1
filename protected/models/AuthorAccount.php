<?php

/**
 * This is the model class for table "{{author_account}}".
 *
 * The followings are the available columns in table '{{author_account}}':
 * @property integer $Auth_Acc_Id
 * @property string $Auth_Is_Performer
 * @property string $Auth_Sur_Name
 * @property string $Auth_First_Name
 * @property string $Auth_Internal_Code
 * @property integer $Auth_Ipi
 * @property integer $Auth_Ipi_Base_Number
 * @property integer $Auth_Ipn_Number
 * @property string $Auth_DOB
 * @property integer $Auth_Place_Of_Birth_Id
 * @property integer $Auth_Birth_Country_Id
 * @property integer $Auth_Nationality_Id
 * @property integer $Auth_Language_Id
 * @property string $Auth_Identity_Number
 * @property integer $Auth_Marital_Status_Id
 * @property string $Auth_Spouse_Name
 * @property string $Auth_Gender
 * @property string $Auth_Non_Member
 * @property string $Auth_Photo
 * @property string $Active
 * @property string $Created_Date
 * @property string $Rowversion
 *
 * The followings are the available model relations:
 * @property MasterMaritalStatus $authMaritalStatus
 * @property MasterCountry $authBirthCountry
 * @property MasterLanguage $authLanguage
 * @property MasterNationality $authNationality
 * @property MasterRegion $authPlaceOfBirth
 * @property AuthorAccountAddress[] $authorAccountAddresses
 * @property AuthorBiography[] $authorBiographies
 * @property AuthorDeathInheritance[] $authorDeathInheritances
 * @property AuthorManageRights[] $authorManageRights
 * @property AuthorPaymentMethod[] $authorPaymentMethods
 * @property AuthorPseudonym[] $authorPseudonyms
 * @property AuthorRelatedRights[] $authorRelatedRights
 */
class AuthorAccount extends RActiveRecord {

    public $expiry_date;
    public $hierarchy_level;
    public $record_search;
    public $search_status;
    public $is_author;
    public $before_save_enable = true;
    public $after_save_enable = true;
    public $after_delete_disable = true;
    public $oldRecord;
    public $internal_increament = true;
    public $report_search_by = true;

    const PHOTO_SIZE = 1;
    const MIN_AGE = 20; //in years
    const MAX_AGE = 80; //in years

    public function init() {
        parent::init();
        if ($this->isNewRecord) {
            $this->Auth_Birth_Country_Id = DEFAULT_COUNTRY_ID;
            $this->Auth_Nationality_Id = DEFAULT_NATIONALITY_ID;
            $this->Auth_Language_Id = DEFAULT_LANGUAGE_ID;
            $this->Auth_GUID = Myclass::guid(false);

            $this->Auth_Internal_Code = InternalcodeGenerate::model()->find("Gen_User_Type = :type", array(':type' => InternalcodeGenerate::AUTHOR_CODE))->Fullcode;
        }
    }

    public function getFullName() {
        return $this->Auth_First_Name . " " . $this->Auth_Sur_Name;
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{author_account}}';
    }

    public function scopes() {
        $alias = $this->getTableAlias(false, false);
        return array(
            'isActive' => array('condition' => "$alias.Active = '1'"),
            'isStatusActive' => array('condition' => "$alias.Auth_Non_Member = 'N' AND (authorManageRights.Auth_Mnge_Exit_Date is Null OR authorManageRights.Auth_Mnge_Exit_Date = '0000-00-00' OR authorManageRights.Auth_Mnge_Exit_Date >= DATE(NOW()))")
//            'isStatusActive' => array('condition' => "authorManageRights.Auth_Mnge_Exit_Date is not Null And authorManageRights.Auth_Mnge_Exit_Date != '0000-00-00' And authorManageRights.Auth_Mnge_Exit_Date >= DATE(NOW())")
        );
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Auth_Sur_Name, Auth_First_Name, Auth_Internal_Code, Auth_Birth_Country_Id', 'required'),
            array('Auth_Ipi, Auth_Ipi_Base_Number, Auth_Ipn_Number, Auth_Place_Of_Birth_Id, Auth_Birth_Country_Id, Auth_Nationality_Id, Auth_Language_Id, Auth_Marital_Status_Id, Created_By, Updated_By', 'numerical', 'integerOnly' => true),
            array('Auth_Sur_Name', 'length', 'max' => 50),
            array('Auth_First_Name, Auth_Internal_Code, Auth_Identity_Number, Auth_Spouse_Name', 'length', 'max' => 255),
            array('Auth_Gender, Active', 'length', 'max' => 1),
            array('Created_Date, Rowversion,record_search, Auth_Non_Member, Auth_Is_Performer, is_author, Auth_GUID, Auth_Photo', 'safe'),
            array('Auth_Sur_Name', 'nameUnique'),
            array('Auth_Internal_Code, Auth_GUID', 'unique'),
            array(
                'Auth_First_Name, Auth_Sur_Name, Auth_Spouse_Name',
                'match', 'pattern' => '/^[a-zA-Z\s]+$/',
                'message' => 'Only Alphabets are allowed ',
            ),
            array('Auth_First_Name', 'UniqueAttributesValidator', 'with' => 'Auth_Sur_Name', "message" => "This User Name already Exists"),
            array('Auth_Photo', 'file', 'types' => 'jpg,png,jpeg', 'allowEmpty' => true, 'maxSize' => 1024 * 1024 * self::PHOTO_SIZE, 'tooLarge' => 'File should be smaller than ' . self::PHOTO_SIZE . 'MB'),
//            array('Auth_DOB', 'compare', 'allowEmpty' => true, 'compareValue' => date("Y-m-d", strtotime('-'.self::MIN_AGE.' years')), 'operator' => '<', 'message' => '{attribute} must be lesser than "{compareValue}". Age must be minimum '.self::MIN_AGE.' years'),
//            array('Auth_DOB', 'compare', 'allowEmpty' => true, 'compareValue' => date("Y-m-d", strtotime('-'.self::MAX_AGE.' years')), 'operator' => '>', 'message' => '{attribute} must be greater than "{compareValue}". Age may be maximum '.self::MAX_AGE.' years'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Auth_Acc_Id, Auth_Sur_Name, Auth_First_Name, Auth_Internal_Code, Auth_Ipi, Auth_Ipi_Base_Number, Auth_Ipn_Number, Auth_DOB, Auth_Place_Of_Birth_Id, Auth_Birth_Country_Id, Auth_Nationality_Id, Auth_Language_Id, Auth_Identity_Number, Auth_Marital_Status_Id, Auth_Spouse_Name, Auth_Gender, Active, Created_Date, Rowversion, expiry_date, hierarchy_level,record_search, Auth_Non_Member, Created_By, Updated_By,report_search_by', 'safe', 'on' => 'search'),
            array('report_search_by', 'required', 'on' => 'safe'),
            array('Created_By, Updated_By', 'safe'),
        );
    }

    public function nameUnique($attribute, $params) {
        if (strcasecmp($this->Auth_First_Name, $this->Auth_Sur_Name) == 0) {
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
            'authMaritalStatus' => array(self::BELONGS_TO, 'MasterMaritalStatus', 'Auth_Marital_Status_Id'),
            'authBirthCountry' => array(self::BELONGS_TO, 'MasterCountry', 'Auth_Birth_Country_Id'),
            'authLanguage' => array(self::BELONGS_TO, 'MasterLanguage', 'Auth_Language_Id'),
            'authNationality' => array(self::BELONGS_TO, 'MasterNationality', 'Auth_Nationality_Id'),
            'authPlaceOfBirth' => array(self::BELONGS_TO, 'MasterRegion', 'Auth_Place_Of_Birth_Id'),
            'authorAccountAddresses' => array(self::HAS_ONE, 'AuthorAccountAddress', 'Auth_Acc_Id'),
            'authorBiographies' => array(self::HAS_ONE, 'AuthorBiography', 'Auth_Acc_Id'),
            'authorDeathInheritances' => array(self::HAS_ONE, 'AuthorDeathInheritance', 'Auth_Acc_Id'),
            'authorManageRights' => array(self::HAS_ONE, 'AuthorManageRights', 'Auth_Acc_Id'),
            'authorPaymentMethods' => array(self::HAS_ONE, 'AuthorPaymentMethod', 'Auth_Acc_Id'),
            'authorPseudonyms' => array(self::HAS_MANY, 'AuthorPseudonym', 'Auth_Acc_Id'),
            'authorUploads' => array(self::HAS_MANY, 'AuthorUpload', 'Auth_Acc_id'),
            'groupMembers' => array(self::HAS_MANY, 'GroupMembers', 'Group_Member_Internal_Code',
                'foreignKey' => array('Group_Member_GUID' => 'Auth_GUID')
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
            'Auth_Acc_Id' => 'Id',
            'Auth_Sur_Name' => 'Last Name',
            'Auth_First_Name' => 'First Name',
            'Auth_Internal_Code' => 'Internal Code',
            'Auth_Ipi' => 'IPI Name Number',
            'Auth_Ipi_Base_Number' => 'IPI Base Number',
            'Auth_Ipn_Number' => 'IPN Number',
            'Auth_DOB' => 'Date Of Birth',
            'Auth_Place_Of_Birth_Id' => 'Place Of Birth',
            'Auth_Birth_Country_Id' => 'Birth Country',
            'Auth_Nationality_Id' => 'Nationality',
            'Auth_Language_Id' => 'Language',
            'Auth_Identity_Number' => 'Identity Number',
            'Auth_Marital_Status_Id' => 'Marital Status',
            'Auth_Spouse_Name' => 'Spouse Name',
            'Auth_Gender' => 'Gender',
            'Active' => 'Active',
            'Created_Date' => 'Date of Join',
            'Rowversion' => 'Rowversion',
            'expiry_date' => 'Expiry Date',
            'hierarchy_level' => 'Internal Position',
            'search_status' => 'Status',
            'Auth_Non_Member' => 'Non Member',
            'Auth_Is_Performer' => 'Performer',
            'is_author' => 'Author',
            'Auth_Photo' => 'Profile Picture',
            'report_search_by' => 'Seacrh By',
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
        $criteria->with = array('authorManageRights');

        $criteria->compare('Auth_Acc_Id', $this->Auth_Acc_Id);
        $criteria->compare('Auth_Sur_Name', $this->Auth_Sur_Name, true);
        $criteria->compare('Auth_First_Name', $this->Auth_First_Name, true);
        $criteria->compare('Auth_Internal_Code', $this->Auth_Internal_Code, true);
        $criteria->compare('Auth_Ipi', $this->Auth_Ipi);
        $criteria->compare('Auth_Ipi_Base_Number', $this->Auth_Ipi_Base_Number);
        $criteria->compare('Auth_Ipn_Number', $this->Auth_Ipn_Number);
        $criteria->compare('Auth_DOB', $this->Auth_DOB, true);
        $criteria->compare('Auth_Place_Of_Birth_Id', $this->Auth_Place_Of_Birth_Id);
        $criteria->compare('Auth_Birth_Country_Id', $this->Auth_Birth_Country_Id);
        $criteria->compare('Auth_Nationality_Id', $this->Auth_Nationality_Id);
        $criteria->compare('Auth_Language_Id', $this->Auth_Language_Id);
        $criteria->compare('Auth_Identity_Number', $this->Auth_Identity_Number, true);
        $criteria->compare('Auth_Marital_Status_Id', $this->Auth_Marital_Status_Id);
        $criteria->compare('Auth_Spouse_Name', $this->Auth_Spouse_Name, true);
        $criteria->compare('Auth_Gender', $this->Auth_Gender, true);
        $criteria->compare('Active', $this->Active, true);
        $criteria->compare('Date(Created_Date)', $this->Created_Date, true);
        $criteria->compare('Rowversion', $this->Rowversion, true);
        $criteria->compare('authorManageRights.Auth_Mnge_Exit_Date', $this->expiry_date, true);
        $criteria->compare('authorManageRights.Auth_Mnge_Internal_Position_Id', $this->hierarchy_level, true);

        $now = new CDbExpression("DATE(NOW())");
        if ($this->search_status == 'A') {
            $criteria->addCondition('authorManageRights.Auth_Mnge_Exit_Date >= ' . $now . ' OR authorManageRights.Auth_Mnge_Exit_Date = "0000-00-00" OR authorManageRights.Auth_Mnge_Exit_Date is null');
            $criteria->compare('Auth_Non_Member', 'N', true);
        } elseif ($this->search_status == 'I') {
            $criteria->compare('Auth_Non_Member', 'Y', true);
        } elseif ($this->search_status == 'E') {
            $criteria->addCondition('authorManageRights.Auth_Mnge_Exit_Date < ' . $now . ' And authorManageRights.Auth_Mnge_Exit_Date != "0000-00-00"');
            $criteria->compare('Auth_Non_Member', 'N', true);
        }

        //Restrict to show only authors
        if (!UserIdentity::checkAccess(null, 'performeraccount', 'view')) {
            $criteria->compare('Auth_Is_Performer', 'N', true);
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

    public function memberReport() {
        // @todo Please modify the following code to remove attributes that should not be searched.
        $records = array();
        if ($this->report_search_by) {
            if (in_array('A', $this->report_search_by)) {
                $criteria = new CDbCriteria;
                $criteria->compare('Auth_Sur_Name', $this->Auth_Sur_Name, true);
                $criteria->compare('Auth_First_Name', $this->Auth_Sur_Name, true, 'OR');
                $criteria->compare('Auth_Internal_Code', $this->Auth_Internal_Code, true);

                $prov1 = new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                    'pagination' => false
                ));
            }
            if (in_array('P', $this->report_search_by)) {
                $criteria2 = new CDbCriteria;
                $criteria2->compare('Perf_Sur_Name', $this->Auth_Sur_Name, true);
                $criteria2->compare('Perf_First_Name', $this->Auth_Sur_Name, true, 'OR');
                $criteria2->compare('Perf_Internal_Code', $this->Auth_Internal_Code, true);

                $prov2 = new CActiveDataProvider('PerformerAccount', array(
                    'criteria' => $criteria2,
                    'pagination' => false
                ));
            }
            if (in_array('PU', $this->report_search_by)) {
                $criteria3 = new CDbCriteria;
                $criteria3->compare('Pub_Corporate_Name', $this->Auth_Sur_Name, true);
                $criteria3->compare('Pub_Internal_Code', $this->Auth_Internal_Code, true);

                $prov3 = new CActiveDataProvider('PublisherAccount', array(
                    'criteria' => $criteria3,
                    'pagination' => false
                ));
            }
            if (in_array('PR', $this->report_search_by)) {
                $criteria4 = new CDbCriteria;
                $criteria4->compare('Pro_Corporate_Name', $this->Auth_Sur_Name, true);
                $criteria4->compare('Pro_Internal_Code', $this->Auth_Internal_Code, true);

                $prov4 = new CActiveDataProvider('ProducerAccount', array(
                    'criteria' => $criteria4,
                    'pagination' => false
                ));
            }

            for ($i = 0; $i < $prov1->totalItemCount; $i++) {
                $data = $prov1->data[$i];
                array_push($records, $data);
            }
            for ($i = 0; $i < $prov2->totalItemCount; $i++) {
                $data = $prov2->data[$i];
                array_push($records, $data);
            }
            for ($i = 0; $i < $prov3->totalItemCount; $i++) {
                $data = $prov3->data[$i];
                array_push($records, $data);
            }
            for ($i = 0; $i < $prov4->totalItemCount; $i++) {
                $data = $prov4->data[$i];
                array_push($records, $data);
            }
        }
        return new CArrayDataProvider($records, array(
            'keyField' => false,
            'pagination' => false
                )
        );
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return AuthorAccount the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function dataProvider() {
        $criteria = new CDbCriteria;
        if (!empty($this->record_search)) {
            $criteria->compare('Auth_Acc_Id', $this->record_search, true, 'OR');
            $criteria->compare('Auth_Sur_Name', $this->record_search, true, 'OR');
            $criteria->compare('Auth_First_Name', $this->record_search, true, 'OR');
            $criteria->compare('Auth_Internal_Code', $this->record_search, true, 'OR');
            $criteria->compare('Auth_Ipi', $this->record_search, true, 'OR');
            $criteria->compare('Auth_Ipi_Base_Number', $this->record_search, true, 'OR');
            $criteria->compare('Auth_Ipn_Number', $this->record_search, true, 'OR');
            $criteria->compare('Auth_DOB', $this->record_search, true, 'OR');
            $criteria->compare('Auth_Place_Of_Birth_Id', $this->record_search, true, 'OR');
            $criteria->compare('Auth_Birth_Country_Id', $this->record_search, true, 'OR');
            $criteria->compare('Auth_Nationality_Id', $this->record_search, true, 'OR');
            $criteria->compare('Auth_Language_Id', $this->record_search, true, 'OR');
            $criteria->compare('Auth_Identity_Number', $this->record_search, true, 'OR');
            $criteria->compare('Auth_Marital_Status_Id', $this->record_search, true, 'OR');
            $criteria->compare('Auth_Spouse_Name', $this->record_search, true, 'OR');
            $criteria->compare('Auth_Gender', $this->record_search, true, 'OR');
            $criteria->compare('Active', $this->record_search, true, 'OR');
            $criteria->compare('Date(Created_Date)', $this->record_search, true, 'OR');
            $criteria->compare('Rowversion', $this->record_search, true, 'OR');
        }

        //Restrict to show only authors
        if (!UserIdentity::checkAccess(null, 'performeraccount', 'view')) {
            $criteria->compare('Auth_Is_Performer', 'N', true);
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
        if ($this->Auth_Is_Performer == 'Y' && $this->before_save_enable) {
            $gen_int_code = InternalcodeGenerate::model()->find("Gen_User_Type = :type", array(':type' => InternalcodeGenerate::AUTHOR_PERFORMER_CODE));
            if ($this->isNewRecord) {
                $this->Auth_Internal_Code = $gen_int_code->Fullcode;
            } else {
                if ($this->oldRecord->Auth_Is_Performer == 'N') {
                    $this->Auth_Internal_Code = $gen_int_code->Fullcode;
                }
            }
        }
        return parent::beforeSave();
    }

    protected function afterSave() {
        if ($this->isNewRecord) {
            if ($this->internal_increament) {
                $type = $this->Auth_Is_Performer == 'Y' ? InternalcodeGenerate::AUTHOR_PERFORMER_CODE : InternalcodeGenerate::AUTHOR_CODE;
                InternalcodeGenerate::model()->codeIncreament($type);
            }
            if ($this->Auth_Is_Performer == 'Y')
                $this->convert($this->Auth_Acc_Id);
        } elseif ($this->after_save_enable && !$this->isNewRecord) {
            $performer_model = $this->checkPerformer($this->Auth_Internal_Code, false);

            switch ($this->Auth_Is_Performer) {
                case 'N':
                    if (!empty($performer_model)) {
                        $performer_model->after_delete_disable = false;
                        $performer_model->delete();

                        $gen_inter_model = InternalcodeGenerate::model()->find("Gen_User_Type = :type", array(':type' => InternalcodeGenerate::AUTHOR_CODE));
                        $this->after_save_enable = false;
                        $this->internal_increament = false;
                        $this->Auth_Internal_Code = $gen_inter_model->Fullcode;
                        $this->save(false);
                        InternalcodeGenerate::model()->codeIncreament(InternalcodeGenerate::AUTHOR_CODE);
                    }
                    break;
                case 'Y':
                    if ($this->oldRecord->Auth_Is_Performer == 'N')
                        InternalcodeGenerate::model()->codeIncreament(InternalcodeGenerate::AUTHOR_PERFORMER_CODE);

                    $this->convert($this->Auth_Acc_Id);
                    break;
            }
        }

        return parent::afterSave();
    }

    public function getStatus() {
        if ($this->Auth_Non_Member == 'Y') {
            $status = '<i class="fa fa-circle text-red" title="Non-member"></i>';
        } else {
            $status = '<i class="fa fa-circle text-green" title="Active"></i>';
            if ($this->authorManageRights && $this->authorManageRights->Auth_Mnge_Exit_Date != '' && $this->authorManageRights->Auth_Mnge_Exit_Date != '0000-00-00') {
                if (strtotime($this->authorManageRights->Auth_Mnge_Exit_Date) < strtotime(date('Y-m-d'))) {
                    $status = '<i class="fa fa-circle text-yellow" title="Expired"></i>';
                }
            }
        }
        return $status;
    }

    public function checkPerformer($internal_code, $ret_sts = true) {
        $performer = PerformerAccount::model()->findByAttributes(array('Perf_Internal_Code' => $internal_code));
        if ($ret_sts)
            return !empty($performer);
        return $performer;
    }

    protected function afterDelete() {
        if ($this->after_save_enable) {
            $performer = $this->checkPerformer($this->Auth_Internal_Code, false);
            if (!empty($performer) && $this->after_delete_disable) {
                $performer->delete();
            }
        }
        return parent::afterDelete();
    }

    public function convert($id) {
        $author_model = self::model()->findByPk($id);
        $check_exists = $this->checkPerformer($author_model->Auth_Internal_Code, false);
        $ignore_list = Myclass::getAuthorconvertIgnorelist();
        $performer_model = empty($check_exists) ? new PerformerAccount : $check_exists;
        //basic data
        foreach ($author_model->attributes as $key => $value) {
            $attr_name = str_replace('Auth_', 'Perf_', $key);
            !in_array($key, $ignore_list) ? $performer_model->setAttribute($attr_name, $value) : '';
        }
        $performer_model->Perf_Is_Author = 'Y';
        $performer_model->before_save_enable = false;
        $performer_model->after_save_enable = false;
        if ($performer_model->isNewRecord)
            $performer_model->internal_increament = false;
        $performer_model->save(false);
        $perf_acc_id = $performer_model->Perf_Acc_Id;

        if (!$this->isNewRecord) {
            $relModels = array(
                'authorAccountAddresses' => 'PerformerAccountAddress',
                'authorPaymentMethods' => 'PerformerPaymentMethod',
                'authorBiographies' => 'PerformerBiography',
                'authorPseudonyms' => 'PerformerPseudonym',
                'authorDeathInheritances' => 'PerformerDeathInheritance',
            );

            foreach ($relModels as $k => $v) {
                if (!empty($author_model->$k)) {
                    $perf_rel_model = new $v;
                    $perf_rel_model->Perf_Acc_Id = $perf_acc_id;
                    if (!empty($author_model->$k->attributes) && is_array($author_model->$k->attributes)) {
                        foreach ($author_model->$k->attributes as $key => $value) {
                            $attr_name = str_replace('Auth_', 'Perf_', $key);
                            !in_array($key, $ignore_list) ? $perf_rel_model->setAttribute($attr_name, $value) : '';
                        }
                        $perf_rel_model->save(false);
                        if ($k == 'authorBiographies')
                            $bio_id = $perf_rel_model->Perf_Biogrph_Id;
                    }
                }
            }

            //Uploads
            if (!empty($author_model->authorUploads)) {
                foreach ($author_model->authorUploads as $upload) {
                    $performer_upload_model = new PerformerUpload;
                    $performer_upload_model->Perf_Acc_Id = $perf_acc_id;
                    foreach ($upload->attributes as $key => $value) {
                        $attr_name = str_replace('Auth_', 'Perf_', $key);
                        !in_array($key, $ignore_list) ? $performer_upload_model->setAttribute($attr_name, $value) : '';
                    }
                    $performer_upload_model->save(false);
                }
            }

            //Biography Uploads
            if (!empty($author_model->authorBiographies->authorBiographUploads) && isset($bio_id)) {
                foreach ($author_model->authorBiographies->authorBiographUploads as $upload) {
                    $performer_bio_upload_model = new PerformerBiographUploads;
                    $performer_bio_upload_model->Perf_Biogrph_Id = $bio_id;
                    foreach ($upload->attributes as $key => $value) {
                        $attr_name = str_replace('Auth_', 'Perf_', $key);
                        !in_array($key, $ignore_list) ? $performer_bio_upload_model->setAttribute($attr_name, $value) : '';
                    }
                    $performer_bio_upload_model->save(false);
                }
            }
        }
        return true;
    }

    protected function afterFind() {
        $this->oldRecord = clone $this;
        return parent::afterFind();
    }

    public function afterTabsave($model, $relation) {
        $performer_model = AuthorAccount::checkPerformer($this->authAcc->Auth_Internal_Code, false);
        if (!empty($performer_model)) {
            if (!empty($performer_model->$relation)) {
                $dist_model = $performer_model->$relation;
            } else {
                $dist_model = new $model;
                $dist_model->Perf_Acc_Id = $performer_model->Perf_Acc_Id;
            }
            $ignore_list = Myclass::getAuthorconvertIgnorelist();
            foreach ($this->attributes as $key => $value) {
                $attr_name = str_replace('Auth_', 'Perf_', $key);
                !in_array($key, $ignore_list) ? $dist_model->setAttribute($attr_name, $value) : '';
            }
            $dist_model->save(false);
        }
    }

    public function behaviors() {
        return array(
            'NUploadFile' => array(
                'class' => 'ext.nuploadfile.NUploadFile',
                'fileField' => 'Auth_Photo',
            )
        );
    }

    public function getAuthorRHRow() {
        if ($this->Auth_GUID) {
            $row = "<tr data-urole='AU' data-uid='{$this->Auth_GUID}' data-name='{$this->fullname}' data-intcode = '{$this->Auth_Internal_Code}'>";
            $row .= "<td>{$this->Auth_First_Name}</td>";
            $row .= "<td>{$this->Auth_Sur_Name}</td>";
            $row .= "<td>{$this->Auth_Internal_Code}</td>";
            $row .= "</tr>";

            return $row;
        }
        return false;
    }

    public function getReportInternalCode() {
        return $this->Auth_Internal_Code;
    }

    public function getReportFullName() {
        return $this->fullName;
    }

    public function getReportStartmandt() {
        return $this->authorManageRights->Auth_Mnge_Entry_Date;
    }

    public function getReportEndmandt() {
        return $this->authorManageRights->Auth_Mnge_Exit_Date;
    }

    public function getReportMembertype() {
        return 'Author';
    }

}
