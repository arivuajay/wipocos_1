<?php
/* @var $this TariffcontractsController */
/* @var $model TariffContracts */

$this->title='View TariffContracts:'.$model->Tarf_Cont_Id;
$this->breadcrumbs=array(
	'Tariff Contracts'=>array('index'),
	'View '.'TariffContracts',
);
?>
<div class="user-view">
    <?php    if ($export == false) {
    ?>
    <p>
        <?php        $this->widget(
                'application.components.MyTbButton', array(
                    'label' => 'Update',
                    'url' => array('update', 'id' =>  $model->Tarf_Cont_Id ),
                    'buttonType' => 'link',
                    'context' => 'primary',
                )
        );
        echo "&nbsp;&nbsp;";
        $this->widget(
                'application.components.MyTbButton', array(
                    'label' => 'Delete',
                    'url' => array('delete', 'id' =>  $model->Tarf_Cont_Id ),
                    'buttonType' => 'link',
                    'context' => 'danger',
                    'htmlOptions' => array('confirm' => 'Are you sure you want to delete this item?'),
                )
        );
        echo "&nbsp;&nbsp;";
        $this->widget(
                'application.components.MyTbButton', array(
            'label' => 'Download',
            'url' => array('view', 'id' =>  $model->Tarf_Cont_Id , 'export' => 'PDF'),
            'buttonType' => 'link',
            'context' => 'warning',
                )
        );
        ?>
    </p>
    <?php    }
    ?>
    <?php    if ($export) { ?>
        <h3 class="text-center">TariffContracts <?php echo $this->title ?></h3>
    <?php        
    }
    ?>
    <?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
        'htmlOptions' => array('class'=>'table table-striped table-bordered'),
	'attributes'=>array(
		'Tarf_Cont_Id',
		'Tarf_Cont_GUID',
		'Tarf_Cont_Internal_Code',
		'Tarf_Cont_City_Id',
		'Tarf_Cont_District',
		'Tarf_Cont_Area',
		'Tarf_Cont_Tariff_Id',
		'Tarf_Cont_Insp_Id',
		'Tarf_Cont_Balance',
		'Tarf_Cont_Amt_Pay',
		'Tarf_Cont_From',
		'Tarf_Cont_To',
		'Tarf_Cont_Sign_Date',
		'Tarf_Cont_Pay_Id',
		'Tarf_Cont_Portion',
		'Tarf_Cont_Comment',
		'Tarf_Cont_Event_Place_Id',
		'Tarf_Cont_Event_Date',
		'Tarf_Cont_Event_Comment',
	),
)); ?>
</div>



