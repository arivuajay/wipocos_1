<?php

/**
 * This is the model class for table "{{work_biography}}".
 *
 * The followings are the available columns in table '{{work_biography}}':
 * @property integer $Work_Biogrph_Id
 * @property integer $Work_Id
 * @property string $Work_Biogrph_Annotation
 * @property string $Created_Date
 * @property string $Rowversion
 *
 * The followings are the available model relations:
 * @property Work $work
 */
class WorkBiography extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{work_biography}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Work_Id, Work_Biogrph_Annotation', 'required'),
            array('Work_Id', 'numerical', 'integerOnly' => true),
            array('Created_Date, Rowversion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Work_Biogrph_Id, Work_Id, Work_Biogrph_Annotation, Created_Date, Rowversion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'work' => array(self::BELONGS_TO, 'Work', 'Work_Id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Work_Biogrph_Id' => 'Work Biogrph',
            'Work_Id' => 'Work',
            'Work_Biogrph_Annotation' => 'Annotation',
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

        $criteria->compare('Work_Biogrph_Id', $this->Work_Biogrph_Id);
        $criteria->compare('Work_Id', $this->Work_Id);
        $criteria->compare('Work_Biogrph_Annotation', $this->Work_Biogrph_Annotation, true);
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
     * @return WorkBiography the static model class
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
