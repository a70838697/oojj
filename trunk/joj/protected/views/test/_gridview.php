<?php

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'test-grid',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'id',
		'input_size',
		'output_size',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); 