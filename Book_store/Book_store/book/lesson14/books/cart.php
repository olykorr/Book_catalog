 <?php

include ('../_init.php');

// Start work whith books

$cart = new Cart_Controller ();


$mySite->start();
echo $myMenu->getMenu();
echo '<hr>';
echo "at books/cart.php";
//$books->buildBookCart();
//$books->buildBook();

$cart->buildBooksCartList(1);

$mySite->end ();
