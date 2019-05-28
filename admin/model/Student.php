<?php
/**
 * 
 */
class Student
{
	private $con_db;

	public $id_admin_user;
	public $emri;
	public $mbiemri;
	public $email;
	public $numri_personal;
	public $numri_prindit;
	public $ditelindja;
	public $pershkrimi;
	public $klasa_perkatese;
	public $kursi_perkates;

	private $tb_name="student";

	public $id_update;//Kjo var mban vleren e id te nje studenti qe do e perdori si kusht per te bere update nje rekord


	function __construct()
	{
		$database=new Database();
		$db = $database->konektimi_db();
		$this->con_db = $db;
		
	}

	public function shto_student(){

		$user=new Admin_User();

		try {
		$sql="INSERT INTO $this->tb_name (id_admin_user,id_kursi,id_klasa,emri,mbiemri,email,numri_personal,numri_prindit,ditelindja,pershkrimi) VALUES (:id_admin_user,:id_kursi,:id_klasa,:emri,:mbiemri,:email,:numri_personal,:numri_prindit,:ditelindja,:pershkrimi)";

		$shto=$user->runQuery($sql);
		$shto->bindparam(":id_admin_user",$this->id_admin_user);
		$shto->bindparam(":emri",$this->emri);
		$shto->bindparam(":mbiemri",$this->mbiemri);
		$shto->bindparam(":email",$this->email);
		$shto->bindparam(":numri_personal",$this->numri_personal);
		$shto->bindparam(":numri_prindit",$this->numri_prindit);
		$shto->bindparam(":ditelindja",$this->ditelindja);
		$shto->bindparam(":pershkrimi",$this->pershkrimi);
		$shto->bindparam(":id_kursi",$this->kursi_perkates);
		$shto->bindparam(":id_klasa",$this->klasa_perkatese);
		$shto->execute();
		return $shto;
			

		} catch (Exception $e) {
			echo "Regjistrimi i studentit nuk pati sukses ". $e->getMessage();
			
		}


	}//Fundi i funksionit shto_mesues()

	public function te_dhena_student_all(){
		$user=new Admin_User();
		$kushti=$user->my_id();
		$var=$user->runQuery("SELECT * FROM $this->tb_name  WHERE id_admin_user=:kushti");
		$var->bindparam(':kushti',$kushti);
		$var->execute();
		$data=$var->fetchAll(PDO::FETCH_OBJ);
		return $data;
	}

	public function te_dhena_student_id($id){
		$user=new Admin_User();
		$kushti=$user->my_id();
		$var=$user->runQuery("SELECT * FROM $this->tb_name  WHERE id_admin_user=:kushti and id_student=:id");
		$var->bindparam(':kushti',$kushti);
		$var->bindparam(':id',$id);
		$var->execute();
		$data=$var->fetchAll(PDO::FETCH_OBJ);
		return $data;

    }//Fundi i funksionit te_dhena_kursi

	public function modifiko_student(){
		$user=new Admin_User();
		try {
			$sql_up="UPDATE $this->tb_name SET id_kursi=:id_kursi,id_klasa=:id_klasa,emri=:emri,mbiemri=:mbiemri,email=:email,numri_personal=:numri_personal,numri_prindit=:numri_prindit,ditelindja=:ditelindja,pershkrimi=:pershkrimi WHERE id_student=:st";
			$krijo=$this->con_db->prepare($sql_up);
			$krijo->bindparam(":id_kursi",$this->kursi_perkates);
			$krijo->bindparam(":id_klasa",$this->klasa_perkatese);
			
			$krijo->bindparam(":emri",$this->emri);
			$krijo->bindparam(":mbiemri",$this->mbiemri);
			$krijo->bindparam(":email",$this->email);
			$krijo->bindparam(":numri_personal",$this->numri_personal);
			$krijo->bindparam(":numri_prindit",$this->numri_prindit);
			$krijo->bindparam(":ditelindja",$this->ditelindja);
			$krijo->bindparam(":pershkrimi",$this->pershkrimi);
			$krijo->bindparam(":st",$this->id_update);
			$krijo->execute();
			return $krijo;

			
		} catch (Exception $e) {
			echo "<h1 style='color:red;'>Modifikimi i studentit nuk pati sukses</h1>".$e->getMessage();
		}

	}

