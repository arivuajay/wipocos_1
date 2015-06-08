<?php
/* @var $this ProduceraccountController */
/* @var $model ProducerAccount */

$this->title = 'Update Producer: ' . $model->Pro_Acc_Id;
$this->breadcrumbs = array(
    'Producers' => array('index'),
    'Update Producer',
);
?>

<div class="user-create">
    <?php
    $this->renderPartial('_form', compact(
                    'tab', 'model', 'address_model', 'payment_model', 'psedonym_model', 'succession_model', 'related_model', 
            'biograph_model', 'related_model', 'publisher_model', 'managed_model'));
    ?></div>