<?php

/**
 * This is the model class for table "{{work_subtitle}}".
 *
 * The followings are the available columns in table '{{work_subtitle}}':
 * @property integer $Work_Subtitle_Id
 * @property integer $Work_Id
 * @property string $Work_Subtitle_Name
 * @property integer $Work_Subtitle_Type_Id
 * @property integer $Work_Subtitle_Language_Id
 * @property string $Created_Date
 * @property string $Rowversion
 *
 * The followings are the available model relations:
 * @property MasterLanguage $workSubtitleLanguage
 * @property MasterType $workSubtitleType
 * @property Work $work
 */
class WorkSubtitle extends RActiveRecord {

    public function init() {
        parent::init();
        if($this->isNewRecord){
            $this->Work_Subtitle_Type_Id = DEFAULT_TYPE_ID;
            $this->Work_Subtitle_Language_Id = DEFAULT_LANGUAGE_ID;
        }
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{work_subtitle}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Work_Id, Work_Subtitle_Name, Work_Subtitle_Type_Id', 'required'),
            array('Work_Id, Work_Subtitle_Type_Id, Work_Subtitle_Language_Id, Created_By, Updated_By', 'numerical', 'integerOnly' => true),
            array('Work_Subtitle_Name', 'length', 'max' => 255),
            array('Created_Date, Rowversion, Created_By, Updated_By', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Work_Subtitle_Id, Work_Id, Work_Subtitle_Name, Work_Subtitle_Type_Id, Work_Subtitle_Language_Id, Created_Date, Rowversion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'workSubtitleLanguage' => array(self::BELONGS_TO, 'MasterLanguage', 'Work_Subtitle_Language_Id'),
            'workSubtitleType' => array(self::BELONGS_TO, 'MasterSubtitleType', 'Work_Subtitle_Type_Id'),
            'work' => array(self::BELONGS_TO, 'Work', 'Work_Id'),
            'createdBy' => array(self::BELONGS_TO, 'User', 'Created_By'),
            'updatedBy' => array(self::BELONGS_TO, 'User', 'Updated_By'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Work_Subtitle_Id' => 'Subtitle',
            'Work_Id' => 'Work',
            'Work_Subtitle_Name' => 'Subtitle',
            'Work_Subtitle_Type_Id' => 'Type',
            'Work_Subtitle_Language_Id' => 'Language',
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

        $criteria->compare('Work_Subtitle_Id', $this->Work_Subtitle_Id);
        $criteria->compare('Work_Id', $this->Work_Id);
        $criteria->compare('Work_Subtitle_Name', $this->Work_Subtitle_Name, true);
        $criteria->compare('Work_Subtitle_Type_Id', $this->Work_Subtitle_Type_Id);
        $criteria->compare('Work_Subtitle_Language_Id', $this->Work_Subtitle_Language_Id);
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
     * @return WorkSubtitle the static model class
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
