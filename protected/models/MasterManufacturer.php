<?php

/**
 * This is the model class for table "{{master_manufacturer}}".
 *
 * The followings are the available columns in table '{{master_manufacturer}}':
 * @property integer $Master_Manf_Id
 * @property string $Manf_Code
 * @property string $Manf_Name
 * @property string $Manf_Description
 * @property string $Active
 * @property string $Created_Date
 * @property string $Rowversion
 */
class MasterManufacturer extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function scopes() {
        $alias = $this->getTableAlias(false, false);
        return array(
            'isActive' => array('condition' => "$alias.Active = '1'"),
        );
    }
    
    public function tableName() {
        return '{{master_manufacturer}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Manf_Name', 'required'),
            array('Manf_Code', 'length', 'max' => 50),
            array('Manf_Name', 'length', 'max' => 100),
            array('Active', 'length', 'max' => 1),
            array('Manf_Description, Created_Date, Rowversion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Master_Manf_Id, Manf_Code, Manf_Name, Manf_Description, Active, Created_Date, Rowversion', 'safe', 'on' => 'search'),
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
            'Master_Manf_Id' => 'Master Manf',
            'Manf_Code' => 'Code',
            'Manf_Name' => 'Name',
            'Manf_Description' => 'Description',
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

        $criteria->compare('Master_Manf_Id', $this->Master_Manf_Id);
        $criteria->compare('Manf_Code', $this->Manf_Code, true);
        $criteria->compare('Manf_Name', $this->Manf_Name, true);
        $criteria->compare('Manf_Description', $this->Manf_Description, true);
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
     * @return MasterManufacturer the static model class
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
