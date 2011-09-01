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

    public $_login = 0;

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
                $this->render('post/index'); //redirect(Yii::app()->homeUrl);
            }
        }
        $this->redirect(Yii::app()->homeUrl);
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
                }
                else
                {
                    $user->save();
                    $this->render('registration_ok');
                    exit;
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

    /**
     * 
     */
    public function actionProfil()
    {

        if (Yii::app()->user->checkAccess('administrator'))
        {

            /* Если администратор то доступен для просмотра статус любого user */
            if (isset($_GET['login']))
            {
                $this->_login = $_GET['login'];
                $criteria = new CDbCriteria();
                $criteria->condition = 'login=:ID';
                $criteria->params = array('ID' => $this->_login);
                $user = User::model()->find($criteria);

                $condition = 'user_id=:ID';
                $parms = array('ID' => $user->id);
                $post = Post::model()->count($condition, $parms);

                $this->render('profil2', array(
                    'post' => $post,
                    'user' => $user,
                ));
            }
        }
        else
        {

            /* Если просто user то доступен только свой профиль */
            if (Yii::app()->user->checkAccess('user'))
            {
                $condition = 'user_id=:ID';
                $params = array('ID' => Yii::app()->user->id);
                $post = Post::model()->count($condition, $params);
                $user = User::model()->findByPk(Yii::app()->user->id);
                $this->render('profil', array(
                    'post' => $post,
                    'user' => $user,
                ));
            }
            else
            {
                /* Если гость то на главную */
                $this->redirect(Yii::app()->homeUrl);
            }
        }
    }

    /**
     * 
     */
    public function actionTest()
    {
        $this->render('registration_ok');
    }

}

?>
