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
 * 1) Crea e inicializa una colección de 10 juegos
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
 * 2) Solicita al usuario un número de opcion de menu
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

// 3) La función solicitarNumeroEntre ya se encuentra en tateti.php

/**
 * 4) Mostrar un Juego: Se le solicita al usuario un número de juego y se muestra el resultado en pantalla
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
 * 5) Agrega el arreglo resultante de una partida al arreglo que almacena todos los juegos
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
 * 6) Retorna el índice del primer juego ganado del jugador ingresado
 * @param array $colecJuegos
 * @param string $nombreJug
 * @return int retorna -1 si el jugador no ganó nada
 */
function primeraVictoria($colecJuegos, $nombreJug){
    // int $cont, $indice, $numPartidas, boolean $bandera

    $numPartidas = count($colecJuegos);
    $cont = 0;
    $bandera = true;

    while($bandera == true){
        // Determino si la persona es el jugador Cruz
        if(($nombreJug == $colecJuegos[$cont]["jugadorCruz"])){
            // Si es así, determino si ganó
            if($colecJuegos[$cont]["puntosCruz"] > $colecJuegos[$cont]["puntosCirculo"]){
                // Si ganó, asigno false a la bandera para terminar la repetitiva
                $bandera = false;   
            }
        // Como no es Cruz, determino si la persona es el jugador Circulo
        } elseif($nombreJug == $colecJuegos[$cont]["jugadorCirculo"]){
            // Si es así, determino si ganó.
            if($colecJuegos[$cont]["puntosCirculo"] > $colecJuegos[$cont]["puntosCruz"]){
                // Si ganó, asigno false a la bandera para terminar la repetitiva
                $bandera = false;
            }
        }
        $cont++;
        
        // Si ya revisó todas las partidas y no ganó ninguna, asigno false para prevenir repetitiva infinita
        if($cont == $numPartidas){
            $bandera = false;
        }
    }

    // Asigna -1 si no hubo victorias. Caso contrario, le asigna el indice que sería el contador
    if($cont == $numPartidas){
        $indice = -1;
    } else{
        // Ya que el primer indice es el 0, se tiene que restar 1
        $indice = $cont - 1;
    }

    return $indice;
}

/* Se tendría que implementar las funciones 8, 9 y 10 en PorcentajeGanados o sacarlo y hacer dicho calculo en el programa principal */
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
 * 7) Muestra resumen del jugador. (opcion 5)
 * @param array $coleccionDeJuegos
 * @param string $nombre
 */
function resumenJugador($coleccionDeJuegos, $nombreJugador){
    //INTEGER $gano, $perdio, $empato, $puntosAcum, STRING $nombreJugador, ARRAY $resumen
    $numDeJuegos = count($coleccionDeJuegos);
    $gano = 0;
    $perdio = 0;
    $empato = 0;
    $puntosAcum = 0;
    $resumen["nombre"] = $nombreJugador; //preguntar si el ingreso del nombre es por el modulo o por programa principal

    for($i=0; $i < $numDeJuegos; $i++){
        if($nombreJugador == $coleccionDeJuegos[$i]["jugadorCruz"] && $coleccionDeJuegos[$i]["puntosCruz"] > $coleccionDeJuegos[$i]["puntosCirculo"] || $nombreJugador == $coleccionDeJuegos[$i]["jugadorCirculo"] && $coleccionDeJuegos[$i]["puntosCruz"] < $coleccionDeJuegos[$i]["puntosCirculo"]){
            $gano = $gano + 1;
            $puntosAcum = $puntosAcum + $coleccionDeJuegos[$i]["puntosCruz"];
        }elseif($nombreJugador == $coleccionDeJuegos[$i]["jugadorCruz"] && $coleccionDeJuegos[$i]["puntosCruz"] < $coleccionDeJuegos[$i]["puntosCirculo"] || $nombreJugador == $coleccionDeJuegos[$i]["jugadorCirculo"] && $coleccionDeJuegos[$i]["puntosCruz"] > $coleccionDeJuegos[$i]["puntosCirculo"] ){
             $perdio = $perdio + 1;
        }elseif (($nombreJugador == $coleccionDeJuegos[$i]["jugadorCruz"] || $nombreJugador == $coleccionDeJuegos[$i]["jugadorCirculo"]) && ( $coleccionDeJuegos[$i]["puntosCruz"] == $coleccionDeJuegos[$i]["puntosCirculo"])){
            $empato = $empato + 1;
            $puntosAcum = $puntosAcum + 1;
        }
    }
    $resumen ["juegosGanados"] = $gano;
    $resumen ["juegosPerdidos"] = $perdio;
    $resumen ["juegosEmpatados"] = $empato;
    $resumen ["puntosAcumulados"] = $puntosAcum;
    
    echo"**********************\n";
    echo"Jugador: ".$resumen["nombre"]."\n";
    echo"Ganó: ".$resumen["juegosGanados"]." juegos\n";
    echo"Perdió: ".$resumen["juegosPerdidos"]." juegos\n";
    echo"Empató: ".$resumen["juegosEmpatados"]." juegos\n";
    echo"Total de puntos acumulados: ".$resumen["puntosAcumulados"]." puntos\n";
    echo"**********************\n";
}

