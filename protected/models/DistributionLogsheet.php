<?php

/**
 * This is the model class for table "{{distribution_logsheet}}".
 *
 * The followings are the available columns in table '{{distribution_logsheet}}':
 * @property integer $Log_Id
 * @property integer $Period_Id
 * @property integer $Log_User_Cust_Id
 * @property integer $Log_Place_Id
 * @property integer $Log_Net_Amount
 * @property string $Created_Date
 * @property string $Rowversion
 * @property integer $Created_By
 * @property integer $Updated_By
 *
 * The followings are the available model relations:
 * @property MasterPlace $logPlace
 * @property CustomerUser $logUserCust
 * @property DistributionUtlizationPeriod $period
 * @property DistributionLogsheetList[] $distributionLogsheetLists
 */
class DistributionLogsheet extends RActiveRecord {

    const IMPORT_TYPE = 'xls';
    public $import_file;
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{distribution_logsheet}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Period_Id, Log_User_Cust_Id', 'required'),
            array('import_file', 'required', 'on' => 'import'),
            array('Log_Net_Amount', 'required', 'on' => 'calc'),
            array('Period_Id, Log_User_Cust_Id, Log_Place_Id, Created_By, Updated_By', 'numerical', 'integerOnly' => true),
            array('import_file', 'file', 'allowEmpty' => true, 'types' => self::IMPORT_TYPE),
            array('Log_Net_Amount', 'numerical', 'integerOnly' => false),
            array('Created_Date, Rowversion, Log_Net_Amount', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Log_Id, Period_Id, Log_User_Cust_Id, Log_Place_Id, Created_Date, Rowversion, Created_By, Updated_By', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'logPlace' => array(self::BELONGS_TO, 'MasterPlace', 'Log_Place_Id'),
            'logUserCust' => array(self::BELONGS_TO, 'CustomerUser', 'Log_User_Cust_Id'),
            'period' => array(self::BELONGS_TO, 'DistributionUtlizationPeriod', 'Period_Id'),
            'distributionLogsheetLists' => array(self::HAS_MANY, 'DistributionLogsheetList', 'Log_Id'),
            'createdBy' => array(self::BELONGS_TO, 'User', 'Created_By'),
            'updatedBy' => array(self::BELONGS_TO, 'User', 'Updated_By'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Log_Id' => 'Log',
            'Period_Id' => 'Period',
            'Log_User_Cust_Id' => 'User',
            'Log_Place_Id' => 'Type (Place)',
            'Created_Date' => 'Created Date',
            'Rowversion' => 'Rowversion',
            'Created_By' => 'Created By',
            'Updated_By' => 'Updated By',
            'import_file' => 'Import XLS',
            'Log_Net_Amount' => 'Net Amount',
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

        $criteria->compare('Log_Id', $this->Log_Id);
        $criteria->compare('Period_Id', $this->Period_Id);
        $criteria->compare('Log_User_Cust_Id', $this->Log_User_Cust_Id);
        $criteria->compare('Log_Place_Id', $this->Log_Place_Id);
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
     * @return DistributionLogsheet the static model class
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

    public static function logExists($period_id) {
        $exists = self::model()->findByAttributes(array('Period_Id' => $period_id));
        return !empty($exists) && !empty($exists->distributionLogsheetLists);
    }
    
    public function getTotalUnitTariff() {
        $unit_tariff = 0;
        foreach ($this->distributionLogsheetLists as $key => $list) {
            $unit_tariff += $list->Log_List_Unit_Tariff;
        }
        return $unit_tariff;
    }
}
