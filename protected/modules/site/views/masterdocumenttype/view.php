<?php
/* @var $this MasterdocumenttypeController */
/* @var $model MasterDocumentType */

$this->title = 'View Master Document Type: ' . $model->Doc_Type_Name;
$this->breadcrumbs = array(
    'Master Document Types' => array('index'),
    'View ' . 'MasterDocumentType',
);
?>

<div class="user-view">
    <p>
        <?php
        $this->widget(
                'booster.widgets.TbButton', array(
                    'label' => 'Update',
                    'url' => array('update', 'id' => $model->Master_Doc_Type_Id),
                    'buttonType' => 'link',
                    'context' => 'primary',
//                    'visible' => UserIdentity::checkAccess(Yii::app()->user->name)
                )
        );
        echo "&nbsp;&nbsp;";
        $this->widget(
                'application.components.MyTbButton', array(
                    'label' => 'Delete',
                    'url' => array('delete', 'id' => $model->Master_Doc_Type_Id),
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
            'Master_Doc_Type_Id',
            'Doc_Type_Name',
            'Doc_Type_Comment',
            array(
                'label' => MasterDocumentType::model()->getAttributeLabel('Doc_Type_Status_Id'),
                'value' => $model->docTypeStatus->Document_Sts_Name
            ),
            array(
                'label' => MasterDocumentStatus::model()->getAttributeLabel('Active'),
                'type' => 'raw',
                'value' => ($model->Active == 1) ? '<i class="fa fa-circle text-green" title="Active"></i>' : '<i title="In-Active" class="fa fa-circle text-red"></i>'
            ),
        ),
    ));
    ?>
</div>