/**
 * 8) Funcion que le pide que se ingrese un simbolo X o O
 * @return string
 */
function elegirSimbolo(){
    //string $simbolo, boolean $valorSimbolo;
    $valorSimbolo = false;
     do{  
        echo"Ingrese un simbolo 'X' o 'O': ";
        $simbolo = strtoupper(trim(fgets(STDIN)));
        if($simbolo  == "X" || $simbolo == "O"){
            $valorSimbolo = true;
        }else{
            echo"Simbolo invalido\n";
        }
    }while ($valorSimbolo == false);
    
    return $simbolo;   
}

/* FALTA 9 */
/* Implementar una función que dada una colección de juegos retorne la cantidad de juegos ganados (sin
importar si es X o O, es decir, algun jugador debe haber ganado, no debe haber empate.) */

/**
 * 10) Retorna la cantidad de victoria del símbolo de entrada
 * @param array $coleccionJuegosJugados
 * @param string $simboloAVerificar (X/O)
 */
function victoriasPorSimbolo($coleccionJuegosJugados, $simboloAVerificar){
    // int $numJuegos, $juegosGanados
    $numJuegos = count($coleccionJuegosJugados);

    $juegosGanados = 0;

    if($simboloAVerificar == "X"){
        for($i = 0; $i < $numJuegos; $i++){
           if($coleccionJuegosJugados[$i]["puntosCruz"] > $coleccionJuegosJugados[$i]["puntosCirculo"]){
              $juegosGanados = $juegosGanados + 1;
           }
        }
    } else{
        for($i = 0; $i < $numJuegos; $i++){
            if($coleccionJuegosJugados[$i]["puntosCirculo"] > $coleccionJuegosJugados[$i]["puntosCruz"]){
                $juegosGanados = $juegosGanados + 1;
            }
        }
    }
    return $juegosGanados;
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

/* Instrucciones para probar modulos. Se puede reutilizar para el programa principal
6)
echo "Ingrese el nombre que desea buscar su primera victoria: \n";
$nom = strtoupper(trim(fgets(STDIN)));

$primVictoria = primeraVictoria($coleccionDeJuegos, $nom);

if($primVictoria > -1){
    echo "La primera victoria de " . $nom . " fue en la partida #" . $primVictoria;
} else{
    echo $nom . " no ganó ninguna partida.";
}

10)
echo "***** Partidas ganadas *****\n";
$simboloElegido = elegirSimbolo();
$partGanadas = victoriasPorSimbolo($coleccionDeJuegos, $simboloElegido);
echo $simboloElegido . " ganó " . $partGanadas . "\n";
$resumen = resumenJugador($coleccionDeJuegos, "PEPE"); */

// Mostramos menu
$opcionDeMenu = seleccionarOpcion();

// --arreglar posicion al implementar el switch 
// El resultado de la función jugar se guarda y luego se agrega a la colección mediante agregarJuegos
$juego = jugar();
$coleccionDeJuegos = agregarJuegos($coleccionDeJuegos, $juego);
mostrarJuego($coleccionDeJuegos);

//Funcion de menu resumen (opcion 5)
echo "Ingrese el nombre del jugador de quien desea obtener el resumen: \n";
$resumNom = trim(fgets(STDIN));
$resumen = resumenJugador($coleccionDeJuegos, $resumNom);

//Funcion que ingresa X o O y lo devuelve
$simbolo = elegirSimbolo();

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