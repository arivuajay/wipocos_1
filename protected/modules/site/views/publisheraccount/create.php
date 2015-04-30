<?php
/* @var $this PublisheraccountController */
/* @var $model PublisherAccount */

$this->title = 'Create Publishers';
$this->breadcrumbs = array(
    'Publishers' => array('index'),
    $this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model' => $model, 'tab' => $tab)); ?>
</div>
