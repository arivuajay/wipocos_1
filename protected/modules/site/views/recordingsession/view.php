<?php
/* @var $this RecordingsessionController */
/* @var $model RecordingSession */

$this->title = 'View RecordingSession:' . $model->Rcd_Ses_Title;
$this->breadcrumbs = array(
    'Recording Sessions' => array('index'),
    'View ' . 'RecordingSession',
);
?>
<div class="user-view">
    <?php if ($export == false) {
        ?>
        <p>
            <?php
            $this->widget(
                    'application.components.MyTbButton', array(
                'label' => 'Update',
                'url' => array('update', 'id' => $model->Rcd_Ses_Id),
                'buttonType' => 'link',
                'context' => 'primary',
                    )
            );
            echo "&nbsp;&nbsp;";
            $this->widget(
                    'application.components.MyTbButton', array(
                'label' => 'Delete',
                'url' => array('delete', 'id' => $model->Rcd_Ses_Id),
                'buttonType' => 'link',
                'context' => 'danger',
                'htmlOptions' => array('confirm' => 'Are you sure you want to delete this item?'),
                    )
            );
            echo "&nbsp;&nbsp;";
            $this->widget(
                    'application.components.MyTbButton', array(
                'label' => 'Download',
                'url' => array('view', 'id' => $model->Rcd_Ses_Id, 'export' => 'PDF'),
                'buttonType' => 'link',
                'context' => 'warning',
                    )
            );
            ?>
        </p>
    <?php }
    ?>
    <?php if ($export) { ?>
        <h3 class="text-center">RecordingSession <?php echo $this->title ?></h3>
        <?php
    }
    ?>
</div>

