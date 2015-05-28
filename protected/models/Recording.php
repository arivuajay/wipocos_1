<?php

/**
 * This is the model class for table "{{recording}}".
 *
 * The followings are the available columns in table '{{recording}}':
 * @property integer $Rcd_Id
 * @property string $Rcd_Title
 * @property integer $Rcd_Language_Id
 * @property string $Rcd_Internal_Code
 * @property integer $Rcd_Type_Id
 * @property string $Rcd_Date
 * @property string $Rcd_Duration
 * @property integer $Rcd_Record_Country_id
 * @property integer $Rcd_Product_Country_Id
 * @property integer $Rcd_Doc_Status_Id
 * @property string $Rcd_Record_Type_Id
 * @property string $Rcd_Label_Id
 * @property string $Rcd_Reference
 * @property string $Rcd_File
 * @property string $Rcd_Isrc_Code
 * @property string $Rcd_Iswc_Number
 *
 * The followings are the available model relations:
 * @property MasterDocumentStatus $rcdDocStatus
 * @property MasterLanguage $rcdLanguage
 * @property MasterCountry $rcdProductCountry
 * @property MasterCountry $rcdRecordCountry
 * @property MasterType $rcdType
 * @property RecordingPublication[] $recordingPublications
 * @property RecordingRightholder[] $recordingRightholders
 * @property RecordingSubtitle[] $recordingSubtitles
 */
class Recording extends CActiveRecord {

    public $duration_hours;
    public $duration_minutes;
    public $duration_seconds;
    
