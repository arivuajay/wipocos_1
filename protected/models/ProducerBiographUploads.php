<?php

/**
 * This is the model class for table "{{producer_biograph_uploads}}".
 *
 * The followings are the available columns in table '{{producer_biograph_uploads}}':
 * @property integer $Pro_Biogrph_Upl_Id
 * @property integer $Pro_Biogrph_Id
 * @property string $Pro_Biogrph_Upl_File
 * @property string $Created
 * @property string $Rowversion
 *
 * The followings are the available model relations:
 * @property ProducerBiography $proBiogrph
 */
class ProducerBiographUploads extends CActiveRecord {

    const IMAGE_SIZE = 2;
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{producer_biograph_uploads}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Pro_Biogrph_Id', 'required'),
            array('Pro_Biogrph_Id', 'numerical', 'integerOnly' => true),
            array('Pro_Biogrph_Upl_File', 'length', 'max' => 500),
            array('Pro_Biogrph_Upl_File', 'file', 'types'=>'jpg,png,jpeg,gif', 'allowEmpty' => true, 'maxSize' => 1024 * 1024 * self::IMAGE_SIZE, 'tooLarge' => 'File should be smaller than ' . self::IMAGE_SIZE . 'MB'),
            array('Created, Rowversion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Pro_Biogrph_Upl_Id, Pro_Biogrph_Id, Pro_Biogrph_Upl_File, Created, Rowversion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'proBiogrph' => array(self::BELONGS_TO, 'ProducerBiography', 'Pro_Biogrph_Id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Pro_Biogrph_Upl_Id' => 'Pro Biogrph Upl',
            'Pro_Biogrph_Id' => 'Pro Biogrph',
            'Pro_Biogrph_Upl_File' => 'File',
            'Created' => 'Created',
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

        $criteria->compare('Pro_Biogrph_Upl_Id', $this->Pro_Biogrph_Upl_Id);
        $criteria->compare('Pro_Biogrph_Id', $this->Pro_Biogrph_Id);
        $criteria->compare('Pro_Biogrph_Upl_File', $this->Pro_Biogrph_Upl_File, true);
        $criteria->compare('Created', $this->Created, true);
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
     * @return ProducerBiographUploads the static model class
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
                'fileField' => 'Pro_Biogrph_Upl_File',
            )
        );
    }
    
    public function acceptFiles() {
        return 'jpeg|jpg|gif|png';
    }
    
    public function acceptFilesize() {
        return self::IMAGE_SIZE;
    }
}
