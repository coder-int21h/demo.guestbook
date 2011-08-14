<?php

$yii = dirname(__FILE__) . '/../framework/yii.php';
$config = dirname(__FILE__) . '/protected/config/main.php';

defined('YII_DEBUG') or define('YII_DEBUG', true);
require_once ($yii);
Yii::createApplication('CWebApplication', $config)->run();

?>