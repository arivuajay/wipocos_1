<?php

/**
 * This is the model class for table "{{recording}}".
 *
 * The followings are the available columns in table '{{recording}}':
 * @property integer $Rcd_Id
 * @property string $Rcd_Title
 * @property string $Rcd_GUID
 * @property integer $Rcd_Language_Id
 * @property string $Rcd_Internal_Code
 * @property integer $Rcd_Type_Id
 * @property string $Rcd_Date
 * @property string $Rcd_Duration
 * @property integer $Rcd_Record_Country_id
 * @property integer $Rcd_Product_Country_Id
 * @property integer $Rcd_Doc_Status_Id
 * @property string $Rcd_Record_Type_Id
 * @property string $Rcd_Label_Id
 * @property string $Rcd_Reference
 * @property string $Rcd_File
 * @property string $Rcd_Isrc_Code
 * @property string $Rcd_Iswc_Number
 * @property string $Rcd_Author
 * @property string $Rcd_Publisher
 *
 * The followings are the available model relations:
 * @property MasterRecordType $rcdRecordType
 * @property MasterDocumentStatus $rcdDocStatus
 * @property MasterLanguage $rcdLanguage
 * @property MasterCountry $rcdProductCountry
 * @property MasterCountry $rcdRecordCountry
 * @property MasterType $rcdType
 * @property RecordingPublication[] $recordingPublications
 * @property RecordingRightholder[] $recordingRightholders
 * @property RecordingSubtitle[] $recordingSubtitles
 */
class Recording extends RActiveRecord {

    public $duration_hours;
    public $duration_minutes;
    public $duration_seconds;
    public $right_holder;

    public function init() {
        parent::init();
        if ($this->isNewRecord) {
            $this->duration_hours = 0;
            $this->duration_minutes = 0;
            $this->duration_seconds = 0;
            $this->Rcd_Language_Id = DEFAULT_LANGUAGE_ID;
            $this->Rcd_Type_Id = DEFAULT_TYPE_ID;
            $this->Rcd_Record_Country_id = DEFAULT_COUNTRY_ID;
            $this->Rcd_Product_Country_Id = DEFAULT_COUNTRY_ID;
            $this->Rcd_Date = date('Y-m-d');
            $this->Rcd_Record_Type_Id = DEFAULT_RECORD_TYPE_ID;
            $this->Rcd_GUID = Myclass::guid(false);
            $this->Rcd_Doc_Status_Id = DEFAULT_DOCUMENT_STATUS_ID;

            $this->Rcd_Internal_Code = InternalcodeGenerate::model()->find("Gen_User_Type = :type", array(':type' => InternalcodeGenerate::RECORDING_CODE))->Fullcode;
        }
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{recording}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Rcd_Title, Rcd_Internal_Code, Rcd_Type_Id, Rcd_Date, Rcd_Duration, Rcd_Record_Country_id, Rcd_Product_Country_Id, Rcd_Doc_Status_Id, Rcd_Record_Type_Id, Rcd_Label_Id, duration_hours, duration_minutes, duration_seconds', 'required'),
            array('Rcd_Language_Id, Rcd_Type_Id, Rcd_Record_Country_id, Rcd_Product_Country_Id, Rcd_Doc_Status_Id, Created_By, Updated_By', 'numerical', 'integerOnly' => true),
            array('Rcd_Title, Rcd_Reference, Rcd_File,Rcd_Author,Rcd_Publisher,right_holder', 'length', 'max' => 255),
            array('Rcd_Internal_Code, Rcd_Isrc_Code, Rcd_Iswc_Number', 'length', 'max' => 100),
            array('Rcd_Record_Type_Id, Rcd_Label_Id', 'length', 'max' => 20),
            array('duration_minutes, duration_seconds', 'numerical', 'min' => 0, 'max' => 59),
            array('duration_hours', 'numerical', 'min' => 0),
            array('Rcd_Internal_Code, Rcd_GUID, Rcd_Title', 'unique'),
            array('duration_hours', 'durationValidate'),
            array('Created_Date, Rowversion, duration_hours, duration_minutes, duration_seconds, Created_By, Updated_By, Rcd_GUID,right_holder', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Rcd_Id, Rcd_Title, Rcd_Language_Id, Rcd_Internal_Code, Rcd_Type_Id, Rcd_Date, Rcd_Duration, Rcd_Record_Country_id, Rcd_Product_Country_Id, Rcd_Doc_Status_Id, Rcd_Record_Type_Id, Rcd_Label_Id, Rcd_Reference, Rcd_File, Rcd_Isrc_Code, Rcd_Iswc_Number,Rcd_Author,Rcd_Publisher, Created_Date, Rowversion,right_holder', 'safe', 'on' => 'search'),
        );
    }

