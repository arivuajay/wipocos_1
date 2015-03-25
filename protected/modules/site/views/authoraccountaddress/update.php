<?php
/* @var $this AuthoraccountaddressController */
/* @var $model AuthorAccountAddress */

$this->title='Update Author Account Addresses: '. $model->Auth_Addr_Id;
$this->breadcrumbs=array(
	'Author Account Addresses'=>array('index'),
	'Update Author Account Addresses',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?></div>