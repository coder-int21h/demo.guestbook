<div class="user">
    <form method="post" action="index.php?r=user/login">

        <div class="row">
            <div class="row-input">
                <input type="text" name="User[login]" />
            </div>
            <div class="row-name">
                <p>login:</p>
            </div>
        </div>

        <div class="row">
            <div class="row-input">
                <input type="password" name="User[password]" />
            </div>
            <div class="row-name">
                <p>password:</p>
            </div>
        </div>

        <div class="submit-row">
            <input type="submit" class="button" name="submit" value="login" />
        </div>
        <div class="registration-row">
            <?php echo CHtml::link('Registration', '/index.php?r=user/registration'); ?>
        </div>
            

    </form>
</div>