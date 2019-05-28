<?php
include_once '../includes/header.php';
include_once '../model/Klasa.php';
include_once '../model/Kursi.php';
include_once '../model/Teacher.php';
include_once '../model/Student.php';
include_once '../model/Mandat_Pagese.php';
include_once '../model/Shitje_Artikulli.php';

$klasa=new Klasa();
$kursi=new Kursi();
$mesues=new Teacher();
$student=new Student();
$mandat_pagese = new Mandat_Pagese();
$shitje_artikulli=new Shitje_Artikulli();

$data_klasa=$klasa->te_dhena_klasa();
$data_kursi=$kursi->te_dhena_kursi();
$data_mesues=$mesues->te_dhena_mesues();
$mesuesit_e_fundit=$mesues->mesuesit_e_fundit();//Ky funksion kthen si rezultat 5 mesuesit e regjistruar se fundmi
$data_student=$student->te_dhena_student_all();
$studentet_e_fundit=$student->studentet_e_fundit();//Ky funksion kthen si rezultat 5 studentet e regjistruar se fundmi
$data_mandat_pagese=$mandat_pagese->mandat_pagese_shuma();
$data_shitje_artikulli=$shitje_artikulli->shitje_artikulli_shuma();

//$te_dhena_mesues=$data_mesues;
?>


        <div class="wrapper">
            <div class="container-fluid">
                <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                    <marquee><li class="breadcrumb-item"><a href="#">ON </a></li></marquee>
                                    
                                </ol>
                            </div>
                            <h4 class="page-title">Panel Monitorimi</h4>
                        </div>

                <!-- Page-Title -->
                
                <!-- end page title end breadcrumb -->


                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="widget-bg-color-icon card-box">
                            <div class="bg-icon bg-icon-success pull-left">
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="text-right">
                                <h3 class="text-dark m-t-10"><b class="counter"><?php echo count($data_mesues, COUNT_RECURSIVE); ?></b></h3>
                                <p class="text-muted mb-0">Mesues</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="widget-bg-color-icon card-box fadeInDown animated">
                            <div class="bg-icon bg-icon-primary pull-left">
                                <i class="fa fa-group"></i>
                            </div>
                            <div class="text-right">
                                <h3 class="text-dark m-t-10"><b class="counter"><?php echo count($data_student, COUNT_RECURSIVE); ?></b></h3>
                                <p class="text-muted mb-0">Studente</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="widget-bg-color-icon card-box">
                            <div class="bg-icon bg-icon-danger pull-left">
                                <i class="fa fa-book"></i>
                            </div>
                            <div class="text-right">
                                <h3 class="text-dark m-t-10"><b class="counter"><?php echo count($data_kursi, COUNT_RECURSIVE); ?></b></h3>
                                <p class="text-muted mb-0">Kurse</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="widget-bg-color-icon card-box">
                            <div class="bg-icon bg-icon-purple pull-left">
                                <i class="fa fa-folder"></i>
                            </div>
                            <div class="text-right">
                                <h3 class="text-dark m-t-10"><b class="counter"><?php echo count($data_klasa, COUNT_RECURSIVE); ?></b></h3>
                                <p class="text-muted mb-0">Klasa</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="widget-bg-color-icon card-box">
                            <div class="bg-icon bg-icon-success pull-left">
                                <i class="fa fa-money"></i>
                            </div>
                            <div class="text-right">
                                <h3 class="text-dark m-t-10"><b class="counter"><?php echo $data_mandat_pagese['shuma_gjithsej'];  ?></b></h3>
                                <p class="text-muted mb-0">Te ardhura gjithsej (lek)<br>(mandat pagese)</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    

                    <div class="col-lg-6 col-md-6">
                        <div class="widget-bg-color-icon card-box">
                            <div class="bg-icon bg-icon-danger pull-left">
                                <i class="fa fa-money"></i>
                            </div>
                            <div class="text-right">
                                <h3 class="text-dark m-t-10"><b class="counter"><?php echo $data_shitje_artikulli['shuma_gjithsej'];  ?></b></h3>
                                <p class="text-muted mb-0">Te ardhura gjithsej (lek)<br>(shitje artikujsh)</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    
                </div>

                


                <div class="row">
                    <div class="col-lg-6">
                        <div class="card-box">
                            <h4 style="text-align: center;" class="m-t-0 header-title">Studentet regjistruar se fundmi</h4>
                            <marquee><p class="text-muted font-14 m-b-20">--^^--^^^^-----^^^^^__
                                
                            </p></marquee>
                            <table class="table">
                                <thead>
                                <tr>
                                    
                                    <th id="h4_me_red"><i class="fa fa-user"></i> EMRI</th>
                                    <th id="h4_me_red"><i class="fa fa-user"></i> MBIEMRI</th>
                                    <th id="h4_me_red"><i class="fa fa-calendar"></i> Dt.Regjistrimit</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($studentet_e_fundit as $te_dhena_student) : ?>
                                <tr>
                                    
                                    <td><?= $te_dhena_student->emri  ?></td>
                                    <td><?= $te_dhena_student->mbiemri  ?></td>
                                    <td><?= $te_dhena_student->data_regjistrimit  ?></td>
                                </tr>
                            <?php endforeach;  ?>
                                </tbody>
                            </table>
                        </div>

                    </div>

                    <div class="col-lg-6">
                        <div class="card-box">
                            <h4 style="text-align: center;" class="m-t-0 header-title">Mesuesit regjistruar se fundmi</h4><marquee><p class="text-muted font-14 m-b-20">--^^--^^^^-----^^^^^__
                                
                            </p></marquee>
                            <table class="table">
                                <thead>
                                <tr>
                                   <th id="h4_me_red"><i class="fa fa-user"></i>Emri</th>
                                    <th id="h4_me_red"><i class="fa fa-user"></i> Mbiemri</th>
                                    <th id="h4_me_red"><i class="fa fa-calendar"></i> Dt.Regjistrimit</th>
                                </tr>
                            
                                </thead>
                                <tbody>
                                <?php foreach ($mesuesit_e_fundit as $te_dhena_mesues) : ?>
                                <tr>
                                    
                                    <td><?= $te_dhena_mesues->emri  ?></td>
                                    <td><?= $te_dhena_mesues->mbiemri  ?></td>
                                    <td><?= $te_dhena_mesues->data_regjistrimit  ?></td>
                                </tr>
                                <?php endforeach;  ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!-- end row -->


            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->

<?php
include_once "../includes/footer.php"

?>