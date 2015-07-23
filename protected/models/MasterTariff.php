<?php

/**
 * This is the model class for table "{{master_tariff}}".
 *
 * The followings are the available columns in table '{{master_tariff}}':
 * @property integer $Master_Tarif_Id
 * @property string $Tarif_Code
 * @property string $Tarif_Description
 * @property string $Tarif_Min_Tarif_Amount
 * @property string $Tarif_Max_Tarif_Amount
 * @property string $Tarif_Amount
 * @property string $Tarif_Percentage
 * @property string $Tarif_Comment
 * @property integer $Tarif_Currency_Id
 * @property string $Created_Date
 * @property string $Rowversion
 * @property integer $Created_By
 * @property integer $Updated_By
 *
 * The followings are the available model relations:
 * @property MasterCurrency $tarifCurrency
 */
class MasterTariff extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{master_tariff}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Tarif_Code, Tarif_Description', 'required'),
            array('Tarif_Currency_Id, Created_By, Updated_By', 'numerical', 'integerOnly' => true),
            array('Tarif_Code', 'length', 'max' => 50),
            array('Tarif_Description', 'length', 'max' => 100),
            array('Tarif_Min_Tarif_Amount, Tarif_Max_Tarif_Amount, Tarif_Amount', 'numerical', 'integerOnly' => false),
            array('Tarif_Percentage', 'length', 'max' => 1),
            array('Tarif_Comment, Created_Date, Rowversion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Master_Tarif_Id, Tarif_Code, Tarif_Description, Tarif_Min_Tarif_Amount, Tarif_Max_Tarif_Amount, Tarif_Amount, Tarif_Percentage, Tarif_Comment, Tarif_Currency_Id, Created_Date, Rowversion, Created_By, Updated_By', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'tarifCurrency' => array(self::BELONGS_TO, 'MasterCurrency', 'Tarif_Currency_Id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Master_Tarif_Id' => 'Master Tarif',
            'Tarif_Code' => 'Code',
            'Tarif_Description' => 'Description',
            'Tarif_Min_Tarif_Amount' => 'Minimum Tariff',
            'Tarif_Max_Tarif_Amount' => 'Maximum Tariff',
            'Tarif_Amount' => 'Standard Tariff',
            'Tarif_Percentage' => 'Percentage',
            'Tarif_Comment' => 'Comment',
            'Tarif_Currency_Id' => 'Currency',
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

        $criteria->compare('Master_Tarif_Id', $this->Master_Tarif_Id);
        $criteria->compare('Tarif_Code', $this->Tarif_Code, true);
        $criteria->compare('Tarif_Description', $this->Tarif_Description, true);
        $criteria->compare('Tarif_Min_Tarif_Amount', $this->Tarif_Min_Tarif_Amount, true);
        $criteria->compare('Tarif_Max_Tarif_Amount', $this->Tarif_Max_Tarif_Amount, true);
        $criteria->compare('Tarif_Amount', $this->Tarif_Amount, true);
        $criteria->compare('Tarif_Percentage', $this->Tarif_Percentage, true);
        $criteria->compare('Tarif_Comment', $this->Tarif_Comment, true);
        $criteria->compare('Tarif_Currency_Id', $this->Tarif_Currency_Id);
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
     * @return MasterTariff the static model class
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
