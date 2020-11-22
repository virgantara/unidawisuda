<?php

use \Firebase\JWT\JWT;

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	public function actionLoginSso($token)
    {
    	
        $key = Yii::app()->params->jwt_key;
        $decoded = JWT::decode($token, base64_decode(strtr($key, '-_', '+/')), ['HS256']);
        // print_r($decoded);exit;
        $session = Yii::app()->session;
        $session->add('token',$token);
        $uuid = $decoded->uuid; // will print "1"
        $model=new User();
		$model->uuid=$uuid;
		$user = User::model()->findByAttributes(array('uuid' => $model->uuid));
		
		if(empty($user))
		{
			Yii::app()->user->setFlash('danger', "Tidak ada user dengan email ini");
			$this->redirect(Yii::app()->params->sso_login);
		}

		$model->USERNAME = $user->USERNAME;
		$model->PASSWORD = '123';

		$result = $model->login();
		
		switch($result)
		{
			case UserIdentity::ERROR_NONE:
				
				$this->redirect(array('site/index'));
				
				break;
			case UserIdentity::ERROR_USERNAME_INVALID:
			case UserIdentity::ERROR_PASSWORD_INVALID:
				$this->redirect(Yii::app()->params->sso_login);
				
				break;
			case UserIdentity::ERROR_USER_INACTIVE:

				$this->redirect(Yii::app()->params->sso_login);
				
				break;
			case UserIdentity::ERROR_USER_NOT_EXIST:

				$this->redirect(Yii::app()->params->sso_login);
				
				break;
		}
		
    }

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->redirect(array('peserta/index'));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	public function actionLogin()
	{
	
		$model=new User;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['User']))
		{
		
		
			$model->attributes=$_POST['User'];
			$result = $model->login();
			// validate user input and redirect to the previous page if valid
			switch($result)
			{
				case UserIdentity::ERROR_NONE:
					
					$this->redirect(array('peserta/admin'));
					
					break;
				case UserIdentity::ERROR_USERNAME_INVALID:
				case UserIdentity::ERROR_PASSWORD_INVALID:
					$model->addError('USERNAME','Incorrect username or password.');
					
					break;
				case UserIdentity::ERROR_USER_INACTIVE:

					$model->addError('USERNAME','Akun Anda belum aktif. Silakan menghubungi Administrator.');
					
					break;
			}
			
		}
		
		
		
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	public function actionLogout()
	{	
		$session = Yii::app()->session;
		$session->remove('access_token','');
		$session->remove('uuid','');
		$session->destroy();
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->params->sso_logout);
	}
	
}