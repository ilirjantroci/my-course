<?php
include_once '../includes/header.php';
include_once '../model/Admin_User.php';
include_once '../model/Shitje_Artikulli.php';
include_once '../model/Student.php';

$user=new Admin_User();
$student=new Student();
$data_student=$student->te_dhena_student_all();

$shitje_artikulli=new Shitje_Artikulli();

if (isset($_POST['mbaro_pagesen'])) {
    $id_admin_user=$user->my_id();
    $id_student=$_POST['studenti_perkates'];
    $emri_artikullit=$_POST['emri_artikullit'];
    $sasia=$_POST['sasia'];
    $shuma=$_POST['shuma'];

    $njoftim=null;


    if (is_null($id_student)) {
        $njoftim="Ju lutem zgjidhni studentin perkates";
    }
    if (is_null($emri_artikullit)) {
        $njoftim="Ju lutem zgjidhni emrin e artikullit";
    }
    if (is_null($sasia)) {
        $njoftim="Ju lutem shenoni sasine ";
    }
    if (is_null($shuma)) {
        $njoftim="Ju lutem shenoni shumen ";
    }
    if (is_null($njoftim)) {
        $shitje_artikulli->id_admin_user=$id_admin_user;
        $shitje_artikulli->studenti_perkates=$id_student;
        $shitje_artikulli->emri_artikullit=$emri_artikullit;
        $shitje_artikulli->sasia=$sasia;
        $shitje_artikulli->shuma=$shuma;
        $shitje_artikulli->shitje_artikulli();
        $user->go_to("../view/home.php");
    }
}


?>
<div class="container-fluid">

                <!-- Page-Title -->
                <br><br><br><br><br><br><br>
                <div class="row">
                    <div class="col-sm-12">
                        
                            <h4 style="text-align: center;color: #FFF" class="page-title">Shitje artikulli</h4>
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
                                        <label id="input_pay" for="inputPassword4" class="col-form-label"><i class="fa fa-book"></i> Emri artikullit </label><input type="text" name="emri_artikullit" class="form-control" id="inputEmail4" placeholder="emri i artikullit qe do shitet... ">
                                        
                                    </div>

                                     <div class="form-group col-md-6">
                                        <label id="input_pay" for="inputPassword4" class="col-form-label"><i class="fa fa-list"></i> Sasia * </label><input type="number" name="sasia" class="form-control" id="inputEmail4" placeholder="sasia ne numer... ">
                                        
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label id="input_pay" for="inputPassword4" class="col-form-label"><i class="fa fa-money"></i> Shuma ne lek</label><input type="text" name="shuma" class="form-control" id="inputEmail4" placeholder="cmimi i artikullit... ">
                                        
                                    </div>


                                </div>

                                <button type="submit" name="mbaro_pagesen" class="btn btn-primary"><i class="fa fa-check"></i> Mbaro pagesen</button>
                            </form>
                        </div>

                

               

                        


<?php
include_once "../includes/footer.php"

?>