<?php

class ExperimentController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$experiment=$this->loadModel($id);
		$exercise_problem=Yii::app()->user->isGuest?null:$this->newExerciseProblem($experiment);

		$this->render('view',array(
			'model'=>$experiment,
			'exercise_problem'=>$exercise_problem,
		));
	}
	/**
	 * Creates a new exercise_problem.
	 * This method attempts to create a new exercise_problem based on the user input.
	 * If the exercise_problem is successfully created, the browser will be redirected
	 * to show the created exercise_problem.
	 * @param Experiment the experiment that the new exercise_problem belongs to
	 * @return ExerciseProblem the exercise_problem instance
	 */
	protected function newExerciseProblem($experiment)
	{
		$exercise_problem=new ExerciseProblem;
		if(isset($_POST['ajax']) && $_POST['ajax']==='exercise-problem-form')
		{
			echo CActiveForm::validate($exercise_problem);
			Yii::app()->end();
		}
		if(isset($_POST['ExperimentProblem']))
		{
			$exercise_problem->attributes=$_POST['ExperimentProblem'];
			$exercise_problem->user_id=Yii::app()->user->id;
			$exercise_problem->course_id=$experiment->exercise_id;
			if($exercise_problem->save())
			{
				//if($comment->status==Comment::STATUS_PENDING)
				Yii::app()->user->setFlash('exercise_problemSubmitted','Your problem has been added.');
				$this->refresh();
			}
		}
		return $exercise_problem;
	}
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Experiment;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Experiment']))
		{
			$model->attributes=$_POST['Experiment'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Experiment']))
		{
			$model->attributes=$_POST['Experiment'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Experiment');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Experiment('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Experiment']))
			$model->attributes=$_GET['Experiment'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Experiment::model()->findByPk((int)$id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='experiment-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
