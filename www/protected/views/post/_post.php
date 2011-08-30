<!-- Сразу проверяю наличие комментария к посту -->
<?php $comment = PostController::commentSearch($post->id); ?>

<!-- Заголовок текущего поста автор/дата создания -->
<div class="post">

    <div class="author-data">
        <div class="date">
            <p><?php echo $post->created; ?></p>
        </div>
        <div class="author">
            <p><?php echo $post->author->login; ?></p>
        </div>
    </div><!-- author-data (End) -->


    <!-- Если пользователь администратор то ему также доступны операции над любым постом -->
    <?php if (Yii::app()->user->checkAccess('administrator')): ?>
        <?php
        $this->renderPartial('_post/adminwork', array(
            'post' => $post,
            'comment' => $comment,
        ));
        ?>
    <?php endif; ?>


    <!-- Если не администратор доступна панель user -->
    <?php if (!Yii::app()->user->checkAccess('administrator')): ?>
        <?php
        $this->renderPartial('_post/userwork', array(
            'post' => $post,
            'comment' => $comment,
        ));
        ?>
    <?php endif; ?>


    <!--  Само содержимое Post  -->
    <div class="post-content">
        <p><?php echo $post->content; ?></p>
    </div><!-- post-content (End) -->



    <!-- Если есть к текущему посту комментарий то выводится блок комментария -->
    <?php if (isset($comment->content)): ?>
        <?php
        $this->renderPartial('_post/comment', array(
            'post' => $post,
            'comment' => $comment,
        ));
        ?>
    <?php endif; ?>

</div>
