<?php

/**
 * This is the model class for table "{{distribution_setting}}".
 *
 * The followings are the available columns in table '{{distribution_setting}}':
 * @property integer $Setting_Id
 * @property integer $Setting_Identifier
 * @property string $Setting_Internal_Code
 * @property string $Setting_Date
 * @property string $Total_Distribute
 * @property integer $Closing_Distribute
 * @property string $Created_Date
 * @property string $Rowversion
 * @property integer $Created_By
 * @property integer $Updated_By
 *
 * The followings are the available model relations:
 * @property DistributionUtlizationPeriod[] $distributionUtlizationPeriods
 */
class DistributionSetting extends RActiveRecord {

    public function init() {
        parent::init();
        if ($this->isNewRecord) {
            $this->Setting_Internal_Code = InternalcodeGenerate::model()->find("Gen_User_Type = :type", array(':type' => InternalcodeGenerate::DIST_DATES_CODE))->Fullcode;
        }
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{distribution_setting}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Setting_Date, Setting_Internal_Code', 'required'),
            array('Setting_Internal_Code', 'unique'),
            array('Setting_Identifier, Closing_Distribute, Created_By, Updated_By', 'numerical', 'integerOnly' => true),
            array('Total_Distribute', 'length', 'max' => 10),
            array('Created_Date, Rowversion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Setting_Id, Setting_Internal_Code, Setting_Identifier, Setting_Date, Total_Distribute, Closing_Distribute, Created_Date, Rowversion, Created_By, Updated_By', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'distributionUtlizationPeriods' => array(self::HAS_MANY, 'DistributionUtlizationPeriod', 'Setting_Id'),
            'createdBy' => array(self::BELONGS_TO, 'User', 'Created_By'),
            'updatedBy' => array(self::BELONGS_TO, 'User', 'Updated_By'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Setting_Id' => 'Setting',
            'Setting_Internal_Code' => 'Internal Code',
            'Setting_Identifier' => 'Identifier',
            'Setting_Date' => 'Date',
            'Total_Distribute' => 'Total Distributed',
            'Closing_Distribute' => 'Closing Distribute',
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

        $criteria->compare('Setting_Id', $this->Setting_Id);
        $criteria->compare('Setting_Identifier', $this->Setting_Identifier);
        $criteria->compare('Setting_Internal_Code', $this->Setting_Internal_Code, true);
        $criteria->compare('Setting_Date', $this->Setting_Date, true);
        $criteria->compare('Total_Distribute', $this->Total_Distribute, true);
        $criteria->compare('Closing_Distribute', $this->Closing_Distribute);
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
     * @return DistributionSetting the static model class
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

    public static function settingList($key = NULL) {
        $list = CHtml::listData(self::model()->findAll(), 'Setting_Id', 'namewithidentifier');
        if ($key != NULL)
            return $list[$key];
        return $list;
    }

    protected function afterSave() {
        if ($this->isNewRecord) {
            InternalcodeGenerate::model()->codeIncreament(InternalcodeGenerate::DIST_DATES_CODE);
        }
        return parent::afterSave();
    }

    public function getNameWithIdentifier() {
        return $this->Setting_Internal_Code . ' - ' . $this->Setting_Date;
    }

    public static function setTotalDistributed($logId) {
        $log = DistributionLogsheet::model()->findByPk($logId);
        if (!empty($log) && !empty($log->distributionLogsheetLists)) {
            $total_amt = self::totalDistributionFormula($log);
            $setting_model = DistributionSetting::model()->findByPk($log->period->Setting_Id);
            if (!empty($setting_model)) {
                $setting_model->Total_Distribute = $total_amt;
                $setting_model->save(false);
            }
        }
        return true;
    }

    public static function totalDistributionFormula($log) {
        /* Formula Details
         * ToTDuration = Sum(Di * Ci, Wi) [For all works]C
         * Di = Duraion in Logsheet. ex: 4 min means -> 4
         * Ci = Factor * Coefficient. ex: (4 * 1) = 4
         * ToTDuration =(4*4)*1 = 16 (Factor given in Works Basic Data) (If it is for Recording then by default take 1 as factor to calculate.)
         * AmountToDistribute = AmountPaid - Costs
         * AmountToDistribute = 1000 – (3+1.5+2) Take All statutory deduction costs. ex: (6.5/100)*1000
         * AmountToDistribute = 1000 – [(3+1.5+2)%] => 6.5/100 => 0.065 = 1000 – 65 => 935
         * Unit_Tarif = AmountToDistribute/TotDuration = 935/16 => 58.43
         * WorkAmount = (UnitTarif * Di *Ci)Wi [for each work] = 58.43 * 4 * 4 = 935
         * 
         * Di can be replaced by Ti where Ti is the number of times a work is used or performed while entering the data from the play list (log sheets).
         * The use of Di or Ti will be determined while defining the distribution subclass under which the calculation of royalties will be made.
         * Ti = Frequency in Logsheet
         */
//        $log = DistributionLogsheet::model()->findByPk($logId);
        $totAmount = 0;

        if (!empty($log) && !empty($log->distributionLogsheetLists)) {
            $subclass = $log->period->subclass;
            $measure_unit = $subclass->Subclass_Measure_Unit;
            foreach ($log->distributionLogsheetLists as $key => $list) {
                $Di = $measure_unit == 'F' ? $list->Log_List_Frequency : $list->duration_minutes;
                $Ci = ($list->logListFactor->Factor * $list->Log_List_Coefficient_Id);
                $Wi = $measure_unit == 'F' ? 1 : $list->listWork->workFactor->Factor;

                $ToTDuration = ($Di * $Ci) * $Wi;
                $AmountToDistribute = $AmountPaid = $Costs = $Unit_Tarif = $WorkAmount = 0;

                /* Amount Get through Invoice */
//                $criteria = new CDbCriteria();
//                $criteria->with = 'tarfCont';
//                $criteria->select = 'Sum(Inv_Amount) as Inv_Amount';
//                $criteria->group = 't.Tarf_Cont_Id';
//                $criteria->condition = "tarfCont.Tarf_Cont_User_Id = {$list->log->Log_User_Cust_Id} And t.Inv_Date Between '{$list->log->period->Period_From}' And '{$list->log->period->Period_To}'";
//                $invoice = ContractInvoice::model()->find($criteria);
//                $inv_amt = $invoice->Inv_Amount;
                /**/

                /* For Manual Entry */
                $inv_amt = $log->Log_Net_Amount;

                if (!empty($inv_amt)) {
                    $AmountPaid = $inv_amt;

                    $tot_statuary_percent = ($subclass->Subclass_Admin_Cost + $subclass->Subclass_Social_Deduct + $subclass->Subclass_Cultural_Deduct);
                    $Costs = ($tot_statuary_percent / 100) * $AmountPaid;
                    $AmountToDistribute = $AmountPaid - $Costs;
                    if ($AmountToDistribute > 0 && $ToTDuration > 0) {
                        $Unit_Tarif = $AmountToDistribute / $ToTDuration;
                        $WorkAmount = ($Unit_Tarif * $Di * $Ci);

                        self::saveLogListMember($list,$WorkAmount, $measure_unit);

                        $list->Log_List_Unit_Tariff = $Unit_Tarif;
                        $list->Log_List_Work_Amount = $WorkAmount;
                        $list->save(false);
                    }
                }
                $totAmount += $WorkAmount;

//            echo 'Di:  '.$Di.'<br />';
//            echo 'Ci:  '.$Ci.'<br />';
//            echo 'Wi:  '.$Wi.'<br />';
//            echo 'ToTDuration:  '.$ToTDuration.'<br />';
//            echo 'AmountPaid:  '.$AmountPaid.'<br />';
//            echo 'Costs:  '.$Costs.'<br />';
//            echo 'AmountToDistribute:  '.$AmountToDistribute.'<br />';
//            echo 'Unit_Tarif:  '.$Unit_Tarif.'<br />';
//            echo 'WorkAmount:  '.$WorkAmount.'<br />';
//            echo '###End###<br />';
            }
        }
//        exit;
        return $totAmount;
    }

    protected static function saveLogListMember($list,$WorkAmount,$measure_unit) {
        DistributionLogsheetListMembers::model()->deleteAll("Log_List_Id = '{$list->Log_List_Id}'");
        if ($measure_unit == 'D'):
            foreach ($list->listWork->workRightholders as $holder):
                $member = new DistributionLogsheetListMembers();
                $member->Log_Member_Type = 'W';
                $member->Log_List_Id = $list->Log_List_Id;
                $member->Log_Member_GUID = $holder->Work_Member_GUID;
                $member->Log_Share_Broad_Amount = $WorkAmount * ($holder->Work_Right_Broad_Share / 100);
                $member->Log_Share_Mech_Amount = $WorkAmount * ($holder->Work_Right_Mech_Share / 100);

                $member->save(false);
            endforeach;
        elseif($measure_unit == 'F'):
            $totEqShare = $list->listRecording->totalRightholdersEqShare; 
            $totBkShare = $list->listRecording->totalRightholdersBkShare; 
        
            foreach ($list->listRecording->recordingRightholders as $holder):
                $member = new DistributionLogsheetListMembers();
                $member->Log_Member_Type = 'R';
                $member->Log_List_Id = $list->Log_List_Id;
                $member->Log_Member_GUID = $holder->Rcd_Member_GUID;
                $member->Log_Share_Broad_Amount = ($WorkAmount / $totEqShare) * ($holder->Rcd_Right_Equal_Share);
                $member->Log_Share_Mech_Amount = ($WorkAmount / $totBkShare) * ($holder->Rcd_Right_Blank_Share);

                $member->save(false);
            endforeach;
        endif;
    }

}
