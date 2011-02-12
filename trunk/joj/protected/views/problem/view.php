<?php
$this->breadcrumbs=array(
	'Problems'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Problem', 'url'=>array('index')),
	array('label'=>'Create Problem', 'url'=>array('create')),
	array('label'=>'Update Problem', 'url'=>array('update', 'id'=>$model->id)),
//	array('label'=>'Delete Problem', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Problem', 'url'=>array('admin')),
);
?>

<h1>View Problem #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'title',
		'time_limit',
		'memory_limit',
		'submission_no',
		'accepted_no',
		'description',
		'source',
		'input',
		'output',
		'input_sample',
		'output_sample',
		'hint',
		'flag',
		'visibility',
		'created',
		'modified',
	),
)); ?>

<?php if(!(Yii::app()->user->isGuest)){?>
<div id="submition">
	<h3>Submit a solution</h3>

	<?php if(Yii::app()->user->hasFlash('submitionSubmitted')): ?>
		<div class="flash-success">
			<?php echo Yii::app()->user->getFlash('submitionSubmitted'); ?>
		</div>
	<?php else: ?>
		<?php $this->renderPartial('/submition/_problem_form',array(
			'model'=>$submition,
		)); ?>
	<?php endif; ?>

</div><!-- submition -->
<?php } ?>
