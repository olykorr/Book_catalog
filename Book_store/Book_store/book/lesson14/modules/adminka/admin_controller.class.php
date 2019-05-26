<?php

class Admin_Controller extends Admin_View
{
  protected $dataSet;
  protected $ConnectTypetoBD;

  function __construct($ConnectTypetoBD){
    parent::__construct ($ConnectTypetoBD);
    	GLOBAL $_POST;


  if (isset ($_POST['addBook']) )
    {
        $this->addNewBook ();
    }
}
  function addNewBook ()
    {
      $this->modelAddBooks ( $_POST['Book_Title'], $_POST['Book_Descriptiion'], $_POST['Book_Price'], $_POST['Book_Number'], $_POST['Author_Name1'], $_POST['Author_Name1']);
    }

  function buildBookAdd ($janreId='', $authorID='')
  {
      $this->echoBooksAdd ();
  }

}
