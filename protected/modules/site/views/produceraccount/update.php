<?php
/* @var $this ProduceraccountController */
/* @var $model ProducerAccount */

$this->title='Update Producer: '. $model->Pro_Acc_Id;
$this->breadcrumbs=array(
	'Producer Accounts'=>array('index'),
	'Update Producer Accounts',
);
?>

<div class="user-create">
     <?php $this->renderPartial('_form', compact(
                        'tab', 'model', 'address_model', 'payment_model', 'psedonym_model', 'succession_model', 'related_model', 'biograph_model', 'related_model'));
?></div>