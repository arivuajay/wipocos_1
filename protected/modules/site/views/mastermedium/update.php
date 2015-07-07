<?php
/* @var $this MastermediumController */
/* @var $model MasterMedium */

$this->title='Update Master Media: '. $model->Master_Medium_Id;
$this->breadcrumbs=array(
	'Master Media'=>array('index'),
	'Update Master Media',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?></div>