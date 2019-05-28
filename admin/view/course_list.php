<?php
include_once "../includes/header.php";
include_once "../model/Kursi.php";

$kursi=new Kursi();
$data=$kursi->te_dhena_kursi();



?>
<br><br><br><br><br><br><br>
<div class="col-sm-12">

                        <div class="card-box">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="m-b-30">
                                        <button id="addToTable" class="btn btn-success waves-effect waves-light"><a style="color: red;" href="../actions/add_course.php">Krijo nje kurs te ri </a> <i class="mdi mdi-plus-circle-outline"></i></button>
                                    </div>
                                </div>
                            </div>

                            <div id="datatable-editable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12"><table class="table table-striped add-edit-table dataTable no-footer" id="datatable-editable" role="grid" aria-describedby="datatable-editable_info">
                                <thead>
                                <tr role="row"><th id="h4_me" class="sorting_desc" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" aria-sort="descending" style="width: 245px;"><i class="fa fa-book"></i>  Emri kursit</th><th id="h4_me" class="sorting" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 315px;"><i class="fa fa-calendar"></i>  Data krijimit</th><th id="h4_me" class="sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 193px;"><i class="fa fa-cog"></i>  Opsione </th></tr>
                                </thead>
                              <tbody>
                            <?php foreach($data as $te_dhena ): ?>
                                <tr class="gradeA odd" role="row">
                                    <td class="sorting_1"><?= $te_dhena->emri_kursit?></td>
                                    <td class=""><?= $te_dhena->data_krijimit?>
                                    </td>
                                    
                                    <td class="actions">
                                        <a href="../actions/edit_course.php?k=<?= $te_dhena->id_kursi?>" class="on-default edit-row" data-toggle="tooltip" data-placement="top" title="" data-original-title="Modifiko"><i class="fa fa-pencil"></i></a>
                                        <a onclick="return confirm('Jeni te sigurte qe doni te fshini kete? Nese po klikoni OK.  Nese ky kurs fshihet nuk do te kete me mundesi kthimi pas ')" href="../actions/delete.php?k=<?= $te_dhena->id_kursi?>" class="on-default remove-row" data-toggle="tooltip" data-placement="top" title="" data-original-title="Fshij"><i class="fa fa-trash-o"></i></a>
                                        
                                    </td>
                                </tr>
                            <?php endforeach; ?>


                            </tbody>
                            </table></div></div></div></div></div>
                        </div>
 </div>

<?php
include_once '../includes/footer.php';
?>