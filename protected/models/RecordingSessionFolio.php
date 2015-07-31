<?php

/**
 * This is the model class for table "{{recording_session_folio}}".
 *
 * The followings are the available columns in table '{{recording_session_folio}}':
 * @property integer $Rcd_Ses_Folio_Id
 * @property integer $Rcd_Ses_Id
 * @property integer $Rcd_Ses_Folio_Name
 * @property string $Created_Date
 * @property string $Rowversion
 * @property integer $Created_By
 * @property integer $Updated_By
 *
 * The followings are the available model relations:
 * @property RecordingSession $rcdSes
 */
class RecordingSessionFolio extends RActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{recording_session_folio}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Rcd_Ses_Id, Rcd_Ses_Folio_Name', 'required'),
            array('Rcd_Ses_Id, Rcd_Ses_Folio_Name, Created_By, Updated_By', 'numerical', 'integerOnly' => true),
//            array('Rcd_Ses_Folio_Name', 'unique'),
//            array('Rcd_Ses_Folio_Name', 'unique',
//                'criteria' => array(
//                    'condition' => 'Rcd_Ses_Id= :Rcd_Ses_Id',
//                    'params' => array(':Rcd_Ses_Id' => $this->Rcd_Ses_Id))),
            array('Rcd_Ses_Folio_Name', 'uniqueFolio'),
            array('Created_Date, Rowversion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Rcd_Ses_Folio_Id, Rcd_Ses_Id, Rcd_Ses_Folio_Name, Created_Date, Rowversion, Created_By, Updated_By', 'safe', 'on' => 'search'),
        );
    }

    public function uniqueFolio($attribute, $params) {
        if ($this->isNewRecord) {
            $folis_count = self::model()->countByAttributes(array('Rcd_Ses_Id' => $this->Rcd_Ses_Id, 'Rcd_Ses_Folio_Name' => $this->Rcd_Ses_Folio_Name));
        } else {
            $folis_count = self::model()->count("Rcd_Ses_Folio_Id != :folio_id And Rcd_Ses_Folio_Name = :folio_name And Rcd_Ses_Id = :rcd_id", array(':folio_id' => $this->Rcd_Ses_Folio_Id, ':folio_name' => $this->Rcd_Ses_Folio_Name, ':rcd_id' => $this->Rcd_Ses_Id));
        }
        if($folis_count > 0){
            $this->addError($attribute, "This Folio name '{$this->Rcd_Ses_Folio_Name}' already Exists.");
        }
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
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
            'Rcd_Ses_Folio_Id' => 'Rcd Ses Folio',
            'Rcd_Ses_Id' => 'Rcd Ses',
            'Rcd_Ses_Folio_Name' => 'Folio',
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

        $criteria->compare('Rcd_Ses_Folio_Id', $this->Rcd_Ses_Folio_Id);
        $criteria->compare('Rcd_Ses_Id', $this->Rcd_Ses_Id);
        $criteria->compare('Rcd_Ses_Folio_Name', $this->Rcd_Ses_Folio_Name);
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
     * @return RecordingSessionFolio the static model class
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
