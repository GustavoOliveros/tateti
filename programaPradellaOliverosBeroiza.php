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
    // array $colecJuegos

    // 10 juegos generados para hacer la precarga
    $colecJuegos[0] = ["jugadorCruz" => "BAUTISTA", "jugadorCirculo" => "PEPE", "puntosCruz" => 0, "puntosCirculo" => 3];
    $colecJuegos[1] = ["jugadorCruz" => "ENRIQUE", "jugadorCirculo" => "BAUTISTA", "puntosCruz" => 1, "puntosCirculo" => 1];
    $colecJuegos[2] = ["jugadorCruz" => "MARIA", "jugadorCirculo" => "PEPE", "puntosCruz" => 0, "puntosCirculo" => 5];
    $colecJuegos[3] = ["jugadorCruz" => "SOFIA", "jugadorCirculo" => "MARIA", "puntosCruz" => 1, "puntosCirculo" => 1];
    $colecJuegos[4] = ["jugadorCruz" => "PEPE", "jugadorCirculo" => "BAUTISTA", "puntosCruz" => 5, "puntosCirculo" => 0];
    $colecJuegos[5] = ["jugadorCruz" => "BAUTISTA", "jugadorCirculo" => "MARIA", "puntosCruz" => 1, "puntosCirculo" => 1];
    $colecJuegos[6] = ["jugadorCruz" => "MARIA", "jugadorCirculo" => "PEPE", "puntosCruz" => 0, "puntosCirculo" => 4];
    $colecJuegos[7] = ["jugadorCruz" => "SOFIA", "jugadorCirculo" => "PEPE", "puntosCruz" => 2, "puntosCirculo" => 0];
    $colecJuegos[8] = ["jugadorCruz" => "PEPE", "jugadorCirculo" => "MARIA", "puntosCruz" => 1, "puntosCirculo" => 1];
    $colecJuegos[9] = ["jugadorCruz" => "BAUTISTA", "jugadorCirculo" => "PEPE", "puntosCruz" => 0, "puntosCirculo" => 3];

    return $colecJuegos;
}

/**
 * 2) Solicita al usuario un número de opcion de menu
 * @return int 
 */
function seleccionarOpcion(){
    //int $opcion
        echo "
        *****************
        1) Jugar al tateti		
        2) Mostrar un juego		
        3) Mostrar el primer juego ganador		
        4) Mostrar porcentaje de Juegos ganados		
        5) Mostrar resumen de Jugador		
        6) Mostrar listado de juegos Ordenado por jugador O		
        7) Salir
        *********************\n";
    echo ">>>>>>> Seleccione una opcion de menu: ";
    // Usamos la función solicitarNumeroEntre de tateti.php, la cual se encarga de que la entrada sea válida
    $opcion = solicitarNumeroEntre(1, 7);

    return $opcion;
}

// 3) La función solicitarNumeroEntre ya se encuentra en tateti.php

/**
 * 4) Muestra un juego en pantalla dado una colección de juegos y el número del juego
 * @param array $colecJuegos
 * @param int $nj número de juego
 */
function mostrarJuego ($colecJuegos, $nj){
    echo "**********************\n";
    if ($colecJuegos[$nj]["puntosCruz"] > $colecJuegos[$nj]["puntosCirculo"]) {
        echo "Juego TATETI: " . $nj . " (ganó X) \n";
    } elseif ($colecJuegos[$nj]["puntosCruz"] < $colecJuegos[$nj]["puntosCirculo"]) {
        echo "Juego TATETI: " . $nj . " (ganó O) \n";
    } else {
        echo "Juego TATETI: " . $nj . " (empate) \n";
    }
    echo "Jugador X: " . $colecJuegos[$nj]["jugadorCruz"] . " obtuvo " . $colecJuegos[$nj]["puntosCruz"] . " puntos. \n";
    
    echo "Jugador O: " . $colecJuegos[$nj]["jugadorCirculo"] . " obtuvo " . $colecJuegos[$nj]["puntosCirculo"] . " puntos. \n";
    
    echo "**********************\n";
}

/**
 * 5) Agrega el arreglo resultante de una partida al arreglo que almacena todos los juegos
 * @param array $colecJuegos
 * @param array $juegoNuevo
 * @return array arreglo indexado de arreglos asociativos
 */
