<?php
$this->title = 'User Privilage';
$this->breadcrumbs = array(
    'Users' => array('/site/user/index'),
    $this->title
);
?>
<div class="user-create">

    <div class="master-role-form">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'user-privl-form',
            'htmlOptions' => array('role' => 'form')
        ));
        ?>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Master_User_ID') ?>
                    <?php $names = CHtml::listData(User::model()->findAll(array('order' => 'name')), 'id', 'username') ?>
                    <?php
                    echo $form->dropDownList($model, 'Master_User_ID', $names, array(
                        'prompt' => 'Choose User',
                        'class' => 'form-control',
                        'onchange' => '{'
                        . '$("#AuthResources_Master_Module_ID").val("");'
                        . '$("#resources-block").html("");'
                        . '}'
                    ));
                    ?>
                </div>
            </div>

            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Master_Module_ID') ?>
                    <?php $modules = Myclass::getMasterModule() ?>
                    <?php
                    echo $form->dropDownList($model, 'Master_Module_ID', $modules, array(
                        'prompt' => 'Choose Module',
                        'class' => 'form-control',
                        'onchange' => '{'
                        . 'if($("#AuthResources_Master_User_ID").val() != "" && this.value != ""){'
                        . '$("#ajax-loader").show();'
                        . '$.get("' . Yii::app()->createUrl("site/authresources/getscreensbymodule") . '", { 
                            type: "user", 
                            mid: this.value, 
                            id: $("#AuthResources_Master_User_ID").val() }
                            ).done(function( data ){
                                $("#ajax-loader").hide();
                                $("#resources-block").html( data );
                           });'
                        . '}else{'
                        . '$("#resources-block").html("");'
                        . '}'
                        . '}'
                    ));
                    ?>
                </div>
            </div>
        </div>
        <?php $this->endWidget(); ?>

        <div id="ajax-loader" class="text-center" style="display: none">
            <?= CHtml::image($this->themeUrl . '/img/ajax-loader1.gif'); ?>
        </div>

        <div id="resources-block">
        </div>
    </div>
</div>
<?php
$js = <<< EOD
    $(document).ready(function(){
        $("body").on('click', '.all_check', function(){
            _class = $(this).data('check');
            $('.'+_class).prop('checked', this.checked);    
        });
    });
EOD;
Yii::app()->clientScript->registerScript('_user_base', $js);
?>
