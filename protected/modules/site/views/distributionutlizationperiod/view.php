<?php
/* @var $this DistributionutlizationperiodController */
/* @var $model DistributionUtlizationPeriod */

$this->title = 'View Utilization Period: ' . $model->Period_Year;
$this->breadcrumbs = array(
    'Utilization Periods' => array('index'),
    'View ' . 'Utilization Period',
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
                'url' => array('update', 'id' => $model->Period_Id),
                'buttonType' => 'link',
                'context' => 'primary',
                    )
            );
            echo "&nbsp;&nbsp;";
            $this->widget(
                    'application.components.MyTbButton', array(
                'label' => 'Delete',
                'url' => array('delete', 'id' => $model->Period_Id),
                'buttonType' => 'link',
                'context' => 'danger',
                'htmlOptions' => array('confirm' => 'Are you sure you want to delete this item?'),
                    )
            );
            echo "&nbsp;&nbsp;";
            $this->widget(
                    'application.components.MyTbButton', array(
                'label' => 'Download',
                'url' => array('view', 'id' => $model->Period_Id, 'export' => 'PDF'),
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
//            'Period_Id',
            'Period_Internal_Code',
            'Period_Year',
            'Period_Number',
            'Period_From',
            'Period_To',
            array(
                'name' => 'Sub_Class_Id',
                'value' => $model->subclass->fullname
            ),
            array(
                'name' => 'Setting_Id',
                'value' => $model->setting->Setting_Date
            ),
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



