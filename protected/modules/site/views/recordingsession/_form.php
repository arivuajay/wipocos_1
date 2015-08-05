<?php
/* @var $this RecordingsessionController */
/* @var $model RecordingSession */
/* @var $form CActiveForm */
$themeUrl = $this->themeUrl;
$cs = Yii::app()->getClientScript();
$cs_pos_end = CClientScript::POS_END;

$cs->registerCssFile($themeUrl . '/css/datepicker/datepicker3.css');
$cs->registerScriptFile($themeUrl . '/js/datepicker/bootstrap-datepicker.js', $cs_pos_end);

$cs->registerScriptFile($themeUrl . '/js/datatables/jquery.dataTables.js', $cs_pos_end);
$cs->registerScriptFile($themeUrl . '/js/datatables/dataTables.bootstrap.js', $cs_pos_end);

$languages = Myclass::getMasterLanguage();
$types = Myclass::getMasterType();
$mediums = Myclass::getMasterMedium();
$countries = Myclass::getMasterCountry();
$studios = Myclass::getMasterStudio();
$factors = Myclass::getMasterFactor();
$destinations = Myclass::getMasterDestination();
?>

<div class="row">
    <div class="col-lg-12 col-xs-12">
        <?php
        $other_tab_validation = $doc_tab_validation = $rgt_tab_validation = true;
        if (!$model->isNewRecord) {
            $doc_tab_validation = true;
            $rgt_tab_validation = !$document_model->isNewRecord;
            $folio_tab_validation = !$document_model->isNewRecord && !empty($right_holder_exists);
            $other_tab_validation = true;
        } else {
            $other_tab_validation = $doc_tab_validation = $rgt_tab_validation = $folio_tab_validation = $pub_tab_validation = false;
        }
        ?>
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a id="a_tab_1" href="#tab_1" data-toggle="tab">Basic Data</a></li>
                <li><a id="a_tab_2" href="#tab_2" <?php if ($doc_tab_validation) echo 'data-toggle="tab"'; ?>>Documentation</a></li>
                <li><a id="a_tab_5" href="#tab_5" <?php if ($rgt_tab_validation) echo 'data-toggle="tab"'; ?>>Recordings</a></li>
                <li><a id="a_tab_6" href="#tab_6" <?php if ($folio_tab_validation) echo 'data-toggle="tab"'; ?>>List of Folios</a></li>
                <li><a id="a_tab_3" href="#tab_3" <?php if ($other_tab_validation) echo 'data-toggle="tab"'; ?>>Sub Titles</a></li>
                <!--<li><a id="a_tab_4" href="#tab_4" <?php if ($other_tab_validation) echo 'data-toggle="tab"'; ?>>Biography</a></li>-->
                <!--<li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>-->
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <div class="box box-primary">
                        <?php
                        $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'recording-session-form',
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
                                    <?php echo $form->labelEx($model, 'Rcd_Ses_Internal_Code', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Rcd_Ses_Internal_Code', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255, 'readonly' => true)); ?>
                                    <?php echo $form->error($model, 'Rcd_Ses_Internal_Code'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Rcd_Ses_Title', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Rcd_Ses_Title', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                                    <?php echo $form->error($model, 'Rcd_Ses_Title'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Rcd_Ses_Language_Id', array('class' => '')); ?>
                                    <?php echo $form->dropDownList($model, 'Rcd_Ses_Language_Id', $languages, array('class' => 'form-control', 'prompt' => '')); ?>
                                    <?php echo $form->error($model, 'Rcd_Ses_Language_Id'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Rcd_Ses_Orchestra', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Rcd_Ses_Orchestra', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
                                    <?php echo $form->error($model, 'Rcd_Ses_Orchestra'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Rcd_Ses_Ref_Medium', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Rcd_Ses_Ref_Medium', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
                                    <?php echo $form->error($model, 'Rcd_Ses_Ref_Medium'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Rcd_Ses_Hours', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Rcd_Ses_Hours', array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'Rcd_Ses_Hours'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Rcd_Ses_Record_Date', array('class' => '')); ?>
                                    <?php echo $form->textField($model, 'Rcd_Ses_Record_Date', array('class' => 'form-control date')); ?>
                                    <?php echo $form->error($model, 'Rcd_Ses_Record_Date'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Rcd_Ses_Studio_Id', array('class' => '')); ?>
                                    <?php echo $form->dropDownList($model, 'Rcd_Ses_Studio_Id', $studios, array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'Rcd_Ses_Studio_Id'); ?>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-1"></div>
                        <div class="col-lg-5">
                            <div class="box-body">

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Rcd_Ses_Producer', array('class' => '')); ?>
                                    <?php echo $form->hiddenField($model, 'Rcd_Ses_Producer'); ?>
                                    <?php echo CHtml::textField('producer', $model->recordingSessionProducer->Pro_Corporate_Name, array('class' => 'form-control popup', 'size' => 60, 'maxlength' => 100, 'onkeypress' => 'return false', 'data-popup' => 'producerbutton')) ?>
                                    <?php echo $form->error($model, 'Rcd_Ses_Producer'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Rcd_Ses_Main_Artist', array('class' => '')); ?>
                                    <?php echo $form->hiddenField($model, 'Rcd_Ses_Main_Artist'); ?>
                                    <?php echo CHtml::textField('main_artist', $model->recordingSessionMainArtist->fullname, array('class' => 'form-control popup', 'size' => 60, 'maxlength' => 100, 'onkeypress' => 'return false', 'data-popup' => 'artistbutton')) ?>
                                    <?php echo $form->error($model, 'Rcd_Ses_Main_Artist'); ?>
                                </div>
                                
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Rcd_Ses_Medium_Id', array('class' => '')); ?>
                                    <?php echo $form->dropDownList($model, 'Rcd_Ses_Medium_Id', $mediums, array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'Rcd_Ses_Medium_Id'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Rcd_Ses_Type_Id', array('class' => '')); ?>
                                    <?php echo $form->dropDownList($model, 'Rcd_Ses_Type_Id', $types, array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'Rcd_Ses_Type_Id'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Rcd_Ses_Destination_Id', array('class' => '')); ?>
                                    <?php echo $form->dropDownList($model, 'Rcd_Ses_Destination_Id', $destinations, array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'Rcd_Ses_Destination_Id'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Rcd_Ses_Country_Id', array('class' => '')); ?>
                                    <?php echo $form->dropDownList($model, 'Rcd_Ses_Country_Id', $countries, array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'Rcd_Ses_Country_Id'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Rcd_Ses_Factor_Id', array('class' => '')); ?>
                                    <?php echo $form->dropDownList($model, 'Rcd_Ses_Factor_Id', $factors, array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'Rcd_Ses_Factor_Id'); ?>
                                </div>

                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'Rcd_Ses_Release_Year', array('class' => '')); ?>
                                    <?php
                                    $year = date('Y');
                                    if ($model->Rcd_Ses_Release_Year != NULL && $model->Rcd_Ses_Release_Year != '0000') {
                                        $year = $model->Rcd_Ses_Release_Year;
                                    }
                                    ?>
                                    <?php echo $form->textField($model, 'Rcd_Ses_Release_Year', array('class' => 'form-control', 'size' => 4, 'maxlength' => 4, 'value' => $year)); ?>
                                    <?php echo $form->error($model, 'Rcd_Ses_Release_Year'); ?>
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
                <div class="tab-pane" id="tab_2">
                    <?php
                    if ($doc_tab_validation) {
                        $this->renderPartial('_documentation_form', array('model' => $document_model, 'record_ses_model' => $model));
                    }
                    ?>
                </div>
                <div class="tab-pane" id="tab_3">
                    <?php
                    if ($other_tab_validation) {
                        $this->renderPartial('_subtitle_form', array('model' => $sub_title_model, 'record_ses_model' => $model, 'languages' => $languages, 'types' => $types));
                    }
                    ?>
                </div>
<!--                <div class="tab-pane" id="tab_4">
                    <?php
//                    if ($other_tab_validation) {
//                        $this->renderPartial('_biography_form', array('model' => $biograph_model, 'record_ses_model' => $model, 'biograph_upload_model' => $biograph_upload_model));
//                    }
                    ?>
                </div>-->
                <div class="tab-pane" id="tab_5">
                    <?php
                    if ($rgt_tab_validation) {
                        $this->renderPartial('_rightholder_form', array('model' => $right_holder_model, 'record_ses_model' => $model, 'exists_model' => $right_holder_exists, 'recording_model' => $recording_model, 'languages' => $languages, 'types' => $types, 'countries' => $countries,  'performer_model' => $performer_model));
                    }
                    ?>
                </div>
                <div class="tab-pane" id="tab_6">
                    <?php
                    if ($folio_tab_validation) {
                        $this->renderPartial('_folio_form', array('model' => $folio_model, 'record_ses_model' => $model));
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Artist Modal -->
<?php
$this->beginWidget(
        'booster.widgets.TbModal', array('id' => 'artistModal')
);
?>
<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Main Artist</h4>
</div>
<div class="modal-body">
    <div class="form-group">
        <label for="artisttable_base_table_search" class="control-label required">Search</label>
        <div>
            <input type="text" id="artisttable_base_table_search" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <div style="max-height: 300px; overflow-y: scroll">
            <table class="table table-bordered selectable" id="artisttable">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Internal Code</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $users = PerformerAccount::model()->findAll();
                    foreach ($users as $key => $user) {
                        ?>
                        <tr data-id="<?php echo $user->Perf_Acc_Id ?>" data-name="<?php echo $user->fullname ?>">
                            <td><?php echo $user->Perf_First_Name ?></td>
                            <td><?php echo $user->Perf_Sur_Name ?></td>
                            <td><?php echo $user->Perf_Internal_Code ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>    
    </div>
</div>

<div class="modal-footer">
    <div class="col-sm-3">
        <?php
        $this->widget(
                'application.components.MyTbButton', array(
            'label' => 'New Artist',
            'context' => 'success',
            'htmlOptions' => array(
                'id' => 'newartistbutton',
                'data-toggle' => 'modal',
                'data-target' => '#newartistModal',
                'onclick' => '{$("#artist-dismiss").trigger("click");}'
            ),
                )
        );
        ?>
    </div>
    <p class="errorMessage text-center col-sm-5" id="art-modelerror"></p>
    <?php
    $this->widget(
            'application.components.MyTbButton', array(
        'context' => 'primary',
        'label' => 'Set Main Artist',
        'url' => '#',
        'htmlOptions' => array(
            'onclick' => '{    
                    _row = $("#artisttable").find(".highlight");
                    if(_row.length == 0){
                        $("#art-modelerror").html("Select Alteast one Artist");
                    }else{
                        $("#art-modelerror").html("");
                        $("#RecordingSession_Rcd_Ses_Main_Artist").val(_row.data("id"));
                        $("#main_artist").val(_row.data("name"));
                        $("#artist-dismiss").trigger("click");
                    }
                }',
            'id' => 'set_artist_btn'
        ),
            )
    );
    ?>
    <?php
    $this->widget(
            'application.components.MyTbButton', array(
        'label' => 'Close',
        'url' => '#',
        'htmlOptions' => array('data-dismiss' => 'modal', 'id' => 'artist-dismiss'),
            )
    );
    ?>
</div>

<?php $this->endWidget(); ?>
<?php
$this->widget(
        'application.components.MyTbButton', array(
    'label' => 'Main Artist',
    'context' => 'primary',
    'htmlOptions' => array(
        'id' => 'artistbutton',
        'data-toggle' => 'modal',
        'data-target' => '#artistModal',
        'style' => 'display:none'
    ),
        )
);
?>
<!---End -->

<!---New Performer Add Form -->
<?php
$this->beginWidget(
        'booster.widgets.TbModal', array('id' => 'newartistModal')
);
?>
<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>New Artist</h4>
</div>
<div class="modal-body">
    <?php echo $this->renderPartial('/soundcarrier/_new_performer', array('model' => $performer_model, 'countries' => $countries)); ?>
</div>

<?php
$this->widget(
        'application.components.MyTbButton', array(
    'label' => 'Close',
    'url' => '#',
    'htmlOptions' => array('data-dismiss' => 'modal', 'id' => 'new-artist-dismiss', 'class' => 'hide'),
        )
);

$this->endWidget();
?>
<!---End -->



<!--Producer Modal -->
<?php
$this->beginWidget(
        'booster.widgets.TbModal', array('id' => 'producerModal')
);
?>
<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Producer</h4>
</div>
<div class="modal-body">
    <div class="form-group">
        <label for="producertable_base_table_search" class="control-label required">Search</label>
        <div>
            <input type="text" id="producertable_base_table_search" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <div style="max-height: 300px; overflow-y: scroll">
            <table class="table table-bordered selectable" id="producertable">
                <thead>
                    <tr>
                        <th>Corporate Name</th>
                        <th>Internal Code</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $users = ProducerAccount::model()->findAll();
                    foreach ($users as $key => $user) {
                        ?>
                        <tr data-id="<?php echo $user->Pro_Acc_Id ?>" data-name="<?php echo $user->Pro_Corporate_Name ?>">
                            <td><?php echo $user->Pro_Corporate_Name ?></td>
                            <td><?php echo $user->Pro_Internal_Code ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>    
    </div>
</div>

<div class="modal-footer">
    <div class="col-sm-3">
        <?php
        $this->widget(
                'application.components.MyTbButton', array(
            'label' => 'New Producer',
            'context' => 'success',
            'htmlOptions' => array(
                'id' => 'newartistbutton',
                'data-toggle' => 'modal',
                'data-target' => '#newproducerModal',
                'onclick' => '{$("#producer-dismiss").trigger("click");}'
            ),
                )
        );
        ?>
    </div>
    <p class="errorMessage text-center col-sm-5" id="prod-modelerror"></p>
    <?php
    $this->widget(
            'application.components.MyTbButton', array(
        'context' => 'primary',
        'label' => 'Set Producer',
        'url' => '#',
        'htmlOptions' => array(
            'onclick' => '{    
                    _row = $("#producertable").find(".highlight");
                    if(_row.length == 0){
                        $("#prod-modelerror").html("Select Alteast one Producer");
                    }else{
                        $("#prod-modelerror").html("");
                        $("#RecordingSession_Rcd_Ses_Producer").val(_row.data("id"));
                        $("#producer").val(_row.data("name"));
                        $("#producer-dismiss").trigger("click");
                    }
                }',
            'id' => 'set_producer_btn'
        ),
            )
    );
    ?>
    <?php
    $this->widget(
            'application.components.MyTbButton', array(
        'label' => 'Close',
        'url' => '#',
        'htmlOptions' => array('data-dismiss' => 'modal', 'id' => 'producer-dismiss'),
            )
    );
    ?>
</div>

<?php $this->endWidget(); ?>
<?php
$this->widget(
        'application.components.MyTbButton', array(
    'label' => 'Producer',
    'context' => 'primary',
    'htmlOptions' => array(
        'id' => 'producerbutton',
        'data-toggle' => 'modal',
        'data-target' => '#producerModal',
        'style' => 'display:none'
    ),
        )
);
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
    <?php echo $this->renderPartial('/soundcarrier/_new_producer', array('model' => $producer_model, 'countries' => $countries)); ?>
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
?>
<!---End -->

<?php
$new_performer_post = Yii::app()->createAbsoluteUrl('/site/soundcarrier/newperformer');
$new_producer_post = Yii::app()->createAbsoluteUrl('/site/soundcarrier/newproducer');

$js = <<< EOD
    $(document).ready(function(){
        $('.year').datepicker({ dateFormat: 'yyyy' });
        $('.date').datepicker({ format: 'yyyy-mm-dd' });
        $("#a_tab_{$tab}").trigger('click');
        
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
                        _art_table = $('#artisttable');
                        _art_table.dataTable().fnAddData([
                            data.first_name,
                            data.last_name,
                            data.int_code 
                        ]);
                        tr = _art_table.find("td:contains('"+data.int_code+"')").parent();
                        tr.data('id', data.id);
                        tr.data('name', data.first_name + ' ' + data.last_name);
                        tr.trigger('click');
                        $("#set_artist_btn").trigger( "click" );
                        $("#new-artist-dismiss").trigger( "click" );
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
                        console.log(data);
                        $('#producer-account-form')[0].reset();
                        $('#ProducerAccount_Pro_Internal_Code').val(data.new_int_code);
                        _pro_table = $('#producertable');
                        _pro_table.dataTable().fnAddData([
                            data.name,
                            data.int_code 
                        ]);
                        tr = _pro_table.find("td:contains('"+data.int_code+"')").parent();
                        tr.data('id', data.id);
                        tr.data('name', data.name);
                        tr.trigger('click');
                        $("#set_producer_btn").trigger( "click" );
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