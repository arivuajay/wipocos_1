<?php
/* @var $this MasterinternalpositionController */
/* @var $model MasterInternalPosition */

$this->title = 'Update Master Internal Positions: ' . $model->Master_Int_Post_Id;
$this->breadcrumbs = array(
    'Master Internal Positions' => array('index'),
    'Update Master Internal Positions',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model' => $model)); ?></div>