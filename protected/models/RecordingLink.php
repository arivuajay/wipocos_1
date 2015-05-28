<?php

/**
 * This is the model class for table "{{recording_link}}".
 *
 * The followings are the available columns in table '{{recording_link}}':
 * @property integer $Rcd_Link_Id
 * @property integer $Rcd_Id
 * @property string $Rcd_Link_Title
 * @property integer $Rcd_Perf_Id
 * @property integer $Rcd_Prod_Id
 * @property string $Created_Date
 * @property string $Rowversion
 *
 * The followings are the available model relations:
 * @property ProducerAccount $rcdProd
 * @property PerformerAccount $rcdPerf
 * @property Recording $rcd
 */
class RecordingLink extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{recording_link}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Rcd_Id, Rcd_Link_Title, Rcd_Perf_Id, Rcd_Prod_Id', 'required'),
            array('Rcd_Id, Rcd_Perf_Id, Rcd_Prod_Id', 'numerical', 'integerOnly' => true),
            array('Rcd_Link_Title', 'length', 'max' => 255),
            array('Created_Date, Rowversion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Rcd_Link_Id, Rcd_Id, Rcd_Link_Title, Rcd_Perf_Id, Rcd_Prod_Id, Created_Date, Rowversion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'rcdProd' => array(self::BELONGS_TO, 'ProducerAccount', 'Rcd_Prod_Id'),
            'rcdPerf' => array(self::BELONGS_TO, 'PerformerAccount', 'Rcd_Perf_Id'),
            'rcd' => array(self::BELONGS_TO, 'Recording', 'Rcd_Id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Rcd_Link_Id' => 'Rcd Link',
            'Rcd_Id' => 'Rcd',
            'Rcd_Link_Title' => 'Original Title',
            'Rcd_Perf_Id' => 'Main Artist',
            'Rcd_Prod_Id' => 'Producer',
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

        $criteria->compare('Rcd_Link_Id', $this->Rcd_Link_Id);
        $criteria->compare('Rcd_Id', $this->Rcd_Id);
        $criteria->compare('Rcd_Link_Title', $this->Rcd_Link_Title, true);
        $criteria->compare('Rcd_Perf_Id', $this->Rcd_Perf_Id);
        $criteria->compare('Rcd_Prod_Id', $this->Rcd_Prod_Id);
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
     * @return RecordingLink the static model class
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
