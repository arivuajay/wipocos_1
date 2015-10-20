<?php

/**
 * This is the model class for table "{{distribution_logsheet_list_members}}".
 *
 * The followings are the available columns in table '{{distribution_logsheet_list_members}}':
 * @property integer $Log_Share_Id
 * @property integer $Log_List_Id
 * @property string $Log_Member_GUID
 * @property string $Log_Share_Broad_Amount
 * @property string $Log_Share_Mech_Amount
 *
 * The followings are the available model relations:
 * @property DistributionLogsheetList $logList
 */
class DistributionLogsheetListMembers extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{distribution_logsheet_list_members}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Log_List_Id, Log_Member_GUID', 'required'),
            array('Log_List_Id', 'numerical', 'integerOnly' => true),
            array('Log_Member_GUID', 'length', 'max' => 50),
            array('Log_Share_Broad_Amount, Log_Share_Mech_Amount', 'length', 'max' => 10),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Log_Share_Id, Log_List_Id, Log_Member_GUID, Log_Share_Broad_Amount, Log_Share_Mech_Amount', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'logList' => array(self::BELONGS_TO, 'DistributionLogsheetList', 'Log_List_Id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Log_Share_Id' => 'Log Share',
            'Log_List_Id' => 'Log List',
            'Log_Member_GUID' => 'Log Member Guid',
            'Log_Share_Broad_Amount' => 'Log Share Broad Amount',
            'Log_Share_Mech_Amount' => 'Log Share Mech Amount',
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

        $criteria->compare('Log_Share_Id', $this->Log_Share_Id);
        $criteria->compare('Log_List_Id', $this->Log_List_Id);
        $criteria->compare('Log_Member_GUID', $this->Log_Member_GUID, true);
        $criteria->compare('Log_Share_Broad_Amount', $this->Log_Share_Broad_Amount, true);
        $criteria->compare('Log_Share_Mech_Amount', $this->Log_Share_Mech_Amount, true);

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
     * @return DistributionLogsheetListMembers the static model class
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
