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
    $juegosCargados[1] = ["jugadorCruz" => "BAUTISTA", "jugadorCirculo" => "PEPE", "puntosCruz" => 3, "puntosCirculo" => 0];
    $juegosCargados[2] = ["jugadorCruz" => "ENRIQUE", "jugadorCirculo" => "BAUTISTA", "puntosCruz" => 1, "puntosCirculo" => 1];
    $juegosCargados[3] = ["jugadorCruz" => "MARIA", "jugadorCirculo" => "PEPE", "puntosCruz" => 0, "puntosCirculo" => 5];
    $juegosCargados[4] = ["jugadorCruz" => "SOFIA", "jugadorCirculo" => "MARIA", "puntosCruz" => 1, "puntosCirculo" => 1];
    $juegosCargados[5] = ["jugadorCruz" => "PEPE", "jugadorCirculo" => "BAUTISTA", "puntosCruz" => 5, "puntosCirculo" => 0];
    $juegosCargados[6] = ["jugadorCruz" => "BAUTISTA", "jugadorCirculo" => "MARIA", "puntosCruz" => 1, "puntosCirculo" => 1];
    $juegosCargados[7] = ["jugadorCruz" => "MARIA", "jugadorCirculo" => "PEPE", "puntosCruz" => 0, "puntosCirculo" => 4];
    $juegosCargados[8] = ["jugadorCruz" => "SOFIA", "jugadorCirculo" => "PEPE", "puntosCruz" => 2, "puntosCirculo" => 0];
    $juegosCargados[9] = ["jugadorCruz" => "PEPE", "jugadorCirculo" => "MARIA", "puntosCruz" => 1, "puntosCirculo" => 1];
    $juegosCargados[10] = ["jugadorCruz" => "BAUTISTA", "jugadorCirculo" => "PEPE", "puntosCruz" => 0, "puntosCirculo" => 3];

    return $juegosCargados;
}

/**
 * Agrega el arreglo resultante de una partida al arreglo que almacena todos los juegos
 * @param array $juegosJugados
 * @param array $juegoNuevo
 * @return array arreglo indexado de arreglos asociativos
 */
function agregarJuegos($juegosJugados, $juegoNuevo){
    // int $cantJuegosJugados, array $coleccionNueva

    // Se obtiene la cantidad de elementos mediante la función count
    $cantJuegosJugados = count($juegosJugados);

    // Se agrega el juego nuevo en la posición siguiente a la última (obtenida por la función count)
    $cantJuegosJugados = $cantJuegosJugados + 1;
    $coleccionNueva = $juegosJugados;
    $coleccionNueva[$cantJuegosJugados] = $juegoNuevo;

    return $coleccionNueva;
}

/**
 * Solicita al usuario un número de opcion de menu
 * @return int 
 */
function menu()
{
    //int $opcion
    do{
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
    } while(!($opcion > 0) || !($opcion <= 7));
    return $opcion;
}


/*  con el
siguiente formato:
 */

 /** Mostrar un Juego: Se le solicita al usuario un número de juego y se muestra el resultado en pantalla
  * @param array $juegosCargados
  */
  function mostrarJuego ($juegosCargados){
    //int $nj $cantJuegos
    $cantJuegos = count($juegosCargados);
    do {
        echo "Ingrese el numero de juego: ";
        $nj = trim(fgets(STDIN));
        if ($nj >= 0 || $nj <= $cantJuegos){
            echo "**********************\n";
            if ($juegosCargados[$nj]["puntosCruz"] > $juegosCargados[$nj]["puntosCirculo"]) {
                echo "Juego TATETI" . $nj . "(ganó X) \n";
            } elseif ($juegosCargados[$nj]["puntosCruz"] < $juegosCargados[$nj]["puntosCirculo"]) {
                echo "Juego TATETI" . $nj . "(ganó O) \n";
            } else {
                echo "Juego TATETI" . $nj . "(empate) \n";
            }
            echo "Jugador X" . $juegosCargados[$nj]["jugadorCruz"] . " obtuvo " . $juegosCargados[$nj]["puntosCruz"] . " puntos. \n";
        
            echo "Jugador O" . $juegosCargados[$nj]["jugadorCirculo"] . " obtuvo " . $juegosCargados[$nj]["puntosCirculo"] . " puntos. \n";
        
            echo "**********************\n";
        }else{
            echo "ERROR! el numero de juego ingresado no existe! Por favor ingrese un numero de juego valido: ";
        }
    } while (!($nj >= 0 || $nj <= $cantJuegos));
    
}

/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:
// array $coleccionDeJuegos, $juego, integer $opcionDeMenu

//Inicialización de variables:


//Proceso:

// Precargamos 10 juegos
$coleccionDeJuegos = cargarJuegos();

// Mostramos menu
$opcionDeMenu = menu();

// --arreglar posicion al implementar el switch 
// El resultado de la función jugar se guarda y luego se agrega a la colección mediante agregarJuegos
$juego = jugar();
$coleccionDeJuegos = agregarJuegos($coleccionDeJuegos, $juego);
// print_r($coleccionDeJuegos);
// --

//print_r($coleccionDeJuegos);
//imprimirResultado($juego);

/*
do {
    $opcion = ...;

    //la instrucción switch se utiliza cuando se quiere comparar una misma variable (o expresión) con muchos valores diferentes, 
    y ejecutar una parte de código distinta dependiendo de a que valor es igual.

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