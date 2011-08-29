
<div id="title">


    <div class="user-blok">

        <?php if (Yii::app()->user->isGuest): ?>

            <!-- Если пользователь гость то ему доступна форма авторизации -->
            <?php $this->renderPartial('_login'); ?>

        <?php else : ?>

            <!-- Если залогинен то видит свой status-bar -->
            <?php $this->renderPartial('_statusbar') ?>

        <?php endif; ?>

    </div><!-- user-blok (End) -->


    <div class="logo">
        <h1><?php echo CHtml::encode(Yii::app()->name); ?></h1>
    </div><!-- logo (End) -->


</div><!-- title (End) -->


<div class ="decor">
</div><!-- decor (End) -->


<div id ="content">

    <!-- Если пользователь не гость, то ему доступен функционал создать новый пост -->
    <?php if (!Yii::app()->user->isGuest): ?>

        <div class="create-new-post">
            <a href="index.php?r=post/create">Create New Post</a>
        </div><!-- create-new-post (End) -->

    <?php endif; ?>

    
    <?php
    if (!empty($post))
        foreach ($post as $key => $val)
        {
            $this->renderPartial('_post', array(
                'post' => $val,
            ));
        }
    ?>

</div><!-- content (End) -->


<div class ="decor">
</div><!-- decor (End) -->


<div id="footer">
</div><!-- footer (End) -->