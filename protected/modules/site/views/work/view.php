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
    <div class="user-view col-lg-6">
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
    </div>
    <div class="user-view col-lg-6">
        <?php
        $members = WorkRightholder::model()->findAll('Work_Id = :int_code', array(':int_code' => $model->Work_Id));
        if (!empty($members)) {
            ?>
            <h4 class="box-title">Assigned Members</h4>
            <div class="box-body no-padding">
                <table class="table table-condensed">
                    <tbody><tr>
                            <th>#</th>
                            <th>Member Name</th>
                            <th>Internal Code</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        foreach ($members as $key => $member) {
                            if ($member->workAuthor) {
                                $name = $member->workAuthor->Auth_Sur_Name;
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
</div>



