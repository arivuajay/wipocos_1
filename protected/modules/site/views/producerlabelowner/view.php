<?php
/* @var $this ProducerLabelOwnerController */
/* @var $model ProducerLabelOwner */

$this->title = 'View ProducerLabelOwner: ' . $model->Label_Owner_Id;
$this->breadcrumbs = array(
    'Producer Label Ownerships' => array('index'),
    'View ' . 'ProducerLabelOwner',
);
?>
<div class="user-view">
    <p>
        <?php echo CHtml::link('Update', array('update', 'id' => $model->Label_Owner_Id), array('class' => 'btn btn-primary')); ?>
        <?php echo CHtml::link('Delete', array('delete', 'id' => $model->Label_Owner_Id), array('confirm' => 'Are you sure you want to delete this item?', 'class' => 'btn btn-danger'));
        ?>
    </p>
    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $model,
        'htmlOptions' => array('class' => 'table table-striped table-bordered'),
        'attributes' => array(
            'Label_Owner_Id',
            array(
                'name' => 'Label_id',
                'value' => $model->label->Label_Name
            ),
            'Label_Owner_From',
            'Label_Owner_To',
            array(
                'name' => 'Pro_Acc_Id',
                'value' => $model->proAcc->Pro_Corporate_Name
            ),
            'Label_Share',
        ),
    ));
    ?>
</div>



