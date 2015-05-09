<?php

/**
 * This is the model class for table "{{producer_label_owner}}".
 *
 * The followings are the available columns in table '{{producer_label_owner}}':
 * @property integer $Label_Owner_Id
 * @property integer $Pro_Acc_Id
 * @property integer $Label_Id
 * @property string $Label_Owner_From
 * @property string $Label_Owner_To
 * @property string $Label_Share
 * @property string $Created_Date
 * @property string $Rowversion
 *
 * The followings are the available model relations:
 * @property ProducerAccount $proAcc
 * @property MasterLabel $label
 */
class ProducerLabelOwner extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{producer_label_owner}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Pro_Acc_Id, Label_Id, Label_Share, Label_Owner_From, Label_Owner_To', 'required'),
            array('Pro_Acc_Id, Label_Id', 'numerical', 'integerOnly' => true),
            array('Label_Share', 'numerical', 'integerOnly' => false, 'max' => 100),
            array('Label_Share', 'length', 'max' => 10),
            array('Label_Owner_To', 'compare', 'compareAttribute'=>'Label_Owner_From', 'operator'=>'>', 'message'=>'{attribute} must be greater than "{compareValue}".'),
            array('Label_Owner_From, Label_Owner_To, Created_Date, Rowversion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Label_Owner_Id, Pro_Acc_Id, Label_Id, Label_Owner_From, Label_Owner_To, Label_Share, Created_Date, Rowversion', 'safe', 'on' => 'search'),
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
            'label' => array(self::BELONGS_TO, 'MasterLabel', 'Label_Id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Label_Owner_Id' => 'Label Owner',
            'Pro_Acc_Id' => 'Producer',
            'Label_Id' => 'Label',
            'Label_Owner_From' => 'From',
            'Label_Owner_To' => 'To',
            'Label_Share' => 'Share',
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

        $criteria->compare('Label_Owner_Id', $this->Label_Owner_Id);
        $criteria->compare('Pro_Acc_Id', $this->Pro_Acc_Id);
        $criteria->compare('Label_Id', $this->Label_Id);
        $criteria->compare('Label_Owner_From', $this->Label_Owner_From, true);
        $criteria->compare('Label_Owner_To', $this->Label_Owner_To, true);
        $criteria->compare('Label_Share', $this->Label_Share, true);
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
     * @return ProducerLabelOwner the static model class
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
