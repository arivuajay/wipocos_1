<?php

/**
 * This is the model class for table "{{master_document_type}}".
 *
 * The followings are the available columns in table '{{master_document_type}}':
 * @property integer $Master_Doc_Type_Id
 * @property string $Doc_Type_Name
 * @property string $Doc_Type_Comment
 * @property integer $Doc_Type_Status_Id
 * @property string $Active
 * @property string $Created_Date
 * @property string $Rowversion
 *
 * The followings are the available model relations:
 * @property MasterDocumentStatus $docTypeStatus
 */
class MasterDocumentType extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{master_document_type}}';
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
            array('Doc_Type_Name, Doc_Type_Comment, Doc_Type_Status_Id', 'required'),
            array('Doc_Type_Status_Id', 'numerical', 'integerOnly' => true),
            array('Doc_Type_Name', 'length', 'max' => 90),
            array('Doc_Type_Comment', 'length', 'max' => 255),
            array('Active', 'length', 'max' => 1),
            array('Created_Date, Rowversion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Master_Doc_Type_Id, Doc_Type_Name, Doc_Type_Comment, Doc_Type_Status_Id, Active, Created_Date, Rowversion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'docTypeStatus' => array(self::BELONGS_TO, 'MasterDocumentStatus', 'Doc_Type_Status_Id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Master_Doc_Type_Id' => 'Master Doc Type',
            'Doc_Type_Name' => 'Document Type Name',
            'Doc_Type_Comment' => 'Document Type Comment',
            'Doc_Type_Status_Id' => 'Document Type Status',
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

        $criteria->compare('Master_Doc_Type_Id', $this->Master_Doc_Type_Id);
        $criteria->compare('Doc_Type_Name', $this->Doc_Type_Name, true);
        $criteria->compare('Doc_Type_Comment', $this->Doc_Type_Comment, true);
        $criteria->compare('Doc_Type_Status_Id', $this->Doc_Type_Status_Id);
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
     * @return MasterDocumentType the static model class
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
        $relations = array('docTypeStatus', 'societies');
        
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
                $this->addError('Doc_Type_Name', "This Document Type is already linked with {$relation}. So you can't Edit this record.");
        }
        return parent::beforeValidate();
    }
}
