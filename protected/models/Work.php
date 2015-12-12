<?php

/**
 * This is the model class for table "{{work}}".
 *
 * The followings are the available columns in table '{{work}}':
 * @property integer $Work_Id
 * @property string $Work_GUID
 * @property string $Work_Org_Title
 * @property integer $Work_Language_Id
 * @property string $Work_Internal_Code
 * @property string $Work_Iswc
 * @property string $Work_Wic_Code
 * @property integer $Work_Type_Id
 * @property integer $Work_Factor_Id
 * @property string $Work_Instrumentation
 * @property string $Work_Duration
 * @property string $Work_Creation
 * @property integer $Work_Opus_Number
 * @property string $Work_Unknown
 * @property string $Work_Performer
 * @property string $Work_Producer
 * @property string $Active
 * @property string $Created_Date
 * @property string $Rowversion
 *
 * The followings are the available model relations:
 * @property MasterFactor $workFactor
 * @property MasterLanguage $workLanguage
 * @property MasterType $workType
 * @property WorkBiography[] $workBiographies
 * @property WorkDocumentation[] $workDocumentations
 * @property WorkPublishing[] $workPublishings
 * @property WorkRightholder[] $workRightholders
 * @property WorkSubPublishing[] $workSubPublishings
 * @property WorkSubtitle[] $workSubtitles
 */
class Work extends RActiveRecord {

    public $duration_hours;
    public $duration_minutes;
    public $duration_seconds;
    public $matchingdetails;
    public $right_holder;

    public function init() {
        parent::init();
        if ($this->isNewRecord) {
            $this->duration_hours = 0;
            $this->duration_minutes = 0;
            $this->duration_seconds = 0;
            $this->Work_Language_Id = DEFAULT_LANGUAGE_ID;
            $this->Work_Factor_Id = DEFAULT_FACTOR_ID;
            $this->Work_Type_Id = DEFAULT_TYPE_ID;
            $this->Work_GUID = Myclass::guid(false);

            $this->Work_Internal_Code = InternalcodeGenerate::model()->find("Gen_User_Type = :type", array(':type' => InternalcodeGenerate::WORK_CODE))->Fullcode;
        }
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{work}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Work_Org_Title, Work_Internal_Code, Work_Type_Id, Work_Factor_Id, Work_Duration, duration_hours, duration_minutes, duration_seconds', 'required'),
            array('Work_Language_Id, Work_Type_Id, Work_Factor_Id, Work_Opus_Number, duration_hours, duration_minutes, duration_seconds, Created_By, Updated_By', 'numerical', 'integerOnly' => true),
            array('Work_Org_Title, Work_Internal_Code, Work_Iswc, Work_Wic_Code', 'length', 'max' => 100),
            array('duration_minutes, duration_seconds', 'numerical', 'min' => 0, 'max' => 59),
            array('duration_hours', 'numerical', 'min' => 0),
            array('Work_Instrumentation,Work_Performer,Work_Producer,right_holder', 'length', 'max' => 500),
            array('Work_Creation', 'numerical', 'min' => (date('Y') - 100), 'max' => (date('Y'))),
            array('Work_Internal_Code, Work_Org_Title, Work_GUID', 'unique'),
            array('Work_Unknown, Active', 'length', 'max' => 1),
            array('duration_hours', 'durationValidate'),
            array('Created_Date, Rowversion, duration_hours, duration_minutes, duration_seconds, matchingdetails, Created_By, Updated_By, Work_GUID,right_holder', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Work_Id, Work_Org_Title, Work_Language_Id, Work_Internal_Code, Work_Iswc, Work_Wic_Code, Work_Type_Id, Work_Factor_Id, Work_Instrumentation, Work_Duration, Work_Creation, Work_Opus_Number, Work_Unknown,Work_Performer,Work_Producer, Active, Created_Date, Rowversion,right_holder', 'safe', 'on' => 'search'),
        );
    }

