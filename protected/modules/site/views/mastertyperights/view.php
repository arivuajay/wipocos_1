<?php
/* @var $this MastertyperightsController */
/* @var $model MasterTypeRights */

$this->title = 'View #' . $model->Master_Type_Rights_Id;
$this->breadcrumbs = array(
    'Master Type Rights' => array('index'),
    'View ' . 'MasterTypeRights',
);
?>

<div class="user-view">
    <p>
        <?php echo CHtml::link('Update', array('update', 'id' => $model->Master_Type_Rights_Id), array('class' => 'btn btn-primary')); ?>
        <?php echo CHtml::link('Delete', array('delete', 'id' => $model->Master_Type_Rights_Id), array('confirm' => 'Are you sure you want to delete this item?', 'class' => 'btn btn-danger'));
        ?>
    </p>
    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $model,
        'htmlOptions' => array('class' => 'table table-striped table-bordered'),
        'attributes' => array(
            'Master_Type_Rights_Id',
            'Type_Rights_Name',
            array(
                'label' => MasterTypeRights::model()->getAttributeLabel('Active'),
                'type' => 'raw',
                'value' => ($model->Active == 1) ? '<i class="fa fa-circle text-green" title="Active"></i>' : '<i title="In-Active" class="fa fa-circle text-red"></i>'
            ),
        ),
    ));
    ?>
</div>



