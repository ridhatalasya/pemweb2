<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->group('auth', function ($routes) {
    $routes->get('login', 'Auth::login');
    $routes->post('login', 'Auth::login');

    $routes->get('register', 'Auth::register');
    $routes->post('register', 'Auth::register');

    $routes->get('logout', 'Auth::logout');
});

$routes->group(
    'user',
    ['filter' => 'auth'],
    function ($routes) {
        $routes->get('/', 'User\Dashboard::index');

        // event
        $routes->get('event', 'User\Event::index');
        $routes->get('event/create', 'User\Event::create');
        $routes->post('event/create', 'User\Event::create');

        // tiket
        $routes->get('tiket', 'User\Tiket::index');

        // pembelian
        $routes->get('pembelian', 'User\Pembelian::index');
    }
);

$routes->group(
    'admin',
    ['filter' => 'auth'],
    function ($routes) {
        $routes->get('/', 'Admin\Dashboard::index');
        // event
        $routes->get('event', 'Admin\Event::index');
        $routes->get('event/update/(:num)', 'Admin\Event::update/$1');
        $routes->post('event/update/(:num)', 'Admin\Event::update/$1');
        $routes->delete('event/(:num)', 'Admin\Event::delete/$1');
        $routes->get('event/detail/(:num)', 'Admin\Event::detail/$1');

        // pengguna
        $routes->get('pengguna', 'Admin\Pengguna::index');
        $routes->get('pengguna/create', 'Admin\Pengguna::create');
        $routes->post('pengguna/create', 'Admin\Pengguna::create');
        $routes->get('pengguna/update/(:num)', 'Admin\Pengguna::update/$1');
        $routes->post('pengguna/update/(:num)', 'Admin\Pengguna::update/$1');
        $routes->delete('pengguna/(:num)', 'Admin\Pengguna::delete/$1');

        // tiket
        $routes->get('tiket', 'Admin\Tiket::index');
    }
);
