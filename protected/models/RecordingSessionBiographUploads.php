<?php

/**
 * This is the model class for table "{{recording_session_biograph_uploads}}".
 *
 * The followings are the available columns in table '{{recording_session_biograph_uploads}}':
 * @property integer $Rcd_Ses_Biogrph_Upl_Id
 * @property integer $Rcd_Ses_Biogrph_Id
 * @property string $Rcd_Ses_Biogrph_Upl_File
 * @property string $Rcd_Ses_Biogrph_Upl_Description
 * @property string $Created
 * @property string $Rowversion
 * @property integer $Created_By
 * @property integer $Updated_By
 *
 * The followings are the available model relations:
 * @property RecordingSessionBiography $rcdSesBiogrph
 */
class RecordingSessionBiographUploads extends RActiveRecord {

    const IMAGE_SIZE = 2;
    const ACCESS_TYPES = 'jpg,png,jpeg,gif';
    const ACCESS_TYPES_WID = 'jpeg|jpg|gif|png';
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{recording_session_biograph_uploads}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Rcd_Ses_Biogrph_Id', 'required'),
            array('Rcd_Ses_Biogrph_Id, Created_By, Updated_By', 'numerical', 'integerOnly' => true),
            array('Rcd_Ses_Biogrph_Upl_File', 'length', 'max' => 500),
            array('Rcd_Ses_Biogrph_Upl_File', 'file', 'types' => self::ACCESS_TYPES, 'allowEmpty' => true, 'maxSize' => 1024 * 1024 * self::IMAGE_SIZE, 'tooLarge' => 'File should be smaller than ' . self::IMAGE_SIZE . 'MB'),
            array('Rcd_Ses_Biogrph_Upl_Description, Created, Rowversion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Rcd_Ses_Biogrph_Upl_Id, Rcd_Ses_Biogrph_Id, Rcd_Ses_Biogrph_Upl_File, Rcd_Ses_Biogrph_Upl_Description, Created, Rowversion, Created_By, Updated_By', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'rcdSesBiogrph' => array(self::BELONGS_TO, 'RecordingSessionBiography', 'Rcd_Ses_Biogrph_Id'),
            'createdBy' => array(self::BELONGS_TO, 'User', 'Created_By'),
            'updatedBy' => array(self::BELONGS_TO, 'User', 'Updated_By'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Rcd_Ses_Biogrph_Upl_Id' => 'Rcd Ses Biogrph Upl',
            'Rcd_Ses_Biogrph_Id' => 'Rcd Ses Biogrph',
            'Rcd_Ses_Biogrph_Upl_File' => 'File',
            'Rcd_Ses_Biogrph_Upl_Description' => 'Description',
            'Created' => 'Created',
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

        $criteria->compare('Rcd_Ses_Biogrph_Upl_Id', $this->Rcd_Ses_Biogrph_Upl_Id);
        $criteria->compare('Rcd_Ses_Biogrph_Id', $this->Rcd_Ses_Biogrph_Id);
        $criteria->compare('Rcd_Ses_Biogrph_Upl_File', $this->Rcd_Ses_Biogrph_Upl_File, true);
        $criteria->compare('Rcd_Ses_Biogrph_Upl_Description', $this->Rcd_Ses_Biogrph_Upl_Description, true);
        $criteria->compare('Created', $this->Created, true);
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
     * @return RecordingSessionBiographUploads the static model class
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
                'fileField' => 'Rcd_Ses_Biogrph_Upl_File',
            )
        );
    }
}
