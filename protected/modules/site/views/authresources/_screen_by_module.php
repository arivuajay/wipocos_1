<?php
        $form = $this->beginWidget('CActiveForm', array(
            'action' => array('/site/authresources/getscreensbymodule'),
            'htmlOptions' => array('role' => 'form')
        ));
        ?>

<div class="row">
    <div class="col-lg-12 col-md-12" id="resources-block">
        <table class="table table-striped table-bordered">
            <thead class="bg-green">
            <td align="center" width="40%"><strong>Screen Name</strong></td>
            <td align="center" width="15%"><strong>Add</strong></td>
            <td align="center" width="15%"><strong>View</strong></td>
            <td align="center" width="15%"><strong>Update</strong></td>
            <td align="center" width="15%"><strong>Delete</strong></td>
            </thead>
            <tbody>
                <?php
                echo CHtml::activeHiddenField($model, 'type', array('value' => $type));
                if(empty($exist_resources)){
                    foreach ($masters as $master) {
                        echo CHtml::activeHiddenField($model, 'Master_Module_ID', array('value' => $master->Module_ID, 'name' => 'AuthResources[' . $master->Master_Screen_ID . '][Master_Module_ID]'));
                        if($type == 'role'){
                            echo CHtml::activeHiddenField($model, 'Master_Role_ID', array('value' => $id, 'name' => 'AuthResources[' . $master->Master_Screen_ID . '][Master_Role_ID]'));
                        }else if($type == 'user'){
                            echo CHtml::activeHiddenField($model, 'Master_User_ID', array('value' => $id, 'name' => 'AuthResources[' . $master->Master_Screen_ID . '][Master_User_ID]'));
                        }
                        echo CHtml::activeHiddenField($model, 'Master_Screen_ID', array('value' => $master->Master_Screen_ID, 'name' => 'AuthResources[' . $master->Master_Screen_ID . '][Master_Screen_ID]'));
                        echo '<tr class="text-center">';
                        echo '<td>' . $master->Description . '</td>';
                        
                        echo '<td>' . $form->checkBox($model, 'Master_Task_ADD',array('class'=>'form-control', 'name' => 'AuthResources[' . $master->Master_Screen_ID . '][Master_Task_ADD]')) . '</td>';
                        echo '<td>' . $form->checkBox($model, 'Master_Task_SEE',array('class'=>'form-control', 'name' => 'AuthResources[' . $master->Master_Screen_ID . '][Master_Task_SEE]')) . '</td>';
                        echo '<td>' . $form->checkBox($model, 'Master_Task_UPT',array('class'=>'form-control', 'name' => 'AuthResources[' . $master->Master_Screen_ID . '][Master_Task_UPT]')) . '</td>';
                        echo '<td>' . $form->checkBox($model, 'Master_Task_DEL',array('class'=>'form-control', 'name' => 'AuthResources[' . $master->Master_Screen_ID . '][Master_Task_DEL]')) . '</td>';
                        echo '</tr>';
                    }
                }else{
                    foreach ($exist_resources as $master) {
                        echo CHtml::activeHiddenField($master, 'Master_Resource_ID', array('value' => $master->Master_Resource_ID, 'name' => 'AuthResources[' . $master->Master_Screen_ID . '][Master_Resource_ID]'));
                        echo '<tr class="text-center">';
                        echo '<td>' . $master->masterScreen->Description. '</td>';
                        echo '<td>' . $form->checkBox($master, 'Master_Task_ADD',array('class'=>'form-control', 'name' => 'AuthResources[' . $master->Master_Screen_ID . '][Master_Task_ADD]')) . '</td>';
                        echo '<td>' . $form->checkBox($master, 'Master_Task_SEE',array('class'=>'form-control', 'name' => 'AuthResources[' . $master->Master_Screen_ID . '][Master_Task_SEE]')) . '</td>';
                        echo '<td>' . $form->checkBox($master, 'Master_Task_UPT',array('class'=>'form-control', 'name' => 'AuthResources[' . $master->Master_Screen_ID . '][Master_Task_UPT]')) . '</td>';
                        echo '<td>' . $form->checkBox($master, 'Master_Task_DEL',array('class'=>'form-control', 'name' => 'AuthResources[' . $master->Master_Screen_ID . '][Master_Task_DEL]')) . '</td>';
                        echo '</tr>';
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<div class="form-group">
<?php echo CHtml::submitButton(empty($exist_resources) ? 'Create' : 'Update', array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')); ?>
</div>

<?php $this->endWidget(); ?>
