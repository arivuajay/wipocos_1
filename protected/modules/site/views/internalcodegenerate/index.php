<?php
/* @var $this InternalcodegenerateController */
/* @var $dataProvider CActiveDataProvider */

$this->title = 'Code Definition Master';
$this->breadcrumbs = array(
    'Code Definition Master',
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
                        'action' => array('/site/internalcodegenerate/index'),
                        'htmlOptions' => array('role' => 'form')
                    ));
                    $user_types = InternalcodeGenerate::model()->getUsertype();
                    ?>

                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Gen_User_Type', array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Gen_User_Type', $user_types, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($searchModel, 'Gen_User_Type'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Gen_Prefix', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Gen_Prefix', array('class' => 'form-control', 'size' => 10, 'maxlength' => 10)); ?>
                            <?php echo $form->error($searchModel, 'Gen_Prefix'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Gen_Inter_Code', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Gen_Inter_Code', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
                            <?php echo $form->error($searchModel, 'Gen_Inter_Code'); ?>
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
                    'name' => 'Gen_User_Type',
                    'value' => function($data) {
                        return InternalcodeGenerate::model()->getUsertype($data->Gen_User_Type);
                    }
                ),
                array(
                    'name' => 'Gen_Soc_Id',
                    'value' => function($data) {
                        return $data->soceity->Society_Code;
                    }
                ),
                'Gen_Prefix',
                'Gen_Inter_Code',
//                'Gen_Suffix',
//                'Gen_Code_Pad',
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
//        $this->widget(
//                'application.components.MyTbButton', array(
//            'label' => 'Create InternalcodeGenerate',
//            'icon' => 'fa fa-plus',
//            'url' => array('/site/internalcodegenerate/create'),
//            'buttonType' => 'link',
//            'context' => 'success',
//            'htmlOptions' => array('class' => 'pull-right'),
//                )
//        );
        ?>
    </div>
</div>

<div class="col-lg-12 col-md-12">
    <div class="row">
        <?php
        $gridColumns = array(
//            'Gen_User_Type',
            array(
                'name' => 'Gen_User_Type',
                'value' => function($data) {
                    return InternalcodeGenerate::model()->getUsertype($data->Gen_User_Type);
                }
            ),
            array(
                'name' => 'Gen_Soc_Id',
                'value' => function($data) {
                    return $data->soceity->Society_Code;
                }
            ),
            'Gen_Prefix',
            'Gen_Inter_Code',
//            'Gen_Suffix',
//            'Gen_Code_Pad',
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
            'template' => '<div class="panel panel-primary"><div class="panel-heading"><div class="pull-right">{summary}</div><h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  Code Definition Master</h3></div><div class="panel-body">{items}{pager}</div></div>',
            'columns' => $gridColumns
                )
        );
        ?>
    </div>
</div>