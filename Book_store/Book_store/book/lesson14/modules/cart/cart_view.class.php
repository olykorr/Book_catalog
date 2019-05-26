<?php

/**
 *
 */
class Cart_View extends Cart_Model
{
  public $DataSet;
  protected $ConnectTypetoBD;

  function __construct($ConnectTypetoBD){
    parent::__construct ($ConnectTypetoBD);
  }

  /**
   * Echo list all books
   */

    function echoBookCart ($data = ''){
      echo "<br>at echoBookCart<bt>";
    // prettyPrint ($this->dataSet);
    include(CMS_MODULES_PATH . 'cart/templates/cart.tpl.php');
    echo 'print cart';
  }



  /**
   * Create order link
   */
  function getOrderLink ($f, $d = 'ASC') {
    GLOBAL $_SERVER;
    $res = '<a href="' . $_SERVER ['PHP_SELF'] . '/?orderBy=' . $f . '&orderDir='. $d.'">';
    return $res;
  }




}
