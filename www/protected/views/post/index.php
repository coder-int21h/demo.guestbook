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

    <div class="pagination">
        <?php
        $this->widget('CLinkPager', array(
            'pages' => $pages,
            'maxButtonCount' => 5, // максимальное вол-ко кнопок <- 1..2..3..4..5 ->
            'header' => '', // заголовок над листалкой
            'prevPageLabel' => '<<',
            'nextPageLabel' => '>>',
        ));
        ?>
    </div><!-- pagination (End) -->
        
</div><!-- content (End) -->