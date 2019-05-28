<?php
include_once '../includes/header.php';
include_once '../model/Klasa.php';
include_once '../model/Kursi.php';
include_once '../model/Teacher.php';
include_once '../model/Student.php';
include_once "../model/Admin_User.php";


$klasa=new Klasa();
$kursi=new Kursi();
$mesues=new Teacher();
$student=new Student();

$user=new Admin_User();
$user_data=$user->te_dhena_user();

$data_klasa=$klasa->te_dhena_klasa();
$data_kursi=$kursi->te_dhena_kursi();
$data_mesues=$mesues->te_dhena_mesues();
$data_student=$student->te_dhena_student_all();




?>

<div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                
                            </div>
                            <h4 class="page-title">Profile</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->


                <div class="row">
                    <div class="col-xl-3 col-lg-4">

                        <div class="text-center card-box">
                            <div class="member-card">
                                
                                <div class="">
                                    <h5 class="m-b-5"><?php echo $user_data['emri'];  ?></h5>
                                    
                                </div>

                            

                                


                                <div class="text-left m-t-40">
                                    <p class="text-muted font-13"><strong>Emri :</strong> <span class="m-l-15"><?php echo $user_data['emri'];  ?></span></p>
                                    

                                    <p class="text-muted font-13"><strong>Nr.Telefon :</strong><span class="m-l-15"><?php echo "0".$user_data['numri'];  ?></span></p>

                                    <p class="text-muted font-13"><strong>Email :</strong> <span class="m-l-15"><?php echo $user_data['email'];  ?></span></p>

                                    
                                </div>

                                

                            </div>

                        </div> <!-- end card-box -->
                        
                        

                        

                    </div> <!-- end col -->


                    <div class="col-lg-8 col-xl-9">
                        <div class="">
                            <div class="card-box">
                                <ul class="nav nav-tabs tabs-bordered">
                                    <li class="nav-item">
                                        <a href="#home" data-toggle="tab" aria-expanded="false" class="nav-link active show">
                                            Rreth kursit
                                        </a>
                                    </li>
                                    
                                    
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active show" id="home">
                                        <p class="m-b-5">Te dhena rreth kursit tuaj</p>
                                        <h4 style="color: white;font-family: sans-serif;">Regjistruar me date : <small><?php echo $user_data['data_regjistrimit'];  ?></small></h4><br>

                                        <h4 style="color: white;font-family: sans-serif;">Kurset qe zhvilloni : <small><?php echo count($data_kursi, COUNT_RECURSIVE)."  kurse"; ?></small></h4><br>
                                        <h4 style="color: white;font-family: sans-serif;">Klasat : <small><?php echo count($data_klasa, COUNT_RECURSIVE)."  klasa"; ?></small></h4><br>

                                        <h4 style="color: white;font-family: sans-serif;">Instruktoret : <small><?php echo count($data_mesues, COUNT_RECURSIVE)."  instruktore"; ?></small></h4><br>

                                        <h4 style="color: white;font-family: sans-serif;">Studentet : <small><?php echo count($data_student, COUNT_RECURSIVE)."  studente"; ?></small></h4><br>

                                        

                                        
                                    </div>

                                    
                                    
                                </div>
                            </div>
                        </div>

                    </div> <!-- end col -->
                </div>

                <!-- end row -->

            </div> <!-- end container -->
        </div>

<?php
include '../includes/footer.php';
?>