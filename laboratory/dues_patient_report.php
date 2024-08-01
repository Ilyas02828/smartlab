<?php include 'includes/connect.php'; ?>
<?php include 'includes/header.php'; ?>
        <!-- End Topbar header -->
  
<?php include 'includes/sidebar.php'; ?>

        <!-- End Left Sidebar   -->

      
        <div class="page-wrapper">
            <div class="container-fluid">

<div class="card-header bg-info">
    <h4 class="mb-0 text-white">ALL PATIENT DUES LIST</h4>
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
                                  <th><strong>Patient Name</strong></th>
                                  <th ><strong>Total Amount</strong></th>
                                  <th><strong>Paid Amount</strong></th>
                                  <th ><strong>Dues Amount </strong></th>
                                  <th ><strong>Date</strong>
                                  </th><th>Action</th>
                              </tr>
                              </thead>
                              <tbody id="display">
<?php
$value=0;
$serial = 0;



$fetch ="SELECT patient_payment.id,patient_payment.p_id,patient_payment.grand,patient_payment.discount,patient_payment.paid,patient_payment.dues,patient_payment.total,patient.name,patient_payment.created_at
FROM patient_payment 
INNER JOIN patient
ON patient_payment.id=patient.id
WHERE patient_payment.dues>0
ORDER BY updated_at DESC";
$run_name = mysqli_query($connection,$fetch);
while($row=mysqli_fetch_array($run_name))
{




   $serial++; 

  $name = $row['name'];
    $total = $row['total'];
   $paid =   $row['paid'];
   $dues=     $row['dues'];
   $date=     $row['created_at'];
   
   ?>
<tr>
    <td><?php echo $serial; ?></td>
    <td><?php echo $name; ?></td>
    <td><?php echo $total; ?></td>
    <td><?php echo $paid; ?></td>
    <td><?php echo $dues; ?></td>
    <td><?php echo $date; ?></td>
  
     <td class="text-center">
      <div class="btn-group">
        <a href="update_patient_ammount.php?id=<?php echo $row['id'];?>"  class="btn btn-responsive button-alignment btn-primary"data-toggle="tooltip" title="Payment"><span style="color:#fff;"  >
        	 <i class="fa fa-fw fa-edit"></i>Update Pay
        </span>
          
        </a>
       
      </div>
    </td>
</tr>
                  <?php   }  ?> 
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