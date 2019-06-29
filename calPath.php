 <!DOCTYPE html>
 <html>
 <head>
     <title>Algoritmo Dijkstra</title>
     <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" />

 </head>
 <body>
 
 <?php

include("Dijkstra.php");


// I is the infinite distance.
define('I',1000);

// Size of the matrix
$matrixWidth = 50;

// $points is an array in the following format: (router1,router2,distance-between-them)
$points = array(
        array("1", "2",3),
        array("1", "7",7),
        array("2", "1",3 ),
        array("2", "6", 2),
        array("2", "3", 5),
        array("3", "2",5 ),
        array("3", "6", 1),
        array("3", "4", 1),
        array("3", "5", 8),
        array("4", "3", 1),
        array("4", "5", 2),
        array("5", "4", 2),
        array("5", "3", 8),
        array("5", "7", 4),
        array("6", "2", 2),
        array("6", "3", 1),
        array("6", "7", 1),
        array("7", "1", 7),
        array("7", "6", 1),
);

$ourMap = array();


// Read in the points and push them into the map

for ($i=0,$m=count($points); $i<$m; $i++) {
    $x = $points[$i][0];
    $y = $points[$i][1];
    $c = $points[$i][2];
    $ourMap[$x][$y] = $c;
    $ourMap[$y][$x] = $c;
}

// La distancia de un nodo hacia el mismo nodo es cero
// Purists may want to edit this bit out.
for ($i=0; $i < $matrixWidth; $i++) {
    for ($k=0; $k < $matrixWidth; $k++) {
        if ($i == $k) $ourMap[$i][$k] = 0;
    }
}

// initialize the algorithm class
$dijkstra = new Dijkstra($ourMap, I,$matrixWidth);

// $dijkstra->findShortestPath(0,13); to find only path from field 0 to field 13...
$fromClass = $_POST['fromClass'];
$toClass = $_POST['toClass'];

$dijkstra->findShortestPath($fromClass, $toClass);

// Display the results

echo '<center>';
//echo "the map looks like:\n\n";
//echo $dijkstra -> printMap($ourMap);
echo "\n\n La ruta más corta de la clase  ".$fromClass." hacia ".$toClass." es  :\n";
echo $dijkstra -> getResults((int)$toClass);
echo '</center>';

?> 

<script src="js/jquery.js"></script>
<script src="js/bootstra.min.js"></script>

 </body>
 </html>

