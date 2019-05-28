<?php
/**
 * 
 */
class Mandat_Pagese
{
	private $con_db;

	public $id_admin_user;
	public $muaji;
	public $shuma;
	public $studenti_perkates;
	public $kursi_perkates;

	private $tab_name="mandat_pagese";



	function __construct()
	{
		$database=new Database();
		$db = $database->konektimi_db();
		$this->con_db = $db;
		
	}

	public function do_mandat_pagese(){

		$user=new Admin_User();

		try {
		$sql="INSERT INTO $this->tab_name (id_admin_user,id_student,muaji,shuma,id_kursi) VALUES (:id_admin_user,:id_student,:muaji,:shuma,:id_kursi)";

		$shto=$user->runQuery($sql);
		$shto->bindparam(":id_admin_user",$this->id_admin_user);
		$shto->bindparam(":id_student",$this->studenti_perkates);
		$shto->bindparam(":muaji",$this->muaji);
		$shto->bindparam(":shuma",$this->shuma);
		$shto->bindparam(":id_kursi",$this->kursi_perkates);
		$shto->execute();
		return $shto;
			

		} catch (Exception $e) {
			echo "Mandat i pagese nuk mbaroi me sukses!! ". $e->getMessage();
			
		}


	}//Fundi i funksionit shto_mesues()

	public function te_dhena_mandat_pagese(){
		$user=new Admin_User();
		$kushti=$user->my_id();
		$var=$user->runQuery("SELECT * FROM $this->tab_name  WHERE id_admin_user=:kushti");
		$var->bindparam(':kushti',$kushti);
		$var->execute();
		$data=$var->fetchAll(PDO::FETCH_OBJ);
		return $data;
	}

	public function mandat_pagese_shuma(){
		$user=new Admin_User();
		$kushti=$user->my_id();
		$var=$user->runQuery("SELECT SUM(shuma) as shuma_gjithsej FROM $this->tab_name  WHERE id_admin_user=:kushti");
		$var->bindparam(':kushti',$kushti);
		$var->execute();
		$data=$var->fetch(PDO::FETCH_ASSOC);
		return $data;
	}

	public function mandat_pagese_list(){
		$user=new Admin_User();
		$kushti=$user->my_id();
		$var=$user->runQuery("SELECT admin_user.emri as subjekti, student.emri,student.mbiemri, mandat_pagese.muaji,mandat_pagese.id_mandat_pagese,mandat_pagese.data_berjes,mandat_pagese.shuma,kursi.emri_kursit FROM $this->tab_name
				INNER JOIN student ON student.id_student=mandat_pagese.id_student
				INNER JOIN admin_user ON admin_user.id_admin_user=mandat_pagese.id_admin_user
				 INNER JOIN kursi ON kursi.id_kursi=mandat_pagese.id_kursi  WHERE mandat_pagese.id_admin_user=:kushti");
		$var->bindparam(":kushti",$kushti);
		$var->execute();
		$data=$var->fetchAll(PDO::FETCH_OBJ);
		return $data;

     }

     public function mandat_pagese_list_id($id_student){
		$user=new Admin_User();
		$kushti=$user->my_id();
		$var=$user->runQuery("SELECT admin_user.emri as subjekti, student.emri,student.mbiemri, mandat_pagese.muaji,mandat_pagese.id_mandat_pagese,mandat_pagese.data_berjes,mandat_pagese.shuma,kursi.emri_kursit FROM $this->tab_name
				INNER JOIN student ON student.id_student=mandat_pagese.id_student
				INNER JOIN admin_user ON admin_user.id_admin_user=mandat_pagese.id_admin_user
				 INNER JOIN kursi ON kursi.id_kursi=mandat_pagese.id_kursi  WHERE mandat_pagese.id_admin_user=:kushti and student.id_student=:kushti2");
		$var->bindparam(":kushti",$kushti);
		$var->bindparam(":kushti2",$id_student);
		$var->execute();
		$data=$var->fetchAll(PDO::FETCH_OBJ);
		return $data;

     }
}




?>