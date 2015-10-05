<?php

/**
 * This is the model class for table "{{producer_related_rights}}".
 *
 * The followings are the available columns in table '{{producer_related_rights}}':
 * @property integer $Pro_Rel_Rgt_Id
 * @property integer $Pro_Acc_Id
 * @property integer $Pro_Rel_Society_Id
 * @property string $Pro_Rel_Entry_Date
 * @property string $Pro_Rel_Exit_Date
 * @property integer $Pro_Rel_Internal_Position_Id
 * @property string $Pro_Rel_Entry_Date_2
 * @property string $Pro_Rel_Exit_Date_2
 * @property integer $Pro_Rel_Region_Id
 * @property integer $Pro_Rel_Profession_Id
 * @property string $Pro_Rel_File
 * @property string $Pro_Rel_Duration
 * @property integer $Pro_Rel_Avl_Work_Cat_Id
 * @property integer $Pro_Rel_Type_Rght_Id
 * @property integer $Pro_Rel_Managed_Rights_Id
 * @property integer $Pro_Rel_Territories_Id
 * @property string $Created_Date
 * @property string $Rowversion
 *
 * The followings are the available model relations:
 * @property ProducerAccount $proAcc
 * @property MasterInternalPosition $proRelInternalPosition
 * @property MasterManagedRights $proRelManagedRights
 * @property MasterProfession $proRelProfession
 * @property MasterRegion $proRelRegion
 * @property MasterTerritories $proRelTerritories
 * @property MasterTypeRights $proRelTypeRght
 * @property MasterWorksCategory $proRelAvlWorkCat
 */
class ProducerRelatedRights extends RActiveRecord {

    public $not_available;
    
