 <h3>Admin Menu</h3>
 <ul class="topmenu">
    <li><a href='<?=CMS_BASE_URL . 'adminka/ajax/'?>'>Quik book serch</a></li>
    <li><a href="<?=CMS_BASE_URL . 'adminka/'?>">Add book</a></li>
    <li><a href="">Dell book</a></li>
  <ul>
 <?=$this->getErros();?>
 <?=$this->userLogin;?> ( <?=$this->userName; ?>)
 <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
	<input type="submit" name="doLogout" value="Logout" />


 </form>
