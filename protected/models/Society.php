<?php

/**
 * This is the model class for table "{{society}}".
 *
 * The followings are the available columns in table '{{society}}':
 * @property integer $Society_Id
 * @property string $Society_Abbr_Id
 * @property string $Society_Logo_File
 * @property string $Society_Mailing_Address
 * @property integer $Society_Country_Id
 * @property integer $Society_Territory_Id
 * @property integer $Society_Region_Id
 * @property integer $Society_Profession_Id
 * @property integer $Society_Role_Id
 * @property string $Society_Hirearchy_Id
 * @property integer $Society_Payment_Id
 * @property string $Society_Type_Id
 * @property string $Society_Factor
 * @property integer $Society_Doc_Type_Id
 * @property integer $Society_Doc_Id
 * @property integer $Society_Duration
 * @property integer $Society_CopyRight
 * @property integer $Society_RelatedRights
 * @property string $Society_Currency_Id
 * @property string $Society_Rate
 * @property string $Society_Main_Performer_Id
 * @property string $Society_Producer_Id
 * @property integer $Society_Language_Id
 * @property string $Active
 * @property string $Created_Date
 * @property string $Rowversion
 * @property string $Soceity_Work_Cat_Id
 * @property string $Soceity_Int_Pos_Id
 * @property string $Soceity_Mnge_Rght_Id
 * @property string $Soceity_Doc_Sts_Id
 * @property string $Soceity_Rec_Type_Id
 * @property string $Soceity_Medium_Id
 * @property string $Soceity_Legal_Form_Id
 *
 * The followings are the available model relations:
 * @property MasterCountry $socCountry
 * @property MasterDocument $socDoc
 * @property MasterDocumentStatus $socDocType
 * @property MasterPaymentMethod $socPayment
 * @property MasterProfession $socProfession
 * @property MasterRegion $socRegion
 * @property MasterRole $socRole
 * @property MasterTerritories $socTerritory
 * @property MasterFactor $socFactor
 */
class Society extends CActiveRecord {
    
    const LOGO_SIZE = 1;
    const LOGO_TYPE = 'jpg, png, gif, jpeg';
    const IMPORT_TYPE = 'xls';


    public $import_file;

