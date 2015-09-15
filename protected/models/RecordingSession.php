<?php

/**
 * This is the model class for table "{{recording_session}}".
 *
 * The followings are the available columns in table '{{recording_session}}':
 * @property integer $Rcd_Ses_Id
 * @property string $Rcd_Ses_GUID
 * @property string $Rcd_Ses_Title
 * @property string $Rcd_Ses_Internal_Code
 * @property integer $Rcd_Ses_Language_Id
 * @property string $Rcd_Ses_Orchestra
 * @property string $Rcd_Ses_Ref_Medium
 * @property integer $Rcd_Ses_Hours
 * @property string $Rcd_Ses_Record_Date
 * @property integer $Rcd_Ses_Studio_Id
 * @property integer $Rcd_Ses_Producer
 * @property integer $Rcd_Ses_Main_Artist
 * @property integer $Rcd_Ses_Medium_Id
 * @property integer $Rcd_Ses_Type_Id
 * @property integer $Rcd_Ses_Destination_Id
 * @property integer $Rcd_Ses_Country_Id
 * @property integer $Rcd_Ses_Factor_Id
 * @property string $Rcd_Ses_Release_Year
 *
 * The followings are the available model relations:
 * @property MasterFactor $rcdSesFactor
 * @property MasterCountry $rcdSesCountry
 * @property MasterLanguage $rcdSesLanguage
 * @property MasterMedium $rcdSesMedium
 * @property MasterStudio $rcdSesStudio
 * @property MasterType $rcdSesType
 * @property RecordingSessionBiography[] $recordingSessionBiographies
 * @property RecordingSessionSubtitle[] $recordingSessionSubtitles
 */
class RecordingSession extends RActiveRecord {

