<?php

/**
 * This is the model class for table "{{publisher_group_manage_rights}}".
 *
 * The followings are the available columns in table '{{publisher_group_manage_rights}}':
 * @property integer $Pub_Group_Mnge_Rgt_Id
 * @property integer $Pub_Group_Id
 * @property integer $Pub_Group_Mnge_Society_Id
 * @property string $Pub_Group_Mnge_Entry_Date
 * @property string $Pub_Group_Mnge_Exit_Date
 * @property integer $Pub_Group_Mnge_Internal_Position_Id
 * @property string $Pub_Group_Mnge_Entry_Date_2
 * @property string $Pub_Group_Mnge_Exit_Date_2
 * @property integer $Pub_Group_Mnge_Region_Id
 * @property integer $Pub_Group_Mnge_Profession_Id
 * @property string $Pub_Group_Mnge_File
 * @property string $Pub_Group_Mnge_Duration
 * @property integer $Pub_Group_Mnge_Avl_Work_Cat_Id
 * @property integer $Pub_Group_Mnge_Type_Rght_Id
 * @property integer $Pub_Group_Mnge_Managed_Rights_Id
 * @property integer $Pub_Group_Mnge_Territories_Id
 * @property string $Created_Date
 * @property string $Rowversion
 *
 * The followings are the available model relations:
 * @property PublisherGroup $pubGroup
 * @property MasterInternalPosition $pubGroupMngeInternalPosition
 * @property MasterManagedRights $pubGroupMngeManagedRights
 * @property MasterProfession $pubGroupMngeProfession
 * @property MasterRegion $pubGroupMngeRegion
 * @property Society $pubGroupMngeSociety
 * @property MasterTerritories $pubGroupMngeTerritories
 * @property MasterTypeRights $pubGroupMngeTypeRght
 * @property MasterWorksCategory $pubGroupMngeAvlWorkCat
 */
