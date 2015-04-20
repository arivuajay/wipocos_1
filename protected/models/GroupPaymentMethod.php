<?php

/**
 * This is the model class for table "{{group_payment_method}}".
 *
 * The followings are the available columns in table '{{group_payment_method}}':
 * @property integer $Group_Pay_Id
 * @property integer $Group_Id
 * @property integer $Group_Pay_Method_id
 * @property string $Group_Bank_Account_1
 * @property string $Group_Bank_Account_2
 * @property string $Group_Bank_Account_3
 * @property string $Active
 * @property string $Created_Date
 * @property string $Rowversion
 *
 * The followings are the available model relations:
 * @property Group $group
 * @property MasterPaymentMethod $groupPayMethod
 */
class GroupPaymentMethod extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{group_payment_method}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Group_Id, Group_Pay_Method_id, Group_Bank_Account_1, Group_Bank_Account_2, Group_Bank_Account_3', 'required'),
            array('Group_Id, Group_Pay_Method_id', 'numerical', 'integerOnly' => true),
            array('Group_Bank_Account_1, Group_Bank_Account_2, Group_Bank_Account_3', 'length', 'max' => 255),
            array('Active', 'length', 'max' => 1),
            array('Created_Date, Rowversion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Group_Pay_Id, Group_Id, Group_Pay_Method_id, Group_Bank_Account_1, Group_Bank_Account_2, Group_Bank_Account_3, Active, Created_Date, Rowversion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'group' => array(self::BELONGS_TO, 'Group', 'Group_Id'),
            'groupPayMethod' => array(self::BELONGS_TO, 'MasterPaymentMethod', 'Group_Pay_Method_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Group_Pay_Id' => 'Group Pay',
            'Group_Id' => 'Group',
            'Group_Pay_Method_id' => 'Payment Method',
            'Group_Bank_Account_1' => 'Bank Account 1',
            'Group_Bank_Account_2' => 'Bank Account 2',
            'Group_Bank_Account_3' => 'Bank Account 3',
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

        $criteria->compare('Group_Pay_Id', $this->Group_Pay_Id);
        $criteria->compare('Group_Id', $this->Group_Id);
        $criteria->compare('Group_Pay_Method_id', $this->Group_Pay_Method_id);
        $criteria->compare('Group_Bank_Account_1', $this->Group_Bank_Account_1, true);
        $criteria->compare('Group_Bank_Account_2', $this->Group_Bank_Account_2, true);
        $criteria->compare('Group_Bank_Account_3', $this->Group_Bank_Account_3, true);
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
     * @return GroupPaymentMethod the static model class
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
