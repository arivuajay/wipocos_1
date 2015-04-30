<?php
/* @var $this MastereventtypeController */
/* @var $model MasterEventType */

$this->title = 'View #' . $model->Master_Evt_Type_Id;
$this->breadcrumbs = array(
    'Master Event Types' => array('index'),
    'View ' . 'MasterEventType',
);
?>

<div class="user-view">
    <p>
        <?php echo CHtml::link('Update', array('update', 'id' => $model->Master_Evt_Type_Id), array('class' => 'btn btn-primary')); ?>
        <?php echo CHtml::link('Delete', array('delete', 'id' => $model->Master_Evt_Type_Id), array('confirm' => 'Are you sure you want to delete this item?', 'class' => 'btn btn-danger'));
        ?>
    </p>
    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $model,
        'htmlOptions' => array('class' => 'table table-striped table-bordered'),
        'attributes' => array(
            'Master_Evt_Type_Id',
            'Evt_Type_Name',
            'Evt_Type_Comment',
            array(
                'label' => MasterEventType::model()->getAttributeLabel('Active'),
                'type' => 'raw',
                'value' => ($model->Active == 1) ? '<i class="fa fa-circle text-green" title="Active"></i>' : '<i title="In-Active" class="fa fa-circle text-red"></i>'
            ),
        ),
    ));
    ?>
</div>



