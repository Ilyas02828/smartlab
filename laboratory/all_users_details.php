<?php include 'includes/connect.php'; ?>
<?php include 'includes/header.php'; ?>
        <!-- End Topbar header -->
<?php include 'includes/sidebar.php'; ?>
      
        <div class="page-wrapper">
            <div class="container-fluid">
              <div class="card-header bg-info">
    <h4 class="mb-0 text-white">ALL USERS DETAILS</h4>
</div>
<div class="card-body">
 
</div>



              <div id="printablediv"  class="panel-body">
      <div id="mainDiv"  class="row">

          <div class="col-lg-12">
              <div class="panel ">
                  
                  <div class="panel-body">
                      <div class="table-responsive">
<table class="table table-striped table-bordered table-hover" id="example1">
                              <thead>
                              <tr class="bg-primary">
                                  <th><strong>#</strong></th>
                                  <th><strong>Tester Name</strong></th>
                                  <th><strong>Patient Name</strong></th>
                                  <th ><strong>Total Amount</strong></th>
                                  <th><strong>Paid Amount</strong></th>
                                  <th ><strong>Dues Amount </strong></th>
                                  <th ><strong>Date</strong>
                                  
                              </tr>
                              </thead>
                              <tbody id="display">
<?php
$serial = 0;



$fetch ="SELECT  patient.name,patient_payment_history.total, GROUP_CONCAT(patient_payment_history.paid) AS PPaid,GROUP_CONCAT(patient_payment_history.dues) AS PDues, userName, patient_payment_history.id,patient_payment_history.p_id,
GROUP_CONCAT(patient_payment_history.created_at) AS PDate
FROM patient_payment_history 
INNER JOIN patient ON patient_payment_history.p_id=patient.id
GROUP BY patient.id
ORDER BY patient_payment_history.created_at DESC ";
$run_name = mysqli_query($connection,$fetch);
while($row=mysqli_fetch_array($run_name))
{
  $serial++; 
  $username = $row['userName'];
  $name = $row['name'];
  $total = $row['total'];
  $PPaid = $row['PPaid'];
 $Paid=explode(',', $PPaid);
  $PDues = $row['PDues'];
 $Dues=explode(',', $PDues); 
  $PDate = $row['PDate'];
 $Date=explode(',', $PDate);

                                $output = '<tr>
                                <td>'.$serial.'</td>
                                <td>'.$username.'</td>
                                <td>'.$name.'</td>
                                <td>'.$total.'</td>
                                <td>';
                                foreach($Paid as $pay){
                                  $output.=$pay."<hr>";
                                }  
                                $output.='</td><td>';
                                foreach($Dues as $due){
                                  $output.=$due."<hr>";
                                }  
                                $output.='</td><td>';
                                 foreach($Date as $date){
                                  $output.=$date."<hr>";
                                } 

                                $output.'</td>';
                                echo $output;
                              
                             


             }  ?> 
              </tbody>
          </table>
      </div>
  </div>
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
        </div>
<?php include 'includes/footer.php'; ?>

        <!-- footer -->

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