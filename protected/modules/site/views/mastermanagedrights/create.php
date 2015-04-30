<?php
/* @var $this MastermanagedrightsController */
/* @var $model MasterManagedRights */

$this->title = 'Create Master Managed Rights';
$this->breadcrumbs = array(
    'Master Managed Rights' => array('index'),
    $this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model' => $model)); ?>
</div>
