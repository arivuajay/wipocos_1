<?php
/* @var $this DistributionsettingController */
/* @var $model DistributionSetting */

$this->title = 'View Setting Dates: ' . $model->Setting_Identifier;
$this->breadcrumbs = array(
    'Setting Datess' => array('index'),
    'View ' . 'Setting Dates',
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
                'url' => array('update', 'id' => $model->Setting_Id),
                'buttonType' => 'link',
                'context' => 'primary',
                    )
            );
            echo "&nbsp;&nbsp;";
            $this->widget(
                    'application.components.MyTbButton', array(
                'label' => 'Delete',
                'url' => array('delete', 'id' => $model->Setting_Id),
                'buttonType' => 'link',
                'context' => 'danger',
                'htmlOptions' => array('confirm' => 'Are you sure you want to delete this item?'),
                    )
            );
            echo "&nbsp;&nbsp;";
            $this->widget(
                    'application.components.MyTbButton', array(
                'label' => 'Download',
                'url' => array('view', 'id' => $model->Setting_Id, 'export' => 'PDF'),
                'buttonType' => 'link',
                'context' => 'warning',
                    )
            );
            ?>
        </p>
    <?php }
    ?>
    <?php if ($export) { ?>
        <h3 class="text-center"><?php echo $this->title ?></h3>
        <?php
    }
    ?>
    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $model,
        'htmlOptions' => array('class' => 'table table-striped table-bordered'),
        'attributes' => array(
//            'Setting_Id',
            'Setting_Internal_Code',
            'Setting_Identifier',
            'Setting_Date',
            'Total_Distribute',
            'Closing_Distribute',
                array(
                    'name' => 'Created_By',
                    'value' => isset($model->createdBy->name) ? $model->createdBy->name : ''
                ),
                array(
                    'name' => 'Created Date',
                    'value' => $model->Created_Date
                ),
                array(
                    'name' => 'Updated_By',
                    'value' => isset($model->updatedBy->name) ? $model->updatedBy->name : ''
                ),
                array(
                    'name' => 'Updated Date',
                    'value' => $model->Rowversion
                ),
        ),
    ));
    ?>
</div>



