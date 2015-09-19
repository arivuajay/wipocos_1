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
            <div class="box box-primary">
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
                        <div class="col-lg-12">
                            <?php echo CHtml::submitButton('Import', array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')); ?>
                        </div>
                    </div>
                </div>
                <?php $this->endWidget(); ?>
            </div>
        </div><!-- ./col -->
    </div>
</div>
