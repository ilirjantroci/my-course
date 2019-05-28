<?php
/**
 * 
 */
class Fitime_Mujore 
{
	
	function __construct()
	{
		
	}

	public function Janar()
	{
		$user=new Admin_User();
		$kushti2=$user->my_id();

		$sql="SELECT mandat_pagese.muaji,SUM(mandat_pagese.shuma) as shuma,admin_user.emri as subjekti,admin_user.id_admin_user FROM `mandat_pagese`
		INNER JOIN admin_user ON admin_user.id_admin_user=mandat_pagese.id_admin_user
		WHERE mandat_pagese.muaji='Janar' and mandat_pagese.id_admin_user=:kushti2";
		$data=$user->runQuery($sql);
		$data->bindparam(":kushti2",$kushti2);
		$data->execute();
		$te_dhena=$data->fetchAll(PDO::FETCH_OBJ);
		return $te_dhena;
	}

	public function Shkurt()
	{
		$user=new Admin_User();
		$kushti2=$user->my_id();

		$sql="SELECT mandat_pagese.muaji,SUM(mandat_pagese.shuma) as shuma,admin_user.emri as subjekti,admin_user.id_admin_user FROM `mandat_pagese`
		INNER JOIN admin_user ON admin_user.id_admin_user=mandat_pagese.id_admin_user
		WHERE mandat_pagese.muaji='Shkurt' and mandat_pagese.id_admin_user=:kushti2";
		$data=$user->runQuery($sql);
		$data->bindparam(":kushti2",$kushti2);
		$data->execute();
		$te_dhena=$data->fetchAll(PDO::FETCH_OBJ);
		return $te_dhena;
	}

	public function Mars()
	{
		$user=new Admin_User();
		$kushti2=$user->my_id();

		$sql="SELECT mandat_pagese.muaji,SUM(mandat_pagese.shuma) as shuma,admin_user.emri as subjekti,admin_user.id_admin_user FROM `mandat_pagese`
		INNER JOIN admin_user ON admin_user.id_admin_user=mandat_pagese.id_admin_user
		WHERE mandat_pagese.muaji='Mars' and mandat_pagese.id_admin_user=:kushti2";
		$data=$user->runQuery($sql);
		$data->bindparam(":kushti2",$kushti2);
		$data->execute();
		$te_dhena=$data->fetchAll(PDO::FETCH_OBJ);
		return $te_dhena;
	}

	public function Prill()
	{
		$user=new Admin_User();
		$kushti2=$user->my_id();

		$sql="SELECT mandat_pagese.muaji,SUM(mandat_pagese.shuma) as shuma,admin_user.emri as subjekti,admin_user.id_admin_user FROM `mandat_pagese`
		INNER JOIN admin_user ON admin_user.id_admin_user=mandat_pagese.id_admin_user
		WHERE mandat_pagese.muaji='Prill' and mandat_pagese.id_admin_user=:kushti2";
		$data=$user->runQuery($sql);
		$data->bindparam(":kushti2",$kushti2);
		$data->execute();
		$te_dhena=$data->fetchAll(PDO::FETCH_OBJ);
		return $te_dhena;
	}

	public function Maj()
	{
		$user=new Admin_User();
		$kushti2=$user->my_id();

		$sql="SELECT mandat_pagese.muaji,SUM(mandat_pagese.shuma) as shuma,admin_user.emri as subjekti,admin_user.id_admin_user FROM `mandat_pagese`
		INNER JOIN admin_user ON admin_user.id_admin_user=mandat_pagese.id_admin_user
		WHERE mandat_pagese.muaji='Maj' and mandat_pagese.id_admin_user=:kushti2";
		$data=$user->runQuery($sql);
		$data->bindparam(":kushti2",$kushti2);
		$data->execute();
		$te_dhena=$data->fetchAll(PDO::FETCH_OBJ);
		return $te_dhena;
	}

	public function Qershor()
	{
		$user=new Admin_User();
		$kushti2=$user->my_id();

		$sql="SELECT mandat_pagese.muaji,SUM(mandat_pagese.shuma) as shuma,admin_user.emri as subjekti,admin_user.id_admin_user FROM `mandat_pagese`
		INNER JOIN admin_user ON admin_user.id_admin_user=mandat_pagese.id_admin_user
		WHERE mandat_pagese.muaji='Qershor' and mandat_pagese.id_admin_user=:kushti2";
		$data=$user->runQuery($sql);
		$data->bindparam(":kushti2",$kushti2);
		$data->execute();
		$te_dhena=$data->fetchAll(PDO::FETCH_OBJ);
		return $te_dhena;
	}

