 <h3>Welcome</h3>
 <?=$this->getErros();?>
 <?=$this->userLogin;?> ( <?=$this->userName; ?>)
 <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
	<input type="submit" name="doLogout" value="Logout" />
 </form>