    public function init() {
        parent::init();
        if($this->isNewRecord){
            $this->Pro_Rel_Type_Rght_Id = DEFAULT_PRODUCER_RIGHT_HOLDER_ID;
            $this->Pro_Rel_Society_Id = DEFAULT_SOCIETY_ID;
            $this->Pro_Rel_Territories_Id = DEFAULT_TERRITORY_ID;
            $this->Pro_Rel_Region_Id = DEFAULT_REGION_ID;
            $this->Pro_Rel_Avl_Work_Cat_Id = DEFAULT_WORK_CATEGORY_ID;
            $this->Pro_Rel_Internal_Position_Id = DEFAULT_INTERNAL_POSITION_ID;
            $this->Pro_Rel_Managed_Rights_Id = DEFAULT_MANAGED_RIGHTS_ID;
        }
    }
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{producer_related_rights}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Pro_Acc_Id, Pro_Rel_Society_Id, Pro_Rel_Entry_Date, Pro_Rel_Internal_Position_Id, Pro_Rel_Entry_Date_2, Pro_Rel_Avl_Work_Cat_Id, Pro_Rel_Managed_Rights_Id, Pro_Rel_Territories_Id', 'required'),
            array('Pro_Acc_Id, Pro_Rel_Society_Id, Pro_Rel_Internal_Position_Id, Pro_Rel_Region_Id, Pro_Rel_Profession_Id, Pro_Rel_Avl_Work_Cat_Id, Pro_Rel_Type_Rght_Id, Pro_Rel_Managed_Rights_Id, Pro_Rel_Territories_Id, Created_By, Updated_By', 'numerical', 'integerOnly' => true),
            array('Pro_Rel_File', 'length', 'max' => 255),
            array('Pro_Rel_Duration', 'length', 'max' => 100),
            array('Pro_Rel_Exit_Date, Pro_Rel_Exit_Date_2, Created_Date, Rowversion, Created_By, Updated_By, not_available', 'safe'),
            array('Pro_Rel_Exit_Date', 'compare', 'compareAttribute'=>'Pro_Rel_Entry_Date', 'allowEmpty' => true, 'operator'=>'>', 'message'=>'{attribute} must be greater than "{compareValue}".'),
            array('Pro_Rel_Exit_Date_2', 'compare', 'compareAttribute'=>'Pro_Rel_Entry_Date_2', 'allowEmpty' => true, 'operator'=>'>', 'message'=>'{attribute} must be greater than "{compareValue}".'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Pro_Rel_Rgt_Id, Pro_Acc_Id, Pro_Rel_Society_Id, Pro_Rel_Entry_Date, Pro_Rel_Exit_Date, Pro_Rel_Internal_Position_Id, Pro_Rel_Entry_Date_2, Pro_Rel_Exit_Date_2, Pro_Rel_Region_Id, Pro_Rel_Profession_Id, Pro_Rel_File, Pro_Rel_Duration, Pro_Rel_Avl_Work_Cat_Id, Pro_Rel_Type_Rght_Id, Pro_Rel_Managed_Rights_Id, Pro_Rel_Territories_Id, Created_Date, Rowversion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'proAcc' => array(self::BELONGS_TO, 'ProducerAccount', 'Pro_Acc_Id'),
            'proRelInternalPosition' => array(self::BELONGS_TO, 'MasterInternalPosition', 'Pro_Rel_Internal_Position_Id'),
            'proRelManagedRights' => array(self::BELONGS_TO, 'MasterManagedRights', 'Pro_Rel_Managed_Rights_Id'),
            'proRelProfession' => array(self::BELONGS_TO, 'MasterProfession', 'Pro_Rel_Profession_Id'),
            'proRelRegion' => array(self::BELONGS_TO, 'MasterRegion', 'Pro_Rel_Region_Id'),
            'proRelTerritories' => array(self::BELONGS_TO, 'MasterTerritories', 'Pro_Rel_Territories_Id'),
            'proRelTypeRght' => array(self::BELONGS_TO, 'MasterTypeRights', 'Pro_Rel_Type_Rght_Id'),
            'proRelAvlWorkCat' => array(self::BELONGS_TO, 'MasterWorksCategory', 'Pro_Rel_Avl_Work_Cat_Id'),
            'createdBy' => array(self::BELONGS_TO, 'User', 'Created_By'),
            'updatedBy' => array(self::BELONGS_TO, 'User', 'Updated_By'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Pro_Rel_Rgt_Id' => 'Rgt',
            'Pro_Acc_Id' => 'Pro Acc',
            'Pro_Rel_Society_Id' => 'Society',
            'Pro_Rel_Entry_Date' => 'Entry Date',
            'Pro_Rel_Exit_Date' => 'Exit Date',
            'Pro_Rel_Internal_Position_Id' => 'Internal Position',
            'Pro_Rel_Entry_Date_2' => 'Entry Date',
            'Pro_Rel_Exit_Date_2' => 'Exit Date',
            'Pro_Rel_Region_Id' => 'Region',
            'Pro_Rel_Profession_Id' => 'Profession',
            'Pro_Rel_File' => 'File',
            'Pro_Rel_Duration' => 'Duration',
            'Pro_Rel_Avl_Work_Cat_Id' => 'Category of Performance',
            'Pro_Rel_Type_Rght_Id' => 'Membership Role',
            'Pro_Rel_Managed_Rights_Id' => 'Managed Rights',
            'Pro_Rel_Territories_Id' => 'Territories',
            'Created_Date' => 'Created Date',
            'Rowversion' => 'Rowversion',
            'not_available' => 'Not Available',
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

        $criteria->compare('Pro_Rel_Rgt_Id', $this->Pro_Rel_Rgt_Id);
        $criteria->compare('Pro_Acc_Id', $this->Pro_Acc_Id);
        $criteria->compare('Pro_Rel_Society_Id', $this->Pro_Rel_Society_Id);
        $criteria->compare('Pro_Rel_Entry_Date', $this->Pro_Rel_Entry_Date, true);
        $criteria->compare('Pro_Rel_Exit_Date', $this->Pro_Rel_Exit_Date, true);
        $criteria->compare('Pro_Rel_Internal_Position_Id', $this->Pro_Rel_Internal_Position_Id);
        $criteria->compare('Pro_Rel_Entry_Date_2', $this->Pro_Rel_Entry_Date_2, true);
        $criteria->compare('Pro_Rel_Exit_Date_2', $this->Pro_Rel_Exit_Date_2, true);
        $criteria->compare('Pro_Rel_Region_Id', $this->Pro_Rel_Region_Id);
        $criteria->compare('Pro_Rel_Profession_Id', $this->Pro_Rel_Profession_Id);
        $criteria->compare('Pro_Rel_File', $this->Pro_Rel_File, true);
        $criteria->compare('Pro_Rel_Duration', $this->Pro_Rel_Duration, true);
        $criteria->compare('Pro_Rel_Avl_Work_Cat_Id', $this->Pro_Rel_Avl_Work_Cat_Id);
        $criteria->compare('Pro_Rel_Type_Rght_Id', $this->Pro_Rel_Type_Rght_Id);
        $criteria->compare('Pro_Rel_Managed_Rights_Id', $this->Pro_Rel_Managed_Rights_Id);
        $criteria->compare('Pro_Rel_Territories_Id', $this->Pro_Rel_Territories_Id);
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
     * @return ProducerRelatedRights the static model class
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

    protected function afterSave() {
        $model = ProducerAccount::model()->findByPk($this->Pro_Acc_Id);
        if(!empty($model)){
//            $model->before_save_enable = false;
//            $model->after_save_enable = false;
            $model->Pro_Non_Member = $this->not_available;
            $model->save(false);
        }
        return parent::afterSave();
    }
    
    protected function afterFind() {
        $this->not_available = $this->proAcc->Pro_Non_Member;
        return parent::afterFind();
    }
}
