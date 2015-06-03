<?php

/**
 * This is the model class for table "{{author_account_address}}".
 *
 * The followings are the available columns in table '{{author_account_address}}':
 * @property integer $Auth_Addr_Id
 * @property integer $Auth_Acc_Id
 * @property string $Auth_Home_Address_1
 * @property string $Auth_Home_Address_2
 * @property string $Auth_Home_Address_3
 * @property string $Auth_Home_Fax
 * @property string $Auth_Home_Telephone
 * @property string $Auth_Home_Email
 * @property string $Auth_Home_Website
 * @property string $Auth_Mailing_Address_1
 * @property string $Auth_Mailing_Address_2
 * @property string $Auth_Mailing_Address_3
 * @property string $Auth_Mailing_Telephone
 * @property string $Auth_Mailing_Fax
 * @property string $Auth_Mailing_Email
 * @property string $Auth_Mailing_Website
 * @property string $Auth_Author_Account_1
 * @property string $Auth_Author_Account_2
 * @property string $Auth_Author_Account_3
 * @property string $Auth_Performer_Account_1
 * @property string $Auth_Performer_Account_2
 * @property string $Auth_Performer_Account_3
 * @property string $Auth_Unknown_Address
 * @property string $Active
 * @property string $Created_Date
 * @property string $Rowversion
 *
 * The followings are the available model relations:
 * @property AuthorAccount $authAcc
 */
class AuthorAccountAddress extends CActiveRecord {
    
