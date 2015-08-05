<?php
/* @var $this CustomeruserController */
/* @var $dataProvider CActiveDataProvider */

$this->title = 'Users & Customers';
$this->breadcrumbs = array(
    'Users & Customers',
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
                        'action' => array('/site/customeruser/index'),
                        'htmlOptions' => array('role' => 'form')
                    ));
                    ?>

                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'User_Cust_Internal_Code', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'User_Cust_Internal_Code', array('class' => 'form-control')); ?>
                            <?php echo $form->error($searchModel, 'User_Cust_Internal_Code'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'User_Cust_Place_Id', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'User_Cust_Place_Id', array('class' => 'form-control')); ?>
                            <?php echo $form->error($searchModel, 'User_Cust_Place_Id'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'User_Cust_Code', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'User_Cust_Code', array('class' => 'form-control', 'size' => 25, 'maxlength' => 25)); ?>
                            <?php echo $form->error($searchModel, 'User_Cust_Code'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'User_Cust_Name', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'User_Cust_Name', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                            <?php echo $form->error($searchModel, 'User_Cust_Name'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'User_Cust_Address', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'User_Cust_Address', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                            <?php echo $form->error($searchModel, 'User_Cust_Address'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'User_Cust_Email', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'User_Cust_Email', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                            <?php echo $form->error($searchModel, 'User_Cust_Email'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'User_Cust_Telephone', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'User_Cust_Telephone', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
                            <?php echo $form->error($searchModel, 'User_Cust_Telephone'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'User_Cust_Website', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'User_Cust_Website', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                            <?php echo $form->error($searchModel, 'User_Cust_Website'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'User_Cust_Fax', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'User_Cust_Fax', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
                            <?php echo $form->error($searchModel, 'User_Cust_Fax'); ?>
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
                'User_Cust_Internal_Code',
                array(
                    'name' => 'User_Cust_Place_Id',
                    'value' => function($data) {
                        echo $data->userCustPlace->Place_Name;
                    },
                ),
                'User_Cust_Code',
                'User_Cust_Name',
                'User_Cust_Address',
                'User_Cust_Email',
                /*
                  'User_Cust_Telephone',
                  'User_Cust_Website',
                  'User_Cust_Fax',
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
            'label' => 'Create User & Customer',
            'icon' => 'fa fa-plus',
            'url' => array('/site/customeruser/create'),
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
            'User_Cust_Internal_Code',
            array(
                'name' => 'User_Cust_Place_Id',
                'value' => function($data) {
                    echo $data->userCustPlace->Place_Name;
                },
            ),
            'User_Cust_Code',
            'User_Cust_Name',
            'User_Cust_Address',
            'User_Cust_Email',
            /*
              'User_Cust_Telephone',
              'User_Cust_Website',
              'User_Cust_Fax',
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
            'template' => '<div class="panel panel-primary"><div class="panel-heading"><div class="pull-right">{summary}</div><h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  Users & Customers</h3></div><div class="panel-body">{items}{pager}</div></div>',
            'columns' => $gridColumns
                )
        );
        ?>
    </div>
</div>