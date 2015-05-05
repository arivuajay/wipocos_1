<?php

/**
 * This is the model class for table "{{group}}".
 *
 * The followings are the available columns in table '{{group}}':
 * @property integer $Group_Id
 * @property string $Group_Name
 * @property string $Group_Is_Author
 * @property string $Group_Is_Performer
 * @property string $Group_Internal_Code
 * @property integer $Group_IPI_Name_Number
 * @property integer $Group_IPN_Base_Number
 * @property integer $Group_IPN_Number
 * @property string $Group_Date
 * @property string $Group_Place
 * @property integer $Group_Country_Id
 * @property integer $Group_Legal_Form_Id
 * @property integer $Group_Language_Id
 * @property string $Active
 * @property string $Created_Date
 * @property string $Rowversion
 *
 * The followings are the available model relations:
 * @property MasterLegalForm $groupLegalForm
 * @property MasterCountry $groupCountry
 * @property MasterLanguage $groupLanguage
 */
class Group extends CActiveRecord {

    public $search_status;
    public $is_auth_performer;
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{group}}';
    }

    public function scopes() {
        $alias = $this->getTableAlias(false, false);
        return array(
            'isActive' => array('condition' => "$alias.Active = '1'"),
            'isStatusActive' => array('condition' => "groupManageRights.Group_Mnge_Exit_Date is not Null OR groupManageRights.Group_Mnge_Exit_Date = '0000-00-00' OR groupManageRights.Group_Mnge_Exit_Date >= DATE(NOW())")
//            'isStatusActive' => array('condition' => "groupManageRights.Group_Mnge_Exit_Date is not Null And groupManageRights.Group_Mnge_Exit_Date != '0000-00-00' And groupManageRights.Group_Mnge_Exit_Date >= DATE(NOW())")
        );
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Group_Name, Group_Internal_Code, Group_Date', 'required'),
            array('Group_IPI_Name_Number, Group_IPN_Base_Number, Group_IPN_Number, Group_Country_Id, Group_Legal_Form_Id, Group_Language_Id', 'numerical', 'integerOnly' => true),
            array('Group_Name, Group_Place', 'length', 'max' => 100),
            array('Group_Is_Author, Group_Is_Performer, Active', 'length', 'max' => 1),
            array('Group_Internal_Code', 'length', 'max' => 50),
            array('Created_Date, Rowversion', 'safe'),
            array('Group_Internal_Code', 'unique'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Group_Id, Group_Name, Group_Is_Author, Group_Is_Performer, Group_Internal_Code, Group_IPI_Name_Number, Group_IPN_Base_Number, Group_IPN_Number, Group_Date, Group_Place, Group_Country_Id, Group_Legal_Form_Id, Group_Language_Id, Active, Created_Date, Rowversion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'groupLegalForm' => array(self::BELONGS_TO, 'MasterLegalForm', 'Group_Legal_Form_Id'),
            'groupCountry' => array(self::BELONGS_TO, 'MasterCountry', 'Group_Country_Id'),
            'groupLanguage' => array(self::BELONGS_TO, 'MasterLanguage', 'Group_Language_Id'),
            'groupMembers' => array(self::HAS_MANY, 'GroupMembers', 'Group_Id'),
            'groupManageRights' => array(self::HAS_ONE, 'GroupManageRights', 'Group_Id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Group_Id' => 'Group',
            'Group_Name' => 'Group Name',
            'Group_Is_Author' => 'Author',
            'Group_Is_Performer' => 'Performer',
            'Group_Internal_Code' => 'Internal Code',
            'Group_IPI_Name_Number' => 'IPI Name Number',
            'Group_IPN_Base_Number' => 'IPN Base Number',
            'Group_IPN_Number' => 'IPN Number',
            'Group_Date' => 'Date of Formation',
            'Group_Place' => 'Place',
            'Group_Country_Id' => 'Country',
            'Group_Legal_Form_Id' => 'Legal Form',
            'Group_Language_Id' => 'Language',
            'Active' => 'Active',
            'Created_Date' => 'Created Date',
            'Rowversion' => 'Rowversion',
            'search_status' => 'Status',
            'is_auth_performer' => 'Author/Performer',
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
        $criteria->with = array('groupManageRights');

        $criteria->compare('Group_Id', $this->Group_Id);
        $criteria->compare('Group_Name', $this->Group_Name, true);
        $criteria->compare('Group_Is_Author', $this->Group_Is_Author, true);
        $criteria->compare('Group_Is_Performer', $this->Group_Is_Performer, true);
        $criteria->compare('Group_Internal_Code', $this->Group_Internal_Code, true);
        $criteria->compare('Group_IPI_Name_Number', $this->Group_IPI_Name_Number);
        $criteria->compare('Group_IPN_Base_Number', $this->Group_IPN_Base_Number);
        $criteria->compare('Group_IPN_Number', $this->Group_IPN_Number);
        $criteria->compare('Group_Date', $this->Group_Date, true);
        $criteria->compare('Group_Place', $this->Group_Place, true);
        $criteria->compare('Group_Country_Id', $this->Group_Country_Id);
        $criteria->compare('Group_Legal_Form_Id', $this->Group_Legal_Form_Id);
        $criteria->compare('Group_Language_Id', $this->Group_Language_Id);
        $criteria->compare('Active', $this->Active, true);
        $criteria->compare('Created_Date', $this->Created_Date, true);
        $criteria->compare('Rowversion', $this->Rowversion, true);

        $now = new CDbExpression("DATE(NOW())");
        if($this->search_status == 'A'){
            $criteria->addCondition('groupManageRights.Group_Mnge_Exit_Date >= '.$now.' And groupManageRights.Group_Mnge_Exit_Date != "0000-00-00" OR groupManageRights.Group_Mnge_Exit_Date is null');
//            $criteria->addCondition('groupManageRights.Group_Mnge_Exit_Date >= '.$now.' And groupManageRights.Group_Mnge_Exit_Date != "0000-00-00"');
        }elseif($this->search_status == 'I'){
            $criteria->addCondition('groupManageRights.Group_Mnge_Exit_Date is NULL OR groupManageRights.Group_Mnge_Exit_Date = "0000-00-00"');
        }elseif($this->search_status == 'E'){
            $criteria->addCondition('groupManageRights.Group_Mnge_Exit_Date < '.$now.' And groupManageRights.Group_Mnge_Exit_Date != "0000-00-00"');
        }
        
        if($this->is_auth_performer == 'author'){
            $criteria->compare('Group_Is_Author', '1', true);
        }elseif($this->is_auth_performer == 'performer'){
            $criteria->compare('Group_Is_Performer', '1', true);
        }
        
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => false
//            'pagination' => array(
//                'pageSize' => PAGE_SIZE,
//            )
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Group the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function dataProvider() {
        $criteria = new CDbCriteria;
        if($this->is_auth_performer == 'author'){
            $criteria->compare('Group_Is_Author', '1', true);
        }elseif($this->is_auth_performer == 'performer'){
            $criteria->compare('Group_Is_Performer', '1', true);
        }
        
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => false
//            'pagination' => array(
//                'pageSize' => PAGE_SIZE,
//            )
        ));
    }

    protected function afterSave() {
        if($this->isNewRecord){
            $gen_inter_model = InternalcodeGenerate::model()->find("Gen_User_Type = :type", array(':type' => 'G'));
            $gen_inter_model->Gen_Inter_Code += 1;
            $gen_inter_model->save(false);
        }
    }

    public function getStatus() {
        $status = '<i class="fa fa-circle text-green" title="Active"></i>';
//        $status = '<i class="fa fa-circle text-red" title="Non-Member"></i>';
        if($this->groupManageRights && $this->groupManageRights->Group_Mnge_Exit_Date != '' && $this->groupManageRights->Group_Mnge_Exit_Date != '0000-00-00'){
//            $status = '<i class="fa fa-circle text-green" title="Active"></i>';
            if(strtotime($this->groupManageRights->Group_Mnge_Exit_Date) < strtotime(date('Y-m-d'))){
                $status = '<i class="fa fa-circle text-yellow" title="Expired"></i>';
            }
        }
        return $status;
    }
}
