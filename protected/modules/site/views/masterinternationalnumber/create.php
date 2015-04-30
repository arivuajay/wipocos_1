<?php
/* @var $this MasterinternationalnumberController */
/* @var $model MasterInternationalNumber */

$this->title = 'Create Master International Numbers';
$this->breadcrumbs = array(
    'Master International Numbers' => array('index'),
    $this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model' => $model)); ?>
</div>
