<?php

/**
 * This is the model class for table "{{author_upload}}".
 *
 * The followings are the available columns in table '{{author_upload}}':
 * @property integer $Auth_Upl_Id
 * @property integer $Auth_Acc_Id
 * @property string $Auth_Upl_Doc_Name
 * @property string $Auth_Upl_File
 *
 * The followings are the available model relations:
 * @property AuthorAccount $authAcc
 */
class AuthorUpload extends CActiveRecord {
    const FILE_SIZE = 10;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{author_upload}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Auth_Acc_Id, Auth_Upl_Doc_Name', 'required'),
            array('Auth_Acc_Id', 'numerical', 'integerOnly' => true),
            array('Auth_Upl_Doc_Name', 'length', 'max' => 255),
            array('Auth_Upl_File', 'length', 'max' => 1000),
            array('Auth_Upl_File', 'file', 'allowEmpty' => true, 'maxSize'=>1024 * 1024 * self::FILE_SIZE, 'tooLarge'=>'File should be smaller than '.self::FILE_SIZE.'MB'),
            array('Auth_Upl_File', 'file', 'allowEmpty' => false, 'on' => 'create'),
            array('Auth_Upl_File', 'file', 'allowEmpty' => true, 'on' => 'update'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Auth_Upl_Id, Auth_Acc_Id, Auth_Upl_Doc_Name, Auth_Upl_File', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'authAcc' => array(self::BELONGS_TO, 'AuthorAccount', 'Auth_Acc_Id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Auth_Upl_Id' => 'Auth Upl',
            'Auth_Acc_Id' => 'Auth Acc',
            'Auth_Upl_Doc_Name' => 'Document Name',
            'Auth_Upl_File' => 'File Upload',
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

        $criteria->compare('Auth_Upl_Id', $this->Auth_Upl_Id);
        $criteria->compare('Auth_Acc_Id', $this->Auth_Acc_Id);
        $criteria->compare('Auth_Upl_Doc_Name', $this->Auth_Upl_Doc_Name, true);
        $criteria->compare('Auth_Upl_File', $this->Auth_Upl_File, true);

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
     * @return AuthorUpload the static model class
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
                'fileField' => 'Auth_Upl_File',
            )
        );
    }

}
