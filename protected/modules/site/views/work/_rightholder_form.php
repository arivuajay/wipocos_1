<div class="box box-primary">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'work-rightholder-form',
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'enableAjaxValidation' => true,
    ));
    ?>
    <div class="col-lg-5">
        <div class="box-body">

            <div class="form-group">
                <?php echo $form->labelEx($model, 'Work_Right_Surname', array('class' => '')); ?>
                <?php echo $form->textField($model, 'Work_Right_Surname', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                <?php echo $form->error($model, 'Work_Right_Surname'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'Work_Right_Firstname', array('class' => '')); ?>
                <?php echo $form->textField($model, 'Work_Right_Firstname', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'Work_Right_Firstname'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'Work_Right_Internal_Code', array('class' => '')); ?>
                <?php echo $form->textField($model, 'Work_Right_Internal_Code', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                <?php echo $form->error($model, 'Work_Right_Internal_Code'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'Work_Right_User_Type', array('class' => '')); ?>
                <?php echo $form->textField($model, 'Work_Right_User_Type', array('class' => 'form-control', 'size' => 10, 'maxlength' => 10)); ?>
                <?php echo $form->error($model, 'Work_Right_User_Type'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'Work_Right_Role_Id', array('class' => '')); ?>
                <?php echo $form->textField($model, 'Work_Right_Role_Id', array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'Work_Right_Role_Id'); ?>
            </div>

        </div>
    </div>
    <div class="col-lg-1"></div>
    <div class="col-lg-5">
        <div class="box-body">
            <div class="form-group foundation">
                <div class="box-header">
                    <h3 class="box-title">Broadcasting and performance Shares</h3>
                </div>
                <div class="box-body">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Work_Right_Broad_Share', array('class' => '')); ?>
                            <?php echo $form->textField($model, 'Work_Right_Broad_Share', array('class' => 'form-control', 'size' => 10, 'maxlength' => 10)); ?>
                            <?php echo $form->error($model, 'Work_Right_Broad_Share'); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Work_Right_Broad_Special', array('class' => '')); ?>
                            <?php echo $form->textField($model, 'Work_Right_Broad_Special', array('class' => 'form-control', 'size' => 2, 'maxlength' => 2)); ?>
                            <?php echo $form->error($model, 'Work_Right_Broad_Special'); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Work_Right_Broad_Org_id', array('class' => '')); ?>
                            <?php echo $form->textField($model, 'Work_Right_Broad_Org_id', array('class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'Work_Right_Broad_Org_id'); ?>
                        </div>

                    </div>

                </div>
            </div>
            <div class="form-group foundation">
                <div class="box-header">
                    <h3 class="box-title">Mechanical Shares</h3>
                </div>
                <div class="box-body">
                    <div class="col-lg-12">        
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Work_Right_Mech_Share', array('class' => '')); ?>
                            <?php echo $form->textField($model, 'Work_Right_Mech_Share', array('class' => 'form-control', 'size' => 10, 'maxlength' => 10)); ?>
                            <?php echo $form->error($model, 'Work_Right_Mech_Share'); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Work_Right_Mech_Special', array('class' => '')); ?>
                            <?php echo $form->textField($model, 'Work_Right_Mech_Special', array('class' => 'form-control', 'size' => 2, 'maxlength' => 2)); ?>
                            <?php echo $form->error($model, 'Work_Right_Mech_Special'); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Work_Right_Mech_Org_Id', array('class' => '')); ?>
                            <?php echo $form->textField($model, 'Work_Right_Mech_Org_Id', array('class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'Work_Right_Mech_Org_Id'); ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="box-footer">
        <div class="form-group">
            <div class="col-lg-12">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')); ?>
            </div>
        </div>
    </div>
    <?php $this->endWidget(); ?>
</div>