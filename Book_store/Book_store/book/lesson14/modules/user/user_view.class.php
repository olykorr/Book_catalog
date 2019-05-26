<?php

class User_View extends User_Model
{

  protected $dataSet;
  protected $ConnectTypetoBD;
  function __construct ($ConnectTypetoBD){
    parent::__construct ($ConnectTypetoBD);
  }

	function getErros ($data = '')
  {
	    $res = '';
	    if (isset($data['err']) && is_array($data['err']))
      {
        for ($i = 0; $i < sizeof($data ['err']); $i++)
         {
          $res .= '<li>' . $data['err'][$i] . '</li>';
          }
      }

      if ($this->dbErrorNum !=0)
      {
	      $res.= '<li> MySQL Error: ' . $this->dbErrorNum . ' - ' . $this->dbErrorMsg . '</li>';
      }

      if (strlen($this->msgInfo) > 0)
      {
	        $res.= '<li> User Module say: ' . $this->msgInfo . '</li>';
      }

      if (strlen($res) > 0)
      {
	       $res = '<ul class="Error">' . $res . '</ul>';
      }
        return $res;
  }

	function getLoginForm ($data = '')
  {
	  $data['userLogin'] = $this->userLogin;
	  if ($this->userID == 0)
    {
      include(CMS_MODULES_PATH . 'user/templates/loginform.tpl.php');
      include(CMS_MODULES_PATH . 'user/templates/registerform.tpl.php');
    }
    elseif($this->userAdmin!=1)
    {
      echo "userAdmin==".$this->userAdmin;
      include (CMS_MODULES_PATH . 'user/templates/welcome.tpl.php');
    }
    else
    {
      include (CMS_MODULES_PATH . 'user/templates/Admin_menu.tpl.php');
    }
  }

  function getRegisterForm ($data = '')
  {
		include (CMS_MODULES_PATH . 'user/templates/registerform.tpl.php');
	}

	function getEditForm ($data = '')
  {
		include (CMS_MODULES_PATH . 'user/templates/editform.tpl.php');
	}

}
