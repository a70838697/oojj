<?php
/**
 * @author Ivan Mota
 * @version 1.0.0.0
 * @created on: 2010-11-29 16:24
 * @modified on: 2010-11-29 16:24
*/
Yii::import('application.extensions.SimpleWiki.*');

class ImWiki extends SimpleWiki
{
	/**
	 * 
	 * @var CController
	 */
	private $_objController = null;
	
	public function __construct($strText, $objController = null)
	{
		parent::__construct($strText);
		
		if (!is_null($objController))
		{
			$this->_objController = $objController;
		}
		
		// for security reasons
		parent::allow_html(false);
		
		// macro example register
/*
		parent::register_macro_callbacks(array(
				'entitylink' => array($this,'macro_entity_link')
			)
		);
*/
	}
	
	/**
	 * Macro example implementation
	 * <<<entitylink id="210" title="My entity title"|view entity information>>>
	 */
	public function macro_entity_link($node)
	{
		if ((isset($node->argumentstring)) && (is_string($node->argumentstring)) && (strlen(trim($node->argumentstring)) > 0) && (!is_null($this->_objController)))
		{
			$arrArguments = $this->_parser->parse_arguments($node->argumentstring);
			$intEntityID = @$arrArguments->attributes['id'];
			$strTitle = @$arrArguments->attributes['title'];
			
			if ( (isset($intEntityID)) && (is_numeric($intEntityID)) && ($intEntityID > 0) )
			{
				$arrHtmlOption = array();
				$arrHtmlOption['href'] = $this->_objController->createAbsoluteUrl('entity/view', array('ID' => $intEntityID));
				
				if ((isset($strTitle)) && (is_string($strTitle)) && (strlen($strTitle) > 0))
				{
					$arrHtmlOption['title'] = $strTitle;	
				}
				
				if (strlen($node->text) == 0)
				{
					$node->text = "Entity View Link" ;
				}
				
				$node->output = CHtml::tag('a', $arrHtmlOption, $node->text, true); 
			}
		}
		return $node;
	}
}
?>