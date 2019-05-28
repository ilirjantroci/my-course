<?php
include_once "../includes/header.php";
include_once "../model/Fitime_Mujore.php";

$fitime_mujore=new Fitime_Mujore();

$data_janar=$fitime_mujore->Janar();
$data_shkurt=$fitime_mujore->Shkurt();
$data_mars=$fitime_mujore->Mars();
$data_prill=$fitime_mujore->Prill();
$data_maj=$fitime_mujore->Maj();
$data_qershor=$fitime_mujore->Qershor();
$data_korrik=$fitime_mujore->Korrik();
$data_gusht=$fitime_mujore->Gusht();
$data_shtator=$fitime_mujore->Shtator();
$data_tetor=$fitime_mujore->Tetor();
$data_nentor=$fitime_mujore->Nentor();
$data_dhjetor=$fitime_mujore->Dhjetor();





?>
<br><br><br><br><br><br><br>
<div class="col-sm-12">

                        <div class="card-box">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="m-b-30">
                                        <button id="addToTable" class="btn btn-success waves-effect waves-light">PRINTO PDF <i class="mdi mdi-plus-circle-outline"></i></button>
                                    </div>
                                </div>
                            </div>

                            <div id="datatable-editable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12"><table class="table table-striped add-edit-table dataTable no-footer" id="datatable-editable" role="grid" aria-describedby="datatable-editable_info">
                                <thead> 
                                <tr role="row"><th id="h4_me" class="sorting_desc" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" aria-sort="descending" style="width: 245px;"><i class="fa fa-home"></i>  SUBJEKTI</th><th id="h4_me" class="sorting" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 315px;"><i class="fa fa-calendar"></i> MUAJI</th>
                                    <th id="h4_me" class="sorting" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 315px;"><i class="fa fa-money"></i> Te ardhura</th></tr>
                                </thead>
                              <tbody>
                            <?php foreach ($data_janar as $janar ): ?>
                                <tr class="gradeA odd" role="row">
                                    <td class="sorting_1"><?=$janar->subjekti ?></td>
                                    <td class=""><?=$janar->muaji ?>
                                    </td>
                                    <td class=""><?=$janar->shuma."  leke" ?>
                                    </td>
                                  </tr>
                                <?php endforeach ?>
                                <?php foreach ($data_shkurt as $shkurt ): ?>
                                <tr class="gradeA odd" role="row">
                                    <td class="sorting_1"><?=$shkurt->subjekti ?></td>
                                    <td class=""><?=$shkurt->muaji ?>
                                    </td>
                                    <td class=""><?=$shkurt->shuma."  leke" ?>
                                    </td>
                                  </tr>
                                <?php endforeach ?>

                                <?php foreach ($data_mars as $mars ): ?>
                                <tr class="gradeA odd" role="row">
                                    <td class="sorting_1"><?=$mars->subjekti ?></td>
                                    <td class=""><?=$mars->muaji ?>
                                    </td>
                                    <td class=""><?=$mars->shuma."  leke" ?>
                                    </td>
                                  </tr>
                                <?php endforeach ?>

                                <?php foreach ($data_prill as $prill ): ?>
                                <tr class="gradeA odd" role="row">
                                    <td class="sorting_1"><?=$prill->subjekti ?></td>
                                    <td class=""><?=$prill->muaji ?>
                                    </td>
                                    <td class=""><?=$prill->shuma."  leke" ?>
                                    </td>
                                  </tr>
                                <?php endforeach ?>

                                <?php foreach ($data_maj as $maj ): ?>
                                <tr class="gradeA odd" role="row">
                                    <td class="sorting_1"><?=$maj->subjekti ?></td>
                                    <td class=""><?=$maj->muaji ?>
                                    </td>
                                    <td class=""><?=$maj->shuma."  leke" ?>
                                    </td>
                                  </tr>
                                <?php endforeach ?>

                                <?php foreach ($data_qershor as $qershor ): ?>
                                <tr class="gradeA odd" role="row">
                                    <td class="sorting_1"><?=$qershor->subjekti ?></td>
                                    <td class=""><?=$qershor->muaji ?>
                                    </td>
                                    <td class=""><?=$qershor->shuma."  leke" ?>
                                    </td>
                                  </tr>
                                <?php endforeach ?>

                                   <?php foreach ($data_korrik as $korrik ): ?>
                                <tr class="gradeA odd" role="row">
                                    <td class="sorting_1"><?=$korrik->subjekti ?></td>
                                    <td class=""><?=$korrik->muaji ?>
                                    </td>
                                    <td class=""><?=$korrik->shuma."  leke" ?>
                                    </td>
                                  </tr>
                                <?php endforeach ?>

                                 <?php foreach ($data_gusht as $gusht ): ?>
                                <tr class="gradeA odd" role="row">
                                    <td class="sorting_1"><?=$gusht->subjekti ?></td>
                                    <td class=""><?=$gusht->muaji ?>
                                    </td>
                                    <td class=""><?=$gusht->shuma."  leke" ?>
                                    </td>
                                  </tr>
                                <?php endforeach ?>

                                <?php foreach ($data_shtator as $shtator ): ?>
                                <tr class="gradeA odd" role="row">
                                    <td class="sorting_1"><?=$shtator->subjekti ?></td>
                                    <td class=""><?=$shtator->muaji ?>
                                    </td>
                                    <td class=""><?=$shtator->shuma."  leke" ?>
                                    </td>
                                  </tr>
                                <?php endforeach ?>

                                 <?php foreach ($data_tetor as $tetor ): ?>
                                <tr class="gradeA odd" role="row">
                                    <td class="sorting_1"><?=$tetor->subjekti ?></td>
                                    <td class=""><?=$tetor->muaji ?>
                                    </td>
                                    <td class=""><?=$tetor->shuma."  leke" ?>
                                    </td>
                                  </tr>
                                <?php endforeach ?>

                                <?php foreach ($data_nentor as $nentor ): ?>
                                <tr class="gradeA odd" role="row">
                                    <td class="sorting_1"><?=$nentor->subjekti ?></td>
                                    <td class=""><?=$nentor->muaji ?>
                                    </td>
                                    <td class=""><?=$nentor->shuma."  leke" ?>
                                    </td>
                                  </tr>
                                <?php endforeach ?>

                                <?php foreach ($data_dhjetor as $dhjetor ): ?>
                                <tr class="gradeA odd" role="row">
                                    <td class="sorting_1"><?=$dhjetor->subjekti ?></td>
                                    <td class=""><?=$dhjetor->muaji ?>
                                    </td>
                                    <td class=""><?=$dhjetor->shuma."  leke" ?>
                                    </td>
                                  </tr>
                                <?php endforeach ?>



                           


                            </tbody>
                            </table></div></div></div></div></div>
                        </div>
 </div>

<?php
include_once '../includes/footer.php';
?>