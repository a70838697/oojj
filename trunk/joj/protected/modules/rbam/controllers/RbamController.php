<?php
/* SVN FILE: $Id: RbamController.php 9 2010-12-17 13:21:39Z Chris $*/
/**
* RBAM Controller class file.
* Base Controller for all RBAM controllers.
* 
* @copyright	Copyright &copy; 2010 PBM Web Development - All Rights Reserved
* @package		RBAM
* @since			V1.0.0
* @version		$Revision: 9 $
* @license		BSD License (see documentation)
*/
/**
* RBAM Controller class
* @package		RBAM
*/
class RbamController extends CController {	
	const SPACE_IN_ID = '-_-';
	const GRID_SELECT_NONE = 0;
	const GRID_SELECT_ONE = 1;
	const GRID_SELECT_MANY = 2;
	
	/**
	* @property array support for zii breadcrumbs widget
	*/
	public $breadcrumbs;
	/**
	* @var array support for metadata extension
	*/
	
	/**
	* @property CAuthManager The auth manager component
	*/
	public $authManager;

	/**
	* @return array action filters
	*/
	public function filters() {
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	* Specifies the access control rules.
	* This method is used by the 'accessControl' filter.
	* @return array access control rules
	*/
	public function accessRules() {
		$module = $this->getModule();
		if ($this->authManager->getAuthItem($module->rbacManagerRole))
			$allow = array('allow',
				'actions'=>array(
					'index'
				),
				'roles'=>array(
					$module->authAssignmentsManagerRole,
					$module->authItemsManagerRole
				),
			);
		else
			$allow = array('allow',
				'actions'=>array(
					'index'
				),
				'users'=>array('@'),
			);
		return array(
			$allow,
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	/**
	* RBAM home page action
	*/
	public function actionIndex() {
		$this->pageTitle = 'Role Based Access Manager';
		$this->breadcrumbs = array($this->pageTitle);
		$this->render($this->action->id);
	}
	
	/**
	* Returns an array of initial characters from the data set.
	* Used in ApPagination 
	* @param array the data to use
	* @param string the attribute to use. If empty the array value is used
	*/
	public function activeChars($data, $attribute='') {
		$chars = array();
		foreach ($data as $datum)
			$chars[] = strtoupper(substr(($attribute?$datum->$attribute:$datum),0,1));
		return array_unique($chars);
	}
}
