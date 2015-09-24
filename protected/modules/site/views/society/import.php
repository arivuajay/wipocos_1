<?php
/* @var $this SocietyController */
/* @var $model Society */

$this->title = 'Import XLS';
$this->breadcrumbs = array(
    'Societies' => array('index'),
    $this->title,
);
?>

<div class="user-create">
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
    </div><!-- ./col -->
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