<?php

/**
 * This is the model class for table "{{master_payment_method}}".
 *
 * The followings are the available columns in table '{{master_payment_method}}':
 * @property integer $Master_Paymode_Id
 * @property string $Paymode_Name
 * @property string $Paymode_Comment
 * @property string $Active
 * @property string $Created_Date
 * @property string $Rowversion
 */
class MasterPaymentMethod extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{master_payment_method}}';
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
            array('Paymode_Name, Paymode_Comment', 'required'),
            array('Paymode_Name', 'length', 'max' => 45),
            array('Paymode_Comment', 'length', 'max' => 90),
            array('Active', 'length', 'max' => 1),
            array('Created_Date, Rowversion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Master_Paymode_Id, Paymode_Name, Paymode_Comment, Active, Created_Date, Rowversion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'authorPaymentMethods' => array(self::HAS_MANY, 'AuthorPaymentMethod', 'Auth_Pay_Method_id'),
            'groupPaymentMethods' => array(self::HAS_MANY, 'GroupPaymentMethod', 'Group_Pay_Method_id'),
            'performerPaymentMethods' => array(self::HAS_MANY, 'PerformerPaymentMethod', 'Perf_Pay_Method_id'),
            'producerPaymentMethods' => array(self::HAS_MANY, 'ProducerPaymentMethod', 'Pro_Pay_Method_id'),
            'publisherPaymentMethods' => array(self::HAS_MANY, 'PublisherPaymentMethod', 'Pub_Pay_Method_id'),
            'societies' => array(self::HAS_MANY, 'Society', 'Society_Payment_Id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Master_Paymode_Id' => 'Master Paymode',
            'Paymode_Name' => 'Payment Method Name',
            'Paymode_Comment' => 'Payment Method Comment',
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

        $criteria->compare('Master_Paymode_Id', $this->Master_Paymode_Id);
        $criteria->compare('Paymode_Name', $this->Paymode_Name, true);
        $criteria->compare('Paymode_Comment', $this->Paymode_Comment, true);
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
     * @return MasterPaymentMethod the static model class
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
        $relations = array('authorPaymentMethods', 'groupPaymentMethods', 'performerPaymentMethods', 'producerPaymentMethods', 'publisherPaymentMethods');
        
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
                $this->addError('Paymode_Name', "This Payment Method is already linked with {$relation}. So you can't Edit this record.");
        }
        return parent::beforeValidate();
    }
}
