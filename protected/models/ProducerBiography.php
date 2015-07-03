<?php

/**
 * This is the model class for table "{{producer_biography}}".
 *
 * The followings are the available columns in table '{{producer_biography}}':
 * @property integer $Pro_Biogrph_Id
 * @property integer $Pro_Acc_Id
 * @property string $Pro_Managers
 * @property string $Pro_Biogrph_Annotation
 * @property string $Active
 * @property string $Created_Date
 * @property string $Rowversion
 *
 * The followings are the available model relations:
 * @property ProducerAccount $proAcc
 */
class ProducerBiography extends RActiveRecord {

    public $after_save_enable = true;
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{producer_biography}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Pro_Acc_Id, Pro_Biogrph_Annotation', 'required'),
            array('Pro_Acc_Id, Created_By, Updated_By', 'numerical', 'integerOnly' => true),
            array('Pro_Managers', 'length', 'max' => 500),
            array('Active', 'length', 'max' => 1),
            array('Created_Date, Rowversion, Created_By, Updated_By', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Pro_Biogrph_Id, Pro_Acc_Id, Pro_Managers, Pro_Biogrph_Annotation, Active, Created_Date, Rowversion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'proAcc' => array(self::BELONGS_TO, 'ProducerAccount', 'Pro_Acc_Id'),
            'producerBiographUploads' => array(self::HAS_MANY, 'ProducerBiographUploads', 'Pro_Biogrph_Id'),
            'createdBy' => array(self::BELONGS_TO, 'User', 'Created_By'),
            'updatedBy' => array(self::BELONGS_TO, 'User', 'Updated_By'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Pro_Biogrph_Id' => 'Biogrph',
            'Pro_Acc_Id' => 'Acc',
            'Pro_Managers' => 'Managers',
            'Pro_Biogrph_Annotation' => 'Annotation',
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

        $criteria->compare('Pro_Biogrph_Id', $this->Pro_Biogrph_Id);
        $criteria->compare('Pro_Acc_Id', $this->Pro_Acc_Id);
        $criteria->compare('Pro_Managers', $this->Pro_Managers, true);
        $criteria->compare('Pro_Biogrph_Annotation', $this->Pro_Biogrph_Annotation, true);
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
     * @return ProducerBiography the static model class
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

    protected function afterSave() {
        ProducerAccount::afterTabsave('PublisherBiography', 'publisherBiographies');
        return parent::afterSave();
    }
}
