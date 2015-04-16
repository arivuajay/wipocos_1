<?php

/**
 * This is the model class for table "{{publisher_payment_method}}".
 *
 * The followings are the available columns in table '{{publisher_payment_method}}':
 * @property integer $Pub_Pay_Id
 * @property integer $Pub_Acc_Id
 * @property integer $Pub_Pay_Method_id
 * @property string $Pub_Bank_Account
 * @property string $Pub_Bank_Code
 * @property string $Pub_Bank_Branch
 * @property string $Active
 * @property string $Created_Date
 * @property string $Rowversion
 *
 * The followings are the available model relations:
 * @property PublisherAccount $pubAcc
 * @property MasterPaymentMethod $pubPayMethod
 */
class PublisherPaymentMethod extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{publisher_payment_method}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Pub_Acc_Id, Pub_Pay_Method_id, Pub_Bank_Account, Pub_Bank_Code, Pub_Bank_Branch', 'required'),
            array('Pub_Acc_Id, Pub_Pay_Method_id, Pub_Bank_Account, Pub_Bank_Code, Pub_Bank_Branch', 'numerical', 'integerOnly'=>true),
            array('Active', 'length', 'max'=>1),
            array('Created_Date, Rowversion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Pub_Pay_Id, Pub_Acc_Id, Pub_Pay_Method_id, Pub_Bank_Account, Pub_Bank_Code, Pub_Bank_Branch, Active, Created_Date, Rowversion', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'pubAcc' => array(self::BELONGS_TO, 'PublisherAccount', 'Pub_Acc_Id'),
            'pubPayMethod' => array(self::BELONGS_TO, 'MasterPaymentMethod', 'Pub_Pay_Method_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Pub_Pay_Id' => 'Pay',
            'Pub_Acc_Id' => 'Acc',
            'Pub_Pay_Method_id' => 'Pay Method',
            'Pub_Bank_Account' => 'Bank Account',
            'Pub_Bank_Code' => 'Bank Code',
            'Pub_Bank_Branch' => 'Bank Branch',
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

        $criteria->compare('Pub_Pay_Id', $this->Pub_Pay_Id);
        $criteria->compare('Pub_Acc_Id', $this->Pub_Acc_Id);
        $criteria->compare('Pub_Pay_Method_id', $this->Pub_Pay_Method_id);
        $criteria->compare('Pub_Bank_Account', $this->Pub_Bank_Account, true);
        $criteria->compare('Pub_Bank_Code', $this->Pub_Bank_Code, true);
        $criteria->compare('Pub_Bank_Branch', $this->Pub_Bank_Branch, true);
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
     * @return PublisherPaymentMethod the static model class
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
