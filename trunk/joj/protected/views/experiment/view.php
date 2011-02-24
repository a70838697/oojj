<?php
$this->breadcrumbs=array(
	$model->course->title=>array('/course/view/'.$model->course->id),
	$model->title,
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
            'label'=>'Add an problem',
            'icon-position'=>'left',
            'icon'=>'circle-plus', // This a CSS class starting with ".ui-icon-"
            'url'=>'#',
	        'visible'=>UUserIdentity::isTeacher(),
        	'linkOptions'=>array('onclick'=>'return showDialogue();',)
        ),
        array(
            'label'=>'Update this experiment',
            'icon-position'=>'left',
	        'visible'=>UUserIdentity::isTeacher(),//!Yii::app()->user->isGuest && $this->canAccess(array('model'=>$model),'update'),
            'url'=>array('update', 'id'=>$model->id),
        ), 
        array(
            'label'=>'Submit a report',
            'icon-position'=>'left',
	        'visible'=>UUserIdentity::isStudent(),//!Yii::app()->user->isGuest && $this->canAccess(array('model'=>$model),'update'),
            'url'=>array('/experimentReport/write', 'id'=>$model->id),
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
		'title',
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
		<h3>
	<?php if($model->exercise!==null && count($model->exercise->exercise_problems)>=1){ ?>
			<?php echo count($model->exercise->exercise_problems)>1 ? count($model->exercise->exercise_problems) . ' problems' : 'One problem'; ?>
	<?php }else echo "0 problems"; ?>		
		</h3>
	<?php if($model->exercise!==null && count($model->exercise->exercise_problems)>=1): ?>
		<?php $this->renderPartial('/exerciseProblem/_exercise_problems',array(
			'exercise'=>$model->exercise,
			'exerciseProblems'=>$model->exercise->exercise_problems,
		)); ?>
	<?php endif; ?>


</div><!-- exercise_problem -->
<?php } ?>
	<?php if(Yii::app()->user->hasFlash('exercise_problemSubmitted')): ?>
		<div class="flash-success">
			<?php echo Yii::app()->user->getFlash('exercise_problemSubmitted'); ?>
		</div>
	<?php endif; ?>

<?php 
if ($exercise_problem!==null): 
echo CHtml::script('
function showDialogue()
{
	$("#submitiondialog").dialog("open");
	//this.blur();
	return false;	
}
');
	
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'submitiondialog',
    'options'=>array(
		'dialogClass'=>'rbam-dialog',
        'title'=>'Add a problem',
        'autoOpen'=>$exercise_problem->hasErrors(),
		'minWidth'=>800,
		'height'=>710,
		'modal'=>true,
    ),
));
?>
		<?php $this->renderPartial('/exerciseProblem/_form',array(
			'model'=>$exercise_problem,
		)); ?>

<?php 
$this->endWidget('zii.widgets.jui.CJuiDialog');
endif;
?>