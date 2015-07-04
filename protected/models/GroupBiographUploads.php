<?php

/**
 * This is the model class for table "{{group_biograph_uploads}}".
 *
 * The followings are the available columns in table '{{group_biograph_uploads}}':
 * @property integer $Group_Biogrph_Upl_Id
 * @property integer $Group_Biogrph_Id
 * @property string $Group_Biogrph_Upl_File
 * @property string $Created
 * @property string $Rowversion
 *
 * The followings are the available model relations:
 * @property GroupBiography $groupBiogrph
 */
class GroupBiographUploads extends RActiveRecord {

    const IMAGE_SIZE = 2;
    const ACCESS_TYPES = 'jpg,png,jpeg,gif';
    const ACCESS_TYPES_WID = 'jpeg|jpg|gif|png';
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{group_biograph_uploads}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Group_Biogrph_Id', 'required'),
            array('Group_Biogrph_Id, Created_By, Updated_By', 'numerical', 'integerOnly' => true),
            array('Group_Biogrph_Upl_File', 'length', 'max' => 500),
            array('Group_Biogrph_Upl_File', 'file', 'types'=> self::ACCESS_TYPES, 'allowEmpty' => true, 'maxSize' => 1024 * 1024 * self::IMAGE_SIZE, 'tooLarge' => 'File should be smaller than ' . self::IMAGE_SIZE . 'MB'),
            array('Created, Rowversion, Group_Biogrph_Upl_Description, Created_Date, Rowversion, Created_By, Updated_By', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Group_Biogrph_Upl_Id, Group_Biogrph_Id, Group_Biogrph_Upl_File, Created, Rowversion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'groupBiogrph' => array(self::BELONGS_TO, 'GroupBiography', 'Group_Biogrph_Id'),
            'createdBy' => array(self::BELONGS_TO, 'User', 'Created_By'),
            'updatedBy' => array(self::BELONGS_TO, 'User', 'Updated_By'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Group_Biogrph_Upl_Id' => 'Group Biogrph Upl',
            'Group_Biogrph_Id' => 'Group Biogrph',
            'Group_Biogrph_Upl_File' => 'File',
            'Group_Biogrph_Upl_Description' => 'Description',
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

        $criteria->compare('Group_Biogrph_Upl_Id', $this->Group_Biogrph_Upl_Id);
        $criteria->compare('Group_Biogrph_Id', $this->Group_Biogrph_Id);
        $criteria->compare('Group_Biogrph_Upl_File', $this->Group_Biogrph_Upl_File, true);
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
     * @return GroupBiographUploads the static model class
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
                'fileField' => 'Group_Biogrph_Upl_File',
            )
        );
    }
}
