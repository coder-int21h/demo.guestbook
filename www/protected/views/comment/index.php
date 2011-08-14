<?php echo CHtml::beginForm(); ?>
<?php echo CHtml::activeTextArea($comment, 'content', array('rows' => 10, 'cols' => 70)); ?>
<?php // echo $form->error($comment, 'text');  ?>
<br>
<?php echo CHtml::submitButton('Create', array('id' => 'submit')); ?>
<?php echo CHtml::endForm(); ?>