<?php/** * This is the model class for table "{{producer_account}}". * * The followings are the available columns in table '{{producer_account}}': * @property integer $Pro_Acc_Id * @property string $Pro_Corporate_Name * @property string $Pro_Internal_Code * @property integer $Pro_Ipi * @property integer $Pro_Ipi_Base_Number * @property string $Pro_Date * @property string $Pro_Place * @property integer $Pro_Country_Id * @property integer $Pro_Legal_Form_id * @property string $Pro_Reg_Date * @property string $Pro_Reg_Number * @property string $Pro_Excerpt_Date * @property integer $Pro_Language_Id * @property string $Pro_Non_Member * @property string $Pro_Is_Publisher * @property string $Pro_Photo * @property string $Active * @property string $Created_Date * @property string $Rowversion * * The followings are the available model relations: * @property MasterCountry $proCountry * @property MasterLanguage $proLanguage * @property MasterLegalForm $proLegalForm * @property ProducerAccountAddress[] $producerAccountAddresses * @property ProducerBiography[] $producerBiographies * @property ProducerPaymentMethod[] $producerPaymentMethods * @property ProducerPseudonym[] $producerPseudonyms * @property ProducerRelatedRights[] $producerRelatedRights * @property ProducerSuccession[] $producerSuccessions */class ProducerAccount extends RActiveRecord {    public $search_status;    public $is_producer;    public $before_save_enable = true;    public $after_save_enable = true;    public $after_delete_disable = true;    public $oldRecord;    public $internal_increament = true;    const PHOTO_SIZE = 1;    public function init() {        parent::init();        if ($this->isNewRecord) {            $this->Pro_Country_Id = DEFAULT_COUNTRY_ID;            $this->Pro_Language_Id = DEFAULT_LANGUAGE_ID;            $this->Pro_Internal_Code = InternalcodeGenerate::model()->find("Gen_User_Type = :type", array(':type' => InternalcodeGenerate::PRODUCER_CODE))->Fullcode;            $this->Pro_GUID = Myclass::guid(false);            $this->Pro_Legal_Form_id = DEFAULT_LEGAL_FORM_ID;        }    }    /**     * @return string the associated database table name     */    public function tableName() {        return '{{producer_account}}';    }    public function scopes() {        $alias = $this->getTableAlias(false, false);        return array(            'isActive' => array('condition' => "$alias.Active = '1'"),            'isStatusActive' => array('condition' => "$alias.Pro_Non_Member = 'N' AND (producerRelatedRights.Pro_Rel_Exit_Date is Null OR producerRelatedRights.Pro_Rel_Exit_Date = '0000-00-00' OR producerRelatedRights.Pro_Rel_Exit_Date >= DATE(NOW()))")//            'isStatusActive' => array('condition' => "producerRelatedRights.Pro_Rel_Exit_Date is not Null And producerRelatedRights.Pro_Rel_Exit_Date != '0000-00-00' And producerRelatedRights.Pro_Rel_Exit_Date >= DATE(NOW())")        );    }    /**     * @return array validation rules for model attributes.     */    public function rules() {        // NOTE: you should only define rules for those attributes that        // will receive user inputs.        return array(            array('Pro_Corporate_Name, Pro_Internal_Code, Pro_Country_Id', 'required'),            array('Pro_Ipi, Pro_Ipi_Base_Number, Pro_Country_Id, Pro_Legal_Form_id, Pro_Language_Id, Created_By, Updated_By', 'numerical', 'integerOnly' => true),            array('Pro_Corporate_Name, Pro_Internal_Code, Pro_Place, Pro_Reg_Number', 'length', 'max' => 255),            array('Active', 'length', 'max' => 1),            array('Pro_Internal_Code, Pro_Corporate_Name, Pro_GUID', 'unique'),            array('Pro_Reg_Date, Pro_Excerpt_Date, Created_Date, Rowversion, Pro_Non_Member, Pro_Is_Publisher, is_producer, Pro_GUID, Pro_Photo', 'safe'),            array('Pro_Photo', 'file', 'types'=>'jpg,png,jpeg', 'allowEmpty' => true, 'maxSize' => 1024 * 1024 * self::PHOTO_SIZE, 'tooLarge' => 'File should be smaller than ' . self::PHOTO_SIZE . 'MB'),            array('Created_By, Updated_By', 'safe'),            // The following rule is used by search().            // @todo Please remove those attributes that should not be searched.            array('Pro_Acc_Id, Pro_Corporate_Name, Pro_Internal_Code, Pro_Ipi, Pro_Ipi_Base_Number, Pro_Date, Pro_Place, Pro_Country_Id, Pro_Legal_Form_id, Pro_Reg_Date, Pro_Reg_Number, Pro_Excerpt_Date, Pro_Language_Id, Active, Created_Date, Rowversion', 'safe', 'on' => 'search'),        );    }    /**     * @return array relational rules.     */    public function relations() {        // NOTE: you may need to adjust the relation name and the related        // class name for the relations automatically generated below.        return array(            'proCountry' => array(self::BELONGS_TO, 'MasterCountry', 'Pro_Country_Id'),            'proLanguage' => array(self::BELONGS_TO, 'MasterLanguage', 'Pro_Language_Id'),            'proLegalForm' => array(self::BELONGS_TO, 'MasterLegalForm', 'Pro_Legal_Form_id'),            'producerAccountAddresses' => array(self::HAS_ONE, 'ProducerAccountAddress', 'Pro_Acc_Id'),            'producerBiographies' => array(self::HAS_ONE, 'ProducerBiography', 'Pro_Acc_Id'),            'producerPaymentMethods' => array(self::HAS_ONE, 'ProducerPaymentMethod', 'Pro_Acc_Id'),            'producerPseudonyms' => array(self::HAS_MANY, 'ProducerPseudonym', 'Pro_Acc_Id'),            'producerRelatedRights' => array(self::HAS_ONE, 'ProducerRelatedRights', 'Pro_Acc_Id'),            'producerSuccessions' => array(self::HAS_ONE, 'ProducerSuccession', 'Pro_Acc_Id'),            'producerGroupMembers' => array(self::HAS_MANY, 'PublisherGroupMembers', 'Pub_Group_Member_Internal_Code',                'foreignKey' => array('Pub_Group_Member_GUID' => 'Pro_GUID')            ),            'createdBy' => array(self::BELONGS_TO, 'User', 'Created_By'),            'updatedBy' => array(self::BELONGS_TO, 'User', 'Updated_By'),        );    }    /**     * @return array customized attribute labels (name=>label)     */    public function attributeLabels() {        return array(            'Pro_Acc_Id' => 'Id',            'Pro_Corporate_Name' => 'Corporate Name',            'Pro_Internal_Code' => 'Internal Code',            'Pro_Ipi' => 'IPI Name Number',            'Pro_Ipi_Base_Number' => 'IPI Base Number',            'Pro_Date' => 'Date of Foundation',            'Pro_Place' => 'Place',            'Pro_Country_Id' => 'Country',            'Pro_Legal_Form_id' => 'Legal Form',            'Pro_Reg_Date' => 'Registration Date',            'Pro_Reg_Number' => 'Registration Number',            'Pro_Excerpt_Date' => 'Excerpt Date',            'Pro_Language_Id' => 'Language',            'Active' => 'Active',            'Created_Date' => 'Created Date',            'Rowversion' => 'Rowversion',            'search_status' => 'Status',            'Pro_Non_Member' => 'Non Member',            'Pro_Is_Publisher' => 'Publisher',            'is_producer' => 'Producer',            'Pro_Photo' => 'Profile Picture',        );    }    /**     * Retrieves a list of models based on the current search/filter conditions.     *     * Typical usecase:     * - Initialize the model fields with values from filter form.     * - Execute this method to get CActiveDataProvider instance which will filter     * models according to data in model fields.     * - Pass data provider to CGridView, CListView or any similar widget.     *     * @return CActiveDataProvider the data provider that can return the models     * based on the search/filter conditions.     */    public function search() {        // @todo Please modify the following code to remove attributes that should not be searched.        $criteria = new CDbCriteria;        $criteria->with = array('producerRelatedRights');        $criteria->compare('Pro_Acc_Id', $this->Pro_Acc_Id);        $criteria->compare('Pro_Corporate_Name', $this->Pro_Corporate_Name, true);        $criteria->compare('Pro_Internal_Code', $this->Pro_Internal_Code, true);        $criteria->compare('Pro_Ipi', $this->Pro_Ipi);        $criteria->compare('Pro_Ipi_Base_Number', $this->Pro_Ipi_Base_Number);        $criteria->compare('Pro_Date', $this->Pro_Date, true);        $criteria->compare('Pro_Place', $this->Pro_Place, true);        $criteria->compare('Pro_Country_Id', $this->Pro_Country_Id);        $criteria->compare('Pro_Legal_Form_id', $this->Pro_Legal_Form_id);        $criteria->compare('Pro_Reg_Date', $this->Pro_Reg_Date, true);        $criteria->compare('Pro_Reg_Number', $this->Pro_Reg_Number, true);        $criteria->compare('Pro_Excerpt_Date', $this->Pro_Excerpt_Date, true);        $criteria->compare('Pro_Language_Id', $this->Pro_Language_Id);        $criteria->compare('Active', $this->Active, true);        $criteria->compare('Created_Date', $this->Created_Date, true);        $criteria->compare('Rowversion', $this->Rowversion, true);        $now = new CDbExpression("DATE(NOW())");        if ($this->search_status == 'A') {            $criteria->addCondition('producerRelatedRights.Pro_Rel_Exit_Date >= ' . $now . ' OR producerRelatedRights.Pro_Rel_Exit_Date = "0000-00-00" OR producerRelatedRights.Pro_Rel_Exit_Date is null');            $criteria->compare('Pro_Non_Member', 'N', true);        } elseif ($this->search_status == 'I') {            $criteria->compare('Pro_Non_Member', 'Y', true);        } elseif ($this->search_status == 'E') {            $criteria->addCondition('producerRelatedRights.Pro_Rel_Exit_Date < ' . $now . ' And producerRelatedRights.Pro_Rel_Exit_Date != "0000-00-00"');            $criteria->compare('Pro_Non_Member', 'N', true);        }        //Restrict to show only producers        $view_publisher = UserIdentity::checkAccess(null, 'publisheraccount', 'view');        if(!$view_publisher){            $criteria->compare('Pro_Is_Publisher', 'N', true);        }        //End        return new CActiveDataProvider($this, array(            'criteria' => $criteria,//            'pagination' => false            'pagination' => array(                'pageSize' => PAGE_SIZE,            )        ));    }    /**     * Returns the static model of the specified AR class.     * Please note that you should have this exact method in all your CActiveRecord descendants!     * @param string $className active record class name.     * @return ProducerAccount the static model class     */    public static function model($className = __CLASS__) {        return parent::model($className);    }    public function dataProvider() {        $criteria = new CDbCriteria;        //Restrict to show only producers        $view_publisher = UserIdentity::checkAccess(null, 'publisheraccount', 'view');        if(!$view_publisher){            $criteria->compare('Pro_Is_Publisher', 'N', true);        }        //End        return new CActiveDataProvider($this, array(            'criteria' => $criteria,            'pagination' => false//            'pagination' => array(//                'pageSize' => PAGE_SIZE,//            )        ));    }    protected function beforeSave() {        if ($this->Pro_Is_Publisher == 'Y' && $this->before_save_enable) {            $gen_int_code = InternalcodeGenerate::model()->find("Gen_User_Type = :type", array(':type' => InternalcodeGenerate::PUBLISHER_PRODUCER_CODE));            if ($this->isNewRecord) {                $this->Pro_Internal_Code = $gen_int_code->Fullcode;            }else{                if($this->oldRecord->Pro_Is_Publisher == 'N'){                    $this->Pro_Internal_Code = $gen_int_code->Fullcode;                }            }        }        return parent::beforeSave();    }    protected function afterSave() {        if ($this->isNewRecord) {            if($this->internal_increament){                $type = $this->Pro_Is_Publisher == 'Y' ? InternalcodeGenerate::PUBLISHER_PRODUCER_CODE : InternalcodeGenerate::PRODUCER_CODE;                InternalcodeGenerate::model()->codeIncreament($type);            }            if ($this->Pro_Is_Publisher == 'Y')                $this->convert($this->Pro_Acc_Id);        } elseif ($this->after_save_enable && !$this->isNewRecord) {            $publisher_model = $this->checkPublisher($this->Pro_Internal_Code, false);            switch ($this->Pro_Is_Publisher) {                case 'N':                    if (!empty($publisher_model)) {                        $publisher_model->after_delete_disable = false;                        $publisher_model->delete();                        $gen_inter_model = InternalcodeGenerate::model()->find("Gen_User_Type = :type", array(':type' => InternalcodeGenerate::PRODUCER_CODE));                        $this->after_save_enable = false;                        $this->internal_increament = false;                        $this->Pro_Internal_Code = $gen_inter_model->Fullcode;                        $this->save(false);                        InternalcodeGenerate::model()->codeIncreament(InternalcodeGenerate::PRODUCER_CODE);                    }                    break;                case 'Y':                    if($this->oldRecord->Pro_Is_Publisher == 'N')                        InternalcodeGenerate::model()->codeIncreament(InternalcodeGenerate::PUBLISHER_PRODUCER_CODE);                    $this->convert($this->Pro_Acc_Id);                    break;            }        }        return parent::afterSave();    }    public function getStatus() {        if ($this->Pro_Non_Member == 'Y') {            $status = '<i class="fa fa-circle text-red" title="Non-member"></i>';        } else {            $status = '<i class="fa fa-circle text-green" title="Active"></i>';            if ($this->producerRelatedRights && $this->producerRelatedRights->Pro_Rel_Exit_Date != '' && $this->producerRelatedRights->Pro_Rel_Exit_Date != '0000-00-00') {                if (strtotime($this->producerRelatedRights->Pro_Rel_Exit_Date) < strtotime(date('Y-m-d'))) {                    $status = '<i class="fa fa-circle text-yellow" title="Expired"></i>';                }            }        }        return $status;    }    public function checkPublisher($internal_code, $ret_sts = true) {        $publisher = PublisherAccount::model()->findByAttributes(array('Pub_Internal_Code' => $internal_code));        if ($ret_sts)            return !empty($publisher);        return $publisher;    }    protected function afterDelete() {        $publisher_model = $this->checkPublisher($this->Pro_Internal_Code, false);        if (!empty($publisher_model) && $this->after_delete_disable) {            $publisher_model->after_delete_disable = false;            $publisher_model->delete();        }        return parent::afterDelete();    }    public function convert($id) {        $producer_model = self::model()->findByPk($id);        $check_exists = $this->checkPublisher($producer_model->Pro_Internal_Code, false);        $ignore_list = Myclass::getPublisherconvertIgnorelist();        $publisher_model = empty($check_exists) ? new PublisherAccount : $check_exists;        //basic data        foreach ($producer_model->attributes as $key => $value) {            $attr_name = str_replace('Pro_', 'Pub_', $key);            !in_array($key, $ignore_list) ? $publisher_model->setAttribute($attr_name, $value) : '';        }        $publisher_model->Pub_Is_Producer = 'Y';        $publisher_model->before_save_enable = false;        $publisher_model->after_save_enable = false;        if($publisher_model->isNewRecord)            $publisher_model->internal_increament = false;        $publisher_model->save(false);        $pub_acc_id = $publisher_model->Pub_Acc_Id;        if (!$this->isNewRecord) {            $relModels = array(                'producerAccountAddresses' => 'PublisherAccountAddress',                'producerPaymentMethods' => 'PublisherPaymentMethod',                'producerBiographies' => 'PublisherBiography',                'producerPseudonyms' => 'PublisherPseudonym',                'producerDeathInheritances' => 'PublisherDeathInheritance',            );            foreach ($relModels as $k => $v) {                if (!empty($producer_model->$k)) {                    $pub_rel_model = new $v;                    $pub_rel_model->Pub_Acc_Id = $pub_acc_id;                    foreach ($producer_model->$k->attributes as $key => $value) {                        $attr_name = str_replace('Pro_', 'Pub_', $key);                        !in_array($key, $ignore_list) ? $pub_rel_model->setAttribute($attr_name, $value) : '';                    }                    $pub_rel_model->save(false);                    if($k == 'producerBiographies')                        $bio_id = $pub_rel_model->Pub_Biogrph_Id;                }            }            //Biography Uploads            if (!empty($producer_model->producerBiographies->producerBiographUploads) && isset($bio_id)) {                foreach ($producer_model->producerBiographies->producerBiographUploads as $upload) {                    $publisher_bio_upload_model = new PublisherBiographUploads;                    $publisher_bio_upload_model->Pub_Biogrph_Id = $bio_id;                    foreach ($upload->attributes as $key => $value) {                        $attr_name = str_replace('Pro_', 'Pub_', $key);                        !in_array($key, $ignore_list) ? $publisher_bio_upload_model->setAttribute($attr_name, $value) : '';                    }                    $publisher_bio_upload_model->save(false);                }            }        }        return true;    }    public function afterTabsave($model, $relation) {        $publisher_model = ProducerAccount::checkPublisher($this->proAcc->Pro_Internal_Code, false);        if (!empty($publisher_model)) {            if (!empty($publisher_model->$relation)) {                $dist_model = $publisher_model->$relation;            } else {                $dist_model = new $model;                $dist_model->Pub_Acc_Id = $publisher_model->Pub_Acc_Id;            }            $ignore_list = Myclass::getPublisherconvertIgnorelist();            foreach ($this->attributes as $key => $value) {                $attr_name = str_replace('Pro_', 'Pub_', $key);                !in_array($key, $ignore_list) ? $dist_model->setAttribute($attr_name, $value) : '';            }            $dist_model->after_save_enable = false;            $dist_model->save(false);        }    }    protected function afterFind() {        $this->oldRecord = clone $this;        return parent::afterFind();    }    public function behaviors() {        return array(            'NUploadFile' => array(                'class' => 'ext.nuploadfile.NUploadFile',                'fileField' => 'Pro_Photo',            )        );    }}