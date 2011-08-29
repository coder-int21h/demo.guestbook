<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of WebUser
 *
 * @author Admin
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
