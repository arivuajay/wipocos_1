<?php
/* @var $this InternalcodegenerateController */
/* @var $model InternalcodeGenerate */

$this->title = 'View Code Definition Master: ' . $model->getVirtualinternalcode();
$this->breadcrumbs = array(
    'Code Definition Master' => array('index'),
    'View ' . 'Code Definition',
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
                'url' => array('update', 'id' => $model->Gen_Inter_Code_Id),
                'buttonType' => 'link',
                'context' => 'primary',
                    )
            );
//            echo "&nbsp;&nbsp;";
//            $this->widget(
//                    'application.components.MyTbButton', array(
//                'label' => 'Delete',
//                'url' => array('delete', 'id' => $model->Gen_Inter_Code_Id),
//                'buttonType' => 'link',
//                'context' => 'danger',
//                'htmlOptions' => array('confirm' => 'Are you sure you want to delete this item?'),
//                    )
//            );
            echo "&nbsp;&nbsp;";
            $this->widget(
                    'application.components.MyTbButton', array(
                'label' => 'Download',
                'url' => array('view', 'id' => $model->Gen_Inter_Code_Id, 'export' => 'PDF'),
                'buttonType' => 'link',
                'context' => 'warning',
                    )
            );
            ?>
        </p>
    <?php }
    ?>
    <?php if ($export) { ?>
        <h3 class="text-center">Code Definition Master: <?php echo $model->getFullcode() ?></h3>
        <?php
    }
    ?>
    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $model,
        'htmlOptions' => array('class' => 'table table-striped table-bordered'),
        'attributes' => array(
//            'Gen_Inter_Code_Id',
//            'Gen_User_Type',
            array(
                'name' => 'Gen_User_Type',
                'value' => $model->getUsertype()
            ),
            array(
                'name' => 'Gen_Soc_Id',
                'value' => $model->soceity->Society_Code
            ),
            'Gen_Prefix',
            array(
                'name' => 'Internal Code',
                'value' => $model->getVirtualinternalcode()
            ),
//            'Gen_Suffix',
//            'Gen_Code_Pad',
        ),
    ));
    ?>
</div>



