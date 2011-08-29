<div class="post">
    <div class="author">
        <p><?php ?></p>
    </div>
    <div class="date">
        <p><?php ?></p>
    </div>

    <!--
    Служебная строка для администратора позволяющая создавать комментарий
    для поста. А также редактировать и удалять пост.
    -->
    <div class="adminwork">
        <div class="create-comment">
            <p>Create comment</p>
        </div>
        <div class="edit-post">
            <p>Edit</p>
        </div>
        <div class="delete-post">
            <p>Delete</p>
        </div>
    </div><!-- admin-work (End) -->

    <!--
    Если пользователь является автором и пост еще не закоментирован
    то доступна служебная панель позволяющая редактировать или удалять пост
    -->
    <div class="user-work">
        <div class="edit-post">
            <p>Edit</p>
        </div>
        <div class="delete-post">
            <p>Delete</p>
        </div>
    </div><!-- user-work (End) -->

    <!----------------------- Само тело поста. -------------------------->
    <div class="post-content">
        <p><?php echo $post->content; ?></p>
    </div><!-- post-content (End) -->

    <!----- Если имеется комментарий к посту вывожу блок комментария ----->
    <div class="comment">
        <div class="comment-work">
            <div class="edit-comment">
                <p>Edit</p>
            </div>
            <div class="delete-comment">
                <p>Delete</p>
            </div>
        </div>
        <!-- Само тело комментария -->        
        <div class="comment-content">
            <p><?php ?></p>
        </div>

    </div><!-- comment (End) -->
</div>
<!------------------------------------------------------------------------>
<!--------------------------- Конец блока post --------------------------->
<!------------------------------------------------------------------------>