<?php

/**
 * This is the model class for table "{{publisher_account}}".
 *
 * The followings are the available columns in table '{{publisher_account}}':
 * @property integer $Pub_Acc_Id
 * @property string $Pub_Corporate_Name
 * @property string $Pub_Internal_Code
 * @property integer $Pub_Ipi
 * @property integer $Pub_Ipi_Base_Number
 * @property string $Pub_Date
 * @property string $Pub_Place
 * @property integer $Pub_Country_Id
 * @property integer $Pub_Legal_Form_id
 * @property string $Pub_Reg_Date
 * @property string $Pub_Reg_Number
 * @property string $Pub_Excerpt_Date
 * @property integer $Pub_Language_Id
 * @property string $Pub_Non_Member
 * @property string $Active
 * @property string $Created_Date
 * @property string $Rowversion
 *
 * The followings are the available model relations:
 * @property MasterLanguage $pubLanguage
 * @property MasterCountry $pubCountry
 * @property MasterLegalForm $pubLegalForm
 * @property PublisherAccountAddress[] $publisherAccountAddresses
 * @property PublisherBiography[] $publisherBiographies
 * @property PublisherManageRights[] $publisherManageRights
 * @property PublisherPaymentMethod[] $publisherPaymentMethods
 * @property PublisherPseudonym[] $publisherPseudonyms
 * @property PublisherRelatedRights[] $publisherRelatedRights
 * @property PublisherSuccession[] $publisherSuccessions
 */
class PublisherAccount extends CActiveRecord {
    public $search_status;

