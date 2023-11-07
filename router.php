<?php
    require_once 'config.php';
    require_once 'libs/router.php';
    require_once 'app/controller/libroApiController.php';

    $router = new Router();

    #                 endpoint      verbo     controller           método
    //Libros
    $router->addRoute('libros',     'GET',    'LibroApiController', 'get'   );

    $router->addRoute('libros',     'POST',   'LibroApiController', 'create');

    $router->addRoute('libros/:ID', 'GET',    'LibroApiController', 'get'   );
    
    $router->addRoute('libros/:ID', 'PUT',    'LibroApiController', 'update');

    $router->addRoute('libros/:ID', 'DELETE', 'LibroApiController', 'delete');
    

    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);