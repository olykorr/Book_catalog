<?php

/**
 *
 */
class Order_Model extends DB_Driver
{
 // public $orders;
  public $orderCount;
  public $order;

  public $sortBy;



  function __construct(){
    parent::__construct ();
    $this->orderCount = 0;
    $this->sortBy = 'orderID';

  }


  function modelGetOrder (){

    }

    $this->sqlSendQuery ($sql); // send sql query to server (/lib/mysql.class.php)
    $c = 0;
    while ($row = $this->sqlGetNextRow() ){
      $this->order[$this->orderCount]['orderID'] = $row ['orderID'];
      $this->order[$this->orderCount]['userId'] = $row ['userID'];
      $this->order[$this->orderCount]['create'] = $row ['create'];
      $this->order[$this->orderCount]['paymentID'] = $row ['paymentID'];
      $this->orderCount++;
    }

  }

  function modelGetOrderByID ($id){

    }

    $this->sqlSendQuery ($sql);
    $c = 0;
    $this->order = $this->sqlGetOneRow();

    return $this->order;
  }

  function modelCreateTableOrder (){
      $sql = "CREATE TABLE `order` (
  `orderID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `create` varchar(255) NOT NULL,
  `paymentID` int(11) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
    $this->sqlSendQuery ($sql);
  }




}
