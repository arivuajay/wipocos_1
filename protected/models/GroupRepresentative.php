<?php

/**
 * This is the model class for table "{{group_representative}}".
 *
 * The followings are the available columns in table '{{group_representative}}':
 * @property integer $Group_Addr_Id
 * @property integer $Group_Id
 * @property string $Group_Rep_Name
 * @property string $Group_Rep_Address_1
 * @property string $Group_Rep_Address_2
 * @property string $Group_Rep_Address_3
 * @property string $Group_Rep_Address_4
 * @property string $Group_Home_Address_1
 * @property string $Group_Home_Address_2
 * @property string $Group_Home_Address_3
 * @property string $Group_Home_Address_4
 * @property string $Group_Home_Fax
 * @property string $Group_Home_Telephone
 * @property string $Group_Home_Email
 * @property string $Group_Home_Website
 * @property string $Group_Mailing_Address_1
 * @property string $Group_Mailing_Address_2
 * @property string $Group_Mailing_Address_3
 * @property string $Group_Mailing_Address_4
 * @property string $Group_Mailing_Telephone
 * @property string $Group_Mailing_Fax
 * @property string $Group_Mailing_Email
 * @property string $Group_Mailing_Website
 * @property integer $Group_Country_Id
 * @property string $Group_Unknown_Address
 * @property string $Active
 * @property string $Created_Date
 * @property string $Rowversion
 *
 * The followings are the available model relations:
 * @property $group
 * @property MasterCountry $groupCountry
 */
class GroupRepresentative extends RActiveRecord {

