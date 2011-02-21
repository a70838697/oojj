<div class="view">
<table>
	<tr>
	<td style="width:40px;" align="right"><b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b></td>
	<td><?php echo CHtml::link(CHtml::encode($data->name),array('view', 'id'=>$data->id)); ?></td>
	<td style="width:108px"><b><?php echo CHtml::encode($data->getAttributeLabel('sequence')); ?>:</b></td>
	<td><?php echo CHtml::encode($data->sequence); ?></td>
	</tr>
	<tr>
	<td><b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b></td>
	<td><?php echo CHtml::link(CHtml::encode($data->user->username),array('/user/user/view', 'id'=>$data->user->id)); ?></td>
	<td><b><?php echo CHtml::encode($data->getAttributeLabel('location')); ?>:</b></td>
	<td><?php echo CHtml::encode($data->location); ?></td>
	</tr>
	<tr>
	<td><b><?php echo CHtml::encode($data->getAttributeLabel('begin')); ?>~<?php echo CHtml::encode($data->getAttributeLabel('end')); ?>:</b></td>
	<td><?php echo CHtml::encode($data->begin); ?>-<?php echo CHtml::encode($data->begin); ?></td>
	<td><b><?php echo CHtml::encode($data->getAttributeLabel('due_time')); ?>:</b></td>
	<td><?php echo CHtml::encode($data->due_time); ?></td>
	</tr>
	<tr>
	<td colspan=4>
	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b><br/>
	<div><?php echo CHtml::encode($data->description); ?></div>
	</td>
	</tr>
</table>

</div>