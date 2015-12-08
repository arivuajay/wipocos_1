<?php

class ReportController extends Controller {

    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    public function behaviors() {
        return array(
            'exportableGrid' => array(
                'class' => 'application.components.ExportableGridBehavior',
                'filename' => "Report_" . time() . ".csv",
//                'csvDelimiter' => ',', //i.e. Excel friendly csv delimiter
        ));
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('grpmember', 'report', 'wkrecrh', 'wrkrecrh', 'rhbywrk', 'worksbyrh'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionGrpmember() {
        $this->render('grpmember');
    }

    public function actionWrkrecrh() {
        $this->render('wrkrecrh');
    }

    public function actionRhbywrk() {
        $this->render('rhbywrk');
    }

    public function actionReport($xml) {
        $reportico = Yii::app()->getModule('reportico');
        $engine = $reportico->getReporticoEngine();
        $reportico->engine->allow_debug = true;
        $reportico->engine->initial_execute_mode = "PREPARE";
        $reportico->engine->initial_report = "$xml.xml";
        $reportico->engine->access_mode = "ONEREPORT";
        $reportico->engine->initial_project = "WIPOCOS";
        $reportico->engine->clear_reportico_session = true;
        $reportico->engine->output_template_parameters["show_hide_prepare_page_style"] = "hide";
        $reportico->engine->output_template_parameters["show_hide_prepare_section_boxes"] = "hide";
        $reportico->generate();
    }

    public function actionWorksbyrh() {
        $search = $export = false;
        $model = new Work();
        $searchModel = new Work('search');
        $searchModel->unsetAttributes();  // clear any default values

        if (isset($_GET['Work'])) {
            $search = true;
            $searchModel->attributes = $_GET['Work'];
            $keywords = '';
//            $keywords = $this->searchKeyWords($searchModel);
        }

        if ($this->isExportRequest()) {
            $this->exportCSV(array('Works: '.$keywords), null, false);
            $this->exportCSV($searchModel->search(), array('Work_Org_Title', 'Work_Internal_Code', 'subtitle_values', 'duration_values', 'workType.Type_Name', 'Work_Creation'));
        }

        if (isset($_REQUEST['export']) && $_REQUEST['export'] == 'print') {
            $export = true;
            $mPDF1 = Yii::app()->ePdf->mpdf();
            $mPDF1->WriteHTML($this->renderPartial('worksbyrh', compact('searchModel', 'search', 'model', 'export','keywords'), true, true));
            $mPDF1->Output("Report_" . time() . ".pdf", EYiiPdf::OUTPUT_TO_DOWNLOAD);
        }
        $this->render('worksbyrh', compact('searchModel', 'search', 'model','keywords'));
    }

    protected function searchKeyWords($model) {
        $keys = array_filter($model->attributes);

        if ($keys) {
            foreach ($keys as $k => $val)
                $words[] = $model->getAttributeLabel($k) . " is '$val'";
        } else {
            $words[] = 'ALL';
        }
        return implode($words,' AND ');
    }

    public function actionWkrecrh() {
        if (isset($_REQUEST['sid']) && isset($_REQUEST['st'])) {
            $GUID = $_REQUEST['sid'];
            if ($_REQUEST['st'] == 'W') {
                $workModel = new Work();
                $workDataProvider = new CActiveDataProvider('Work', array(
                    'criteria' => array(
                        'with' => 'workRightholders',
                        'together' => true,
                        'condition' => 'workRightholders.Work_Member_GUID=:GUID',
                        'params' => array(':GUID' => $GUID),
                    ),
                    'pagination' => array(
                        'pageSize' => PAGE_SIZE,
                    ),
                ));
            } elseif ($_REQUEST['st'] == 'R') {
                $recordModel = new Recording();
                $recordDataProvider = new CActiveDataProvider('Recording', array(
                    'criteria' => array(
                        'with' => 'recordingRightholders',
                        'together' => true,
                        'condition' => 'recordingRightholders.Rcd_Member_GUID=:GUID',
                        'params' => array(':GUID' => $GUID),
                    ),
                    'pagination' => array(
                        'pageSize' => PAGE_SIZE,
                    ),
                ));
            }
        }

        $this->render('wkrecrh', compact('workModel', 'workDataProvider', 'recordModel', 'recordDataProvider'));
    }

}
