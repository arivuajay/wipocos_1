<?php
/* @var $this MasterpseudonymtypesController */
/* @var $model MasterPseudonymTypes */

$this->title = 'Update Master Pseudonym Type: ' . $model->Pseudo_Code;
$this->breadcrumbs = array(
    'Master Pseudonym Types' => array('index'),
    'Update Master Pseudonym Types',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model' => $model)); ?></div>