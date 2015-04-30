<?php
/* @var $this MasterhierarchyController */
/* @var $model MasterHierarchy */

$this->title = 'View #' . $model->Master_Hierarchy_Id;
$this->breadcrumbs = array(
    'Master Hierarchies' => array('index'),
    'View ' . 'MasterHierarchy',
);
?>
<div class="user-view">
    <p>
        <?php echo CHtml::link('Update', array('update', 'id' => $model->Master_Hierarchy_Id), array('class' => 'btn btn-primary')); ?>
        <?php echo CHtml::link('Delete', array('delete', 'id' => $model->Master_Hierarchy_Id), array('confirm' => 'Are you sure you want to delete this item?', 'class' => 'btn btn-danger'));
        ?>
    </p>
    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $model,
        'htmlOptions' => array('class' => 'table table-striped table-bordered'),
        'attributes' => array(
            'Master_Hierarchy_Id',
            'Hierarchy_Name',
            array(
                'name' => 'Active',
                'type' => 'raw',
                'value' => $model->Active == 1 ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>'
            ),
        ),
    ));
    ?>
</div>



