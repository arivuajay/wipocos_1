<?php
/* @var $this PerformeraccountController */
/* @var $model PerformerAccount */

$this->title='Update Performer: '. $model->Perf_Acc_Id;
$this->breadcrumbs=array(
	'Performers'=>array('index'),
	'Update Performers',
);
?>

<div class="user-create">
<?php 
    $this->renderPartial('_form', compact('tab','model','address_model','payment_model','psedonym_model','death_model','related_model','biograph_model','upload_model'));
?>
</div>