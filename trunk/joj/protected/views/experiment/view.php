<?php
$this->breadcrumbs=array(
	'Experiments'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Experiment', 'url'=>array('index')),
	array('label'=>'Create Experiment', 'url'=>array('create')),
	array('label'=>'Update Experiment', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Experiment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Experiment', 'url'=>array('admin')),
);
?>

<h1>View Experiment #<?php echo $model->id; ?></h1>
<?php
$this->widget('ext.JuiButtonSet.JuiButtonSet', array(
    'items' => array(
        array(
            'label'=>'Update this experiment',
            'icon-position'=>'left',
	        'visible'=>true,//!Yii::app()->user->isGuest && $this->canAccess(array('model'=>$model),'update'),
            'url'=>array('update', 'id'=>$model->id),
        ), 
        array(
            'label'=>'View course',
            'icon-position'=>'left',
        	'visible'=>!Yii::app()->user->isGuest,
            'icon'=>'document',
        	'url'=>array('/course/experiment/'.$model->id),
        ),        
    ),
    'htmlOptions' => array('style' => 'clear: both;'),
));
?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'course_id',
		'name',
		'experiment_type_id',
		'sequence',
		'description',
		'user_id',
		'status',
		'begin',
		'end',
		'created',
		'exercise_id',
	),
)); ?>
<?php if(!(Yii::app()->user->isGuest)){?>
<div id="exercise">
	<?php if(count($model->exercise->exercise_problems)>=1): ?>
		<h3>
			<?php echo count($model->exercise->exercise_problems)>1 ? count($model->exercise->exercise_problems) . ' problems' : 'One problem'; ?>
		</h3>

		<?php $this->renderPartial('/exerciseProblem/_exercise_problems',array(
			'exercise'=>$model->exercise,
			'exerciseProblems'=>$model->exercise->exercise_problems,
		)); ?>
	<?php endif; ?>
	<h3>Add a problem</h3>

	<?php if(Yii::app()->user->hasFlash('exercise_problemSubmitted')): ?>
		<div class="flash-success">
			<?php echo Yii::app()->user->getFlash('exercise_problemSubmitted'); ?>
		</div>
	<?php else: ?>
		<?php $this->renderPartial('/exerciseProblem/_inline_form',array(
			'model'=>$exercise_problem,
		)); ?>
	<?php endif; ?>

</div><!-- exercise_problem -->
<?php } ?>