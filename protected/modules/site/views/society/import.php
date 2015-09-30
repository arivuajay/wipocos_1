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
    <?php if (isset($staging) && !empty($staging)) {
        ?>
        <div class="alert alert-success fade in">
            <button data-dismiss="alert" class="close close-sm" type="button">
                <i class="fa fa-times"></i>
            </button>
            XLS Imported Successfully!!!   <br /><?php echo $import_status; ?>             
        </div>
        <div class="row mb10">
            <div class="col-lg-12 col-xs-12">
                <?php echo MyHtml::link('<< Back to Import', array('/site/society/import', 'sid' => $model->Society_Id), array('class' => "pull-right btn btn-info")) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="col-lg-12">
                    <div class="box-body" style="width: 100%;">
                        <?php foreach ($staging_tables as $table => $cont) { ?>
                        <h3 class="box-title"><?php echo $cont['title']; ?> Table</h3>
                            <table class="table table-bordered">
                                <tbody>
                                    <?php
                                    echo "<tr>";
                                    foreach ($staging[1][$cont['key']] as $col => $value) {
                                        echo "<td>" . $table::model()->getAttributeLabel($col) . "</td>";
                                    }
                                    echo "</tr>";
                                    ?>
                                    <?php
                                    foreach ($staging as $key => $rows) {
                                        $bg = '';
//                                        $bg = $staging[$key][$cont['key']]['success'] == '1' ? '' : '#F2DEDE';
                                        echo "<tr style='background-color:$bg'>";
                                        foreach ($staging[$key][$cont['key']] as $col => $value) {
                                            echo "<td>";
                                            echo $value == "" && $value != "0" ? "<strong><span class='errorMessage'>empty</span><strong>" : $value;
                                            echo "</td>";
                                        }
                                        echo "</tr>";
                                    }
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