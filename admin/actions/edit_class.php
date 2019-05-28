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

$kushti=$_GET['kl'];

$data_klasa=$klasa->te_dhena_klasa_id($kushti);

$data_mesues=$mesues->te_dhena_mesues();
$data_kursi=$kursi->te_dhena_kursi();

if (isset($_POST['modifiko'])) {

    $id_kursi=$_POST['kursi'];
    $id_mesues=$_POST['mesuesi'];
    
    $emri_klases=$_POST['emri'];
    $e_hene=$_POST['e_hene'];
    $e_marte=$_POST['e_marte'];
    $e_merkure=$_POST['e_merkure'];
    $e_enjte=$_POST['e_enjte'];
    $e_premte=$_POST['e_premte'];
    $e_shtune=$_POST['e_shtune'];
    $e_diele=$_POST['e_diele'];

    $error=null;

    if (is_null($error)) {
        $klasa->id_kursi=$id_kursi;
        $klasa->id_mesues=$id_mesues;
        $klasa->emri_klases=$emri_klases;
        $klasa->e_hene=$e_hene;
        $klasa->e_marte=$e_marte;
        $klasa->e_merkure=$e_merkure;
        $klasa->e_enjte=$e_enjte;
        $klasa->e_premte=$e_premte;
        $klasa->e_shtune=$e_shtune;
        $klasa->e_diele=$e_diele;
        $klasa->id_update=$kushti;
        $klasa->modifiko_klase();
        $user->go_to('../view/class_list.php');
    }
   
}

?>
<div class="container-fluid">

                <!-- Page-Title -->
                <br><br><br><br><br><br><br>
                <div class="row">
                    <div class="col-sm-12">
                        
                            <h4 style="text-align: center;" class="page-title">Modifiko klasen </h4>
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
                                    <br><br>
                                    <?php foreach ($data_klasa as $te_dhena_klasa):?>
                                    <div class="form-group col-md-6">
                                        <label id="h4_me_red" for="inputEmail4" class="col-form-label"><i class="fa fa-th-large"></i> Emri i klases  *</label>
                                        <input type="text" value="<?= $te_dhena_klasa->emri_klases  ?>" name="emri" class="form-control" id="inputEmail4" placeholder="emri i kleses ">
                                    </div>
                                <?php endforeach; ?>
                                    <div class="form-group col-md-6">
                                        <label id="h4_me_red" for="inputPassword4" class="col-form-label"><i class="fa fa-user"></i> Instruktori </label>
                                        
                                        <select name="mesuesi" class="custom-select mt-3"> <?php foreach ($data_klasa as $te_dhena_klasa) : ?>
                                            <option selected value="<?= $te_dhena_klasa->id_mesues  ?>"><?= $te_dhena_klasa->emri."  "  ?><?= $te_dhena_klasa->mbiemri  ?></option>

                                        <?php endforeach; ?>
                                    <?php foreach ($data_mesues as $te_dhena_mesues) : ?>
                                        
                                        <option value="<?= $te_dhena_mesues->id_mesues  ?>"><?= $te_dhena_mesues->emri."  "  ?><?= $te_dhena_mesues->mbiemri  ?></option>
                                    <?php endforeach;  ?>
                                        
                                         </select>
                                    </div>
                                </div>

                                

                                <div class="form-group">
                                    <label id="h4_me_red" for="inputAddress" class="col-form-label"><i class="fa fa-book"></i>  Kursi perkates  *</label>
                                    <select name="kursi" class="custom-select mt-3">
                                        <?php foreach ($data_klasa as $te_dhena_klasa) : ?>
                                        <option selected value="<?= $te_dhena_klasa->id_kursi  ?>"><?= $te_dhena_klasa->emri_kursit  ?></option>
                                    <?php endforeach; ?>
                                        <?php foreach ($data_kursi as $te_dhena_kursi) : ?>
                                        <option value="<?= $te_dhena_kursi->id_kursi   ?>"><?= $te_dhena_kursi->emri_kursit   ?></option>
                                        <?php endforeach; ?>
                                         </select>
                                </div>

                                <p style="text-align: center;">Ditet qe zhvillohet mesimi<br>Zgjidhni oraret per ditet qe do te zhvillohet mesimi</p>
                                <?php foreach ($data_klasa as $klasa_te_dhena):?>

                                <div class="form-row">
                                    <br><br><div class="form-group col-md-6">
                                        <label id="h4_me" for="inputEmail4" class="col-form-label">E Hene</label>
                                        <input type="text" value="<?=$klasa_te_dhena->e_hene  ?>" name="e_hene" class="form-control" id="inputEmail4" placeholder="zgjidhni orarin ">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label id="h4_me" for="inputPassword4" class="col-form-label">E marte </label>
                                        <input type="text" value="<?=$klasa_te_dhena->e_marte  ?>" name="e_marte" class="form-control" id="inputEmail4" placeholder="zgjidhni orarin ">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <br><br><div class="form-group col-md-6">
                                        <label id="h4_me" for="inputEmail4" class="col-form-label">E Merkure</label>
                                        <input type="text" value="<?=$klasa_te_dhena->e_merkure  ?>" name="e_merkure" class="form-control" id="inputEmail4" placeholder="zgjidhni orarin ">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label id="h4_me" for="inputPassword4" class="col-form-label">E enjte </label>
                                        <input type="text" value="<?=$klasa_te_dhena->e_enjte  ?>" name="e_enjte" class="form-control" id="inputEmail4" placeholder="zgjidhni orarin ">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <br><br><div class="form-group col-md-6">
                                        <label id="h4_me" for="inputEmail4" class="col-form-label">E Premte</label>
                                        <input type="text" value="<?=$klasa_te_dhena->e_premte  ?>" name="e_premte" class="form-control" id="inputEmail4" placeholder="zgjidhni orarin ">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label id="h4_me" for="inputPassword4" class="col-form-label">E shtune </label>
                                        <input type="text" value="<?=$klasa_te_dhena->e_shtune  ?>" name="e_shtune" class="form-control" id="inputEmail4" placeholder="zgjidhni orarin ">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label id="h4_me" for="inputAddress" class="col-form-label">E diele</label>
                                    <input type="text" value="<?=$klasa_te_dhena->e_diele  ?>" name="e_diele" class="form-control" id="inputAddress" placeholder="zgjidhni orarin">
                                </div>
                                
                                <?php endforeach; ?>
                                
                                
                                <button type="submit" name="modifiko" class="btn btn-primary"><i class="fa fa-check"></i>  RUAJ</button>
                            </form>
                        </div>

                

               

                        


<?php
include_once "../includes/footer.php"

?>