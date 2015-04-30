<?php
/* @var $this MasterterritoriesController */
/* @var $model MasterTerritories */

$this->breadcrumbs = array(
    'Master Territories' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List MasterTerritories', 'url' => array('index')),
    array('label' => 'Create MasterTerritories', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#master-territories-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Master Territories</h1>

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
    'id' => 'master-territories-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'Master_Territory_Id',
        'Territory_Name',
        'Active',
        'Created_Date',
        'Rowversion',
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
