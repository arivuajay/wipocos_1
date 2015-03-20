<?php

/**
 * This is the model class for table "{{organization}}".
 *
 * The followings are the available columns in table '{{organization}}':
 * @property integer $Org_Id
 * @property string $Org_Abbr_Id
 * @property string $Org_Logo_File
 * @property string $Org_Mailing_Address
 * @property integer $Org_Country_Id
 * @property integer $Org_Territory_Id
 * @property integer $Org_Region_Id
 * @property integer $Org_Profession_Id
 * @property integer $Org_Role_Id
 * @property string $Org_Hirearchy_Id
 * @property integer $Org_Payment_Id
 * @property string $Org_Type_Id
 * @property string $Org_Factor_Id
 * @property integer $Org_Doc_Type_Id
 * @property integer $Org_Doc_Id
 * @property integer $Org_Duration
 * @property integer $Org_CopyRight
 * @property integer $Org_RelatedRights
 * @property string $Org_Currency
 * @property string $Org_Rate
 * @property string $Org_Main_Performer_Id
 * @property string $Org_Producer_Id
 * @property string $Active
 * @property string $Created_Date
 * @property string $Rowversion
 *
 * The followings are the available model relations:
 * @property MasterCountry $orgCountry
 * @property MasterDocument $orgDoc
 * @property MasterDocumentStatus $orgDocType
 * @property MasterPaymentMethod $orgPayment
 * @property MasterProfession $orgProfession
 * @property MasterRegion $orgRegion
 * @property MasterRole $orgRole
 * @property MasterTerritories $orgTerritory
 */
class Organization extends CActiveRecord {
    const LOGO_SIZE = 1;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{organization}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Org_Abbr_Id, Org_Mailing_Address', 'required'),
            array('Org_Country_Id, Org_Territory_Id, Org_Region_Id, Org_Profession_Id, Org_Role_Id, Org_Payment_Id, Org_Doc_Type_Id, Org_Doc_Id, Org_Duration, Org_CopyRight, Org_RelatedRights', 'numerical', 'integerOnly' => true),
            array('Org_Abbr_Id, Org_Main_Performer_Id, Org_Producer_Id', 'length', 'max' => 100),
            array('Org_Logo_File', 'length', 'max' => 255),
            array('Org_Hirearchy_Id, Org_Type_Id, Org_Factor_Id, Org_Currency', 'length', 'max' => 50),
            array('Org_Rate', 'length', 'max' => 10),
            array('Active', 'length', 'max' => 1),
            array('Created_Date, Rowversion', 'safe'),
            array('Org_Logo_File', 'file', 'allowEmpty' => true, 'maxSize'=>1024 * 1024 * self::LOGO_SIZE, 'tooLarge'=>'File should be smaller than '.self::LOGO_SIZE.'MB'),
            array('Org_Logo_File', 'file', 'allowEmpty' => false, 'types' => 'jpg, png, gif, jpeg', 'on' => 'create'),
            array('Org_Logo_File', 'file', 'allowEmpty' => true, 'types' => 'jpg, png, gif, jpeg', 'on' => 'update'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Org_Id, Org_Abbr_Id, Org_Logo_File, Org_Mailing_Address, Org_Country_Id, Org_Territory_Id, Org_Region_Id, Org_Profession_Id, Org_Role_Id, Org_Hirearchy_Id, Org_Payment_Id, Org_Type_Id, Org_Factor_Id, Org_Doc_Type_Id, Org_Doc_Id, Org_Duration, Org_CopyRight, Org_RelatedRights, Org_Currency, Org_Rate, Org_Main_Performer_Id, Org_Producer_Id, Active, Created_Date, Rowversion', 'safe', 'on' => 'search'),
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
            'orgDoc' => array(self::BELONGS_TO, 'MasterDocument', 'Org_Doc_Id'),
            'orgDocType' => array(self::BELONGS_TO, 'MasterDocumentType', 'Org_Doc_Type_Id'),
            'orgPayment' => array(self::BELONGS_TO, 'MasterPaymentMethod', 'Org_Payment_Id'),
            'orgProfession' => array(self::BELONGS_TO, 'MasterProfession', 'Org_Profession_Id'),
            'orgRegion' => array(self::BELONGS_TO, 'MasterRegion', 'Org_Region_Id'),
            'orgRole' => array(self::BELONGS_TO, 'MasterRole', 'Org_Role_Id'),
            'orgTerritory' => array(self::BELONGS_TO, 'MasterTerritories', 'Org_Territory_Id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Org_Id' => 'Org',
            'Org_Abbr_Id' => 'Organization Name',
            'Org_Logo_File' => 'Logo',
            'Org_Mailing_Address' => 'Mailing Address',
            'Org_Country_Id' => 'Country',
            'Org_Territory_Id' => 'Territory',
            'Org_Region_Id' => 'Region',
            'Org_Profession_Id' => 'Profession',
            'Org_Role_Id' => 'Role',
            'Org_Hirearchy_Id' => 'Hirearchy',
            'Org_Payment_Id' => 'Payment Method',
            'Org_Type_Id' => 'Type',
            'Org_Factor_Id' => 'Factor',
            'Org_Doc_Type_Id' => 'Document Type',
            'Org_Doc_Id' => 'Document',
            'Org_Duration' => 'Duration',
            'Org_CopyRight' => 'Copy Right',
            'Org_RelatedRights' => 'Related Rights',
            'Org_Currency' => 'Currency',
            'Org_Rate' => 'Rate',
            'Org_Main_Performer_Id' => 'Main Performer',
            'Org_Producer_Id' => 'Producer',
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
        $criteria->compare('Org_Abbr_Id', $this->Org_Abbr_Id, true);
        $criteria->compare('Org_Logo_File', $this->Org_Logo_File, true);
        $criteria->compare('Org_Mailing_Address', $this->Org_Mailing_Address, true);
        $criteria->compare('Org_Country_Id', $this->Org_Country_Id);
        $criteria->compare('Org_Territory_Id', $this->Org_Territory_Id);
        $criteria->compare('Org_Region_Id', $this->Org_Region_Id);
        $criteria->compare('Org_Profession_Id', $this->Org_Profession_Id);
        $criteria->compare('Org_Role_Id', $this->Org_Role_Id);
        $criteria->compare('Org_Hirearchy_Id', $this->Org_Hirearchy_Id, true);
        $criteria->compare('Org_Payment_Id', $this->Org_Payment_Id);
        $criteria->compare('Org_Type_Id', $this->Org_Type_Id, true);
        $criteria->compare('Org_Factor_Id', $this->Org_Factor_Id, true);
        $criteria->compare('Org_Doc_Type_Id', $this->Org_Doc_Type_Id);
        $criteria->compare('Org_Doc_Id', $this->Org_Doc_Id);
        $criteria->compare('Org_Duration', $this->Org_Duration);
        $criteria->compare('Org_CopyRight', $this->Org_CopyRight);
        $criteria->compare('Org_RelatedRights', $this->Org_RelatedRights);
        $criteria->compare('Org_Currency', $this->Org_Currency, true);
        $criteria->compare('Org_Rate', $this->Org_Rate, true);
        $criteria->compare('Org_Main_Performer_Id', $this->Org_Main_Performer_Id, true);
        $criteria->compare('Org_Producer_Id', $this->Org_Producer_Id, true);
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

    public function behaviors() {
        return array(
            'NUploadFile' => array(
                'class' => 'ext.nuploadfile.NUploadFile',
                'fileField' => 'Org_Logo_File',
            )
        );
    }

}
