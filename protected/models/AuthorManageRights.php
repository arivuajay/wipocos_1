<?php

/**
 * This is the model class for table "{{author_manage_rights}}".
 *
 * The followings are the available columns in table '{{author_manage_rights}}':
 * @property integer $Auth_Mnge_Rgt_Id
 * @property integer $Auth_Acc_Id
 * @property integer $Auth_Mnge_Society_Id
 * @property string $Auth_Mnge_Entry_Date
 * @property string $Auth_Mnge_Exit_Date
 * @property integer $Auth_Mnge_Internal_Position_Id
 * @property string $Auth_Mnge_Entry_Date_2
 * @property string $Auth_Mnge_Exit_Date_2
 * @property integer $Auth_Mnge_Region_Id
 * @property integer $Auth_Mnge_Profession_Id
 * @property string $Auth_Mnge_File
 * @property string $Auth_Mnge_Duration
 * @property integer $Auth_Mnge_Avl_Work_Cat_Id
 * @property integer $Auth_Mnge_Type_Rght_Id
 * @property integer $Auth_Mnge_Managed_Rights_Id
 * @property integer $Auth_Mnge_Territories_Id
 *
 * The followings are the available model relations:
 * @property Society $authMngeSociety
 * @property AuthorAccount $authAcc
 * @property MasterInternalPosition $authMngeInternalPosition
 * @property MasterManagedRights $authMngeManagedRights
 * @property MasterProfession $authMngeProfession
 * @property MasterRegion $authMngeRegion
 * @property MasterTerritories $authMngeTerritories
 * @property MasterTypeRights $authMngeTypeRght
 * @property MasterWorksCategory $authMngeAvlWorkCat
 */
class AuthorManageRights extends CActiveRecord {

