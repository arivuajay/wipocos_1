<?php/** * This is the model class for table "{{publisher_account}}". * * The followings are the available columns in table '{{publisher_account}}': * @property integer $Pub_Acc_Id * @property string $Pub_Corporate_Name * @property string $Pub_Internal_Code * @property integer $Pub_Ipi * @property integer $Pub_Ipi_Base_Number * @property string $Pub_Date * @property string $Pub_Place * @property integer $Pub_Country_Id * @property integer $Pub_Legal_Form_id * @property string $Pub_Reg_Date * @property string $Pub_Reg_Number * @property string $Pub_Excerpt_Date * @property integer $Pub_Language_Id * @property string $Pub_Non_Member * @property string $Pub_Is_Producer * @property string $Pub_Photo * @property string $Active * @property string $Created_Date * @property string $Rowversion * * The followings are the available model relations: * @property MasterLanguage $pubLanguage * @property MasterCountry $pubCountry * @property MasterLegalForm $pubLegalForm * @property PublisherAccountAddress[] $publisherAccountAddresses * @property PublisherBiography[] $publisherBiographies * @property PublisherManageRights[] $publisherManageRights * @property PublisherPaymentMethod[] $publisherPaymentMethods * @property PublisherPseudonym[] $publisherPseudonyms * @property PublisherRelatedRights[] $publisherRelatedRights * @property PublisherSuccession[] $publisherSuccessions */class PublisherAccount extends RActiveRecord {    public $search_status;    public $is_publisher;    public $before_save_enable = true;    public $after_save_enable = true;    public $after_delete_disable = true;    public $oldRecord;    public $internal_increament = true;    const PHOTO_SIZE = 1;    public function init() {        parent::init();        if ($this->isNewRecord) {            $this->Pub_Country_Id = DEFAULT_COUNTRY_ID;            $this->Pub_Language_Id = DEFAULT_LANGUAGE_ID;            $this->Pub_Internal_Code = InternalcodeGenerate::model()->find("Gen_User_Type = :type", array(':type' => InternalcodeGenerate::PUBLISHER_CODE))->Fullcode;            $this->Pub_GUID = Myclass::guid(false);            $this->Pub_Legal_Form_id = DEFAULT_LEGAL_FORM_ID;        }    }    /**     * @return string the associated database table name     */    public function tableName() {        return '{{publisher_account}}';    }    public function scopes() {        $alias = $this->getTableAlias(false, false);        return array(            'isActive' => array('condition' => "$alias.Active = '1'"),            'isStatusActive' => array('condition' => "$alias.Pub_Non_Member = 'N' AND (publisherManageRights.Pub_Mnge_Exit_Date is Null OR publisherManageRights.Pub_Mnge_Exit_Date = '0000-00-00' OR publisherManageRights.Pub_Mnge_Exit_Date >= DATE(NOW()))")//            'isStatusActive' => array('condition' => "publisherManageRights.Pub_Mnge_Exit_Date is not Null And publisherManageRights.Pub_Mnge_Exit_Date != '0000-00-00' And publisherManageRights.Pub_Mnge_Exit_Date >= DATE(NOW())")        );    }    /**     * @return array validation rules for model attributes.     */    public function rules() {        // NOTE: you should only define rules for those attributes that        // will receive user inputs.        return array(            array('Pub_Corporate_Name, Pub_Internal_Code, Pub_Date, Pub_Country_Id', 'required'),            array('Pub_Ipi, Pub_Ipi_Base_Number, Pub_Country_Id, Pub_Legal_Form_id, Pub_Language_Id, Created_By, Updated_By', 'numerical', 'integerOnly' => true),            array('Pub_Corporate_Name, Pub_Internal_Code, Pub_Place, Pub_Reg_Number', 'length', 'max' => 255),            array('Active', 'length', 'max' => 1),            array('Pub_Internal_Code, Pub_Corporate_Name, Pub_GUID', 'unique'),            array('Pub_Reg_Date, Pub_Excerpt_Date, Created_Date, Rowversion, Pub_Non_Member, Pub_Is_Producer, is_publisher, Pub_GUID, Pub_Photo', 'safe'),            array('Pub_Photo', 'file', 'types' => 'jpg,png,jpeg', 'allowEmpty' => true, 'maxSize' => 1024 * 1024 * self::PHOTO_SIZE, 'tooLarge' => 'File should be smaller than ' . self::PHOTO_SIZE . 'MB'),//            array(//                'Pub_Corporate_Name',//                'match', 'pattern' => '/^[a-zA-Z\s]+$/',//                'message' => 'Only Alphabets are allowed ',//            ),            // The following rule is used by search().            // @todo Please remove those attributes that should not be searched.            array('Pub_Acc_Id, Pub_Corporate_Name, Pub_Internal_Code, Pub_Ipi, Pub_Ipi_Base_Number, Pub_Date, Pub_Place, Pub_Country_Id, Pub_Legal_Form_id, Pub_Reg_Date, Pub_Reg_Number, Pub_Excerpt_Date, Pub_Language_Id, Active, Created_Date, Rowversion', 'safe', 'on' => 'search'),            array('Created_By, Updated_By', 'safe'),        );    }    /**     * @return array relational rules.     */    public function relations() {        // NOTE: you may need to adjust the relation name and the related        // class name for the relations automatically generated below.        return array(            'pubLanguage' => array(self::BELONGS_TO, 'MasterLanguage', 'Pub_Language_Id'),            'pubCountry' => array(self::BELONGS_TO, 'MasterCountry', 'Pub_Country_Id'),            'pubLegalForm' => array(self::BELONGS_TO, 'MasterLegalForm', 'Pub_Legal_Form_id'),            'publisherAccountAddresses' => array(self::HAS_ONE, 'PublisherAccountAddress', 'Pub_Acc_Id'),            'publisherBiographies' => array(self::HAS_ONE, 'PublisherBiography', 'Pub_Acc_Id'),            'publisherManageRights' => array(self::HAS_ONE, 'PublisherManageRights', 'Pub_Acc_Id'),            'publisherPaymentMethods' => array(self::HAS_MANY, 'PublisherPaymentMethod', 'Pub_Acc_Id'),            'publisherPseudonyms' => array(self::HAS_MANY, 'PublisherPseudonym', 'Pub_Acc_Id'),            'publisherRelatedRights' => array(self::HAS_ONE, 'PublisherRelatedRights', 'Pub_Acc_Id'),            'publisherSuccessions' => array(self::HAS_ONE, 'PublisherSuccession', 'Pub_Acc_Id'),            'publisherGroupMembers' => array(self::HAS_MANY, 'PublisherGroupMembers', 'Pub_Group_Member_Internal_Code',                'foreignKey' => array('Pub_Group_Member_GUID' => 'Pub_GUID')            ),            'createdBy' => array(self::BELONGS_TO, 'User', 'Created_By'),            'updatedBy' => array(self::BELONGS_TO, 'User', 'Updated_By'),        );    }    /**     * @return array customized attribute labels (name=>label)     */    public function attributeLabels() {        return array(            'Pub_Acc_Id' => 'Publisher',            'Pub_Corporate_Name' => 'Corporate Name',            'Pub_Internal_Code' => 'Internal Code',            'Pub_Ipi' => 'IPI Name Number',            'Pub_Ipi_Base_Number' => 'IPI Base Number',            'Pub_Date' => ' Date of Foundation',            'Pub_Place' => 'Place',            'Pub_Country_Id' => 'Country',            'Pub_Legal_Form_id' => 'Legal Form',            'Pub_Reg_Date' => 'Registration Date',            'Pub_Reg_Number' => 'Registration Number',            'Pub_Excerpt_Date' => 'Excerpt Date',            'Pub_Language_Id' => 'Language',            'Active' => 'Active',            'Created_Date' => 'Created Date',            'Rowversion' => 'Rowversion',            'search_status' => 'Status',            'Pub_Non_Member' => 'Non Member',            'Pub_Is_Producer' => 'Producer',            'is_publisher' => 'Publisher',            'Pub_Photo' => 'Profile Picture',        );    }    /**     * Retrieves a list of models based on the current search/filter conditions.     *     * Typical usecase:     * - Initialize the model fields with values from filter form.     * - Execute this method to get CActiveDataProvider instance which will filter     * models according to data in model fields.     * - Pass data provider to CGridView, CListView or any similar widget.     *     * @return CActiveDataProvider the data provider that can return the models     * based on the search/filter conditions.     */    public function search() {        // @todo Please modify the following code to remove attributes that should not be searched.        $criteria = new CDbCriteria;        $criteria->with = array('publisherManageRights');        $criteria->compare('Pub_Acc_Id', $this->Pub_Acc_Id);        $criteria->compare('Pub_Corporate_Name', $this->Pub_Corporate_Name, true);        $criteria->compare('Pub_Internal_Code', $this->Pub_Internal_Code, true);        $criteria->compare('Pub_Ipi', $this->Pub_Ipi);        $criteria->compare('Pub_Ipi_Base_Number', $this->Pub_Ipi_Base_Number);        $criteria->compare('Pub_Date', $this->Pub_Date, true);        $criteria->compare('Pub_Place', $this->Pub_Place, true);        $criteria->compare('Pub_Country_Id', $this->Pub_Country_Id);        $criteria->compare('Pub_Legal_Form_id', $this->Pub_Legal_Form_id);        $criteria->compare('Pub_Reg_Date', $this->Pub_Reg_Date, true);        $criteria->compare('Pub_Reg_Number', $this->Pub_Reg_Number, true);        $criteria->compare('Pub_Excerpt_Date', $this->Pub_Excerpt_Date, true);        $criteria->compare('Pub_Language_Id', $this->Pub_Language_Id);        $criteria->compare('Active', $this->Active, true);        $criteria->compare('Created_Date', $this->Created_Date, true);        $criteria->compare('Rowversion', $this->Rowversion, true);        $now = new CDbExpression("DATE(NOW())");        if ($this->search_status == 'A') {            $criteria->addCondition('publisherManageRights.Pub_Mnge_Exit_Date >= ' . $now . ' Or publisherManageRights.Pub_Mnge_Exit_Date = "0000-00-00" OR publisherManageRights.Pub_Mnge_Exit_Date is null');            $criteria->compare('Pub_Non_Member', 'N', true);        } elseif ($this->search_status == 'I') {            $criteria->compare('Pub_Non_Member', 'Y', true);        } elseif ($this->search_status == 'E') {            $criteria->addCondition('publisherManageRights.Pub_Mnge_Exit_Date < ' . $now . ' And publisherManageRights.Pub_Mnge_Exit_Date != "0000-00-00"');            $criteria->compare('Pub_Non_Member', 'N', true);        }        return new CActiveDataProvider($this, array(            'criteria' => $criteria,            'pagination' => false//            'pagination' => array(//                'pageSize' => PAGE_SIZE,//            )        ));    }    /**     * Returns the static model of the specified AR class.     * Please note that you should have this exact method in all your CActiveRecord descendants!     * @param string $className active record class name.     * @return PublisherAccount the static model class     */    public static function model($className = __CLASS__) {        return parent::model($className);    }    public function dataProvider() {        return new CActiveDataProvider($this, array(            'pagination' => false//            'pagination' => array(//                'pageSize' => PAGE_SIZE,//            )        ));    }    protected function beforeSave() {        if ($this->Pub_Is_Producer == 'Y' && $this->before_save_enable) {            $gen_int_code = InternalcodeGenerate::model()->find("Gen_User_Type = :type", array(':type' => InternalcodeGenerate::PUBLISHER_PRODUCER_CODE));            if ($this->isNewRecord) {                $this->Pub_Internal_Code = $gen_int_code->Fullcode;            } else {                if ($this->oldRecord->Pub_Is_Producer == 'N') {                    $this->Pub_Internal_Code = $gen_int_code->Fullcode;                }            }        }        return parent::beforeSave();    }    protected function afterSave() {        if ($this->isNewRecord) {            if ($this->internal_increament) {                $type = $this->Pub_Is_Producer == 'Y' ? InternalcodeGenerate::PUBLISHER_PRODUCER_CODE : InternalcodeGenerate::PUBLISHER_CODE;                InternalcodeGenerate::model()->codeIncreament($type);            }            if ($this->Pub_Is_Producer == 'Y')                $this->convert($this->Pub_Acc_Id);        } elseif ($this->after_save_enable && !$this->isNewRecord) {            $producer_model = $this->checkProducer($this->Pub_Internal_Code, false);            switch ($this->Pub_Is_Producer) {                case 'N':                    if (!empty($producer_model)) {                        $producer_model->after_delete_disable = false;                        $producer_model->delete();                        $gen_inter_model = InternalcodeGenerate::model()->find("Gen_User_Type = :type", array(':type' => InternalcodeGenerate::PUBLISHER_CODE));                        $this->after_save_enable = false;                        $this->internal_increament = false;                        $this->Pub_Internal_Code = $gen_inter_model->Fullcode;                        $this->save(false);                        InternalcodeGenerate::model()->codeIncreament(InternalcodeGenerate::PUBLISHER_CODE);                    }                    break;                case 'Y':                    if ($this->oldRecord->Pub_Is_Producer == 'N')                        InternalcodeGenerate::model()->codeIncreament(InternalcodeGenerate::PUBLISHER_PRODUCER_CODE);                    $this->convert($this->Pub_Acc_Id);                    break;            }        }        return parent::afterSave();    }    public function getStatus() {        if ($this->Pub_Non_Member == 'Y') {            $status = '<i class="fa fa-circle text-red" title="Non-member"></i>';        } else {            $status = '<i class="fa fa-circle text-green" title="Active"></i>';            if ($this->publisherManageRights && $this->publisherManageRights->Pub_Mnge_Exit_Date != '' && $this->publisherManageRights->Pub_Mnge_Exit_Date != '0000-00-00') {                if (strtotime($this->publisherManageRights->Pub_Mnge_Exit_Date) < strtotime(date('Y-m-d'))) {                    $status = '<i class="fa fa-circle text-yellow" title="Expired"></i>';                }            }        }        return $status;    }    public function checkProducer($internal_code, $ret_sts = true) {        $producer = ProducerAccount::model()->findByAttributes(array('Pro_Internal_Code' => $internal_code));        if ($ret_sts)            return !empty($producer);        return $producer;    }    protected function afterDelete() {        if ($this->after_save_enable) {            $producer = $this->checkProducer($this->Pub_Internal_Code, false);            if (!empty($producer) && $this->after_delete_disable) {                $producer->delete();            }        }        return parent::afterDelete();    }    public function convert($id) {        $publisher_model = self::model()->findByPk($id);        $check_exists = $this->checkProducer($publisher_model->Pub_Internal_Code, false);        $ignore_list = Myclass::getPublisherconvertIgnorelist();        $producer_model = empty($check_exists) ? new ProducerAccount : $check_exists;        //basic data        foreach ($publisher_model->attributes as $key => $value) {            $attr_name = str_replace('Pub_', 'Pro_', $key);            !in_array($key, $ignore_list) ? $producer_model->setAttribute($attr_name, $value) : '';        }        $producer_model->Pro_Is_Publisher = 'Y';        $producer_model->before_save_enable = false;        $producer_model->after_save_enable = false;        if ($producer_model->isNewRecord)            $producer_model->internal_increament = false;        $producer_model->save(false);        $pro_acc_id = $producer_model->Pro_Acc_Id;        if (!$this->isNewRecord) {            $relModels = array(                'publisherAccountAddresses' => 'ProducerAccountAddress',                'publisherPaymentMethods' => 'ProducerPaymentMethod',                'publisherBiographies' => 'ProducerBiography',                'publisherPseudonyms' => 'ProducerPseudonym',                'publisherDeathInheritances' => 'ProducerDeathInheritance',            );            foreach ($relModels as $k => $v) {                if (!empty($publisher_model->$k)) {                    $pro_rel_model = new $v;                    $pro_rel_model->Pro_Acc_Id = $pro_acc_id;                    $attributes = $publisher_model->$k->attributes;                    if (isset($attributes) && !empty($attributes)) {                        foreach ($attributes as $key => $value) {                            $attr_name = str_replace('Pub_', 'Pro_', $key);                            !in_array($key, $ignore_list) ? $pro_rel_model->setAttribute($attr_name, $value) : '';                        }                        $pro_rel_model->save(false);                        if ($k == 'publisherBiographies')                            $bio_id = $pro_rel_model->Pro_Biogrph_Id;                    }                }            }            //Biography Uploads            if (!empty($publisher_model->publisherBiographies->publisherBiographUploads) && isset($bio_id)) {                foreach ($publisher_model->publisherBiographies->publisherBiographUploads as $upload) {                    $producer_bio_upload_model = new ProducerBiographUploads;                    $producer_bio_upload_model->Pro_Biogrph_Id = $bio_id;                    foreach ($upload->attributes as $key => $value) {                        $attr_name = str_replace('Pub_', 'Pro_', $key);                        !in_array($key, $ignore_list) ? $producer_bio_upload_model->setAttribute($attr_name, $value) : '';                    }                    $producer_bio_upload_model->save(false);                }            }        }        return true;    }    public function afterTabsave($model, $relation) {        $producer_model = PublisherAccount::checkProducer($this->pubAcc->Pub_Internal_Code, false);        if (!empty($producer_model)) {            if (!empty($producer_model->$relation)) {                $dist_model = $producer_model->$relation;            } else {                $dist_model = new $model;                $dist_model->Pro_Acc_Id = $producer_model->Pro_Acc_Id;            }            $ignore_list = Myclass::getPublisherconvertIgnorelist();            foreach ($this->attributes as $key => $value) {                $attr_name = str_replace('Pub_', 'Pro_', $key);                !in_array($key, $ignore_list) ? $dist_model->setAttribute($attr_name, $value) : '';            }            $dist_model->save(false);        }    }    protected function afterFind() {        $this->oldRecord = clone $this;        return parent::afterFind();    }    public function behaviors() {        return array(            'NUploadFile' => array(                'class' => 'ext.nuploadfile.NUploadFile',                'fileField' => 'Pub_Photo',            )        );    }    public function getPublisherRHRow() {        if ($this->Pub_GUID) {            $row = "<tr data-urole='PU' data-uid='{$this->Pub_GUID}' data-name='{$this->Pub_Corporate_Name}' data-intcode = '{$this->Pub_Internal_Code}'>";            $row .= "<td>{$this->Pub_Corporate_Name}</td>";            $row .= "<td>{$this->Pub_Ipi_Base_Number}</td>";            $row .= "<td>{$this->Pub_Internal_Code}</td>";            $row .= "</tr>";            return $row;        }        return false;    }    public function getReportInternalCode() {        return $this->Pub_Internal_Code;    }    public function getReportFullName() {        return $this->Pub_Corporate_Name;    }    public function getReportStartmandt() {        return $this->publisherManageRights->Pub_Mnge_Entry_Date;    }    public function getReportEndmandt() {        return $this->publisherManageRights->Pub_Mnge_Exit_Date;    }    public function getReportMembertype() {        return 'Publisher';    }}