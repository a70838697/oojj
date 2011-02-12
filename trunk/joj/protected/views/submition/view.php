<?php
$this->breadcrumbs=array(
	'Submitions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Submition', 'url'=>array('index')),
	array('label'=>'Create Submition', 'url'=>array('create')),
	array('label'=>'Update Submition', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Submition', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Submition', 'url'=>array('admin')),
);
?>

<h1>View Submition #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'problem_id',
		'exercise_id',
		'source',
		'result',
		'used_time',
		'used_memory',
		'status',
		'compiler_id',
		'created',
		'modified',
	),
)); ?>
