<?php
/* @var $this GroupController */
/* @var $model Group */

$this->title = 'View #' . $model->Group_Id;
$this->breadcrumbs = array(
    'Groups' => array('index'),
    'View ' . 'Group',
);
?>
<div class="user-view">
    <p>
        <?php echo CHtml::link('Update', array('update', 'id' => $model->Group_Id), array('class' => 'btn btn-primary')); ?>
        <?php echo CHtml::link('Delete', array('delete', 'id' => $model->Group_Id), array('confirm' => 'Are you sure you want to delete this item?', 'class' => 'btn btn-danger'));
        ?>
    </p>
    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $model,
        'htmlOptions' => array('class' => 'table table-striped table-bordered'),
        'attributes' => array(
            'Group_Name',
            array(
                'name' => 'Group_Is_Author',
                'type' => 'raw',
                'value' => ($model->Group_Is_Author == 1) ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>'
            ),
            array(
                'name' => 'Group_Is_Performer',
                'type' => 'raw',
                'value' => ($model->Group_Is_Performer == 1) ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>'
            ),
            'Group_Internal_Code',
            'Group_IPN_Base_Number',
            'Group_IPI_Name_Number',
            'Group_IPN_Number',
            'Group_Date',
            'Group_Place',
            array(
                'name' => 'Group_Country_Id',
                'value' => isset($model->groupCountry->Country_Name) ? $model->groupCountry->Country_Name : 'Not set'
            ),
            array(
                'name' => 'Group_Legal_Form_Id',
                'value' => isset($model->groupLegalForm->Legal_Form_Name) ? $model->groupLegalForm->Legal_Form_Name : 'Not set'
            ),
            array(
                'name' => 'Group_Language_Id',
                'value' => isset($model->groupLanguage->Lang_Name) ? $model->groupLanguage->Lang_Name : 'Not set'
            ),
            array(
                'name' => 'Status',
                'type' => 'raw',
                'value' => $model->status
            ),
        ),
    ));
    ?>
</div>



