<?php
/* @var $this InternalcodegenerateController */
/* @var $model InternalcodeGenerate */

$this->title='View #'.$model->Gen_Inter_Code_Id;
$this->breadcrumbs=array(
	'Internalcode Generates'=>array('index'),
	'View '.'InternalcodeGenerate',
);
?>
<div class="user-view">
    <?php    if ($export == false) {
    ?>
    <p>
        <?php        $this->widget(
                'application.components.MyTbButton', array(
                    'label' => 'Update',
                    'url' => array('update', 'id' =>  $model->Gen_Inter_Code_Id ),
                    'buttonType' => 'link',
                    'context' => 'primary',
                )
        );
        echo "&nbsp;&nbsp;";
        $this->widget(
                'application.components.MyTbButton', array(
                    'label' => 'Delete',
                    'url' => array('delete', 'id' =>  $model->Gen_Inter_Code_Id ),
                    'buttonType' => 'link',
                    'context' => 'danger',
                    'htmlOptions' => array('confirm' => 'Are you sure you want to delete this item?'),
                )
        );
        echo "&nbsp;&nbsp;";
        $this->widget(
                'application.components.MyTbButton', array(
            'label' => 'Download',
            'url' => array('view', 'id' =>  $model->Gen_Inter_Code_Id , 'export' => 'PDF'),
            'buttonType' => 'link',
            'context' => 'warning',
                )
        );
        ?>
    </p>
    <?php    }
    ?>
    <?php    if ($export) { ?>
        <h3 class="text-center">InternalcodeGenerate <?php echo $this->title ?></h3>
    <?php        
    }
    ?>
    <?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
        'htmlOptions' => array('class'=>'table table-striped table-bordered'),
	'attributes'=>array(
		'Gen_Inter_Code_Id',
		'Gen_User_Type',
		'Gen_Prefix',
		'Gen_Inter_Code',
		'Gen_Suffix',
		'Gen_Code_Pad',
	),
)); ?>
</div>



