<?php
/* @var $this InternalcodegenerateController */
/* @var $model InternalcodeGenerate */
/* @var $form CActiveForm */
$this->title = 'Code Definition Master';
$this->breadcrumbs = array('Code Definition Master');
?>
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'internalcode-generate-form',
    'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
    'enableAjaxValidation' => false,
        ));
?>

<div class="row">
    <div class="col-lg-12 col-md-12" id="resources-block">
        <table class="table table-striped table-bordered">
            <thead class="bg-green">
            <td align="center" width="25%"><strong><?php echo InternalcodeGenerate::model()->getAttributeLabel('Gen_User_Type') ?></strong></td>
            <td align="center" width="25%"><strong><?php echo InternalcodeGenerate::model()->getAttributeLabel('Gen_Soc_Id') ?></strong></td>
            <td align="center" width="25%"><strong><?php echo InternalcodeGenerate::model()->getAttributeLabel('Gen_Prefix') ?></strong></td>
            <td align="center" width="25%"><strong><?php echo InternalcodeGenerate::model()->getAttributeLabel('Gen_Inter_Code') ?></strong></td>
            </thead>
            <tbody>
                <?php
                if (!empty($int_codes)) {
                    foreach ($int_codes as $int_code) {
                        echo $form->hiddenField($model, 'Gen_Inter_Code_Id', array('name' => 'InternalcodeGenerate[' . $int_code->Gen_Inter_Code_Id . '][Gen_Inter_Code_Id]','value' => $int_code->Gen_Inter_Code_Id));
                        echo $form->hiddenField($model, 'Gen_Code_Pad', array('name' => 'InternalcodeGenerate[' . $int_code->Gen_Inter_Code_Id . '][Gen_Code_Pad]','value' => $int_code->Gen_Code_Pad));
                        echo '<tr>';
                        echo '<td>' . InternalcodeGenerate::model()->getUsertype($int_code->Gen_User_Type) . '</td>';
                        echo '<td>';
                        echo $form->textField($model, 'Gen_Soc_Id', array('class' => 'form-control tabular_validate', 'name' => 'InternalcodeGenerate[' . $int_code->Gen_Inter_Code_Id . '][Gen_Soc_Id]', 'value' => $int_code->Gen_Soc_Id, 'id' => "InternalcodeGenerate_Gen_Soc_Id_{$int_code->Gen_Inter_Code_Id}", 'rel' => 'Gen_Soc_Id', 'pad' => $int_code->Gen_Code_Pad));
                        echo $form->error($model, 'Gen_Soc_Id');
                        echo '</td>';
                        echo '<td>';
                        echo $form->textField($model, 'Gen_Prefix', array('class' => 'form-control tabular_validate', 'name' => 'InternalcodeGenerate[' . $int_code->Gen_Inter_Code_Id . '][Gen_Prefix]', 'value' => $int_code->Gen_Prefix, 'id' => "InternalcodeGenerate_Gen_Prefix_{$int_code->Gen_Inter_Code_Id}", 'rel' => 'Gen_Prefix', 'pad' => $int_code->Gen_Code_Pad));
                        echo $form->error($model, 'Gen_Prefix');
                        echo '</td>';
                        echo '<td>';
                        echo $form->textField($model, 'Gen_Inter_Code', array('class' => 'form-control tabular_validate', 'name' => 'InternalcodeGenerate[' . $int_code->Gen_Inter_Code_Id . '][Gen_Inter_Code]', 'value' => $int_code->Gen_Inter_Code, 'id' => "InternalcodeGenerate_Gen_Inter_Code_{$int_code->Gen_Inter_Code_Id}", 'rel' => 'Gen_Inter_Code', 'pad' => $int_code->Gen_Code_Pad));
                        echo $form->error($model, 'Gen_Inter_Code');
                        echo '</td>';
                        echo '</tr>';
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12">
        <?php echo CHtml::button('Save', array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'id' => 'submit', 'data-smt' => 0)); ?>
        <?php echo CHtml::submitButton('Save', array('class' => 'hide', 'id' => 'virt_smt')); ?>
    </div>
</div>
<?php $this->endWidget(); ?>

<?php
$validate_url = Yii::app()->createUrl('/site/internalcodegenerate/validatedata');
$js = <<<EOD
    $(document).on('blur', '.tabular_validate',function(e){
        e.preventDefault();
        var id= $(this).attr('id');
        var name= $(this).attr('rel');
        var val= $.trim($(this).val());
        var pad= $(this).attr('pad');
        tabValidate(id, name, val, pad);
    });
    
    $(document).ready(function(){
        $('#submit').on('click', function(){
            $(this).data('smt', 1);
            tabValidate('', '', '', '');
        });
    });
        
    function tabValidate(id, name, val, pad){
        $.ajax({
            url:"$validate_url",
            type: "GET",
            data: 'value='+val+'&name='+ name+'&pad='+ pad,
            success :function(data){
                if($.trim(data))
                {   
                    if($('#'+id).hasClass('error')){
                        $('#'+id).next().remove();
                    }
                    $('#'+id).addClass('error');
                    $('#'+id).prev().addClass('error');
                    $('#'+id).after(data);
                }
                else
                {
                    $('#'+id).removeClass('error');
                    $('#'+id).prev().removeClass('error')
                    $('#'+id).next().remove()
                    $('#'+id).parent().addClass('success');
                }
                len = $('.errorMessage').length;
                if($('#submit').data('smt') == 1){
                    len == 0 ? $('#virt_smt').trigger('click') : $('#submit').data('smt', 0);
                }
            },
            error:function(){
//                alert("Something went wrong !!!");
            },
        });
    }
        
    
EOD;
Yii::app()->clientScript->registerScript('setup', $js);
?>