function agregarJuegos($colecJuegos, $juegoNuevo){
    // int $cantcolecJuegos, array $coleccionNueva

    // Se obtiene la cantidad de elementos mediante la función count (la función retorna la cantidad de elementos del arreglo)
    $cantColecJuegos = count($colecJuegos);

    // Se agrega el juego nuevo en la posición siguiente a la última (obtenida por la función count)
    $coleccionNueva = $colecJuegos;
    $coleccionNueva[$cantColecJuegos] = $juegoNuevo;

    return $coleccionNueva;
}

/**
 * 6) Función auxiliar para primeraVictoria
 * @param array $colecJuegos
 * @param int $numJuego
 * @param string $nombreJug
 * @return boolean true si ganó, false si no ganó
 */
function esGanador($colecJuegos, $numJuego, $nombreJug){
    // boolean $bandera

    // Inicialización de variables
    $bandera = false;

    // Determino si el nombre concuerda con el jugador Cruz
    if($nombreJug == $colecJuegos[$numJuego]["jugadorCruz"]){
        // Si es así, determino si ganó
        if($colecJuegos[$numJuego]["puntosCruz"] > $colecJuegos[$numJuego]["puntosCirculo"]){
            // Si ganó, asigno true a la bandera y la retorna al final
            $bandera = true;   
        }
    // Como no es Cruz, determino si la persona es el jugador Circulo
    } elseif($nombreJug == $colecJuegos[$numJuego]["jugadorCirculo"]){
        // Si es así, determino si ganó.
        if($colecJuegos[$numJuego]["puntosCirculo"] > $colecJuegos[$numJuego]["puntosCruz"]){
            // Si ganó, asigno true a la bandera y la retorna al final
            $bandera = true;
        }
    }

    return $bandera;
}


/**
 * 6) Retorna el índice del primer juego ganado del jugador ingresado
 * @param array $colecJuegos
 * @param string $nombreJug
 * @return int retorna indice del juego o -1 si el jugador no ganó nada
 */
function primeraVictoria($colecJuegos, $nombreJug){
    // int $cont, $indice, $cantJuegos, boolean $bandera

    // Inicialización de variables
    $cantJuegos = count($colecJuegos);
    $cont = 0;

    // Recorrido parcial. Se va detener cuando encuentra la primera victoria
    while($cont < $cantJuegos && !esGanador($colecJuegos, $cont, $nombreJug)){
        $cont++;
    }

    // Si hay menor cantidad de ciclos que juegos (encontró su primera victoria) retorna el contador
    if($cont < $cantJuegos){
        $indice = $cont;
    } else{
        // Sino retorna -1
        $indice = -1;
    }

    return $indice;
}

/**
 * 7) Muestra resumen del jugador. (opcion 5)
 * @param array $colecJuegos
 * @param string $nombreJugador
 * @return array arreglo asociativo
 */
function resumenJugador($colecJuegos, $nombreJugador){
    //INTEGER $gano, $perdio, $empato, $puntosAcum, STRING $nombreJugador, ARRAY $resumen

    // Inicialización de variables
    $numDeJuegos = count($colecJuegos);
    $gano = 0;
    $perdio = 0;
    $empato = 0;
    $puntosAcum = 0;

    // Asignamos el parametro $nombre a la clave "nombre"
    $resumen["nombre"] = $nombreJugador;

    // Hacemos recorrido exhaustivo del array para obtener todos los datos del jugador
    for($i=0; $i < $numDeJuegos; $i++){
        if($nombreJugador == $colecJuegos[$i]["jugadorCruz"] && $colecJuegos[$i]["puntosCruz"] > $colecJuegos[$i]["puntosCirculo"] || $nombreJugador == $colecJuegos[$i]["jugadorCirculo"] && $colecJuegos[$i]["puntosCruz"] < $colecJuegos[$i]["puntosCirculo"]){
            $gano = $gano + 1;
            $puntosAcum = $puntosAcum + $colecJuegos[$i]["puntosCruz"] + $colecJuegos[$i]["puntosCirculo"];
        }elseif($nombreJugador == $colecJuegos[$i]["jugadorCruz"] && $colecJuegos[$i]["puntosCruz"] < $colecJuegos[$i]["puntosCirculo"] || $nombreJugador == $colecJuegos[$i]["jugadorCirculo"] && $colecJuegos[$i]["puntosCruz"] > $colecJuegos[$i]["puntosCirculo"] ){
             $perdio = $perdio + 1;
        }elseif (($nombreJugador == $colecJuegos[$i]["jugadorCruz"] || $nombreJugador == $colecJuegos[$i]["jugadorCirculo"]) && ( $colecJuegos[$i]["puntosCruz"] == $colecJuegos[$i]["puntosCirculo"])){
            $empato = $empato + 1;
            $puntosAcum = $puntosAcum + 1;
        }
    }

    //Asignamos los datos a sus respectivas claves y retornamos el arreglo
    $resumen ["juegosGanados"] = $gano;
    $resumen ["juegosPerdidos"] = $perdio;
    $resumen ["juegosEmpatados"] = $empato;
    $resumen ["puntosAcumulados"] = $puntosAcum;

    return $resumen;
}

