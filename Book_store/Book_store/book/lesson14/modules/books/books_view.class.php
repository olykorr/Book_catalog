<?php

class Books_View extends Books_Model
{
  protected $dataSet;
	protected $ConnectTypetoBD;

  function __construct($ConnectTypetoBD){
    parent::__construct ($ConnectTypetoBD);
  }

  function echoBooksList ($data = '')
  {
    include(CMS_MODULES_PATH . 'books/templates/booklist.tpl.php');
  }

  function echoSingleBook ($data = '')
  {
    include(CMS_MODULES_PATH . 'books/templates/singleBook.tpl.php');
  }


  function getOrderLink ($f, $d = 'ASC')
  {
    GLOBAL $_SERVER;
    $res = '<a href="' . $_SERVER ['PHP_SELF'] . '/?orderBy=' . $f . '&orderDir='. $d.'">';
    return $res;
  }
}
