<?php
/* @var $this MastercountryController */
/* @var $model MasterCountry */

$this->title = 'View #' . $model->Master_Country_Id;
$this->breadcrumbs = array(
    'Master Countries' => array('index'),
    'View ' . 'MasterCountry',
);
?>

<div class="user-view">
    <p>
        <?php
        echo Yii::app()->controller->id ;
        echo Yii::app()->controller->action->id;
        $this->widget(
                'booster.widgets.TbButton', array(
                    'label' => 'Update',
                    'url' => array('update', 'id' => $model->Master_Country_Id),
                    'buttonType' => 'link',
                    'context' => 'primary',
//                    'visible' => UserIdentity::checkAccess(Yii::app()->user->name)
                )
        );
        echo "&nbsp;&nbsp;";
        $this->widget(
                'application.components.MyTbButton', array(
                    'label' => 'Delete',
                    'url' => array('/psdfsdf/delete', 'id' => $model->Master_Country_Id),
                    'buttonType' => 'link',
                    'context' => 'danger',
                    'htmlOptions' => array('confirm' => 'Are you sure you want to delete this item?'),
                    'visible' => UserIdentity::checkAccess(Yii::app()->user->name)
                )
        );
        ?>
    </p>
    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $model,
        'htmlOptions' => array('class' => 'table table-striped table-bordered'),
        'attributes' => array(
            'Master_Country_Id',
            'Country_Name',
            'Country_Two_Code',
            'Country_Three_Code',
            array(
                'label' => MasterCountry::model()->getAttributeLabel('Active'),
                'type' => 'raw',
                'value' => ($model->Active == 1) ? '<i class="fa fa-circle text-green" title="Active"></i>' : '<i title="In-Active" class="fa fa-circle text-red"></i>'
            ),
        ),
    ));
    ?>
</div>