    public function init() {
        parent::init();
        if($this->isNewRecord){
            $this->Auth_Mnge_Type_Rght_Id = DEFAULT_AUTHOR_RIGHT_HOLDER_ID;
            $this->Auth_Mnge_Society_Id = DEFAULT_SOCIETY_ID;
            $this->Auth_Mnge_Territories_Id = DEFAULT_AUTHOR_MANAGED_RIGHTS_TERRITORY_ID;
        }
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{author_manage_rights}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Auth_Acc_Id, Auth_Mnge_Society_Id, Auth_Mnge_Entry_Date, Auth_Mnge_Internal_Position_Id, Auth_Mnge_Entry_Date_2, Auth_Mnge_Avl_Work_Cat_Id, Auth_Mnge_Type_Rght_Id, Auth_Mnge_Managed_Rights_Id, Auth_Mnge_Territories_Id', 'required'),
            array('Auth_Acc_Id, Auth_Mnge_Society_Id, Auth_Mnge_Internal_Position_Id, Auth_Mnge_Region_Id, Auth_Mnge_Profession_Id, Auth_Mnge_Avl_Work_Cat_Id, Auth_Mnge_Type_Rght_Id, Auth_Mnge_Managed_Rights_Id, Auth_Mnge_Territories_Id', 'numerical', 'integerOnly' => true),
            array('Auth_Mnge_File', 'length', 'max' => 255),
            array('Auth_Mnge_Duration', 'length', 'max' => 100),
            array('Auth_Mnge_Exit_Date', 'compare', 'compareAttribute'=>'Auth_Mnge_Entry_Date', 'allowEmpty' => true, 'operator'=>'>', 'message'=>'{attribute} must be greater than "{compareValue}".'),
            array('Auth_Mnge_Exit_Date_2', 'compare', 'compareAttribute'=>'Auth_Mnge_Entry_Date_2', 'allowEmpty' => true, 'operator'=>'>', 'message'=>'{attribute} must be greater than "{compareValue}".'),
            array('Auth_Mnge_Exit_Date, Auth_Mnge_Exit_Date_2', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Auth_Mnge_Rgt_Id, Auth_Acc_Id, Auth_Mnge_Society_Id, Auth_Mnge_Entry_Date, Auth_Mnge_Exit_Date, Auth_Mnge_Internal_Position_Id, Auth_Mnge_Entry_Date_2, Auth_Mnge_Exit_Date_2, Auth_Mnge_Region_Id, Auth_Mnge_Profession_Id, Auth_Mnge_File, Auth_Mnge_Duration, Auth_Mnge_Avl_Work_Cat_Id, Auth_Mnge_Type_Rght_Id, Auth_Mnge_Managed_Rights_Id, Auth_Mnge_Territories_Id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'authMngeSociety' => array(self::BELONGS_TO, 'Society', 'Auth_Mnge_Society_Id'),
            'authAcc' => array(self::BELONGS_TO, 'AuthorAccount', 'Auth_Acc_Id'),
            'authMngeInternalPosition' => array(self::BELONGS_TO, 'MasterInternalPosition', 'Auth_Mnge_Internal_Position_Id'),
            'authMngeManagedRights' => array(self::BELONGS_TO, 'MasterManagedRights', 'Auth_Mnge_Managed_Rights_Id'),
            'authMngeProfession' => array(self::BELONGS_TO, 'MasterProfession', 'Auth_Mnge_Profession_Id'),
            'authMngeRegion' => array(self::BELONGS_TO, 'MasterRegion', 'Auth_Mnge_Region_Id'),
            'authMngeTerritories' => array(self::BELONGS_TO, 'MasterTerritories', 'Auth_Mnge_Territories_Id'),
            'authMngeTypeRght' => array(self::BELONGS_TO, 'MasterTypeRights', 'Auth_Mnge_Type_Rght_Id'),
            'authMngeAvlWorkCat' => array(self::BELONGS_TO, 'MasterWorksCategory', 'Auth_Mnge_Avl_Work_Cat_Id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Auth_Mnge_Rgt_Id' => 'Id',
            'Auth_Acc_Id' => 'Auth Acc',
            'Auth_Mnge_Society_Id' => 'Society',
            'Auth_Mnge_Entry_Date' => 'Start of mandate',
            'Auth_Mnge_Exit_Date' => 'End of mandate',
            'Auth_Mnge_Internal_Position_Id' => 'Internal Position',
            'Auth_Mnge_Entry_Date_2' => 'Position Start',
            'Auth_Mnge_Exit_Date_2' => 'Position End',
            'Auth_Mnge_Region_Id' => 'Region',
            'Auth_Mnge_Profession_Id' => 'Profession',
            'Auth_Mnge_File' => 'Physical File Location',
            'Auth_Mnge_Duration' => 'Duration',
            'Auth_Mnge_Avl_Work_Cat_Id' => 'Work Category',
            'Auth_Mnge_Type_Rght_Id' => 'RightHolder Type',
            'Auth_Mnge_Managed_Rights_Id' => 'Managed Rights',
            'Auth_Mnge_Territories_Id' => 'Territories',
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

        $criteria->compare('Auth_Mnge_Rgt_Id', $this->Auth_Mnge_Rgt_Id);
        $criteria->compare('Auth_Acc_Id', $this->Auth_Acc_Id);
        $criteria->compare('Auth_Mnge_Society_Id', $this->Auth_Mnge_Society_Id);
        $criteria->compare('Auth_Mnge_Entry_Date', $this->Auth_Mnge_Entry_Date, true);
        $criteria->compare('Auth_Mnge_Exit_Date', $this->Auth_Mnge_Exit_Date, true);
        $criteria->compare('Auth_Mnge_Internal_Position_Id', $this->Auth_Mnge_Internal_Position_Id);
        $criteria->compare('Auth_Mnge_Entry_Date_2', $this->Auth_Mnge_Entry_Date_2, true);
        $criteria->compare('Auth_Mnge_Exit_Date_2', $this->Auth_Mnge_Exit_Date_2, true);
        $criteria->compare('Auth_Mnge_Region_Id', $this->Auth_Mnge_Region_Id);
        $criteria->compare('Auth_Mnge_Profession_Id', $this->Auth_Mnge_Profession_Id);
        $criteria->compare('Auth_Mnge_File', $this->Auth_Mnge_File, true);
        $criteria->compare('Auth_Mnge_Duration', $this->Auth_Mnge_Duration, true);
        $criteria->compare('Auth_Mnge_Avl_Work_Cat_Id', $this->Auth_Mnge_Avl_Work_Cat_Id);
        $criteria->compare('Auth_Mnge_Type_Rght_Id', $this->Auth_Mnge_Type_Rght_Id);
        $criteria->compare('Auth_Mnge_Managed_Rights_Id', $this->Auth_Mnge_Managed_Rights_Id);
        $criteria->compare('Auth_Mnge_Territories_Id', $this->Auth_Mnge_Territories_Id);

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
     * @return AuthorManageRights the static model class
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
                'fileField' => 'Auth_Mnge_File',
            )
        );
    }

}
