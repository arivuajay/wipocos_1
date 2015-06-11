<?php

/**
 * This is the model class for table "{{publisher_group}}".
 *
 * The followings are the available columns in table '{{publisher_group}}':
 * @property integer $Pub_Group_Id
 * @property string $Pub_Group_Name
 * @property string $Pub_Group_Is_Publisher
 * @property string $Pub_Group_Is_Producer
 * @property string $Pub_Group_Internal_Code
 * @property integer $Pub_Group_IPI_Name_Number
 * @property integer $Pub_Group_IPN_Base_Number
 * @property integer $Pub_Group_IPD_Number
 * @property string $Pub_Group_Date
 * @property string $Pub_Group_Place
 * @property integer $Pub_Group_Country_Id
 * @property integer $Pub_Group_Legal_Form_Id
 * @property integer $Pub_Group_Language_Id
 * @property string $Pub_Group_Non_Member
 * @property string $Active
 * @property string $Created_Date
 * @property string $Rowversion
 *
 * The followings are the available model relations:
 * @property MasterCountry $pubGroupCountry
 * @property MasterLanguage $pubGroupLanguage
 * @property MasterLegalForm $pubGroupLegalForm
 * @property PublisherGroupBiography[] $publisherGroupBiographies
 * @property PublisherGroupCopyrightPayment[] $publisherGroupCopyrightPayments
 * @property PublisherGroupManageRights[] $publisherGroupManageRights
 * @property PublisherGroupMembers[] $publisherGroupMembers
 * @property PublisherGroupPseudonym[] $publisherGroupPseudonyms
 * @property PublisherGroupRelatedPayment[] $publisherGroupRelatedPayments
 * @property PublisherGroupRepresentative[] $publisherGroupRepresentatives
 */
class PublisherGroup extends CActiveRecord {
    public $search_status;
    public $is_pub_producer;

    public function init() {
        parent::init();
        if($this->isNewRecord){
            $this->Pub_Group_Country_Id = DEFAULT_COUNTRY_ID;
            $this->Pub_Group_Language_Id = DEFAULT_LANGUAGE_ID;
            }
    }
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{publisher_group}}';
    }

    public function scopes() {
        $alias = $this->getTableAlias(false, false);
        return array(
            'isActive' => array('condition' => "$alias.Active = '1'"),
            'isStatusActive' => array('condition' => "$alias.Pub_Group_Non_Member = 'N' AND (publisherGroupManageRights.Pub_Group_Mnge_Exit_Date is Null OR publisherGroupManageRights.Pub_Group_Mnge_Exit_Date = '0000-00-00' OR publisherGroupManageRights.Pub_Group_Mnge_Exit_Date >= DATE(NOW()))")
//            'isStatusActive' => array('condition' => "publisherGroupManageRights.Pub_Group_Mnge_Exit_Date is not Null And publisherGroupManageRights.Pub_Group_Mnge_Exit_Date != '0000-00-00' And publisherGroupManageRights.Pub_Group_Mnge_Exit_Date >= DATE(NOW())")
        );
    }
    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Pub_Group_Name, Pub_Group_Internal_Code, Pub_Group_Date', 'required'),
            array('Pub_Group_Id, Pub_Group_IPI_Name_Number, Pub_Group_IPN_Base_Number, Pub_Group_IPD_Number, Pub_Group_Country_Id, Pub_Group_Legal_Form_Id, Pub_Group_Language_Id', 'numerical', 'integerOnly' => true),
            array('Pub_Group_Name, Pub_Group_Place', 'length', 'max' => 100),
            array('Pub_Group_Is_Publisher, Pub_Group_Is_Producer, Active', 'length', 'max' => 1),
            array('Pub_Group_Internal_Code', 'length', 'max' => 50),
            array('Pub_Group_Name, Pub_Group_Internal_Code', 'unique'),
            array('Rowversion, Pub_Group_Non_Member', 'safe'),
