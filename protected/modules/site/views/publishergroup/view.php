<?php
/* @var $this PublishergroupController */
/* @var $model PublisherGroup */
if ($model->Pub_Group_Is_Publisher == '1') {
    $role = 'Publisher';
} elseif ($model->Pub_Group_Is_Producer == '1') {
    $role = 'Producer';
}

$this->title = "View {$role} Group: {$model->Pub_Group_Name}";
$this->breadcrumbs = array(
    "{$role} Groups" => array('publishergroup/index/role/' . lcfirst($role)),
    "View {$role} Group",
);
?>
<?php if ($export) { ?>
    <h3 class="text-center"><?php echo "$role Group $this->title" ?></h3>
<?php } ?>

    <div class="user-view">
    <p>
        <?php
        if ($export == false) {
            $this->widget(
                    'booster.widgets.TbButton', array(
                'label' => 'Update',
                'url' => array('update', 'id' => $model->Pub_Group_Id),
                'buttonType' => 'link',
                'context' => 'primary',
//                    'visible' => UserIdentity::checkAccess(Yii::app()->user->name)
                    )
            );
            echo "&nbsp;&nbsp;";
            $this->widget(
                    'application.components.MyTbButton', array(
                'label' => 'Delete',
                'url' => array('delete', 'id' => $model->Pub_Group_Id),
                'buttonType' => 'link',
                'context' => 'danger',
                'htmlOptions' => array('confirm' => 'Are you sure you want to delete this item?'),
                'visible' => UserIdentity::checkAccess(Yii::app()->user->name)
                    )
            );
            echo "&nbsp;&nbsp;";
            $this->widget(
                    'booster.widgets.TbButton', array(
                'label' => 'Download',
                'url' => array('view', 'id' => $model->Pub_Group_Id, 'export' => 'PDF'),
                'buttonType' => 'link',
                'context' => 'warning',
//                    'visible' => UserIdentity::checkAccess(Yii::app()->user->name)
                    )
            );
        }
        ?>
    </p>
    <?php
        $file_path = $model->getFilePath();
        $photo = CHtml::link(CHtml::image($file_path, 'No Profile Picture', array('height' => '110px', 'width' => '110px')), $file_path, array('class' => 'popup-prof'));
        $this->widget("ext.magnific-popup.EMagnificPopup", array('target' => ".popup-prof")); 
        
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $model,
        'htmlOptions' => array('class' => 'table table-striped table-bordered'),
        'attributes' => array(
            'Pub_Group_Name',
//            array(
//                'name' => 'Pub_Group_Is_Publisher',
//                'type' => 'raw',
//                'value' => ($model->Pub_Group_Is_Publisher == 1) ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>'
//            ),
//            array(
//                'name' => 'Pub_Group_Is_Producer',
//                'type' => 'raw',
//                'value' => ($model->Pub_Group_Is_Producer == 1) ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>'
//            ),
            array(
                'name' => 'Pub_Group_Photo',
                'type' => 'raw',
                'value' => $photo
            ),
            'Pub_Group_Internal_Code',
            'Pub_Group_IPI_Name_Number',
            'Pub_Group_IPN_Base_Number',
//            'Pub_Group_IPD_Number',
            'Pub_Group_Date',
            'Pub_Group_Place',
            array(
                'name' => 'Pub_Group_Country_Id',
                'value' => isset($model->pubGroupCountry->Country_Name) ? $model->pubGroupCountry->Country_Name : 'Not set'
            ),
            array(
                'name' => 'Pub_Group_Legal_Form_Id',
                'value' => isset($model->pubGroupLegalForm->Legal_Form_Name) ? $model->pubGroupLegalForm->Legal_Form_Name : 'Not set'
            ),
            array(
                'name' => 'Pub_Group_Language_Id',
                'value' => isset($model->pubGroupLanguage->Lang_Name) ? $model->pubGroupLanguage->Lang_Name : 'Not set'
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



