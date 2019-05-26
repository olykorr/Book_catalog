<?php

class Cart_Controller extends Cart_View
{
  public $dataSet;
  protected $ConnectTypetoBD;

  function __construct ($ConnectTypetoBD){
		parent::__construct ($ConnectTypetoBD);
	}


function buildBookCart(){
  GLOBAL $_GET;
  $this->dataSet['bookInCart'] = $this->bookInCart;
  $this->dataSet['headerCart'] = 'You Book cart';
}

function buildBooksCartList ($userID)
{
  GLOBAL $_GET;
  $this->getBookIDbyUserID($userID);
  $this->dataSet['booksInCart'] = $this->booksInCart;

  for ($i = 1; $i <= sizeof($this->dataSet['booksInCart']); $i++ )
  {
    $bookID=$this->dataSet['booksInCart'][$i]['bookID'];
    $this->buildBookCartbyBookID($bookID);
    $this->dataSet['OneBook']= $this->OneBook;
    }
  $this->echoBookCart();
}

}
