<?php
/* @var $this DistributionlogsheetController */
/* @var $model DistributionLogsheet */

$this->title='View DistributionLogsheet:'.$model->Log_Id;
$this->breadcrumbs=array(
	'Distribution Logsheets'=>array('index'),
	'View '.'DistributionLogsheet',
);
?>
<div class="user-view">
    <?php    if ($export == false) {
    ?>
    <p>
        <?php        $this->widget(
                'application.components.MyTbButton', array(
                    'label' => 'Update',
                    'url' => array('update', 'id' =>  $model->Log_Id ),
                    'buttonType' => 'link',
                    'context' => 'primary',
                )
        );
        echo "&nbsp;&nbsp;";
        $this->widget(
                'application.components.MyTbButton', array(
                    'label' => 'Delete',
                    'url' => array('delete', 'id' =>  $model->Log_Id ),
                    'buttonType' => 'link',
                    'context' => 'danger',
                    'htmlOptions' => array('confirm' => 'Are you sure you want to delete this item?'),
                )
        );
        echo "&nbsp;&nbsp;";
        $this->widget(
                'application.components.MyTbButton', array(
            'label' => 'Download',
            'url' => array('view', 'id' =>  $model->Log_Id , 'export' => 'PDF'),
            'buttonType' => 'link',
            'context' => 'warning',
                )
        );
        ?>
    </p>
    <?php    }
    ?>
    <?php    if ($export) { ?>
        <h3 class="text-center"><?php echo $this->title ?></h3>
    <?php        
    }
    ?>
    <?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
        'htmlOptions' => array('class'=>'table table-striped table-bordered'),
	'attributes'=>array(
		'Log_Id',
		'Period_Id',
		'Log_User_Cust_Id',
		'Log_Place_Id',
	),
)); ?>
</div>



