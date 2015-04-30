<?php
/* @var $this MasterinternalpositionController */
/* @var $model MasterInternalPosition */

$this->breadcrumbs = array(
    'Master Internal Positions' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List MasterInternalPosition', 'url' => array('index')),
    array('label' => 'Create MasterInternalPosition', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#master-internal-position-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Master Internal Positions</h1>

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
    'id' => 'master-internal-position-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'Master_Int_Post_Id',
        'Int_Post_Name',
        'Active',
        'Created_Date',
        'Rowversion',
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
