<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'experiment-report-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'report'); ?>
		<?php echo $this->renderPartial('/inc/_xheditor',array('model'=>$model,'field'=>'report','rows'=>20),true); ?>
		<?php echo $form->error($model,'report'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'conclusion'); ?>
		<?php echo $this->renderPartial('/inc/_xheditor',array('model'=>$model,'field'=>'conclusion','rows'=>6),true); ?>
		<?php echo $form->error($model,'conclusion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->