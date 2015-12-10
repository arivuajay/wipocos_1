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
                'actions' => array('grpmember', 'report', 'wkrecrh', 'wrkrecrh', 'rhbywrk',
                    'worksbyrh', 'recsbyrh', 'grpmemlist','memberlist','loglist','distbyrh'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionWorksbyrh() {
        $search = $export = false;
        $title = 'List of Works';

        $model = new Work();
        $searchModel = new Work('search');
        $searchModel->unsetAttributes();  // clear any default values

        if (isset($_GET['Work'])) {
            $search = true;
            $searchModel->attributes = $_GET['Work'];
        }

//        if ($this->isExportRequest()) {
//            $this->exportCSV($this->formatHeader('csv', $title), null, false);
//            $this->exportCSV($searchModel->report(), array('Work_Org_Title', 'Work_Internal_Code', 'subtitle_values', 'duration_values', 'workType.Type_Name', 'Work_Creation'));
//        }

        if (isset($_REQUEST['export']) && $_REQUEST['export'] == 'print') {
            $export = true;
            $render = $this->renderPartial('worksbyrh', compact('searchModel', 'search', 'model', 'export'), true, true);
            $this->mPDFRender($title, $render);
        }

        $head_title = $this->formatHeader('pdf', $title);
        $this->render('worksbyrh', compact('searchModel', 'search', 'model','head_title','title'));
    }

    public function actionRecsbyrh() {
        $search = $export = false;
        $title = 'List of Recordings';

        $model = new Recording();
        $searchModel = new Recording('search');
        $searchModel->unsetAttributes();  // clear any default values

        if (isset($_GET['Recording'])) {
            $search = true;
            $searchModel->attributes = $_GET['Recording'];
        }

        if (isset($_REQUEST['export']) && $_REQUEST['export'] == 'print') {
            $export = true;
            $render = $this->renderPartial('recsbyrh', compact('searchModel', 'search', 'model', 'export'), true, true);
            $this->mPDFRender($title, $render);
        }
        $head_title = $this->formatHeader('pdf', $title);
        $this->render('recsbyrh', compact('searchModel', 'search', 'model','head_title','title'));
    }

    public function actionGrpmemlist() {
        $search = $export = false;
        $title = 'List of Groups';

        $model = new Group();
        $searchModel = new Group('search');
        $searchModel->unsetAttributes();  // clear any default values

        if (isset($_GET['Group'])) {
            $search = true;
            $searchModel->attributes = $_GET['Group'];
        }

        if (isset($_REQUEST['export']) && $_REQUEST['export'] == 'print') {
            $export = true;
            $render = $this->renderPartial('grpmemlist', compact('searchModel', 'search', 'model', 'export'), true, true);
            $this->mPDFRender($title, $render);
        }
        $head_title = $this->formatHeader('pdf', $title);
        $this->render('grpmemlist', compact('searchModel', 'search', 'model','head_title','title'));
    }

    public function actionMemberlist() {
        $search = $export = false;
        $title = 'List of Membership expiry list';

        $model = new AuthorAccount();
        $searchModel = new AuthorAccount('search');
        $searchModel->unsetAttributes();  // clear any default values

        if (isset($_GET['AuthorAccount'])) {
            $search = true;
            $searchModel->attributes = $_GET['AuthorAccount'];
        }

        if (isset($_REQUEST['export']) && $_REQUEST['export'] == 'print') {
            $export = true;
            $render = $this->renderPartial('memberlist', compact('searchModel', 'search', 'model', 'export'), true, true);
            $this->mPDFRender($title, $render);
        }

        $head_title = $this->formatHeader('pdf', $title);
        $this->render('memberlist', compact('searchModel', 'search', 'model','head_title','title'));
    }

    public function actionLoglist() {
        $search = $export = false;
        $title = 'Logsheet List';

        $model = new DistributionLogsheetList();
        $searchModel = new DistributionLogsheetList('search');
        $searchModel->unsetAttributes();  // clear any default values

        if (isset($_GET['DistributionLogsheetList'])) {
            $search = true;
            $searchModel->attributes = $_GET['DistributionLogsheetList'];
        }

        if (isset($_REQUEST['export']) && $_REQUEST['export'] == 'print') {
            $export = true;
            $render = $this->renderPartial('loglist', compact('searchModel', 'search', 'model', 'export'), true, true);
            $this->mPDFRender($title, $render);
        }

        $head_title = $this->formatHeader('pdf', $title);
        $this->render('loglist', compact('searchModel', 'search', 'model','head_title','title'));
    }

    public function actionDistbyrh() {
        $search = $export = false;
        $title = 'Distribution list';

        $model = new DistributionSetting();
        $searchModel = new DistributionSetting('search');
        $searchModel->unsetAttributes();  // clear any default values

        if (isset($_GET['DistributionSetting'])) {
            $search = true;
            $searchModel->attributes = $_GET['DistributionSetting'];
        }

        if (isset($_REQUEST['export']) && $_REQUEST['export'] == 'print') {
            $export = true;
            $render = $this->renderPartial('distbyrh', compact('searchModel', 'search', 'model', 'export'), true, true);
            $this->mPDFRender($title, $render);
        }

        $head_title = $this->formatHeader('pdf', $title);
        $this->render('distbyrh', compact('searchModel', 'search', 'model','head_title','title'));
    }


    protected function mPDFRender($header, $render) {
        $mPDF1 = Yii::app()->ePdf->mpdf();
        $mPDF1->SetHtmlHeader($this->formatHeader('pdf', $header));
        $mPDF1->WriteHTML($render);
        $mPDF1->setFooter('{PAGENO}');

        $mPDF1->Output("Report_" . time() . ".pdf", EYiiPdf::OUTPUT_TO_BROWSER);
    }

    protected function formatHeader($format, $title) {
        $soc = Society::model()->findByPk(DEFAULT_SOCIETY_ID);
        $society_name = $soc->Society_Code;
        $society_image = CHtml::image(Yii::app()->baseUrl . "/" . UPLOAD_DIR . $soc->Society_Logo_File, '', array('width' => 75));
        $captured_on = date('Y-m-d H:i:s');

        if ($format == 'csv') {
            $result = array("Society: " . $society_name, '', $title, '', 'Caputerd: ' . $captured_on);
        } else if ($format == 'pdf') {
            $result = "<table width='100%' style='border-bottom: 1px solid #000000;vertical-align: middle; font-family: serif; font-size: 9pt; color: #000088;'><tr><td width='33%'>{$society_image}<span style='vertical-align: middle;'>{$society_name}</span></td><td width='33%' align='center' style='font-weight: bold;font-size: 14pt;'>{$title}</td><td width='33%' style='text-align: right;'>Capture:{$captured_on}</td></tr></table>";
        }

        return $result;
    }




//    protected function searchKeyWords($model) {
//        $keys = array_filter($model->attributes);
//
//        if ($keys) {
//            foreach ($keys as $k => $val)
//                $words[] = $model->getAttributeLabel($k) . " is '$val'";
//        } else {
//            $words[] = 'ALL';
//        }
//        return implode($words, ' AND ');
//    }

//        public function actionGrpmember() {
//        $this->render('grpmember');
//    }
//
//    public function actionWrkrecrh() {
//        $this->render('wrkrecrh');
//    }
//
//    public function actionRhbywrk() {
//        $this->render('rhbywrk');
//    }
//
//    public function actionReport($xml) {
//        $reportico = Yii::app()->getModule('reportico');
//        $engine = $reportico->getReporticoEngine();
//        $reportico->engine->allow_debug = true;
//        $reportico->engine->initial_execute_mode = "PREPARE";
//        $reportico->engine->initial_report = "$xml.xml";
//        $reportico->engine->access_mode = "ONEREPORT";
//        $reportico->engine->initial_project = "WIPOCOS";
//        $reportico->engine->clear_reportico_session = true;
//        $reportico->engine->output_template_parameters["show_hide_prepare_page_style"] = "hide";
//        $reportico->engine->output_template_parameters["show_hide_prepare_section_boxes"] = "hide";
//        $reportico->generate();
//    }
//    public function actionWkrecrh() {
//        if (isset($_REQUEST['sid']) && isset($_REQUEST['st'])) {
//            $GUID = $_REQUEST['sid'];
//            if ($_REQUEST['st'] == 'W') {
//                $workModel = new Work();
//                $workDataProvider = new CActiveDataProvider('Work', array(
//                    'criteria' => array(
//                        'with' => 'workRightholders',
//                        'together' => true,
//                        'condition' => 'workRightholders.Work_Member_GUID=:GUID',
//                        'params' => array(':GUID' => $GUID),
//                    ),
//                    'pagination' => array(
//                        'pageSize' => PAGE_SIZE,
//                    ),
//                ));
//            } elseif ($_REQUEST['st'] == 'R') {
//                $recordModel = new Recording();
//                $recordDataProvider = new CActiveDataProvider('Recording', array(
//                    'criteria' => array(
//                        'with' => 'recordingRightholders',
//                        'together' => true,
//                        'condition' => 'recordingRightholders.Rcd_Member_GUID=:GUID',
//                        'params' => array(':GUID' => $GUID),
//                    ),
//                    'pagination' => array(
//                        'pageSize' => PAGE_SIZE,
//                    ),
//                ));
//            }
//        }
//
//        $this->render('wkrecrh', compact('workModel', 'workDataProvider', 'recordModel', 'recordDataProvider'));
//    }
}
