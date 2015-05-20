<?php

/**
 * This is the model class for table "{{audit_trail}}".
 *
 * The followings are the available columns in table '{{audit_trail}}':
 * @property integer $aud_id
 * @property integer $aud_user
 * @property string $aud_class
 * @property string $aud_action
 * @property string $aud_message
 * @property string $aud_ip_address
 * @property string $aud_created_date
 *
 * The followings are the available model relations:
 * @property User $audUser
 */
class AuditTrail extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{audit_trail}}';
    }

    public function scopes() {
        $alias = $this->getTableAlias(false, false);
        return array(
            'mine' => array('condition' => "$alias.aud_user = '" . Yii::app()->user->id . "' "),
            'orderDesc' => array('order' => "$alias.aud_id DESC"),
        );
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('aud_message', 'required'),
            array('aud_user', 'numerical', 'integerOnly' => true),
            array('aud_class, aud_ip_address', 'length', 'max' => 100),
            array('aud_action, aud_message', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('aud_id, aud_user, aud_class, aud_action, aud_message, aud_ip_address, aud_created_date', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'audUser' => array(self::BELONGS_TO, 'User', 'aud_user'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'aud_id' => 'Aud',
            'aud_user' => 'User',
            'aud_class' => 'Class',
            'aud_action' => 'Action',
            'aud_message' => 'Message',
            'aud_ip_address' => 'IP Address',
            'aud_created_date' => 'Created Date',
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

        $criteria->compare('aud_id', $this->aud_id);
        $criteria->compare('aud_user', $this->aud_user);
        $criteria->compare('aud_class', $this->aud_class, true);
        $criteria->compare('aud_action', $this->aud_action, true);
        $criteria->compare('aud_message', $this->aud_message, true);
        $criteria->compare('aud_ip_address', $this->aud_ip_address, true);
        $criteria->compare('aud_created_date', $this->aud_created_date, true);

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
     * @return AuditTrail the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function dataProvider() {
        return new CActiveDataProvider($this, array(
            'criteria' => array('order' => 'aud_id desc'),
            'pagination' => array(
                'pageSize' => PAGE_SIZE,
            )
        ));
    }

    protected function beforeSave() {
        if ($this->isNewRecord) {
            $this->aud_user = Yii::app()->user->id;
            $this->aud_created_date = new CDbExpression('NOW()');
            $this->aud_action = Yii::app()->controller->module->id . "." . Yii::app()->controller->id . "." . Yii::app()->controller->action->id;
            $this->aud_ip_address = Yii::app()->request->getUserHostAddress();
        }
        return parent::beforeSave();
    }

}
