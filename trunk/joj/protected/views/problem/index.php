<?php
$this->breadcrumbs=array(
	'Problems',
);

$this->menu=array(
	array('label'=>'Create Problem', 'url'=>array('create')),
	array('label'=>'Manage Problem', 'url'=>array('admin')),
);
?>

<h1>Problems</h1>

<?php
echo UCHtml::cssFile('pager.css');
	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'problem-grid',
	'dataProvider'=>$dataProvider,
	'ajaxUpdate'=>false,
	'pager'=>array('class'=>'CLinkPager','maxButtonCount'=>15,),
	'template'=>'{summary}{pager}{items}{pager}',
	'columns'=>array(
		array(
			'name'=>'solved',
			'visible'=>!Yii::app()->user->isGuest,
			'type'=>'raw',
			'value'=>'$data->mySubmitedCount==0?"":UCHtml::image(($data->myAcceptedCount>0?"done.gif":"tried.gif"))',
		),
		'id',
		array(
			'name'=>'title',
			'type'=>'raw',
			'value'=>'CHtml::link(CHtml::encode($data->title),array("problem/view","id"=>$data->id))',
		),
		array(
			'header'=>'Ratio(Accepted/Total)',
			'type'=>'raw',
			'value'=>'($data->submitedCount==0)?"0%(0/0)":"".round($data->acceptedCount*100.0/$data->submitedCount,1)."%(".$data->acceptedCount."/".$data->submitedCount.")"',
		),
		/*
		'accepted_no',
		'description',
		'source',
		'input',
		'output',
		'input_sample',
		'output_sample',
		'hint',
		'flag',
		'visibility',
		'created',
		'modified',
		*/
	),
));
?>
