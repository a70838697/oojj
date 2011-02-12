<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time_limit')); ?>:</b>
	<?php echo CHtml::encode($data->time_limit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('memory_limit')); ?>:</b>
	<?php echo CHtml::encode($data->memory_limit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('submission_no')); ?>:</b>
	<?php echo CHtml::encode($data->submission_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('accepted_no')); ?>:</b>
	<?php echo CHtml::encode($data->accepted_no); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('source')); ?>:</b>
	<?php echo CHtml::encode($data->source); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('input')); ?>:</b>
	<?php echo CHtml::encode($data->input); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('output')); ?>:</b>
	<?php echo CHtml::encode($data->output); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('input_sample')); ?>:</b>
	<?php echo CHtml::encode($data->input_sample); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('output_sample')); ?>:</b>
	<?php echo CHtml::encode($data->output_sample); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hint')); ?>:</b>
	<?php echo CHtml::encode($data->hint); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('flag')); ?>:</b>
	<?php echo CHtml::encode($data->flag); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('visibility')); ?>:</b>
	<?php echo CHtml::encode($data->visibility); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified')); ?>:</b>
	<?php echo CHtml::encode($data->modified); ?>
	<br />

	*/ ?>

</div>