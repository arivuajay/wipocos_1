<?php

/**
 * This is the model class for table "{{distribution_logsheet_list}}".
 *
 * The followings are the available columns in table '{{distribution_logsheet_list}}':
 * @property integer $Log_List_Id
 * @property integer $Log_Id
 * @property string $Log_List_Record_GUID
 * @property string $Log_List_Duration
 * @property integer $Log_List_Factor_Id
 * @property string $Log_List_Coefficient
 * @property string $Log_List_Date
 * @property string $Log_List_Event
 * @property integer $Log_List_Seq_Number
 * @property string $Created_Date
 * @property string $Rowversion
 * @property integer $Created_By
 * @property integer $Updated_By
 *
 * The followings are the available model relations:
 * @property MasterFactor $logListFactor
 * @property DistributionLogsheet $log
 */
class DistributionLogsheetList extends RActiveRecord {

    public $duration_hours;
    public $duration_minutes;
    public $duration_seconds;
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{distribution_logsheet_list}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Log_Id, Log_List_Record_GUID, Log_List_Date', 'required'),
            array('Log_Id, Log_List_Factor_Id, Log_List_Seq_Number, Created_By, Updated_By', 'numerical', 'integerOnly' => true),
            array('Log_List_Record_GUID', 'length', 'max' => 50),
            array('Log_List_Coefficient', 'length', 'max' => 10),
            array('Log_List_Event', 'length', 'max' => 100),
            array('Log_List_Duration, Created_Date, Rowversion', 'safe'),
            array('duration_minutes, duration_seconds', 'numerical', 'min' => 0, 'max' => 59),
            array('duration_hours', 'numerical', 'min' => 0),
            array('duration_hours, duration_minutes, duration_seconds', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Log_List_Id, Log_Id, Log_List_Record_GUID, Log_List_Duration, Log_List_Factor_Id, Log_List_Coefficient, Log_List_Date, Log_List_Event, Log_List_Seq_Number, Created_Date, Rowversion, Created_By, Updated_By', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'logListFactor' => array(self::BELONGS_TO, 'MasterFactor', 'Log_List_Factor_Id'),
            'log' => array(self::BELONGS_TO, 'DistributionLogsheet', 'Log_Id'),
            'createdBy' => array(self::BELONGS_TO, 'User', 'Created_By'),
            'updatedBy' => array(self::BELONGS_TO, 'User', 'Updated_By'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Log_List_Id' => 'Log List',
            'Log_Id' => 'Log',
            'Log_List_Record_GUID' => 'Log List Record Guid',
            'Log_List_Duration' => 'Log List Duration',
            'Log_List_Factor_Id' => 'Log List Factor',
            'Log_List_Coefficient' => 'Log List Coefficient',
            'Log_List_Date' => 'Log List Date',
            'Log_List_Event' => 'Log List Event',
            'Log_List_Seq_Number' => 'Log List Seq Number',
            'Created_Date' => 'Created Date',
            'Rowversion' => 'Rowversion',
            'Created_By' => 'Created By',
            'Updated_By' => 'Updated By',
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

        $criteria->compare('Log_List_Id', $this->Log_List_Id);
        $criteria->compare('Log_Id', $this->Log_Id);
        $criteria->compare('Log_List_Record_GUID', $this->Log_List_Record_GUID, true);
        $criteria->compare('Log_List_Duration', $this->Log_List_Duration, true);
        $criteria->compare('Log_List_Factor_Id', $this->Log_List_Factor_Id);
        $criteria->compare('Log_List_Coefficient', $this->Log_List_Coefficient, true);
        $criteria->compare('Log_List_Date', $this->Log_List_Date, true);
        $criteria->compare('Log_List_Event', $this->Log_List_Event, true);
        $criteria->compare('Log_List_Seq_Number', $this->Log_List_Seq_Number);
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
     * @return DistributionLogsheetList the static model class
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
        $time = explode(':', $this->Log_List_Duration);
        $this->duration_hours = $time[0];
        $this->duration_minutes = $time[1];
        $this->duration_seconds = $time[2];
    }
    
    protected function afterFind() {
        $this->setDuration();
        return parent::afterFind();
    }
}
