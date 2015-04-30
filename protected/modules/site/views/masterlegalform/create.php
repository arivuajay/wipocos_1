<?php
/* @var $this MasterlegalformController */
/* @var $model MasterLegalForm */

$this->title = 'Create Master Legal Forms';
$this->breadcrumbs = array(
    'Master Legal Forms' => array('index'),
    $this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model' => $model)); ?>
</div>
