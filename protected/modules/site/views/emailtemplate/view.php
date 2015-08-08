<?php
/* @var $this EmailtemplateController */
/* @var $model EmailTemplate */

$this->title = 'View EmailTemplate:' . $model->Email_Temp_Id;
$this->breadcrumbs = array(
    'Email Templates' => array('index'),
    'View ' . 'EmailTemplate',
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
                'url' => array('update', 'id' => $model->Email_Temp_Id),
                'buttonType' => 'link',
                'context' => 'primary',
                    )
            );
            echo "&nbsp;&nbsp;";
//            $this->widget(
//                    'application.components.MyTbButton', array(
//                'label' => 'Delete',
//                'url' => array('delete', 'id' => $model->Email_Temp_Id),
//                'buttonType' => 'link',
//                'context' => 'danger',
//                'htmlOptions' => array('confirm' => 'Are you sure you want to delete this item?'),
//                    )
//            );
//            echo "&nbsp;&nbsp;";
            $this->widget(
                    'application.components.MyTbButton', array(
                'label' => 'Download',
                'url' => array('view', 'id' => $model->Email_Temp_Id, 'export' => 'PDF'),
                'buttonType' => 'link',
                'context' => 'warning',
                    )
            );
            ?>
        </p>
    <?php }
    ?>
    <?php if ($export) { ?>
        <h3 class="text-center">EmailTemplate <?php echo $this->title ?></h3>
        <?php
    }
    ?>
    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $model,
        'htmlOptions' => array('class' => 'table table-striped table-bordered'),
        'attributes' => array(
//            'Email_Temp_Id',
            'Email_Temp_Name',
            'Email_Temp_From',
            'Email_Temp_ReplyTo',
            'Email_Temp_Subject',
            'Email_Temp_Content',
            'Email_Temp_Params',
        ),
    ));
    ?>
</div>



