<?php

/**
 * This is the model class for table "{{master_profession}}".
 *
 * The followings are the available columns in table '{{master_profession}}':
 * @property integer $Master_Profession_Id
 * @property string $Profession_Name
 * @property string $Active
 * @property string $Created_Date
 * @property string $Rowversion
 */
class MasterProfession extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{master_profession}}';
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
            array('Profession_Name', 'required'),
            array('Profession_Name', 'length', 'max' => 45),
            array('Active', 'length', 'max' => 1),
            array('Created_Date, Rowversion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Master_Profession_Id, Profession_Name, Active, Created_Date, Rowversion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'authorManageRights' => array(self::HAS_MANY, 'AuthorManageRights', 'Auth_Mnge_Profession_Id'),
            'groupManageRights' => array(self::HAS_MANY, 'GroupManageRights', 'Group_Mnge_Profession_Id'),
            'performerRelatedRights' => array(self::HAS_MANY, 'PerformerRelatedRights', 'Perf_Rel_Profession_Id'),
            'producerRelatedRights' => array(self::HAS_MANY, 'ProducerRelatedRights', 'Pro_Rel_Profession_Id'),
            'publisherGroupManageRights' => array(self::HAS_MANY, 'PublisherGroupManageRights', 'Pub_Group_Mnge_Profession_Id'),
            'publisherManageRights' => array(self::HAS_MANY, 'PublisherManageRights', 'Pub_Mnge_Profession_Id'),
            'publisherRelatedRights' => array(self::HAS_MANY, 'PublisherRelatedRights', 'Pub_Rel_Profession_Id'),
            'societies' => array(self::HAS_MANY, 'Society', 'Society_Profession_Id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Master_Profession_Id' => 'Master Profession',
            'Profession_Name' => 'Profession Name',
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

        $criteria->compare('Master_Profession_Id', $this->Master_Profession_Id);
        $criteria->compare('Profession_Name', $this->Profession_Name, true);
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
     * @return MasterProfession the static model class
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
        $relations = array('authorManageRights', 'groupManageRights', 'performerRelatedRights', 'producerRelatedRights', 'publisherGroupManageRights',
            'publisherManageRights', 'publisherRelatedRights');
        
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
                $this->addError('Profession_Name', "This Profession is already linked with {$relation}. So you can't Edit this record.");
        }
        return parent::beforeValidate();
    }
}
