<?php
/* @var $this ProducerLabelOwnerController */
/* @var $model ProducerLabelOwner */

$this->title='Update Producer Label Ownership: '. $model->Label_Owner_Id;
$this->breadcrumbs=array(
	'Producer Label Ownerships'=>array('index'),
	'Update Producer Label Ownerships',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?></div>