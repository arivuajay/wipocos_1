<?php
/* @var $this ProducerLabelOwnerController */
/* @var $model ProducerLabelOwner */
/* @var $form CActiveForm */
$themeUrl = $this->themeUrl;
$cs = Yii::app()->getClientScript();
$cs_pos_end = CClientScript::POS_END;




$labels = CHtml::listData(MasterLabel::model()->isActive()->findAll(), 'Master_Label_Id', 'Label_Name');
$producers = CHtml::listData(ProducerAccount::model()->findAll(), 'Pro_Acc_Id', 'Pro_Corporate_Name');
?>

<div class="row">
    <div class="col-lg-12 col-xs-12">
        <div class="box box-primary">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'producer-label-owner-form',
                'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                    'afterValidate' => 'js:InsertLabel'
                ),
                'enableAjaxValidation' => true,
            ));
            ?>
            <div class="box-body">

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Label_Id', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $form->dropDownList($model, 'Label_Id', $labels, array('class' => 'form-control', 'prompt' => '')); ?>
                        <?php echo $form->error($model, 'Label_Id'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Label_Owner_From', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $form->textField($model, 'Label_Owner_From', array('class' => 'form-control date')); ?>
                        <?php echo $form->error($model, 'Label_Owner_From'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Label_Owner_To', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $form->textField($model, 'Label_Owner_To', array('class' => 'form-control date')); ?>
                        <?php echo $form->error($model, 'Label_Owner_To'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Pro_Acc_Id', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $form->dropDownList($model, 'Pro_Acc_Id', $producers, array('class' => 'form-control', 'prompt' => '')); ?>
                        <?php echo $form->error($model, 'Pro_Acc_Id'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Label_Share', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $form->textField($model, 'Label_Share', array('class' => 'form-control', 'size' => 10, 'maxlength' => 3)); ?>
                        <?php echo $form->error($model, 'Label_Share'); ?>
                    </div>
                </div>

            </div>
            <div class="box-footer">
                <div class="form-group">
                    <div class="col-sm-0 col-sm-offset-2">
                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Insert' : 'Save', array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'id' => 'label_insert')); ?>
                    </div>
                </div>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-xs-12">
        <div class="box box-primary">
            <?php echo CHtml::form(array('/site/producerlabelowner/insertlabel'), 'post', array('role' => 'form', 'class' => 'form-horizontal', 'id' => 'label_form')) ?>
            <div class="box-header">
                <h3 class="box-title">Labels</h3>
            </div>
            <div class="box-body no-padding">
                <table class="table" id="label_list">
                    <thead>
                        <tr>
                            <th>Label</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Producer</th>
                            <th>Share</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="box-footer">
                <div class="form-group">
                    <div class="col-sm-6">
                        <?php echo CHtml::submitButton('Save', array('class' => 'btn btn-primary', 'id' => 'label_ajax_submit', 'disabled' => true))?>
                    </div>
                </div>
            </div>
            <div class="overlay loader"></div>
            <div class="loading-img loader"></div>
            <?php echo CHtml::endForm(); ?>
        </div>
    </div>
</div>

<?php
$js = <<< EOD
    $(document).ready(function () {
        $('.loader').hide();
        $('.date').datepicker({format: 'yyyy-mm-dd'});
        $('body').on('click','.row-delete', function(){
            $(this).closest('tr').remove();
            checkShare();
        });
    });

    function InsertLabel(form, data, hasError) {
        if (hasError == false) {
            $("#label_insert").attr("disabled", true);
            $('.loader').show();
            var form_data = form.serializeArray();
            var rowCount = $('#label_list tbody tr').length;
            var tr = '<tr>';
            $.each(form_data, function (key, value) {
                tr += '<td>';
                var name = value['name'];
                name = name.replace("[","[" + rowCount + "][");
                //set hidden form values
                tr += '<input type="hidden" name="' + name + '" value="' + value['value'] + '"/>';

                var td_content = '';
                if (value['name'] == "ProducerLabelOwner[Label_Share]") {
                    td_content = '<span class="badge share_value" data-share="' + value['value'] + '">' + value['value'] + '%</span>';
                } else if (value['name'] == "ProducerLabelOwner[Label_Id]" || value['name'] == "ProducerLabelOwner[Pro_Acc_Id]") {
                    td_content = $('select[name="' + value['name'] + '"] option:selected').text();
                } else {
                    td_content = value['value'];
                }
                tr += td_content;
                tr += '</td>';
            });
            tr += '<td><a class="row-delete" href="javascript:void(0)"><i class="glyphicon glyphicon-trash"></i></a></td>';
            tr += '</tr>';
            $('#label_list tbody').append(tr);
            checkShare();
            $('#producer-label-owner-form')[0].reset();
            $('.loader').hide();
            $("#label_insert").removeAttr("disabled");
        }
        return false;
    }
    
    function checkShare(){
        _val = 0;
        $('.share_value').each(function(){
            _val += parseFloat($(this).data('share'));
        });
        $("#label_ajax_submit").attr("disabled", _val != '100');
    }
EOD;
Yii::app()->clientScript->registerScript('_form', $js);
?>