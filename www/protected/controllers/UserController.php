<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserController
 *
 * @author coder.int21h@gmail.com
 */
class UserController extends CController
{

    /**
     *
     * @var type 
     */
    public $defaultAction = 'login';

    /**
     *
     * @return type 
     */
    public function actions()
    {
        return array(
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'width' => '120',
                'height' => '40',
                'backColor' => 0x000000,
                'foreColor' => 0x66ff66,
            ),
        );
    }

    /**
     *  Не коректно работает нужно переделать
     */
    public function actionLogin()
    {
        $user = new User('login');
        if (!empty($_POST['User']))
        {
            $user->attributes = $_POST['User'];
            if ($user->validate())
            {
                $this->redirect(Yii::app()->homeUrl);
            }
            else
            {
                $this->renderPartial('4040'); // Надо поправить
            }
        }
    }

    /**
     * 
     */
    public function actionRegistration()
    {
        $user = new User('registration');
        if (!Yii::app()->user->isGuest)
        {
            $this->redirect(Yii::app()->homeUrl);
        }
        if (!empty($_POST['User']))
        {
            $user->attributes = $_POST['User'];
            if ($user->validate())
            {
                if ($user->model()->count("login = :login", array(':login' => $user->login)))
                {
                    $user->addError('login', 'Selected login is already taken, please choose another.');
                    //$this->render('registration', array('user' => $user));
                }
                else
                {
                    $user->save();
                    $this->render('registration_ok');
                }
            }
        }
        $this->render('registration', array('user' => $user));
    }

    /**
     * 
     */
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

}

?>
