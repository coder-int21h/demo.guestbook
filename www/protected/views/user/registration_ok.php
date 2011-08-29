<div id="title">
    <div class="user-blok">
        <?php if (Yii::app()->user->isGuest): ?>

            <!-- Если пользователь гость то ему доступна форма авторизации -->
            <?php $this->renderPartial('/post/_login'); ?>
        <?php else : ?>

            <!-- Если залогинен то видит свой status-bar -->
            <?php $this->renderPartial('/post/_statusbar') ?>

        <?php endif; ?>
    </div><!-- user-blok (End) -->

    <div class="logo">
        <h1><?php echo CHtml::encode(Yii::app()->name); ?></h1>
    </div><!-- logo (End) -->

</div><!-- title (End) -->

<div id ="decor">
</div><!-- decor (End) -->




<div id ="content">

    <div class="registration-form">
        
        <h2>Registration</h2>

        
        <div class="mini-decor">
        </div><!-- mini-decor (End) -->

        
        <div class="rules-reg">
            <p>You successfully registered! You can log in using your username/password.</p>
        </div><!-- rules-reg (End) -->
        
        
        <div class="home-reg">
            <a href="index.php?r=post/index">Home</a>
        </div><!-- home-reg (End) -->

        
    </div><!-- registration-form (End) -->
</div><!-- content (End) -->
