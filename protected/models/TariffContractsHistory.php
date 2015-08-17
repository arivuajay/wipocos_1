<?php

/**
 * This is the model class for table "{{tariff_contracts_history}}".
 *
 * The followings are the available columns in table '{{tariff_contracts_history}}':
 * @property integer $Tarf_Hist_Id
 * @property integer $Tarf_Cont_Id
 * @property integer $Tarf_Hist_City_Id
 * @property string $Tarf_Hist_District
 * @property string $Tarf_Hist_Area
 * @property integer $Tarf_Hist_Tariff_Id
 * @property integer $Tarf_Hist_Insp_Id
 * @property string $Tarf_Hist_Balance
 * @property string $Tarf_Hist_Amt_Pay
 * @property string $Tarf_Hist_From
 * @property string $Tarf_Hist_To
 * @property string $Tarf_Hist_Sign_Date
 * @property integer $Tarf_Hist_Pay_Id
 * @property string $Tarf_Hist_Portion
 * @property string $Tarf_Hist_Comment
 * @property integer $Tarf_Hist_Event_Id
 * @property string $Tarf_Hist_Event_Date
 * @property string $Tarf_Hist_Event_Comment
 * @property string $Tarf_Recurring_Amount
 * @property string $Tarf_Hist_Next_Inv_Date
 * @property integer $Tarf_Hist_Due_Count
 * @property string $Created_Date
 * @property string $Rowversion
 * @property integer $Created_By
 * @property integer $Updated_By
 *
 * The followings are the available model relations:
 * @property MasterEventType $tarfHistEvent
 * @property TariffContracts $tarfCont
 * @property Inspector $tarfHistInsp
 * @property MasterTariff $tarfHistTariff
 */
