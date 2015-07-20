<?php

/**
 * This is the model class for table "{{master_studio}}".
 *
 * The followings are the available columns in table '{{master_studio}}':
 * @property integer $Studio_Id
 * @property string $Studio_Code
 * @property string $Studio_Name
 * @property string $Studio_Description
 * @property string $Active
 * @property string $Created_Date
 * @property string $Rowversion
 * @property integer $Created_By
 * @property integer $Updated_By
 */
class MasterStudio extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{master_studio}}';
    }

    public function scopes() {
        $alias = $this->getTableAlias(false, false);
        return array(
            'isActive' => array('condition' => "$alias.Active = '1'"),
        );
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Studio_Name', 'required'),
            array('Created_By, Updated_By', 'numerical', 'integerOnly' => true),
            array('Studio_Code', 'length', 'max' => 10),
            array('Studio_Name', 'length', 'max' => 100),
            array('Studio_Name', 'unique'),
            array('Active', 'length', 'max' => 1),
            array('Studio_Description, Created_Date, Rowversion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Studio_Id, Studio_Code, Studio_Name, Studio_Description, Active, Created_Date, Rowversion, Created_By, Updated_By', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'recordingSessions' => array(self::HAS_MANY, 'RecordingSession', 'Rcd_Ses_Studio_Id'),
            'soundCarrierFixations' => array(self::HAS_MANY, 'SoundCarrierFixations', 'Sound_Car_Fix_Studio'),
            'soundCarrierPublications' => array(self::HAS_MANY, 'SoundCarrierPublication', 'Sound_Car_Publ_Studio'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Studio_Id' => 'Studio',
            'Studio_Code' => 'Studio Code',
            'Studio_Name' => 'Studio Name',
            'Studio_Description' => 'Studio Description',
            'Active' => 'Active',
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

        $criteria->compare('Studio_Id', $this->Studio_Id);
        $criteria->compare('Studio_Code', $this->Studio_Code, true);
        $criteria->compare('Studio_Name', $this->Studio_Name, true);
        $criteria->compare('Studio_Description', $this->Studio_Description, true);
        $criteria->compare('Active', $this->Active, true);
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
     * @return MasterStudio the static model class
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
        $relations = array('recordingSessions', 'soundCarrierFixations', 'soundCarrierPublications');
        
        $validate = false;
        if(MASTER_EDIT_VALIDATION){
            foreach ($relations as $key => $relation) {
                if(!empty($this->$relation)){
                    $validate = true;
                    break;
                }
            }
            $relation = BaseInflector::camel2words($relation, ' ');
            if($validate)
                $this->addError('Studio_Name', "This Studio is already linked with {$relation}. So you can't Edit this record.");
        }
        return parent::beforeValidate();
    }
}
