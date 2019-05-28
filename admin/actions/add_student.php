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

if (isset($_POST['ruaj'])) {

    $id_admin_user=$user->my_id();
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

    if (is_null($emri)) {
        $njoftim="Ju lutem shenoni emrin";
    }
    if (is_null($mbiemri)) {
        $njoftim="Ju lutem shenoni mbiemrin";
    }
    if (is_null($kursi_perkates)) {
        $njoftim="Ju lutem shenoni kursin perkates";
    }
    if (is_null($klasa_perkatese)) {
        $njoftim="Ju lutem shenoni klasen perkatese";
    }
    
    if (is_null($njoftim)) {
        $student->id_admin_user=$id_admin_user;
        $student->emri=$emri;
        $student->mbiemri=$mbiemri;
        $student->email=$email;
        $student->numri_personal=$numri_personal;
        $student->numri_prindit=$numri_prindit;
        $student->ditelindja=$ditelindja;
        $student->pershkrimi=$pershkrimi;
        $student->kursi_perkates=$kursi_perkates;
        $student->klasa_perkatese=$klasa_perkatese;
        $student->shto_student();
        $user->go_to("../view/student_list.php");
    }

    
}

?>
<div class="container-fluid">

                <!-- Page-Title -->
                <br><br><br><br><br><br><br>
                <div class="row">
                    <div class="col-sm-12">
                        
                            <h4 style="text-align: center;" class="page-title">Shto nje student te ri  </h4>
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
                                <div class="form-group">
                                    <label id="h4_me_red"><i class="fa fa-user"></i>  Emri *</label>
                                    <input type="text" class="form-control" name="emri" required="" placeholder="emri studentit">
                                </div>

                                <div class="form-group">
                                    <label id="h4_me_red"><i class="fa fa-user"></i>  Mbiemri *</label>
                                    <input type="text" name="mbiemri" class="form-control" required="" placeholder="mbiemri studentit">
                                </div>

                                

                                <div class="form-group">
                                    <label id="h4_me_red"> <i class="fa fa-unlock-alt"></i> E-Mail</label>
                                    <div>
                                        <input type="email" class="form-control" name="email" required="" parsley-type="email" placeholder="emaili studentit">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label id="h4_me_red"><i class="fa fa-phone"></i>  Numri</label>
                                    <div>
                                        <input data-parsley-type="digits" type="number" name="numri_personal" class="form-control" required="" placeholder="numri studentit">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label id="h4_me_red"><i class="fa fa-phone"></i>  Numri prindit</label>
                                    <div>
                                        <input data-parsley-type="digits" type="number" name="numri_prindit" class="form-control" required="" placeholder="numri prindit">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label id="h4_me_red"><i class="fa fa-birthday-cake"></i>    Ditelindja</label>
                                    <div>
                                        <input type="date" class="form-control" placeholder="mm/dd/yyyy" id="datepicker" name="ditelindja">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label id="h4_me_red"><i class="fa fa-book"></i>  Kursi  *</label>
                                    <div>
                                        <select name="kursi_perkates" class="custom-select mt-3">
                                        <option selected="">Zgjidhni kursin e studentit</option>
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
                                        <option selected="">Zgjidhni klasen e studentit</option>
                                        <?php foreach ($data_klasa as $te_dhena_klasa):?>
                                        <option value="<?=$te_dhena_klasa->id_klasa ?>"><?=$te_dhena_klasa->emri_klases ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label id="h4_me_red"><i class="fa fa-info"></i>  Pershkrimi</label>
                                    <div>
                                        <textarea name="pershkrimi" required="" class="form-control"></textarea>
                                    </div>
                                </div>
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
                                <tr>
                                   
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                </tr>
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