<?php

/**
 * This is the model class for table "{{recording_publication}}".
 *
 * The followings are the available columns in table '{{recording_publication}}':
 * @property integer $Rcd_Publ_Id
 * @property integer $Rcd_Id
 * @property string $Rcd_Publ_Internal_Code
 * @property string $Rcd_Publ_Year
 * @property integer $Rcd_Publ_Country_Id
 * @property integer $Rcd_Publ_Prod_Nation_Id
 * @property string $Created_Date
 * @property string $Rowversion
 *
 * The followings are the available model relations:
 * @property MasterCountry $rcdPublCountry
 * @property MasterNationality $rcdPublProdNation
 * @property Recording $rcd
 */
class RecordingPublication extends CActiveRecord {
    
    public function init() {
        parent::init();
        if($this->isNewRecord){
            $this->Rcd_Publ_Country_Id = DEFAULT_COUNTRY_ID;
            $this->Rcd_Publ_Prod_Nation_Id = DEFAULT_NATIONALITY_ID;
            $this->Rcd_Publ_Internal_Code = InternalcodeGenerate::model()->find("Gen_User_Type = :type", array(':type' => InternalcodeGenerate::RECORDING_PUBLISHING_CODE))->Fullcode;
        }
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{recording_publication}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Rcd_Id, Rcd_Publ_Internal_Code, Rcd_Publ_Year, Rcd_Publ_Country_Id, Rcd_Publ_Prod_Nation_Id', 'required'),
            array('Rcd_Id, Rcd_Publ_Country_Id, Rcd_Publ_Prod_Nation_Id', 'numerical', 'integerOnly' => true),
            array('Rcd_Publ_Internal_Code', 'length', 'max' => 100),
            array('Rcd_Publ_Internal_Code', 'unique'),
            array('Rcd_Publ_Year', 'length', 'max' => 4),
            array('Created_Date, Rowversion', 'safe'),
            array('Rcd_Publ_Year', 'numerical', 'min' => (date('Y') - 100), 'max' => (date('Y'))),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Rcd_Publ_Id, Rcd_Id, Rcd_Publ_Internal_Code, Rcd_Publ_Year, Rcd_Publ_Country_Id, Rcd_Publ_Prod_Nation_Id, Created_Date, Rowversion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'rcdPublCountry' => array(self::BELONGS_TO, 'MasterCountry', 'Rcd_Publ_Country_Id'),
            'rcdPublProdNation' => array(self::BELONGS_TO, 'MasterNationality', 'Rcd_Publ_Prod_Nation_Id'),
            'rcd' => array(self::BELONGS_TO, 'Recording', 'Rcd_Id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Rcd_Publ_Id' => 'Rcd Publ',
            'Rcd_Id' => 'Rcd',
            'Rcd_Publ_Internal_Code' => 'Internal Code',
            'Rcd_Publ_Year' => 'Year of Publication',
            'Rcd_Publ_Country_Id' => 'Country of Publication',
            'Rcd_Publ_Prod_Nation_Id' => 'Nationality of Producer',
            'Created_Date' => 'Created Date',
            'Rowversion' => 'Rowversion',
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

        $criteria->compare('Rcd_Publ_Id', $this->Rcd_Publ_Id);
        $criteria->compare('Rcd_Id', $this->Rcd_Id);
        $criteria->compare('Rcd_Publ_Internal_Code', $this->Rcd_Publ_Internal_Code, true);
        $criteria->compare('Rcd_Publ_Year', $this->Rcd_Publ_Year, true);
        $criteria->compare('Rcd_Publ_Country_Id', $this->Rcd_Publ_Country_Id);
        $criteria->compare('Rcd_Publ_Prod_Nation_Id', $this->Rcd_Publ_Prod_Nation_Id);
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
     * @return RecordingPublication the static model class
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
            InternalcodeGenerate::model()->codeIncreament(InternalcodeGenerate::RECORDING_PUBLISHING_CODE);
        }
        return parent::afterSave();
    }
}
