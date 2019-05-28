<?php
include 'database.php';
include 'Admin_User.php';
/**
 * 
 */
class Deletee
{
	private $con_db;//Variabli te ciles i eshte dhene vlera per konektimin me db
	
	function __construct()
	{
		
		$database = new Database();
		$db = $database->konektimi_db();
		$this->con_db = $db;

		

		
	}

	private function kushti(){
		$user=new Admin_User();
		$kushti=$user->my_id();
		return $kushti;
	}

	public function delete_kursi($k){
		

        $sql="DELETE FROM kursi WHERE id_kursi=:kushti";
		$stmt = $this->con_db->prepare($sql);
		$stmt->bindparam(":kushti",$k);
		$stmt->execute();
		return true;

	}

	public function delete_klasa($kl){

        $sql="DELETE FROM klasa WHERE id_klasa=:kushti";
		$stmt = $this->con_db->prepare($sql);
		$stmt->bindparam(":kushti",$kl);
		$stmt->execute();
		return true;

	}

	public function delete_student($st){

        $sql="DELETE FROM student WHERE id_student=:kushti";
		$stmt = $this->con_db->prepare($sql);
		$stmt->bindparam(":kushti",$st);
		$stmt->execute();
		return true;

	}

	public function delete_teacher($tch){

        $sql="DELETE FROM mesues WHERE id_mesues=:kushti";
		$stmt = $this->con_db->prepare($sql);
		$stmt->bindparam(":kushti",$tch);
		$stmt->execute();
		return true;

	}

	public function delete_mandat($mandat){
		try {
			
		
		$sql="DELETE FROM mandat_pagese WHERE id_mandat_pagese=:kushti";
		$stmt=$this->con_db->prepare($sql);
		$stmt->bindparam(":kushti",$mandat);
		$stmt->execute();
		return true;
	}
		 catch (Exception $e) {
			echo "Fshirja e mandatit nuk pati sukses".$e->getMessage();
		}
	}




}

?>