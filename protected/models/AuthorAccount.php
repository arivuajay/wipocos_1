<?php

/**
 * This is the model class for table "{{author_account}}".
 *
 * The followings are the available columns in table '{{author_account}}':
 * @property integer $Auth_Acc_Id
 * @property string $Auth_Sur_Name
 * @property string $Auth_First_Name
 * @property string $Auth_Internal_Code
 * @property integer $Auth_Ipi_Number
 * @property integer $Auth_Ipi_Base_Number
 * @property integer $Auth_Ipn_Number
 * @property string $Auth_Date_Of_Birth
 * @property integer $Auth_Place_Of_Birth_Id
 * @property integer $Auth_Birth_Country_Id
 * @property integer $Auth_Nationality_Id
 * @property integer $Auth_Language_Id
 * @property string $Auth_Identity_Number
 * @property integer $Auth_Marital_Status_Id
 * @property string $Auth_Spouse_Name
 * @property string $Auth_Gender
 * @property string $Active
 * @property string $Created_Date
 * @property string $Rowversion
 *
 * The followings are the available model relations:
 * @property MasterMaritalStatus $authMaritalStatus
 * @property MasterCountry $authBirthCountry
 * @property MasterLanguage $authLanguage
 * @property MasterNationality $authNationality
 * @property MasterRegion $authPlaceOfBirth
 * @property AuthorAccountAddress[] $authorAccountAddresses
 * @property AuthorBiography[] $authorBiographies
 * @property AuthorDeathInheritance[] $authorDeathInheritances
 * @property AuthorManageRights[] $authorManageRights
 * @property AuthorPaymentMethod[] $authorPaymentMethods
 * @property AuthorPseudonym[] $authorPseudonyms
 * @property AuthorRelatedRights[] $authorRelatedRights
 */
