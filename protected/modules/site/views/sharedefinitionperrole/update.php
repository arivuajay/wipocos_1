<?php
/* @var $this SharedefinitionperroleController */
/* @var $model ShareDefinitionPerRole */

$this->title = 'Update Share Definition Per Roles: ' . $model->Shr_Def_Id;
$this->breadcrumbs = array(
    'Share Definition Per Roles' => array('index'),
    'Update Share Definition Per Roles',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model' => $model)); ?></div>