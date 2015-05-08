<?php

/**
 * This is the model class for table "{{publisher_account_address}}".
 *
 * The followings are the available columns in table '{{publisher_account_address}}':
 * @property integer $Pub_Addr_Id
 * @property integer $Pub_Acc_Id
 * @property string $Pub_Head_Address_1
 * @property string $Pub_Head_Address_2
 * @property string $Pub_Head_Address_3
 * @property string $Pub_Head_Fax
 * @property string $Pub_Head_Telephone
 * @property string $Pub_Head_Email
 * @property string $Pub_Head_Website
 * @property string $Pub_Mailing_Address_1
 * @property string $Pub_Mailing_Address_2
 * @property string $Pub_Mailing_Address_3
 * @property string $Pub_Mailing_Telephone
 * @property string $Pub_Mailing_Fax
 * @property string $Pub_Mailing_Email
 * @property string $Pub_Mailing_Website
 * @property string $Pub_Publisher_Account_1
 * @property string $Pub_Publisher_Account_2
 * @property string $Pub_Publisher_Account_3
 * @property string $Pub_Producer_Account_1
 * @property string $Pub_Producer_Account_2
 * @property string $Pub_Producer_Account_3
 * @property string $Pub_Unknown_Address
 * @property integer $Pub_Addr_Country_Id
 * @property string $Active
 * @property string $Created_Date
 * @property string $Rowversion
 *
 * The followings are the available model relations:
 * @property PublisherAccount $pubAcc
 */
class PublisherAccountAddress extends CActiveRecord {

