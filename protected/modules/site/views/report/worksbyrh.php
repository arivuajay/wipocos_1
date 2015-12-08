<?php
/* @var $this WorkController */
/* @var $dataProvider CActiveDataProvider */

$this->title = 'Works';
$this->breadcrumbs = array(
    'Works',
);
$cs = Yii::app()->getClientScript();
$themeUrl = $this->themeUrl;

if (!$export) {
    $languages = Myclass::getMasterLanguage();
    $types = Myclass::getMasterType();
    $factors = Myclass::getMasterFactor();
    $instruments = Myclass::getMasterInstrument();
    ?>
    <div class="col-lg-12 col-md-12" id="advance-search-block">
        <div class="row mb10" id="advance-search-label">
            <?php echo CHtml::link('<i class="fa fa-angle-right"></i> Show Advance Search', 'javascript:void(0);', array('class' => 'pull-right')); ?>
        </div>
        <div class="row" id="advance-search-form">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="glyphicon glyphicon-search"></i>  Search
                    </h3>
                    <div class="clearfix"></div>
                </div>
                <section class="content">
                    <div class="row">
                        <?php
                        $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'search-form',
                            'method' => 'get',
                            'action' => array('/site/report/worksbyrh'),
                            'htmlOptions' => array('role' => 'form')
                        ));
                        ?>

                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($searchModel, 'Work_Org_Title', array('class' => ' control-label')); ?>
                                <?php echo $form->textField($searchModel, 'Work_Org_Title', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                                <?php echo $form->error($searchModel, 'Work_Org_Title'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($searchModel, 'Work_Language_Id', array('class' => ' control-label')); ?>
                                <?php echo $form->dropDownList($searchModel, 'Work_Language_Id', $languages, array('class' => 'form-control', 'prompt' => '')); ?>
                                <?php echo $form->error($searchModel, 'Work_Language_Id'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($searchModel, 'Work_Internal_Code', array('class' => ' control-label')); ?>
                                <?php echo $form->textField($searchModel, 'Work_Internal_Code', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                                <?php echo $form->error($searchModel, 'Work_Internal_Code'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($searchModel, 'Work_Iswc', array('class' => ' control-label')); ?>
                                <?php echo $form->textField($searchModel, 'Work_Iswc', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                                <?php echo $form->error($searchModel, 'Work_Iswc'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($searchModel, 'Work_Wic_Code', array('class' => ' control-label')); ?>
                                <?php echo $form->textField($searchModel, 'Work_Wic_Code', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                                <?php echo $form->error($searchModel, 'Work_Wic_Code'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($searchModel, 'Work_Type_Id', array('class' => ' control-label')); ?>
                                <?php echo $form->dropDownList($searchModel, 'Work_Type_Id', $types, array('class' => 'form-control', 'prompt' => '')); ?>
                                <?php echo $form->error($searchModel, 'Work_Type_Id'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($searchModel, 'Work_Factor_Id', array('class' => ' control-label')); ?>
                                <?php echo $form->dropDownList($searchModel, 'Work_Factor_Id', $factors, array('class' => 'form-control', 'prompt' => '')); ?>
                                <?php echo $form->error($searchModel, 'Work_Factor_Id'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($searchModel, 'Work_Instrumentation', array('class' => ' control-label')); ?>
                                <?php echo $form->textField($searchModel, 'Work_Instrumentation', array('class' => 'form-control', 'size' => 10, 'maxlength' => 10)); ?>
                                <?php echo $form->error($searchModel, 'Work_Instrumentation'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($searchModel, 'Work_Creation', array('class' => ' control-label')); ?>
                                <?php echo $form->textField($searchModel, 'Work_Creation', array('class' => 'form-control', 'size' => 4, 'maxlength' => 4)); ?>
                                <?php echo $form->error($searchModel, 'Work_Creation'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($searchModel, 'Work_Opus_Number', array('class' => ' control-label')); ?>
                                <?php echo $form->textField($searchModel, 'Work_Opus_Number', array('class' => 'form-control')); ?>
                                <?php echo $form->error($searchModel, 'Work_Opus_Number'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($searchModel, 'Work_Unknown', array('class' => ' control-label')); ?><br />
                                <?php echo $form->dropDownList($searchModel, 'Work_Unknown', array('Y' => 'Yes', 'N' => 'No'), array('class' => 'form-control', 'prompt' => '')); ?>
                                <?php echo $form->error($searchModel, 'Work_Unknown'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($searchModel, 'right_holder', array('class' => ' control-label')); ?><br />
                                <?php echo $form->textField($searchModel, 'right_holder', array('class' => 'form-control')); ?>
                                <?php echo $form->error($searchModel, 'right_holder'); ?>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 pull-right">
                            <div class="form-group">
                                <label>&nbsp;</label>
                                <?php echo CHtml::submitButton('Search', array('class' => 'btn btn-primary form-control')); ?>
                            </div>
                        </div>
                        <?php $this->endWidget(); ?>
                    </div>
                </section>
            </div>
        </div>
    </div>
<?php } if ($search) { ?>
    <div class="col-lg-12 col-md-12">
        <div class="row">
            <?php
            $report_column = array('Work_Org_Title',array('name' => 'Work_Internal_Code','htmlOptions' => array('width'=>150,'class' => 'text-center')), 'subtitle_values', 'duration_values',array('name' => 'workType.Type_Name','header'=>'Type','htmlOptions' => array('class' => 'text-center')),array('name' => 'Work_Creation','htmlOptions' => array('class' => 'text-center')));

            $export_btn = $this->renderExportGridButton('work-base-grid', '<i class="fa fa-file-excel-o"></i> CSV', array('class' => 'btn btn-xs btn-danger'))."&nbsp;&nbsp;";
            $export_btn .= CHtml::link('<i class="fa fa-file-pdf-o"></i> PDF', Yii::app()->request->requestUri . '&export=print',array('class' => 'btn btn-xs btn-danger','target'=>'_blank'));

            if (!$export)
                $template = "<div class='panel panel-primary'><div class='panel-heading'><div class='row'><div class='col-sm-6'><h3 class='panel-title'><i class='glyphicon glyphicon-search'></i> Search Results</h3></div><div class='col-sm-6 text-right'>{$export_btn} &nbsp; {summary}</div></div></div>\n<div class='panel-body'>{items}\n{pager}</div></div>";
            else
                $template = "<h3>Works: {$keywords}</h3>{items}";

            $this->widget('booster.widgets.TbExtendedGridView', array(
                'id' => 'work-base-grid',
                'type' => 'striped bordered',
                'itemsCssClass' => 'print-table',
                'summaryCssClass' => 'inline',
                'enableSorting' => false,
                'dataProvider' => $searchModel->search(false),
                'responsiveTable' => true,
                'template' => $template,
                'columns' => $report_column
                    )
            );
            ?>
        </div>
    </div>
    <?php
    $cs->registerCssFile($themeUrl . '/css/pdf.css');
} else {
    $js = <<< EOD
    $(document).ready(function () {
        $("#advance-search-label a").trigger("click");
    });
EOD;

    $cs->registerScript('_report', $js);
}
?>