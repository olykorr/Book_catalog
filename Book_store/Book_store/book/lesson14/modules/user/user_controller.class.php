<?php

class User_Controller extends User_View {
protected $ConnectTypetoBD;

	function __construct ($ConnectTypetoBD){
		parent::__construct ($ConnectTypetoBD);
		GLOBAL $_POST;


	if (isset ($_POST['doLogin']) )
	{
		$this->doLogin ($_POST['userLogin'], $_POST['userPswd']);
	}
	elseif  ( isset ($_POST['doRegister']) )
	{
  	$this->doRegister ();
	}
	elseif ( isset ($_POST['doEdit']) )
	{
		$this->doUpdate ();
	}
  elseif ( isset ($_POST['doLogout']) )
	{
    $this->doLogout ();
  }
  else
	{
		    $this->sessionLoadUser();
  }

}

	function doLogin ($login, $pswd)
	{
		if ( !$this->modelLoginUser ($login, $pswd))
    {
	    $this->msgInfo = 'Login or Pswd Error';
    }

	}

  function doLogout ()
	{
	   $this->modelLogoutUser();
  }

  function doUpdate ()
	{
		GLOBAL $_POST;
	}


	function doRegister ()
	{
		GLOBAL $_POST;
		$userLogin = $_POST['userLogin'];
  	$userPswd = $_POST['userPswd'];
		$userName = $_POST['userName'];
		echo '  $userLogin ='.  $userLogin.'<br>' ;
		echo '$userPswd ='.$userPswd.'<br>' ;
		echo '$userName='.$userName.'<br>';

		if ($this->modelCheckLogin ($userLogin) )
    {
		  $this->modelRegisterUser ($userLogin, $userPswd, $userName);
		  $this->modelLoginUser($userLogin, $userPswd);
    }
    else
		{
		  $this->msgInfo = 'Some user use this Login';
    }
	}

}
