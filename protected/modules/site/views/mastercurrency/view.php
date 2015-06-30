<?php
/* @var $this MastercurrencyController */
/* @var $model MasterCurrency */

$this->title = 'View Master Currency: ' . $model->Master_Crncy_Id;
$this->breadcrumbs = array(
    'Master Currencies' => array('index'),
    'View ' . 'MasterCurrency',
);
?>
<div class="user-view">
    <p>
        <?php
        $this->widget(
                'application.components.MyActionButton', array(
                    'label' => 'Update',
                    'url' => array('update', 'id' =>  $model->Master_Crncy_Id ),
                    'buttonType' => 'link',
                    'context' => 'primary',
//                    
                )
        );
        echo "&nbsp;&nbsp;";
        $this->widget(
                'application.components.MyActionButton', array(
                    'label' => 'Delete',
                    'url' => array('delete', 'id' =>  $model->Master_Crncy_Id ),
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
            'Master_Crncy_Id',
            'Currency_Code',
            'Currency_Name',
            array(
                'name' => 'Active',
                'type' => 'raw',
                'value' => $model->Active == 1 ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>'
            ),
        ),
    ));
    ?>
</div>



