<?php

/**
 * This is the model class for table "{{producer_succession}}".
 *
 * The followings are the available columns in table '{{producer_succession}}':
 * @property integer $Pro_Suc_Id
 * @property integer $Pro_Acc_Id
 * @property string $Pro_Suc_Date_Transfer
 * @property string $Pro_Suc_Name
 * @property string $Pro_Suc_Address_1
 * @property string $Pro_Suc_Address_2
 * @property string $Pro_Suc_Annotation
 * @property string $Created_Date
 * @property string $Rowversion
 *
 * The followings are the available model relations:
 * @property ProducerAccount $proAcc
 */
class ProducerSuccession extends RActiveRecord {

    public $after_save_enable = true;
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{producer_succession}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Pro_Acc_Id, Pro_Suc_Name, Pro_Suc_Address_1, Pro_Suc_Annotation', 'required'),
            array('Pro_Acc_Id, Created_By, Updated_By', 'numerical', 'integerOnly' => true),
            array('Pro_Suc_Name', 'length', 'max' => 255),
            array('Pro_Suc_Address_1, Pro_Suc_Address_2', 'length', 'max' => 500),
            array('Pro_Suc_Date_Transfer, Created_Date, Rowversion, Created_By, Updated_By', 'safe'),
            array(
                'Pro_Suc_Name',
                'match', 'pattern' => '/^[a-zA-Z\s]+$/',
                'message' => 'Only Alphabets are allowed ',
            ),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Pro_Suc_Id, Pro_Acc_Id, Pro_Suc_Date_Transfer, Pro_Suc_Name, Pro_Suc_Address_1, Pro_Suc_Address_2, Pro_Suc_Annotation, Created_Date, Rowversion', 'safe', 'on' => 'search'),
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
            'createdBy' => array(self::BELONGS_TO, 'User', 'Created_By'),
            'updatedBy' => array(self::BELONGS_TO, 'User', 'Updated_By'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Pro_Suc_Id' => 'Pro Suc',
            'Pro_Acc_Id' => 'Pro Acc',
            'Pro_Suc_Date_Transfer' => 'Date Transfer',
            'Pro_Suc_Name' => 'Surname',
            'Pro_Suc_Address_1' => 'Address 1',
            'Pro_Suc_Address_2' => 'Address 2',
            'Pro_Suc_Annotation' => 'Additional Annotation',
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

        $criteria->compare('Pro_Suc_Id', $this->Pro_Suc_Id);
        $criteria->compare('Pro_Acc_Id', $this->Pro_Acc_Id);
        $criteria->compare('Pro_Suc_Date_Transfer', $this->Pro_Suc_Date_Transfer, true);
        $criteria->compare('Pro_Suc_Name', $this->Pro_Suc_Name, true);
        $criteria->compare('Pro_Suc_Address_1', $this->Pro_Suc_Address_1, true);
        $criteria->compare('Pro_Suc_Address_2', $this->Pro_Suc_Address_2, true);
        $criteria->compare('Pro_Suc_Annotation', $this->Pro_Suc_Annotation, true);
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
     * @return ProducerSuccession the static model class
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
        ProducerAccount::afterTabsave('PublisherSuccession', 'publisherSuccessions');
        return parent::afterSave();
    }
}
