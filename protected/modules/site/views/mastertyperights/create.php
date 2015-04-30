<?php
/* @var $this MastertyperightsController */
/* @var $model MasterTypeRights */

$this->title = 'Create Master Type Rights';
$this->breadcrumbs = array(
    'Master Type Rights' => array('index'),
    $this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model' => $model)); ?>
</div>
