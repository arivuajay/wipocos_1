<?php
/* @var $this PerformeraccountController */
/* @var $dataProvider CActiveDataProvider */

$this->title = 'Performers';
$this->breadcrumbs = array(
    'Performers',
);
$themeUrl = $this->themeUrl;
$cs = Yii::app()->getClientScript();
$cs_pos_end = CClientScript::POS_END;



$cs->registerScriptFile($themeUrl . '/js/datatables/jquery.dataTables.js', $cs_pos_end);
$cs->registerScriptFile($themeUrl . '/js/datatables/dataTables.bootstrap.js', $cs_pos_end);
?>
<?php $this->renderPartial('/default/_colors') ?>
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
                        'action' => array('/site/performeraccount/index'),
                        'htmlOptions' => array('role' => 'form')
                    ));
                    ?>


                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Perf_First_Name', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Perf_First_Name', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                            <?php echo $form->error($searchModel, 'Perf_First_Name'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Perf_Sur_Name', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Perf_Sur_Name', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
                            <?php echo $form->error($searchModel, 'Perf_Sur_Name'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Perf_Internal_Code', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Perf_Internal_Code', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                            <?php echo $form->error($searchModel, 'Perf_Internal_Code'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Perf_Ipi', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Perf_Ipi', array('class' => 'form-control')); ?>
                            <?php echo $form->error($searchModel, 'Perf_Ipi'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Perf_Ipi_Base_Number', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Perf_Ipi_Base_Number', array('class' => 'form-control')); ?>
                            <?php echo $form->error($searchModel, 'Perf_Ipi_Base_Number'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Perf_Ipn_Number', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Perf_Ipn_Number', array('class' => 'form-control')); ?>
                            <?php echo $form->error($searchModel, 'Perf_Ipn_Number'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Perf_DOB', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Perf_DOB', array('class' => 'form-control date')); ?>
                            <?php echo $form->error($searchModel, 'Perf_DOB'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Perf_Identity_Number', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Perf_Identity_Number', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                            <?php echo $form->error($searchModel, 'Perf_Identity_Number'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Perf_Gender', array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Perf_Gender', Myclass::getGender(), array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($searchModel, 'Perf_Gender'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Created_Date', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Created_Date', array('class' => 'form-control date')); ?>
                            <?php echo $form->error($searchModel, 'Created_Date'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'expiry_date', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'expiry_date', array('class' => 'form-control date')); ?>
                            <?php echo $form->error($searchModel, 'expiry_date'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'hierarchy_level', array('class' => ' control-label')); ?>
                            <?php $internal_positions = Myclass::getMasterInternalPosition(); ?>
                            <?php echo $form->dropDownList($searchModel, 'hierarchy_level', $internal_positions, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($searchModel, 'hierarchy_level'); ?>
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
                'Perf_Internal_Code',
                'Perf_Sur_Name',
                'Perf_First_Name',
                'Perf_Ipi',
//                'Perf_Identity_Number',
                array(
                    'name' => 'Pseudonym',
                    'value' => function($data) {
                        if (!empty($data->performerPseudonyms))
                            echo $data->performerPseudonyms->Perf_Pseudo_Name;
                    },
                ),
                array(
                    'name' => 'Created_Date',
                    'htmlOptions' => array('style' => 'width: 180px;;text-align:center', 'vAlign' => 'middle'),
                    'type' => 'raw',
                    'value' => function($data) {
                if ($data->performerRelatedRights && $data->performerRelatedRights->Perf_Rel_Entry_Date != '' && $data->performerRelatedRights->Perf_Rel_Entry_Date != '0000-00-00')
                    echo date('Y-m-d', strtotime($data->performerRelatedRights->Perf_Rel_Entry_Date));
            },
                ),
                array(
                    'name' => 'Perf_DOB',
                    'htmlOptions' => array('style' => 'text-align:center', 'vAlign' => 'middle'),
                    'type' => 'raw',
                    'value' => function($data) {
                if ($data->Perf_DOB != '' && $data->Perf_DOB != '0000-00-00')
                    echo date('Y-m-d', strtotime($data->Perf_DOB));
            },
                ),
                array(
                    'name' => 'Status',
                    'htmlOptions' => array('style' => 'text-align:center', 'vAlign' => 'middle'),
                    'type' => 'raw',
                    'value' => function($data) {
                echo $data->status;
            },
                ),
                array(
                    'name' => 'Perf_Is_Author',
                    'htmlOptions' => array('style' => 'text-align:center', 'vAlign' => 'middle'),
                    'type' => 'raw',
                    'visible' => UserIdentity::checkAccess(null, 'authoraccount', 'view'),
                    'value' => function($data) {
                echo $data->Perf_Is_Author == 'Y' ? '<i class="fa fa-check text-success" title="Yes"></i>' : '<i class="fa fa-times text-red" title="No"></i>';
            },
                ),
//                'Perf_Ipi',
//                'Perf_Ipi_Base_Number',
//                'Perf_Ipn_Number',
                /*
                  'Perf_DOB',
                  'Perf_Place_Of_Birth_Id',
                  'Perf_Birth_Country_Id',
                  'Perf_Nationality_Id',
                  'Perf_Language_Id',
                  'Perf_Identity_Number',
                  'Perf_Marital_Status_Id',
                  'Perf_Spouse_Name',
                  'Perf_Gender',
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
        <?php
//        $form = $this->beginWidget('CActiveForm', array(
//            'id' => 'global-search-form',
//            'method' => 'get',
//            'action' => array('/site/performeraccount/index'),
//            'htmlOptions' => array('role' => 'form')
//        ));
        ?>
        <div class="col-lg-4 col-md-4 row">
            <div class="form-group">
                <label class="control-label">Spotlight Search: </label>
                <input type="text" class="form-control inline" name="base_table_search" id="base_table_search" />
            </div>
        </div>
        <!--        <div class="col-lg-2 col-md-2">
        <?php echo CHtml::submitButton('Go', array('class' => 'btn btn-primary btn-sm')); ?>&nbsp;&nbsp;
        <?php echo CHtml::link('Clear', array('/site/performeraccount/index'), array('class' => 'btn btn-primary btn-sm')); ?>
                </div>-->
        <?php
        $search_data = '';
        if (isset($_GET['PerformerAccount']) && $searchModel->search()->getTotalItemCount() == 0) {
            $search_data .= '?';
            $ExceptList = array('Perf_Internal_Code');

            foreach ($_GET['PerformerAccount'] as $col => $value) {
                if (!in_array($col, $ExceptList))
                    $search_data .= "PerformerAccount[{$col}]={$value}&";
            }

            $search_data = rtrim($search_data, '&');
        }

        $this->widget(
                'application.components.MyTbButton', array(
            'label' => 'Create Performer Group',
            'icon' => 'fa fa-plus',
            'url' => array('/site/group/create', 'type' => 'performer'),
            'buttonType' => 'link',
            'context' => 'success',
            'htmlOptions' => array('class' => 'pull-right', 'style' => 'margin-left:10px;'),
                )
        );
        $this->widget(
                'application.components.MyTbButton', array(
            'label' => 'Create Performer',
            'icon' => 'fa fa-plus',
            'url' => array("/site/performeraccount/create{$search_data}"),
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
            'Perf_Internal_Code',
            'Perf_Sur_Name',
            'Perf_First_Name',
            'Perf_Ipi',
//            'Perf_Identity_Number',
            array(
                'name' => 'Pseudonym',
                'value' => function($data) {
                    if (!empty($data->performerPseudonyms))
                        echo $data->performerPseudonyms->Perf_Pseudo_Name;
                },
            ),
            array(
                'name' => 'Created_Date',
                'htmlOptions' => array('style' => 'text-align:center', 'vAlign' => 'middle'),
                'type' => 'raw',
                'value' => function($data) {
            if ($data->performerRelatedRights && $data->performerRelatedRights->Perf_Rel_Entry_Date != '' && $data->performerRelatedRights->Perf_Rel_Entry_Date != '0000-00-00')
                echo date('Y-m-d', strtotime($data->performerRelatedRights->Perf_Rel_Entry_Date));
        },
            ),
            array(
                'name' => 'Perf_DOB',
                'htmlOptions' => array('style' => 'text-align:center', 'vAlign' => 'middle'),
                'type' => 'raw',
                'value' => function($data) {
            if ($data->Perf_DOB != '' && $data->Perf_DOB != '0000-00-00')
                echo date('Y-m-d', strtotime($data->Perf_DOB));
        },
            ),
            array(
                'name' => 'Status',
                'htmlOptions' => array('style' => 'text-align:center', 'vAlign' => 'middle'),
                'type' => 'raw',
                'value' => function($data) {
            echo $data->status;
        },
            ),
            array(
                'name' => 'Perf_Is_Author',
                'htmlOptions' => array('style' => 'text-align:center', 'vAlign' => 'middle'),
                'type' => 'raw',
                'visible' => UserIdentity::checkAccess(null, 'authoraccount', 'view'),
                'value' => function($data) {
            echo $data->Perf_Is_Author == 'Y' ? '<i class="fa fa-check text-success" title="Yes"></i>' : '<i class="fa fa-times text-red" title="No"></i>';
        },
            ),
//            'Perf_Ipi',
//            'Perf_Ipi_Base_Number',
//            'Perf_Ipn_Number',
            /*
              'Perf_DOB',
              'Perf_Place_Of_Birth_Id',
              'Perf_Birth_Country_Id',
              'Perf_Nationality_Id',
              'Perf_Language_Id',
              'Perf_Identity_Number',
              'Perf_Marital_Status_Id',
              'Perf_Spouse_Name',
              'Perf_Gender',
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

        $export_btn = $this->renderExportGridButton('performer-base-grid', '<i class="fa fa-file-excel-o"></i> Export', array('class' => 'btn btn-xs btn-danger  pull-right'));


        $this->widget('booster.widgets.TbExtendedGridView', array(
            'id' => 'performer-base-grid',
            'type' => 'striped bordered datatable',
            'dataProvider' => $model->dataProvider(),
            'responsiveTable' => true,
            'template' => '<div class="panel panel-primary"><div class="panel-heading"><div class="pull-right">{summary} &nbsp;' . $export_btn . '</div><h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  Performers</h3></div><div class="panel-body">{items}{pager}</div></div>',
            'columns' => $gridColumns
                )
        );
        ?>
    </div>
</div>
<?php
$js = <<< EOD
    $(document).ready(function(){

    });
EOD;
Yii::app()->clientScript->registerScript('index', $js);
?>