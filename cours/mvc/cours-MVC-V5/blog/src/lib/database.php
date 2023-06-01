<?php

class DatabaseConnection
{
	public ?PDO $database = null;

	public function getConnection(): PDO
	{
    	if ($this->database === null) {
        	$this->database = new PDO('mysql:host=fred-sol.fr;dbname=lqja1143_blogMVC;charset=utf8', 'lqja1143_solfred10', 'Matthieu29112007.');
    	}

    	return $this->database;
	}
}