<?php

/**
 * This is the model class for table "{{inspector}}".
 *
 * The followings are the available columns in table '{{inspector}}':
 * @property integer $Insp_Id
 * @property string $Insp_Internal_Code
 * @property string $Insp_GUID
 * @property string $Insp_Name
 * @property string $Insp_Occupation
 * @property string $Insp_DOB
 * @property integer $Insp_Nationality_Id
 * @property string $Insp_Birth_Place
 * @property string $Insp_Identity_Number
 * @property string $Insp_Date
 * @property integer $Insp_Region_Id
 * @property string $Created_Date
 * @property string $Rowversion
 * @property integer $Created_By
 * @property integer $Updated_By
 *
 * The followings are the available model relations:
 * @property MasterNationality $inspNationality
 * @property MasterRegion $inspRegion
 */
class Inspector extends RActiveRecord {
    
    const MIN_AGE = 20; //in years
    const MAX_AGE = 80; //in years

    public function init() {
        parent::init();
        if($this->isNewRecord){
            $this->Insp_GUID = Myclass::guid(false);
            $this->Insp_Nationality_Id = DEFAULT_NATIONALITY_ID;
            $this->Insp_Region_Id = DEFAULT_REGION_ID;
            $this->Insp_Internal_Code = InternalcodeGenerate::model()->find("Gen_User_Type = :type", array(':type' => InternalcodeGenerate::INSPECTOR_CODE))->Fullcode;
        }
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{inspector}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Insp_Internal_Code, Insp_GUID, Insp_Name, Insp_Date, Insp_DOB', 'required'),
            array('Insp_Nationality_Id, Insp_Region_Id, Created_By, Updated_By', 'numerical', 'integerOnly' => true),
            array('Insp_Internal_Code, Insp_Identity_Number', 'length', 'max' => 50),
            array('Insp_GUID', 'length', 'max' => 40),
//            array('Insp_DOB', 'compare', 'compareValue' => date("Y-m-d", strtotime('-'.self::MIN_AGE.' years')), 'operator' => '<', 'message' => '{attribute} must be lesser than "{compareValue}". Age must be minimum '.self::MIN_AGE.' years'),
//            array('Insp_DOB', 'compare', 'compareValue' => date("Y-m-d", strtotime('-'.self::MAX_AGE.' years')), 'operator' => '>', 'message' => '{attribute} must be greater than "{compareValue}". Age may be maximum '.self::MAX_AGE.' years'),
            array('Insp_Date', 'compare', 'compareValue' => date("Y-m-d"), 'operator' => '<'),
            array('Insp_Name, Insp_Occupation, Insp_Birth_Place', 'length', 'max' => 100),
            array('Insp_DOB, Insp_Date, Created_Date, Rowversion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Insp_Id, Insp_Internal_Code, Insp_GUID, Insp_Name, Insp_Occupation, Insp_DOB, Insp_Nationality_Id, Insp_Birth_Place, Insp_Identity_Number, Insp_Date, Insp_Region_Id, Created_Date, Rowversion, Created_By, Updated_By', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'inspNationality' => array(self::BELONGS_TO, 'MasterNationality', 'Insp_Nationality_Id'),
            'inspRegion' => array(self::BELONGS_TO, 'MasterRegion', 'Insp_Region_Id'),
            'createdBy' => array(self::BELONGS_TO, 'User', 'Created_By'),
            'updatedBy' => array(self::BELONGS_TO, 'User', 'Updated_By'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Insp_Id' => 'Insp',
            'Insp_Internal_Code' => 'Reference Number',
            'Insp_GUID' => 'Guid',
            'Insp_Name' => 'Name',
            'Insp_Occupation' => 'Occupation',
            'Insp_DOB' => 'Date of Birth',
            'Insp_Nationality_Id' => 'Nationality',
            'Insp_Birth_Place' => 'Place of birth',
            'Insp_Identity_Number' => 'Identity Number',
            'Insp_Date' => 'Date of Joining',
            'Insp_Region_Id' => 'Region',
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

        $criteria->compare('Insp_Id', $this->Insp_Id);
        $criteria->compare('Insp_Internal_Code', $this->Insp_Internal_Code, true);
        $criteria->compare('Insp_GUID', $this->Insp_GUID, true);
        $criteria->compare('Insp_Name', $this->Insp_Name, true);
        $criteria->compare('Insp_Occupation', $this->Insp_Occupation, true);
        $criteria->compare('Insp_DOB', $this->Insp_DOB, true);
        $criteria->compare('Insp_Nationality_Id', $this->Insp_Nationality_Id);
        $criteria->compare('Insp_Birth_Place', $this->Insp_Birth_Place, true);
        $criteria->compare('Insp_Identity_Number', $this->Insp_Identity_Number, true);
        $criteria->compare('Insp_Date', $this->Insp_Date, true);
        $criteria->compare('Insp_Region_Id', $this->Insp_Region_Id);
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
     * @return Inspector the static model class
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
