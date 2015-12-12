<?php
/* @var $this WorkController */
/* @var $dataProvider CActiveDataProvider */

$this->title = 'Membership expiry list';
$this->breadcrumbs = array(
    'Report',
);
$cs = Yii::app()->getClientScript();
$themeUrl = $this->themeUrl;

if (!$export) {
    $countries = Myclass::getMasterCountry();
    $languages = Myclass::getMasterLanguage();
    $legal_forms = Myclass::getMasterLegalForm();
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
                            'htmlOptions' => array('role' => 'form')
                        ));
                        ?>

                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <?php echo CHtml::label('Name', '', array('class' => ' control-label')); ?>
                                <?php echo $form->textField($searchModel, 'Auth_Sur_Name', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
                                <?php echo $form->error($searchModel, 'Auth_Sur_Name'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($searchModel, 'Auth_Internal_Code', array('class' => ' control-label')); ?>
                                <?php echo $form->textField($searchModel, 'Auth_Internal_Code', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                                <?php echo $form->error($searchModel, 'Auth_Internal_Code'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <?php echo $form->labelEx($searchModel, 'By_Period', array('class' => ' control-label')); ?>
                            <div class="row">
                                <div class="col-lg-5 col-md-5">
                                    <?php echo $form->textField($searchModel, 'By_Period_From', array('class' => 'form-control date')); ?>
                                </div>
                                <div class="col-lg-2 col-md-2">-</div>
                                <div class="col-lg-5 col-md-5">
                                    <?php echo $form->textField($searchModel, 'By_Period_To', array('class' => 'form-control date')); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8">
                            <div class="form-group">
                                <?php echo $form->labelEx($searchModel, 'report_search_by', array('class' => ' control-label')); ?>
                                <?php echo $form->checkBoxList($searchModel, 'report_search_by', array('A' => 'Author', 'P' => 'Performer', 'PU' => 'Publisher', 'PR' => 'Producer'), array('class' => 'form-control', 'size' => 60, 'maxlength' => 255, 'separator' => '&nbsp;&nbsp;&nbsp;')); ?>
                                <?php echo $form->error($searchModel, 'report_search_by'); ?>
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
            $report_column = array(array('header' => 'Internal Code', 'name' => 'reportInternalCode'), array('header' => 'Name', 'name' => 'reportFullName'), array('header' => 'Start of Mandate (DOJ)', 'name' => 'reportStartmandt', 'htmlOptions' => array('class' => 'text-center')), array('header' => 'End of Mandate (DOE)', 'name' => 'reportEndmandt', 'htmlOptions' => array('class' => 'text-center')), array('header' => 'Member Type', 'name' => 'reportMembertype', 'htmlOptions' => array('class' => 'text-center')));

//            $export_btn = $this->renderExportGridButton('group-base-grid', '<i class="fa fa-file-excel-o"></i> CSV', array('class' => 'btn btn-xs btn-danger')) . "&nbsp;&nbsp;";
            $export_btn .= CHtml::link('<i class="fa fa-file-pdf-o"></i> PDF', Yii::app()->request->requestUri . '&export=print', array('class' => 'btn btn-xs btn-danger', 'target' => '_blank'));

            if (!$export)
                $template = "<div class='panel'><div class='panel-heading'><div class='row'><div class='col-sm-6'>&nbsp;</div><div class='col-sm-6 text-right'>{$export_btn} &nbsp; {summary}</div><br />{$head_title}</div></div>\n<div class='panel-body'>{items}\n{pager}</div></div>";
            else
                $template = "{items}";

            $this->widget('booster.widgets.TbExtendedGridView', array(
                'id' => 'members-base-grid',
                'type' => 'bordered',
                'itemsCssClass' => 'print-table',
                'summaryCssClass' => 'inline',
                'enableSorting' => false,
                'dataProvider' => $searchModel->memberReport(),
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