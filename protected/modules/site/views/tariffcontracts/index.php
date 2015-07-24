<?php
/* @var $this TariffcontractsController */
/* @var $dataProvider CActiveDataProvider */

$this->title='Tariff Contracts';
$this->breadcrumbs=array(
	'Tariff Contracts',
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
                    <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'search-form',
	'method'=>'get',
        'action' => array('/site/tariffcontracts/index'),
        'htmlOptions' => array('role' => 'form')
)); ?>

                                         <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Tarf_Cont_GUID',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Tarf_Cont_GUID',array('class'=>'form-control','size'=>40,'maxlength'=>40)); ?>
                            <?php echo $form->error($searchModel,'Tarf_Cont_GUID'); ?>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Tarf_Cont_Internal_Code',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Tarf_Cont_Internal_Code',array('class'=>'form-control','size'=>50,'maxlength'=>50)); ?>
                            <?php echo $form->error($searchModel,'Tarf_Cont_Internal_Code'); ?>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Tarf_Cont_City_Id',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Tarf_Cont_City_Id',array('class'=>'form-control')); ?>
                            <?php echo $form->error($searchModel,'Tarf_Cont_City_Id'); ?>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Tarf_Cont_District',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Tarf_Cont_District',array('class'=>'form-control','size'=>60,'maxlength'=>100)); ?>
                            <?php echo $form->error($searchModel,'Tarf_Cont_District'); ?>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Tarf_Cont_Area',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Tarf_Cont_Area',array('class'=>'form-control','size'=>60,'maxlength'=>100)); ?>
                            <?php echo $form->error($searchModel,'Tarf_Cont_Area'); ?>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Tarf_Cont_Tariff_Id',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Tarf_Cont_Tariff_Id',array('class'=>'form-control')); ?>
                            <?php echo $form->error($searchModel,'Tarf_Cont_Tariff_Id'); ?>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Tarf_Cont_Insp_Id',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Tarf_Cont_Insp_Id',array('class'=>'form-control')); ?>
                            <?php echo $form->error($searchModel,'Tarf_Cont_Insp_Id'); ?>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Tarf_Cont_Balance',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Tarf_Cont_Balance',array('class'=>'form-control','size'=>10,'maxlength'=>10)); ?>
                            <?php echo $form->error($searchModel,'Tarf_Cont_Balance'); ?>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Tarf_Cont_Amt_Pay',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Tarf_Cont_Amt_Pay',array('class'=>'form-control','size'=>10,'maxlength'=>10)); ?>
                            <?php echo $form->error($searchModel,'Tarf_Cont_Amt_Pay'); ?>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Tarf_Cont_From',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Tarf_Cont_From',array('class'=>'form-control')); ?>
                            <?php echo $form->error($searchModel,'Tarf_Cont_From'); ?>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Tarf_Cont_To',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Tarf_Cont_To',array('class'=>'form-control')); ?>
                            <?php echo $form->error($searchModel,'Tarf_Cont_To'); ?>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Tarf_Cont_Sign_Date',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Tarf_Cont_Sign_Date',array('class'=>'form-control')); ?>
                            <?php echo $form->error($searchModel,'Tarf_Cont_Sign_Date'); ?>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Tarf_Cont_Pay_Id',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Tarf_Cont_Pay_Id',array('class'=>'form-control')); ?>
                            <?php echo $form->error($searchModel,'Tarf_Cont_Pay_Id'); ?>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Tarf_Cont_Portion',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Tarf_Cont_Portion',array('class'=>'form-control','size'=>10,'maxlength'=>10)); ?>
                            <?php echo $form->error($searchModel,'Tarf_Cont_Portion'); ?>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Tarf_Cont_Comment',  array('class' => ' control-label')); ?>
                            <?php echo $form->textArea($searchModel,'Tarf_Cont_Comment',array('class'=>'form-control','rows'=>6, 'cols'=>50)); ?>
                            <?php echo $form->error($searchModel,'Tarf_Cont_Comment'); ?>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Tarf_Cont_Event_Place_Id',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Tarf_Cont_Event_Place_Id',array('class'=>'form-control')); ?>
                            <?php echo $form->error($searchModel,'Tarf_Cont_Event_Place_Id'); ?>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Tarf_Cont_Event_Date',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Tarf_Cont_Event_Date',array('class'=>'form-control')); ?>
                            <?php echo $form->error($searchModel,'Tarf_Cont_Event_Date'); ?>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Tarf_Cont_Event_Comment',  array('class' => ' control-label')); ?>
                            <?php echo $form->textArea($searchModel,'Tarf_Cont_Event_Comment',array('class'=>'form-control','rows'=>6, 'cols'=>50)); ?>
                            <?php echo $form->error($searchModel,'Tarf_Cont_Event_Comment'); ?>
                        </div>
                    </div>
                                        <div class="col-lg-2 col-md-2">
                        <div class="form-group">
                            <label>&nbsp;</label>
                            <?php echo CHtml::submitButton('Search', array('class' => 'btn btn-primary form-control')); ?>
                        </div>
                    </div>
                    <?php  $this->endWidget(); ?>
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
		'Tarf_Cont_GUID',
		'Tarf_Cont_Internal_Code',
		'Tarf_Cont_City_Id',
		'Tarf_Cont_District',
		'Tarf_Cont_Area',
		'Tarf_Cont_Tariff_Id',
		/*
		'Tarf_Cont_Insp_Id',
		'Tarf_Cont_Balance',
		'Tarf_Cont_Amt_Pay',
		'Tarf_Cont_From',
		'Tarf_Cont_To',
		'Tarf_Cont_Sign_Date',
		'Tarf_Cont_Pay_Id',
		'Tarf_Cont_Portion',
		'Tarf_Cont_Comment',
		'Tarf_Cont_Event_Place_Id',
		'Tarf_Cont_Event_Date',
		'Tarf_Cont_Event_Comment',
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
        <?php        $this->widget(
                'application.components.MyTbButton', array(
            'label' => 'Create TariffContracts',
            'icon' => 'fa fa-plus',
            'url' => array('/site/tariffcontracts/create'),
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
		'Tarf_Cont_GUID',
		'Tarf_Cont_Internal_Code',
		'Tarf_Cont_City_Id',
		'Tarf_Cont_District',
		'Tarf_Cont_Area',
		'Tarf_Cont_Tariff_Id',
		/*
		'Tarf_Cont_Insp_Id',
		'Tarf_Cont_Balance',
		'Tarf_Cont_Amt_Pay',
		'Tarf_Cont_From',
		'Tarf_Cont_To',
		'Tarf_Cont_Sign_Date',
		'Tarf_Cont_Pay_Id',
		'Tarf_Cont_Portion',
		'Tarf_Cont_Comment',
		'Tarf_Cont_Event_Place_Id',
		'Tarf_Cont_Event_Date',
		'Tarf_Cont_Event_Comment',
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
            'template' => '<div class="panel panel-primary"><div class="panel-heading"><div class="pull-right">{summary}</div><h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  Tariff Contracts</h3></div><div class="panel-body">{items}{pager}</div></div>',
            'columns' => $gridColumns
                )
        );
        ?>
    </div>
</div>