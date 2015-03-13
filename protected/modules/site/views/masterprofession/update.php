<?php
/* @var $this MasterprofessionController */
/* @var $model MasterProfession */

$this->title='Update Master Professions: '. $model->Master_Profession_Id;
$this->breadcrumbs=array(
	'Master Professions'=>array('index'),
	'Update Master Professions',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?></div>