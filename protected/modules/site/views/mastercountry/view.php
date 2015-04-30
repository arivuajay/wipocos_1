<?php
/* @var $this MastercountryController */
/* @var $model MasterCountry */

$this->title = 'View #' . $model->Master_Country_Id;
$this->breadcrumbs = array(
    'Master Countries' => array('index'),
    'View ' . 'MasterCountry',
);
?>

<div class="user-view">
    <p>
        <?php echo CHtml::link('Update', array('update', 'id' => $model->Master_Country_Id), array('class' => 'btn btn-primary')); ?>
        <?php echo CHtml::link('Delete', array('delete', 'id' => $model->Master_Country_Id), array('confirm' => 'Are you sure you want to delete this item?', 'class' => 'btn btn-danger'));
        ?>
    </p>
    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $model,
        'htmlOptions' => array('class' => 'table table-striped table-bordered'),
        'attributes' => array(
            'Master_Country_Id',
            'Country_Name',
            'Country_Two_Code',
            'Country_Three_Code',
            array(
                'label' => MasterCountry::model()->getAttributeLabel('Active'),
                'type' => 'raw',
                'value' => ($model->Active == 1) ? '<i class="fa fa-circle text-green" title="Active"></i>' : '<i title="In-Active" class="fa fa-circle text-red"></i>'
            ),
        ),
    ));
    ?>
</div>



