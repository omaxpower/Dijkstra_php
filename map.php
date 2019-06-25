<html>
<head>
<title>Algoritmo Dijkstra</title>

<script>

function clickMap(classID)
{
    if (document.form1.fromClass.value.length == 0)
    {
        document.form1.fromClass.value = classID;
    }
    else
    {
        document.form1.toClass.value = classID;
    }
}

</script>
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
<center><img src="Grafo.jpg"  usemap="#routes" border="0">
</center>

<center>
<form name="form1"  action="calPath.php" method="post" >

De :
<input type="text" size ="3" name="fromClass"/>

Hacia :
<input type="text" size= "3" name="toClass"/>
<input name=b1 type=submit value="Calcular">

</form>
	

</center>

<br></body></html>