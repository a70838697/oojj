<table>
<tr><th>Sequence</th><th>Name</th><th>Due time</th><th>Deadline</th></tr>
<?php
 foreach($experiments as $experiment): 
 ?>
<tr>
<td>
<?php echo CHtml::encode($experiment->sequence);?>
</td>
<td>
	<div class="title">
		<?php echo CHtml::link(nl2br(CHtml::encode($experiment->title)),$experiment->getUrl(null)); ?>
	</div>
</td>
<td>
	<div class="due_time">
		<?php echo date_format(date_create($experiment->due_time),'Y年m月d日  H:i'); ?>
	</div>
</td>
<td>
	<div class="deadline">
		<?php echo $experiment->begin."~".$experiment->end; ?>
	</div>
</td>
<!-- experiment -->
</tr>
<?php
endforeach; ?>
</table>
