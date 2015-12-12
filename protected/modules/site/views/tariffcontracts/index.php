<?php
/* @var $this TariffcontractsController */
/* @var $dataProvider CActiveDataProvider */

$this->title = 'Contract';
$this->breadcrumbs = array(
    'Contract',
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
                        'action' => array('/site/tariffcontracts/index'),
                        'htmlOptions' => array('role' => 'form')
                    ));
                    $regions = Myclass::getMasterRegion();
                    $tariffs = Myclass::getMasterTariff();
                    $inspectors = CHtml::listData(Inspector::model()->findAll(), 'Insp_Id', 'Insp_Name');
                    $event_types = Myclass::getMasterEventtype();
                    $payments = TariffContracts::model()->getPayment();
                    ?>

                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Tarf_Cont_Internal_Code', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Tarf_Cont_Internal_Code', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
                            <?php echo $form->error($searchModel, 'Tarf_Cont_Internal_Code'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Tarf_Cont_Region_Id', array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Tarf_Cont_Region_Id', $regions, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($searchModel, 'Tarf_Cont_Region_Id'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Tarf_Cont_District', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Tarf_Cont_District', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                            <?php echo $form->error($searchModel, 'Tarf_Cont_District'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Tarf_Cont_Area', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Tarf_Cont_Area', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                            <?php echo $form->error($searchModel, 'Tarf_Cont_Area'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Tarf_Cont_Tariff_Id', array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Tarf_Cont_Tariff_Id', $tariffs, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($searchModel, 'Tarf_Cont_Tariff_Id'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Tarf_Cont_Insp_Id', array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Tarf_Cont_Insp_Id', $inspectors, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($searchModel, 'Tarf_Cont_Insp_Id'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Tarf_Cont_Balance', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Tarf_Cont_Balance', array('class' => 'form-control', 'size' => 10, 'maxlength' => 10)); ?>
                            <?php echo $form->error($searchModel, 'Tarf_Cont_Balance'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Tarf_Cont_Amt_Pay', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Tarf_Cont_Amt_Pay', array('class' => 'form-control', 'size' => 10, 'maxlength' => 10)); ?>
                            <?php echo $form->error($searchModel, 'Tarf_Cont_Amt_Pay'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Tarf_Cont_From', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Tarf_Cont_From', array('class' => 'form-control date')); ?>
                            <?php echo $form->error($searchModel, 'Tarf_Cont_From'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Tarf_Cont_To', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Tarf_Cont_To', array('class' => 'form-control date')); ?>
                            <?php echo $form->error($searchModel, 'Tarf_Cont_To'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Tarf_Cont_Sign_Date', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Tarf_Cont_Sign_Date', array('class' => 'form-control date')); ?>
                            <?php echo $form->error($searchModel, 'Tarf_Cont_Sign_Date'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Tarf_Cont_Pay_Id', array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Tarf_Cont_Pay_Id', $payments, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($searchModel, 'Tarf_Cont_Pay_Id'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Tarf_Cont_Portion', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Tarf_Cont_Portion', array('class' => 'form-control', 'size' => 10, 'maxlength' => 10)); ?>
                            <?php echo $form->error($searchModel, 'Tarf_Cont_Portion'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 hide">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Tarf_Cont_Comment', array('class' => ' control-label')); ?>
                            <?php echo $form->textArea($searchModel, 'Tarf_Cont_Comment', array('class' => 'form-control', 'rows' => 6, 'cols' => 50)); ?>
                            <?php echo $form->error($searchModel, 'Tarf_Cont_Comment'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Tarf_Cont_Event_Id', array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Tarf_Cont_Event_Id', $event_types, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($searchModel, 'Tarf_Cont_Event_Id'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Tarf_Cont_Event_Date', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Tarf_Cont_Event_Date', array('class' => 'form-control date')); ?>
                            <?php echo $form->error($searchModel, 'Tarf_Cont_Event_Date'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 hide">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Tarf_Cont_Event_Comment', array('class' => ' control-label')); ?>
                            <?php echo $form->textArea($searchModel, 'Tarf_Cont_Event_Comment', array('class' => 'form-control', 'rows' => 6, 'cols' => 50)); ?>
                            <?php echo $form->error($searchModel, 'Tarf_Cont_Event_Comment'); ?>
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
//                'Tarf_Cont_GUID',
                'Tarf_Cont_Internal_Code',
                array(
                    'name' => 'Tarf_Cont_User_Id',
                    'value' => function ($data) {
                        echo $data->tarfContUser->User_Cust_Code;
                    }
                ),
//                array(
//                    'name' => 'Tarf_Cont_Region_Id',
//                    'value' => function ($data){
//                        echo $data->tarfContRegion->Region_Name;
//                    }
//                ),
//                'Tarf_Cont_District',
//                'Tarf_Cont_Area',
                array(
                    'name' => 'Tarf_Cont_Tariff_Id',
                    'value' => function ($data) {
                        echo $data->tarfContTariff->Tarif_Description;
                    }
                ),
                array(
                    'name' => 'Tarf_Cont_Insp_Id',
                    'value' => function ($data) {
                        echo $data->tarfContInsp->Insp_Name;
                    }
                ),
              'Tarf_Cont_From',
              'Tarf_Cont_To',
                /*
                  'Tarf_Cont_Insp_Id',
                  'Tarf_Cont_Balance',
                  'Tarf_Cont_Amt_Pay',
                  'Tarf_Cont_From',
                  'Tarf_Cont_To',
                  'Tarf_Cont_Sign_Date',
                  'Tarf_Cont_Pay_Id',
                  'Tarf_Cont_Portion',
                  'Tarf_Cont_Comment',
                  'Tarf_Cont_Event_Id',
                  'Tarf_Cont_Event_Date',
                  'Tarf_Cont_Event_Comment',
                 */
                array(
                    'header' => 'Actions',
                    'class' => 'application.components.MyActionButtonColumn',
                    'htmlOptions' => array('style' => 'width: 180px;;text-align:center', 'vAlign' => 'middle', 'class' => 'action_column'),
                'template' => '{invoice}{view}{update}{delete}',
                'buttons' => array(
                    'invoice' => array(//the name {reply} must be same
                        'label' => '<i class="fa fa-plus-square"></i>',
                        'options' => array(
                            'title' => 'Create Invoice',
                        ),
                        'url' => 'CHtml::normalizeUrl(array("/site/contractinvoice/create/id/".rawurlencode($data->Tarf_Cont_Id)))',
//                        'url' => 'CHtml::normalizeUrl(array("/site/contractinvoice/create/id/".rawurlencode($data->Tarf_Cont_Id)))',
                    ),
                ),
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
            'label' => 'Create Contract',
            'icon' => 'fa fa-plus',
            'url' => array('/site/tariffcontracts/create'),
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
//            'Tarf_Cont_GUID',
            'Tarf_Cont_Internal_Code',
            array(
                'name' => 'Tarf_Cont_User_Id',
                'value' => function ($data) {
                    echo $data->tarfContUser->User_Cust_Code;
                }
            ),
//                array(
//                    'name' => 'Tarf_Cont_Region_Id',
//                    'value' => function ($data){
//                        echo $data->tarfContRegion->Region_Name;
//                    }
//                ),
//                'Tarf_Cont_District',
//                'Tarf_Cont_Area',
            array(
                'name' => 'Tarf_Cont_Tariff_Id',
                'value' => function ($data) {
                    echo $data->tarfContTariff->Tarif_Description;
                }
            ),
            array(
                'name' => 'Tarf_Cont_Insp_Id',
                'value' => function ($data) {
                    echo $data->tarfContInsp->Insp_Name;
                }
            ),
              'Tarf_Cont_From',
              'Tarf_Cont_To',
            /*
              'Tarf_Cont_Insp_Id',
              'Tarf_Cont_Balance',
              'Tarf_Cont_Amt_Pay',
              'Tarf_Cont_From',
              'Tarf_Cont_To',
              'Tarf_Cont_Sign_Date',
              'Tarf_Cont_Pay_Id',
              'Tarf_Cont_Portion',
              'Tarf_Cont_Comment',
              'Tarf_Cont_Event_Id',
              'Tarf_Cont_Event_Date',
              'Tarf_Cont_Event_Comment',
             */
            array(
                'header' => 'Actions',
                'class' => 'application.components.MyActionButtonColumn',
                'htmlOptions' => array('style' => 'width: 180px;;text-align:center', 'vAlign' => 'middle', 'class' => 'action_column'),
                'template' => '{invoice}{view}{admin_update}{delete}',
                'buttons' => array(
                    'invoice' => array(//the name {reply} must be same
                        'label' => '<i class="fa fa-plus-square"></i>',
                        'options' => array(
                            'title' => 'Create Invoice',
                        ),
                        'url' => 'CHtml::normalizeUrl(array("/site/contractinvoice/create/id/".rawurlencode($data->Tarf_Cont_Id)))',
                    ),
                    'admin_update' => array(//the name {reply} must be same
                        'label' => '<i class="glyphicon glyphicon-pencil"></i>',
                        'options' => array(
                            'title' => 'Update',
                        ),
                        'url' => 'CHtml::normalizeUrl(array("/site/tariffcontracts/update/id/".rawurlencode($data->Tarf_Cont_Id)))',
                        'visible' => 'UserIdentity::checkAdmin()'
                    ),
                ),
            )
        );

        $this->widget('booster.widgets.TbExtendedGridView', array(
            'type' => 'striped bordered datatable',
            'dataProvider' => $model->dataProvider(),
            'responsiveTable' => true,
            'template' => '<div class="panel panel-primary"><div class="panel-heading"><div class="pull-right">{summary}</div><h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  Contract</h3></div><div class="panel-body">{items}{pager}</div></div>',
            'columns' => $gridColumns,
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