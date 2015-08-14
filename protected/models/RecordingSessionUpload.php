<?php

/**
 * This is the model class for table "{{recording_session_upload}}".
 *
 * The followings are the available columns in table '{{recording_session_upload}}':
 * @property integer $Rcd_Ses_Upl_Id
 * @property integer $Rcd_Ses_Id
 * @property string $Rcd_Ses_Upl_Doc_Name
 * @property string $Rcd_Ses_Upl_File
 * @property integer $Created_By
 * @property integer $Updated_By
 * @property string $Created_Date
 * @property string $Rowversion
 *
 * The followings are the available model relations:
 * @property RecordingSession $rcdSes
 */
class RecordingSessionUpload extends RActiveRecord {

    const FILE_SIZE = 10;
    const ALLOWED_TYPES = 'jpg,jpeg,pdf';

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{recording_session_upload}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Rcd_Ses_Id, Rcd_Ses_Upl_Doc_Name', 'required'),
            array('Rcd_Ses_Id, Created_By, Updated_By', 'numerical', 'integerOnly' => true),
            array('Rcd_Ses_Upl_Doc_Name', 'length', 'max' => 255),
            array('Rcd_Ses_Upl_File', 'length', 'max' => 1000),
            array('Rcd_Ses_Upl_File', 'file', 'allowEmpty' => true,  'types'=> self::ALLOWED_TYPES, 'maxSize' => 1024 * 1024 * self::FILE_SIZE, 'tooLarge' => 'File should be smaller than ' . self::FILE_SIZE . 'MB'),
            array('Rcd_Ses_Upl_File', 'file', 'allowEmpty' => false, 'on' => 'create'),
            array('Rcd_Ses_Upl_File', 'file', 'allowEmpty' => true, 'on' => 'update'),
            array('Created_Date, Rowversion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Rcd_Ses_Upl_Id, Rcd_Ses_Id, Rcd_Ses_Upl_Doc_Name, Rcd_Ses_Upl_File, Created_By, Updated_By, Created_Date, Rowversion', 'safe', 'on' => 'search'),
        );
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
            'Rcd_Ses_Upl_Id' => 'Rcd Ses Upl',
            'Rcd_Ses_Id' => 'Rcd Ses',
            'Rcd_Ses_Upl_Doc_Name' => 'Document Name',
            'Rcd_Ses_Upl_File' => 'File Upload',
            'Created_By' => 'Created By',
            'Updated_By' => 'Updated By',
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

        $criteria->compare('Rcd_Ses_Upl_Id', $this->Rcd_Ses_Upl_Id);
        $criteria->compare('Rcd_Ses_Id', $this->Rcd_Ses_Id);
        $criteria->compare('Rcd_Ses_Upl_Doc_Name', $this->Rcd_Ses_Upl_Doc_Name, true);
        $criteria->compare('Rcd_Ses_Upl_File', $this->Rcd_Ses_Upl_File, true);
        $criteria->compare('Created_By', $this->Created_By);
        $criteria->compare('Updated_By', $this->Updated_By);
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
     * @return RecordingSessionUpload the static model class
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

    public function behaviors() {
        return array(
            'NUploadFile' => array(
                'class' => 'ext.nuploadfile.NUploadFile',
                'fileField' => 'Rcd_Ses_Upl_File',
            )
        );
    }
}
