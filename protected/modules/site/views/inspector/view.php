<?php
/* @var $this InspectorController */
/* @var $model Inspector */

$this->title='View Inspector:'.$model->Insp_Id;
$this->breadcrumbs=array(
	'Inspectors'=>array('index'),
	'View '.'Inspector',
);
?>
<div class="user-view">
    <?php    if ($export == false) {
    ?>
    <p>
        <?php        $this->widget(
                'application.components.MyTbButton', array(
                    'label' => 'Update',
                    'url' => array('update', 'id' =>  $model->Insp_Id ),
                    'buttonType' => 'link',
                    'context' => 'primary',
                )
        );
        echo "&nbsp;&nbsp;";
        $this->widget(
                'application.components.MyTbButton', array(
                    'label' => 'Delete',
                    'url' => array('delete', 'id' =>  $model->Insp_Id ),
                    'buttonType' => 'link',
                    'context' => 'danger',
                    'htmlOptions' => array('confirm' => 'Are you sure you want to delete this item?'),
                )
        );
        echo "&nbsp;&nbsp;";
        $this->widget(
                'application.components.MyTbButton', array(
            'label' => 'Download',
            'url' => array('view', 'id' =>  $model->Insp_Id , 'export' => 'PDF'),
            'buttonType' => 'link',
            'context' => 'warning',
                )
        );
        ?>
    </p>
    <?php    }
    ?>
    <?php    if ($export) { ?>
        <h3 class="text-center">Inspector <?php echo $this->title ?></h3>
    <?php        
    }
    ?>
    <?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
        'htmlOptions' => array('class'=>'table table-striped table-bordered'),
	'attributes'=>array(
		'Insp_Id',
		'Insp_Internal_Code',
		'Insp_GUID',
		'Insp_Name',
		'Insp_Occupation',
		'Insp_DOB',
		'Insp_Nationality_Id',
		'Insp_Birth_Place',
		'Insp_Identity_Number',
		'Insp_Date',
		'Insp_Region_Id',
	),
)); ?>
</div>



