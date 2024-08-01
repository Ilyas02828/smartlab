<?php include 'includes/connect.php'; ?>
<?php include 'includes/header.php'; ?>
        <!-- End Topbar header -->
  
<?php include 'includes/sidebar.php'; ?>
    
<style type="text/css">
@media print {
  #mainDD {width: 100%;display: flex; }
  #div1{width: 400px;}
 @page {margin-bottom: 0;}
  #div2{width: 400px;}
  #div3{width: 400px;}
  .btn-section{ display: none;}
  .dataTables_length{display: none;}
  #sample_1_filter{  display: none; }
  #sample_1_info{display: none;}
  #sample_1_paginate {display: none; }
}
</style>

       

        <div class="page-wrapper">
            <div class="container-fluid">

<div class="card-header bg-info">
    <h4 class="mb-0 text-white">DOCTOR TEST DATE REPORTS</h4>
</div>
<br>

  <div class="row bg-primary">
    <div class="col-md-3">
        <div class="form-group">
          <label>Choose Doctor</label>
            <select id="doctor" class="form-control select2 " style="width:100%">
               <option></option>
                <optgroup >
                     <?php
                    $select_sup = "SELECT * FROM doctor ";
                    $run_sup = mysqli_query($connection,$select_sup);
                    while($row = mysqli_fetch_array($run_sup))
                    {
                      echo "<option value=".$row['id']."  >". $row['name'] ."</option>";
                    }
                    ?> 
                </optgroup> 
            </select>
        </div>
    </div>




<div class="col-md-3" >
<div class="form-group">
   <label>Choose Test</label>
    <select id="test" class="form-control select2 " style="width:100%" >
       <option></option>
        <optgroup >
             <?php
            $select_sup = "SELECT * FROM main_test ";
            $run_sup = mysqli_query($connection,$select_sup);
            while($row = mysqli_fetch_array($run_sup))
            {
              echo "<option value=".$row['id']."  >". $row['title'] ."</option>";
            }
            ?> 
        </optgroup> 
    </select> 
</div>
</div>


    <div class="col-md-3">
    	  <div class="form-group">
          <label>Date / From Date</label>
      <input type="date"  id="dateone" class="form-control "  >  
    </div>
</div>

    <div class="col-md-3">
    	  <div class="form-group">
          <label>To Date</label>
      <input type="date" class="form-control" id="datetwo"  >
    </div>
</div>
    
  </div>

<div class="panel" >
 <!--  <div class="panel-heading">
      <h3 class="panel-title">
          <i class="fa fa-fw ti-credit-card"></i> Report
      </h3>
  </div> -->
    <div id="printablediv"  class="panel-body">

  <div class="col-md-12">    
   <table class="table table-striped table-bordered table-hover" id="example1">
                          <thead>
                          <tr class="bg-primary">
                            <th>#</th>
                            <th>Doctor:</th> 
                            <th>Patient:</th> 
                            <th>Contact:</th> 
                            <th>Test: </th> 
                            <th>Date</th>
                          </tr>                             
                          </thead>
                          <tbody id="display" >
                          <?php      
$serial=0;
$general = "SELECT  GROUP_CONCAT(main_test.title) AS Test,
                doctor.name AS Doctor, patient.name AS Pname, contact, patient.created_at
FROM patient 

INNER JOIN patient_test ON patient.id=patient_test.pid

INNER  JOIN main_test ON patient_test.test_id=main_test.id

INNER  JOIN doctor ON patient.doctor_id=doctor.id

WHERE patient.id=patient_test.pid AND
patient_test.test_id=main_test.id AND
patient.doctor_id=doctor.id
GROUP BY patient.created_at ";

                            $run = mysqli_query($connection,$general);
                            while($row=mysqli_fetch_array($run))
                            {
                              // print_r($row); 

                              $serial++;

                              $Test = $row['Test'];
                              $tname=explode(',', $Test);

                                  $Doctor = $row['Doctor'];
                                  $Contact = $row['contact'];
                                  $Pname = $row['Pname'];
                                  $created_at = $row['created_at'];
                                 
                                  $output = '<tr>

                                        <td>'.$serial.'</td>
                                        <td>'.$Doctor.'</td>
                                        <td>'.$Pname.'</td>
                                        <td>'.$Contact.'</td><td>';

										foreach($tname as $testi)
										{$output.=$testi."<hr>";}  
										$output.='</td>

                                         <td>'.$created_at.'</td>';
                                    echo $output;
                              
                              }  
                              ?>
                          </tbody>
                      </table>
                  </div>
           
          </div>
      </div>

  
      <div class="btn-section">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <span class="pull-right">            
            <button style="display: block" id="button1" onclick="javascript:printDiv('printablediv')" type="button" class="btn btn-responsive button-alignment btn-primary"
                     data-toggle="button">
            <span style="color:#fff;" >
              <i class="fa fa-fw ti-printer"></i> Print  
            </span>
            </button>
            </span>

          </div>
      </div>





                
            </div>
        </div>
