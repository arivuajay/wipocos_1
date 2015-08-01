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
 * @property integer $Gen_Code_Pad
 */
class InternalcodeGenerate extends RActiveRecord {
    const AUTHOR_CODE = 'A';
    const PERFORMER_CODE = 'P';
    const PUBLISHER_CODE = 'PU';
    const PRODUCER_CODE = 'PR';
    const AUTHOR_PERFORMER_CODE = 'AP';
    const PUBLISHER_PRODUCER_CODE = 'EP';
    
    const AUTHOR_GROUP_CODE = 'GA';
    const PERFORMER_GROUP_CODE = 'GP';
    const PUBLISHER_GROUP_CODE = 'GE';
    const PRODUCER_GROUP_CODE = 'GR';
    
    const GROUP_CODE = 'G'; //NOT USED
    
    const SOCIETY_CODE = 'O';

    const WORK_CODE = 'W';
    const RECORDING_CODE = 'R';
    const RECORDING_PUBLISHING_CODE = 'RP';
    const SOUND_CARRIER_CODE = 'S';
    const SOUND_CARRIER_PUBLISHING_CODE = 'SP';
    const RECORDING_SESSION_CODE = 'RS';
    
    const INSPECTOR_CODE = 'IS';
    const TARIFF_CONTRACT_CODE = 'TF';
    
    public $fullcode;
    
    public $virtualinternalcode;

    public function getVirtualinternalcode() {
        return str_pad($this->Gen_Inter_Code,$this->Gen_Code_Pad,'0',STR_PAD_LEFT);
    }

    public function getFullcode() {
        $soc_prefix = $this->Gen_Soc_Id;
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
            array('Gen_Inter_Code, Gen_Prefix, Gen_Soc_Id', 'required'),
            array('Gen_User_Type', 'unique'),
            array('Gen_Inter_Code', 'numerical', 'integerOnly' => true),
            array('Gen_User_Type', 'length', 'max'=>4),
            array('Gen_Inter_Code', 'length', 'min'=> $this->Gen_Code_Pad, 'max'=> $this->Gen_Code_Pad),
            array('Gen_Inter_Code', 'numerical', 'min'=> 1, 'max'=> 9999999),
            array('Gen_Prefix, Gen_Suffix, Gen_Soc_Id', 'length', 'max' => 3),
            array('Created_Date, Rowversion, Created_By, Updated_By', 'safe'),
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
//            'soceity' => array(self::BELONGS_TO, 'Society', 'Gen_Soc_Id'),
            'createdBy' => array(self::BELONGS_TO, 'User', 'Created_By'),
            'updatedBy' => array(self::BELONGS_TO, 'User', 'Updated_By'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Gen_Inter_Code_Id' => 'Inter Code',
            'Gen_User_Type' => 'Module',
            'Gen_Soc_Id' => 'Soceity',
            'Gen_Prefix' => 'Prefix',
            'Gen_Inter_Code' => 'Internal Code',
            'Gen_Suffix' => 'Suffix',
            'Gen_Soc_Id' => 'Society',
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
        $criteria->compare('Gen_Inter_Code', intval($this->Gen_Inter_Code));
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
    
    protected function afterFind() {
        $this->Gen_Inter_Code = $this->getVirtualinternalcode();
        return parent::afterFind();
    }

    protected function beforeSave() {
        $this->Gen_Inter_Code = intval($this->Gen_Inter_Code);
        return parent::beforeSave();
    }
    
    public function getUsertype($user_type = NULL) {
        $user_types = array(
            self::SOCIETY_CODE => 'Society',
            self::AUTHOR_CODE => 'Author',
            self::PERFORMER_CODE => 'Performer',
            self::AUTHOR_PERFORMER_CODE => 'Author & Performer',
            self::PUBLISHER_CODE => 'Publisher',
            self::PRODUCER_CODE => 'Producer',
            self::PUBLISHER_PRODUCER_CODE => 'Publisher & Producer',
            self::AUTHOR_GROUP_CODE => 'Author Group',
            self::PERFORMER_GROUP_CODE => 'Performer Group',
            self::PUBLISHER_GROUP_CODE => 'Publisher Group',
            self::PRODUCER_GROUP_CODE => 'Producer Group',
            self::WORK_CODE => 'Work',
            self::RECORDING_CODE => 'Recording',
            self::RECORDING_PUBLISHING_CODE => 'Recording Publishing',
            self::RECORDING_SESSION_CODE => 'Recording Session Sheet',
            self::SOUND_CARRIER_CODE => 'Sound Carrier',
            self::SOUND_CARRIER_PUBLISHING_CODE => 'Sound Carrier Publishing',
            self::INSPECTOR_CODE => 'Inspectors',
            self::TARIFF_CONTRACT_CODE => 'Tariff Contracts',
        );
        
        if($user_type == NULL && isset($this->Gen_User_Type))
            $user_type = $this->Gen_User_Type;
        
        if($user_type != NULL)
            return $user_types[$user_type];
        return $user_types;
    }
}
