<?php

/**
 * This is the model class for table "{{producer_pseudonym}}".
 *
 * The followings are the available columns in table '{{producer_pseudonym}}':
 * @property integer $Pro_Pseudo_Id
 * @property integer $Pro_Acc_Id
 * @property integer $Pro_Pseudo_Type_Id
 * @property string $Pro_Pseudo_Name
 * @property string $Active
 * @property string $Created_Date
 * @property string $Rowversion
 *
 * The followings are the available model relations:
 * @property MasterPseudonymTypes $proPseudoType
 * @property ProducerAccount $proAcc
 */
class ProducerPseudonym extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{producer_pseudonym}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Pro_Acc_Id, Pro_Pseudo_Type_Id, Pro_Pseudo_Name', 'required'),
            array('Pro_Acc_Id, Pro_Pseudo_Type_Id', 'numerical', 'integerOnly' => true),
            array('Pro_Pseudo_Name', 'length', 'max' => 50),
            array('Active', 'length', 'max' => 1),
            array('Created_Date, Rowversion', 'safe'),
//            array(
//                'Pro_Pseudo_Name',
//                'match', 'pattern' => '/^[a-zA-Z\s]+$/',
//                'message' => 'Only Alphabets are allowed ',
//            ),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Pro_Pseudo_Id, Pro_Acc_Id, Pro_Pseudo_Type_Id, Pro_Pseudo_Name, Active, Created_Date, Rowversion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'proPseudoType' => array(self::BELONGS_TO, 'MasterPseudonymTypes', 'Pro_Pseudo_Type_Id'),
            'proAcc' => array(self::BELONGS_TO, 'ProducerAccount', 'Pro_Acc_Id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Pro_Pseudo_Id' => 'Pseudo',
            'Pro_Acc_Id' => 'Acc',
            'Pro_Pseudo_Type_Id' => 'Type of reference',
            'Pro_Pseudo_Name' => 'Name or Corporate name',
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

        $criteria->compare('Pro_Pseudo_Id', $this->Pro_Pseudo_Id);
        $criteria->compare('Pro_Acc_Id', $this->Pro_Acc_Id);
        $criteria->compare('Pro_Pseudo_Type_Id', $this->Pro_Pseudo_Type_Id);
        $criteria->compare('Pro_Pseudo_Name', $this->Pro_Pseudo_Name, true);
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
     * @return ProducerPseudonym the static model class
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
