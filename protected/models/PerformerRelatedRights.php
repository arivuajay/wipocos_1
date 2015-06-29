<?php

/**
 * This is the model class for table "{{performer_related_rights}}".
 *
 * The followings are the available columns in table '{{performer_related_rights}}':
 * @property integer $Perf_Rel_Rgt_Id
 * @property integer $Perf_Acc_Id
 * @property integer $Perf_Rel_Society_Id
 * @property string $Perf_Rel_Entry_Date
 * @property string $Perf_Rel_Exit_Date
 * @property integer $Perf_Rel_Internal_Position_Id
 * @property string $Perf_Rel_Entry_Date_2
 * @property string $Perf_Rel_Exit_Date_2
 * @property integer $Perf_Rel_Region_Id
 * @property integer $Perf_Rel_Profession_Id
 * @property string $Perf_Rel_File
 * @property string $Perf_Rel_Duration
 * @property integer $Perf_Rel_Avl_Work_Cat_Id
 * @property integer $Perf_Rel_Type_Rght_Id
 * @property integer $Perf_Rel_Managed_Rights_Id
 * @property integer $Perf_Rel_Territories_Id
 *
 * The followings are the available model relations:
 * @property PerformerAccount $perfAcc
 * @property MasterInternalPosition $perfRelInternalPosition
 * @property MasterManagedRights $perfRelManagedRights
 * @property MasterProfession $perfRelProfession
 * @property MasterRegion $perfRelRegion
 * @property MasterTerritories $perfRelTerritories
 * @property MasterTypeRights $perfRelTypeRght
 * @property MasterWorksCategory $perfRelAvlWorkCat
 */
class PerformerRelatedRights extends CActiveRecord {
//    const FILE_SIZE = 10;

