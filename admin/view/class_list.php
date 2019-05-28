<?php
include_once "../includes/header.php";
//include_once "../model/Admin_User.php";
include_once "../model/Klasa.php";

$klasa=new Klasa();

$data=$klasa->te_dhena_klasa();

$fsheh="238rf4jf3twhte";
?>
<br><br><br><br><br><br><br>
<div class="col-sm-12">

                        <div class="card-box">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="m-b-30">
                                        <button id="addToTable" class="btn btn-success waves-effect waves-light"><a style="color: red;" href="../actions/add_class.php">Krijo nje klase te re  </a> <i class="mdi mdi-plus-circle-outline"></i></button>
                                    </div>
                                </div>
                            </div>

                            <div id="datatable-editable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12"><table class="table table-striped add-edit-table dataTable no-footer" id="datatable-editable" role="grid" aria-describedby="datatable-editable_info">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_desc" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" aria-sort="descending" style="width: 245px;color: #FFF;"><i class="fa fa-th-large"></i>  Emri i klases</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 315px;color: #FFF;"><i class="fa fa-calendar"></i>  Data krijimit</th>

                                    <th class="sorting" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 296px;color: #FFF;"><i class="fa fa-book"></i>  Kursi qe zhvillohet</th>

                                    <th class="sorting" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 296px;color: #FFF;"><i class="fa fa-user"></i>   Instruktori perkates</th>

                                    <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 193px;color: #FFF;"><i class="fa fa-cog"></i>  Opsione </th></tr>
                                </thead>
                                <?php foreach ($data as $te_dhena_klasa):?>
                              <tbody>

                                <tr class="gradeA odd" role="row">
                                    <td class="sorting_1"><a href="../profile/class_profile.php?kl=<?= $te_dhena_klasa->id_klasa  ?>"><?= $te_dhena_klasa->emri_klases  ?></a></td>
                                    <td class=""><?= $te_dhena_klasa->data_krijimit  ?>
                                    </td>
                                    <td class=""><?= $te_dhena_klasa->emri_kursit  ?></td>
                                    <td class=""><?= $te_dhena_klasa->emri."     "  ?><?= $te_dhena_klasa->mbiemri  ?></td>
                                    <td class="actions">
                                        <a href="../actions/edit_class.php?kl=<?= $te_dhena_klasa->id_klasa  ?>" class="on-default edit-row" data-toggle="tooltip" data-placement="top" title="" data-original-title="Modifiko klasen"><i class="fa fa-pencil"></i></a>
                                        <a onclick="return confirm('Jeni te sigurte qe doni te fshini kete? Nese po klikoni OK.  Nese kjo klase fshihet nuk do te kete me mundesi kthimi pas ')" href="../actions/delete.php?kl=<?= $te_dhena_klasa->id_klasa  ?>" class="on-default remove-row" data-toggle="tooltip" data-placement="top" title="" data-original-title="Fshij klasen"><i class="fa fa-trash-o"></i></a>
                                        <button style="width: 90px;height: 24px; font-size: 11px;color: black;" title="Shikoni detajet e klases si studentet,instruktorin,kursin perkates,oraret e mesimit etj..."><a href="../profile/class_profile.php?kl=<?= $te_dhena_klasa->id_klasa  ?>"> Shiko detajet</button>
                                        
                                    </td>
                                </tr>

                            </tbody>
                        <?php endforeach;  ?>
                            </table></div></div></div></div></div>
                        </div>
                    </div>

<?php
include_once '../includes/footer.php';
?>