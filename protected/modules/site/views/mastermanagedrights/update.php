<?php
/* @var $this MastermanagedrightsController */
/* @var $model MasterManagedRights */

$this->title = 'Update Master Managed Right: ' . $model->Mgd_Rights_Name;
$this->breadcrumbs = array(
    'Master Managed Rights' => array('index'),
    'Update Master Managed Rights',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model' => $model)); ?></div>