<!-- content -->
<div id="content">

    <div class="new-post">

        <div class="create-post">
            <h2>Create Comment</h2>
        </div><!-- create-post (End) -->

        <div class="mini-decor">
        </div><!-- mini-decor (End) -->

        <div class="create-form">

            <?php $form = $this->beginWidget('CActiveForm'); ?>

            <?php if (!$form->error($comment, 'content')): ?>
                <div class="create-rules">
                    <p>(Max 1000 characters)</p>
                </div><!-- create-rules (End) -->

            <?php else: ?>
                <div class="create-err">
                    <?php echo $form->error($comment, 'content'); ?>
                </div><!-- create-rules (End) -->

            <?php endif; ?>

            <?php echo CHtml::activeTextArea($comment, 'content', array('rows' => 10, 'cols' => 90)); ?>

            <p>
                <?php echo CHtml::submitButton('Create', array('id' => 'submit')); ?>
            </p>
                <?php $this->endWidget(); ?>

        </div><!-- create-form (End) -->

    </div><!-- new-post (END) -->

</div><!-- content (End) -->