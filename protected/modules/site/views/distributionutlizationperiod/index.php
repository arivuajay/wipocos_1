<?php
/* @var $this DistributionutlizationperiodController */
/* @var $dataProvider CActiveDataProvider */

$this->title = 'Utilization Periods';
$this->breadcrumbs = array(
    'Utilization Periods',
);
$themeUrl = $this->themeUrl;
$cs = Yii::app()->getClientScript();
$cs_pos_end = CClientScript::POS_END;

$cs->registerCssFile($themeUrl . '/css/datepicker/datepicker3.css');
$cs->registerScriptFile($themeUrl . '/js/datepicker/bootstrap-datepicker.js', $cs_pos_end);
$cs->registerScriptFile($themeUrl . '/js/datatables/jquery.dataTables.js', $cs_pos_end);
$cs->registerScriptFile($themeUrl . '/js/datatables/dataTables.bootstrap.js', $cs_pos_end);
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
                        'action' => array('/site/distributionutlizationperiod/index'),
                        'htmlOptions' => array('role' => 'form')
                    ));
                    $classes = DistributionSubclass::classList();

                    $settings = DistributionSetting::settingList();
                    ?>

                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Period_Internal_Code', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Period_Internal_Code', array('class' => 'form-control', 'size' => 4, 'maxlength' => 4)); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Period_Year', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Period_Year', array('class' => 'form-control', 'size' => 4, 'maxlength' => 4)); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 hide">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Period_Number', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Period_Number', array('class' => 'form-control')); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Period_From', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Period_From', array('class' => 'form-control date')); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Period_To', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Period_To', array('class' => 'form-control date')); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Sub_Class_Id', array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Sub_Class_Id', $classes, array('class' => 'form-control', 'prompt' => '')); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Setting_Id', array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Setting_Id', $settings, array('class' => 'form-control', 'prompt' => '')); ?>
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

<?php if ($search) { ?>
    <div class="col-lg-12 col-md-12">
        <div class="row">
            <?php
            $gridColumns = array(
                'Period_Internal_Code',
                'Period_Year',
                'Period_Number',
                'Period_From',
                'Period_To',
                array(
                    'name' => 'Sub_Class_Id',
                    'value' => '$data->subclass->Subclass_Name'
                ),
                array(
                    'name' => 'Setting_Id',
                    'value' => '$data->setting->Setting_Date'
                ),
                array(
                    'header' => 'Actions',
                    'class' => 'application.components.MyActionButtonColumn',
                    'htmlOptions' => array('style' => 'width: 180px;;text-align:center', 'vAlign' => 'middle', 'class' => 'action_column'),
                    'template' => '{addLog}{import}{calc}{view}{update}{delete}',
                    'buttons' => array(
                        'addLog' => array(//the name {reply} must be same
                            'label' => '<i class="fa fa-newspaper-o"></i>',
                            'options' => array(
                                'title' => 'Add Logsheet',
                            ),
                            'url' => 'CHtml::normalizeUrl(array("/site/distributionlogsheet/logsheet/id/".rawurlencode($data->Period_Id)))',
//                        'visible' => 'UserIdentity::checkPrivilages(rawurlencode($data->roleMdl->Rank))'
                        ),
                        'import' => array(//the name {reply} must be same
                            'label' => '<i class="fa fa-upload"></i>',
                            'options' => array(
                                'title' => 'Import Logsheet',
                            ),
                            'url' => 'CHtml::normalizeUrl(array("/site/distributionlogsheet/import/id/".rawurlencode($data->Period_Id)))',
//                        'visible' => 'UserIdentity::checkPrivilages(rawurlencode($data->roleMdl->Rank))'
                        ),
                        'calc' => array(//the name {reply} must be same
                            'label' => '<i class="fa fa-calculator"></i>',
                            'options' => array(
                                'title' => 'Share Calculation',
                            ),
                            'url' => 'CHtml::normalizeUrl(array("/site/distributionlogsheet/sharecalc/id/".rawurlencode($data->Period_Id)))',
                            'visible' => 'DistributionLogsheet::logExists(rawurlencode($data->Period_Id))'
                        ),
                    )
                )
            );

            $this->widget('booster.widgets.TbExtendedGridView', array(
                'type' => 'striped bordered',
                'dataProvider' => $searchModel->search(),
                'responsiveTable' => true,
                'template' => "<div class='panel panel-primary'><div class='panel-heading'><div class='pull-right'>{summary}</div><h3 class='panel-title'><i class='glyphicon glyphicon-search'></i> Search Results</h3></div>\n<div class='panel-body'>{items}\n{pager}</div></div>",
                'columns' => $gridColumns
                    )
            );
            ?>
        </div>
    </div>
<?php } ?>

