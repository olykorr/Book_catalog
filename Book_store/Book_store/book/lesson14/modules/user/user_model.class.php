<?php
class User_Model extends DB_Driver
{

	protected $userID;
	protected $userLogin;
	protected $userName;
	protected $userData;
  protected $userAdmin;
	protected $ConnectTypetoBD;

	function __construct ($ConnectTypetoBD){
 		$this->sessionLoadUser();
		parent::__construct ($ConnectTypetoBD);
	}

	function modelLoginUser ($userLogin, $userPswd)
	{
    $sql = "SELECT * FROM `user` WHERE `userLogin` = '" . $userLogin .  "' AND `userPswd`='" . $userPswd."'" ;
    $this->sqlSendQuery($sql);
    $row = $this->sqlGetOneRow();
    if (isset($row['userID']))
		{
      $this->userID = $row['userID'];
      $this->userLogin = $row['userLogin'];
      $this->userName = $row['userName'];
      $this->userData = $row;
      $this->userAdmin = $row['Admin'];
      $this->sessionSaveUser();
      return true;
    }
    else
    {
   		echo "modelLoginUser false";
    	return false;
    }
  }

	function modelCheckLogin ($userLogin)
	{
	 	$sql = "SELECT COUNT(`userLogin`) AS useLogin FROM `user` WHERE `userLogin` = '" . $userLogin . "'";
    $this->sqlSendQuery($sql);
    $row = $this->sqlGetOneRow();
	   if ($row ['useLogin'] > 0)
		 {
      	echo 'bad login';
	       return false;
      }
      else
			{
        echo 'good login';
	      return true;
      }
  }


	function modelLogoutUser ()
	{
 		session_destroy();
	  session_start();
    $this->sessionLoadUser();
  }

  function sessionSaveUser ()
	{
    $_SESSION['userID'] = $this->userID;
    $_SESSION['userLogin'] = $this->userLogin;
    $_SESSION['userName'] = $this->userName;
    $_SESSION['userData'] = $this->userData;
  }

  function sessionLoadUser ()
	{
    if (isset($_SESSION['userID']))
		{
    	$this->userID = $_SESSION['userID'];
      $this->userLogin = $_SESSION['userLogin'];
      $this->userName = $_SESSION['userName'];
      $this->userData = $_SESSION['userData'];
    }
    else
		{
    	$this->userID = 0;
      $this->userLogin = 'guest';
      $this->userName = 'Guest';
      $this->userData = array ();
      $this->sessionSaveUser();
    }
  }

	function modelRegisterUser ($userLogin, $userName, $userPswd)
	{
		$this->msgError = '';
		$sql = "INSERT INTO `user` (`userLogin`, `userName`, `userPswd`)
                VALUES ('" . $userLogin . "', '" . $userName . "', MD5('" . $userPswd . "'))";
		$this->sqlSendQuery($sql);
	}

	function modelUpdateUser  ($login, $pswd)
	{

	}


}