    public function durationValidate($attribute, $params) {
        if ($this->duration_hours == '0' && $this->duration_minutes == '0' && $this->duration_seconds == '0') {
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
            'workFactor' => array(self::BELONGS_TO, 'MasterFactor', 'Work_Factor_Id'),
            'workLanguage' => array(self::BELONGS_TO, 'MasterLanguage', 'Work_Language_Id'),
            'workType' => array(self::BELONGS_TO, 'MasterType', 'Work_Type_Id'),
            'workBiographies' => array(self::HAS_ONE, 'WorkBiography', 'Work_Id'),
            'workDocumentations' => array(self::HAS_ONE, 'WorkDocumentation', 'Work_Id'),
            'workPublishings' => array(self::HAS_ONE, 'WorkPublishing', 'Work_Id'),
            'workRightholders' => array(self::HAS_MANY, 'WorkRightholder', 'Work_Id'),
            'workSubPublishings' => array(self::HAS_ONE, 'WorkSubPublishing', 'Work_Id'),
            'workSubtitles' => array(self::HAS_MANY, 'WorkSubtitle', 'Work_Id'),
            'createdBy' => array(self::BELONGS_TO, 'User', 'Created_By'),
            'updatedBy' => array(self::BELONGS_TO, 'User', 'Updated_By'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Work_Id' => 'Work',
            'Work_Org_Title' => 'Orginial Title',
            'Work_Language_Id' => 'Language',
            'Work_Internal_Code' => 'Internal Code',
            'Work_Iswc' => 'ISWC Number',
            'Work_Wic_Code' => 'WIC Code',
            'Work_Type_Id' => 'Type',
            'Work_Factor_Id' => 'Factor',
            'Work_Instrumentation' => 'Instrumentation',
            'Work_Duration' => 'Duration',
            'Work_Creation' => 'Year of Creation',
            'Work_Opus_Number' => 'Opus',
            'Active' => 'Active',
            'Created_Date' => 'Created Date',
            'Rowversion' => 'Rowversion',
            'duration_hours' => 'Hours',
            'duration_minutes' => 'Minutes',
            'duration_seconds' => 'Seconds',
            'matchingdetails' => 'Matching Details',
            'Work_Unknown' => 'Unknown',
            'Work_Performer' => 'Performer',
            'Work_Producer' => 'Producer',
            'subtitle_values' => 'Subtitle',
            'duration_values' => 'Duration',
            'right_holder' => 'Right Holder',
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

        $criteria->compare('Work_Id', $this->Work_Id);
        $criteria->compare('Work_Org_Title', $this->Work_Org_Title, true);
        $criteria->compare('Work_Language_Id', $this->Work_Language_Id);
        $criteria->compare('Work_Internal_Code', $this->Work_Internal_Code, true);
        $criteria->compare('Work_Iswc', $this->Work_Iswc, true);
        $criteria->compare('Work_Wic_Code', $this->Work_Wic_Code, true);
        $criteria->compare('Work_Type_Id', $this->Work_Type_Id);
        $criteria->compare('Work_Factor_Id', $this->Work_Factor_Id);
        $criteria->compare('Work_Instrumentation', $this->Work_Instrumentation, true);
        $criteria->compare('Work_Duration', $this->Work_Duration, true);
        $criteria->compare('Work_Creation', $this->Work_Creation, true);
        $criteria->compare('Work_Opus_Number', $this->Work_Opus_Number);
        $criteria->compare('Active', $this->Active, true);
        $criteria->compare('Created_Date', $this->Created_Date, true);
        $criteria->compare('Rowversion', $this->Rowversion, true);

        $criteria->compare('Work_Unknown', $this->Work_Unknown, true);
        $criteria->compare('Work_Performer', $this->Work_Performer, true);
        $criteria->compare('Work_Producer', $this->Work_Producer, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => PAGE_SIZE,
            )
        ));
    }

