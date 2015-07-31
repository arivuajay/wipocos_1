<?php
$dataProvider = RecordingSessionRightholder::model()->workExportList($model->Rcd_Ses_Id, 'R');
$gridColumns = array(
    array(
        'name' => 'Recording',
        'type' => 'raw',
        'value' => function ($data){
            echo $data->rightholderRecord->Rcd_Title;
        }
    ),
    array(
        'name' => 'workmatchrecords',
        'type' => 'raw',
        'value' => '$data->getWorkmatchrecords()'
    ),
//    'workmatchrecords'
);
$this->exportParam = 'type=R&exportCSV';
$export_btn = $this->renderExportGridButton('work-grid', '<i class="fa fa-file-excel-o"></i> Export', array('class' => 'btn btn-xs btn-danger  pull-right', 'id' => 'work-export'));
$this->widget('booster.widgets.TbExtendedGridView', array(
    'id' => 'work-grid',
    'type' => 'striped bordered datatable',
    'dataProvider' => $dataProvider,
    'responsiveTable' => true,
    'sortableRows' => false,
    'template' => '<div>&nbsp;' . $export_btn . '</div><div class="panel-body">{items}{pager}</div><div>{summary}</div>',
    'columns' => $gridColumns
        )
);
?>
    


