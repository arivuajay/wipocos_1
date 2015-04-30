<?php
$baseUrl = Yii::app()->baseUrl;
$themeUrl = Yii::app()->theme->baseUrl;
?>

<?php
$this->title = 'Forgot Password';
$this->breadcrumbs = array(
    $this->title
);
?>
<div class="form-box" id="login-box">

    <div class="header"><?php echo CHtml::encode($this->title) ?></div>
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'user-form',
        'enableAjaxValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'htmlOptions' => array('class' => 'form-signin cmxform', 'role' => 'form')
    ));
    ?>
    <div class="body bg-gray">
        <?php if (isset($this->flashMessages)): ?>
            <?php foreach ($this->flashMessages as $key => $message) { ?>
                <div class="alert alert-<?php echo $key; ?> fade in">
                    <button type="button" class="close close-sm" data-dismiss="alert">
                        <i class="fa fa-times"></i>
                    </button>
                    <?php echo $message; ?>
                </div>
            <?php } ?>
        <?php endif ?>
        <p>Please fill out the following field to get password:</p>
        <div class="form-group">
            <?php echo $form->labelEx($model, 'email') ?>
            <?php echo $form->textField($model, 'email', array('autofocus', 'class' => 'form-control', 'placeholder' => 'Email Address')); ?>
            <?php echo $form->error($model, 'email') ?>
        </div>
    </div>
    <div class="footer">
        <?php echo CHtml::submitButton('Get Password', array('class' => 'btn bg-olive btn-block', 'name' => 'forgot')) ?>
        <p><?php echo CHtml::link('Log in', array('/site/default/login')) ?></p>
    </div>
    <?php $this->endWidget(); ?>
</div>