    public function durationValidate($attribute, $params) {
        if ($this->duration_hours == '0') {
            if ($this->duration_minutes == '0' && $this->duration_seconds == '0')
                $this->addError($attribute, 'Duration should not be Zero');
        }
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'rcdRecordType' => array(self::BELONGS_TO, 'MasterRecordType', 'Rcd_Record_Type_Id'),
            'rcdDocStatus' => array(self::BELONGS_TO, 'MasterDocumentStatus', 'Rcd_Doc_Status_Id'),
            'rcdLanguage' => array(self::BELONGS_TO, 'MasterLanguage', 'Rcd_Language_Id'),
            'rcdProductCountry' => array(self::BELONGS_TO, 'MasterCountry', 'Rcd_Product_Country_Id'),
            'rcdRecordCountry' => array(self::BELONGS_TO, 'MasterCountry', 'Rcd_Record_Country_id'),
            'rcdType' => array(self::BELONGS_TO, 'MasterType', 'Rcd_Type_Id'),
            'recordingPublications' => array(self::HAS_ONE, 'RecordingPublication', 'Rcd_Id'),
            'recordingRightholders' => array(self::HAS_MANY, 'RecordingRightholder', 'Rcd_Id'),
            'totalRightholdersEqShare' => array(self::STAT, 'RecordingRightholder', 'Rcd_Id',
                'select' => 'SUM(Rcd_Right_Equal_Share)',
                'group' => 'Rcd_Id',
            ),
            'totalRightholdersBkShare' => array(self::STAT, 'RecordingRightholder', 'Rcd_Id',
                'select' => 'SUM(Rcd_Right_Blank_Share)',
                'group' => 'Rcd_Id',
            ),
            'recordingSubtitles' => array(self::HAS_MANY, 'RecordingSubtitle', 'Rcd_Id'),
            'recordingLinks' => array(self::HAS_MANY, 'RecordingLink', 'Rcd_Id'),
            'createdBy' => array(self::BELONGS_TO, 'User', 'Created_By'),
            'updatedBy' => array(self::BELONGS_TO, 'User', 'Updated_By'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Rcd_Id' => 'Rcd',
            'Rcd_Title' => 'Original Title',
            'Rcd_Language_Id' => 'Language',
            'Rcd_Internal_Code' => 'Internal Code',
            'Rcd_Type_Id' => 'Type of Music or Sound',
            'Rcd_Date' => 'Recording Date',
            'Rcd_Duration' => 'Duration',
            'Rcd_Record_Country_id' => 'Country of Recording',
            'Rcd_Product_Country_Id' => 'Country of Production',
            'Rcd_Doc_Status_Id' => 'Status',
            'Rcd_Record_Type_Id' => 'Type of Recording',
            'Rcd_Label_Id' => 'Label',
            'Rcd_Reference' => 'Reference',
            'Rcd_File' => 'File',
            'Rcd_Isrc_Code' => 'ISRC Code',
            'Rcd_Iswc_Number' => 'ISWC Number',
            'Rcd_Author' => 'Author',
            'Rcd_Publisher' => 'Publisher',
            'Created_Date' => 'Created Date',
            'Rowversion' => 'Rowversion',
            'duration_hours' => 'Hours',
            'duration_minutes' => 'Minutes',
            'duration_seconds' => 'Seconds',
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
    public function search($size = null) {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('Rcd_Id', $this->Rcd_Id);
        $criteria->compare('Rcd_Title', $this->Rcd_Title, true);
        $criteria->compare('Rcd_Language_Id', $this->Rcd_Language_Id);
        $criteria->compare('Rcd_Internal_Code', $this->Rcd_Internal_Code, true);
        $criteria->compare('Rcd_Type_Id', $this->Rcd_Type_Id);
        $criteria->compare('Rcd_Date', $this->Rcd_Date, true);
        $criteria->compare('Rcd_Duration', $this->Rcd_Duration, true);
        $criteria->compare('Rcd_Record_Country_id', $this->Rcd_Record_Country_id);
        $criteria->compare('Rcd_Product_Country_Id', $this->Rcd_Product_Country_Id);
        $criteria->compare('Rcd_Doc_Status_Id', $this->Rcd_Doc_Status_Id);
        $criteria->compare('Rcd_Record_Type_Id', $this->Rcd_Record_Type_Id, true);
        $criteria->compare('Rcd_Label_Id', $this->Rcd_Label_Id, true);
        $criteria->compare('Rcd_Reference', $this->Rcd_Reference, true);
        $criteria->compare('Rcd_File', $this->Rcd_File, true);
        $criteria->compare('Rcd_Isrc_Code', $this->Rcd_Isrc_Code, true);
        $criteria->compare('Rcd_Iswc_Number', $this->Rcd_Iswc_Number, true);
        $criteria->compare('Rcd_Author', $this->Rcd_Author, true);
        $criteria->compare('Rcd_Publisher', $this->Rcd_Publisher, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => PAGE_SIZE,
            )
        ));
    }

