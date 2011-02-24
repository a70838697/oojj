<?php
$this->breadcrumbs=array(
	'Experiment Reports'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ExperimentReport', 'url'=>array('index')),
	array('label'=>'Create ExperimentReport', 'url'=>array('create')),
	array('label'=>'View ExperimentReport', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ExperimentReport', 'url'=>array('admin')),
);
?>

<h1>Update ExperimentReport <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>