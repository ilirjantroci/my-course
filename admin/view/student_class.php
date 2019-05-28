<?php
include_once "../includes/header.php";
include_once "../model/Student.php";
include_once "../model/Klasa.php";


$student=new Student();
$klasa=new Klasa();


$st=$_GET['st'];

$data_klasa=$klasa->te_dhena_klasa_id($st);//Kjo nxjerr te dhena te klases sipas id qe vjen tek vlera e funksionit
$data_student=$student->students_sipas_klasave($st);





?>
<br><br><br><br><br><br><br>
<div class="col-sm-12">
    <?php foreach ($data_klasa as $kl_data): ?>
                       <h4 style="text-align: center;color: white;">Studentet sipas klasave
                        </h4>
    
                        <div class="card-box">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="m-b-30">
                                        <button type="button" id="addToTable" id="btPrint" onclick="createPDF()" class="btn btn-success waves-effect waves-light"><i class="fa fa-save"></i> Ruaj / Print PDF  <i class="fa fa-print"></i></button>
                                        
                                    </div>
                                </div>
                            </div>
                            <marquee><?=$kl_data->emri_klases."---".$kl_data->emri_kursit."---".$kl_data->emri." ".$kl_data->mbiemri ?></marquee>
                            <?php endforeach ?>

                            <div id="datatable-editable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12">
                             <div id="tab">
                                <table class="table table-striped add-edit-table dataTable no-footer" id="datatable-editable" role="grid" aria-describedby="datatable-editable_info">
                                
                                <thead>
                                    <tr>
                                        <span style="text-align: center;font-family: sans-serif;">Studentet e klases ' 
                                        <?=$kl_data->emri_klases." '  te kursit '".$kl_data->emri_kursit."' me mesues '".$kl_data->emri." ".$kl_data->mbiemri."'" ?></span>
                                    </tr><br><br>
                                <tr role="row">
                                    <th class="sorting_desc" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" aria-sort="descending" style="width: 245px;color: #000;"><i class="fa fa-user"></i>  Emri</th>
                                    <th class="sorting_desc" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" aria-sort="descending" style="width: 245px;color: #000;"><i class="fa fa-user"></i>  Mbiemri</th>
                                    <th class="sorting_desc" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" aria-sort="descending" style="width: 245px;color: #000;"><i class="fa fa-phone"></i>  Numri</th>
                                    <th class="sorting_desc" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" aria-sort="descending" style="width: 245px;color: #000;"><i class="fa fa-phone"></i>  Nr.Prindit</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 315px;color: #000;"><i class="fa fa-key"></i> Email</th>

                                    <th class="sorting" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 296px;color: #000;"><i class="fa fa-birthday-cake"></i>  Ditelindja</th>

                                    <th class="sorting" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 296px;color: #000;"><i class="fa fa-calendar"></i>   Data regjistrimit</th>

                                    <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 193px;color: #FFF;"><i class="fa fa-cog"></i>  Opsione </th></tr>
                                </thead>
                           
                            <?php foreach ($data_student as $te_dhena_student) : ?>
                              <tbody>

                                <tr class="gradeA odd" role="row">
                                    <td class="sorting_1"><?=$te_dhena_student->emri ?> </td>
                                    <td class="sorting_1"> <?=$te_dhena_student->mbiemri ?> </td><td class="sorting_1"><?=$te_dhena_student->numri_personal ?> </td>
                                    </td><td class="sorting_1"><?=$te_dhena_student->numri_prindit ?> </td>
                                    <td class=""><?=$te_dhena_student->email ?>
                                    </td>
                                    <td class=""><?=$te_dhena_student->ditelindja ?></td>
                                    <td class=""><?=$te_dhena_student->data_regjistrimit ?></td>
                                    <td class="actions">
                                        <a href="../actions/edit_student.php?st=<?= $te_dhena_student->id_student  ?>" class="on-default edit-row" data-toggle="tooltip" data-placement="top" title="" data-original-title="Modifiko mesuesin"><i class="fa fa-pencil"></i></a>
                                        <a onclick="return confirm('Jeni te sigurte qe doni te fshini kete? Nese po klikoni OK.  Nese ky student fshihet nga sistemi nuk do te kete me mundesi kthimi pas ')" href="../actions/delete.php?st=<?= $te_dhena_student->id_student  ?>" class="on-default remove-row" data-toggle="tooltip" data-placement="top" title="" data-original-title="Fshij studentin"><i class="fa fa-trash-o"></i></a>
                                        
                                    </td>
                                </tr>

                            </tbody>
                             <?php endforeach;  ?>
                            </table></div></div></div></div></div></div>
                        </div>
                    </div>
<script type="text/javascript">
   
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

<script type="text/javascript">
    function createPDF() {
        var sTable = document.getElementById('tab').innerHTML;

        var style = "<style>";
        style = style + "table {width: 100%;font: 17px Calibri;}";
        style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
        style = style + "padding: 2px 3px;text-align: center;}";
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