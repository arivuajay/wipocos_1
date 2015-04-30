<?php
/* @var $this NumberassignmentController */
/* @var $model NumberAssignment */

$this->title = 'Create Number Assignments';
$this->breadcrumbs = array(
    'Number Assignments' => array('index'),
    $this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model' => $model)); ?>
</div>