    public function report() {
        $criteria = new CDbCriteria;

        $criteria->compare('Work_Id', $this->Work_Id);
        $criteria->compare('Work_Org_Title', $this->Work_Org_Title, true);
        $criteria->compare('Work_Language_Id', $this->Work_Language_Id);
        $criteria->compare('Work_Internal_Code', $this->Work_Internal_Code, true);
        $criteria->compare('Work_Iswc', $this->Work_Iswc, true);
        $criteria->compare('Work_Wic_Code', $this->Work_Wic_Code, true);
        $criteria->compare('Work_Type_Id', $this->Work_Type_Id);
        $criteria->compare('Work_Factor_Id', $this->Work_Factor_Id);
        $criteria->compare('Work_Instrumentation', $this->Work_Instrumentation, true);
        $criteria->compare('Work_Duration', $this->Work_Duration, true);
        $criteria->compare('Work_Creation', $this->Work_Creation, true);
        $criteria->compare('Work_Opus_Number', $this->Work_Opus_Number);
        $criteria->compare('Active', $this->Active, true);
        $criteria->compare('Created_Date', $this->Created_Date, true);
        $criteria->compare('Rowversion', $this->Rowversion, true);

        $criteria->compare('Work_Unknown', $this->Work_Unknown, true);
        $criteria->compare('Work_Performer', $this->Work_Performer, true);
        $criteria->compare('Work_Producer', $this->Work_Producer, true);

        if ($this->right_holder) {
            $criteria->with = array('workRightholders.workAuthor', 'workRightholders.workPerformer', 'workRightholders.workPublisher', 'workRightholders.workProducer');
            $criteria->together = true;
            $criteria->compare('workAuthor.Auth_First_Name', $this->right_holder, true, 'OR');
            $criteria->compare('workAuthor.Auth_Sur_Name', $this->right_holder, true, 'OR');
            $criteria->compare('workPerformer.Perf_First_Name', $this->right_holder, true, 'OR');
            $criteria->compare('workPerformer.Perf_Sur_Name', $this->right_holder, true, 'OR');
            $criteria->compare('workPublisher.Pub_Corporate_Name', $this->right_holder, true, 'OR');
            $criteria->compare('workProducer.Pro_Corporate_Name', $this->right_holder, true, 'OR');
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
     * @return Work the static model class
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
        $this->Work_Duration = $this->duration_hours . ':' . $this->duration_minutes . ':' . $this->duration_seconds;
        if (isset($this->Work_Instrumentation) && is_array($this->Work_Instrumentation)) {
            $this->Work_Instrumentation = !empty($this->Work_Instrumentation) ? json_encode($this->Work_Instrumentation) : '';
        } else {
            $this->Work_Instrumentation = '';
        }

        return parent::beforeValidate();
    }

    protected function afterSave() {
        if ($this->isNewRecord) {
            InternalcodeGenerate::model()->codeIncreament(InternalcodeGenerate::WORK_CODE);
        }
        return parent::afterSave();
    }

    public function setDuration() {
        $time = explode(':', $this->Work_Duration);
        $this->duration_hours = $time[0];
        $this->duration_minutes = $time[1];
        $this->duration_seconds = $time[2];
    }

    public function getInstrumentlist() {
        $inst = array();
        $instruments = CHtml::listData(MasterInstrument::model()->findAll(), 'Master_Inst_Id', 'Instrument_Name');
        $exp = json_decode($this->Work_Instrumentation);
        if ($exp != NULL) {
            foreach ($exp as $ex) {
                $inst[$ex] = $instruments[$ex];
            }
        }
        return implode(', ', $inst);
    }

    public function getInstrumentselected() {
        $selected = array();
        if ($this->Work_Instrumentation) {
            $exp = json_decode($this->Work_Instrumentation);
            foreach ($exp as $ex) {
                $selected[$ex] = array('selected' => 'selected');
            }
        }
        return $selected;
    }

    public function getMatchingdetails($work_id = NULL) {
        $work = self::model()->with('workRightholders', 'workSubtitles')->findByAttributes(array('Work_Id' => $work_id));
        $column = '';
        foreach ($work->workSubtitles as $key => $subtitle) {
            $name = $subtitle->Work_Subtitle_Name;
            $column .= $key == 0 ? "Subtitle - $name" : " , {$name}";
        }
        if ($work->workSubtitles)
            $column .= "<br />";
        $time = explode(':', $work->Work_Duration);
        $column .= "Duration - $time[0]' $time[1]'' <br />";
        $column .= "Type - {$work->workType->Type_Name}, Documentary Status - {$work->workDocumentations->workDocStatus->Document_Sts_Name}";

        if ($work->workRightholders) {
            $column .= "<br /><br />";
            $column .= "<table border = '1' class='match_det_table'><thead><th width='50%'>Right Holders</th><th>Role</th><th>Performance/Broadcast</th><th>Mechanical</th></thead><tbody>";
            //Author
            foreach ($work->workRightholders as $key => $rightholder) {
                if ($rightholder->workAuthor) {
                    $column .= '<tr>';
                    $column .= "<td>{$rightholder->workAuthor->fullname}</td>";
                    $column .= "<td>{$rightholder->workRightRole->Type_Rights_Code}</td>";
//                    $shares = number_format((($rightholder->Work_Right_Broad_Share + $rightholder->Work_Right_Mech_Share) / 2), 2, '.', '');
                    $column .= "<td>{$rightholder->Work_Right_Broad_Share} %</td>";
                    $column .= "<td>{$rightholder->Work_Right_Mech_Share} %</td>";
                    $column .= '</tr>';
                }
            }
            $main_publisher = (new WorkRightholder)->getMainPublisher($work_id);
            //Main Publisher
            foreach ($work->workRightholders as $key => $rightholder) {
                if ($rightholder->workPublisher && $main_publisher->Work_Member_GUID == $rightholder->workPublisher->Pub_GUID) {
                    $column .= '<tr>';
                    $column .= "<td>{$rightholder->workPublisher->Pub_Corporate_Name}</td>";
                    $column .= "<td>{$rightholder->workRightRole->Type_Rights_Code}</td>";
//                    $shares = number_format((($rightholder->Work_Right_Broad_Share + $rightholder->Work_Right_Mech_Share) / 2), 2, '.', '');
                    $column .= "<td>{$rightholder->Work_Right_Broad_Share} %</td>";
                    $column .= "<td>{$rightholder->Work_Right_Mech_Share} %</td>";
                    $column .= '</tr>';
                }
            }
            //Sub Publisher
            foreach ($work->workRightholders as $key => $rightholder) {
                if ($rightholder->workPublisher && $main_publisher->Work_Member_GUID != $rightholder->workPublisher->Pub_GUID) {
                    $column .= '<tr>';
                    $column .= "<td>{$rightholder->workPublisher->Pub_Corporate_Name}</td>";
                    $column .= "<td>{$rightholder->workRightRole->Type_Rights_Code}</td>";
//                    $shares = number_format((($rightholder->Work_Right_Broad_Share + $rightholder->Work_Right_Mech_Share) / 2), 2, '.', '');
                    $column .= "<td>{$rightholder->Work_Right_Broad_Share} %</td>";
                    $column .= "<td>{$rightholder->Work_Right_Mech_Share} %</td>";
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
        return implode(",", CHtml::listData($this->workSubtitles, 'Work_Subtitle_Id', 'Work_Subtitle_Name'));
    }

    protected function getDuration_values() {
        $time = explode(':', $this->Work_Duration);
        return "$time[0]' $time[1]''";
    }

    protected function getRh_grid() {
        $result = 'NIL';
        $rh = Work::model()->findByPk($this->Work_Id)->workRightholders;
        if ($rh) {
            $res = '';
            foreach ($rh as $key => $member) {
                if ($member->workAuthor) {
                    $name = $member->workAuthor->fullname;
                    $internal_code = $member->workAuthor->Auth_Internal_Code;
                } elseif ($member->workPublisher) {
                    $name = $member->workPublisher->Pub_Corporate_Name;
                    $internal_code = $member->workPublisher->Pub_Internal_Code;
                } elseif ($member->workPerformer) {
                    $name = $member->workPerformer->fullname;
                    $internal_code = $member->workPerformer->Perf_Internal_Code;
                } elseif ($member->workProducer) {
                    $name = $member->workProducer->Pro_Corporate_Name;
                    $internal_code = $member->workProducer->Pro_Internal_Code;
                }

                $res .= "<tr><td>{$name}</td><td>{$internal_code}</td></tr>";
            }
            $result = "<table border = '1' class='match_det_table'><thead><tr><th width='50%'>Name</th><th>Internal Code</th></tr></thead><tbody>{$res}</tbody></table>";
        }

        return $result;
    }

}
