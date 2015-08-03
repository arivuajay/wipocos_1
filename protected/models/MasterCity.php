<?php

/**
 * This is the model class for table "{{master_city}}".
 *
 * The followings are the available columns in table '{{master_city}}':
 * @property integer $Master_City_Id
 * @property string $City_Code
 * @property string $City_Name
 * @property string $Active
 * @property string $Created_Date
 * @property string $Rowversion
 * @property integer $Country_Id
 * @property integer $Created_By
 * @property integer $Updated_By
 * @property MasterCountry $country
 * @property TariffContracts $tariffContracts
 */
class MasterCity extends CActiveRecord {

    public function init() {
        parent::init();
        if($this->isNewRecord){
            $this->Country_Id = DEFAULT_COUNTRY_ID;
        }
    }
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{master_city}}';
    }

    public function scopes() {
        $alias = $this->getTableAlias(false, false);
        return array(
            'isActive' => array('condition' => "$alias.Active = '1'"),
        );
    }
    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('City_Code, City_Name, Country_Id', 'required'),
            array('Created_By, Updated_By', 'numerical', 'integerOnly' => true),
            array('City_Code', 'length', 'max' => 20),
            array('City_Name', 'length', 'max' => 100),
            array('Active', 'length', 'max' => 1),
            array('Created_Date, Rowversion, Country_Id', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Master_City_Id, City_Code, City_Name, Active, Created_Date, Rowversion, Created_By, Updated_By', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'tariffContracts' => array(self::HAS_MANY, 'TariffContracts', 'Tarf_Cont_City_Id'),
            'country' => array(self::BELONGS_TO, 'MasterCountry', 'Country_Id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Master_City_Id' => 'Master City',
            'Country_Id' => 'Country',
            'City_Code' => 'City Code',
            'City_Name' => 'City Name',
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

        $criteria->compare('Master_City_Id', $this->Master_City_Id);
        $criteria->compare('Country_Id', $this->Country_Id, true);
        $criteria->compare('City_Code', $this->City_Code, true);
        $criteria->compare('City_Name', $this->City_Name, true);
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
     * @return MasterCity the static model class
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

    protected function beforeValidate() {
        $relations = array('tariffContracts');
        
        $validate = false;
        if(MASTER_EDIT_VALIDATION){
            foreach ($relations as $key => $relation) {
                if(!empty($this->$relation)){
                    $validate = true;
                    break;
                }
            }
            $relation = BaseInflector::camel2words($relation, ' ');
            if($validate)
                $this->addError('City_Name', "This City is already linked with {$relation}. So you can't Edit this record.");
        }
        return parent::beforeValidate();
    }
}
