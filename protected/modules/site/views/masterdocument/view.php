<?php
/* @var $this MasterdocumentController */
/* @var $model MasterDocument */

$this->title = 'View Master Document: ' . $model->Doc_Name;
$this->breadcrumbs = array(
    'Master Documents' => array('index'),
    'View ' . 'MasterDocument',
);
?>

<div class="user-view">
    <p>
        <?php
        $this->widget(
                'application.components.MyTbButton', array(
                    'label' => 'Update',
                    'url' => array('update', 'id' => $model->Master_Doc_Id),
                    'buttonType' => 'link',
                    'context' => 'primary',
//                    
                )
        );
        echo "&nbsp;&nbsp;";
        $this->widget(
                'application.components.MyTbButton', array(
                    'label' => 'Delete',
                    'url' => array('delete', 'id' => $model->Master_Doc_Id),
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
            'Master_Doc_Id',
            'Doc_Name',
            'Doc_Comment',
            array(
                'label' => MasterDocument::model()->getAttributeLabel('Active'),
                'type' => 'raw',
                'value' => ($model->Active == 1) ? '<i class="fa fa-circle text-green" title="Active"></i>' : '<i title="In-Active" class="fa fa-circle text-red"></i>'
            ),
        ),
    ));
    ?>
</div>



