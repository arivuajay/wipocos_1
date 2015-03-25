<?php
/* @var $this AuthoraccountaddressController */
/* @var $model AuthorAccountAddress */

$this->title='Create Author Account Addresses';
$this->breadcrumbs=array(
	'Author Account Addresses'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
