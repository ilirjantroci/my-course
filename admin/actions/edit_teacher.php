<?php
include_once '../includes/header.php';
include_once '../model/Teacher.php';

$user=new Admin_User;
$mesues=new Teacher();

$kushti=$_GET['tch'];//Variabla kushti mban id e nje mesuesi e cila sillet me ane te $_GET .

$data_mesues=$mesues->te_dhena_mesues_id($kushti);

if (isset($_POST['modifiko'])) {

    $emri=$_POST['emri'];
    $mbiemri=$_POST['mbiemri'];
    $email=$_POST['email'];
    $numri=$_POST['numri'];
    $ditelindja=$_POST['ditelindja'];
    $pershkrimi=$_POST['pershkrimi'];

    

    $error=null;

    if (is_null($error)) {
        $mesues->emri=$emri;
        $mesues->mbiemri=$mbiemri;
        $mesues->email=$email;
        $mesues->numri=$numri;
        $mesues->ditelindja=$ditelindja;
        $mesues->pershkrimi=$pershkrimi;
        $mesues->id_update=$kushti;
        $mesues->modifiko_mesues();
        //$user->go_to('../view/teacher_list.php');
        
        
    }
   
}




?>
<div style="margin: 0 auto 0 auto" class="container-fluid">

                <!-- Page-Title -->
                <br><br><br><br><br><br><br>
                <div class="row">
                    <div class="col-sm-12">
                        
                            <h4 style="text-align: center;" class="page-title">Modifiko te dhenat e mesuesit </h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->


                

                <div class="row">
                    <div class="col-lg-8">
                        <div class="card-box">
                            <h4 class="header-title m-t-0">Te dhenat e  instruktorit</h4>
                            <p class="text-muted font-14 m-b-20">
                                Te gjitha inputet qe jane te shenuara me yll (*) duhet te plotesohen .
                            </p>
                            <?php foreach ($data_mesues as $te_dhena): ?>
                            <form class="" action="" method="post" novalidate="">
                                <div class="form-group">
                                    <label id="h4_me_red"><i class="fa fa-user"></i> Emri *</label>
                                    <input type="text" value="<?=$te_dhena->emri ?>" class="form-control" name="emri" required="" placeholder="emri instruktorit">
                                </div>

                                <div class="form-group">
                                    <label id="h4_me_red"><i class="fa fa-user"></i> Mbiemri *</label>
                                    <input type="text" value="<?=$te_dhena->mbiemri ?>" name="mbiemri" class="form-control" required="" placeholder="mbiemri instruktorit">
                                </div>

                                

                                <div class="form-group">
                                    <label id="h4_me_red"><i class="fa fa-key"></i> E-Mail</label>
                                    <div>
                                        <input type="email" value="<?=$te_dhena->email ?>" class="form-control" name="email" required="" parsley-type="email" placeholder="emaili instruktorit">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label id="h4_me_red"><i class="fa fa-phone"></i> Numri</label>
                                    <div>
                                        <input data-parsley-type="digits" type="number" value="<?=$te_dhena->numri ?>" name="numri" class="form-control" required="" placeholder="numri instruktorit">
                                    </div>
                                </div>

                                
                                <div class="form-group">
                                    <label id="h4_me_red"><i class="fa fa-calendar"></i> Ditelindja</label>
                                    <div>
                                        <input type="date" value="<?=$te_dhena->ditelindja ?>" class="form-control" placeholder="mm/dd/yyyy" id="datepicker" name="ditelindja">
                                    </div>
                                </div>
                                

                                


                                <div class="form-group">
                                    <label id="h4_me_red"><i class="fa fa-info"></i> Pershkrimi</label>
                                    <div>
                                        <input style="height: 60px;width: 300px;" value="<?=$te_dhena->pershkrimi ?>" type="text" name="pershkrimi">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div>
                                        <button type="submit" name="modifiko" class="btn btn-primary waves-effect waves-light"><i class="fa fa-check"></i> RUAJ
                                        </button>
                                        <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                            Anullo
                                        </button>
                                    </div>
                                </div>
                            </form>
                        <?php endforeach; ?>
                        </div>
                    </div>

                    

                </div>
                <!-- end row -->

</div>


<?php
include_once "../includes/footer.php"

?>