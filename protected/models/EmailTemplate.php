<?php

/**
 * This is the model class for table "{{email_template}}".
 *
 * The followings are the available columns in table '{{email_template}}':
 * @property integer $Email_Temp_Id
 * @property string $Email_Temp_Name
 * @property string $Email_Temp_From
 * @property string $Email_Temp_ReplyTo
 * @property string $Email_Temp_Subject
 * @property string $Email_Temp_Content
 * @property string $Email_Temp_Params
 * @property string $Created_Date
 * @property string $Rowversion
 * @property integer $Created_By
 * @property integer $Updated_By
 */
class EmailTemplate extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{email_template}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Email_Temp_Name, Email_Temp_Subject, Email_Temp_Content', 'required'),
            array('Created_By, Updated_By', 'numerical', 'integerOnly' => true),
            array('Email_Temp_Name, Email_Temp_Subject', 'length', 'max' => 100),
            array('Email_Temp_From, Email_Temp_ReplyTo', 'length', 'max' => 50),
            array('Email_Temp_ReplyTo', 'email'),
            array('Email_Temp_Params', 'length', 'max' => 255),
            array('Email_Temp_Content, Created_Date, Rowversion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Email_Temp_Id, Email_Temp_Name, Email_Temp_From, Email_Temp_ReplyTo, Email_Temp_Subject, Email_Temp_Content, Email_Temp_Params, Created_Date, Rowversion, Created_By, Updated_By', 'safe', 'on' => 'search'),
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
            'Email_Temp_Id' => 'Email Temp',
            'Email_Temp_Name' => 'Name',
            'Email_Temp_From' => 'From',
            'Email_Temp_ReplyTo' => 'Reply To',
            'Email_Temp_Subject' => 'Subject',
            'Email_Temp_Content' => 'Content',
            'Email_Temp_Params' => 'Params',
            'Created_Date' => 'Created Date',
            'Rowversion' => 'Rowversion',
            'Created_By' => 'Created By',
            'Updated_By' => 'Updated By',
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

        $criteria->compare('Email_Temp_Id', $this->Email_Temp_Id);
        $criteria->compare('Email_Temp_Name', $this->Email_Temp_Name, true);
        $criteria->compare('Email_Temp_From', $this->Email_Temp_From, true);
        $criteria->compare('Email_Temp_ReplyTo', $this->Email_Temp_ReplyTo, true);
        $criteria->compare('Email_Temp_Subject', $this->Email_Temp_Subject, true);
        $criteria->compare('Email_Temp_Content', $this->Email_Temp_Content, true);
        $criteria->compare('Email_Temp_Params', $this->Email_Temp_Params, true);
        $criteria->compare('Created_Date', $this->Created_Date, true);
        $criteria->compare('Rowversion', $this->Rowversion, true);
        $criteria->compare('Created_By', $this->Created_By);
        $criteria->compare('Updated_By', $this->Updated_By);

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
     * @return EmailTemplate the static model class
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
