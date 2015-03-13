<?php

/**
 * This is the model class for table "{{master_language}}".
 *
 * The followings are the available columns in table '{{master_language}}':
 * @property integer $Master_Lang_Id
 * @property string $Lang_Name
 * @property string $Active
 * @property string $Created_Date
 * @property string $Rowversion
 */
class MasterLanguage extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{master_language}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Lang_Name', 'required'),
			array('Lang_Name', 'length', 'max'=>45),
			array('Active', 'length', 'max'=>1),
			array('Created_Date, Rowversion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Master_Lang_Id, Lang_Name, Active, Created_Date, Rowversion', 'safe', 'on'=>'search'),
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
			'Master_Lang_Id' => 'Master Lang',
			'Lang_Name' => 'Lang Name',
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

		$criteria->compare('Master_Lang_Id',$this->Master_Lang_Id);
		$criteria->compare('Lang_Name',$this->Lang_Name,true);
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
	 * @return MasterLanguage the static model class
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
