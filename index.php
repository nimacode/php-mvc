<?php
use App\Service\Router\Router as Router;

/* include Helper */
include_once "App/Helper/helper.php";

/* include Composer Autoload */
include_once "vendor/autoload.php";

/* include Constants */
include_once "bootstrap/constants.php";

/* include init file */
include_once "bootstrap/app.php";

/* Start Routing Service */
Router::register();
