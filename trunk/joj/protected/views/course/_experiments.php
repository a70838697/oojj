<table>
<tr><th></th><th>Name</th></tr>
<?php
 $index=1;
 foreach($experiments as $experiment): 
 ?>
<tr>
<td>
<div class="experiment" id="c<?php echo $experiment->id; ?>">
	<?php echo CHtml::link("{$index}", $experiment->getUrl($course), array(
		'class'=>'cid',
		'title'=>'Permalink to this experiment',
	)); ?>
</div>
</td>
<td>
	<div class="title">
		<?php echo CHtml::link(nl2br(CHtml::encode($experiment->title)),$experiment->getUrl(null)); ?>
	</div>
</td>
<!-- 
	<div class="author">
		<?php //echo $experiment->authorLink; ?> says:
	</div>

	<div class="time">
		<?php //echo date('F j, Y \a\t h:i a',$experiment->create_time); ?>
	</div>
 -->
<!-- experiment -->
</tr>
<?php
$index++;
endforeach; ?>
</table>
