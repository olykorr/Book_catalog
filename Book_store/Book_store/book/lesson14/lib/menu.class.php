<?php

require('mysql.class.php');

class Menu extends DB_Driver {
	protected $janres;
  protected $janresCount=1;
	private $menuItems;
	private $menuCount = 1;
	private $menuId;
	protected $ConnectTypetoBD;

	private $menuCssByLevel;
	private $menuCssDefault;
	private $navCssClass;

	function __construct ($ConnectTypetoBD){
		parent::__construct ($ConnectTypetoBD);
		$this->menuId = get_class($this);
		$this->setCssDefault ();
	}

	function setCssDefault (){
		$this->menuCssDefault ['ul'] = 'navbar-nav';
		$this->menuCssDefault ['li'] = 'nav-item';
		$this->menuCssDefault ['a'] = 'nav-link';
		$this->menuCssDefault ['span'] = '';
		$this->navCssClass = 'navbar';
		$this->navDivCssClassId = 'class="collapse navbar-collapse"';
	}



	function setCssBootStrap (){
	}

	function getCssClass ($lev, $el, $menuNum)
   {
		$res = '';
		if (isset($this->menuCssByLevel[$lev][$el]))
    {
			$res = $this->menuCssByLevel[$lev][$el];
		}
    elseif (isset($this->menuCssDefault[$el]))
    {
			$res = $this->menuCssDefault[$el];
		}
    else
    {
			$res = '';
		}
		$res.= ' ' . $this->menuId . '_' . $el . '_' . $menuNum;
		return $res;
	}

	function addMenuItem ($text, $url, $parent = 0)
  {
		$this->menuItems[$this->menuCount]['parent'] = $parent;
		if ($parent !=0 )
    {
			$this->menuItems [$parent]['cildren'] = $this->menuCount;
		}
		$this->menuItems[$this->menuCount]['text'] = $text;
		$this->menuItems[$this->menuCount]['url'] = $url;
		$this->menuItems[$this->menuCount]['cildren'] = 0;
		$ret = $this->menuCount;
		$this->menuCount++;
		return $ret;
	}


  function getMenuItemsByArray ()
  {
  	return $this->menuItems;
  }

	private $curMenuLevel = 0;

	function getMenuLevel ($el = 0)
  {
		$res ='<link href="bootstrap.min.css" rel="stylesheet">
		<nav class="navbar navbar-default" role="navigation">
		  <div class="container-fluid">
			<div class="navbar-header">
		 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			 <span class="sr-only">Toggle navigation</span>
			 <span class="icon-bar"></span>
			 <span class="icon-bar"></span>
			 <span class="icon-bar"></span>
		 </button>

	 </div>
	 <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		';
		$res.= '<ul id="menu_' . $this->menuId  . '_' . $el . '"  class="nav' .$this->getCssClass ($this->curMenuLevel, 'ul', 0) . '">' . PHP_EOL;

		for ($i = 1; $i < $this->menuCount; $i++)
    {
			if ($this->menuItems[$i]['parent'] == $el  )
      {
				$dd_li = ''; $dd_a = '';
				if ($this->menuItems[$i]['cildren'] != 0)
        {
					$dd_li = ' dropdown ';
					$dd_a = ' dropdown-toggle ';
				};

				$res.= '<li  class="active' . $this->getCssClass ($this->curMenuLevel, 'li', $i) . ' ' . $dd_li . ' ">';
				$res.= '<span class="' . $this->getCssClass ($this->curMenuLevel, 'span', $i) . '">';
				$res.= '<a href="' . $this->menuItems[$i]['url']  . '"  class="' . $this->getCssClass ($this->curMenuLevel, 'a', $i) . ' ' . $dd_a . '" >' . $this->menuItems[$i]['text'];
				$res.= '</a></span>' . PHP_EOL;

				if ($this->menuItems[$i]['cildren'] != 0)
        {
					$this->curMenuLevel++;
					$res.= '<div class="dropdown-menu" >' . PHP_EOL;
					$res.= $this->getMenuLevel ($i);
					$res.= '</div>' . PHP_EOL;
					$this->curMenuLevel--;
				}
				$res.= '</li>' . PHP_EOL;
			}
		}
		$res.= '</ul>' . PHP_EOL;
		return $res;
	}


	function getMenu ()
  {
		$res = '<nav id="nav_' . $this->menuId  . '"  class="' . $this->navCssClass . '">' . PHP_EOL;
		//$res.= $this->getMenuMobileButton ();
		$res.= '<div' . $this->navDivCssClassId . '>' . PHP_EOL;
		$res.= $this->getMenuLevel(0);
		$res.= '</div></div></nav>' . PHP_EOL;
		return $res;
	}

	function getJanreMenu ()
  {
			$sql = "SELECT janreID, janreName, UrlLink FROM `janre`".PHP_EOL;
			$this->sqlSendQuery ($sql);
      $c = 0;
			while ($row = $this->sqlGetNextRow() )
      {
				$this->janres[$this->janresCount]['janreID'] = $row ['janreID'];
				$this->janres[$this->janresCount]['janreName'] = $row ['janreName'];
				$this->janres[$this->janresCount]['UrlLink'] = $row ['UrlLink'];
				$this->janresCount++;
			}
			return $this->janres;
  }

	function echoJanreName($i)
  {
		return $this->janres[$i]['janreName'];
	}

	function echoJanreUrl($i)
  {
		return $this->janres[$i]['UrlLink'];
	}


	function echoBooksList ($data = '')
  {
		include(CMS_MODULES_PATH . 'books/templates/booklist.tpl.php');
	}


	function getMenuMobileButton ()
  {
		$res = '<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>' . PHP_EOL;
		return $res;
	}

}// end class Menu
