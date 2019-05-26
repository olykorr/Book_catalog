<?php

/**
 *
 */
class Cart_Model extends DB_Driver
{
  //public $orders;
  public $cartCount;
  public $booksCount=1;
  public $oneBooksCount=1;
  public $cart;
  public $bookcart;
  public $sortBy;
  protected $ConnectTypetoBD;



  function __construct($ConnectTypetoBD){
    parent::__construct ();
    $this->cartCount = 0;

  }

  function modelGetCartDetail (){
  }

  function getBookIDbyUserID ($userID)
    {
      echo "<br> at getBookIDbyUserID<br>";
       $sql = "SELECT `bookID`, `count`, `orderID` ".PHP_EOL;
       $sql.= "FROM `cart` c".PHP_EOL;
       $sql.= "WHERE `userID`=".$userID.PHP_EOL;
       $this->sqlSendQuery ($sql);
       $c = 0;
       while ($row = $this->sqlGetNextRow() )
       {

         $this->booksInCart[$this->booksCount]['bookID'] = $row ['bookID'];
         $this->booksInCart[$this->booksCount]['count'] = $row ['count'];
         $this->booksInCart[$this->booksCount]['orderID'] = $row ['orderID'];
         $this->booksCount++;

        }
    }

    function buildBookCartbyBookID ($bookId)
    {
      $sql = "SELECT  " . PHP_EOL;
      $sql.= "GROUP_CONCAT(distinct j.janreName SEPARATOR ', ') as janre, " . PHP_EOL;
      $sql.= "GROUP_CONCAT(distinct a.authorName SEPARATOR ', ') as authors, " . PHP_EOL;
      $sql.= "b.* " . PHP_EOL;
      $sql.= "FROM `books` b " . PHP_EOL; //
      $sql.= "LEFT JOIN `books_author` ba ON b.bookID=ba.bookID " . PHP_EOL;
      $sql.= "LEFT JOIN `authors`a ON ba.authorID=a.authorID " . PHP_EOL;
      $sql.= "LEFT JOIN `books_janre` bj ON b.bookID=bj.bookID " . PHP_EOL;
      $sql.= "LEFT JOIN `janre`j ON bj.janreID=j.janreID ". PHP_EOL;
      $sql.= "WHERE b.bookID=" . $bookId . PHP_EOL;
      $sql.= " GROUP BY b.bookID";


      $this->sqlSendQuery ($sql);
      $c = 0;

      while ($row = $this->sqlGetNextRow() )
      {

        $this->OneBook[$bookId]['bookID'] = $row ['bookID'];
        $this->OneBook[$bookId]['bookTitle'] = $row ['bookTitle'];
        $this->OneBook[$bookId]['bookDes'] = $row ['bookDes'];
        $this->OneBook[$bookId]['bookPrice'] = $row ['bookPrice'];
        $this->OneBook[$bookId]['janre'] = $row ['janre'];
        $this->OneBook[$bookId]['authors'] = $row ['authors'];
        $this->oneBooksCount++;
        }
  }


  function modelGetCartDetailByUserID ($id){

  }

  function modelCreateTableCart (){
      $sql = "CREATE TABLE `cart` (
  `userkID` int(11) NOT NULL,
  `bookID` int(11) NOT NULL,
  `count` int(11) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
    $this->sqlSendQuery ($sql);
  }
}
