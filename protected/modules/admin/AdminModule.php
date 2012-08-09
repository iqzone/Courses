<?php

class AdminModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'admin.models.*',
			'admin.components.*',
		));
                
                //Set layout
                Yii::app()->theme = 'courses/backend';
                Yii::app()->setComponents(array(
                                            'errorHandler'=>array(
                                                    // use 'site/error' action to display errors
                                                    'errorAction'=> '/admin/default/error',
                                            ),
                                            'user'               =>array
                                            (
                                                'loginUrl'       =>array('admin/default/login'),
                                            ),
                ));
                
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}
