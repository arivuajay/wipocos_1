<?php
/* @var $this GroupController */
/* @var $model Group */
if($model->Group_Is_Author == '1'){
    $role = 'Author';
}elseif($model->Group_Is_Performer == '1'){
    $role = 'Performer';
}
$this->title = "Update {$role} Group: {$model->Group_Name}";
$this->breadcrumbs = array(
    "{$role} Groups" => array('group/index/role/'.lcfirst($role)),
    "Update",
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', compact('model', 'payment_model', 'managed_model', 'biograph_model', 'tab', 'address_model', 'psedonym_model', 'biograph_upload_model', 'role')); ?></div>