<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author Admin
 */
class User extends CActiveRecord
{

    /**
     * @var string repeat password
     */
    public $password2;
    /**
     * @var string verification code captcha
     */
    public $verifyCode;

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tabName()
    {
        return 'user';
    }

    public function relations()
    {
        return array(
            'posts' => array(self::HAS_MANY, 'Post', 'author_id'),
        );
    }

    public function rules()
    {
        return array(
            array('login, password', 'required'),
            array('password2', 'required', 'on' => 'registration'),
            array('password', 'compare', 'compareAttribute' => 'password2', 'on' => 'registration'),
            array('password', 'authenticate', 'on' => 'login'),
            array('login, password', 'length', 'max' => 32, 'min' => 4),
            array('verifyCode', 'captcha', 'allowEmpty' => !extension_loaded('gd')),
        );
    }

    public function safeAttributes()
    {
        return array('login', 'password', 'password2', 'verifuCode');
    }

    public function attributeLabels()
    {
        return array(
            'id' => 'Id',
            'login' => 'Login',
            'password' => 'Password',
            'password2' => 'RepeatPassword',
        );
    }

    public function authenticate($attribute, $params)
    {
        if (!$this->hasErrors())
        {
            $identity = new UserIdentity($this->login, $this->password2);
            $identity->authenticate();
            switch ($identity->errorCode)
            {
                case UserIdentity::ERROR_NONE:
                    {
                        Yii::app()->user->login($identity, 0);
                        break;
                    }
                case UserIdentity::ERROR_USERNAME_INVALID:
                    {
                        $this->addError('login', 'entered login does not exist');
                        break;
                    }
                case UserIdentity::ERROR_PASSWORD_INVALID:
                    {
                        $this->addError('password', 'entered password does not exist');
                        break;
                    }
            }
        }
    }

}

?>
