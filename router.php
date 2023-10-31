<?php
    require_once 'config.php';
    require_once 'libs/router.php';

    $router = new Router();

    #                 endpoint      verbo     controller           método
    //Libros
    $router->addRoute('libros',     'GET',    'LibroApiController', 'get'   );

    // //hacer
    // $router->addRoute('libro',     'POST',   'LibroApiController', 'create');
    // //hacer
    // $router->addRoute('libro/:ID', 'GET',    'LibroApiController', 'get'   );
    // //hacer
    // $router->addRoute('libro/:ID', 'PUT',    'LibroApiController', 'update');
    // //hacer
    // $router->addRoute('libro/:ID', 'DELETE', 'LibroApiController', 'delete');

    // //Autores
    // //hacer
    // $router->addRoute('autor',     'GET',    'AutorApiController', 'get'   );
    // //hacer
    // $router->addRoute('autor',     'POST',   'AutorApiController', 'create');
    // //hacer
    // $router->addRoute('autor/:ID', 'GET',    'AutorApiController', 'get'   );
    // //hacer
    // $router->addRoute('autor/:ID', 'PUT',    'AutorApiController', 'update');
    // //hacer
    // $router->addRoute('autor/:ID', 'DELETE', 'AutorApiController', 'delete');
    
    //acomodar la guia para orden 
    //$router->addRoute('tareas/:ID/:subrecurso', 'GET',    'TaskApiController', 'get'   );
    

    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);