<?php

/**
 * This is the model class for table "{{share_definition_per_role}}".
 *
 * The followings are the available columns in table '{{share_definition_per_role}}':
 * @property integer $Shr_Def_Id
 * @property integer $Shr_Def_Role
 * @property integer $Shr_Def_Equ_remn
 * @property integer $Shr_Def_Blank_Tape_remn
 * @property integer $Shr_Def_Neigh_Rgts
 * @property integer $Shr_Def_Excl_Rgts
 * @property string $Active
 * @property string $Created_Date
 * @property string $Rowversion
 *
 * The followings are the available model relations:
 * @property MasterRole $shrDefRole
 */
class ShareDefinitionPerRole extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{share_definition_per_role}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Shr_Def_Role, Shr_Def_Equ_remn, Shr_Def_Blank_Tape_remn, Shr_Def_Neigh_Rgts, Shr_Def_Excl_Rgts', 'required'),
            array('Shr_Def_Role, Shr_Def_Equ_remn, Shr_Def_Blank_Tape_remn, Shr_Def_Neigh_Rgts, Shr_Def_Excl_Rgts', 'numerical', 'integerOnly' => true),
            array('Active', 'length', 'max' => 1),
            array('Created_Date, Rowversion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Shr_Def_Id, Shr_Def_Role, Shr_Def_Equ_remn, Shr_Def_Blank_Tape_remn, Shr_Def_Neigh_Rgts, Shr_Def_Excl_Rgts, Active, Created_Date, Rowversion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'shrDefRole' => array(self::BELONGS_TO, 'MasterRole', 'Shr_Def_Role'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Shr_Def_Id' => 'Shr Def',
            'Shr_Def_Role' => 'Role',
            'Shr_Def_Equ_remn' => 'Equitable remuneration',
            'Shr_Def_Blank_Tape_remn' => 'Neighboring rights',
            'Shr_Def_Neigh_Rgts' => 'Blank tape levy ',
            'Shr_Def_Excl_Rgts' => 'Exclusive rights',
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

        $criteria->compare('Shr_Def_Id', $this->Shr_Def_Id);
        $criteria->compare('Shr_Def_Role', $this->Shr_Def_Role);
        $criteria->compare('Shr_Def_Equ_remn', $this->Shr_Def_Equ_remn);
        $criteria->compare('Shr_Def_Blank_Tape_remn', $this->Shr_Def_Blank_Tape_remn);
        $criteria->compare('Shr_Def_Neigh_Rgts', $this->Shr_Def_Neigh_Rgts);
        $criteria->compare('Shr_Def_Excl_Rgts', $this->Shr_Def_Excl_Rgts);
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
     * @return ShareDefinitionPerRole the static model class
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
