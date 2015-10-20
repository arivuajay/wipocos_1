<?php
/* @var $this SocietyController */
/* @var $model Society */

$this->title = isset($staging) && !empty($staging) ? 'Logsheet Staging Table' : 'Import Logsheet';
$this->breadcrumbs = array(
    'Utilization Periods' => array('/site/distributionutlizationperiod/index'),
    $this->title,
);
?>

<div class="user-create">
    <?php
    if (isset($staging) && !empty($staging)) {
//        Yii::app()->session['staging_tables'] = $staging_tables;
//        Yii::app()->session['staging'] = $staging;
//        Yii::app()->session['title'] = $imported_table;
        $status = Myclass::importViewStatus();
        $ignore_list = Myclass::importViewIgnoreList();
        $errorTexts = Myclass::importErrorTexts();
        $staging_log_list = array_values($staging['log_list']);
        ?>
        <div class="row mb10">
            <div class="col-lg-12 col-xs-12">
                <?php
//                echo MyHtml::link('<i class="fa fa-file-excel-o"></i> Export CSV', array('/site/society/exportimporteddata'), array('class' => "pull-right btn btn-danger", 'style' => 'margin-left:10px;'));
                echo MyHtml::link('<< Back to Import', array('/site/distributionlogsheet/import', 'id' => $model->period->Period_Id), array('class' => "pull-right btn btn-success"));
                ?>
            </div>
        </div>
        <div class="alert alert-success fade in">
            <button data-dismiss="alert" class="close close-sm" type="button">
                <i class="fa fa-times"></i>
            </button>
            XLS Imported Successfully!!!   <br /><?php echo $import_status; ?>             
        </div>
        <?php // echo CHtml::link('asd', $staging);  ?>
        <div class="row">
            <div class="box box-primary">

                <form class="form-horizontal" method="post" action="#" role="form">
                    <div class="col-lg-12 col-xs-12">
                        <div class="col-lg-12">
                            <div class="box-body">
                                <?php $this->renderPartial('_period_data_form', array('period_model' => $model->period)) ?>
                            </div>
                        </div>
                </form>
            </div>
        </div>
        <div class="col-lg-12 col-xs-12">
            <div class="col-lg-12">
                <div class="box-body" style="width: 100%;">
                    <h3 class="box-title text-center text-capitalize">Logsheet Import</h3>
                    <h4 class="box-title">User : <?php echo $staging['log_val']['Log_User_Cust_Id']; ?></h4>

                    <table class="table table-bordered">
                        <tbody>
                            <?php
                            $tr = "<tr>";
                            $tr .= "<td>S.No</td>";
                            foreach ($staging_log_list[0] as $col => $value) {
                                if (!in_array($col, $ignore_list))
                                    $tr .= "<td>" . DistributionLogsheetList::model()->getAttributeLabel($col) . "</td>";
                            }
                            $tr .= "<td>Status</td>";
                            $tr .= "</tr>";
                            $i = 1;
                            foreach ($staging_log_list as $key => $rows) {
                                $bg = $status[$rows['import_status']]['bg_color'];
                                $txt_clr = $status[$rows['import_status']]['text_color'];
                                $sts = $status[$rows['import_status']]['status'];

                                $tr .= "<tr style='background-color:$bg'>";
                                $tr .= "<td>{$i}</td>";
                                foreach ($staging_log_list[$key] as $col => $value) {
                                    if (!in_array($col, $ignore_list)) {
                                        $tr .= "<td>";
                                        if ($value == "")
                                            $tr .= "<span class='errorMessage'>empty</span>";
                                        else if (in_array($value, $errorTexts))
                                            $tr .= "<span class='errorMessage'>$value</span>";
                                        else
                                            $tr .= $value;
                                        $tr .= "</td>";
                                    }
                                }
                                $tr .= "<td><strong style='color:{$txt_clr}'>{$sts}</strong></td>";
                                $tr .= "</tr>";
                                $i++;
                            }
                            echo $tr;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php } else { ?>

    <div class="box box-primary">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'logsheet-form',
            'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data'),
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
            'enableAjaxValidation' => false,
        ));
        echo $form->hiddenField($model, 'Period_Id', array('value' => $period_model->Period_Id));
        echo $form->hiddenField($model, 'Log_User_Cust_Id', array('value' => 1));
        ?>
        <div class="col-lg-12">
            <div class="box-body">
                <?php $this->renderPartial('_period_data_form', array('period_model' => $period_model)) ?>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="box-body">
                <div class="form-group foundation">
                    <div class="box-body">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'import_file', array('class' => '')); ?>
                                <?php echo $form->fileField($model, 'import_file', array('class' => '')); ?>
                                <?php echo $form->error($model, 'import_file'); ?>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <?php echo CHtml::submitButton('Import', array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo CHtml::link('Click Here to Download Samples File', array('/site/default/download', 'df' => Myclass::refencryption(Yii::app()->createAbsoluteUrl(str_replace(DS, '/', UPLOAD_DIR . "/import_sample/logsheet.xls")))), array('title' => 'Download')); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <?php $this->endWidget(); ?>
    </div>
<?php } ?>
</div>