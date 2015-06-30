<?php
/* @var $this MasterterritoriesController */
/* @var $model MasterTerritories */

$this->title = 'View Master Territory: ' . $model->Territory_Name;
$this->breadcrumbs = array(
    'Master Territories' => array('index'),
    'View ' . 'MasterTerritories',
);
?>

<div class="user-view">
    <p>
        <?php
        $this->widget(
                'application.components.MyActionButton', array(
                    'label' => 'Update',
                    'url' => array('update', 'id' => $model->Master_Territory_Id),
                    'buttonType' => 'link',
                    'context' => 'primary',
//                    
                )
        );
        echo "&nbsp;&nbsp;";
        $this->widget(
                'application.components.MyTbButton', array(
                    'label' => 'Delete',
                    'url' => array('delete', 'id' => $model->Master_Territory_Id),
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
            'Master_Territory_Id',
            'Territory_Name',
            array(
                'label' => MasterTerritories::model()->getAttributeLabel('Active'),
                'type' => 'raw',
                'value' => ($model->Active == 1) ? '<i class="fa fa-circle text-green" title="Active"></i>' : '<i title="In-Active" class="fa fa-circle text-red"></i>'
            ),
        ),
    ));
    ?>
</div>



