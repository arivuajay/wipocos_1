<?php

/**
 * This is the model class for table "{{performer_account}}".
 *
 * The followings are the available columns in table '{{performer_account}}':
 * @property integer $Perf_Acc_Id
 * @property string $Perf_Sur_Name
 * @property string $Perf_First_Name
 * @property string $Perf_Internal_Code
 * @property integer $Perf_Ipi_Number
 * @property integer $Perf_Ipi_Base_Number
 * @property integer $Perf_Ipn_Number
 * @property string $Perf_Date_Of_Birth
 * @property integer $Perf_Place_Of_Birth_Id
 * @property integer $Perf_Birth_Country_Id
 * @property integer $Perf_Nationality_Id
 * @property integer $Perf_Language_Id
 * @property string $Perf_Identity_Number
 * @property integer $Perf_Marital_Status_Id
 * @property string $Perf_Spouse_Name
 * @property string $Perf_Gender
 * @property string $Active
 * @property string $Created_Date
 * @property string $Rowversion
 *
 * The followings are the available model relations:
 * @property MasterMaritalStatus $perfMaritalStatus
 * @property MasterCountry $perfBirthCountry
 * @property MasterLanguage $perfLanguage
 * @property MasterNationality $perfNationality
 * @property MasterRegion $perfPlaceOfBirth
 * @property PerformerAccountAddress[] $performerAccountAddresses
 * @property PerformerBiography[] $performerBiographies
 * @property PerformerDeathInheritance[] $performerDeathInheritances
 * @property PerformerManageRights[] $performerManageRights
 * @property PerformerPaymentMethod[] $performerPaymentMethods
 * @property PerformerPseudonym[] $performerPseudonyms
 * @property PerformerRelatedRights[] $performerRelatedRights
 */
class PerformerAccount extends CActiveRecord {

