 <?php

include("Dijkstra.php");


// I is the infinite distance.
define('I',1000);

// Size of the matrix
$matrixWidth = 50;

// $points is an array in the following format: (router1,router2,distance-between-them)
$points = array(
                    array("1", "2", 6),
                    array("1", "6", 8),
                    array("1", "3", 4),
                    array("2", "4", 5),
                    array("2", "1", 6),
                    array("2", "3", 2),
                    array("3", "1", 4),
                    array("3", "2", 2),
                    array("3", "5", 2),
                    array("4", "2", 5),
                    array("4", "5", 4),
                    array("5", "3", 2),
                    array("5", "4", 4),
                    array("5", "6", 8),
                    array("6", "1", 8),
                    array("6", "5", 8),                    
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

// ensure that the distance from a node to itself is always zero
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

echo '<pre>';
//echo "the map looks like:\n\n";
//echo $dijkstra -> printMap($ourMap);
echo "\n\n the shortest route from class  ".$fromClass." to ".$toClass." is  :\n";
echo $dijkstra -> getResults((int)$toClass);
echo '</pre>';

?> 