<?php

return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'demo.guestbook',
    'defaultController' => 'post',
    'import' => array(
        'application.models.*',
        'application.components.*',
    ),
    /**
     * 
     */
    'components' => array(
        'db' => array(
            'connectionString' => 'sqlite:protected/data/guestbook.db',
        ),
    /**
     * 'class' => 'CDbAuthManager',
     * 'connectionID' => 'db',
     */
    ),
);
?>