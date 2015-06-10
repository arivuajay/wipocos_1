<?php

/**
 * This is the model class for table "{{performer_upload}}".
 *
 * The followings are the available columns in table '{{performer_upload}}':
 * @property integer $Perf_Upl_Id
 * @property integer $Perf_Acc_Id
 * @property string $Perf_Upl_Doc_Name
 * @property string $Perf_Upl_File
 *
 * The followings are the available model relations:
 * @property PerformerAccount $perfAcc
 */
class PerformerUpload extends CActiveRecord {

    const FILE_SIZE = 10;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{performer_upload}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Perf_Acc_Id, Perf_Upl_Doc_Name, Perf_Upl_File', 'required'),
            array('Perf_Acc_Id', 'numerical', 'integerOnly' => true),
            array('Perf_Upl_Doc_Name', 'length', 'max' => 255),
            array('Perf_Upl_File', 'length', 'max' => 1000),
            array('Perf_Upl_File', 'file', 'allowEmpty' => true, 'maxSize' => 1024 * 1024 * self::FILE_SIZE, 'tooLarge' => 'File should be smaller than ' . self::FILE_SIZE . 'MB'),
            array('Perf_Upl_File', 'file', 'allowEmpty' => false, 'on' => 'create'),
            array('Perf_Upl_File', 'file', 'allowEmpty' => true, 'on' => 'update'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Perf_Upl_Id, Perf_Acc_Id, Perf_Upl_Doc_Name, Perf_Upl_File', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'perfAcc' => array(self::BELONGS_TO, 'PerformerAccount', 'Perf_Acc_Id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Perf_Upl_Id' => 'Perf Upl',
            'Perf_Acc_Id' => 'Perf Acc',
            'Perf_Upl_Doc_Name' => 'Document Name',
            'Perf_Upl_File' => 'File Upload',
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

        $criteria->compare('Perf_Upl_Id', $this->Perf_Upl_Id);
        $criteria->compare('Perf_Acc_Id', $this->Perf_Acc_Id);
        $criteria->compare('Perf_Upl_Doc_Name', $this->Perf_Upl_Doc_Name, true);
        $criteria->compare('Perf_Upl_File', $this->Perf_Upl_File, true);

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
     * @return PerformerUpload the static model class
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
                'fileField' => 'Perf_Upl_File',
            )
        );
    }

    protected function afterSave() {
        $author_m = PerformerAccount::checkAuthor($this->perfAcc->Perf_Internal_Code, false);
        if (!empty($author_m)) {
            $author_exists = AuthorUpload::model()->findByAttributes(array('Auth_Upl_File' => $this->Perf_Upl_File));
            if (!empty($author_exists)) {
                $author_upload_model = $author_exists;
            } else {
                $author_upload_model = new AuthorUpload;
                $author_upload_model->Auth_Acc_Id = $author_m->Auth_Acc_Id;
            }
            $ignore_list = Myclass::getAuthorconvertIgnorelist();
            foreach ($this->attributes as $key => $value) {
                $attr_name = str_replace('Perf_', 'Auth_', $key);
                !in_array($key, $ignore_list) ? $author_upload_model->setAttribute($attr_name, $value) : '';
            }
            $author_upload_model->after_save_enable = false;
            $author_upload_model->save(false);
        }
        parent::afterSave();
    }

    protected function afterDelete() {
        $author_m = PerformerAccount::checkAuthor($this->perfAcc->Perf_Internal_Code, false);
        if (!empty($author_m)) {
            $author_upload_model = AuthorUpload::model()->findByAttributes(array('Auth_Upl_File' => $this->Perf_Upl_File));
            if (!empty($author_upload_model)) {
                $author_upload_model->after_delete_disable = false;
                $author_upload_model->delete();
            }
        }
        return parent::afterDelete();
    }

}
