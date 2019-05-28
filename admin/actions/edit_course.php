<?php
include_once '../includes/header.php';
include_once '../model/Kursi.php';
include_once '../model/Admin_User.php';

$user=new Admin_User();
$kursi=new Kursi();
$data=$kursi->te_dhena_kursi();

$kushti=$_GET['k'];

$data_kursi=$kursi->te_dhena_kursi_id($kushti);

if (isset($_POST['krijo'])) {

    $emri_kursit=$_POST['emri_kursit'];

    

    $error=null;
    if (is_null($error)) {
        $kursi->emri_kursit=$emri_kursit;
        $kursi->id_update=$kushti;
        $kursi->edito_kursin();
        $user->go_to('../view/course_list.php');
        
        
    }
   
}






?>

<div class="container-fluid">

                <!-- Page-Title -->
                <br><br><br><br><br><br><br>
                <div class="row">
                    <div class="col-sm-12">
                        
                            <h4 style="text-align: center;" class="page-title">Modifikoni kursin </h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->


                

                <div class="row">
                    <div class="col-lg-6">
                        <div class="card-box">
                            <h4 class="header-title m-t-0">Te dhenat e kursit</h4>
                            <p class="text-muted font-14 m-b-20">
                                Te gjitha inputet qe jane te shenuara me yll (*) duhet te plotesohen .
                            </p>

                            <form class="" action="" method="post" novalidate="">
                                <div class="form-group">
                                    <?php foreach ($data_kursi as $te_dhena):  ?>
                                    <label><i class="fa fa-book"></i>  Emri i kursit *</label>
                                    <input type="text" class="form-control" value="<?=$te_dhena->emri_kursit ?>" name="emri_kursit" required="" placeholder="emri i kursit ...">
                                <?php endforeach; ?>
                                </div>

                                
                                <div class="form-group">
                                    <div>
                                        <button type="submit" name="krijo" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i>  Mbarova
                                        </button>
                                        <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    

                </div>
                <!-- end row -->

</div>


<?php
include_once "../includes/footer.php"

?>