    public $after_save_disable = true;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{author_account_address}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Auth_Acc_Id, Auth_Home_Address_1, Auth_Home_Telephone, Auth_Home_Email, Auth_Mailing_Address_1, Auth_Mailing_Telephone, Auth_Mailing_Email', 'required'),
            array('Auth_Acc_Id', 'numerical', 'integerOnly' => true),
            array('Auth_Home_Email, Auth_Mailing_Email', 'email'),
            array('Auth_Home_Website, Auth_Mailing_Website', 'url'),
            array('Auth_Home_Address_1, Auth_Home_Address_2, Auth_Home_Address_3, Auth_Mailing_Address_1, Auth_Mailing_Address_2, Auth_Mailing_Address_3, Auth_Author_Account_1, Auth_Author_Account_2, Auth_Author_Account_3, Auth_Performer_Account_1, Auth_Performer_Account_2, Auth_Performer_Account_3', 'length', 'max' => 255),
            array('Auth_Home_Fax, Auth_Home_Telephone, Auth_Mailing_Telephone, Auth_Mailing_Fax', 'length', 'max' => 25),
            array('Auth_Home_Email, Auth_Mailing_Email', 'length', 'max' => 50),
            array('Auth_Home_Website, Auth_Mailing_Website', 'length', 'max' => 100),
            array('Auth_Unknown_Address, Active', 'length', 'max' => 1),
            array('Created_Date, Rowversion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Auth_Addr_Id, Auth_Acc_Id, Auth_Home_Address_1, Auth_Home_Address_2, Auth_Home_Address_3, Auth_Home_Fax, Auth_Home_Telephone, Auth_Home_Email, Auth_Home_Website, Auth_Mailing_Address_1, Auth_Mailing_Address_2, Auth_Mailing_Address_3, Auth_Mailing_Telephone, Auth_Mailing_Fax, Auth_Mailing_Email, Auth_Mailing_Website, Auth_Author_Account_1, Auth_Author_Account_2, Auth_Author_Account_3, Auth_Performer_Account_1, Auth_Performer_Account_2, Auth_Performer_Account_3, Auth_Unknown_Address, Active, Created_Date, Rowversion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'authAcc' => array(self::BELONGS_TO, 'AuthorAccount', 'Auth_Acc_Id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Auth_Addr_Id' => 'Id',
            'Auth_Acc_Id' => 'Auth Acc',
            'Auth_Home_Address_1' => 'Home Address',
            'Auth_Home_Address_2' => 'Address 2',
            'Auth_Home_Address_3' => 'Address 3',
            'Auth_Home_Fax' => 'Fax',
            'Auth_Home_Telephone' => 'Telephone',
            'Auth_Home_Email' => 'Email',
            'Auth_Home_Website' => 'Website',
            'Auth_Mailing_Address_1' => 'Mailing Address',
            'Auth_Mailing_Address_2' => 'Address 2',
            'Auth_Mailing_Address_3' => 'Address 3',
            'Auth_Mailing_Telephone' => 'Telephone',
            'Auth_Mailing_Fax' => 'Fax',
            'Auth_Mailing_Email' => 'Email',
            'Auth_Mailing_Website' => 'Website',
            'Auth_Author_Account_1' => 'Author Account 1',
            'Auth_Author_Account_2' => 'Author Account 2',
            'Auth_Author_Account_3' => 'Author Account 3',
            'Auth_Performer_Account_1' => 'Performer Account 1',
            'Auth_Performer_Account_2' => 'Performer Account 2',
            'Auth_Performer_Account_3' => 'Performer Account 3',
            'Auth_Unknown_Address' => 'Unknown Address',
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

        $criteria->compare('Auth_Addr_Id', $this->Auth_Addr_Id);
        $criteria->compare('Auth_Acc_Id', $this->Auth_Acc_Id);
        $criteria->compare('Auth_Home_Address_1', $this->Auth_Home_Address_1, true);
        $criteria->compare('Auth_Home_Address_2', $this->Auth_Home_Address_2, true);
        $criteria->compare('Auth_Home_Address_3', $this->Auth_Home_Address_3, true);
        $criteria->compare('Auth_Home_Fax', $this->Auth_Home_Fax, true);
        $criteria->compare('Auth_Home_Telephone', $this->Auth_Home_Telephone, true);
        $criteria->compare('Auth_Home_Email', $this->Auth_Home_Email, true);
        $criteria->compare('Auth_Home_Website', $this->Auth_Home_Website, true);
        $criteria->compare('Auth_Mailing_Address_1', $this->Auth_Mailing_Address_1, true);
        $criteria->compare('Auth_Mailing_Address_2', $this->Auth_Mailing_Address_2, true);
        $criteria->compare('Auth_Mailing_Address_3', $this->Auth_Mailing_Address_3, true);
        $criteria->compare('Auth_Mailing_Telephone', $this->Auth_Mailing_Telephone, true);
        $criteria->compare('Auth_Mailing_Fax', $this->Auth_Mailing_Fax, true);
        $criteria->compare('Auth_Mailing_Email', $this->Auth_Mailing_Email, true);
        $criteria->compare('Auth_Mailing_Website', $this->Auth_Mailing_Website, true);
        $criteria->compare('Auth_Author_Account_1', $this->Auth_Author_Account_1, true);
        $criteria->compare('Auth_Author_Account_2', $this->Auth_Author_Account_2, true);
        $criteria->compare('Auth_Author_Account_3', $this->Auth_Author_Account_3, true);
        $criteria->compare('Auth_Performer_Account_1', $this->Auth_Performer_Account_1, true);
        $criteria->compare('Auth_Performer_Account_2', $this->Auth_Performer_Account_2, true);
        $criteria->compare('Auth_Performer_Account_3', $this->Auth_Performer_Account_3, true);
        $criteria->compare('Auth_Unknown_Address', $this->Auth_Unknown_Address, true);
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
     * @return AuthorAccountAddress the static model class
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
        if($this->after_save_disable){
            $performer_model = AuthorAccount::checkPerformer($this->authAcc->Auth_Internal_Code, false);
            if (!empty($performer_model)) {
                if(!empty($performer_model->performerAccountAddresses)){
                    $address_model = $performer_model->performerAccountAddresses;
                }else{
                    $address_model = new PerformerAccountAddress;
                    $address_model->Perf_Acc_Id = $performer_model->Perf_Acc_Id;
                }
                $ignore_list = Myclass::getAuthorconvertIgnorelist();
                foreach ($this->attributes as $key => $value) {
                    $attr_name = str_replace('Auth_', 'Perf_', $key);
                    !in_array($key, $ignore_list) ? $address_model->setAttribute($attr_name, $value) : '';
                }
                $address_model->save(false);
            }
        }
        return parent::afterSave();
    }

}
