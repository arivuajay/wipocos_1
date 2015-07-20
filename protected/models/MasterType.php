<?php

/**
 * This is the model class for table "{{master_type}}".
 *
 * The followings are the available columns in table '{{master_type}}':
 * @property integer $Master_Type_Id
 * @property string $Type_Name
 * @property string $Active
 * @property string $Created_Date
 * @property string $Rowversion
 */
class MasterType extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{master_type}}';
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
            array('Type_Name', 'required'),
            array('Type_Name', 'length', 'max' => 255),
            array('Active', 'length', 'max' => 1),
            array('Created_Date, Rowversion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Master_Type_Id, Type_Name, Active, Created_Date, Rowversion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'recordings' => array(self::HAS_MANY, 'Recording', 'Rcd_Type_Id'),
            'recordingSessions' => array(self::HAS_MANY, 'RecordingSession', 'Rcd_Ses_Type_Id'),
            'recordingSessionSubtitles' => array(self::HAS_MANY, 'RecordingSessionSubtitle', 'Rcd_Ses_Subtitle_Type_Id'),
            'recordingSubtitles' => array(self::HAS_MANY, 'RecordingSubtitle', 'Rcd_Subtitle_Type_Id'),
            'societies' => array(self::HAS_MANY, 'Society', 'Society_Type_Id'),
            'soundCarriers' => array(self::HAS_MANY, 'SoundCarrier', 'Sound_Car_Type_Id'),
            'soundCarrierSubtitles' => array(self::HAS_MANY, 'SoundCarrierSubtitle', 'Sound_Car_Subtitle_Type_Id'),
            'works' => array(self::HAS_MANY, 'Work', 'Work_Type_Id'),
            'workSubtitles' => array(self::HAS_MANY, 'WorkSubtitle', 'Work_Subtitle_Type_Id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Master_Type_Id' => 'Master Type',
            'Type_Name' => 'Type Name',
            'Active' => 'Active',
            'Created_Date' => 'Created Date',
            'Rowversion' => 'Rowversion',
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

        $criteria->compare('Master_Type_Id', $this->Master_Type_Id);
        $criteria->compare('Type_Name', $this->Type_Name, true);
        $criteria->compare('Active', $this->Active, true);
        $criteria->compare('Created_Date', $this->Created_Date, true);
        $criteria->compare('Rowversion', $this->Rowversion, true);

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
     * @return MasterType the static model class
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
        $relations = array('recordings', 'recordingSessions', 'recordingSessionSubtitles', 'recordingSubtitles', 'soundCarriers',
            'soundCarrierSubtitles', 'works', 'workSubtitles');
        
        $validate = false;
        if(MASTER_EDIT_VALIDATION){
            foreach ($relations as $key => $relation) {
                if(!empty($this->$relation)){
                    $validate = true;
                    break;
                }
            }
            $relation = BaseInflector::camel2words($relation, ' ');
            if($validate)
                $this->addError('Type_Name', "This Type is already linked with {$relation}. So you can't Edit this record.");
        }
        return parent::beforeValidate();
    }
}
