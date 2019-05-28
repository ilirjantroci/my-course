<?php
include_once '../includes/header.php';
include_once "../model/Teacher.php";
include_once "../model/Klasa.php";


$teacher=new Teacher();
$klasa=new Klasa();



$tch=$_GET['tch'];
$data_teacher=$teacher->profile_teacher($tch);
$data_klasa=$klasa->klasat_perkatese_teacher($tch);


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
                                    <h5 class="m-b-5"><?php echo $data_teacher['emri']." ".$data_teacher['mbiemri'];  ?></h5>
                                    <p class="text-muted"><?php echo $data_teacher['subjekti'];  ?></p>
                                </div>

                            

                                <button type="button" class="btn btn-success btn-sm w-sm waves-effect m-t-10 waves-light"><a style="color: red;" href="../actions/edit_teacher.php?tch=<?php echo $data_teacher['id_mesues'];  ?>">Edit</a></button>
                                <button onclick="return confirm('Jeni te sigurte qe doni te fshini kete? Nese po klikoni OK.  Nese ky mesues fshihet nga sistemi nuk do te kete me mundesi kthimi pas ')" type="button" class="btn btn-danger btn-sm w-sm waves-effect m-t-10 waves-light"><a href="../actions/delete.php?tch=<?php echo $data_teacher['id_mesues'];  ?>"> Delete</a></button>


                                <div class="text-left m-t-40">
                                    <p class="text-muted font-13"><strong>Emri :</strong> <span class="m-l-15"><?php echo $data_teacher['emri'];  ?></span></p>
                                    <p class="text-muted font-13"><strong>Mbiemri :</strong> <span class="m-l-15"><?php echo $data_teacher['mbiemri'];  ?></span></p>

                                    <p class="text-muted font-13"><strong>Nr.Telefon :</strong><span class="m-l-15"><?php echo "0".$data_teacher['numri'];  ?></span></p>

                                    <p class="text-muted font-13"><strong>Email :</strong> <span class="m-l-15"><?php echo $data_teacher['email'];  ?></span></p>

                                    
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
                                            Rreth mesuesit
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#profile" data-toggle="tab" aria-expanded="true" class="nav-link">
                                            Klasat perkatese
                                        </a>
                                    </li>
                                    
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active show" id="home">
                                        <p class="m-b-5">Te dhenat e mesuesit</p>
                                        <h4 style="color: white;font-family: sans-serif;">Regjistruar me date : <small><?php echo $data_teacher['data_regjistrimit'];  ?></small></h4><br>

                                        <h4 style="color: white;font-family: sans-serif;">Ditelindja : <small><?php echo $data_teacher['ditelindja'];  ?></small></h4><br>
                                        <p style="color: white;font-family: sans-serif;">Pershkrimi : <br><small><?php echo $data_teacher['pershkrimi'];  ?></small></p><br>

                                        

                                        
                                    </div>

                                    <div class="tab-pane" id="profile">
                                        <div class="col-sm-4 col-xs-12">
                                            Klasat perkatese
                                        </div>
                                        <div id="datatable-editable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12"><table class="table table-striped add-edit-table dataTable no-footer" id="datatable-editable" role="grid" aria-describedby="datatable-editable_info">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_desc" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" aria-sort="descending" style="width: 245px;color: #FFF;"><i class="fa fa-th-large"></i>  Emri i klases</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 315px;color: #FFF;"><i class="fa fa-calendar"></i>  Data krijimit</th>

                                    <th class="sorting" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 296px;color: #FFF;"><i class="fa fa-book"></i>  Kursi qe zhvillohet</th>

                                    

                                   </tr>
                                </thead>
                                <?php foreach ($data_klasa as $te_dhena_klasa):?>
                              <tbody>

                                <tr class="gradeA odd" role="row">
                                    <td class="sorting_1"><?= $te_dhena_klasa->emri_klases  ?></td>
                                    <td class=""><?= $te_dhena_klasa->data_krijimit  ?>
                                    </td>
                                    <td class=""><?= $te_dhena_klasa->emri_kursit  ?></td>
                                    
                                    
                                </tr>

                            </tbody>
                        <?php endforeach;  ?>
                            </table></div></div></div>
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