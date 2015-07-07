<?php
/* @var $this SoundcarrierController */
/* @var $model SoundCarrier */

$this->title = 'View SoundCarrier:' . $model->Sound_Car_Title;
$this->breadcrumbs = array(
    'Sound Carriers' => array('index'),
    'View ' . 'SoundCarrier',
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
                'url' => array('update', 'id' => $model->Sound_Car_Id),
                'buttonType' => 'link',
                'context' => 'primary',
                    )
            );
            echo "&nbsp;&nbsp;";
            $this->widget(
                    'application.components.MyTbButton', array(
                'label' => 'Delete',
                'url' => array('delete', 'id' => $model->Sound_Car_Id),
                'buttonType' => 'link',
                'context' => 'danger',
                'htmlOptions' => array('confirm' => 'Are you sure you want to delete this item?'),
                    )
            );
            echo "&nbsp;&nbsp;";
            $this->widget(
                    'application.components.MyTbButton', array(
                'label' => 'Download',
                'url' => array('view', 'id' => $model->Sound_Car_Id, 'export' => 'PDF'),
                'buttonType' => 'link',
                'context' => 'warning',
                    )
            );
            ?>
        </p>
    <?php }
    ?>
    <?php if ($export) { ?>
        <h3 class="text-center">SoundCarrier <?php echo $this->title ?></h3>
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
                'Sound_Car_Title',
                'Sound_Car_Internal_Code',
                array(
                    'name' => 'Sound_Car_Language_Id',
                    'value' => isset($model->soundCarLanguage->Lang_Name) ? $model->soundCarLanguage->Lang_Name : 'Not Set'
                ),
                'Sound_Car_Standardized_Code',
                'Sound_Car_Catelog',
                'Sound_Car_Barcode',
                'Sound_Car_Distributor',
                array(
                    'name' => 'Sound_Car_Language_Id',
                    'value' => isset($model->soundCarLabel->Label_Name) ? $model->soundCarLabel->Label_Name : 'Not Set'
                ),
                array(
                    'name' => 'Sound_Car_Medium',
                    'value' => isset($model->soundCarMedia->Medium_Name) ? $model->soundCarMedia->Medium_Name : 'Not Set'
                ),
                array(
                    'name' => 'Sound_Car_Type_Id',
                    'value' => isset($model->soundCarType->Type_Name) ? $model->soundCarType->Type_Name : 'Not Set'
                ),
                'Sound_Car_Main_Artist',
                'Sound_Car_Producer',
                array(
                    'name' => 'Sound_Car_Product_Country_Id',
                    'value' => isset($model->soundCarProductCountry->Country_Name) ? $model->soundCarProductCountry->Country_Name : 'Not Set'
                ),
                'Sound_Car_Year',
                'Sound_Car_Release_Year',
                array(
                    'name' => 'Sound_Car_Manf_Id',
                    'value' => isset($model->soundCarManf->Manf_Name) ? $model->soundCarManf->Manf_Name : 'Not Set'
                ),
                array(
                    'name' => 'Created_By',
                    'value' => isset($model->createdBy->name) ? $model->createdBy->name : ''
                ),
                array(
                    'name' => 'Updated_By',
                    'value' => isset($model->updatedBy->name) ? $model->updatedBy->name : ''
                ),
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
                        <th><?php echo SoundCarrierSubtitle::model()->getAttributeLabel('Sound_Car_Subtitle_Name') ?></th>
                        <th><?php echo SoundCarrierSubtitle::model()->getAttributeLabel('Sound_Car_Subtitle_Type_Id') ?></th>
                        <th><?php echo SoundCarrierSubtitle::model()->getAttributeLabel('Sound_Car_Subtitle_Language_Id') ?></th>
                        <th>Created By</th>
                        <th>Updated By</th>
                        <?php if ($export == false) { ?>
                            <th>Action</th>
                        <?php } ?>
                    </tr>
                    <?php foreach ($sub_title_model as $key => $sub_title) { ?>
                        <tr>
                            <td><?php echo $key + 1 ?>.</td>
                            <td><?php echo $sub_title->Sound_Car_Subtitle_Name ?></td>
                            <td><?php echo $sub_title->soundCarSubtitleType->Type_Name ?></td>
                            <td><?php echo $sub_title->soundCarSubtitleLanguage->Lang_Name ?></td>
                            <td><?php echo $sub_title->createdBy->name ?></td>
                            <td><?php echo $sub_title->updatedBy->name ?></td>
                            <?php if ($export == false) { ?>
                                <td>
                                    <?php
                                    echo CHtml::link('<i class="fa fa-pencil"></i>', array('/site/recording/update/id/' . $sub_title->Sound_Car_Id . '/tab/2/edit/' . $sub_title->Sound_Car_Subtitle_Id), array('title' => 'Edit'));
                                    echo "&nbsp;&nbsp;";
                                    echo CHtml::link('<i class="fa fa-trash"></i>', array('/site/recording/subtitledelete/id/' . $sub_title->Sound_Car_Subtitle_Id), array('title' => 'Delete', 'onclick' => 'return confirm("Are you sure to delete ?")'));
                                    ?>
                                </td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php
        } else {
            echo 'No Sub Titles created';
        }
        ?>
    </div>

    <div class="user-view col-lg-6">
        <h4>Publication</h4>
        <?php
        if (!empty($publication_model)) {
            $this->widget('zii.widgets.CDetailView', array(
                'data' => $publication_model,
                'htmlOptions' => array('class' => 'table table-striped table-bordered'),
                'attributes' => array(
                    'Sound_Car_Publ_Internal_Code',
                    'Sound_Car_Publ_Year',
                    array(
                        'name' => 'Sound_Car_Publ_Country_Id',
                        'value' => isset($publication_model->soundCarPublCountry->Country_Name) ? $publication_model->soundCarPublCountry->Country_Name : 'Not Set'
                    ),
                    array(
                        'name' => 'Sound_Car_Publ_Prod_Nation_Id',
                        'value' => isset($publication_model->soundCarPublProdNation->Nation_Name) ? $publication_model->soundCarPublProdNation->Nation_Name : 'Not Set'
                    ),
                    array(
                        'name' => 'Sound_Car_Publ_Studio',
                        'value' => isset($publication_model->soundCarPublStudio->Country_Name) ? $publication_model->soundCarPublStudio->Country_Name : 'Not Set'
                    ),
                    array(
                        'name' => 'Created_By',
                        'value' => isset($publication_model->createdBy->name) ? $publication_model->createdBy->name : ''
                    ),
                    array(
                        'name' => 'Updated_By',
                        'value' => isset($publication_model->updatedBy->name) ? $publication_model->updatedBy->name : ''
                    ),
                ),
            ));
        } else {
            echo 'No Publication created';
        }
        ?>
        <h4>Biography</h4>
        <?php
        if (!empty($biograph_model)) {
            $this->widget('zii.widgets.CDetailView', array(
                'data' => $biograph_model,
                'htmlOptions' => array('class' => 'table table-striped table-bordered'),
                'attributes' => array(
                    'Sound_Car_Biogrph_Annotation',
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
            $uploaded_files = SoundCarrierBiographUploads::model()->findAll('Sound_Car_Biogrph_Id = :bio_id', array(':bio_id' => $biograph_model->Sound_Car_Biogrph_Id));
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
                            <td><a class="<?php echo "popup-link{$i}" ?>" href="<?php echo $file_path ?>"><?php echo "SoundCarrier Biograph {$i}" ?></a></td>
                            <td><?php echo $uploaded_file->Sound_Car_Biogrph_Upl_Description ?></td>
                            <td><?php echo $uploaded_file->Created ?></td>
                            <td><?php echo $uploaded_file->createdBy->name ?></td>
                            <td>
                                <?php
                                echo CHtml::link('<i class="fa fa-download"></i>', array('/site/soundcarrier/download', 'df' => Myclass::refencryption($file_path)), array('title' => 'Download'));
                                echo "&nbsp;&nbsp;";
                                echo CHtml::link('<i class="fa fa-trash"></i>', array('/site/soundcarrier/biofiledelete/', 'id' => $uploaded_file->Sound_Car_Biogrph_Upl_Id), array('title' => 'Delete', 'onclick' => 'return confirm("Are you sure to delete ?")'));
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



