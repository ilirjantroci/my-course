<?php
include_once "../includes/header.php";
//include_once "../model/Admin_User.php";
include_once "../model/Mandat_Pagese.php";

$mandat=new Mandat_Pagese();
$data=$mandat->mandat_pagese_list();


$fsheh="238rf4jf3twhte";
?>
<br><br><br><br><br><br><br>
<div class="col-sm-12">

                        <div class="card-box">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="m-b-30">
                                        <button id="addToTable" class="btn btn-success waves-effect waves-light" id="btPrint" onclick="createPDF()">Printo/PDF<i class="mdi mdi-plus-circle-outline"></i></button>
                                        
                                    </div>
                                </div>
                            </div>
                     <div id="tab">
                            <div id="datatable-editable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12"><table   class="table table-striped add-edit-table dataTable no-footer" id="datatable-editable" role="grid" aria-describedby="datatable-editable_info">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_desc" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" aria-sort="descending" style="width: 245px;color: #FFF;"><i class="fa fa-home"></i>  Subjekti</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 315px;color: #FFF;"><i class="fa fa-calendar"></i>  Data berjes</th>

                                    <th class="sorting" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 296px;color: #FFF;"><i class="fa fa-money"></i> Paguar nga z/znj</th>

                                    <th class="sorting" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 296px;color: #FFF;"><i class="fa fa-list"></i>   Shuma ne lek</th>

                                    <th class="sorting" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 296px;color: #FFF;"><i class="fa fa-calendar"></i>  Muaji</th>

                                    <th class="sorting" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 296px;color: #FFF;"><i class="fa fa-book"></i>   Kursi</th>

                                    <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 193px;color: #FFF;"><i class="fa fa-cog"></i>  Opsione </th></tr>
                                </thead>
                                <?php foreach ($data as $te_dhena_mandat):?>
                              <tbody>

                                <tr class="gradeA odd" role="row">
                                    <td class="sorting_1"><?= $te_dhena_mandat->subjekti  ?></td>
                                    <td class=""><?= $te_dhena_mandat->data_berjes  ?>
                                    </td>
                                    <td class=""><?= $te_dhena_mandat->emri." "?><?= $te_dhena_mandat->mbiemri?></td>
                                    <td class=""><?= $te_dhena_mandat->shuma." lek"?></td>

                                    <td class=""><?= $te_dhena_mandat->muaji?></td>
                                     <td class=""><?= $te_dhena_mandat->emri_kursit  ?></td>
                                    <td class="actions">
                                        
                                        <a onclick="return confirm('Jeni te sigurte qe doni te fshini kete? Nese po klikoni OK.  Nese ky mandat  fshihet nuk do te kete me mundesi kthimi pas ')" href="../actions/delete.php?mandat=<?= $te_dhena_mandat->id_mandat_pagese  ?>" class="on-default remove-row" data-toggle="tooltip" data-placement="top" title="" data-original-title="Fshij mandatin"><i class="fa fa-trash-o"></i></a>
                                        
                                    </td>
                                </tr>

                            </tbody>
                        <?php endforeach;  ?>
                            </table></div></div></div></div></div></div>
                        </div>
                    </div>
<script type="text/javascript">
    function createPDF() {
        var sTable = document.getElementById('tab').innerHTML;

        var style = "<style>";
        style = style + "table {width: 100%;font: 17px Calibri;}";
        style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
        style = style + "th {color: red;";
        style = style + "padding: 2px 3px;text-align: center;color:black;}";
        style = style + "</style>";

        // CREATE A WINDOW OBJECT.
        var win = window.open('', '', 'height=700,width=700');

        win.document.write('<html><head>');
        win.document.write('<title>Profile</title>');   // <title> FOR PDF HEADER.
        win.document.write(style);          // ADD STYLE INSIDE THE HEAD TAG.
        win.document.write('</head>');
        win.document.write('<body>');
        win.document.write(sTable);         // THE TABLE CONTENTS INSIDE THE BODY TAG.
        win.document.write('</body></html>');

        win.document.close();   // CLOSE THE CURRENT WINDOW.

        win.print();    // PRINT THE CONTENTS.
    }
</script>


<?php
include_once '../includes/footer.php';
?>