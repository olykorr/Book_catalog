<?php

include ('../_init.php');

//$books = new Books_Controller ('PDO');
$books = new Books_Controller ('MYSQLI');


$mySite->start();
echo $myMenu->getMenu();

$books->buildBook();



$mySite->end ();
