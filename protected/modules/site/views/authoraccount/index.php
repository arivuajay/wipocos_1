<?php
/* @var $this AuthoraccountController */
/* @var $dataProvider CActiveDataProvider */

$this->title = 'Authors';
$this->breadcrumbs = array(
    'Authors',
);
$themeUrl = $this->themeUrl;
$cs = Yii::app()->getClientScript();
$cs_pos_end = CClientScript::POS_END;

$cs->registerCssFile($themeUrl . '/css/datepicker/datepicker3.css');
$cs->registerScriptFile($themeUrl . '/js/datepicker/bootstrap-datepicker.js', $cs_pos_end);
$cs->registerScriptFile($themeUrl . '/js/datatables/jquery.dataTables.js', $cs_pos_end);
$cs->registerScriptFile($themeUrl . '/js/datatables/dataTables.bootstrap.js', $cs_pos_end);
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
                        'action' => array('/site/authoraccount/index'),
                        'htmlOptions' => array('role' => 'form')
                    ));
                    ?>

                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Auth_First_Name', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Auth_First_Name', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                            <?php echo $form->error($searchModel, 'Auth_First_Name'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Auth_Sur_Name', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Auth_Sur_Name', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
                            <?php echo $form->error($searchModel, 'Auth_Sur_Name'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Auth_Internal_Code', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Auth_Internal_Code', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                            <?php echo $form->error($searchModel, 'Auth_Internal_Code'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Auth_Ipi', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Auth_Ipi', array('class' => 'form-control')); ?>
                            <?php echo $form->error($searchModel, 'Auth_Ipi'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Auth_Ipi_Base_Number', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Auth_Ipi_Base_Number', array('class' => 'form-control')); ?>
                            <?php echo $form->error($searchModel, 'Auth_Ipi_Base_Number'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Auth_Ipn_Number', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Auth_Ipn_Number', array('class' => 'form-control')); ?>
                            <?php echo $form->error($searchModel, 'Auth_Ipn_Number'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Auth_DOB', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Auth_DOB', array('class' => 'form-control date')); ?>
                            <?php echo $form->error($searchModel, 'Auth_DOB'); ?>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Auth_Identity_Number', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Auth_Identity_Number', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                            <?php echo $form->error($searchModel, 'Auth_Identity_Number'); ?>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Auth_Gender', array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Auth_Gender', Myclass::getGender(), array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($searchModel, 'Auth_Gender'); ?>
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
                            <?php $internal_positions = CHtml::listData(MasterInternalPosition::model()->isActive()->findAll(), 'Master_Int_Post_Id', 'Int_Post_Name'); ?>
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
                'Auth_Internal_Code',
                'Auth_Sur_Name',
                'Auth_First_Name',
                'Auth_Ipi',
//                'Auth_Identity_Number',
                array(
                    'header' => 'Pseudonym',
                    'value' => function($data) {
                        if (!empty($data->authorPseudonyms))
                            echo $data->authorPseudonyms->Auth_Pseudo_Name;
                    },
                ),
                array(
                    'name' => 'Created_Date',
                    'htmlOptions' => array('style' => 'width: 180px;;text-align:center', 'vAlign' => 'middle'),
                    'type' => 'raw',
                    'value' => function($data) {
                if ($data->authorManageRights && $data->authorManageRights->Auth_Mnge_Entry_Date != '' && $data->authorManageRights->Auth_Mnge_Entry_Date != '0000-00-00')
                    echo date('Y-m-d', strtotime($data->authorManageRights->Auth_Mnge_Entry_Date));
            },
                ),
                array(
                    'name' => 'Date of Birth',
                    'htmlOptions' => array('style' => 'text-align:center', 'vAlign' => 'middle'),
                    'type' => 'raw',
                    'value' => function($data) {
                if ($data->Auth_DOB != '' && $data->Auth_DOB != '0000-00-00')
                    echo date('Y-m-d', strtotime($data->Auth_DOB));
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
                    'header' => 'Actions',
                    'class' => 'application.components.MyActionButtonColumn',
                    'htmlOptions' => array('style' => 'width: 180px;;text-align:center', 'vAlign' => 'middle', 'class' => 'action_column'),
                    'template' => '{view}{update}{delete}',
                )
            );

            $this->widget('booster.widgets.TbExtendedGridView', array(
                'id' => 'author-base-grid-search',
                'type' => 'striped bordered',
                'dataProvider' => $searchModel->search(),
                'responsiveTable' => true,
                'template' => "<div class='panel panel-primary'><div class='panel-heading'><div class='pull-right'>{summary}</div><h3 class='panel-title'><i class='glyphicon glyphicon-search'></i> Search Results</h3></div>\n<div class='panel-body'>{items}\n{pager}</div></div>",
                'columns' => $gridColumns,
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
        echo CHtml::link('<i class="fa fa-plus"></i>&nbsp;&nbsp;Create Author Group', array('/site/group/create', 'type' => 'author'), array('class' => 'btn btn-success pull-right', 'style' => 'margin-left:10px;'));
        echo CHtml::link('<i class="fa fa-plus"></i>&nbsp;&nbsp;Create Author', array('/site/authoraccount/create'), array('class' => 'btn btn-success pull-right'));
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
            'Auth_Internal_Code',
            'Auth_Sur_Name',
            'Auth_First_Name',
            'Auth_Ipi',
//            'Auth_Ipi_Base_Number',
//            'Auth_Ipn_Number',
            array(
                'header' => 'Pseudonym',
                'value' => function($data) {
                    if (!empty($data->authorPseudonyms))
                        echo $data->authorPseudonyms->Auth_Pseudo_Name;
                },
            ),
//            'Auth_Identity_Number',
            array(
                'name' => 'Created_Date',
                'htmlOptions' => array('style' => 'text-align:center', 'vAlign' => 'middle'),
                'type' => 'raw',
                'value' => function($data) {

            if ($data->authorManageRights && $data->authorManageRights->Auth_Mnge_Entry_Date != '' && $data->authorManageRights->Auth_Mnge_Entry_Date != '0000-00-00')
                echo date('Y-m-d', strtotime($data->authorManageRights->Auth_Mnge_Entry_Date));
        },
            ),
            array(
                'name' => 'Date of Birth',
                'htmlOptions' => array('style' => 'text-align:center', 'vAlign' => 'middle'),
                'type' => 'raw',
                'value' => function($data) {
            if ($data->Auth_DOB != '' && $data->Auth_DOB != '0000-00-00')
                echo date('Y-m-d', strtotime($data->Auth_DOB));
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
//            array(
//                'name' => 'Active',
//                'htmlOptions' => array('style' => 'text-align:center', 'vAlign' => 'middle'),
//                'type' => 'raw',
//                'value' => function($data) {
//            echo ($data->Active == 1) ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>';
//        },
//            ),
            /*
              'Auth_DOB',
              'Auth_Place_Of_Birth_Id',
              'Auth_Birth_Country_Id',
              'Auth_Nationality_Id',
              'Auth_Language_Id',
              'Auth_Identity_Number',
              'Auth_Marital_Status_Id',
              'Auth_Spouse_Name',
              'Auth_Gender',
             */
            array(
                'header' => 'Actions',
                'class' => 'application.components.MyActionButtonColumn',
                'htmlOptions' => array('style' => 'width: 180px;;text-align:center', 'vAlign' => 'middle', 'class' => 'action_column'),
                'template' => '{view}{update}{delete}',
            )
        );

        $export_btn = $this->renderExportGridButton('author-base-grid', '<i class="fa fa-file-excel-o"></i> Export', array('class' => 'btn btn-xs btn-danger  pull-right'));

        $this->widget('booster.widgets.TbExtendedGridView', array(
            'id' => 'author-base-grid',
            'type' => 'striped bordered datatable',
            'dataProvider' => $model->dataProvider(),
            'responsiveTable' => true,
            'template' => '<div class="panel panel-primary"><div class="panel-heading"><div class="pull-right">{summary} &nbsp;' . $export_btn . '</div><h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  Authors</h3></div><div class="panel-body">{items}{pager}</div></div>',
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