    public function report() {
        $criteria = new CDbCriteria;

        $criteria->compare('Rcd_Id', $this->Rcd_Id);
        $criteria->compare('Rcd_Title', $this->Rcd_Title, true);
        $criteria->compare('Rcd_Language_Id', $this->Rcd_Language_Id);
        $criteria->compare('Rcd_Internal_Code', $this->Rcd_Internal_Code, true);
        $criteria->compare('Rcd_Type_Id', $this->Rcd_Type_Id);
        $criteria->compare('Rcd_Date', $this->Rcd_Date, true);
        $criteria->compare('Rcd_Duration', $this->Rcd_Duration, true);
        $criteria->compare('Rcd_Record_Country_id', $this->Rcd_Record_Country_id);
        $criteria->compare('Rcd_Product_Country_Id', $this->Rcd_Product_Country_Id);
        $criteria->compare('Rcd_Doc_Status_Id', $this->Rcd_Doc_Status_Id);
        $criteria->compare('Rcd_Record_Type_Id', $this->Rcd_Record_Type_Id, true);
        $criteria->compare('Rcd_Label_Id', $this->Rcd_Label_Id, true);
        $criteria->compare('Rcd_Reference', $this->Rcd_Reference, true);
        $criteria->compare('Rcd_File', $this->Rcd_File, true);
        $criteria->compare('Rcd_Isrc_Code', $this->Rcd_Isrc_Code, true);
        $criteria->compare('Rcd_Iswc_Number', $this->Rcd_Iswc_Number, true);
        $criteria->compare('Rcd_Author', $this->Rcd_Author, true);
        $criteria->compare('Rcd_Publisher', $this->Rcd_Publisher, true);

        if ($this->right_holder) {
            $criteria->with = array('recordingRightholders.recordingAuthor', 'recordingRightholders.recordingPerformer', 'recordingRightholders.recordingPublisher', 'recordingRightholders.recordingProducer');
            $criteria->together = true;
            $criteria->compare('recordingAuthor.Auth_First_Name', $this->right_holder, true, 'OR');
            $criteria->compare('recordingAuthor.Auth_Sur_Name', $this->right_holder, true, 'OR');
            $criteria->compare('recordingPerformer.Perf_First_Name', $this->right_holder, true, 'OR');
            $criteria->compare('recordingPerformer.Perf_Sur_Name', $this->right_holder, true, 'OR');
            $criteria->compare('recordingPublisher.Pub_Corporate_Name', $this->right_holder, true, 'OR');
            $criteria->compare('recordingProducer.Pro_Corporate_Name', $this->right_holder, true, 'OR');
        }

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => false
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Recording the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function dataProvider() {
        return new CActiveDataProvider($this, array(
            'pagination' => false
//            'pagination' => array(
//                'pageSize' => PAGE_SIZE,
//            )
        ));
    }

    protected function beforeValidate() {
        $this->Rcd_Duration = $this->duration_hours . ':' . $this->duration_minutes . ':' . $this->duration_seconds;
        return parent::beforeValidate();
    }

    protected function afterSave() {
        if ($this->isNewRecord) {
            InternalcodeGenerate::model()->codeIncreament(InternalcodeGenerate::RECORDING_CODE);
        }
        return parent::afterSave();
    }

    public function setDuration() {
        $time = explode(':', $this->Rcd_Duration);
        $this->duration_hours = $time[0];
        $this->duration_minutes = $time[1];
        $this->duration_seconds = $time[2];
    }

    public function getRecordingtype($key = NULL) {
        $recording = CHtml::listData(MasterRecordType::model()->isActive()->findAll(array('order' => 'Rec_Type_Name')), 'Master_Rec_Type_Id', 'Rec_Type_Name');
        if ($key != NULL)
            return $recording[$key];

        return $recording;
    }

//    public function getLabel($key = NULL) {
//        $label = CHtml::listData(MasterLabel::model()->isActive()->findAll(), 'Master_Label_Id', 'Label_Name');
//        if ($key != NULL)
//            return $label[$key];
//
//        return $label;
//    }

    public function getMatchingdetails($recording_id = NULL) {
        $recording = self::model()->with('recordingRightholders', 'recordingSubtitles')->findByAttributes(array('Rcd_Id' => $recording_id));
        $column = '';
        foreach ($recording->recordingSubtitles as $key => $subtitle) {
            $name = $subtitle->Rcd_Subtitle_Name;
            $column .= $key == 0 ? "Subtitle - $name" : " , {$name}";
        }
        if (!empty($recording->recordingSubtitles))
            $column .= "<br />";
        $time = explode(':', $recording->Rcd_Duration);
        $column .= "Duration - $time[0]' $time[1]'' <br />";
        $column .= "Type - {$recording->rcdType->Type_Name}, Documentary Status - {$recording->rcdDocStatus->Document_Sts_Name}";
        if ($recording->recordingRightholders) {
            $column .= "<br /><br />";
            $column .= "<table border = '1' class='match_det_table'><thead><th width='50%'>Right Holders</th><th>Role</th><th>Equal Remuneration</th><th>Blank Levy</th></thead><tbody>";
            foreach ($recording->recordingRightholders as $key => $rightholder) {
                if ($rightholder->recordingPerformer) {
                    $column .= '<tr>';
                    $column .= "<td>{$rightholder->recordingPerformer->fullname}</td>";
                    $column .= "<td>{$rightholder->rcdRightRole->Type_Rights_Code}</td>";
                    $column .= "<td>{$rightholder->Rcd_Right_Equal_Share}</td>";
                    $column .= "<td>{$rightholder->Rcd_Right_Blank_Share}</td>";
                    $column .= '</tr>';
                }
            }
            foreach ($recording->recordingRightholders as $key => $rightholder) {
                if ($rightholder->recordingProducer) {
                    $column .= '<tr>';
                    $column .= "<td>{$rightholder->recordingProducer->Pro_Corporate_Name}</td>";
                    $column .= "<td>{$rightholder->rcdRightRole->Type_Rights_Code}</td>";
                    $column .= "<td>{$rightholder->Rcd_Right_Equal_Share}</td>";
                    $column .= "<td>{$rightholder->Rcd_Right_Blank_Share}</td>";
                    $column .= '</tr>';
                }
            }
            $column .= '</tbody></table>';
        }
        return $column;
    }

    protected function afterFind() {
        $this->setDuration();
        return parent::afterFind();
    }

    protected function getSubtitle_values() {
        return implode(",", CHtml::listData($this->recordingSubtitles, 'Rcd_Subtitle_Id', 'Rcd_Subtitle_Name'));
    }

    protected function getDuration_values() {
        $time = explode(':', $this->Rcd_Duration);
        return "$time[0]' $time[1]''";
    }

    protected function getRh_grid() {
        $result = 'NIL';
        $rh = Recording::model()->findByPk($this->Rcd_Id)->recordingRightholders;
        if ($rh) {
            $res = '';
            foreach ($rh as $key => $member) {
                if ($member->recordingAuthor) {
                    $name = $member->recordingAuthor->fullname;
                    $internal_code = $member->recordingAuthor->Auth_Internal_Code;
                } elseif ($member->recordingPublisher) {
                    $name = $member->recordingPublisher->Pub_Corporate_Name;
                    $internal_code = $member->recordingPublisher->Pub_Internal_Code;
                } elseif ($member->recordingPerformer) {
                    $name = $member->recordingPerformer->fullname;
                    $internal_code = $member->recordingPerformer->Perf_Internal_Code;
                } elseif ($member->recordingProducer) {
                    $name = $member->recordingProducer->Pro_Corporate_Name;
                    $internal_code = $member->recordingProducer->Pro_Internal_Code;
                }

                $res .= "<tr><td>{$name}</td><td>{$internal_code}</td></tr>";
            }
            $result = "<table border = '1' class='match_det_table'><thead><tr><th width='50%'>Name</th><th>Internal Code</th></tr></thead><tbody>{$res}</tbody></table>";
        }

        return $result;
    }

}
