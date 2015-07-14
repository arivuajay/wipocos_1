<?php

/**
 * This is the model class for table "{{sound_carrier_publication}}".
 *
 * The followings are the available columns in table '{{sound_carrier_publication}}':
 * @property integer $Sound_Car_Publ_Id
 * @property integer $Sound_Car_Id
 * @property string $Sound_Car_Publ_GUID
 * @property string $Sound_Car_Publ_Internal_Code
 * @property string $Sound_Car_Publ_Year
 * @property integer $Sound_Car_Publ_Country_Id
 * @property integer $Sound_Car_Publ_Prod_Nation_Id
 * @property integer $Sound_Car_Publ_Studio
 * @property string $Created_Date
 * @property string $Rowversion
 * @property integer $Created_By
 * @property integer $Updated_By
 *
 * The followings are the available model relations:
 * @property MasterCountry $soundCarPublCountry
 * @property MasterNationality $soundCarPublProdNation
 * @property SoundCarrier $soundCar
 */
class SoundCarrierPublication extends RActiveRecord {

    public function init() {
        parent::init();
        if($this->isNewRecord){
            $this->Sound_Car_Publ_Country_Id = DEFAULT_COUNTRY_ID;
            $this->Sound_Car_Publ_Prod_Nation_Id = DEFAULT_NATIONALITY_ID;
            $this->Sound_Car_Publ_Studio = DEFAULT_NATIONALITY_ID;
            $this->Sound_Car_Publ_Internal_Code = InternalcodeGenerate::model()->find("Gen_User_Type = :type", array(':type' => InternalcodeGenerate::SOUND_CARRIER_PUBLISHING_CODE))->Fullcode;
        }
    }
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{sound_carrier_publication}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Sound_Car_Id, Sound_Car_Publ_Internal_Code, Sound_Car_Publ_Year, Sound_Car_Publ_Country_Id, Sound_Car_Publ_Prod_Nation_Id, Sound_Car_Publ_Studio, Sound_Car_Publ_GUID', 'required'),
            array('Sound_Car_Id, Sound_Car_Publ_Country_Id, Sound_Car_Publ_Prod_Nation_Id, Sound_Car_Publ_Studio, Created_By, Updated_By', 'numerical', 'integerOnly' => true),
            array('Sound_Car_Publ_Internal_Code', 'length', 'max' => 100),
            array('Sound_Car_Publ_Year', 'length', 'max' => 4),
            array('Sound_Car_Publ_Year', 'numerical', 'min' => (date('Y') - 100), 'max' => (date('Y'))),
            array('Sound_Car_Publ_GUID', 'checkUnique'),
            array('Created_Date, Rowversion, Sound_Car_Publ_GUID, Sound_Car_Publ_Work_Type', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Sound_Car_Publ_Id, Sound_Car_Id, Sound_Car_Publ_Internal_Code, Sound_Car_Publ_Year, Sound_Car_Publ_Country_Id, Sound_Car_Publ_Prod_Nation_Id, Sound_Car_Publ_Studio, Created_Date, Rowversion, Created_By, Updated_By', 'safe', 'on' => 'search'),
        );
    }

    public function checkUnique($attribute, $params) {
        $checkExists = array();
        if ($this->isNewRecord) {
            $checkExists = self::model()->findByAttributes(array('Sound_Car_Id' => $this->Sound_Car_Id, 'Sound_Car_Publ_GUID' => $this->Sound_Car_Publ_GUID));
        }else{
            $checkExists = self::model()->find("Sound_Car_Publ_Id != :id And Sound_Car_Id = :sound_car_id And Sound_Car_Publ_GUID = :guid", array(':id' => $this->Sound_Car_Publ_Id, ':sound_car_id' => $this->Sound_Car_Id, ':guid' => $this->Sound_Car_Publ_GUID));
        }
        if (!empty($checkExists))
            $this->addError($attribute, "This Title has already been taken.");
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'soundCarPublStudio' => array(self::BELONGS_TO, 'MasterStudio', 'Sound_Car_Publ_Studio'),
            'soundCarPublCountry' => array(self::BELONGS_TO, 'MasterCountry', 'Sound_Car_Publ_Country_Id'),
            'soundCarPublProdNation' => array(self::BELONGS_TO, 'MasterNationality', 'Sound_Car_Publ_Prod_Nation_Id'),
            'soundCar' => array(self::BELONGS_TO, 'SoundCarrier', 'Sound_Car_Id'),
            'createdBy' => array(self::BELONGS_TO, 'User', 'Created_By'),
            'updatedBy' => array(self::BELONGS_TO, 'User', 'Updated_By'),
            'soundCarRecord' => array(self::BELONGS_TO, 'Recording', 'Sound_Car_Publ_GUID', 'foreignKey' => array('Sound_Car_Publ_GUID' => 'Rcd_GUID')),
            'soundCarWork' => array(self::BELONGS_TO, 'Work', 'Sound_Car_Publ_GUID', 'foreignKey' => array('Sound_Car_Publ_GUID' => 'Work_GUID')),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Sound_Car_Publ_Id' => 'Sound Car Publ',
            'Sound_Car_Id' => 'Sound Car',
            'Sound_Car_Publ_GUID' => 'Title',
            'Sound_Car_Publ_Internal_Code' => 'Internal Code',
            'Sound_Car_Publ_Year' => 'Year',
            'Sound_Car_Publ_Country_Id' => 'Country',
            'Sound_Car_Publ_Prod_Nation_Id' => 'Nationality of Producer',
            'Sound_Car_Publ_Studio' => 'Place or Studio',
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

        $criteria->compare('Sound_Car_Publ_Id', $this->Sound_Car_Publ_Id);
        $criteria->compare('Sound_Car_Id', $this->Sound_Car_Id);
        $criteria->compare('Sound_Car_Publ_Internal_Code', $this->Sound_Car_Publ_Internal_Code, true);
        $criteria->compare('Sound_Car_Publ_Year', $this->Sound_Car_Publ_Year, true);
        $criteria->compare('Sound_Car_Publ_Country_Id', $this->Sound_Car_Publ_Country_Id);
        $criteria->compare('Sound_Car_Publ_Prod_Nation_Id', $this->Sound_Car_Publ_Prod_Nation_Id);
        $criteria->compare('Sound_Car_Publ_Studio', $this->Sound_Car_Publ_Studio);
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
     * @return SoundCarrierPublication the static model class
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

    protected function afterSave() {
        if ($this->isNewRecord) {
            InternalcodeGenerate::model()->codeIncreament(InternalcodeGenerate::SOUND_CARRIER_PUBLISHING_CODE);
        }
        return parent::afterSave();
    }
}
