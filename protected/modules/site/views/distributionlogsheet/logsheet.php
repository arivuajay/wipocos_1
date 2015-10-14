<?php
/* @var $this DistributionlogsheetController */
/* @var $model DistributionLogsheet */
/* @var $form CActiveForm */

$this->title = 'Logsheets';
$this->breadcrumbs = array(
    'Utlization Periods ' => array('/site/distributionutlizationperiod/index'),
    $this->title,
);
?>

<div class="box box-primary">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'distribution-logsheet-form',
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'enableAjaxValidation' => true,
    ));
    $users = CHtml::listData(CustomerUser::model()->findAll(), 'User_Cust_Internal_Code', 'User_Cust_Name');
    $places = Myclass::getMasterPlace();
    $factors = Myclass::getMasterFactor();
    ?>  
    <div class="col-lg-12">
        <div class="box-body">
            <div class="form-group foundation">
                <div class="box-header">
                    <h3 class="box-title">Class</h3>
                </div>
                <div class="box-body">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <?php echo CHtml::textField('class_name', $period_model->class->Class_Name, array('class' => 'form-control', 'readonly' => true)) ?>
                        </div>

                        <div class="form-group">
                            <?php echo CHtml::label('Year', 'year', array('class' => '')); ?>
                            <?php echo CHtml::textField('year', $period_model->Period_Year, array('class' => 'form-control', 'readonly' => true)) ?>
                        </div>

                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            <?php echo CHtml::label('Period', '', array('class' => 'col-sm-2 control-label')); ?>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <?php echo CHtml::textField('from', $period_model->Period_From, array('class' => 'form-control', 'readonly' => true)) ?>
                                    </div>
                                    <div class="col-lg-13">
                                        <?php echo CHtml::textField('to', $period_model->Period_To, array('class' => 'form-control', 'readonly' => true)) ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo CHtml::label('Account', 'account', array('class' => 'col-sm-2 control-label')); ?>
                            <div class="col-sm-5">
                                <?php echo CHtml::textField('account', date('Y-m-d'), array('class' => 'form-control', 'readonly' => true)) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="box-body">
            <div class="form-group foundation">
                <div class="box-body">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Log_User_Cust_Id', array('class' => '')); ?>
                            <?php echo $form->dropDownList($model, 'Log_User_Cust_Id', $users, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($model, 'Log_User_Cust_Id'); ?>
                        </div>
                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Log_Place_Id', array('class' => '')); ?>
                            <?php echo $form->dropDownList($model, 'Log_Place_Id', $places, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($model, 'Log_Place_Id'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->endWidget(); ?>

    <form method="get" onsubmit="return false;" class="form-horizontal MultiFile-intercepted" role="form">    
        <div class="col-lg-12">
            <div class="box-body">
                <div class="form-group foundation">
                    <div class="box-header">
                        <h3 class="box-title">Search</h3>
                    </div>
                    <div class="box-body">
                        <p class="help-inline">Enter the begin of the name or internal code or one of the following criteria:</p>
                        <div class="col-lg-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="" class="control-label">Search</label>                                
                                    <input type="text" id="searach_text" name="searach_text" class="form-control">                            
                                </div>
                                <div class="form-group">
                                    <input type="button" value="Search" id="search_button" name="rght_holder" class="btn btn-success">                                                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>    

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'distribution-logsheetlist--form',
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'enableAjaxValidation' => true,
    ));
    ?>  
    <div id="search_right_result">
    </div>

    <div class="col-lg-12">
        <div class="box-body">
            <div class="form-group foundation">
                <div class="box-header">
                    <h3 class="box-title">Exploitation</h3>
                </div>
                <div class="box-body">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <?php echo $form->labelEx($list_model, 'Log_List_Duration', array('class' => '')) . ' (H : m : s)'; ?>
                            <?php echo $form->hiddenField($list_model, 'Log_List_Duration'); ?>
                            <div class="row">
                                <div class="col-lg-4">
                                    <?php echo $form->textField($list_model, 'duration_hours', array('class' => 'form-control')); ?>
                                </div>
                                <div class="col-lg-4">
                                    <?php echo $form->textField($list_model, 'duration_minutes', array('class' => 'form-control')); ?>
                                    <?php echo $form->error($list_model, 'duration_minutes'); ?>
                                </div>
                                <div class="col-lg-4">
                                    <?php echo $form->textField($list_model, 'duration_seconds', array('class' => 'form-control')); ?>
                                    <?php echo $form->error($list_model, 'duration_seconds'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($list_model, 'Log_List_Factor_Id', array('class' => '')); ?>
                            <?php echo $form->dropDownList($list_model, 'Log_List_Factor_Id', $factors, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($list_model, 'Log_List_Factor_Id'); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($list_model, 'Log_List_Coefficient', array('class' => '')); ?>
                            <?php echo $form->textField($list_model, 'Log_List_Coefficient', array('class' => 'form-control')); ?>
                            <?php echo $form->error($list_model, 'Log_List_Coefficient'); ?>
                        </div>

                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            <?php echo $form->labelEx($list_model, 'Log_List_Date', array('class' => '')); ?>
                            <?php echo $form->textField($list_model, 'Log_List_Date', array('class' => 'form-control date')); ?>
                            <?php echo $form->error($list_model, 'Log_List_Date'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($list_model, 'Log_List_Event', array('class' => '')); ?>
                            <?php echo $form->textField($list_model, 'Log_List_Event', array('class' => 'form-control')); ?>
                            <?php echo $form->error($list_model, 'Log_List_Event'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($list_model, 'Log_List_Seq_Number', array('class' => '')); ?>
                            <?php echo $form->textField($list_model, 'Log_List_Seq_Number', array('class' => 'form-control')); ?>
                            <?php echo $form->error($list_model, 'Log_List_Seq_Number'); ?>
                        </div>
                    </div>

                </div>
                <div class="box-footer" style="border-top: none">
                    <div class="form-group">
                        <div class="col-lg-12">
                            <?php echo CHtml::submitButton('Add', array('class' => 'btn btn-warning', 'id' => 'right_insert')); ?>
                            <?php echo $form->error($model, 'Sound_Car_Right_Member_GUID'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $this->endWidget(); ?>


    <div class="row">
        <div class="col-lg-12">
            <div class="box-body">
                <div class="text-left total_share hide">Broadcasting Share : <span id="equal_total">100 %</span> </div>
                <div class="text-left total_share hide">Mechanical Share : <span id="blank_total">100 %</span></div>
                <div class="text-left total_share hide show_pub_hint">Publisher Share : <span id="pub_total">100 %</span></div>
                <div class="text-left total_share hide show_pub_hint">Main Publisher : <span id="is_main_added"></span></div>
                <br>
                <div class="form-group foundation">
                    <form method="post" id="right_form" class="form-horizontal MultiFile-intercepted" role="form">                    <div class="box-header">
                            <h3 class="box-title">Logsheet List</h3>
                        </div>
                        <div class="box-body">
                            <table id="linked-holders" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Original Title</th>
                                        <th>Internal Code</th>
                                        <th>Duration</th>
                                        <th>Factor</th>
                                        <th>Coefficient</th>
                                        <!--<th>Broadcasting Organization</th>-->
                                        <th>Date</th>
                                        <th>Event or show</th>
                                        <!--<th>Mechanical Organization</th>-->
                                        <th>Sequence Number</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr data-intcode="SOC-A-0001015" data-name="Vinodh Arumugam" data-uid="c08b4ad2-14e4-11e5-b10a-74d435d335fe" data-urole="AU">
                                        <td>As long as </td>
                                        <td>SOC-T-0001015</td>
                                        <td>04:00:00</td>
                                        <td>1.00</td>
                                        <td>1.00</td>
                                        <td>2015-05-01</td>
                                        <td></td>
                                        <td>2500</td>
                                    </tr>
                                    <tr data-intcode="SOC-A-0001015" data-name="Vinodh Arumugam" data-uid="c08b4ad2-14e4-11e5-b10a-74d435d335fe" data-urole="AU">
                                        <td>ride the lightning</td>
                                        <td>SOC-T-0001016</td>
                                        <td>04:00:00</td>
                                        <td>1.00</td>
                                        <td>1.00</td>
                                        <td>2015-05-01</td>
                                        <td></td>
                                        <td>2100</td>
                                    </tr>
                                    <tr data-intcode="SOC-A-0001015" data-name="Vinodh Arumugam" data-uid="c08b4ad2-14e4-11e5-b10a-74d435d335fe" data-urole="AU">
                                        <td>dookie</td>
                                        <td>SOC-T-0001017</td>
                                        <td>04:00:00</td>
                                        <td>1.00</td>
                                        <td>1.00</td>
                                        <td>2015-05-01</td>
                                        <td></td>
                                        <td>2800</td>
                                    </tr>
                                    <tr data-intcode="SOC-A-0001015" data-name="Vinodh Arumugam" data-uid="c08b4ad2-14e4-11e5-b10a-74d435d335fe" data-urole="AU">
                                        <td>Wild wild west</td>
                                        <td>SOC-T-0001018</td>
                                        <td>04:00:00</td>
                                        <td>1.00</td>
                                        <td>1.00</td>
                                        <td>2015-05-01</td>
                                        <td></td>
                                        <td>2900</td>
                                    </tr>
                                    <tr data-intcode="SOC-A-0001015" data-name="Vinodh Arumugam" data-uid="c08b4ad2-14e4-11e5-b10a-74d435d335fe" data-urole="AU">
                                        <td>nothing else matters</td>
                                        <td>SOC-T-0001019</td>
                                        <td>04:00:00</td>
                                        <td>1.00</td>
                                        <td>1.00</td>
                                        <td>2015-05-01</td>
                                        <td></td>
                                        <td>5800</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="box-footer">
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <input type="submit" value="Save" name="yt3" disabled="disabled" id="right_ajax_submit" class="btn btn-primary">                            </div>
                            </div>
                        </div>
                        <div class="overlay loader"></div>
                        <div class="loading-img loader"></div>
                    </form>                </div>
                <div class="text-left help-block hide">
                    <span><strong>Note:</strong> Data will be automatically saved after Broadcasting Share &amp; Mechanical Share is 100 % and One main publisher is added and (Publisher and Sub-Publisher) Shares is 50% Minimum</span>
                </div>

            </div>
        </div>    </div>


</div>

<?php
$search_url = Yii::app()->createAbsoluteUrl("site/soundcarrier/searchrecords");

$js = <<< EOD
    $(document).ready(function() {
        $('#search_button').on("click", function(){
            var data=$("#record-rightholder-search-form-rec-2").serialize();
            $.ajax({
                type: 'GET',
                url: '$search_url',
                data:{searach_text: $("#searach_text").val(), is_record: 1},
                success:function(data){
                    $("#search_right_result").html(data);
               },
                error: function(data) {
                    alert("Something went wrong. Try again");
                },
                dataType:'html'
            });
        });
        
        $('body').on('click','#record_search tr, #link-performer-rec tr, #rightperformertable tr', function(){
            $(this).addClass('highlight').siblings().removeClass('highlight');
        });
        
    });
        
        
EOD;
Yii::app()->clientScript->registerScript('_logsheet', $js);
?>