	public function students_sipas_klasave($kushti){
		$user=new Admin_User();
		$kushti2=$user->my_id();
		$sql="SELECT * FROM $this->tb_name WHERE id_klasa=:kushti and id_admin_user=:kushti2";
		$st_kl=$user->runQuery($sql);
		$st_kl->bindparam(":kushti",$kushti);
		$st_kl->bindparam(":kushti2",$kushti2);
		$st_kl->execute();
		$data=$st_kl->fetchAll(PDO::FETCH_OBJ);
		return $data;


	}//Fundi i funksionit students_sipas_klasave()

	public function student_profile_all_data($kushti1){
		$user=new Admin_User();
		$kushti2=$user->my_id();
		$sql="SELECT student.id_student,student.emri,student.mbiemri,student.numri_personal,student.numri_prindit,student.email,student.ditelindja,student.data_regjistrimit,    mandat_pagese.muaji,mandat_pagese.shuma,kursi.emri_kursit,kursi.id_kursi,klasa.emri_klases,admin_user.emri as subjekti FROM student
            INNER JOIN mandat_pagese ON mandat_pagese.id_student=student.id_student
			INNER JOIN kursi ON kursi.id_kursi=student.id_kursi
			INNER JOIN klasa ON klasa.id_klasa=student.id_klasa
			INNER JOIN admin_user ON admin_user.id_admin_user=student.id_admin_user
            WHERE student.id_student=:kushti1 and student.id_admin_user=:kushti2";
		$te_dhena=$user->runQuery($sql);
		$te_dhena->bindparam(":kushti1",$kushti1);
		$te_dhena->bindparam(":kushti2",$kushti2);
		$te_dhena->setFetchMode(PDO::FETCH_ASSOC);
		$te_dhena->execute();
		//$te_dhena->fetchAll(PDO::FETCH_OBJ);
		$data=$te_dhena->fetch();
		return $data;


	}//Fundi i funksionit student_profile_all_data

	public function student_kursi_klasa_perkatese($kushti1){
		$user=new Admin_User();
		$kushti2=$user->my_id();
		$sql="SELECT student.id_student,student.emri,kursi.emri_kursit,kursi.id_kursi,klasa.emri_klases,klasa.id_klasa,admin_user.id_admin_user FROM student
            
			INNER JOIN kursi ON kursi.id_kursi=student.id_kursi
			INNER JOIN klasa ON klasa.id_klasa=student.id_klasa
			INNER JOIN admin_user ON admin_user.id_admin_user=student.id_admin_user
            WHERE student.id_student=:kushti1 and student.id_admin_user=:kushti2";
		$te_dhena=$user->runQuery($sql);
		$te_dhena->bindparam(":kushti1",$kushti1);
		$te_dhena->bindparam(":kushti2",$kushti2);
		$te_dhena->execute();
		$data=$te_dhena->fetchAll(PDO::FETCH_OBJ);
		return $data;

		//Ky funksion eshte perdorur per te nxjerre klasen dhe kursin ne te cilen ben pjese studenti dhe eshte perdorur vetem tek rasti nese duam te bejme update te dhenat e nje studenti 


	}//Fundi i funksionit student_kursi_klasa_perkatese()

	public function studentet_e_fundit()
	{
		$user=new Admin_User();
		$kushti2=$user->my_id();
		$sql="SELECT id_student,emri,mbiemri,data_regjistrimit,id_admin_user FROM `student` WHERE id_admin_user=:kushti2 order by id_student DESC LIMIT 5";
		$data=$user->runQuery($sql);
		$data->bindparam(":kushti2",$kushti2);
		$data->execute();
		$te_dhena=$data->fetchAll(PDO::FETCH_OBJ);
		return $te_dhena;
	}//Fundi i funksionit studentet_e_fundit()
}




?>