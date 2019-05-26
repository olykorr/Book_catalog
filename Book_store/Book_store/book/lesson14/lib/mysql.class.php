<?php

class DB_Driver {

	protected $ptrDB;
	protected $dbErrorNum = 0;
	protected $dbErrorMsg;
	protected $msgInfo;
	protected $sqlRes;
	protected $sqlRow;
	protected $ConnectTypetoBD;

	function __construct ($ConnectTypetoBD){
		GLOBAL $MySql_Driver;
		$this->dbErrorNum = false;
		$this->dbErrorMsg = '';
		$this->ConnectTypetoBD=$ConnectTypetoBD;

		if ($ConnectTypetoBD=='MYSQLI')
		{
			$MySql_Driver = new mysqli(DB_HOST . ':' . DB_PORT, DB_USER, DB_PSWD, DB_NAME);
				if ($MySql_Driver->connect_errno)
				{
					echo "Не удалось подключиться к MySQL: (" . $MySql_Driver->connect_errno . ") " . $MySql_Driver->connect_error;
					die ("Работа прервана");
				}
			$this->ptrDB = $MySql_Driver;
		}
		elseif($ConnectTypetoBD=='PDO')
		{
			try {$MySql_Driver = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PSWD); 	}
			catch (PDOException $e)	{	echo 'Не удалось подключиться к MySQL PDO: ' . $e->getMessage();	}

		$this->ptrDB = $MySql_Driver;
		}


	}// end of cotructor

function sqlSendQuery ($sql)
	{
		if ($this->ConnectTypetoBD=='MYSQLI')
		{
			$this->sqlRes = $this->ptrDB->query($sql);
			$this->dbErrorNum = $this->ptrDB->errno;
			$this->dbErrorMsg =  $this->ptrDB->error;
			return $this->sqlRes;
    }
			elseif($this->ConnectTypetoBD=='PDO')
		{
			$this->sqlRes = $this->ptrDB->prepare($sql);
			$this->sqlRes->execute();
			return $this->sqlRes;
		}
			else
			{
				echo "function sqlSendQuery work wrong<br>";
			}

	}

	function sqlGetOneRow ()
	{
		if ($this->ConnectTypetoBD=='MYSQLI')
		{
		 	$this->sqlRow = $this->sqlRes->fetch_array(MYSQLI_ASSOC);
			return $this->sqlRow;
		}
	elseif($this->ConnectTypetoBD=='PDO')
		{
			$this->sqlRow = $this->sqlRes->fetch(PDO::FETCH_ASSOC);
			//prettyPrint($this->sqlRow );
			return $this->sqlRow;
		}
	}


	function sqlGetNextRow ()
	{
		if ($this->ConnectTypetoBD=='MYSQLI')
		{
			$this->sqlRow = $this->sqlRes->fetch_assoc();
	 		return $this->sqlRow;
		}
		elseif($this->ConnectTypetoBD=='PDO')
		{
			$this->sqlRow = $this->sqlRes->fetch(PDO::FETCH_ASSOC);
			return $this->sqlRow;
		}

	}

}
