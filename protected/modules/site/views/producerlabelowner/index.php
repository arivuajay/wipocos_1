<?php
/* @var $this ProducerLabelOwnerController */
/* @var $dataProvider CActiveDataProvider */
$themeUrl = $this->themeUrl;
$cs = Yii::app()->getClientScript();
$cs_pos_end = CClientScript::POS_END;

$cs->registerCssFile($themeUrl . '/css/datepicker/datepicker3.css');
$cs->registerScriptFile($themeUrl . '/js/datepicker/bootstrap-datepicker.js', $cs_pos_end);

$this->title = 'Producer Label Ownerships';
$this->breadcrumbs = array(
    'Producer Label Ownerships',
);
$labels = Myclass::getMasterLabel();
$producers = Myclass::getProducer();
?>
<div class="col-lg-12 col-md-12">
    <div class="row">
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
                        'action' => array('/site/producerlabelowner/index'),
                        'htmlOptions' => array('role' => 'form')
                    ));
                    ?>

                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Pro_Acc_Id', array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Pro_Acc_Id', $producers, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($searchModel, 'Pro_Acc_Id'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Label_Id', array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Label_Id', $labels, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($searchModel, 'Label_Id'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Label_Owner_From', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Label_Owner_From', array('class' => 'form-control date')); ?>
                            <?php echo $form->error($searchModel, 'Label_Owner_From'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Label_Owner_To', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Label_Owner_To', array('class' => 'form-control date')); ?>
                            <?php echo $form->error($searchModel, 'Label_Owner_To'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Label_Share', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Label_Share', array('class' => 'form-control', 'size' => 10, 'maxlength' => 10)); ?>
                            <?php echo $form->error($searchModel, 'Label_Share'); ?>
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
                array(
                    'class' => 'IndexColumn',
                    'header' => '',
                ),
                array(
                    'name' => 'Label_Id',
                    'value' => function($data) {
                        echo $data->label->Label_Name;
                    },
                ),
                'Label_Owner_From',
                'Label_Owner_To',
                array(
                    'name' => 'Pro_Acc_Id',
                    'value' => function($data) {
                        echo $data->proAcc->Pro_Corporate_Name;
                    },
                ),
                'Label_Share',
                array(
                    'header' => 'Actions',
                    'class' => 'application.components.MyActionButtonColumn',
                    'htmlOptions' => array('style' => 'width: 180px;;text-align:center', 'vAlign' => 'middle', 'class' => 'action_column'),
                    'template' => '{view}{delete}',
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
    <div class="row mb10">
        <?php
        $this->widget(
                'application.components.MyTbButton', array(
            'label' => 'Create Producer LabelOwner',
            'icon' => 'fa fa-plus',
            'url' => array('/site/producerlabelowner/create'),
            'buttonType' => 'link',
            'context' => 'success',
            'htmlOptions' => array('class' => 'pull-right'),
                )
        );
        ?>
    </div>
</div>

<div class="col-lg-12 col-md-12">
    <div class="row">
        <?php
        $gridColumns = array(
            array(
                'class' => 'IndexColumn',
                'header' => '',
            ),
            array(
                'name' => 'Label_Id',
                'value' => function($data) {
                    echo $data->label->Label_Name;
                },
            ),
            'Label_Owner_From',
            'Label_Owner_To',
            array(
                'name' => 'Pro_Acc_Id',
                'value' => function($data) {
                    echo $data->proAcc->Pro_Corporate_Name;
                },
            ),
            'Label_Share',
            array(
                'header' => 'Actions',
                'class' => 'application.components.MyActionButtonColumn',
                'htmlOptions' => array('style' => 'width: 180px;;text-align:center', 'vAlign' => 'middle', 'class' => 'action_column'),
                'template' => '{view}{delete}',
            )
        );

        $this->widget('booster.widgets.TbExtendedGridView', array(
            'type' => 'striped bordered',
            'dataProvider' => $model->dataProvider(),
            'responsiveTable' => true,
            'template' => '<div class="panel panel-primary"><div class="panel-heading"><div class="pull-right">{summary}</div><h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  Producer Label Ownerships</h3></div><div class="panel-body">{items}{pager}</div></div>',
            'columns' => $gridColumns
                )
        );
        ?>
    </div>
</div>
<?php
$js = <<< EOD
    $(document).ready(function () {
        $('.date').datepicker({format: 'yyyy-mm-dd'});
    });
EOD;
Yii::app()->clientScript->registerScript('index', $js);
?>