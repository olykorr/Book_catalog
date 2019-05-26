<meta charset="utf-8"/>


<!DOCTYPE html>
<!-- saved from url=(0041)http://bootstrap-3.ru/examples/jumbotron/ -->
<html lang="en"><script type="text/javascript" charset="utf-8" id="zm-extension" src="chrome-extension://fdcgdnkidjaadafnichfpabhfomcebme/scripts/webrtc-patch.js" async=""></script><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<head>
  <!-- Bootstrap core CSS -->
    <link href="/bootstrap/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
     <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

</head>
<body>


     <style>
     * {box-sizing: border-box;}
     .custom-select {
     width: 200px;
     height: 35px;


     }
     </style>


       <!-- Example row of columns -->
       <div class="row">
        <!-- Here we put all books after selection -->
        <?php
        echo '<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>';
        for ($i = 0; $i < sizeof($this->dataSet ['books']); $i++ ){
          echo '<div class="col-md-3 col-sm-4 col-xs-6">
                  <div class="product-item">
            			  <div class="product-img">
              				<a href="' . CMS_BASE_URL . 'books/book.php?bookID=' . $this->dataSet ['books'][$i]['bookID'] . '">
              				  <img src="https://s9.vcdn.biz/static/f/272502801/image.jpg/pt/r300x423">
              				  <h4>'. $this->dataSet ['books'][$i]['bookTitle'] .'</h4>
              				  <h5>'.	$this->dataSet ['books'][$i]['authors'] .'</h5>
                        <h5>'.	$this->dataSet ['books'][$i]['janre'] .'</h5>
              				</a>
            			 </div>  <!--close class="product-img"-->

            			  <div class="product-list">
              				<span class="price">'. $this->dataSet ['books'][$i]['bookPrice'].'</span>
              				<div class="actions">
                        <div class="add-to-cart">
              					     <a href="' . CMS_BASE_URL . 'books/cart.php?bookID=' . $this->dataSet ['books'][$i]['bookID'] . '" class="cart-button">В корзину</a>
              				  </div> <!--close class="add-to-cart"-->
                        <div class="add-to-links">
              					     <a href="" class="wishlist">Like</a>
              				  </div> <!--close class="add-to-links"-->
                      </div> <!--close class="actions"-->
              			</div> <!--close class="product-list"-->
			           </div> <!--close class="product-img"-->
        </div> <!--close class="col-md-3 col-sm-4 col-xs-6"-->' ;
}
                //</div>
        echo '
        <style>
        * {box-sizing: border-box;}
        .product-item {
        width: 200px;
        margin: 0 auto;
        padding: 10px 10px 5px 10px;
        border: 1px solid #eee;
        background: white;
        font-family: "Open Sans";
        overflow: hidden;
        transition: .4s linear;
        }
        .product-img {transition: 1s ease-in-out;}
        .product-img:hover {transform: scale(1.1);}
        .product-img img {
        display: block;
        width: 100%;
        }
        .product-list {margin-top: 15px;}
        .product-list h3 {
        font-weight: 700;
        color: #39404B;
        margin: 0;
        text-transform: uppercase;
        font-size: 14px;
        line-height: 2;
        }
        .price {
        color: #E34D38;
        display: block;
        margin-bottom: 12px;
        }
        .stars {
        height: 14px;
        line-height: 14px;
        margin: 7px 0;
        }
        .stars:before {
        content: "\f005\f005\f005\f005\f006";
        color: #EFB71C;
        font-size: 14px;
        font-family: FontAwesome;
        }
        .actions {
        border-top: 1px solid #eee;
        padding-top: 4px;
        font-size: 13px;
        height: 30px;
        line-height: 30px;
        }
        .actions:after {
        content: "";
        display: table;
        clear: both;
        }
        .add-to-cart, .add-to-links {float: left;}
        .cart-button {
        text-decoration: none;
        color: #8C877C;
        padding-right: 20px;
        border-right: 1px solid #ddd;
        transition: .4s linear;
        }
        .cart-button:before {
        content: "\f07a";
        font-family: FontAwesome;
        margin-right: 10px;
        }
        .add-to-cart:hover .cart-button, .wishlist:hover, .compare:hover {color: #E34D38;}
        .wishlist, .compare {
        color: #8C877C;
        padding-left: 20px;
        transition: .4s linear;
        }
        .wishlist:after, .compare:after {
        display: inline-block;
        font-family: FontAwesome;
        font-size: 13px;
        }
        .wishlist:after {content: "\f004";}
        .compare:after {content: "\f079";}
        </style>'
        ?>
  </div> <!--close class="row"-->






    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

<table border="1">
  <h3><?=$this->dataSet ['header']?> </h3>
  <meta charset="utf-8"/>




</table>
