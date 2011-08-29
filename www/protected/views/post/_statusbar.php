<div class="login-status">
    
    
    <div class="greeting">
        <p><?php $this->widget('GreetingUser'); ?></p>
    </div>
    
    
    <div class="username">
        <p><?php echo Yii::app()->user->name; ?></p>
    </div>
    
    
    <div class="status">

        <?php echo CHtml::link('exit', '/index.php?r=user/logout'); ?>

        <?php echo CHtml::link('profil', '/index.php?r=user/profil'); ?>

    </div>
</div>