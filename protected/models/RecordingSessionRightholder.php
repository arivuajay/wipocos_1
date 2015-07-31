<?php

/**
 * This is the model class for table "{{recording_session_rightholder}}".
 *
 * The followings are the available columns in table '{{recording_session_rightholder}}':
 * @property integer $Rcd_Ses_Right_Id
 * @property integer $Rcd_Ses_Id
 * @property string $Rcd_Ses_Right_Work_GUID
 * @property string $Rcd_Ses_Right_Member_GUID
 * @property string $Rcd_Ses_Right_Work_Type
 * @property integer $Rcd_Ses_Right_Role
 * @property string $Rcd_Ses_Right_Equal_Share
 * @property integer $Rcd_Ses_Right_Equal_Org_Id
 * @property string $Rcd_Ses_Right_Blank_Share
 * @property integer $Rcd_Ses_Right_Blank_Org_Id
 * @property string $Created_Date
 * @property string $Rowversion
 * @property integer $Created_By
 * @property integer $Updated_By
 *
 * The followings are the available model relations:
 * @property Organization $rcdSesRightBlankOrg
 * @property Organization $rcdSesRightEqualOrg
 * @property MasterTypeRights $rcdSesRightRole
 * @property RecordingSession $rcdSes
 */
class RecordingSessionRightholder extends RActiveRecord {

