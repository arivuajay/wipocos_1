<?php
/* @var $this ProduceraccountController */
/* @var $model ProducerAccount */

$this->breadcrumbs = array(
    'Producer Accounts' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List ProducerAccount', 'url' => array('index')),
    array('label' => 'Create ProducerAccount', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#producer-account-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Producer Accounts</h1>

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
    'id' => 'producer-account-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'Pro_Acc_Id',
        'Pro_Corporate_Name',
        'Pro_Internal_Code',
        'Pro_Ipi',
        'Pro_Ipi_Base_Number',
        'Pro_Date',
        /*
          'Pro_Place',
          'Pro_Country_Id',
          'Pro_Legal_Form_id',
          'Pro_Reg_Date',
          'Pro_Reg_Number',
          'Pro_Excerpt_Date',
          'Pro_Language_Id',
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
