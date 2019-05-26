 <h3>Register</h3>
 <?=$this->getErros();?>
 <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
 <form action="<?=$_SERVER['PHP_SELF']?>"  method="POST" class="form-inline" role="form">


     <label class="sr-only" for="InputLogin">Login</label>
	    <input type="text" name="userLogin" class="form-control" placeholder="Login" id="InputLogin" /><br />
  </div>


  <div class="form-group">
    <label class="sr-only" for="InputEmail">Email</label>
    <input type="text" id="InputEmail" name="userEmail" class="form-control" placeholder="Email" /><br />
 </div>

 <div class="form-group">
   <label class="sr-only" for="InputUserPswd">User Pswd</label>
   <input type="password" id="InputUserPswd" name="userPswd" class="form-control" placeholder="Password" /><br />
 </div>

 <div class="form-group">
   <label class="sr-only" for="InputUserPswd">Confirm Pswd</label>
   <input type="password" id="InputConfUserPswd" name="userConfPswd" class="form-control" placeholder="ConfPassword" /><br />
 </div>

   <div class="form-group">
     <label class="sr-only" for="InputUserName">User Name</label>
     <input type="text" id="InputUserName" name="userName" class="form-control" placeholder="Name" /><br />
  </div>

  <div class="form-group">
    <label class="sr-only" for="InputUserLastName">User LastName</label>
    <input type="text" id="InputUserLastName" name="userName" class="form-control" placeholder="LastName" /><br />
 </div>




	<input type="submit" name="doRegister" value="Regiser" class="btn btn-default" />
 </form>