/**
 * 8) Funcion que pide y verifica que se ingrese un simbolo X o O
 * @return string
 */
function elegirSimbolo(){
    //string $simbolo, boolean $valorSimbolo;

    // Inicialización de variablesW
    $valorSimbolo = false;

     do{  
        echo"Ingrese un simbolo 'X' o 'O': ";
        $simbolo = strtoupper(trim(fgets(STDIN))); //strtoupper convierte a todos los carácteres en mayúsculas
        if($simbolo  == "X" || $simbolo == "O"){
            $valorSimbolo = true;
        }else{
            echo"Simbolo inválido.\n";
        }
    // Se repetirá hasta que el usuario ingrese X o O
    }while ($valorSimbolo == false);
    
    return $simbolo;   
}


/**
 * 9) Funcion que dada una colección de juegos retorna la cantidad de juegos ganados (sin empates)
 * @param array $colecJuegos
 * @return integer
 */
function totalGanadas($colecJuegos){
    // int $contG, $nJueg, $i

    // Inicialización de variables y obtención de la cantidad de elementos mediante count
    $nJueg= count($colecJuegos);
    $contG = 0;

    // Recorrido exhaustivo. Revisará todas las partidas y sumará uno por cada victoria
    for ($i = 0; $i<$nJueg; $i++){
        if ($colecJuegos[$i]["puntosCruz"] > $colecJuegos[$i]["puntosCirculo"]){
            $contG++;
        } elseif($colecJuegos[$i]["puntosCruz"] < $colecJuegos[$i]["puntosCirculo"]){
            $contG++;
        }
    }

    return $contG;
}

/**
 * 10) Retorna la cantidad de victorias del símbolo de entrada
 * @param array $colecJuegos
 * @param string $simboloAVerificar (X/O)
 * @return integer
 */
function victoriasPorSimbolo($colecJuegos, $simboloAVerificar){
    // int $numJuegos, $juegosGanados
    $numJuegos = count($colecJuegos);

    $juegosGanados = 0;

    // Si la entrada es X, recorre todo el arreglo y
    // cuenta 1 cada vez que los puntos de X sean mayores a los de O.
    if($simboloAVerificar == "X"){
        for($i = 0; $i < $numJuegos; $i++){
           if($colecJuegos[$i]["puntosCruz"] > $colecJuegos[$i]["puntosCirculo"]){
              $juegosGanados = $juegosGanados + 1;
           }
        }
    } else{
        // Sino hace lo mismo pero con O
        for($i = 0; $i < $numJuegos; $i++){
            if($colecJuegos[$i]["puntosCirculo"] > $colecJuegos[$i]["puntosCruz"]){
                $juegosGanados = $juegosGanados + 1;
            }
        }
    }

    return $juegosGanados;
}

/**
 * 11) Función de comparación para ordenar jugadorCirculo alfabéticamente
 * @param string $valorA
 * @param string $valorB
 * @return int 1 si es mayor, 0 si es igual, -1 si es menor
 */
function esMayorO($valorA, $valorB){
    // int $resultado

    // Usamos la función strcasecmp, que compara dos string y retorna 1 si es mayor, 0 si es igual, -1 si es menor
    $resultado = strcasecmp($valorA["jugadorCirculo"], $valorB["jugadorCirculo"]);
    
    return $resultado;
}

/**
 * 11) Ordena las colección en base a los nombres de los jugadores O (alfabéticamente)
 * @param array $colecJuegos
 */
