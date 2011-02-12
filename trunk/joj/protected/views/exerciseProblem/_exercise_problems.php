<table>
<tr><th></th><th>Name</th></tr>
<?php
 $index=1;
 //exercise_problems
 foreach($exercise->exercise_problems as $exercise_problem): 
 ?>
<tr>
<td>
<div class='number'>
	<?php echo $index; ?>
</div>
</td>
<td>
	<div class="name">
		<?php echo CHtml::link(nl2br(CHtml::encode($exercise_problem->name)),$exercise_problem->getUrl(null)); ?>
	</div>
</td>

<!-- exercise_problem -->
</tr>
<?php
$index++;
endforeach; ?>
</table>
