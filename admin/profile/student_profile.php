<?php
include_once '../includes/header.php';
include_once "../model/Student.php";
include_once "../model/Klasa.php";
include_once "../model/Mandat_Pagese.php";

$student=new Student();
$mandat=new Mandat_Pagese();


$st=$_GET['st'];
$data_student=$student->student_profile_all_data($st);

$data_mandat=$mandat->mandat_pagese_list_id($st);

?>

<div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                    
                                </ol>
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
                                    <h5 class="m-b-5"><?php echo $data_student['emri']." ".$data_student['mbiemri'];  ?></h5>
                                    <p class="text-muted"><?php echo $data_student['subjekti'];  ?></p>
                                </div>

                            

                                <button type="button" class="btn btn-success btn-sm w-sm waves-effect m-t-10 waves-light"><a style="color: red;" href="../actions/edit_student.php?st=<?php echo $data_student['id_student'];  ?>">Edit</a></button>
                                <button onclick="return confirm('Jeni te sigurte qe doni te fshini kete? Nese po klikoni yes.  Nese ky student fshihet nuk do te kete me mundesi kthimi pas ')" type="button" class="btn btn-danger btn-sm w-sm waves-effect m-t-10 waves-light"><a style="color: red;" href="../actions/delete.php?st=<?php echo $data_student['id_student'];  ?>"> Delete</a></button>


                                <div class="text-left m-t-40">
                                    <p class="text-muted font-13"><strong>Emri :</strong> <span class="m-l-15"><?php echo $data_student['emri'];  ?></span></p>
                                    <p class="text-muted font-13"><strong>Mbiemri :</strong> <span class="m-l-15"><?php echo $data_student['mbiemri'];  ?></span></p>

                                    <p class="text-muted font-13"><strong>Nr.Telefon :</strong><span class="m-l-15"><?php echo "0".$data_student['numri_personal'];  ?></span></p>

                                    <p class="text-muted font-13"><strong>Email :</strong> <span class="m-l-15"><?php echo $data_student['email'];  ?></span></p>

                                    
                                </div>

                                

                            </div>

                        </div> <!-- end card-box -->
                        
                        

                        <div class="card-box">
                            <h4 class="m-t-0 m-b-20 header-title">Kurset qe ndjek</h4>

                            <div class="p-b-10">
                                <p><?php echo $data_student['emri_kursit'];  ?></p>
                                <div class="progress progress-sm">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                    </div> <!-- end col -->


                    <div class="col-lg-8 col-xl-9">
                        <div class="">
                            <div class="card-box">
                                <ul class="nav nav-tabs tabs-bordered">
                                    <li class="nav-item">
                                        <a href="#home" data-toggle="tab" aria-expanded="false" class="nav-link active show">
                                            Rreth studentit
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#profile" data-toggle="tab" aria-expanded="true" class="nav-link">
                                            Mandatet e pagesave
                                        </a>
                                    </li>
                                    
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active show" id="home">
                                        <p class="m-b-5">Te dhenat e studentit</p>
                                        <h4 style="color: white;font-family: sans-serif;">Regjistruar me date : <small><?php echo $data_student['data_regjistrimit'];  ?></small></h4><br>

                                        <h4 style="color: white;font-family: sans-serif;">Ditelindja : <small><?php echo $data_student['ditelindja'];  ?></small></h4><br>

                                        <h4 style="color: white;font-family: sans-serif;">Nr.Prindit : <small><?php echo $data_student['numri_prindit'];  ?></small></h4><br>
                                        <h4 style="color: white;font-family: sans-serif;">Klasa perkatese : <small><?php echo $data_student['emri_klases'];  ?></small></h4>

                                        
                                    </div>

                                    <div class="tab-pane" id="profile">
                                        <div class="col-sm-4 col-xs-12">
                                            Mandatet e pagesave
                                        </div>
                      <?php foreach ($data_mandat as $mandat):?>
                                        <div style="width: 430px;height: 300px;border:1px solid black;float: left;margin-top: 30px;margin-left: 10px;background-color: #F8FEB7;" id="mnd_al">
                                            <table width="100%;">
                                                <tr>
                                                    <th style="color: black;text-align: left;">Subjekti<br><small><?=$mandat->subjekti; ?></small></th>
                                                    <th style="color: black;font-size: 20px;text-align: center;">"MANDAT PAGESE"</th>
                                                    <th style="color: black;text-align: right;">Data<br><small><?=$mandat->data_berjes; ?></small></th>
                                                </tr>
                                            </table>
                                            <hr>
                                            <h5 style="color: black;margin-left: 10px;">Paguar nga z/Znj : <small style="font-family:Comic Sans Ms;font-size: 15px;color: blue;"><ins><?=$mandat->emri." ".$mandat->mbiemri ?> </ins></small></h5>
                                            <hr>
                                            <h5 style="color: black;margin-left: 10px;">Shuma leke : <small style="font-family:Comic Sans Ms;font-size: 15px;color: blue;"><ins> <?=$mandat->shuma; ?> leke</ins></small></h5>
                                            <b><hr><b>
                                            <h5 style="color: black;margin-left: 10px;">Per : <small style="font-family:Comic Sans Ms;font-size: 15px;color: blue;"><ins> <?=$mandat->muaji; ?></ins></small></h5>
                                            <b><hr><b>
                                            <h4><b><small style="margin-left: 30px;color: black;">FINANCIERI</small></b><small style="margin-left: 30px;color: black;">DREJTORI</small><small style="margin-left: 30px;color: black;">ARKETARI</small><small style="margin-left: 30px;color: black;">MARRESI</small></h4>
                                            <small style="float: right;font-size: 13px;"><a href="#"><i class="fa fa-print"></i></a> </small>


                                        </div>
                                    <?php endforeach;?>


                                        

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