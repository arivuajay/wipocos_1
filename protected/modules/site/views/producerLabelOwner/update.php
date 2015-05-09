<?php
/* @var $this ProducerLabelOwnerController */
/* @var $model ProducerLabelOwner */

$this->title='Update Producer Label Owners: '. $model->Label_Owner_Id;
$this->breadcrumbs=array(
	'Producer Label Owners'=>array('index'),
	'Update Producer Label Owners',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?></div>