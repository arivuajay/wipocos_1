<?php

/**
 * This is the model class for table "{{sound_carrier_rightholder}}".
 *
 * The followings are the available columns in table '{{sound_carrier_rightholder}}':
 * @property integer $Sound_Car_Right_Id
 * @property integer $Sound_Car_Id
 * @property string $Sound_Car_Right_Work_GUID
 * @property string $Sound_Car_Right_Member_GUID
 * @property string $Created_Date
 * @property string $Rowversion
 * @property integer $Created_By
 * @property integer $Updated_By
 * @property string $workMatchRecords
 *
 * The followings are the available model relations:
 * @property SoundCarrier $soundCar
 */
class SoundCarrierRightholder extends RActiveRecord {

    public $workMatchRecords;
    
    public $Sound_Car_Right_Member_Internal_Code;
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{sound_carrier_rightholder}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Sound_Car_Id, Sound_Car_Right_Role, Sound_Car_Right_Equal_Share, Sound_Car_Right_Equal_Org_Id, Sound_Car_Right_Blank_Share, Sound_Car_Right_Blank_Org_Id', 'required'),
            array('Sound_Car_Id, Sound_Car_Right_Role, Sound_Car_Right_Equal_Org_Id, Sound_Car_Right_Blank_Org_Id, Created_By, Updated_By', 'numerical', 'integerOnly' => true),
            array('Sound_Car_Right_Work_GUID, Sound_Car_Right_Member_GUID', 'length', 'max' => 40),
            array('Sound_Car_Right_Work_Type', 'length', 'max' => 1),
//            array('Sound_Car_Right_Equal_Share, Sound_Car_Right_Blank_Share', 'length', 'max' => 10),
            array('Sound_Car_Right_Equal_Share, Sound_Car_Right_Blank_Share', 'numerical', 'min' => 0, 'max' => 100, 'integerOnly' => false),
            array('Created_Date, Rowversion, Sound_Car_Right_Member_Internal_Code, Sound_Car_Right_Member_Type, workMatchRecords', 'safe'),
            array('Sound_Car_Right_Work_GUID', 'required', 'message' => 'Seacrh & select work before you save'),
            array('Sound_Car_Right_Member_GUID', 'required', 'message' => 'Seacrh & select user before you save'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Sound_Car_Right_Id, Sound_Car_Id, Sound_Car_Right_Work_GUID, Sound_Car_Right_Member_GUID, Sound_Car_Right_Work_Type, Sound_Car_Right_Role, Sound_Car_Right_Equal_Share, Sound_Car_Right_Equal_Org_Id, Sound_Car_Right_Blank_Share, Sound_Car_Right_Blank_Org_Id, Created_Date, Rowversion, Created_By, Updated_By', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'soundCar' => array(self::BELONGS_TO, 'SoundCarrier', 'Sound_Car_Id'),
            'rightholderAuthor' => array(self::BELONGS_TO, 'AuthorAccount', 'Sound_Car_Right_Member_GUID',
                'foreignKey' => array('Sound_Car_Right_Member_GUID' => 'Auth_GUID')
            ),
            'rightholderPerformer' => array(self::BELONGS_TO, 'PerformerAccount', 'Sound_Car_Right_Member_GUID',
                'foreignKey' => array('Sound_Car_Right_Member_GUID' => 'Perf_GUID')
            ),
            'rightholderWork' => array(self::BELONGS_TO, 'Work', 'Sound_Car_Right_Work_GUID',
                'foreignKey' => array('Sound_Car_Right_Work_GUID' => 'Work_GUID')
            ),
            'rightholderRecord' => array(self::BELONGS_TO, 'Recording', 'Sound_Car_Right_Work_GUID',
                'foreignKey' => array('Sound_Car_Right_Work_GUID' => 'Rcd_GUID')
            ),
            'soundCarRightBlankOrg' => array(self::BELONGS_TO, 'Organization', 'Sound_Car_Right_Blank_Org_Id'),
            'soundCarRightEqualOrg' => array(self::BELONGS_TO, 'Organization', 'Sound_Car_Right_Equal_Org_Id'),
            'soundCarRightRole' => array(self::BELONGS_TO, 'MasterTypeRights', 'Sound_Car_Right_Role'),
            'createdBy' => array(self::BELONGS_TO, 'User', 'Created_By'),
            'updatedBy' => array(self::BELONGS_TO, 'User', 'Updated_By'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Sound_Car_Right_Id' => 'Sound Car Right',
            'Sound_Car_Id' => 'Sound Car',
            'Sound_Car_Right_Work_GUID' => 'Sound Car Right Work Guid',
            'Sound_Car_Right_Member_GUID' => 'Sound Car Right Acc Guid',
            'Sound_Car_Right_Role' => 'Role',
            'Sound_Car_Right_Equal_Share' => 'Points',
            'Sound_Car_Right_Equal_Org_Id' => 'Organization',
            'Sound_Car_Right_Blank_Share' => 'Points',
            'Sound_Car_Right_Blank_Org_Id' => 'Organization',
            'Created_Date' => 'Created Date',
            'Rowversion' => 'Rowversion',
            'Created_By' => 'Created By',
            'Updated_By' => 'Updated By',
            'workMatchRecords' => 'Right Holders',
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

        $criteria->compare('Sound_Car_Right_Id', $this->Sound_Car_Right_Id);
        $criteria->compare('Sound_Car_Id', $this->Sound_Car_Id);
        $criteria->compare('Sound_Car_Right_Work_Type', $this->Sound_Car_Right_Work_Type);
        $criteria->compare('Sound_Car_Right_Work_GUID', $this->Sound_Car_Right_Work_GUID, true);
        $criteria->compare('Sound_Car_Right_Member_GUID', $this->Sound_Car_Right_Member_GUID, true);
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
     * @return SoundCarrierRightholder the static model class
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

    public function distinctWorks($sound_car_id) {
        $works = self::model()->findAll(array(
            'select' => 't.Sound_Car_Right_Work_GUID, t.Sound_Car_Right_Work_Type',
            'distinct' => true,
            'condition' => "t.Sound_Car_Id = $sound_car_id And t.Sound_Car_Right_Work_Type = 'W'"
        ));
        return $works;
    }

    public function distinctRecordings($sound_car_id) {
        $works = self::model()->findAll(array(
            'select' => 't.Sound_Car_Right_Work_GUID, t.Sound_Car_Right_Work_Type',
            'distinct' => true,
            'condition' => "t.Sound_Car_Id = $sound_car_id And t.Sound_Car_Right_Work_Type = 'R'"
        ));
        return $works;
    }

    public function workExportList($sound_car_id) {
        $criteria = new CDbCriteria;
//        $this->rules();
//        $criteria->together = true;
        $criteria->group = "t.Sound_Car_Right_Work_GUID";
 
//        $criteria->select = array(
//            't.Sound_Car_Right_Work_GUID', 't.Sound_Car_Right_Work_Type'
//        );

        $criteria->addCondition("t.Sound_Car_Id = $sound_car_id And t.Sound_Car_Right_Work_Type = 'W'");
//        $this->Sound_Car_Id = $sound_car_id;
//        $this->Sound_Car_Right_Work_Type = 'W';
//        $this->Sound_Car_Right_Work_Type = 'W';
//        return $this->search();

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 5,   
            )
        ));
    }
    
    public function getWorkMatchRecords() {
        return '<table border="1" class="match_det_table"><thead><tr><th>Right Holders</th><th>Role</th><th>Performance/Broadcast</th><th>Mechanical</th></tr></thead><tbody><tr><td>Vinodh Arumugam</td><td>CA</td><td>10.00 %</td><td>10.00 %</td></tr><tr><td>Robert Van</td><td>MC</td><td>20.00 %</td><td>20.00 %</td></tr><tr><td>VEGA Limited</td><td>E</td><td>50.00 %</td><td>50.00 %</td></tr><tr><td>Publisher 079</td><td>SE</td><td>20.00 %</td><td>20.00 %</td></tr></tbody></table>';
    }

}
