<?php

/**
 * This is the model class for table "{{tariff_contracts}}".
 *
 * The followings are the available columns in table '{{tariff_contracts}}':
 * @property integer $Tarf_Cont_Id
 * @property string $Tarf_Cont_GUID
 * @property string $Tarf_Cont_Internal_Code
 * @property integer $Tarf_Cont_City_Id
 * @property string $Tarf_Cont_District
 * @property string $Tarf_Cont_Area
 * @property integer $Tarf_Cont_Tariff_Id
 * @property integer $Tarf_Cont_Insp_Id
 * @property string $Tarf_Cont_Balance
 * @property string $Tarf_Cont_Amt_Pay
 * @property string $Tarf_Cont_From
 * @property string $Tarf_Cont_To
 * @property string $Tarf_Cont_Sign_Date
 * @property integer $Tarf_Cont_Pay_Id
 * @property string $Tarf_Cont_Portion
 * @property string $Tarf_Cont_Comment
 * @property integer $Tarf_Cont_Event_Id
 * @property string $Tarf_Cont_Event_Date
 * @property string $Tarf_Cont_Event_Comment
 * @property string $Created_Date
 * @property string $Rowversion
 * @property integer $Created_By
 * @property integer $Updated_By
 *
 * The followings are the available model relations:
 * @property CustomerUser $tarfContUser
 * @property Inspector $tarfContInsp
 * @property MasterTariff $tarfContTariff
 * @property MasterRegion $tarfContCity
 * @property MasterEventType $tarfContEvent
 */
class TariffContracts extends RActiveRecord {

