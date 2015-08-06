<?php
/* @var $this ContractinvoiceController */
/* @var $model ContractInvoice */

$this->title = 'View ContractInvoice:' . $model->Inv_Id;
$this->breadcrumbs = array(
    'Invoices' => array('index'),
    'View ' . 'ContractInvoice',
);
?>
<div class="user-view">
    <?php if ($export == false) {
        ?>
        <p>
            <?php
            $this->widget(
                    'application.components.MyTbButton', array(
                'label' => 'Update',
                'url' => array('update', 'id' => $model->Inv_Id),
                'buttonType' => 'link',
                'context' => 'primary',
                    )
            );
            echo "&nbsp;&nbsp;";
            $this->widget(
                    'application.components.MyTbButton', array(
                'label' => 'Delete',
                'url' => array('delete', 'id' => $model->Inv_Id),
                'buttonType' => 'link',
                'context' => 'danger',
                'htmlOptions' => array('confirm' => 'Are you sure you want to delete this item?'),
                    )
            );
            echo "&nbsp;&nbsp;";
            $this->widget(
                    'application.components.MyTbButton', array(
                'label' => 'Download',
                'url' => array('view', 'id' => $model->Inv_Id, 'export' => 'PDF'),
                'buttonType' => 'link',
                'context' => 'warning',
                    )
            );
            ?>
        </p>
    <?php }
    ?>
    <?php if ($export) { ?>
        <h3 class="text-center">ContractInvoice <?php echo $this->title ?></h3>
        <?php
    }
    ?>
    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $model,
        'htmlOptions' => array('class' => 'table table-striped table-bordered'),
        'attributes' => array(
            array(
                'name' => 'Tarf_Cont_Id',
                'value' => $model->tarfCont->Tarf_Cont_Internal_Code
            ),
            array(
                'name' => 'Inv_Repeat_Id',
                'value' => $model->getRepeat()
            ),
            'Inv_Repeat_Count',
            'Inv_Next_Date',
            array(
                'name' => 'Created_By',
                'value' => isset($model->createdBy->name) ? $model->createdBy->name : ''
            ),
            array(
                'name' => 'Created_Date',
                'value' => $model->Created_Date
            ),
            array(
                'name' => 'Updated_By',
                'value' => isset($model->updatedBy->name) ? $model->updatedBy->name : ''
            ),
            array(
                'name' => 'Updated Date',
                'value' => $model->Rowversion
            ),
        ),
    ));
    ?>
</div>



