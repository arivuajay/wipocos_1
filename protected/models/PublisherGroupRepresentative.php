<?php

/**
 * This is the model class for table "{{publisher_group_representative}}".
 *
 * The followings are the available columns in table '{{publisher_group_representative}}':
 * @property integer $Pub_Group_Addr_Id
 * @property integer $Pub_Group_Id
 * @property string $Pub_Group_Rep_Name
 * @property string $Pub_Group_Rep_Address_1
 * @property string $Pub_Group_Rep_Address_2
 * @property string $Pub_Group_Rep_Address_3
 * @property string $Pub_Group_Rep_Address_4
 * @property string $Pub_Group_Home_Address_1
 * @property string $Pub_Group_Home_Address_2
 * @property string $Pub_Group_Home_Address_3
 * @property string $Pub_Group_Home_Address_4
 * @property string $Pub_Group_Home_Fax
 * @property string $Pub_Group_Home_Telephone
 * @property string $Pub_Group_Home_Email
 * @property string $Pub_Group_Home_Website
 * @property string $Pub_Group_Mailing_Address_1
 * @property string $Pub_Group_Mailing_Address_2
 * @property string $Pub_Group_Mailing_Address_3
 * @property string $Pub_Group_Mailing_Address_4
 * @property string $Pub_Group_Mailing_Telephone
 * @property string $Pub_Group_Mailing_Fax
 * @property string $Pub_Group_Mailing_Email
 * @property string $Pub_Group_Mailing_Website
 * @property string $Pub_Group_Unknown_Address
 * @property string $Active
 * @property string $Created_Date
 * @property string $Rowversion
 *
 * The followings are the available model relations:
 * @property PublisherGroup $pubGroup
 */
