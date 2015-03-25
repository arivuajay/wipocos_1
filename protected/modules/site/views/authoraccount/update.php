<?php
/* @var $this AuthoraccountController */
/* @var $model AuthorAccount */

$this->title='Update Author Accounts: '. $model->Auth_Acc_Id;
$this->breadcrumbs=array(
	'Author Accounts'=>array('index'),
	'Update Author Accounts',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?></div>