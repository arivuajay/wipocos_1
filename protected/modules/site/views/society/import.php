<?php
/* @var $this SocietyController */
/* @var $model Society */

$this->title = isset($staging) && !empty($staging) ? 'Staging Table' : 'Import XLS';
$this->breadcrumbs = array(
    'Societies' => array('index'),
    $this->title,
);

?>

<div class="user-create">
    <?php
    if (isset($staging) && !empty($staging)) {
        $status = array(
            0 => array(
                'bg_color' => '#F2DEDE',
                'text_color' => '#B74442',
                'status' => 'Not Inserted',
            ),
            1 => array(
                'bg_color' => '#DFF0D8',
                'text_color' => '#008D4C',
                'status' => 'Inserted',
            ),
            2 => array(
                'bg_color' => '#FCF8E3',
                'text_color' => '#F39C12',
                'status' => 'Duplicate Record',
            ),
        );
        $ignore_list = array(
            'import_status',
            'success'
        );
        $errorTexts = Myclass::importErrorTexts();
        ?>
        <div class="row mb10">
            <div class="col-lg-12 col-xs-12">
                <?php echo MyHtml::link('<< Back to Import', array('/site/society/import', 'sid' => $model->Society_Id), array('class' => "pull-right btn btn-success")) ?>
            </div>
        </div>
        <div class="alert alert-success fade in">
            <button data-dismiss="alert" class="close close-sm" type="button">
                <i class="fa fa-times"></i>
            </button>
            XLS Imported Successfully!!!   <br /><?php echo $import_status; ?>             
        </div>
        <?php echo CHtml::link('asd', $staging); ?>
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
                                                if($value == "")
                                                    $tr .= "<span class='errorMessage'>empty</span>";
                                                else if(in_array($value, $errorTexts))
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

        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'society-form',
                    'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data'),
                    'clientOptions' => array(
                        'validateOnSubmit' => true,
                    ),
                    'enableAjaxValidation' => false,
                ));
                $import_category = $model->getImportcategoryList();
                ?>

                <div class="box box-primary">
                    <div class="col-lg-12">
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Society</label>
                                <div class="col-sm-5" style="padding-top: 7px;">
                                    <?php echo $model->societyname ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'import_category', array('class' => 'col-sm-2 control-label')); ?>
                                <div class="col-sm-5">
                                    <?php echo $form->dropDownList($model, 'import_category', $import_category, array('class' => 'form-control', 'prompt' => '')); ?>
                                    <?php echo $form->error($model, 'import_category'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'import_file', array('class' => 'col-sm-2 control-label')); ?>
                                <div class="col-sm-5">
                                    <?php echo $form->fileField($model, 'import_file', array()); ?>
                                    <?php echo $form->error($model, 'import_file'); ?>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="box-footer">
                        <div class="form-group">
                            <div class="col-lg-offset-2">
                                <?php echo CHtml::submitButton('Import', array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')); ?>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="form-group">
                            <div class="col-sm-6">
                                <div class="help-block">
                                    <a data-toggle="modal" data-target="#samplesModal" href="#">Click Here to Download Samples Files</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <?php $this->endWidget(); ?>
            </div>
        </div>
    <?php } ?>
</div>
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
                        'Authors' => 'authors.xls',
                        'Performers' => 'performers.xls',
                        'Publishers' => 'publishers.xls',
                        'Producers' => 'producers.xls',
                        'Works' => 'works.xls',
                        'Recordings' => 'recordings.xls',
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