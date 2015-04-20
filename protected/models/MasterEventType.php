<?php

/**
 * This is the model class for table "{{master_event_type}}".
 *
 * The followings are the available columns in table '{{master_event_type}}':
 * @property integer $Master_Evt_Type_Id
 * @property string $Evt_Type_Name
 * @property string $Evt_Type_Comment
 * @property string $Active
 * @property string $Created_Date
 * @property string $Rowversion
 */
class MasterEventType extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{master_event_type}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Evt_Type_Name, Evt_Type_Comment', 'required'),
			array('Evt_Type_Name', 'length', 'max'=>45),
			array('Evt_Type_Comment', 'length', 'max'=>500),
			array('Active', 'length', 'max'=>1),
			array('Created_Date, Rowversion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Master_Evt_Type_Id, Evt_Type_Name, Evt_Type_Comment, Active, Created_Date, Rowversion', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Master_Evt_Type_Id' => 'Master Evt Type',
			'Evt_Type_Name' => 'Event Type Name',
			'Evt_Type_Comment' => 'Event Type Comment',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('Master_Evt_Type_Id',$this->Master_Evt_Type_Id);
		$criteria->compare('Evt_Type_Name',$this->Evt_Type_Name,true);
		$criteria->compare('Evt_Type_Comment',$this->Evt_Type_Comment,true);
		$criteria->compare('Active',$this->Active,true);
		$criteria->compare('Created_Date',$this->Created_Date,true);
		$criteria->compare('Rowversion',$this->Rowversion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination' => array(
                            'pageSize' => PAGE_SIZE,
                        )
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MasterEventType the static model class
	 */
	public static function model($className=__CLASS__)
	{
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
