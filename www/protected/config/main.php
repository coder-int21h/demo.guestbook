<?php

return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'demo.guestbook',
    'defaultController' => 'post',
    'homeUrl' => 'index.php',
    'import' => array(
        'application.models.*',
        'application.components.*',
    ),
    /**
     * Список используеммых компонентов
     */
    'components' => array(
        /**
         *  Подключает БД SQLite
         */
        'db' => array(
            'connectionString' => 'sqlite:protected/data/guestbook.db',
        ),
        /**
         * Подключает компонент user
         */
        'user' => array(
            'class' => 'WebUser',
        ),
        /**
         * Подключает RBAC с набором ролей и правил из файла.
         */
        'authManager' => array(
            'class' => 'PhpAuthManager',
            'defaultRoles' => array('guest'),
        ),
    ),
);
?>