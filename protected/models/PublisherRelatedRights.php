<?php

/**
 * This is the model class for table "{{publisher_related_rights}}".
 *
 * The followings are the available columns in table '{{publisher_related_rights}}':
 * @property integer $Pub_Rel_Rgt_Id
 * @property integer $Pub_Acc_Id
 * @property integer $Pub_Rel_Society_Id
 * @property string $Pub_Rel_Entry_Date
 * @property string $Pub_Rel_Exit_Date
 * @property integer $Pub_Rel_Internal_Position_Id
 * @property string $Pub_Rel_Entry_Date_2
 * @property string $Pub_Rel_Exit_Date_2
 * @property integer $Pub_Rel_Region_Id
 * @property integer $Pub_Rel_Profession_Id
 * @property string $Pub_Rel_File
 * @property string $Pub_Rel_Duration
 * @property integer $Pub_Rel_Avl_Work_Cat_Id
 * @property integer $Pub_Rel_Type_Rght_Id
 * @property integer $Pub_Rel_Managed_Rights_Id
 * @property integer $Pub_Rel_Territories_Id
 *
 * The followings are the available model relations:
 * @property PublisherAccount $pubAcc
 * @property MasterInternalPosition $pubRelInternalPosition
 * @property MasterManagedRights $pubRelManagedRights
 * @property MasterProfession $pubRelProfession
 * @property MasterRegion $pubRelRegion
 * @property MasterTerritories $pubRelTerritories
 * @property MasterTypeRights $pubRelTypeRght
 * @property MasterWorksCategory $pubRelAvlWorkCat
 */
class PublisherRelatedRights extends RActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{publisher_related_rights}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Pub_Acc_Id, Pub_Rel_Society_Id, Pub_Rel_Entry_Date, Pub_Rel_Internal_Position_Id, Pub_Rel_Entry_Date_2, Pub_Rel_Avl_Work_Cat_Id, Pub_Rel_Managed_Rights_Id, Pub_Rel_Territories_Id, Pub_Rel_Type_Rght_Id', 'required'),
            array('Pub_Acc_Id, Pub_Rel_Society_Id, Pub_Rel_Internal_Position_Id, Pub_Rel_Region_Id, Pub_Rel_Profession_Id, Pub_Rel_Avl_Work_Cat_Id, Pub_Rel_Type_Rght_Id, Pub_Rel_Managed_Rights_Id, Pub_Rel_Territories_Id, Created_By, Updated_By', 'numerical', 'integerOnly' => true),
            array('Pub_Rel_File', 'length', 'max' => 255),
            array('Pub_Rel_Duration', 'length', 'max' => 100),
            array('Pub_Rel_Exit_Date, Pub_Rel_Exit_Date_2, Created_Date, Rowversion, Created_By, Updated_By', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Pub_Rel_Rgt_Id, Pub_Acc_Id, Pub_Rel_Society_Id, Pub_Rel_Entry_Date, Pub_Rel_Exit_Date, Pub_Rel_Internal_Position_Id, Pub_Rel_Entry_Date_2, Pub_Rel_Exit_Date_2, Pub_Rel_Region_Id, Pub_Rel_Profession_Id, Pub_Rel_File, Pub_Rel_Duration, Pub_Rel_Avl_Work_Cat_Id, Pub_Rel_Type_Rght_Id, Pub_Rel_Managed_Rights_Id, Pub_Rel_Territories_Id', 'safe', 'on' => 'search'),
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
            'pubRelInternalPosition' => array(self::BELONGS_TO, 'MasterInternalPosition', 'Pub_Rel_Internal_Position_Id'),
            'pubRelManagedRights' => array(self::BELONGS_TO, 'MasterManagedRights', 'Pub_Rel_Managed_Rights_Id'),
            'pubRelProfession' => array(self::BELONGS_TO, 'MasterProfession', 'Pub_Rel_Profession_Id'),
            'pubRelRegion' => array(self::BELONGS_TO, 'MasterRegion', 'Pub_Rel_Region_Id'),
            'pubRelTerritories' => array(self::BELONGS_TO, 'MasterTerritories', 'Pub_Rel_Territories_Id'),
            'pubRelTypeRght' => array(self::BELONGS_TO, 'MasterTypeRights', 'Pub_Rel_Type_Rght_Id'),
            'pubRelAvlWorkCat' => array(self::BELONGS_TO, 'MasterWorksCategory', 'Pub_Rel_Avl_Work_Cat_Id'),
            'createdBy' => array(self::BELONGS_TO, 'User', 'Created_By'),
            'updatedBy' => array(self::BELONGS_TO, 'User', 'Updated_By'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Pub_Rel_Rgt_Id' => 'Perf Rel Rgt',
            'Pub_Acc_Id' => 'Perf Acc',
            'Pub_Rel_Society_Id' => 'Society',
            'Pub_Rel_Entry_Date' => 'Start of mandate',
            'Pub_Rel_Exit_Date' => 'End of mandate',
            'Pub_Rel_Internal_Position_Id' => 'Internal Position',
            'Pub_Rel_Entry_Date_2' => 'Position Start',
            'Pub_Rel_Exit_Date_2' => 'Position End',
            'Pub_Rel_Region_Id' => 'Region',
            'Pub_Rel_Profession_Id' => 'Profession',
            'Pub_Rel_File' => 'Physical File Location',
            'Pub_Rel_Duration' => 'Duration',
            'Pub_Rel_Avl_Work_Cat_Id' => 'Sector',
            'Pub_Rel_Type_Rght_Id' => 'RightHolder Type',
            'Pub_Rel_Managed_Rights_Id' => 'Managed Rights',
            'Pub_Rel_Territories_Id' => 'Territories',
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

        $criteria->compare('Pub_Rel_Rgt_Id', $this->Pub_Rel_Rgt_Id);
        $criteria->compare('Pub_Acc_Id', $this->Pub_Acc_Id);
        $criteria->compare('Pub_Rel_Society_Id', $this->Pub_Rel_Society_Id);
        $criteria->compare('Pub_Rel_Entry_Date', $this->Pub_Rel_Entry_Date, true);
        $criteria->compare('Pub_Rel_Exit_Date', $this->Pub_Rel_Exit_Date, true);
        $criteria->compare('Pub_Rel_Internal_Position_Id', $this->Pub_Rel_Internal_Position_Id);
        $criteria->compare('Pub_Rel_Entry_Date_2', $this->Pub_Rel_Entry_Date_2, true);
        $criteria->compare('Pub_Rel_Exit_Date_2', $this->Pub_Rel_Exit_Date_2, true);
        $criteria->compare('Pub_Rel_Region_Id', $this->Pub_Rel_Region_Id);
        $criteria->compare('Pub_Rel_Profession_Id', $this->Pub_Rel_Profession_Id);
        $criteria->compare('Pub_Rel_File', $this->Pub_Rel_File, true);
        $criteria->compare('Pub_Rel_Duration', $this->Pub_Rel_Duration, true);
        $criteria->compare('Pub_Rel_Avl_Work_Cat_Id', $this->Pub_Rel_Avl_Work_Cat_Id);
        $criteria->compare('Pub_Rel_Type_Rght_Id', $this->Pub_Rel_Type_Rght_Id);
        $criteria->compare('Pub_Rel_Managed_Rights_Id', $this->Pub_Rel_Managed_Rights_Id);
        $criteria->compare('Pub_Rel_Territories_Id', $this->Pub_Rel_Territories_Id);

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
     * @return PublisherRelatedRights the static model class
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
