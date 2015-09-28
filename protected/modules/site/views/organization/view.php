<?php
/* @var $this OrganizationController */
/* @var $model Organization */

$this->title = 'View Organization: ' . $model->Org_Abbrevation;
$this->breadcrumbs = array(
    'Organizations' => array('index'),
    'View ' . 'Organization',
);
?>
<div class="user-view">
    <p>
        <?php
        $this->widget(
                'application.components.MyTbButton', array(
                    'label' => 'Update',
                    'url' => array('update', 'id' => $model->Org_Id),
                    'buttonType' => 'link',
                    'context' => 'primary',
//                    
                )
        );
        echo "&nbsp;&nbsp;";
        $this->widget(
                'application.components.MyTbButton', array(
                    'label' => 'Delete',
                    'url' => array('delete', 'id' => $model->Org_Id),
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
//            'Org_Id',
            'Org_Code',
            'Org_Abbrevation',
            array(
                'name' => 'Org_Nation_Id',
                'value' => isset($model->orgNation->Nation_Name) ? $model->orgNation->Nation_Name : ''
            ),
            array(
                'name' => 'Org_Country_Id',
                'value' => isset($model->orgCountry->Country_Name) ? $model->orgCountry->Country_Name : ''
            ),
            array(
                'name' => 'Org_Currency_Id',
                'value' => isset($model->orgCurrency->Currency_Name) ? $model->orgCurrency->Currency_Name : ''
            ),
            array(
                'name' => 'Org_Society_Type_Id',
                'value' => isset($model->Org_Society_Type_Id) ? $model->getSocialType($model->Org_Society_Type_Id) : ''
            ),
            'Org_Address',
            'Org_Telephone',
            'Org_Email',
            'Org_Fax',
            'Org_Website',
            'Org_Bank_Account',
            'Org_Related_Rights',
            'Org_Administrative_Cost',
            array(
                'name' => 'Active',
                'type' => 'raw',
                'value' => $model->Active == 1 ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>'
            ),
        ),
    ));
    ?>
</div>