<?php include 'includes/footer.php'; ?>



<script>
$(document).ready(function(){

$(".select2").select2({
    theme: "bootstrap",
    placeholder: "Select"
});


$('#doctor').change(function()
{
  var input1=  $('#doctor').find(':selected').val();
  // console.log(input1);
    $.ajax({
      type : 'POST',
      url : 'ajax_all_doctor.php',
      data  : {doctor_id:input1},
      success : function (data)
      {
        var some_data=$("#display").html(data);

        //$('#supply').remove();         
      }
    });
 

});


$('#test').change(function()
{
  var input2=  $('#test').find(':selected').val();
// console.log(input2);
    $.ajax({
      type : 'POST',
      url : 'ajax_all_test.php',
      data  : {test_id:input2},
      success : function (data)
      {
        var some_data=$("#display").html(data);        
      }
    });

});



$('#doctor').change(function()
{
  $('#test').change(function()
  {
    
    var doctor_id=  $('#doctor').find(':selected').val();
    var test_id= $('#test').find(':selected').val();
  
    
      $.ajax({
        type : 'POST',
        url : 'ajax_all_doctor_test.php',
        data  : {doctor_id,test_id},
        success : function (data)
        {
          var some_data=$("#display").html(data);         
        }
      });
    

  });

});



$('#doctor').change(function()
{
  $('#test').change(function()
  {

   $('#dateone').change(function()
   {
    var dateone = $('#dateone').val();
    var doctor=  $('#doctor').find(':selected').val();
    var test=  $('#test').find(':selected').val();
  
    
      $.ajax({
        type : 'POST',
        url : 'ajax_doctor_test_date.php',
        data  : {dateone,doctor,test},
        success : function (data)
        {
          var some_data=$("#display").html(data);         
        }
      });
    

  });

});
});



$('#test').change(function()
{
  $('#dateone').change(function()
  {

   $('#datetwo').change(function()
   {
    var dateone = $('#dateone').val();
    var datetwo = $('#datetwo').val();
    var test=  $('#test').find(':selected').val();
    
  
    
      $.ajax({
        type : 'POST',
        url : 'ajax_test_btw_date.php',
        data  : {dateone,datetwo,test},
        success : function (data)
        {
          var some_data=$("#display").html(data);         
        }
      });
    

  });

});
});

$('#doctor').change(function()
{
  $('#test').change(function()
  {

$('#dateone').change(function()
{
  $('#datetwo').change(function()
  {
    var dateone = $('#dateone').val();
    var datetwo = $('#datetwo').val();
    var doctor=  $('#doctor').find(':selected').val();
    var test=  $('#test').find(':selected').val();
  
    
      $.ajax({
        type : 'POST',
        url : 'ajax_all_report.php',
        data  : {doctor,test,dateone,datetwo},
        success : function (data)
        {
          var some_data=$("#display").html(data);         
        }
      });
    

  });

});
});
});


});
</script>

<script type="text/javascript">
$('#doctor').change(function()
{
  $('#dateone').change(function()
  {
    
    var doctor_id=  $('#doctor').find(':selected').val();
    var dateone= $('#dateone').val();
  console.log(dateone);
    
      $.ajax({
        type : 'POST',
        url : 'ajax_doctor_date.php',
        data  : {doctor_id,dateone},
        success : function (data)
        {
          var some_data=$("#display").html(data);         
        }
      });
    

  });

});

$('#test').change(function()
{
  $('#dateone').change(function()
  {
    
    var test_id=  $('#test').find(':selected').val();
    var dateone= $('#dateone').val();
  console.log(dateone);
    
      $.ajax({
        type : 'POST',
        url : 'ajax_test_date.php',
        data  : {test_id,dateone},
        success : function (data)
        {
          var some_data=$("#display").html(data);         
        }
      });
    

  });

});
</script>

        <!-- footer -->
<script language="javascript" type="text/javascript">
function printDiv(divID) {
  var divElements = document.getElementById(divID).innerHTML;
  var oldPage = document.body.innerHTML;
  document.body.innerHTML = 
    "<html><head><title></title></head><body><table> " + 
    divElements + "</table> </body>";
  window.print();
  document.body.innerHTML = oldPage;
  window.location.reload();
}
</script>



<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>