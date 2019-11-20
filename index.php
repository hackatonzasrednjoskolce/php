<?php

/**
 * Route map definition containing an array of routes with needed information
 * where to find action which we want to execute, and data which that action (function) requires.
 *
 * Each route definition is defined in following format:
 *
 * 'route path' => [
 *      'file' => 'path to the file containing the action we want to execute',
 *      'action' => 'name of the action (function) we want to execute for this path'
 *      'data'=> 'Optional array of parameters we want to sent to specified action'
 * ]
 */

$routeMap = [
    '/brands' => [
        'file' => 'controller/brands.php',
        'action' => 'getBrandListAction',
    ],
    '/brands/add' => [
        'file' => 'controller/brands.php',
        'action' => 'addBrandAction',
        'data' => [$_POST]
    ],
    '/cars' => [
        'file' => 'controller/cars.php',
        'action' => 'getCarListAction',
        'data' => [$_GET]
    ],
    '/cars/add' => [
        'file' => 'controller/cars.php',
        'action' => 'addCarAction',
        'data' => [$_POST]
    ],
    '/cars/edit' => [
        'file' => 'controller/cars.php',
        'action' => 'editCarAction',
        'data' => [$_GET, $_POST]
    ],
    '/cars/delete' => [
        'file' => 'controller/cars.php',
        'action' => 'deleteCarAction',
        'data' => [$_POST]
    ],
    '/' => [
        'file' => 'controller/index.php',
        'action' => 'indexAction',
    ],
];

/****************************************************************
 * Code which executes routing based on route definitions above *
 ****************************************************************/
$currentRoute = $routeMap['/'];
if (isset($_SERVER['PATH_INFO']) && isset($routeMap[$_SERVER['PATH_INFO']])) {
    $currentRoute = $routeMap[$_SERVER['PATH_INFO']];
}

require $currentRoute['file'];
call_user_func_array($currentRoute['action'], $currentRoute['data'] ?? []);
