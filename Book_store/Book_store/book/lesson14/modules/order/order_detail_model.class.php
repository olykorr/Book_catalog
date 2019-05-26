<?php

/**
 *
 */
class Order_Detail_Model extends DB_Driver
{
  public $order_detail;
  public $order_detailCount;
   public $sortBy;


  function __construct(){
    parent::__construct ();
    $this->order_detailCount = 0;
    $this->sortBy = 'orderID';
  }

  function modelGetOrderDetail (){

    }

      $this->sqlSendQuery ($sql); // send sql query to server (/lib/mysql.class.php)
    $c = 0;
    while ($row = $this->sqlGetNextRow() ){
      $this->order_detail[$this->order_detailCount]['orderID'] = $row ['orderID'];
      $this->order_detail[$this->order_detailCount]['bookId'] = $row ['bookID'];
      $this->order_detail[$this->order_detailCount]['price'] = $row ['price'];
      $this->order_detail[$this->order_detailCount]['count'] = $row ['count'];
      $this->order_detailCount++;
    }

  }

  function modelGetOrderDetailByOrderID ($id){
    }

    $this->sqlSendQuery ($sql);
    $c = 0;
    $this->order_detail = $this->sqlGetOneRow();
    return $this->order_detail;
  }

  function modelCreateTableOrderDetail ()
  {
    $sql = "CREATE TABLE `order_detail` (
  `orderID` int(11) NOT NULL,
  `bookID` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `count` int(11) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
    $this->sqlSendQuery ($sql);
  }




}
