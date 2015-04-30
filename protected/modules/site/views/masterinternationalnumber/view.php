<?php
/* @var $this MasterinternationalnumberController */
/* @var $model MasterInternationalNumber */

$this->title = 'View #' . $model->Master_International_Id;
$this->breadcrumbs = array(
    'Master International Numbers' => array('index'),
    'View ' . 'MasterInternationalNumber',
);
?>
<div class="user-view">
    <p>
        <?php echo CHtml::link('Update', array('update', 'id' => $model->Master_International_Id), array('class' => 'btn btn-primary')); ?>
        <?php echo CHtml::link('Delete', array('delete', 'id' => $model->Master_International_Id), array('confirm' => 'Are you sure you want to delete this item?', 'class' => 'btn btn-danger'));
        ?>
    </p>
    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $model,
        'htmlOptions' => array('class' => 'table table-striped table-bordered'),
        'attributes' => array(
            'Master_International_Id',
            'International_Number_Type',
            array(
                'name' => 'Active',
                'type' => 'raw',
                'value' => $model->Active == 1 ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>'
            ),
        ),
    ));
    ?>
</div>



