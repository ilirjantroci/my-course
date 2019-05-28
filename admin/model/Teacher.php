<?php
/**
 * 
 */
class Teacher
{
	private $con_db;

	private $tab_name="mesues";

	public $id_admin_user;
	public $emri;
	public $mbiemri;
	public $email;
	public $numri;
	public $ditelindja;
	public $pershkrimi;

	public $id_update;//Kjo variable do mbaj si vlere ID  e nje mesuesi e cila sillet me ane te $_GET 


	function __construct()
	{
		$database=new Database();
		$db = $database->konektimi_db();
		$this->con_db = $db;
		
	}

	public function shto_mesues(){

		$user=new Admin_User();

		try {
		$sql="INSERT INTO $this->tab_name (id_admin_user,emri,mbiemri,email,numri,ditelindja,pershkrimi) VALUES (:id_admin_user,:emri,:mbiemri,:email,:numri,:ditelindja,:pershkrimi)";

		$shto=$user->runQuery($sql);
		$shto->bindparam(":id_admin_user",$this->id_admin_user);
		$shto->bindparam(":emri",$this->emri);
		$shto->bindparam(":mbiemri",$this->mbiemri);
		$shto->bindparam(":email",$this->email);
		$shto->bindparam(":numri",$this->numri);
		$shto->bindparam(":ditelindja",$this->ditelindja);
		$shto->bindparam(":pershkrimi",$this->pershkrimi);
		$shto->execute();
		return $shto;
			

		} catch (Exception $e) {
			echo "<br><br><br><h3 style='color:red;'>Regjistrimi i mesuesit nuk pati sukses</h3> ". $e->getMessage();
			
		}


	}//Fundi i funksionit shto_mesues()

	public function te_dhena_mesues(){
		$user=new Admin_User();
		$kushti=$user->my_id();
		$var=$user->runQuery("SELECT * FROM $this->tab_name  WHERE id_admin_user=:kushti");
		$var->bindparam(':kushti',$kushti);
		$var->execute();
		$data=$var->fetchAll(PDO::FETCH_OBJ);
		return $data;
	}

	public function te_dhena_mesues_id($id){
		$user=new Admin_User();
		$kushti=$user->my_id();
		$var=$user->runQuery("SELECT * FROM $this->tab_name  WHERE id_admin_user=:kushti and id_mesues=:id");
		$var->bindparam(':kushti',$kushti);
		$var->bindparam(':id',$id);
		$var->execute();
		$data=$var->fetchAll(PDO::FETCH_OBJ);
		return $data;
	}

	public function profile_teacher($kusht){
        $user=new Admin_User();
        $kushti2=$user->my_id();//Kushti2 mban id e userit ne sesion
		$sql="SELECT mesues.id_mesues, mesues.emri,mesues.mbiemri,mesues.numri,mesues.email,mesues.ditelindja,mesues.data_regjistrimit,mesues.pershkrimi,klasa.emri_klases,
			admin_user.emri as subjekti FROM $this->tab_name
			INNER JOIN klasa ON klasa.id_mesues=mesues.id_mesues
			INNER JOIN admin_user ON admin_user.id_admin_user=mesues.id_admin_user
			WHERE mesues.id_mesues=:kushti and mesues.id_admin_user=:kushti2";
			$tch_data=$user->runQuery($sql);
			$tch_data->bindparam(":kushti",$kusht);
			$tch_data->bindparam(":kushti2",$kushti2);
			$tch_data->setFetchMode(PDO::FETCH_ASSOC);
			$tch_data->execute();
			$data=$tch_data->fetch();
			return $data;


	}

	public function modifiko_mesues(){
		
		

		try {
			$user=new Admin_User();
			$sql_up="UPDATE $this->tab_name SET emri=:emri,mbiemri=:mbiemri,email=:email,numri=:numri,ditelindja=:ditelindja,pershkrimi=pershkrimi WHERE id_mesues=:tch";

		$shto=$this->con_db->prepare($sql_up);
		
		
		$shto->bindparam(":emri",$this->emri);
		$shto->bindparam(":mbiemri",$this->mbiemri);
		$shto->bindparam(":email",$this->email);
		$shto->bindparam(":numri",$this->numri);
		$shto->bindparam(":ditelindja",$this->ditelindja);
		$shto->bindparam(":pershkrimi",$this->pershkrimi);
		$shto->bindparam(":tch",$this->id_update);
		$shto->execute();
		return $shto;
			
		} catch (Exception $e) {
			echo "Modifikimi i te dhenave te ketij mesuesi nuk pati sukses". $e->getMessage();
			//return false;
		}
	}//

	public function mesuesit_e_fundit()
	{
		$user=new Admin_User();
		$kushti2=$user->my_id();
		$sql="SELECT id_mesues,emri,mbiemri,data_regjistrimit,id_admin_user FROM `mesues` WHERE id_admin_user=:kushti2 order by id_mesues DESC LIMIT 5";
		$data=$user->runQuery($sql);
		$data->bindparam(":kushti2",$kushti2);
		$data->execute();
		$te_dhena=$data->fetchAll(PDO::FETCH_OBJ);
		return $te_dhena;
	}//Fundi i funksionit mesuesit_e_fundit()
}




?>