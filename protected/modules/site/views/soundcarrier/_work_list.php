<?php
//$works = (new SoundCarrierRightholder)->distinctWorks($model->Sound_Car_Id);
?>
<!--<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th style="width: 10px">#</th>
            <th>Title</th>
            <th>Internal Code</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (!empty($works)) {
            foreach ($works as $key => $work) {
                ?>
                <tr>
                    <td><?php echo $key + 1 ?>.</td>
                    <?php if ($work->Sound_Car_Right_Work_Type == 'W') { ?>
                        <td><?php echo $work->rightholderWork->Work_Org_Title ?></td>
                        <td><?php echo $work->rightholderWork->Work_Internal_Code ?></td>
                    <?php } else if ($work->Sound_Car_Right_Work_Type == 'R') { ?>
                        <td><?php echo $work->rightholderRecord->Rcd_Title ?></td>
                        <td><?php echo $work->rightholderRecord->Rcd_Internal_Code ?></td>
                    <?php } ?>
                </tr>
                <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="3">No Data Found</td>
            </tr>
        <?php } ?>
    </tbody>
</table>-->

<?php
$dataProvider = SoundCarrierRightholder::model()->workExportList($model->Sound_Car_Id);

$gridColumns = array(
    array(
        'name' => 'Work',
        'type' => 'raw',
        'value' => function ($data){
            echo $data->rightholderWork->Work_Org_Title;
        }
    ),
    array(
        'name' => 'Right Holders',
        'type' => 'raw',
        'value' => '$data->getWorkmatchrecords()'
    ),
//    'workmatchrecords'
);

$export_btn = $this->renderExportGridButton('work-grid', '<i class="fa fa-file-excel-o"></i> Export', array('class' => 'btn btn-xs btn-danger  pull-right'));

$this->widget('booster.widgets.TbExtendedGridView', array(
    'id' => 'work-grid',
    'type' => 'striped bordered datatable',
    'dataProvider' => $dataProvider,
    'responsiveTable' => true,
    'sortableRows' => false,
    'template' => '<div>&nbsp;' . $export_btn . '</div><div class="panel-body">{items}{pager}</div><div>{summary}</div>',
//    'template' => '<div class="panel panel-primary"><div class="panel-heading"><div class="pull-right">{summary} &nbsp;' . $export_btn . '</div><h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  Authors</h3></div><div class="panel-body">{items}{pager}</div></div>',
    'columns' => $gridColumns
        )
);
?>
    


