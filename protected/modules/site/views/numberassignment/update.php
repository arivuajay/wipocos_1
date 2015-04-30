<?php
/* @var $this NumberassignmentController */
/* @var $model NumberAssignment */

$this->title = 'Update Number Assignments: ' . $model->Num_Assgn_Id;
$this->breadcrumbs = array(
    'Number Assignments' => array('index'),
    'Update Number Assignments',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model' => $model)); ?></div>