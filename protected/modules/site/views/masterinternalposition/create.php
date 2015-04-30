<?php
/* @var $this MasterinternalpositionController */
/* @var $model MasterInternalPosition */

$this->title = 'Create Master Internal Positions';
$this->breadcrumbs = array(
    'Master Internal Positions' => array('index'),
    $this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model' => $model)); ?>
</div>