    public function init() {
        parent::init();
        if($this->isNewRecord){
            $this->Rcd_Language_Id = DEFAULT_LANGUAGE_ID;
            $this->Rcd_Type_Id = DEFAULT_TYPE_ID;
            $this->Rcd_Record_Country_id = DEFAULT_COUNTRY_ID;
            $this->Rcd_Product_Country_Id = DEFAULT_COUNTRY_ID;
        }
    }
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{recording}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Rcd_Title, Rcd_Internal_Code, Rcd_Type_Id, Rcd_Date, Rcd_Duration, Rcd_Record_Country_id, Rcd_Product_Country_Id, Rcd_Doc_Status_Id, Rcd_Record_Type_Id, Rcd_Label_Id, duration_hours, duration_minutes, duration_seconds', 'required'),
            array('Rcd_Language_Id, Rcd_Type_Id, Rcd_Record_Country_id, Rcd_Product_Country_Id, Rcd_Doc_Status_Id', 'numerical', 'integerOnly' => true),
            array('Rcd_Title, Rcd_Reference, Rcd_File', 'length', 'max' => 255),
            array('Rcd_Internal_Code, Rcd_Isrc_Code, Rcd_Iswc_Number', 'length', 'max' => 100),
            array('Rcd_Record_Type_Id, Rcd_Label_Id', 'length', 'max' => 20),
            array('duration_minutes, duration_seconds', 'numerical', 'min' => 0, 'max' => 59),
            array('duration_hours', 'numerical', 'min' => 0),
            array('Rcd_Internal_Code', 'unique'),
            array('Created_Date, Rowversion, duration_hours, duration_minutes, duration_seconds', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Rcd_Id, Rcd_Title, Rcd_Language_Id, Rcd_Internal_Code, Rcd_Type_Id, Rcd_Date, Rcd_Duration, Rcd_Record_Country_id, Rcd_Product_Country_Id, Rcd_Doc_Status_Id, Rcd_Record_Type_Id, Rcd_Label_Id, Rcd_Reference, Rcd_File, Rcd_Isrc_Code, Rcd_Iswc_Number, Created_Date, Rowversion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'rcdDocStatus' => array(self::BELONGS_TO, 'MasterDocumentStatus', 'Rcd_Doc_Status_Id'),
            'rcdLanguage' => array(self::BELONGS_TO, 'MasterLanguage', 'Rcd_Language_Id'),
            'rcdProductCountry' => array(self::BELONGS_TO, 'MasterCountry', 'Rcd_Product_Country_Id'),
            'rcdRecordCountry' => array(self::BELONGS_TO, 'MasterCountry', 'Rcd_Record_Country_id'),
            'rcdType' => array(self::BELONGS_TO, 'MasterType', 'Rcd_Type_Id'),
            'recordingPublications' => array(self::HAS_ONE, 'RecordingPublication', 'Rcd_Id'),
            'recordingRightholders' => array(self::HAS_MANY, 'RecordingRightholder', 'Rcd_Id'),
            'recordingSubtitles' => array(self::HAS_MANY, 'RecordingSubtitle', 'Rcd_Id'),
            'recordingLinks' => array(self::HAS_MANY, 'RecordingLink', 'Rcd_Id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Rcd_Id' => 'Rcd',
            'Rcd_Title' => 'Original Title',
            'Rcd_Language_Id' => 'Language',
            'Rcd_Internal_Code' => 'Internal Code',
            'Rcd_Type_Id' => 'Type of Music or Sound',
            'Rcd_Date' => 'Recording Date',
            'Rcd_Duration' => 'Duration',
            'Rcd_Record_Country_id' => 'Country of Recording',
            'Rcd_Product_Country_Id' => 'Country of Production',
            'Rcd_Doc_Status_Id' => 'Status',
            'Rcd_Record_Type_Id' => 'Type of Recording',
            'Rcd_Label_Id' => 'Label',
            'Rcd_Reference' => 'Reference',
            'Rcd_File' => 'File',
            'Rcd_Isrc_Code' => 'ISRC Code',
            'Rcd_Iswc_Number' => 'ISWC Number',
            'Created_Date' => 'Created Date',
            'Rowversion' => 'Rowversion',
            'duration_hours' => 'Hours',
            'duration_minutes' => 'Minutes',
            'duration_seconds' => 'Seconds',
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

        $criteria->compare('Rcd_Id', $this->Rcd_Id);
        $criteria->compare('Rcd_Title', $this->Rcd_Title, true);
        $criteria->compare('Rcd_Language_Id', $this->Rcd_Language_Id);
        $criteria->compare('Rcd_Internal_Code', $this->Rcd_Internal_Code, true);
        $criteria->compare('Rcd_Type_Id', $this->Rcd_Type_Id);
        $criteria->compare('Rcd_Date', $this->Rcd_Date, true);
        $criteria->compare('Rcd_Duration', $this->Rcd_Duration, true);
        $criteria->compare('Rcd_Record_Country_id', $this->Rcd_Record_Country_id);
        $criteria->compare('Rcd_Product_Country_Id', $this->Rcd_Product_Country_Id);
        $criteria->compare('Rcd_Doc_Status_Id', $this->Rcd_Doc_Status_Id);
        $criteria->compare('Rcd_Record_Type_Id', $this->Rcd_Record_Type_Id, true);
        $criteria->compare('Rcd_Label_Id', $this->Rcd_Label_Id, true);
        $criteria->compare('Rcd_Reference', $this->Rcd_Reference, true);
        $criteria->compare('Rcd_File', $this->Rcd_File, true);
        $criteria->compare('Rcd_Isrc_Code', $this->Rcd_Isrc_Code, true);
        $criteria->compare('Rcd_Iswc_Number', $this->Rcd_Iswc_Number, true);

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
     * @return Recording the static model class
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

    protected function beforeValidate() {
        $this->Rcd_Duration = $this->duration_hours . ':' . $this->duration_minutes . ':' . $this->duration_seconds;
        return parent::beforeValidate();
    }
    
    protected function afterSave() {
        if ($this->isNewRecord) {
            $gen_inter_model = InternalcodeGenerate::model()->find("Gen_User_Type = :type", array(':type' => 'R'));
            $len = strlen($gen_inter_model->Gen_Inter_Code);
            $gen_inter_model->Gen_Inter_Code = str_pad(($gen_inter_model->Gen_Inter_Code + 1), $len, "0", STR_PAD_LEFT);
            $gen_inter_model->save(false);
        }
    }
    
    public function setDuration() {
        $time = explode(':', $this->Rcd_Duration);
        $this->duration_hours = $time[0];
        $this->duration_minutes = $time[1];
        $this->duration_seconds = $time[2];
    }
    
    public function getRecordingtype($key = NULL) {
        $recording = array(
            '1' => 'Normal',
        );

        if ($key != NULL)
            return $recording[$key];

        return $recording;
    }
    
    public function getLabel($key = NULL) {
        $label = array(
            '1' => 'No Label'
        );

        if ($key != NULL)
            return $label[$key];

        return $label;
    }
}
