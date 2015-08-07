<?php
/* @var $this ContractinvoiceController */
/* @var $model ContractInvoice */

$this->title='Create Invoice';
$this->breadcrumbs=array(
	'Invoices'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', compact('cont_model', 'new_model')); ?>
</div>
