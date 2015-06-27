<?php

/**
 * This is the model class for table "{{group_members}}".
 *
 * The followings are the available columns in table '{{group_members}}':
 * @property integer $Group_Member_Id
 * @property integer $Group_Id
 * @property string $Group_Member_GUID
 * @property string $Created_Date
 * @property string $Rowversion
 *
 * The followings are the available model relations:
 * @property AuthorAccount $groupMemberInternalCode
 * @property Group $group
 */
class GroupMembers extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{group_members}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Group_Id,Group_Member_GUID', 'required'),
            array('Group_Id', 'numerical', 'integerOnly' => true),
            array('Group_Member_GUID', 'length', 'max' => 50),
            array('Rowversion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Group_Member_Id, Group_Id, Group_Member_GUID, Created_Date, Rowversion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'groupAuthors' => array(self::BELONGS_TO, 'AuthorAccount', array('Group_Member_GUID'=>'Auth_GUID')),
            'groupPerformers' => array(self::BELONGS_TO, 'PerformerAccount', array('Group_Member_GUID'=>'Perf_GUID')),
//            'groupAuthors' => array(self::BELONGS_TO, 'AuthorAccount', 'Group_Member_GUID'),
//            'groupPerformers' => array(self::BELONGS_TO, 'PerformerAccount', 'Group_Member_GUID'),
            'group' => array(self::BELONGS_TO, 'Group', 'Group_Id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Group_Member_Id' => 'Group Member',
            'Group_Id' => 'Groups',
            'Group_Member_GUID' => 'Group Member Internal Code',
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

        $criteria->compare('Group_Member_Id', $this->Group_Member_Id);
        $criteria->compare('Group_Id', $this->Group_Id);
        $criteria->compare('Group_Member_GUID', $this->Group_Member_GUID, true);
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
     * @return GroupMembers the static model class
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
