<?php

/**
 * This is the model class for table "{{distribution_setting}}".
 *
 * The followings are the available columns in table '{{distribution_setting}}':
 * @property integer $Setting_Id
 * @property integer $Setting_Identifier
 * @property string $Setting_Internal_Code
 * @property string $Setting_Date
 * @property string $Total_Distribute
 * @property integer $Closing_Distribute
 * @property string $Created_Date
 * @property string $Rowversion
 * @property integer $Created_By
 * @property integer $Updated_By
 *
 * The followings are the available model relations:
 * @property DistributionUtlizationPeriod[] $distributionUtlizationPeriods
 */
class DistributionSetting extends RActiveRecord {

    public function init() {
        parent::init();
        if($this->isNewRecord){
            $this->Setting_Internal_Code = InternalcodeGenerate::model()->find("Gen_User_Type = :type", array(':type' => InternalcodeGenerate::DIST_DATES_CODE))->Fullcode;
        }
    }
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{distribution_setting}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Setting_Identifier, Setting_Date, Setting_Internal_Code', 'required'),
            array('Setting_Internal_Code', 'unique'),
            array('Setting_Identifier, Closing_Distribute, Created_By, Updated_By', 'numerical', 'integerOnly' => true),
            array('Total_Distribute', 'length', 'max' => 10),
            array('Created_Date, Rowversion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Setting_Id, Setting_Internal_Code, Setting_Identifier, Setting_Date, Total_Distribute, Closing_Distribute, Created_Date, Rowversion, Created_By, Updated_By', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'distributionUtlizationPeriods' => array(self::HAS_MANY, 'DistributionUtlizationPeriod', 'Setting_Id'),
            'createdBy' => array(self::BELONGS_TO, 'User', 'Created_By'),
            'updatedBy' => array(self::BELONGS_TO, 'User', 'Updated_By'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Setting_Id' => 'Setting',
            'Setting_Internal_Code' => 'Internal Code',
            'Setting_Identifier' => 'Identifier',
            'Setting_Date' => 'Date',
            'Total_Distribute' => 'Total Distributed',
            'Closing_Distribute' => 'Closing Distribute',
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

        $criteria->compare('Setting_Id', $this->Setting_Id);
        $criteria->compare('Setting_Identifier', $this->Setting_Identifier);
        $criteria->compare('Setting_Internal_Code', $this->Setting_Internal_Code, true);
        $criteria->compare('Setting_Date', $this->Setting_Date, true);
        $criteria->compare('Total_Distribute', $this->Total_Distribute, true);
        $criteria->compare('Closing_Distribute', $this->Closing_Distribute);
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
     * @return DistributionSetting the static model class
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

    public static function settingList($key = NULL) {
        $list = CHtml::listData(self::model()->findAll(), 'Setting_Id', 'Setting_Date');
        if($key != NULL)
            return $list[$key];
        return $list;
    }
    
    protected function afterSave() {
        if($this->isNewRecord){
            InternalcodeGenerate::model()->codeIncreament(InternalcodeGenerate::DIST_DATES_CODE);
        }
        return parent::afterSave();
    }
}