<div class="row">
    <div class="user-view col-lg-6">
        <h4>Basic Data</h4>
        <?php
        $this->widget('zii.widgets.CDetailView', array(
            'data' => $model,
            'htmlOptions' => array('class' => 'table table-striped table-bordered'),
            'attributes' => array(
                'Rcd_Ses_Title',
                'Rcd_Ses_Internal_Code',
                array(
                    'name' => 'Rcd_Ses_Language_Id',
                    'value' => isset($model->rcdSesLanguage->Lang_Name) ? $model->rcdSesLanguage->Lang_Name : 'Not Set'
                ),
                'Rcd_Ses_Orchestra',
                'Rcd_Ses_Ref_Medium',
                'Rcd_Ses_Hours',
                'Rcd_Ses_Record_Date',
                array(
                    'name' => 'Rcd_Ses_Studio_Id',
                    'value' => isset($model->rcdSesStudio->Studio_Name) ? $model->rcdSesStudio->Studio_Name : 'Not Set'
                ),
                array(
                    'name' => 'Rcd_Ses_Producer',
                    'value' => isset($model->recordingSessionProducer->Pro_Corporate_Name) ? $model->recordingSessionProducer->Pro_Corporate_Name : 'Not Set'
                ),
                array(
                    'name' => 'Rcd_Ses_Main_Artist',
                    'value' => isset($model->recordingSessionMainArtist->fullname) ? $model->recordingSessionMainArtist->fullname : 'Not Set'
                ),
                array(
                    'name' => 'Rcd_Ses_Medium_Id',
                    'value' => isset($model->rcdSesMedium->Medium_Name) ? $model->rcdSesMedium->Medium_Name : 'Not Set'
                ),
                array(
                    'name' => 'Rcd_Ses_Type_Id',
                    'value' => isset($model->rcdSesType->Type_Name) ? $model->rcdSesType->Type_Name : 'Not Set'
                ),
                array(
                    'name' => 'Rcd_Ses_Destination_Id',
                    'value' => isset($model->rcdSesDestination->Dist_Name) ? $model->rcdSesDestination->Dist_Name : 'Not Set'
                ),
                array(
                    'name' => 'Rcd_Ses_Country_Id',
                    'value' => isset($model->rcdSesCountry->Country_Name) ? $model->rcdSesCountry->Country_Name : 'Not Set'
                ),
                array(
                    'name' => 'Rcd_Ses_Factor_Id',
                    'value' => isset($model->rcdSesFactor->Factor) ? $model->rcdSesFactor->Factor : 'Not Set'
                ),
                'Rcd_Ses_Release_Year',
            ),
        ));
        ?>
        <h4 class="box-title">Sub Titles</h4>
        <?php
        if (!empty($sub_title_model)) {
            ?>
            <table class="table table-striped table-bordered">
                <tbody>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th><?php echo RecordingSessionSubtitle::model()->getAttributeLabel('Rcd_Ses_Subtitle_Name') ?></th>
                        <th><?php echo RecordingSessionSubtitle::model()->getAttributeLabel('Rcd_Ses_Subtitle_Type_Id') ?></th>
                        <th><?php echo RecordingSessionSubtitle::model()->getAttributeLabel('Rcd_Ses_Subtitle_Language_Id') ?></th>
                        <th>Created By</th>
                        <th>Updated By</th>
                        <?php if ($export == false) { ?>
                            <th>Action</th>
                        <?php } ?>
                    </tr>
                    <?php foreach ($sub_title_model as $key => $sub_title) { ?>
                        <tr>
                            <td><?php echo $key + 1 ?>.</td>
                            <td><?php echo $sub_title->Rcd_Ses_Subtitle_Name ?></td>
                            <td><?php echo $sub_title->rcdSesSubtitleType->Type_Name ?></td>
                            <td><?php echo $sub_title->rcdSesSubtitleLanguage->Lang_Name ?></td>
                            <td><?php echo $sub_title->createdBy->name ?></td>
                            <td><?php echo $sub_title->updatedBy->name ?></td>
                            <?php if ($export == false) { ?>
                                <td>
                                    <?php
                                    echo MyHtml::link('<i class="fa fa-pencil"></i>', array('/site/recordingsession/update/id/' . $sub_title->Rcd_Ses_Id . '/tab/2/edit/' . $sub_title->Rcd_Ses_Subtitle_Id), array('title' => 'Edit'));
                                    echo "&nbsp;&nbsp;";
                                    echo MyHtml::link('<i class="fa fa-trash"></i>', array('/site/recordingsession/filedelete/id/' . $sub_title->Rcd_Ses_Subtitle_Id), array('title' => 'Delete', 'onclick' => 'return confirm("Are you sure to delete ?")'));
                                    ?>
                                </td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php
        } else {
            echo 'No data created';
        }
        ?>
    </div>
    <div class="user-view col-lg-6">
        <h4>Documentation</h4>
        <?php
        if (!empty($document_model)) {
            $this->widget('zii.widgets.CDetailView', array(
                'data' => $document_model,
                'htmlOptions' => array('class' => 'table table-striped table-bordered'),
                'attributes' => array(
                    array(
                        'name' => 'Rcd_Ses_Doc_Status_Id',
                        'value' => $document_model->rcdSesDocStatus->Document_Sts_Name
                    ),
                    array(
                        'name' => 'Rcd_Ses_Doc_Type_Id',
                        'value' => $document_model->rcdSesDocType->Doc_Name
                    ),
                    'Rcd_Ses_Doc_Sign_Date',
                    'Rcd_Ses_Doc_File',
                    array(
                        'name' => 'Created_By',
                        'value' => isset($document_model->createdBy->name) ? $document_model->createdBy->name : ''
                    ),
                    array(
                        'name' => 'Updated_By',
                        'value' => isset($document_model->updatedBy->name) ? $document_model->updatedBy->name : ''
                    ),
                ),
            ));
        } else {
            echo 'No data created';
        }
        ?>
        <h4>Biography</h4>
        <?php
        if (!empty($biograph_model)) {
            $this->widget('zii.widgets.CDetailView', array(
                'data' => $biograph_model,
                'htmlOptions' => array('class' => 'table table-striped table-bordered'),
                'attributes' => array(
                    'Rcd_Ses_Biogrph_Annotation',
                    array(
                        'name' => 'Created_By',
                        'value' => isset($biograph_model->createdBy->name) ? $biograph_model->createdBy->name : ''
                    ),
                    array(
                        'name' => 'Updated_By',
                        'value' => isset($biograph_model->updatedBy->name) ? $biograph_model->updatedBy->name : ''
                    ),
                ),
            ));
        } else {
            echo 'No data created';
        }
        ?>
        <h4>Biography Uploaded Files</h4>
        <?php
        $uploaded_files = array();
        if (!empty($biograph_model))
            $uploaded_files = RecordingSessionBiographUploads::model()->findAll('Rcd_Ses_Biogrph_Id = :bio_id', array(':bio_id' => $biograph_model->Rcd_Ses_Biogrph_Id));
        if (!empty($uploaded_files)) {
            ?>
            <table class="table table-striped table-bordered">
                <tbody>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Uploaded Files</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Created By</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach ($uploaded_files as $key => $uploaded_file) { ?>
                        <tr>
                            <?php
                            $file_path = $uploaded_file->getFilePath();
                            $i = $key + 1
                            ?>
                            <td><?php echo $i ?>.</td>
                            <td><a class="<?php echo "popup-link{$i}" ?>" href="<?php echo $file_path ?>"><?php echo "RecordingSession Biograph {$i}" ?></a></td>
                            <td><?php echo $uploaded_file->Rcd_Ses_Biogrph_Upl_Description ?></td>
                            <td><?php echo $uploaded_file->Created ?></td>
                            <td><?php echo $uploaded_file->createdBy->name ?></td>
                            <td>
                                <?php
                                echo CHtml::link('<i class="fa fa-download"></i>', array('/site/recordingsession/download', 'df' => Myclass::refencryption($file_path)), array('title' => 'Download'));
                                echo "&nbsp;&nbsp;";
                                echo MyHtml::link('<i class="fa fa-trash"></i>', array('/site/recordingsession/biofiledelete/', 'id' => $uploaded_file->Rcd_Ses_Biogrph_Upl_Id), array('title' => 'Delete', 'onclick' => 'return confirm("Are you sure to delete ?")'));
                                $this->widget("ext.magnific-popup.EMagnificPopup", array('target' => ".popup-link{$i}"));
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php
        } else {
            echo 'No data created';
        }
        ?>

    </div>
</div>




