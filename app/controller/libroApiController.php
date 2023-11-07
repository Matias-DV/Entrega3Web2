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
        //trabajo 2 rutas en una misma funcion
        function get($params = []) {
            //if donde no viene con parametros
            if (empty($params)){
                $sort = "ID";
                $order = "ASC";
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
                $libros = $this->model->getLibros($sort,$order);
                $this->view->response($libros, 200);
            }  
            //else donde si viene con un parametro ID
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

            if (empty($nombre) || empty($genero) || empty($autor) || empty($editorial)) {
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
                
                $this->model->updateLibroData($id, $foto, $nombre, $genero, $autor, $editorial);

                $this->view->response('El libro con id='. $id .' ha sido modificada.', 200);
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