    public function init() {
        parent::init();
        if($this->isNewRecord){
            $this->Group_Country_Id = DEFAULT_COUNTRY_ID;
        }
    }
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{group_representative}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Group_Id', 'required'),
            array('Group_Rep_Name, Group_Country_Id', 'customRequired'), //Group_Home_Address_1, Group_Mailing_Address_1
            array('Group_Id, Group_Country_Id, Created_By, Updated_By', 'numerical', 'integerOnly' => true),
            array('Group_Rep_Name, Group_Home_Website, Group_Mailing_Website', 'length', 'max' => 100),
            array('Group_Rep_Address_1, Group_Rep_Address_2, Group_Rep_Address_3, Group_Rep_Address_4, Group_Home_Address_2, Group_Home_Address_3, Group_Home_Address_4, Group_Mailing_Address_2, Group_Mailing_Address_3, Group_Mailing_Address_4', 'length', 'max' => 255),
            array('Group_Home_Fax, Group_Home_Telephone, Group_Mailing_Telephone, Group_Mailing_Fax', 'length', 'max' => 25),
            array('Group_Home_Email, Group_Mailing_Email', 'length', 'max' => 50),
            array('Group_Home_Email, Group_Mailing_Email', 'email'),
            array('Group_Home_Website, Group_Mailing_Website', 'url'),
            array('Group_Unknown_Address, Active', 'length', 'max' => 1),
            array('Created_Date, Rowversion, Created_By, Updated_By', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Group_Addr_Id, Group_Id, Group_Rep_Name, Group_Rep_Address_1, Group_Rep_Address_2, Group_Rep_Address_3, Group_Rep_Address_4, Group_Home_Address_1, Group_Home_Address_2, Group_Home_Address_3, Group_Home_Address_4, Group_Home_Fax, Group_Home_Telephone, Group_Home_Email, Group_Home_Website, Group_Mailing_Address_1, Group_Mailing_Address_2, Group_Mailing_Address_3, Group_Mailing_Address_4, Group_Mailing_Telephone, Group_Mailing_Fax, Group_Mailing_Email, Group_Mailing_Website, Group_Country_Id, Group_Unknown_Address, Active, Created_Date, Rowversion', 'safe', 'on' => 'search'),
        );
    }

    public function customRequired($attribute, $params) {
        if ($this->Group_Unknown_Address == 'N') {
            if ($this->$attribute == '')
                $this->addError($attribute, "{$this->getAttributeLabel($attribute)} cannot be blank.");
        }
    }
    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'group' => array(self::BELONGS_TO, 'Group', 'Group_Id'),
            'groupCountry' => array(self::BELONGS_TO, 'MasterCountry', 'Group_Country_Id'),
            'createdBy' => array(self::BELONGS_TO, 'User', 'Created_By'),
            'updatedBy' => array(self::BELONGS_TO, 'User', 'Updated_By'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Group_Addr_Id' => 'Addr',
            'Group_Id' => 'Group',
            'Group_Rep_Name' => 'Rep Name',
            'Group_Rep_Address_1' => 'Rep Address',
            'Group_Rep_Address_2' => 'Rep Address 2',
            'Group_Rep_Address_3' => 'Rep Address 3',
            'Group_Rep_Address_4' => 'Rep Address 4',
            'Group_Home_Address_1' => 'Home Address',
            'Group_Home_Address_2' => 'Home Address 2',
            'Group_Home_Address_3' => 'Home Address 3',
            'Group_Home_Address_4' => 'Home Address 4',
            'Group_Home_Fax' => 'Home Fax',
            'Group_Home_Telephone' => 'Home Telephone',
            'Group_Home_Email' => 'Home Email',
            'Group_Home_Website' => 'Home Website',
            'Group_Mailing_Address_1' => 'Mailing Address',
            'Group_Mailing_Address_2' => 'Mailing Address 2',
            'Group_Mailing_Address_3' => 'Mailing Address 3',
            'Group_Mailing_Address_4' => 'Mailing Address 4',
            'Group_Mailing_Telephone' => 'Mailing Telephone',
            'Group_Mailing_Fax' => 'Mailing Fax',
            'Group_Mailing_Email' => 'Mailing Email',
            'Group_Mailing_Website' => 'Mailing Website',
            'Group_Country_Id' => 'Country',
            'Group_Unknown_Address' => 'Unknown Address',
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

        $criteria->compare('Group_Addr_Id', $this->Group_Addr_Id);
        $criteria->compare('Group_Id', $this->Group_Id);
        $criteria->compare('Group_Rep_Name', $this->Group_Rep_Name, true);
        $criteria->compare('Group_Rep_Address_1', $this->Group_Rep_Address_1, true);
        $criteria->compare('Group_Rep_Address_2', $this->Group_Rep_Address_2, true);
        $criteria->compare('Group_Rep_Address_3', $this->Group_Rep_Address_3, true);
        $criteria->compare('Group_Rep_Address_4', $this->Group_Rep_Address_4, true);
        $criteria->compare('Group_Home_Address_1', $this->Group_Home_Address_1, true);
        $criteria->compare('Group_Home_Address_2', $this->Group_Home_Address_2, true);
        $criteria->compare('Group_Home_Address_3', $this->Group_Home_Address_3, true);
        $criteria->compare('Group_Home_Address_4', $this->Group_Home_Address_4, true);
        $criteria->compare('Group_Home_Fax', $this->Group_Home_Fax, true);
        $criteria->compare('Group_Home_Telephone', $this->Group_Home_Telephone, true);
        $criteria->compare('Group_Home_Email', $this->Group_Home_Email, true);
        $criteria->compare('Group_Home_Website', $this->Group_Home_Website, true);
        $criteria->compare('Group_Mailing_Address_1', $this->Group_Mailing_Address_1, true);
        $criteria->compare('Group_Mailing_Address_2', $this->Group_Mailing_Address_2, true);
        $criteria->compare('Group_Mailing_Address_3', $this->Group_Mailing_Address_3, true);
        $criteria->compare('Group_Mailing_Address_4', $this->Group_Mailing_Address_4, true);
        $criteria->compare('Group_Mailing_Telephone', $this->Group_Mailing_Telephone, true);
        $criteria->compare('Group_Mailing_Fax', $this->Group_Mailing_Fax, true);
        $criteria->compare('Group_Mailing_Email', $this->Group_Mailing_Email, true);
        $criteria->compare('Group_Mailing_Website', $this->Group_Mailing_Website, true);
        $criteria->compare('Group_Country_Id', $this->Group_Country_Id);
        $criteria->compare('Group_Unknown_Address', $this->Group_Unknown_Address, true);
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
     * @return GroupRepresentative the static model class
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
