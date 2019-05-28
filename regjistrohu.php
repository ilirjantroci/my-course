<?php
include_once 'admin/model/Admin_User.php';

if (isset($_POST['regjistro'])) {

	$emri_kursit=$_POST['emri_kursit'];
	$numri=$_POST['numri'];
	$email=$_POST['email'];
	$fjalekalimi=$_POST['fjalekalimi'];
	$fjalekalimi2=$_POST['fjalekalimi2'];

	

	$njoftim=null;
	
	if (is_null($emri_kursit)) {
		$njoftim="Ju lutem shenoni emrin e kursit";
		
	}
	
	if (is_null($njoftim)) {
		$user= new Admin_User();
		$user->emri_kursit = $emri_kursit;
		$user->email = $email;
		$user->numri = $numri;
		$user->fjalekalimi = $fjalekalimi;
		$user->register();
		$user->go_to('true.php');
	}


}

?>



<!DOCTYPE html>
<html>
<head>
	<title>REGJISTROHU</title>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<!------ Include the above in your HEAD tag ---------->

    <script type="text/javascript" src="http://www.clubdesign.at/floatlabels.js"></script>

<style type="text/css">
	body{
  /* Safari 4-5, Chrome 1-9 */
    background: -webkit-gradient(radial, center center, 0, center center, 460, from(#1a82f7), to(#2F2727));

  /* Safari 5.1+, Chrome 10+ */
    background: -webkit-radial-gradient(circle, #1a82f7, #2F2727);

  /* Firefox 3.6+ */
    background: -moz-radial-gradient(circle, #1a82f7, #2F2727);

  /* IE 10 */
    background: -ms-radial-gradient(circle, #1a82f7, #2F2727);
    height:600px;
}

.centered-form{
	margin-top: 60px;
}

.centered-form .panel{
	background: rgba(255, 255, 255, 0.8);
	box-shadow: rgba(0, 0, 0, 0.3) 20px 20px 20px;
}

label.label-floatlabel {
    font-weight: bold;
    color: #46b8da;
    font-size: 11px;
}
</style>
</head>
<body>
<div class="container">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Regjistroni kursin tuaj!</small></h3>
			 			</div>
			 			<div class="panel-body">
			 				<?php if (isset($njoftim)) { ?>
                               <p class="alert alert-danger text-center"><?php echo $njoftim; ?></p>
                             <?php } ?>
			    		<form method="post" action="" role="form">
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                <input type="text" name="emri_kursit" id="first_name" class="form-control input-sm floatlabel" placeholder="emri kursit">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="number" name="numri" id="last_name" class="form-control input-sm" placeholder="numer kontakti">
			    					</div>
			    				</div>
			    			</div>

			    			<div class="form-group">
			    				<input type="email" name="email" id="email" class="form-control input-sm" placeholder="adrese emaili">
			    			</div>

			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" name="fjalekalimi" id="password" class="form-control input-sm" placeholder="fjalekalimi">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" name="fjalekalimi2" id="password_confirmation" class="form-control input-sm" placeholder="perseritni fjalekalimin">
			    					</div>
			    				</div>
			    			</div>
			    			
			    			<input type="submit" name="regjistro" value="Regjistrohu" class="btn btn-info btn-block"><br><p style="text-align: center;font-size: 10px;">Nese ju e keni nje llogari<br><span style="color: blue;"><a href="identifikohu.php"> Identifikohu tani</a></span></p>
			    		
			    		</form>
			    	</div>
	    		</div>
    		</div>
    	</div>
    </div>
    <script type="text/javascript">
    	$(function() {
  $('input').floatlabel({labelEndTop:0});
});
    </script>
</body>
</html>