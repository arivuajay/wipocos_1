<?php

/**
 * This is the model class for table "{{author_biography}}".
 *
 * The followings are the available columns in table '{{author_biography}}':
 * @property integer $Auth_Biogrph_Id
 * @property integer $Auth_Acc_Id
 * @property string $Auth_Biogrph_Annotation
 * @property string $Active
 * @property string $Created_Date
 * @property string $Rowversion
 *
 * The followings are the available model relations:
 * @property AuthorAccount $authAcc
 */
class AuthorBiography extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{author_biography}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Auth_Acc_Id, Auth_Biogrph_Annotation', 'required'),
            array('Auth_Acc_Id', 'numerical', 'integerOnly' => true),
            array('Active', 'length', 'max' => 1),
            array('Auth_Biogrph_Annotation, Created_Date, Rowversion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Auth_Biogrph_Id, Auth_Acc_Id, Auth_Biogrph_Annotation, Active, Created_Date, Rowversion', 'safe', 'on' => 'search'),
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
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Auth_Biogrph_Id' => 'Id',
            'Auth_Acc_Id' => 'Auth Acc',
            'Auth_Biogrph_Annotation' => 'Annotation',
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

        $criteria->compare('Auth_Biogrph_Id', $this->Auth_Biogrph_Id);
        $criteria->compare('Auth_Acc_Id', $this->Auth_Acc_Id);
        $criteria->compare('Auth_Biogrph_Annotation', $this->Auth_Biogrph_Annotation, true);
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
     * @return AuthorBiography the static model class
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
