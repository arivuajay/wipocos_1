<?php
/* @var $this ContractinvoiceController */
/* @var $dataProvider CActiveDataProvider */

$this->title = 'Invoices';
$this->breadcrumbs = array(
    'Invoices',
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
                        'action' => array('/site/contractinvoice/index'),
                        'htmlOptions' => array('role' => 'form')
                    ));
                    $repeats = ContractInvoice::model()->getRepeat();
                    ?>

                    <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Tarf_Cont_Id', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Tarf_Cont_Id', array('class' => 'form-control')); ?>
                            <?php echo $form->error($searchModel, 'Tarf_Cont_Id'); ?>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Inv_Invoice', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Inv_Invoice', array('class' => 'form-control')); ?>
                            <?php echo $form->error($searchModel, 'Inv_Invoice'); ?>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Inv_Date', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Inv_Date', array('class' => 'form-control date')); ?>
                            <?php echo $form->error($searchModel, 'Inv_Date'); ?>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Inv_Repeat_Id', array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Inv_Repeat_Id', $repeats, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($searchModel, 'Inv_Repeat_Id'); ?>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Inv_Repeat_Count', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Inv_Repeat_Count', array('class' => 'form-control')); ?>
                            <?php echo $form->error($searchModel, 'Inv_Repeat_Count'); ?>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Inv_Next_Date', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Inv_Next_Date', array('class' => 'form-control date')); ?>
                            <?php echo $form->error($searchModel, 'Inv_Next_Date'); ?>
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
            $gridColumns = array(            array(
                'name' => 'Tarf_Cont_Id',
                'value' => function ($data) {
                    echo $data->tarfCont->Tarf_Cont_Internal_Code;
                }
            ),
            'Inv_Invoice',
            'Inv_Date',
            array(
                'name' => TariffContracts::model()->getAttributeLabel('Tarf_Cont_User_Id'),
                'value' => function ($data) {
                    echo $data->tarfCont->tarfContUser->User_Cust_Name;
                }
            ),
            'Inv_Amount',
//            array(
//                'name' => TariffContracts::model()->getAttributeLabel('Tarf_Cont_Amt_Pay'),
//                'value' => function ($data) {
//                    echo $data->tarfCont->Tarf_Cont_Amt_Pay;
//                }
//            ),
            array(
                'name' => TariffContracts::model()->getAttributeLabel('Tarf_Cont_Pay_Id'),
                'value' => function ($data) {
                    echo $data->tarfCont->getPayment();
                }
            ),
//            'Inv_Repeat_Count',
//            'Inv_Next_Date',
            array(
                'header' => 'Actions',
                'class' => 'application.components.MyActionButtonColumn',
                'htmlOptions' => array('style' => 'width: 180px;;text-align:center', 'vAlign' => 'middle', 'class' => 'action_column'),
                'template' => '{newinvoice}',
                'buttons' => array(
                    'newinvoice' => array(//the name {reply} must be same
                        'label' => '<i class="glyphicon glyphicon-pencil"></i>',
                        'options' => array(
                            'title' => 'Update',
                        ),
                        'url' => 'CHtml::normalizeUrl(array("/site/contractinvoice/create/id/".rawurlencode($data->Tarf_Cont_Id)))',
                    ),
                ),
            ),
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
            'label' => 'Create Invoice',
            'icon' => 'fa fa-plus',
            'url' => array('/site/contractinvoice/create'),
            'buttonType' => 'link',
            'context' => 'success',
            'htmlOptions' => array('class' => 'pull-right', 'style' => 'margin-left:10px;'),
                )
        );
        $this->widget(
                'application.components.MyTbButton', array(
            'label' => 'Create Backdated Invoice',
            'icon' => 'fa fa-plus',
            'url' => array('/site/contractinvoice/backdated'),
            'buttonType' => 'link',
            'context' => 'success',
            'htmlOptions' => array('class' => 'pull-right hide', 'style' => 'margin-left:10px;'),
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
                'name' => 'Tarf_Cont_Id',
                'value' => function ($data) {
                    echo $data->tarfCont->Tarf_Cont_Internal_Code;
                }
            ),
            'Inv_Invoice',
            'Inv_Date',
            array(
                'name' => TariffContracts::model()->getAttributeLabel('Tarf_Cont_User_Id'),
                'value' => function ($data) {
                    echo $data->tarfCont->tarfContUser->User_Cust_Name;
                }
            ),
            'Inv_Amount',
//            array(
//                'name' => TariffContracts::model()->getAttributeLabel('Tarf_Cont_Amt_Pay'),
//                'value' => function ($data) {
//                    echo $data->tarfCont->Tarf_Cont_Amt_Pay;
//                }
//            ),
            array(
                'name' => TariffContracts::model()->getAttributeLabel('Tarf_Cont_Pay_Id'),
                'value' => function ($data) {
                    echo $data->tarfCont->getPayment();
                }
            ),
//            'Inv_Repeat_Count',
//            'Inv_Next_Date',
            array(
                'header' => 'Actions',
                'class' => 'application.components.MyActionButtonColumn',
                'htmlOptions' => array('style' => 'width: 180px;;text-align:center', 'vAlign' => 'middle', 'class' => 'action_column'),
                'template' => '{newinvoice}',
                'buttons' => array(
                    'newinvoice' => array(//the name {reply} must be same
                        'label' => '<i class="glyphicon glyphicon-pencil"></i>',
                        'options' => array(
                            'title' => 'Update',
                        ),
                        'url' => 'CHtml::normalizeUrl(array("/site/contractinvoice/create/id/".rawurlencode($data->Tarf_Cont_Id)))',
                    ),
                ),
            ),
        );

        $this->widget('booster.widgets.TbExtendedGridView', array(
            'type' => 'striped bordered datatable',
            'dataProvider' => $model->dataProvider(),
            'responsiveTable' => true,
            'template' => '<div class="panel panel-primary"><div class="panel-heading"><div class="pull-right">{summary}</div><h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  Invoices</h3></div><div class="panel-body">{items}{pager}</div></div>',
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