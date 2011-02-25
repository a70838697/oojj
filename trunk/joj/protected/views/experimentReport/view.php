<?php
	$this->breadcrumbs=array(
		'My Courses'=>array('/course/index/mine/1'),
		$model->experiment->course->title=>array('/course/'.$model->experiment->course->id),
		'Experiments'=>array('/course/experiments','id'=>$model->experiment->course->id),	
		$model->experiment->title=>array('/experiment/'.$model->experiment->id),
		"Experiment Report",
	);

$this->menu=array(
	array('label'=>'List ExperimentReport', 'url'=>array('index')),
	array('label'=>'Create ExperimentReport', 'url'=>array('create')),
	array('label'=>'Update ExperimentReport', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ExperimentReport', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ExperimentReport', 'url'=>array('admin')),
);
?>

<h1>View ExperimentReport #<?php echo $model->id; ?></h1>

<?php /*$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'experiment_id',
		'user_id',
		'report',
		'conclusion',
		'created',
		'updated',
	),
));*/ ?>
<?php $this->renderPartial('_report',array('model'=>$model));?>
