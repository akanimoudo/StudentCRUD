<?php

define('HOSTNAME','localhost');
define('USERNAME','root');
define('PASSWORD','');
define('DATABASE','student crud db');

$connection = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DATABASE);

if ($connection === FALSE){
echo 'Connection failed';
}
else{
//die ("Connection succeeded");
}
?>