//            array(
//                'Pub_Group_Name',
//                'match', 'pattern' => '/^[a-zA-Z\s]+$/',
//                'message' => 'Only Alphabets are allowed ',
//            ),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Pub_Group_Id, Pub_Group_Name, Pub_Group_Is_Publisher, Pub_Group_Is_Producer, Pub_Group_Internal_Code, Pub_Group_IPI_Name_Number, Pub_Group_IPN_Base_Number, Pub_Group_IPD_Number, Pub_Group_Date, Pub_Group_Place, Pub_Group_Country_Id, Pub_Group_Legal_Form_Id, Pub_Group_Language_Id, Active, Created_Date, Rowversion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'pubGroupCountry' => array(self::BELONGS_TO, 'MasterCountry', 'Pub_Group_Country_Id'),
            'pubGroupLanguage' => array(self::BELONGS_TO, 'MasterLanguage', 'Pub_Group_Language_Id'),
            'pubGroupLegalForm' => array(self::BELONGS_TO, 'MasterLegalForm', 'Pub_Group_Legal_Form_Id'),
            'publisherGroupBiographies' => array(self::HAS_ONE, 'PublisherGroupBiography', 'Pub_Group_Id'),
            'publisherGroupCopyrightPayments' => array(self::HAS_ONE, 'PublisherGroupCopyrightPayment', 'Pub_Group_Id'),
            'publisherGroupManageRights' => array(self::HAS_ONE, 'PublisherGroupManageRights', 'Pub_Group_Id'),
            'publisherGroupMembers' => array(self::HAS_MANY, 'PublisherGroupMembers', 'Pub_Group_Id'),
            'publisherGroupPseudonyms' => array(self::HAS_ONE, 'PublisherGroupPseudonym', 'Pub_Group_Id'),
            'publisherGroupRelatedPayments' => array(self::HAS_ONE, 'PublisherGroupRelatedPayment', 'Pub_Group_Id'),
            'publisherGroupRepresentatives' => array(self::HAS_ONE, 'PublisherGroupRepresentative', 'Pub_Group_Id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Pub_Group_Id' => 'Group',
            'Pub_Group_Name' => 'Corporate Name',
            'Pub_Group_Is_Publisher' => 'Publisher',
            'Pub_Group_Is_Producer' => 'Producer',
            'Pub_Group_Internal_Code' => 'Internal Code',
            'Pub_Group_IPI_Name_Number' => 'IPI Name Number',
            'Pub_Group_IPN_Base_Number' => 'IPN Base Number',
            'Pub_Group_IPD_Number' => 'IPD Number',
            'Pub_Group_Date' => ' Date of Foundation',
            'Pub_Group_Place' => 'Place',
            'Pub_Group_Country_Id' => 'Country',
            'Pub_Group_Legal_Form_Id' => 'Legal Form',
            'Pub_Group_Language_Id' => 'Language',
            'Active' => 'Active',
            'Created_Date' => 'Created Date',
            'Rowversion' => 'Rowversion',
            'search_status' => 'Status',
            'is_pub_producer' => 'Publisher/Producer',
            'Pub_Group_Non_Member' => 'Non Member',
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
        $criteria->with = array('publisherGroupManageRights');

        $criteria->compare('Pub_Group_Id', $this->Pub_Group_Id);
        $criteria->compare('Pub_Group_Name', $this->Pub_Group_Name, true);
        $criteria->compare('Pub_Group_Is_Publisher', $this->Pub_Group_Is_Publisher, true);
        $criteria->compare('Pub_Group_Is_Producer', $this->Pub_Group_Is_Producer, true);
        $criteria->compare('Pub_Group_Internal_Code', $this->Pub_Group_Internal_Code, true);
        $criteria->compare('Pub_Group_IPI_Name_Number', $this->Pub_Group_IPI_Name_Number);
        $criteria->compare('Pub_Group_IPN_Base_Number', $this->Pub_Group_IPN_Base_Number);
        $criteria->compare('Pub_Group_IPD_Number', $this->Pub_Group_IPD_Number);
        $criteria->compare('Pub_Group_Date', $this->Pub_Group_Date, true);
        $criteria->compare('Pub_Group_Place', $this->Pub_Group_Place, true);
        $criteria->compare('Pub_Group_Country_Id', $this->Pub_Group_Country_Id);
        $criteria->compare('Pub_Group_Legal_Form_Id', $this->Pub_Group_Legal_Form_Id);
        $criteria->compare('Pub_Group_Language_Id', $this->Pub_Group_Language_Id);
        $criteria->compare('Active', $this->Active, true);
        $criteria->compare('Created_Date', $this->Created_Date, true);
        $criteria->compare('Rowversion', $this->Rowversion, true);

        $now = new CDbExpression("DATE(NOW())");
        if($this->search_status == 'A'){
            $criteria->addCondition('publisherGroupManageRights.Pub_Group_Mnge_Exit_Date >= '.$now.' OR publisherGroupManageRights.Pub_Group_Mnge_Exit_Date = "0000-00-00" OR publisherGroupManageRights.Pub_Group_Mnge_Exit_Date is null');
            $criteria->compare('Pub_Group_Non_Member', 'N', true);
        }elseif($this->search_status == 'I'){
            $criteria->compare('Pub_Group_Non_Member', 'Y', true);
        }elseif($this->search_status == 'E'){
            $criteria->addCondition('publisherGroupManageRights.Pub_Group_Mnge_Exit_Date < '.$now.' And publisherGroupManageRights.Pub_Group_Mnge_Exit_Date != "0000-00-00"');
            $criteria->compare('Pub_Group_Non_Member', 'N', true);
        }

        if($this->is_pub_producer == 'publisher'){
            $criteria->compare('Pub_Group_Is_Publisher', '1', true);
        }elseif($this->is_pub_producer == 'producer'){
            $criteria->compare('Pub_Group_Is_Producer', '1', true);
        }

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => false
//            'pagination' => array(
//                'pageSize' => PAGE_SIZE,
//            )
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return PublisherGroup the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function dataProvider() {
        $criteria = new CDbCriteria;
        if($this->is_pub_producer == 'publisher'){
            $criteria->compare('Pub_Group_Is_Publisher', '1', true);
        }elseif($this->is_pub_producer == 'producer'){
            $criteria->compare('Pub_Group_Is_Producer', '1', true);
        }

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => false
//            'pagination' => array(
//                'pageSize' => PAGE_SIZE,
//            )
        ));
    }

    protected function beforeSave() {
        if($this->isNewRecord){
            $type = $this->Pub_Group_Is_Producer == '1' ? InternalcodeGenerate::PRODUCER_GROUP_CODE : InternalcodeGenerate::PUBLISHER_GROUP_CODE;
            $gen_int_code = InternalcodeGenerate::model()->find("Gen_User_Type = :type", array(':type' => $type));
            $this->Pub_Group_Internal_Code = $gen_int_code->Fullcode;
        }
        return parent::beforeSave();
    }

    protected function afterSave() {
        if($this->isNewRecord){
            $type = $this->Pub_Group_Is_Producer == '1' ? InternalcodeGenerate::PRODUCER_GROUP_CODE : InternalcodeGenerate::PUBLISHER_GROUP_CODE;
            InternalcodeGenerate::model()->codeIncreament($type);
        }
        return parent::afterSave();
    }

    public function getStatus() {
        if($this->Pub_Group_Non_Member == 'Y'){
            $status = '<i class="fa fa-circle text-red" title="Non-member"></i>';
        }else{
            $status = '<i class="fa fa-circle text-green" title="Active"></i>';
            if($this->publisherGroupManageRights && $this->publisherGroupManageRights->Pub_Group_Mnge_Exit_Date != '' && $this->publisherGroupManageRights->Pub_Group_Mnge_Exit_Date != '0000-00-00'){
                if(strtotime($this->publisherGroupManageRights->Pub_Group_Mnge_Exit_Date) < strtotime(date('Y-m-d'))){
                    $status = '<i class="fa fa-circle text-yellow" title="Expired"></i>';
                }
            }
        }
        return $status;
    }
}