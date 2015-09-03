<?php
$this->title = 'View User: ' . $model->name;
$this->breadcrumbs = array(
    'Users' => array('index'),
    'View User',
);
?>

<div class="user-view">
    <p>
         <?php
        $this->widget(
//                'application.components.MyTbButton', array(
                'booster.widgets.TbButton', array(
                    'label' => 'Update',
                    'url' => array('update', 'id' => $model->id),
                    'buttonType' => 'link',
                    'context' => 'primary',
                    'visible' => UserIdentity::checkPrivilages($model->roleMdl->Rank) && UserIdentity::checkAccess(NULL, "user", "update")
//                    
                )
        );
        echo "&nbsp;&nbsp;";
        $this->widget(
                'booster.widgets.TbButton', array(
                    'label' => 'Delete',
                    'url' => array('delete', 'id' => $model->id),
                    'buttonType' => 'link',
                    'context' => 'danger',
                    'htmlOptions' => array('confirm' => 'Are you sure you want to delete this item?'),
                    'visible' => UserIdentity::checkPrivilages($model->roleMdl->Rank) && UserIdentity::checkAccess(NULL, "user", "delete")
                )
        );
        ?>
    </p>
    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $model,
        'htmlOptions' => array('class' => 'table table-striped table-bordered'),
        'attributes' => array(
//            'id',
            array(
                'label' => $model->getAttributeLabel('society_id'),
                'value' => $model->soc->Societyname
            ),
            'username',
            'name',
            array(
                'label' => $model->getAttributeLabel('email'),
                'type' => 'raw',
                'value' => CHtml::link($model->email, "mailto:{$model->email}")
            ),
            array(
                'label' => $model->getAttributeLabel('role'),
                'value' => $model->roleMdl->Description,
            ),
            array(
                'label' => $model->getAttributeLabel('status'),
                'value' => $model->status == '1' ? 'Active' : 'In-Active'
            ),
        ),
    ));
    ?>
</div>