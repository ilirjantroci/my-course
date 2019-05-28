<?php
include_once '../includes/header.php';
include_once '../model/Teacher.php';

$user=new Admin_User;
$mesues=new Teacher();
$data=$mesues->te_dhena_mesues();

if (isset($_POST['ruaj'])) {
    
    $id_admin_user=$user->my_id();
    $emri=$_POST['emri'];
    $mbiemri=$_POST['mbiemri'];
    $email=$_POST['email'];
    $numri=$_POST['numri'];
    $ditelindja=$_POST['ditelindja'];
    $pershkrimi=$_POST['pershkrimi'];

    $error=null;
    if (is_null($emri)) {
        $error="Ju lutem shenoni emrin";
    }
    if (is_null($mbiemri)) {
        $error="Ju lutem shenoni mbiemrin";
    }
    if (is_null($error)) {
        $mesues->id_admin_user=$id_admin_user;
        $mesues->emri=$emri;
        $mesues->mbiemri=$mbiemri;
        $mesues->email=$email;
        $mesues->numri=$numri;
        $mesues->ditelindja=$ditelindja;
        $mesues->pershkrimi=$pershkrimi;
        $mesues->shto_mesues();
        $user->go_to('../view/teacher_list.php');
    }


}

?>
<div class="container-fluid">

                <!-- Page-Title -->
                <br><br><br><br><br><br><br>
                <div class="row">
                    <div class="col-sm-12">
                        
                            <h4 style="text-align: center;" class="page-title">Shto nje instruktor  </h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->


                

                <div class="row">
                    <div class="col-lg-6">
                        <div class="card-box">
                            <h4 class="header-title m-t-0">Te dhenat e  instruktorit</h4>
                            <p class="text-muted font-14 m-b-20">
                                Te gjitha inputet qe jane te shenuara me yll (*) duhet te plotesohen .
                            </p>

                            <form class="" action="" method="post" novalidate="">
                                <div class="form-group">
                                    <label id="h4_me_red"><i class="fa fa-user"></i> Emri *</label>
                                    <input type="text" class="form-control" name="emri" required="" placeholder="emri instruktorit">
                                </div>

                                <div class="form-group">
                                    <label id="h4_me_red"><i class="fa fa-user"></i> Mbiemri *</label>
                                    <input type="text" name="mbiemri" class="form-control" required="" placeholder="mbiemri instruktorit">
                                </div>

                                

                                <div class="form-group">
                                    <label id="h4_me_red"><i class="fa fa-key"></i> E-Mail</label>
                                    <div>
                                        <input type="email" class="form-control" name="email" required="" parsley-type="email" placeholder="emaili instruktorit">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label id="h4_me_red"><i class="fa fa-phone"></i> Numri</label>
                                    <div>
                                        <input data-parsley-type="digits" type="number" name="numri" class="form-control" required="" placeholder="numri instruktorit">
                                    </div>
                                </div>

                                
                                <div class="form-group">
                                    <label id="h4_me_red"><i class="fa fa-calendar"></i> Ditelindja</label>
                                    <div>
                                        <input type="date" class="form-control" placeholder="mm/dd/yyyy" id="datepicker" name="ditelindja">
                                    </div>
                                </div>
                                

                                


                                <div class="form-group">
                                    <label id="h4_me_red"><i class="fa fa-info"></i> Pershkrimi</label>
                                    <div>
                                        <textarea name="pershkrimi" required="" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div>
                                        <button type="submit" name="ruaj" class="btn btn-primary waves-effect waves-light"><i class="fa fa-check"></i> RUAJ
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
                            <h4 class="header-title m-t-0">Instruktoret ekzistues</h4>
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
                                <?php foreach ($data as $te_dhena) : ?>
                                <tbody>
                                <tr>
                                    
                                    <td><?= $te_dhena->emri ?></td>
                                    <td><?= $te_dhena->mbiemri ?></td>
                                    <td><?= $te_dhena->data_regjistrimit ?></td>
                                </tr>
                                
                                </tbody>
                            <?php endforeach;  ?>
                            </table>


                        </div> <!-- end card-box -->
                    </div> <!-- end col -->

                </div>
                <!-- end row -->

</div>


<?php
include_once "../includes/footer.php"

?>