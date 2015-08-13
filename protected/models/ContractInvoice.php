<?php

/**
 * This is the model class for table "{{contract_invoice}}".
 *
 * The followings are the available columns in table '{{contract_invoice}}':
 * @property integer $Inv_Id
 * @property string $Inv_Date
 * @property string $Inv_Invoice
 * @property integer $Tarf_Cont_Id
 * @property integer $Inv_Repeat_Id
 * @property integer $Inv_Repeat_Count
 * @property string $Inv_Next_Date
 * @property string $Inv_Amount
 * @property string $Inv_Created_Type
 * @property string $Inv_Created_Mode
 * @property string $Created_Date
 * @property string $Rowversion
 * @property integer $Created_By
 * @property integer $Updated_By
 *
 * The followings are the available model relations:
 * @property TariffContracts $tarfCont
 */
class ContractInvoice extends RActiveRecord {

    const INVOICE_PAD = 7;
    const AUTO_GENERATE = TRUE;
    const DEFAULT_REPEAT = 4;

    public function init() {
        parent::init();
        if ($this->isNewRecord) {
            $this->Inv_Date = date('Y-m-d');
            $this->Inv_Repeat_Id = ContractInvoice::DEFAULT_REPEAT;
            $this->Inv_Created_Type = 'M';
            $this->Inv_Created_Mode = 'C';
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
            array('Inv_Date, Inv_Repeat_Id, Inv_Next_Date', 'required'),
            array('Tarf_Cont_Id, Inv_Repeat_Id, Inv_Repeat_Count, Created_By, Updated_By', 'numerical', 'integerOnly' => true),
            array('Inv_Repeat_Count', 'numerical', 'integerOnly' => true, 'max' => 100),
            array('Tarf_Cont_Id', 'required', 'message' => 'Please search & select Contract'),
            array('Inv_Invoice', 'unique'),
            array('Inv_Invoice', 'length', 'max' => 50),
            array('Inv_Amount', 'numerical', 'integerOnly' => false),
            array('Inv_Next_Date', 'nextDateValidate', 'on' => 'current'),
            array('Inv_Date', 'backDateValidate', 'on' => 'backdated'),
            array('Inv_Next_Date, Created_Date, Rowversion, Inv_Invoice, Inv_Amount, Inv_Created_Type, Inv_Created_Mode', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Inv_Id, Inv_Date, Tarf_Cont_Id, Inv_Repeat_Id, Inv_Repeat_Count, Inv_Next_Date, Created_Date, Rowversion, Created_By, Updated_By', 'safe', 'on' => 'search'),
        );
    }

    public function nextDateValidate($attribute, $params) {
        $inv_model = self::model()->findAll("Tarf_Cont_Id = :cont_id Order by Inv_Next_Date DESC", array('cont_id' => $this->Tarf_Cont_Id));
        $check_date = empty($inv_model) ? date('Y-m-d') : $inv_model[0]->Inv_Next_Date;
        if (strtotime($this->Inv_Next_Date) <= strtotime($check_date)) {
            $this->addError($attribute, "Date must be greater than {$check_date}");
        }
    }

    public function backDateValidate($attribute, $params) {
        $cont_model = TariffContracts::model()->findByPk($this->Tarf_Cont_Id);
        if (strtotime($cont_model->Tarf_Cont_From) > strtotime($this->Inv_Date)) {
            $this->addError($attribute, "Invoice date must be greater than contract start date ({$cont_model->Tarf_Cont_From})");
        }
        if (strtotime(date('Y-m-d')) < strtotime($this->Inv_Date)) {
            $this->addError($attribute, "Date must be lesser than today (" . date('Y-m-d') . ")");
        }
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
            'Inv_Date' => 'Invoice Date',
            'Inv_Invoice' => 'Invoice',
            'Tarf_Cont_Id' => 'Contract',
            'Inv_Repeat_Id' => 'Repeat Type',
            'Inv_Repeat_Count' => 'Repeat Count',
            'Inv_Next_Date' => 'Next Invoice Date',
            'Inv_Amount' => 'Amount',
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
        $criteria->with = array('tarfCont');
        $criteria->group = "t.Tarf_Cont_Id";

//        $criteria->compare('Inv_Id', $this->Inv_Id);
//        $criteria->compare('Inv_Date', $this->Inv_Date, true);
//        $criteria->compare('Inv_Invoice', $this->Inv_Invoice, true);
        $criteria->compare('tarfCont.Tarf_Cont_Internal_Code', $this->Tarf_Cont_Id, true);
//        $criteria->compare('Inv_Repeat_Id', $this->Inv_Repeat_Id);
//        $criteria->compare('Inv_Repeat_Count', $this->Inv_Repeat_Count);
//        $criteria->compare('Inv_Next_Date', $this->Inv_Next_Date, true);
//        $criteria->compare('Created_Date', $this->Created_Date, true);
//        $criteria->compare('Rowversion', $this->Rowversion, true);
//        $criteria->compare('Created_By', $this->Created_By);
//        $criteria->compare('Updated_By', $this->Updated_By);


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
        $criteria = new CDbCriteria;
        $criteria->group = "t.Tarf_Cont_Id";

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => PAGE_SIZE,
            )
        ));
    }

    public function getRepeat($key = NULL) {
        $repeats = TariffContracts::getPaymentlist();
        if (isset($this->Inv_Repeat_Id))
            $key = $this->Inv_Repeat_Id;
        if ($key != NULL)
            return $repeats[$key];
        return $repeats;
    }

    public function getNextdate($key, $date) {
        $repeats = TariffContracts::getPaymentlist();
        switch ($key) {
            case 1:
                $nextDate = date('Y-m-d', strtotime('+1 year', strtotime($date)));
                break;
            case 2:
                $nextDate = date('Y-m-d', strtotime('+6 months', strtotime($date)));
                break;
            case 3:
                $nextDate = date('Y-m-d', strtotime('+3 months', strtotime($date)));
                break;
            case 4:
                $nextDate = date('Y-m-d', strtotime('+1 month', strtotime($date)));
                break;
            case 5:
                $nextDate = date('Y-m-d', strtotime('+1 week', strtotime($date)));
                break;
            default:
                break;
        }
        return $nextDate;
    }

    protected function beforeSave() {
        if ($this->isNewRecord) {
            $this->Inv_Invoice = Myclass::generateInvoiceno();
            $contract = TariffContracts::model()->findByPk($this->Tarf_Cont_Id);
            if (!empty($contract))
                $this->Inv_Amount = $contract->Tarf_Cont_Amt_Pay;
            else
                $this->Inv_Amount = 0;
            $this->Inv_Repeat_Id = $this->tarfCont->Tarf_Cont_Pay_Id;
            $inv_model = self::model()->findAll("Tarf_Cont_Id = :cont_id Order by Inv_Next_Date DESC", array('cont_id' => $this->Tarf_Cont_Id));
            if (empty($inv_model) && $this->Inv_Created_Mode == 'C') {
                $this->Inv_Repeat_Count = self::getContractDuration($this->tarfCont->Tarf_Cont_Pay_Id, $this->Inv_Date, $this->tarfCont->Tarf_Cont_To, false);
            } else {
                $this->Inv_Repeat_Count = $this->Inv_Created_Mode == 'C' ? $inv_model[0]->Inv_Repeat_Count - 1 : 0;
            }
        }
        return parent::beforeSave();
    }

    protected function afterSave() {
        if ($this->isNewRecord && $this->Inv_Created_Mode == 'C') {
            //Send mail
            $mail = new Sendmail;
            $mail->email_layout = 'db';
            $temp_id = 1;

            $society_name = '';
            $soceity = Society::model()->findByPk(DEFAULT_SOCIETY_ID);
            if (!empty($soceity))
                $society_name = $soceity->socOrg->Org_Abbrevation;

            $contract = $this->tarfCont;
            $trans_array = array(
                "{CURRENT_MONTH}" => date('F'),
                "{INVOICE_NO}" => $this->Inv_Invoice,
                "{SOCIETY_NAME}" => $society_name,
                "{CUSTOMER_NAME}" => $contract->tarfContUser->User_Cust_Name,
                "{INVOICE_AMOUNT}" => $this->Inv_Amount,
                "{CUST_NAME}" => $contract->tarfContUser->User_Cust_Name,
                "{CUST_ADDRESS}" => $contract->tarfContUser->User_Cust_Address,
                "{CUST_PHONE}" => $contract->tarfContUser->User_Cust_Telephone,
                "{CUST_FAX}" => $contract->tarfContUser->User_Cust_Fax,
                "{CUST_WEBSITE}" => $contract->tarfContUser->User_Cust_Website,
                "{CUST_EMAIL}" => $contract->tarfContUser->User_Cust_Email,
                "{CONTRACT_NO}" => $contract->Tarf_Cont_Internal_Code,
                "{TAR_CITY}" => $contract->tarfContCity->City_Name,
                "{TAR_DISTRICT}" => $contract->Tarf_Cont_District,
                "{TAR_AREA}" => $contract->Tarf_Cont_Area,
                "{TAR_TARIF_CODE}" => $contract->tarfContTariff->Tarif_Description,
                "{TAR_INSP}" => $contract->tarfContInsp->Insp_Name,
                "{TAR_BALANCE}" => $contract->Tarf_Cont_Balance,
                "{TAR_TYPE}" => $contract->tarfContEvent->Evt_Type_Name,
                "{TAR_EVE_DATE}" => $contract->Tarf_Cont_Event_Date,
                "{TAR_EVE_COMMENT}" => $contract->Tarf_Cont_Event_Comment,
                "{TAR_TO_PAY}" => $contract->Tarf_Cont_Amt_Pay,
                "{TAR_FROM}" => $contract->Tarf_Cont_From,
                "{TAR_TO}" => $contract->Tarf_Cont_To,
                "{TAR_SIGN}" => $contract->Tarf_Cont_Sign_Date,
                "{TAR_PAYMENT}" => $contract->getPayment(),
                "{TAR_PORTION}" => $contract->Tarf_Cont_Portion,
                "{TAR_ROY_COMMENT}" => $contract->Tarf_Cont_Comment,
                "{CONTRACT_DURATION}" => $this->getContractDuration($contract->Tarf_Cont_Pay_Id, $this->Inv_Date, $contract->Tarf_Cont_To),
            );
            $message = $mail->getMessage($temp_id, $trans_array, 2);
            $subject = $mail->getSubject($temp_id, $trans_array);
            $mail->send($contract->tarfContUser->User_Cust_Email, $subject, $message);
            //End
        }
        return parent::afterSave();
    }

    public static function getContractDuration($id, $date1, $date2, $is_suffix = true) {
        $diff = Myclass::getDatediff($date1, $date2);
        $duration = '';
        switch ($id) {
            case 1:
                $duration = $diff['years'];
                $suffix = ' Years';
                break;
            case 2:
                $duration = ceil($diff['months'] / 6);
                $suffix = ' Months';
                break;
            case 3:
                $duration = ceil($diff['months'] / 4);
                $suffix = ' Months';
                break;
            case 4:
                $duration = $diff['months'];
                $suffix = ' Months';
                break;
            case 5:
                $duration = $diff['weeks'];
                $suffix = ' Weeks';
                break;
        }
        if ($is_suffix == TRUE)
            $duration = $duration . $suffix;
        return $duration;
    }

}
