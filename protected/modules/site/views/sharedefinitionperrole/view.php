<?php
/* @var $this SharedefinitionperroleController */
/* @var $model ShareDefinitionPerRole */

$this->title = 'View #' . $model->Shr_Def_Id;
$this->breadcrumbs = array(
    'Share Definition Per Roles' => array('index'),
    'View ' . 'ShareDefinitionPerRole',
);
?>
<div class="user-view">
    <p>
        <?php echo CHtml::link('Update', array('update', 'id' => $model->Shr_Def_Id), array('class' => 'btn btn-primary')); ?>
        <?php echo CHtml::link('Delete', array('delete', 'id' => $model->Shr_Def_Id), array('confirm' => 'Are you sure you want to delete this item?', 'class' => 'btn btn-danger'));
        ?>
    </p>
    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $model,
        'htmlOptions' => array('class' => 'table table-striped table-bordered'),
        'attributes' => array(
            'Shr_Def_Id',
            array(
                'name' => 'Shr_Def_Role',
                'type' => 'raw',
                'value' => $model->shrDefRole->Description
            ),
            'Shr_Def_Equ_remn',
            'Shr_Def_Blank_Tape_remn',
            'Shr_Def_Neigh_Rgts',
            'Shr_Def_Excl_Rgts',
            array(
                'name' => 'Active',
                'type' => 'raw',
                'value' => $model->Active == 1 ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>'
            ),
        ),
    ));
    ?>
</div>



