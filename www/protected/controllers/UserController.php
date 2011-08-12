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

    public $defaultAction = 'login';

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

    public function actionLogin()
    {
        
    }

    public function actionRegistration()
    {
        
    }

    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

}

?>
