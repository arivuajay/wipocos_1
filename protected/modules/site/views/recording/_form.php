<?php
/* @var $this RecordingController */
/* @var $model Recording */
/* @var $form CActiveForm */
/**/
$themeUrl = $this->themeUrl;
$cs = Yii::app()->getClientScript();
$cs_pos_end = CClientScript::POS_END;




$cs->registerScriptFile($themeUrl . '/js/datatables/jquery.dataTables.js', $cs_pos_end);
$cs->registerScriptFile($themeUrl . '/js/datatables/dataTables.bootstrap.js', $cs_pos_end);

$languages = Myclass::getMasterLanguage();
$types = Myclass::getMasterType();
$countries = Myclass::getMasterCountry();
$doc_status = CHtml::listData(MasterDocumentStatus::model()->findAll(array('order' => 'Document_Sts_Code')), 'Master_Document_Sts_Id', 'Document_Sts_Name');
//$doc_status = CHtml::listData(MasterDocumentStatus::model()->isActive()->findAll(array('order' => 'Document_Sts_Code')), 'Master_Document_Sts_Id', 'Document_Sts_Name');
$recording_types = Myclass::getMasterRecordType();
$labels = Myclass::getMasterLabel();
?>

<div class="row">
    <div class="col-lg-12 col-xs-12">

        <?php
        $other_tab_validation = $rgt_tab_validation = true;
        if (!$model->isNewRecord) {
            $other_tab_validation = !empty($right_holder_exists);
        } else {
            $other_tab_validation = $rgt_tab_validation = false;
        }
        ?>
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li><a id="a_tab_1" href="#tab_1" data-toggle="tab">Basic Data</a></li>
                <li><a id="a_tab_4" href="#tab_4" <?php if ($rgt_tab_validation) echo 'data-toggle="tab"'; ?>>Right Holders</a></li>
                <li><a id="a_tab_2" href="#tab_2" <?php if ($other_tab_validation) echo 'data-toggle="tab"'; ?>>Sub Titles</a></li>
                <li><a id="a_tab_3" href="#tab_3" <?php if ($other_tab_validation) echo 'data-toggle="tab"'; ?>>Publication</a></li>
                <!--<li><a id="a_tab_5" href="#tab_5" <?php if ($other_tab_validation) echo 'data-toggle="tab"'; ?>>Artists - Producers</a></li>-->
            </ul>
            <div class="tab-content">
                <div class="tab-pane" id="tab_1">
                    <div class="box box-primary">
                        <?php
                        $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'recording-form',
                            'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
                            'clientOptions' => array(
                                'validateOnSubmit' => true,
                            ),
                            'enableAjaxValidation' => true,
                        ));
                        ?>
                        <div class="col-lg-5">
                            <div class="box-body">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Rcd_Internal_Code', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Rcd_Internal_Code', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255, 'readonly' => true)); ?>
                                    <?php echo $form->error($model, 'Rcd_Internal_Code'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Rcd_Title', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Rcd_Title', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                                    <?php echo $form->error($model, 'Rcd_Title'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Rcd_Language_Id', array('class' => '')); ?>
                                    <?php echo $form->dropDownList($model, 'Rcd_Language_Id', $languages, array('class' => 'form-control', 'prompt' => '')); ?>
                                    <?php echo $form->error($model, 'Rcd_Language_Id'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Rcd_Type_Id', array('class' => '')); ?>
                                    <?php echo $form->dropDownList($model, 'Rcd_Type_Id', $types, array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'Rcd_Type_Id'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Rcd_Date', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Rcd_Date', array('class' => 'form-control date')); ?>
                                    <?php echo $form->error($model, 'Rcd_Date'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Rcd_Record_Country_id', array('class' => '')); ?>
                                    <?php echo $form->dropDownList($model, 'Rcd_Record_Country_id', $countries, array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'Rcd_Record_Country_id'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Rcd_Product_Country_Id', array('class' => '')); ?>
                                    <?php echo $form->dropDownList($model, 'Rcd_Product_Country_Id', $countries, array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'Rcd_Product_Country_Id'); ?>
                                </div>
                                <?php if (!in_array(Yii::app()->user->getState('society_code'), array('PRIME'))) { ?>
                                    <div class="form-group">
                                        <?php echo $form->labelEx($model, 'Rcd_Auth_Publ', array('class' => '')); ?>
                                        <?php echo $form->textField($model, 'Rcd_Auth_Publ', array('class' => 'form-control')); ?>
                                        <?php echo $form->error($model, 'Rcd_Auth_Publ'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-lg-1"></div>
                        <div class="col-lg-5">
                            <div class="box-body">

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Rcd_Doc_Status_Id', array('class' => '')); ?>
                                    <?php echo $form->dropDownList($model, 'Rcd_Doc_Status_Id', $doc_status, array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'Rcd_Doc_Status_Id'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Rcd_Record_Type_Id', array('class' => '')); ?>
                                    <?php echo $form->dropDownList($model, 'Rcd_Record_Type_Id', $recording_types, array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'Rcd_Record_Type_Id'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Rcd_Label_Id', array('class' => '')); ?>
                                    <?php echo $form->dropDownList($model, 'Rcd_Label_Id', $labels, array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'Rcd_Label_Id'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Rcd_Duration', array('class' => '')) . ' (H : m : s)'; ?>
                                    <?php echo $form->hiddenField($model, 'Rcd_Duration'); ?>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <?php echo $form->textField($model, 'duration_hours', array('class' => 'form-control')); ?>
                                        </div>
                                        <div class="col-lg-4">
                                            <?php echo $form->textField($model, 'duration_minutes', array('class' => 'form-control')); ?>
                                            <?php echo $form->error($model, 'duration_minutes'); ?>
                                        </div>
                                        <div class="col-lg-4">
                                            <?php echo $form->textField($model, 'duration_seconds', array('class' => 'form-control')); ?>
                                            <?php echo $form->error($model, 'duration_seconds'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->error($model, 'duration_hours'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Rcd_Reference', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Rcd_Reference', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                                    <?php echo $form->error($model, 'Rcd_Reference'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Rcd_File', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Rcd_File', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                                    <?php echo $form->error($model, 'Rcd_File'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Rcd_Isrc_Code', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Rcd_Isrc_Code', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                                    <?php echo $form->error($model, 'Rcd_Isrc_Code'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Rcd_Iswc_Number', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Rcd_Iswc_Number', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                                    <?php echo $form->error($model, 'Rcd_Iswc_Number'); ?>
                                </div>


                            </div>
                        </div>

                        <div class="box-footer">
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save', array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')); ?>
                                </div>
                            </div>
                        </div>
                        <?php $this->endWidget(); ?>
                    </div>
                </div>
                <div class="tab-pane" id="tab_4">
                    <?php
                    if ($rgt_tab_validation) {
                        $this->renderPartial('_rightholder_form', array('model' => $right_holder_model, 'recording_model' => $model));
                    }
                    ?>
                </div>
                <div class="tab-pane" id="tab_2">
                    <?php
                    if ($other_tab_validation) {
                        $this->renderPartial('_subtitle_form', array('model' => $sub_title_model, 'recording_model' => $model, 'languages' => $languages, 'types' => $types));
                    }
                    ?>
                </div>
                <div class="tab-pane" id="tab_3">
                    <?php
                    if ($other_tab_validation) {
                        $this->renderPartial('_publication_form', array('model' => $publication_model, 'recording_model' => $model, 'countries' => $countries));
                    }
                    ?>
                </div>
                <!--                <div class="tab-pane" id="tab_5">
                <?php
//                    if ($other_tab_validation) {
//                        $this->renderPartial('_link_form', array('model' => $link_model, 'recording_model' => $model));
//                    }
                ?>
                                </div>-->
            </div>
        </div>
    </div>
</div>
<?php
$active_Tab = (is_null($tab)) ? "tab_1" : "tab_{$tab}";
$new_performer_post = Yii::app()->createAbsoluteUrl('/site/recording/newperformer');
$new_producer_post = Yii::app()->createAbsoluteUrl('/site/recording/newproducer');

$js = <<< EOD
    $(document).ready(function(){
        $('.year').datepicker({ dateFormat: 'yyyy' });

        $('.nav-tabs a[href="#$active_Tab"]').tab('show');
     });

    function InsertNewPerformer(form, data, hasError) {
        if (hasError == false) {
            var form_data = form.serializeArray();
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '$new_performer_post',
                data:form_data,
                success:function(data){
                    if(data.sts == 'success'){
                        $('#performer-account-form')[0].reset();
                        $('#PerformerAccount_Perf_Internal_Code').val(data.new_int_code);
                        _perf_table = $('#search_result tbody');
                        _perf_table.find('tr.empty-record').remove();
                        _rowHTML = '<tr data-urole="PE" data-uid="'+data.uid+'" data-name="'+data.name+'" data-intcode="'+data.int_code+'"><td>'+data.first_name+'</td><td>'+data.last_name+'</td><td>'+data.int_code+'</td></tr>';
                        _perf_table.append(_rowHTML);
                        _perf_table.find("tr[data-uid='"+data.uid+"']").trigger('click');
                        $("#new-performer-dismiss").trigger( "click" );
                    }
                },
                error: function(data) {
                },
            });
            return false;
        }
    }

    function InsertNewProducer(form, data, hasError) {
        if (hasError == false) {
            var form_data = form.serializeArray();
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '$new_producer_post',
                data:form_data,
                success:function(data){
                    if(data.sts == 'success'){
                        $('#producer-account-form')[0].reset();
                        $('#ProducerAccount_Pro_Internal_Code').val(data.new_int_code);
                        _prod_table = $('#search_result tbody');
                        _prod_table.find('tr.empty-record').remove();
                        _rowHTML = '<tr data-urole="PR" data-uid="'+data.uid+'" data-name="'+data.corporate_name+'" data-intcode="'+data.int_code+'"><td>'+data.corporate_name+'</td><td>'+data.ipi_base_number+'</td><td>'+data.int_code+'</td></tr>';
                        _prod_table.append(_rowHTML);
                        _prod_table.find("tr[data-uid='"+data.uid+"']").trigger('click');
                        $("#new-producer-dismiss").trigger( "click" );
                    }
                },
                error: function(data) {
                },
            });
            return false;
        }
    }
EOD;
Yii::app()->clientScript->registerScript('_form', $js);
?>



<!---New Performer Add Form -->
<?php
if (!$model->isNewRecord) {
    $this->beginWidget(
            'booster.widgets.TbModal', array('id' => 'newperformerModal')
    );
    ?>
    <div class="modal-header">
        <a class="close" data-dismiss="modal">&times;</a>
        <h4>New Performer</h4>
    </div>
    <div class="modal-body">
        <?php echo $this->renderPartial('_new_performer', array('model' => $performer_model)); ?>
    </div>

    <?php
    $this->widget(
            'application.components.MyTbButton', array(
        'label' => 'Close',
        'url' => '#',
        'htmlOptions' => array('data-dismiss' => 'modal', 'id' => 'new-performer-dismiss', 'class' => 'hide'),
            )
    );

    $this->endWidget();
    ?>
    <!---End -->

    <!---New Producer Add Form -->
    <?php
    $this->beginWidget(
            'booster.widgets.TbModal', array('id' => 'newproducerModal')
    );
    ?>
    <div class="modal-header">
        <a class="close" data-dismiss="modal">&times;</a>
        <h4>New Producer</h4>
    </div>
    <div class="modal-body">
        <?php echo $this->renderPartial('_new_producer', array('model' => $producer_model)); ?>
    </div>

    <?php
    $this->widget(
            'application.components.MyTbButton', array(
        'label' => 'Close',
        'url' => '#',
        'htmlOptions' => array('data-dismiss' => 'modal', 'id' => 'new-producer-dismiss', 'class' => 'hide'),
            )
    );

    $this->endWidget();
}
?>
<!---End -->