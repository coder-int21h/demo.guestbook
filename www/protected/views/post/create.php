<?php $form = $this->beginWidget('CActiveForm'); ?>

<?php // echo $form->labelEx($model, 'text'); ?>
<?php echo CHtml::activeTextArea($post, 'content', array('rows' => 10, 'cols' => 64)); ?>
<?php echo $form->error($post, 'content'); ?>

<br>
<?php echo CHtml::submitButton('Create', array('id' => 'submit')); ?>

<?php $this->endWidget(); ?>
