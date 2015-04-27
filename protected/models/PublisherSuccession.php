<?php

/**
 * This is the model class for table "{{publisher_succession}}".
 *
 * The followings are the available columns in table '{{publisher_succession}}':
 * @property integer $Pub_Suc_Id
 * @property integer $Pub_Acc_Id
 * @property string $Pub_Suc_Date_Transfer
 * @property string $Pub_Suc_Name
 * @property string $Pub_Suc_Address_1
 * @property string $Pub_Suc_Address_2
 * @property string $Pub_Suc_Annotation
 *
 * The followings are the available model relations:
 * @property PublisherAccount $pubAcc
 */
class PublisherSuccession extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{publisher_succession}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Pub_Acc_Id, Pub_Suc_Name, Pub_Suc_Address_1, Pub_Suc_Annotation', 'required'),
            array('Pub_Acc_Id', 'numerical', 'integerOnly' => true),
            array('Pub_Suc_Name', 'length', 'max' => 255),
            array('Pub_Suc_Address_1, Pub_Suc_Address_2', 'length', 'max' => 500),
            array('Pub_Suc_Date_Transfer, Pub_Suc_Annotation', 'safe'),
            array(
                'Pub_Suc_Name',
                'match', 'pattern' => '/^[a-zA-Z\s]+$/',
                'message' => 'Only Alphabets are allowed ',
            ),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Pub_Suc_Id, Pub_Acc_Id, Pub_Suc_Date_Transfer, Pub_Suc_Name, Pub_Suc_Address_1, Pub_Suc_Address_2, Pub_Suc_Annotation', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'pubAcc' => array(self::BELONGS_TO, 'PublisherAccount', 'Pub_Acc_Id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Pub_Suc_Id' => 'Suc',
            'Pub_Acc_Id' => 'Acc',
            'Pub_Suc_Date_Transfer' => 'Date of Transfer',
            'Pub_Suc_Name' => 'Successor Name',
            'Pub_Suc_Address_1' => 'Address 1',
            'Pub_Suc_Address_2' => 'Address 2',
            'Pub_Suc_Annotation' => 'Additional Annotations',
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

        $criteria->compare('Pub_Suc_Id', $this->Pub_Suc_Id);
        $criteria->compare('Pub_Acc_Id', $this->Pub_Acc_Id);
        $criteria->compare('Pub_Suc_Date_Transfer', $this->Pub_Suc_Date_Transfer, true);
        $criteria->compare('Pub_Suc_Name', $this->Pub_Suc_Name, true);
        $criteria->compare('Pub_Suc_Address_1', $this->Pub_Suc_Address_1, true);
        $criteria->compare('Pub_Suc_Address_2', $this->Pub_Suc_Address_2, true);
        $criteria->compare('Pub_Suc_Annotation', $this->Pub_Suc_Annotation, true);

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
     * @return PublisherSuccession the static model class
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
