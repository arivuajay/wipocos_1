<?php

/**
 * This is the model class for table "{{distribution_utlization_period}}".
 *
 * The followings are the available columns in table '{{distribution_utlization_period}}':
 * @property integer $Period_Id
 * @property string $Period_Year
 * @property string $Period_Internal_Code
 * @property integer $Period_Number
 * @property string $Period_From
 * @property string $Period_To
 * @property integer $Sub_Class_Id
 * @property integer $Setting_Id
 * @property string $Created_Date
 * @property string $Rowversion
 * @property integer $Created_By
 * @property integer $Updated_By
 *
 * The followings are the available model relations:
 * @property DistributionSubclass $subclass
 * @property DistributionSetting $setting
 */
class DistributionUtlizationPeriod extends RActiveRecord {

    public function init() {
        parent::init();
        if($this->isNewRecord){
            $this->Period_Internal_Code = InternalcodeGenerate::model()->find("Gen_User_Type = :type", array(':type' => InternalcodeGenerate::DIST_UTILIZATION_PERIOD_CODE))->Fullcode;
            $this->Period_Year = date('Y');
        }
    }
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{distribution_utlization_period}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Period_Year, Period_From, Period_To, Sub_Class_Id, Setting_Id, Period_Internal_Code', 'required'),
            array('Period_Internal_Code', 'unique'),
            array('Setting_Id', 'unique', 'message' => 'Setting Date has already been taken.'),
            array('Period_Year, Period_Number, Sub_Class_Id, Setting_Id, Created_By, Updated_By', 'numerical', 'integerOnly' => true),
            array('Period_Year', 'length', 'max' => 4),
            array('Period_Year', 'numerical', 'min' => date('Y')-10, 'max' => date('Y')+10),
            array('Period_To', 'compare', 'compareAttribute'=>'Period_From', 'allowEmpty' => false, 'operator'=>'>', 'message'=>'{attribute} must be greater than "{compareValue}".'),
            array('Created_Date, Rowversion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Period_Id, Period_Internal_Code, Period_Year, Period_Number, Period_From, Period_To, Sub_Class_Id, Setting_Id, Created_Date, Rowversion, Created_By, Updated_By', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'subclass' => array(self::BELONGS_TO, 'DistributionSubclass', 'Sub_Class_Id'),
            'setting' => array(self::BELONGS_TO, 'DistributionSetting', 'Setting_Id'),
            'createdBy' => array(self::BELONGS_TO, 'User', 'Created_By'),
            'updatedBy' => array(self::BELONGS_TO, 'User', 'Updated_By'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Period_Id' => 'Period',
            'Period_Internal_Code' => 'Internal Code',
            'Period_Year' => 'Period Year',
            'Period_Number' => 'Period Number',
            'Period_From' => 'Period From',
            'Period_To' => 'Period To',
            'Sub_Class_Id' => 'Class',
            'Setting_Id' => 'Setting',
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

        $criteria->compare('Period_Id', $this->Period_Id);
        $criteria->compare('Period_Internal_Code', $this->Period_Internal_Code, true);
        $criteria->compare('Period_Year', $this->Period_Year, true);
        $criteria->compare('Period_Number', $this->Period_Number);
        $criteria->compare('Period_From', $this->Period_From, true);
        $criteria->compare('Period_To', $this->Period_To, true);
        $criteria->compare('Sub_Class_Id', $this->Sub_Class_Id);
        $criteria->compare('Setting_Id', $this->Setting_Id);
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
     * @return DistributionUtlizationPeriod the static model class
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
        if($this->isNewRecord){
            InternalcodeGenerate::model()->codeIncreament(InternalcodeGenerate::DIST_UTILIZATION_PERIOD_CODE);
        }
        return parent::afterSave();
    }
    
    public static function getYearlist() {
        $ranges =  range(date('Y', strtotime("-10 Years")), date('Y', strtotime("+10 Years")));
        return array_combine($ranges, $ranges);
    }
    
}
