<?php
/* @var $this SharedefinitionperroleController */
/* @var $model ShareDefinitionPerRole */

$this->title = 'View #' . $model->Shr_Def_Id;
$this->breadcrumbs = array(
    'Share Definition Per Roles' => array('index'),
    'View ' . 'ShareDefinitionPerRole',
);
?>
<div class="user-view">
    <p>
        <?php
        $this->widget(
                'booster.widgets.TbButton', array(
                    'label' => 'Update',
                    'url' => array('update', 'id' => $model->Shr_Def_Id),
                    'buttonType' => 'link',
                    'context' => 'primary',
//                    'visible' => UserIdentity::checkAccess(Yii::app()->user->name)
                )
        );
        echo "&nbsp;&nbsp;";
        $this->widget(
                'application.components.MyTbButton', array(
                    'label' => 'Delete',
                    'url' => array('delete', 'id' => $model->Shr_Def_Id),
                    'buttonType' => 'link',
                    'context' => 'danger',
                    'htmlOptions' => array('confirm' => 'Are you sure you want to delete this item?'),
                    'visible' => UserIdentity::checkAccess(Yii::app()->user->name)
                )
        );
        ?>
    </p>
    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $model,
        'htmlOptions' => array('class' => 'table table-striped table-bordered'),
        'attributes' => array(
            'Shr_Def_Id',
            array(
                'name' => 'Shr_Def_Role',
                'type' => 'raw',
                'value' => $model->shrDefRole->Description
            ),
            'Shr_Def_Equ_remn',
            'Shr_Def_Blank_Tape_remn',
            'Shr_Def_Neigh_Rgts',
            'Shr_Def_Excl_Rgts',
            array(
                'name' => 'Active',
                'type' => 'raw',
                'value' => $model->Active == 1 ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>'
            ),
        ),
    ));
    ?>
</div>



