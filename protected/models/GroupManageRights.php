<?php

/**
 * This is the model class for table "{{group_manage_rights}}".
 *
 * The followings are the available columns in table '{{group_manage_rights}}':
 * @property integer $Group_Mnge_Rgt_Id
 * @property integer $Group_Id
 * @property integer $Group_Mnge_Society_Id
 * @property string $Group_Mnge_Entry_Date
 * @property string $Group_Mnge_Exit_Date
 * @property integer $Group_Mnge_Internal_Position_Id
 * @property string $Group_Mnge_Entry_Date_2
 * @property string $Group_Mnge_Exit_Date_2
 * @property integer $Group_Mnge_Region_Id
 * @property integer $Group_Mnge_Profession_Id
 * @property string $Group_Mnge_File
 * @property string $Group_Mnge_Duration
 * @property integer $Group_Mnge_Avl_Work_Cat_Id
 * @property integer $Group_Mnge_Type_Rght_Id
 * @property integer $Group_Mnge_Managed_Rights_Id
 * @property integer $Group_Mnge_Territories_Id
 *
 * The followings are the available model relations:
 * @property Group $group
 * @property MasterInternalPosition $groupMngeInternalPosition
 * @property MasterManagedRights $groupMngeManagedRights
 * @property MasterProfession $groupMngeProfession
 * @property MasterRegion $groupMngeRegion
 * @property Society $groupMngeSociety
 * @property MasterTerritories $groupMngeTerritories
 * @property MasterTypeRights $groupMngeTypeRght
 * @property MasterWorksCategory $groupMngeAvlWorkCat
 */