	public function Korrik()
	{
		$user=new Admin_User();
		$kushti2=$user->my_id();

		$sql="SELECT mandat_pagese.muaji,SUM(mandat_pagese.shuma) as shuma,admin_user.emri as subjekti,admin_user.id_admin_user FROM `mandat_pagese`
		INNER JOIN admin_user ON admin_user.id_admin_user=mandat_pagese.id_admin_user
		WHERE mandat_pagese.muaji='Korrik' and mandat_pagese.id_admin_user=:kushti2";
		$data=$user->runQuery($sql);
		$data->bindparam(":kushti2",$kushti2);
		$data->execute();
		$te_dhena=$data->fetchAll(PDO::FETCH_OBJ);
		return $te_dhena;
	}

	public function Gusht()
	{
		$user=new Admin_User();
		$kushti2=$user->my_id();

		$sql="SELECT mandat_pagese.muaji,SUM(mandat_pagese.shuma) as shuma,admin_user.emri as subjekti,admin_user.id_admin_user FROM `mandat_pagese`
		INNER JOIN admin_user ON admin_user.id_admin_user=mandat_pagese.id_admin_user
		WHERE mandat_pagese.muaji='Gusht' and mandat_pagese.id_admin_user=:kushti2";
		$data=$user->runQuery($sql);
		$data->bindparam(":kushti2",$kushti2);
		$data->execute();
		$te_dhena=$data->fetchAll(PDO::FETCH_OBJ);
		return $te_dhena;
	}

	public function Shtator()
	{
		$user=new Admin_User();
		$kushti2=$user->my_id();

		$sql="SELECT mandat_pagese.muaji,SUM(mandat_pagese.shuma) as shuma,admin_user.emri as subjekti,admin_user.id_admin_user FROM `mandat_pagese`
		INNER JOIN admin_user ON admin_user.id_admin_user=mandat_pagese.id_admin_user
		WHERE mandat_pagese.muaji='Shtator' and mandat_pagese.id_admin_user=:kushti2";
		$data=$user->runQuery($sql);
		$data->bindparam(":kushti2",$kushti2);
		$data->execute();
		$te_dhena=$data->fetchAll(PDO::FETCH_OBJ);
		return $te_dhena;
	}

	public function Tetor()
	{
		$user=new Admin_User();
		$kushti2=$user->my_id();

		$sql="SELECT mandat_pagese.muaji,SUM(mandat_pagese.shuma) as shuma,admin_user.emri as subjekti,admin_user.id_admin_user FROM `mandat_pagese`
		INNER JOIN admin_user ON admin_user.id_admin_user=mandat_pagese.id_admin_user
		WHERE mandat_pagese.muaji='Tetor' and mandat_pagese.id_admin_user=:kushti2";
		$data=$user->runQuery($sql);
		$data->bindparam(":kushti2",$kushti2);
		$data->execute();
		$te_dhena=$data->fetchAll(PDO::FETCH_OBJ);
		return $te_dhena;
	}

	public function Nentor()
	{
		$user=new Admin_User();
		$kushti2=$user->my_id();

		$sql="SELECT mandat_pagese.muaji,SUM(mandat_pagese.shuma) as shuma,admin_user.emri as subjekti,admin_user.id_admin_user FROM `mandat_pagese`
		INNER JOIN admin_user ON admin_user.id_admin_user=mandat_pagese.id_admin_user
		WHERE mandat_pagese.muaji='Nentor' and mandat_pagese.id_admin_user=:kushti2";
		$data=$user->runQuery($sql);
		$data->bindparam(":kushti2",$kushti2);
		$data->execute();
		$te_dhena=$data->fetchAll(PDO::FETCH_OBJ);
		return $te_dhena;
	}

	public function Dhjetor()
	{
		$user=new Admin_User();
		$kushti2=$user->my_id();

		$sql="SELECT mandat_pagese.muaji,SUM(mandat_pagese.shuma) as shuma,admin_user.emri as subjekti,admin_user.id_admin_user FROM `mandat_pagese`
		INNER JOIN admin_user ON admin_user.id_admin_user=mandat_pagese.id_admin_user
		WHERE mandat_pagese.muaji='Dhjetor' and mandat_pagese.id_admin_user=:kushti2";
		$data=$user->runQuery($sql);
		$data->bindparam(":kushti2",$kushti2);
		$data->execute();
		$te_dhena=$data->fetchAll(PDO::FETCH_OBJ);
		return $te_dhena;
	}

	
}

?>