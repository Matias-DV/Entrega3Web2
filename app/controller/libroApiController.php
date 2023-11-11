<?php
    require_once 'app/controller/apiController.php';

    require_once 'app/model/libroModel.php';

    require_once 'app/model/autorModel.php'; //se usa en el create

    class LibroApiController extends ApiController {
        private $model;

        function __construct() {
            parent::__construct();
            $this->model = new LibroModel();
        }
        function get($params = []) {
            // GET api/libros
            if (empty($params)){
                // Valores por defecto
                $sort = "ID";
                $order = "ASC";
                $limitPage = 2;
                $page = 1;
                $queryFiltro = "";
                $filtros = [];
                // Filtros
                if(isset($_GET['Nombre'])){
                    $queryFiltro = $queryFiltro . "AND Nombre = ? ";
                    array_push($filtros, $_GET['Nombre']);
                }
                if(isset($_GET['Genero'])){
                    $queryFiltro = $queryFiltro . "AND Genero = ? ";
                    array_push($filtros, $_GET['Genero']);
                }
                if(isset($_GET['Autor'])){
                    $queryFiltro = $queryFiltro . "AND Autor = ? ";
                    array_push($filtros, $_GET['Autor']);
                }
                if(isset($_GET['Editorial'])){
                    $queryFiltro = $queryFiltro . "AND Editorial = ? ";
                    array_push($filtros, $_GET['Editorial']);
                }
                // Ordenamiento
                if(isset($_GET['sort'])){
                    if($_GET['sort']=='ID'||$_GET['sort']=='Nombre'||$_GET['sort']=='Genero'||$_GET['sort']=='Autor'||$_GET['sort']=='Editorial'){
                        $sort = $_GET['sort'];
                    }else{
                        $this->view->response("No se puede ordenar por " . $_GET['sort'] , 400);
                    }
                }
                if(isset($_GET['order'])){
                    if (($_GET['order'] == 'DESC') || ($_GET['order'] == 'ASC')){
                        $order = $_GET['order'];
                    }else{
                        $this->view->response("No se puede ordenar de manera " . $_GET['order'], 400);
                    }
                }
                // Paginacion
                if(isset($_GET['limit']) || isset($_GET['page'])){
                    if(isset($_GET['limit'])){
                        if (($_GET['limit'] > 0)){
                            $limitPage = intval($_GET['limit']);
                        }else{
                            $this->view->response("El limite no puede ser " . $_GET['limit'], 400);
                        }
                    }
                    if(isset($_GET['page'])){
                        if (($_GET['page'] > 0)){
                            $page = intval($_GET['page']);
                        }else{
                            $this->view->response("El numero de la pagina no puede ser " . $_GET['order'], 400);
                        }
                    }
                    $calculoPagina = ($page - 1) * $limitPage; //Formula el cual calcula la cantidad de paginas que salteara
                    $libros = $this->model->getLibrosPaginacion($queryFiltro, $filtros, $sort,$order, $calculoPagina, $limitPage);
                }else{// GET api/libros sin paginacion
                    $libros = $this->model->getLibros($queryFiltro, $filtros, $sort,$order);
                }
                $this->view->response($libros, 200);
            }  
            //GET api/libros/ID
            else {
                $libro = $this->model->getLibro($params[':ID']);
                if ($libro){
                    $this->view->response($libro, 200);
                }else{
                    $this->view->response("El libro con id ". $params[':ID'] . " no existe.", 404);
                }
            }
        }
        function create($params = []) {
            $body = $this->getData();
            $foto = $body->Foto;
            $nombre = $body->Nombre;
            $genero = $body->Genero;
            $autor = $body->Autor;
            $editorial = $body-> Editorial;
            if(trim($foto)==""){
                $foto = null;
            }
            if (empty(trim($nombre)) || empty(trim($genero)) || empty($autor) || empty(trim($editorial))) {
                $this->view->response("Complete los datos", 400);
            } else {
                $autorDb = new AutorModel();
                if($autorDb->get($autor)){
                $id = $this->model->insert($foto, $nombre, $genero, $autor, $editorial);
                $libro = $this->model->getlibro($id);
                $this->view->response($libro, 201);
                }else{
                    $this->view->response("No se encontro el autor con id " . $autor, 404);
                }
            }
        }
        
        function update($params = []) {
            $id = $params[':ID'];
            $libro = $this->model->getLibro($id);
            if($libro) {
                $body = $this->getData();
                $foto = $body->Foto;
                $nombre = $body->Nombre;
                $genero = $body->Genero;
                $autor = $body->Autor;
                $editorial = $body-> Editorial;
                if(empty(trim($foto))){
                    $foto = null;
                }
                $autorDb = new AutorModel();
                if(empty(trim($nombre)) || empty(trim($genero)) || empty($autor) || empty(trim($editorial)) || !$autorDb->get($autor)){
                    $this->view->response('Se ingresaron datos invalidos',400);
                }else{
                    $this->model->updateLibroData($id, $foto, $nombre, $genero, $autor, $editorial);
                    $this->view->response('El libro con id='. $id .' ha sido modificada.', 200);
                }
            } else {
                $this->view->response('El libro con id='. $id .' no existe.', 404);
            }
        }

        function delete($params = []) {
            $id = $params[':ID'];
            $libro = $this->model->getLibro($id);

            if($libro) {
                $this->model->deleteLibro($id);
                $this->view->response('El libro con id='.$id.' ha sido borrado.', 200);
            } else {
                $this->view->response('El libro con id='.$id.' no existe.', 404);
            }
        }
    }