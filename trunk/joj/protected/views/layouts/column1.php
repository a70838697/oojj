<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
	<div id="content">
		<?php 
		if(property_exists($this,'contentMenu')){// && !empty($this->contentMenu)){
 
	$this->contentMenu=array(
		'htmlOptions' => array( 'style' => 'position: relative; z-index: 1' ),
		'items'=>array(
			array('label'=>'Problem', 'url'=>array('#'), 
				'items'=>array(
					array('label'=>'List Problem', 'url'=>array('index')),
					array('label'=>'Create Problem', 'url'=>array('create')),
				),
			),
			array('label'=>'Submition', 'url'=>array('#'), 
				'items'=>array(
					array('label'=>'List Submition', 'url'=>array('/submition/index')),
				),
			),
		),
     );
			$jqueryslidemenupath = Yii::app()->assetManager->publish(Yii::app()->basePath.'/scripts/jqueryslidemenu/');
			//Register jQuery, JS and CSS files
			Yii::app()->clientScript->registerCssFile($jqueryslidemenupath.'/jqueryslidemenu.css');
			Yii::app()->clientScript->registerCoreScript('jquery');
			Yii::app()->clientScript->registerScriptFile($jqueryslidemenupath.'/jqueryslidemenu.js');
		?>

		<div id="myslidemenu" class="jqueryslidemenu">
		<?php
			$this->widget('zii.widgets.CMenu',$this->contentMenu);
		?>
		<br style="clear: left" />
		</div><!-- myslidemenu-->
		<?php }?>
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<?php $this->endContent(); ?>