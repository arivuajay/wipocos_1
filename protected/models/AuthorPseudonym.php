<?php

/**
 * This is the model class for table "{{author_pseudonym}}".
 *
 * The followings are the available columns in table '{{author_pseudonym}}':
 * @property integer $Auth_Pseudo_Id
 * @property integer $Auth_Acc_Id
 * @property integer $Auth_Pseudo_Type_Id
 * @property string $Auth_Pseudo_Name
 * @property string $Active
 * @property string $Created_Date
 * @property string $Rowversion
 *
 * The followings are the available model relations:
 * @property AuthorAccount $authAcc
 * @property MasterPseudonymTypes $authPseudoType
 */
class AuthorPseudonym extends RActiveRecord {

    public $after_save_enable = true;
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{author_pseudonym}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Auth_Acc_Id, Auth_Pseudo_Type_Id, Auth_Pseudo_Name', 'required'),
            array('Auth_Acc_Id, Auth_Pseudo_Type_Id, Created_By, Updated_By', 'numerical', 'integerOnly' => true),
            array('Auth_Pseudo_Name', 'length', 'max' => 50),
            array('Active', 'length', 'max' => 1),
            array('Created_Date, Rowversion, Created_By, Updated_By', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Auth_Pseudo_Id, Auth_Acc_Id, Auth_Pseudo_Type_Id, Auth_Pseudo_Name, Active, Created_Date, Rowversion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'authAcc' => array(self::BELONGS_TO, 'AuthorAccount', 'Auth_Acc_Id'),
            'authPseudoType' => array(self::BELONGS_TO, 'MasterPseudonymTypes', 'Auth_Pseudo_Type_Id'),
            'createdBy' => array(self::BELONGS_TO, 'User', 'Created_By'),
            'updatedBy' => array(self::BELONGS_TO, 'User', 'Updated_By')
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Auth_Pseudo_Id' => 'Id',
            'Auth_Acc_Id' => 'Auth Acc',
            'Auth_Pseudo_Type_Id' => 'Pseudo Type',
            'Auth_Pseudo_Name' => 'Pseudo Name',
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

        $criteria->compare('Auth_Pseudo_Id', $this->Auth_Pseudo_Id);
        $criteria->compare('Auth_Acc_Id', $this->Auth_Acc_Id);
        $criteria->compare('Auth_Pseudo_Type_Id', $this->Auth_Pseudo_Type_Id);
        $criteria->compare('Auth_Pseudo_Name', $this->Auth_Pseudo_Name, true);
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
     * @return AuthorPseudonym the static model class
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
            AuthorAccount::afterTabsave('PerformerPseudonym', 'performerPseudonyms');
        return parent::afterSave();
    }

}
