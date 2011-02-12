<?php
$this->breadcrumbs=array(
	'Courses'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Course', 'url'=>array('index')),
	array('label'=>'Create Course', 'url'=>array('create')),
	array('label'=>'Update Course', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Course', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Course', 'url'=>array('admin')),
);
?>

<h1>View Course #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
		'location',
		'environment',
		'due_time',
		'user_id',
		'begin',
		'end',
		'status',
		'created',
	),
)); ?>

<?php if(!(Yii::app()->user->isGuest)){?>
<div id="experiments">
	<?php if($model->experimentCount>=1): ?>
		<h3>
			<?php echo $model->experimentCount>1 ? $model->experimentCount . ' experiments' : 'One experiment'; ?>
		</h3>

		<?php $this->renderPartial('_experiments',array(
			'course'=>$model,
			'experiments'=>$model->experiments,
		)); ?>
	<?php endif; ?>
	<h3>Create an experiment</h3>

	<?php if(Yii::app()->user->hasFlash('experimentSubmitted')): ?>
		<div class="flash-success">
			<?php echo Yii::app()->user->getFlash('experimentSubmitted'); ?>
		</div>
	<?php else: ?>
		<?php $this->renderPartial('/experiment/_inline_form',array(
			'model'=>$experiment,
		)); ?>
	<?php endif; ?>

</div><!-- experiment -->
<?php } ?>