<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Traditional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <title>Formulario de pedido de libros</title>
</head>
<body>
<h1>Librer&iacute;a Online </h1>
<h2>Resumen del Pedido </h2>


<?php 
/* Autor: Mihail Rumenov
Última modificación:septiembre
Este script procesa un pedido de libros
*/
/********* AGREGADO DM ***********************/
$actionqty = $_POST["actionqty"];
$photoqty  = $_POST["photoqty"];
$flashqty  = $_POST["flashqty"];
/*** AGREGADO DM Estas sobreescribiendo la variable ****************/
$flashqty_1  = $_POST["find"];
/********* AGREGADO DM ***********************/

echo "<p>Orden procesada a las: "; // Esto aparecerá en pantalla
echo date ("H:i ");
echo "del d&iacute;a ";
echo date ("j ");
echo "de ";
echo date ("F ");
echo "del a&ntilde;o ";
echo date ("Y");
echo "<br><br>";
	echo "<p>Su pedido es el siguente:</p>";
	echo $actionqty." ActionScript<br>"; // llamada variables cortas
	echo $photoqty." Photoshop<br>";
	echo $flashqty." Flash MX<br>";
	echo "<br>";

	// variables
	$totalqty = 0; 
	$totalmont = 0.00;
	
	define("ACTIONPRICE", 100);
	define("PHOTOPRICE", 10);
	define("FLASHPRICE", 4);
	
	if($actionqty < 10)
		$descuento = 0;
	
	elseif($actionqty >= 10 && $actionqty <=49)
		$descuento = 5;
		
	elseif($actionqty >= 50 && $actionqty <=99)
		$descuento = 10;

	elseif($actionqty > 100)
		$descuento = 15;

	$totalqty = $actionqty + $photoqty + $flashqty;
	$totalamount =  $actionqty * ACTIONPRICE
				+ $photoqty * PHOTOPRICE
				+ $flashqty * FLASHPRICE;
				
	if($totalqty == 0)
	{
		echo "Introduzca una cantidad<br>";	
	}	
	else 
	{
		if(actionqty > 0)	
			echo $actionqty." actionscript<br>";
		if(photoqty > 0)
			echo $photoqty." photoshop<br>";
		if(flashqty > 0)
			echo $flashqty." flash<br>";
	}	
	
	echo "<p>Descuento en libros ActionScript = ".$descuento."%<p>";
	
/****** Estas llamando al argumento no a la variable (Lo que te dije hace una semana atras)	***/
// 	switch($find)
	switch($flashqty_1)
	{
		case "a":
			echo "<p>Anuncio<p>";
			break;
		case "b":
			echo "<p>Internet<p>";
			break;
		case "c":
			echo "<p>Soy Cliente<p>";
			break;
		case "d":
			echo "<p>Un Amigo<p>";
			break;
		default :
			echo "<p>No lo sabemos<p>";
			break;
			
	}
		
		
	echo "<br>\n";
	echo "Art&iacute;culos Pedidos:       ".$totalqty."<br>\n";
	echo "Subtotal:            Euros ";
	echo number_format($totalamount, 2);
	echo "<br>\n";

	$taxrate = 0.10;  // local sales tax is 10%
	$totalamount = $totalamount * (1 + $taxrate);
	$totalamount = number_format($totalamount, 2);
	echo "Total incluyendo impuestos: Euros ".$totalamount."<br>\n";	

	

?>

</body>
</html>