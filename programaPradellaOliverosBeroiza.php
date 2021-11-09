<?php
include_once("tateti.php");

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */
/* Oliveros, Gustavo. FAI 3621. Tecnicatura Universitaria en Desarrollo Web. gustavo.oliveros@est.fi.uncoma.edu.ar. GustavoOliveros */
/* Pradella, Nicolás. FAI 3727. Tecnicatura Universitaria en Desarrollo Web. roberto.pradella@est.fi.uncoma.edu.ar. NPradella */
/* Beroiza, Santiago. FAI 2594. Tecnicatura Universitaria en Desarrollo Web. santiago.beroiza@est.fi.uncoma.edu.ar. BeroizaSantiago */





/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

/**
 * Crea e inicializa una colección de 10 juegos
 * @return array arreglo indexado de arreglos asociativos
 */
function cargarJuegos(){
    // array $juegosCargados

    // 10 juegos generados para hacer la precarga
    $juegosCargados[0] = ["jugadorCruz" => "bautista", "jugadorCirculo" => "pepe", "puntosCruz" => 3, "puntosCirculo" => 0];
    $juegosCargados[1] = ["jugadorCruz" => "enrique", "jugadorCirculo" => "bautista", "puntosCruz" => 1, "puntosCirculo" => 1];
    $juegosCargados[2] = ["jugadorCruz" => "maria", "jugadorCirculo" => "pepe", "puntosCruz" => 0, "puntosCirculo" => 5];
    $juegosCargados[3] = ["jugadorCruz" => "sofia", "jugadorCirculo" => "maria", "puntosCruz" => 1, "puntosCirculo" => 1];
    $juegosCargados[4] = ["jugadorCruz" => "pepe", "jugadorCirculo" => "bautista", "puntosCruz" => 5, "puntosCirculo" => 0];
    $juegosCargados[5] = ["jugadorCruz" => "bautista", "jugadorCirculo" => "maria", "puntosCruz" => 1, "puntosCirculo" => 1];
    $juegosCargados[6] = ["jugadorCruz" => "maria", "jugadorCirculo" => "pepe", "puntosCruz" => 0, "puntosCirculo" => 4];
    $juegosCargados[7] = ["jugadorCruz" => "sofia", "jugadorCirculo" => "pepe", "puntosCruz" => 2, "puntosCirculo" => 0];
    $juegosCargados[8] = ["jugadorCruz" => "pepe", "jugadorCirculo" => "maria", "puntosCruz" => 1, "puntosCirculo" => 1];
    $juegosCargados[9] = ["jugadorCruz" => "bautista", "jugadorCirculo" => "pepe", "puntosCruz" => 0, "puntosCirculo" => 3];

    return $juegosCargados;
}






/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:
// array $coleccionDeJuegos

//Inicialización de variables:


//Proceso:

// Precargamos 10 juegos
$coleccionDeJuegos = cargarJuegos(); 

$coleccionDeJuegos[10] = jugar(); //modificar/ eliminar al implementar funcion agregarJuegos
//print_r($coleccionDeJuegos);
//imprimirResultado($juego);



/*
do {
    $opcion = ...;

    
    switch ($opcion) {
        case 1: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 1

            break;
        case 2: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 2

            break;
        case 3: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 3

            break;
        
            //...
    }
} while ($opcion != X);
*/