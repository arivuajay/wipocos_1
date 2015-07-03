<?php

/**
 * This is the model class for table "{{group_pseudonym}}".
 *
 * The followings are the available columns in table '{{group_pseudonym}}':
 * @property integer $Group_Pseudo_Id
 * @property integer $Group_Id
 * @property integer $Group_Pseudo_Type_Id
 * @property string $Group_Pseudo_Name
 * @property string $Active
 * @property string $Created_Date
 * @property string $Rowversion
 *
 * The followings are the available model relations:
 * @property Group $group
 * @property MasterPseudonymTypes $groupPseudoType
 */
class GroupPseudonym extends RActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{group_pseudonym}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Group_Id, Group_Pseudo_Type_Id, Group_Pseudo_Name', 'required'),
            array('Group_Id, Group_Pseudo_Type_Id, Created_By, Updated_By', 'numerical', 'integerOnly' => true),
            array('Group_Pseudo_Name', 'length', 'max' => 50),
            array('Active', 'length', 'max' => 1),
            array('Created_Date, Rowversion, Created_By, Updated_By', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Group_Pseudo_Id, Group_Id, Group_Pseudo_Type_Id, Group_Pseudo_Name, Active, Created_Date, Rowversion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'group' => array(self::BELONGS_TO, 'Group', 'Group_Id'),
            'groupPseudoType' => array(self::BELONGS_TO, 'MasterPseudonymTypes', 'Group_Pseudo_Type_Id'),
            'createdBy' => array(self::BELONGS_TO, 'User', 'Created_By'),
            'updatedBy' => array(self::BELONGS_TO, 'User', 'Updated_By'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Group_Pseudo_Id' => 'Group Pseudo',
            'Group_Id' => 'Group',
            'Group_Pseudo_Type_Id' => 'Group Pseudo Type',
            'Group_Pseudo_Name' => 'Group Pseudo Name',
            'Active' => 'Active',
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

        $criteria->compare('Group_Pseudo_Id', $this->Group_Pseudo_Id);
        $criteria->compare('Group_Id', $this->Group_Id);
        $criteria->compare('Group_Pseudo_Type_Id', $this->Group_Pseudo_Type_Id);
        $criteria->compare('Group_Pseudo_Name', $this->Group_Pseudo_Name, true);
        $criteria->compare('Active', $this->Active, true);
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
     * @return GroupPseudonym the static model class
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
