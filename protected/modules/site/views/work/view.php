<?php
/* @var $this WorkController */
/* @var $model Work */
$this->title = "View Work: {$model->Work_Org_Title}";
$this->breadcrumbs = array(
    'Works' => array('index'),
    'View ' . 'Work',
);
if ($export == false) {
    ?>
    <div class="user-view col-lg-12">
        <p>
            <?php
            $this->widget(
                    'booster.widgets.TbButton', array(
                'label' => 'Update',
                'url' => array('update', 'id' => $model->Work_Id),
                'buttonType' => 'link',
                'context' => 'primary',
//                    'visible' => UserIdentity::checkAccess(Yii::app()->user->name)
                    )
            );
            echo "&nbsp;&nbsp;";
            $this->widget(
                    'application.components.MyTbButton', array(
                'label' => 'Delete',
                'url' => array('delete', 'id' => $model->Work_Id),
                'buttonType' => 'link',
                'context' => 'danger',
                'htmlOptions' => array('confirm' => 'Are you sure you want to delete this item?'),
                'visible' => UserIdentity::checkAccess(Yii::app()->user->name)
                    )
            );
            echo "&nbsp;&nbsp;";
            $this->widget(
                    'booster.widgets.TbButton', array(
                'label' => 'Download',
                'url' => array('view', 'id' => $model->Work_Id, 'export' => 'PDF'),
                'buttonType' => 'link',
                'context' => 'warning',
//                    'visible' => UserIdentity::checkAccess(Yii::app()->user->name)
                    )
            );
            ?>
        </p>
    </div>
<?php } ?>

<?php if ($export) { ?>
    <h3 class="text-center">Work <?php echo $this->title ?></h3>
<?php } ?>

