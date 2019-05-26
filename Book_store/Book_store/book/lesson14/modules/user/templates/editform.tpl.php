 <h3>Форма редактирования пользователя</h3>
 <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
 <?=$this->getErros();?>




 <form action="<?=$_SERVER['PHP_SELF']?>"  method="POST" class="form-inline" role="form">
   <div class="form-group">
	<input type="text" class="form-control"  name="userID" value="<?=$this->userID?>" disabled /><br />
    </div>
     <div class="form-group">
     <input type="text" class="form-control" name="userLogin" value="<?=$this->userLogin?>" disabled /><br />
    </div>

      <div class="form-group">
	<input type="text" class="form-control" name="user['userName']" value="<?=$this->userName?>" /><br />
    </div>
    <div class="form-group">
	<input type="password" class="form-control" name="user['userPswd']" /><br />
    </div>
      <div class="form-group">
	<input type="submit"  name="doEdit" value="Update" class="btn btn-default" />
    </div>
 </form>
