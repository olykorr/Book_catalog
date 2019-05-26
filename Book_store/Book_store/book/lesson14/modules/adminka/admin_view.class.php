<?php

class Admin_View extends Admin_Model
{
protected $ConnectTypetoBD;

  function __construct($ConnectTypetoBD){
    parent::__construct ($ConnectTypetoBD);
  }


    function echoBreflyBookSerch()
    {
        include( CMS_BASE_URL . 'adminka/ajax/index.php');


    }

    function echoBooksAdd ($data = '')
    {

      include(CMS_MODULES_PATH .'adminka/templates/Addbook.tpl.php');
    }

}
