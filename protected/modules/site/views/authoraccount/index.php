<?php
/* @var $this AuthoraccountController */
/* @var $dataProvider CActiveDataProvider */

$this->title='Author Accounts';
$this->breadcrumbs=array(
	'Author Accounts',
);
$themeUrl = $this->themeUrl;
$cs = Yii::app()->getClientScript();
$cs_pos_end = CClientScript::POS_END;

$cs->registerCssFile($themeUrl . '/css/datepicker/datepicker3.css');
$cs->registerScriptFile($themeUrl . '/js/datepicker/bootstrap-datepicker.js', $cs_pos_end);
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
        'action' => array('/site/authoraccount/index'),
        'htmlOptions' => array('role' => 'form')
)); ?>
                    
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Auth_First_Name',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Auth_First_Name',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
                            <?php echo $form->error($searchModel,'Auth_First_Name'); ?>
                        </div>
                    </div>
                                         <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Auth_Sur_Name',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Auth_Sur_Name',array('class'=>'form-control','size'=>50,'maxlength'=>50)); ?>
                            <?php echo $form->error($searchModel,'Auth_Sur_Name'); ?>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Auth_Internal_Code',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Auth_Internal_Code',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
                            <?php echo $form->error($searchModel,'Auth_Internal_Code'); ?>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Auth_Ipi_Number',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Auth_Ipi_Number',array('class'=>'form-control')); ?>
                            <?php echo $form->error($searchModel,'Auth_Ipi_Number'); ?>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Auth_Ipi_Base_Number',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Auth_Ipi_Base_Number',array('class'=>'form-control')); ?>
                            <?php echo $form->error($searchModel,'Auth_Ipi_Base_Number'); ?>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Auth_Ipn_Number',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Auth_Ipn_Number',array('class'=>'form-control')); ?>
                            <?php echo $form->error($searchModel,'Auth_Ipn_Number'); ?>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Auth_Date_Of_Birth',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Auth_Date_Of_Birth',array('class'=>'form-control date')); ?>
                            <?php echo $form->error($searchModel,'Auth_Date_Of_Birth'); ?>
                        </div>
                    </div>
<!--                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Auth_Place_Of_Birth_Id',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Auth_Place_Of_Birth_Id',array('class'=>'form-control')); ?>
                            <?php echo $form->error($searchModel,'Auth_Place_Of_Birth_Id'); ?>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Auth_Birth_Country_Id',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Auth_Birth_Country_Id',array('class'=>'form-control')); ?>
                            <?php echo $form->error($searchModel,'Auth_Birth_Country_Id'); ?>
                        </div>
                    </div>-->
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Auth_Nationality_Id',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Auth_Nationality_Id',array('class'=>'form-control')); ?>
                            <?php echo $form->error($searchModel,'Auth_Nationality_Id'); ?>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Auth_Language_Id',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Auth_Language_Id',array('class'=>'form-control')); ?>
                            <?php echo $form->error($searchModel,'Auth_Language_Id'); ?>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Auth_Identity_Number',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Auth_Identity_Number',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
                            <?php echo $form->error($searchModel,'Auth_Identity_Number'); ?>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Auth_Marital_Status_Id',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Auth_Marital_Status_Id',array('class'=>'form-control')); ?>
                            <?php echo $form->error($searchModel,'Auth_Marital_Status_Id'); ?>
                        </div>
                    </div>
<!--                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Auth_Spouse_Name',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Auth_Spouse_Name',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
                            <?php echo $form->error($searchModel,'Auth_Spouse_Name'); ?>
                        </div>
                    </div>-->
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Auth_Gender',  array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel,'Auth_Gender',Myclass::getGender(),array('class'=>'form-control','prompt'=>'')); ?>
                            <?php echo $form->error($searchModel,'Auth_Gender'); ?>
                        </div>
                    </div>

                                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Created_Date',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Created_Date',array('class'=>'form-control date')); ?>
                            <?php echo $form->error($searchModel,'Created_Date'); ?>
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
		'Auth_Sur_Name',
		'Auth_First_Name',
		'Auth_Internal_Code',
		'Auth_Ipi_Number',
		'Auth_Ipi_Base_Number',
		'Auth_Ipn_Number',
		/*
		'Auth_Date_Of_Birth',
		'Auth_Place_Of_Birth_Id',
		'Auth_Birth_Country_Id',
		'Auth_Nationality_Id',
		'Auth_Language_Id',
		'Auth_Identity_Number',
		'Auth_Marital_Status_Id',
		'Auth_Spouse_Name',
		'Auth_Gender',
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
        <?php echo CHtml::link('<i class="fa fa-plus"></i>&nbsp;&nbsp;Create AuthorAccount', array('/site/authoraccount/create'), array('class' => 'btn btn-success pull-right')); ?>
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
		'Auth_Sur_Name',
		'Auth_First_Name',
		'Auth_Internal_Code',
		'Auth_Ipi_Number',
		'Auth_Ipi_Base_Number',
		'Auth_Ipn_Number',
		/*
		'Auth_Date_Of_Birth',
		'Auth_Place_Of_Birth_Id',
		'Auth_Birth_Country_Id',
		'Auth_Nationality_Id',
		'Auth_Language_Id',
		'Auth_Identity_Number',
		'Auth_Marital_Status_Id',
		'Auth_Spouse_Name',
		'Auth_Gender',
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
            'template' => '<div class="panel panel-primary"><div class="panel-heading"><div class="pull-right">{summary}</div><h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  Author Accounts</h3></div><div class="panel-body">{items}{pager}</div></div>',
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
Yii::app()->clientScript->registerScript('index', $js);

?>