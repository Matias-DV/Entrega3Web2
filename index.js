"use strict"

const URL = "http://localhost/tudai/Parte3/api/libros";

//Obtiene todas las tareas de la api rest
async function getAll(){

    try{
        let response = await fetch(URL);
        if (!response.ok){
            throw new Error('este recurso no existe');
        }   
        let libros = await response.json();

        showLibros(libros);
    } catch(e){
        //Tratar el error como queramos
    }
}
function showLibros(libros){
    //let ul = document.querySelector(); me traigo el contenedor donde quiero mostrar los libros
    //ul.innerHTML = "";
    for (const libro of libros){

        //let html = ´esqueleto del html junto con lo que quiero mostrar de los libros´;

        //ul.innerHTML += html;
    }
}