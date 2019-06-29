
<html>
<head>

<title>Algoritmo Dijkstra</title>
<meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" />

</head>
<body>
<header>
<center>
	<h1>
	<br>
		<strong>
		Algoritmo del camino mas corto (Dijkstra)
		</strong>
	</br>
	</h1>
</center>
</header> 
<center><img src="Grafo.jpg">
</center>

<center>
<form name="form1"  action="calPath.php" method="post" >

Punto Inicial :
<input type="text" size ="3" name="fromClass"/>

Punto Final :
<input type="text" size= "3" name="toClass"/>
<input name=b1 type=submit value="Calcular">

</form>

</center>

<script src="js/jquery.js"></script>
<script src="js/bootstra.min.js"></script>

</body>
</html>