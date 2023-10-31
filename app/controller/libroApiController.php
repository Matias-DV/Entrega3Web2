<?php
    require_once 'app/controllers/api.controller.php';

    require_once 'app/models/task.model.php';

    class LibroApiController extends ApiController {
        private $model;

        function __construct() {
            parent::__construct();
            $this->model = new LibroModel();
        }
        function get($params = []) {
            if (empty($params)){
                $sort = "ID";
                $order = "ASC";
                if(isset($_GET['sort'])&&($_GET['sort']=='ID'||$_GET['sort']=='Nombre'||$_GET['sort']=='Genero'||$_GET['sort']=='Autor'||$_GET['sort']=='Editorial')){
                    $sort = $_GET['sort'];
                }
                if(isset($_GET['order'])&&($_GET['order']=='DESC')||($_GET['order']=='DESC')){
                    $order = $_GET['order'];
                }
                $libros = $this->model->getLibros($sort,$order);
                $this->view->response($libros, 200);
            } else {
                $libro = $this->model->getLibro($params[':ID']);
                if ($libro){
                    $this->view->response("El libro con id ". $params[':ID'] . " no existe.", 404);
                }else{
                    $this->view->response($libro, 200);
                }
            }
        }
    }