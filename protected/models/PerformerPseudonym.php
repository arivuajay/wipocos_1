<?php

/**
 * This is the model class for table "{{performer_pseudonym}}".
 *
 * The followings are the available columns in table '{{performer_pseudonym}}':
 * @property integer $Perf_Pseudo_Id
 * @property integer $Perf_Acc_Id
 * @property integer $Perf_Pseudo_Type_Id
 * @property string $Perf_Pseudo_Name
 * @property string $Active
 * @property string $Created_Date
 * @property string $Rowversion
 *
 * The followings are the available model relations:
 * @property PerformerAccount $perfAcc
 * @property MasterPseudonymTypes $perfPseudoType
 */
class PerformerPseudonym extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{performer_pseudonym}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Perf_Acc_Id, Perf_Pseudo_Type_Id, Perf_Pseudo_Name', 'required'),
            array('Perf_Acc_Id, Perf_Pseudo_Type_Id', 'numerical', 'integerOnly' => true),
            array('Perf_Pseudo_Name', 'length', 'max' => 50),
            array('Active', 'length', 'max' => 1),
            array('Created_Date, Rowversion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Perf_Pseudo_Id, Perf_Acc_Id, Perf_Pseudo_Type_Id, Perf_Pseudo_Name, Active, Created_Date, Rowversion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'perfAcc' => array(self::BELONGS_TO, 'PerformerAccount', 'Perf_Acc_Id'),
            'perfPseudoType' => array(self::BELONGS_TO, 'MasterPseudonymTypes', 'Perf_Pseudo_Type_Id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Perf_Pseudo_Id' => 'Perf Pseudo',
            'Perf_Acc_Id' => 'Perf Acc',
            'Perf_Pseudo_Type_Id' => 'Pseudo Type',
            'Perf_Pseudo_Name' => 'Pseudo Name',
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

        $criteria->compare('Perf_Pseudo_Id', $this->Perf_Pseudo_Id);
        $criteria->compare('Perf_Acc_Id', $this->Perf_Acc_Id);
        $criteria->compare('Perf_Pseudo_Type_Id', $this->Perf_Pseudo_Type_Id);
        $criteria->compare('Perf_Pseudo_Name', $this->Perf_Pseudo_Name, true);
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
     * @return PerformerPseudonym the static model class
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
        $author_model = PerformerAccount::checkAuthor($this->perfAcc->Perf_Internal_Code, false);
        if (!empty($author_model)) {
            if(!empty($author_model->authorPseudonyms)){
                $pseudo_model = $author_model->authorPseudonyms;
            }else{
                $pseudo_model = new AuthorPseudonym;
                $pseudo_model->Auth_Acc_Id = $author_model->Auth_Acc_Id;
            }
            $ignore_list = Myclass::getAuthorconvertIgnorelist();
            foreach ($this->attributes as $key => $value) {
                $attr_name = str_replace('Perf_', 'Auth_', $key);
                !in_array($key, $ignore_list) ? $pseudo_model->setAttribute($attr_name, $value) : '';
            }
            $pseudo_model->after_save_disable = false;
            $pseudo_model->save(false);
        }
        parent::afterSave();
    }

}
