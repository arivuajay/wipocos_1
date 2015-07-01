<?php
/* @var $this MasterlegalformController */
/* @var $model MasterLegalForm */

$this->title = 'View Master Legal Form: ' . $model->Legal_Form_Name;
$this->breadcrumbs = array(
    'Master Legal Forms' => array('index'),
    'View ' . 'MasterLegalForm',
);
?>

<div class="user-view">
    <p>
         <?php
        $this->widget(
                'application.components.MyTbButton', array(
                    'label' => 'Update',
                    'url' => array('update', 'id' => $model->Master_Legal_Form_Id),
                    'buttonType' => 'link',
                    'context' => 'primary',
//                    
                )
        );
        echo "&nbsp;&nbsp;";
        $this->widget(
                'application.components.MyTbButton', array(
                    'label' => 'Delete',
                    'url' => array('delete', 'id' => $model->Master_Legal_Form_Id),
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
            'Master_Legal_Form_Id',
            'Legal_Form_Name',
            array(
                'label' => MasterLegalForm::model()->getAttributeLabel('Active'),
                'type' => 'raw',
                'value' => ($model->Active == 1) ? '<i class="fa fa-circle text-green" title="Active"></i>' : '<i title="In-Active" class="fa fa-circle text-red"></i>'
            ),
        ),
    ));
    ?>
</div>



