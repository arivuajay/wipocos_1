<?php
/* @var $this PublisheraccountController */
/* @var $model PublisherAccount */

$this->breadcrumbs = array(
    'Publishers' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List PublisherAccount', 'url' => array('index')),
    array('label' => 'Create PublisherAccount', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#publisher-account-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Publishers</h1>

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
    'id' => 'publisher-account-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'Pub_Acc_Id',
        'Pub_Corporate_Name',
        'Pub_Internal_Code',
        'Pub_Ipi',
        'Pub_Ipi_Base_Number',
        'Pub_Date',
        /*
          'Pub_Place',
          'Pub_Country_Id',
          'Pub_Legal_Form_id',
          'Pub_Reg_Date',
          'Pub_Reg_Number',
          'Pub_Excerpt_Date',
          'Pub_Language_Id',
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
