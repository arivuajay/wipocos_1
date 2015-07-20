<?php

/**
 * This is the model class for table "{{master_pseudonym_types}}".
 *
 * The followings are the available columns in table '{{master_pseudonym_types}}':
 * @property integer $Pseudo_Id
 * @property string $Pseudo_Code
 * @property string $Active
 * @property string $Created_Date
 * @property string $Rowversion
 */
class MasterPseudonymTypes extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{master_pseudonym_types}}';
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
            array('Pseudo_Code', 'required'),
            array('Pseudo_Code', 'length', 'max' => 5),
            array('Active', 'length', 'max' => 1),
            array('Created_Date, Rowversion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Pseudo_Id, Pseudo_Code, Active, Created_Date, Rowversion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'authorPseudonyms' => array(self::HAS_MANY, 'AuthorPseudonym', 'Auth_Pseudo_Type_Id'),
            'groupPseudonyms' => array(self::HAS_MANY, 'GroupPseudonym', 'Group_Pseudo_Type_Id'),
            'performerPseudonyms' => array(self::HAS_MANY, 'PerformerPseudonym', 'Perf_Pseudo_Type_Id'),
            'producerPseudonyms' => array(self::HAS_MANY, 'ProducerPseudonym', 'Pro_Pseudo_Type_Id'),
            'publisherGroupPseudonyms' => array(self::HAS_MANY, 'PublisherGroupPseudonym', 'Pub_Group_Pseudo_Type_Id'),
            'publisherPseudonyms' => array(self::HAS_MANY, 'PublisherPseudonym', 'Pub_Pseudo_Type_Id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Pseudo_Id' => 'Pseudo',
            'Pseudo_Code' => 'Pseudo Code',
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

        $criteria->compare('Pseudo_Id', $this->Pseudo_Id);
        $criteria->compare('Pseudo_Code', $this->Pseudo_Code, true);
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
     * @return MasterPseudonymTypes the static model class
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
        $relations = array('authorPseudonyms', 'groupPseudonyms', 'performerPseudonyms', 'producerPseudonyms', 'publisherGroupPseudonyms', 'publisherPseudonyms');
        
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
                $this->addError('Pseudo_Code', "This  Pseudonym Type is already linked with {$relation}. So you can't Edit this record.");
        }
        return parent::beforeValidate();
    }
}
