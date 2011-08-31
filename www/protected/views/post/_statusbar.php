<div class="login-status">
    
    
    <div class="greeting">
        <p><?php $this->widget('GreetingUser'); ?></p>
    </div>
    
    
    <div class="username">
        <p><?php echo Yii::app()->user->name; ?></p>
    </div>
    
    <?php if(Yii::app()->user->checkAccess('administrator')): ?>

    <div class="admin-mark">

        

        <div class="mini-status">
            <p>administrator</p>
        </div><!-- mini-status (End) -->

    </div><!-- admin-mark (End) -->

    <?php endif; ?>
    
    
    <div class="status">

        <?php echo CHtml::link('exit', '/index.php?r=user/logout'); ?>

        <?php echo CHtml::link('profil', '/index.php?r=user/profil'); ?>

    </div>
</div>