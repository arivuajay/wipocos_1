<?php
/* @var $this TariffcontractsController */
/* @var $model TariffContracts */

$this->title = 'Update Contract: ' . $model->tarfContUser->User_Cust_Code;
$this->breadcrumbs = array(
    'Contract' => array('index'),
    'Update Contract',
);

if (!$contract_event_by_progress) {
    $state = TariffContractsEventHistory::model()->currentState()->find();
    echo '<div class = "alert alert-danger fade in"><button data-dismiss = "alert" class = "close close-sm" type = "button"><i class = "fa fa-times"></i></button>This contract now in '.$state->tarfContEvent->Evt_Type_Name.' state. So if you want to modify, Restart the contract first.</div>';
}
?>

<div class="user-create">
    <?php $this->renderPartial('_form', compact('model', 'email_model', 'evt_hist_model', 'contract_event_by_progress')); ?>
</div>