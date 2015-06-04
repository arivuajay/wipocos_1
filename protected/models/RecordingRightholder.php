<?php

/**
 * This is the model class for table "{{recording_rightholder}}".
 *
 * The followings are the available columns in table '{{recording_rightholder}}':
 * @property integer $Rcd_Right_Id
 * @property integer $Rcd_Id
 * @property string $Rcd_Member_Internal_Code
 * @property integer $Rcd_Right_Role
 * @property string $Rcd_Right_Equal_Share
 * @property integer $Rcd_Right_Equal_Org_id
 * @property string $Rcd_Right_Blank_Share
 * @property integer $Rcd_Right_Blank_Org_Id
 * @property string $Created_Date
 * @property string $Rowversion
 *
 * The followings are the available model relations:
 * @property Organization $rcdRightBlankOrg
 * @property Organization $rcdRightEqualOrg
 * @property Recording $rcd
 * @property MasterTypeRights $rcdRightRole
 */
class RecordingRightholder extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{recording_rightholder}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Rcd_Id, Rcd_Right_Role, Rcd_Right_Equal_Share, Rcd_Right_Equal_Org_id, Rcd_Right_Blank_Share, Rcd_Right_Blank_Org_Id, Created_Date', 'required'),
            array('Rcd_Member_Internal_Code', 'required', 'message' => 'Seacrh & select user before you save'),
            array('Rcd_Id, Rcd_Right_Role, Rcd_Right_Equal_Org_id, Rcd_Right_Blank_Org_Id', 'numerical', 'integerOnly' => true),
            array('Rcd_Member_Internal_Code', 'length', 'max' => 100),
            array('Rcd_Right_Equal_Share, Rcd_Right_Blank_Share', 'numerical', 'min' => 1, 'max' => 10, 'integerOnly' => false),
            array('Rowversion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Rcd_Right_Id, Rcd_Id, Rcd_Member_Internal_Code, Rcd_Right_Role, Rcd_Right_Equal_Share, Rcd_Right_Equal_Org_id, Rcd_Right_Blank_Share, Rcd_Right_Blank_Org_Id, Created_Date, Rowversion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'rcdRightBlankOrg' => array(self::BELONGS_TO, 'Organization', 'Rcd_Right_Blank_Org_Id'),
            'rcdRightEqualOrg' => array(self::BELONGS_TO, 'Organization', 'Rcd_Right_Equal_Org_id'),
            'rcd' => array(self::BELONGS_TO, 'Recording', 'Rcd_Id'),
            'rcdRightRole' => array(self::BELONGS_TO, 'MasterTypeRights', 'Rcd_Right_Role'),
            'recordingPerformer' => array(self::BELONGS_TO, 'PerformerAccount', 'Rcd_Member_Internal_Code','foreignKey' => array('Rcd_Member_Internal_Code'=>'Perf_Internal_Code')),
            'recordingProducer' => array(self::BELONGS_TO, 'ProducerAccount', 'Rcd_Member_Internal_Code','foreignKey' => array('Rcd_Member_Internal_Code'=>'Pro_Internal_Code')),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Rcd_Right_Id' => 'Rcd Right',
            'Rcd_Id' => 'Rcd',
            'Rcd_Member_Internal_Code' => 'Internal Code',
            'Rcd_Right_Role' => 'Role',
            'Rcd_Right_Equal_Share' => 'Share',
            'Rcd_Right_Equal_Org_id' => 'Organization',
            'Rcd_Right_Blank_Share' => 'Share',
            'Rcd_Right_Blank_Org_Id' => 'Organization',
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

        $criteria->compare('Rcd_Right_Id', $this->Rcd_Right_Id);
        $criteria->compare('Rcd_Id', $this->Rcd_Id);
        $criteria->compare('Rcd_Member_Internal_Code', $this->Rcd_Member_Internal_Code, true);
        $criteria->compare('Rcd_Right_Role', $this->Rcd_Right_Role);
        $criteria->compare('Rcd_Right_Equal_Share', $this->Rcd_Right_Equal_Share, true);
        $criteria->compare('Rcd_Right_Equal_Org_id', $this->Rcd_Right_Equal_Org_id);
        $criteria->compare('Rcd_Right_Blank_Share', $this->Rcd_Right_Blank_Share, true);
        $criteria->compare('Rcd_Right_Blank_Org_Id', $this->Rcd_Right_Blank_Org_Id);
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
     * @return RecordingRightholder the static model class
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
