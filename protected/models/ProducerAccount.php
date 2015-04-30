<?php

/**
 * This is the model class for table "{{producer_account}}".
 *
 * The followings are the available columns in table '{{producer_account}}':
 * @property integer $Pro_Acc_Id
 * @property string $Pro_Corporate_Name
 * @property string $Pro_Internal_Code
 * @property integer $Pro_Ipi
 * @property integer $Pro_Ipi_Base_Number
 * @property string $Pro_Date
 * @property string $Pro_Place
 * @property integer $Pro_Country_Id
 * @property integer $Pro_Legal_Form_id
 * @property string $Pro_Reg_Date
 * @property string $Pro_Reg_Number
 * @property string $Pro_Excerpt_Date
 * @property integer $Pro_Language_Id
 * @property string $Active
 * @property string $Created_Date
 * @property string $Rowversion
 *
 * The followings are the available model relations:
 * @property MasterCountry $proCountry
 * @property MasterLanguage $proLanguage
 * @property MasterLegalForm $proLegalForm
 * @property ProducerAccountAddress[] $producerAccountAddresses
 * @property ProducerBiography[] $producerBiographies
 * @property ProducerPaymentMethod[] $producerPaymentMethods
 * @property ProducerPseudonym[] $producerPseudonyms
 * @property ProducerRelatedRights[] $producerRelatedRights
 * @property ProducerSuccession[] $producerSuccessions
 */
class ProducerAccount extends CActiveRecord {

    public $search_status;
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{producer_account}}';
    }
    
    public function scopes() {
        $alias = $this->getTableAlias(false, false);
        return array(
            'isActive' => array('condition' => "$alias.Active = '1'"),
        );
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Pro_Corporate_Name, Pro_Internal_Code, Pro_Date', 'required'),
            array('Pro_Ipi, Pro_Ipi_Base_Number, Pro_Country_Id, Pro_Legal_Form_id, Pro_Language_Id', 'numerical', 'integerOnly' => true),
            array('Pro_Corporate_Name, Pro_Internal_Code, Pro_Place, Pro_Reg_Number', 'length', 'max' => 255),
            array('Active', 'length', 'max' => 1),
            array('Pro_Reg_Date, Pro_Excerpt_Date, Created_Date, Rowversion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Pro_Acc_Id, Pro_Corporate_Name, Pro_Internal_Code, Pro_Ipi, Pro_Ipi_Base_Number, Pro_Date, Pro_Place, Pro_Country_Id, Pro_Legal_Form_id, Pro_Reg_Date, Pro_Reg_Number, Pro_Excerpt_Date, Pro_Language_Id, Active, Created_Date, Rowversion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'proCountry' => array(self::BELONGS_TO, 'MasterCountry', 'Pro_Country_Id'),
            'proLanguage' => array(self::BELONGS_TO, 'MasterLanguage', 'Pro_Language_Id'),
            'proLegalForm' => array(self::BELONGS_TO, 'MasterLegalForm', 'Pro_Legal_Form_id'),
            'producerAccountAddresses' => array(self::HAS_ONE, 'ProducerAccountAddress', 'Pro_Acc_Id'),
            'producerBiographies' => array(self::HAS_ONE, 'ProducerBiography', 'Pro_Acc_Id'),
            'producerPaymentMethods' => array(self::HAS_ONE, 'ProducerPaymentMethod', 'Pro_Acc_Id'),
            'producerPseudonyms' => array(self::HAS_ONE, 'ProducerPseudonym', 'Pro_Acc_Id'),
            'producerRelatedRights' => array(self::HAS_ONE, 'ProducerRelatedRights', 'Pro_Acc_Id'),
            'producerSuccessions' => array(self::HAS_ONE, 'ProducerSuccession', 'Pro_Acc_Id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Pro_Acc_Id' => 'Acc',
            'Pro_Corporate_Name' => 'Corporate Name',
            'Pro_Internal_Code' => 'Internal Code',
            'Pro_Ipi' => 'IPI Name Number',
            'Pro_Ipi_Base_Number' => 'IPI Base Number',
            'Pro_Date' => 'Date',
            'Pro_Place' => 'Place',
            'Pro_Country_Id' => 'Country',
            'Pro_Legal_Form_id' => 'Legal Form',
            'Pro_Reg_Date' => 'Registration Date',
            'Pro_Reg_Number' => 'Registration Number',
            'Pro_Excerpt_Date' => 'Excerpt Date',
            'Pro_Language_Id' => 'Language',
            'Active' => 'Active',
            'Created_Date' => 'Created Date',
            'Rowversion' => 'Rowversion',
            'search_status' => 'Status',
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
        $criteria->with = array('producerRelatedRights');

        $criteria->compare('Pro_Acc_Id', $this->Pro_Acc_Id);
        $criteria->compare('Pro_Corporate_Name', $this->Pro_Corporate_Name, true);
        $criteria->compare('Pro_Internal_Code', $this->Pro_Internal_Code, true);
        $criteria->compare('Pro_Ipi', $this->Pro_Ipi);
        $criteria->compare('Pro_Ipi_Base_Number', $this->Pro_Ipi_Base_Number);
        $criteria->compare('Pro_Date', $this->Pro_Date, true);
        $criteria->compare('Pro_Place', $this->Pro_Place, true);
        $criteria->compare('Pro_Country_Id', $this->Pro_Country_Id);
        $criteria->compare('Pro_Legal_Form_id', $this->Pro_Legal_Form_id);
        $criteria->compare('Pro_Reg_Date', $this->Pro_Reg_Date, true);
        $criteria->compare('Pro_Reg_Number', $this->Pro_Reg_Number, true);
        $criteria->compare('Pro_Excerpt_Date', $this->Pro_Excerpt_Date, true);
        $criteria->compare('Pro_Language_Id', $this->Pro_Language_Id);
        $criteria->compare('Active', $this->Active, true);
        $criteria->compare('Created_Date', $this->Created_Date, true);
        $criteria->compare('Rowversion', $this->Rowversion, true);
        
        $now = new CDbExpression("DATE(NOW())");
        if($this->search_status == 'A'){
            $criteria->addCondition('producerRelatedRights.Pro_Rel_Exit_Date >= '.$now.' And producerRelatedRights.Pro_Rel_Exit_Date != "0000-00-00"');
        }elseif($this->search_status == 'I'){
            $criteria->addCondition('producerRelatedRights.Pro_Rel_Exit_Date is NULL OR producerRelatedRights.Pro_Rel_Exit_Date = "0000-00-00"');
        }elseif($this->search_status == 'E'){
            $criteria->addCondition('producerRelatedRights.Pro_Rel_Exit_Date < '.$now.' And producerRelatedRights.Pro_Rel_Exit_Date != "0000-00-00"');
        }

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => PAGE_SIZE,
            )
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ProducerAccount the static model class
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
    
    public function getStatus() {
        $status = '<i class="fa fa-circle text-red" title="Non-Member"></i>';
        if($this->producerRelatedRights && $this->producerRelatedRights->Pro_Rel_Exit_Date != '' && $this->producerRelatedRights->Pro_Rel_Exit_Date != '0000-00-00'){
            $status = '<i class="fa fa-circle text-green" title="Active"></i>';
            if(strtotime($this->producerRelatedRights->Pro_Rel_Exit_Date) < strtotime(date('Y-m-d'))){
                $status = '<i class="fa fa-circle text-yellow" title="Expired"></i>';
            }
        }
        return $status;
    }

}
