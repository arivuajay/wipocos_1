<?php
/* @var $this RecordingController */
/* @var $dataProvider CActiveDataProvider */

$this->title = 'Recordings';
$this->breadcrumbs = array(
    'Recordings',
);
$themeUrl = $this->themeUrl;
$cs = Yii::app()->getClientScript();
$cs_pos_end = CClientScript::POS_END;



$cs->registerScriptFile($themeUrl . '/js/datatables/jquery.dataTables.js', $cs_pos_end);
$cs->registerScriptFile($themeUrl . '/js/datatables/dataTables.bootstrap.js', $cs_pos_end);

$languages = Myclass::getMasterLanguage();
$types = Myclass::getMasterType();
$countries = Myclass::getMasterCountry();
$doc_status = CHtml::listData(MasterDocumentStatus::model()->isActive()->findAll(array('order' => 'Document_Sts_Code')), 'Master_Document_Sts_Id', 'Document_Sts_Name');
$recording_types = Myclass::getMasterRecordType();
$labels = Myclass::getMasterLabel();
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
                        'action' => array('/site/recording/index'),
                        'htmlOptions' => array('role' => 'form')
                    ));
                    ?>

                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Rcd_Title', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Rcd_Title', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                            <?php echo $form->error($searchModel, 'Rcd_Title'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Rcd_Language_Id', array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Rcd_Language_Id', $languages, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($searchModel, 'Rcd_Language_Id'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Rcd_Internal_Code', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Rcd_Internal_Code', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                            <?php echo $form->error($searchModel, 'Rcd_Internal_Code'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Rcd_Type_Id', array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Rcd_Type_Id', $types, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($searchModel, 'Rcd_Type_Id'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Rcd_Date', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Rcd_Date', array('class' => 'form-control date')); ?>
                            <?php echo $form->error($searchModel, 'Rcd_Date'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Rcd_Duration', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Rcd_Duration', array('class' => 'form-control')); ?>
                            <?php echo $form->error($searchModel, 'Rcd_Duration'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Rcd_Record_Country_id', array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Rcd_Record_Country_id', $countries, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($searchModel, 'Rcd_Record_Country_id'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Rcd_Product_Country_Id', array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Rcd_Product_Country_Id', $countries, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($searchModel, 'Rcd_Product_Country_Id'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Rcd_Doc_Status_Id', array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Rcd_Doc_Status_Id', $doc_status, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($searchModel, 'Rcd_Doc_Status_Id'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Rcd_Record_Type_Id', array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Rcd_Record_Type_Id', $recording_types, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($searchModel, 'Rcd_Record_Type_Id'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Rcd_Label_Id', array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Rcd_Label_Id', $labels, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($searchModel, 'Rcd_Label_Id'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Rcd_Reference', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Rcd_Reference', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                            <?php echo $form->error($searchModel, 'Rcd_Reference'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Rcd_File', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Rcd_File', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                            <?php echo $form->error($searchModel, 'Rcd_File'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Rcd_Isrc_Code', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Rcd_Isrc_Code', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                            <?php echo $form->error($searchModel, 'Rcd_Isrc_Code'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Rcd_Iswc_Number', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Rcd_Iswc_Number', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                            <?php echo $form->error($searchModel, 'Rcd_Iswc_Number'); ?>
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
                'Rcd_Title',
//                array(
//                    'name' => 'Rcd_Language_Id',
//                    'value' => function($data) {
//                        echo $data->rcdLanguage->Lang_Name;
//                    }
//                ),
                'Rcd_Internal_Code',
//                array(
//                    'name' => 'Rcd_Type_Id',
//                    'value' => function($data) {
//                        echo $data->rcdType->Type_Name;
//                    }
//                ),
                'Rcd_Date',
                array(
                    'name' => 'matchingdetails',
                    'value' => function($data, $row) use (&$searchModel) {
                        echo $searchModel->getMatchingdetails($data->Rcd_Id);
                    },
                ),
//                array(
//                    'name' => 'Rcd_Duration',
//                    'value' => function($data) {
//                        $time = explode(':', $data->Rcd_Duration);
//                        echo "$time[0]' $time[1]''";
//                    }
//                ),
                /*
                  'Rcd_Record_Country_id',
                  'Rcd_Product_Country_Id',
                  'Rcd_Doc_Status_Id',
                  'Rcd_Record_Type_Id',
                  'Rcd_Label_Id',
                  'Rcd_Reference',
                  'Rcd_File',
                  'Rcd_Isrc_Code',
                  'Rcd_Iswc_Number',
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
        $search_data = '';
        if (isset($_GET['Recording']) && $searchModel->search()->getTotalItemCount() == 0) {
            $search_data .= '?';
            $ExceptList = array('Rcd_Internal_Code');
            
            foreach ($_GET['Recording'] as $col => $value) {
                if(!in_array($col, $ExceptList))
                    $search_data .= "Recording[{$col}]={$value}&";
            }
            
            $search_data = rtrim($search_data, '&');
        }
        
        $this->widget(
                'application.components.MyTbButton', array(
            'label' => 'Create Recording',
            'icon' => 'fa fa-plus',
            'url' => array("/site/recording/create{$search_data}"),
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
            'Rcd_Title',
//            array(
//                'name' => 'Rcd_Language_Id',
//                'value' => function($data){
//                    echo $data->rcdLanguage->Lang_Name;
//                }
//            ),
            'Rcd_Internal_Code',
//            array(
//                'name' => 'Rcd_Type_Id',
//                'value' => function($data){
//                    echo $data->rcdType->Type_Name;
//                }
//            ),
            'Rcd_Date',
            array(
                'name' => 'matchingdetails',
                'value' => function($data, $row) use (&$model) {
                    echo $model->getMatchingdetails($data->Rcd_Id);
                },
            ),
//            array(
//                'name' => 'Rcd_Duration',
//                'value' => function($data) {
//                    $time = explode(':', $data->Rcd_Duration);
//                    echo "$time[0]' $time[1]''";
//                }
//            ),
            /*
              'Rcd_Record_Country_id',
              'Rcd_Product_Country_Id',
              'Rcd_Doc_Status_Id',
              'Rcd_Record_Type_Id',
              'Rcd_Label_Id',
              'Rcd_Reference',
              'Rcd_File',
              'Rcd_Isrc_Code',
              'Rcd_Iswc_Number',
             */
            array(
                'header' => 'Actions',
                'class' => 'application.components.MyActionButtonColumn',
                'htmlOptions' => array('style' => 'width: 180px;;text-align:center', 'vAlign' => 'middle', 'class' => 'action_column'),
                'template' => '{view}{update}{delete}',
            )
        );

        $this->widget('booster.widgets.TbExtendedGridView', array(
            'type' => 'striped bordered datatable',
            'dataProvider' => $model->dataProvider(),
            'responsiveTable' => true,
            'template' => '<div class="panel panel-primary"><div class="panel-heading"><div class="pull-right">{summary}</div><h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  Recordings</h3></div><div class="panel-body">{items}{pager}</div></div>',
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