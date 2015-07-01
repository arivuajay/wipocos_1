<?php
/* @var $this PublisheraccountController */
/* @var $dataProvider CActiveDataProvider */

$this->title = 'Publishers';
$this->breadcrumbs = array(
    'Publishers',
);
$themeUrl = $this->themeUrl;
$cs = Yii::app()->getClientScript();
$cs_pos_end = CClientScript::POS_END;

$cs->registerCssFile($themeUrl . '/css/datepicker/datepicker3.css');
$cs->registerScriptFile($themeUrl . '/js/datepicker/bootstrap-datepicker.js', $cs_pos_end);
$cs->registerScriptFile($themeUrl . '/js/datatables/jquery.dataTables.js', $cs_pos_end);
$cs->registerScriptFile($themeUrl . '/js/datatables/dataTables.bootstrap.js', $cs_pos_end);

$countries = Myclass::getMasterCountry();
$languages = Myclass::getMasterLanguage();
$legal_forms = Myclass::getMasterLegalForm();
?>
<?php $this->renderPartial('/default/_colors')?>
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
                        'action' => array('/site/publisheraccount/index'),
                        'htmlOptions' => array('role' => 'form')
                    ));
                    ?>

                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Pub_Corporate_Name', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Pub_Corporate_Name', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                            <?php echo $form->error($searchModel, 'Pub_Corporate_Name'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Pub_Internal_Code', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Pub_Internal_Code', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                            <?php echo $form->error($searchModel, 'Pub_Internal_Code'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Pub_Ipi', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Pub_Ipi', array('class' => 'form-control')); ?>
                            <?php echo $form->error($searchModel, 'Pub_Ipi'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Pub_Ipi_Base_Number', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Pub_Ipi_Base_Number', array('class' => 'form-control')); ?>
                            <?php echo $form->error($searchModel, 'Pub_Ipi_Base_Number'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Pub_Date', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Pub_Date', array('class' => 'form-control date')); ?>
                            <?php echo $form->error($searchModel, 'Pub_Date'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Pub_Place', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Pub_Place', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                            <?php echo $form->error($searchModel, 'Pub_Place'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Pub_Country_Id', array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Pub_Country_Id', $countries, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($searchModel, 'Pub_Country_Id'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Pub_Legal_Form_id', array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Pub_Legal_Form_id', $legal_forms, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($searchModel, 'Pub_Legal_Form_id'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Pub_Reg_Date', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Pub_Reg_Date', array('class' => 'form-control date')); ?>
                            <?php echo $form->error($searchModel, 'Pub_Reg_Date'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Pub_Reg_Number', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Pub_Reg_Number', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                            <?php echo $form->error($searchModel, 'Pub_Reg_Number'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Pub_Excerpt_Date', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Pub_Excerpt_Date', array('class' => 'form-control date')); ?>
                            <?php echo $form->error($searchModel, 'Pub_Excerpt_Date'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Pub_Language_Id', array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Pub_Language_Id', $languages, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($searchModel, 'Pub_Language_Id'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'search_status', array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'search_status', Myclass::getSearchStatus(), array('prompt' => '', 'class' => 'form-control')); ?>
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
                'Pub_Corporate_Name',
                'Pub_Internal_Code',
                'Pub_Ipi',
               // 'Pub_Ipi_Base_Number',
                'Pub_Date',
//                'Pub_Place',
                array(
                    'name' => 'Status',
                    'htmlOptions' => array('style' => 'text-align:center', 'vAlign' => 'middle'),
                    'type' => 'raw',
                    'value' => function($data) {
                echo $data->status;
            },
                ),
                /*
                  'Pub_Country_Id',
                  'Pub_Legal_Form_id',
                  'Pub_Reg_Date',
                  'Pub_Reg_Number',
                  'Pub_Excerpt_Date',
                  'Pub_Language_Id',
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
                    'class' => 'application.components.MyActionButtonColumn',
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
            'label' => 'Create Publisher Group',
            'icon' => 'fa fa-plus',
            'url' => array('/site/publishergroup/create', 'type' => 'publisher'),
            'buttonType' => 'link',
            'context' => 'success',
            'htmlOptions' => array('class' => 'pull-right', 'style' => 'margin-left:10px;'),
                )
        );
        $this->widget(
                'application.components.MyTbButton', array(
            'label' => 'Create Publisher',
            'icon' => 'fa fa-plus',
            'url' => array('/site/publisheraccount/create'),
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
//            array(
//                'class' => 'IndexColumn',
//                'header' => '',
//            ),
            'Pub_Corporate_Name',
            'Pub_Internal_Code',
            'Pub_Ipi',
           // 'Pub_Ipi_Base_Number',
            'Pub_Date',
//            'Pub_Place',
            array(
                'name' => 'Status',
                'htmlOptions' => array('style' => 'text-align:center', 'vAlign' => 'middle'),
                'type' => 'raw',
                'value' => function($data) {
            echo $data->status;
        },
            ),
            array(
                'name' => 'Pub_Is_Producer',
                'htmlOptions' => array('style' => 'text-align:center', 'vAlign' => 'middle'),
                'type' => 'raw',
                'value' => function($data) {
                    echo $data->Pub_Is_Producer == 'Y' ? '<i class="fa fa-check text-success" title="Yes"></i>' : '<i class="fa fa-times text-red" title="No"></i>';
                },
            ),
            /*
              'Pub_Country_Id',
              'Pub_Legal_Form_id',
              'Pub_Reg_Date',
              'Pub_Reg_Number',
              'Pub_Excerpt_Date',
              'Pub_Language_Id',
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
                'class' => 'application.components.MyActionButtonColumn',
                'htmlOptions' => array('style' => 'width: 180px;;text-align:center', 'vAlign' => 'middle', 'class' => 'action_column'),
                'template' => '{view}{update}{delete}',
            )
        );

        $export_btn = $this->renderExportGridButton('publisher-base-grid', '<i class="fa fa-file-excel-o"></i> Export', array('class' => 'btn btn-xs btn-danger  pull-right'));

        $this->widget('booster.widgets.TbExtendedGridView', array(
            'id' => 'publisher-base-grid',
            'type' => 'striped bordered datatable',
            'dataProvider' => $model->dataProvider(),
            'responsiveTable' => true,
            'template' => '<div class="panel panel-primary"><div class="panel-heading"><div class="pull-right">{summary}&nbsp;' . $export_btn . '</div><h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  Publishers</h3></div><div class="panel-body">{items}{pager}</div></div>',
            'columns' => $gridColumns
                )
        );
        ?>
    </div>
</div>
<?php
$js = <<< EOD
    $(document).ready(function(){
        $('.date').datepicker({ format: 'yyyy-mm-dd' });
    });
EOD;
Yii::app()->clientScript->registerScript('index', $js);
?>