<?php

/**
 * This is the model class for table "{{internalcode_generate}}".
 *
 * The followings are the available columns in table '{{internalcode_generate}}':
 * @property integer $Gen_Inter_Code_Id
 * @property string $Gen_User_Type
 * @property string $Gen_Prefix
 * @property integer $Gen_Inter_Code
 * @property string $Gen_Suffix
 */
class InternalcodeGenerate extends CActiveRecord {
    const AUTHOR_CODE = 'A';
    const PERFORMER_CODE = 'P';
    const GROUP_CODE = 'G';
    const SOCIETY_CODE = 'SOC';
    const AUTHOR_PERFORMER_CODE = 'AP';
    const PUBLISHER_CODE = 'PU';
    const PRODUCER_CODE = 'PR';
    const PUBLISHER_PRODUCER_CODE = 'EP';

    const PUBLISHER_GROUP_CODE = 'GE';
    const PRODUCER_GROUP_CODE = 'GR';

    const WORK_CODE = 'W';
    const RECORDING_CODE = 'R';
    const RECORDING_PUBLISHING_CODE = 'RP';
    const SOUND_CARRIER_CODE = 'S';
    const SOUND_CARRIER_PUBLISHING_CODE = 'SP';

    public $fullcode;

    public function getFullcode() {
        $soc = Society::model()->findByPk(DEFAULT_SOCIETY_ID);
        $soc_prefix = !empty($soc) ? "{$soc->Society_Code}" : '';
        $role_prefix = $this->Gen_Prefix;
        $int_code = str_pad($this->Gen_Inter_Code,$this->Gen_Code_Pad,'0',STR_PAD_LEFT);
//        $role_suffix = $this->Gen_Suffix;

        return "{$soc_prefix}-{$role_prefix}-{$int_code}";
    }

    public function getSocietyfullcode() {
        $role_prefix = $this->Gen_Prefix;
        $int_code = str_pad($this->Gen_Inter_Code,$this->Gen_Code_Pad,'0',STR_PAD_LEFT);
//        $role_suffix = $this->Gen_Suffix;

        return "{$role_prefix}{$int_code}";
    }
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{internalcode_generate}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Gen_Inter_Code', 'required'),
            array('Gen_User_Type', 'unique'),
            array('Gen_Inter_Code', 'numerical', 'integerOnly' => true),
            array('Gen_User_Type', 'length', 'max'=>4),
            array('Gen_Prefix, Gen_Suffix', 'length', 'max' => 10),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Gen_Inter_Code_Id, Gen_User_Type, Gen_Prefix, Gen_Inter_Code, Gen_Suffix', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Gen_Inter_Code_Id' => 'Gen Inter Code',
            'Gen_User_Type' => 'Gen User Type',
            'Gen_Prefix' => 'Gen Prefix',
            'Gen_Inter_Code' => 'Gen Inter Code',
            'Gen_Suffix' => 'Gen Suffix',
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

        $criteria->compare('Gen_Inter_Code_Id', $this->Gen_Inter_Code_Id);
        $criteria->compare('Gen_User_Type', $this->Gen_User_Type, true);
        $criteria->compare('Gen_Prefix', $this->Gen_Prefix, true);
        $criteria->compare('Gen_Inter_Code', $this->Gen_Inter_Code);
        $criteria->compare('Gen_Suffix', $this->Gen_Suffix, true);

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
     * @return InternalcodeGenerate the static model class
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

    public function codeIncreament($type) {
        InternalcodeGenerate::model()->updateCounters(array('Gen_Inter_Code' => 1),array( 'condition' => "Gen_User_Type = '{$type}'"));
    }
}
