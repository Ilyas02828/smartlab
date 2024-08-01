<?php include 'includes/connect.php'; ?>
<?php include 'includes/header.php'; ?>
        <!-- End Topbar header -->
  
<?php include 'includes/sidebar.php'; ?>

        <!-- End Left Sidebar   -->

      
        <div class="page-wrapper">
            <div class="container-fluid">
<div class="card-header bg-info">
    <h4 class="mb-0 text-white"> DAILY EXPENCES </h4>
</div>

<div class="col-lg-12">
<div class="panel " id="printablediv">

<div class="panel-body" id="mainDiv">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover" id="example1">
	<thead>
    <tr class="bg-primary">
		<th>#</th>
		<th>Expance Name</th>
		<th>Amount</th>
		<th>Person Name </th>
		<th>Discription</th>
		<th>Date</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$todate=date('Y-m-d');
		$counter=0;
$query=mysqli_query($connection,"SELECT * FROM expances WHERE created_at='$todate'");
while ($row=mysqli_fetch_array($query)) {
	       $exp_name=$row['exp_name'];
           $expance=$row['expance'];
           $discription=$row['discription'];
           $pname=$row['pname'];
           $date=$row['created_at'];
           $counter++;

		?>
		<tr>
		<td><?php echo $counter; ?></td>
		<td><?php echo $exp_name; ?></td>
		<td><?php echo $expance; ?></td>
		<td><?php echo $pname; ?></td>
		<td><?php echo $discription; ?></td>
		<td><?php echo $date; ?></td>
		</tr>
<?php } ?>
	</tbody>


</table>
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