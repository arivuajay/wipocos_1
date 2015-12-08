<?php
/* @var $this WorkController */
/* @var $dataProvider CActiveDataProvider */

$this->title = 'Works/recording list by Right holder';
$this->breadcrumbs = array(
    'Works/recording list by Right holder',
);

$themeUrl = $this->themeUrl;
$cs = Yii::app()->getClientScript();
$cs_pos_end = CClientScript::POS_END;

$cs->registerCssFile($themeUrl . '/css/select2/select2.min.css');
$cs->registerScriptFile($themeUrl . '/js/select2/select2.full.min.js', $cs_pos_end);
$cs->registerScriptFile($themeUrl . '/js/datatables/jquery.dataTables.js', $cs_pos_end);
$cs->registerScriptFile($themeUrl . '/js/datatables/dataTables.bootstrap.js', $cs_pos_end);

$authors = CHtml::listData(AuthorAccount::model()->isActive()->findAll(), 'Auth_GUID', 'fullname');
$performers = CHtml::listData(PerformerAccount::model()->isActive()->findAll(), 'Perf_GUID', 'fullname');
$publishers = CHtml::listData(PublisherAccount::model()->isActive()->findAll(), 'Pub_GUID', 'Pub_Corporate_Name');
$producers = CHtml::listData(ProducerAccount::model()->isActive()->findAll(), 'Pro_GUID', 'Pro_Corporate_Name');
?>
<div class="col-lg-12 col-md-12" id="advance-search-block">
    <div class="row mb10" id="advance-search-label">
        <?php echo CHtml::link('<i class="fa fa-angle-right"></i> Show Advance Search', 'javascript:void(0);', array('class' => 'pull-right')); ?>
    </div>
    <div class="row" id="advance-search-form">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="glyphicon glyphicon-search"></i>  Search
                </h3>
                <div class="clearfix"></div>
            </div>
            <section class="content">
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'search-form',
                    'method' => 'get',
                    'action' => array('/site/report/wkrecrh'),
                    'htmlOptions' => array('role' => 'form')
                ));
                ?>
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <select class="form-control" name="sid" id="sid">
                                <option>Select Members</option>
                                <?php
                                if ($authors) {
                                    echo '<optgroup label="Author">';
                                    foreach ($authors as $k => $v)
                                        echo '<option value="' . $k . '">' . $v . '</option>';
                                    echo '</optgroup>';
                                }
                                if ($performers) {
                                    echo '<optgroup label="Performer">';
                                    foreach ($performers as $k => $v)
                                        echo '<option value="' . $k . '">' . $v . '</option>';
                                    echo '</optgroup>';
                                }
                                if ($publishers) {
                                    echo '<optgroup label="Publisher">';
                                    foreach ($publishers as $k => $v)
                                        echo '<option value="' . $k . '">' . $v . '</option>';
                                    echo '</optgroup>';
                                }
                                if ($producers) {
                                    echo '<optgroup label="Producer">';
                                    foreach ($producers as $k => $v)
                                        echo '<option value="' . $k . '">' . $v . '</option>';
                                    echo '</optgroup>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo CHtml::dropDownList('st', $_REQUEST['st'], array('W' => 'WORK', 'R' => 'Recording'), array('class' => 'form-control')); ?>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2">
                        <div class="form-group">
                            <?php echo CHtml::submitButton('Search', array('class' => 'btn btn-primary form-control')); ?>
                        </div>
                    </div>
                </div>
                <?php $this->endWidget(); ?>
            </section>
        </div>
    </div>
</div>

<div class="col-lg-12 col-md-12">
    <div class="row">
        <div class="col-lg-4 col-md-4 row">
            <div class="form-group">
                <label class="control-label">Spotlight Search: </label>
                <input type="text" class="form-control inline" name="base_table_search" id="base_table_search" />
            </div>
        </div>
    </div>
</div>
<?php if ($workDataProvider): ?>
    <div class="col-lg-12 col-md-12">
        <div class="row">
            <?php
            $gridColumns = array(
                'Work_Org_Title',
                'Work_Internal_Code',
                'Work_Iswc',
                array(
                    'name' => 'matchingdetails',
                    'value' => function($data, $row) use (&$workModel) {
                        echo $workModel->getMatchingdetails($data->Work_Id);
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
                'type' => 'striped bordered datatable',
                'dataProvider' => $workDataProvider,
                'responsiveTable' => true,
                'template' => '<div class="panel panel-primary"><div class="panel-heading"><div class="pull-right">{summary}</div><h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  Works</h3></div><div class="panel-body">{items}{pager}</div></div>',
                'columns' => $gridColumns
                    )
            );
            ?>
        </div>
    </div>
<?php endif; ?>

<?php if ($recordDataProvider): ?>
    <div class="col-lg-12 col-md-12">
        <div class="row">
            <?php
            $recordGridColumns = array(
                'Rcd_Title',
                'Rcd_Internal_Code',
                'Rcd_Date',
                array(
                    'name' => 'matchingdetails',
                    'value' => function($data, $row) use (&$recordModel) {
                        echo $recordModel->getMatchingdetails($data->Rcd_Id);
                    },
                ),
            );

            $this->widget('booster.widgets.TbExtendedGridView', array(
                'type' => 'striped bordered datatable',
                'dataProvider' => $recordDataProvider,
                'responsiveTable' => true,
                'template' => '<div class="panel panel-primary"><div class="panel-heading"><div class="pull-right">{summary}</div><h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  Recordings</h3></div><div class="panel-body">{items}{pager}</div></div>',
                'columns' => $recordGridColumns
                    )
            );
            ?>
        </div>
    </div>
<?php endif; ?>
<?php
$sid = $_REQUEST['sid'];

$js = <<< EOD
    $(document).ready(function () {
        $("#advance-search-label a").trigger("click");
        $("#sid option[value='{$sid}']").attr('selected','selected');
        $("#sid").select2();
    });
EOD;
$cs->registerScript('_report', $js);
?>