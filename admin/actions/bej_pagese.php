<?php
include_once '../includes/header.php';
include_once '../model/Mandat_Pagese.php';
include_once '../model/Student.php';
include_once '../model/Kursi.php';

$user = new Admin_User();
$student = new Student();
$kursi=new Kursi();
$data_kursi=$kursi->te_dhena_kursi();
$data_student=$student->te_dhena_student_all();
$mandat_pagese=new Mandat_Pagese();

if (isset($_POST['bej_pagesen'])) {
    
    $id_admin_user=$user->my_id();
    $id_student=$_POST['studenti_perkates'];
    $id_kursi=$_POST['kursi_perkates'];
    $muaji=$_POST['muaji'];
    $shuma=$_POST['shuma'];

    $njoftim=null;

    if (is_null($id_student)) {
        $njoftim="Ju lutem zgjidhni studentin perkates";
    }
    if (is_null($muaji)) {
        $njoftim="Ju lutem zgjidhni mmuajin";
    }
    if (is_null($shuma)) {
        $njoftim="Ju lutem zgjidhni shumen";
    }
    if (is_null($njoftim)) {
        $mandat_pagese->id_admin_user=$id_admin_user;
        $mandat_pagese->studenti_perkates=$id_student;
        $mandat_pagese->muaji=$muaji;
        $mandat_pagese->shuma=$shuma;
        $mandat_pagese->kursi_perkates=$id_kursi;
        $mandat_pagese->do_mandat_pagese();
        $user->go_to("../view/mandat_list.php");
    }
}

?>
<div class="container-fluid">

                <!-- Page-Title -->
                <br><br><br><br><br><br><br>
                <div class="row">
                    <div class="col-sm-12">
                        
                            <h4 style="text-align: center;color: #FFF" class="page-title">Mandat Pagese   $  </h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
                        <div  class="card-box">
                            <h4 id="h4_me" class="m-t-0 header-title">Format e pageses</h4>
                            <p style="color: red;" class="text-muted m-b-30 font-13">
                                Te gjitha inputet qe jane te shenuara me yll (*) duhet te plotesohen .
                            </p>

                            <form method="post" action="">
                                <div  class="form-row">
                                    <br><br>
                                    <div class="form-group col-md-6">
                                        <label id="input_pay" for="inputPassword4" class="col-form-label"><i class="fa fa-user"></i> Paguar nga  Z/Zj   * </label>
                                        <select name="studenti_perkates" class="custom-select mt-3">
                                        <option selected="">Zgjidhni nxenesin</option>
                                        <?php foreach ($data_student as $te_dhena_student):?>
                                        <option value="<?=$te_dhena_student->id_student  ?>"><?=$te_dhena_student->emri." ".$te_dhena_student->mbiemri ?></option>
                                        <?php endforeach; ?>
                                         </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label id="input_pay" for="inputPassword4" class="col-form-label"><i class="fa fa-calendar"></i> Muaji </label>
                                        <select name="muaji" class="custom-select mt-3">
                                        <option selected="">Zgjidhni muajin</option>
                                        <option value="Janar">JANAR</option>
                                        <option value="Shkurt">Shkurt</option>
                                        <option value="Mars">Mars</option>
                                        <option value="Prill">Prill</option>
                                        <option value="Maj">Maj</option>
                                        <option value="Qershor">Qershor</option>
                                        <option value="Korrik">Korrik</option>
                                        <option value="Gusht">Gusht</option>
                                        <option value="Shtator">Shtator</option>
                                        <option value="Tetor">Tetor</option>
                                        <option value="Nentor">Nentor</option>
                                        <option value="Dhjetor">Dhjetor</option>

                                         </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                        <label id="input_pay" for="inputPassword4" class="col-form-label"><i class="fa fa-book"></i> Kursi perkates* </label>
                                        <select name="kursi_perkates" class="custom-select mt-3">
                                        <option selected="">Zgjidhni kursin perkates</option>
                                        <?php foreach ($data_kursi as $te_dhena_kursi):?>
                                        <option value="<?=$te_dhena_kursi->id_kursi  ?>"><?=$te_dhena_kursi->emri_kursit ?></option>
                                        <?php endforeach; ?>
                                         </select>
                                    </div>

                                <div class="form-group">
                                    <label id="input_pay" for="inputAddress" class="col-form-label"><i class="fa fa-money"></i> Shuma ne lek *</label>
                                    <input type="number" name="shuma" class="form-control" id="inputEmail4" placeholder="lek ">
                                    
                                </div>

                                

                                
                                
                                
                                
                                
                                <button type="submit" name="bej_pagesen" class="btn btn-primary"><i class="fa fa-check"></i> Mbaro pagesen</button>
                            </form>
                        </div>

                

               

                        


<?php
include_once "../includes/footer.php"

?>