<?php
/* @var $this MastertypeController */
/* @var $model MasterType */

$this->title = 'Create Master Types';
$this->breadcrumbs = array(
    'Master Types' => array('index'),
    $this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model' => $model)); ?>
</div>
