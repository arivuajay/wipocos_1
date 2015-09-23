<?php
$this->beginWidget(
        'booster.widgets.TbModal', array('id' => 'templateModal')
);
?>
<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Email Template</h4>
</div>
<div class="modal-body">
    <div class="form-group">
        <div class="col-sm-12">
            <?php echo CHtml::label(EmailTemplate::model()->getAttributeLabel('Email_Temp_Name'), '') ?>
            <?php echo $form->textField($model, 'email_name', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
            <div id="email_name_err" class="errorMessage err"></div>
            <?php // echo $form->error($model, 'Email_Temp_Name'); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-12">
            <?php echo CHtml::label(EmailTemplate::model()->getAttributeLabel('Email_Temp_From'), '') ?>
            <?php echo $form->textField($model, 'email_from', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
            <div id="email_from_err" class="errorMessage err"></div>
            <?php // echo $form->error($model, 'Email_Temp_From'); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-12">
            <?php echo CHtml::label(EmailTemplate::model()->getAttributeLabel('Email_Temp_Subject'), '') ?>
            <?php echo $form->textField($model, 'email_subject', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
            <div id="email_subject_err" class="errorMessage err"></div>
            <?php // echo $form->error($model, 'Email_Temp_Subject'); ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-12">
            <?php echo CHtml::label(EmailTemplate::model()->getAttributeLabel('Email_Temp_Content'), '') ?>
            <?php
            $this->widget('application.extensions.cleditor.ECLEditor', array(
                'model' => $model,
                'attribute' => 'email_template', //Model attribute name. Nome do atributo do modelo.
                'options' => array(
                    'width' => 565,
                    'height' => 200,
                    'useCSS' => true,
                ),
            ));
            ?>
            <div id="email_template_err" class="errorMessage err"></div>
            <?php // echo $form->error($email_model, 'Email_Temp_Content'); ?>
        </div>
    </div>
    <br />
    <div class="form-group">
        <div class="col-sm-12">
            <?php
            $this->widget(
                    'application.components.MyTbButton', array(
                'label' => 'view params',
                'context' => 'default btn-sm',
                'htmlOptions' => array(
                    'data-toggle' => 'modal',
                    'data-target' => '#paramsModal',
                ),
                    )
            );
            ?>
        </div>
    </div>

</div>
<div class="modal-footer">
    <div class="col-sm-3">
        <?php
        $this->widget(
                'application.components.MyTbButton', array(
            'context' => 'primary',
            'label' => 'Set Template',
            'url' => '#',
            'htmlOptions' => array(
                'onclick' => '{
                valid = true;
                $(".err").html("");
                if($("#TariffContracts_email_name").val() == ""){
                    $("#email_name_err").html("Template Name cannot be blank");
                    valid = false;
                }
                if($("#TariffContracts_email_from").val() == ""){
                    $("#email_from_err").html("From Email cannot be blank");
                    valid = false;
                }
                if($("#TariffContracts_email_subject").val() == ""){
                    $("#email_subject_err").html("Subject cannot be blank");
                    valid = false;
                }
                if($("#TariffContracts_email_template").val() == ""){
                    $("#email_template_err").html("Content cannot be blank");
                    valid = false;
                }
                if(valid)
                    $("#dismiss").trigger("click");
                }',
            ),
                )
        );
        $this->widget(
                'application.components.MyTbButton', array(
            'url' => '#',
            'htmlOptions' => array(
                'id' => 'dismiss',
                'data-dismiss' => 'modal',
                'class' => 'hide'
            ),
                )
        );
        ?>
    </div>
    <div class="col-sm-9">
        <div class="help-block text-left">
            Note: If you didn't modify, then Default Template will be created. 
        </div>
    </div>
</div>
<?php $this->endWidget(); ?>

            <?php echo $this->renderPartial('_email_params', array('model' => $model)); ?>
