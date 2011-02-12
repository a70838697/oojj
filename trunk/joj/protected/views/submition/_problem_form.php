<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'submition-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'source'); ?>
		<?php echo $form->textArea($model,'source',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'source'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'compiler_id'); ?>
		<?php echo $form->textField($model,'compiler_id'); ?>
		<?php echo $form->error($model,'compiler_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->