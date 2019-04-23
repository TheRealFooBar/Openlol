<?php

use Slim\App;
use Openlol\Backend\Debug\Routes;

return function (App $app) {
	Openlol\Backend\Debug\Routes::getRoutes($app);


};