    public $workMatchRecords;
    public $workExportMatchRecords;
    public $workTitle;
    public $recordTitle;
    public $Rcd_Ses_Right_Member_Internal_Code;
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{recording_session_rightholder}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Rcd_Ses_Id, Rcd_Ses_Right_Role, Rcd_Ses_Right_Equal_Share, Rcd_Ses_Right_Equal_Org_Id, Rcd_Ses_Right_Blank_Share, Rcd_Ses_Right_Blank_Org_Id', 'required'),
            array('Rcd_Ses_Id, Rcd_Ses_Right_Role, Rcd_Ses_Right_Equal_Org_Id, Rcd_Ses_Right_Blank_Org_Id, Created_By, Updated_By', 'numerical', 'integerOnly' => true),
            array('Rcd_Ses_Right_Work_GUID, Rcd_Ses_Right_Member_GUID', 'length', 'max' => 40),
            array('Rcd_Ses_Right_Work_Type', 'length', 'max' => 1),
            array('Rcd_Ses_Right_Equal_Share, Rcd_Ses_Right_Blank_Share', 'numerical', 'min' => 0, 'max' => 100, 'integerOnly' => false),
            array('Rcd_Ses_Right_Work_GUID', 'required', 'message' => 'Seacrh & select work before you save'),
            array('Rcd_Ses_Right_Member_GUID', 'required', 'message' => 'Seacrh & select user before you save'),
            array('Created_Date, Rowversion, Rcd_Ses_Right_Member_Internal_Code, Rcd_Ses_Right_Member_Type, workMatchRecords, workExportMatchRecords', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Rcd_Ses_Right_Id, Rcd_Ses_Id, Rcd_Ses_Right_Work_GUID, Rcd_Ses_Right_Member_GUID, Rcd_Ses_Right_Work_Type, Rcd_Ses_Right_Role, Rcd_Ses_Right_Equal_Share, Rcd_Ses_Right_Equal_Org_Id, Rcd_Ses_Right_Blank_Share, Rcd_Ses_Right_Blank_Org_Id, Created_Date, Rowversion, Created_By, Updated_By', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'rcdSesRightBlankOrg' => array(self::BELONGS_TO, 'Organization', 'Rcd_Ses_Right_Blank_Org_Id'),
            'rcdSesRightEqualOrg' => array(self::BELONGS_TO, 'Organization', 'Rcd_Ses_Right_Equal_Org_Id'),
            'rcdSesRightRole' => array(self::BELONGS_TO, 'MasterTypeRights', 'Rcd_Ses_Right_Role'),
            'rcdSes' => array(self::BELONGS_TO, 'RecordingSession', 'Rcd_Ses_Id'),
            'rightholderAuthor' => array(self::BELONGS_TO, 'AuthorAccount', 'Rcd_Ses_Right_Member_GUID',
                'foreignKey' => array('Rcd_Ses_Right_Member_GUID' => 'Auth_GUID')
            ),
            'rightholderPerformer' => array(self::BELONGS_TO, 'PerformerAccount', 'Rcd_Ses_Right_Member_GUID',
                'foreignKey' => array('Rcd_Ses_Right_Member_GUID' => 'Perf_GUID')
            ),
            'rightholderWork' => array(self::BELONGS_TO, 'Work', 'Rcd_Ses_Right_Work_GUID',
                'foreignKey' => array('Rcd_Ses_Right_Work_GUID' => 'Work_GUID')
            ),
            'rightholderRecord' => array(self::BELONGS_TO, 'Recording', 'Rcd_Ses_Right_Work_GUID',
                'foreignKey' => array('Rcd_Ses_Right_Work_GUID' => 'Rcd_GUID')
            ),
            'createdBy' => array(self::BELONGS_TO, 'User', 'Created_By'),
            'updatedBy' => array(self::BELONGS_TO, 'User', 'Updated_By'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Rcd_Ses_Right_Id' => 'Rcd Ses Right',
            'Rcd_Ses_Id' => 'Rcd Ses',
            'Rcd_Ses_Right_Work_GUID' => 'Work Guid',
            'Rcd_Ses_Right_Member_GUID' => 'Member Guid',
            'Rcd_Ses_Right_Work_Type' => 'Work Type',
            'Rcd_Ses_Right_Role' => 'Role',
            'Rcd_Ses_Right_Equal_Share' => 'Points',
            'Rcd_Ses_Right_Equal_Org_Id' => 'Organization',
            'Rcd_Ses_Right_Blank_Share' => 'Points',
            'Rcd_Ses_Right_Blank_Org_Id' => 'Organization',
            'Created_Date' => 'Created Date',
            'Rowversion' => 'Rowversion',
            'Created_By' => 'Created By',
            'Updated_By' => 'Updated By',
            'workmatchrecords' => 'Right Holders',
            'workexportmatchrecords' => 'Right Holders',
            'worktitle' => 'Work',
            'recordtitle' => 'Recording',
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

        $criteria->compare('Rcd_Ses_Right_Id', $this->Rcd_Ses_Right_Id);
        $criteria->compare('Rcd_Ses_Id', $this->Rcd_Ses_Id);
        $criteria->compare('Rcd_Ses_Right_Work_GUID', $this->Rcd_Ses_Right_Work_GUID, true);
        $criteria->compare('Rcd_Ses_Right_Member_GUID', $this->Rcd_Ses_Right_Member_GUID, true);
        $criteria->compare('Rcd_Ses_Right_Work_Type', $this->Rcd_Ses_Right_Work_Type, true);
        $criteria->compare('Rcd_Ses_Right_Role', $this->Rcd_Ses_Right_Role);
        $criteria->compare('Rcd_Ses_Right_Equal_Share', $this->Rcd_Ses_Right_Equal_Share, true);
        $criteria->compare('Rcd_Ses_Right_Equal_Org_Id', $this->Rcd_Ses_Right_Equal_Org_Id);
        $criteria->compare('Rcd_Ses_Right_Blank_Share', $this->Rcd_Ses_Right_Blank_Share, true);
        $criteria->compare('Rcd_Ses_Right_Blank_Org_Id', $this->Rcd_Ses_Right_Blank_Org_Id);
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
     * @return RecordingSessionRightholder the static model class
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

    public function distinctWorks($record_ses_id) {
        $works = self::model()->findAll(array(
            'select' => 't.Rcd_Ses_Right_Work_GUID, t.Rcd_Ses_Right_Work_Type',
            'distinct' => true,
            'condition' => "t.Rcd_Ses_Id = $record_ses_id"
        ));
        return $works;
    }
    
    public function workExportList($rcd_ses_id, $type) {
        $criteria = new CDbCriteria;
        $criteria->group = "t.Rcd_Ses_Right_Work_GUID";
        $criteria->addCondition("t.Rcd_Ses_Id = $rcd_ses_id And t.Rcd_Ses_Right_Work_Type = '{$type}'");

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 5,
            )
        ));
    }
    
    public function getWorkMatchRecords() {
        $table = '<table border="1" class="match_det_table">';
        $table .= '<tbody>';
        $rightholders = self::model()->findAllByAttributes(array(
            'Rcd_Ses_Id' => $this->Rcd_Ses_Id,
            'Rcd_Ses_Right_Work_GUID' => $this->Rcd_Ses_Right_Work_GUID,
            'Rcd_Ses_Right_Work_Type' => $this->Rcd_Ses_Right_Work_Type
        ));
        foreach ($rightholders as $rightholder) {
            if ($rightholder->Rcd_Ses_Right_Member_Type == 'A') {
                $table .= "<tr><td>{$rightholder->rightholderAuthor->fullname}</td></tr>";
            } else if ($rightholder->Rcd_Ses_Right_Member_Type == 'P') {
                $table .= "<tr><td>{$rightholder->rightholderPerformer->fullname}</td></tr>";
            }
        }
        $table .= '</tbody></table>';
        return $table;
    }
    
    public function getWorkExportMatchRecords() {
        $table = '';
        $rightholders = self::model()->findAllByAttributes(array(
            'Rcd_Ses_Id' => $this->Rcd_Ses_Id,
            'Rcd_Ses_Right_Work_GUID' => $this->Rcd_Ses_Right_Work_GUID,
            'Rcd_Ses_Right_Work_Type' => $this->Rcd_Ses_Right_Work_Type
        ));
        foreach ($rightholders as $rightholder) {
            if ($rightholder->Rcd_Ses_Right_Member_Type == 'A') {
                $table .= "{$rightholder->rightholderAuthor->fullname}\r";
            } else if ($rightholder->Rcd_Ses_Right_Member_Type == 'P') {
                $table .= "{$rightholder->rightholderPerformer->fullname}\r";
            }
        }
        return $table;
    }

    public function getWorkTitle() {
        return $this->rightholderWork->Work_Org_Title;
    }

    public function getRecordTitle() {
        return $this->rightholderRecord->Rcd_Title;
    }

}
