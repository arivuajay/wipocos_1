<?php

/**
 * This is the model class for table "{{master_country}}".
 *
 * The followings are the available columns in table '{{master_country}}':
 * @property integer $Master_Country_Id
 * @property string $Country_Name
 * @property string $Country_Two_Code
 * @property string $Country_Three_Code
 * @property string $Active
 * @property string $Created_Date
 * @property string $Rowversion
 */
class MasterCountry extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{master_country}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Country_Name', 'required'),
			array('Country_Name', 'length', 'max'=>45),
			array('Country_Two_Code', 'length', 'max'=>2),
			array('Country_Three_Code', 'length', 'max'=>3),
			array('Active', 'length', 'max'=>1),
			array('Created_Date, Rowversion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Master_Country_Id, Country_Name, Country_Two_Code, Country_Three_Code, Active, Created_Date, Rowversion', 'safe', 'on'=>'search'),
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
			'Master_Country_Id' => 'Master Country',
			'Country_Name' => 'Country Name',
			'Country_Two_Code' => 'Country Two Code',
			'Country_Three_Code' => 'Country Three Code',
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

		$criteria->compare('Master_Country_Id',$this->Master_Country_Id);
		$criteria->compare('Country_Name',$this->Country_Name,true);
		$criteria->compare('Country_Two_Code',$this->Country_Two_Code,true);
		$criteria->compare('Country_Three_Code',$this->Country_Three_Code,true);
		$criteria->compare('Active',$this->Active);
		$criteria->compare('Created_Date',$this->Created_Date);
		$criteria->compare('Rowversion',$this->Rowversion);

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
	 * @return MasterCountry the static model class
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
