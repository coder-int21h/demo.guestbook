<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PhpAuthManager
 *
 * @author Admin
 */
class PhpAuthManager extends CPhpAuthManager
{

    public function init()
    {
        if ($this->authFile === null)
        {
            $this->authFile = Yii::getPathOfAlias('application.config.auth') . '.php';
        }
        parent::init();

        if (!Yii::app()->user->isGuest)
        {
            $this->assign(Yii::app()->user->role, Yii::app()->user->id);
        }
    }

}

?>
