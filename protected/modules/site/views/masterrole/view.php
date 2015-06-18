<?php
/* @var $this MasterroleController */
/* @var $model MasterRole */

$this->title = 'View Master Role: ' . $model->Role_Code;
$this->breadcrumbs = array(
    'Master Roles' => array('index'),
    'View ' . 'MasterRole',
);
?>

<div class="user-view">
    <p>
         <?php
        $this->widget(
                'booster.widgets.TbButton', array(
                    'label' => 'Update',
                    'url' => array('update', 'id' => $model->Master_Role_ID),
                    'buttonType' => 'link',
                    'context' => 'primary',
//                    'visible' => UserIdentity::checkAccess(Yii::app()->user->name)
                )
        );
        echo "&nbsp;&nbsp;";
        $this->widget(
                'application.components.MyTbButton', array(
                    'label' => 'Delete',
                    'url' => array('delete', 'id' => $model->Master_Role_ID),
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
            'Master_Role_ID',
            'Role_Code',
            'Description',
            array(
                'label' => MasterRole::model()->getAttributeLabel('is_Admin'),
                'type' => 'raw',
                'value' => ($model->is_Admin == 1) ? '<i class="fa fa-circle text-green" title="Yes"></i>' : '<i title="No" class="fa fa-circle text-red"></i>'
            ),
            array(
                'label' => MasterRole::model()->getAttributeLabel('Active'),
                'type' => 'raw',
                'value' => ($model->Active == 1) ? '<i class="fa fa-circle text-green" title="Active"></i>' : '<i title="In-Active" class="fa fa-circle text-red"></i>'
            ),
        ),
    ));
    ?>
</div>



