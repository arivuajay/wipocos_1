<?php

/**
 * This is the model class for table "{{sound_carrier}}".
 *
 * The followings are the available columns in table '{{sound_carrier}}':
 * @property integer $Sound_Car_Id
 * @property string $Sound_Car_GUID
 * @property string $Sound_Car_Title
 * @property integer $Sound_Car_Language_Id
 * @property string $Sound_Car_Internal_Code
 * @property string $Sound_Car_Standardized_Code
 * @property string $Sound_Car_Catelog
 * @property string $Sound_Car_Barcode
 * @property string $Sound_Car_Distributor
 * @property string $Sound_Car_Label_Id
 * @property string $Sound_Car_Medium
 * @property integer $Sound_Car_Type_Id
 * @property string $Sound_Car_Main_Artist
 * @property string $Sound_Car_Producer
 * @property integer $Sound_Car_Product_Country_Id
 * @property string $Sound_Car_Year
 * @property string $Sound_Car_Release_Year
 * @property integer $Sound_Car_Manf_Id
 * @property string $Created_Date
 * @property string $Rowversion
 * @property integer $Created_By
 * @property integer $Updated_By
 *
 * The followings are the available model relations:
 * @property MasterManufacturer $soundCarManf
 * @property MasterLanguage $soundCarLanguage
 * @property MasterCountry $soundCarProductCountry
 * @property MasterType $soundCarType
 * @property MasterType $soundCarLabel
 * @property SoundCarrierBiography[] $soundCarrierBiographies
 * @property SoundCarrierDocumentation[] $soundCarrierDocumentations
 * @property SoundCarrierPublication[] $soundCarrierPublications
 * @property SoundCarrierSubtitle[] $soundCarrierSubtitles
 */
