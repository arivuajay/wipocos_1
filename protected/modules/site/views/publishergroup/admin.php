<?php
/* @var $this PublishergroupController */
/* @var $model PublisherGroup */

$this->breadcrumbs = array(
    'Publisher Groups' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List PublisherGroup', 'url' => array('index')),
    array('label' => 'Create PublisherGroup', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#publisher-group-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Publisher Groups</h1>

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
    'id' => 'publisher-group-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'Pub_Group_Id',
        'Pub_Group_Name',
        'Pub_Group_Is_Publisher',
        'Pub_Group_Is_Producer',
        'Pub_Internal_Code',
        'Pub_IPI_Name_Number',
        /*
          'Pub_IPN_Base_Number',
          'Pub_Group_IPD_Number',
          'Pub_Group_Date',
          'Pub_Group_Place',
          'Pub_Group_Country_Id',
          'Pub_Group_Legal_Form_Id',
          'Pub_Group_Language_Id',
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
