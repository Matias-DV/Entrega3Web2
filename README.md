# WEB2-TRABAJOESPECIAL-PARTE3

## Integrantes

### *matias del valle - email: matiiasdelvalle@gmail.com*

### *Lucas Manuel Ferreiro Zunino - email: lferreiro.823@gmail.com*

## Tema del trabajo

Autores y libros

## Descripcion

En esta entrega creamos nuestra API RESTful de Autores y Libros donde cualquier consumidor va a poder acceder a nuestros catalogos de libros y autores, mediante el uso de los siguientes metodos **GET**,**POST**,**PUT**,**DELETE** que ya fueron testeados dentro de postman por nosotros.

## EndPoints

Aclaracion : los ejemplos de los endpoints pueden que no sean exactamentes iguales a la base de datos original, ya que al hacer pruebas la base se fue modificando en nuestro ordenador por lo que el consumidor cuando haga las pruebas puede que tengas diferente orden ya que nosotros eliminamos,modifificamos y agregamos libros.

### Endpoints de la tabla Libros

#### Obtener todos los libros (GET)

-Obtiene una coleccion de libros 

-Endpoint: http://localhost/tudai/parte3/api/libros - Aclaracion: el endpoint anterior es en nuestro caso,en el caso del consumidor debera colocar la ubicacion de donde tendra guardado los archivos del trabajo http://localhost/Ubicacion/api/libros.

-Ejemplo de respuesta del endpoint:

```json
[
    {
    "ID": 2,
    "Nombre": "12 Reglas para sobrevivir",
    "Genero": "Autoayuda",
    "Autor": 3,
    "Editorial": "Penguin Random House",
    "Foto": "https://www.planetadelibros.com.ar/usuaris/libros/fotos/290/m_libros/portada_12-reglas-para-vivir_jordan-b-peterson_201901222004.jpg"
    },
    {
    "ID": 3,
    "Nombre": "Beyond Order",
    "Genero": "Autoayuda",
    "Autor": 3,
    "Editorial": "Penguin Random House",
    "Foto": "https://store.dailywire.com/cdn/shop/products/BeyondOrder_Transparent_1400x.png?v=1665160615"
    }
]
```
### En este apartado estan los Opcionales del trabajo

-Si el consumidor lo desea puede hacer combinaciones de los opcionales.

-( 1er Opcional ) : Si el consumidor lo desea puede hacer un SORT con (ID,Nombre,Genero,Editorial,Autor) y ORDER con (ASC,DESC) pasandolos por URL.
    Aclaracion: por default sort = ID y order ASC. tal cual como se veria en la tabla de la base de datos

-Ejemplo del Opcional 1: http://localhost/tudai/parte3/api/libros?sort=Nombre&&order=DESC. 

-( 2do Opcional ) : Si el consumidor lo desea puede hacer un LIMIT con un valor entero y PAGE con un valor entero pasandolos por URL.
    Aclaracion: por default LIMIT = 2 y PAGE = 1.

-Ejemplo del Opcional 2: http://localhost/tudai/parte3/api/libros?limit=3&&page=2. 

-( 3er Opcional ) : Si el consumidor lo desea puede filtrar los libros pasando la columna a filtrar y el valor deseado, las columnas que se pueden filtrar son Nombre, Genero, Autor y Editorial.

-Ejemplo del Opcional 3:
http://localhost/tudai/parte3/api/libros?Genero=Autoayuda


#### Obtener un libro (GET)

-Obtiene un libro a eleccion pasando una id por parametro

-Endpoint: http://localhost/tudai/parte3/api/libros/ID - Aclaracion: el endpoint anterior es en nuestro caso,en el caso del consumidor debera colocar la ubicacion de donde tendra guardado los archivos del trabajo http://localhost/Ubicacion/api/libros/ID.

-Ejemplo: con id 3

```json
[
    {
    "ID": 3,
    "Nombre": "Beyond Order",
    "Genero": "Autoayuda",
    "Autor": 3,
    "Editorial": "Penguin Random House",
    "Foto": "https://store.dailywire.com/cdn/shop/products/BeyondOrder_Transparent_1400x.png?v=1665160615"
    }
]
```

#### Crear un libro (POST)

-Crea un libro para insertarlo en la tabla

-Endpoint: http://localhost/tudai/parte3/api/libros - Aclaracion: el endpoint anterior es en nuestro caso,en el caso del consumidor debera colocar la ubicacion de donde tendra guardado los archivos del trabajo http://localhost/Ubicacion/api/libros.

-Ejemplo: en el caso del autor debera colocar una id valida que sea de algun autor ya existente

```json
[
    {
    "Nombre": "El mundo Random",
    "Genero": "Random",
    "Autor": 3,
    "Editorial": "Random",
    "Foto": null
    }
]
```

#### Eliminar un libro (DELETE)

-Elimina un libro de la tabla

-Endpoint: http://localhost/tudai/parte3/api/libros/ID - Aclaracion: el endpoint anterior es en nuestro caso,en el caso del consumidor debera colocar la ubicacion de donde tendra guardado los archivos del trabajo http://localhost/Ubicacion/api/libros/ID.

-Ejemplo que funcionaria: http://localhost/tudai/parte3/api/libros/3

#### Editar un libro (PUT)

-Edita un libro de la tabla

-Endpoint: http://localhost/tudai/parte3/api/libros/ID - Aclaracion: el endpoint anterior es en nuestro caso,en el caso del consumidor debera colocar la ubicacion de donde tendra guardado los archivos del trabajo http://localhost/Ubicacion/api/libros/ID.

-Ejemplo: el ID debe ser existente y en caso del autor debe ser un ID existente tambien.

```json
[
    {
    "Nombre": "Nuevo contenido",
    "Genero": "Nuevo contenido",
    "Autor": 3,
    "Editorial": "Nuevo contenido",
    "Foto": "Nuevo contenido o null"
    }
]
```
