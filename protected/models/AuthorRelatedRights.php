<?php

/**
 * This is the model class for table "{{author_related_rights}}".
 *
 * The followings are the available columns in table '{{author_related_rights}}':
 * @property integer $Auth_Rel_Rgt_Id
 * @property integer $Auth_Acc_Id
 * @property integer $Auth_Rel_Society_Id
 * @property string $Auth_Rel_Entry_Date
 * @property string $Auth_Rel_Exit_Date
 * @property integer $Auth_Rel_Internal_Position_Id
 * @property string $Auth_Rel_Entry_Date_2
 * @property string $Auth_Rel_Exit_Date_2
 * @property integer $Auth_Rel_Region_Id
 * @property integer $Auth_Rel_Profession_Id
 * @property string $Auth_Rel_File
 * @property string $Auth_Rel_Duration
 * @property integer $Auth_Rel_Avl_Work_Cat_Id
 * @property integer $Auth_Rel_Type_Rght_Id
 * @property integer $Auth_Rel_Managed_Rights_Id
 * @property integer $Auth_Rel_Territories_Id
 *
 * The followings are the available model relations:
 * @property AuthorAccount $authAcc
 * @property MasterInternalPosition $authRelInternalPosition
 * @property MasterManagedRights $authRelManagedRights
 * @property MasterProfession $authRelProfession
 * @property MasterRegion $authRelRegion
 * @property MasterTerritories $authRelTerritories
 * @property MasterTypeRights $authRelTypeRght
 * @property MasterWorksCategory $authRelAvlWorkCat
 */
class AuthorRelatedRights extends CActiveRecord {
    const FILE_SIZE = 10;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{author_related_rights}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Auth_Acc_Id, Auth_Rel_Society_Id, Auth_Rel_Entry_Date, Auth_Rel_Internal_Position_Id, Auth_Rel_Entry_Date_2, Auth_Rel_Avl_Work_Cat_Id, Auth_Rel_Type_Rght_Id, Auth_Rel_Managed_Rights_Id, Auth_Rel_Territories_Id', 'required'),
            array('Auth_Acc_Id, Auth_Rel_Society_Id, Auth_Rel_Internal_Position_Id, Auth_Rel_Region_Id, Auth_Rel_Profession_Id, Auth_Rel_Avl_Work_Cat_Id, Auth_Rel_Type_Rght_Id, Auth_Rel_Managed_Rights_Id, Auth_Rel_Territories_Id', 'numerical', 'integerOnly' => true),
            array('Auth_Rel_File', 'length', 'max' => 255),
            array('Auth_Rel_Duration', 'length', 'max' => 100),
            array('Auth_Rel_Exit_Date, Auth_Rel_Exit_Date_2', 'safe'),
            array('Auth_Rel_File', 'file', 'allowEmpty' => true, 'maxSize'=>1024 * 1024 * self::FILE_SIZE, 'tooLarge'=>'File should be smaller than '.self::FILE_SIZE.'MB'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Auth_Rel_Rgt_Id, Auth_Acc_Id, Auth_Rel_Society_Id, Auth_Rel_Entry_Date, Auth_Rel_Exit_Date, Auth_Rel_Internal_Position_Id, Auth_Rel_Entry_Date_2, Auth_Rel_Exit_Date_2, Auth_Rel_Region_Id, Auth_Rel_Profession_Id, Auth_Rel_File, Auth_Rel_Duration, Auth_Rel_Avl_Work_Cat_Id, Auth_Rel_Type_Rght_Id, Auth_Rel_Managed_Rights_Id, Auth_Rel_Territories_Id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'authAcc' => array(self::BELONGS_TO, 'AuthorAccount', 'Auth_Acc_Id'),
            'authRelInternalPosition' => array(self::BELONGS_TO, 'MasterInternalPosition', 'Auth_Rel_Internal_Position_Id'),
            'authRelManagedRights' => array(self::BELONGS_TO, 'MasterManagedRights', 'Auth_Rel_Managed_Rights_Id'),
            'authRelProfession' => array(self::BELONGS_TO, 'MasterProfession', 'Auth_Rel_Profession_Id'),
            'authRelRegion' => array(self::BELONGS_TO, 'MasterRegion', 'Auth_Rel_Region_Id'),
            'authRelTerritories' => array(self::BELONGS_TO, 'MasterTerritories', 'Auth_Rel_Territories_Id'),
            'authRelTypeRght' => array(self::BELONGS_TO, 'MasterTypeRights', 'Auth_Rel_Type_Rght_Id'),
            'authRelAvlWorkCat' => array(self::BELONGS_TO, 'MasterWorksCategory', 'Auth_Rel_Avl_Work_Cat_Id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Auth_Rel_Rgt_Id' => 'Auth Rel Rgt',
            'Auth_Acc_Id' => 'Auth Acc',
            'Auth_Rel_Society_Id' => 'Society',
            'Auth_Rel_Entry_Date' => 'Start of mandate',
            'Auth_Rel_Exit_Date' => 'End of mandate',
            'Auth_Rel_Internal_Position_Id' => 'Internal Position',
            'Auth_Rel_Entry_Date_2' => 'Position Start',
            'Auth_Rel_Exit_Date_2' => 'Position End',
            'Auth_Rel_Region_Id' => 'Region',
            'Auth_Rel_Profession_Id' => 'Profession',
            'Auth_Rel_File' => 'File',
            'Auth_Rel_Duration' => 'Duration',
            'Auth_Rel_Avl_Work_Cat_Id' => 'Work Category',
            'Auth_Rel_Type_Rght_Id' => 'Type of Right',
            'Auth_Rel_Managed_Rights_Id' => 'Managed Rights',
            'Auth_Rel_Territories_Id' => 'Territories',
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

        $criteria->compare('Auth_Rel_Rgt_Id', $this->Auth_Rel_Rgt_Id);
        $criteria->compare('Auth_Acc_Id', $this->Auth_Acc_Id);
        $criteria->compare('Auth_Rel_Society_Id', $this->Auth_Rel_Society_Id);
        $criteria->compare('Auth_Rel_Entry_Date', $this->Auth_Rel_Entry_Date, true);
        $criteria->compare('Auth_Rel_Exit_Date', $this->Auth_Rel_Exit_Date, true);
        $criteria->compare('Auth_Rel_Internal_Position_Id', $this->Auth_Rel_Internal_Position_Id);
        $criteria->compare('Auth_Rel_Entry_Date_2', $this->Auth_Rel_Entry_Date_2, true);
        $criteria->compare('Auth_Rel_Exit_Date_2', $this->Auth_Rel_Exit_Date_2, true);
        $criteria->compare('Auth_Rel_Region_Id', $this->Auth_Rel_Region_Id);
        $criteria->compare('Auth_Rel_Profession_Id', $this->Auth_Rel_Profession_Id);
        $criteria->compare('Auth_Rel_File', $this->Auth_Rel_File, true);
        $criteria->compare('Auth_Rel_Duration', $this->Auth_Rel_Duration, true);
        $criteria->compare('Auth_Rel_Avl_Work_Cat_Id', $this->Auth_Rel_Avl_Work_Cat_Id);
        $criteria->compare('Auth_Rel_Type_Rght_Id', $this->Auth_Rel_Type_Rght_Id);
        $criteria->compare('Auth_Rel_Managed_Rights_Id', $this->Auth_Rel_Managed_Rights_Id);
        $criteria->compare('Auth_Rel_Territories_Id', $this->Auth_Rel_Territories_Id);

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
     * @return AuthorRelatedRights the static model class
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
                'fileField' => 'Auth_Rel_File',
            )
        );
    }
}
