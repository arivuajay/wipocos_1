<?php
/* @var $this MasterinternationalnumberController */
/* @var $model MasterInternationalNumber */

$this->title = 'View Master International Number: ' . $model->International_Number_Type;
$this->breadcrumbs = array(
    'Master International Numbers' => array('index'),
    'View ' . 'MasterInternationalNumber',
);
?>
<div class="user-view">
    <p>
        <?php
        $this->widget(
                'application.components.MyActionButton', array(
                    'label' => 'Update',
                    'url' => array('update', 'id' => $model->Master_International_Id),
                    'buttonType' => 'link',
                    'context' => 'primary',
//                    
                )
        );
        echo "&nbsp;&nbsp;";
        $this->widget(
                'application.components.MyTbButton', array(
                    'label' => 'Delete',
                    'url' => array('delete', 'id' => $model->Master_International_Id),
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
            'Master_International_Id',
            'International_Number_Type',
            array(
                'name' => 'Active',
                'type' => 'raw',
                'value' => $model->Active == 1 ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>'
            ),
        ),
    ));
    ?>
</div>



