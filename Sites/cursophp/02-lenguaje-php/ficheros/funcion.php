<html>
<head>
<title>Invocando una funci&oacute;n</title>
</head>
<body>

<h1>Invocando una funci&oacute;n</h1>

<!-- Insertar el c�digo necesario para mostrar un mensaje con la hora y fecha actual -->

<?php
echo "<p>". date('H:i, jS F') ."</p>";
echo phpinfo(INFO_GENERAL);
echo $_SERVER['HTTP_USER_AGENT'];

?>

</body>
</html>
