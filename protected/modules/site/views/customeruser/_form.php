<?php
/* @var $this CustomeruserController */
/* @var $model CustomerUser */
/* @var $form CActiveForm */
?>

<div class="row">
    <div class="col-lg-12 col-xs-12">
        <div class="box box-primary">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'customer-user-form',
                'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                ),
                'enableAjaxValidation' => true,
            ));
            $places = Myclass::getMasterPlace();
            ?>
            <div class="box-body">

                <div class="form-group foundation" style="margin: 5px;">
                    <div class="box-header">
                        <h3 class="box-title">Identification</h3>
                    </div>
                    <div class="box-body">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'User_Cust_Place_Id', array('class' => 'col-sm-2 control-label')); ?>
                                <div class="col-sm-5">
                                    <?php echo $form->dropDownList($model, 'User_Cust_Place_Id', $places, array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'User_Cust_Place_Id'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'User_Cust_Code', array('class' => 'col-sm-2 control-label')); ?>
                                <div class="col-sm-5">
                                    <?php echo $form->textField($model, 'User_Cust_Code', array('class' => 'form-control', 'size' => 25, 'maxlength' => 25)); ?>
                                    <?php echo $form->error($model, 'User_Cust_Code'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'User_Cust_Name', array('class' => 'col-sm-2 control-label')); ?>
                                <div class="col-sm-5">
                                    <?php echo $form->textField($model, 'User_Cust_Name', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                                    <?php echo $form->error($model, 'User_Cust_Name'); ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <br />

                <div class="form-group foundation" style="margin: 5px;">
                    <div class="box-header">
                        <h3 class="box-title">Contact</h3>
                    </div>
                    <div class="box-body">
                        <div class="col-lg-12">                
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'User_Cust_Address', array('class' => 'col-sm-2 control-label')); ?>
                                <div class="col-sm-5">
                                    <?php echo $form->textField($model, 'User_Cust_Address', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                                    <?php echo $form->error($model, 'User_Cust_Address'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'User_Cust_Email', array('class' => 'col-sm-2 control-label')); ?>
                                <div class="col-sm-5">
                                    <?php echo $form->textField($model, 'User_Cust_Email', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                                    <?php echo $form->error($model, 'User_Cust_Email'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'User_Cust_Telephone', array('class' => 'col-sm-2 control-label')); ?>
                                <div class="col-sm-5">
                                    <?php echo $form->textField($model, 'User_Cust_Telephone', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
                                    <?php echo $form->error($model, 'User_Cust_Telephone'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'User_Cust_Website', array('class' => 'col-sm-2 control-label')); ?>
                                <div class="col-sm-5">
                                    <?php echo $form->textField($model, 'User_Cust_Website', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                                    <?php echo $form->error($model, 'User_Cust_Website'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'User_Cust_Fax', array('class' => 'col-sm-2 control-label')); ?>
                                <div class="col-sm-5">
                                    <?php echo $form->textField($model, 'User_Cust_Fax', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
                                    <?php echo $form->error($model, 'User_Cust_Fax'); ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


            </div><!-- /.box-body -->
            <div class="box-footer">
                <div class="form-group">
                    <div class="col-sm-0 col-sm-offset-2">
                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save', array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')); ?>
                    </div>
                </div>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div><!-- ./col -->
</div>