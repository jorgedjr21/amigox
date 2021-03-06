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
     *
     */
    $routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);

    $routes->connect('/login', ['controller' => 'Login', 'action' => 'index'],['_name' => 'login.index']);
    $routes->connect('/doLogin', ['controller' => 'Login', 'action' => 'login'],['_name' => 'do.login','_method'=>'post']);
    $routes->connect('/logout', ['controller' => 'Login', 'action' => 'logout'],['_name' => 'do.logout']);

    /**
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

    $routes->connect('/register',['controller'=>'Register','action'=>'index'],['_name'=>'register.index']);
    $routes->connect('/register/new',['controller'=>'Users','action'=>'add'],['_name'=>'register.create','_method'=>'post']);
    $routes->connect('/dashboard',['controller'=>'Users','action'=>'dashboard']);
    $routes->connect('/dashboard/profile',['controller'=>'Users','action'=>'profile'],['_name'=>'user.profile']);

    $routes->prefix('dashboard',function($routes){


        $routes->connect('/invites/',['controller'=>'Groups','action'=>'invites'],['_name'=>'groups.invites']);
        $routes->connect('/invites/group/:gid',['controller'=>'Groups','action'=>'handleInvites'],['_name'=>'groups.handleInvites']);
        $routes->connect('/groups/',['controller'=>'Groups','action'=>'index'],['_name'=>'groups.index']);

        $routes->connect('/groups/:id',['controller'=>'Groups','action'=>'view'],['_name'=>'groups.view']);

        $routes->connect('/groups/:id/sendMessage',['controller'=>'Groups','action'=>'sendMessage'],['_name'=>'groups.sendMessage','_method'=>'post']);

        $routes->connect('/groups/:id/event/:eid/sort',['controller'=>'Groups','action'=>'sort'],['_name'=>'groups.sort']);

        $routes->connect('/groups/:id/events/new',['controller'=>'Groups','action'=>'newEvent'],['_name'=>'groups.events.new']);

        $routes->connect('/groups/:id/addMember',['controller'=>'Groups','action'=>'addMember'],['_name'=>'groups.view.addMember']);
        $routes->connect('/groups/:id/addMember/:uid',['controller'=>'Groups','action'=>'addMember'],['_name'=>'groups.addMember']);

        $routes->connect('/groups/add',['controller'=>'Groups','action'=>'add'],['_name'=>'groups.add.form']);

        $routes->connect('/groups/events/:eid',['controller'=>'Groups','action'=>'viewEvent'],['_name'=>'groups.viewEvent']);

        $routes->fallbacks(DashedRoute::class);
    });
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
 * Load all plugin routes. See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();
