<?php

/**
 * 
 */
class Kursi
{
	private $con_db;//Variabli te ciles i eshte dhene vlera per konektimin me db
	public $emri_kursit;
	public $id_admin_user;

	public $id_update;

	//Kjo perdoret per te mbajtur ID e Admin_Userit qe eshte i loguar ne sistem 

	public $error;

	

	function __construct()
	{
		
		$database = new Database();
		$db = $database->konektimi_db();
		$this->con_db = $db;

		

		
	}
	public function krijo_kurs(){
		try {
			$sql="INSERT INTO `kursi`(`id_admin_user`, `emri_kursit`) VALUES (:id_admin_user,:emri_kursit) ";
			$krijo=$this->con_db->prepare($sql);

			$krijo->bindparam(":id_admin_user",$this->id_admin_user);
			$krijo->bindparam(":emri_kursit",$this->emri_kursit);
			$krijo->execute();
			return $krijo;
			
		} catch (Exception $e) {
			$this->error="Kursi nuk u krijua me sukses,ju lutem provoni perseri";
		}


	}//Fundi i funksionit krijo kurs

	public function te_dhena_kursi(){
		$user=new Admin_User();
		$kushti=$user->my_id();
		$var=$user->runQuery("SELECT * FROM kursi  WHERE id_admin_user=:kushti");
		$var->bindparam(':kushti',$kushti);
		$var->execute();
		$data=$var->fetchAll(PDO::FETCH_OBJ);
		return $data;

    }//Fundi i funksionit te_dhena_kursi

    public function edito_kursin(){
    	try {
    		
    	
    	$user=new Admin_User();
    	$sql_up="UPDATE kursi SET emri_kursit=:emri_kursit WHERE id_kursi=:k ";
    	$edit=$this->con_db->prepare($sql_up);
    	$edit->bindparam(":emri_kursit",$this->emri_kursit);
    	$edit->bindparam(":k",$this->id_update);
    	$edit->execute();
    	return $edit;
    }

    	catch (Exception $e) {
    		echo "Updetimi nuk pati sukses".$e->getMessage();
    	}
    }

    public function te_dhena_kursi_id($id){
		$user=new Admin_User();
		$kushti=$user->my_id();
		$var=$user->runQuery("SELECT * FROM kursi  WHERE id_admin_user=:kushti and id_kursi=:id");
		$var->bindparam(':kushti',$kushti);
		$var->bindparam(':id',$id);
		$var->execute();
		$data=$var->fetchAll(PDO::FETCH_OBJ);
		return $data;

    }//Fundi i funksionit te_dhena_kursi




}

?>