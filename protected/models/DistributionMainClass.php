<?php

/**
 * This is the model class for table "{{distribution_main_class}}".
 *
 * The followings are the available columns in table '{{distribution_main_class}}':
 * @property integer $Main_Class_Id
 * @property string $Main_Class_Name
 * @property string $Main_Class_Code
 * @property string $Active
 * @property string $Created_Date
 * @property string $Rowversion
 * @property integer $Created_By
 * @property integer $Updated_By
 *
 * The followings are the available model relations:
 * @property DistributionClass[] $distributionClasses
 */
class DistributionMainClass extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{distribution_main_class}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Main_Class_Name', 'required'),
            array('Created_By, Updated_By', 'numerical', 'integerOnly' => true),
            array('Main_Class_Name', 'length', 'max' => 50),
            array('Main_Class_Code', 'length', 'max' => 25),
            array('Active', 'length', 'max' => 1),
            array('Created_Date, Rowversion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Main_Class_Id, Main_Class_Name, Main_Class_Code, Active, Created_Date, Rowversion, Created_By, Updated_By', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'distributionClasses' => array(self::HAS_MANY, 'DistributionClass', 'Main_Class_Id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Main_Class_Id' => 'Main Class',
            'Main_Class_Name' => 'Main Class Name',
            'Main_Class_Code' => 'Main Class Code',
            'Active' => 'Active',
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

        $criteria->compare('Main_Class_Id', $this->Main_Class_Id);
        $criteria->compare('Main_Class_Name', $this->Main_Class_Name, true);
        $criteria->compare('Main_Class_Code', $this->Main_Class_Code, true);
        $criteria->compare('Active', $this->Active, true);
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
     * @return DistributionMainClass the static model class
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

    public static function mainClassList($key = NULL) {
        $list = CHtml::listData(self::model()->findAll(), 'Main_Class_Id', 'Main_Class_Name');
        if($key != NULL)
            return $list[$key];
        return $list;
    }
}
