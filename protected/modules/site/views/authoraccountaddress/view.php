<?php
/* @var $this AuthoraccountaddressController */
/* @var $model AuthorAccountAddress */

$this->title='View #'.$model->Auth_Addr_Id;
$this->breadcrumbs=array(
	'Author Account Addresses'=>array('index'),
	'View '.'AuthorAccountAddress',
);
?>
<div class="user-view">
    <p>
        <?php echo CHtml::link('Update', array('update', 'id' =>  $model->Auth_Addr_Id ), array('class' => 'btn btn-primary')); ?>
        <?php echo CHtml::link('Delete', array('delete', 'id' =>  $model->Auth_Addr_Id ), array('confirm' => 'Are you sure you want to delete this item?', 'class' => 'btn btn-danger'));
        ?>
    </p>
    <?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
        'htmlOptions' => array('class'=>'table table-striped table-bordered'),
	'attributes'=>array(
		'Auth_Addr_Id',
		'Auth_Acc_Id',
		'Auth_Home_Address_1',
		'Auth_Home_Address_2',
		'Auth_Home_Address_3',
		'Auth_Home_Fax',
		'Auth_Home_Telephone',
		'Auth_Home_Email',
		'Auth_Home_Website',
		'Auth_Mailing_Address_1',
		'Auth_Mailing_Address_2',
		'Auth_Mailing_Address_3',
		'Auth_Mailing_Telephone',
		'Auth_Mailing_Fax',
		'Auth_Mailing_Email',
		'Auth_Mailing_Website',
		'Auth_Author_Account_1',
		'Auth_Author_Account_2',
		'Auth_Author_Account_3',
		'Auth_Performer_Account_1',
		'Auth_Performer_Account_2',
		'Auth_Performer_Account_3',
		'Auth_Unknown_Address',
		array(
                'name' => 'Active',
                'type' => 'raw',
                'value' => $model->Active == 1 ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>'
            ),
	),
)); ?>
</div>



