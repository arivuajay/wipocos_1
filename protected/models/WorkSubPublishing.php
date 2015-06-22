<?php

/**
 * This is the model class for table "{{work_sub_publishing}}".
 *
 * The followings are the available columns in table '{{work_sub_publishing}}':
 * @property integer $Work_Sub_Id
 * @property integer $Work_Id
 * @property string $Work_Sub_Contact_Start
 * @property string $Work_Sub_Contact_End
 * @property string $Work_Sub_Territories
 * @property string $Work_Sub_Clause
 * @property string $Work_Sub_Sign_Date
 * @property string $Work_Sub_File
 * @property integer $Work_Sub_References
 * @property string $Work_Sub_Catelog_Number
 * @property string $Created_Date
 * @property string $Rowversion
 *
 * The followings are the available model relations:
 * @property Work $work
 */
class WorkSubPublishing extends CActiveRecord {

    public function init() {
        parent::init();
        if ($this->isNewRecord) {
            $this->Work_Sub_Clause = 'M';
            $this->Work_Sub_Territories = CJSON::encode(array(DEFAULT_AUTHOR_MANAGED_RIGHTS_TERRITORY_ID));
        }
    }

    public function scopes() {
        $alias = $this->getTableAlias(false, false);
        $expiry_date = date('Y-m-d', strtotime("+2 months"));
        return array(
            'expiry' => array('condition' => "$alias.Work_Sub_Contact_End <= '{$expiry_date}'"),
        );
    }
    
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{work_sub_publishing}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Work_Id, Work_Sub_Contact_Start, Work_Sub_Contact_End, Work_Sub_Territories, Work_Sub_Sign_Date, Work_Sub_References, Work_Sub_Catelog_Number', 'required'),
            array('Work_Id, Work_Sub_References', 'numerical', 'integerOnly' => true),
            array('Work_Sub_Territories', 'length', 'max' => 500),
            array('Work_Sub_Clause', 'length', 'max' => 4),
            array('Work_Sub_File', 'length', 'max' => 255),
            array('Work_Sub_Catelog_Number', 'length', 'max' => 100),
            array('Created_Date, Rowversion', 'safe'),
            array('Work_Sub_Contact_End', 'compare', 'compareAttribute'=>'Work_Sub_Contact_Start', 'allowEmpty' => true, 'operator'=>'>', 'message'=>'{attribute} must be greater than "{compareValue}".'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Work_Sub_Id, Work_Id, Work_Sub_Contact_Start, Work_Sub_Contact_End, Work_Sub_Territories, Work_Sub_Clause, Work_Sub_Sign_Date, Work_Sub_File, Work_Sub_References, Work_Sub_Catelog_Number, Created_Date, Rowversion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'work' => array(self::BELONGS_TO, 'Work', 'Work_Id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Work_Sub_Id' => 'Work Sub',
            'Work_Id' => 'Work',
            'Work_Sub_Contact_Start' => 'Begin',
            'Work_Sub_Contact_End' => 'End',
            'Work_Sub_Territories' => 'Territories',
            'Work_Sub_Clause' => 'Clause',
            'Work_Sub_Sign_Date' => 'Date of signature',
            'Work_Sub_File' => 'File',
            'Work_Sub_References' => 'Number of References',
            'Work_Sub_Catelog_Number' => 'Catelogue Number',
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

        $criteria->compare('Work_Sub_Id', $this->Work_Sub_Id);
        $criteria->compare('Work_Id', $this->Work_Id);
        $criteria->compare('Work_Sub_Contact_Start', $this->Work_Sub_Contact_Start, true);
        $criteria->compare('Work_Sub_Contact_End', $this->Work_Sub_Contact_End, true);
        $criteria->compare('Work_Sub_Territories', $this->Work_Sub_Territories, true);
        $criteria->compare('Work_Sub_Clause', $this->Work_Sub_Clause, true);
        $criteria->compare('Work_Sub_Sign_Date', $this->Work_Sub_Sign_Date, true);
        $criteria->compare('Work_Sub_File', $this->Work_Sub_File, true);
        $criteria->compare('Work_Sub_References', $this->Work_Sub_References);
        $criteria->compare('Work_Sub_Catelog_Number', $this->Work_Sub_Catelog_Number, true);
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
     * @return WorkSubPublishing the static model class
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
        if (isset($this->Work_Sub_Territories) && is_array($this->Work_Sub_Territories)) {
            $this->Work_Sub_Territories = !empty($this->Work_Sub_Territories) ? json_encode($this->Work_Sub_Territories) : '';
        } else {
            $this->Work_Sub_Territories = '';
        }
        return parent::beforeValidate();
    }

    public function getTerritoryselected() {
        $selected = array();
        if ($this->Work_Sub_Territories) {
            $exp = json_decode($this->Work_Sub_Territories);
            if ($exp != NULL) {
                foreach ($exp as $ex) {
                    $selected[$ex] = array('selected' => 'selected');
                }
            }
        }
        return $selected;
    }

    public function getTerritorylist() {
        $terr = array();
        $territories = CHtml::listData(MasterTerritories::model()->findAll(), 'Master_Territory_Id', 'Territory_Name');
        $exp = json_decode($this->Work_Sub_Territories);
        foreach ($exp as $ex) {
            $terr[$ex] = $territories[$ex];
        }
        return implode(', ', $terr);
    }

}
