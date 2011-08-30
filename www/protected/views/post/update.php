<?php if (!Yii::app()->user->isGuest): ?>

    <!-- CONTENT -->
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

<?php endif; ?>



