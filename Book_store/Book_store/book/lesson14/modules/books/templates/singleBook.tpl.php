<meta charset="utf-8"/>
<html lang="en">
<script type="text/javascript" charset="utf-8" id="zm-extension" src="chrome-extension://fdcgdnkidjaadafnichfpabhfomcebme/scripts/webrtc-patch.js" async=""></script><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<head>
  <!-- Bootstrap core CSS -->
  <link href="/bootstrap/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</head>

<?php
  echo '<div class="text-center">';
    echo '<h2>' . $this->dataSet ['book']['bookTitle'] . '</h2><br />';
    echo '<img src="https://s9.vcdn.biz/static/f/272502801/image.jpg/pt/r300x423" class="img-rounded"  style="width:250px;"> ';
    echo '<h3>' . $this->dataSet ['book']['authors'] . ' </h3><br />';
    echo '<h4>' .$this->dataSet ['book']['janre'] . '</h4><br />';
  echo '</div>';
?>

<table class="table">
  <h3><?=$this->dataSet ['header']?> </h3>


<?php
  echo '<tr>';
  echo '<td width="55%">' . $this->dataSet ['book']['bookDes'] . '</td>';
  echo '<td> <h3>Price for today: <br></h3> <h3>' . $this->dataSet ['book']['bookPrice'].'грн </h3>'  ;
  //  echo '<button type="button" class="btn btn-success"> <a href="' . CMS_BASE_URL . 'books/cart.php?bookID=' . $this->dataSet ['book']['bookID'] . '" class="cart-button">В корзину</a></button>';
    echo '<a class="cart" href="' . CMS_BASE_URL . 'books/cart.php?bookID=' . $this->dataSet ['book']['bookID'] . ' class="cart-button"> Add to cart</a>';
    echo '<style>
    .cart
    {
      text-decoration: none;
      font-weight: 400;
      border-radius: .25rem;
      padding: .500rem .75rem;
      margin: .75rem;
      margin-left:0;
      vertical-align: middle;
      color: #FFF;
      border-color: green;
      background-color: green;
    }

    .cart:hover {
      border-color: #0B610B;
      background-color: #0B610B;
      text-decoration: none;
      color:#FFF;
   }
    </style>';
    echo '<button type="button" class="btn btn-info">Add to favorite</button>';
  echo '</td>';
  echo '</tr>' . PHP_EOL;

?>

</table>
