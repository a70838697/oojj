<?php
$this->breadcrumbs=array(
	'Submitions',
);

$this->menu=array(
	array('label'=>'Create Submition', 'url'=>array('create')),
	array('label'=>'Manage Submition', 'url'=>array('admin')),
);
?>

<h1>Submitions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
