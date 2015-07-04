<?php

/**
 * This is the model class for table "{{work_rightholder_audit}}".
 *
 * The followings are the available columns in table '{{work_rightholder_audit}}':
 * @property integer $Work_Right_Audit_Id
 * @property integer $Work_Id
 * @property string $Work_Member_GUID
 * @property integer $Work_Right_Audit_Role
 * @property string $Work_Right_Audit_Broad_Share
 * @property string $Work_Right_Audit_Broad_Special
 * @property integer $Work_Right_Audit_Broad_Org_id
 * @property string $Work_Right_Audit_Mech_Share
 * @property string $Work_Right_Audit_Mech_Special
 * @property integer $Work_Right_Audit_Mech_Org_Id
 * @property string $Created_Date
 * @property string $Rowversion
 *
 * The followings are the available model relations:
 * @property Organization $workRightAuditBroadOrg
 * @property Organization $workRightAuditMechOrg
 * @property MasterTypeRights $workRightAuditRole
 * @property Work $work
 */
class WorkRightholderAudit extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{work_rightholder_audit}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Work_Id, Work_Member_GUID, Work_Right_Audit_Role, Work_Right_Audit_Broad_Share, Work_Right_Audit_Broad_Org_id, Work_Right_Audit_Mech_Share, Work_Right_Audit_Mech_Org_Id', 'required'),
            array('Work_Id, Work_Right_Audit_Role, Work_Right_Audit_Broad_Org_id, Work_Right_Audit_Mech_Org_Id, Created_By, Updated_By', 'numerical', 'integerOnly' => true),
            array('Work_Member_GUID', 'length', 'max' => 50),
            array('Work_Right_Audit_Broad_Share, Work_Right_Audit_Mech_Share', 'length', 'max' => 10),
            array('Work_Right_Audit_Broad_Special, Work_Right_Audit_Mech_Special', 'length', 'max' => 2),
            array('Created_Date, Rowversion, Created_By, Updated_By', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Work_Right_Audit_Id, Work_Id, Work_Member_GUID, Work_Right_Audit_Role, Work_Right_Audit_Broad_Share, Work_Right_Audit_Broad_Special, Work_Right_Audit_Broad_Org_id, Work_Right_Audit_Mech_Share, Work_Right_Audit_Mech_Special, Work_Right_Audit_Mech_Org_Id, Created_Date, Rowversion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'workRightAuditBroadOrg' => array(self::BELONGS_TO, 'Organization', 'Work_Right_Audit_Broad_Org_id'),
            'workRightAuditMechOrg' => array(self::BELONGS_TO, 'Organization', 'Work_Right_Audit_Mech_Org_Id'),
            'workRightAuditRole' => array(self::BELONGS_TO, 'MasterTypeRights', 'Work_Right_Audit_Role'),
            'work' => array(self::BELONGS_TO, 'Work', 'Work_Id'),
            'createdBy' => array(self::BELONGS_TO, 'User', 'Created_By'),
            'updatedBy' => array(self::BELONGS_TO, 'User', 'Updated_By'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Work_Right_Audit_Id' => 'Work Right Audit',
            'Work_Id' => 'Work',
            'Work_Member_GUID' => 'Work Member Guid',
            'Work_Right_Audit_Role' => 'Work Right Audit Role',
            'Work_Right_Audit_Broad_Share' => 'Work Right Audit Broad Share',
            'Work_Right_Audit_Broad_Special' => 'Work Right Audit Broad Special',
            'Work_Right_Audit_Broad_Org_id' => 'Work Right Audit Broad Org',
            'Work_Right_Audit_Mech_Share' => 'Work Right Audit Mech Share',
            'Work_Right_Audit_Mech_Special' => 'Work Right Audit Mech Special',
            'Work_Right_Audit_Mech_Org_Id' => 'Work Right Audit Mech Org',
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

        $criteria->compare('Work_Right_Audit_Id', $this->Work_Right_Audit_Id);
        $criteria->compare('Work_Id', $this->Work_Id);
        $criteria->compare('Work_Member_GUID', $this->Work_Member_GUID, true);
        $criteria->compare('Work_Right_Audit_Role', $this->Work_Right_Audit_Role);
        $criteria->compare('Work_Right_Audit_Broad_Share', $this->Work_Right_Audit_Broad_Share, true);
        $criteria->compare('Work_Right_Audit_Broad_Special', $this->Work_Right_Audit_Broad_Special, true);
        $criteria->compare('Work_Right_Audit_Broad_Org_id', $this->Work_Right_Audit_Broad_Org_id);
        $criteria->compare('Work_Right_Audit_Mech_Share', $this->Work_Right_Audit_Mech_Share, true);
        $criteria->compare('Work_Right_Audit_Mech_Special', $this->Work_Right_Audit_Mech_Special, true);
        $criteria->compare('Work_Right_Audit_Mech_Org_Id', $this->Work_Right_Audit_Mech_Org_Id);
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
     * @return WorkRightholderAudit the static model class
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
