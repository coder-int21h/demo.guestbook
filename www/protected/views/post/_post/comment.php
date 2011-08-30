<!-- КОММЕНТАРИЙ -->
<div class="comment">

    <div class="admin-data">

        <div class="admin-date">
            <p><?php echo $comment->created; ?></p>
        </div>

        <div class="admin-title">
            <p>Administrator</p>
        </div>

    </div><!-- admin-data (End) -->


    <!-- Ecли администратор то может редактировать/удалять комментарий -->
    <?php if (Yii::app()->user->checkAccess('administrator')): ?>

        <div class="comment-work">

            <div class="delete-comment">
                <a href="index.php?r=comment/delete&amp;post_id=<?php echo $post->id; ?>">Delete</a>
            </div>

            <div class="edit-comment">
                <a href="index.php?r=comment/update&amp;post_id=<?php echo $post->id; ?>">Edit</a>
            </div>

        </div><!--comment-work (End) -->

    <?php endif; ?>


    <!-- Само содержимое комментария -->        
    <div class="comment-content">
        <p><?php echo $comment->content; ?></p>
    </div>

</div><!-- comment (End) -->

