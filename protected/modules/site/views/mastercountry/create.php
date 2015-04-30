<?php
/* @var $this MastercountryController */
/* @var $model MasterCountry */

$this->title = 'Create Master Countries';
$this->breadcrumbs = array(
    'Master Countries' => array('index'),
    $this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model' => $model)); ?>
</div>
