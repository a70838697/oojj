<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'problem-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>512)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'time_limit'); ?>
		<?php echo $form->textField($model,'time_limit'); ?>
		<?php echo $form->error($model,'time_limit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'memory_limit'); ?>
		<?php echo $form->textField($model,'memory_limit'); ?>
		<?php echo $form->error($model,'memory_limit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'submission_no'); ?>
		<?php echo $form->textField($model,'submission_no',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'submission_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'accepted_no'); ?>
		<?php echo $form->textField($model,'accepted_no',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'accepted_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'source'); ?>
		<?php echo $form->textField($model,'source',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'source'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'input'); ?>
		<?php echo $form->textArea($model,'input',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'input'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'output'); ?>
		<?php echo $form->textArea($model,'output',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'output'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'input_sample'); ?>
		<?php echo $form->textArea($model,'input_sample',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'input_sample'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'output_sample'); ?>
		<?php echo $form->textArea($model,'output_sample',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'output_sample'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hint'); ?>
		<?php echo $form->textArea($model,'hint',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'hint'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'flag'); ?>
		<?php echo $form->textField($model,'flag'); ?>
		<?php echo $form->error($model,'flag'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'visibility'); ?>
		<?php echo $form->textField($model,'visibility'); ?>
		<?php echo $form->error($model,'visibility'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created'); ?>
		<?php echo $form->textField($model,'created'); ?>
		<?php echo $form->error($model,'created'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'modified'); ?>
		<?php echo $form->textField($model,'modified'); ?>
		<?php echo $form->error($model,'modified'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->