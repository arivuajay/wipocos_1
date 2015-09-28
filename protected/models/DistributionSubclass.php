<?php

/**
 * This is the model class for table "{{distribution_subclass}}".
 *
 * The followings are the available columns in table '{{distribution_subclass}}':
 * @property integer $Subclass_Id
 * @property integer $Class_Id
 * @property string $Subclass_Code
 * @property string $Subclass_Internal_Code
 * @property string $Subclass_Name
 * @property string $Subclass_Measure_Unit
 * @property string $Subclass_Calc_Unit
 * @property string $Subclass_Dist_Params
 * @property string $Subclass_Admin_Cost
 * @property string $Subclass_Social_Deduct
 * @property string $Subclass_Cultural_Deduct
 * @property string $Created_Date
 * @property string $Rowversion
 * @property integer $Created_By
 * @property integer $Updated_By
 *
 * The followings are the available model relations:
 * @property DistributionClass $class
 */
class DistributionSubclass extends RActiveRecord {

    public function init() {
        parent::init();
        if($this->isNewRecord){
            $this->Subclass_Internal_Code = InternalcodeGenerate::model()->find("Gen_User_Type = :type", array(':type' => InternalcodeGenerate::DIST_SUBCLASS_CODE))->Fullcode;
            $this->Subclass_Admin_Cost = DEFAULT_ADMINISTRATIVE_COST;
        }
    }
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{distribution_subclass}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Class_Id, Subclass_Code, Subclass_Name, Subclass_Internal_Code', 'required'),
            array('Subclass_Internal_Code', 'unique'),
            array('Class_Id, Created_By, Updated_By', 'numerical', 'integerOnly' => true),
            array('Subclass_Code', 'length', 'max' => 30),
            array('Subclass_Name', 'length', 'max' => 50),
            array('Subclass_Measure_Unit, Subclass_Calc_Unit, Subclass_Dist_Params', 'length', 'max' => 1),
            array('Subclass_Admin_Cost, Subclass_Social_Deduct, Subclass_Cultural_Deduct', 'numerical', 'integerOnly' => false),
            array('Subclass_Admin_Cost, Subclass_Social_Deduct, Subclass_Cultural_Deduct', 'length', 'max' => 10),
            array('Created_Date, Rowversion, Subclass_Internal_Code', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Subclass_Id, Subclass_Internal_Code, Class_Id, Subclass_Code, Subclass_Name, Subclass_Measure_Unit, Subclass_Calc_Unit, Subclass_Dist_Params, Subclass_Admin_Cost, Subclass_Social_Deduct, Subclass_Cultural_Deduct, Created_Date, Rowversion, Created_By, Updated_By', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'class' => array(self::BELONGS_TO, 'DistributionClass', 'Class_Id'),
            'createdBy' => array(self::BELONGS_TO, 'User', 'Created_By'),
            'updatedBy' => array(self::BELONGS_TO, 'User', 'Updated_By'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Subclass_Id' => 'Subclass',
            'Subclass_Internal_Code' => 'Internal Code',
            'Class_Id' => 'Class',
            'Subclass_Code' => 'Code',
            'Subclass_Name' => 'Name',
            'Subclass_Measure_Unit' => 'Measuring Unit',
            'Subclass_Calc_Unit' => 'Calculating Unit',
            'Subclass_Dist_Params' => 'Distribution Paramaters',
            'Subclass_Admin_Cost' => 'Administrative Costs',
            'Subclass_Social_Deduct' => 'Social Deductions',
            'Subclass_Cultural_Deduct' => 'Cultural Deductions',
            'Created_Date' => 'Created Date',
            'Rowversion' => 'Rowversion',
            'Created_By' => 'Created By',
            'Updated_By' => 'Updated By',
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

        $criteria->compare('Subclass_Id', $this->Subclass_Id);
        $criteria->compare('Class_Id', $this->Class_Id);
        $criteria->compare('Subclass_Internal_Code', $this->Subclass_Internal_Code, true);
        $criteria->compare('Subclass_Code', $this->Subclass_Code, true);
        $criteria->compare('Subclass_Name', $this->Subclass_Name, true);
        $criteria->compare('Subclass_Measure_Unit', $this->Subclass_Measure_Unit, true);
        $criteria->compare('Subclass_Calc_Unit', $this->Subclass_Calc_Unit, true);
        $criteria->compare('Subclass_Dist_Params', $this->Subclass_Dist_Params, true);
        $criteria->compare('Subclass_Admin_Cost', $this->Subclass_Admin_Cost, true);
        $criteria->compare('Subclass_Social_Deduct', $this->Subclass_Social_Deduct, true);
        $criteria->compare('Subclass_Cultural_Deduct', $this->Subclass_Cultural_Deduct, true);
        $criteria->compare('Created_Date', $this->Created_Date, true);
        $criteria->compare('Rowversion', $this->Rowversion, true);
        $criteria->compare('Created_By', $this->Created_By);
        $criteria->compare('Updated_By', $this->Updated_By);

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
     * @return DistributionSubclass the static model class
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
    
    public static function measuringUnitList($key = NULL) {
        $list = array(
            'D' => 'Duration',
            'F' => 'Frequency',
        );
        
        if($key != NULL)
            return $list[$key];
        return $list;
    }

    public static function calculatingUnitList($key = NULL) {
        $list = array(
            'S' => 'Standard Value',
            'I' => 'Value per interval',
            'G' => 'Value per segment',
        );
        
        if($key != NULL)
            return $list[$key];
        return $list;
    }

    public static function distributionParameters($key = NULL) {
        $list = array(
            'C' => 'Include the work factor',
            'G' => 'Ignore the work factor',
        );
        
        if($key != NULL)
            return $list[$key];
        return $list;
    }
    
    protected function afterSave() {
        if($this->isNewRecord){
            InternalcodeGenerate::model()->codeIncreament(InternalcodeGenerate::DIST_SUBCLASS_CODE);
        }
        return parent::afterSave();
    }
}
