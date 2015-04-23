<?php

/**
 * This is the model class for table "{{publisher_group_sub_share}}".
 *
 * The followings are the available columns in table '{{publisher_group_sub_share}}':
 * @property integer $Pub_Group_Sub_Share_Id
 * @property integer $Pub_Group_Id
 * @property string $Pub_Group_Sub_Share_Broadcast
 * @property string $Pub_Group_Sub_Share_Mechanical
 * @property string $Created_Date
 * @property string $Rowversion
 *
 * The followings are the available model relations:
 * @property PublisherGroup $pubGroup
 */
class PublisherGroupSubShare extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{publisher_group_sub_share}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Pub_Group_Id, Pub_Group_Sub_Share_Broadcast, Pub_Group_Sub_Share_Mechanical', 'required'),
            array('Pub_Group_Id, Pub_Group_Sub_Share_Broadcast, Pub_Group_Sub_Share_Mechanical', 'numerical', 'integerOnly' => true),
            array('Pub_Group_Sub_Share_Broadcast, Pub_Group_Sub_Share_Mechanical', 'length', 'max' => 10),
            array('Created_Date, Rowversion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Pub_Group_Sub_Share_Id, Pub_Group_Id, Pub_Group_Sub_Share_Broadcast, Pub_Group_Sub_Share_Mechanical, Created_Date, Rowversion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'pubGroup' => array(self::BELONGS_TO, 'PublisherGroup', 'Pub_Group_Id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Pub_Group_Sub_Share_Id' => 'Pub Group Sub Share',
            'Pub_Group_Id' => 'Pub Group',
            'Pub_Group_Sub_Share_Broadcast' => 'Broadcast and Performance',
            'Pub_Group_Sub_Share_Mechanical' => 'Mechanical',
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

        $criteria->compare('Pub_Group_Sub_Share_Id', $this->Pub_Group_Sub_Share_Id);
        $criteria->compare('Pub_Group_Id', $this->Pub_Group_Id);
        $criteria->compare('Pub_Group_Sub_Share_Broadcast', $this->Pub_Group_Sub_Share_Broadcast, true);
        $criteria->compare('Pub_Group_Sub_Share_Mechanical', $this->Pub_Group_Sub_Share_Mechanical, true);
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
     * @return PublisherGroupSubShare the static model class
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
