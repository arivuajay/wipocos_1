<?php
/* @var $this DistributionsubclassController */
/* @var $dataProvider CActiveDataProvider */

$this->title = 'Sub-Classes';
$this->breadcrumbs = array(
    'Sub-Classes',
);
$themeUrl = $this->themeUrl;
$cs = Yii::app()->getClientScript();
$cs_pos_end = CClientScript::POS_END;

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
                        'action' => array('/site/distributionsubclass/index'),
                        'htmlOptions' => array('role' => 'form')
                    ));
                    $class = DistributionClass::classList();
                    $measurings = DistributionSubclass::measuringUnitList();
                    $calcs = DistributionSubclass::calculatingUnitList();
                    $dists = DistributionSubclass::distributionParameters();
                    ?>

                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Class_Id', array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Class_Id', $class, array('class' => 'form-control', 'prompt' => '')); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Subclass_Code', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Subclass_Code', array('class' => 'form-control', 'size' => 30, 'maxlength' => 30)); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Subclass_Name', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Subclass_Name', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Subclass_Measure_Unit', array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Subclass_Measure_Unit', $measurings, array('class' => 'form-control', 'prompt' => '')); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Subclass_Calc_Unit', array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Subclass_Calc_Unit', $calcs, array('class' => 'form-control', 'prompt' => '')); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Subclass_Dist_Params', array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Subclass_Dist_Params', $dists, array('class' => 'form-control', 'prompt' => '')); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Subclass_Admin_Cost', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Subclass_Admin_Cost', array('class' => 'form-control', 'size' => 10, 'maxlength' => 10)); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Subclass_Social_Deduct', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Subclass_Social_Deduct', array('class' => 'form-control', 'size' => 10, 'maxlength' => 10)); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Subclass_Cultural_Deduct', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Subclass_Cultural_Deduct', array('class' => 'form-control', 'size' => 10, 'maxlength' => 10)); ?>
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
            'Subclass_Internal_Code',
            array(
                'name' => 'Class_Id',
                'value' => '$data->class->Class_Name'
            ),
            'Subclass_Code',
            'Subclass_Name',
            array(
                'name' => 'Subclass_Measure_Unit',
                'value' => function ($data) use ($model) {
                    echo $model->measuringUnitList($data->Subclass_Measure_Unit);
                }
            ),
            array(
                'name' => 'Subclass_Calc_Unit',
                'value' => function ($data) use ($model) {
                    echo $model->calculatingUnitList($data->Subclass_Calc_Unit);
                }
            ),
            array(
                'name' => 'Subclass_Dist_Params',
                'value' => function ($data) use ($model) {
                    echo $model->distributionParameters($data->Subclass_Dist_Params);
                }
            ),
            /*
              'Subclass_Admin_Cost',
              'Subclass_Social_Deduct',
              'Subclass_Cultural_Deduct',
             */
            array(
                'header' => 'Actions',
                'class' => 'application.components.MyActionButtonColumn',
                'htmlOptions' => array('style' => 'width: 180px;;text-align:center', 'vAlign' => 'middle', 'class' => 'action_column'),
                'template' => '{view}{update}{delete}',
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
            'label' => 'Create Sub-Class',
            'icon' => 'fa fa-plus',
            'url' => array('/site/distributionsubclass/create'),
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
            'Subclass_Internal_Code',
            array(
                'name' => 'Class_Id',
                'value' => '$data->class->Class_Name'
            ),
            'Subclass_Code',
            'Subclass_Name',
            array(
                'name' => 'Subclass_Measure_Unit',
                'value' => function ($data) use ($model) {
                    echo $model->measuringUnitList($data->Subclass_Measure_Unit);
                }
            ),
            array(
                'name' => 'Subclass_Calc_Unit',
                'value' => function ($data) use ($model) {
                    echo $model->calculatingUnitList($data->Subclass_Calc_Unit);
                }
            ),
            array(
                'name' => 'Subclass_Dist_Params',
                'value' => function ($data) use ($model) {
                    echo $model->distributionParameters($data->Subclass_Dist_Params);
                }
            ),
            /*
              'Subclass_Admin_Cost',
              'Subclass_Social_Deduct',
              'Subclass_Cultural_Deduct',
             */
            array(
                'header' => 'Actions',
                'class' => 'application.components.MyActionButtonColumn',
                'htmlOptions' => array('style' => 'width: 180px;;text-align:center', 'vAlign' => 'middle', 'class' => 'action_column'),
                'template' => '{view}{update}{delete}',
            )
        );

        $this->widget('booster.widgets.TbExtendedGridView', array(
            'type' => 'striped bordered datatable',
            'dataProvider' => $model->dataProvider(),
            'responsiveTable' => true,
            'template' => '<div class="panel panel-primary"><div class="panel-heading"><div class="pull-right">{summary}</div><h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  Sub-Classes</h3></div><div class="panel-body">{items}{pager}</div></div>',
            'columns' => $gridColumns
                )
        );
        ?>
    </div>
</div>