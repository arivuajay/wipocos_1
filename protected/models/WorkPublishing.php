<?php

/**
 * This is the model class for table "{{work_publishing}}".
 *
 * The followings are the available columns in table '{{work_publishing}}':
 * @property integer $Work_Pub_Id
 * @property integer $Work_Id
 * @property string $Work_Pub_Contact_Start
 * @property string $Work_Pub_Contact_End
 * @property string $Work_Pub_Territories
 * @property string $Work_Pub_Sign_Date
 * @property string $Work_Pub_File
 * @property integer $Work_Pub_References
 * @property string $Created_Date
 * @property string $Rowversion
 *
 * The followings are the available model relations:
 * @property Work $work
 */
class WorkPublishing extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{work_publishing}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Work_Id, Work_Pub_Contact_Start, Work_Pub_Contact_End, Work_Pub_Territories, Work_Pub_Sign_Date, Work_Pub_File, Work_Pub_References', 'required'),
            array('Work_Id, Work_Pub_References', 'numerical', 'integerOnly' => true),
            array('Work_Pub_Territories', 'length', 'max' => 500),
            array('Work_Pub_File', 'length', 'max' => 255),
            array('Created_Date, Rowversion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Work_Pub_Id, Work_Id, Work_Pub_Contact_Start, Work_Pub_Contact_End, Work_Pub_Territories, Work_Pub_Sign_Date, Work_Pub_File, Work_Pub_References, Created_Date, Rowversion', 'safe', 'on' => 'search'),
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
            'Work_Pub_Id' => 'Work Pub',
            'Work_Id' => 'Work',
            'Work_Pub_Contact_Start' => 'Begin',
            'Work_Pub_Contact_End' => 'End',
            'Work_Pub_Territories' => 'Territories',
            'Work_Pub_Sign_Date' => 'Date of signature',
            'Work_Pub_File' => 'File',
            'Work_Pub_References' => 'Number of references',
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

        $criteria->compare('Work_Pub_Id', $this->Work_Pub_Id);
        $criteria->compare('Work_Id', $this->Work_Id);
        $criteria->compare('Work_Pub_Contact_Start', $this->Work_Pub_Contact_Start, true);
        $criteria->compare('Work_Pub_Contact_End', $this->Work_Pub_Contact_End, true);
        $criteria->compare('Work_Pub_Territories', $this->Work_Pub_Territories, true);
        $criteria->compare('Work_Pub_Sign_Date', $this->Work_Pub_Sign_Date, true);
        $criteria->compare('Work_Pub_File', $this->Work_Pub_File, true);
        $criteria->compare('Work_Pub_References', $this->Work_Pub_References);
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
     * @return WorkPublishing the static model class
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
    
    protected function beforeValidate() {
        if(isset($this->Work_Pub_Territories) && is_array($this->Work_Pub_Territories)){
            $this->Work_Pub_Territories = !empty($this->Work_Pub_Territories) ? json_encode($this->Work_Pub_Territories) : '';
        }else{
            $this->Work_Pub_Territories = '';
        }
        return parent::beforeValidate();
    }

    public function getTerritoryselected() {
        $selected = array();
        if($this->Work_Pub_Territories){
            $exp = json_decode($this->Work_Pub_Territories);
            foreach ($exp as $ex) {
                $selected[$ex] = array('selected' => 'selected');
            }
        }
        return $selected;
    }
}
