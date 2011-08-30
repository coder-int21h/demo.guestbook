<!-- Если id user и id автора записи совпадает то есть возможность edit/delete -->
<?php if (Yii::app()->user->id == $post->user_id): ?>

    <!-- Если у поста имеется комментарий -->
    <?php if (!isset($comment->content)): ?>


        <div class="userwork">

            <div class="delete-post">
                <a href="index.php?r=post/delete&amp;id=<?php echo $post->id; ?>">Delete</a> 
            </div><!-- delete-post (End) -->

            <div class="edit-post">
                <a href="index.php?r=post/update&amp;id=<?php echo $post->id; ?>">Edit</a>
            </div><!-- edit-post (End) -->

        </div><!-- userwork (End) -->   

    <?php endif; ?>

<?php endif; ?>
