<?php
/* @var $this MastertariffController */
/* @var $model MasterTariff */

$this->title = 'View MasterTariff:' . $model->Tarif_Description;
$this->breadcrumbs = array(
    'Master Tariffs' => array('index'),
    'View ' . 'MasterTariff',
);
?>
<div class="user-view">
    <?php if ($export == false) {
        ?>
        <p>
            <?php
            $this->widget(
                    'application.components.MyTbButton', array(
                'label' => 'Update',
                'url' => array('update', 'id' => $model->Master_Tarif_Id),
                'buttonType' => 'link',
                'context' => 'primary',
                    )
            );
            echo "&nbsp;&nbsp;";
            $this->widget(
                    'application.components.MyTbButton', array(
                'label' => 'Delete',
                'url' => array('delete', 'id' => $model->Master_Tarif_Id),
                'buttonType' => 'link',
                'context' => 'danger',
                'htmlOptions' => array('confirm' => 'Are you sure you want to delete this item?'),
                    )
            );
            echo "&nbsp;&nbsp;";
            $this->widget(
                    'application.components.MyTbButton', array(
                'label' => 'Download',
                'url' => array('view', 'id' => $model->Master_Tarif_Id, 'export' => 'PDF'),
                'buttonType' => 'link',
                'context' => 'warning',
                    )
            );
            ?>
        </p>
    <?php }
    ?>
    <?php if ($export) { ?>
        <h3 class="text-center">MasterTariff <?php echo $this->title ?></h3>
        <?php
    }
    ?>
    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $model,
        'htmlOptions' => array('class' => 'table table-striped table-bordered'),
        'attributes' => array(
//            'Master_Tarif_Id',
            'Tarif_Code',
            'Tarif_Description',
            'Tarif_Min_Tarif_Amount',
            'Tarif_Max_Tarif_Amount',
            'Tarif_Amount',
		array(
                'name' => 'Tarif_Percentage',
                'type' => 'raw',
                'value' => $model->Tarif_Percentage == 1 ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>'
            ),
            'Tarif_Comment',
        ),
    ));
    ?>
</div>



