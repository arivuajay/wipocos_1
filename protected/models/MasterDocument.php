<?php

/**
 * This is the model class for table "{{master_document}}".
 *
 * The followings are the available columns in table '{{master_document}}':
 * @property integer $Master_Doc_Id
 * @property string $Doc_Name
 * @property string $Doc_Comment
 * @property string $Active
 * @property string $Created_Date
 * @property string $Rowversion
 */
class MasterDocument extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{master_document}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Doc_Name, Doc_Comment', 'required'),
			array('Doc_Name, Doc_Comment', 'length', 'max'=>90),
			array('Active', 'length', 'max'=>1),
			array('Created_Date, Rowversion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Master_Doc_Id, Doc_Name, Doc_Comment, Active, Created_Date, Rowversion', 'safe', 'on'=>'search'),
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
			'Master_Doc_Id' => 'Master Doc',
			'Doc_Name' => 'Doc Name',
			'Doc_Comment' => 'Doc Comment',
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

		$criteria->compare('Master_Doc_Id',$this->Master_Doc_Id);
		$criteria->compare('Doc_Name',$this->Doc_Name,true);
		$criteria->compare('Doc_Comment',$this->Doc_Comment,true);
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
	 * @return MasterDocument the static model class
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