class TariffContractsHistory extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{tariff_contracts_history}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Tarf_Cont_Id, Tarf_Hist_Tariff_Id, Tarf_Hist_Insp_Id, Tarf_Hist_Amt_Pay, Tarf_Hist_From, Tarf_Hist_To, Tarf_Hist_Sign_Date, Tarf_Hist_Pay_Id, Tarf_Hist_Portion, Tarf_Recurring_Amount, Tarf_Hist_Next_Inv_Date, Tarf_Hist_Due_Count, Created_Date', 'required'),
            array('Tarf_Cont_Id, Tarf_Hist_City_Id, Tarf_Hist_Tariff_Id, Tarf_Hist_Insp_Id, Tarf_Hist_Pay_Id, Tarf_Hist_Event_Id, Tarf_Hist_Due_Count, Created_By, Updated_By', 'numerical', 'integerOnly' => true),
            array('Tarf_Hist_District, Tarf_Hist_Area', 'length', 'max' => 100),
            array('Tarf_Hist_Balance, Tarf_Hist_Amt_Pay, Tarf_Hist_Portion, Tarf_Recurring_Amount', 'length', 'max' => 10),
            array('Tarf_Hist_Comment, Tarf_Hist_Event_Date, Tarf_Hist_Event_Comment, Rowversion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Tarf_Hist_Id, Tarf_Cont_Id, Tarf_Hist_City_Id, Tarf_Hist_District, Tarf_Hist_Area, Tarf_Hist_Tariff_Id, Tarf_Hist_Insp_Id, Tarf_Hist_Balance, Tarf_Hist_Amt_Pay, Tarf_Hist_From, Tarf_Hist_To, Tarf_Hist_Sign_Date, Tarf_Hist_Pay_Id, Tarf_Hist_Portion, Tarf_Hist_Comment, Tarf_Hist_Event_Id, Tarf_Hist_Event_Date, Tarf_Hist_Event_Comment, Tarf_Recurring_Amount, Tarf_Hist_Next_Inv_Date, Tarf_Hist_Due_Count, Created_Date, Rowversion, Created_By, Updated_By', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'tarfHistEvent' => array(self::BELONGS_TO, 'MasterEventType', 'Tarf_Hist_Event_Id'),
            'tarfCont' => array(self::BELONGS_TO, 'TariffContracts', 'Tarf_Cont_Id'),
            'tarfHistInsp' => array(self::BELONGS_TO, 'Inspector', 'Tarf_Hist_Insp_Id'),
            'tarfHistTariff' => array(self::BELONGS_TO, 'MasterTariff', 'Tarf_Hist_Tariff_Id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Tarf_Hist_Id' => 'Tarf Hist',
            'Tarf_Cont_Id' => 'Tarf Cont',
            'Tarf_Hist_City_Id' => 'City',
            'Tarf_Hist_District' => 'District',
            'Tarf_Hist_Area' => 'Area',
            'Tarf_Hist_Tariff_Id' => 'Tariff Code',
            'Tarf_Hist_Insp_Id' => 'Inspector',
            'Tarf_Hist_Balance' => 'Balance',
            'Tarf_Hist_Amt_Pay' => 'Total Amount',
            'Tarf_Hist_From' => 'Contract Start',
            'Tarf_Hist_To' => 'Contract End',
            'Tarf_Hist_Sign_Date' => 'Date of signature',
            'Tarf_Hist_Pay_Id' => 'Payment frequency',
            'Tarf_Hist_Portion' => 'Portion',
            'Tarf_Hist_Comment' => 'Comment',
            'Tarf_Hist_Event_Id' => 'Type',
            'Tarf_Hist_Event_Date' => 'Date',
            'Tarf_Hist_Event_Comment' => 'Comment',
            'Tarf_Recurring_Amount' => 'Recurring Amount',
            'Tarf_Hist_Next_Inv_Date' => 'Next Inv Date',
            'Tarf_Hist_Due_Count' => 'Due Count',
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

        $criteria->compare('Tarf_Hist_Id', $this->Tarf_Hist_Id);
        $criteria->compare('Tarf_Cont_Id', $this->Tarf_Cont_Id);
        $criteria->compare('Tarf_Hist_City_Id', $this->Tarf_Hist_City_Id);
        $criteria->compare('Tarf_Hist_District', $this->Tarf_Hist_District, true);
        $criteria->compare('Tarf_Hist_Area', $this->Tarf_Hist_Area, true);
        $criteria->compare('Tarf_Hist_Tariff_Id', $this->Tarf_Hist_Tariff_Id);
        $criteria->compare('Tarf_Hist_Insp_Id', $this->Tarf_Hist_Insp_Id);
        $criteria->compare('Tarf_Hist_Balance', $this->Tarf_Hist_Balance, true);
        $criteria->compare('Tarf_Hist_Amt_Pay', $this->Tarf_Hist_Amt_Pay, true);
        $criteria->compare('Tarf_Hist_From', $this->Tarf_Hist_From, true);
        $criteria->compare('Tarf_Hist_To', $this->Tarf_Hist_To, true);
        $criteria->compare('Tarf_Hist_Sign_Date', $this->Tarf_Hist_Sign_Date, true);
        $criteria->compare('Tarf_Hist_Pay_Id', $this->Tarf_Hist_Pay_Id);
        $criteria->compare('Tarf_Hist_Portion', $this->Tarf_Hist_Portion, true);
        $criteria->compare('Tarf_Hist_Comment', $this->Tarf_Hist_Comment, true);
        $criteria->compare('Tarf_Hist_Event_Id', $this->Tarf_Hist_Event_Id);
        $criteria->compare('Tarf_Hist_Event_Date', $this->Tarf_Hist_Event_Date, true);
        $criteria->compare('Tarf_Hist_Event_Comment', $this->Tarf_Hist_Event_Comment, true);
        $criteria->compare('Tarf_Recurring_Amount', $this->Tarf_Recurring_Amount, true);
        $criteria->compare('Tarf_Hist_Next_Inv_Date', $this->Tarf_Hist_Next_Inv_Date, true);
        $criteria->compare('Tarf_Hist_Due_Count', $this->Tarf_Hist_Due_Count);
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
     * @return TariffContractsHistory the static model class
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
