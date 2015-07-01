<?php
/* @var $this MastermanagedrightsController */
/* @var $model MasterManagedRights */

$this->title = 'View Master Managed Rights: ' . $model->Mgd_Rights_Name;
$this->breadcrumbs = array(
    'Master Managed Rights' => array('index'),
    'View ' . 'MasterManagedRights',
);
?>

<div class="user-view">
    <p>
                 <?php
        $this->widget(
                'application.components.MyTbButton', array(
                    'label' => 'Update',
                    'url' => array('update', 'id' => $model->Master_Mgd_Rights_Id),
                    'buttonType' => 'link',
                    'context' => 'primary',
//                    
                )
        );
        echo "&nbsp;&nbsp;";
        $this->widget(
                'application.components.MyTbButton', array(
                    'label' => 'Delete',
                    'url' => array('delete', 'id' => $model->Master_Mgd_Rights_Id),
                    'buttonType' => 'link',
                    'context' => 'danger',
                    'htmlOptions' => array('confirm' => 'Are you sure you want to delete this item?'),
                    
                )
        );
        ?>
    </p>
    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $model,
        'htmlOptions' => array('class' => 'table table-striped table-bordered'),
        'attributes' => array(
            'Master_Mgd_Rights_Id',
            'Mgd_Rights_Name',
            'Mgd_Rights_Rank',
            array(
                'label' => MasterManagedRights::model()->getAttributeLabel('Active'),
                'type' => 'raw',
                'value' => ($model->Active == 1) ? '<i class="fa fa-circle text-green" title="Active"></i>' : '<i title="In-Active" class="fa fa-circle text-red"></i>'
            ),
        ),
    ));
    ?>
</div>



