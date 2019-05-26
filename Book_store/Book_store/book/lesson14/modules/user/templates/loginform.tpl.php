 <h3>Login</h3>
 <?=$this->getErros();?>
 <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

 <!--<form action="<?//=$_SERVER['PHP_SELF']?>" method="POST">
	<input type="text" name="userLogin" value="<?=$data['userLogin']?>" /><br />
	<input type="password" name="userPswd" /><br />
	<input type="submit" name="doLogin" value="Enter" />
</form>-->



 <form action="<?=$_SERVER['PHP_SELF']?>" method="POST" class="form-inline" role="form">
  <div class="form-group">
    <label class="sr-only" for="InputLogin">Login</label>
    <input type="text" name="userLogin" class="form-control"  id="InputLogin" value="<?=$data['userLogin']?>" /><br />
  </div>

  <div class="form-group">
    <label class="sr-only" for="InputPassword">Пароль</label>
    <input type="password" name="userPswd" class="form-control" id="InputPassword" placeholder="Password"  /><br />
  </div>
  <div class="checkbox">
    <label>
          <input type="checkbox"> Запомнить меня
    </label>
  </div>
  	<input type="submit" name="doLogin" value="Enter" class="btn btn-default"/>

</form>
