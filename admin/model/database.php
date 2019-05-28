<?php
class Database
{   
    private $host = "localhost";
    private $emri_db = "kursi";
    private $username = "root";
    private $fjalekalimi = "";
    public $lidhja_db;
     
    public function konektimi_db()
	{
     
	    $this->conn = null;    
        try
		{
            $this->lidhja_db = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->emri_db, $this->username, $this->fjalekalimi);
			$this->lidhja_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        }
		catch(PDOException $e)
		{
            echo "Lidhja me serverin deshtoi: " . $e->getMessage();
        }
         
        return $this->lidhja_db;
    }
}
?>