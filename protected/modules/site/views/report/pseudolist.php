<?php
/* @var $this WorkController */
/* @var $dataProvider CActiveDataProvider */

$this->title = $title;
$this->breadcrumbs = array(
    'Report',
);
$cs = Yii::app()->getClientScript();
$themeUrl = $this->themeUrl;

if (!$export) {
    ?>
    <div class="col-lg-12 col-md-12" id="advance-search-block">
        <div class="row mb10" id="advance-search-label">
            <?php echo CHtml::link('<i class="fa fa-angle-right"></i> Show Advance Search', 'javascript:void(0);', array('class' => 'pull-right')); ?>    </div>
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
                                <?php echo $form->labelEx($model, 'Auth_Pseudo_Type_Id', array('class' => 'control-label')); ?>
                                <?php $psedonyms = Myclass::getMasterPseudonym(); ?>
                                <?php echo $form->dropDownList($model, 'Auth_Pseudo_Type_Id', $psedonyms, array('class' => 'form-control', 'prompt' => '')); ?>
                                <?php echo $form->error($model, 'Auth_Pseudo_Type_Id'); ?>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'Auth_Pseudo_Name', array('class' => 'control-label')); ?>
                                <?php echo $form->textField($model, 'Auth_Pseudo_Name', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
                                <?php echo $form->error($model, 'Auth_Pseudo_Name'); ?>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2">
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
            $report_column = array(
                array('header' => 'Pseudo Type', 'name' => 'reportPseudoType'),
                array('header' => 'Pseudo Name', 'name' => 'reportPseudoName'),
                array('header' => 'Member Name', 'name' => 'reportPseudoMemName'),
                array('header' => 'Internal Code', 'name' => 'reportPseudoMemCode'),
                array('header' => 'Memeber Type', 'name' => 'reportPseudoRole'),
            );

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
                'dataProvider' => $searchModel->report(),
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