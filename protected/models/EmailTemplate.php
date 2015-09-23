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
class EmailTemplate extends RActiveRecord {
    
    const DEFAULT_FROM = 'softwareid@gmail.com';
    const DEFAULT_REPLY_TO = 'softwareid@gmail.com';

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
            array('Email_Temp_From, Email_Temp_ReplyTo, Email_Temp_Username', 'length', 'max' => 50),
            array('Email_Temp_ReplyTo', 'email'),
            array('Email_Temp_Content, Created_Date, Rowversion, Email_Temp_Username, Tarf_Cont_Id, Email_Temp_Params', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Email_Temp_Id, Email_Temp_Name, Email_Temp_From, Email_Temp_ReplyTo, Email_Temp_Subject, Email_Temp_Content, Email_Temp_Params, Created_Date, Rowversion, Created_By, Updated_By, Tarf_Cont_Id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'tarfCont' => array(self::BELONGS_TO, 'TariffContracts', 'Tarf_Cont_Id'),
            'createdBy' => array(self::BELONGS_TO, 'User', 'Created_By'),
            'updatedBy' => array(self::BELONGS_TO, 'User', 'Updated_By'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Email_Temp_Id' => 'Email Temp',
            'Email_Temp_Name' => 'Template Name',
            'Email_Temp_From' => 'From Email',
            'Email_Temp_ReplyTo' => 'Reply To',
            'Email_Temp_Subject' => 'Subject',
            'Email_Temp_Content' => 'Content',
            'Email_Temp_Params' => 'Params',
            'Email_Temp_Username' => 'From Name',
            'Created_Date' => 'Created Date',
            'Rowversion' => 'Rowversion',
            'Created_By' => 'Created By',
            'Updated_By' => 'Updated By',
            'Tarf_Cont_Id' => 'Contract Number',
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

    public static function defaultTemplateContents() {
        $subject = "{CURRENT_MONTH} Invoice {INVOICE_NO} From {SOCIETY_NAME}";
        
        $content = '<title>{SITENAME}</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body{
                color: #333;
                font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
                font-size: 14px;
                line-height: 1.42857;
            }
        </style>
    
        <div class="content invoice" style="float: left;padding: 0px;background: none repeat scroll 0 0 #f9f9f9; width: 100%">
            <div class="row" style="margin-right: -15px;margin-left: -15px;">
                <div class="col-xs-12" style="float: left;width: 95%;min-height: 1px;padding-left: 15px;padding-right: 15px;position: relative;">
                    <h2 class="page-header" style="padding-bottom: 9px;border-bottom: 1px solid #eee;">
                        {LOGO} {SITENAME}
                        <small style="float: right; font-size: 12px; color:#777">Date: {GEN_DATE}</small>
                    </h2>
                </div>
            </div>
            <div class="row invoice-info" style="margin-right: -15px; margin-left: -15px;">
                <div class="col-sm-12" style="width: 100%; min-height: 1px; padding-left: 15px; padding-right: 15px; position: relative; float: left;">
                    <p style="font-weight: normal; font-size: 13px; line-height: 20px;">Hi {CUSTOMER_NAME},</p>
                    <p style="font-weight: normal; font-size: 13px; line-height: 20px;">Here is your {CURRENT_MONTH} invoice {INVOICE_NO} for {INVOICE_AMOUNT}</p>
                    <p style="font-size: 13px; line-height: 20px;">If you have any question please let us know.</p>
                </div>
            </div>
            <div class="clearfix" style="font-weight: normal; clear: both;"></div>

            <div class="row" style="margin-right: -15px;margin-left: -15px;">
                <div class="col-xs-12" style="float: left;width: 95%;min-height: 1px;padding-left: 15px;padding-right: 15px;position: relative; margin-top: 1px solid #eee;">
                    <p style="font-size: 13px; line-height: 20px;">Thanks, <br>{SITENAME}</p>
                </div>
            </div>
        </div>';
        
        $params = "CONTRACT_NO,CONTRACT_DURATION,CUSTOMER_NAME,CUST_ADDRESS,CUST_PHONE,CUST_FAX,CUST_WEBSITE,CUST_EMAIL,CURRENT_MONTH,INVOICE_NO,INVOICE_AMOUNT,SOCIETY_NAME,TAR_CITY,TAR_DISTRICT,TAR_AREA,TAR_TARIF_CODE,TAR_INSP,TAR_BALANCE,TAR_TYPE,TAR_EVE_DATE,TAR_EVE_COMMENT,TAR_TO_PAY,TAR_FROM,TAR_TO,TAR_SIGN,TAR_PAYMENT,TAR_PORTION,TAR_ROY_COMMENT";
        
        return array(
            'Email_Temp_From' => self::DEFAULT_FROM,
            'Email_Temp_ReplyTo' => self::DEFAULT_REPLY_TO,
            'Email_Temp_Subject' => $subject,
            'Email_Temp_Params' => $params,
            'Email_Temp_Content' => $content,
        );
    }
}
