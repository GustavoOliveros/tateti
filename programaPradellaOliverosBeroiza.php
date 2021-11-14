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
    $juegosCargados[0] = ["jugadorCruz" => "BAUTISTA", "jugadorCirculo" => "PEPE", "puntosCruz" => 3, "puntosCirculo" => 0];
    $juegosCargados[1] = ["jugadorCruz" => "ENRIQUE", "jugadorCirculo" => "BAUTISTA", "puntosCruz" => 1, "puntosCirculo" => 1];
    $juegosCargados[2] = ["jugadorCruz" => "MARIA", "jugadorCirculo" => "PEPE", "puntosCruz" => 0, "puntosCirculo" => 5];
    $juegosCargados[3] = ["jugadorCruz" => "SOFIA", "jugadorCirculo" => "MARIA", "puntosCruz" => 1, "puntosCirculo" => 1];
    $juegosCargados[4] = ["jugadorCruz" => "PEPE", "jugadorCirculo" => "BAUTISTA", "puntosCruz" => 5, "puntosCirculo" => 0];
    $juegosCargados[5] = ["jugadorCruz" => "BAUTISTA", "jugadorCirculo" => "MARIA", "puntosCruz" => 1, "puntosCirculo" => 1];
    $juegosCargados[6] = ["jugadorCruz" => "MARIA", "jugadorCirculo" => "PEPE", "puntosCruz" => 0, "puntosCirculo" => 4];
    $juegosCargados[7] = ["jugadorCruz" => "SOFIA", "jugadorCirculo" => "PEPE", "puntosCruz" => 2, "puntosCirculo" => 0];
    $juegosCargados[8] = ["jugadorCruz" => "PEPE", "jugadorCirculo" => "MARIA", "puntosCruz" => 1, "puntosCirculo" => 1];
    $juegosCargados[9] = ["jugadorCruz" => "BAUTISTA", "jugadorCirculo" => "PEPE", "puntosCruz" => 0, "puntosCirculo" => 3];

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
    $coleccionNueva = $juegosJugados;
    $coleccionNueva[$cantJuegosJugados] = $juegoNuevo;

    return $coleccionNueva;
}

/**
 * Solicita al usuario un número de opcion de menu
 * @return int 
 */
function seleccionarOpcion()
{
    //int $opcion boolean $condicion
    $condicion = false;
        echo "
        1) Jugar al tateti		
        2) Mostrar un juego		
        3) Mostrar el primer juego ganador		
        4) Mostrar porcentaje de Juegos ganados		
        5) Mostrar resumen de Jugador		
        6) Mostrar listado de juegos Ordenado por jugador O		
        7) salir \n";	
    do{
        echo"Seleccione una opcion de menu: \n";
        $opcion = trim(fgets(STDIN));
        if($opcion > 0 && $opcion <= 7){
            $condicion = true;
        }else{
            echo "Opcion invalida\n";
        }
        
    } while($condicion == false);
    return $opcion;
}


/*  con el
siguiente formato:
 */

/**
 * Mostrar un Juego: Se le solicita al usuario un número de juego y se muestra el resultado en pantalla
 * @param array $totalJuegosCargados
 */
function mostrarJuego ($totalJuegosCargados){
    //int $nj, $cantJuegos
    $cantJuegos = count($totalJuegosCargados);
    do {
        echo "Ingrese el numero de juego: ";
        $nj = trim(fgets(STDIN));
        // podriamos hacer $nj = $nj - 1; para que el usuario ingrese juego 1 y lea el indice 0
        if (!($nj >= 0) || !($nj < $cantJuegos)){ //Alternativa para mostrar mensaje de error
            echo "ERROR! el numero de juego ingresado no existe! Por favor ingrese un numero de juego valido. \n";
        }
    } while (!($nj >= 0) || !($nj < $cantJuegos)); //Repetitiva para la validacion unicamente para la primera parte

    //Alternativa con else completamente eliminada ya que quedo sin funcionalidad
    echo "**********************\n";
    // para los echos que imprimen el resultado, lo que podiamos hacer es volver a sumar el 1 que restamos
    // y muestre el valor que ingreso el usuario en un principio
    if ($totalJuegosCargados[$nj]["puntosCruz"] > $totalJuegosCargados[$nj]["puntosCirculo"]) {
        echo "Juego TATETI: " . $nj . " (ganó X) \n";
    } elseif ($totalJuegosCargados[$nj]["puntosCruz"] < $totalJuegosCargados[$nj]["puntosCirculo"]) {
        echo "Juego TATETI: " . $nj . " (ganó O) \n";
    } else {
        echo "Juego TATETI: " . $nj . " (empate) \n";
    }
    echo "Jugador X: " . $totalJuegosCargados[$nj]["jugadorCruz"] . " obtuvo " . $totalJuegosCargados[$nj]["puntosCruz"] . " puntos. \n";
    
    echo "Jugador O: " . $totalJuegosCargados[$nj]["jugadorCirculo"] . " obtuvo " . $totalJuegosCargados[$nj]["puntosCirculo"] . " puntos. \n";
    
    echo "**********************\n";
}

/**
 * Solicita el nombre de jugador y muestra en pantalla el primer juego ganado por ese jugador.
 * @param array $colecJuegos
 * 
 */

