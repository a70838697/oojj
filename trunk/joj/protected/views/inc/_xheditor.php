<?php
$arr_attrs=
array(
	    	'model'=>$model,
	    	'modelAttribute'=>$field,
	    	'config'=>array(
	    		'tools'=>'mini', // mini, simple, fill or from XHeditor::$_tools
	    		//see XHeditor::$_configurableAttributes for more
	    	),
			'htmlOptions'=>array(
				'rows'=>10,
	    		'style'=>isset($style)?$style:'',
		    	'cols'=>84,
			),    	
			
	   );
if(isset($id))
{
	$arr_attrs['config']['id']=$id;
}	    
	    $this->widget('application.components.widgets.XHeditor',$arr_attrs);