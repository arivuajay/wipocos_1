<?php

/**
 * This is the model class for table "{{sound_carrier_subtitle}}".
 *
 * The followings are the available columns in table '{{sound_carrier_subtitle}}':
 * @property integer $Sound_Car_Subtitle_Id
 * @property integer $Sound_Car_Id
 * @property string $Sound_Car_Subtitle_Name
 * @property integer $Sound_Car_Subtitle_Type_Id
 * @property integer $Sound_Car_Subtitle_Language_Id
 * @property string $Created_Date
 * @property string $Rowversion
 * @property integer $Created_By
 * @property integer $Updated_By
 *
 * The followings are the available model relations:
 * @property MasterLanguage $soundCarSubtitleLanguage
 * @property SoundCarrier $soundCar
 * @property MasterType $soundCarSubtitleType
 */
class SoundCarrierSubtitle extends RActiveRecord {

    public function init() {
        parent::init();
        if($this->isNewRecord){
            $this->Sound_Car_Subtitle_Type_Id = DEFAULT_TYPE_ID;
            $this->Sound_Car_Subtitle_Language_Id = DEFAULT_LANGUAGE_ID;
        }
    }
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{sound_carrier_subtitle}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Sound_Car_Id, Sound_Car_Subtitle_Name, Sound_Car_Subtitle_Type_Id, Sound_Car_Subtitle_Language_Id', 'required'),
            array('Sound_Car_Id, Sound_Car_Subtitle_Type_Id, Sound_Car_Subtitle_Language_Id, Created_By, Updated_By', 'numerical', 'integerOnly' => true),
            array('Sound_Car_Subtitle_Name', 'length', 'max' => 255),
            array('Created_Date, Rowversion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Sound_Car_Subtitle_Id, Sound_Car_Id, Sound_Car_Subtitle_Name, Sound_Car_Subtitle_Type_Id, Sound_Car_Subtitle_Language_Id, Created_Date, Rowversion, Created_By, Updated_By', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'soundCarSubtitleLanguage' => array(self::BELONGS_TO, 'MasterLanguage', 'Sound_Car_Subtitle_Language_Id'),
            'soundCar' => array(self::BELONGS_TO, 'SoundCarrier', 'Sound_Car_Id'),
            'soundCarSubtitleType' => array(self::BELONGS_TO, 'MasterSubtitleType', 'Sound_Car_Subtitle_Type_Id'),
            'createdBy' => array(self::BELONGS_TO, 'User', 'Created_By'),
            'updatedBy' => array(self::BELONGS_TO, 'User', 'Updated_By'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Sound_Car_Subtitle_Id' => 'Sound Car Subtitle',
            'Sound_Car_Id' => 'Sound Car',
            'Sound_Car_Subtitle_Name' => 'Subtitle',
            'Sound_Car_Subtitle_Type_Id' => 'Type',
            'Sound_Car_Subtitle_Language_Id' => 'Language',
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

        $criteria->compare('Sound_Car_Subtitle_Id', $this->Sound_Car_Subtitle_Id);
        $criteria->compare('Sound_Car_Id', $this->Sound_Car_Id);
        $criteria->compare('Sound_Car_Subtitle_Name', $this->Sound_Car_Subtitle_Name, true);
        $criteria->compare('Sound_Car_Subtitle_Type_Id', $this->Sound_Car_Subtitle_Type_Id);
        $criteria->compare('Sound_Car_Subtitle_Language_Id', $this->Sound_Car_Subtitle_Language_Id);
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
     * @return SoundCarrierSubtitle the static model class
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
