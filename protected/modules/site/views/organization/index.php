<?php
/* @var $this OrganizationController */
/* @var $dataProvider CActiveDataProvider */

$this->title = 'Organizations';
$this->breadcrumbs = array(
    'Organizations',
);
?>
<div class="col-lg-12 col-md-12">
    <div class="row">
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
                        'action' => array('/site/organization/index'),
                        'htmlOptions' => array('role' => 'form')
                    ));

                    $countries = CHtml::listData(MasterCountry::model()->isActive()->findAll(), 'Master_Country_Id', 'Country_Name');
                    $territories = CHtml::listData(MasterTerritories::model()->isActive()->findAll(), 'Master_Territory_Id', 'Territory_Name');
                    $regions = CHtml::listData(MasterRegion::model()->isActive()->findAll(), 'Master_Region_Id', 'Region_Name');
                    $professions = CHtml::listData(MasterProfession::model()->isActive()->findAll(), 'Master_Profession_Id', 'Profession_Name');
                    $roles = CHtml::listData(MasterRole::model()->isActive()->findAll(), 'Master_Role_ID', 'Description');
                    $pay_methods = CHtml::listData(MasterPaymentMethod::model()->isActive()->findAll(), 'Master_Paymode_Id', 'Paymode_Name');
                    $documents = CHtml::listData(MasterDocument::model()->isActive()->findAll(), 'Master_Doc_Id', 'Doc_Name');
                    $document_types = CHtml::listData(MasterDocumentType::model()->isActive()->findAll(), 'Master_Doc_Type_Id', 'Doc_Type_Name');
                    ?>

                    <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Org_Abbr_Id', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Org_Abbr_Id', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                            <?php echo $form->error($searchModel, 'Org_Abbr_Id'); ?>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Org_Country_Id', array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Org_Country_Id', $countries, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($searchModel, 'Org_Country_Id'); ?>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Org_Territory_Id', array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Org_Territory_Id', $territories, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($searchModel, 'Org_Territory_Id'); ?>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Org_Region_Id', array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Org_Region_Id', $regions, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($searchModel, 'Org_Region_Id'); ?>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Org_Profession_Id', array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Org_Profession_Id', $professions, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($searchModel, 'Org_Profession_Id'); ?>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Org_Role_Id', array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Org_Role_Id', $roles, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($searchModel, 'Org_Role_Id'); ?>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Org_Payment_Id', array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Org_Payment_Id', $pay_methods, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($searchModel, 'Org_Payment_Id'); ?>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Org_Doc_Type_Id', array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Org_Doc_Type_Id', $document_types, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($searchModel, 'Org_Doc_Type_Id'); ?>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Org_Doc_Id', array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Org_Doc_Id', $documents, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($searchModel, 'Org_Doc_Id'); ?>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Active', array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Active', array('0' => 'In-active', '1' => 'Active'), array('prompt' => '', 'class' => 'form-control'));
                            ; ?>
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
            array(
            'class' => 'IndexColumn',
            'header' => '',
            ),
            'Org_Abbr_Id',
            array(
            'name' => 'Active',
            'htmlOptions' => array('style' => 'width: 180px;;text-align:center', 'vAlign' => 'middle'),
            'type' => 'raw',
            'value' => function($data) {
            echo ($data->Active == 1) ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>';
            },
            ),
            array(
                'name' => 'Org_Country_Id',
                'htmlOptions' => array('style' => 'width: 180px;;text-align:center', 'vAlign' => 'middle'),
                  'type' => 'raw',
                'value' => function($data) {
                    echo isset($data->orgCountry->Country_Name) ? $data->orgCountry->Country_Name : '';
              },
            ),
            array(
                'name' => 'Org_Territory_Id',
                'htmlOptions' => array('style' => 'width: 180px;;text-align:center', 'vAlign' => 'middle'),
//              'type' => 'raw',
                'value' => function($data) {
                    echo isset($data->orgTerritory->Territory_Name) ? $data->orgTerritory->Territory_Name : '';
              },
            ),
            array(
                'name' => 'Org_Region_Id',
                'htmlOptions' => array('style' => 'width: 180px;;text-align:center', 'vAlign' => 'middle'),
//              'type' => 'raw',
                'value' => function($data) {
                    echo isset($data->orgRegion->Region_Name) ? $data->orgRegion->Region_Name : '';
              },
            ),
              array(
              'name' => 'Active',
              'htmlOptions' => array('style' => 'width: 180px;;text-align:center', 'vAlign' => 'middle'),
              'type' => 'raw',
              'value' => function($data) {
              echo ($data->Active == 1) ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>';
              },
              ),
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
        <?php echo CHtml::link('<i class="fa fa-plus"></i>&nbsp;&nbsp;Create Organization', array('/site/organization/create'), array('class' => 'btn btn-success pull-right')); ?>
    </div>
</div>

<div class="col-lg-12 col-md-12">
    <div class="row">
        <?php
        $gridColumns = array(
            array(
                'class' => 'IndexColumn',
                'header' => '',
            ),
            'Org_Abbr_Id',
            array(
                'name' => 'Org_Country_Id',
                'htmlOptions' => array('style' => 'width: 180px;;text-align:center', 'vAlign' => 'middle'),
//              'type' => 'raw',
                'value' => function($data) {
                    echo isset($data->orgCountry->Country_Name) ? $data->orgCountry->Country_Name : '';
              },
            ),
            array(
                'name' => 'Org_Territory_Id',
                'htmlOptions' => array('style' => 'width: 180px;;text-align:center', 'vAlign' => 'middle'),
//              'type' => 'raw',
                'value' => function($data) {
                    echo isset($data->orgTerritory->Territory_Name) ? $data->orgTerritory->Territory_Name : '';
              },
            ),
            array(
                'name' => 'Org_Region_Id',
                'htmlOptions' => array('style' => 'width: 180px;;text-align:center', 'vAlign' => 'middle'),
              'type' => 'raw',
                'value' => function($data) {
                    echo isset($data->orgRegion->Region_Name) ? $data->orgRegion->Region_Name : '';
              },
            ),
              array(
              'name' => 'Active',
              'htmlOptions' => array('style' => 'width: 180px;;text-align:center', 'vAlign' => 'middle'),
              'type' => 'raw',
              'value' => function($data) {
              echo ($data->Active == 1) ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>';
              },
              ),
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
            'template' => '<div class="panel panel-primary"><div class="panel-heading"><div class="pull-right">{summary}</div><h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  Organizations</h3></div><div class="panel-body">{items}{pager}</div></div>',
            'columns' => $gridColumns
                )
        );
        ?>
    </div>
</div>