class AuthorAccount extends CActiveRecord {
    
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{author_account}}';
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
            array('Auth_Sur_Name, Auth_First_Name, Auth_Internal_Code, Auth_Ipi_Number, Auth_Date_Of_Birth', 'required'),
            array('Auth_Ipi_Number, Auth_Ipi_Base_Number, Auth_Ipn_Number, Auth_Place_Of_Birth_Id, Auth_Birth_Country_Id, Auth_Nationality_Id, Auth_Language_Id, Auth_Marital_Status_Id', 'numerical', 'integerOnly' => true),
            array('Auth_Sur_Name', 'length', 'max' => 50),
            array('Auth_First_Name, Auth_Internal_Code, Auth_Identity_Number, Auth_Spouse_Name', 'length', 'max' => 255),
            array('Auth_Gender, Active', 'length', 'max' => 1),
            array('Created_Date, Rowversion', 'safe'),
            array('Auth_Sur_Name', 'nameUnique'),
            array('Auth_Internal_Code', 'unique'),
            array('Auth_First_Name', 'unique', 'criteria'=>array(
            'condition' => '`Auth_Sur_Name`=:secondKey',
                    'params' => array(
                        ':secondKey' => $this->Auth_Sur_Name
                    )
                ), "message" => "This User already Exists"),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Auth_Acc_Id, Auth_Sur_Name, Auth_First_Name, Auth_Internal_Code, Auth_Ipi_Number, Auth_Ipi_Base_Number, Auth_Ipn_Number, Auth_Date_Of_Birth, Auth_Place_Of_Birth_Id, Auth_Birth_Country_Id, Auth_Nationality_Id, Auth_Language_Id, Auth_Identity_Number, Auth_Marital_Status_Id, Auth_Spouse_Name, Auth_Gender, Active, Created_Date, Rowversion', 'safe', 'on' => 'search'),
        );
    }
    
    public function nameUnique($attribute,$params) {
        if(strcasecmp($this->Auth_First_Name, $this->Auth_Sur_Name) == 0 ){
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
            'authMaritalStatus' => array(self::BELONGS_TO, 'MasterMaritalStatus', 'Auth_Marital_Status_Id'),
            'authBirthCountry' => array(self::BELONGS_TO, 'MasterCountry', 'Auth_Birth_Country_Id'),
            'authLanguage' => array(self::BELONGS_TO, 'MasterLanguage', 'Auth_Language_Id'),
            'authNationality' => array(self::BELONGS_TO, 'MasterNationality', 'Auth_Nationality_Id'),
            'authPlaceOfBirth' => array(self::BELONGS_TO, 'MasterRegion', 'Auth_Place_Of_Birth_Id'),
            'authorAccountAddresses' => array(self::HAS_MANY, 'AuthorAccountAddress', 'Auth_Acc_Id'),
            'authorBiographies' => array(self::HAS_MANY, 'AuthorBiography', 'Auth_Acc_Id'),
            'authorDeathInheritances' => array(self::HAS_MANY, 'AuthorDeathInheritance', 'Auth_Acc_Id'),
            'authorManageRights' => array(self::HAS_MANY, 'AuthorManageRights', 'Auth_Acc_Id'),
            'authorPaymentMethods' => array(self::HAS_MANY, 'AuthorPaymentMethod', 'Auth_Acc_Id'),
            'authorPseudonyms' => array(self::HAS_MANY, 'AuthorPseudonym', 'Auth_Acc_id'),
            'authorRelatedRights' => array(self::HAS_MANY, 'AuthorRelatedRights', 'Auth_Acc_Id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Auth_Acc_Id' => 'Auth Acc',
            'Auth_Sur_Name' => 'Last Name',
            'Auth_First_Name' => 'First Name',
            'Auth_Internal_Code' => 'Internal Code',
            'Auth_Ipi_Number' => 'IPI Name Number',
            'Auth_Ipi_Base_Number' => 'IPI Base Number',
            'Auth_Ipn_Number' => 'IPN Number',
            'Auth_Date_Of_Birth' => 'Date Of Birth',
            'Auth_Place_Of_Birth_Id' => 'Place Of Birth',
            'Auth_Birth_Country_Id' => 'Birth Country',
            'Auth_Nationality_Id' => 'Nationality',
            'Auth_Language_Id' => 'Language',
            'Auth_Identity_Number' => 'Identity Number',
            'Auth_Marital_Status_Id' => 'Marital Status',
            'Auth_Spouse_Name' => 'Spouse Name',
            'Auth_Gender' => 'Gender',
            'Active' => 'Active',
            'Created_Date' => 'Date of Join',
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

        $criteria->compare('Auth_Acc_Id', $this->Auth_Acc_Id);
        $criteria->compare('Auth_Sur_Name', $this->Auth_Sur_Name, true);
        $criteria->compare('Auth_First_Name', $this->Auth_First_Name, true);
        $criteria->compare('Auth_Internal_Code', $this->Auth_Internal_Code, true);
        $criteria->compare('Auth_Ipi_Number', $this->Auth_Ipi_Number);
        $criteria->compare('Auth_Ipi_Base_Number', $this->Auth_Ipi_Base_Number);
        $criteria->compare('Auth_Ipn_Number', $this->Auth_Ipn_Number);
        $criteria->compare('Auth_Date_Of_Birth', $this->Auth_Date_Of_Birth, true);
        $criteria->compare('Auth_Place_Of_Birth_Id', $this->Auth_Place_Of_Birth_Id);
        $criteria->compare('Auth_Birth_Country_Id', $this->Auth_Birth_Country_Id);
        $criteria->compare('Auth_Nationality_Id', $this->Auth_Nationality_Id);
        $criteria->compare('Auth_Language_Id', $this->Auth_Language_Id);
        $criteria->compare('Auth_Identity_Number', $this->Auth_Identity_Number, true);
        $criteria->compare('Auth_Marital_Status_Id', $this->Auth_Marital_Status_Id);
        $criteria->compare('Auth_Spouse_Name', $this->Auth_Spouse_Name, true);
        $criteria->compare('Auth_Gender', $this->Auth_Gender, true);
        $criteria->compare('Active', $this->Active, true);
        $criteria->compare('Date(Created_Date)', $this->Created_Date, true);
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
     * @return AuthorAccount the static model class
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
            $gen_inter_model = InternalcodeGenerate::model()->find("Gen_User_Type = :type", array(':type' => 'A'));
            $gen_inter_model->Gen_Inter_Code += 1;
            $gen_inter_model->save(false);
        }
    }
}
