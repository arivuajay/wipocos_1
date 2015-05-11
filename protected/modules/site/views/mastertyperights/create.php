<?php
/* @var $this MastertyperightsController */
/* @var $model MasterTypeRights */

$this->title = 'Create Right Holder Type';
$this->breadcrumbs = array(
    'Right Holder Types' => array('index'),
    $this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model' => $model)); ?>
</div>
