# WEB2-TRABAJOESPECIAL-PARTE3

## Integrantes

### *matias del valle - email: matiiasdelvalle@gmail.com*

### *Lucas Manuel Ferreiro Zunino - email: lferreiro.823@gmail.com*

## Tema del trabajo

Autores y libros

## Descripcion

En esta entrega creamos nuestra API RESTful de Autores y Libros donde cualquier consumidor va a poder acceder a nuestros catalogos de libros y autores, mediante el uso de los siguientes metodos **GET**,**POST**,**PUT**,**DELETE** que ya fueron testeados dentro de postman por nosotros.

## EndPoints

### Endpoints de la tabla Libros

#### Obtener todos los libros (GET)

-Obtiene una coleccion de libros 

-Endpoint: http://localhost/tudai/parte3/api/libros Aclaracion: el endpoint anterior es en nuestro caso,en el caso del consumidor debera colocar la ubicacion de donde tendra guardado los archivos del trabajo http://localhost/Ubicacion/api/libros.

-(Opcional)Si el consumidor lo desea puede hacer un SORT con (ID,Nombre,Genero,Editorial,Autor) y ORDER con (ASC,DESC) pasandolos por URL.

-Ejemplo:

```json
{
"ID": 2,
"Nombre": "12 Reglas para sobrevivir",
"Genero": "Autoayuda",
"Autor": 3,
"Editorial": "Penguin Random House",
"Foto": "https://www.planetadelibros.com.ar/usuaris/libros/fotos/290/m_libros/portada_12-reglas-para-vivir_jordan-b-peterson_201901222004.jpg"
}
```

```json
{
"ID": 3,
"Nombre": "Beyond Order",
"Genero": "Autoayuda",
"Autor": 3,
"Editorial": "Penguin Random House",
"Foto": "https://store.dailywire.com/cdn/shop/products/BeyondOrder_Transparent_1400x.png?v=1665160615"
}
```

#### Obtener un libro (GET)

-Obtiene un libro a eleccion pasando una id por parametro

-Endpoint: http://localhost/tudai/parte3/api/libros/ID Aclaracion: el endpoint anterior es en nuestro caso,en el caso del consumidor debera colocar la ubicacion de donde tendra guardado los archivos del trabajo http://localhost/Ubicacion/api/libros/ID.

-Ejemplo: con id 3

```json
{
"ID": 3,
"Nombre": "Beyond Order",
"Genero": "Autoayuda",
"Autor": 3,
"Editorial": "Penguin Random House",
"Foto": "https://store.dailywire.com/cdn/shop/products/BeyondOrder_Transparent_1400x.png?v=1665160615"
}
```

#### Crear un libro (POST)

-Crea un libro para insertarlo en la tabla

-Endpoint: http://localhost/tudai/parte3/api/libros Aclaracion: el endpoint anterior es en nuestro caso,en el caso del consumidor debera colocar la ubicacion de donde tendra guardado los archivos del trabajo http://localhost/Ubicacion/api/libros.

-Ejemplo: en el caso del autor debera colocar una id valida que sea de algun autor ya existente

```json
{
"Nombre": "El mundo Random",
"Genero": "Random",
"Autor": 3,
"Editorial": "Random",
"Foto": null
}
```

#### Eliminar un libro (DELETE)

-Elimina un libro de la tabla

-Endpoint: http://localhost/tudai/parte3/api/libros/ID Aclaracion: el endpoint anterior es en nuestro caso,en el caso del consumidor debera colocar la ubicacion de donde tendra guardado los archivos del trabajo http://localhost/Ubicacion/api/libros/ID.

-Ejemplo que funcionaria: http://localhost/tudai/parte3/api/libros/3

#### Editar un libro (PUT)

-Elimina un libro de la tabla

-Endpoint: http://localhost/tudai/parte3/api/libros/ID Aclaracion: el endpoint anterior es en nuestro caso,en el caso del consumidor debera colocar la ubicacion de donde tendra guardado los archivos del trabajo http://localhost/Ubicacion/api/libros/ID.

-Ejemplo: el ID debe ser existente y en caso del autor debe ser un ID existente tambien.

```json
{
"ID" :3,
"Nombre": "Nuevo contenido",
"Genero": "Nuevo contenido",
"Autor": 3,
"Editorial": "Nuevo contenido",
"Foto": "Nuevo contenido o null"
}
```