    public function init() {
        parent::init();
        if($this->isNewRecord){
            $this->Perf_Rel_Type_Rght_Id = DEFAULT_PERFORMER_RIGHT_HOLDER_ID;
            $this->Perf_Rel_Society_Id = DEFAULT_SOCIETY_ID;
            $this->Perf_Rel_Territories_Id = DEFAULT_AUTHOR_MANAGED_RIGHTS_TERRITORY_ID;
        }
    }
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{performer_related_rights}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Perf_Acc_Id, Perf_Rel_Society_Id, Perf_Rel_Entry_Date, Perf_Rel_Internal_Position_Id, Perf_Rel_Entry_Date_2, Perf_Rel_Avl_Work_Cat_Id, Perf_Rel_Managed_Rights_Id, Perf_Rel_Territories_Id', 'required'),
            array('Perf_Acc_Id, Perf_Rel_Society_Id, Perf_Rel_Internal_Position_Id, Perf_Rel_Region_Id, Perf_Rel_Profession_Id, Perf_Rel_Avl_Work_Cat_Id, Perf_Rel_Type_Rght_Id, Perf_Rel_Managed_Rights_Id, Perf_Rel_Territories_Id', 'numerical', 'integerOnly' => true),
            array('Perf_Rel_File', 'length', 'max' => 255),
            array('Perf_Rel_Duration', 'length', 'max' => 100),
            array('Perf_Rel_Exit_Date, Perf_Rel_Exit_Date_2', 'safe'),
            array('Perf_Rel_Exit_Date', 'compare', 'compareAttribute'=>'Perf_Rel_Entry_Date', 'allowEmpty' => true, 'operator'=>'>', 'message'=>'{attribute} must be greater than "{compareValue}".'),
            array('Perf_Rel_Exit_Date_2', 'compare', 'compareAttribute'=>'Perf_Rel_Entry_Date_2', 'allowEmpty' => true, 'operator'=>'>', 'message'=>'{attribute} must be greater than "{compareValue}".'),
//            array('Perf_Rel_File', 'file', 'allowEmpty' => true, 'maxSize'=>1024 * 1024 * self::FILE_SIZE, 'tooLarge'=>'File should be smaller than '.self::FILE_SIZE.'MB'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Perf_Rel_Rgt_Id, Perf_Acc_Id, Perf_Rel_Society_Id, Perf_Rel_Entry_Date, Perf_Rel_Exit_Date, Perf_Rel_Internal_Position_Id, Perf_Rel_Entry_Date_2, Perf_Rel_Exit_Date_2, Perf_Rel_Region_Id, Perf_Rel_Profession_Id, Perf_Rel_File, Perf_Rel_Duration, Perf_Rel_Avl_Work_Cat_Id, Perf_Rel_Type_Rght_Id, Perf_Rel_Managed_Rights_Id, Perf_Rel_Territories_Id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'perfAcc' => array(self::BELONGS_TO, 'PerformerAccount', 'Perf_Acc_Id'),
            'perfRelInternalPosition' => array(self::BELONGS_TO, 'MasterInternalPosition', 'Perf_Rel_Internal_Position_Id'),
            'perfRelManagedRights' => array(self::BELONGS_TO, 'MasterManagedRights', 'Perf_Rel_Managed_Rights_Id'),
            'perfRelProfession' => array(self::BELONGS_TO, 'MasterProfession', 'Perf_Rel_Profession_Id'),
            'perfRelRegion' => array(self::BELONGS_TO, 'MasterRegion', 'Perf_Rel_Region_Id'),
            'perfRelTerritories' => array(self::BELONGS_TO, 'MasterTerritories', 'Perf_Rel_Territories_Id'),
            'perfRelTypeRght' => array(self::BELONGS_TO, 'MasterTypeRights', 'Perf_Rel_Type_Rght_Id'),
            'perfRelAvlWorkCat' => array(self::BELONGS_TO, 'MasterWorksCategory', 'Perf_Rel_Avl_Work_Cat_Id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Perf_Rel_Rgt_Id' => 'Perf Rel Rgt',
            'Perf_Acc_Id' => 'Perf Acc',
            'Perf_Rel_Society_Id' => 'Society',
            'Perf_Rel_Entry_Date' => 'Start of mandate',
            'Perf_Rel_Exit_Date' => 'End of mandate',
            'Perf_Rel_Internal_Position_Id' => 'Internal Position',
            'Perf_Rel_Entry_Date_2' => 'Position Start',
            'Perf_Rel_Exit_Date_2' => 'Position End',
            'Perf_Rel_Region_Id' => 'Region',
            'Perf_Rel_Profession_Id' => 'Profession',
            'Perf_Rel_File' => 'Physical File Location',
            'Perf_Rel_Duration' => 'Duration',
            'Perf_Rel_Avl_Work_Cat_Id' => 'Work Category',
            'Perf_Rel_Type_Rght_Id' => 'Membership Role',
            'Perf_Rel_Managed_Rights_Id' => 'Managed Rights',
            'Perf_Rel_Territories_Id' => 'Territories',
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

        $criteria->compare('Perf_Rel_Rgt_Id', $this->Perf_Rel_Rgt_Id);
        $criteria->compare('Perf_Acc_Id', $this->Perf_Acc_Id);
        $criteria->compare('Perf_Rel_Society_Id', $this->Perf_Rel_Society_Id);
        $criteria->compare('Perf_Rel_Entry_Date', $this->Perf_Rel_Entry_Date, true);
        $criteria->compare('Perf_Rel_Exit_Date', $this->Perf_Rel_Exit_Date, true);
        $criteria->compare('Perf_Rel_Internal_Position_Id', $this->Perf_Rel_Internal_Position_Id);
        $criteria->compare('Perf_Rel_Entry_Date_2', $this->Perf_Rel_Entry_Date_2, true);
        $criteria->compare('Perf_Rel_Exit_Date_2', $this->Perf_Rel_Exit_Date_2, true);
        $criteria->compare('Perf_Rel_Region_Id', $this->Perf_Rel_Region_Id);
        $criteria->compare('Perf_Rel_Profession_Id', $this->Perf_Rel_Profession_Id);
        $criteria->compare('Perf_Rel_File', $this->Perf_Rel_File, true);
        $criteria->compare('Perf_Rel_Duration', $this->Perf_Rel_Duration, true);
        $criteria->compare('Perf_Rel_Avl_Work_Cat_Id', $this->Perf_Rel_Avl_Work_Cat_Id);
        $criteria->compare('Perf_Rel_Type_Rght_Id', $this->Perf_Rel_Type_Rght_Id);
        $criteria->compare('Perf_Rel_Managed_Rights_Id', $this->Perf_Rel_Managed_Rights_Id);
        $criteria->compare('Perf_Rel_Territories_Id', $this->Perf_Rel_Territories_Id);

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
     * @return PerformerRelatedRights the static model class
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
                'fileField' => 'Perf_Rel_File',
            )
        );
    }
}
