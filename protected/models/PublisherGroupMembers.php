<?php

/**
 * This is the model class for table "{{publisher_group_members}}".
 *
 * The followings are the available columns in table '{{publisher_group_members}}':
 * @property integer $Pub_Group_Member_Id
 * @property integer $Pub_Group_Id
 * @property string $Pub_Group_Member_Internal_Code
 * @property string $Created_Date
 * @property string $Rowversion
 *
 * The followings are the available model relations:
 * @property PublisherGroup $pubGroup
 */
class PublisherGroupMembers extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{publisher_group_members}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Pub_Group_Id, Pub_Group_Member_Internal_Code, Created_Date', 'required'),
			array('Pub_Group_Id', 'numerical', 'integerOnly'=>true),
			array('Pub_Group_Member_Internal_Code', 'length', 'max'=>255),
			array('Rowversion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Pub_Group_Member_Id, Pub_Group_Id, Pub_Group_Member_Internal_Code, Created_Date, Rowversion', 'safe', 'on'=>'search'),
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
			'pubGroup' => array(self::BELONGS_TO, 'PublisherGroup', 'Pub_Group_Id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Pub_Group_Member_Id' => 'Pub Group Member',
			'Pub_Group_Id' => 'Pub Group',
			'Pub_Group_Member_Internal_Code' => 'Pub Group Member Internal Code',
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

		$criteria->compare('Pub_Group_Member_Id',$this->Pub_Group_Member_Id);
		$criteria->compare('Pub_Group_Id',$this->Pub_Group_Id);
		$criteria->compare('Pub_Group_Member_Internal_Code',$this->Pub_Group_Member_Internal_Code,true);
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
	 * @return PublisherGroupMembers the static model class
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
