<?php

class Books_Model extends DB_Driver
{
  protected $books;
  protected $booksCount;
  protected $authors;
  protected $authorsCount;
  protected $janres;
  protected $janresCount;
  protected $book;


  protected $orderBy;
  protected $orderDir;
  protected $limit;
  protected $ConnectTypetoBD;


  function __construct($ConnectTypetoBD){
    parent::__construct ($ConnectTypetoBD);
    $this->booksCount = 0;
    $this->orderBy = 'bookID';
    $this->orderDir = 'ASC';
  }

  function modelGetBooks ()
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
    $sql.= " GROUP BY b.bookID";

    if (isset ($this->orderBy))
    {
      $sql.= " ORDER BY b." . $this->orderBy . " ". $this->orderDir .  PHP_EOL;
    }

    $this->sqlSendQuery ($sql);
    $c = 0;
    while ($row = $this->sqlGetNextRow() )
    {
      $this->books[$this->booksCount]['bookID'] = $row ['bookID'];
      $this->books[$this->booksCount]['bookTitle'] = $row ['bookTitle'];
      $this->books[$this->booksCount]['bookDes'] = $row ['bookDes'];
      $this->books[$this->booksCount]['bookPrice'] = $row ['bookPrice'];
      $this->books[$this->booksCount]['janre'] = $row ['janre'];
      $this->books[$this->booksCount]['authors'] = $row ['authors'];
      $this->booksCount++;
    }

  }//modelGetBooks

  //выборка для страниц жанров с учетом авторов опционально
  function modelGetBooksByJanreAndOptAuthor ($janreId='', $authorID='')
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
    if ($janreId!=='')
    {
      $sql.= "WHERE bj.janreID=".$janreId. PHP_EOL;
    }
    if ($authorID!=='')
    {
      $sql.= " AND ba.authorID=".$janreId. PHP_EOL;
    }
    $sql.= " GROUP BY b.bookID";
    if (isset ($this->orderBy)){
      $sql.= " ORDER BY b." . $this->orderBy . " ". $this->orderDir .  PHP_EOL;
    }

    $this->sqlSendQuery ($sql); // send sql query to server (/lib/mysql.class.php)
    $c = 0;
    while ($row = $this->sqlGetNextRow() ){
      $this->books[$this->booksCount]['bookID'] = $row ['bookID'];
      $this->books[$this->booksCount]['bookTitle'] = $row ['bookTitle'];
      $this->books[$this->booksCount]['bookDes'] = $row ['bookDes'];
      $this->books[$this->booksCount]['bookPrice'] = $row ['bookPrice'];
      $this->books[$this->booksCount]['janre'] = $row ['janre'];
      $this->books[$this->booksCount]['authors'] = $row ['authors'];
      $this->booksCount++;
    }

  }


  function modelGetJanre ()
  {

  }

  function modelGetAuthorByJanre ($janreId)
  {
    $sql ="SELECT DISTINCT a.". PHP_EOL;
    $sql.= "* FROM `authors` a ". PHP_EOL;
    $sql.= "LEFT JOIN `books_author` ba ON ba.authorID=a.authorID". PHP_EOL;
    $sql.= "LEFT JOIN `books_janre` bj ON ba.bookID=bj.bookID" . PHP_EOL;
    $sql.= "LEFT JOIN `janre`j ON bj.janreID=j.janreID". PHP_EOL;
    $sql.= "WHERE bj.janreID=".$janreId. PHP_EOL;
    $this->sqlSendQuery ($sql);
    $c = 0;
    while ($row = $this->sqlGetNextRow() )
    {
      $this->authors[$this->authorsCount]['AuthorID'] = $row ['AuthorID'];
      $this->authors[$this->authorsCount]['AuthorName'] = $row ['AuthorName'];
      $this->authorsCount++;
    }
    return $this->authors;
  }

