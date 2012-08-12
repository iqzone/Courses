<?php

class RolesController extends Controller
{
	public function actionIndex()
	{
                $model = new RolesForm;
                
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
                
		// collect user input data
		if(isset($_POST['RolesForm']))
		{
			$model->attributes=$_POST['RolesForm'];
			
                        if( $model->save() )
                        {
                            Yii::app()->user->setFlash( 'success', $model->name . ' fue añadido.' );
                        }
		}
                
		$this->render('index', array( 'model' => $model ));
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}