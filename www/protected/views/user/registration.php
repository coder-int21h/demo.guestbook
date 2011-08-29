<!-- title -->
<div id="title">
    <div class="logo">
        <h1><?php echo CHtml::encode(Yii::app()->name); ?></h1>
    </div>
</div><!-- title (End) -->
<!-- End title -->


<!-- content -->
<div id="content">
    <div class="registration-form">
        <h2>Registration</h2>

        <div class="mini-decor">
        </div><!-- mini-decor (End) -->

        <?php echo CHtml::form(); ?>

        <!-- ERRORS BLOCK -->
        <?php if (!CHtml::errorSummary($user)): ?>

            <div class="rules-reg">
                <p>Please pass the registration procedure.</p>
                <p>All fields are required!</p>
            </div>

        <?php else: ?>

            <div class="error-reg">
                <?php echo CHtml::errorSummary($user); ?>
            </div><!-- error-reg -->

        <?php endif; ?>
        <!-- ERRORS BLOCK (End) -->


        <!-- Поле логина -->
        <div class="form-field">
            <div class="form-name">
                <p>username: </p>
            </div>
            <div class="form-inp">
                <?php echo CHtml::activeTextField($user, 'login'); ?>
            </div>
        </div><!-- form-field (End) -->


        <!-- Поле пароля -->
        <div class="form-field">
            <div class="form-name">
                <p>password: </p>
            </div>
            <div class="form-inp">
                <?php echo CHtml::activePasswordField($user, 'password'); ?>
            </div>
        </div><!-- form-field (End)-->


        <!-- Повторить пароль -->
        <div class="form-field">
            <div class="form-name">
                <p>repeat password: </p>
            </div>
            <div class="form-inp">
                <?php echo CHtml::activePasswordField($user, 'password2'); ?>
            </div>
        </div><!-- form-field (End) -->


        <!-- Поле для капчи -->
        <div class="form-captcha">
            <p>Protection from automatic registration</p>
            <?php $this->widget('CCaptcha'); ?>
            <?php echo CHtml::activeTextField($user, 'verifyCode'); ?>
        </div><!-- form-captcha (End) -->


        <!-- submitButton -->
        <div class="form-submit">
            <?php echo CHtml::submitButton('Registration', array('id' => "submit")); ?>
        </div><!-- form-submit (End) -->

        <!-- Закрываем форму !-->
        <?php echo CHtml::endForm(); ?>

    </div><!-- registration-form (End) -->

</div> <!-- content (End) -->

<!-- End content -->