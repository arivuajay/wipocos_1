<?php

/**
 * This is the model class for table "{{master_managed_rights}}".
 *
 * The followings are the available columns in table '{{master_managed_rights}}':
 * @property integer $Master_Mgd_Rights_Id
 * @property integer $Mgd_Rights_Rank
 * @property string $Mgd_Rights_Name
 * @property string $Active
 * @property string $Created_Date
 * @property string $Rowversion
 */
class MasterManagedRights extends CActiveRecord {

    const AUTHOR_RANK = 10;
    const PUBLISHER_RANK = 10;
    const PERFORMER_RANK = 11;
    const PRODUCER_RANK = 11;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{master_managed_rights}}';
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
            array('Mgd_Rights_Name', 'required'),
            array('Mgd_Rights_Name', 'length', 'max' => 90),
            array('Active', 'length', 'max' => 1),
            array('Mgd_Rights_Rank', 'numerical', 'integerOnly' => true),
            array('Created_Date, Rowversion, Mgd_Rights_Rank', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Master_Mgd_Rights_Id, Mgd_Rights_Name, Active, Created_Date, Rowversion', 'safe', 'on' => 'search'),
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
            'Master_Mgd_Rights_Id' => 'Master Mgd Rights',
            'Mgd_Rights_Name' => 'Rights Name',
            'Mgd_Rights_Rank' => 'Rank',
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

        $criteria->compare('Master_Mgd_Rights_Id', $this->Master_Mgd_Rights_Id);
        $criteria->compare('Mgd_Rights_Name', $this->Mgd_Rights_Name, true);
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
     * @return MasterManagedRights the static model class
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

    public function getMasterManagedRightbyRank($rank, $is_active = TRUE, $key = NULL) {
        if ($is_active && $key == NULL)
            $managed_rights = CHtml::listData(MasterManagedRights::model()->isActive()->findAll(array('condition' => 'Mgd_Rights_Rank = :rank', 'order' => 'Mgd_Rights_Name', 'params' => array(':rank' => $rank))), 'Master_Mgd_Rights_Id', 'Mgd_Rights_Name');
        else
            $managed_rights = CHtml::listData(MasterManagedRights::model()->findAll(array('condition' => 'Mgd_Rights_Rank = :rank', 'order' => 'Mgd_Rights_Name', 'params' => array(':rank' => $rank))), 'Master_Mgd_Rights_Id', 'Mgd_Rights_Name');
        if ($key != NULL)
            return $managed_rights[$key];
        return $managed_rights;
    }
}
