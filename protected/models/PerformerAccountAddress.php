<?php

/**
 * This is the model class for table "{{performer_account_address}}".
 *
 * The followings are the available columns in table '{{performer_account_address}}':
 * @property integer $Perf_Addr_Id
 * @property integer $Perf_Acc_Id
 * @property string $Perf_Home_Address_1
 * @property string $Perf_Home_Address_2
 * @property string $Perf_Home_Address_3
 * @property string $Perf_Home_Fax
 * @property string $Perf_Home_Telephone
 * @property string $Perf_Home_Email
 * @property string $Perf_Home_Website
 * @property string $Perf_Mailing_Address_1
 * @property string $Perf_Mailing_Address_2
 * @property string $Perf_Mailing_Address_3
 * @property string $Perf_Mailing_Telephone
 * @property string $Perf_Mailing_Fax
 * @property string $Perf_Mailing_Email
 * @property string $Perf_Mailing_Website
 * @property string $Perf_Author_Account_1
 * @property string $Perf_Author_Account_2
 * @property string $Perf_Author_Account_3
 * @property string $Perf_Performer_Account_1
 * @property string $Perf_Performer_Account_2
 * @property string $Perf_Performer_Account_3
 * @property string $Perf_Unknown_Address
 * @property string $Active
 * @property string $Created_Date
 * @property string $Rowversion
 *
 * The followings are the available model relations:
 * @property PerformerAccount $perfAcc
 */
class PerformerAccountAddress extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{performer_account_address}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Perf_Acc_Id, Perf_Home_Address_1, Perf_Home_Telephone, Perf_Home_Email, Perf_Mailing_Address_1, Perf_Mailing_Telephone, Perf_Mailing_Email', 'required'),
            array('Perf_Acc_Id', 'numerical', 'integerOnly' => true),
            array('Perf_Home_Email, Perf_Mailing_Email', 'email'),
            array('Perf_Home_Website, Perf_Mailing_Website', 'url'),
            array('Perf_Home_Address_1, Perf_Home_Address_2, Perf_Home_Address_3, Perf_Mailing_Address_1, Perf_Mailing_Address_2, Perf_Mailing_Address_3, Perf_Author_Account_1, Perf_Author_Account_2, Perf_Author_Account_3, Perf_Performer_Account_1, Perf_Performer_Account_2, Perf_Performer_Account_3', 'length', 'max' => 255),
            array('Perf_Home_Fax, Perf_Home_Telephone, Perf_Mailing_Telephone, Perf_Mailing_Fax', 'length', 'max' => 25),
            array('Perf_Home_Email, Perf_Mailing_Email', 'length', 'max' => 50),
            array('Perf_Home_Website, Perf_Mailing_Website', 'length', 'max' => 100),
            array('Perf_Unknown_Address, Active', 'length', 'max' => 1),
            array('Created_Date, Rowversion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Perf_Addr_Id, Perf_Acc_Id, Perf_Home_Address_1, Perf_Home_Address_2, Perf_Home_Address_3, Perf_Home_Fax, Perf_Home_Telephone, Perf_Home_Email, Perf_Home_Website, Perf_Mailing_Address_1, Perf_Mailing_Address_2, Perf_Mailing_Address_3, Perf_Mailing_Telephone, Perf_Mailing_Fax, Perf_Mailing_Email, Perf_Mailing_Website, Perf_Performer_Account_1, Perf_Performer_Account_2, Perf_Performer_Account_3, Perf_Performer_Account_1, Perf_Performer_Account_2, Perf_Performer_Account_3, Perf_Unknown_Address, Active, Created_Date, Rowversion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'perfAcc' => array(self::BELONGS_TO, 'PerformerAccount', 'Perf_Acc_Id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Perf_Addr_Id' => 'Perf Addr',
            'Perf_Acc_Id' => 'Perf Acc',
            'Perf_Home_Address_1' => 'Home Address',
            'Perf_Home_Address_2' => 'Address 2',
            'Perf_Home_Address_3' => 'Address 3',
            'Perf_Home_Fax' => 'Fax',
            'Perf_Home_Telephone' => 'Telephone',
            'Perf_Home_Email' => 'Email',
            'Perf_Home_Website' => 'Website',
            'Perf_Mailing_Address_1' => 'Mailing Address',
            'Perf_Mailing_Address_2' => 'Address 2',
            'Perf_Mailing_Address_3' => 'Address 3',
            'Perf_Mailing_Telephone' => 'Telephone',
            'Perf_Mailing_Fax' => 'Fax',
            'Perf_Mailing_Email' => 'Email',
            'Perf_Mailing_Website' => 'Website',
            'Perf_Author_Account_1' => 'Author Account 1',
            'Perf_Author_Account_2' => 'Author Account 2',
            'Perf_Author_Account_3' => 'Author Account 3',
            'Perf_Performer_Account_1' => 'Performer Account 1',
            'Perf_Performer_Account_2' => 'Performer Account 2',
            'Perf_Performer_Account_3' => 'Performer Account 3',
            'Perf_Unknown_Address' => 'Unknown Address',
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

        $criteria->compare('Perf_Addr_Id', $this->Perf_Addr_Id);
        $criteria->compare('Perf_Acc_Id', $this->Perf_Acc_Id);
        $criteria->compare('Perf_Home_Address_1', $this->Perf_Home_Address_1, true);
        $criteria->compare('Perf_Home_Address_2', $this->Perf_Home_Address_2, true);
        $criteria->compare('Perf_Home_Address_3', $this->Perf_Home_Address_3, true);
        $criteria->compare('Perf_Home_Fax', $this->Perf_Home_Fax, true);
        $criteria->compare('Perf_Home_Telephone', $this->Perf_Home_Telephone, true);
        $criteria->compare('Perf_Home_Email', $this->Perf_Home_Email, true);
        $criteria->compare('Perf_Home_Website', $this->Perf_Home_Website, true);
        $criteria->compare('Perf_Mailing_Address_1', $this->Perf_Mailing_Address_1, true);
        $criteria->compare('Perf_Mailing_Address_2', $this->Perf_Mailing_Address_2, true);
        $criteria->compare('Perf_Mailing_Address_3', $this->Perf_Mailing_Address_3, true);
        $criteria->compare('Perf_Mailing_Telephone', $this->Perf_Mailing_Telephone, true);
        $criteria->compare('Perf_Mailing_Fax', $this->Perf_Mailing_Fax, true);
        $criteria->compare('Perf_Mailing_Email', $this->Perf_Mailing_Email, true);
        $criteria->compare('Perf_Mailing_Website', $this->Perf_Mailing_Website, true);
        $criteria->compare('Perf_Performer_Account_1', $this->Perf_Performer_Account_1, true);
        $criteria->compare('Perf_Performer_Account_2', $this->Perf_Performer_Account_2, true);
        $criteria->compare('Perf_Performer_Account_3', $this->Perf_Performer_Account_3, true);
        $criteria->compare('Perf_Performer_Account_1', $this->Perf_Performer_Account_1, true);
        $criteria->compare('Perf_Performer_Account_2', $this->Perf_Performer_Account_2, true);
        $criteria->compare('Perf_Performer_Account_3', $this->Perf_Performer_Account_3, true);
        $criteria->compare('Perf_Unknown_Address', $this->Perf_Unknown_Address, true);
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
     * @return PerformerAccountAddress the static model class
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
        PerformerAccount::afterTabsave('AuthorAccountAddress', 'authorAccountAddresses');
        parent::afterSave();
    }

}
