<?php
/* @var $this WorkController */
/* @var $dataProvider CActiveDataProvider */

$this->title = 'Works';
$this->breadcrumbs = array(
    'Works',
);
$languages = CHtml::listData(MasterLanguage::model()->isActive()->findAll(), 'Master_Lang_Id', 'Lang_Name');
$types = CHtml::listData(MasterType::model()->isActive()->findAll(), 'Master_Type_Id', 'Type_Name');
$factors = CHtml::listData(MasterFactor::model()->isActive()->findAll(), 'Master_Factor_Id', 'Factor');
$instruments = CHtml::listData(MasterInstrument::model()->isActive()->findAll(), 'Master_Inst_Id', 'Instrument_Name');
?>
<div class="col-lg-12 col-md-12" id="advance-search-block">
    <div class="row mb10" id="advance-search-label">
        <?php echo CHtml::link('<i class="fa fa-angle-right"></i> Show Advance Search', 'javascript:void(0);', array('class' => 'pull-right')); ?>
    </div>
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
                        'action' => array('/site/work/index'),
                        'htmlOptions' => array('role' => 'form')
                    ));
                    ?>

                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Work_Org_Title', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Work_Org_Title', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                            <?php echo $form->error($searchModel, 'Work_Org_Title'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Work_Language_Id', array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Work_Language_Id', $languages, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($searchModel, 'Work_Language_Id'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Work_Internal_Code', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Work_Internal_Code', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                            <?php echo $form->error($searchModel, 'Work_Internal_Code'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Work_Iswc', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Work_Iswc', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                            <?php echo $form->error($searchModel, 'Work_Iswc'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Work_Wic_Code', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Work_Wic_Code', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                            <?php echo $form->error($searchModel, 'Work_Wic_Code'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Work_Type_Id', array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Work_Type_Id', $types, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($searchModel, 'Work_Type_Id'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Work_Factor_Id', array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Work_Factor_Id', $factors, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($searchModel, 'Work_Factor_Id'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Work_Instrumentation', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Work_Instrumentation', array('class' => 'form-control', 'size' => 10, 'maxlength' => 10)); ?>
                            <?php echo $form->error($searchModel, 'Work_Instrumentation'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Work_Creation', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Work_Creation', array('class' => 'form-control', 'size' => 4, 'maxlength' => 4)); ?>
                            <?php echo $form->error($searchModel, 'Work_Creation'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Work_Opus_Number', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Work_Opus_Number', array('class' => 'form-control')); ?>
                            <?php echo $form->error($searchModel, 'Work_Opus_Number'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Active', array('class' => ' control-label')); ?>
                            <?php
                            echo $form->dropDownList($searchModel, 'Active', array('0' => 'In-active', '1' => 'Active'), array('prompt' => '', 'class' => 'form-control'));
                            ;
                            ?>
                            <?php echo $form->error($searchModel, 'Active'); ?>
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
//                array(
//                    'class' => 'IndexColumn',
//                    'header' => '',
//                ),
                'Work_Org_Title',
                array(
                    'header' => 'Work_Language_Id',
                    'value' => function($data) {
                        if (!empty($data->workLanguage->Lang_Name))
                            echo $data->workLanguage->Lang_Name;
                    },
                ),
                'Work_Internal_Code',
                'Work_Iswc',
                'Work_Wic_Code',
                array(
                    'header' => 'Work_Type_Id',
                    'value' => function($data) {
                        if (!empty($data->workType->Type_Name))
                            echo $data->workType->Type_Name;
                    },
                ),
                /*
                  'Work_Factor_Id',
                  'Work_Instrumentation',
                  'Work_Duration',
                  'Work_Creation',
                  'Work_Opus_Number',
                  array(
                  'name' => 'Active',
                  'htmlOptions' => array('style' => 'width: 180px;;text-align:center', 'vAlign' => 'middle'),
                  'type' => 'raw',
                  'value' => function($data) {
                  echo ($data->Active == 1) ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>';
                  },
                  ),
                 */
                array(
                    'header' => 'Actions',
                    'class' => 'booster.widgets.TbButtonColumn',
                    'htmlOptions' => array('style' => 'width: 180px;;text-align:center', 'vAlign' => 'middle', 'class' => 'action_column'),
                    'template' => '{view}{update}{delete}',
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
        <?php echo CHtml::link('<i class="fa fa-plus"></i>&nbsp;&nbsp;Create Work', array('/site/work/create'), array('class' => 'btn btn-success pull-right')); ?>
    </div>
</div>

<div class="col-lg-12 col-md-12">
    <div class="row">
        <?php
        $gridColumns = array(
//            array(
//                'class' => 'IndexColumn',
//                'header' => '',
//            ),
                'Work_Org_Title',
                array(
                    'header' => 'Work_Language_Id',
                    'value' => function($data) {
                        if (!empty($data->workLanguage->Lang_Name))
                            echo $data->workLanguage->Lang_Name;
                    },
                ),
                'Work_Internal_Code',
                'Work_Iswc',
                'Work_Wic_Code',
                array(
                    'header' => 'Work_Type_Id',
                    'value' => function($data) {
                        if (!empty($data->workType->Type_Name))
                            echo $data->workType->Type_Name;
                    },
                ),
            /*
              'Work_Factor_Id',
              'Work_Instrumentation',
              'Work_Duration',
              'Work_Creation',
              'Work_Opus_Number',
              array(
              'name' => 'Active',
              'htmlOptions' => array('style' => 'width: 180px;;text-align:center', 'vAlign' => 'middle'),
              'type' => 'raw',
              'value' => function($data) {
              echo ($data->Active == 1) ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>';
              },
              ),
             */
            array(
                'header' => 'Actions',
                'class' => 'booster.widgets.TbButtonColumn',
                'htmlOptions' => array('style' => 'width: 180px;;text-align:center', 'vAlign' => 'middle', 'class' => 'action_column'),
                'template' => '{view}{update}{delete}',
            )
        );

        $this->widget('booster.widgets.TbExtendedGridView', array(
            'type' => 'striped bordered',
            'dataProvider' => $model->dataProvider(),
            'responsiveTable' => true,
            'template' => '<div class="panel panel-primary"><div class="panel-heading"><div class="pull-right">{summary}</div><h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  Works</h3></div><div class="panel-body">{items}{pager}</div></div>',
            'columns' => $gridColumns
                )
        );
        ?>
    </div>
</div>