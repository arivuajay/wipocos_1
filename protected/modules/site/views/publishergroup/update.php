<?php
/* @var $this PublishergroupController */
/* @var $model PublisherGroup */

if ($model->Pub_Group_Is_Publisher == '1') {
    $role = 'Publisher';
} else if ($model->Pub_Group_Is_Producer == '1') {
    $role = 'Producer';
}
$this->title = "Update {$role} Group: {$model->Pub_Group_Name}";
$this->breadcrumbs = array(
    "{$role} Groups" => array('publishergroup/index/role/'.  lcfirst($role)),
    'Update Group',
);
?>

<div class="user-create">
    <?php
    $this->renderPartial('_form', compact('model', 'payment_model', 'managed_model', 'biograph_model', 'tab', 'address_model', 'psedonym_model', 'rel_payment_model', 'org_publisher_model', 'sub_publisher_model', 'org_share_publisher_model', 'sub_share_publisher_model', 'catalog_model', 'biograph_upload_model', 'role'));
    ?></div>