<?php

class Books_Controller extends Books_View
{

	protected $ConnectTypetoBD;

  function __construct ($ConnectTypetoBD){
		parent::__construct ($ConnectTypetoBD);
	}


	function buildBook()
	{
	  GLOBAL $_GET;
	  $this->modelGetBookByID ($_GET['bookID']);
	  $this->dataSet['book'] = $this->book;
	  $this->dataSet['header'] = 'You Book';
	  $this->echoSingleBook ();
	}

 function buildBooksList ($janreId='', $authorID='')
	{
	  GLOBAL $_GET;
	  if (isset($_GET['orderBy']))
	  {
	    $this->orderBy = $_GET['orderBy'];
	    $this->orderDir = $_GET['orderDir'];
	  }
    $this->modelGetBooksByJanreAndOptAuthor ($janreId, $authorID);
    $this->dataSet['books'] = $this->books;
    $this->dataSet['header'] = 'Books List';
    $this->dataSet['authors'] = $this->authors;
    $this->echoBooksList ();
	}

	function buildBooksListByAuthor ($author)
	{
	  GLOBAL $_GET;
	  if (isset($_GET['authorID']))
	  {
	    $this->modelGetBooksByJanreAndOptAuthor ($janreId, $authorID);
	    $this->dataSet['book'] = $this->book;
	    $this->dataSet['header'] = 'Books List by Author and Janre';
	    $this->echoBooksList ();
	  }
	}



	function buildBookCart ()
	{
	  GLOBAL $_GET;
	  if (!isset($_GET['bookID']))
		{
	    die ('ID Error');
	  }
	  $this->modelGetBookByID ($_GET['bookID']);
	  $this->dataSet['book'] = $this->book;
	  $this->dataSet['header'] = 'Book Cart';
	  $this->echoBookCart ();
	}


	function sendMail ()
	{
	  GLOBAL $_GET;
	  if (!isset($_GET['userEmail']))
		{
	    die ('emailError Error');
	  }
	  $strMail = '';
	  mail ($_GET['userEmail'], 'Book', $strMail);
	}

		function breflyBookSerch()
		{
			$this->echoBreflyBookSerch();
		}
	}