class SoundCarrier extends RActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function init() {
        parent::init();
        if ($this->isNewRecord) {
            $this->Sound_Car_GUID = Myclass::guid(false);
            $this->Sound_Car_Internal_Code = InternalcodeGenerate::model()->find("Gen_User_Type = :type", array(':type' => InternalcodeGenerate::SOUND_CARRIER_CODE))->Fullcode;
            $this->Sound_Car_Language_Id = DEFAULT_LANGUAGE_ID;
            $this->Sound_Car_Type_Id = DEFAULT_TYPE_ID;
            $this->Sound_Car_Product_Country_Id = DEFAULT_COUNTRY_ID;
        }
    }

    public function tableName() {
        return '{{sound_carrier}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Sound_Car_GUID, Sound_Car_Title, Sound_Car_Internal_Code, Sound_Car_Standardized_Code, Sound_Car_Medium, Sound_Car_Main_Artist, Sound_Car_Producer, Sound_Car_Product_Country_Id, Sound_Car_Year, Sound_Car_Release_Year, Sound_Car_Manf_Id', 'required'),
            array('Sound_Car_Language_Id, Sound_Car_Type_Id, Sound_Car_Product_Country_Id, Sound_Car_Manf_Id, Created_By, Updated_By', 'numerical', 'integerOnly' => true),
            array('Sound_Car_GUID', 'length', 'max' => 50),
            array('Sound_Car_Title, Sound_Car_Internal_Code, Sound_Car_Standardized_Code', 'unique'),
            array('Sound_Car_Title, Sound_Car_Barcode', 'length', 'max' => 255),
            array('Sound_Car_Internal_Code, Sound_Car_Standardized_Code, Sound_Car_Catelog, Sound_Car_Distributor, Sound_Car_Medium, Sound_Car_Main_Artist, Sound_Car_Producer', 'length', 'max' => 100),
            array('Sound_Car_Label_Id', 'length', 'max' => 20),
            array('Sound_Car_Year, Sound_Car_Release_Year', 'length', 'max' => 4),
            array('Sound_Car_Year', 'numerical', 'min' => (date('Y') - 100), 'max' => (date('Y'))),
            array('Sound_Car_Release_Year', 'numerical', 'min' => (date('Y') - 100), 'max' => (date('Y') + 100)),
            array('Created_Date, Rowversion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Sound_Car_Id, Sound_Car_GUID, Sound_Car_Title, Sound_Car_Language_Id, Sound_Car_Internal_Code, Sound_Car_Standardized_Code, Sound_Car_Catelog, Sound_Car_Barcode, Sound_Car_Distributor, Sound_Car_Label_Id, Sound_Car_Medium, Sound_Car_Type_Id, Sound_Car_Main_Artist, Sound_Car_Producer, Sound_Car_Product_Country_Id, Sound_Car_Year, Sound_Car_Release_Year, Sound_Car_Manf_Id, Created_Date, Rowversion, Created_By, Updated_By', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'soundCarManf' => array(self::BELONGS_TO, 'MasterManufacturer', 'Sound_Car_Manf_Id'),
            'soundCarLanguage' => array(self::BELONGS_TO, 'MasterLanguage', 'Sound_Car_Language_Id'),
            'soundCarProductCountry' => array(self::BELONGS_TO, 'MasterCountry', 'Sound_Car_Product_Country_Id'),
            'soundCarType' => array(self::BELONGS_TO, 'MasterType', 'Sound_Car_Type_Id'),
            'soundCarLabel' => array(self::BELONGS_TO, 'MasterLabel', 'Sound_Car_Label_Id'),
            'soundCarrierBiographies' => array(self::HAS_ONE, 'SoundCarrierBiography', 'Sound_Car_Id'),
            'soundCarrierDocumentations' => array(self::HAS_ONE, 'SoundCarrierDocumentation', 'Sound_Car_Id'),
            'soundCarrierPublications' => array(self::HAS_ONE, 'SoundCarrierPublication', 'Sound_Car_Id'),
            'soundCarrierSubtitles' => array(self::HAS_MANY, 'SoundCarrierSubtitle', 'Sound_Car_Id'),
            'soundCarMedia' => array(self::BELONGS_TO, 'MasterMedium', 'Sound_Car_Medium'),
            'createdBy' => array(self::BELONGS_TO, 'User', 'Created_By'),
            'updatedBy' => array(self::BELONGS_TO, 'User', 'Updated_By'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Sound_Car_Id' => 'Sound Car',
            'Sound_Car_GUID' => 'Guid',
            'Sound_Car_Title' => 'Original Title',
            'Sound_Car_Language_Id' => 'Language',
            'Sound_Car_Internal_Code' => 'Internal Code',
            'Sound_Car_Standardized_Code' => 'Standardized Code',
            'Sound_Car_Catelog' => 'Catelog',
            'Sound_Car_Barcode' => 'Bar code',
            'Sound_Car_Distributor' => 'Distributor',
            'Sound_Car_Label_Id' => 'Label',
            'Sound_Car_Medium' => 'Medium',
            'Sound_Car_Type_Id' => 'Type',
            'Sound_Car_Main_Artist' => 'Main Artist',
            'Sound_Car_Producer' => 'Producer',
            'Sound_Car_Product_Country_Id' => 'Country of Production',
            'Sound_Car_Year' => 'Year of recording',
            'Sound_Car_Release_Year' => 'Year of release',
            'Sound_Car_Manf_Id' => 'Manufacturer',
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

        $criteria->compare('Sound_Car_Id', $this->Sound_Car_Id);
        $criteria->compare('Sound_Car_GUID', $this->Sound_Car_GUID, true);
        $criteria->compare('Sound_Car_Title', $this->Sound_Car_Title, true);
        $criteria->compare('Sound_Car_Language_Id', $this->Sound_Car_Language_Id);
        $criteria->compare('Sound_Car_Internal_Code', $this->Sound_Car_Internal_Code, true);
        $criteria->compare('Sound_Car_Standardized_Code', $this->Sound_Car_Standardized_Code, true);
        $criteria->compare('Sound_Car_Catelog', $this->Sound_Car_Catelog, true);
        $criteria->compare('Sound_Car_Barcode', $this->Sound_Car_Barcode, true);
        $criteria->compare('Sound_Car_Distributor', $this->Sound_Car_Distributor, true);
        $criteria->compare('Sound_Car_Label_Id', $this->Sound_Car_Label_Id, true);
        $criteria->compare('Sound_Car_Medium', $this->Sound_Car_Medium, true);
        $criteria->compare('Sound_Car_Type_Id', $this->Sound_Car_Type_Id);
        $criteria->compare('Sound_Car_Main_Artist', $this->Sound_Car_Main_Artist, true);
        $criteria->compare('Sound_Car_Producer', $this->Sound_Car_Producer, true);
        $criteria->compare('Sound_Car_Product_Country_Id', $this->Sound_Car_Product_Country_Id);
        $criteria->compare('Sound_Car_Year', $this->Sound_Car_Year, true);
        $criteria->compare('Sound_Car_Release_Year', $this->Sound_Car_Release_Year, true);
        $criteria->compare('Sound_Car_Manf_Id', $this->Sound_Car_Manf_Id);
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
     * @return SoundCarrier the static model class
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
            InternalcodeGenerate::model()->codeIncreament(InternalcodeGenerate::SOUND_CARRIER_CODE);
        }
        return parent::afterSave();
    }

}
