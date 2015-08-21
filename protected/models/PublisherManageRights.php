<?php

/**
 * This is the model class for table "{{publisher_manage_rights}}".
 *
 * The followings are the available columns in table '{{publisher_manage_rights}}':
 * @property integer $Pub_Mnge_Rgt_Id
 * @property integer $Pub_Acc_Id
 * @property integer $Pub_Mnge_Society_Id
 * @property string $Pub_Mnge_Entry_Date
 * @property string $Pub_Mnge_Exit_Date
 * @property integer $Pub_Mnge_Internal_Position_Id
 * @property string $Pub_Mnge_Entry_Date_2
 * @property string $Pub_Mnge_Exit_Date_2
 * @property integer $Pub_Mnge_Region_Id
 * @property integer $Pub_Mnge_Profession_Id
 * @property string $Pub_Mnge_File
 * @property string $Pub_Mnge_Duration
 * @property integer $Pub_Mnge_Avl_Work_Cat_Id
 * @property integer $Pub_Mnge_Type_Rght_Id
 * @property integer $Pub_Mnge_Managed_Rights_Id
 * @property integer $Pub_Mnge_Territories_Id
 *
 * The followings are the available model relations:
 * @property PublisherAccount $pubAcc
 * @property MasterInternalPosition $pubMngeInternalPosition
 * @property MasterManagedRights $pubMngeManagedRights
 * @property MasterProfession $pubMngeProfession
 * @property MasterRegion $pubMngeRegion
 * @property Society $pubMngeSociety
 * @property MasterTerritories $pubMngeTerritories
 * @property MasterTypeRights $pubMngeTypeRght
 * @property MasterWorksCategory $pubMngeAvlWorkCat
 */
class PublisherManageRights extends RActiveRecord {