function ordenarPorJugadoresO($colecJuegos){
    // array $colecJuegos

    // La función uasort permite ordenar el arreglo mediante una función de comparación definida por el programador (esMayorO). 
    // Dicha función también mantiene las asociación de índices.
    uasort($colecJuegos, "esMayorO");

    // print_r muestra en pantalla información legible acerca de una variable 
    print_r($colecJuegos);
}

/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:
/*
INTEGER $opcion, $indiceMaximo, $numeroJuego, $indicePrimeraVictoria, $vicTotales, $vicSimbolo
FLOAT $porcVictorias
STRING $nombreJugador, $simbolo
ARRAY $coleccionDeJuegos, $juego, $resJugador
*/

//Proceso:

// Se precargan 10 juegos
$coleccionDeJuegos = cargarJuegos();

do {
    // Se muestra menú
    $opcion = seleccionarOpcion();

    //la instrucción switch se utiliza cuando se quiere comparar una misma variable (o expresión) con muchos valores diferentes, 
    //y ejecutar una parte de código distinta dependiendo de a que valor es igual.

    switch ($opcion) {
        case 1: 
            // Jugar al tateti
            echo "\n************  Jugar al tateti   *************\n";
            $juego = jugar();
            $coleccionDeJuegos = agregarJuegos($coleccionDeJuegos, $juego);
            imprimirResultado($juego);

            break;
        case 2:
            // Mostrar un Juego
            echo "\n************  Mostrar un Juego  *************\n";
            $indiceMaximo = count($coleccionDeJuegos) - 1;
            echo "Ingrese el número del juego que desea ver (mayor o igual a 0): ";
            $numeroJuego = solicitarNumeroEntre(0, $indiceMaximo);
            mostrarJuego($coleccionDeJuegos, $numeroJuego);

            break;
        case 3:
            // Mostrar el primer juego ganador
            echo "\n************ Primer Juego Ganado ************\n";
            echo "Ingrese el nombre del jugador: ";
            $nombreJugador = strtoupper(trim(fgets(STDIN)));
            $indicePrimeraVictoria = primeraVictoria($coleccionDeJuegos, $nombreJugador);
            if($indicePrimeraVictoria <> -1){
                mostrarJuego($coleccionDeJuegos, $indicePrimeraVictoria);
            } else{
                echo "El jugador " . $nombreJugador . " no ganó ningún juego.\n";
            }

            break;
        case 4:
            // Mostrar porcentaje de Juegos ganados
            // Obtención de datos
            echo "\n******** Porcentaje de Juegos Ganados *******\n";
            $simbolo = elegirSimbolo();
            $vicTotales = totalGanadas($coleccionDeJuegos);
            $vicSimbolo = victoriasPorSimbolo($coleccionDeJuegos, $simbolo);

            // Calculo y alternativa para evitar división por 0
            if($vicTotales > 0){
                $porcVictorias = ($vicSimbolo / $vicTotales) * 100;
            } else{
                $porcVictorias = 0;
            }

            // Visualización en pantalla
            echo "Porcentaje de victorias de ". $simbolo . ": " . round($porcVictorias, 2)  . "%"; // round redondea un valor float a un cantidad de decimales especifico
            echo "\n**********************\n";

            break;
        case 5:
            // Mostrar resumen de Jugador
            echo "\n******** Resumen de jugador *******\n";

            // Obtención del resumen (resJugador)
            echo "Ingrese el nombre del jugador: ";
            $nombreJugador = strtoupper(trim(fgets(STDIN))); 
            $resJugador = resumenJugador($coleccionDeJuegos, $nombreJugador);
            
            // Visualización en pantalla
            echo"**********************\n";
            echo"Jugador: " . $resJugador["nombre"]."\n";
            echo"Ganó: " . $resJugador["juegosGanados"]." juegos\n";
            echo"Perdió: " . $resJugador["juegosPerdidos"]." juegos\n";
            echo"Empató: " . $resJugador["juegosEmpatados"]." juegos\n";
            echo"Total de puntos acumulados: " . $resJugador["puntosAcumulados"]." puntos\n";
            echo"**********************\n";

            break;
        case 6:
            // Mostrar listado de juegos Ordenado por jugador O
            echo "\n** Listado de juegos ordenado por jugador O **\n";
            ordenarPorJugadoresO($coleccionDeJuegos);

            break;
    }
// Finaliza el programa si la funcion seleccionarOpcion retorna 7
} while ($opcion != 7);