<div class="adminwork">

    <div class="delete-post">
        <a href="index.php?r=post/delete&amp;id=<?php echo $post->id; ?>">Delete</a> 
    </div>

    <div class="edit-post">
        <a href="index.php?r=post/update&amp;id=<?php echo $post->id; ?>">Edit</a>
    </div>

    <!-- Если коментария к посту еще нет то можно создать -->
    <?php if (!isset($comment->content)): ?>

        <div class="create-comment">
            <a href="index.php?r=comment/create&amp;id=<?php echo $post->id; ?>">Create Comment</a>

        </div><!-- create-comment (End) -->

    <?php else: ?>

        <div class="create-comment"> </div><!-- empty-block (End) -->

    <?php endif; ?>
</div><!-- admin-work (End)-->