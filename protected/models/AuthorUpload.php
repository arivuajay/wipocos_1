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
class AuthorUpload extends RActiveRecord {

    public $after_save_enable = true;
    public $after_delete_disable = true;

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
            array('Auth_Acc_Id, Created_By, Updated_By', 'numerical', 'integerOnly' => true),
            array('Auth_Upl_Doc_Name', 'length', 'max' => 255),
            array('Auth_Upl_File', 'length', 'max' => 1000),
            array('Auth_Upl_File', 'file', 'allowEmpty' => true, 'maxSize' => 1024 * 1024 * self::FILE_SIZE, 'tooLarge' => 'File should be smaller than ' . self::FILE_SIZE . 'MB'),
            array('Auth_Upl_File', 'file', 'allowEmpty' => false, 'on' => 'create'),
            array('Auth_Upl_File', 'file', 'allowEmpty' => true, 'on' => 'update'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Auth_Upl_Id, Auth_Acc_Id, Auth_Upl_Doc_Name, Auth_Upl_File', 'safe', 'on' => 'search'),
            array('Created_By, Updated_By', 'safe'),
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
            'createdBy' => array(self::BELONGS_TO, 'User', 'Created_By'),
            'updatedBy' => array(self::BELONGS_TO, 'User', 'Updated_By'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Auth_Upl_Id' => 'Id',
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

    protected function afterSave() {
        if ($this->after_save_enable) {
            $performer_m = AuthorAccount::checkPerformer($this->authAcc->Auth_Internal_Code, false);
            if (!empty($performer_m)) {
                $performer_exists = PerformerUpload::model()->findByAttributes(array('Perf_Upl_File' => $this->Auth_Upl_File));
                if(!empty($performer_exists)){
                    $performer_upload_model = $performer_exists;
                }else{
                    $performer_upload_model = new PerformerUpload;
                    $performer_upload_model->Perf_Acc_Id = $performer_m->Perf_Acc_Id;
                }
                $ignore_list = Myclass::getAuthorconvertIgnorelist();
                foreach ($this->attributes as $key => $value) {
                    $attr_name = str_replace('Auth_', 'Perf_', $key);
                    !in_array($key, $ignore_list) ? $performer_upload_model->setAttribute($attr_name, $value) : '';
                }
                $performer_upload_model->save(false);
            }
        }
        return parent::afterSave();
    }
    
    protected function afterDelete() {
        if($this->after_delete_disable){
            $performer = AuthorAccount::checkPerformer($this->authAcc->Auth_Internal_Code);
            if ($performer) {
                $performer_upload_model = PerformerUpload::model()->findByAttributes(array('Perf_Upl_File' => $this->Auth_Upl_File));
                if(!empty($performer_upload_model)){
                    $performer_upload_model->delete(); 
                }
            }
        }
        return parent::afterDelete();
    }

}
