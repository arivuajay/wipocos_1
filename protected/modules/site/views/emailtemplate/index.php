<?php
/* @var $this EmailtemplateController */
/* @var $dataProvider CActiveDataProvider */

$this->title = 'Email Templates';
$this->breadcrumbs = array(
    'Email Templates',
);
$themeUrl = $this->themeUrl;
$cs = Yii::app()->getClientScript();
$cs_pos_end = CClientScript::POS_END;

$cs->registerScriptFile($themeUrl . '/js/datatables/jquery.dataTables.js', $cs_pos_end);
$cs->registerScriptFile($themeUrl . '/js/datatables/dataTables.bootstrap.js', $cs_pos_end);
?>
<div class="col-lg-12 col-md-12" id="advance-search-block">
    <div class="row mb10" id="advance-search-label">
        <?php echo CHtml::link('<i class="fa fa-angle-right"></i> Show Advance Search', 'javascript:void(0);', array('class' => 'pull-right')); ?>    </div>
    <div class="row" id="advance-search-form">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="glyphicon glyphicon-search"></i>  Search
                </h3>
                <div class="clearfix"></div>
            </div>
            <section class="content">
                <div class="row">
                    <?php
                    $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'search-form',
                        'method' => 'get',
                        'action' => array('/site/emailtemplate/index'),
                        'htmlOptions' => array('role' => 'form')
                    ));
                    ?>

                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Email_Temp_Name', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Email_Temp_Name', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                            <?php echo $form->error($searchModel, 'Email_Temp_Name'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Email_Temp_From', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Email_Temp_From', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
                            <?php echo $form->error($searchModel, 'Email_Temp_From'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Email_Temp_ReplyTo', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Email_Temp_ReplyTo', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
                            <?php echo $form->error($searchModel, 'Email_Temp_ReplyTo'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Email_Temp_Subject', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Email_Temp_Subject', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                            <?php echo $form->error($searchModel, 'Email_Temp_Subject'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Email_Temp_Content', array('class' => ' control-label')); ?>
                            <?php echo $form->textArea($searchModel, 'Email_Temp_Content', array('class' => 'form-control', 'rows' => 6, 'cols' => 50)); ?>
                            <?php echo $form->error($searchModel, 'Email_Temp_Content'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Email_Temp_Params', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Email_Temp_Params', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                            <?php echo $form->error($searchModel, 'Email_Temp_Params'); ?>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2">
                        <div class="form-group">
                            <label>&nbsp;</label>
                            <?php echo CHtml::submitButton('Search', array('class' => 'btn btn-primary form-control')); ?>
                        </div>
                    </div>
                    <?php $this->endWidget(); ?>
                </div>
            </section>


        </div>
    </div>
</div>

<?php if ($search) { ?>
    <div class="col-lg-12 col-md-12">
        <div class="row">
            <?php
            $gridColumns = array(
                'Email_Temp_Name',
                'Email_Temp_From',
                'Email_Temp_ReplyTo',
                'Email_Temp_Subject',
                'Email_Temp_Content',
//                'Email_Temp_Params',
                array(
                    'header' => 'Actions',
                    'class' => 'application.components.MyActionButtonColumn',
                    'htmlOptions' => array('style' => 'width: 180px;;text-align:center', 'vAlign' => 'middle', 'class' => 'action_column'),
                    'template' => '{view}{update}',
                )
            );

            $this->widget('booster.widgets.TbExtendedGridView', array(
                'type' => 'striped bordered',
                'dataProvider' => $searchModel->search(),
                'responsiveTable' => true,
                'template' => "<div class='panel panel-primary'><div class='panel-heading'><div class='pull-right'>{summary}</div><h3 class='panel-title'><i class='glyphicon glyphicon-search'></i> Search Results</h3></div>\n<div class='panel-body'>{items}\n{pager}</div></div>",
                'columns' => $gridColumns
                    )
            );
            ?>
        </div>
    </div>
<?php } ?>

<div class="col-lg-12 col-md-12">
    <div class="row">
        <div class="col-lg-4 col-md-4 row">
            <div class="form-group">
                <label class="control-label">Spotlight Search: </label>
                <input type="text" class="form-control inline" name="base_table_search" id="base_table_search" />
            </div>
        </div>
        <?php
        $this->widget(
                'application.components.MyTbButton', array(
            'label' => 'Create EmailTemplate',
            'icon' => 'fa fa-plus',
            'url' => array('/site/emailtemplate/create'),
            'buttonType' => 'link',
            'context' => 'success',
            'htmlOptions' => array('class' => 'pull-right hide'),
                )
        );
        ?>
    </div>
</div>

<div class="col-lg-12 col-md-12">
    <div class="row">
        <?php
        $gridColumns = array(
            'Email_Temp_Name',
            'Email_Temp_From',
            'Email_Temp_ReplyTo',
            'Email_Temp_Subject',
            'Email_Temp_Content',
//            'Email_Temp_Params',
            array(
                'header' => 'Actions',
                'class' => 'application.components.MyActionButtonColumn',
                'htmlOptions' => array('style' => 'width: 180px;;text-align:center', 'vAlign' => 'middle', 'class' => 'action_column'),
                'template' => '{view}{update}',
            )
        );

        $this->widget('booster.widgets.TbExtendedGridView', array(
            'type' => 'striped bordered datatable',
            'dataProvider' => $model->dataProvider(),
            'responsiveTable' => true,
            'template' => '<div class="panel panel-primary"><div class="panel-heading"><div class="pull-right">{summary}</div><h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  Email Templates</h3></div><div class="panel-body">{items}{pager}</div></div>',
            'columns' => $gridColumns
                )
        );
        ?>
    </div>
</div>