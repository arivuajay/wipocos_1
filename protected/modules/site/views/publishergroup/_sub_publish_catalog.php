<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'publisher-group-original-publisher-form',
    'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data'),
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
    'enableAjaxValidation' => false,
        ));
?>
<div class="box box-primary boxdivs">
    <?php
    echo $form->hiddenField($org_publisher_model, 'Pub_Group_Id', array('value' => $model->Pub_Group_Id));
    ?>
    <div class="box-body col-lg-6">
        <h4>Original Publisher</h4>

        <div class="form-group">
            <?php echo $form->labelEx($org_publisher_model, 'Pub_Group_Org_IPI_Name_Number', array('class' => 'col-sm-4 control-label')); ?>
            <div class="col-sm-6">
                <?php echo $form->textField($org_publisher_model, 'Pub_Group_Org_IPI_Name_Number', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                <?php echo $form->error($org_publisher_model, 'Pub_Group_Org_IPI_Name_Number'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($org_publisher_model, 'Pub_Group_Org_IPI_Base_Number', array('class' => 'col-sm-4 control-label')); ?>
            <div class="col-sm-6">
                <?php echo $form->textField($org_publisher_model, 'Pub_Group_Org_IPI_Base_Number', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                <?php echo $form->error($org_publisher_model, 'Pub_Group_Org_IPI_Base_Number'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($org_publisher_model, 'Pub_Group_Org_Internal_Code', array('class' => 'col-sm-4 control-label')); ?>
            <div class="col-sm-6">
                <?php echo $form->textField($org_publisher_model, 'Pub_Group_Org_Internal_Code', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                <?php echo $form->error($org_publisher_model, 'Pub_Group_Org_Internal_Code'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($org_publisher_model, 'Pub_Group_Org_Name', array('class' => 'col-sm-4 control-label')); ?>
            <div class="col-sm-6">
                <?php echo $form->textField($org_publisher_model, 'Pub_Group_Org_Name', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                <?php echo $form->error($org_publisher_model, 'Pub_Group_Org_Name'); ?>
            </div>
        </div>


    </div>

    <div class="box-body col-lg-6">
        <h4>Sub Publisher</h4>

        <?php echo $form->hiddenField($sub_publisher_model, 'Pub_Group_Id', array('value' => $model->Pub_Group_Id)); ?>
        <div class="form-group">
            <?php echo $form->labelEx($sub_publisher_model, 'Pub_Group_Sub_IPI_Name_Number', array('class' => 'col-sm-4 control-label')); ?>
            <div class="col-sm-6">
                <?php echo $form->textField($sub_publisher_model, 'Pub_Group_Sub_IPI_Name_Number', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                <?php echo $form->error($sub_publisher_model, 'Pub_Group_Sub_IPI_Name_Number'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($sub_publisher_model, 'Pub_Group_Sub_IPI_Base_Number', array('class' => 'col-sm-4 control-label')); ?>
            <div class="col-sm-6">
                <?php echo $form->textField($sub_publisher_model, 'Pub_Group_Sub_IPI_Base_Number', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                <?php echo $form->error($sub_publisher_model, 'Pub_Group_Sub_IPI_Base_Number'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($sub_publisher_model, 'Pub_Group_Sub_Internal_Code', array('class' => 'col-sm-4 control-label')); ?>
            <div class="col-sm-6">
                <?php echo $form->textField($sub_publisher_model, 'Pub_Group_Sub_Internal_Code', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                <?php echo $form->error($sub_publisher_model, 'Pub_Group_Sub_Internal_Code'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($sub_publisher_model, 'Pub_Group_Sub_Name', array('class' => 'col-sm-4 control-label')); ?>
            <div class="col-sm-6">
                <?php echo $form->textField($sub_publisher_model, 'Pub_Group_Sub_Name', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                <?php echo $form->error($sub_publisher_model, 'Pub_Group_Sub_Name'); ?>
            </div>
        </div>

    </div>

</div>

<div class="box box-primary boxdivs">
    <div class="box-body col-lg-6">
        <h4>Share of Original Publisher</h4>
        <?php echo $form->hiddenField($org_share_publisher_model, 'Pub_Group_Id', array('value' => $model->Pub_Group_Id)); ?>
        <div class="form-group">
            <?php echo $form->labelEx($org_share_publisher_model, 'Pub_Group_Org_Share_Broadcast', array('class' => 'col-sm-4 control-label')); ?>
            <div class="col-sm-6">
                <?php echo $form->textField($org_share_publisher_model, 'Pub_Group_Org_Share_Broadcast', array('class' => 'form-control', 'size' => 10, 'maxlength' => 10)); ?>
                <?php echo $form->error($org_share_publisher_model, 'Pub_Group_Org_Share_Broadcast'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($org_share_publisher_model, 'Pub_Group_Org_Share_Mechanical', array('class' => 'col-sm-4 control-label')); ?>
            <div class="col-sm-6">
                <?php echo $form->textField($org_share_publisher_model, 'Pub_Group_Org_Share_Mechanical', array('class' => 'form-control', 'size' => 10, 'maxlength' => 10)); ?>
                <?php echo $form->error($org_share_publisher_model, 'Pub_Group_Org_Share_Mechanical'); ?>
            </div>
        </div>

    </div>
    <div class="box-body col-lg-6">
        <h4>Share of Sub Publisher</h4>
        <?php echo $form->hiddenField($catalog_model, 'Pub_Group_Id', array('value' => $model->Pub_Group_Id)); ?>
        <div class="form-group">
            <?php echo $form->labelEx($sub_share_publisher_model, 'Pub_Group_Sub_Share_Broadcast', array('class' => 'col-sm-4 control-label')); ?>
            <div class="col-sm-6">
                <?php echo $form->textField($sub_share_publisher_model, 'Pub_Group_Sub_Share_Broadcast', array('class' => 'form-control', 'size' => 10, 'maxlength' => 10)); ?>
                <?php echo $form->error($sub_share_publisher_model, 'Pub_Group_Sub_Share_Broadcast'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($sub_share_publisher_model, 'Pub_Group_Sub_Share_Mechanical', array('class' => 'col-sm-4 control-label')); ?>
            <div class="col-sm-6">
                <?php echo $form->textField($sub_share_publisher_model, 'Pub_Group_Sub_Share_Mechanical', array('class' => 'form-control', 'size' => 10, 'maxlength' => 10)); ?>
                <?php echo $form->error($sub_share_publisher_model, 'Pub_Group_Sub_Share_Mechanical'); ?>
            </div>
        </div>

    </div>
</div>
<div class="box box-primary boxdivs">
    <div class="box-body col-lg-12">
        <h4>Subcontracted Catalogue</h4>
        <?php
        echo $form->hiddenField($catalog_model, 'Pub_Group_Id', array('value' => $model->Pub_Group_Id));
        $territories = Myclass::getMasterTerritory();
        ?>
        <div class="form-group">
            <?php echo $form->labelEx($catalog_model, 'Pub_Group_Cat_Number', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textField($catalog_model, 'Pub_Group_Cat_Number', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                <?php echo $form->error($catalog_model, 'Pub_Group_Cat_Number'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($catalog_model, 'Pub_Group_Cat_Start_Date', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textField($catalog_model, 'Pub_Group_Cat_Start_Date', array('class' => 'form-control date')); ?>
                <?php echo $form->error($catalog_model, 'Pub_Group_Cat_Start_Date'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($catalog_model, 'Pub_Group_Cat_End_Date', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textField($catalog_model, 'Pub_Group_Cat_End_Date', array('class' => 'form-control date')); ?>
                <?php echo $form->error($catalog_model, 'Pub_Group_Cat_End_Date'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($catalog_model, 'Pub_Group_Cat_Name', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textField($catalog_model, 'Pub_Group_Cat_Name', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                <?php echo $form->error($catalog_model, 'Pub_Group_Cat_Name'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($catalog_model, 'Pub_Group_Cat_Territory_Id', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->dropDownList($catalog_model, 'Pub_Group_Cat_Territory_Id', $territories, array('class' => 'form-control', 'prompt' => '')); ?>
                <?php echo $form->error($catalog_model, 'Pub_Group_Cat_Territory_Id'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($catalog_model, 'Pub_Group_Cat_Clasue', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->radioButtonList($catalog_model, 'Pub_Group_Cat_Clasue', Myclass::getGroupClause(), array('class' => 'form-control', 'size' => 4, 'maxlength' => 4)); ?>
                <?php echo $form->error($catalog_model, 'Pub_Group_Cat_Clasue'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($catalog_model, 'Pub_Group_Cat_Sign_Date', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textField($catalog_model, 'Pub_Group_Cat_Sign_Date', array('class' => 'form-control date')); ?>
                <?php echo $form->error($catalog_model, 'Pub_Group_Cat_Sign_Date'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($catalog_model, 'Pub_Group_Cat_File', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->fileField($catalog_model, 'Pub_Group_Cat_File', array()); ?>
                <?php echo $form->error($catalog_model, 'Pub_Group_Cat_File'); ?>
            </div>
        </div>

        <?php if (!$catalog_model->isNewRecord) { ?>
            <div class="form-group">
                <div class="col-sm-5  col-sm-offset-3">
                    <?php echo CHtml::link('View File', $catalog_model->getFilePath(), array('target' => '_blank')) ?>
                </div>
            </div>
        <?php } ?>

        <div class="form-group">
            <?php echo $form->labelEx($catalog_model, 'Pub_Group_Cat_Reference', array('class' => 'col-sm-3 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textField($catalog_model, 'Pub_Group_Cat_Reference', array('class' => 'form-control')); ?>
                <?php echo $form->error($catalog_model, 'Pub_Group_Cat_Reference'); ?>
            </div>
        </div>

        <div class="box-footer">
            <div class="form-group">
                <div class="col-sm-0 col-sm-offset-3">
                    <?php echo CHtml::submitButton($catalog_model->isNewRecord ? 'Create' : 'Save', array('class' => $catalog_model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endWidget(); ?>
