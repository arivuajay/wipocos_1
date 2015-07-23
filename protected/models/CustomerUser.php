<?php

/**
 * This is the model class for table "{{customer_user}}".
 *
 * The followings are the available columns in table '{{customer_user}}':
 * @property integer $User_Cust_Id
 * @property string $User_Cust_GUID
 * @property integer $User_Cust_Place_Id
 * @property string $User_Cust_Code
 * @property string $User_Cust_Name
 * @property string $User_Cust_Address
 * @property string $User_Cust_Email
 * @property string $User_Cust_Telephone
 * @property string $User_Cust_Website
 * @property string $User_Cust_Fax
 * @property string $Created_Date
 * @property string $Rowversion
 * @property integer $Created_By
 * @property integer $Updated_By
 *
 * The followings are the available model relations:
 * @property MasterPlace $userCustPlace
 */
class CustomerUser extends RActiveRecord {

    public function init() {
        parent::init();
        if($this->isNewRecord){
            $this->User_Cust_GUID = Myclass::guid(false);
        }
    }
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{customer_user}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('User_Cust_GUID, User_Cust_Place_Id, User_Cust_Code, User_Cust_Name', 'required'),
            array('User_Cust_Place_Id, Created_By, Updated_By', 'numerical', 'integerOnly' => true),
            array('User_Cust_GUID', 'length', 'max' => 40),
            array('User_Cust_Code', 'length', 'max' => 25),
            array('User_Cust_Name, User_Cust_Email, User_Cust_Website', 'length', 'max' => 100),
            array('User_Cust_Address', 'length', 'max' => 255),
            array('User_Cust_Telephone, User_Cust_Fax', 'length', 'max' => 50),
            array('User_Cust_GUID, User_Cust_Code', 'unique'),
            array('User_Cust_Email', 'email'),
            array('User_Cust_Website', 'url'),
            array('Created_Date, Rowversion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('User_Cust_Id, User_Cust_GUID, User_Cust_Place_Id, User_Cust_Code, User_Cust_Name, User_Cust_Address, User_Cust_Email, User_Cust_Telephone, User_Cust_Website, User_Cust_Fax, Created_Date, Rowversion, Created_By, Updated_By', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'userCustPlace' => array(self::BELONGS_TO, 'MasterPlace', 'User_Cust_Place_Id'),
            'createdBy' => array(self::BELONGS_TO, 'User', 'Created_By'),
            'updatedBy' => array(self::BELONGS_TO, 'User', 'Updated_By'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'User_Cust_Id' => 'User Cust',
            'User_Cust_GUID' => 'Guid',
            'User_Cust_Place_Id' => 'Type',
            'User_Cust_Code' => 'Code',
            'User_Cust_Name' => 'Name',
            'User_Cust_Address' => 'Address',
            'User_Cust_Email' => 'E-mail',
            'User_Cust_Telephone' => 'Telephone',
            'User_Cust_Website' => 'Web site',
            'User_Cust_Fax' => 'Fax',
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

        $criteria->compare('User_Cust_Id', $this->User_Cust_Id);
        $criteria->compare('User_Cust_GUID', $this->User_Cust_GUID, true);
        $criteria->compare('User_Cust_Place_Id', $this->User_Cust_Place_Id);
        $criteria->compare('User_Cust_Code', $this->User_Cust_Code, true);
        $criteria->compare('User_Cust_Name', $this->User_Cust_Name, true);
        $criteria->compare('User_Cust_Address', $this->User_Cust_Address, true);
        $criteria->compare('User_Cust_Email', $this->User_Cust_Email, true);
        $criteria->compare('User_Cust_Telephone', $this->User_Cust_Telephone, true);
        $criteria->compare('User_Cust_Website', $this->User_Cust_Website, true);
        $criteria->compare('User_Cust_Fax', $this->User_Cust_Fax, true);
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
     * @return CustomerUser the static model class
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
