<?php
$this->breadcrumbs=array(
	'Courses'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Course', 'url'=>array('index')),
	array('label'=>'Create Course', 'url'=>array('create')),
	array('label'=>'Update Course', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Course', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Course', 'url'=>array('admin')),
);
?>

<center><font size='6'><?php echo CHtml::encode($model->name);?></font></center>
<table>
	<tr>
	<td><b><?php echo CHtml::encode($model->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($model->user->username),array('/user/user/view', 'id'=>$model->user->id)); ?></td>
	<td><center><b><?php echo CHtml::encode($model->getAttributeLabel('due_time')); ?>:</b>
	<?php echo CHtml::encode($model->due_time); ?></center></td>
	<td align="right"><b><?php echo CHtml::encode($model->getAttributeLabel('location')); ?>:</b>
	<?php echo CHtml::encode($model->location); ?></td>
	</tr>
</table>
<?php
$this->widget('ext.JuiButtonSet.JuiButtonSet', array(
    'items' => array(
        array(
            'label'=>'Add an experiment',
            'icon-position'=>'left',
            'icon'=>'circle-plus', // This a CSS class starting with ".ui-icon-"
            'url'=>'#',
	        'visible'=>!Yii::app()->user->isGuest,
        	'linkOptions'=>array('onclick'=>'return showDialogue();',)
        ),
        array(
            'label'=>'View',
            'icon-position'=>'left',
            'icon'=>'document',
        	'url'=>array('/course/view/'.$model->id.''),
        ),
    ),
    'htmlOptions' => array('style' => 'clear: both;'),
));
?>

<?php if(!(Yii::app()->user->isGuest)){?>
<div id="experiments">
	<?php if(count($model->experiments)>=1): ?>
		<h3>
			<?php echo count($model->experiments)>1 ? count($model->experiments) . ' experiments' : 'One experiment'; ?>
		</h3>

		<?php $this->renderPartial('_experiments',array(
			'course'=>$model,
			'experiments'=>$model->experiments,
		)); ?>
	<?php endif; ?>
</div><!-- experiment -->
<?php 

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
        'title'=>'Create an experiment',
        'autoOpen'=>false,
		'minWidth'=>800,
		'height'=>700,
		'modal'=>true,
    ),
));
?>
	<?php if(Yii::app()->user->hasFlash('experimentSubmitted')): ?>
		<div class="flash-success">
			<?php echo Yii::app()->user->getFlash('experimentSubmitted'); ?>
		</div>
	<?php else: ?>
		<?php $this->renderPartial('/experiment/_form',array(
			'model'=>$experiment,
		)); ?>
	<?php endif; ?>

<?php 
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>
<?php } ?>
