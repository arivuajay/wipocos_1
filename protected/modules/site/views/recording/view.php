<?php
/* @var $this RecordingController */
/* @var $model Recording */

$this->title = 'View #' . $model->Rcd_Id;
$this->breadcrumbs = array(
    'Recordings' => array('index'),
    'View ' . 'Recording',
);
?>
<div class="user-view">
    <?php if ($export == false) {
        ?>
        <p>
            <?php
            $this->widget(
                    'booster.widgets.TbButton', array(
                'label' => 'Update',
                'url' => array('update', 'id' => $model->Rcd_Id),
                'buttonType' => 'link',
                'context' => 'primary',
//                    'visible' => UserIdentity::checkAccess(Yii::app()->user->name)
                    )
            );
            echo "&nbsp;&nbsp;";
            $this->widget(
                    'application.components.MyTbButton', array(
                'label' => 'Delete',
                'url' => array('delete', 'id' => $model->Rcd_Id),
                'buttonType' => 'link',
                'context' => 'danger',
                'htmlOptions' => array('confirm' => 'Are you sure you want to delete this item?'),
                'visible' => UserIdentity::checkAccess(Yii::app()->user->name)
                    )
            );
            echo "&nbsp;&nbsp;";
            $this->widget(
                    'booster.widgets.TbButton', array(
                'label' => 'Download',
                'url' => array('view', 'id' => $model->Rcd_Id, 'export' => 'PDF'),
                'buttonType' => 'link',
                'context' => 'warning',
//                    'visible' => UserIdentity::checkAccess(Yii::app()->user->name)
                    )
            );
            ?>
        </p>
    <?php }
    ?>
    <?php if ($export) { ?>
        <h3 class="text-center">$this->modelClass $this->title</h3>
        <?php
    }
    ?>
    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $model,
        'htmlOptions' => array('class' => 'table table-striped table-bordered'),
        'attributes' => array(
            'Rcd_Id',
            'Rcd_Title',
            'Rcd_Language_Id',
            'Rcd_Internal_Code',
            'Rcd_Type_Id',
            'Rcd_Date',
            'Rcd_Duration',
            'Rcd_Record_Country_id',
            'Rcd_Product_Country_Id',
            'Rcd_Doc_Status_Id',
            'Rcd_Record_Type_Id',
            'Rcd_Label_Id',
            'Rcd_Reference',
            'Rcd_File',
            'Rcd_Isrc_Code',
            'Rcd_Iswc_Number',
        ),
    ));
    ?>
</div>



