<?php
$this->breadcrumbs=array(
	'Exercise Problems'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ExerciseProblem', 'url'=>array('index')),
	array('label'=>'Create ExerciseProblem', 'url'=>array('create')),
	array('label'=>'Update ExerciseProblem', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ExerciseProblem', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ExerciseProblem', 'url'=>array('admin')),
);
?>

<h1>View ExerciseProblem #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'exercise_id',
		'name',
		'problem_id',
		'description',
		'created',
	),
)); ?>
