<?php
/* @var $this OrganizationController */
/* @var $model Organization */

$this->title = 'Update Organization: ' . $model->Org_Abbrevation;
$this->breadcrumbs = array(
    'Organizations' => array('index'),
    'Update Organizations',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model' => $model)); ?></div>