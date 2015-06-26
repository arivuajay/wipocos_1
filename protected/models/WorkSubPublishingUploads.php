<?php

/**
 * This is the model class for table "{{work_sub_publishing_uploads}}".
 *
 * The followings are the available columns in table '{{work_sub_publishing_uploads}}':
 * @property integer $Work_Sub_Upl_Id
 * @property integer $Work_Sub_Id
 * @property string $Work_Sub_Upl_Name
 * @property string $Work_Sub_Upl_File
 * @property string $Work_Sub_Upl_Description
 * @property string $Created
 * @property string $Rowversion
 *
 * The followings are the available model relations:
 * @property WorkSubPublishing $workSub
 */
class WorkSubPublishingUploads extends CActiveRecord {

    const FILE_SIZE = 1;
    const ACCESS_TYPE = 'pdf,doc,jpg';
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{work_sub_publishing_uploads}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Work_Sub_Id, Work_Sub_Upl_Name', 'required'),
            array('Work_Sub_Id', 'numerical', 'integerOnly' => true),
            array('Work_Sub_Upl_Name', 'length', 'max' => 255),
            array('Work_Sub_Upl_File', 'length', 'max' => 500),
            array('Work_Sub_Upl_File', 'file', 'types'=>self::ACCESS_TYPE, 'allowEmpty' => true, 'maxSize' => 1024 * 1024 * self::FILE_SIZE, 'tooLarge' => 'File should be smaller than ' . self::FILE_SIZE . 'MB', 'on' => 'update'),
            array('Work_Sub_Upl_File', 'file', 'types'=>self::ACCESS_TYPE, 'allowEmpty' => false, 'maxSize' => 1024 * 1024 * self::FILE_SIZE, 'tooLarge' => 'File should be smaller than ' . self::FILE_SIZE . 'MB', 'on' => 'create'),
            array('Rowversion, Work_Sub_Upl_Name, Work_Sub_Upl_Description', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Work_Sub_Upl_Id, Work_Sub_Id, Work_Sub_Upl_Name, Work_Sub_Upl_File, Created, Rowversion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'workSub' => array(self::BELONGS_TO, 'WorkSubPublishing', 'Work_Sub_Id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Work_Sub_Upl_Id' => 'Work Sub Upl',
            'Work_Sub_Id' => 'Work Sub',
            'Work_Sub_Upl_Name' => 'Name',
            'Work_Sub_Upl_Description' => 'Description',
            'Work_Sub_Upl_File' => 'File',
            'Created' => 'Created',
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

        $criteria->compare('Work_Sub_Upl_Id', $this->Work_Sub_Upl_Id);
        $criteria->compare('Work_Sub_Id', $this->Work_Sub_Id);
        $criteria->compare('Work_Sub_Upl_Name', $this->Work_Sub_Upl_Name, true);
        $criteria->compare('Work_Sub_Upl_File', $this->Work_Sub_Upl_File, true);
        $criteria->compare('Created', $this->Created, true);
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
     * @return WorkSubPublishingUploads the static model class
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
                'fileField' => 'Work_Sub_Upl_File',
            )
        );
    }
}
