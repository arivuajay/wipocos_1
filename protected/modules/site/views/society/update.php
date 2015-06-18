<?php
/* @var $this SocietyController */
/* @var $model Society */

$this->title = 'Update Society: ' . $model->Society_Code;
$this->breadcrumbs = array(
    'Societies' => array('index'),
    'Update Societies',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model' => $model)); ?></div>