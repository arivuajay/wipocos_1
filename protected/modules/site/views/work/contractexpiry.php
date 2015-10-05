<?php
/* @var $this WorkPublishingController */
/* @var $dataProvider CActiveDataProvider */

$this->title = 'Contract Expiry';
$this->breadcrumbs = array(
    'Contract Expiry',
);
$themeUrl = $this->themeUrl;
$cs = Yii::app()->getClientScript();
$cs_pos_end = CClientScript::POS_END;

$cs->registerCssFile($themeUrl . '/css/datepicker/datepicker3.css');
$cs->registerScriptFile($themeUrl . '/js/datepicker/bootstrap-datepicker.js', $cs_pos_end);
$cs->registerScriptFile($themeUrl . '/js/datatables/jquery.dataTables.js', $cs_pos_end);
$cs->registerScriptFile($themeUrl . '/js/datatables/dataTables.bootstrap.js', $cs_pos_end);
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
                <div class="row">
                    <?php
                    $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'search-form',
                        'method' => 'get',
                        'action' => array('/site/work/contractexpiry'),
                        'htmlOptions' => array('role' => 'form')
                    ));
                    ?>

                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo CHtml::label('Work Name', '', array('class' => ' control-label')) ?>
                            <?php echo CHtml::textField('Work[work_name]', $_GET['Work']['work_name'], array('class' => 'form-control')) ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo CHtml::label('Publisher Name', '', array('class' => ' control-label')) ?>
                            <?php echo CHtml::textField('Work[publisher_name]', $_GET['Work']['publisher_name'], array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)) ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php $Role = CHtml::listData(MasterTypeRights::model()->findAll(), 'Type_Rights_Name', 'Type_Rights_Name'); ?>
                            <?php echo CHtml::label('Role', '', array('class' => ' control-label')) ?>
                            <?php echo CHtml::dropDownList('Work[role]', $_GET['Work']['role'], $Role, array('class' => 'form-control', 'prompt' => '')) ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo CHtml::label('Contract End Date', '', array('class' => ' control-label')) ?>
                            <?php echo CHtml::textField('Work[contract_end_date]', $_GET['Work']['contract_end_date'], array('class' => 'form-control date')) ?>
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
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>
                        Search Results</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Publisher Name</th>
                                <th>Role</th>
                                <th>Contract End Date</th>
                                <th align="center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $pub_count = 0;
                            foreach ($search_pub_model as $key => $pub) {
                                $main_publisher = (new WorkRightholder)->getMainPublisher($pub->Work_Id);
                                if (isset($_GET['Work']['publisher_name']) && $_GET['Work']['publisher_name'] != '') {
                                    similar_text(strtoupper($main_publisher->workPublisher->Pub_Corporate_Name), strtoupper($_GET['Work']['publisher_name']), $pub_percent);
                                    if($pub_percent < 50)
                                        continue;
                                }
                                if (isset($_GET['Work']['role']) && $_GET['Work']['role'] != '') {
                                    if($_GET['Work']['role'] != $main_publisher->workRightRole->Type_Rights_Name)
                                        continue;
                                }
                                ?>
                                <tr>
                                    <td><?php echo $pub->work->Work_Org_Title ?></td>
                                    <td>
                                        <?php
                                        echo $main_publisher->workPublisher->Pub_Corporate_Name
                                        ?>
                                    </td>
                                    <td><?php echo $main_publisher->workRightRole->Type_Rights_Name ?></td>
                                    <td><?php echo $pub->Work_Pub_Contact_End ?></td>
                                    <td align="center">
                                        <?php echo CHtml::link('<i class="glyphicon glyphicon-pencil"></i>', array('/site/work/update', 'id' => $pub->Work_Id, 'tab' => '5'), array('class' => 'update', 'data-original-title' => 'Update', 'data-toggle' => 'tooltip')) ?>
                                    </td>
                                </tr>
                            <?php $pub_count++;} ?>
                            <?php
                            $sub_count = 0;
                            foreach ($search_sub_model as $key => $sub) {
                                $sub_publisher = (new WorkRightholder)->getSubPublisher($sub->Work_Id);
                                if (isset($_GET['Work']['publisher_name']) && $_GET['Work']['publisher_name'] != '') {
                                    similar_text(strtoupper($sub_publisher->workPublisher->Pub_Corporate_Name), strtoupper($_GET['Work']['publisher_name']), $pub_percent);
                                    if($pub_percent < 50)
                                        continue;
                                }
                                if (isset($_GET['Work']['role']) && $_GET['Work']['role'] != '') {
                                    if($_GET['Work']['role'] != $sub_publisher->workRightRole->Type_Rights_Name)
                                        continue;
                                }
                                ?>
                                <tr>
                                    <td><?php echo $sub->work->Work_Org_Title ?></td>
                                    <td>
                                        <?php
                                        
                                        echo $sub_publisher->workPublisher->Pub_Corporate_Name
                                        ?>
                                    </td>
                                    <td><?php echo $sub_publisher->workRightRole->Type_Rights_Name ?></td>
                                    <td><?php echo $sub->Work_Sub_Contact_End ?></td>
                                    <td align="center">
                                        <?php echo CHtml::link('<i class="glyphicon glyphicon-pencil"></i>', array('/site/work/update', 'id' => $sub->Work_Id, 'tab' => '6'), array('class' => 'update', 'data-original-title' => 'Update', 'data-toggle' => 'tooltip')) ?>
                                    </td>
                                </tr>
                            <?php $sub_count++;} ?>
                                
                            <?php 
                            if($pub_count == 0 && $sub_count == 0){
                                echo '<tr><td colspan="5">No results found.</td></tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
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
    </div>
</div>

<div class="col-lg-12 col-md-12">
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>
                    <?php echo $this->title; ?></h3>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered table-datatable">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Publisher Name</th>
                            <th>Role</th>
                            <th>Contract End Date</th>
                            <th align="center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pub_model as $key => $pub) { ?>
                            <tr>
                                <td><?php echo $pub->work->Work_Org_Title ?></td>
                                <td>
                                    <?php
                                    $main_publisher = (new WorkRightholder)->getMainPublisher($pub->Work_Id);
                                    echo $main_publisher->workPublisher->Pub_Corporate_Name
                                    ?>
                                </td>
                                <td><?php echo $main_publisher->workRightRole->Type_Rights_Name ?></td>
                                <td><?php echo $pub->Work_Pub_Contact_End ?></td>
                                <td align="center">
                                    <?php echo CHtml::link('<i class="glyphicon glyphicon-pencil"></i>', array('/site/work/update', 'id' => $pub->Work_Id, 'tab' => '5'), array('class' => 'update', 'data-original-title' => 'Update', 'data-toggle' => 'tooltip')) ?>
                                </td>
                            </tr>
                        <?php } ?>
                        <?php foreach ($sub_model as $key => $sub) { ?>
                            <tr>
                                <td><?php echo $sub->work->Work_Org_Title ?></td>
                                <td>
                                    <?php
                                    $sub_publisher = (new WorkRightholder)->getSubPublisher($sub->Work_Id);
                                    echo $sub_publisher->workPublisher->Pub_Corporate_Name
                                    ?>
                                </td>
                                <td><?php echo $sub_publisher->workRightRole->Type_Rights_Name ?></td>
                                <td><?php echo $sub->Work_Sub_Contact_End ?></td>
                                <td align="center">
                                    <?php echo CHtml::link('<i class="glyphicon glyphicon-pencil"></i>', array('/site/work/update', 'id' => $sub->Work_Id, 'tab' => '6'), array('class' => 'update', 'data-original-title' => 'Update', 'data-toggle' => 'tooltip')) ?>
                                </td>
                            </tr>
                        <?php } ?>
                        <?php 
                        if(empty($pub_model) && empty($sub_model)){
                            echo '<tr><td colspan="5">No results found.</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
$js = <<< EOD
    $(document).ready(function(){
        $('.date').datepicker({ format: 'yyyy-mm-dd' });
    });
EOD;
Yii::app()->clientScript->registerScript('index', $js);
?>