    public $expiry_date;
    public $hierarchy_level;
    public $record_search;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{performer_account}}';
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
            array('Perf_Sur_Name, Perf_First_Name, Perf_Internal_Code, Perf_Ipi_Number, Perf_Date_Of_Birth', 'required'),
            array('Perf_Ipi_Number, Perf_Ipi_Base_Number, Perf_Ipn_Number, Perf_Place_Of_Birth_Id, Perf_Birth_Country_Id, Perf_Nationality_Id, Perf_Language_Id, Perf_Marital_Status_Id', 'numerical', 'integerOnly' => true),
            array('Perf_Sur_Name', 'length', 'max' => 50),
            array('Perf_First_Name, Perf_Internal_Code, Perf_Identity_Number, Perf_Spouse_Name', 'length', 'max' => 255),
            array('Perf_Gender, Active', 'length', 'max' => 1),
            array('Created_Date, Rowversion,record_search', 'safe'),
            array('Perf_Internal_Code', 'unique'),
            array('Perf_Sur_Name', 'nameUnique'),
            array('Perf_First_Name', 'unique', 'criteria' => array(
                    'condition' => '`Perf_Sur_Name`=:secondKey',
                    'params' => array(
                        ':secondKey' => $this->Perf_Sur_Name
                    )
                ), "message" => "This User already Exists"),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Perf_Acc_Id, Perf_Sur_Name, Perf_First_Name, Perf_Internal_Code, Perf_Ipi_Number, Perf_Ipi_Base_Number, Perf_Ipn_Number, Perf_Date_Of_Birth, Perf_Place_Of_Birth_Id, Perf_Birth_Country_Id, Perf_Nationality_Id, Perf_Language_Id, Perf_Identity_Number, Perf_Marital_Status_Id, Perf_Spouse_Name, Perf_Gender, Active, Created_Date, Rowversion, expiry_date, hierarchy_level,record_search', 'safe', 'on' => 'search'),
        );
    }

    public function nameUnique($attribute, $params) {
        if (strcasecmp($this->Perf_First_Name, $this->Perf_Sur_Name) == 0) {
            $this->addError($attribute, 'First name and Last cannot be equal.');
        }
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'perfMaritalStatus' => array(self::BELONGS_TO, 'MasterMaritalStatus', 'Perf_Marital_Status_Id'),
            'perfBirthCountry' => array(self::BELONGS_TO, 'MasterCountry', 'Perf_Birth_Country_Id'),
            'perfLanguage' => array(self::BELONGS_TO, 'MasterLanguage', 'Perf_Language_Id'),
            'perfNationality' => array(self::BELONGS_TO, 'MasterNationality', 'Perf_Nationality_Id'),
            'perfPlaceOfBirth' => array(self::BELONGS_TO, 'MasterRegion', 'Perf_Place_Of_Birth_Id'),
            'performerAccountAddresses' => array(self::HAS_ONE, 'PerformerAccountAddress', 'Perf_Acc_Id'),
            'performerBiographies' => array(self::HAS_ONE, 'PerformerBiography', 'Perf_Acc_Id'),
            'performerDeathInheritances' => array(self::HAS_ONE, 'PerformerDeathInheritance', 'Perf_Acc_Id'),
//            'performerManageRights' => array(self::HAS_ONE, 'PerformerManageRights', 'Perf_Acc_Id'),
            'performerPaymentMethods' => array(self::HAS_ONE, 'PerformerPaymentMethod', 'Perf_Acc_Id'),
            'performerPseudonyms' => array(self::HAS_ONE, 'PerformerPseudonym', 'Perf_Acc_id'),
            'performerRelatedRights' => array(self::HAS_ONE, 'PerformerRelatedRights', 'Perf_Acc_Id'),
            'performerUploads' => array(self::HAS_MANY, 'PerformerUpload', 'Auth_Acc_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Perf_Acc_Id' => 'Auth Acc',
            'Perf_Sur_Name' => 'Last Name',
            'Perf_First_Name' => 'First Name',
            'Perf_Internal_Code' => 'Internal Code',
            'Perf_Ipi_Number' => 'IPI Name Number',
            'Perf_Ipi_Base_Number' => 'IPI Base Number',
            'Perf_Ipn_Number' => 'IPN Number',
            'Perf_Date_Of_Birth' => 'Date Of Birth',
            'Perf_Place_Of_Birth_Id' => 'Place Of Birth',
            'Perf_Birth_Country_Id' => 'Birth Country',
            'Perf_Nationality_Id' => 'Nationality',
            'Perf_Language_Id' => 'Language',
            'Perf_Identity_Number' => 'Identity Number',
            'Perf_Marital_Status_Id' => 'Marital Status',
            'Perf_Spouse_Name' => 'Spouse Name',
            'Perf_Gender' => 'Gender',
            'Active' => 'Active',
            'Created_Date' => 'Date of Join',
            'Rowversion' => 'Rowversion',
            'expiry_date' => 'Expiry Date',
            'hierarchy_level' => 'Hierarchy Level',
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
        $criteria->with = array('performerRelatedRights');

        $criteria->compare('Perf_Acc_Id', $this->Perf_Acc_Id);
        $criteria->compare('Perf_Sur_Name', $this->Perf_Sur_Name, true);
        $criteria->compare('Perf_First_Name', $this->Perf_First_Name, true);
        $criteria->compare('Perf_Internal_Code', $this->Perf_Internal_Code, true);
        $criteria->compare('Perf_Ipi_Number', $this->Perf_Ipi_Number);
        $criteria->compare('Perf_Ipi_Base_Number', $this->Perf_Ipi_Base_Number);
        $criteria->compare('Perf_Ipn_Number', $this->Perf_Ipn_Number);
        $criteria->compare('Perf_Date_Of_Birth', $this->Perf_Date_Of_Birth, true);
        $criteria->compare('Perf_Place_Of_Birth_Id', $this->Perf_Place_Of_Birth_Id);
        $criteria->compare('Perf_Birth_Country_Id', $this->Perf_Birth_Country_Id);
        $criteria->compare('Perf_Nationality_Id', $this->Perf_Nationality_Id);
        $criteria->compare('Perf_Language_Id', $this->Perf_Language_Id);
        $criteria->compare('Perf_Identity_Number', $this->Perf_Identity_Number, true);
        $criteria->compare('Perf_Marital_Status_Id', $this->Perf_Marital_Status_Id);
        $criteria->compare('Perf_Spouse_Name', $this->Perf_Spouse_Name, true);
        $criteria->compare('Perf_Gender', $this->Perf_Gender, true);
        $criteria->compare('Active', $this->Active, true);
        $criteria->compare('Created_Date', $this->Created_Date, true);
        $criteria->compare('Rowversion', $this->Rowversion, true);
        $criteria->compare('performerRelatedRights.Perf_Rel_Exit_Date', $this->expiry_date, true);
        $criteria->compare('performerRelatedRights.Perf_Rel_Internal_Position_Id', $this->hierarchy_level, true);


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
     * @return PerformerAccount the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function dataProvider() {
        $criteria = new CDbCriteria;
        if (!empty($this->record_search)) {
            $criteria->compare('Perf_Acc_Id', $this->record_search, true, 'OR');
            $criteria->compare('Perf_Sur_Name', $this->record_search, true, 'OR');
            $criteria->compare('Perf_First_Name', $this->record_search, true, 'OR');
            $criteria->compare('Perf_Internal_Code', $this->record_search, true, 'OR');
            $criteria->compare('Perf_Ipi_Number', $this->record_search, true, 'OR');
            $criteria->compare('Perf_Ipi_Base_Number', $this->record_search, true, 'OR');
            $criteria->compare('Perf_Ipn_Number', $this->record_search, true, 'OR');
            $criteria->compare('Perf_Date_Of_Birth', $this->record_search, true, 'OR');
            $criteria->compare('Perf_Place_Of_Birth_Id', $this->record_search, true, 'OR');
            $criteria->compare('Perf_Birth_Country_Id', $this->record_search, true, 'OR');
            $criteria->compare('Perf_Nationality_Id', $this->record_search, true, 'OR');
            $criteria->compare('Perf_Language_Id', $this->record_search, true, 'OR');
            $criteria->compare('Perf_Identity_Number', $this->record_search, true, 'OR');
            $criteria->compare('Perf_Marital_Status_Id', $this->record_search, true, 'OR');
            $criteria->compare('Perf_Spouse_Name', $this->record_search, true, 'OR');
            $criteria->compare('Perf_Gender', $this->record_search, true, 'OR');
            $criteria->compare('Active', $this->record_search, true, 'OR');
            $criteria->compare('Created_Date', $this->record_search, true, 'OR');
            $criteria->compare('Rowversion', $this->record_search, true, 'OR');
        }
        
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => PAGE_SIZE,
            )
        ));
    }

    protected function afterSave() {
        if ($this->isNewRecord) {
            $gen_inter_model = InternalcodeGenerate::model()->find("Gen_User_Type = :type", array(':type' => 'P'));
            $gen_inter_model->Gen_Inter_Code += 1;
            $gen_inter_model->save(false);
        }
    }

}
