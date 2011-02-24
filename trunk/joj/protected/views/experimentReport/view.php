<?php
$this->breadcrumbs=array(
	'Experiment Reports'=>array('index'),
	$model->id,
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

<?php $this->widget('zii.widgets.CDetailView', array(
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
)); ?>
