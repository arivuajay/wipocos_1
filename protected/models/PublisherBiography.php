<?php

/**
 * This is the model class for table "{{publisher_biography}}".
 *
 * The followings are the available columns in table '{{publisher_biography}}':
 * @property integer $Pub_Biogrph_Id
 * @property integer $Pub_Acc_Id
 * @property string $Pub_Managers
 * @property string $Pub_Biogrph_Annotation
 * @property string $Active
 * @property string $Created_Date
 * @property string $Rowversion
 *
 * The followings are the available model relations:
 * @property PublisherAccount $pubAcc
 */
class PublisherBiography extends CActiveRecord {

    public $after_save_enable = true;
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{publisher_biography}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Pub_Acc_Id, Pub_Biogrph_Annotation', 'required'),
            array('Pub_Acc_Id', 'numerical', 'integerOnly' => true),
            array('Pub_Managers', 'length', 'max' => 500),
            array('Active', 'length', 'max' => 1),
            array('Created_Date, Rowversion', 'safe'),
            array(
                'Pub_Biogrph_Annotation',
                'match', 'pattern' => '/^[a-zA-Z\s]+$/',
                'message' => 'Only Alphabets are allowed ',
            ),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Pub_Biogrph_Id, Pub_Acc_Id, Pub_Managers, Pub_Biogrph_Annotation, Active, Created_Date, Rowversion', 'safe', 'on' => 'search'),
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
            'Pub_Biogrph_Id' => 'Biogrph',
            'Pub_Acc_Id' => 'Acc',
            'Pub_Managers' => 'Managers',
            'Pub_Biogrph_Annotation' => 'Annotation',
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

        $criteria->compare('Pub_Biogrph_Id', $this->Pub_Biogrph_Id);
        $criteria->compare('Pub_Acc_Id', $this->Pub_Acc_Id);
        $criteria->compare('Pub_Managers', $this->Pub_Managers, true);
        $criteria->compare('Pub_Biogrph_Annotation', $this->Pub_Biogrph_Annotation, true);
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
     * @return PublisherBiography the static model class
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
        if($this->after_save_enable)
            PublisherAccount::afterTabsave('ProducerBiography', 'producerBiographies');
        return parent::afterSave();
    }
}