<div class="row">
    <div class="user-view col-lg-6">
        <h4>Basic Data</h4>
        <?php
        $this->widget('zii.widgets.CDetailView', array(
            'data' => $model,
            'htmlOptions' => array('class' => 'table table-striped table-bordered'),
            'attributes' => array(
                'Work_Org_Title',
                array(
                    'name' => 'Work_Language_Id',
                    'value' => isset($model->workLanguage->Lang_Name) ? $model->workLanguage->Lang_Name : 'Not Set'
                ),
                'Work_Internal_Code',
                'Work_Iswc',
                'Work_Wic_Code',
                array(
                    'name' => 'Work_Type_Id',
                    'value' => isset($model->workType->Type_Name) ? $model->workType->Type_Name : 'Not Set'
                ),
                array(
                    'name' => 'Work_Factor_Id',
                    'value' => isset($model->workFactor->Factor) ? $model->workFactor->Factor : 'Not Set'
                ),
                array(
                    'name' => 'Work_Instrumentation',
                    'value' => $model->Instrumentlist
                ),
                'Work_Duration',
                'Work_Creation',
                'Work_Opus_Number',
                array(
                    'name' => 'Work_Unknown',
                    'type' => 'raw',
                    'value' => $model->Work_Unknown == 'Y' ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>'
                ),
            ),
        ));
        ?>
        <h4>Documentation</h4>
        <?php
        if (!empty($document_model)) {
            $this->widget('zii.widgets.CDetailView', array(
                'data' => $document_model,
                'htmlOptions' => array('class' => 'table table-striped table-bordered'),
                'attributes' => array(
                    array(
                        'name' => 'Work_Doc_Status_Id',
                        'value' => $document_model->workDocStatus->Document_Sts_Name
                    ),
                    array(
                        'name' => 'Work_Doc_Inclusion',
                        'type' => 'raw',
                        'value' => $document_model->Work_Doc_Inclusion == 'Y' ? '<i class="fa fa-circle text-green" title="Yes"></i>' : '<i class="fa fa-circle text-red" title="No"></i>'
                    ),
                    array(
                        'name' => 'Work_Doc_Dispute',
                        'type' => 'raw',
                        'value' => $document_model->Work_Doc_Dispute == 'Y' ? '<i class="fa fa-circle text-green" title="Yes"></i>' : '<i class="fa fa-circle text-red" title="No"></i>'
                    ),
                    array(
                        'name' => 'Work_Doc_Type_Id',
                        'value' => $document_model->workDocType->Doc_Name
                    ),
                    'Work_Doc_Sign_Date',
                    'Work_Doc_File',
                ),
            ));
        } else {
            echo 'No data created';
        }
        ?>
        <h4 class="box-title">Sub Titles</h4>
        <?php
        if (!empty($sub_title_model)) {
            ?>
            <table class="table table-striped table-bordered">
                <tbody>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th><?php echo WorkSubtitle::model()->getAttributeLabel('Work_Subtitle_Name') ?></th>
                        <th><?php echo WorkSubtitle::model()->getAttributeLabel('Work_Subtitle_Type_Id') ?></th>
                        <th><?php echo WorkSubtitle::model()->getAttributeLabel('Work_Subtitle_Language_Id') ?></th>
                        <?php if ($export == false) { ?>
                            <th>Action</th>
                        <?php } ?>
                    </tr>
                    <?php foreach ($sub_title_model as $key => $sub_title) { ?>
                        <tr>
                            <td><?php echo $key + 1 ?>.</td>
                            <td><?php echo $sub_title->Work_Subtitle_Name ?></td>
                            <td><?php echo $sub_title->workSubtitleType->Type_Name ?></td>
                            <td><?php echo $sub_title->workSubtitleLanguage->Lang_Name ?></td>
                            <?php if ($export == false) { ?>
                                <td>
                                    <?php
                                    echo CHtml::link('<i class="fa fa-pencil"></i>', array('/site/work/update/id/' . $sub_title->Work_Id . '/tab/2/edit/' . $sub_title->Work_Subtitle_Id), array('title' => 'Edit'));
                                    echo "&nbsp;&nbsp;";
                                    echo CHtml::link('<i class="fa fa-trash"></i>', array('/site/work/filedelete/id/' . $sub_title->Work_Subtitle_Id), array('title' => 'Delete', 'onclick' => 'return confirm("Are you sure to delete ?")'));
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
        <h4>Biography</h4>
        <?php
        if (!empty($biograph_model)) {
            $this->widget('zii.widgets.CDetailView', array(
                'data' => $biograph_model,
                'htmlOptions' => array('class' => 'table table-striped table-bordered'),
                'attributes' => array(
                    'Work_Biogrph_Annotation',
                ),
            ));
        } else {
            echo 'No data created';
        }
        ?>
        <h4>Biography Uploaded Files</h4>
        <?php
        $uploaded_files = array();
        if(!empty($biograph_model))
            $uploaded_files = WorkBiographUploads::model()->findAll('Work_Biogrph_Id = :bio_id', array(':bio_id' => $biograph_model->Work_Biogrph_Id));
        if (!empty($uploaded_files)) {
            ?>
            <table class="table table-striped table-bordered">
                <tbody>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Uploaded Files</th>
                        <th>Description</th>
                        <th>Created</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach ($uploaded_files as $key => $uploaded_file) { ?>
                        <tr>
                            <?php
                            $file_path = $uploaded_file->getFilePath();
                            $i = $key + 1
                            ?>
                            <td><?php echo $i ?>.</td>
                            <td><a class="<?php echo "popup-link{$i}" ?>" href="<?php echo $file_path ?>"><?php echo "Work Biograph {$i}" ?></a></td>
                            <td><?php echo $uploaded_file->Work_Biogrph_Upl_Description ?></td>
                            <td><?php echo $uploaded_file->Created ?></td>
                            <td>
                                <?php
                                echo CHtml::link('<i class="fa fa-download"></i>', array('/site/work/download', 'df' => Myclass::refencryption($file_path)), array('title' => 'Download'));
                                echo "&nbsp;&nbsp;";
                                echo CHtml::link('<i class="fa fa-trash"></i>', array('/site/work/biofiledelete/', 'id' => $uploaded_file->Work_Biogrph_Upl_Id), array('title' => 'Delete', 'onclick' => 'return confirm("Are you sure to delete ?")'));
                                $this->widget("ext.magnific-popup.EMagnificPopup", array('target' => ".popup-link{$i}"));
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php }else{
            echo 'No data created';
        }
        ?>
    </div>
    <div class="user-view col-lg-6">
        <h4>Publishing</h4>
        <?php
        if (!empty($publishing_model)) {
            $this->widget('zii.widgets.CDetailView', array(
                'data' => $publishing_model,
                'htmlOptions' => array('class' => 'table table-striped table-bordered'),
                'attributes' => array(
                    'Work_Pub_Contact_Start',
                    'Work_Pub_Contact_End',
                    array(
                        'name' => 'Work_Pub_Territories',
                        'value' => $publishing_model->Territorylist
                    ),
                    'Work_Pub_Sign_Date',
                    'Work_Pub_File',
                    'Work_Pub_References',
                ),
            ));
        } else {
            echo 'No data created';
        }
        ?>
        <h4 class="box-title">Publishing Contract Files</h4>
        <?php
        $uploaded_files = array();
        if (!empty($publishing_model))
            $uploaded_files = WorkPublishingUploads::model()->findAll('Work_Pub_Id = :pub_id', array(':pub_id' => $publishing_model->Work_Pub_Id));
        if (!empty($uploaded_files)) {
            ?>
            <table class="table table-striped table-bordered">
                <tbody><tr>
                        <th style="width: 10px">#</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach ($uploaded_files as $key => $uploaded_file) { ?>
                        <tr>
                            <td><?php echo $key + 1 ?>.</td>
                            <td><?php echo $uploaded_file->Work_Pub_Upl_Name == '' ? "Contract {$i}" : $uploaded_file->Work_Pub_Upl_Name ?></td>
                            <td><?php echo $uploaded_file->Work_Pub_Upl_Description ?></td>
                            <td>
                                <?php
                                $file_path = $uploaded_file->getFilePath();
                                echo CHtml::link('<i class="fa fa-download"></i>', array('/site/work/download', 'df' => Myclass::refencryption($file_path)), array('title' => 'Download'));
                                echo "&nbsp;&nbsp;";
                                echo CHtml::link('<i class="fa fa-eye"></i>', $file_path, array('target' => '_blank', 'title' => 'View'));
                                echo "&nbsp;&nbsp;";
                                echo CHtml::link('<i class="fa fa-pencil"></i>', array('/site/work/update', 'id' => $model->Work_Id, 'tab' => '5', 'fileedit' => $uploaded_file->Work_Pub_Upl_Id, 'umodel' => 'pub'), array('title' => 'Edit'));
                                echo "&nbsp;&nbsp;";
                                echo CHtml::link('<i class="fa fa-trash"></i>', array('/site/work/filedelete/', 'id' => $uploaded_file->Work_Pub_Upl_Id, 'delete_model' => 'WorkPublishingUploads', 'rel_model' => 'workPub', 'tab' => 5), array('title' => 'Delete', 'onclick' => 'return confirm("Are you sure to delete ?")'));
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody></table>
            <?php
        } else {
            echo 'No data created';
        }
        ?>

        <h4>Sub Publishing</h4>
        <?php
        if (!empty($sub_publishing_model)) {
            $this->widget('zii.widgets.CDetailView', array(
                'data' => $sub_publishing_model,
                'htmlOptions' => array('class' => 'table table-striped table-bordered'),
                'attributes' => array(
                    'Work_Sub_Contact_Start',
                    'Work_Sub_Contact_End',
                    array(
                        'name' => 'Work_Sub_Territories',
                        'value' => $sub_publishing_model->Territorylist
                    ),
                    array(
                        'name' => 'Work_Sub_Clause',
                        'value' => Myclass::getGroupClause($sub_publishing_model->Work_Sub_Clause)
                    ),
                    'Work_Sub_Sign_Date',
                    'Work_Sub_File',
                    'Work_Sub_References',
                    'Work_Sub_Catelog_Number',
                ),
            ));
        } else {
            echo 'No data created';
        }
        ?>
        <h4 class="box-title">Sub-Publishing Contract Files</h4>
        <?php
        $uploaded_files = array();
        if (!empty($sub_publishing_model))
            $uploaded_files = WorkSubPublishingUploads::model()->findAll('Work_Sub_Id = :sub_id', array(':sub_id' => $sub_publishing_model->Work_Sub_Id));
        if (!empty($uploaded_files)) {
            ?>
            <table class="table table-striped table-bordered">
                <tbody><tr>
                        <th style="width: 10px">#</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach ($uploaded_files as $key => $uploaded_file) { ?>
                        <tr>
                            <td><?php echo $key + 1 ?>.</td>
                            <td><?php echo $uploaded_file->Work_Sub_Upl_Name ?></td>
                            <td><?php echo $uploaded_file->Work_Sub_Upl_Description ?></td>
                            <td>
                                <?php
                                $file_path = $uploaded_file->getFilePath();
                                echo CHtml::link('<i class="fa fa-download"></i>', array('/site/work/download', 'df' => Myclass::refencryption($file_path)), array('title' => 'Download'));
                                echo "&nbsp;&nbsp;";
                                echo CHtml::link('<i class="fa fa-eye"></i>', $file_path, array('target' => '_blank', 'title' => 'View'));
                                echo "&nbsp;&nbsp;";
                                echo CHtml::link('<i class="fa fa-pencil"></i>', array('/site/work/update', 'id' => $model->Work_Id, 'tab' => '6', 'fileedit' => $uploaded_file->Work_Sub_Upl_Id, 'umodel' => 'sub'), array('title' => 'Edit'));
                                echo "&nbsp;&nbsp;";
                                echo CHtml::link('<i class="fa fa-trash"></i>', array('/site/work/filedelete/', 'id' => $uploaded_file->Work_Sub_Upl_Id, 'delete_model' => 'WorkSubPublishingUploads', 'rel_model' => 'workSub', 'tab' => 6), array('title' => 'Delete', 'onclick' => 'return confirm("Are you sure to delete ?")'));
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody></table>
            <?php
        } else {
            echo 'No data created';
        }
        ?>
    </div>

    <div class="user-view col-lg-12">
        <h4>Right Holders</h4>
        <?php
        if (!empty($members)) {
            ?>
            <div class="box-body no-padding">
                <table class="table table-striped table-bordered">
                    <tbody><tr>
                            <th>#</th>
                            <th>Right Holder name</th>
                            <th>Internal Code</th>
                            <th>Role</th>
                            <th>Public Performance &<br /> Broadcasting Share (%)</th>
                            <th>Mechanical Share (%)</th>
                            <th>Organization</th>
                            <?php if ($export == false) { ?>
                                <th>Action</th>
                            <?php } ?>
                        </tr>
                        <?php
                        foreach ($members as $key => $member) {
                            if ($member->workAuthor) {
                                $name = $member->workAuthor->fullname;
                                $url = array('/site/authoraccount/view', 'id' => $member->workAuthor->Auth_Acc_Id);
                                $internal_code = $member->workAuthor->Auth_Internal_Code;
                            } elseif ($member->workPublisher) {
                                $name = $member->workPublisher->Pub_Corporate_Name;
                                $url = array('/site/publisheraccount/view', 'id' => $member->workPublisher->Pub_Acc_Id);
                                $internal_code = $member->workPublisher->Pub_Internal_Code;
                            }
                            ?>
                            <tr>
                                <td><?php echo $key + 1 ?>.</td>
                                <td><?php echo $name; ?></td>
                                <td><?php echo $internal_code; ?></td>
                                <td><?php echo $member->workRightRole->Type_Rights_Name; ?></td>
                                <td align="center"><?php echo $member->Work_Right_Broad_Share; ?></td>
                                <td align="center"><?php echo $member->Work_Right_Mech_Share; ?></td>
                                <td><?php echo $member->workRightMechOrg->Org_Abbrevation; ?></td>
                                <?php if ($export == false) { ?>
                                    <td><?php echo CHtml::link('<i class="glyphicon glyphicon-eye-open"></i>', $url); ?></td>
                                <?php } ?>
                            </tr>
                        <?php } ?>
                    </tbody></table>
            </div>
            <?php
        } else {
            echo 'No data created';
        }
        ?>

    </div>
</div>



