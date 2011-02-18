<?php
$this->breadcrumbs=array(
	'Problems'=>array('index'),
	$model->title,
);

/*
$this->menu=array(
	array('label'=>'List Problem', 'url'=>array('index')),
	array('label'=>'Create Problem', 'url'=>array('create')),
	array('label'=>'Update Problem', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Problem', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),),
);
*/

$attrs=$model->attributeLabels();

?>



<center><font size='6'><?php echo $model->id.'. '.CHtml::encode($model->title);?></font>
<?php echo ($model->submitedCount==0)?"0%(0/0)":"".round($model->acceptedCount*100.0/$model->submitedCount,1)."%(".$model->acceptedCount."/".$model->submitedCount.")";?>
<font color='red'><?php echo $model->time_limit.'ms,'.($model->memory_limit>>20).'M'?></font>
</center>
<?php
$this->widget('ext.JuiButtonSet.JuiButtonSet', array(
    'items' => array(
/*
        array(
            'label'=>'Menu button 1',
            'icon-position'=>'left',
            'url'=>array('create') //urls like 'create', 'update' & 'delete' generates an icon beside the button
        ),
*/
        array(
            'label'=>'Submit a solution',
            'icon-position'=>'left',
            'icon'=>'circle-plus', // This a CSS class starting with ".ui-icon-"
            'url'=>'#',
	        'visible'=>!Yii::app()->user->isGuest&& $buttons['submit'],
        	'linkOptions'=>array('onclick'=>'return showDialogue();',)
        ),
        array(
            'label'=>'Update this problem',
            'icon-position'=>'left',
	        'visible'=>!Yii::app()->user->isGuest && $this->canAccess(array('model'=>$model),'update'),
            'url'=>array('update', 'id'=>$model->id),
        ), 
        array(
            'label'=>'My submitions to this problem',
            'icon-position'=>'left',
        	'visible'=>!Yii::app()->user->isGuest,
            'icon'=>'circle-plus',
        	'url'=>array('/submition/index/problem/'.$model->id.'/mine/1'),
        ),        
        array(
            'label'=>'Submitions statistics',
            'icon-position'=>'left',
        	'visible'=>!Yii::app()->user->isGuest,
            'icon'=>'document',
        	'url'=>array('/submition/index/problem/'.$model->id.''),
        ),
        array(
            'label'=>'Accepted Submitions',
            'icon-position'=>'left',
        	'visible'=>!Yii::app()->user->isGuest,
            'icon'=>'document',
        	'url'=>array('/submition/index/problem/'.$model->id.'/status/1'),
        ),                 
    ),
    'htmlOptions' => array('style' => 'clear: both;'),
));
?>

<script language="javascript">
function showDialogue()
{
	$("#submitiondialog").dialog("open");
	//this.blur();
	return false;	
}
</script>
<?php
$tabs=array(
		$attrs['description']=>'<div>'.($model->description).'</div>',
);
if(strlen($model->input)>0) $tabs[$attrs['input']]='<div>'.($model->input).'</div>';
if(strlen($model->output)>0) $tabs[$attrs['output']]='<div>'.($model->output).'</div>';
if(strlen($model->input_sample)>0) $tabs[$attrs['input_sample']]='<pre>'.($model->input_sample).'</pre>';
if(strlen($model->output_sample)>0) $tabs[$attrs['output_sample']]='<pre>'.($model->output_sample).'</pre>';
if(strlen(trim($model->hint))>0) $tabs[$attrs['hint']]='<div>'.($model->hint).'</div>';

$this->widget('zii.widgets.jui.CJuiTabs', array(
    'tabs'=>$tabs,
    // additional javascript options for the tabs plugin
    'options'=>array(
        'collapsible'=>true,
    ),
));
?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
        array(
			'name'=>'user_id',
        	'label'=>'Recommend',
            'type'=>'raw',
            'value'=>CHtml::link(CHtml::encode($model->user->username),
                                 array('user/user/view','id'=>$model->user_id)),
        ), 
        'source',
		'created',
	),
)); ?>

<?php 
if($buttons['submit']){
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'submitiondialog',
    'options'=>array(
		'dialogClass'=>'rbam-dialog',
        'title'=>'Submit a solution',
        'autoOpen'=>false,
		'minWidth'=>800,
		'height'=>500,
		'modal'=>true,
    ),
));
?>

<div id="submition">
	<?php if(Yii::app()->user->hasFlash('submitionSubmitted')): ?>
		<div class="flash-success">
			<?php echo Yii::app()->user->getFlash('submitionSubmitted'); ?>
		</div>
	<?php else: ?>
		<?php $this->renderPartial('/submition/_form',array(
			'model'=>$submition,
			'problem'=>$model,
		)); ?>
	<?php endif; ?>

</div><!-- submition -->
<?php 
$this->endWidget('zii.widgets.jui.CJuiDialog');
}
?>

