<?php
$this->title = 'Role Privilage';
$this->breadcrumbs = array(
    'Users' => array('/site/masterrole/index'),
    $this->title
);
?>
<div class="user-create">

    <div class="master-role-form">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'role-privl-form',
            'htmlOptions' => array('role' => 'form')
        ));
        ?>
        <div class="row">
            <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <?php echo $form->labelEx($model, 'Master_Role_ID') ?>
                <?php $names = CHtml::listData(MasterRole::model()->findAll(array('order' => 'Role_Code')), 'Master_Role_ID', 'Description') ?>
                <?php echo $form->dropDownList($model, 'Master_Role_ID', $names, array(
                    'prompt' => 'Choose Role', 
                    'class' => 'form-control',
                    'onchange' => '{'
                    . '$("#AuthResources_Master_Module_ID").val("");'
                    . '$("#resources-block").html("");'
                    . '}'
                    )); ?>
            </div>
            </div>
            
            <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <?php echo $form->labelEx($model, 'Master_Module_ID') ?>
                <?php $modules = CHtml::listData(MasterModule::model()->findAll(array('order' => 'Module_Code')), 'Master_Module_ID', 'Description') ?>
                <?php echo $form->dropDownList($model, 'Master_Module_ID', $modules, array(
                    'prompt' => 'Choose Module', 
                    'class' => 'form-control',
                    'onchange' => '{'
                    . 'if($("#AuthResources_Master_Role_ID").val() != "" && this.value != ""){'
                        . '$("#ajax-loader").show();'
                        . '$.get("' . Yii::app()->createUrl("site/authresources/getscreensbymodule") . '", { 
                            type: "role", 
                            mid: this.value, 
                            id: $("#AuthResources_Master_Role_ID").val() }
                            ).done(function( data ){
                                $("#ajax-loader").hide();
                                $("#resources-block").html( data );
                           });'
                        .'}else{'
                        . '$("#resources-block").html("");'
                        .'}'
                    .'}'
                    )); ?>
            </div>
            </div>
        </div>
                <?php $this->endWidget(); ?>

        <div id="ajax-loader" class="text-center" style="display: none">
            <?= CHtml::image($this->themeUrl.'/img/ajax-loader1.gif'); ?>
        </div>

        <div id="resources-block">
        </div>


    </div>

</div>
