<?php
/* @var $this WorkController */
/* @var $model Work */

$this->title = 'View #' . $model->Work_Id;
$this->breadcrumbs = array(
    'Works' => array('index'),
    'View ' . 'Work',
);
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
        ?>
    </p>
</div>
<div class="row">
    <div class="user-view col-lg-7">
        <h4>Basic Data</h4>
        <?php
        $this->widget('zii.widgets.CDetailView', array(
            'data' => $model,
            'htmlOptions' => array('class' => 'table table-striped table-bordered'),
            'attributes' => array(
                'Work_Id',
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
            ),
        ));
        ?>
        <?php
        if (!empty($sub_title_model)) {
            ?>
            <h4 class="box-title">Sub Titles</h4>
            <table class="table table-condensed">
                <tbody>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th><?php echo WorkSubtitle::model()->getAttributeLabel('Work_Subtitle_Name') ?></th>
                        <th><?php echo WorkSubtitle::model()->getAttributeLabel('Work_Subtitle_Type_Id') ?></th>
                        <th><?php echo WorkSubtitle::model()->getAttributeLabel('Work_Subtitle_Language_Id') ?></th>
                        <th>Action</th>
                    </tr>
                    <?php foreach ($sub_title_model as $key => $sub_title) { ?>
                        <tr>
                            <td><?php echo $key + 1 ?>.</td>
                            <td><?php echo $sub_title->Work_Subtitle_Name ?></td>
                            <td><?php echo $sub_title->workSubtitleType->Type_Name ?></td>
                            <td><?php echo $sub_title->workSubtitleLanguage->Lang_Name ?></td>
                            <td>
                                <?php
                                echo CHtml::link('<i class="fa fa-pencil"></i>', array('/site/work/update/id/' . $sub_title->Work_Id . '/tab/2/edit/' . $sub_title->Work_Subtitle_Id), array('title' => 'Edit'));
                                echo "&nbsp;&nbsp;";
                                echo CHtml::link('<i class="fa fa-trash"></i>', array('/site/work/filedelete/id/' . $sub_title->Work_Subtitle_Id), array('title' => 'Delete', 'onclick' => 'return confirm("Are you sure to delete ?")'));
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php
        } else {
            echo 'No Subtitle Assigned';
        }

        if (!empty($members)) {
            ?>
            <h4 class="box-title">Assigned Right Holders</h4>
            <div class="box-body no-padding">
                <table class="table table-condensed">
                    <tbody><tr>
                            <th>#</th>
                            <th>Right Holder name</th>
                            <th>Internal Code</th>
                            <th>Broadcasting Share (%)</th>
                            <th>Mechanical Share (%)</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        foreach ($members as $key => $member) {
                            if ($member->workAuthor) {
                                $name = $member->workAuthor->Auth_First_Name . ' ' . $member->workAuthor->Auth_Sur_Name;
                                $url = array('/site/authoraccount/view', 'id' => $member->workAuthor->Auth_Acc_Id);
                            } elseif ($member->workPublisher) {
                                $name = $member->workPublisher->Pub_Corporate_Name;
                                $url = array('/site/publisheraccount/view', 'id' => $member->workPublisher->Pub_Acc_Id);
                            }
                            ?>
                            <tr>
                                <td><?php echo $key + 1 ?>.</td>
                                <td><?php echo $name; ?></td>
                                <td><?php echo $member->Work_Member_Internal_Code; ?></td>
                                <td><?php echo $member->Work_Right_Broad_Share; ?></td>
                                <td><?php echo $member->Work_Right_Mech_Share; ?></td>
                                <td><?php echo CHtml::link('<i class="glyphicon glyphicon-eye-open"></i>', $url); ?></td>
                            </tr>
                        <?php } ?>
                    </tbody></table>
            </div>
            <?php
        } else {
            echo 'No works assigned';
        }
        ?>
    </div>
    <div class="user-view col-lg-5">
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
                        'value' => $document_model->Work_Doc_Inclusion == 'Y' ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>'
                    ),
                    array(
                        'name' => 'Work_Doc_Dispute',
                        'type' => 'raw',
                        'value' => $document_model->Work_Doc_Dispute == 'Y' ? '<i class="fa fa-circle text-green"></i>' : '<i class="fa fa-circle text-red"></i>'
                    ),
                    array(
                        'name' => 'Work_Doc_Type_Id',
                        'value' => $document_model->workDocType->Doc_Type_Name
                    ),
                    'Work_Doc_Sign_Date',
                    'Work_Doc_File',
                ),
            ));
        } else {
            echo 'No Biogrpahy Assigned';
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
            echo 'No Biogrpahy Assigned';
        }
        ?>
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
            echo 'No Publishing Created';
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
            echo 'No Sub Publishing Created';
        }
        ?>
    </div>
</div>