    public function init() {
        parent::init();
        if($this->isNewRecord){
            $this->Tarf_Cont_GUID = Myclass::guid(false);
            $this->Tarf_Cont_City_Id = DEFAULT_REGION_ID;
            $this->Tarf_Cont_Internal_Code = InternalcodeGenerate::model()->find("Gen_User_Type = :type", array(':type' => InternalcodeGenerate::TARIFF_CONTRACT_CODE))->Fullcode;
        }
    }
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{tariff_contracts}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
         return array(
            array('Tarf_Cont_GUID, Tarf_Cont_Internal_Code, Tarf_Cont_Tariff_Id, Tarf_Cont_Insp_Id, Tarf_Cont_Amt_Pay, Tarf_Cont_From, Tarf_Cont_To, Tarf_Cont_Sign_Date, Tarf_Cont_Pay_Id, Tarf_Cont_Portion, Tarf_Cont_Event_Id, Tarf_Cont_Event_Date', 'required'),
            array('Tarf_Cont_User_Id, Tarf_Cont_City_Id, Tarf_Cont_Tariff_Id, Tarf_Cont_Insp_Id, Tarf_Cont_Pay_Id, Tarf_Cont_Event_Id, Created_By, Updated_By', 'numerical', 'integerOnly'=>true),
            array('Tarf_Cont_User_Id', 'required', 'message'=>'Please select User'),
            array('Tarf_Cont_GUID', 'length', 'max'=>40),
            array('Tarf_Cont_Internal_Code', 'length', 'max'=>50),
            array('Tarf_Cont_District, Tarf_Cont_Area', 'length', 'max'=>100),
            array('Tarf_Cont_Balance, Tarf_Cont_Amt_Pay, Tarf_Cont_Portion', 'numerical', 'integerOnly'=>false),
            array('Tarf_Cont_Comment, Tarf_Cont_Event_Comment, Created_Date, Rowversion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Tarf_Cont_Id, Tarf_Cont_GUID, Tarf_Cont_Internal_Code, Tarf_Cont_User_Id, Tarf_Cont_City_Id, Tarf_Cont_District, Tarf_Cont_Area, Tarf_Cont_Tariff_Id, Tarf_Cont_Insp_Id, Tarf_Cont_Balance, Tarf_Cont_Amt_Pay, Tarf_Cont_From, Tarf_Cont_To, Tarf_Cont_Sign_Date, Tarf_Cont_Pay_Id, Tarf_Cont_Portion, Tarf_Cont_Comment, Tarf_Cont_Event_Id, Tarf_Cont_Event_Date, Tarf_Cont_Event_Comment, Created_Date, Rowversion, Created_By, Updated_By', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'tarfContUser' => array(self::BELONGS_TO, 'CustomerUser', 'Tarf_Cont_User_Id'),
            'tarfContEvent' => array(self::BELONGS_TO, 'MasterEventType', 'Tarf_Cont_Event_Id'),
            'tarfContInsp' => array(self::BELONGS_TO, 'Inspector', 'Tarf_Cont_Insp_Id'),
            'tarfContTariff' => array(self::BELONGS_TO, 'MasterTariff', 'Tarf_Cont_Tariff_Id'),
            'tarfContCity' => array(self::BELONGS_TO, 'MasterCity', 'Tarf_Cont_City_Id'),
            'createdBy' => array(self::BELONGS_TO, 'User', 'Created_By'),
            'updatedBy' => array(self::BELONGS_TO, 'User', 'Updated_By'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Tarf_Cont_Id' => 'Tarf Cont',
            'Tarf_Cont_GUID' => 'Guid',
            'Tarf_Cont_Internal_Code' => 'Contract Number',
            'Tarf_Cont_User_Id' => 'User',
            'Tarf_Cont_City_Id' => 'City',
            'Tarf_Cont_District' => 'District',
            'Tarf_Cont_Area' => 'Area',
            'Tarf_Cont_Tariff_Id' => 'Tariff code',
            'Tarf_Cont_Insp_Id' => 'Inspector',
            'Tarf_Cont_Balance' => 'Balance',
            'Tarf_Cont_Amt_Pay' => 'Amount to pay',
            'Tarf_Cont_From' => 'From',
            'Tarf_Cont_To' => 'To',
            'Tarf_Cont_Sign_Date' => 'Date of signature',
            'Tarf_Cont_Pay_Id' => 'Payment',
            'Tarf_Cont_Portion' => 'Portion',
            'Tarf_Cont_Comment' => 'Comment',
            'Tarf_Cont_Event_Id' => 'Type',
            'Tarf_Cont_Event_Date' => 'Date',
            'Tarf_Cont_Event_Comment' => 'Comment',
            'Created_Date' => 'Created Date',
            'Rowversion' => 'Rowversion',
            'Created_By' => 'Created By',
            'Updated_By' => 'Updated By',
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

        $criteria->compare('Tarf_Cont_Id', $this->Tarf_Cont_Id);
        $criteria->compare('Tarf_Cont_GUID', $this->Tarf_Cont_GUID, true);
        $criteria->compare('Tarf_Cont_Internal_Code', $this->Tarf_Cont_Internal_Code, true);
        $criteria->compare('Tarf_Cont_City_Id', $this->Tarf_Cont_City_Id);
        $criteria->compare('Tarf_Cont_District', $this->Tarf_Cont_District, true);
        $criteria->compare('Tarf_Cont_Area', $this->Tarf_Cont_Area, true);
        $criteria->compare('Tarf_Cont_Tariff_Id', $this->Tarf_Cont_Tariff_Id);
        $criteria->compare('Tarf_Cont_Insp_Id', $this->Tarf_Cont_Insp_Id);
        $criteria->compare('Tarf_Cont_Balance', $this->Tarf_Cont_Balance, true);
        $criteria->compare('Tarf_Cont_Amt_Pay', $this->Tarf_Cont_Amt_Pay, true);
        $criteria->compare('Tarf_Cont_From', $this->Tarf_Cont_From, true);
        $criteria->compare('Tarf_Cont_To', $this->Tarf_Cont_To, true);
        $criteria->compare('Tarf_Cont_Sign_Date', $this->Tarf_Cont_Sign_Date, true);
        $criteria->compare('Tarf_Cont_Pay_Id', $this->Tarf_Cont_Pay_Id);
        $criteria->compare('Tarf_Cont_Portion', $this->Tarf_Cont_Portion, true);
        $criteria->compare('Tarf_Cont_Comment', $this->Tarf_Cont_Comment, true);
        $criteria->compare('Tarf_Cont_Event_Id', $this->Tarf_Cont_Event_Id);
        $criteria->compare('Tarf_Cont_Event_Date', $this->Tarf_Cont_Event_Date, true);
        $criteria->compare('Tarf_Cont_Event_Comment', $this->Tarf_Cont_Event_Comment, true);
        $criteria->compare('Created_Date', $this->Created_Date, true);
        $criteria->compare('Rowversion', $this->Rowversion, true);
        $criteria->compare('Created_By', $this->Created_By);
        $criteria->compare('Updated_By', $this->Updated_By);

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
     * @return TariffContracts the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function dataProvider() {
        return new CActiveDataProvider($this, array(
            'pagination' => array(
                'pageSize' => PAGE_SIZE,
            )
        ));
    }

    public function getPayment($key = NULL) {
        $payments = array(
            '1' => 'Annual',
            '2' => 'Biannual',
            '3' => 'Quarterly',
            '4' => 'Monthly',
            '5' => 'Weekly',
        );
        if(isset($this->Tarf_Cont_Pay_Id))
            $key = $this->Tarf_Cont_Pay_Id;
        if($key != NULL)
            return $payments[$key];
        return $payments;
    }
}