    public function init() {
        parent::init();
        if($this->isNewRecord){
            $this->Pub_Addr_Country_Id = DEFAULT_COUNTRY_ID;
        }
    }
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{publisher_account_address}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Pub_Acc_Id, Pub_Head_Address_1, Pub_Head_Telephone, Pub_Head_Email, Pub_Mailing_Address_1, Pub_Mailing_Telephone, Pub_Mailing_Email', 'required'),
            array('Pub_Acc_Id, Pub_Addr_Country_Id', 'numerical', 'integerOnly' => true),
            array('Pub_Head_Address_1, Pub_Head_Address_2, Pub_Head_Address_3, Pub_Mailing_Address_1, Pub_Mailing_Address_2, Pub_Mailing_Address_3, Pub_Publisher_Account_1, Pub_Publisher_Account_2, Pub_Publisher_Account_3, Pub_Producer_Account_1, Pub_Producer_Account_2, Pub_Producer_Account_3', 'length', 'max' => 255),
            array('Pub_Head_Fax, Pub_Head_Telephone, Pub_Mailing_Telephone, Pub_Mailing_Fax', 'length', 'max' => 25),
            array('Pub_Head_Email, Pub_Mailing_Email', 'length', 'max' => 50),
            array('Pub_Head_Website, Pub_Mailing_Website', 'length', 'max' => 100),
            array('Pub_Unknown_Address, Active', 'length', 'max' => 1),
            array('Pub_Head_Email, Pub_Mailing_Email', 'email'),
            array('Pub_Head_Website, Pub_Mailing_Website', 'url'),
            array('Created_Date, Rowversion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Pub_Addr_Id, Pub_Acc_Id, Pub_Head_Address_1, Pub_Head_Address_2, Pub_Head_Address_3, Pub_Head_Fax, Pub_Head_Telephone, Pub_Head_Email, Pub_Head_Website, Pub_Mailing_Address_1, Pub_Mailing_Address_2, Pub_Mailing_Address_3, Pub_Mailing_Telephone, Pub_Mailing_Fax, Pub_Mailing_Email, Pub_Mailing_Website, Pub_Publisher_Account_1, Pub_Publisher_Account_2, Pub_Publisher_Account_3, Pub_Producer_Account_1, Pub_Producer_Account_2, Pub_Producer_Account_3, Pub_Unknown_Address, Active, Created_Date, Rowversion, Pub_Addr_Country_Id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'pubAcc' => array(self::BELONGS_TO, 'PublisherAccount', 'Pub_Acc_Id'),
            'pubCountry' => array(self::BELONGS_TO, 'MasterCountry', 'Pub_Addr_Country_Id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Pub_Addr_Id' => 'Pub Addr',
            'Pub_Acc_Id' => 'Publisher Account',
            'Pub_Head_Address_1' => 'Home Address 1',
            'Pub_Head_Address_2' => 'Address 2',
            'Pub_Head_Address_3' => 'Address 3',
            'Pub_Head_Fax' => 'Fax',
            'Pub_Head_Telephone' => 'Telephone',
            'Pub_Head_Email' => 'Email',
            'Pub_Head_Website' => 'Website',
            'Pub_Mailing_Address_1' => 'Mailing Address 1',
            'Pub_Mailing_Address_2' => 'Address 2',
            'Pub_Mailing_Address_3' => 'Address 3',
            'Pub_Mailing_Telephone' => 'Telephone',
            'Pub_Mailing_Fax' => 'Fax',
            'Pub_Mailing_Email' => 'Email',
            'Pub_Mailing_Website' => 'Website',
            'Pub_Publisher_Account_1' => 'Publisher Account 1',
            'Pub_Publisher_Account_2' => 'Publisher Account 2',
            'Pub_Publisher_Account_3' => 'Publisher Account 3',
            'Pub_Producer_Account_1' => 'Producer Account 1',
            'Pub_Producer_Account_2' => 'Producer Account 2',
            'Pub_Producer_Account_3' => 'Producer Account 3',
            'Pub_Unknown_Address' => 'Unknown Address',
            'Pub_Addr_Country_Id' => 'Country of Residence',
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

        $criteria->compare('Pub_Addr_Id', $this->Pub_Addr_Id);
        $criteria->compare('Pub_Acc_Id', $this->Pub_Acc_Id);
        $criteria->compare('Pub_Head_Address_1', $this->Pub_Head_Address_1, true);
        $criteria->compare('Pub_Head_Address_2', $this->Pub_Head_Address_2, true);
        $criteria->compare('Pub_Head_Address_3', $this->Pub_Head_Address_3, true);
        $criteria->compare('Pub_Head_Fax', $this->Pub_Head_Fax, true);
        $criteria->compare('Pub_Head_Telephone', $this->Pub_Head_Telephone, true);
        $criteria->compare('Pub_Head_Email', $this->Pub_Head_Email, true);
        $criteria->compare('Pub_Head_Website', $this->Pub_Head_Website, true);
        $criteria->compare('Pub_Mailing_Address_1', $this->Pub_Mailing_Address_1, true);
        $criteria->compare('Pub_Mailing_Address_2', $this->Pub_Mailing_Address_2, true);
        $criteria->compare('Pub_Mailing_Address_3', $this->Pub_Mailing_Address_3, true);
        $criteria->compare('Pub_Mailing_Telephone', $this->Pub_Mailing_Telephone, true);
        $criteria->compare('Pub_Mailing_Fax', $this->Pub_Mailing_Fax, true);
        $criteria->compare('Pub_Mailing_Email', $this->Pub_Mailing_Email, true);
        $criteria->compare('Pub_Mailing_Website', $this->Pub_Mailing_Website, true);
        $criteria->compare('Pub_Publisher_Account_1', $this->Pub_Publisher_Account_1, true);
        $criteria->compare('Pub_Publisher_Account_2', $this->Pub_Publisher_Account_2, true);
        $criteria->compare('Pub_Publisher_Account_3', $this->Pub_Publisher_Account_3, true);
        $criteria->compare('Pub_Producer_Account_1', $this->Pub_Producer_Account_1, true);
        $criteria->compare('Pub_Producer_Account_2', $this->Pub_Producer_Account_2, true);
        $criteria->compare('Pub_Producer_Account_3', $this->Pub_Producer_Account_3, true);
        $criteria->compare('Pub_Unknown_Address', $this->Pub_Unknown_Address, true);
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
     * @return PublisherAccountAddress the static model class
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
