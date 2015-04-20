<?php

/**
 * This is the model class for table "{{master_document_status}}".
 *
 * The followings are the available columns in table '{{master_document_status}}':
 * @property integer $Master_Document_Sts_Id
 * @property string $Document_Sts_Code
 * @property string $Document_Sts_Name
 * @property string $Document_Sts_Comment
 * @property string $Active
 * @property string $Created_Date
 * @property string $Rowversion
 *
 * The followings are the available model relations:
 * @property MasterDocumentType[] $masterDocumentTypes
 */
class MasterDocumentStatus extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{master_document_status}}';
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
            array('Document_Sts_Code, Document_Sts_Name', 'required'),
            array('Document_Sts_Code, Active', 'length', 'max' => 1),
            array('Document_Sts_Name', 'length', 'max' => 50),
            array('Document_Sts_Comment, Created_Date, Rowversion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Master_Document_Sts_Id, Document_Sts_Code, Document_Sts_Name, Document_Sts_Comment, Active, Created_Date, Rowversion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'masterDocumentTypes' => array(self::HAS_MANY, 'MasterDocumentType', 'Doc_Type_Status_Id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Master_Document_Sts_Id' => 'Master Document Sts',
            'Document_Sts_Code' => 'Document Status Code',
            'Document_Sts_Name' => 'Document Status Name',
            'Document_Sts_Comment' => 'Document Status Comment',
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

        $criteria->compare('Master_Document_Sts_Id', $this->Master_Document_Sts_Id);
        $criteria->compare('Document_Sts_Code', $this->Document_Sts_Code, true);
        $criteria->compare('Document_Sts_Name', $this->Document_Sts_Name, true);
        $criteria->compare('Document_Sts_Comment', $this->Document_Sts_Comment, true);
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
     * @return MasterDocumentStatus the static model class
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