class GroupManageRights extends CActiveRecord {

public function init() {
        parent::init();
        if($this->isNewRecord){
            $this->Group_Mnge_Society_Id = DEFAULT_AUTHOR_MANAGED_RIGHTS_SOCIETY_ID;
            $this->Group_Mnge_Territories_Id = DEFAULT_AUTHOR_MANAGED_RIGHTS_TERRITORY_ID;
        }
    }
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{group_manage_rights}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Group_Id, Group_Mnge_Society_Id, Group_Mnge_Entry_Date, Group_Mnge_Internal_Position_Id, Group_Mnge_Entry_Date_2, Group_Mnge_Avl_Work_Cat_Id, Group_Mnge_Type_Rght_Id, Group_Mnge_Managed_Rights_Id, Group_Mnge_Territories_Id', 'required'),
            array('Group_Id, Group_Mnge_Society_Id, Group_Mnge_Internal_Position_Id, Group_Mnge_Region_Id, Group_Mnge_Profession_Id, Group_Mnge_Avl_Work_Cat_Id, Group_Mnge_Type_Rght_Id, Group_Mnge_Managed_Rights_Id, Group_Mnge_Territories_Id', 'numerical', 'integerOnly' => true),
            array('Group_Mnge_File', 'length', 'max' => 255),
            array('Group_Mnge_Duration', 'length', 'max' => 100),
            array('Group_Mnge_Exit_Date', 'compare', 'compareAttribute'=>'Group_Mnge_Entry_Date', 'allowEmpty' => true, 'operator'=>'>', 'message'=>'{attribute} must be greater than "{compareValue}".'),
            array('Group_Mnge_Exit_Date_2', 'compare', 'compareAttribute'=>'Group_Mnge_Entry_Date_2', 'allowEmpty' => true, 'operator'=>'>', 'message'=>'{attribute} must be greater than "{compareValue}".'),
            array('Group_Mnge_Exit_Date, Group_Mnge_Exit_Date_2', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Group_Mnge_Rgt_Id, Group_Id, Group_Mnge_Society_Id, Group_Mnge_Entry_Date, Group_Mnge_Exit_Date, Group_Mnge_Internal_Position_Id, Group_Mnge_Entry_Date_2, Group_Mnge_Exit_Date_2, Group_Mnge_Region_Id, Group_Mnge_Profession_Id, Group_Mnge_File, Group_Mnge_Duration, Group_Mnge_Avl_Work_Cat_Id, Group_Mnge_Type_Rght_Id, Group_Mnge_Managed_Rights_Id, Group_Mnge_Territories_Id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'group' => array(self::BELONGS_TO, 'Group', 'Group_Id'),
            'groupMngeInternalPosition' => array(self::BELONGS_TO, 'MasterInternalPosition', 'Group_Mnge_Internal_Position_Id'),
            'groupMngeManagedRights' => array(self::BELONGS_TO, 'MasterManagedRights', 'Group_Mnge_Managed_Rights_Id'),
            'groupMngeProfession' => array(self::BELONGS_TO, 'MasterProfession', 'Group_Mnge_Profession_Id'),
            'groupMngeRegion' => array(self::BELONGS_TO, 'MasterRegion', 'Group_Mnge_Region_Id'),
            'groupMngeSociety' => array(self::BELONGS_TO, 'Society', 'Group_Mnge_Society_Id'),
            'groupMngeTerritories' => array(self::BELONGS_TO, 'MasterTerritories', 'Group_Mnge_Territories_Id'),
            'groupMngeTypeRght' => array(self::BELONGS_TO, 'MasterTypeRights', 'Group_Mnge_Type_Rght_Id'),
            'groupMngeAvlWorkCat' => array(self::BELONGS_TO, 'MasterWorksCategory', 'Group_Mnge_Avl_Work_Cat_Id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Group_Mnge_Rgt_Id' => 'Group Mnge Rgt',
            'Group_Id' => 'Group',
            'Group_Mnge_Society_Id' => 'Society',
            'Group_Mnge_Entry_Date' => 'Start of mandate',
            'Group_Mnge_Exit_Date' => 'End of mandate',
            'Group_Mnge_Internal_Position_Id' => 'Internal Position',
            'Group_Mnge_Entry_Date_2' => 'Position Start',
            'Group_Mnge_Exit_Date_2' => 'Position End',
            'Group_Mnge_Region_Id' => 'Region',
            'Group_Mnge_Profession_Id' => 'Profession',
            'Group_Mnge_File' => 'File',
            'Group_Mnge_Duration' => 'Duration',
            'Group_Mnge_Avl_Work_Cat_Id' => 'Work Category',
            'Group_Mnge_Type_Rght_Id' => 'RightHolder Type',
            'Group_Mnge_Managed_Rights_Id' => 'Managed Rights',
            'Group_Mnge_Territories_Id' => 'Territories',
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

        $criteria->compare('Group_Mnge_Rgt_Id', $this->Group_Mnge_Rgt_Id);
        $criteria->compare('Group_Id', $this->Group_Id);
        $criteria->compare('Group_Mnge_Society_Id', $this->Group_Mnge_Society_Id);
        $criteria->compare('Group_Mnge_Entry_Date', $this->Group_Mnge_Entry_Date, true);
        $criteria->compare('Group_Mnge_Exit_Date', $this->Group_Mnge_Exit_Date, true);
        $criteria->compare('Group_Mnge_Internal_Position_Id', $this->Group_Mnge_Internal_Position_Id);
        $criteria->compare('Group_Mnge_Entry_Date_2', $this->Group_Mnge_Entry_Date_2, true);
        $criteria->compare('Group_Mnge_Exit_Date_2', $this->Group_Mnge_Exit_Date_2, true);
        $criteria->compare('Group_Mnge_Region_Id', $this->Group_Mnge_Region_Id);
        $criteria->compare('Group_Mnge_Profession_Id', $this->Group_Mnge_Profession_Id);
        $criteria->compare('Group_Mnge_File', $this->Group_Mnge_File, true);
        $criteria->compare('Group_Mnge_Duration', $this->Group_Mnge_Duration, true);
        $criteria->compare('Group_Mnge_Avl_Work_Cat_Id', $this->Group_Mnge_Avl_Work_Cat_Id);
        $criteria->compare('Group_Mnge_Type_Rght_Id', $this->Group_Mnge_Type_Rght_Id);
        $criteria->compare('Group_Mnge_Managed_Rights_Id', $this->Group_Mnge_Managed_Rights_Id);
        $criteria->compare('Group_Mnge_Territories_Id', $this->Group_Mnge_Territories_Id);

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
     * @return GroupManageRights the static model class
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
