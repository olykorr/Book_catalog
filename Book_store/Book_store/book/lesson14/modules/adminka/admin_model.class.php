<?php



class Admin_Model extends DB_Driver
{

  protected $Author_ID;
  protected $Book_ID;
  protected $ConnectTypetoBD;

  function __construct($ConnectTypetoBD){
    parent::__construct ($ConnectTypetoBD);

  }

  function modelAddBooks ($BookTitle, $BookDescriotion, $bookPrice, $BookNumber, $BookAuthor1, $bookAuthor2='')
  {
    $sql = " INSERT INTO `books` (`bookID`, `bookTitle`, `bookDes`, `bookPrice`, `bookNumber`) VALUES (NULL, '$BookTitle', '$BookDescriotion', '$bookPrice', '$BookNumber')";
    $this->sqlSendQuery ($sql);
    $a=$this->findAuthorIdatDB($BookAuthor1);
    $b=$this->findbookID($BookTitle);
    $this->bookAuthorAddiction($a,$b);
  }

  function findAuthorIdatDB($BookAuthor)
  {
    $sql = "SELECT `AuthorID` FROM `authors` WHERE `AuthorName`= '.$BookAuthor.'";
    $this->sqlSendQuery ($sql);
    $this->Author_ID = $this->sqlGetOneRow();
    return $this->Author_ID;
  }

  function findbookID($BookTitle)
  {
    $sql = "SELECT `bookID` FROM `books` WHERE  `bookTitle`= '.$BookTitle.'";
    $this->sqlSendQuery ($sql);
    $this->Book_ID = $this->sqlGetOneRow();
    return $this->Book_ID;
  }

  function bookAuthorAddiction($Author_ID, $BookID)
  {
    $sql = "INSERT INTO `books_author`(`bookID`, `AuthorID`) VALUES ('.$BookID.','.$Author_ID.')";
    $this->sqlSendQuery ($sql);
  }

}
