<?php
/* @var $this PublishergroupController */
/* @var $model PublisherGroup */

$this->title='Update Publisher Groups: '. $model->Pub_Group_Id;
$this->breadcrumbs=array(
	'Publisher Groups'=>array('index'),
	'Update Publisher Groups',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', compact('model', 'payment_model', 'managed_model', 'biograph_model', 'tab', 'address_model', 
            'psedonym_model', 'rel_payment_model', 'org_publisher_model', 'sub_publisher_model', 'org_share_publisher_model',
            'sub_share_publisher_model', 'catalog_model')); ?></div>