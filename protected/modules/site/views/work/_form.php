<?php
/* @var $this WorkController */
/* @var $model Work */
/* @var $form CActiveForm */
$themeUrl = $this->themeUrl;
$cs = Yii::app()->getClientScript();
$cs_pos_end = CClientScript::POS_END;




$cs->registerScriptFile($themeUrl . '/js/datatables/jquery.dataTables.js', $cs_pos_end);
$cs->registerScriptFile($themeUrl . '/js/datatables/dataTables.bootstrap.js', $cs_pos_end);

$languages = Myclass::getMasterLanguage();
$types = Myclass::getMasterType();
$factors = Myclass::getMasterFactor();
$instruments = Myclass::getMasterInstrument();
$territories = Myclass::getMasterTerritory();
?>

<?php if (($publish_validate || $sub_publish_validate) /* && (empty($this->flashMessages)) */) { ?>
    <div class="alert alert-info fade in">
        <button type="button" class="close close-sm" data-dismiss="alert">
            <i class="fa fa-times"></i>
        </button>
        <?php echo $publish_validate ? 'Work is not published !' : 'Work is not subpublished !' ?>
    </div>
<?php } ?>

<div class="row">
    <div class="col-lg-12 col-xs-12">

        <?php
        $other_tab_validation = $doc_tab_validation = $rgt_tab_validation = true;
        if (!$model->isNewRecord) {
            if ($model->Work_Unknown == 'N') {
                $doc_tab_validation = !$model->isNewRecord;
                $rgt_tab_validation = !$model->isNewRecord && !$document_model->isNewRecord;
                $other_tab_validation = true;
//                $other_tab_validation = !$document_model->isNewRecord && !empty($right_holder_exists) && !$publish_validate && !$sub_publish_validate && !empty($main_publisher) && !empty($sub_publisher);
            }
            $pub_tab_validation = !$document_model->isNewRecord && !empty($right_holder_exists) && !empty($main_publisher);
            $sub_pub_tab_validation = !$document_model->isNewRecord && !empty($right_holder_exists) && !$publish_validate && !empty($main_publisher) && !empty($sub_publisher);
        } else {
            $other_tab_validation = $doc_tab_validation = $rgt_tab_validation = $pub_tab_validation = $sub_pub_tab_validation = false;
        }
        ?>
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li><a id="a_tab_1" href="#tab_1" data-toggle="tab">Basic Data</a></li>
                <li><a id="a_tab_4" href="#tab_4" <?php if ($doc_tab_validation) echo 'data-toggle="tab"'; ?>>Documentation</a></li>
                <li><a id="a_tab_7" href="#tab_7" <?php if ($rgt_tab_validation) echo 'data-toggle="tab"'; ?>>Right Holders</a></li>
                <li><a id="a_tab_5" href="#tab_5" <?php if ($pub_tab_validation) echo 'data-toggle="tab"'; ?>>Publishing</a></li>
                <li><a id="a_tab_6" href="#tab_6" <?php if ($sub_pub_tab_validation) echo 'data-toggle="tab"'; ?>>Sub Publishing</a></li>
                <li><a id="a_tab_2" href="#tab_2" <?php if ($other_tab_validation) echo 'data-toggle="tab"'; ?>>Sub Titles</a></li>
                <li><a id="a_tab_3" href="#tab_3" <?php if ($other_tab_validation) echo 'data-toggle="tab"'; ?>>Biography</a></li>
                <!--<li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>-->
            </ul>
            <div class="tab-content">
                <div class="tab-pane" id="tab_1">
                    <div class="box box-primary">
                        <?php
                        $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'work-form',
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
                                    <?php echo $form->labelEx($model, 'Work_Internal_Code', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Work_Internal_Code', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255, 'readonly' => true)); ?>
                                    <?php echo $form->error($model, 'Work_Internal_Code'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Work_Org_Title', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Work_Org_Title', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                                    <?php echo $form->error($model, 'Work_Org_Title'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Work_Language_Id', array('class' => '')); ?>
                                    <?php echo $form->dropDownList($model, 'Work_Language_Id', $languages, array('class' => 'form-control', 'prompt' => '')); ?>
                                    <?php echo $form->error($model, 'Work_Language_Id'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Work_Iswc', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Work_Iswc', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                                    <?php echo $form->error($model, 'Work_Iswc'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Work_Wic_Code', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Work_Wic_Code', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                                    <?php echo $form->error($model, 'Work_Wic_Code'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Work_Type_Id', array('class' => '')); ?>
                                    <?php echo $form->dropDownList($model, 'Work_Type_Id', $types, array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'Work_Type_Id'); ?>
                                </div>

                                <div class="form-group hide">
                                    <?php echo $form->labelEx($model, 'Work_Unknown', array('class' => '')); ?><br />
                                    <?php echo $form->checkBox($model, 'Work_Unknown', array('class' => 'form-control', 'value' => 'Y', 'uncheckValue' => 'N')); ?>
                                    <?php echo $form->error($model, 'Work_Unknown'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1"></div>
                        <div class="col-lg-5">
                            <div class="box-body">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Work_Factor_Id', array('class' => '')); ?>
                                    <?php echo $form->dropDownList($model, 'Work_Factor_Id', $factors, array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'Work_Factor_Id'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Work_Instrumentation', array('class' => '')); ?>
                                    <?php
                                    $selected = $model->getInstrumentselected();
                                    ?>
                                    <?php echo $form->dropDownList($model, 'Work_Instrumentation', $instruments, array('class' => 'form-control', 'multiple' => true, 'prompt' => '', 'options' => $selected)); ?>
                                    <?php echo $form->error($model, 'Work_Instrumentation'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Work_Duration', array('class' => '')) . ' (H : m : s)'; ?>
                                    <?php echo $form->hiddenField($model, 'Work_Duration'); ?>
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
                                    <?php echo $form->labelEx($model, 'Work_Creation', array('class' => '')); ?>
                                    <?php
                                    $year = date('Y');
                                    if ($model->Work_Creation != NULL && $model->Work_Creation != '0000') {
                                        $year = $model->Work_Creation;
                                    }
                                    ?>
                                    <?php echo $form->textField($model, 'Work_Creation', array('class' => 'form-control', 'size' => 4, 'maxlength' => 4, 'value' => $year)); ?>
                                    <?php echo $form->error($model, 'Work_Creation'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Work_Opus_Number', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Work_Opus_Number', array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'Work_Opus_Number'); ?>
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
                    if ($doc_tab_validation) {
                        $this->renderPartial('_documentation_form', array('model' => $document_model, 'work_model' => $model));
                    }
                    ?>
                </div>
                <div class="tab-pane" id="tab_7">
                    <?php
                    if ($rgt_tab_validation) {
                        $this->renderPartial('_rightholder_form', array('model' => $right_holder_model, 'work_model' => $model, 'authusers' => $authusers, 'publusers' => $publusers));
                    }
                    ?>
                </div>
                <div class="tab-pane" id="tab_5">
                    <?php
                    if ($pub_tab_validation) {
                        $this->renderPartial('_publishing_form', array('model' => $publishing_model, 'work_model' => $model, 'territories' => $territories, 'upload_model' => $publishing_upload_model, 'focus' => $focus));
                    }
                    ?>
                </div>
                <div class="tab-pane" id="tab_6">
                    <?php
                    if ($sub_pub_tab_validation) {
                        $this->renderPartial('_sub_publishing_form', array('model' => $sub_publishing_model, 'work_model' => $model, 'territories' => $territories, 'upload_model' => $sub_publishing_upload_model));
                    }
                    ?>
                </div>
                <div class="tab-pane" id="tab_2">
                    <?php
                    if ($other_tab_validation) {
                        $this->renderPartial('_subtitle_form', array('model' => $sub_title_model, 'work_model' => $model, 'languages' => $languages, 'types' => $types));
                    }
                    ?>
                </div>
                <div class="tab-pane" id="tab_3">
                    <?php
                    if ($other_tab_validation) {
                        $this->renderPartial('_biography_form', array('model' => $biograph_model, 'work_model' => $model, 'biograph_upload_model' => $biograph_upload_model));
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$active_Tab = (is_null($tab)) ? "tab_1" : "tab_{$tab}";
$new_author_post = Yii::app()->createAbsoluteUrl('/site/work/newauthor');
$new_publisher_post = Yii::app()->createAbsoluteUrl('/site/work/newpublisher');


$js = <<< EOD
    $(document).ready(function(){
        $('.year').datepicker({ dateFormat: 'yyyy' });

        $('.nav-tabs a[href="#$active_Tab"]').tab('show');
     });
EOD;
Yii::app()->clientScript->registerScript('_form', $js);
?>

<?php
$active_Tab = (is_null($tab)) ? "tab_1" : "tab_{$tab}";
$js = <<< EOD
    $(document).ready(function(){
        $('.year').datepicker({ dateFormat: 'yyyy' });

        $('.nav-tabs a[href="#$active_Tab"]').tab('show');

        $(".popup").on('click', function(){
            _id = $(this).data('popup');
            $("#"+_id).trigger('click');
        });

        $('body').on('click','#artisttable tr, #producertable tr', function(){
            $(this).addClass('highlight').siblings().removeClass('highlight');
        });

        if($('#producertable').length > 0){
            var probaseTable;
            probaseTable = $("#producertable").dataTable({
                sDom: '<"search-box"r>ltip',
                "bPaginate": false,
                "bLengthChange": false,
                "bSort": true,
                "bInfo": false,
                "iDisplayLength": 100
            });

            $('#producertable_base_table_search').keyup(function(){
                 probaseTable.fnFilter( $(this).val() );
            });
        }
        if($('#artisttable').length > 0){
            var artbaseTable;
            artbaseTable = $("#artisttable").dataTable({
                sDom: '<"search-box"r>ltip',
                "bPaginate": false,
                "bLengthChange": false,
                "bSort": true,
                "bInfo": false,
                "iDisplayLength": 100
            });

            $('#artisttable_base_table_search').keyup(function(){
                 artbaseTable.fnFilter( $(this).val() );
            });
        }

        $('.hide_tip').on('click', function() {
            $(this).closest('li').find(':not(.hide_tip)').trigger('click');
        });
     });

    function InsertNewAuthor(form, data, hasError) {
        if (hasError == false) {
            var form_data = form.serializeArray();
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '$new_author_post',
                data:form_data,
                success:function(data){
                    if(data.sts == 'success'){
                        $('#author-account-form')[0].reset();
                        $('#AuthorAccount_Auth_Internal_Code').val(data.new_int_code);
                        _auth_table = $('#search_result tbody');
                        _auth_table.find('tr.empty-record').remove();
                        _rowHTML = '<tr data-urole="AU" data-uid="'+data.uid+'" data-name="'+data.name+'" data-intcode="'+data.int_code+'"><td>'+data.first_name+'</td><td>'+data.last_name+'</td><td>'+data.int_code+'</td></tr>';
                        _auth_table.append(_rowHTML);
                        _auth_table.find("tr[data-uid='"+data.uid+"']").trigger('click');
                        $("#new-author-dismiss").trigger( "click" );
                    }
                },
                error: function(data) {
                },
            });
            return false;
        }
    }

    function InsertNewPublisher(form, data, hasError) {
        if (hasError == false) {
            var form_data = form.serializeArray();
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '$new_publisher_post',
                data:form_data,
                success:function(data){
                    if(data.sts == 'success'){
                        $('#publisher-account-form')[0].reset();
                        $('#PublisherAccount_Pub_Internal_Code').val(data.new_int_code);
                        _auth_table = $('#search_result tbody');
                        _auth_table.find('tr.empty-record').remove();
                        _rowHTML = '<tr data-urole="PU" data-uid="'+data.uid+'" data-name="'+data.corporate_name+'" data-intcode="'+data.int_code+'"><td>'+data.corporate_name+'</td><td>'+data.ipi_base_number+'</td><td>'+data.int_code+'</td></tr>';
                        _auth_table.append(_rowHTML);
                        _auth_table.find("tr[data-uid='"+data.uid+"']").trigger('click');
                        $("#new-publisher-dismiss").trigger( "click" );
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



<!---New Author Add Form -->
<?php
if(!$model->isNewRecord){
$this->beginWidget(
        'booster.widgets.TbModal', array('id' => 'newauthorModal')
);
?>
<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>New Author</h4>
</div>
<div class="modal-body">
    <?php echo $this->renderPartial('_new_author', array('model' => $author_model)); ?>
</div>

<?php
$this->widget(
        'application.components.MyTbButton', array(
    'label' => 'Close',
    'url' => '#',
    'htmlOptions' => array('data-dismiss' => 'modal', 'id' => 'new-author-dismiss', 'class' => 'hide'),
        )
);

$this->endWidget();
?>
<!---End -->

<!---New Publisher Add Form -->
<?php

$this->beginWidget(
        'booster.widgets.TbModal', array('id' => 'newpublisherModal')
);
?>
<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>New Publisher</h4>
</div>
<div class="modal-body">
    <?php echo $this->renderPartial('_new_publisher', array('model' => $publisher_model)); ?>
</div>

<?php
$this->widget(
        'application.components.MyTbButton', array(
    'label' => 'Close',
    'url' => '#',
    'htmlOptions' => array('data-dismiss' => 'modal', 'id' => 'new-publisher-dismiss', 'class' => 'hide'),
        )
);

$this->endWidget();
}
?>
<!---End -->