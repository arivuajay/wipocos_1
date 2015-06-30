<?php
/* @var $this MasterTypeRightsController */
/* @var $model MasterTypeRights */

$this->title = 'View Master Type Rights: ' . $model->Type_Rights_Code;
$this->breadcrumbs = array(
    'Master Type Rights' => array('index'),
    'View ' . 'MasterTypeRights',
);
?>
<div class="user-view">
    <p>
        <?php
        $this->widget(
                'application.components.MyActionButton', array(
            'label' => 'Update',
            'url' => array('update', 'id' => $model->Master_Type_Rights_Id),
            'buttonType' => 'link',
            'context' => 'primary',
//                    
                )
        );
        echo "&nbsp;&nbsp;";
        $this->widget(
                'application.components.MyTbButton', array(
            'label' => 'Delete',
            'url' => array('delete', 'id' => $model->Master_Type_Rights_Id),
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
            'Master_Type_Rights_Id',
            'Type_Rights_Name',
            'Type_Rights_Code',
            'Type_Rights_Standard',
            'Type_Rights_Rank',
            array(
                'name' => 'Type_Rights_Occupation',
                'type' => 'raw',
                'value' => $model->getOccupationList($model->Type_Rights_Occupation)
            ),
            array(
                'name' => 'Type_Rights_Domain',
                'type' => 'raw',
                'value' => $model->getDomainList($model->Type_Rights_Domain)
            ),
//            'Type_Right_Use',
            array(
                'name' => 'Active',
                'type' => 'raw',
                'value' => $model->Active == 1 ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>'
            ),
        ),
    ));
    ?>
</div>



