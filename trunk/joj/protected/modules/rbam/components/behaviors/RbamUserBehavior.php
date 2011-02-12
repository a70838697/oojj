<?php
/* SVN FILE: $Id: RbamUserBehavior.php 9 2010-12-17 13:21:39Z Chris $*/
/**
* RBAM User Behavior class file.
* Provides additional features used by RBAM to the user model.
* 
* @copyright	Copyright &copy; 2010 PBM Web Development - All Rights Reserved
* @package		RBAM
* @since			V1.0.0
* @version		$Revision: 9 $
* @license		BSD License (see documentation)
*/
/**
* RBAM User Behavior class
* @package		RBAM
*/
class RbamUserBehavior extends CModelBehavior {
	/**
	* @property-read string the user name
	*/
	private $_name;

	/**
	* Returns the user's name.
	* @return string the user's name.
	*/
	public function getRbamName() {
		if ($this->_name===null) {
			$attribute = Yii::app()->getModule('rbam')->userNameAttribute;
				
			if (is_string($attribute) && strpos($attribute, ',')!==false) {				
				$attributes = explode(',', str_replace('\,','__##comma##__',$attribute));
				$glue = str_replace('__##comma##__',',',array_shift($attributes));
				$this->_name = join($glue, $this->getOwner()->getAttributes($attributes));
			}
			elseif (is_array($attribute)) {				
				$attributes = $attribute;
				$glue = array_shift($attributes);
				$this->_name = join($glue, $this->getOwner()->getAttributes($attributes));
			}
			else
				$this->_name = $this->getOwner()->{$attribute};
		}

		return $this->_name;
	}
}