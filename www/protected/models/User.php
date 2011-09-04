<?php

/**
 * Description of User
 * Модель таблицы User 
 *
 * @author coder.int21h@gmail.com
 */
class User extends CActiveRecord
{
    /**
     * Ниже приведены доступные столбцы в таблице 'user'
     * 
     * @var integer $id
     * @var string  $login
     * @var string  $password
     * @var date    $created
     * @var role    $profile
     */

    /**
     * Переменная для поля проверки пароля
     * @var string repeat password
     */
    public $password2;

    /**
     * Переменная для капчи
     * @var string verification code captcha
     */
    public $verifyCode;

    /**
     * Возвращает статическую модель указанного класса AR
     * @param type $className
     * @return CActiveRecord 
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    /**
     * Возвращает название таблицы
     * @return string; 
     */
    public function tabName()
    {
        return 'user';
    }

    /**
     * Возвращает масивом релятивные связи с таблицей Post
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            'posts' => array(self::HAS_MANY, 'Post', 'author_id'),
        );
    }

    /**
     * Возвращает массивом правила проверки
     * @return array validation rules; 
     */
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

    /**
     * Список безопасно присваиваемых атрибутов 
     * @return array;
     */
    public function safeAttributes()
    {
        return array('login', 'password', 'password2', 'verifyCode');
    }

    /**
     * Возвращает массивом синонимы атрибутов
     * @return array labels atribute
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'Id',
            'login' => 'Login',
            'password' => 'Password',
            'password2' => 'RepeatPassword',
        );
    }

    /**
     * Функция проверки на соответствие логин/пароль используется при проверки
     * сценария 'login'
     * 
     * @param type $attribute
     * @param type $params 
     */
    public function authenticate($attribute, $params)
    {
        if (!$this->hasErrors())
        {
            $identity = new UserIdentity($this->login, $this->password);
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

    /**
     * no comment...
     * @return boolean;
     */
    protected function beforeSave()
    {
        if (parent::beforeSave())
        {
            if ($this->isNewRecord)
            {
                //$this->password = md5($this->password);
                $this->created = date('d M Y H:i');
                $this->role = 'user';
            }
            return true;
        }
        else
        {
            return false;
        }
    }

}

?>
