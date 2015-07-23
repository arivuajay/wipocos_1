<?php
/* @var $this CustomeruserController */
/* @var $model CustomerUser */

$this->title = 'View User & Customer:' . $model->User_Cust_Name;
$this->breadcrumbs = array(
    'Users & Customers' => array('index'),
    'View ' . 'CustomerUser',
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
                'url' => array('update', 'id' => $model->User_Cust_Id),
                'buttonType' => 'link',
                'context' => 'primary',
                    )
            );
            echo "&nbsp;&nbsp;";
            $this->widget(
                    'application.components.MyTbButton', array(
                'label' => 'Delete',
                'url' => array('delete', 'id' => $model->User_Cust_Id),
                'buttonType' => 'link',
                'context' => 'danger',
                'htmlOptions' => array('confirm' => 'Are you sure you want to delete this item?'),
                    )
            );
            echo "&nbsp;&nbsp;";
            $this->widget(
                    'application.components.MyTbButton', array(
                'label' => 'Download',
                'url' => array('view', 'id' => $model->User_Cust_Id, 'export' => 'PDF'),
                'buttonType' => 'link',
                'context' => 'warning',
                    )
            );
            ?>
        </p>
    <?php }
    ?>
    <?php if ($export) { ?>
        <h3 class="text-center">User & Customer <?php echo $this->title ?></h3>
        <?php
    }
    ?>
    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $model,
        'htmlOptions' => array('class' => 'table table-striped table-bordered'),
        'attributes' => array(
//            'User_Cust_Id',
//            'User_Cust_GUID',
            array(
                'name' => 'User_Cust_Place_Id',
                'value' => $model->userCustPlace->Place_Name,
            ),
            'User_Cust_Code',
            'User_Cust_Name',
            'User_Cust_Address',
            'User_Cust_Email',
            'User_Cust_Telephone',
            'User_Cust_Website',
            'User_Cust_Fax',
            array(
                'name' => 'Created_By',
                'value' => isset($model->createdBy->name) ? $model->createdBy->name : ''
            ),
            array(
                'name' => 'Created Date',
                'value' => $model->Created_Date
            ),
            array(
                'name' => 'Updated_By',
                'value' => isset($model->updatedBy->name) ? $model->updatedBy->name : ''
            ),
            array(
                'name' => 'Updated Date',
                'value' => $model->Rowversion
            ),
        ),
    ));
    ?>
</div>



