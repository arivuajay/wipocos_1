<?php
/* @var $this PublisheraccountController */
/* @var $model PublisherAccount */

$this->title='Update Publisher: '. $model->Pub_Acc_Id;
$this->breadcrumbs=array(
	'Publishers'=>array('index'),
	'Update Publisher',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', compact(
                        'tab', 'model', 'address_model', 'payment_model', 'psedonym_model', 'succession_model', 'managed_model', 'biograph_model', 'related_model'));
?></div>