<?php
include_once '../includes/header.php';
include_once "../model/Student.php";
include_once "../model/Klasa.php";


$klasa=new Klasa();
$student=new Student();




$kl=$_GET['kl'];
$data_klasa=$klasa->te_dhena_klasa_id_fetch($kl);
$data_student=$student->students_sipas_klasave($kl);




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
                                    <h5 class="m-b-5"><?php echo $data_klasa['emri_klases'];  ?></h5>
                                    <p class="text-muted"><?php echo $data_klasa['subjekti'];  ?></p>
                                </div>

                            

                                <button type="button" class="btn btn-success btn-sm w-sm waves-effect m-t-10 waves-light"><a style="color: red;" href="../actions/edit_class.php?kl=<?php echo $data_klasa['id_klasa'];  ?>">Edit</a></button>
                                <button onclick="return confirm('Jeni te sigurte qe doni te fshini kete? Nese po klikoni yes.  Nese kjo klase fshihet nuk do te kete me mundesi kthimi pas ')" type="button" class="btn btn-danger btn-sm w-sm waves-effect m-t-10 waves-light"><a style="color: white;" href="../actions/delete.php?kl=<?php echo $data_klasa['id_klasa'];  ?>">Delete</a></button>


                                <div class="text-left m-t-40">
                                    <p class="text-muted font-13"><strong>Emri klases :</strong> <span class="m-l-15"><?php echo $data_klasa['emri_klases'];  ?></span></p>
                                    <p class="text-muted font-13"><strong>Instruktori :</strong> <span class="m-l-15"><?php echo $data_klasa['emri']."  ".$data_klasa['mbiemri']  ?></span></p>

                                    <p class="text-muted font-13"><strong>Kursi  :</strong><span class="m-l-15"><?php echo $data_klasa['emri_kursit'];  ?></span></p>

                                    <p class="text-muted font-13"><strong>Data krijimit :</strong> <span class="m-l-15"><?php echo $data_klasa['data_krijimit'];  ?></span></p>

                                    
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
                                            Oraret mesimore
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#profile" data-toggle="tab" aria-expanded="true" class="nav-link">
                                            Studentet perkates
                                        </a>
                                    </li>
                                    
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active show" id="home">
                                        <p class="m-b-5">Ditet dhe oret kur zhvillohet mesim</p>
                                        <div id="datatable-editable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12"><table class="table table-striped add-edit-table dataTable no-footer" id="datatable-editable" role="grid" aria-describedby="datatable-editable_info">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_desc" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" aria-sort="descending" style="width: 245px;color: #FFF;"><i class="fa fa-calendar"></i> E hene</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 315px;color: #FFF;"><i class="fa fa-calendar"></i>  E marte</th>

                                    <th class="sorting" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 296px;color: #FFF;"><i class="fa fa-calendar"></i>  E merkure</th>

                                    <th class="sorting" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 296px;color: #FFF;"><i class="fa fa-calendar"></i>   E enjte</th>

                                    <th class="sorting" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 296px;color: #FFF;"><i class="fa fa-calendar"></i>   E premte</th>

                                    <th class="sorting" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 296px;color: #FFF;"><i class="fa fa-calendar"></i>   E shtune</th>

                                    <th class="sorting" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 296px;color: #FFF;"><i class="fa fa-calendar"></i>   E diele</th>

                                    </tr>
                                </thead>
                                
                              <tbody>

                                <tr class="gradeA odd" role="row">
                                    <td class="sorting_1"><?php echo $data_klasa['e_hene'];  ?></td>
                                    <td class=""><?php echo $data_klasa['e_marte'];  ?>
                                    </td>
                                    <td class=""><?php echo $data_klasa['e_merkure'];  ?></td>
                                    <td class=""><?php echo $data_klasa['e_enjte'];  ?></td>
                                    <td class=""><?php echo $data_klasa['e_premte'];  ?></td>
                                    <td class=""><?php echo $data_klasa['e_shtune'];  ?></td>
                                    <td class=""><?php echo $data_klasa['e_diele'];  ?></td>
                                    
                                </tr>

                            </tbody>
                        
                            </table></div></div></div>

                                        
                                    </div>

                                    <div class="tab-pane" id="profile">
                                        <div class="col-sm-4 col-xs-12">
                                            Studentet perkates
                                        </div>

                                        <div class="tab-content">
                                    <div class="tab-pane active show" id="home">
                                        
                                        <div id="datatable-editable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12"><table class="table table-striped add-edit-table dataTable no-footer" id="datatable-editable" role="grid" aria-describedby="datatable-editable_info">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_desc" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" aria-sort="descending" style="width: 245px;color: #FFF;"><i class="fa fa-user"></i> Emri</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 315px;color: #FFF;"><i class="fa fa-user"></i>  Mbiemri</th>

                                    <th class="sorting" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 296px;color: #FFF;"><i class="fa fa-envelope"></i> Email</th>

                                    <th class="sorting" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 296px;color: #FFF;"><i class="fa fa-calendar"></i>   Dt.Regjistrimit</th>

                                    <th class="sorting" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 296px;color: #FFF;"><i class="fa fa-phone"></i>   Nr.Personal</th>

                                    <th class="sorting" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 296px;color: #FFF;"><i class="fa fa-phone"></i>   Nr.Prindit</th>

                                    

                                    </tr>
                                </thead>
                                 <?php foreach ($data_student as $te_dhena_student) : ?>
                              <tbody>

                                <tr class="gradeA odd" role="row">
                                    <td class="sorting_1"><?=$te_dhena_student->emri ?></td>
                                    <td class=""><?=$te_dhena_student->mbiemri ?>
                                    </td>
                                    <td class=""><?=$te_dhena_student->email ?></td>
                                    <td class=""><?=$te_dhena_student->data_regjistrimit ?></td>
                                    <td class=""><?=$te_dhena_student->numri_personal ?></td>
                                    <td class=""><?=$te_dhena_student->numri_prindit ?></td>
                                    
                                    
                                </tr>

                            </tbody>
                        <?php endforeach;?>
                        
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