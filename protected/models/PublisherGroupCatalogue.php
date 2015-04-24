<?php

/**
 * This is the model class for table "{{publisher_group_catalogue}}".
 *
 * The followings are the available columns in table '{{publisher_group_catalogue}}':
 * @property integer $Pub_Group_Cat_Id
 * @property integer $Pub_Group_Id
 * @property string $Pub_Group_Cat_Number
 * @property string $Pub_Group_Cat_Start_Date
 * @property string $Pub_Group_Cat_End_Date
 * @property string $Pub_Group_Cat_Name
 * @property integer $Pub_Group_Cat_Territory_Id
 * @property string $Pub_Group_Cat_Clasue
 * @property string $Pub_Group_Cat_Sign_Date
 * @property string $Pub_Group_Cat_File
 * @property integer $Pub_Group_Cat_Reference
 * @property string $Created_Date
 * @property string $Rowversion
 *
 * The followings are the available model relations:
 * @property PublisherGroup $pubGroup
 * @property MasterTerritories $pubGroupCatTerritory
 */
class PublisherGroupCatalogue extends CActiveRecord {
    const FILE_SIZE = 1;


    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{publisher_group_catalogue}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Pub_Group_Id, Pub_Group_Cat_Number, Pub_Group_Cat_Start_Date, Pub_Group_Cat_End_Date, Pub_Group_Cat_Name, Pub_Group_Cat_Territory_Id, Pub_Group_Cat_Sign_Date', 'required'),
            array('Pub_Group_Id, Pub_Group_Cat_Territory_Id, Pub_Group_Cat_Reference', 'numerical', 'integerOnly' => true),
            array('Pub_Group_Cat_Number, Pub_Group_Cat_Name', 'length', 'max' => 100),
            array('Pub_Group_Cat_Clasue', 'length', 'max' => 4),
            array('Pub_Group_Cat_File', 'length', 'max' => 255),
            array('Created_Date, Rowversion', 'safe'),
            array(
                'Pub_Group_Cat_Number, Pub_Group_Cat_Name',
                'match', 'pattern' => '/^[a-zA-Z\s]+$/',
                'message' => 'Invalid characters',
            ),
            array('Pub_Group_Cat_File', 'file', 'allowEmpty' => true, 'maxSize'=>1024 * 1024 * self::FILE_SIZE, 'tooLarge'=>'File should be smaller than '.self::FILE_SIZE.'MB'),
            array('Pub_Group_Cat_File', 'file', 'allowEmpty' => false, 'on' => 'create'),
            array('Pub_Group_Cat_File', 'file', 'allowEmpty' => true, 'on' => 'update'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Pub_Group_Cat_Id, Pub_Group_Id, Pub_Group_Cat_Number, Pub_Group_Cat_Start_Date, Pub_Group_Cat_End_Date, Pub_Group_Cat_Name, Pub_Group_Cat_Territory_Id, Pub_Group_Cat_Clasue, Pub_Group_Cat_Sign_Date, Pub_Group_Cat_File, Pub_Group_Cat_Reference, Created_Date, Rowversion', 'safe', 'on' => 'search'),
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
            'pubGroupCatTerritory' => array(self::BELONGS_TO, 'MasterTerritories', 'Pub_Group_Cat_Territory_Id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Pub_Group_Cat_Id' => 'Pub Group Cat',
            'Pub_Group_Id' => 'Pub Group',
            'Pub_Group_Cat_Number' => 'Catalogue Number',
            'Pub_Group_Cat_Start_Date' => 'Sub-publishing Start Date',
            'Pub_Group_Cat_End_Date' => 'Sub-publishing End Date',
            'Pub_Group_Cat_Name' => 'Catalogue Name',
            'Pub_Group_Cat_Territory_Id' => 'Territory',
            'Pub_Group_Cat_Clasue' => 'Clasue',
            'Pub_Group_Cat_Sign_Date' => 'Date of signature',
            'Pub_Group_Cat_File' => 'File',
            'Pub_Group_Cat_Reference' => 'No. of Reference',
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

        $criteria->compare('Pub_Group_Cat_Id', $this->Pub_Group_Cat_Id);
        $criteria->compare('Pub_Group_Id', $this->Pub_Group_Id);
        $criteria->compare('Pub_Group_Cat_Number', $this->Pub_Group_Cat_Number, true);
        $criteria->compare('Pub_Group_Cat_Start_Date', $this->Pub_Group_Cat_Start_Date, true);
        $criteria->compare('Pub_Group_Cat_End_Date', $this->Pub_Group_Cat_End_Date, true);
        $criteria->compare('Pub_Group_Cat_Name', $this->Pub_Group_Cat_Name, true);
        $criteria->compare('Pub_Group_Cat_Territory_Id', $this->Pub_Group_Cat_Territory_Id);
        $criteria->compare('Pub_Group_Cat_Clasue', $this->Pub_Group_Cat_Clasue, true);
        $criteria->compare('Pub_Group_Cat_Sign_Date', $this->Pub_Group_Cat_Sign_Date, true);
        $criteria->compare('Pub_Group_Cat_File', $this->Pub_Group_Cat_File, true);
        $criteria->compare('Pub_Group_Cat_Reference', $this->Pub_Group_Cat_Reference);
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
     * @return PublisherGroupCatalogue the static model class
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
    
    public function behaviors() {
        return array(
            'NUploadFile' => array(
                'class' => 'ext.nuploadfile.NUploadFile',
                'fileField' => 'Pub_Group_Cat_File',
            )
        );
    }

}
