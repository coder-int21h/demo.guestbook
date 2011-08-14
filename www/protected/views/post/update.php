<?php echo CHtml::beginForm(); ?>
<?php echo CHtml::activeTextArea($model, 'content', array('rows' => 10, 'cols' => 70)); ?>
<?php// echo $form->error($comment, 'text'); ?>
<br>
<?php echo CHtml::submitButton('Save', array('id' => 'submit')); ?>
<?php echo CHtml::endForm(); ?>