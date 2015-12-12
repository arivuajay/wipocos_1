<?php
/* @var $this ContractinvoiceController */
/* @var $model ContractInvoice */
/* @var $cont_model TariffContracts */

if(!empty($cont_model)){
$this->title='Update Invoices: '. $cont_model->tarfContUser->User_Cust_Code;
}else{
$this->title='Update Invoices';
}
$this->breadcrumbs=array(
	'Invoices'=>array('index'),
	'Update Invoices',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', compact('cont_model', 'new_model')); ?></div>