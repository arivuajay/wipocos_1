<?php
/* @var $this AuthoraccountaddressController */
/* @var $dataProvider CActiveDataProvider */

$this->title='Author Account Addresses';
$this->breadcrumbs=array(
	'Author Account Addresses',
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
        'action' => array('/site/authoraccountaddress/index'),
        'htmlOptions' => array('role' => 'form')
)); ?>
                    
                                         <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Auth_Acc_Id',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Auth_Acc_Id',array('class'=>'form-control')); ?>
                            <?php echo $form->error($searchModel,'Auth_Acc_Id'); ?>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Auth_Home_Address_1',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Auth_Home_Address_1',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
                            <?php echo $form->error($searchModel,'Auth_Home_Address_1'); ?>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Auth_Home_Address_2',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Auth_Home_Address_2',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
                            <?php echo $form->error($searchModel,'Auth_Home_Address_2'); ?>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Auth_Home_Address_3',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Auth_Home_Address_3',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
                            <?php echo $form->error($searchModel,'Auth_Home_Address_3'); ?>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Auth_Home_Fax',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Auth_Home_Fax',array('class'=>'form-control','size'=>25,'maxlength'=>25)); ?>
                            <?php echo $form->error($searchModel,'Auth_Home_Fax'); ?>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Auth_Home_Telephone',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Auth_Home_Telephone',array('class'=>'form-control','size'=>25,'maxlength'=>25)); ?>
                            <?php echo $form->error($searchModel,'Auth_Home_Telephone'); ?>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Auth_Home_Email',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Auth_Home_Email',array('class'=>'form-control','size'=>50,'maxlength'=>50)); ?>
                            <?php echo $form->error($searchModel,'Auth_Home_Email'); ?>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Auth_Home_Website',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Auth_Home_Website',array('class'=>'form-control','size'=>60,'maxlength'=>100)); ?>
                            <?php echo $form->error($searchModel,'Auth_Home_Website'); ?>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Auth_Mailing_Address_1',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Auth_Mailing_Address_1',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
                            <?php echo $form->error($searchModel,'Auth_Mailing_Address_1'); ?>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Auth_Mailing_Address_2',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Auth_Mailing_Address_2',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
                            <?php echo $form->error($searchModel,'Auth_Mailing_Address_2'); ?>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Auth_Mailing_Address_3',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Auth_Mailing_Address_3',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
                            <?php echo $form->error($searchModel,'Auth_Mailing_Address_3'); ?>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Auth_Mailing_Telephone',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Auth_Mailing_Telephone',array('class'=>'form-control','size'=>25,'maxlength'=>25)); ?>
                            <?php echo $form->error($searchModel,'Auth_Mailing_Telephone'); ?>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Auth_Mailing_Fax',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Auth_Mailing_Fax',array('class'=>'form-control','size'=>25,'maxlength'=>25)); ?>
                            <?php echo $form->error($searchModel,'Auth_Mailing_Fax'); ?>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Auth_Mailing_Email',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Auth_Mailing_Email',array('class'=>'form-control','size'=>50,'maxlength'=>50)); ?>
                            <?php echo $form->error($searchModel,'Auth_Mailing_Email'); ?>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Auth_Mailing_Website',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Auth_Mailing_Website',array('class'=>'form-control','size'=>60,'maxlength'=>100)); ?>
                            <?php echo $form->error($searchModel,'Auth_Mailing_Website'); ?>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Auth_Author_Account_1',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Auth_Author_Account_1',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
                            <?php echo $form->error($searchModel,'Auth_Author_Account_1'); ?>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Auth_Author_Account_2',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Auth_Author_Account_2',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
                            <?php echo $form->error($searchModel,'Auth_Author_Account_2'); ?>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Auth_Author_Account_3',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Auth_Author_Account_3',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
                            <?php echo $form->error($searchModel,'Auth_Author_Account_3'); ?>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Auth_Performer_Account_1',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Auth_Performer_Account_1',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
                            <?php echo $form->error($searchModel,'Auth_Performer_Account_1'); ?>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Auth_Performer_Account_2',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Auth_Performer_Account_2',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
                            <?php echo $form->error($searchModel,'Auth_Performer_Account_2'); ?>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Auth_Performer_Account_3',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Auth_Performer_Account_3',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
                            <?php echo $form->error($searchModel,'Auth_Performer_Account_3'); ?>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel,'Auth_Unknown_Address',  array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel,'Auth_Unknown_Address',array('class'=>'form-control','size'=>1,'maxlength'=>1)); ?>
                            <?php echo $form->error($searchModel,'Auth_Unknown_Address'); ?>
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
		'Auth_Acc_Id',
		'Auth_Home_Address_1',
		'Auth_Home_Address_2',
		'Auth_Home_Address_3',
		'Auth_Home_Fax',
		'Auth_Home_Telephone',
		/*
		'Auth_Home_Email',
		'Auth_Home_Website',
		'Auth_Mailing_Address_1',
		'Auth_Mailing_Address_2',
		'Auth_Mailing_Address_3',
		'Auth_Mailing_Telephone',
		'Auth_Mailing_Fax',
		'Auth_Mailing_Email',
		'Auth_Mailing_Website',
		'Auth_Author_Account_1',
		'Auth_Author_Account_2',
		'Auth_Author_Account_3',
		'Auth_Performer_Account_1',
		'Auth_Performer_Account_2',
		'Auth_Performer_Account_3',
		'Auth_Unknown_Address',
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
        <?php echo CHtml::link('<i class="fa fa-plus"></i>&nbsp;&nbsp;Create AuthorAccountAddress', array('/site/authoraccountaddress/create'), array('class' => 'btn btn-success pull-right')); ?>
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
		'Auth_Acc_Id',
		'Auth_Home_Address_1',
		'Auth_Home_Address_2',
		'Auth_Home_Address_3',
		'Auth_Home_Fax',
		'Auth_Home_Telephone',
		/*
		'Auth_Home_Email',
		'Auth_Home_Website',
		'Auth_Mailing_Address_1',
		'Auth_Mailing_Address_2',
		'Auth_Mailing_Address_3',
		'Auth_Mailing_Telephone',
		'Auth_Mailing_Fax',
		'Auth_Mailing_Email',
		'Auth_Mailing_Website',
		'Auth_Author_Account_1',
		'Auth_Author_Account_2',
		'Auth_Author_Account_3',
		'Auth_Performer_Account_1',
		'Auth_Performer_Account_2',
		'Auth_Performer_Account_3',
		'Auth_Unknown_Address',
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
            'template' => '<div class="panel panel-primary"><div class="panel-heading"><div class="pull-right">{summary}</div><h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  Author Account Addresses</h3></div><div class="panel-body">{items}{pager}</div></div>',
            'columns' => $gridColumns
                )
        );
        ?>
    </div>
</div>