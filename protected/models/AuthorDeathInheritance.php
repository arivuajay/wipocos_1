<?php

/**
 * This is the model class for table "{{author_death_inheritance}}".
 *
 * The followings are the available columns in table '{{author_death_inheritance}}':
 * @property integer $Auth_Death_Inhrt_Id
 * @property integer $Auth_Acc_Id
 * @property string $Auth_Death_Inhrt_Address_1
 * @property string $Auth_Death_Inhrt_Address_2
 * @property string $Auth_Death_Inhrt_Address_3
 * @property string $Auth_Death_Inhrt_Addtion_Annotation
 *
 * The followings are the available model relations:
 * @property AuthorAccount $authAcc
 */
class AuthorDeathInheritance extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{author_death_inheritance}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Auth_Acc_Id, Auth_Death_Inhrt_Surname, Auth_Death_Inhrt_Address_1, Auth_Death_Inhrt_Address_2, Auth_Death_Inhrt_Address_3', 'required'),
			array('Auth_Acc_Id', 'numerical', 'integerOnly'=>true),
			array('Auth_Death_Inhrt_Surname', 'length', 'max'=>50),
			array('Auth_Death_Inhrt_Address_1, Auth_Death_Inhrt_Address_2, Auth_Death_Inhrt_Address_3', 'length', 'max'=>500),
			array('Auth_Death_Inhrt_Addtion_Annotation', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Auth_Death_Inhrt_Id, Auth_Acc_Id, Auth_Death_Inhrt_Address_1, Auth_Death_Inhrt_Address_2, Auth_Death_Inhrt_Address_3, Auth_Death_Inhrt_Addtion_Annotation', 'safe', 'on'=>'search'),
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
			'authAcc' => array(self::BELONGS_TO, 'AuthorAccount', 'Auth_Acc_Id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Auth_Death_Inhrt_Id' => 'Auth Death Inhrt',
			'Auth_Death_Inhrt_Surname' => 'Last Name',
			'Auth_Acc_Id' => 'Auth Acc',
			'Auth_Death_Inhrt_Address_1' => 'Address 1',
			'Auth_Death_Inhrt_Address_2' => 'Address 2',
			'Auth_Death_Inhrt_Address_3' => 'Address 3',
			'Auth_Death_Inhrt_Addtion_Annotation' => 'Annotation',
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

		$criteria->compare('Auth_Death_Inhrt_Id',$this->Auth_Death_Inhrt_Id);
		$criteria->compare('Auth_Acc_Id',$this->Auth_Acc_Id);
		$criteria->compare('Auth_Death_Inhrt_Address_1',$this->Auth_Death_Inhrt_Address_1,true);
		$criteria->compare('Auth_Death_Inhrt_Address_2',$this->Auth_Death_Inhrt_Address_2,true);
		$criteria->compare('Auth_Death_Inhrt_Address_3',$this->Auth_Death_Inhrt_Address_3,true);
		$criteria->compare('Auth_Death_Inhrt_Addtion_Annotation',$this->Auth_Death_Inhrt_Addtion_Annotation,true);

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
	 * @return AuthorDeathInheritance the static model class
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
