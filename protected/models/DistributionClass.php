<?php

/**
 * This is the model class for table "{{distribution_class}}".
 *
 * The followings are the available columns in table '{{distribution_class}}':
 * @property integer $Class_Id
 * @property string $Class_Internal_Code
 * @property string $Class_Code
 * @property string $Class_Name
 * @property string $Created_Date
 * @property string $Rowversion
 * @property integer $Created_By
 * @property integer $Updated_By
 *
 * The followings are the available model relations:
 * @property DistributionMainClass $distributionMainclass
 * @property DistributionSubclass[] $distributionSubclasses
 */
class DistributionClass extends RActiveRecord {

    public function init() {
        parent::init();
        if($this->isNewRecord){
            $this->Class_Internal_Code = InternalcodeGenerate::model()->find("Gen_User_Type = :type", array(':type' => InternalcodeGenerate::DIST_CLASS_CODE))->Fullcode;
        }
    }
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{distribution_class}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Class_Internal_Code, Main_Class_Id, Class_Code, Class_Name', 'required'),
            array('Class_Internal_Code', 'unique'),
            array('Created_By, Updated_By', 'numerical', 'integerOnly' => true),
            array('Class_Code', 'length', 'max' => 30),
            array('Class_Name', 'length', 'max' => 50),
            array('Created_Date, Rowversion, Main_Class_Id', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Class_Id, Class_Internal_Code, Class_Code, Class_Name, Created_Date, Rowversion, Created_By, Updated_By', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'distributionMainclass' => array(self::BELONGS_TO, 'DistributionMainClass', 'Main_Class_Id'),
            'distributionSubclass' => array(self::HAS_ONE, 'DistributionSubclass', 'Class_Id'),
            'createdBy' => array(self::BELONGS_TO, 'User', 'Created_By'),
            'updatedBy' => array(self::BELONGS_TO, 'User', 'Updated_By'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Class_Id' => 'Class',
            'Class_Internal_Code' => 'Internal Code',
            'Main_Class_Id' => 'Main Class',
            'Class_Code' => 'Code',
            'Class_Name' => 'Name',
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

        $criteria->compare('Class_Id', $this->Class_Id);
        $criteria->compare('Main_Class_Id', $this->Main_Class_Id);
        $criteria->compare('Class_Internal_Code', $this->Class_Internal_Code, true);
        $criteria->compare('Class_Code', $this->Class_Code, true);
        $criteria->compare('Class_Name', $this->Class_Name, true);
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
     * @return DistributionClass the static model class
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

    public static function classList($key = NULL) {
        $list = CHtml::listData(self::model()->findAll(), 'Class_Id', 'Class_Name');
        if($key != NULL)
            return $list[$key];
        return $list;
    }
    
    protected function afterSave() {
        if($this->isNewRecord){
            InternalcodeGenerate::model()->codeIncreament(InternalcodeGenerate::DIST_CLASS_CODE);
        }
        return parent::afterSave();
    }
}