    public function init() {
        parent::init();
        if($this->isNewRecord){
            $this->Pub_Mnge_Type_Rght_Id = DEFAULT_PUBLISHER_RIGHT_HOLDER_ID;
            $this->Pub_Mnge_Society_Id = DEFAULT_SOCIETY_ID;
            $this->Pub_Mnge_Territories_Id = DEFAULT_TERRITORY_ID;
            $this->Pub_Mnge_Region_Id = DEFAULT_REGION_ID;
            $this->Pub_Mnge_Avl_Work_Cat_Id = DEFAULT_WORK_CATEGORY_ID;
            $this->Pub_Mnge_Internal_Position_Id = DEFAULT_INTERNAL_POSITION_ID;
            $this->Pub_Mnge_Managed_Rights_Id = DEFAULT_MANAGED_RIGHTS_ID;
        }
    }
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{publisher_manage_rights}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Pub_Acc_Id, Pub_Mnge_Society_Id, Pub_Mnge_Entry_Date, Pub_Mnge_Internal_Position_Id, Pub_Mnge_Entry_Date_2, Pub_Mnge_Avl_Work_Cat_Id, Pub_Mnge_Type_Rght_Id, Pub_Mnge_Managed_Rights_Id, Pub_Mnge_Territories_Id', 'required'),
            array('Pub_Acc_Id, Pub_Mnge_Society_Id, Pub_Mnge_Internal_Position_Id, Pub_Mnge_Region_Id, Pub_Mnge_Profession_Id, Pub_Mnge_Avl_Work_Cat_Id, Pub_Mnge_Type_Rght_Id, Pub_Mnge_Managed_Rights_Id, Pub_Mnge_Territories_Id, Created_By, Updated_By', 'numerical', 'integerOnly' => true),
            array('Pub_Mnge_File', 'length', 'max' => 255),
            array('Pub_Mnge_Duration', 'length', 'max' => 100),
            array('Pub_Mnge_Exit_Date', 'compare', 'compareAttribute'=>'Pub_Mnge_Entry_Date', 'allowEmpty' => true, 'operator'=>'>', 'message'=>'{attribute} must be greater than "{compareValue}".'),
            array('Pub_Mnge_Exit_Date_2', 'compare', 'compareAttribute'=>'Pub_Mnge_Entry_Date_2', 'allowEmpty' => true, 'operator'=>'>', 'message'=>'{attribute} must be greater than "{compareValue}".'),
            array('Pub_Mnge_Exit_Date, Pub_Mnge_Exit_Date_2, Created_Date, Rowversion, Created_By, Updated_By', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Pub_Mnge_Rgt_Id, Pub_Acc_Id, Pub_Mnge_Society_Id, Pub_Mnge_Entry_Date, Pub_Mnge_Exit_Date, Pub_Mnge_Internal_Position_Id, Pub_Mnge_Entry_Date_2, Pub_Mnge_Exit_Date_2, Pub_Mnge_Region_Id, Pub_Mnge_Profession_Id, Pub_Mnge_File, Pub_Mnge_Duration, Pub_Mnge_Avl_Work_Cat_Id, Pub_Mnge_Type_Rght_Id, Pub_Mnge_Managed_Rights_Id, Pub_Mnge_Territories_Id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'pubAcc' => array(self::BELONGS_TO, 'PublisherAccount', 'Pub_Acc_Id'),
            'pubMngeInternalPosition' => array(self::BELONGS_TO, 'MasterInternalPosition', 'Pub_Mnge_Internal_Position_Id'),
            'pubMngeManagedRights' => array(self::BELONGS_TO, 'MasterManagedRights', 'Pub_Mnge_Managed_Rights_Id'),
            'pubMngeProfession' => array(self::BELONGS_TO, 'MasterProfession', 'Pub_Mnge_Profession_Id'),
            'pubMngeRegion' => array(self::BELONGS_TO, 'MasterRegion', 'Pub_Mnge_Region_Id'),
            'pubMngeSociety' => array(self::BELONGS_TO, 'Society', 'Pub_Mnge_Society_Id'),
            'pubMngeTerritories' => array(self::BELONGS_TO, 'MasterTerritories', 'Pub_Mnge_Territories_Id'),
            'pubMngeTypeRght' => array(self::BELONGS_TO, 'MasterTypeRights', 'Pub_Mnge_Type_Rght_Id'),
            'pubMngeAvlWorkCat' => array(self::BELONGS_TO, 'MasterWorksCategory', 'Pub_Mnge_Avl_Work_Cat_Id'),
            'createdBy' => array(self::BELONGS_TO, 'User', 'Created_By'),
            'updatedBy' => array(self::BELONGS_TO, 'User', 'Updated_By'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Pub_Mnge_Rgt_Id' => 'Rgt',
            'Pub_Acc_Id' => 'Acc',
            'Pub_Mnge_Society_Id' => 'Society',
            'Pub_Mnge_Entry_Date' => 'Start of mandate',
            'Pub_Mnge_Exit_Date' => 'End of mandate',
            'Pub_Mnge_Internal_Position_Id' => 'Internal Position',
            'Pub_Mnge_Entry_Date_2' => 'Position Start',
            'Pub_Mnge_Exit_Date_2' => 'Position End',
            'Pub_Mnge_Region_Id' => 'Region',
            'Pub_Mnge_Profession_Id' => 'Profession',
            'Pub_Mnge_File' => 'Physical File Location',
            'Pub_Mnge_Duration' => 'Duration',
            'Pub_Mnge_Avl_Work_Cat_Id' => 'Sector',
            'Pub_Mnge_Type_Rght_Id' => 'Membership Role',
            'Pub_Mnge_Managed_Rights_Id' => 'Managed Rights',
            'Pub_Mnge_Territories_Id' => 'Territories',
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

        $criteria->compare('Pub_Mnge_Rgt_Id', $this->Pub_Mnge_Rgt_Id);
        $criteria->compare('Pub_Acc_Id', $this->Pub_Acc_Id);
        $criteria->compare('Pub_Mnge_Society_Id', $this->Pub_Mnge_Society_Id);
        $criteria->compare('Pub_Mnge_Entry_Date', $this->Pub_Mnge_Entry_Date, true);
        $criteria->compare('Pub_Mnge_Exit_Date', $this->Pub_Mnge_Exit_Date, true);
        $criteria->compare('Pub_Mnge_Internal_Position_Id', $this->Pub_Mnge_Internal_Position_Id);
        $criteria->compare('Pub_Mnge_Entry_Date_2', $this->Pub_Mnge_Entry_Date_2, true);
        $criteria->compare('Pub_Mnge_Exit_Date_2', $this->Pub_Mnge_Exit_Date_2, true);
        $criteria->compare('Pub_Mnge_Region_Id', $this->Pub_Mnge_Region_Id);
        $criteria->compare('Pub_Mnge_Profession_Id', $this->Pub_Mnge_Profession_Id);
        $criteria->compare('Pub_Mnge_File', $this->Pub_Mnge_File, true);
        $criteria->compare('Pub_Mnge_Duration', $this->Pub_Mnge_Duration, true);
        $criteria->compare('Pub_Mnge_Avl_Work_Cat_Id', $this->Pub_Mnge_Avl_Work_Cat_Id);
        $criteria->compare('Pub_Mnge_Type_Rght_Id', $this->Pub_Mnge_Type_Rght_Id);
        $criteria->compare('Pub_Mnge_Managed_Rights_Id', $this->Pub_Mnge_Managed_Rights_Id);
        $criteria->compare('Pub_Mnge_Territories_Id', $this->Pub_Mnge_Territories_Id);

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
     * @return PublisherManageRights the static model class
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
