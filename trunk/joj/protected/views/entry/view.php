<?php
$this->breadcrumbs=array(
	'Entries'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Entry', 'url'=>array('index')),
	array('label'=>'Create Entry', 'url'=>array('create')),
	array('label'=>'Update Entry', 'url'=>array('update', 'id'=>$model->title)),
//	array('label'=>'Delete Entry', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Entry', 'url'=>array('admin')),
);
?>

<h1>View Entry <?php echo CHtml::encode($model->title); ?></h1>
<?php $this->renderPartial('_view', array(
	'data'=>$model,
)); ?>
<?php /*$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'content',
		'access',
		'user_id',
		'ip',
		'revision',
		'create_time',
		'update_time',
		'accessed_time',
	),
))*/; ?>
