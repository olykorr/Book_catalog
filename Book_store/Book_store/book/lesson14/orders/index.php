<?php

include ('../_init.php');

// Start work whith books

$books = new Books_Controller ();


$mySite->start();
echo $myMenu->getMenu();

$books->buildBookCart();

$mySite->end ();
