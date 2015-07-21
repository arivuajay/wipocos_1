<?php
/* @var $this RecordingsessionController */
/* @var $dataProvider CActiveDataProvider */

$this->title = 'Recording Session Sheets';
$this->breadcrumbs = array(
    'Recording Session Sheets',
);
$themeUrl = $this->themeUrl;
$cs = Yii::app()->getClientScript();
$cs_pos_end = CClientScript::POS_END;

$cs->registerScriptFile($themeUrl . '/js/datatables/jquery.dataTables.js', $cs_pos_end);
$cs->registerScriptFile($themeUrl . '/js/datatables/dataTables.bootstrap.js', $cs_pos_end);

$languages = Myclass::getMasterLanguage();
$types = Myclass::getMasterType();
$mediums = Myclass::getMasterMedium();
$countries = Myclass::getMasterCountry();
$studios = Myclass::getMasterStudio();
$factors = Myclass::getMasterFactor();
$destinations = Myclass::getMasterDestination();
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
                        'action' => array('/site/recordingsession/index'),
                        'htmlOptions' => array('role' => 'form')
                    ));
                    ?>

                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Rcd_Ses_Title', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Rcd_Ses_Title', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
                            <?php echo $form->error($searchModel, 'Rcd_Ses_Title'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Rcd_Ses_Internal_Code', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Rcd_Ses_Internal_Code', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
                            <?php echo $form->error($searchModel, 'Rcd_Ses_Internal_Code'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Rcd_Ses_Language_Id', array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Rcd_Ses_Language_Id', $languages, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($searchModel, 'Rcd_Ses_Language_Id'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Rcd_Ses_Orchestra', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Rcd_Ses_Orchestra', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
                            <?php echo $form->error($searchModel, 'Rcd_Ses_Orchestra'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Rcd_Ses_Ref_Medium', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Rcd_Ses_Ref_Medium', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
                            <?php echo $form->error($searchModel, 'Rcd_Ses_Ref_Medium'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Rcd_Ses_Hours', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Rcd_Ses_Hours', array('class' => 'form-control')); ?>
                            <?php echo $form->error($searchModel, 'Rcd_Ses_Hours'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Rcd_Ses_Record_Date', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Rcd_Ses_Record_Date', array('class' => 'form-control date')); ?>
                            <?php echo $form->error($searchModel, 'Rcd_Ses_Record_Date'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Rcd_Ses_Studio_Id', array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Rcd_Ses_Studio_Id', $studios, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($searchModel, 'Rcd_Ses_Studio_Id'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Rcd_Ses_Producer', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Rcd_Ses_Producer', array('class' => 'form-control')); ?>
                            <?php echo $form->error($searchModel, 'Rcd_Ses_Producer'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Rcd_Ses_Main_Artist', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Rcd_Ses_Main_Artist', array('class' => 'form-control')); ?>
                            <?php echo $form->error($searchModel, 'Rcd_Ses_Main_Artist'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Rcd_Ses_Medium_Id', array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Rcd_Ses_Medium_Id', $mediums, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($searchModel, 'Rcd_Ses_Medium_Id'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Rcd_Ses_Type_Id', array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Rcd_Ses_Type_Id', $types, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($searchModel, 'Rcd_Ses_Type_Id'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Rcd_Ses_Destination_Id', array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Rcd_Ses_Destination_Id', $destinations, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($searchModel, 'Rcd_Ses_Destination_Id'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Rcd_Ses_Country_Id', array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Rcd_Ses_Country_Id', $countries, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($searchModel, 'Rcd_Ses_Country_Id'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Rcd_Ses_Factor_Id', array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Rcd_Ses_Factor_Id', $factors, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($searchModel, 'Rcd_Ses_Factor_Id'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Rcd_Ses_Release_Year', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Rcd_Ses_Release_Year', array('class' => 'form-control', 'size' => 4, 'maxlength' => 4)); ?>
                            <?php echo $form->error($searchModel, 'Rcd_Ses_Release_Year'); ?>
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
                'Rcd_Ses_Title',
                'Rcd_Ses_Internal_Code',
                array(
                    'name' => 'Rcd_Ses_Language_Id',
                    'value' => function($data) {
                        echo isset($data->rcdSesLanguage->Lang_Name) ? $data->rcdSesLanguage->Lang_Name : '';
                    }
                ),
                'Rcd_Ses_Orchestra',
                'Rcd_Ses_Ref_Medium',
                /*
                  'Rcd_Ses_Hours',
                  'Rcd_Ses_Record_Date',
                  'Rcd_Ses_Studio_Id',
                  'Rcd_Ses_Producer',
                  'Rcd_Ses_Main_Artist',
                  'Rcd_Ses_Medium_Id',
                  'Rcd_Ses_Type_Id',
                  'Rcd_Ses_Destination_Id',
                  'Rcd_Ses_Country_Id',
                  'Rcd_Ses_Factor_Id',
                  'Rcd_Ses_Release_Year',
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
            'label' => 'Create RecordingSession',
            'icon' => 'fa fa-plus',
            'url' => array('/site/recordingsession/create'),
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
            'Rcd_Ses_Title',
            'Rcd_Ses_Internal_Code',
            array(
                'name' => 'Rcd_Ses_Language_Id',
                'value' => function($data) {
                    echo isset($data->rcdSesLanguage->Lang_Name) ? $data->rcdSesLanguage->Lang_Name : '';
                }
            ),
            'Rcd_Ses_Orchestra',
            'Rcd_Ses_Ref_Medium',
            /*
              'Rcd_Ses_Hours',
              'Rcd_Ses_Record_Date',
              'Rcd_Ses_Studio_Id',
              'Rcd_Ses_Producer',
              'Rcd_Ses_Main_Artist',
              'Rcd_Ses_Medium_Id',
              'Rcd_Ses_Type_Id',
              'Rcd_Ses_Destination_Id',
              'Rcd_Ses_Country_Id',
              'Rcd_Ses_Factor_Id',
              'Rcd_Ses_Release_Year',
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
            'template' => '<div class="panel panel-primary"><div class="panel-heading"><div class="pull-right">{summary}</div><h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  Recording Session Sheets</h3></div><div class="panel-body">{items}{pager}</div></div>',
            'columns' => $gridColumns
                )
        );
        ?>
    </div>
</div>