<?php
/* @var $this GroupController */
/* @var $model Group */
if($model->Group_Is_Author == '1'){
    $role = 'Author';
}elseif($model->Group_Is_Performer == '1'){
    $role = 'Performer';
}

$this->title = 'View #' . $model->Group_Id;
$this->breadcrumbs = array(
    "{$role} Groups" => array('group/index/role/'.lcfirst($role)),
    'View ' . 'Group',
);
?>
<div class="user-view">
    <p>
        <?php
        $this->widget(
                'booster.widgets.TbButton', array(
                    'label' => 'Update',
                    'url' => array('update', 'id' => $model->Group_Id),
                    'buttonType' => 'link',
                    'context' => 'primary',
//                    'visible' => UserIdentity::checkAccess(Yii::app()->user->name)
                )
        );
        echo "&nbsp;&nbsp;";
        $this->widget(
                'booster.widgets.TbButton', array(
                    'label' => 'Delete',
                    'url' => array('delete', 'id' => $model->Group_Id),
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
            'Group_Name',
//            array(
//                'name' => 'Group_Is_Author',
//                'type' => 'raw',
//                'value' => ($model->Group_Is_Author == 1) ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>'
//            ),
//            array(
//                'name' => 'Group_Is_Performer',
//                'type' => 'raw',
//                'value' => ($model->Group_Is_Performer == 1) ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>'
//            ),
            'Group_Internal_Code',
            'Group_IPN_Base_Number',
            'Group_IPI_Name_Number',
            'Group_IPN_Number',
            'Group_Date',
            'Group_Place',
            array(
                'name' => 'Group_Country_Id',
                'value' => isset($model->groupCountry->Country_Name) ? $model->groupCountry->Country_Name : 'Not set'
            ),
            array(
                'name' => 'Group_Legal_Form_Id',
                'value' => isset($model->groupLegalForm->Legal_Form_Name) ? $model->groupLegalForm->Legal_Form_Name : 'Not set'
            ),
            array(
                'name' => 'Group_Language_Id',
                'value' => isset($model->groupLanguage->Lang_Name) ? $model->groupLanguage->Lang_Name : 'Not set'
            ),
            array(
                'name' => 'Status',
                'type' => 'raw',
                'value' => $model->status
            ),
        ),
    ));
    ?>
</div>



