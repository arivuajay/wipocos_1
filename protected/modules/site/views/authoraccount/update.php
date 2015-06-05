<?php
/* @var $this AuthoraccountController */
/* @var $model AuthorAccount */

$this->title = 'Update Author: ' . $model->Auth_Acc_Id;
$this->breadcrumbs = array(
    'Authors' => array('index'),
    'Update Authors',
);
?>

<div class="user-create">
    <?php
    $this->renderPartial('_form', compact('tab', 'model', 'address_model', 'payment_model', 'psedonym_model', 'death_model', 
            'managed_model', 'biograph_model', 'upload_model', 'performer_model', 'related_model'));
    ?>
</div>