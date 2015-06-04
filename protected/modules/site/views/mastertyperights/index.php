<?php
/* @var $this MastertyperightsController */
/* @var $dataProvider CActiveDataProvider */

$this->title = 'Right Holder Types';
$this->breadcrumbs = array(
    'Right Holder Type',
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
                        'action' => array('/site/mastertyperights/index'),
                        'htmlOptions' => array('role' => 'form')
                    ));
                    ?>

                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Type_Rights_Name', array('class' => 'control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Type_Rights_Name', array('class' => 'form-control', 'size' => 60, 'maxlength' => 90)); ?>
                            <?php echo $form->error($searchModel, 'Type_Rights_Name'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Active', array('class' => 'control-label')); ?>
                            <?php
                            echo $form->dropDownList($searchModel, 'Active', array('0' => 'In-active', '1' => 'Active'), array('prompt' => '', 'class' => 'form-control'));
                            ;
                            ?>
                            <?php echo $form->error($searchModel, 'Active'); ?>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Type_Rights_Code', array('class' => 'control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Type_Rights_Code', array('class' => 'form-control', 'size' => 10, 'maxlength' => 10)); ?>
                            <?php echo $form->error($searchModel, 'Type_Rights_Code'); ?>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Type_Rights_Standard', array('class' => 'control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Type_Rights_Standard', array('class' => 'form-control', 'size' => 10, 'maxlength' => 10)); ?>
                            <?php echo $form->error($searchModel, 'Type_Rights_Standard'); ?>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Type_Rights_Rank', array('class' => 'control-label')); ?>
                            <?php echo $form->textField($searchModel, 'Type_Rights_Rank', array('class' => 'form-control')); ?>
                            <?php echo $form->error($searchModel, 'Type_Rights_Rank'); ?>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Type_Rights_Occupation', array('class' => 'control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Type_Rights_Occupation', $model->OccupationList, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($searchModel, 'Type_Rights_Occupation'); ?>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Type_Rights_Domain', array('class' => 'control-label')); ?>
                            <?php echo $form->dropDownList($searchModel, 'Type_Rights_Domain', $model->DomainList, array('class' => 'form-control', 'prompt' => '')); ?>
                            <?php echo $form->error($searchModel, 'Type_Rights_Domain'); ?>
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
                'Type_Rights_Code',
                'Type_Rights_Standard',
                'Type_Rights_Name',
                array(
                    'name' => 'Type_Rights_Occupation',
                    'type' => 'raw',
                    'value' => function($data) {
                        echo $data->getOccupationList($data->Type_Rights_Occupation);
                    },
                ),
                array(
                    'name' => 'Type_Rights_Domain',
                    'type' => 'raw',
                    'value' => function($data) {
                        echo $data->getDomainList($data->Type_Rights_Domain);
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
        <?php echo CHtml::link('<i class="fa fa-plus"></i>&nbsp;&nbsp;Create RightHolder Type', array('/site/mastertyperights/create'), array('class' => 'btn btn-success pull-right')); ?>
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
            'Type_Rights_Code',
            'Type_Rights_Standard',
            'Type_Rights_Name',
            array(
                'name' => 'Type_Rights_Occupation',
                'type' => 'raw',
                'value' => function($data) {
                    echo $data->getOccupationList($data->Type_Rights_Occupation);
                },
            ),
            array(
                'name' => 'Type_Rights_Domain',
                'type' => 'raw',
                'value' => function($data) {
                    echo $data->getDomainList($data->Type_Rights_Domain);
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
                'class' => 'application.components.MyActionButtonColumn',
                'htmlOptions' => array('style' => 'width: 180px;;text-align:center', 'vAlign' => 'middle', 'class' => 'action_column'),
                'template' => '{view}{update}{delete}',
            )
        );

        $this->widget('booster.widgets.TbExtendedGridView', array(
            'type' => 'striped bordered',
            'dataProvider' => $model->dataProvider(),
            'responsiveTable' => true,
            'template' => '<div class="panel panel-primary"><div class="panel-heading"><div class="pull-right">{summary}</div><h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  Right Holder Types</h3></div><div class="panel-body">{items}{pager}</div></div>',
            'columns' => $gridColumns
                )
        );
        ?>
    </div>
</div>