<?php
/* @var $this PublishergroupController */
/* @var $model PublisherGroup */
$g_type = ucfirst($type);
$this->title = "Create {$g_type} Group";
$this->breadcrumbs = array(
    "{$g_type} Groups" => array('publishergroup/index/role/'.  lcfirst($g_type)),
    $this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', compact('model', 'tab', 'type')); ?>
</div>
