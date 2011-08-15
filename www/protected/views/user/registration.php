<?php echo CHtml::form(); ?>

<div class="error-reg">
    <?php echo CHtml::errorSummary($user); ?>
</div>
<div class="field-reg">
    <div class="login-reg">
        <span>username: </span>
        <?php // echo CHtml::activeLabel($form, 'login'); ?>
        <?php echo CHtml::activeTextField($user, 'login'); ?>
    </div>

    <div class="pass-reg">
        <span>password: </span>
        <?php // echo CHtml::activeLabel($form, 'password'); ?>
        <?php echo CHtml::activePasswordField($user, 'password'); ?>
    </div>

    <div class="pass2-reg">
        <span>repeat password: </span>
        <?php // echo CHtml::activeLabel($form, 'password2'); ?>
        <?php echo CHtml::activePasswordField($user, 'password2'); ?>
    </div>

    <div class="captcha">
        <?php $this->widget('CCaptcha'); ?>
        <?php echo CHtml::activeTextField($user, 'verifyCode'); ?>
    </div>


    <div class="submit-reg">
        <?php echo CHtml::submitButton('Registration', array('id' => "submit")); ?>
    </div>
</div>

<!-- Закрываем форму !-->
<?php echo CHtml::endForm(); ?>