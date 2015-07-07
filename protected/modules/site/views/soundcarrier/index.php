<?php
/* @var $this SoundcarrierController */
/* @var $dataProvider CActiveDataProvider */

$this->title = 'Sound Carriers';
$this->breadcrumbs = array(
    'Sound Carriers',
);
$themeUrl = $this->themeUrl;
$cs = Yii::app()->getClientScript();
$cs_pos_end = CClientScript::POS_END;

$cs->registerScriptFile($themeUrl . '/js/datatables/jquery.dataTables.js', $cs_pos_end);
$cs->registerScriptFile($themeUrl . '/js/datatables/dataTables.bootstrap.js', $cs_pos_end);

$languages = Myclass::getMasterLanguage();
$types = Myclass::getMasterType();
$countries = Myclass::getMasterCountry();
$labels = Myclass::getMasterLabel();
$medias = Myclass::getMasterMedium();
$manufacturers = Myclass::getMasterManufacturer();
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
                        'action' => array('/site/soundcarrier/index'),
                        'htmlOptions' => array('role' => 'form')
                    ));
                    ?>

                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Sound_Car_Title', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Sound_Car_Title', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                            <?php echo $form->error($searchModel, 'Sound_Car_Title'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Sound_Car_Language_Id', array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Sound_Car_Language_Id', $languages, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($searchModel, 'Sound_Car_Language_Id'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Sound_Car_Internal_Code', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Sound_Car_Internal_Code', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                            <?php echo $form->error($searchModel, 'Sound_Car_Internal_Code'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Sound_Car_Standardized_Code', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Sound_Car_Standardized_Code', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                            <?php echo $form->error($searchModel, 'Sound_Car_Standardized_Code'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Sound_Car_Catelog', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Sound_Car_Catelog', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                            <?php echo $form->error($searchModel, 'Sound_Car_Catelog'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Sound_Car_Barcode', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Sound_Car_Barcode', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                            <?php echo $form->error($searchModel, 'Sound_Car_Barcode'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Sound_Car_Distributor', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Sound_Car_Distributor', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                            <?php echo $form->error($searchModel, 'Sound_Car_Distributor'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Sound_Car_Label_Id', array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Sound_Car_Label_Id', $labels, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($searchModel, 'Sound_Car_Label_Id'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Sound_Car_Medium', array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Sound_Car_Medium', $medias, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($searchModel, 'Sound_Car_Medium'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Sound_Car_Type_Id', array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Sound_Car_Type_Id', $types, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($searchModel, 'Sound_Car_Type_Id'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Sound_Car_Main_Artist', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Sound_Car_Main_Artist', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                            <?php echo $form->error($searchModel, 'Sound_Car_Main_Artist'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Sound_Car_Producer', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Sound_Car_Producer', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                            <?php echo $form->error($searchModel, 'Sound_Car_Producer'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Sound_Car_Product_Country_Id', array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Sound_Car_Product_Country_Id', $countries, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($searchModel, 'Sound_Car_Product_Country_Id'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Sound_Car_Year', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Sound_Car_Year', array('class' => 'form-control', 'size' => 4, 'maxlength' => 4)); ?>
                            <?php echo $form->error($searchModel, 'Sound_Car_Year'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Sound_Car_Release_Year', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Sound_Car_Release_Year', array('class' => 'form-control', 'size' => 4, 'maxlength' => 4)); ?>
                            <?php echo $form->error($searchModel, 'Sound_Car_Release_Year'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Sound_Car_Manf_Id', array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Sound_Car_Manf_Id', $manufacturers, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($searchModel, 'Sound_Car_Manf_Id'); ?>
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
                'Sound_Car_Title',
                array(
                    'name' => 'Sound_Car_Language_Id',
                    'value' => function($data) {
                        echo $data->soundCarLanguage->Lang_Name;
                    }
                ),
                'Sound_Car_Internal_Code',
                'Sound_Car_Standardized_Code',
                'Sound_Car_Catelog',
                /*
                  'Sound_Car_Barcode',
                  'Sound_Car_Distributor',
                  'Sound_Car_Label_Id',
                  'Sound_Car_Medium',
                  'Sound_Car_Type_Id',
                  'Sound_Car_Main_Artist',
                  'Sound_Car_Producer',
                  'Sound_Car_Product_Country_Id',
                  'Sound_Car_Year',
                  'Sound_Car_Release_Year',
                  'Sound_Car_Manf_Id',
                  'Created_By',
                  'Updated_By',
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
            'label' => 'Create SoundCarrier',
            'icon' => 'fa fa-plus',
            'url' => array('/site/soundcarrier/create'),
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
            'Sound_Car_Title',
            array(
                'name' => 'Sound_Car_Language_Id',
                'value' => function($data) {
                    echo $data->soundCarLanguage->Lang_Name;
                }
            ),
            'Sound_Car_Language_Id',
            'Sound_Car_Internal_Code',
            'Sound_Car_Standardized_Code',
            'Sound_Car_Catelog',
            /*
              'Sound_Car_Barcode',
              'Sound_Car_Distributor',
              'Sound_Car_Label_Id',
              'Sound_Car_Medium',
              'Sound_Car_Type_Id',
              'Sound_Car_Main_Artist',
              'Sound_Car_Producer',
              'Sound_Car_Product_Country_Id',
              'Sound_Car_Year',
              'Sound_Car_Release_Year',
              'Sound_Car_Manf_Id',
              'Created_By',
              'Updated_By',
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
            'template' => '<div class="panel panel-primary"><div class="panel-heading"><div class="pull-right">{summary}</div><h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  Sound Carriers</h3></div><div class="panel-body">{items}{pager}</div></div>',
            'columns' => $gridColumns
                )
        );
        ?>
    </div>
</div>