<?php
/* @var $this AudittrailController */
/* @var $dataProvider CActiveDataProvider */

$this->title = 'Audit Trails';
$this->breadcrumbs = array(
    'Audit Trails',
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
                        'action' => array('/site/audittrail/index'),
                        'htmlOptions' => array('role' => 'form')
                    ));
                    ?>

                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'aud_user', array('class' => ' control-label')); ?>
<?php echo $form->textField($searchModel, 'aud_user', array('class' => 'form-control')); ?>
<?php echo $form->error($searchModel, 'aud_user'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'aud_class', array('class' => ' control-label')); ?>
<?php echo $form->textField($searchModel, 'aud_class', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
<?php echo $form->error($searchModel, 'aud_class'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'aud_action', array('class' => ' control-label')); ?>
<?php echo $form->textField($searchModel, 'aud_action', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
<?php echo $form->error($searchModel, 'aud_action'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'aud_message', array('class' => ' control-label')); ?>
<?php echo $form->textField($searchModel, 'aud_message', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
<?php echo $form->error($searchModel, 'aud_message'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'aud_ip_address', array('class' => ' control-label')); ?>
<?php echo $form->textField($searchModel, 'aud_ip_address', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
<?php echo $form->error($searchModel, 'aud_ip_address'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'aud_created_date', array('class' => ' control-label')); ?>
<?php echo $form->textField($searchModel, 'aud_created_date', array('class' => 'form-control')); ?>
<?php echo $form->error($searchModel, 'aud_created_date'); ?>
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
//            array(
//                'class' => 'IndexColumn',
//                'header' => '',
//            ),
                array(
                    'header' => 'User',
                    'value' => function($data) {
                if (!empty($data->audUser))
                    echo $data->audUser->username;
            },
                ),
//		'aud_class',
                'aud_action',
                'aud_message',
                'aud_ip_address',
                'aud_created_date',
                array(
                    'header' => 'Actions',
                    'class' => 'application.components.MyActionButtonColumn',
                    'htmlOptions' => array('style' => 'width: 180px;;text-align:center', 'vAlign' => 'middle', 'class' => 'action_column'),
                    'template' => '{delete}',
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
<?php echo CHtml::link('<i class="fa fa-plus"></i>&nbsp;&nbsp;Create AuditTrail', array('/site/audittrail/create'), array('class' => 'btn btn-success pull-right')); ?>
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
            array(
                'header' => 'User',
                'value' => function($data) {
            if (!empty($data->audUser))
                echo $data->audUser->username;
        },
            ),
//		'aud_class',
            'aud_action',
            'aud_message',
            'aud_ip_address',
            'aud_created_date',
            array(
                'header' => 'Actions',
                'class' => 'application.components.MyActionButtonColumn',
                'htmlOptions' => array('style' => 'width: 180px;;text-align:center', 'vAlign' => 'middle', 'class' => 'action_column'),
                'template' => '{delete}',
            )
        );

        $this->widget('booster.widgets.TbExtendedGridView', array(
            'type' => 'striped bordered',
            'dataProvider' => $model->dataProvider(),
            'responsiveTable' => true,
            'template' => '<div class="panel panel-primary"><div class="panel-heading"><div class="pull-right">{summary}</div><h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  Audit Trails</h3></div><div class="panel-body">{items}{pager}</div></div>',
            'columns' => $gridColumns
                )
        );
        ?>
    </div>
</div>