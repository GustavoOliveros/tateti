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

/**
 * Solicita al usuario un número de opcion de menu
 * @return int 
 */
function menu()
{
    //int $opcion
    echo "
    1) Jugar al tateti		
    2) Mostrar un juego		
    3) Mostrar el primer juego ganador		
    4) Mostrar porcentaje de Juegos ganados		
    5) Mostrar resumen de Jugador		
    6) Mostrar listado de juegos Ordenado por jugador O		
    7) salir \n";	

    echo"Seleccione una opcion de menu: \n";
    $opcion = trim(fgets(STDIN));
    return $opcion;
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

// Apartado del menu de opciones 
$opcionDeMenu = menu();//Arreglar posicion cuando sea utilizado

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