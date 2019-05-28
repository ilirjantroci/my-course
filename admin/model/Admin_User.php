<?php
require_once('database.php');//Importimi i klases Databse
 /*
 Kasa per te gjitha actions qe ben nje user admin
 */
class Admin_User 
{
	private $con_db;
	public $emri_kursit;
	public $email;
	public $numri;
	public $fjalekalimi;

	public $error;
	private $emri_tab="admin_user";//e shikon kete var e cila mban emrin e tabeles kjo eshte me e sigurte se nje komand e drejteperdrejte

	function __construct()
	{
		$database = new Database();
		$db = $database->konektimi_db();
		$this->con_db = $db;
		
	}

	public function register(){

	try {

		$reg=$this->runQuery("INSERT INTO $this->emri_tab(emri, email, numri, fjalekalimi) VALUES (:emri,:email,:numri,:fjalekalimi)");
		//$reg=$this->con_db->prepare($sql);

		$reg->bindparam(":emri",$this->emri_kursit);
		$reg->bindparam(":email",$this->email);
		$reg->bindparam(":numri",$this->numri);
		$reg->bindparam(":fjalekalimi",$this->fjalekalimi);
		$reg->execute();
		return $reg;
		
	} catch (Exception $e) {

		echo "Regjistrimi nuk pati sukses" . $e->getMessage();	
			return false;
	  }
	}//Fundi i funksionit regjistrohu

	public function identifikohu($email,$fjalekalimi,$tipi){
		

		$sql2="SELECT * FROM admin_user WHERE email=:email AND fjalekalimi=:fjalekalimi AND tipi=:tipi";
		$log=$this->con_db->prepare($sql2);
		$log->bindparam(":email",$email);
		$log->bindparam(":fjalekalimi",$fjalekalimi);
		$log->bindparam(":tipi",$tipi);

		

	    $log->setFetchMode(PDO::FETCH_ASSOC);
		$log->execute();
		$te_dhena=$log->fetch();

		if($te_dhena['email']!=$email and $te_dhena['fjalekalimi']!=$fjalekalimi and $te_dhena['tipi']!=$tipi)
			 {
			  
			  $njoftim="Te dhenat qe futet jane gabim!  Emaili ose fjalekalimi nuk eshte i sakte!"; 
			  echo "<script type='text/javascript'>alert('$njoftim');</script>";
			 
			 }
		elseif($te_dhena['email']==$email and $te_dhena['fjalekalimi']==$fjalekalimi and $te_dhena['tipi']==$tipi)
				 {
				    

				        $_SESSION['email']=$te_dhena['email'];
				        $_SESSION['tipi']=$te_dhena['tipi'];
				        $this->go_to('admin/view') ;
				 
				 }

		




	}//Fundi i funksionit identifikohu

	

    public function CheckInput($var) {

      $var = htmlspecialchars($var);
      $var = stripcslashes($var);
      $var = trim($var);


      return $var;
    }//Fundi i funksionit check input

    public function go_to($url){
    	header("Location: $url");

    }//Fundi i funksionit go_to

    public function i_loguar(){
    	if(empty($_SESSION['email']) and empty($_SESSION['tipi']))
		{
				$this->go_to('../../enter.php');
		}
		return true;
    }//Fundi i funksionit i_loguar // Ky funksion shikon nese ne sesion jane derguar keto te dhena apo jo

    public function runQuery($ks)
	{
		$var = $this->con_db->prepare($ks);
		return $var;
	}


    public function i_am(){
     $email_kushti = $_SESSION['email'];
     return $email_kushti;
    }//Fundi i funksionit i_am()

    

    public function te_dhena_user(){
    	$kushti=$this->i_am();
        $var=$this->runQuery("SELECT * FROM admin_user  WHERE email=:kushti");
		$var->bindparam(':kushti',$kushti);
		$var->execute();
		$data=$var->fetch(PDO::FETCH_ASSOC);
		return $data;
     }//Fundi i funksionit te_dhena_user() 

     public function my_id(){
     	$te_dhena=$this->te_dhena_user();
     	$id_aktive=$te_dhena['id_admin_user'];
     	return $id_aktive;
     }


}
?>