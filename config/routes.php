<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 */
Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {
    /**
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Pages/home.ctp)...
     */
    // $routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);
    // $routes->connect('/', ['controller' => 'ServerApi', 'action' => 'index']);
    // $routes->connect('/logviewer.php', ['controller' => 'ServerApi', 'action' => 'logviewer']);


/* Begin API Server */
    $routes->connect('/api/v1/insertTicketByMachine', ['controller' => 'ServerApi', 'action' => 'insertTicketByMachine']);
    $routes->connect('/api/v1/checkTicket', ['controller' => 'ServerApi', 'action' => 'checkQrcode']);
    $routes->connect('/api/v1/checkInOutStaff', ['controller' => 'ServerApi', 'action' => 'checkInOutStaff']);
    $routes->connect('/api/v1/updateBusPosition', ['controller' => 'ServerApi', 'action' => 'updateBusPosition']);
    $routes->connect('/api/v1/updateDevicePosition', ['controller' => 'ServerApi', 'action' => 'updateDevicePosition']);
/* End API Server */    

/* Begin Manager */
    $routes->connect('/administrator/users', ['controller' => 'Administrator', 'action' => 'users']);
    $routes->connect('/administrator/user/:id', ['controller' => 'Administrator', 'action' => 'user', 'id' => '[0-9]+']);
    $routes->connect('/administrator/users/add', ['controller' => 'Administrator', 'action' => 'addUser']);
    $routes->connect('/administrator/users/edit', ['controller' => 'Administrator', 'action' => 'editUser']);
    
    $routes->connect('/administrator/roles', ['controller' => 'Administrator', 'action' => 'roles']);
    $routes->connect('/administrator/roles/add', ['controller' => 'Administrator', 'action' => 'addRole']);
    $routes->connect('/administrator/roles/edit/:id', ['controller' => 'Administrator', 'action' => 'editRole', 'id' => '[0-9]+']);
    $routes->connect('/administrator/roles/delete/:id', ['controller' => 'Administrator', 'action' => 'deleteRole', 'id' => '[0-9]+']);
/* End Manager */

/* Begin Staffs */
    $routes->connect('/administrator/staffs', ['controller' => 'Staffs', 'action' => 'index']);
    $routes->connect('/administrator/staff/:id', ['controller' => 'Staffs', 'action' => 'user', 'id' => '[0-9]+']);
/* End Staffs */

    /**
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    // $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `DashedRoute`, the `fallbacks` method is a shortcut for
     *    `$routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);`
     *    `$routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);`
     *
     * Any route class can be used with this method, such as:
     * - DashedRoute
     * - InflectedRoute
     * - Route
     * - Or your own route class
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $routes->fallbacks(DashedRoute::class);
});

/**
 * Load all plugin routes.  See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();
