<?php
$this->breadcrumbs=array(
	'Experiments'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Experiment', 'url'=>array('index')),
	array('label'=>'Create Experiment', 'url'=>array('create')),
	array('label'=>'View Experiment', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Experiment', 'url'=>array('admin')),
);
?>

<h1>Update Experiment <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>