<div class="box box-primary boxdivs">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'publisher-group-original-publisher-form',
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'enableAjaxValidation' => true,
    ));
    echo $form->hiddenField($model, 'Pub_Group_Id', array('value' => $group_model->Pub_Group_Id));
    ?>
    <div class="box-body col-lg-6">
        <h4>Original Publisher</h4>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Pub_Group_Org_IPI_Name_Number', array('class' => 'col-sm-4 control-label')); ?>
            <div class="col-sm-6">
                <?php echo $form->textField($model, 'Pub_Group_Org_IPI_Name_Number', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                <?php echo $form->error($model, 'Pub_Group_Org_IPI_Name_Number'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Pub_Group_Org_IPI_Base_Number', array('class' => 'col-sm-4 control-label')); ?>
            <div class="col-sm-6">
                <?php echo $form->textField($model, 'Pub_Group_Org_IPI_Base_Number', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                <?php echo $form->error($model, 'Pub_Group_Org_IPI_Base_Number'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Pub_Group_Org_Internal_Code', array('class' => 'col-sm-4 control-label')); ?>
            <div class="col-sm-6">
                <?php echo $form->textField($model, 'Pub_Group_Org_Internal_Code', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                <?php echo $form->error($model, 'Pub_Group_Org_Internal_Code'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Pub_Group_Org_Name', array('class' => 'col-sm-4 control-label')); ?>
            <div class="col-sm-6">
                <?php echo $form->textField($model, 'Pub_Group_Org_Name', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                <?php echo $form->error($model, 'Pub_Group_Org_Name'); ?>
            </div>
        </div>

        <!--    <div class="form-group">
                <div class="col-sm-6 col-sm-offset-2">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save', array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')); ?>
                </div>
            </div>-->

    </div><!-- /.box-body -->
    <?php // $this->renderPartial('_sub_publisher', array('model' => $sub_publisher_model, 'group_model' => $model)); ?>
    <?php $this->endWidget(); ?>
</div>

<!--<div class="box box-primary boxdivs">
    <?php
//    if (!$model->isNewRecord) {
//        $this->renderPartial('_original_publisher_share', array('model' => $org_share_publisher_model, 'group_model' => $model));
//        $this->renderPartial('_sub_publisher_share', array('model' => $sub_share_publisher_model, 'group_model' => $model));
//    }
    ?>
</div>
<div class="box box-primary boxdivs">
    <?php
//    if (!$model->isNewRecord) {
//        $this->renderPartial('_group_catalogue', array('model' => $catalog_model, 'group_model' => $model));
//    }
    ?>
</div>-->
