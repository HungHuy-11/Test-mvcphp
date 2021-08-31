<?php

use MVC\Dispatcher;

date_default_timezone_set('Asia/Ho_Chi_Minh');
define('WEBROOT', str_replace("public/index.php", "", $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("public/index.php", "", $_SERVER["SCRIPT_FILENAME"]). 'src/');
define('BASEPATH', str_replace("public/index.php", "", $_SERVER["SCRIPT_FILENAME"]));

// require(ROOT . 'Config/core.php');
// require(ROOT . 'router.php');
// require(ROOT . 'request.php');
// require(ROOT . 'dispatcher.php');

require BASEPATH . '/vendor/autoload.php';

$dispatch = new Dispatcher();
$dispatch->dispatch();

?>