class PublisherGroupRepresentative extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{publisher_group_representative}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Pub_Group_Id, Pub_Group_Rep_Name, Pub_Group_Home_Address_1, Pub_Group_Home_Telephone, Pub_Group_Home_Email, Pub_Group_Mailing_Address_1, Pub_Group_Mailing_Telephone, Pub_Group_Mailing_Email', 'required'),
            array('Pub_Group_Id', 'numerical', 'integerOnly' => true),
            array('Pub_Group_Rep_Name, Pub_Group_Home_Website, Pub_Group_Mailing_Website', 'length', 'max' => 100),
            array('Pub_Group_Rep_Address_1, Pub_Group_Rep_Address_2, Pub_Group_Rep_Address_3, Pub_Group_Rep_Address_4, Pub_Group_Home_Address_1, Pub_Group_Home_Address_2, Pub_Group_Home_Address_3, Pub_Group_Home_Address_4, Pub_Group_Mailing_Address_1, Pub_Group_Mailing_Address_2, Pub_Group_Mailing_Address_3, Pub_Group_Mailing_Address_4', 'length', 'max' => 255),
            array('Pub_Group_Home_Fax, Pub_Group_Home_Telephone, Pub_Group_Mailing_Telephone, Pub_Group_Mailing_Fax', 'length', 'max' => 25),
            array('Pub_Group_Home_Email, Pub_Group_Mailing_Email', 'length', 'max' => 50),
            array('Pub_Group_Unknown_Address, Active', 'length', 'max' => 1),
            array('Pub_Group_Home_Email, Pub_Group_Mailing_Email', 'email'),
            array('Created_Date, Rowversion', 'safe'),
            array(
                'Pub_Group_Rep_Name',
                'match', 'pattern' => '/^[a-zA-Z\s]+$/',
                'message' => 'Invalid characters',
            ),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Pub_Group_Addr_Id, Pub_Group_Id, Pub_Group_Rep_Name, Pub_Group_Rep_Address_1, Pub_Group_Rep_Address_2, Pub_Group_Rep_Address_3, Pub_Group_Rep_Address_4, Pub_Group_Home_Address_1, Pub_Group_Home_Address_2, Pub_Group_Home_Address_3, Pub_Group_Home_Address_4, Pub_Group_Home_Fax, Pub_Group_Home_Telephone, Pub_Group_Home_Email, Pub_Group_Home_Website, Pub_Group_Mailing_Address_1, Pub_Group_Mailing_Address_2, Pub_Group_Mailing_Address_3, Pub_Group_Mailing_Address_4, Pub_Group_Mailing_Telephone, Pub_Group_Mailing_Fax, Pub_Group_Mailing_Email, Pub_Group_Mailing_Website, Pub_Group_Unknown_Address, Active, Created_Date, Rowversion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'pubGroup' => array(self::BELONGS_TO, 'PublisherGroup', 'Pub_Group_Id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Pub_Group_Addr_Id' => 'Addr',
            'Pub_Group_Id' => 'Pub Group',
            'Pub_Group_Rep_Name' => 'Rep Name',
            'Pub_Group_Rep_Address_1' => 'Rep Address 1',
            'Pub_Group_Rep_Address_2' => 'Rep Address 2',
            'Pub_Group_Rep_Address_3' => 'Rep Address 3',
            'Pub_Group_Rep_Address_4' => 'Rep Address 4',
            'Pub_Group_Home_Address_1' => 'Home Address 1',
            'Pub_Group_Home_Address_2' => 'Home Address 2',
            'Pub_Group_Home_Address_3' => 'Home Address 3',
            'Pub_Group_Home_Address_4' => 'Home Address 4',
            'Pub_Group_Home_Fax' => 'Home Fax',
            'Pub_Group_Home_Telephone' => 'Home Telephone',
            'Pub_Group_Home_Email' => 'Home Email',
            'Pub_Group_Home_Website' => 'Home Website',
            'Pub_Group_Mailing_Address_1' => 'Mailing Address 1',
            'Pub_Group_Mailing_Address_2' => 'Mailing Address 2',
            'Pub_Group_Mailing_Address_3' => 'Mailing Address 3',
            'Pub_Group_Mailing_Address_4' => 'Mailing Address 4',
            'Pub_Group_Mailing_Telephone' => 'Mailing Telephone',
            'Pub_Group_Mailing_Fax' => 'Mailing Fax',
            'Pub_Group_Mailing_Email' => 'Mailing Email',
            'Pub_Group_Mailing_Website' => 'Mailing Website',
            'Pub_Group_Unknown_Address' => 'Unknown Address',
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

        $criteria->compare('Pub_Group_Addr_Id', $this->Pub_Group_Addr_Id);
        $criteria->compare('Pub_Group_Id', $this->Pub_Group_Id);
        $criteria->compare('Pub_Group_Rep_Name', $this->Pub_Group_Rep_Name, true);
        $criteria->compare('Pub_Group_Rep_Address_1', $this->Pub_Group_Rep_Address_1, true);
        $criteria->compare('Pub_Group_Rep_Address_2', $this->Pub_Group_Rep_Address_2, true);
        $criteria->compare('Pub_Group_Rep_Address_3', $this->Pub_Group_Rep_Address_3, true);
        $criteria->compare('Pub_Group_Rep_Address_4', $this->Pub_Group_Rep_Address_4, true);
        $criteria->compare('Pub_Group_Home_Address_1', $this->Pub_Group_Home_Address_1, true);
        $criteria->compare('Pub_Group_Home_Address_2', $this->Pub_Group_Home_Address_2, true);
        $criteria->compare('Pub_Group_Home_Address_3', $this->Pub_Group_Home_Address_3, true);
        $criteria->compare('Pub_Group_Home_Address_4', $this->Pub_Group_Home_Address_4, true);
        $criteria->compare('Pub_Group_Home_Fax', $this->Pub_Group_Home_Fax, true);
        $criteria->compare('Pub_Group_Home_Telephone', $this->Pub_Group_Home_Telephone, true);
        $criteria->compare('Pub_Group_Home_Email', $this->Pub_Group_Home_Email, true);
        $criteria->compare('Pub_Group_Home_Website', $this->Pub_Group_Home_Website, true);
        $criteria->compare('Pub_Group_Mailing_Address_1', $this->Pub_Group_Mailing_Address_1, true);
        $criteria->compare('Pub_Group_Mailing_Address_2', $this->Pub_Group_Mailing_Address_2, true);
        $criteria->compare('Pub_Group_Mailing_Address_3', $this->Pub_Group_Mailing_Address_3, true);
        $criteria->compare('Pub_Group_Mailing_Address_4', $this->Pub_Group_Mailing_Address_4, true);
        $criteria->compare('Pub_Group_Mailing_Telephone', $this->Pub_Group_Mailing_Telephone, true);
        $criteria->compare('Pub_Group_Mailing_Fax', $this->Pub_Group_Mailing_Fax, true);
        $criteria->compare('Pub_Group_Mailing_Email', $this->Pub_Group_Mailing_Email, true);
        $criteria->compare('Pub_Group_Mailing_Website', $this->Pub_Group_Mailing_Website, true);
        $criteria->compare('Pub_Group_Unknown_Address', $this->Pub_Group_Unknown_Address, true);
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
     * @return PublisherGroupRepresentative the static model class
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
