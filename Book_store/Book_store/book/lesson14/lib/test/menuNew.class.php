<?php
/**
 * Меню
 *
 *
 */

class MenuNew {
	private $menuItems; // Главный массив меню
	private $menuCount = 1; // Нумерация элемента
	private $menuId; // Внутреннее имя меню

	private $menuCssByLevel; // Таблица стилей для разных уровней
	private $menuCssDefault; // Значнеие CSS классов по умолчанию для всех элементов
	private $navCssClass; // Значение CSS класса для главного тега NAV

	function __construct (){
		$this->menuId = get_class($this);
		$this->setCssDefault ();
	}

//-- устанавливает значения классов для элементов CSS по умолчанию
	function setCssDefault (){
		$this->menuCssDefault ['ul'] = 'navbar-nav';
		$this->menuCssDefault ['li'] = 'nav-item';
		$this->menuCssDefault ['a'] = 'nav-link';
		$this->menuCssDefault ['span'] = '';
		$this->navCssClass = 'navbar';
		$this->navDivCssClassId = 'class="collapse navbar-collapse"';
	}


//-- устанавливает значения CSS Bootstrap
	function setCssBootStrap (){
	}


//-- Определяет CSS класс элемента
	function getCssClass ($lev, $el, $menuNum) {
		$res = '';
		if (isset($this->menuCssByLevel[$lev][$el])) { // если определен класс для этого элемента
			$res = $this->menuCssByLevel[$lev][$el];

		}elseif (isset($this->menuCssDefault[$el])) {
			$res = $this->menuCssDefault[$el];
		}else {
			$res = '';
		}
		$res.= ' ' . $this->menuId . '_' . $el . '_' . $menuNum;
		return $res;
	}


//-- Добавляет элемент меню
/*	function addMenuItem ($text, $url, $parent = 0){
		$this->menuItems[$this->menuCount]['parent'] = $parent;
		if ($parent !=0 ) {
			$this->menuItems [$parent]['cildren'] = $this->menuCount;
		}
		$this->menuItems[$this->menuCount]['text'] = $text;
		$this->menuItems[$this->menuCount]['url'] = $url;
		$this->menuItems[$this->menuCount]['cildren'] = 0;
		$ret = $this->menuCount;
		$this->menuCount++;
		return $ret;
	}


//-- Возвращает массив данных по меню
	function getMenuItemsByArray (){
		return $this->menuItems;
	}

//-- Строит уровень меню, принимая номер элемента и фиксируя уровень во внешней переменной
	private $curMenuLevel = 0;

	function getMenuLevel ($el = 0){

			$res='';
		$res.='<link href="bootstrap.min.css" rel="stylesheet">
	<nav class="navbar navbar-default" role="navigation">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <!-- Group the nav links, forms, drop-down menus and other elements for toggling -->';
				 $res.='<div class="collapse navbar-collapse" >
						<ul class="nav navbar-nav ' .$this->getCssClass ($this->curMenuLevel, 'ul', 0) . '">';
			for ($i = 1; $i < $this->menuCount; $i++) {
				echo 'количество пунктов='.$this->menuCount;
				echo "пункт'.$i.'=".$this->menuItems[$i]['text'].PHP_EOL.'<br>';
					//if ($this->menuItems[$i]['parent'] == $el  ) // если элемент меню является предком (0 для меню первого уровня)
			//	{
			      $res.= '<li class="active"><a href="' . $this->menuItems[$i]['url']  . '">'. $this->menuItems[$i]['text'].'</a>';

						if ($this->menuItems[$i]['cildren'] != 0)
						{ // Если есть наследники - поднять уровень на 1 и войти в рекурсию
							$this->curMenuLevel++;
							for ($i = 1; $i < $this->menuCount; $i++) {
							//$res.= ' будет строится меню уровня ' . $this->curMenuLevel; // Сообщение о начале рекурсии
							$res.='<li class="dropdown">
							 <a href="#" class="dropdown-toggle" data-toggle="dropdown">'. $this->menuItems[$i]['text'].' <b class="caret"></b></a>
							  <ul class="dropdown-menu">';
								if ($this->menuItems[$i]['parent'] == $el  )
								{
									$res.='<li><a href="' . $this->menuItems[$i]['url']  . '" >'. $this->menuItems[$i]['text'].'</a></li>';
								} //close if
							  $res.='</ul></li>';

							$this->curMenuLevel--;
						}//close if

					$res.='</li>';
		//echo htmlspecialchars($res); печать html

	//}//close if
}//close for
	return $res;
}//close  getMenuLevel
*/

	function getMenu () {
		$res = '<nav id="nav_' . $this->menuId  . '"  class="' . $this->navCssClass . '">' . PHP_EOL;
		//$res.= $this->getMenuMobileButton ();
		$res.= '<div' . $this->navDivCssClassId . '>' . PHP_EOL;
		$res.= $this->getMenuLevel(0);
		$res.= '</div></div></nav>' . PHP_EOL;
		return $res;

	}

/*
	function getMenuMobileButton () {
		$res = '<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>' . PHP_EOL;
		//$res.= '<a class="navbar-brand" href="#">Главное меню</a>' . PHP_EOL;
		return $res;
	}

}*/
// end class Menu
