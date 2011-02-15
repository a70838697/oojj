<?php
$this->breadcrumbs=array(
	'Submitions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Submition', 'url'=>array('index')),
	array('label'=>'Create Submition', 'url'=>array('create')),
	array('label'=>'View Submition', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Submition', 'url'=>array('admin')),
);
?>

<h1>Update Submition <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'compiler_set'=>$model->problem->compiler_set)); ?>