    public function init() {
        parent::init();
        if($this->isNewRecord){
//            $this->Society_Country_Id = DEFAULT_COUNTRY_ID;
//            $this->Society_Language_Id = DEFAULT_LANGUAGE_ID;
//            $this->Society_Region_Id = DEFAULT_REGION_ID;
//            $this->Society_Territory_Id = DEFAULT_TERRITORY_ID;
//            $this->Society_Doc_Type_Id = DEFAULT_DOCUMENT_TYPE_ID;
//            $this->Society_Type_Id = DEFAULT_TYPE_ID;
        }
    }
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{society}}';
    }

    public function scopes() {
        $alias = $this->getTableAlias(false, false);
        return array(
            'isActive' => array('condition' => "$alias.Active = '1'"),
        );
    }

    public function getSocietyname() {
        return "{$this->Society_Code}-{$this->socOrg->Org_Abbrevation}";
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Society_Abbr_Id, Society_Code, Society_Mailing_Address, Society_Language_Id, Society_Logo_File', 'required'),
            array('Society_Rate', 'numerical'),
            array('Society_Country_Id, Society_Territory_Id, Society_Region_Id, Society_Profession_Id, Society_Role_Id, Society_Payment_Id, Society_Doc_Type_Id, Society_Doc_Id, Society_Duration, Society_CopyRight, Society_RelatedRights', 'numerical', 'integerOnly' => true),
            array('Society_Abbr_Id, Society_Main_Performer_Id, Society_Producer_Id', 'length', 'max' => 100),
            array('Society_Logo_File', 'length', 'max' => 255),
            array('Society_Subscription', 'length', 'max' => 100),
            array('Society_Code', 'length', 'max' => 50),
            array('Society_Code', 'unique'),
            array('Society_Hirearchy_Id, Society_Type_Id, Society_Currency_Id, Society_Factor', 'length', 'max' => 50),
            array('Society_Rate', 'length', 'max' => 10),
            array('Active', 'length', 'max' => 1),
            array('Created_Date, Rowversion, Soceity_Work_Cat_Id, Soceity_Int_Pos_Id, Soceity_Mnge_Rght_Id, Soceity_Doc_Sts_Id, Soceity_Rec_Type_Id, Soceity_Medium_Id, Soceity_Legal_Form_Id, import_file', 'safe'),
            array('Society_Logo_File', 'file', 'allowEmpty' => true, 'maxSize'=>1024 * 1024 * self::LOGO_SIZE, 'tooLarge'=>'File should be smaller than '.self::LOGO_SIZE.'MB'),
            array('Society_Logo_File', 'file', 'allowEmpty' => false, 'types' => self::LOGO_TYPE, 'on' => 'create'),
            array('Society_Logo_File', 'file', 'allowEmpty' => true, 'types' => self::LOGO_TYPE, 'on' => 'update'),
            array('import_file', 'file', 'allowEmpty' => true, 'types' => self::IMPORT_TYPE),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Society_Id, Society_Code, Society_Abbr_Id, Society_Logo_File, Society_Language_Id, Society_Mailing_Address, Society_Country_Id, Society_Territory_Id, Society_Region_Id, Society_Profession_Id, Society_Role_Id, Society_Hirearchy_Id, Society_Payment_Id, Society_Type_Id, Society_Factor, Society_Doc_Type_Id, Society_Doc_Id, Society_Duration, Society_CopyRight, Society_RelatedRights, Society_Currency_Id, Society_Rate, Society_Main_Performer_Id, Society_Producer_Id, Active, Created_Date, Rowversion, Society_Subscription', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'socOrg' => array(self::BELONGS_TO, 'Organization', 'Society_Abbr_Id'),
            'socCountry' => array(self::BELONGS_TO, 'MasterCountry', 'Society_Country_Id'),
            'socDoc' => array(self::BELONGS_TO, 'MasterDocument', 'Society_Doc_Id'),
            'socDocType' => array(self::BELONGS_TO, 'MasterDocumentType', 'Society_Doc_Type_Id'),
            'socPayment' => array(self::BELONGS_TO, 'MasterPaymentMethod', 'Society_Payment_Id'),
            'socProfession' => array(self::BELONGS_TO, 'MasterProfession', 'Society_Profession_Id'),
            'socRegion' => array(self::BELONGS_TO, 'MasterRegion', 'Society_Region_Id'),
            'socRole' => array(self::BELONGS_TO, 'MasterRole', 'Society_Role_Id'),
            'socTerritory' => array(self::BELONGS_TO, 'MasterTerritories', 'Society_Territory_Id'),
            'socType' => array(self::BELONGS_TO, 'MasterType', 'Society_Type_Id'),
            'socHirearchy' => array(self::BELONGS_TO, 'MasterHierarchy', 'Society_Hirearchy_Id'),
            'socLanguage' => array(self::BELONGS_TO, 'MasterLanguage', 'Society_Language_Id'),
            'socCurrency' => array(self::BELONGS_TO, 'MasterCurrency', 'Society_Currency_Id'),
            'socFactor' => array(self::BELONGS_TO, 'MasterFactor', 'Society_Factor'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Society_Id' => 'Id',
            'Society_Code' => 'Society Code',
            'Society_Abbr_Id' => 'Society Name',
            'Society_Logo_File' => 'Logo',
            'Society_Language_Id' => 'Work Language',
            'Society_Mailing_Address' => 'Mailing Address',
            'Society_Country_Id' => 'Country',
            'Society_Territory_Id' => 'Territory',
            'Society_Region_Id' => 'Region',
            'Society_Profession_Id' => 'Profession',
            'Society_Role_Id' => 'Default Role',
            'Society_Hirearchy_Id' => 'Hirearchy',
            'Society_Payment_Id' => 'Payment Method',
            'Society_Type_Id' => 'Default Music Type',
            'Society_Factor' => 'Factor',
            'Society_Doc_Type_Id' => 'Documentation',
            'Society_Doc_Id' => 'Document',
            'Society_Duration' => 'Duration of Publishing Contract',
            'Society_CopyRight' => 'Copy Right',
            'Society_RelatedRights' => 'Related Rights',
            'Society_Currency_Id' => 'Currency',
            'Society_Rate' => 'Rate',
            'Society_Main_Performer_Id' => 'Main Performer',
            'Society_Producer_Id' => 'Producer',
            'Active' => 'Active',
            'Created_Date' => 'Created Date',
            'Rowversion' => 'Rowversion',
            'Society_Subscription' => 'Subscription',
            'Soceity_Work_Cat_Id' => 'Work category',
            'Soceity_Int_Pos_Id' => 'Internal Position',
            'Soceity_Mnge_Rght_Id' => 'Membership Role',
            'Soceity_Doc_Sts_Id' => 'Document Status',
            'Soceity_Rec_Type_Id' => 'Type of Recording',
            'Soceity_Medium_Id' => 'Medium',
            'Soceity_Legal_Form_Id' => 'Legal Form',
            'import_file' => 'Import XLS',
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

        $criteria->with = array('socOrg');
        $criteria->compare('Society_Id', $this->Society_Id);
        $criteria->compare('socOrg.Org_Abbrevation', $this->Society_Abbr_Id, true);
        $criteria->compare('Society_Logo_File', $this->Society_Logo_File, true);
        $criteria->compare('Society_Mailing_Address', $this->Society_Mailing_Address, true);
        $criteria->compare('Society_Country_Id', $this->Society_Country_Id);
        $criteria->compare('Society_Territory_Id', $this->Society_Territory_Id);
        $criteria->compare('Society_Region_Id', $this->Society_Region_Id);
        $criteria->compare('Society_Profession_Id', $this->Society_Profession_Id);
        $criteria->compare('Society_Role_Id', $this->Society_Role_Id);
        $criteria->compare('Society_Hirearchy_Id', $this->Society_Hirearchy_Id, true);
        $criteria->compare('Society_Payment_Id', $this->Society_Payment_Id);
        $criteria->compare('Society_Type_Id', $this->Society_Type_Id, true);
        $criteria->compare('Society_Factor', $this->Society_Factor, true);
        $criteria->compare('Society_Doc_Type_Id', $this->Society_Doc_Type_Id);
        $criteria->compare('Society_Doc_Id', $this->Society_Doc_Id);
        $criteria->compare('Society_Duration', $this->Society_Duration);
        $criteria->compare('Society_CopyRight', $this->Society_CopyRight);
        $criteria->compare('Society_RelatedRights', $this->Society_RelatedRights);
        $criteria->compare('Society_Currency_Id', $this->Society_Currency_Id, true);
        $criteria->compare('Society_Rate', $this->Society_Rate, true);
        $criteria->compare('Society_Main_Performer_Id', $this->Society_Main_Performer_Id, true);
        $criteria->compare('Society_Producer_Id', $this->Society_Producer_Id, true);
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
     * @return Society the static model class
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
                'fileField' => 'Society_Logo_File',
            )
        );
    }

}