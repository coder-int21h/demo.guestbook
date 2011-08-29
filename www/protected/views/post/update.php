<?php if (!Yii::app()->user->isGuest): ?>

    <div id="title">


        <div class="user-blok">
            <?php if (Yii::app()->user->isGuest): ?>
                <!-- Если пользователь гость то ему доступна форма авторизации -->
                <?php $this->renderPartial('_login'); ?>
            <?php else : ?>
                <!-- Если залогинен то видит свой status-bar -->
                <?php $this->renderPartial('_statusbar') ?>
            <?php endif; ?>
        </div><!-- user-blok (End) -->


        <div class="logo">
            <h1><?php echo CHtml::encode(Yii::app()->name); ?></h1>
        </div><!-- logo (End) -->

    </div><!-- title (End) -->


    <div class="decor">
    </div><!-- decor (End) -->


    <div id="content">

        <div class="new-post">

            <div class="create-post">
                <h2>Edit Post</h2>
            </div><!-- create-post (End) -->

            <div class="mini-decor"></div><!-- mini-decor (End) -->

            <div class="create-form">

                <?php $form = $this->beginWidget('CActiveForm'); ?>

                <?php if (!$form->error($post, 'content')): ?>
                    <div class="create-rules">
                        <p>(Max 1000 characters)</p>
                    </div><!-- create-rules (End) -->
                <?php else: ?>
                    <div class="create-err">
                        <?php echo $form->error($post, 'content'); ?>
                    </div><!-- create-rules (End) -->
                <?php endif; ?>


                <?php echo CHtml::activeTextArea($post, 'content', array('rows' => 10, 'cols' => 90)); ?>


                <br>
                <?php echo CHtml::submitButton('Create', array('id' => 'submit')); ?>

                <?php $this->endWidget(); ?>
            </div><!-- create-form (End) -->

        </div><!-- new-post (END) -->

    </div><!-- content (End) -->
    
    <div class="decor">
    </div><!-- decor (End) -->

    <div id="footer">
    </div><!-- footer (End) -->
    
<?php endif; ?>



