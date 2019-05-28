<?php
include_once 'admin/model/Admin_User.php';
session_start();
if (isset($_POST['identifikohu'])) {

	
	$email=$_POST['email'];
	$fjalekalimi=$_POST['fjalekalimi'];
	$tipi=$_POST['tipi'];
	

	

	$njoftim=null;
	
	if (is_null($email)) {
		$njoftim[]="Ju lutem shenoni emailin";
	}
	else if (is_null($fjalekalimi)) {
		$njoftim[]="Ju lutem shenoni fjalekalimin";
	}
	
	else if (is_null($njoftim)) {
		$user= new Admin_User();
		$user->identifikohu($email,$fjalekalimi,$tipi);

	   }
	
	
	
  


}

?>



<!DOCTYPE html>
<html>
<head>
	<title>Identifikohu ne sistem </title>
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
			    		<h3 class="panel-title">Identifikohu ne sistem </small></h3>
			 			</div>
			 			<div  class="panel-body">
			 				<?php if (isset($njoftim)) { ?>
                               <p class="alert alert-danger text-center"><?php echo $njoftim; ?></p>
                             <?php } ?>
			 				<form method="post" action="" role="form">
			    			

			    			<div class="form-group">
			    				<input style="height: 40px;border:1px solid black;color: black;" type="email" name="email" id="email" value="demo@my-course.cf" class="form-control input-sm" placeholder="Emaili juaj">
			    			</div>

			    			<div class="form-group">
			    				<input style="height: 40px;border:1px solid black;color: black;" type="password" name="fjalekalimi" value="demo" id="email" class="form-control input-sm" placeholder="Fjalekalimi juaj">
			    			</div>
			    			<input  type="hidden" name="tipi" value="1">

			    			
			    			
			    			<input type="submit" name="identifikohu" value="Identifikohu" class="btn btn-info btn-block">
			    			<br><!--<p style="text-align: center;font-size: 10px;">Nese nuk jeni regjistruar<br><span style="color: blue;"><a href="regjistrohu.php"> Regjistrohu tani</a></span></p>-->
			    		
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