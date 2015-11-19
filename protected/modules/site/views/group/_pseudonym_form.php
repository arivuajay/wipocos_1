<?php
/* @var $this AuthorPseudonymController */
/* @var $model AuthorPseudonym */
/* @var $form CActiveForm */
?>
<div class="box box-primary">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'group-pseudonym-form',
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'enableAjaxValidation' => true,
    ));
    echo $form->hiddenField($model, 'Group_Id', array('value' => $group_model->Group_Id));
    ?>

    <div class="box-body">

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Group_Pseudo_Type_Id', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php $psedonyms = Myclass::getMasterPseudonym(); ?>
                <?php echo $form->dropDownList($model, 'Group_Pseudo_Type_Id', $psedonyms, array('class' => 'form-control', 'prompt' => '')); ?>
                <?php echo $form->error($model, 'Group_Pseudo_Type_Id'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'Group_Pseudo_Name', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textField($model, 'Group_Pseudo_Name', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
                <?php echo $form->error($model, 'Group_Pseudo_Name'); ?>
            </div>
        </div>

    </div><!-- /.box-body -->
    <div class="box-footer">
        <div class="form-group">
            <div class="col-sm-0 col-sm-offset-2">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Update', array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')); ?>
            </div>
        </div>
    </div>
    <?php $this->endWidget(); ?>
</div>

<?php
$psedonyms = GroupPseudonym::model()->findAll('Group_Id = :group_acc_id', array(':group_acc_id' => $group_model->Group_Id));
if (!empty($psedonyms)) {
    ?>
    <div class="box box-success">
        <div class="box-header">
            <h4 class="box-title">Pseudo Name</h4>
        </div>
        <div class="box-body no-padding">
            <table class="table table-striped table-bordered">
                <tbody><tr>
                        <th style="width: 10px">#</th>
                        <th><?php echo $model->getAttributeLabel('Group_Pseudo_Type_Id') ?></th>
                        <th><?php echo $model->getAttributeLabel('Group_Pseudo_Name') ?></th>
                        <th>Created By</th>
                        <th>Updated By</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach ($psedonyms as $key => $psedonym) { ?>
                        <tr>
                            <td><?php echo $key + 1 ?>.</td>
                            <td><?php echo $psedonym->groupPseudoType->Pseudo_Code ?></td>
                            <td><?php echo $psedonym->Group_Pseudo_Name ?></td>
                            <td><?php echo $psedonym->createdBy->name ?></td>
                            <td><?php echo $psedonym->updatedBy->name ?></td>
                            <td>
                                <?php
                                echo MyHtml::link('<i class="fa fa-pencil"></i>', array('/site/group/update', 'id' => $group_model->Group_Id, 'tab' => 5, 'edit' => $psedonym->Group_Pseudo_Id), array('title' => 'Edit'));
                                echo "&nbsp;&nbsp;";
                                echo MyHtml::link('<i class="fa fa-trash"></i>', array('/site/group/psedonymdelete','id'=> $psedonym->Group_Pseudo_Id), array('title' => 'Delete', 'onclick' => 'return confirm("Are you sure to delete ?")'));
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody></table>
        </div>
    </div>
    <?php
}?>