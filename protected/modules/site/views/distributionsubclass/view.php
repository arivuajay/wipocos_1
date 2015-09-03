<?php
/* @var $this DistributionsubclassController */
/* @var $model DistributionSubclass */

$this->title = 'View Sub-Class: ' . $model->Subclass_Name;
$this->breadcrumbs = array(
    'Sub-Classes' => array('index'),
    'View ' . 'Sub-Class',
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
                'url' => array('update', 'id' => $model->Subclass_Id),
                'buttonType' => 'link',
                'context' => 'primary',
                    )
            );
            echo "&nbsp;&nbsp;";
            $this->widget(
                    'application.components.MyTbButton', array(
                'label' => 'Delete',
                'url' => array('delete', 'id' => $model->Subclass_Id),
                'buttonType' => 'link',
                'context' => 'danger',
                'htmlOptions' => array('confirm' => 'Are you sure you want to delete this item?'),
                    )
            );
            echo "&nbsp;&nbsp;";
            $this->widget(
                    'application.components.MyTbButton', array(
                'label' => 'Download',
                'url' => array('view', 'id' => $model->Subclass_Id, 'export' => 'PDF'),
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
            'Subclass_Code',
            'Subclass_Name',
            array(
                'name' => 'Class_Id',
                'value' => $model->class->Class_Name
            ),
            array(
                'name' => 'Subclass_Measure_Unit',
                'value' => DistributionSubclass::measuringUnitList($model->Subclass_Measure_Unit)
            ),
            array(
                'name' => 'Subclass_Calc_Unit',
                'value' => DistributionSubclass::calculatingUnitList($model->Subclass_Calc_Unit)
            ),
            array(
                'name' => 'Subclass_Dist_Params',
                'value' => DistributionSubclass::distributionParameters($model->Subclass_Dist_Params)
            ),
            'Subclass_Admin_Cost',
            'Subclass_Social_Deduct',
            'Subclass_Cultural_Deduct',
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



