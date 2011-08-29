<?php $comment = PostController::commentSearch($post->id); ?>

<div class="post">
    <div class="author-data">
        <div class="date">
            <p><?php echo $post->created; ?></p>
        </div>
        <div class="author">
            <p><?php echo $post->author->login; ?></p>
        </div>
    </div>




    <?php $a = 0; ?><!-- ВРЕМЕННО -->
    <?php if ($a !== 0): ?><!-- ВРЕМЕННО -->
        <div class="adminwork">
            <div class="delete-post">
                <a href="index.php?r=post/delete&amp;id=<?php echo $post->id; ?>">Delete</a> 
            </div>
            <div class="edit-post">
                <a href="index.php?r=post/update&amp;id=<?php echo $post->id; ?>">Edit</a>
            </div>

            <!-- Если коментария к посту еще нет то можно создать -->
            <?php if ($comment == NULL): ?>

                <div class="create-comment">
                    <a href="index.php?r=comment/create&amp;id=<?php echo $post->id; ?>">Create Comment</a>

                </div><!-- create-comment (End) -->

            <?php else: ?>

                <div class="create-comment"> </div><!-- empty-block (End) -->

            <?php endif; ?>


        </div><!-- admin-work (End)-->

    <?php endif; ?><!-- ВРЕМЕННО -->



<!-- Если id user и id автора записи совпадает то есть возможность edit/delete -->
    <?php if (Yii::app()->user->id == $post->user_id): ?>

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
            
            
    <!--  Само тело Post  -->
    <div class="post-content">
        <p><?php echo $post->content; ?></p>
    </div><!-- post-content (End) -->

    
    <!-- Блок комментария  -->
    <?php if (isset($comment->content)): ?>
    
    
        <div class="comment">

            <div class="admin-data">
                <div class="admin-date">
                    <p>26 Jul 2011 21:55</p>
                </div>
                <div class="admin-title">
                    <p>Administrator</p>
                </div>
            </div>


            <?php if ($a !== 0): ?><!-- ВРЕМЕННО ОТКЛЮЧЕН АДМИН -->

                <div class="comment-work">

                    <div class="delete-comment">
                        <a href="index.php?r=comment/delete&amp;post_id=<?php echo $post->id; ?>">Delete</a>
                    </div>

                    <div class="edit-comment">
                        <a href="index.php?r=comment/update&amp;post_id=<?php echo $post->id; ?>">Edit</a>
                    </div>

                </div><!--comment-work (End) -->

            <?php endif; ?><!-- ВРЕМЕННО ОТКЛЮЧЕН АДМИН -->


            <!-- ���� ���� ����������� -->        
            <div class="comment-content">
                <p><?php echo $comment->content; ?></p>
            </div>

        </div><!-- comment (End) -->
    <?php endif; ?>
</div>
<!-- -------------------------------------------------------------------- -->
<!-- ------------------------- ����� ����� post ------------------------- -->
<!-- -------------------------------------------------------------------- -->