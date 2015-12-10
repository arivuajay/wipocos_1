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
                                <?php echo $form->labelEx($searchModel, 'Group_Name', array('class' => ' control-label')); ?>
                                <?php echo $form->textField($searchModel, 'Group_Name', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                                <?php echo $form->error($searchModel, 'Group_Name'); ?>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($searchModel, 'Group_Internal_Code', array('class' => ' control-label')); ?>
                                <?php echo $form->textField($searchModel, 'Group_Internal_Code', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
                                <?php echo $form->error($searchModel, 'Group_Internal_Code'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($searchModel, 'Group_IPI_Name_Number', array('class' => ' control-label')); ?>
                                <?php echo $form->textField($searchModel, 'Group_IPI_Name_Number', array('class' => 'form-control')); ?>
                                <?php echo $form->error($searchModel, 'Group_IPI_Name_Number'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($searchModel, 'Group_IPN_Base_Number', array('class' => ' control-label')); ?>
                                <?php echo $form->textField($searchModel, 'Group_IPN_Base_Number', array('class' => 'form-control')); ?>
                                <?php echo $form->error($searchModel, 'Group_IPN_Base_Number'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($searchModel, 'Group_IPN_Number', array('class' => ' control-label')); ?>
                                <?php echo $form->textField($searchModel, 'Group_IPN_Number', array('class' => 'form-control')); ?>
                                <?php echo $form->error($searchModel, 'Group_IPN_Number'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($searchModel, 'Group_Date', array('class' => ' control-label')); ?>
                                <?php echo $form->textField($searchModel, 'Group_Date', array('class' => 'form-control date')); ?>
                                <?php echo $form->error($searchModel, 'Group_Date'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($searchModel, 'Group_Place', array('class' => ' control-label')); ?>
                                <?php echo $form->textField($searchModel, 'Group_Place', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                                <?php echo $form->error($searchModel, 'Group_Place'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($searchModel, 'Group_Country_Id', array('class' => ' control-label')); ?>
                                <?php echo $form->dropDownList($searchModel, 'Group_Country_Id', $countries, array('class' => 'form-control', 'prompt' => '')); ?>
                                <?php echo $form->error($searchModel, 'Group_Country_Id'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($searchModel, 'Group_Legal_Form_Id', array('class' => ' control-label')); ?>
                                <?php echo $form->dropDownList($searchModel, 'Group_Legal_Form_Id', $legal_forms, array('class' => 'form-control', 'prompt' => '')); ?>
                                <?php echo $form->error($searchModel, 'Group_Legal_Form_Id'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($searchModel, 'Group_Language_Id', array('class' => ' control-label')); ?>
                                <?php echo $form->dropDownList($searchModel, 'Group_Language_Id', $languages, array('class' => 'form-control', 'prompt' => '')); ?>
                                <?php echo $form->error($searchModel, 'Group_Language_Id'); ?>
                            </div>
                        </div>
                        <?php echo $form->hiddenField($searchModel, 'is_auth_performer', array('class' => 'form-control', 'value' => $role)); ?>
                        <!--                    <div class="col-lg-4 col-md-4">
                                                <div class="form-group">
                        <?php echo $form->labelEx($searchModel, 'is_auth_performer', array('class' => ' control-label')); ?>
                        <?php echo $form->dropDownList($searchModel, 'is_auth_performer', array('A' => 'Author', 'P' => 'Performer'), array('prompt' => '', 'class' => 'form-control')); ?>
                                                </div>
                                            </div>-->
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <?php echo $form->labelEx($searchModel, 'search_status', array('class' => ' control-label')); ?>
                                <?php echo $form->dropDownList($searchModel, 'search_status', Myclass::getSearchStatus(), array('prompt' => '', 'class' => 'form-control')); ?>
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
            $report_column = array(array('header'=>'Group Name','name' => 'reportGroupName'), array('header'=>'Internal Code','name' => 'reportGroupCode', 'htmlOptions' => array('width' => 150, 'class' => 'text-center')), array('header'=>'Date of Foundation','name' => 'reportGroupDate', 'htmlOptions' => array('width' => 150, 'class' => 'text-center')), array('header'=>'Member List','name' => 'group_member_values','type'=>'raw'));

            $export_btn .= CHtml::link('<i class="fa fa-file-pdf-o"></i> PDF', Yii::app()->request->requestUri . '&export=print', array('class' => 'btn btn-xs btn-danger', 'target' => '_blank'));

            if (!$export)
                $template = "<div class='panel'><div class='panel-heading'><div class='row'><div class='col-sm-6'>&nbsp;</div><div class='col-sm-6 text-right'>{$export_btn} &nbsp; {summary}</div><br />{$head_title}</div></div>\n<div class='panel-body'>{items}\n{pager}</div></div>";
            else
                $template = "{items}";

            $this->widget('booster.widgets.TbExtendedGridView', array(
                'id' => 'group-base-grid',
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