<?php
/**
 * 
 */
class Shitje_Artikulli
{
	private $con_db;

	public $id_admin_user;
	public $studenti_perkates;
	public $emri_artikullit;
	public $sasia;
	public $shuma;
	private $table_name;



	function __construct()
	{
		$database=new Database();
		$db = $database->konektimi_db();
		$this->con_db = $db;
		
	}

	public function shitje_artikulli(){

		$user=new Admin_User();

		try {
		$sql="INSERT INTO shitje_artikulli (id_admin_user,id_student,emri_artikullit,sasia,shuma) VALUES (:id_admin_user,:id_student,:emri_artikullit,:sasia,:shuma)";

		$shto=$user->runQuery($sql);
		$shto->bindparam(":id_admin_user",$this->id_admin_user);
		$shto->bindparam(":id_student",$this->studenti_perkates);
		$shto->bindparam(":emri_artikullit",$this->emri_artikullit);
		$shto->bindparam(":sasia",$this->sasia);
		$shto->bindparam(":shuma",$this->shuma);
		$shto->execute();
		return $shto;
			

		} catch (Exception $e) {
			echo "Shitja e artikullit nuk pati sukses !! ". $e->getMessage();
			
		}


	}//Fundi i funksionit shto_mesues()

	public function te_dhena_shitje_artikulli(){
		$user=new Admin_User();
		$kushti=$user->my_id();
		$var=$user->runQuery("SELECT * FROM shitje_artikulli  WHERE id_admin_user=:kushti");
		$var->bindparam(':kushti',$kushti);
		$var->execute();
		$data=$var->fetchAll(PDO::FETCH_OBJ);
		return $data;
	}

	public function shitje_artikulli_shuma(){
		$user=new Admin_User();
		$kushti=$user->my_id();
		$var=$user->runQuery("SELECT SUM(shuma) as shuma_gjithsej FROM shitje_artikulli  WHERE id_admin_user=:kushti");
		$var->bindparam(':kushti',$kushti);
		$var->execute();
		$data=$var->fetch(PDO::FETCH_ASSOC);
		return $data;
	}
}




?>