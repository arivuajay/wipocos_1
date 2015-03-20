<?php
/* @var $this NumberassignmentController */
/* @var $model NumberAssignment */
/* @var $form CActiveForm */
?>

<div class="row">
    <div class="col-lg-12 col-xs-12">
        <div class="box box-primary">
            <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'number-assignment-form',
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
	'enableAjaxValidation'=>true,
)); ?>
            <div class="box-body">
                                    <div class="form-group">
                        <?php echo $form->labelEx($model,'Num_Assgn_System_Id',  array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-5">
                        <?php echo $form->textField($model,'Num_Assgn_System_Id',array('class'=>'form-control')); ?>
                        <?php echo $form->error($model,'Num_Assgn_System_Id'); ?>
                        </div>
                    </div>

                                        <div class="form-group">
                        <?php echo $form->labelEx($model,'series_list',  array('class' => 'col-sm-2 control-label')); ?>
                                            <div class="col-sm-5" id="radio_div">
                        <?php echo $form->radioButtonList($model,'series_list',array('S' => 'Series', 'L' => 'List'), array('class'=>'form-control series_list')); ?>
                        <?php echo $form->error($model,'series_list'); ?>
                        </div>
                    </div>

                <?php
                $series_from_disp = $series_to_disp = 'none';
                $list_disp = 'none';
                $series_from_val = $series_to_val = 0; 
                
                if(!$model->isNewRecord){
                    if($model->series_list == 'S'){
                        $series_from_disp = $series_to_disp = 'block';
                        $series_from_val = $model->Num_Assgn_Series_From; 
                        $series_to_val = $model->Num_Assgn_Series_To;
                    }else{
                        $list_disp = 'block';
                    }
                }
                ?>
                <div class="form-group series_div" style="display: <?php echo $series_from_disp?>">
                        <?php echo $form->labelEx($model,'Num_Assgn_Series_From',  array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-5">
                        <?php echo $form->textField($model,'Num_Assgn_Series_From',array('class'=>'form-control')); ?>
                        <?php echo $form->error($model,'Num_Assgn_Series_From'); ?>
                        </div>
                    </div>

                                        <div class="form-group series_div" style="display: <?php echo $series_to_disp?>">
                        <?php echo $form->labelEx($model,'Num_Assgn_Series_To',  array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-5">
                        <?php echo $form->textField($model,'Num_Assgn_Series_To',array('class'=>'form-control')); ?>
                        <?php echo $form->error($model,'Num_Assgn_Series_To'); ?>
                        </div>
                    </div>

                                        <div class="form-group list_div" style="display: <?php echo $list_disp?>">
                        <?php echo $form->labelEx($model,'Num_Assgn_List',  array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-5">
                        <?php echo $form->textField($model,'Num_Assgn_List',array('class'=>'form-control','size'=>50,'maxlength'=>50)); ?>
                        <?php echo $form->error($model,'Num_Assgn_List'); ?>
                        </div>
                    </div>

                                        <div class="form-group">
                        <?php echo $form->labelEx($model,'Active',  array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-5">
                        <?php echo $form->checkBox($model,'Active',array('class'=>'form-control')); ?>
                        <?php echo $form->error($model,'Active'); ?>
                        </div>
                    </div>

                                </div><!-- /.box-body -->
            <div class="box-footer">
                <div class="form-group">
                    <div class="col-sm-0 col-sm-offset-2">
                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')); ?>
                    </div>
                </div>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div><!-- ./col -->
</div>

<?php


$js = <<< EOD
    $(document).ready(function(){
        $('input:radio').on('ifClicked', function(event){
            console.log($(this).val());
            if($(this).val() == 'S'){
                $(".series_div").show();
                $(".list_div").hide();
        
                $("#NumberAssignment_Num_Assgn_Series_From").val($series_from_val);
                $("#NumberAssignment_Num_Assgn_Series_To").val($series_from_val);
            }else{
                $(".series_div").hide();
                $(".list_div").show();
        
                $("#NumberAssignment_Num_Assgn_Series_From").val('0');
                $("#NumberAssignment_Num_Assgn_Series_To").val('0');
            }
        });
        
        
    });
EOD;

Yii::app()->clientScript->registerScript('_form', $js);
?>