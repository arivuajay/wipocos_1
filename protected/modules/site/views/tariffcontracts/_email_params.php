<?php
$this->beginWidget(
        'booster.widgets.TbModal', array('id' => 'paramsModal')
);
?>
<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4><?php echo EmailTemplate::model()->getAttributeLabel('Email_Temp_Params'); ?></h4>
</div>
<div class="modal-body">
    <div class="form-group">
        <div style="max-height: 300px; overflow-y: scroll">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th><?php echo EmailTemplate::model()->getAttributeLabel('Email_Temp_Params'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $params = explode(',', $model->email_params);
                    foreach ($params as $key => $param) {
                        ?>
                        <tr>
                            <td><?php echo $param ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>    
    </div>
</div>
<div class="modal-footer">
    <?php
    $this->widget(
            'application.components.MyTbButton', array(
        'label' => 'Close',
        'url' => '#',
        'htmlOptions' => array('data-dismiss' => 'modal'),
            )
    );
    ?>
</div>
<?php $this->endWidget(); ?>