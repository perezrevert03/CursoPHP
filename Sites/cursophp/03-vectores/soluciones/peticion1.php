<html>
<head>
  <title>Tienda de recambios de Bob - Resultados de la petición</title>
</head>
<body>
<h1>Tienda de recambios de Bob</h1>
<h2>Resultados de la petición</h2>
<? 
$productos= array("frenos" => "Frenos", 
                  "aceite" => "Latas de aceite", 
                  "ruedas" => "Neumáticos",
                  "bujias" => "Bujías"
                  );
  echo "<p> Petición servida a las "; 

  echo date("H:i, jS F");
  echo "<br>";
  echo "<p>Su petición es la siguiente:";
  echo "<br>";

  foreach ($productos as $clave => $valor) {
    echo $valor . ": " .$_POST["num$clave"]."<br>";
  }

	echo "El resto para el siguiente ejercicio";
  
?>
</body>
</html>
