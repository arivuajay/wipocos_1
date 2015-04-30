<?php
/* @var $this MasterdocumenttypeController */
/* @var $model MasterDocumentType */

$this->title = 'Create Master Document Types';
$this->breadcrumbs = array(
    'Master Document Types' => array('index'),
    $this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model' => $model)); ?>
</div>
