<?php

/**
 * This is the model class for table "{{work_documentation}}".
 *
 * The followings are the available columns in table '{{work_documentation}}':
 * @property integer $Work_Doc_Id
 * @property integer $Work_Id
 * @property integer $Work_Doc_Status_Id
 * @property string $Work_Doc_Inclusion
 * @property string $Work_Doc_Dispute
 * @property integer $Work_Doc_Type_Id
 * @property string $Work_Doc_Sign_Date
 * @property string $Work_Doc_File
 *
 * The followings are the available model relations:
 * @property MasterDocumentStatus $workDocStatus
 * @property MasterDocumentType $workDocType
 * @property Work $work
 */
class WorkDocumentation extends CActiveRecord {

    public function init() {
        parent::init();
        if($this->isNewRecord){
            $this->Work_Doc_Sign_Date = date('Y-m-d');
        }
    }
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{work_documentation}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Work_Id, Work_Doc_Status_Id, Work_Doc_Type_Id, Work_Doc_Sign_Date, Work_Doc_File', 'required'),
            array('Work_Id, Work_Doc_Status_Id, Work_Doc_Type_Id', 'numerical', 'integerOnly' => true),
            array('Work_Doc_Inclusion, Work_Doc_Dispute', 'length', 'max' => 1),
            array('Work_Doc_File', 'length', 'max' => 255),
            array('Created_Date, Rowversion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Work_Doc_Id, Work_Id, Work_Doc_Status_Id, Work_Doc_Inclusion, Work_Doc_Dispute, Work_Doc_Type_Id, Work_Doc_Sign_Date, Work_Doc_File, Created_Date, Rowversion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'workDocStatus' => array(self::BELONGS_TO, 'MasterDocumentStatus', 'Work_Doc_Status_Id'),
            'workDocType' => array(self::BELONGS_TO, 'MasterDocumentType', 'Work_Doc_Type_Id'),
            'work' => array(self::BELONGS_TO, 'Work', 'Work_Id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Work_Doc_Id' => 'Work Doc',
            'Work_Id' => 'Work',
            'Work_Doc_Status_Id' => 'Documentary status',
            'Work_Doc_Inclusion' => 'Inclusion in WID',
            'Work_Doc_Dispute' => 'Dispute',
            'Work_Doc_Type_Id' => 'Type',
            'Work_Doc_Sign_Date' => 'Date of signature',
            'Work_Doc_File' => 'File',
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

        $criteria->compare('Work_Doc_Id', $this->Work_Doc_Id);
        $criteria->compare('Work_Id', $this->Work_Id);
        $criteria->compare('Work_Doc_Status_Id', $this->Work_Doc_Status_Id);
        $criteria->compare('Work_Doc_Inclusion', $this->Work_Doc_Inclusion, true);
        $criteria->compare('Work_Doc_Dispute', $this->Work_Doc_Dispute, true);
        $criteria->compare('Work_Doc_Type_Id', $this->Work_Doc_Type_Id);
        $criteria->compare('Work_Doc_Sign_Date', $this->Work_Doc_Sign_Date, true);
        $criteria->compare('Work_Doc_File', $this->Work_Doc_File, true);

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
     * @return WorkDocumentation the static model class
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
