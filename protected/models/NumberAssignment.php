<?php

/**
 * This is the model class for table "{{number_assignment}}".
 *
 * The followings are the available columns in table '{{number_assignment}}':
 * @property integer $Num_Assgn_Id
 * @property integer $Num_Assgn_System_Id
 * @property integer $Num_Assgn_Series_From
 * @property integer $Num_Assgn_Series_To
 * @property string $Num_Assgn_List
 * @property string $Active
 * @property string $Created_Date
 * @property string $Rowversion
 */
class NumberAssignment extends CActiveRecord {
    
    public $series_list;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{number_assignment}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Num_Assgn_System_Id, Num_Assgn_Series_From, Num_Assgn_Series_To', 'required'),
            array('Num_Assgn_Series_From, Num_Assgn_Series_To', 'numerical', 'integerOnly' => true),
            array('Num_Assgn_System_Id', 'length', 'max' => 100),
            array('Num_Assgn_List', 'length', 'max' => 50),
            array('Active', 'length', 'max' => 1),
            array('Created_Date, Rowversion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Num_Assgn_Id, Num_Assgn_System_Id, Num_Assgn_Series_From, Num_Assgn_Series_To, Num_Assgn_List, Active, Created_Date, Rowversion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Num_Assgn_Id' => 'Num Assgn',
            'Num_Assgn_System_Id' => 'Num Assgn System',
            'Num_Assgn_Series_From' => 'Num Assgn Series From',
            'Num_Assgn_Series_To' => 'Num Assgn Series To',
            'Num_Assgn_List' => 'Num Assgn List',
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

        $criteria->compare('Num_Assgn_Id', $this->Num_Assgn_Id);
        $criteria->compare('Num_Assgn_System_Id', $this->Num_Assgn_System_Id);
        $criteria->compare('Num_Assgn_Series_From', $this->Num_Assgn_Series_From);
        $criteria->compare('Num_Assgn_Series_To', $this->Num_Assgn_Series_To);
        $criteria->compare('Num_Assgn_List', $this->Num_Assgn_List, true);
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
     * @return NumberAssignment the static model class
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
