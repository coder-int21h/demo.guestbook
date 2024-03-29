<?php

/**
 * Description of UserIdentity
 * Расширяет класс CUserIdentity, и переопределяет метод authenticate. 
 * @author 
 */
class UserIdentity extends CUserIdentity
{

    private $_id;

    public function authenticate()
    {
        $record = User::model()->findByAttributes(array('login' => $this->username));
        if ($record === null)
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        else if ($record->password !== $this->password)
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        else
        {
            $this->_id = $record->id;
            $this->errorCode = self::ERROR_NONE;
        }
        return!$this->errorCode;
    }

    public function getId()
    {
        return $this->_id;
    }

}

?>