function modelGetBooksByJanre ($janre)
{
  $sql = "SELECT" . PHP_EOL;
  $sql.= "GROUP_CONCAT(distinct j.janreName SEPARATOR ', ') as janre,". PHP_EOL;
  $sql.= "GROUP_CONCAT(distinct a.authorName SEPARATOR ', ') as authors,". PHP_EOL;
  $sql.= "b.* FROM `books` b". PHP_EOL;
  $sql.= "LEFT JOIN `books_author`ba ON b.bookID=ba.bookID". PHP_EOL;
  $sql.= "LEFT JOIN `authors`a ON ba.authorID=a.authorID". PHP_EOL;
  $sql.= "LEFT JOIN `books_janre` bj ON b.bookID=bj.bookID". PHP_EOL;
  $sql.= "LEFT JOIN `janre`j ON bj.janreID=j.janreID". PHP_EOL;
  $sql.= "GROUP BY j.janreID". PHP_EOL;
  $sql.= "ORDER BY j.janreName DESC  " . PHP_EOL;

  $this->sqlSendQuery ($sql); // send sql query to server (/lib/mysql.class.php)
  $c = 0;
  while ($row = $this->sqlGetNextRow() )
  {
    $this->books[$this->booksCount]['bookID'] = $row ['bookID'];
    $this->books[$this->booksCount]['bookTitle'] = $row ['bookTitle'];
    $this->books[$this->booksCount]['bookDes'] = $row ['bookDes'];
    $this->books[$this->booksCount]['bookPrice'] = $row ['bookPrice'];
    $this->books[$this->booksCount]['janre'] = $row ['janre'];
    $this->books[$this->booksCount]['authors'] = $row ['authors'];
    $this->booksCount++;
  }

  }

function modelGetBooksByAuthor ($autorID)
{
    $sql = "SELECT" . PHP_EOL;
    $sql.= "GROUP_CONCAT(distinct j.janreName SEPARATOR ', ') as janre," . PHP_EOL;
    $sql.= "GROUP_CONCAT(distinct a.authorName SEPARATOR ', ') as authors," . PHP_EOL;
    $sql.= "b.* FROM `books` b". PHP_EOL;
    $sql.= "LEFT JOIN `books_author`ba ON b.bookID=ba.bookID". PHP_EOL;
    $sql.= "LEFT JOIN `authors`a ON ba.authorID=a.authorID". PHP_EOL;
    $sql.= "LEFT JOIN `books_janre` bj ON b.bookID=bj.bookID". PHP_EOL;
    $sql.= "LEFT JOIN `janre`j ON bj.janreID=j.janreID". PHP_EOL;
    $sql.= "GROUP BY a.AuthorID". PHP_EOL;
    $sql.= "ORDER BY a.AuthorName DESC". PHP_EOL;

    if (isset ($this->orderBy))
    {
      $sql.= " ORDER BY b." . $this->orderBy . " ". $this->orderDir .  PHP_EOL;
    }

    $this->sqlSendQuery ($sql);
    $c = 0;
    while ($row = $this->sqlGetNextRow() )
    {
      $this->books[$this->booksCount]['bookID'] = $row ['bookID'];
      $this->books[$this->booksCount]['bookTitle'] = $row ['bookTitle'];
      $this->books[$this->booksCount]['bookDes'] = $row ['bookDes'];
      $this->books[$this->booksCount]['bookPrice'] = $row ['bookPrice'];
      $this->books[$this->booksCount]['janre'] = $row ['janre'];
      $this->books[$this->booksCount]['authors'] = $row ['authors'];
      $this->booksCount++;
    }


  }//modelGetBooksByAuthor


function modelGetJanreByAuthor ($autorId)
{
  $sql = "SELECT DISTINCT j.* ".PHP_EOL;
  $sql.= "FROM `janre` j".PHP_EOL;
	$sql.= "LEFT JOIN `books_janre` bj ON (j.janreID = bj.janreID)".PHP_EOL;
	$sql.= "LEFT JOIN `books_author` ba ON (ba.bookID = bj.bookID)".PHP_EOL;
  $sql.= "WHERE ba.autorID=". $autorId . PHP_EOL;
  if (isset ($this->orderBy))
  {
      $sql.= " ORDER BY b." . $this->orderBy . " ". $this->orderDir .  PHP_EOL;
  }
  $this->sqlSendQuery ($sql); // send sql query to server (/lib/mysql.class.php)
  $c = 0;
  $this->janre = $this->sqlGetOneRow();
  return $this->janre;
  }// modelGetJanreByAuthor

  function modelGetBookByID ($bookId)
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

    if (isset ($this->orderBy))
    {
      $sql.= " ORDER BY b." . $this->orderBy . " ". $this->orderDir .  PHP_EOL;
    }

    $this->sqlSendQuery ($sql);
    $c = 0;
    $this->book = $this->sqlGetOneRow();
    return $this->book;
    echo ($this->book);
}



  function modelCreateTables ()
    {
      $sql = "CREATE TABLE `books` (
        `bookID` int(11) NOT NULL,
        `bookTitle` varchar(255) NOT NULL,
        `bookDes` varchar(255) NOT NULL,
        `bookPrice` float NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
      $this->sqlSendQuery ($sql);
    }


}
