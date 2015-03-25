<?php
/* @var $this AuthoraccountController */
/* @var $model AuthorAccount */

$this->title='Create Author';
$this->breadcrumbs=array(
	'Author Accounts'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model,'address_model' => $address_model)); ?>
</div>