class PublisherGroupManageRights extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{publisher_group_manage_rights}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Pub_Group_Id, Pub_Group_Mnge_Society_Id, Pub_Group_Mnge_Entry_Date, Pub_Group_Mnge_Internal_Position_Id, Pub_Group_Mnge_Entry_Date_2, Pub_Group_Mnge_Avl_Work_Cat_Id, Pub_Group_Mnge_Type_Rght_Id, Pub_Group_Mnge_Managed_Rights_Id, Pub_Group_Mnge_Territories_Id', 'required'),
            array('Pub_Group_Id, Pub_Group_Mnge_Society_Id, Pub_Group_Mnge_Internal_Position_Id, Pub_Group_Mnge_Region_Id, Pub_Group_Mnge_Profession_Id, Pub_Group_Mnge_Avl_Work_Cat_Id, Pub_Group_Mnge_Type_Rght_Id, Pub_Group_Mnge_Managed_Rights_Id, Pub_Group_Mnge_Territories_Id', 'numerical', 'integerOnly' => true),
            array('Pub_Group_Mnge_File', 'length', 'max' => 255),
            array('Pub_Group_Mnge_Duration', 'length', 'max' => 100),
            array('Pub_Group_Mnge_Exit_Date, Pub_Group_Mnge_Exit_Date_2, Created_Date, Rowversion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Pub_Group_Mnge_Rgt_Id, Pub_Group_Id, Pub_Group_Mnge_Society_Id, Pub_Group_Mnge_Entry_Date, Pub_Group_Mnge_Exit_Date, Pub_Group_Mnge_Internal_Position_Id, Pub_Group_Mnge_Entry_Date_2, Pub_Group_Mnge_Exit_Date_2, Pub_Group_Mnge_Region_Id, Pub_Group_Mnge_Profession_Id, Pub_Group_Mnge_File, Pub_Group_Mnge_Duration, Pub_Group_Mnge_Avl_Work_Cat_Id, Pub_Group_Mnge_Type_Rght_Id, Pub_Group_Mnge_Managed_Rights_Id, Pub_Group_Mnge_Territories_Id, Created_Date, Rowversion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'pubGroup' => array(self::BELONGS_TO, 'PublisherGroup', 'Pub_Group_Id'),
            'pubGroupMngeInternalPosition' => array(self::BELONGS_TO, 'MasterInternalPosition', 'Pub_Group_Mnge_Internal_Position_Id'),
            'pubGroupMngeManagedRights' => array(self::BELONGS_TO, 'MasterManagedRights', 'Pub_Group_Mnge_Managed_Rights_Id'),
            'pubGroupMngeProfession' => array(self::BELONGS_TO, 'MasterProfession', 'Pub_Group_Mnge_Profession_Id'),
            'pubGroupMngeRegion' => array(self::BELONGS_TO, 'MasterRegion', 'Pub_Group_Mnge_Region_Id'),
            'pubGroupMngeSociety' => array(self::BELONGS_TO, 'Society', 'Pub_Group_Mnge_Society_Id'),
            'pubGroupMngeTerritories' => array(self::BELONGS_TO, 'MasterTerritories', 'Pub_Group_Mnge_Territories_Id'),
            'pubGroupMngeTypeRght' => array(self::BELONGS_TO, 'MasterTypeRights', 'Pub_Group_Mnge_Type_Rght_Id'),
            'pubGroupMngeAvlWorkCat' => array(self::BELONGS_TO, 'MasterWorksCategory', 'Pub_Group_Mnge_Avl_Work_Cat_Id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Pub_Group_Mnge_Rgt_Id' => 'Rgt',
            'Pub_Group_Id' => 'Group',
            'Pub_Group_Mnge_Society_Id' => 'Society',
            'Pub_Group_Mnge_Entry_Date' => 'Start of mandate',
            'Pub_Group_Mnge_Exit_Date' => 'End of mandate',
            'Pub_Group_Mnge_Internal_Position_Id' => 'Internal Position',
            'Pub_Group_Mnge_Entry_Date_2' => 'Position Start',
            'Pub_Group_Mnge_Exit_Date_2' => 'Position End',
            'Pub_Group_Mnge_Region_Id' => 'Region',
            'Pub_Group_Mnge_Profession_Id' => 'Profession',
            'Pub_Group_Mnge_File' => 'Physical File Location',
            'Pub_Group_Mnge_Duration' => 'Duration',
            'Pub_Group_Mnge_Avl_Work_Cat_Id' => 'Work Categroy',
            'Pub_Group_Mnge_Type_Rght_Id' => 'RightHolder Type',
            'Pub_Group_Mnge_Managed_Rights_Id' => 'Managed Rights',
            'Pub_Group_Mnge_Territories_Id' => 'Territories',
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

        $criteria->compare('Pub_Group_Mnge_Rgt_Id', $this->Pub_Group_Mnge_Rgt_Id);
        $criteria->compare('Pub_Group_Id', $this->Pub_Group_Id);
        $criteria->compare('Pub_Group_Mnge_Society_Id', $this->Pub_Group_Mnge_Society_Id);
        $criteria->compare('Pub_Group_Mnge_Entry_Date', $this->Pub_Group_Mnge_Entry_Date, true);
        $criteria->compare('Pub_Group_Mnge_Exit_Date', $this->Pub_Group_Mnge_Exit_Date, true);
        $criteria->compare('Pub_Group_Mnge_Internal_Position_Id', $this->Pub_Group_Mnge_Internal_Position_Id);
        $criteria->compare('Pub_Group_Mnge_Entry_Date_2', $this->Pub_Group_Mnge_Entry_Date_2, true);
        $criteria->compare('Pub_Group_Mnge_Exit_Date_2', $this->Pub_Group_Mnge_Exit_Date_2, true);
        $criteria->compare('Pub_Group_Mnge_Region_Id', $this->Pub_Group_Mnge_Region_Id);
        $criteria->compare('Pub_Group_Mnge_Profession_Id', $this->Pub_Group_Mnge_Profession_Id);
        $criteria->compare('Pub_Group_Mnge_File', $this->Pub_Group_Mnge_File, true);
        $criteria->compare('Pub_Group_Mnge_Duration', $this->Pub_Group_Mnge_Duration, true);
        $criteria->compare('Pub_Group_Mnge_Avl_Work_Cat_Id', $this->Pub_Group_Mnge_Avl_Work_Cat_Id);
        $criteria->compare('Pub_Group_Mnge_Type_Rght_Id', $this->Pub_Group_Mnge_Type_Rght_Id);
        $criteria->compare('Pub_Group_Mnge_Managed_Rights_Id', $this->Pub_Group_Mnge_Managed_Rights_Id);
        $criteria->compare('Pub_Group_Mnge_Territories_Id', $this->Pub_Group_Mnge_Territories_Id);
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
     * @return PublisherGroupManageRights the static model class
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
