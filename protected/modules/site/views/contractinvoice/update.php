<?php
/* @var $this ContractinvoiceController */
/* @var $model ContractInvoice */

$this->title='Update Invoices: '. $model->Inv_Id;
$this->breadcrumbs=array(
	'Invoices'=>array('index'),
	'Update Invoices',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?></div>