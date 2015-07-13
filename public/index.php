<?php
/**
 * Skeleton application based on zend-stratigility
 * for general purpose PHP web application based on middleware and PSR-7
 *
 * @author Enrico Zimuel (enrico@zend.com)
 */

/**
 * This makes our life easier when dealing with paths. Everything is relative
 * to the application root now.
 */
chdir(dirname(__DIR__));

use Zend\Stratigility\MiddlewarePipe;
use Zend\Stratigility\Dispatch\MiddlewareDispatch;
use Zend\Diactoros\Server;

require 'vendor/autoload.php';

$app = new MiddlewarePipe();
$app->pipe('/', MiddlewareDispatch::factory(require 'app/config/route.php'));

$server = Server::createServer($app, $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES);
$server->listen();
