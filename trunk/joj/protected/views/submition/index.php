<?php
$this->breadcrumbs=array(
	'Submitions',
);

$this->menu=array(
	array('label'=>'Create Submition', 'url'=>array('create')),
	array('label'=>'Manage Submition', 'url'=>array('admin')),
);
Yii::import('ext.qtip.QTip');
// qtip options
$opts = array(
    'position' => array(
        'corner' => array(
            'target' => 'rightMiddle',
            'tooltip' => 'leftMiddle'
            )
        ),
    'content'=>false,
    'show' => array(
        'when' => array('event' => 'mouseover' ),
    ),
    'hide' => array(
        'when' => array('event' => 'mouseout' ),
    ),
    'style' => array(
        'color' => 'red',
        'name' => 'cream',
    	'width'=>500,
        'border' => array(
            'width' => 3,
            'radius' => 5,
        ),
    )
);
 
// apply tooltip on the jQuery selector (1 parameter)
QTip::qtipd('.mes', $opts);
?>
<script language="javascript">
 $(document).ready(function() {
   var refreshId = setInterval(function() {
	   $.fn.yiiGridView.update('submition-grid');
   }, 6000);
});
</script>
<h1>Submitions</h1>
<?php
	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'submition-grid',
	'dataProvider'=>$dataProvider,
	'ajaxUpdate'=>false,
	'template'=>'{summary}{items}',
	'columns'=>array(
		array(
			'name'=>'id',
			'type'=>'raw',
			'value'=>'CHtml::link($data->id,array("view","id"=>$data->id))',
		),
		array(
			'name'=>'Author',
			'type'=>'raw',
			'value'=>'CHtml::link(CHtml::encode($data->user->username),array("user/user/view","id"=>$data->user_id))',
		),
		array(
			'name'=>'Status',
			'type'=>'raw',
			'value'=>'((strlen($data->result)>0)?"<div style=\'color:red;\' title=\'".str_replace("\r\n","<br/>",CHtml::encode($data->result))."\' class=\'mes\' color=\'blue\'>":"").ULookup::$JUDGE_RESULT_MESSAGES[$data->status].(strlen($data->result)>0?"</div>":"")',
		),
		array(
			'name'=>'problem',
			'type'=>'raw',
			'value'=>'CHtml::link(CHtml::encode($data->problem->title),array("problem/view","id"=>$data->problem_id))',
		),
		'created',
		array(
			'name'=>'used_time',
			'type'=>'raw',
			'value'=>'($data->status==ULookup::JUDGE_RESULT_ACCEPTED)?$data->used_time."ms":""',
		),
		array(
			'name'=>'used_memory',
			'type'=>'raw',
			'value'=>'($data->status==ULookup::JUDGE_RESULT_ACCEPTED)?($data->used_memory>>10)."K":""',
		),
		array(
			'name'=>'compiler_id',
			'type'=>'raw',
			'value'=>'CHtml::encode(UCompilerLookup::display($data->compiler_id))',
		),		
		array(
			'name'=>'code_length',
			'type'=>'raw',
			'value'=>'$data->code_length',
		),

	),
));
?>