    public function init() {
        parent::init();
        if ($this->isNewRecord) {
            $this->Rcd_Ses_GUID = Myclass::guid(false);
            $this->Rcd_Ses_Internal_Code = InternalcodeGenerate::model()->find("Gen_User_Type = :type", array(':type' => InternalcodeGenerate::RECORDING_SESSION_CODE))->Fullcode;
            $this->Rcd_Ses_Language_Id = DEFAULT_LANGUAGE_ID;
            $this->Rcd_Ses_Type_Id = DEFAULT_TYPE_ID;
            $this->Rcd_Ses_Country_Id = DEFAULT_COUNTRY_ID;
            $this->Rcd_Ses_Factor_Id = DEFAULT_FACTOR_ID;
            $this->Rcd_Ses_Medium_Id = DEFAULT_MEDIUM_ID;
        }
    }
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{recording_session}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Rcd_Ses_GUID, Rcd_Ses_Title, Rcd_Ses_Internal_Code, Rcd_Ses_Record_Date, Rcd_Ses_Studio_Id, Rcd_Ses_Medium_Id, Rcd_Ses_Type_Id, Rcd_Ses_Destination_Id, Rcd_Ses_Country_Id, Rcd_Ses_Factor_Id', 'required'),
            array('Rcd_Ses_Producer', 'required', 'on' => 'prodReq'),
            array('Rcd_Ses_Main_Artist', 'required', 'on' => 'perfReq'),
            array('Rcd_Ses_Main_Artist, Rcd_Ses_Producer', 'required', 'on' => 'perfprodReq'),
            array('Rcd_Ses_Language_Id, Rcd_Ses_Hours, Rcd_Ses_Studio_Id, Rcd_Ses_Producer, Rcd_Ses_Main_Artist, Rcd_Ses_Medium_Id, Rcd_Ses_Type_Id, Rcd_Ses_Destination_Id, Rcd_Ses_Country_Id, Rcd_Ses_Factor_Id', 'numerical', 'integerOnly' => true),
            array('Rcd_Ses_GUID', 'length', 'max' => 40),
            array('Rcd_Ses_Title', 'length', 'max' => 255),
            array('Rcd_Ses_Internal_Code', 'length', 'max' => 100),
            array('Rcd_Ses_Title, Rcd_Ses_Internal_Code, Rcd_Ses_Orchestra, Rcd_Ses_Ref_Medium', 'length', 'max' => 50),
            array('Rcd_Ses_Release_Year', 'length', 'max' => 4),
            array('Rcd_Ses_Internal_Code, Rcd_Ses_Title', 'unique'),
            array('Created_Date, Rowversion, Created_By, Updated_By', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Rcd_Ses_Id, Rcd_Ses_GUID, Rcd_Ses_Title, Rcd_Ses_Internal_Code, Rcd_Ses_Language_Id, Rcd_Ses_Orchestra, Rcd_Ses_Ref_Medium, Rcd_Ses_Hours, Rcd_Ses_Record_Date, Rcd_Ses_Studio_Id, Rcd_Ses_Producer, Rcd_Ses_Main_Artist, Rcd_Ses_Medium_Id, Rcd_Ses_Type_Id, Rcd_Ses_Destination_Id, Rcd_Ses_Country_Id, Rcd_Ses_Factor_Id, Rcd_Ses_Release_Year', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'rcdSesFactor' => array(self::BELONGS_TO, 'MasterFactor', 'Rcd_Ses_Factor_Id'),
            'rcdSesCountry' => array(self::BELONGS_TO, 'MasterCountry', 'Rcd_Ses_Country_Id'),
            'rcdSesLanguage' => array(self::BELONGS_TO, 'MasterLanguage', 'Rcd_Ses_Language_Id'),
            'rcdSesMedium' => array(self::BELONGS_TO, 'MasterMedium', 'Rcd_Ses_Medium_Id'),
            'rcdSesStudio' => array(self::BELONGS_TO, 'MasterStudio', 'Rcd_Ses_Studio_Id'),
            'rcdSesType' => array(self::BELONGS_TO, 'MasterType', 'Rcd_Ses_Type_Id'),
            'rcdSesDestination' => array(self::BELONGS_TO, 'MasterDestination', 'Rcd_Ses_Destination_Id'),
            'recordingSessionBiographies' => array(self::HAS_ONE, 'RecordingSessionBiography', 'Rcd_Ses_Id'),
            'recordingSessionSubtitles' => array(self::HAS_MANY, 'RecordingSessionSubtitle', 'Rcd_Ses_Id'),
            'recordingSessionMainArtist' => array(self::BELONGS_TO, 'PerformerAccount', 'Rcd_Ses_Main_Artist'),
            'recordingSessionProducer' => array(self::BELONGS_TO, 'ProducerAccount', 'Rcd_Ses_Producer'),
            'createdBy' => array(self::BELONGS_TO, 'User', 'Created_By'),
            'updatedBy' => array(self::BELONGS_TO, 'User', 'Updated_By'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Rcd_Ses_Id' => 'Rcd Ses',
            'Rcd_Ses_GUID' => 'Guid',
            'Rcd_Ses_Title' => 'Title',
            'Rcd_Ses_Internal_Code' => 'Internal Code',
            'Rcd_Ses_Language_Id' => 'Language',
            'Rcd_Ses_Orchestra' => 'Orchestra',
            'Rcd_Ses_Ref_Medium' => 'References of Medium',
            'Rcd_Ses_Hours' => 'Hours',
            'Rcd_Ses_Record_Date' => 'Recording Date',
            'Rcd_Ses_Studio_Id' => 'Studio',
            'Rcd_Ses_Producer' => 'Producer',
            'Rcd_Ses_Main_Artist' => 'Main Artist or Group',
            'Rcd_Ses_Medium_Id' => 'Type of Medium',
            'Rcd_Ses_Type_Id' => 'Type',
            'Rcd_Ses_Destination_Id' => 'Destination',
            'Rcd_Ses_Country_Id' => 'Country',
            'Rcd_Ses_Factor_Id' => 'Factor',
            'Rcd_Ses_Release_Year' => 'Year of Release',
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

        $criteria->compare('Rcd_Ses_Id', $this->Rcd_Ses_Id);
        $criteria->compare('Rcd_Ses_GUID', $this->Rcd_Ses_GUID, true);
        $criteria->compare('Rcd_Ses_Title', $this->Rcd_Ses_Title, true);
        $criteria->compare('Rcd_Ses_Internal_Code', $this->Rcd_Ses_Internal_Code, true);
        $criteria->compare('Rcd_Ses_Language_Id', $this->Rcd_Ses_Language_Id);
        $criteria->compare('Rcd_Ses_Orchestra', $this->Rcd_Ses_Orchestra, true);
        $criteria->compare('Rcd_Ses_Ref_Medium', $this->Rcd_Ses_Ref_Medium, true);
        $criteria->compare('Rcd_Ses_Hours', $this->Rcd_Ses_Hours);
        $criteria->compare('Rcd_Ses_Record_Date', $this->Rcd_Ses_Record_Date, true);
        $criteria->compare('Rcd_Ses_Studio_Id', $this->Rcd_Ses_Studio_Id);
        $criteria->compare('Rcd_Ses_Producer', $this->Rcd_Ses_Producer);
        $criteria->compare('Rcd_Ses_Main_Artist', $this->Rcd_Ses_Main_Artist);
        $criteria->compare('Rcd_Ses_Medium_Id', $this->Rcd_Ses_Medium_Id);
        $criteria->compare('Rcd_Ses_Type_Id', $this->Rcd_Ses_Type_Id);
        $criteria->compare('Rcd_Ses_Destination_Id', $this->Rcd_Ses_Destination_Id);
        $criteria->compare('Rcd_Ses_Country_Id', $this->Rcd_Ses_Country_Id);
        $criteria->compare('Rcd_Ses_Factor_Id', $this->Rcd_Ses_Factor_Id);
        $criteria->compare('Rcd_Ses_Release_Year', $this->Rcd_Ses_Release_Year, true);

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
     * @return RecordingSession the static model class
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
            InternalcodeGenerate::model()->codeIncreament(InternalcodeGenerate::RECORDING_SESSION_CODE);
        }
        return parent::afterSave();
    }
}
