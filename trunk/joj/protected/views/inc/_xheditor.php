<?php
	    $this->widget('application.components.widgets.XHeditor',array(
	    	'model'=>$model,
	    	'modelAttribute'=>$field,
	    	'config'=>array(
	    		'tools'=>'mini', // mini, simple, fill or from XHeditor::$_tools
	    		//see XHeditor::$_configurableAttributes for more
	    	),
			'htmlOptions'=>array(
				'rows'=>10,
		    	'cols'=>84,
			),    	
	    ));