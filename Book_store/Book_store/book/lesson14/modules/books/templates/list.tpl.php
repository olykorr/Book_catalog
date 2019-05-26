<meta charset="utf-8"/>
<table border="1">
  <h3><?=$this->dataSet ['header']?> </h3>
  <meta charset="utf-8"/>

<thead>
 <tr>
   <th><?=$this->getOrderLink('bookID', 'DESC')?> * </a> ID <?=$this->getOrderLink('bookID', 'ASC')?> . </a></th>
   <th><?=$this->getOrderLink('bookTitle', 'DESC')?> * </a> Title <?=$this->getOrderLink('bookTitle', 'ASC')?> . </a></th>
   <th> Des </th>
   <th><?=$this->getOrderLink('bookPrice', 'DESC')?> * </a> Price <?=$this->getOrderLink('bookPrice', 'ASC')?> . </a></th>
 </tr>
</thead>
<?php
for ($i = 0; $i < sizeof($this->dataSet ['books']); $i++ ){
  echo '<tr>';
  echo '<td>' . $this->dataSet ['books'][$i]['bookID'] . '</td>';
  echo '<td>' . $this->dataSet ['books'][$i]['bookTitle'] . '<br />';
  echo $this->dataSet ['books'][$i]['authors'] . '<br />';
  echo $this->dataSet ['books'][$i]['janre'] . '</td>';
  echo '<td>' . $this->dataSet ['books'][$i]['bookDes'] . '</td>';
  echo '<td>' . $this->dataSet ['books'][$i]['bookPrice']  . '</td>';
// Добавить ссылку на страницу книги
  echo '<td><a href="' . CMS_BASE_URL . 'books/book.php?bookID=' . $this->dataSet ['books'][$i]['bookID'] . '"> Read More </a></td>';
  echo '</tr>' . PHP_EOL;
}
?>

</table>
