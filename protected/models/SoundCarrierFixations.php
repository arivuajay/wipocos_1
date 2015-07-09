<?php

/**
 * This is the model class for table "{{sound_carrier_fixations}}".
 *
 * The followings are the available columns in table '{{sound_carrier_fixations}}':
 * @property integer $Sound_Car_Fix_Id
 * @property integer $Sound_Car_Id
 * @property string $Sound_Car_Fix_GUID
 * @property string $Sound_Car_Fix_Duration
 * @property string $Sound_Car_Fix_Date
 * @property integer $Sound_Car_Fix_Studio
 * @property integer $Sound_Car_Fix_Country_Id
 *
 * The followings are the available model relations:
 * @property SoundCarrier $soundCar
 */
class SoundCarrierFixations extends CActiveRecord {

    public $duration_hours;
    public $duration_minutes;
    public $duration_seconds;
    
    public function init() {
        parent::init();
        if ($this->isNewRecord) {
            $this->duration_hours = 0;
            $this->duration_minutes = 0;
            $this->duration_seconds = 0;
            $this->Sound_Car_Fix_Country_Id = DEFAULT_COUNTRY_ID;
            $this->Sound_Car_Fix_Studio = DEFAULT_COUNTRY_ID;
        }
    }
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{sound_carrier_fixations}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Sound_Car_Id, Sound_Car_Fix_GUID, Sound_Car_Fix_Duration, Sound_Car_Fix_Date, Sound_Car_Fix_Studio, Sound_Car_Fix_Country_Id', 'required'),
            array('Sound_Car_Id, Sound_Car_Fix_Studio, Sound_Car_Fix_Country_Id', 'numerical', 'integerOnly' => true),
            array('Sound_Car_Fix_GUID', 'length', 'max' => 40),
            array('duration_hours', 'durationValidate'),
            array('Created_Date, Rowversion, duration_hours, duration_minutes, duration_seconds, matchingdetails, Created_By, Updated_By', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Sound_Car_Fix_Id, Sound_Car_Id, Sound_Car_Fix_GUID, Sound_Car_Fix_Duration, Sound_Car_Fix_Date, Sound_Car_Fix_Studio, Sound_Car_Fix_Country_Id', 'safe', 'on' => 'search'),
        );
    }

    public function durationValidate($attribute, $params) {
        if ($this->duration_hours == '0' && $this->duration_minutes == '0' && $this->duration_seconds == '0') {
            $this->addError($attribute, 'Duration should not be Zero');
        }
    }
    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'soundCarFixCountry' => array(self::BELONGS_TO, 'MasterCountry', 'Sound_Car_Fix_Country_Id'),
            'soundCar' => array(self::BELONGS_TO, 'SoundCarrier', 'Sound_Car_Id'),
            'soundCarFixStudio' => array(self::BELONGS_TO, 'MasterStudio', 'Sound_Car_Fix_Studio'),
            'soundCarRecord' => array(self::BELONGS_TO, 'Recording', 'Sound_Car_Fix_GUID', 'foreignKey' => array('Sound_Car_Fix_GUID' => 'Rcd_GUID')),
            'createdBy' => array(self::BELONGS_TO, 'User', 'Created_By'),
            'updatedBy' => array(self::BELONGS_TO, 'User', 'Updated_By'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Sound_Car_Fix_Id' => 'Sound Car Fix',
            'Sound_Car_Id' => 'Sound Car',
            'Sound_Car_Fix_GUID' => 'Title',
            'Sound_Car_Fix_Duration' => 'Duration',
            'Sound_Car_Fix_Date' => 'Date',
            'Sound_Car_Fix_Studio' => 'Studio',
            'Sound_Car_Fix_Country_Id' => 'Country of recording',
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

        $criteria->compare('Sound_Car_Fix_Id', $this->Sound_Car_Fix_Id);
        $criteria->compare('Sound_Car_Id', $this->Sound_Car_Id);
        $criteria->compare('Sound_Car_Fix_GUID', $this->Sound_Car_Fix_GUID, true);
        $criteria->compare('Sound_Car_Fix_Duration', $this->Sound_Car_Fix_Duration, true);
        $criteria->compare('Sound_Car_Fix_Date', $this->Sound_Car_Fix_Date, true);
        $criteria->compare('Sound_Car_Fix_Studio', $this->Sound_Car_Fix_Studio);
        $criteria->compare('Sound_Car_Fix_Country_Id', $this->Sound_Car_Fix_Country_Id);

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
     * @return SoundCarrierFixations the static model class
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

    public function setDuration() {
        $time = explode(':', $this->Sound_Car_Fix_Duration);
        $this->duration_hours = $time[0];
        $this->duration_minutes = $time[1];
        $this->duration_seconds = $time[2];
    }
    
    protected function beforeValidate() {
        $this->Sound_Car_Fix_Duration = $this->duration_hours . ':' . $this->duration_minutes . ':' . $this->duration_seconds;
        return parent::beforeValidate();
    }
    
    protected function afterFind() {
        $this->setDuration();
        return parent::afterFind();
    }

}
