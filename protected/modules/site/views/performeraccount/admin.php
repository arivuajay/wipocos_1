<?php
/* @var $this PerformeraccountController */
/* @var $model PerformerAccount */

$this->breadcrumbs = array(
    'Performers' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List PerformerAccount', 'url' => array('index')),
    array('label' => 'Create PerformerAccount', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#performer-account-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Performers</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'performer-account-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'Perf_Acc_Id',
        'Perf_Sur_Name',
        'Perf_First_Name',
        'Perf_Internal_Code',
        'Perf_Ipi',
        'Perf_Ipi_Base_Number',
        /*
          'Perf_Ipn_Number',
          'Perf_DOB',
          'Perf_Place_Of_Birth_Id',
          'Perf_Birth_Country_Id',
          'Perf_Nationality_Id',
          'Perf_Language_Id',
          'Perf_Identity_Number',
          'Perf_Marital_Status_Id',
          'Perf_Spouse_Name',
          'Perf_Gender',
          'Active',
          'Created_Date',
          'Rowversion',
         */
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
