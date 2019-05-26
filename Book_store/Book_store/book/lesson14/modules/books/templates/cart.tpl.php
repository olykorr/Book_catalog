<h3><?=$this->dataSet ['header']?> </h3>

<h3><?=$this->dataSet ['book']['bookTitle'] ?></h3>
<h4><?=$this->dataSet ['book']['bookPrice'] ?></h4>

<ul>
  <li><?=$this->dataSet ['book']['autors']?></li>
  <li><?=$this->dataSet ['book']['janre']?></li>
</ul>

<div><?=$this->dataSet ['book']['bookDes']?></div>

<form action="<?=CMS_BASE_URL.'books/email.php'?>" method="GET">
  <input type="hidden" name="bookID" value="<?=$this->dataSet ['book']['bookID'] ?>" />
  <input type="email" name="userEmail" />
  <input type="submit" name="doSendMail" />
</form>
