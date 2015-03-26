<?php

/**
 * This is the model class for table "{{organization}}".
 *
 * The followings are the available columns in table '{{organization}}':
 * @property integer $Org_Id
 * @property string $Org_Code
 * @property string $Org_Abbrevation
 * @property integer $Org_Nation_Id
 * @property integer $Org_Country_Id
 * @property string $Org_Currency_Id
 * @property string $Org_Society_Type_Id
 * @property string $Org_Address
 * @property string $Org_Telephone
 * @property string $Org_Email
 * @property string $Org_Fax
 * @property string $Org_Website
 * @property string $Org_Bank_Account
 * @property integer $Org_Related_Rights
 *
 * The followings are the available model relations:
 * @property MasterCountry $socCountry
 * @property MasterNationality $orgNation
 */
class Organization extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{organization}}';
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
            array('Org_Code, Org_Abbrevation', 'required'),
            array('Org_Code', 'unique'),
            array('Org_Email', 'email'),
            array('Org_Website', 'url'),
            array('Org_Currency_Id, Org_Nation_Id, Org_Country_Id, Org_Related_Rights', 'numerical', 'integerOnly' => true),
            array('Org_Code', 'length', 'max' => 25),
            array('Org_Abbrevation, Org_Bank_Account', 'length', 'max' => 100),
            array('Org_Society_Type_Id, Org_Telephone, Org_Email, Org_Fax, Org_Website', 'length', 'max' => 50),
            array('Org_Address', 'safe'),
            array('Active', 'length', 'max' => 1),
            array('Created_Date, Rowversion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Org_Id, Org_Code, Org_Abbrevation, Org_Nation_Id, Org_Country_Id, Org_Currency_Id, Org_Society_Type_Id, Org_Address, Org_Telephone, Org_Email, Org_Fax, Org_Website, Org_Bank_Account, Org_Related_Rights, Active, Created_Date, Rowversion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'orgCountry' => array(self::BELONGS_TO, 'MasterCountry', 'Org_Country_Id'),
            'orgCurrency' => array(self::BELONGS_TO, 'MasterCurrency', 'Org_Currency_Id'),
            'orgNation' => array(self::BELONGS_TO, 'MasterNationality', 'Org_Nation_Id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Org_Id' => 'Org',
            'Org_Code' => 'Code',
            'Org_Abbrevation' => 'Abbrevation',
            'Org_Nation_Id' => 'Nation',
            'Org_Country_Id' => 'Country',
            'Org_Currency_Id' => 'Currency',
            'Org_Society_Type_Id' => 'Society Type',
            'Org_Address' => 'Address',
            'Org_Telephone' => 'Telephone',
            'Org_Email' => 'Email',
            'Org_Fax' => 'Fax',
            'Org_Website' => 'Website',
            'Org_Bank_Account' => 'Bank Account',
            'Org_Related_Rights' => 'Related Rights',
            'Active' => 'Active',
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

        $criteria->compare('Org_Id', $this->Org_Id);
        $criteria->compare('Org_Code', $this->Org_Code, true);
        $criteria->compare('Org_Abbrevation', $this->Org_Abbrevation, true);
        $criteria->compare('Org_Nation_Id', $this->Org_Nation_Id);
        $criteria->compare('Org_Country_Id', $this->Org_Country_Id);
        $criteria->compare('Org_Currency_Id', $this->Org_Currency_Id, true);
        $criteria->compare('Org_Society_Type_Id', $this->Org_Society_Type_Id, true);
        $criteria->compare('Org_Address', $this->Org_Address, true);
        $criteria->compare('Org_Telephone', $this->Org_Telephone, true);
        $criteria->compare('Org_Email', $this->Org_Email, true);
        $criteria->compare('Org_Fax', $this->Org_Fax, true);
        $criteria->compare('Org_Website', $this->Org_Website, true);
        $criteria->compare('Org_Bank_Account', $this->Org_Bank_Account, true);
        $criteria->compare('Org_Related_Rights', $this->Org_Related_Rights);
        $criteria->compare('Active', $this->Active, true);
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
     * @return Organization the static model class
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
