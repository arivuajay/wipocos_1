<?php
/* @var $this SocietyController */
/* @var $model Society */

$this->title = 'View Society: ' . $model->Society_Code;
$this->breadcrumbs = array(
    'Societies' => array('index'),
    'View ' . 'Society',
);
?>
<div class="user-view">
    <p>
        <?php
        $this->widget(
                'application.components.MyActionButton', array(
                    'label' => 'Update',
                    'url' => array('update', 'id' => $model->Society_Id),
                    'buttonType' => 'link',
                    'context' => 'primary',
//                    
                )
        );
        echo "&nbsp;&nbsp;";
        $this->widget(
                'application.components.MyTbButton', array(
                    'label' => 'Delete',
                    'url' => array('delete', 'id' => $model->Society_Id),
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
            'Society_Id',
            'Society_Code',
            array(
                'name' => 'Society_Abbr_Id',
                'value' => $model->socOrg->Org_Abbrevation
            ),
            array(
                'name' => 'Society_Logo_File',
                'type' => 'raw',
                'value' => CHtml::image($model->getFilePath(), 'logo', array('height' => '110px', 'width' => '110px'))
            ),
            'Society_Mailing_Address',
            array(
                'name' => 'Society_Country_Id',
                'value' => isset($model->socCountry->Country_Name) ? $model->socCountry->Country_Name : 'Not Set'
            ),
            array(
                'name' => 'Society_Territory_Id',
                'value' => isset($model->socTerritory->Territory_Name) ? $model->socTerritory->Territory_Name : 'Not Set'
            ),
            array(
                'name' => 'Society_Region_Id',
                'value' => isset($model->socRegion->Region_Name) ? $model->socRegion->Region_Name : 'Not Set'
            ),
            array(
                'name' => 'Society_Profession_Id',
                'value' => isset($model->socProfession->Profession_Name) ? $model->socProfession->Profession_Name : 'Not Set'
            ),
            array(
                'name' => 'Society_Role_Id',
                'value' => isset($model->socRole->Description) ? $model->socRole->Description : 'Not Set'
            ),
            array(
                'name' => 'Society_Hirearchy_Id',
                'value' => isset($model->socHirearchy->Hierarchy_Name) ? $model->socHirearchy->Hierarchy_Name : 'Not Set'
            ),
            array(
                'name' => 'Society_Payment_Id',
                'value' => isset($model->socPayment->Paymode_Name) ? $model->socPayment->Paymode_Name : 'Not Set'
            ),
            array(
                'name' => 'Society_Type_Id',
                'value' => isset($model->socType->Type_Name) ? $model->socType->Type_Name : 'Not Set'
            ),
            'Society_Factor',
            array(
                'name' => 'Society_Doc_Type_Id',
                'value' => isset($model->socDocType->Doc_Type_Name) ? $model->socDocType->Doc_Type_Name : 'Not Set'
            ),
            array(
                'name' => 'Society_Doc_Id',
                'value' => isset($model->socDoc->Doc_Name) ? $model->socDoc->Doc_Name : 'Not Set'
            ),
            'Society_Duration',
            'Society_CopyRight',
            'Society_RelatedRights',
            array(
                'name' => 'Society_Currency_Id',
                'value' => isset($model->socCurrency->Currency_Name) ? $model->socCurrency->Currency_Name : 'Not Set'
            ),
            'Society_Rate',
            'Society_Main_Performer_Id',
            'Society_Producer_Id',
            'Society_Subscription',
            array(
                'name' => 'Active',
                'type' => 'raw',
                'value' => $model->Active == 1 ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>'
            ),
        ),
    ));
    ?>
</div>



