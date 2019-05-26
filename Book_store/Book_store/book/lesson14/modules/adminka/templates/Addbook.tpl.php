<meta charset="utf-8"/>
<table border="1">
  <h3>Добавить книгу</h3>
  <meta charset="utf-8"/>

<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

<form action="<?=$_SERVER['PHP_SELF']?>"  method="POST" class="form-inline" role="form">

   <div class="form-group">
   <label class="sr-only" for="Book_Title">Book_Title</label>
   <input type="text" id="Book_Title" name="Book_Title" class="form-control" placeholder="Book Title" /><br />
</div>

<div class="form-group">
  <label class="sr-only" for="Book_Descriptiion">Book_Descriptiion</label>
  <input type="text" id="Book_Descriptiion" name="Book_Descriptiion" class="form-control" placeholder="Book_Descriptiion" /><br />
</div>

<div class="form-group">
  <label class="sr-only" for="Book_Price">Book_Price</label>
  <input type="text" id="Book_Price" name="Book_Price" class="form-control" placeholder="Book Price" /><br />
</div>

<div class="form-group">
  <label class="sr-only" for="Book_Number">Book_Number</label>
  <input type="text" id="Book_Number" name="Book_Number" class="form-control" placeholder="Book Number" /><br />
</div>

<div class="form-group">
  <label class="sr-only" for="Author_Name1">Author_Name 1</label>
  <input type="text" id="Author_Name1" name="Author_Name1" class="form-control" placeholder="Author_Name1" /><br />
</div>

<div class="form-group">
  <label class="sr-only" for="Author_Name">Author_Name 2</label>
  <input type="text" id="Author_Name2" name="Author_Name2" class="form-control" placeholder="Author_Name2" /><br />
</div>

	<input type="submit" name="addBook" value="Enter" class="btn btn-default"/>

</form>







</table>
