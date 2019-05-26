<?php

/**
 *
 */
class Payment_Model extends DB_Driver
{
  public $paymentCount;
  public $payment;

  public $sortBy;



  function __construct(){
    parent::__construct ();
    $this->paymentCount = 0;
  }

  function modelGetPaymentDetail (){

    }
    $this->sqlSendQuery ($sql);
    $c = 0;
    while ($row = $this->sqlGetNextRow() ){
      $this->payment[$this->paymentCount]['paymentID'] = $row ['paymentID'];
      $this->payment[$this->paymentCount]['type'] = $row ['type'];
      $this->paymentCount++;
    }

  }

  function modelGetPaymentDetailByID ($id){

    }

    $this->sqlSendQuery ($sql);
    $c = 0;
    $this->book = $this->sqlGetOneRow();
    return $this->book;
  }

  function modelCreateTablesPayment (){
      $sql = "CREATE TABLE `cart` (
  `paymentID` int(11) NOT NULL,
  `type` float NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
    $this->sqlSendQuery ($sql);
  }




}
