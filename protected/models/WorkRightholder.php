<?php

/**
 * This is the model class for table "{{work_rightholder}}".
 *
 * The followings are the available columns in table '{{work_rightholder}}':
 * @property integer $Work_Right_Id
 * @property integer $Work_Id
 * @property string $Work_Right_Surname
 * @property string $Work_Right_Firstname
 * @property string $Work_Right_Internal_Code
 * @property string $Work_Right_User_Type
 * @property integer $Work_Right_Role_Id
 * @property string $Work_Right_Broad_Share
 * @property string $Work_Right_Broad_Special
 * @property integer $Work_Right_Broad_Org_id
 * @property string $Work_Right_Mech_Share
 * @property string $Work_Right_Mech_Special
 * @property integer $Work_Right_Mech_Org_Id
 * @property string $Created_Date
 * @property string $Rowversion
 *
 * The followings are the available model relations:
 * @property Organization $workRightBroadOrg
 * @property Organization $workRightMechOrg
 * @property Work $work
 */
class WorkRightholder extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{work_rightholder}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Work_Id, Work_Right_Surname, Work_Right_Firstname, Work_Right_Internal_Code, Work_Right_User_Type, Work_Right_Role_Id, Work_Right_Broad_Share, Work_Right_Broad_Org_id, Work_Right_Mech_Share, Work_Right_Mech_Org_Id', 'required'),
            array('Work_Id, Work_Right_Role_Id, Work_Right_Broad_Org_id, Work_Right_Mech_Org_Id', 'numerical', 'integerOnly' => true),
            array('Work_Right_Surname, Work_Right_Internal_Code', 'length', 'max' => 100),
            array('Work_Right_Firstname', 'length', 'max' => 255),
            array('Work_Right_User_Type, Work_Right_Broad_Share, Work_Right_Mech_Share', 'length', 'max' => 10),
            array('Work_Right_Broad_Special, Work_Right_Mech_Special', 'length', 'max' => 2),
            array('Created_Date, Rowversion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Work_Right_Id, Work_Id, Work_Right_Surname, Work_Right_Firstname, Work_Right_Internal_Code, Work_Right_User_Type, Work_Right_Role_Id, Work_Right_Broad_Share, Work_Right_Broad_Special, Work_Right_Broad_Org_id, Work_Right_Mech_Share, Work_Right_Mech_Special, Work_Right_Mech_Org_Id, Created_Date, Rowversion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'workRightBroadOrg' => array(self::BELONGS_TO, 'Organization', 'Work_Right_Broad_Org_id'),
            'workRightMechOrg' => array(self::BELONGS_TO, 'Organization', 'Work_Right_Mech_Org_Id'),
            'work' => array(self::BELONGS_TO, 'Work', 'Work_Id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Work_Right_Id' => 'Work Right',
            'Work_Id' => 'Work',
            'Work_Right_Surname' => 'Work Right Surname',
            'Work_Right_Firstname' => 'Work Right Firstname',
            'Work_Right_Internal_Code' => 'Work Right Internal Code',
            'Work_Right_User_Type' => 'Work Right User Type',
            'Work_Right_Role_Id' => 'Work Right Role',
            'Work_Right_Broad_Share' => 'Work Right Broad Share',
            'Work_Right_Broad_Special' => 'Work Right Broad Special',
            'Work_Right_Broad_Org_id' => 'Work Right Broad Org',
            'Work_Right_Mech_Share' => 'Work Right Mech Share',
            'Work_Right_Mech_Special' => 'Work Right Mech Special',
            'Work_Right_Mech_Org_Id' => 'Work Right Mech Org',
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

        $criteria->compare('Work_Right_Id', $this->Work_Right_Id);
        $criteria->compare('Work_Id', $this->Work_Id);
        $criteria->compare('Work_Right_Surname', $this->Work_Right_Surname, true);
        $criteria->compare('Work_Right_Firstname', $this->Work_Right_Firstname, true);
        $criteria->compare('Work_Right_Internal_Code', $this->Work_Right_Internal_Code, true);
        $criteria->compare('Work_Right_User_Type', $this->Work_Right_User_Type, true);
        $criteria->compare('Work_Right_Role_Id', $this->Work_Right_Role_Id);
        $criteria->compare('Work_Right_Broad_Share', $this->Work_Right_Broad_Share, true);
        $criteria->compare('Work_Right_Broad_Special', $this->Work_Right_Broad_Special, true);
        $criteria->compare('Work_Right_Broad_Org_id', $this->Work_Right_Broad_Org_id);
        $criteria->compare('Work_Right_Mech_Share', $this->Work_Right_Mech_Share, true);
        $criteria->compare('Work_Right_Mech_Special', $this->Work_Right_Mech_Special, true);
        $criteria->compare('Work_Right_Mech_Org_Id', $this->Work_Right_Mech_Org_Id);
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
     * @return WorkRightholder the static model class
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
