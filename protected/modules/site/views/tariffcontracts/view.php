<?php
/* @var $this TariffcontractsController */
/* @var $model TariffContracts */

$this->title = 'View Contract: ' . $model->tarfContUser->User_Cust_Code;
$this->breadcrumbs = array(
    'Contract' => array('index'),
    'View ' . 'TariffContracts',
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
                'url' => array('update', 'id' => $model->Tarf_Cont_Id),
                'buttonType' => 'link',
                'context' => 'primary',
                    )
            );
            echo "&nbsp;&nbsp;";
            $this->widget(
                    'application.components.MyTbButton', array(
                'label' => 'Delete',
                'url' => array('delete', 'id' => $model->Tarf_Cont_Id),
                'buttonType' => 'link',
                'context' => 'danger',
                'htmlOptions' => array('confirm' => 'Are you sure you want to delete this item?'),
                    )
            );
            echo "&nbsp;&nbsp;";
            $this->widget(
                    'application.components.MyTbButton', array(
                'label' => 'Download',
                'url' => array('view', 'id' => $model->Tarf_Cont_Id, 'export' => 'PDF'),
                'buttonType' => 'link',
                'context' => 'warning',
                    )
            );
            ?>
        </p>
    <?php }
    ?>
    <?php if ($export) { ?>
        <h3 class="text-center">Contract <?php echo $this->title ?></h3>
        <?php
    }
    ?>
    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $model,
        'htmlOptions' => array('class' => 'table table-striped table-bordered'),
        'attributes' => array(
            'Tarf_Cont_Internal_Code',
//            'Tarf_Invoice',
            array(
                'name' => 'Tarf_Cont_User_Id',
                'value' => $model->tarfContUser->User_Cust_Code
            ),
            array(
                'name' => 'Tarf_Cont_Region_Id',
                'value' => $model->tarfContRegion->Region_Name
            ),
            'Tarf_Cont_District',
            'Tarf_Cont_Area',
            array(
                'name' => 'Tarf_Cont_Tariff_Id',
                'value' => $model->tarfContTariff->Tarif_Description
            ),
            array(
                'name' => 'Tarf_Cont_Insp_Id',
                'value' => $model->tarfContInsp->Insp_Name
            ),
            'Tarf_Cont_Balance',
            'Tarf_Cont_Amt_Pay',
            'Tarf_Cont_From',
            'Tarf_Cont_To',
            'Tarf_Cont_Sign_Date',
            array(
                'name' => 'Tarf_Cont_Pay_Id',
                'value' => $model->getPayment()
            ),
            'Tarf_Cont_Portion',
            'Tarf_Cont_Comment',
            array(
                'name' => 'Tarf_Cont_Event_Id',
                'value' => $model->tarfContEvent->Evt_Type_Name
            ),
            'Tarf_Cont_Event_Date',
            'Tarf_Cont_Event_Comment',
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



