<?php
/* @var $this AuthoraccountController */
/* @var $model AuthorAccount */

$this->title = 'Create Author';
$this->breadcrumbs = array(
    'Authors' => array('index'),
    $this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model' => $model, 'tab' => $tab)); ?>
</div>
