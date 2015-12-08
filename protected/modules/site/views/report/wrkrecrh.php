<?php
/* @var $this PurchaseorderController */
/* @var $dataProvider CActiveDataProvider */

$this->title = 'Right Holder List By Work';
$this->breadcrumbs = array(
    'Report',
);
$themeUrl = $this->themeUrl;
$cs = Yii::app()->getClientScript();
$cs_pos_end = CClientScript::POS_END;

?>

<div id="report_area"></div>

<?php
$get_report = Yii::app()->createAbsoluteUrl('/site/report/report', array('xml' => 'RH_BY_WORK'));
$js = <<< EOD
    $(document).ready(function () {
        $.get("$get_report", function (data, status) {
            $('#report_area').html(data);
        });
    });
EOD;
$cs->registerScript('_report', $js);
?>