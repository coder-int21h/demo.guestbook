<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of WebUser
 * Реализует получение роли из БД при использовании Yii::app()->user->role
 * Для этого расширяет класс CWebUser.
 *
 * @author 
 */
class WebUser extends CWebUser
{

    private $_model = null;

    /**
     * 
     */
    function getRole()
    {
        if ($user = $this->getModel())
        {
            return $user->role;
        }
    }

    /**
     * 
     */
    private function getModel()
    {
        if (!$this->isGuest && $this->_model === null)
        {
            $this->_model = User::model()->findByPk($this->id, array('select' => 'role'));
        }
        return $this->_model;
    }

}

?>
