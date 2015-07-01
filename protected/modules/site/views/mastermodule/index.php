<?php
/* @var $this MastermoduleController */
/* @var $dataProvider CActiveDataProvider */

$this->title = 'Master Modules';
$this->breadcrumbs = array(
    'Master Modules',
);
?>

<div class="col-lg-12 col-md-12">
    <div class="row mb10">
        <?php
        $this->widget(
                'application.components.MyTbButton', array(
            'label' => 'Create Master Module',
            'icon' => 'fa fa-plus',
            'url' => array('/site/mastermodule/create'),
            'buttonType' => 'link',
            'context' => 'success',
            'htmlOptions' => array('class' => 'pull-right'),
                )
        );
        ?>
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
            'Module_Code',
            'Description',
            'Active',
            'Created_Date',
            'Rowversion',
            array(
                'header' => 'Actions',
                'class' => 'application.components.MyActionButtonColumn',
                'htmlOptions' => array('style' => 'width: 180px;;text-align:center', 'vAlign' => 'middle', 'class' => 'action_column'),
                'template' => '{view}{update}{delete}',
            )
        );

        $this->widget('booster.widgets.TbExtendedGridView', array(
            'type' => 'striped bordered',
            'dataProvider' => $model->dataProvider(),
            'responsiveTable' => true,
            'template' => '<div class="panel panel-primary"><div class="panel-heading"><div class="pull-right">{summary}</div><h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  Master Modules</h3></div><div class="panel-body">{items}{pager}</div></div>',
            'columns' => $gridColumns
                )
        );
        ?>
    </div>
</div>