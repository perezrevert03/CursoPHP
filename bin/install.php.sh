<?php

$WEBPATH= "archive/instalacion";

$DOMAINIP= exec("hostname -i | cut -d'.' -f-2");

if ($DOMAINIP != "192.168" ) {
    $WEBSERVER= "cursophp.disca.upv.es";
} else {
    $WEBSERVER= "localhost";
}

function wget($url, $target) {
    echo "  (II) Obteniendo $url\n"; 
    $text= file_get_contents($url);
    echo "  (II) Grabando $target\n"; 
    file_put_contents($target, $text);
}

$HOME= getenv("HOME");

$dname= dirname($argv[0]);

if ( $dname != "/tmp" ) {
    echo "=== Actualizando desde $WEBSERVER ===\n" ;

    echo "+++ Actualizando ejecutable: install.php.sh\n" ;
    wget("http://cursophp:cursophp@${WEBSERVER}/${WEBPATH}/install.php.sh", "/tmp/install.php.sh");      echo "+++ Ejecutando nuevo: install.php.sh\n" ;
    system("php /tmp/install.php.sh");
    exit;
} else {
    echo "=== Relanzando ejecutable ". basename($argv[0]) ." ===\n";

    chdir($HOME);

    echo "+++ Actualizando ejecutables: cursobin.tgz\n";
    @ unlink("/tmp/cursobin.tgz");
    
    wget("http://cursophp:cursophp@${WEBSERVER}/${WEBPATH}/cursobin.tgz", "/tmp/cursobin.tgz");
    system("tar xvzf /tmp/cursobin.tgz --preserve-permissions");
    
    echo "+++ Actualizando estructura web: cursophp.tgz\n";
    @ unlink("/tmp/cursophp.tgz");
    wget("http://cursophp:cursophp@${WEBSERVER}/${WEBPATH}/cursophp.tgz", "/tmp/cursophp.tgz");
    system("tar xvzf /tmp/cursophp.tgz --preserve-permissions");
    
    echo "+++ Obteniendo lista de ejemplos\n";
    wget("http://cursophp:cursophp@${WEBSERVER}/${WEBPATH}/ejemplos.dir", "/tmp/ejemplos.dir");

    // EJEMPLOS
    $d= "public_html";
    echo "### Instalando ejemplos en $d ###\n";

    $cwd= getcwd();

    if (!file_exists($d)) {
        mkdir($d);
    }
    
    chdir($d);

    foreach(file("/tmp/ejemplos.dir") as $f) {
        $f= trim($f);
        if ($f == "") continue;
        
        echo "+++ Actualizando el directorio $f\n";
        wget("http://cursophp:cursophp@${WEBSERVER}/${WEBPATH}/$f-ejemplos.tgz", "/tmp/$f-ejemplos.tgz");
        exec("tar xvzf /tmp/$f-ejemplos.tgz --preserve-permissions");
    }
    
    chdir($cwd);

    // PRACTICAS
    echo "+++ Obteniendo lista de practicas\n";
    
    wget("http://cursophp:cursophp@${WEBSERVER}/${WEBPATH}/practicas.dir", "/tmp/practicas.dir");    
    $d= "Sites/cursophp";
    
    echo "### Instalando practicas en $d ###\n";
    
    $cwd= getcwd();
    
    if (!file_exists($d)) {
        mkdir($d);
    }
    
    chdir($d);
    
    foreach(file("/tmp/practicas.dir") as $f) {    
        $f= trim($f);
        if ($f == "") continue;        

        if (!is_dir($f)) {
            echo "+++ Actualizando el directorio $f\n";
            wget("http://cursophp:cursophp@${WEBSERVER}/${WEBPATH}/$f.tgz", "/tmp/$f.tgz");
            system("tar xvzf /tmp/$f.tgz --preserve-permissions");
        } else {
            echo "--- El directorio $d/$f ya existe\n";
            wget("http://cursophp:cursophp@${WEBSERVER}/${WEBPATH}/$f.tgz", "/tmp/$f.tgz");
            echo "+++ Actualizando la documentacion de $f\n";

            system("tar xvzf /tmp/$f.tgz --preserve-permissions --wildcards '*/texto/*'");

            echo "+++ Actualizando las soluciones de $f\n";
	    
            system("tar xvzf /tmp/$f.tgz --preserve-permissions --wildcards '*/soluciones/*' 2>/dev/null");
        }
    }

    chdir($cwd);
    
}
echo "Instalación completada. Pulse una tecla\n";
readline();
