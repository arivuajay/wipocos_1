<?php
/* @var $this MasterhierarchyController */
/* @var $model MasterHierarchy */

$this->title = 'Update Master Hierarchy: ' . $model->Hierarchy_Name;
$this->breadcrumbs = array(
    'Master Hierarchies' => array('index'),
    'Update Master Hierarchies',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model' => $model)); ?></div>