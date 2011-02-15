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
        array(
            'name'=>'problem.title',
        	'label'=>'Problem',
            'type'=>'raw',
            'value'=>CHtml::link(CHtml::encode($model->problem->title),
                                 array('problem/view','id'=>$model->problem_id)),
        ),
        array(
			'name'=>'user_id',
            'type'=>'raw',
            'value'=>CHtml::link(CHtml::encode($model->user->username),
                                 array('user/user/view','id'=>$model->user_id)),
        ),      
		array(
            'name'=>'status',
            'type'=>'raw',
            'value'=> ULookup::$JUDGE_RESULT_MESSAGES[$model->status],
        ),
		array(
            'name'=>'used_time',
            'type'=>'raw',
            'value'=>($model->used_time).'ms',
			'visible'=>$model->status==ULookup::JUDGE_RESULT_ACCEPTED,
        ),
        array(
            'name'=>'used_memory',
            'type'=>'raw',
            'value'=>($model->used_memory>>10).'K',
			'visible'=>$model->status==ULookup::JUDGE_RESULT_ACCEPTED,
        ),
        array(
			'name'=>'result',
            'type'=>'raw',
            'value'=>'<pre>'.CHtml::encode($model->result).'</pre>',
			'visible'=>strlen($model->result)>0,
        ),
		'created',
        array(
            'name'=>'modified',
        	'visible'=>($model->created!=$model->modified),
        ),        
        array(
            'name'=>'compiler_id',
            'type'=>'raw',
            'value'=>CHtml::encode(UCompilerLookup::item($model->compiler_id)),
        ),
        array(
            'name'=>'source',
            'type'=>'raw',
        	'template'=>'<tr class="even"><td colspan=2><b>Source</b></br>{value}</td></tr>',
            'value'=>'<pre class="brush :'.UCompilerLookup::ext($model->compiler_id).'">'.CHtml::encode($model->source).'</pre>',
        	'visible'=>(Yii::app()->user->id==$model->user_id),
        ),
    ),
)); ?>
<?php Yii::app()->syntaxhighlighter->addHighlighter(); ?>

