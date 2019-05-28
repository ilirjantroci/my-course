<?php
include_once '../includes/header.php';
include_once '../model/Klasa.php';
include_once '../model/Admin_User.php';
include_once '../model/Kursi.php';
include_once '../model/Teacher.php';
include_once '../model/Klasa.php';

$user=new Admin_User();
$mesues=new Teacher();
$kursi=new Kursi();
$klasa=new Klasa();

$data_mesues=$mesues->te_dhena_mesues();
$data_kursi=$kursi->te_dhena_kursi();

if (isset($_POST['krijo'])) {

    $id_kursi=$_POST['kursi'];
    $id_mesues=$_POST['mesuesi'];
    $id_admin_user=$user->my_id();
    $emri_klases=$_POST['emri'];
    $e_hene=$_POST['e_hene'];
    $e_marte=$_POST['e_marte'];
    $e_merkure=$_POST['e_merkure'];
    $e_enjte=$_POST['e_enjte'];
    $e_premte=$_POST['e_premte'];
    $e_shtune=$_POST['e_shtune'];
    $e_diele=$_POST['e_diele'];

    $error=null;

    if (is_null($emri_klases)) {
        $error="Ju lutem shenoni emrin e klases";
    }
    if (is_null($id_kursi)) {
        $error="Ju lutem zgjdhni kursin perkates";
    }
    if (is_null($id_mesues)) {
        $error="Ju lutem zgjidhni instruktorin perkates";
    }

    if (is_null($error)) {
        $klasa->id_kursi=$id_kursi;
        $klasa->id_mesues=$id_mesues;
        $klasa->id_admin_user=$id_admin_user;
        $klasa->emri_klases=$emri_klases;
        $klasa->e_hene=$e_hene;
        $klasa->e_marte=$e_marte;
        $klasa->e_merkure=$e_merkure;
        $klasa->e_enjte=$e_enjte;
        $klasa->e_premte=$e_premte;
        $klasa->e_shtune=$e_shtune;
        $klasa->e_diele=$e_diele;
        $klasa->krijo_klase();
        $user->go_to('../view/class_list.php');
    }
   
}

?>
<div class="container-fluid">

                <!-- Page-Title -->
                <br><br><br><br><br><br><br>
                <div class="row">
                    <div class="col-sm-12">
                        
                            <h4 style="text-align: center;" class="page-title">Krijo nje klase te re  </h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
                        <div class="card-box">
                            <h4 class="m-t-0 header-title">TE DHENAT E KLASES</h4>
                            <p class="text-muted m-b-30 font-13">
                                Te gjitha inputet qe jane te shenuara me yll (*) duhet te plotesohen .
                            </p>

                            <form method="post" action="">
                                <div class="form-row">
                                    <br><br><div class="form-group col-md-6">
                                        <label id="h4_me_red" for="inputEmail4" class="col-form-label"><i class="fa fa-th-large"></i> Emri i klases  *</label>
                                        <input type="text" name="emri" class="form-control" id="inputEmail4" placeholder="emri i kleses ">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label id="h4_me_red" for="inputPassword4" class="col-form-label"><i class="fa fa-user"></i> Instruktori </label>
                                        
                                        <select name="mesuesi" class="custom-select mt-3">
                                            <option selected="">Zgjidhni instruktorin</option>
                                    <?php foreach ($data_mesues as $te_dhena_mesues) : ?>
                                        
                                        <option value="<?= $te_dhena_mesues->id_mesues  ?>"><?= $te_dhena_mesues->emri."  "  ?><?= $te_dhena_mesues->mbiemri  ?></option>
                                    <?php endforeach;  ?>
                                        
                                         </select>
                                    </div>
                                </div>

                                

                                <div class="form-group">
                                    <label id="h4_me_red" for="inputAddress" class="col-form-label"><i class="fa fa-book"></i>  Kursi perkates  *</label>
                                    <select name="kursi" class="custom-select mt-3">
                                        <option selected="">Zgjidhni kursin qe do zhvillohet</option>
                                        <?php foreach ($data_kursi as $te_dhena_kursi) : ?>
                                        <option value="<?= $te_dhena_kursi->id_kursi   ?>"><?= $te_dhena_kursi->emri_kursit   ?></option>
                                        <?php endforeach; ?>
                                         </select>
                                </div>

                                <p style="text-align: center;">Ditet qe zhvillohet mesimi<br>Zgjidhni oraret per ditet qe do te zhvillohet mesimi</p>

                                <div class="form-row">
                                    <br><br><div class="form-group col-md-6">
                                        <label id="h4_me" for="inputEmail4" class="col-form-label">E Hene</label>
                                        <input type="time" name="e_hene" class="form-control" id="inputEmail4" placeholder="zgjidhni orarin ">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label id="h4_me" for="inputPassword4" class="col-form-label">E marte </label>
                                        <input type="time" name="e_marte" class="form-control" id="inputEmail4" placeholder="zgjidhni orarin ">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <br><br><div class="form-group col-md-6">
                                        <label id="h4_me" for="inputEmail4" class="col-form-label">E Merkure</label>
                                        <input type="time" name="e_merkure" class="form-control" id="inputEmail4" placeholder="zgjidhni orarin ">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label id="h4_me" for="inputPassword4" class="col-form-label">E enjte </label>
                                        <input type="time" name="e_enjte" class="form-control" id="inputEmail4" placeholder="zgjidhni orarin ">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <br><br><div class="form-group col-md-6">
                                        <label id="h4_me" for="inputEmail4" class="col-form-label">E Premte</label>
                                        <input type="time" name="e_premte" class="form-control" id="inputEmail4" placeholder="zgjidhni orarin ">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label id="h4_me" for="inputPassword4" class="col-form-label">E shtune </label>
                                        <input type="time" name="e_shtune" class="form-control" id="inputEmail4" placeholder="zgjidhni orarin ">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label id="h4_me" for="inputAddress" class="col-form-label">E diele</label>
                                    <input type="time" name="e_diele" class="form-control" id="inputAddress" placeholder="zgjidhni orarin">
                                </div>
                                
                                
                                
                                
                                <button type="submit" name="krijo" class="btn btn-primary"><i class="fa fa-plus"></i>  Krijo</button>
                            </form>
                        </div>

                

               

                        


<?php
include_once "../includes/footer.php"

?>