<?php
/* @var $this InspectorController */
/* @var $model Inspector */

$this->title = 'View Inspector:' . $model->Insp_Id;
$this->breadcrumbs = array(
    'Inspectors' => array('index'),
    'View ' . 'Inspector',
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
                'url' => array('update', 'id' => $model->Insp_Id),
                'buttonType' => 'link',
                'context' => 'primary',
                    )
            );
            echo "&nbsp;&nbsp;";
            $this->widget(
                    'application.components.MyTbButton', array(
                'label' => 'Delete',
                'url' => array('delete', 'id' => $model->Insp_Id),
                'buttonType' => 'link',
                'context' => 'danger',
                'htmlOptions' => array('confirm' => 'Are you sure you want to delete this item?'),
                    )
            );
            echo "&nbsp;&nbsp;";
            $this->widget(
                    'application.components.MyTbButton', array(
                'label' => 'Download',
                'url' => array('view', 'id' => $model->Insp_Id, 'export' => 'PDF'),
                'buttonType' => 'link',
                'context' => 'warning',
                    )
            );
            ?>
        </p>
    <?php }
    ?>
    <?php if ($export) { ?>
        <h3 class="text-center">Inspector <?php echo $this->title ?></h3>
        <?php
    }
    ?>
    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $model,
        'htmlOptions' => array('class' => 'table table-striped table-bordered'),
        'attributes' => array(
            'Insp_Internal_Code',
            'Insp_Name',
            'Insp_Occupation',
            'Insp_DOB',
            array(
                'name' => 'Insp_Nationality_Id',
                'value' => $model->inspNationality->Nation_Name
            ),
            'Insp_Birth_Place',
            'Insp_Identity_Number',
            'Insp_Date',
            array(
                'name' => 'Insp_Region_Id',
                'value' => $model->inspRegion->Region_Name
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



