<?php

error_reporting(E_ALL); //Error/Exception engine, always use E_ALL

ini_set('ignore_repeat_errors', true); // always use TRUE

ini_set('display_errors', false); // Error/Exception display, use False only in production

ini_set('log_errors', true); //Error/Exeption file logging engine

ini_set("error_log", "log/php-error.log"); // path to save log
error_log("Inicio de aplicacion web");

require_once 'libs/database.php';
require_once 'libs/controller.php';
require_once 'libs/model.php';
require_once 'libs/view.php';
require_once 'libs/app.php';

require_once 'config/config.php';


//instanciamos un objeto de la clase app
$app = new App();
