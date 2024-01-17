<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
#$routes->get('/', 'Home::index');


//******************************************* */
//  ACCESO AL SISTEMA Y LOGIN
//******************************************* */
$routes->get('/registro','Portal\Registro::index');
$routes->post('/registrar_usuario', 'Portal\Registro::registrar', ['as' => 'registro']);
$routes->get('/inicio','Portal\Iniciou::index');
$routes->get('/login','Portal\Login::index');
$routes->post('/validar_inicio','Portal\Login::validar',['as'=>'validar_inicio']);
$routes->get('/inicio','Portal\Iniciou::index');
$routes->get('/obtener-conferencias-actuales', 'Portal\Iniciou::obtenerConferenciasActuales');
$routes->post('/opcion-seleccionada', 'Portal\Iniciou::registrar_conferencia_us');
$routes->get('/cerrar','Usuario\Cerrar_acceso::index',['as'=>'cerrar']);
$routes->get('/perfil', 'Usuario\Perfil::index', ['as' => 'perfil']);


//******************************************* */
//  PANEL
//******************************************* */
$routes->get('/dashboard','Panel\Dashboard::index',['as'=>'dashboard']);
$routes->get('/usuarios','Panel\Usuarios::index',['as'=>'usuarios']);
$routes->get('/eliminar_usuario/(:num)', 'Panel\Usuarios::eliminar/$1', ['as' => 'eliminar_usuario']);
$routes->get('/conferencias','Panel\Conferencias::index',['as'=>'conferencias']);
$routes->get('/nueva_conferencia','Panel\Conferencia_nueva::index',['as'=>'nueva_conferencia']);
$routes->post('/registrar_conferencia', 'Panel\Conferencia_nueva::registrar', ['as' => 'registrar_conferencia']);
$routes->get('/conferencia_detalles/(:num)','Panel\Conferencia_detalles::index/$1',['as'=>'conferencia_detalles']);
$routes->post('/editar_conferencia', 'Panel\Conferencia_detalles::editar', ['as' => 'editar_conferencia']);
$routes->get('/eliminar_conferencia/(:num)', 'Panel\Conferencias::eliminar/$1', ['as' => 'eliminar_conferencia']);







//=======================================================
// RUTAS PARA LOS ERRORES DEL SISTEMA
//=======================================================
$routes->get('/error_401', 'Errores\Error_401::index', ['as' => 'error_401']);