    public function init() {
        parent::init();
        if($this->isNewRecord){
            $this->Pub_Country_Id = DEFAULT_COUNTRY_ID;
            $this->Pub_Language_Id = DEFAULT_LANGUAGE_ID;
        }
    }
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{publisher_account}}';
    }

    public function scopes() {
        $alias = $this->getTableAlias(false, false);
        return array(
            'isActive' => array('condition' => "$alias.Active = '1'"),
            'isStatusActive' => array('condition' => "$alias.Pub_Non_Member = 'N' AND publisherManageRights.Pub_Mnge_Exit_Date is Null OR publisherManageRights.Pub_Mnge_Exit_Date = '0000-00-00' OR publisherManageRights.Pub_Mnge_Exit_Date >= DATE(NOW())")
//            'isStatusActive' => array('condition' => "publisherManageRights.Pub_Mnge_Exit_Date is not Null And publisherManageRights.Pub_Mnge_Exit_Date != '0000-00-00' And publisherManageRights.Pub_Mnge_Exit_Date >= DATE(NOW())")
        );
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Pub_Corporate_Name, Pub_Internal_Code, Pub_Date', 'required'),
            array('Pub_Ipi, Pub_Ipi_Base_Number, Pub_Country_Id, Pub_Legal_Form_id, Pub_Language_Id', 'numerical', 'integerOnly' => true),
            array('Pub_Corporate_Name, Pub_Internal_Code, Pub_Place, Pub_Reg_Number', 'length', 'max' => 255),
            array('Active', 'length', 'max' => 1),
            array('Pub_Internal_Code, Pub_Corporate_Name', 'unique'),
            array('Pub_Reg_Date, Pub_Excerpt_Date, Created_Date, Rowversion, Pub_Non_Member', 'safe'),
//            array(
//                'Pub_Corporate_Name',
//                'match', 'pattern' => '/^[a-zA-Z\s]+$/',
//                'message' => 'Only Alphabets are allowed ',
//            ),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Pub_Acc_Id, Pub_Corporate_Name, Pub_Internal_Code, Pub_Ipi, Pub_Ipi_Base_Number, Pub_Date, Pub_Place, Pub_Country_Id, Pub_Legal_Form_id, Pub_Reg_Date, Pub_Reg_Number, Pub_Excerpt_Date, Pub_Language_Id, Active, Created_Date, Rowversion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'pubLanguage' => array(self::BELONGS_TO, 'MasterLanguage', 'Pub_Language_Id'),
            'pubCountry' => array(self::BELONGS_TO, 'MasterCountry', 'Pub_Country_Id'),
            'pubLegalForm' => array(self::BELONGS_TO, 'MasterLegalForm', 'Pub_Legal_Form_id'),
            'publisherAccountAddresses' => array(self::HAS_ONE, 'PublisherAccountAddress', 'Pub_Acc_Id'),
            'publisherBiographies' => array(self::HAS_ONE, 'PublisherBiography', 'Pub_Acc_Id'),
            'publisherManageRights' => array(self::HAS_ONE, 'PublisherManageRights', 'Pub_Acc_Id'),
            'publisherPaymentMethods' => array(self::HAS_ONE, 'PublisherPaymentMethod', 'Pub_Acc_Id'),
            'publisherPseudonyms' => array(self::HAS_ONE, 'PublisherPseudonym', 'Pub_Acc_Id'),
            'publisherRelatedRights' => array(self::HAS_ONE, 'PublisherRelatedRights', 'Pub_Acc_Id'),
            'publisherSuccessions' => array(self::HAS_ONE, 'PublisherSuccession', 'Pub_Acc_Id'),
            'publisherGroupMembers' => array(self::HAS_MANY, 'PublisherGroupMembers', 'Pub_Group_Member_Internal_Code',
                'foreignKey' => array('Pub_Group_Member_Internal_Code' => 'Pub_Internal_Code')
            ),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Pub_Acc_Id' => 'Publisher',
            'Pub_Corporate_Name' => 'Corporate Name',
            'Pub_Internal_Code' => 'Internal Code',
            'Pub_Ipi' => 'IPI Name Number',
            'Pub_Ipi_Base_Number' => 'IPI Base Number',
            'Pub_Date' => 'Date',
            'Pub_Place' => 'Place',
            'Pub_Country_Id' => 'Country',
            'Pub_Legal_Form_id' => 'Legal Form',
            'Pub_Reg_Date' => 'Registration Date',
            'Pub_Reg_Number' => 'Registration Number',
            'Pub_Excerpt_Date' => 'Excerpt Date',
            'Pub_Language_Id' => 'Language',
            'Active' => 'Active',
            'Created_Date' => 'Created Date',
            'Rowversion' => 'Rowversion',
            'search_status' => 'Status',
            'Pub_Non_Member' => 'Non Member',
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
        $criteria->with = array('publisherManageRights');

        $criteria->compare('Pub_Acc_Id', $this->Pub_Acc_Id);
        $criteria->compare('Pub_Corporate_Name', $this->Pub_Corporate_Name, true);
        $criteria->compare('Pub_Internal_Code', $this->Pub_Internal_Code, true);
        $criteria->compare('Pub_Ipi', $this->Pub_Ipi);
        $criteria->compare('Pub_Ipi_Base_Number', $this->Pub_Ipi_Base_Number);
        $criteria->compare('Pub_Date', $this->Pub_Date, true);
        $criteria->compare('Pub_Place', $this->Pub_Place, true);
        $criteria->compare('Pub_Country_Id', $this->Pub_Country_Id);
        $criteria->compare('Pub_Legal_Form_id', $this->Pub_Legal_Form_id);
        $criteria->compare('Pub_Reg_Date', $this->Pub_Reg_Date, true);
        $criteria->compare('Pub_Reg_Number', $this->Pub_Reg_Number, true);
        $criteria->compare('Pub_Excerpt_Date', $this->Pub_Excerpt_Date, true);
        $criteria->compare('Pub_Language_Id', $this->Pub_Language_Id);
        $criteria->compare('Active', $this->Active, true);
        $criteria->compare('Created_Date', $this->Created_Date, true);
        $criteria->compare('Rowversion', $this->Rowversion, true);

        $now = new CDbExpression("DATE(NOW())");
        if($this->search_status == 'A'){
            $criteria->addCondition('publisherManageRights.Pub_Mnge_Exit_Date >= '.$now.' Or publisherManageRights.Pub_Mnge_Exit_Date = "0000-00-00" OR publisherManageRights.Pub_Mnge_Exit_Date is null');
            $criteria->compare('Pub_Non_Member', 'N', true);
        }elseif($this->search_status == 'I'){
            $criteria->compare('Pub_Non_Member', 'Y', true);
        }elseif($this->search_status == 'E'){
            $criteria->addCondition('publisherManageRights.Pub_Mnge_Exit_Date < '.$now.' And publisherManageRights.Pub_Mnge_Exit_Date != "0000-00-00"');
            $criteria->compare('Pub_Non_Member', 'N', true);
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
     * @return PublisherAccount the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function dataProvider() {
        return new CActiveDataProvider($this, array(
            'pagination' => false
//            'pagination' => array(
//                'pageSize' => PAGE_SIZE,
//            )
        ));
    }
    
    protected function afterSave() {
        if ($this->isNewRecord) {
            $gen_inter_model = InternalcodeGenerate::model()->find("Gen_User_Type = :type", array(':type' => 'PU'));
            $gen_inter_model->Gen_Inter_Code += 1;
            $gen_inter_model->save(false);
        }
    }

    public function getStatus() {
        if($this->Pub_Non_Member == 'Y'){
            $status = '<i class="fa fa-circle text-red" title="Non-member"></i>';
        }else{
            $status = '<i class="fa fa-circle text-green" title="Active"></i>';
            if($this->publisherManageRights && $this->publisherManageRights->Pub_Mnge_Exit_Date != '' && $this->publisherManageRights->Pub_Mnge_Exit_Date != '0000-00-00'){
                if(strtotime($this->publisherManageRights->Pub_Mnge_Exit_Date) < strtotime(date('Y-m-d'))){
                    $status = '<i class="fa fa-circle text-yellow" title="Expired"></i>';
                }
            }
        }
        return $status;
    }
}
