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
    $languages = Myclass::getMasterLanguage();
    $types = Myclass::getMasterType();
    $countries = Myclass::getMasterCountry();
    $doc_status = CHtml::listData(MasterDocumentStatus::model()->isActive()->findAll(array('order' => 'Document_Sts_Code')), 'Master_Document_Sts_Id', 'Document_Sts_Name');
    $recording_types = Myclass::getMasterRecordType();
    $labels = Myclass::getMasterLabel();
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
                                <?php echo $form->labelEx($searchModel, 'Rcd_Title', array('class' => ' control-label')); ?>
                                <?php echo $form->textField($searchModel, 'Rcd_Title', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                                <?php echo $form->error($searchModel, 'Rcd_Title'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($searchModel, 'Rcd_Language_Id', array('class' => ' control-label')); ?>
                                <?php echo $form->dropDownList($searchModel, 'Rcd_Language_Id', $languages, array('class' => 'form-control', 'prompt' => '')); ?>
                                <?php echo $form->error($searchModel, 'Rcd_Language_Id'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($searchModel, 'Rcd_Internal_Code', array('class' => ' control-label')); ?>
                                <?php echo $form->textField($searchModel, 'Rcd_Internal_Code', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                                <?php echo $form->error($searchModel, 'Rcd_Internal_Code'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($searchModel, 'Rcd_Type_Id', array('class' => ' control-label')); ?>
                                <?php echo $form->dropDownList($searchModel, 'Rcd_Type_Id', $types, array('class' => 'form-control', 'prompt' => '')); ?>
                                <?php echo $form->error($searchModel, 'Rcd_Type_Id'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($searchModel, 'Rcd_Date', array('class' => ' control-label')); ?>
                                <?php echo $form->textField($searchModel, 'Rcd_Date', array('class' => 'form-control date')); ?>
                                <?php echo $form->error($searchModel, 'Rcd_Date'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($searchModel, 'Rcd_Duration', array('class' => ' control-label')); ?>
                                <?php echo $form->textField($searchModel, 'Rcd_Duration', array('class' => 'form-control')); ?>
                                <?php echo $form->error($searchModel, 'Rcd_Duration'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($searchModel, 'Rcd_Record_Country_id', array('class' => ' control-label')); ?>
                                <?php echo $form->dropDownList($searchModel, 'Rcd_Record_Country_id', $countries, array('class' => 'form-control', 'prompt' => '')); ?>
                                <?php echo $form->error($searchModel, 'Rcd_Record_Country_id'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($searchModel, 'Rcd_Product_Country_Id', array('class' => ' control-label')); ?>
                                <?php echo $form->dropDownList($searchModel, 'Rcd_Product_Country_Id', $countries, array('class' => 'form-control', 'prompt' => '')); ?>
                                <?php echo $form->error($searchModel, 'Rcd_Product_Country_Id'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($searchModel, 'Rcd_Doc_Status_Id', array('class' => ' control-label')); ?>
                                <?php echo $form->dropDownList($searchModel, 'Rcd_Doc_Status_Id', $doc_status, array('class' => 'form-control', 'prompt' => '')); ?>
                                <?php echo $form->error($searchModel, 'Rcd_Doc_Status_Id'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($searchModel, 'Rcd_Record_Type_Id', array('class' => ' control-label')); ?>
                                <?php echo $form->dropDownList($searchModel, 'Rcd_Record_Type_Id', $recording_types, array('class' => 'form-control', 'prompt' => '')); ?>
                                <?php echo $form->error($searchModel, 'Rcd_Record_Type_Id'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($searchModel, 'Rcd_Label_Id', array('class' => ' control-label')); ?>
                                <?php echo $form->dropDownList($searchModel, 'Rcd_Label_Id', $labels, array('class' => 'form-control', 'prompt' => '')); ?>
                                <?php echo $form->error($searchModel, 'Rcd_Label_Id'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($searchModel, 'Rcd_Reference', array('class' => ' control-label')); ?>
                                <?php echo $form->textField($searchModel, 'Rcd_Reference', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                                <?php echo $form->error($searchModel, 'Rcd_Reference'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($searchModel, 'Rcd_File', array('class' => ' control-label')); ?>
                                <?php echo $form->textField($searchModel, 'Rcd_File', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                                <?php echo $form->error($searchModel, 'Rcd_File'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($searchModel, 'Rcd_Isrc_Code', array('class' => ' control-label')); ?>
                                <?php echo $form->textField($searchModel, 'Rcd_Isrc_Code', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                                <?php echo $form->error($searchModel, 'Rcd_Isrc_Code'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($searchModel, 'Rcd_Iswc_Number', array('class' => ' control-label')); ?>
                                <?php echo $form->textField($searchModel, 'Rcd_Iswc_Number', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                                <?php echo $form->error($searchModel, 'Rcd_Iswc_Number'); ?>
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
            $report_column = array('Rcd_Title', array('name' => 'Rcd_Internal_Code', 'htmlOptions' => array('width' => 150, 'class' => 'text-center')), 'subtitle_values',array('header'=>'Right Holder','name' => 'rh_grid','type'=>'raw'), 'duration_values', array('name' => 'rcdType.Type_Name', 'header' => 'Type', 'htmlOptions' => array('class' => 'text-center')), array('name' => 'Rcd_Date', 'htmlOptions' => array('class' => 'text-center')));

//            $export_btn = $this->renderExportGridButton('rec-base-grid', '<i class="fa fa-file-excel-o"></i> CSV', array('class' => 'btn btn-xs btn-danger')) . "&nbsp;&nbsp;";
            $export_btn .= CHtml::link('<i class="fa fa-file-pdf-o"></i> PDF', Yii::app()->request->requestUri . '&export=print', array('class' => 'btn btn-xs btn-danger', 'target' => '_blank'));

            if (!$export)
                $template = "<div class='panel'><div class='panel-heading'><div class='row'><div class='col-sm-6'>&nbsp;</div><div class='col-sm-6 text-right'>{$export_btn} &nbsp; {summary}</div><br />{$head_title}</div></div>\n<div class='panel-body'>{items}\n{pager}</div></div>";
            else
                $template = "{items}";

            $this->widget('booster.widgets.TbExtendedGridView', array(
                'id' => 'rec-base-grid',
                'type' => 'striped bordered',
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