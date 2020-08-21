<?php

use App\Handler\MainPageHandler;
use Slim\App;

return function (App $app) {
    $app->get('/[{name}]', MainPageHandler::class)->setName('home');
};
