<div class="form-group foundation">
    <div class="box-header">
        <h3 class="box-title">Class</h3>
    </div>
    <div class="box-body">
        <div class="col-lg-5">
            <div class="form-group">
                <?php echo CHtml::textField('class_title', $period_model->subclass->fullname, array('class' => 'form-control', 'disabled' => true)) ?>
            </div>

            <div class="form-group">
                <?php echo CHtml::label('Year', 'year', array('class' => '')); ?>
                <?php echo CHtml::textField('year', $period_model->Period_Year, array('class' => 'form-control', 'disabled' => true)) ?>
            </div>

        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-5">
            <div class="form-group">
                <?php echo CHtml::label('Period', '', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10">
                    <div class="form-group">
                        <div class="col-lg-6">
                            <?php echo CHtml::textField('from', $period_model->Period_From, array('class' => 'form-control', 'disabled' => true)) ?>
                        </div>
                        <div class="col-lg-6">
                            <?php echo CHtml::textField('to', $period_model->Period_To, array('class' => 'form-control', 'disabled' => true)) ?>
                        </div>
                    </div>

                </div>
            </div>
            <div class="form-group">
                <?php echo CHtml::label('Account', 'account', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-5">
                    <?php echo CHtml::textField('account', $period_model->setting->Setting_Date, array('class' => 'form-control', 'disabled' => true)) ?>
                </div>
            </div>
        </div>
    </div>
</div>