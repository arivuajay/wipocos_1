<?php
/* @var $this PurchaseorderController */
/* @var $dataProvider CActiveDataProvider */

$this->title = 'Group Member Report';
$this->breadcrumbs = array(
    'PO Report',
);
$themeUrl = $this->themeUrl;
$cs = Yii::app()->getClientScript();
$cs_pos_end = CClientScript::POS_END;

?>

<div id="report_area"></div>

<?php
$get_report = Yii::app()->createAbsoluteUrl('/site/report/report', array('xml' => 'Group_Member_List'));
$js = <<< EOD
    $(document).ready(function () {
        $.get("$get_report", function (data, status) {
            $('#report_area').html(data);
        });
    });
EOD;
$cs->registerScript('_po_report', $js);
?>