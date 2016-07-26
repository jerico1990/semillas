<?php

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

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{

		if(Yii::app()->user->isGuest)
		{
			$this->redirect(array('cruge/ui/login'));		
		}
		else
		{
			$model=User::model()->find('cruge_user_id=:cruge_user_id', array(':cruge_user_id'=>Yii::app()->user->id));
			if (isset($model->registry) && $model->registry)
				$this->redirect(array('user/view/'.$model->id));
			else
				$this->redirect(array('user/create'));
			
		}
		
		
	
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

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$smt=Yii::app()->Smtpmail;
				$smt->SetFrom(Yii::app()->Smtpmail->Username, 'INIA');
				 $smt->Subject    = '=?UTF-8?B?'.base64_encode($model->subject).'?=';
				 $smt->MsgHTML($model->body);
				 $smt->AddAddress($model->email, "");
					if(!$smt->Send())
					{
					    echo "Mailer Error: " . $smt->ErrorInfo;
					}else {
					    echo "Message sent!";
					}
				 
				//$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				//$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				//$headers="From: $name <{$model->email}>\r\n".
					/*"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";
					*/
				//mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				//$this->mailSend($model->email,Yii::app()->Smtpmail->Username,$subject,$model->body);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}
	
	/*public function mailsend($to,$from,$subject,$message){
	    $mail=Yii::app()->Smtpmail;
	    $mail->SetFrom($from, 'INIA');
	    $mail->Subject    = $subject;
	    $mail->MsgHTML($message);
	    $mail->AddAddress($to, "");
	    if(!$mail->Send()) {
	        echo "Mailer Error: " . $mail->ErrorInfo;
	    }else {
	        echo "Message sent!";
	    }
	}*/

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	
	
}