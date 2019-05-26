<meta charset="utf-8"/>
<table border="1">
  <h3>Ваша корзина </h3>
  <meta charset="utf-8"/>

<thead>
 <tr> <h2> Заказ №
   </h2>
  </tr>
</thead>

<?php
echo '<tr>';
  echo '<td> Book Title</td>';
  echo '<td> Book id</td>';
  echo '<td> bookDes </td>';
  echo '<td> authors </td>';
  echo '<td > count </td>';
  echo '<td > order </td>';
  echo '<td> price</td>';
echo '</tr>';
  for ($i = 1; $i <= sizeof($this->dataSet ['booksInCart']); $i++ )
  {

  echo '<tr>';
  echo '<td>' .$this->dataSet['OneBook'][$this->dataSet['booksInCart'][$i]['bookID']]['bookTitle'] . '</td>';
  echo '<td>'.$this->dataSet['booksInCart'][$i]['bookID'].'</td>';
  echo '<td>' .$this->dataSet['OneBook'][$this->dataSet['booksInCart'][$i]['bookID']]['bookDes'] . '</td>';
  echo '<td> ' .$this->dataSet['OneBook'][$this->dataSet['booksInCart'][$i]['bookID']]['authors'] . ' </td>';
  echo '<td >'.$this->dataSet['booksInCart'][$i]['count'].' </td>';
  echo '<td >'.$this->dataSet['booksInCart'][$i]['orderID'].' </td>';
  echo '<td> price</td>';

  echo '</tr>';
}
echo '</table>';
?>





</table>
