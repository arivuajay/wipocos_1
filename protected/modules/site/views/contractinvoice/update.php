<?php
/* @var $this ContractinvoiceController */
/* @var $model ContractInvoice */

$this->title='Update Invoices: '. $model->tarfCont->Tarf_Cont_Internal_Code;
$this->breadcrumbs=array(
	'Invoices'=>array('index'),
	'Update Invoices',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', compact('cont_model', 'new_model')); ?></div>