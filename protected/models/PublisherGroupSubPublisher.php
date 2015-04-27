<?php

/**
 * This is the model class for table "{{publisher_group_sub_publisher}}".
 *
 * The followings are the available columns in table '{{publisher_group_sub_publisher}}':
 * @property integer $Pub_Group_Sub_Id
 * @property integer $Pub_Group_Id
 * @property string $Pub_Group_Sub_IPI_Name_Number
 * @property string $Pub_Group_Sub_IPI_Base_Number
 * @property string $Pub_Group_Sub_Internal_Code
 * @property string $Pub_Group_Sub_Name
 * @property string $Created_Date
 * @property string $Rowversion
 *
 * The followings are the available model relations:
 * @property PublisherGroup $pubGroup
 */
class PublisherGroupSubPublisher extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{publisher_group_sub_publisher}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Pub_Group_Id, Pub_Group_Sub_IPI_Name_Number, Pub_Group_Sub_IPI_Base_Number, Pub_Group_Sub_Internal_Code, Pub_Group_Sub_Name', 'required'),
            array('Pub_Group_Id', 'numerical', 'integerOnly' => true),
            array('Pub_Group_Sub_IPI_Name_Number, Pub_Group_Sub_IPI_Base_Number, Pub_Group_Sub_Internal_Code, Pub_Group_Sub_Name', 'length', 'max' => 100),
            array('Created_Date, Rowversion', 'safe'),
            array(
                'Pub_Group_Sub_Name, Pub_Group_Sub_IPI_Name_Number',
                'match', 'pattern' => '/^[a-zA-Z\s]+$/',
                'message' => 'Only Alphabets are allowed ',
            ),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Pub_Group_Sub_Id, Pub_Group_Id, Pub_Group_Sub_IPI_Name_Number, Pub_Group_Sub_IPI_Base_Number, Pub_Group_Sub_Internal_Code, Pub_Group_Sub_Name, Created_Date, Rowversion', 'safe', 'on' => 'search'),
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
            'Pub_Group_Sub_Id' => 'Pub Group Sub',
            'Pub_Group_Id' => 'Pub Group',
            'Pub_Group_Sub_IPI_Name_Number' => 'IPI Name Number',
            'Pub_Group_Sub_IPI_Base_Number' => 'IPI Base Number',
            'Pub_Group_Sub_Internal_Code' => 'Internal Code',
            'Pub_Group_Sub_Name' => 'Publisher Name',
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

        $criteria->compare('Pub_Group_Sub_Id', $this->Pub_Group_Sub_Id);
        $criteria->compare('Pub_Group_Id', $this->Pub_Group_Id);
        $criteria->compare('Pub_Group_Sub_IPI_Name_Number', $this->Pub_Group_Sub_IPI_Name_Number, true);
        $criteria->compare('Pub_Group_Sub_IPI_Base_Number', $this->Pub_Group_Sub_IPI_Base_Number, true);
        $criteria->compare('Pub_Group_Sub_Internal_Code', $this->Pub_Group_Sub_Internal_Code, true);
        $criteria->compare('Pub_Group_Sub_Name', $this->Pub_Group_Sub_Name, true);
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
     * @return PublisherGroupSubPublisher the static model class
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
