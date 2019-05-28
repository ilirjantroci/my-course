<?php
include_once '../includes/header.php';
include_once '../model/Student.php';
include_once '../model/Kursi.php';
include_once '../model/Klasa.php';

$user=new Admin_User();

$kursi=new Kursi();
$data_kursi=$kursi->te_dhena_kursi();



$klasa = new Klasa();
$data_klasa=$klasa->te_dhena_klasa();

$student = new Student();
$studentet_e_fundit=$student->studentet_e_fundit();//Ky funksion na kthen si rezultat 5 studentet e regjistruar se fundmi

$kushti=$_GET['st'];

$data_student=$student->te_dhena_student_id($kushti);
$st_data=$student->student_kursi_klasa_perkatese($kushti);

if (isset($_POST['ruaj'])) {

   
    $emri=$_POST['emri'];
    $mbiemri=$_POST['mbiemri'];
    $email=$_POST['email'];
    $numri_personal=$_POST['numri_personal'];
    $numri_prindit=$_POST['numri_prindit'];
    $ditelindja=$_POST['ditelindja'];
    $pershkrimi=$_POST['pershkrimi'];
    $kursi_perkates=$_POST['kursi_perkates'];
    $klasa_perkatese=$_POST['klasa_perkatese'];

    $njoftim=null;
    
    if (is_null($njoftim)) {
        
        $student->emri=$emri;
        $student->mbiemri=$mbiemri;
        $student->email=$email;
        $student->numri_personal=$numri_personal;
        $student->numri_prindit=$numri_prindit;
        $student->ditelindja=$ditelindja;
        $student->pershkrimi=$pershkrimi;
        $student->kursi_perkates=$kursi_perkates;
        $student->klasa_perkatese=$klasa_perkatese;
        $student->id_update=$kushti;

        $student->modifiko_student();
        $user->go_to("../view/student_list.php");
    }

    
}

?>
<div class="container-fluid">

                <!-- Page-Title -->
                <br><br><br><br><br><br><br>
                <div class="row">
                    <div class="col-sm-12">
                        
                            <h4 style="text-align: center;" class="page-title">Modifiko te dhenat </h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->


                

                <div class="row">
                    <div class="col-lg-6">
                        <div class="card-box">
                            <h4 class="header-title m-t-0">Te dhenat e studentit</h4>
                            <p class="text-muted font-14 m-b-20">
                                Te gjitha inputet qe jane te shenuara me yll (*) duhet te plotesohen .
                            </p>

                            <form class="" action="" method="post" novalidate="">
                                <?php if (isset($njoftim)) { ?>
                               <p class="alert alert-danger text-center"><?php echo $njoftim; ?></p>
                             <?php } ?>
                                <?php foreach ($data_student as $student_data):?>
                                <div class="form-group">
                                    <label id="h4_me_red"><i class="fa fa-user"></i>  Emri *</label>
                                    <input type="text" class="form-control" value="<?=$student_data->emri ?>" name="emri" required="" placeholder="emri studentit">
                                </div>

                                <div class="form-group">
                                    <label id="h4_me_red"><i class="fa fa-user"></i>  Mbiemri *</label>
                                    <input type="text" value="<?=$student_data->mbiemri ?>" name="mbiemri" class="form-control" required="" placeholder="mbiemri studentit">
                                </div>

                                

                                <div class="form-group">
                                    <label id="h4_me_red"> <i class="fa fa-unlock-alt"></i> E-Mail</label>
                                    <div>
                                        <input type="email" class="form-control" value="<?=$student_data->email ?>" name="email" required="" parsley-type="email" placeholder="emaili studentit">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label id="h4_me_red"><i class="fa fa-phone"></i>  Numri</label>
                                    <div>
                                        <input data-parsley-type="digits" type="number" value="<?=$student_data->numri_personal ?>" name="numri_personal" class="form-control" required="" placeholder="numri studentit">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label id="h4_me_red"><i class="fa fa-phone"></i>  Numri prindit</label>
                                    <div>
                                        <input data-parsley-type="digits" type="number" value="<?=$student_data->numri_prindit ?>" name="numri_prindit" class="form-control" required="" placeholder="numri prindit">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label id="h4_me_red"><i class="fa fa-birthday-cake"></i>    Ditelindja</label>
                                    <div>
                                        <input type="date" value="<?=$student_data->ditelindja ?>" class="form-control" placeholder="mm/dd/yyyy" id="datepicker" name="ditelindja">
                                    </div>
                                </div>
                            <?php endforeach; ?>
                                <div class="form-group">
                                    <label id="h4_me_red"><i class="fa fa-book"></i>  Kursi  *</label>
                                    <div>
                                        <select name="kursi_perkates" class="custom-select mt-3">
                                            <?php foreach ($st_data as $st): ?>
                                        <option selected value="<?=$st->id_kursi ?>"><?=$st->emri_kursit ?></option>
                                    <?php endforeach; ?>
                                        <?php foreach ($data_kursi as $te_dhena_kursi) :?>
                                        <option value="<?=$te_dhena_kursi->id_kursi ?>"><?=$te_dhena_kursi->emri_kursit ?></option>
                                    <?php endforeach;  ?>
                                        
                                    </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label id="h4_me_red"><i class="fa fa-th-large"></i>  Klasa  *</label>
                                    <div>
                                        <select name="klasa_perkatese" class="custom-select mt-3">
                                        <?php foreach ($st_data as $data_st):?>
                                        <option selected value="<?=$data_st->id_klasa ?>"><?=$data_st->emri_klases ?></option>
                                        <?php endforeach; ?>
                                        <?php foreach ($data_klasa as $te_dhena_klasa):?>
                                        <option value="<?=$te_dhena_klasa->id_klasa ?>"><?=$te_dhena_klasa->emri_klases ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    </div>
                                </div>

                                <?php foreach ($data_student as $student_data):?>
                                <div class="form-group">
                                    <label id="h4_me_red"><i class="fa fa-info"></i>  Pershkrimi</label>
                                    <div>
                                        <textarea name="pershkrimi" required="" value="<?=$student_data->pershkrimi ?>" class="form-control"></textarea>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                                <div class="form-group">
                                    <div>
                                        <button type="submit" name="ruaj" class="btn btn-primary waves-effect waves-light"><i class="fa fa-check"></i>  Ruaj
                                        </button>
                                        <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                            Anullo
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card-box">
                            <h4 class="header-title m-t-0">Studentet regjistruar se fundmi</h4>
                            <p class="text-muted font-14 m-b-20">
                                
                            </p>

                            <table class="table">
                                <thead>
                                <tr>
                                    
                                    <th><i class="fa fa-user"></i> EMRI</th>
                                    <th><i class="fa fa-user"></i> MBIEMRI</th>
                                    <th><i class="fa fa-calendar"></i> Dt.Regjistrimit</th>
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


                        </div> <!-- end card-box -->
                    </div> <!-- end col -->

                </div>
                <!-- end row -->

</div>


<?php
include_once "../includes/footer.php"

?>