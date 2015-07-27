<?php

/**
 * This is the model class for table "{{recording_session_subtitle}}".
 *
 * The followings are the available columns in table '{{recording_session_subtitle}}':
 * @property integer $Rcd_Ses_Subtitle_Id
 * @property integer $Rcd_Ses_Id
 * @property string $Rcd_Ses_Subtitle_Name
 * @property integer $Rcd_Ses_Subtitle_Type_Id
 * @property integer $Rcd_Ses_Subtitle_Language_Id
 * @property string $Created_Date
 * @property string $Rowversion
 * @property integer $Created_By
 * @property integer $Updated_By
 *
 * The followings are the available model relations:
 * @property MasterLanguage $rcdSesSubtitleLanguage
 * @property MasterType $rcdSesSubtitleType
 * @property RecordingSession $rcdSes
 */
class RecordingSessionSubtitle extends RActiveRecord {

    public function init() {
        parent::init();
        if ($this->isNewRecord) {
            $this->Rcd_Ses_Subtitle_Language_Id = DEFAULT_LANGUAGE_ID;
            $this->Rcd_Ses_Subtitle_Type_Id = DEFAULT_TYPE_ID;
        }
    }
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{recording_session_subtitle}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Rcd_Ses_Id, Rcd_Ses_Subtitle_Name, Rcd_Ses_Subtitle_Type_Id, Rcd_Ses_Subtitle_Language_Id', 'required'),
            array('Rcd_Ses_Id, Rcd_Ses_Subtitle_Type_Id, Rcd_Ses_Subtitle_Language_Id, Created_By, Updated_By', 'numerical', 'integerOnly' => true),
            array('Rcd_Ses_Subtitle_Name', 'length', 'max' => 255),
            array('Created_Date, Rowversion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Rcd_Ses_Subtitle_Id, Rcd_Ses_Id, Rcd_Ses_Subtitle_Name, Rcd_Ses_Subtitle_Type_Id, Rcd_Ses_Subtitle_Language_Id, Created_Date, Rowversion, Created_By, Updated_By', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'rcdSesSubtitleLanguage' => array(self::BELONGS_TO, 'MasterLanguage', 'Rcd_Ses_Subtitle_Language_Id'),
            'rcdSesSubtitleType' => array(self::BELONGS_TO, 'MasterType', 'Rcd_Ses_Subtitle_Type_Id'),
            'rcdSes' => array(self::BELONGS_TO, 'RecordingSession', 'Rcd_Ses_Id'),
            'createdBy' => array(self::BELONGS_TO, 'User', 'Created_By'),
            'updatedBy' => array(self::BELONGS_TO, 'User', 'Updated_By'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Rcd_Ses_Subtitle_Id' => 'Subtitle',
            'Rcd_Ses_Id' => 'Rcd Ses',
            'Rcd_Ses_Subtitle_Name' => 'Subtitle',
            'Rcd_Ses_Subtitle_Type_Id' => 'Type',
            'Rcd_Ses_Subtitle_Language_Id' => 'Language',
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

        $criteria->compare('Rcd_Ses_Subtitle_Id', $this->Rcd_Ses_Subtitle_Id);
        $criteria->compare('Rcd_Ses_Id', $this->Rcd_Ses_Id);
        $criteria->compare('Rcd_Ses_Subtitle_Name', $this->Rcd_Ses_Subtitle_Name, true);
        $criteria->compare('Rcd_Ses_Subtitle_Type_Id', $this->Rcd_Ses_Subtitle_Type_Id);
        $criteria->compare('Rcd_Ses_Subtitle_Language_Id', $this->Rcd_Ses_Subtitle_Language_Id);
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
     * @return RecordingSessionSubtitle the static model class
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

}
