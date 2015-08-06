<?php

/**
 * This is the model class for table "{{contract_invoice}}".
 *
 * The followings are the available columns in table '{{contract_invoice}}':
 * @property integer $Inv_Id
 * @property string $Inv_Date
 * @property integer $Tarf_Cont_Id
 * @property integer $Inv_Repeat_Id
 * @property integer $Inv_Repeat_Count
 * @property string $Inv_Next_Date
 * @property string $Created_Date
 * @property string $Rowversion
 * @property integer $Created_By
 * @property integer $Updated_By
 *
 * The followings are the available model relations:
 * @property TariffContracts $tarfCont
 */
class ContractInvoice extends RActiveRecord {
    
    public function init() {
        parent::init();
        if($this->isNewRecord){
            $this->Inv_Date = date('Y-m-d');
        }
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{contract_invoice}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Inv_Date, Inv_Repeat_Id, Inv_Repeat_Count, Inv_Next_Date', 'required'),
            array('Tarf_Cont_Id, Inv_Repeat_Id, Inv_Repeat_Count, Created_By, Updated_By', 'numerical', 'integerOnly' => true),
            array('Tarf_Cont_Id', 'required', 'message' => 'Please search & select Contract'),
            array('Inv_Next_Date, Created_Date, Rowversion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Inv_Id, Inv_Date, Tarf_Cont_Id, Inv_Repeat_Id, Inv_Repeat_Count, Inv_Next_Date, Created_Date, Rowversion, Created_By, Updated_By', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'tarfCont' => array(self::BELONGS_TO, 'TariffContracts', 'Tarf_Cont_Id'),
            'createdBy' => array(self::BELONGS_TO, 'User', 'Created_By'),
            'updatedBy' => array(self::BELONGS_TO, 'User', 'Updated_By'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Inv_Id' => 'Inv',
            'Inv_Date' => 'Date',
            'Tarf_Cont_Id' => 'Contract',
            'Inv_Repeat_Id' => 'Repeat Type',
            'Inv_Repeat_Count' => 'Repeat Count',
            'Inv_Next_Date' => 'Next Date',
            'Created_Date' => 'Created Date',
            'Rowversion' => 'Rowversion',
            'Created_By' => 'Created By',
            'Updated_By' => 'Updated By',
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

        $criteria->compare('Inv_Id', $this->Inv_Id);
        $criteria->compare('Inv_Date', $this->Inv_Date, true);
        $criteria->compare('Tarf_Cont_Id', $this->Tarf_Cont_Id);
        $criteria->compare('Inv_Repeat_Id', $this->Inv_Repeat_Id);
        $criteria->compare('Inv_Repeat_Count', $this->Inv_Repeat_Count);
        $criteria->compare('Inv_Next_Date', $this->Inv_Next_Date, true);
        $criteria->compare('Created_Date', $this->Created_Date, true);
        $criteria->compare('Rowversion', $this->Rowversion, true);
        $criteria->compare('Created_By', $this->Created_By);
        $criteria->compare('Updated_By', $this->Updated_By);

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
     * @return ContractInvoice the static model class
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

    public function getRepeat($key = NULL) {
        $repeats = array(
            '1' => 'Annual',
            '2' => 'Biannual',
            '3' => 'Quarterly',
            '4' => 'Monthly',
            '5' => 'Weekly',
        );
        if (isset($this->Inv_Repeat_Id))
            $key = $this->Inv_Repeat_Id;
        if ($key != NULL)
            return $repeats[$key];
        return $repeats;
    }
}
