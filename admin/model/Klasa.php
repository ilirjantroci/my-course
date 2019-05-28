<?php

/**
 * 
 */
class Klasa
{
	private $con_db;

	public $id_kursi;//Mban id e kursit perkates qe do zhvillohet ne klase
	public $id_mesues;//Mban id e mesuesit perkates qe jep mesim ne klase
	public $id_admin_user;
	public $emri_klases;
	public $e_hene;
	public $e_marte;
	public $e_merkure;
	public $e_enjte;
	public $e_premte;
	public $e_shtune;
	public $e_diele;

	public $id_update;//Kjo variable do te mbaj si vlere ID e nje klasa e cila do te vij nga URL me ane te $_GET dhe do sherbej si kusht per te bere update nje klase
	

	public $error;


	function __construct()
	{
		$database = new Database();
		$db = $database->konektimi_db();
		$this->con_db = $db;

		
	}

	public function krijo_klase(){
		$user=new Admin_User();
		try {
			$sql="INSERT INTO klasa(id_kursi,id_mesues, id_admin_user,emri_klases,e_hene, e_marte,e_merkure,e_enjte,e_premte,e_shtune,e_diele) VALUES (:id_kursi,:id_mesues,:id_admin_user,:emri_klases,:e_hene,:e_marte,:e_merkure,:e_enjte,:e_premte,:e_shtune,:e_diele)";
			$krijo=$this->con_db->prepare($sql);
			$krijo->bindparam(":id_kursi",$this->id_kursi);
			$krijo->bindparam(":id_mesues",$this->id_mesues);
			$krijo->bindparam(":id_admin_user",$this->id_admin_user);
			$krijo->bindparam(":emri_klases",$this->emri_klases);
			$krijo->bindparam(":e_hene",$this->e_hene);
			$krijo->bindparam(":e_marte",$this->e_marte);
			$krijo->bindparam(":e_merkure",$this->e_merkure);
			$krijo->bindparam(":e_enjte",$this->e_enjte);
			$krijo->bindparam(":e_premte",$this->e_premte);
			$krijo->bindparam(":e_shtune",$this->e_shtune);
			$krijo->bindparam(":e_diele",$this->e_diele);
			$krijo->execute();
			return $krijo;

			
		} catch (Exception $e) {
			echo "Krijimi i klases nuk pati sukses".$e->getMessage();
		}

		

		
		
	}//Fundi i funksionit krijo_klase()

	public function te_dhena_klasa(){
		$user=new Admin_User();
		$kushti=$user->my_id();
		$var=$user->runQuery("SELECT klasa.id_klasa, klasa.emri_klases,klasa.data_krijimit, kursi.emri_kursit,mesues.emri,mesues.mbiemri FROM klasa
			INNER JOIN kursi ON kursi.id_kursi=klasa.id_kursi
			INNER JOIN mesues ON mesues.id_mesues=klasa.id_mesues WHERE klasa.id_admin_user=:kushti");
		$var->bindparam(':kushti',$kushti);
		$var->execute();
		$data=$var->fetchAll(PDO::FETCH_OBJ);
		return $data;


	}

	public function te_dhena_klasa_id($id){
		$user=new Admin_User();
		$kushti=$user->my_id();
		$var=$user->runQuery("SELECT klasa.id_klasa, klasa.emri_klases,klasa.data_krijimit,klasa.e_hene,klasa.e_marte,klasa.e_merkure,klasa.e_enjte,klasa.e_premte,klasa.e_shtune,klasa.e_diele, kursi.emri_kursit,kursi.id_kursi, mesues.emri,mesues.mbiemri,mesues.id_mesues FROM klasa
			INNER JOIN kursi ON kursi.id_kursi=klasa.id_kursi
			INNER JOIN mesues ON mesues.id_mesues=klasa.id_mesues WHERE klasa.id_admin_user=:kushti and klasa.id_klasa=:id");
		$var->bindparam(':kushti',$kushti);
		$var->bindparam(':id',$id);
		$var->execute();
		$data=$var->fetchAll(PDO::FETCH_OBJ);
		return $data;


	}

	public function te_dhena_klasa_id_fetch($id){
		$user=new Admin_User();
		$kushti=$user->my_id();
		$var=$user->runQuery("SELECT klasa.id_klasa, klasa.emri_klases,klasa.data_krijimit,
            
			klasa.e_hene,klasa.e_marte,klasa.e_merkure,klasa.e_enjte,klasa.e_premte,klasa.e_shtune,klasa.e_diele, kursi.emri_kursit,mesues.emri,mesues.mbiemri,admin_user.emri as subjekti FROM klasa
			INNER JOIN kursi ON kursi.id_kursi=klasa.id_kursi
			INNER JOIN mesues ON mesues.id_mesues=klasa.id_mesues INNER JOIN admin_user ON admin_user.id_admin_user=klasa.id_admin_user  WHERE klasa.id_admin_user=:kushti and klasa.id_klasa=:id");
		$var->bindparam(':kushti',$kushti);
		$var->bindparam(':id',$id);
		$var->setFetchMode(PDO::FETCH_ASSOC);
		$var->execute();
		$data=$var->fetch();
		return $data;


	}

	public function modifiko_klase(){
		$user=new Admin_User();
		$kushti2=$user->my_id();
		try {
			$sql_up="UPDATE `klasa` SET id_kursi=:id_kursi,id_mesues=:id_mesues,emri_klases=:emri_klases,e_hene=:e_hene,e_marte=:e_marte,e_merkure=:e_merkure,e_enjte=:e_enjte,e_premte=:e_premte,e_shtune=:e_shtune,e_diele=:e_diele WHERE id_klasa=:kl and id_admin_user=:kushti2";
			$krijo=$this->con_db->prepare($sql_up);
			$krijo->bindparam(":id_kursi",$this->id_kursi);
			$krijo->bindparam(":id_mesues",$this->id_mesues);
			$krijo->bindparam(":kushti2",$kushti2);
			
			$krijo->bindparam(":emri_klases",$this->emri_klases);
			$krijo->bindparam(":e_hene",$this->e_hene);
			$krijo->bindparam(":e_marte",$this->e_marte);
			$krijo->bindparam(":e_merkure",$this->e_merkure);
			$krijo->bindparam(":e_enjte",$this->e_enjte);
			$krijo->bindparam(":e_premte",$this->e_premte);
			$krijo->bindparam(":e_shtune",$this->e_shtune);
			$krijo->bindparam(":e_diele",$this->e_diele);
			$krijo->bindparam(":kl",$this->id_update);
			$krijo->execute();
			return $krijo;

			
		} catch (Exception $e) {
			echo "Modifikimi i klases nuk pati sukses".$e->getMessage();
		}

		

		
		
	}

	public function klasat_perkatese_teacher($kushti){
		$user=new Admin_User();
		$kushti2=$user->my_id();
		$sql="SELECT klasa.emri_klases,kursi.emri_kursit,klasa.data_krijimit,mesues.id_mesues FROM klasa
INNER JOIN kursi ON kursi.id_kursi=klasa.id_kursi
INNER JOIN mesues ON mesues.id_mesues=klasa.id_mesues
WHERE klasa.id_mesues=:kushti and klasa.id_admin_user=:kushti2";
		$kl_data=$user->runQuery($sql);
		$kl_data->bindparam(":kushti",$kushti);
		$kl_data->bindparam(":kushti2",$kushti2);
		$kl_data->execute();
		$data=$kl_data->fetchAll(PDO::FETCH_OBJ);
		return $data;


	}//Fundi i funksionit klasat_perkatese_teacher()

	


	




}

?>