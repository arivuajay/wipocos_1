<?php
/* @var $this GroupController */
/* @var $model Group */

$this->title = 'Create '.ucfirst($type).' Group';
$this->breadcrumbs = array(
    ucfirst($type).' Groups' => array('group/index/role/'.$type),
    'Create Group',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', compact('model', 'tab', 'type')); ?>
</div>
