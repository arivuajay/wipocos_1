<?php

/**
 * This is the model class for table "{{producer_account_address}}".
 *
 * The followings are the available columns in table '{{producer_account_address}}':
 * @property integer $Pro_Addr_Id
 * @property integer $Pro_Acc_Id
 * @property string $Pro_Head_Address_1
 * @property string $Pro_Head_Address_2
 * @property string $Pro_Head_Address_3
 * @property string $Pro_Head_Fax
 * @property string $Pro_Head_Telephone
 * @property string $Pro_Head_Email
 * @property string $Pro_Head_Website
 * @property string $Pro_Mailing_Address_1
 * @property string $Pro_Mailing_Address_2
 * @property string $Pro_Mailing_Address_3
 * @property string $Pro_Mailing_Telephone
 * @property string $Pro_Mailing_Fax
 * @property string $Pro_Mailing_Email
 * @property string $Pro_Mailing_Website
 * @property string $Pro_Publisher_Account_1
 * @property string $Pro_Publisher_Account_2
 * @property string $Pro_Publisher_Account_3
 * @property string $Pro_Producer_Account_1
 * @property string $Pro_Producer_Account_2
 * @property string $Pro_Producer_Account_3
 * @property integer $Pro_Addr_Country_Id
 * @property string $Pro_Unknown_Address
 * @property string $Active
 * @property string $Created_Date
 * @property string $Rowversion
 *
 * The followings are the available model relations:
 * @property MasterCountry $proAddrCountry
 * @property ProducerAccount $proAcc
 */
class ProducerAccountAddress extends RActiveRecord {

    public $after_save_enable = true;
    