<div class="col-lg-12 col-md-12">
    <div class="row">
        <div class="col-lg-4 col-md-4 row">
            <div class="form-group">
                <label class="control-label">Spotlight Search: </label>
                <input type="text" class="form-control inline" name="base_table_search" id="base_table_search" />
            </div>
        </div>
        <?php
        $this->widget(
                'application.components.MyTbButton', array(
            'label' => 'Create Utilization Period',
            'icon' => 'fa fa-plus',
            'url' => array('/site/distributionutlizationperiod/create'),
            'buttonType' => 'link',
            'context' => 'success',
            'htmlOptions' => array('class' => 'pull-right'),
                )
        );
        ?>
    </div>
</div>

<div class="col-lg-12 col-md-12">
    <div class="row">
        <?php
        $gridColumns = array(
            'Period_Internal_Code',
            'Period_Year',
            'Period_Number',
            'Period_From',
            'Period_To',
            array(
                'name' => 'Sub_Class_Id',
                'value' => '$data->subclass->Subclass_Name'
            ),
            array(
                'name' => 'Setting_Id',
                'value' => '$data->setting->Setting_Date'
            ),
            array(
                'header' => 'Actions',
                'class' => 'application.components.MyActionButtonColumn',
                'htmlOptions' => array('style' => 'width: 180px;;text-align:center', 'vAlign' => 'middle', 'class' => 'action_column'),
                'template' => '{addLog}{import}{calc}{view}{update}{delete}',
                'buttons' => array(
                    'addLog' => array(//the name {reply} must be same
                        'label' => '<i class="fa fa-newspaper-o"></i>',
                        'options' => array(
                            'title' => 'Add Logsheet',
                        ),
                        'url' => 'CHtml::normalizeUrl(array("/site/distributionlogsheet/logsheet/id/".rawurlencode($data->Period_Id)))',
//                        'visible' => 'UserIdentity::checkPrivilages(rawurlencode($data->roleMdl->Rank))'
                    ),
                    'import' => array(//the name {reply} must be same
                        'label' => '<i class="fa fa-upload"></i>',
                        'options' => array(
                            'title' => 'Import Logsheet',
                        ),
                        'url' => 'CHtml::normalizeUrl(array("/site/distributionlogsheet/import/id/".rawurlencode($data->Period_Id)))',
//                        'visible' => 'UserIdentity::checkPrivilages(rawurlencode($data->roleMdl->Rank))'
                    ),
                    'calc' => array(//the name {reply} must be same
                        'label' => '<i class="fa fa-calculator"></i>',
                        'options' => array(
                            'title' => 'Share Calculation',
                        ),
                        'url' => 'CHtml::normalizeUrl(array("/site/distributionlogsheet/sharecalc/id/".rawurlencode($data->Period_Id)))',
                        'visible' => 'DistributionLogsheet::logExists(rawurlencode($data->Period_Id))'
                    ),
                )
            )
        );

        $this->widget('booster.widgets.TbExtendedGridView', array(
            'type' => 'striped bordered datatable',
            'dataProvider' => $model->dataProvider(),
            'responsiveTable' => true,
            'template' => '<div class="panel panel-primary"><div class="panel-heading"><div class="pull-right">{summary}</div><h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  Utilization Periods</h3></div><div class="panel-body">{items}{pager}</div></div>',
            'columns' => $gridColumns
                )
        );
        ?>
    </div>
</div>
<?php
$js = <<< EOD
    $(document).ready(function(){
        $('.date').datepicker({ format: 'yyyy-mm-dd' });
    });
EOD;
Yii::app()->clientScript->registerScript('_form', $js);
?>