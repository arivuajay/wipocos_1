<?php
/* @var $this MastercountryController */
/* @var $dataProvider CActiveDataProvider */

$this->title='Master Countries';
$this->breadcrumbs=array(
	'Master Countries',
);
?>

<div class="col-lg-12 col-md-12">
    <div class="row mb10">
        <?php echo CHtml::link('<i class="fa fa-plus"></i>&nbsp;&nbsp;Create MasterCountry', array('/site/mastercountry/create'), array('class' => 'btn btn-success pull-right')); ?>
    </div>
</div>

<div class="col-lg-12 col-md-12">
    <div class="row">
        <?php 
        $gridColumns = array(
            array(
                'class' => 'IndexColumn',
                'header' => '',
            ),
		'Country_Name',
		'Country_Two_Code',
		'Country_Three_Code',
            array(
                'name' => 'Active',
                'htmlOptions' => array('style' => 'width: 180px;;text-align:center', 'vAlign' => 'middle'),
                'type' => 'raw',
                'value' => function($data) {
                    echo ($data->Active == 1) ? "<i class='fa fa-circle text-green'></i>" : "<i class='fa fa-circle text-red'></i>";
                }),
		'Created_Date',
		'Rowversion',
		array(
                'header' => 'Actions',
                'class' => 'booster.widgets.TbButtonColumn',
                'htmlOptions' => array('style' => 'width: 180px;;text-align:center', 'vAlign' => 'middle', 'class' => 'action_column'),
                'template' => '{view}{update}{delete}',
            )
            );
        
            $this->widget('booster.widgets.TbExtendedGridView', array(
            'type' => 'striped bordered',
            'dataProvider' => $model->dataProvider(),
            'responsiveTable' => true,
            'template' => '<div class="panel panel-primary"><div class="panel-heading"><div class="pull-right">{summary}</div><h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  Master Countries</h3></div><div class="panel-body">{items}{pager}</div></div>',
            'columns' => $gridColumns
                )
        );
        ?>
    </div>
</div>