    public function init() {
        parent::init();
        if($this->isNewRecord){
            $this->Pro_Addr_Country_Id = DEFAULT_COUNTRY_ID;
        }
    }
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{producer_account_address}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Pro_Acc_Id, Pro_Head_Address_1, Pro_Head_Telephone, Pro_Head_Email, Pro_Mailing_Address_1, Pro_Mailing_Telephone, Pro_Mailing_Email', 'required'),
            array('Pro_Acc_Id, Pro_Addr_Country_Id, Created_By, Updated_By', 'numerical', 'integerOnly' => true),
            array('Pro_Head_Address_1, Pro_Head_Address_2, Pro_Head_Address_3, Pro_Mailing_Address_1, Pro_Mailing_Address_2, Pro_Mailing_Address_3, Pro_Publisher_Account_1, Pro_Publisher_Account_2, Pro_Publisher_Account_3, Pro_Producer_Account_1, Pro_Producer_Account_2, Pro_Producer_Account_3', 'length', 'max' => 255),
            array('Pro_Head_Fax, Pro_Head_Telephone, Pro_Mailing_Telephone, Pro_Mailing_Fax', 'length', 'max' => 25),
            array('Pro_Head_Email, Pro_Mailing_Email', 'length', 'max' => 50),
            array('Pro_Head_Website, Pro_Mailing_Website', 'length', 'max' => 100),
            array('Pro_Unknown_Address, Active', 'length', 'max' => 1),
            array('Pro_Head_Email, Pro_Mailing_Email', 'email'),
            array('Pro_Head_Website, Pro_Mailing_Website', 'url'),
            array('Created_Date, Rowversion, Created_By, Updated_By', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Pro_Addr_Id, Pro_Acc_Id, Pro_Head_Address_1, Pro_Head_Address_2, Pro_Head_Address_3, Pro_Head_Fax, Pro_Head_Telephone, Pro_Head_Email, Pro_Head_Website, Pro_Mailing_Address_1, Pro_Mailing_Address_2, Pro_Mailing_Address_3, Pro_Mailing_Telephone, Pro_Mailing_Fax, Pro_Mailing_Email, Pro_Mailing_Website, Pro_Publisher_Account_1, Pro_Publisher_Account_2, Pro_Publisher_Account_3, Pro_Producer_Account_1, Pro_Producer_Account_2, Pro_Producer_Account_3, Pro_Addr_Country_Id, Pro_Unknown_Address, Active, Created_Date, Rowversion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'proAddrCountry' => array(self::BELONGS_TO, 'MasterCountry', 'Pro_Addr_Country_Id'),
            'proAcc' => array(self::BELONGS_TO, 'ProducerAccount', 'Pro_Acc_Id'),
            'createdBy' => array(self::BELONGS_TO, 'User', 'Created_By'),
            'updatedBy' => array(self::BELONGS_TO, 'User', 'Updated_By'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Pro_Addr_Id' => 'Addr',
            'Pro_Acc_Id' => 'Acc',
            'Pro_Head_Address_1' => 'Home Address',
            'Pro_Head_Address_2' => 'Address 2',
            'Pro_Head_Address_3' => 'Address 3',
            'Pro_Head_Fax' => 'Fax',
            'Pro_Head_Telephone' => 'Telephone',
            'Pro_Head_Email' => 'Email',
            'Pro_Head_Website' => 'Website',
            'Pro_Mailing_Address_1' => 'Mailing Address',
            'Pro_Mailing_Address_2' => 'Address 2',
            'Pro_Mailing_Address_3' => 'Address 3',
            'Pro_Mailing_Telephone' => 'Telephone',
            'Pro_Mailing_Fax' => 'Fax',
            'Pro_Mailing_Email' => 'Email',
            'Pro_Mailing_Website' => 'Website',
            'Pro_Publisher_Account_1' => 'Publisher Account 1',
            'Pro_Publisher_Account_2' => 'Publisher Account 2',
            'Pro_Publisher_Account_3' => 'Publisher Account 3',
            'Pro_Producer_Account_1' => 'Producer Account 1',
            'Pro_Producer_Account_2' => 'Producer Account 2',
            'Pro_Producer_Account_3' => 'Producer Account 3',
            'Pro_Addr_Country_Id' => 'Country of Residenece',
            'Pro_Unknown_Address' => 'Unknown Address',
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

        $criteria->compare('Pro_Addr_Id', $this->Pro_Addr_Id);
        $criteria->compare('Pro_Acc_Id', $this->Pro_Acc_Id);
        $criteria->compare('Pro_Head_Address_1', $this->Pro_Head_Address_1, true);
        $criteria->compare('Pro_Head_Address_2', $this->Pro_Head_Address_2, true);
        $criteria->compare('Pro_Head_Address_3', $this->Pro_Head_Address_3, true);
        $criteria->compare('Pro_Head_Fax', $this->Pro_Head_Fax, true);
        $criteria->compare('Pro_Head_Telephone', $this->Pro_Head_Telephone, true);
        $criteria->compare('Pro_Head_Email', $this->Pro_Head_Email, true);
        $criteria->compare('Pro_Head_Website', $this->Pro_Head_Website, true);
        $criteria->compare('Pro_Mailing_Address_1', $this->Pro_Mailing_Address_1, true);
        $criteria->compare('Pro_Mailing_Address_2', $this->Pro_Mailing_Address_2, true);
        $criteria->compare('Pro_Mailing_Address_3', $this->Pro_Mailing_Address_3, true);
        $criteria->compare('Pro_Mailing_Telephone', $this->Pro_Mailing_Telephone, true);
        $criteria->compare('Pro_Mailing_Fax', $this->Pro_Mailing_Fax, true);
        $criteria->compare('Pro_Mailing_Email', $this->Pro_Mailing_Email, true);
        $criteria->compare('Pro_Mailing_Website', $this->Pro_Mailing_Website, true);
        $criteria->compare('Pro_Publisher_Account_1', $this->Pro_Publisher_Account_1, true);
        $criteria->compare('Pro_Publisher_Account_2', $this->Pro_Publisher_Account_2, true);
        $criteria->compare('Pro_Publisher_Account_3', $this->Pro_Publisher_Account_3, true);
        $criteria->compare('Pro_Producer_Account_1', $this->Pro_Producer_Account_1, true);
        $criteria->compare('Pro_Producer_Account_2', $this->Pro_Producer_Account_2, true);
        $criteria->compare('Pro_Producer_Account_3', $this->Pro_Producer_Account_3, true);
        $criteria->compare('Pro_Addr_Country_Id', $this->Pro_Addr_Country_Id);
        $criteria->compare('Pro_Unknown_Address', $this->Pro_Unknown_Address, true);
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
     * @return ProducerAccountAddress the static model class
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
        ProducerAccount::afterTabsave('PublisherAccountAddress', 'publisherAccountAddresses');
        return parent::afterSave();
    }
}
