<?php

/**
 * This is the model class for table "{{master_nationality}}".
 *
 * The followings are the available columns in table '{{master_nationality}}':
 * @property integer $Master_Nation_Id
 * @property string $Nation_Code
 * @property string $Nation_Name
 * @property string $Active
 * @property string $Created_Date
 * @property string $Rowversion
 *
 * The followings are the available model relations:
 * @property AuthorAccount[] $authorAccounts
 * @property Organization[] $organizations
 * @property PerformerAccount[] $performerAccounts
 * @property RecordingPublication[] $recordingPublications
 */
class MasterNationality extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{master_nationality}}';
    }

    public function scopes() {
        $alias = $this->getTableAlias(false, false);
        return array(
            'isActive' => array('condition' => "$alias.Active = '1'"),
        );
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Nation_Name', 'required'),
            array('Nation_Code', 'length', 'max' => 10),
            array('Nation_Name', 'length', 'max' => 90),
            array('Active', 'length', 'max' => 1),
            array('Created_Date, Rowversion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Master_Nation_Id, Nation_Code, Nation_Name, Active, Created_Date, Rowversion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'authorAccounts' => array(self::HAS_MANY, 'AuthorAccount', 'Auth_Nationality_Id'),
            'organizations' => array(self::HAS_MANY, 'Organization', 'Org_Nation_Id'),
            'performerAccounts' => array(self::HAS_MANY, 'PerformerAccount', 'Perf_Nationality_Id'),
            'recordingPublications' => array(self::HAS_MANY, 'RecordingPublication', 'Rcd_Publ_Prod_Nation_Id'),
            'soundCarrierPublications' => array(self::HAS_MANY, 'SoundCarrierPublication', 'Sound_Car_Publ_Prod_Nation_Id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Master_Nation_Id' => 'Master Nation',
            'Nation_Code' => 'Nation Code',
            'Nation_Name' => 'Nation Name',
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

        $criteria->compare('Master_Nation_Id', $this->Master_Nation_Id);
        $criteria->compare('Nation_Code', $this->Nation_Code, true);
        $criteria->compare('Nation_Name', $this->Nation_Name, true);
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
     * @return MasterNationality the static model class
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

    protected function beforeValidate() {
        $relations = array('authorAccounts', 'performerAccounts', 'recordingPublications', 'soundCarrierPublications');
        
        $validate = false;
        if(MASTER_EDIT_VALIDATION){
            foreach ($relations as $key => $relation) {
                if(!empty($this->$relation)){
                    $validate = true;
                    break;
                }
            }
            $relation = BaseInflector::camel2words($relation, ' ');
            if($validate)
                $this->addError('Nation_Name', "This Nationality is already linked with {$relation}. So you can't Edit this record.");
        }
        return parent::beforeValidate();
    }
}
