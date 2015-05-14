<?php
/* @var $this WorkController */
/* @var $model Work */

$this->title = 'View #' . $model->Work_Id;
$this->breadcrumbs = array(
    'Works' => array('index'),
    'View ' . 'Work',
);
?>
<div class="user-view">
    <p>
        <?php echo CHtml::link('Update', array('update', 'id' => $model->Work_Id), array('class' => 'btn btn-primary')); ?>
        <?php echo CHtml::link('Delete', array('delete', 'id' => $model->Work_Id), array('confirm' => 'Are you sure you want to delete this item?', 'class' => 'btn btn-danger'));
        ?>
    </p>
    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $model,
        'htmlOptions' => array('class' => 'table table-striped table-bordered'),
        'attributes' => array(
            'Work_Id',
            'Work_Org_Title',
            array(
                'name' => 'Work_Language_Id',
                'value' => isset($model->workLanguage->Lang_Name) ? $model->workLanguage->Lang_Name : 'Not Set'
            ),
            'Work_Internal_Code',
            'Work_Iswc',
            'Work_Wic_Code',
            array(
                'name' => 'Work_Type_Id',
                'value' => isset($model->workType->Type_Name) ? $model->workType->Type_Name : 'Not Set'
            ),
            array(
                'name' => 'Work_Factor_Id',
                'value' => isset($model->workFactor->Factor) ? $model->workFactor->Factor : 'Not Set'
            ),
            array(
                'name' => 'Work_Instrumentation',
                'value' => $model->Instrumentlist
            ),
            'Work_Duration',
            'Work_Creation',
            'Work_Opus_Number',
        ),
    ));
    ?>
</div>



