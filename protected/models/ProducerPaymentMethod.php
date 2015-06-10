<?php

/**
 * This is the model class for table "{{producer_payment_method}}".
 *
 * The followings are the available columns in table '{{producer_payment_method}}':
 * @property integer $Pro_Pay_Id
 * @property integer $Pro_Acc_Id
 * @property integer $Pro_Pay_Method_id
 * @property integer $Pro_Bank_Account
 * @property integer $Pro_Bank_Code
 * @property integer $Pro_Bank_Branch
 * @property string $Pro_Pay_Address
 * @property string $Pro_Pay_Iban
 * @property string $Pro_Pay_Swift
 * @property string $Active
 * @property string $Created_Date
 * @property string $Rowversion
 *
 * The followings are the available model relations:
 * @property ProducerAccount $proAcc
 * @property MasterPaymentMethod $proPayMethod
 */
class ProducerPaymentMethod extends CActiveRecord {

    public $after_save_enable = true;
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{producer_payment_method}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Pro_Acc_Id, Pro_Pay_Method_id, Pro_Bank_Account', 'required'),
            array('Pro_Acc_Id, Pro_Pay_Method_id, Pro_Bank_Account, Pro_Bank_Code, Pro_Bank_Branch', 'numerical', 'integerOnly' => true),
            array('Pro_Pay_Address, Pro_Pay_Iban, Pro_Pay_Swift', 'length', 'max' => 255),
            array('Active', 'length', 'max' => 1),
            array('Created_Date, Rowversion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Pro_Pay_Id, Pro_Acc_Id, Pro_Pay_Method_id, Pro_Bank_Account, Pro_Bank_Code, Pro_Bank_Branch, Pro_Pay_Address, Pro_Pay_Iban, Pro_Pay_Swift, Active, Created_Date, Rowversion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'proAcc' => array(self::BELONGS_TO, 'ProducerAccount', 'Pro_Acc_Id'),
            'proPayMethod' => array(self::BELONGS_TO, 'MasterPaymentMethod', 'Pro_Pay_Method_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Pro_Pay_Id' => 'Pro Pay',
            'Pro_Acc_Id' => 'Pro Acc',
            'Pro_Pay_Method_id' => 'Method',
            'Pro_Bank_Account' => 'Bank Account',
            'Pro_Bank_Code' => 'Bank Code',
            'Pro_Bank_Branch' => 'Bank Branch',
            'Pro_Pay_Address' => 'Address',
            'Pro_Pay_Iban' => 'IBAN',
            'Pro_Pay_Swift' => 'SWIFT-BIC',
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

        $criteria->compare('Pro_Pay_Id', $this->Pro_Pay_Id);
        $criteria->compare('Pro_Acc_Id', $this->Pro_Acc_Id);
        $criteria->compare('Pro_Pay_Method_id', $this->Pro_Pay_Method_id);
        $criteria->compare('Pro_Bank_Account', $this->Pro_Bank_Account);
        $criteria->compare('Pro_Bank_Code', $this->Pro_Bank_Code);
        $criteria->compare('Pro_Bank_Branch', $this->Pro_Bank_Branch);
        $criteria->compare('Pro_Pay_Address', $this->Pro_Pay_Address, true);
        $criteria->compare('Pro_Pay_Iban', $this->Pro_Pay_Iban, true);
        $criteria->compare('Pro_Pay_Swift', $this->Pro_Pay_Swift, true);
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
     * @return ProducerPaymentMethod the static model class
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

    protected function afterSave() {
        ProducerAccount::afterTabsave('PublisherPaymentMethod', 'publisherPaymentMethods');
        return parent::afterSave();
    }
}