function primeraVictoria($colecJuegos){
    // int $np $i string $nombreJug
    $np = count($colecJuegos);
    $i = 0;
    echo "Ingrese el nombre del jugador: ";
    $nombreJug = trim(fgets(STDIN));
    while($i<$np && !(($nombreJug == $colecJuegos["jugadorCruz"] && $colecJuegos["puntosCruz"] > $colecJuegos["puntosCirculo"]) ||( $nombreJug = $colecJuegos["jugadorCirculo"] && $colecJuegos["puntosCruz"] < $colecJuegos["puntosCirculo"]))){
        $i++;
    }
    if ($i<$np){
        mostrarJuego($colecJuegos[$i]);
    }else{
        echo "El jugador " . $nombreJug . " no gano ningun juego. \n";
    }


}

/**
  * Muestra el porcentaje de juegos ganados, en total y segun el simbolo elegido
  *@param array $totalPartidas
  */
  function porcentajeGanados($totalPartidas){
      // int $nPart $acumX $acumO $empates $i string $simbolo $
    $nPart= count($totalPartidas);
    $acumX = 0;
    $acumO = 0;
    $empates = 0;
    for ($i = 0; $i<$nPart; $i++){
        if ($totalPartidas["puntosCruz"] > $totalPartidas["puntosCirculo"]){
            $acumX++;
        }elseif ($totalPartidas["puntosCruz"] < $totalPartidas["puntosCirculo"]){
            $acumO++;
        }else {
            $empates++;
        }
    }
    do {
      echo "Ingrese un simbolo para ver su porcentaje de victorias (X/O): ";
      $simbolo = trim(fgets(STDIN));
      if ($simbolo <> "X" || $simbolo <> "O"){
          echo "ERROR! Ingrese un simbolo valido \n";

      }
    }while ($simbolo <> "X" || $simbolo <> "O");
    
    echo "En total se jugaron " . $nPart . " juegos de tateti, de los cuales " . $empates . " son empates y " . $acumO + $acumX . " son victorias. \n";
    if ($simbolo == "X"){
        echo " X ganó el " . (($acumX / $nPart)*100) . "% de los juegos ganados. \n";
    } else{
      echo " O ganó el " . (($acumO / $nPart)*100) . "% de los juegos ganados. \n";
    }

}
/**
 * Muestra resumen del jugador. (opcion 5)
 * @param $coleccionDeJuegos
 */
function resumenJugador($coleccionDeJuegos){
    //string $nombreJugador , $resumen
    $numDeJuegos = count($coleccionDeJuegos);
    $gano = 0;
    $perdio = 0;
    $empato = 0;
    $puntosAcum = 0;
    $resumen = [];
    echo"Ingrese el nombre del jugador: ";
    $nombreJugador = trim(fgets(STDIN));
    $resumen ["nombre"] = $nombreJugador;
    for($i=0; $i<$numDeJuegos; $i++){
        if($nombreJugador == $coleccionDeJuegos["jugadorCruz"] && $coleccionDeJuegos["puntosCruz"] > $coleccionDeJuegos["puntosCirculo"] || $nombreJugador == $coleccionDeJuegos["jugadorCirculo"] && $coleccionDeJuegos["puntosCruz"] < $coleccionDeJuegos["puntosCirculo"]){
            $gano = $gano  + 1;
            $puntosAcum = $puntosAcum + $coleccionDeJuegos[$i]["puntosCruz"];
        }elseif($nombreJugador == $coleccionDeJuegos["jugadorCruz"] && $coleccionDeJuegos["puntosCruz"] < $coleccionDeJuegos["puntosCirculo"] || $nombreJugador == $coleccionDeJuegos["jugadorCirculo"] && $coleccionDeJuegos["puntosCruz"] > $coleccionDeJuegos["puntosCirculo"] ){
             $perdio = $perdio+1;
        }elseif (($nombreJugador == $coleccionDeJuegos["jugadorCruz"] || $nombreJugador == $coleccionDeJuegos["jugadorCirculo"]) && ( $coleccionDeJuegos["puntosCruz"] == $coleccionDeJuegos["puntosCirculo"])){
            $empato = $empato +1;
            $puntosAcum = $puntosAcum + 1;
        }
    }
    $resumen ["juegosGanados"] = $gano;
    $resumen ["juegosPerdidos"] = $perdio;
    $resumen ["juegosEmpatados"] = $empato;
    $resumen ["puntosAcumulados"] = $puntosAcum;
    
    echo"**********************";
    echo"Jugador: ".$resumen["nombre"]."\n";
    echo"Ganó: ".$resumen["juegosGanados"]." juegos\n";
    echo"Perdió: ".$resumen["juegosPerdidos"]." juegos\n";
    echo"Empató: ".$resumen["juegosEmpatados"]." juegos\n";
    echo"Total de puntos acumulados: ".$resumen["puntosAcumulados"]." puntos\n";
    echo"**********************\n";

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
$resumen = resumenJugador($coleccionDeJuegos);

// Mostramos menu
$opcionDeMenu = seleccionarOpcion();

// --arreglar posicion al implementar el switch 
// El resultado de la función jugar se guarda y luego se agrega a la colección mediante agregarJuegos
$juego = jugar();
$coleccionDeJuegos = agregarJuegos($coleccionDeJuegos, $juego);
mostrarJuego($coleccionDeJuegos);
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