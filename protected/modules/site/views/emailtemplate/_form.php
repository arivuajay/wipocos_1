<?php
/* @var $this EmailtemplateController */
/* @var $model EmailTemplate */
/* @var $form CActiveForm */
?>

<div class="row">
    <div class="col-lg-12 col-xs-12">
        <div class="box box-primary">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'email-template-form',
                'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                ),
                'enableAjaxValidation' => true,
            ));
            ?>
            <div class="box-body">
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Email_Temp_Name', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $form->textField($model, 'Email_Temp_Name', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                        <?php echo $form->error($model, 'Email_Temp_Name'); ?>
                    </div>
                </div>

                <div class="form-group hide">
                    <?php echo $form->labelEx($model, 'Email_Temp_Username', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $form->textField($model, 'Email_Temp_Username', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
                        <?php echo $form->error($model, 'Email_Temp_Username'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Email_Temp_From', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $form->textField($model, 'Email_Temp_From', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
                        <?php echo $form->error($model, 'Email_Temp_From'); ?>
                    </div>
                </div>
                
                <div class="form-group hide">
                    <?php echo $form->labelEx($model, 'Email_Temp_ReplyTo', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $form->textField($model, 'Email_Temp_ReplyTo', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
                        <?php echo $form->error($model, 'Email_Temp_ReplyTo'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Email_Temp_Subject', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $form->textField($model, 'Email_Temp_Subject', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                        <?php echo $form->error($model, 'Email_Temp_Subject'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Email_Temp_Content', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-9">
                        <?php
                        $this->widget('application.extensions.cleditor.ECLEditor', array(
                            'model' => $model,
                            'attribute' => 'Email_Temp_Content', //Model attribute name. Nome do atributo do modelo.
                            'options' => array(
                                'width' => 900,
                                'height' => 300,
                                'useCSS' => true,
                            ),
                            'value' => $model->Email_Temp_Content, //If you want pass a value for the widget. I think you will. Se você precisar passar um valor para o gadget. Eu acho irá.
                        ));
                        ?>
                        <?php echo $form->error($model, 'Email_Temp_Content'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Email_Temp_Params', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $this->renderPartial('/emailtemplate/_params', array('model' => $model)); ?>
                        <?php
                        $this->widget(
                            'application.components.MyTbButton', array(
                            'label' => 'view',
                            'context' => 'default btn-sm',
                            'htmlOptions' => array(
                                'data-toggle' => 'modal',
                                'data-target' => '#paramsModal',
                                ),
                            )
                        );?>
                        <?php // echo $form->error($model, 'Email_Temp_Params');  ?>
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