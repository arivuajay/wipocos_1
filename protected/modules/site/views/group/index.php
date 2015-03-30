<?php
/* @var $this GroupController */
/* @var $dataProvider CActiveDataProvider */

$this->title='Groups';
$this->breadcrumbs=array(
	'Groups',
);
?>
<div class="col-lg-12 col-md-12">
    <div class="row">
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
        'action' => array('/site/group/index'),
        'htmlOptions' => array('role' => 'form')
)); ?>
                    
                                         <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Group_Name',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Group_Name',array('class'=>'form-control','size'=>60,'maxlength'=>100)); ?>
                            <?php echo $form->error($searchModel,'Group_Name'); ?>
                        </div>
                    </div>
                                        
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Group_Internal_Code',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Group_Internal_Code',array('class'=>'form-control','size'=>50,'maxlength'=>50)); ?>
                            <?php echo $form->error($searchModel,'Group_Internal_Code'); ?>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Group_IPI_Name_Number',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Group_IPI_Name_Number',array('class'=>'form-control')); ?>
                            <?php echo $form->error($searchModel,'Group_IPI_Name_Number'); ?>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Group_IPN_Base_Number',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Group_IPN_Base_Number',array('class'=>'form-control')); ?>
                            <?php echo $form->error($searchModel,'Group_IPN_Base_Number'); ?>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Group_IPN_Number',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Group_IPN_Number',array('class'=>'form-control')); ?>
                            <?php echo $form->error($searchModel,'Group_IPN_Number'); ?>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Group_Date',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Group_Date',array('class'=>'form-control')); ?>
                            <?php echo $form->error($searchModel,'Group_Date'); ?>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Group_Place',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Group_Place',array('class'=>'form-control','size'=>60,'maxlength'=>100)); ?>
                            <?php echo $form->error($searchModel,'Group_Place'); ?>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Group_Country_Id',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Group_Country_Id',array('class'=>'form-control')); ?>
                            <?php echo $form->error($searchModel,'Group_Country_Id'); ?>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Group_Legal_Form_Id',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Group_Legal_Form_Id',array('class'=>'form-control')); ?>
                            <?php echo $form->error($searchModel,'Group_Legal_Form_Id'); ?>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Group_Language_Id',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Group_Language_Id',array('class'=>'form-control')); ?>
                            <?php echo $form->error($searchModel,'Group_Language_Id'); ?>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Active',  array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Active', array('0' => 'In-active', '1' => 'Active'), array('prompt' => '', 'class' => 'form-control'));; ?>
                            <?php echo $form->error($searchModel,'Active'); ?>
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
            array(
                'class' => 'IndexColumn',
                'header' => '',
            ),
		'Group_Name',
		'Group_Is_Author',
		'Group_Is_Performer',
		'Group_Internal_Code',
		'Group_IPI_Name_Number',
		'Group_IPN_Base_Number',
		/*
		'Group_IPN_Number',
		'Group_Date',
		'Group_Place',
		'Group_Country_Id',
		'Group_Legal_Form_Id',
		'Group_Language_Id',
		array(
                'name' => 'Active',
                'htmlOptions' => array('style' => 'width: 180px;;text-align:center', 'vAlign' => 'middle'),
                'type' => 'raw',
                'value' => function($data) {
                    echo ($data->Active == 1) ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>';
                },
            ),
		*/
		array(
                'header' => 'Actions',
                'class' => 'booster.widgets.TbButtonColumn',
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
    <div class="row mb10">
        <?php echo CHtml::link('<i class="fa fa-plus"></i>&nbsp;&nbsp;Create Group', array('/site/group/create'), array('class' => 'btn btn-success pull-right')); ?>
    </div>
</div>

<div class="col-lg-12 col-md-12">
    <div class="row">
        <?php 
        $gridColumns = array(
            array(
                'class' => 'IndexColumn',
                'header' => '',
            ),
		'Group_Name',
		'Group_Internal_Code',
		'Group_Date',
		'Group_IPN_Number',
                array(
                'name' => 'Group_Is_Author',
                'htmlOptions' => array('style' => 'width: 180px;;text-align:center', 'vAlign' => 'middle'),
                'type' => 'raw',
                'value' => function($data) {
                echo ($data->Group_Is_Author == 1) ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>';
                },
                ),
                array(
                'name' => 'Group_Is_Performer',
                'htmlOptions' => array('style' => 'width: 180px;;text-align:center', 'vAlign' => 'middle'),
                'type' => 'raw',
                'value' => function($data) {
                echo ($data->Group_Is_Performer == 1) ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>';
                },
                ),
		/*
		'Group_IPN_Number',
		'Group_Date',
		'Group_Place',
		'Group_Country_Id',
		'Group_Legal_Form_Id',
		'Group_Language_Id',
		array(
                'name' => 'Active',
                'htmlOptions' => array('style' => 'width: 180px;;text-align:center', 'vAlign' => 'middle'),
                'type' => 'raw',
                'value' => function($data) {
                    echo ($data->Active == 1) ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>';
                },
            ),
		*/
		array(
                'header' => 'Actions',
                'class' => 'booster.widgets.TbButtonColumn',
                'htmlOptions' => array('style' => 'width: 180px;;text-align:center', 'vAlign' => 'middle', 'class' => 'action_column'),
                'template' => '{view}{update}{delete}',
            )
            );
        
            $this->widget('booster.widgets.TbExtendedGridView', array(
            'type' => 'striped bordered',
            'dataProvider' => $model->dataProvider(),
            'responsiveTable' => true,
            'template' => '<div class="panel panel-primary"><div class="panel-heading"><div class="pull-right">{summary}</div><h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  Groups</h3></div><div class="panel-body">{items}{pager}</div></div>',
            'columns' => $gridColumns
                )
        );
        ?>
    </div>
</div>