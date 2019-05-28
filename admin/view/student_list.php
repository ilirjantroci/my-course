<?php
include_once '../includes/header.php';
include_once '../model/Student.php';
include_once "../model/Klasa.php";

$student= new Student();

$data=$student->te_dhena_student_all();

$klasa=new Klasa();

$data_klasa=$klasa->te_dhena_klasa();

?>


<div class="wrapper">
        <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                
                            </div>
                            <h4 class="page-title">Studentet </h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->


                <div class="row">
                    

                    <div class="col-md-12">
                        <div  class="card-box">
                            <h4 class="header-title m-t-0 m-b-30">Lista e te gjithe studenteve</h4>

                            <ul class="nav nav-pills navtab-bg nav-justified">
                                <li class="nav-item">
                                    <a href="#home1" data-toggle="tab" aria-expanded="false" class="nav-link active show">
                                      Te gjithe studentet
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#profile1" data-toggle="tab" aria-expanded="true" class="nav-link">
                                        Printo/PDF
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#messages1" data-toggle="tab" aria-expanded="false" class="nav-link">
                                        Studentet sipas klases
                                    </a>
                                </li>
                                
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="home1">
                                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Kerko sipas emrit" title="Shkruaj nje emer">
                         <table id="myTable" class="table table-striped add-edit-table dataTable no-footer" id="datatable-editable" role="grid" aria-describedby="datatable-editable_info">
                                
                                <thead>
                                <tr role="row">
                                    <th class="sorting_desc" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" aria-sort="descending" style="width: 245px;color: white;"><i class="fa fa-user"></i>  Emri</th>
                                    <th class="sorting_desc" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" aria-sort="descending" style="width: 245px;color: white;"><i class="fa fa-user"></i>  Mbiemri</th>
                                    <th class="sorting_desc" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" aria-sort="descending" style="width: 245px;color: white;"><i class="fa fa-phone"></i>  Numri</th>
                                    <th class="sorting_desc" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" aria-sort="descending" style="width: 245px;color: white;"><i class="fa fa-phone"></i>  Nr.prindit</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 315px;color: white;"><i class="fa fa-key"></i> Email</th>

                                    <th class="sorting" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 296px;color: white;"><i class="fa fa-birthday-cake"></i>  Ditelindja</th>

                                    <th class="sorting" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 296px;color: white;"><i class="fa fa-calendar"></i> Dt.regjistrimit</th>

                                    <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 193px;color: white;"><i class="fa fa-cog"></i>  Opsione </th></tr>
                                </thead>
                           
                           
                              <tbody>
                                <?php foreach ($data as $te_dhena):?>
                                <tr class="gradeA odd" role="row">
                                    <td  class="sorting_1"><a title="Klikoni ne emrin e studentit per te pare profilin e tij" href="../profile/student_profile.php?st=<?=$te_dhena->id_student ?>"><?=$te_dhena->emri  ?></a></td>
                                    <td  class="sorting_1"><?=$te_dhena->mbiemri  ?></td><td  class="sorting_1"><?=$te_dhena->numri_personal  ?></td>
                                    <td  class="sorting_1"><?=$te_dhena->numri_prindit  ?> </td>
                                    <td  class=""><?=$te_dhena->email  ?>
                                    </td>
                                    <td  class=""><?=$te_dhena->ditelindja  ?></td>
                                    <td  class=""><?=$te_dhena->data_regjistrimit  ?></td>
                                    <td  class="actions">
                                        <a href="../actions/edit_student.php?st=<?=$te_dhena->id_student  ?>" class="on-default edit-row" data-toggle="tooltip" data-placement="top" title="" data-original-title="Modifiko studentin"><i class="fa fa-pencil"></i></a>
                                        <a onclick="return confirm('Jeni te sigurte qe doni te fshini kete? Nese po klikoni OK.  Nese ky student fshihet nuk do te kete me mundesi kthimi pas ')"  href="../actions/delete.php?st=<?=$te_dhena->id_student  ?>" class="on-default remove-row" data-toggle="tooltip" data-placement="top" title="" data-original-title="Fshij studentin"><i class="fa fa-trash-o"></i></a>
                                        
                                    </td>
                                </tr>
                            <?php endforeach;  ?>

                            </tbody>
                        </table>
                                </div>
                                <div class="tab-pane fade" id="profile1">
                                    <p>
        <input type="button" value="Printo tani ne PDF" 
            id="btPrint" onclick="createPDF()" />
    </p>
    <div id="tab">
                                    <table style="width: 100%;
                                        font: 17px Calibri;border:solid 1px #DDD;
                                        border-collapse: collapse;
                                        padding: 2px 3px;
                                        text-align: center;">
                                        
                                        <tr>
                                            <th style="border: solid 1px #DDD;
                                                border-collapse: collapse;
                                                padding: 2px 3px;
                                                ">Emri</th>
                                            <th style="border: solid 1px #DDD;
            border-collapse: collapse;
            padding: 2px 3px;
            text-align: center;">Mbiemri</th>
            <th style="border: solid 1px #DDD;
            border-collapse: collapse;
            padding: 2px 3px;
            text-align: center;">Email</th>
                                            <th style="border: solid 1px #DDD;
            border-collapse: collapse;
            padding: 2px 3px;
            text-align: center;">Numri</th>
                                            <th style="border: solid 1px #DDD;
            border-collapse: collapse;
            padding: 2px 3px;
            text-align: center;">Nr.Prindit</th>
                                            
                                            <th style="border: solid 1px #DDD;
            border-collapse: collapse;
            padding: 2px 3px;
            text-align: center;">Ditelindja</th>
                                        </tr>
                                        <?php foreach ($data as $te_dhena):?>
                                        <tr>
                                            <td style="border: solid 1px #DDD;
            border-collapse: collapse;
            padding: 2px 3px;
            text-align: center;"><?=$te_dhena->emri  ?></td>
                                            <td style="border: solid 1px #DDD;
            border-collapse: collapse;
            padding: 2px 3px;
            text-align: center;"><?=$te_dhena->mbiemri  ?></td>
                                            <td style="border: solid 1px #DDD;
            border-collapse: collapse;
            padding: 2px 3px;
            text-align: center;"><?=$te_dhena->email  ?></td>

                                            <td style="border: solid 1px #DDD;
            border-collapse: collapse;
            padding: 2px 3px;
            text-align: center;"><?=$te_dhena->numri_personal  ?></td>
                                            <td style="border: solid 1px #DDD;
            border-collapse: collapse;
            padding: 2px 3px;
            text-align: center;"><?=$te_dhena->numri_prindit  ?></td>
                                            <td style="border: solid 1px #DDD;
            border-collapse: collapse;
            padding: 2px 3px;
            text-align: center;"><?=$te_dhena->ditelindja  ?></td>
                                            
                                        </tr>
                                        <?php endforeach;  ?>

                                    </table>
                                </div>
                                </div>
                                <div class="tab-pane fade" id="messages1">
                                    <div id="datatable-editable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12"><table class="table table-striped add-edit-table dataTable no-footer" id="datatable-editable" role="grid" aria-describedby="datatable-editable_info">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_desc" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" aria-sort="descending" style="width: 245px;color: #FFF;"><i class="fa fa-th-large"></i>  Emri i klases</th>
                                    

                                    <th class="sorting" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 296px;color: #FFF;"><i class="fa fa-book"></i>  Kursi qe zhvillohet</th>

                                    <th class="sorting" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 296px;color: #FFF;"><i class="fa fa-user"></i>   Instruktori perkates</th>

                                    <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 193px;color: #FFF;"><i class="fa fa-cog"></i>  Opsione </th></tr>
                                </thead>
                                <?php foreach ($data_klasa as $te_dhena_klasa):?>
                              <tbody>

                                <tr class="gradeA odd" role="row">
                                    <td class="sorting_1"><?= $te_dhena_klasa->emri_klases  ?></td>
                                    
                                    </td>
                                    <td class=""><?= $te_dhena_klasa->emri_kursit  ?></td>
                                    <td class=""><?= $te_dhena_klasa->emri."     "  ?><?= $te_dhena_klasa->mbiemri  ?></td>
                                    <td class="actions">
                                        <button><a href="student_class.php?st=<?= $te_dhena_klasa->id_klasa  ?>"><i class="fa fa-eye"></i> Shiko studentet</a> </button>
                                        
                                    </td>
                                </tr>

                            </tbody>
                        <?php endforeach;  ?>
                            </table></div></div></div>
                                </div>
                                
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->



                


            </div> <!-- end container -->
        </div>
        <script>
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
include_once "../includes/footer.php"
?>