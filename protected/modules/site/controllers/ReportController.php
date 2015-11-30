<?php

class ReportController extends Controller {

    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('grpmember', 'report'),
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

    public function actionReport($xml) {
        $reportico = Yii::app()->getModule('reportico');
        $engine = $reportico->getReporticoEngine();
        $reportico->engine->initial_execute_mode = "PREPARE";
        $reportico->engine->initial_report = "$xml.xml";
        $reportico->engine->access_mode = "ONEREPORT";
        $reportico->engine->initial_project = "WIPOCOS";
        $reportico->engine->clear_reportico_session = true;
        $reportico->engine->output_template_parameters["show_hide_prepare_page_style"] = "hide";
        $reportico->engine->output_template_parameters["show_hide_prepare_section_boxes"] = "hide";
        $reportico->generate();
    }

}
