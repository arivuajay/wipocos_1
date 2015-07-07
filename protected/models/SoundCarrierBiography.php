<?php

/**
 * This is the model class for table "{{sound_carrier_biography}}".
 *
 * The followings are the available columns in table '{{sound_carrier_biography}}':
 * @property integer $Sound_Car_Biogrph_Id
 * @property integer $Sound_Car_Id
 * @property string $Sound_Car_Biogrph_Annotation
 * @property string $Created_Date
 * @property string $Rowversion
 * @property integer $Created_By
 * @property integer $Updated_By
 *
 * The followings are the available model relations:
 * @property SoundCarrierBiographUploads[] $soundCarrierBiographUploads
 * @property SoundCarrier $soundCar
 */
class SoundCarrierBiography extends RActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{sound_carrier_biography}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Sound_Car_Id, Sound_Car_Biogrph_Annotation', 'required'),
            array('Sound_Car_Id, Created_By, Updated_By', 'numerical', 'integerOnly' => true),
            array('Created_Date, Rowversion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Sound_Car_Biogrph_Id, Sound_Car_Id, Sound_Car_Biogrph_Annotation, Created_Date, Rowversion, Created_By, Updated_By', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'soundCarrierBiographUploads' => array(self::HAS_MANY, 'SoundCarrierBiographUploads', 'Sound_Car_Biogrph_Id'),
            'soundCar' => array(self::BELONGS_TO, 'SoundCarrier', 'Sound_Car_Id'),
            'createdBy' => array(self::BELONGS_TO, 'User', 'Created_By'),
            'updatedBy' => array(self::BELONGS_TO, 'User', 'Updated_By'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Sound_Car_Biogrph_Id' => 'Sound Car Biogrph',
            'Sound_Car_Id' => 'Sound Car',
            'Sound_Car_Biogrph_Annotation' => 'Annotation',
            'Created_Date' => 'Created Date',
            'Rowversion' => 'Rowversion',
            'Created_By' => 'Created By',
            'Updated_By' => 'Updated By',
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

        $criteria->compare('Sound_Car_Biogrph_Id', $this->Sound_Car_Biogrph_Id);
        $criteria->compare('Sound_Car_Id', $this->Sound_Car_Id);
        $criteria->compare('Sound_Car_Biogrph_Annotation', $this->Sound_Car_Biogrph_Annotation, true);
        $criteria->compare('Created_Date', $this->Created_Date, true);
        $criteria->compare('Rowversion', $this->Rowversion, true);
        $criteria->compare('Created_By', $this->Created_By);
        $criteria->compare('Updated_By', $this->Updated_By);

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
     * @return SoundCarrierBiography the static model class
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
