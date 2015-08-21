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
                    $countries = Myclass::getMasterCountry(false);
                    $nationalities = Myclass::getMasterNationality(false);
                    $currencies = Myclass::getMasterCurrency();
                    $social_types = $model->getSocialType(); 
                    ?>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Org_Code', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Org_Code', array('class' => 'form-control', 'size' => 25, 'maxlength' => 25)); ?>
                            <?php echo $form->error($searchModel, 'Org_Code'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Org_Abbrevation', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Org_Abbrevation', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                            <?php echo $form->error($searchModel, 'Org_Abbrevation'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Org_Nation_Id', array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Org_Nation_Id', $nationalities, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($searchModel, 'Org_Nation_Id'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Org_Country_Id', array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Org_Country_Id', $countries, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($searchModel, 'Org_Country_Id'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Org_Currency_Id', array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Org_Currency_Id', $currencies, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($searchModel, 'Org_Currency_Id'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Org_Society_Type_Id', array('class' => ' control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Org_Society_Type_Id', $social_types, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($searchModel, 'Org_Society_Type_Id'); ?>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Org_Telephone', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Org_Telephone', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
                            <?php echo $form->error($searchModel, 'Org_Telephone'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Org_Email', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Org_Email', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
                            <?php echo $form->error($searchModel, 'Org_Email'); ?>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Org_Website', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Org_Website', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
                            <?php echo $form->error($searchModel, 'Org_Website'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Org_Bank_Account', array('class' => ' control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Org_Bank_Account', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                            <?php echo $form->error($searchModel, 'Org_Bank_Account'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Active', array('class' => ' control-label')); ?>
                            <?php
                            echo $form->dropDownList($searchModel, 'Active', array('0' => 'In-active', '1' => 'Active'), array('prompt' => '', 'class' => 'form-control'));
                            ;
                            ?>
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
//                array(
//                    'class' => 'IndexColumn',
//                    'header' => '',
//                ),
                'Org_Code',
                'Org_Abbrevation',
                array(
                    'name' => 'Org_Nation_Id',
                    //              'type' => 'raw',
                    'value' => function($data) {
                echo isset($data->orgNation->Nation_Name) ? $data->orgNation->Nation_Name : '';
            },
                ),
                array(
                    'name' => 'Org_Country_Id',
                    //              'type' => 'raw',
                    'value' => function($data) {
                echo isset($data->orgCountry->Country_Name) ? $data->orgCountry->Country_Name : '';
            },
                ),
                array(
                    'name' => 'Org_Currency_Id',
                    //              'type' => 'raw',
                    'value' => function($data) {
                echo isset($data->orgCurrency->Currency_Name) ? $data->orgCurrency->Currency_Name : '';
            }
                ),
                array(
                    'name' => 'Org_Society_Type_Id',
                    //              'type' => 'raw',
                    'value' => function($data) {
                echo !empty($data->Org_Society_Type_Id) ? Organization::getSocialType($data->Org_Society_Type_Id) : '';
            }
                ),
                array(
                    'name' => 'Active',
                    'htmlOptions' => array('style' => 'width: 180px;;text-align:center', 'vAlign' => 'middle'),
                    'type' => 'raw',
                    'value' => function($data) {
                echo ($data->Active == 1) ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>';
            },
                ),
                /*
                  'Org_Address',
                  'Org_Telephone',
                  'Org_Email',
                  'Org_Fax',
                  'Org_Website',
                  'Org_Bank_Account',
                  'Org_Related_Rights',
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
    <div class="row mb10">
        <?php
        $this->widget(
                'application.components.MyTbButton', array(
            'label' => 'Create Organization',
            'icon' => 'fa fa-plus',
            'url' => array('/site/organization/create'),
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
            'Org_Code',
            'Org_Abbrevation',
            array(
                'name' => 'Org_Nation_Id',
                //              'type' => 'raw',
                'value' => function($data) {
            echo isset($data->orgNation->Nation_Name) ? $data->orgNation->Nation_Name : '';
        },
            ),
            array(
                'name' => 'Org_Country_Id',
                //              'type' => 'raw',
                'value' => function($data) {
            echo isset($data->orgCountry->Country_Name) ? $data->orgCountry->Country_Name : '';
        },
            ),
            array(
                'name' => 'Org_Currency_Id',
                //              'type' => 'raw',
                'value' => function($data) {
            echo isset($data->orgCurrency->Currency_Name) ? $data->orgCurrency->Currency_Name : '';
        },
            ),
                array(
                    'name' => 'Org_Society_Type_Id',
                    //              'type' => 'raw',
                    'value' => function($data) {
                echo !empty($data->Org_Society_Type_Id) ? Organization::getSocialType($data->Org_Society_Type_Id) : '';
            }
                ),
            array(
                'name' => 'Active',
                'htmlOptions' => array('style' => 'width: 180px;;text-align:center', 'vAlign' => 'middle'),
                'type' => 'raw',
                'value' => function($data) {
            echo ($data->Active == 1) ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>';
        }
            ),
            /*
              'Org_Address',
              'Org_Telephone',
              'Org_Email',
              'Org_Fax',
              'Org_Website',
              'Org_Bank_Account',
              'Org_Related_Rights',
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
            'dataProvider' => $model->dataProvider(),
            'responsiveTable' => true,
            'template' => '<div class="panel panel-primary"><div class="panel-heading"><div class="pull-right">{summary}</div><h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  Organizations</h3></div><div class="panel-body">{items}{pager}</div></div>',
            'columns' => $gridColumns
                )
        );
        ?>
    </div>
</div>