<?php

/**
 * This is the model class for table "{{performer_payment_method}}".
 *
 * The followings are the available columns in table '{{performer_payment_method}}':
 * @property integer $Perf_Pay_Id
 * @property integer $Perf_Acc_Id
 * @property integer $Perf_Pay_Method_id
 * @property string $Perf_Bank_Account_1
 * @property string $Perf_Bank_Account_2
 * @property string $Perf_Bank_Account_3
 * @property string $Active
 * @property string $Created_Date
 * @property string $Rowversion
 *
 * The followings are the available model relations:
 * @property PerformerAccount $perfAcc
 * @property MasterPaymentMethod $perfPayMethod
 */
class PerformerPaymentMethod extends RActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{performer_payment_method}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Perf_Acc_Id, Perf_Pay_Method_id, Perf_Bank_Account_1, Perf_Bank_Account_2, Perf_Bank_Account_3', 'required'),
            array('Perf_Acc_Id, Perf_Pay_Method_id, Created_By, Updated_By', 'numerical', 'integerOnly' => true),
            array('Perf_Bank_Account_1, Perf_Bank_Account_2, Perf_Bank_Account_3', 'length', 'max' => 255),
            array('Active', 'length', 'max' => 1),
            array('Created_Date, Rowversion, Created_By, Updated_By', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Perf_Pay_Id, Perf_Acc_Id, Perf_Pay_Method_id, Perf_Bank_Account_1, Perf_Bank_Account_2, Perf_Bank_Account_3, Active, Created_Date, Rowversion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'perfAcc' => array(self::BELONGS_TO, 'PerformerAccount', 'Perf_Acc_Id'),
            'perfPayMethod' => array(self::BELONGS_TO, 'MasterPaymentMethod', 'Perf_Pay_Method_id'),
            'createdBy' => array(self::BELONGS_TO, 'User', 'Created_By'),
            'updatedBy' => array(self::BELONGS_TO, 'User', 'Updated_By'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Perf_Pay_Id' => 'Perf Pay',
            'Perf_Acc_Id' => 'Perf Acc',
            'Perf_Pay_Method_id' => 'Payment Method',
            'Perf_Bank_Account_1' => 'Bank Account 1',
            'Perf_Bank_Account_2' => 'Bank Account 2',
            'Perf_Bank_Account_3' => 'Bank Account 3',
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

        $criteria->compare('Perf_Pay_Id', $this->Perf_Pay_Id);
        $criteria->compare('Perf_Acc_Id', $this->Perf_Acc_Id);
        $criteria->compare('Perf_Pay_Method_id', $this->Perf_Pay_Method_id);
        $criteria->compare('Perf_Bank_Account_1', $this->Perf_Bank_Account_1, true);
        $criteria->compare('Perf_Bank_Account_2', $this->Perf_Bank_Account_2, true);
        $criteria->compare('Perf_Bank_Account_3', $this->Perf_Bank_Account_3, true);
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
     * @return PerformerPaymentMethod the static model class
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
        PerformerAccount::afterTabsave('AuthorPaymentMethod', 'authorPaymentMethods');
        parent::afterSave();
    }

}
