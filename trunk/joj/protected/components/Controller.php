<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/onlinejudge';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
	public function canAccess($params=array(),$action=null,$controller=null)
	{
		if(is_null($controller))$controller=Yii::app()->controller->id;
		if(is_null($action))$action=$this->getAction()->getId();
		return Yii::app()->user->checkAccess($controller.":".$action,$params);
	}
	public function checkAccess($params=array())
	{
		if(!$this->canAccess($params,$this->getAction()->getId(),Yii::app()->controller->id))
		{
			if(Yii::app()->user->getIsGuest())
				Yii::app()->user->loginRequired();
			else
				throw new CHttpException(403,('You are not authorized to perform this action.'));
		}
		
	}
}