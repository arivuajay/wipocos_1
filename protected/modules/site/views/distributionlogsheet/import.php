<?php
/* @var $this SocietyController */
/* @var $model Society */

$this->title = isset($staging) && !empty($staging) ? 'Staging Table' : 'Import XLS';
$this->breadcrumbs = array(
    'Utlization Periods' => array('/site/distributionutlizationperiod/index'),
    $this->title,
);
?>

<div class="user-create">
    <?php
    if (isset($staging) && !empty($staging)) {
        Yii::app()->session['staging_tables'] = $staging_tables;
        Yii::app()->session['staging'] = $staging;
        Yii::app()->session['title'] = $imported_table;
        $status = Myclass::importViewStatus();
        $ignore_list = Myclass::importViewIgnoreList();
        $errorTexts = Myclass::importErrorTexts();
        ?>
        <div class="row mb10">
            <div class="col-lg-12 col-xs-12">
                <?php
                echo MyHtml::link('<i class="fa fa-file-excel-o"></i> Export CSV', array('/site/society/exportimporteddata'), array('class' => "pull-right btn btn-danger", 'style' => 'margin-left:10px;'));
                echo MyHtml::link('<< Back to Import', array('/site/society/import', 'sid' => $model->Society_Id), array('class' => "pull-right btn btn-success"));
                ?>
            </div>
        </div>
        <div class="alert alert-success fade in">
            <button data-dismiss="alert" class="close close-sm" type="button">
                <i class="fa fa-times"></i>
            </button>
            XLS Imported Successfully!!!   <br /><?php echo $import_status; ?>             
        </div>
        <?php // echo CHtml::link('asd', $staging);  ?>
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="col-lg-12">
                    <div class="box-body" style="width: 100%;">
                        <h3 class="box-title text-center text-capitalize"><?php echo $imported_table; ?></h3>
                        <?php foreach ($staging_tables as $table => $cont) { ?>
                            <h4 class="box-title"><?php echo $cont['title']; ?></h4>
                            <table class="table table-bordered">
                                <tbody>
                                    <?php
                                    $tr = "<tr>";
                                    $tr .= "<td>S.No</td>";
                                    foreach ($staging[1][$cont['key']] as $col => $value) {
                                        if (!in_array($col, $ignore_list))
                                            $tr .= "<td>" . $table::model()->getAttributeLabel($col) . "</td>";
                                    }
                                    $tr .= "<td>Status</td>";
                                    $tr .= "</tr>";
                                    $i = 1;
                                    foreach ($staging as $key => $rows) {
                                        $bg = $status[$rows[$cont['key']]['import_status']]['bg_color'];
                                        $txt_clr = $status[$rows[$cont['key']]['import_status']]['text_color'];
                                        $sts = $status[$rows[$cont['key']]['import_status']]['status'];

                                        $tr .= "<tr style='background-color:$bg'>";
                                        $tr .= "<td>{$i}</td>";
                                        foreach ($staging[$key][$cont['key']] as $col => $value) {
                                            if (!in_array($col, $ignore_list)) {
                                                $tr .= "<td>";
                                                if ($value == "")
                                                    $tr .= "<span class='errorMessage'>empty</span>";
                                                else if (in_array($value, $errorTexts))
                                                    $tr .= "<span class='errorMessage'>$value</span>";
                                                else
                                                    $tr .= $value;
                                                $tr .= "</td>";
                                            }
                                        }
                                        $tr .= "<td><strong style='color:{$txt_clr}'>{$sts}</strong></td>";
                                        $tr .= "</tr>";
                                        $i++;
                                    }
                                    echo $tr;
                                    ?>
                                </tbody>
                            </table>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } else { ?>

        <div class="box box-primary">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'logsheet-form',
                'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data'),
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                ),
                'enableAjaxValidation' => false,
            ));
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
                                    <?php echo CHtml::textField('class_title', $period_model->class->Class_Name, array('class' => 'form-control', 'disabled' => true)) ?>
                                </div>

                                <div class="form-group">
                                    <?php echo CHtml::label('Year', 'year', array('class' => '')); ?>
                                    <?php echo CHtml::textField('year', $period_model->Period_Year, array('class' => 'form-control', 'disabled' => true)) ?>
                                </div>

                            </div>
                            <div class="col-lg-1"></div>
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <?php echo CHtml::label('Period', '', array('class' => 'col-sm-2 control-label')); ?>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <?php echo CHtml::textField('from', $period_model->Period_From, array('class' => 'form-control', 'disabled' => true)) ?>
                                            </div>
                                            <div class="col-lg-13">
                                                <?php echo CHtml::textField('to', $period_model->Period_To, array('class' => 'form-control', 'disabled' => true)) ?>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <?php echo CHtml::label('Account', 'account', array('class' => 'col-sm-2 control-label')); ?>
                                    <div class="col-sm-5">
                                        <?php echo CHtml::textField('account', $period_model->setting->Setting_Date, array('class' => 'form-control', 'disabled' => true)) ?>
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
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'import_file', array('class' => '')); ?>
                                    <?php echo $form->fileField($model, 'import_file', array('class' => '')); ?>
                                    <?php echo $form->error($model, 'import_file'); ?>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <?php echo CHtml::submitButton('Import', array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')); ?>
                                </div>
                                <div class="form-group">
                                    <a data-toggle="modal" data-target="#samplesModal" href="#">Click Here to Download Samples Files</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <?php $this->endWidget(); ?>
        </div>
    <?php } ?>
</div>

<?php
$this->beginWidget(
        'booster.widgets.TbModal', array('id' => 'samplesModal')
);
?>
<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Download Samples</h4>
</div>
<div class="modal-body">
    <div class="form-group">
        <div style="max-height: 300px; overflow-y: scroll">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Download</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $samples = array(
                        'Logsheet' => 'logsheet.xls',
                    );
                    foreach ($samples as $cat => $file):
                        ?>
                        <tr>
                            <td><?php echo $cat; ?></td>
                            <td><?php echo CHtml::link('<i class="fa fa-download"></i>', array('/site/default/download', 'df' => Myclass::refencryption(Yii::app()->createAbsoluteUrl(str_replace(DS, '/', UPLOAD_DIR . "/import_sample/$file")))), array('title' => 'Download')); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>    
    </div>
</div>
<div class="modal-footer">
    <?php
    $this->widget(
            'application.components.MyTbButton', array(
        'label' => 'Close',
        'url' => '#',
        'htmlOptions' => array('data-dismiss' => 'modal'),
            )
    );
    ?>
</div>
<?php $this->endWidget(); ?>