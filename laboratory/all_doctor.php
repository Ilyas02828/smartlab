<?php include 'includes/connect.php'; ?>
<?php include 'includes/header.php'; ?>
        <!-- End Topbar header -->
  
<?php include 'includes/sidebar.php'; ?>

        <!-- End Left Sidebar   -->

      
        <div class="page-wrapper">
            <div class="container-fluid">

              <div class="card-header bg-info">
    <h4 class="mb-0 text-white">ALL DOCTORS LIST</h4>
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
                                  <th><strong>Doctor Name</strong></th>
                                  <th ><strong>Hospital</strong></th>
                              </tr>
                              </thead>
                              <tbody >
<?php

$serial = 0;

// SELECT `id`, `name`, `hospital` FROM `doctor` WHERE 1

$fetch ="SELECT `id`, `name`, `hospital` FROM `doctor`";
$run_name = mysqli_query($connection,$fetch);
while($row=mysqli_fetch_array($run_name))
{
  $serial++; 
  $name = $row['name'];
  $hospital = $row['hospital'];
   
   ?>
<tr>
    <td><?php echo $serial; ?></td>
    <td><?php echo $name; ?></td>
    <td><?php echo $hospital; ?></td>
  

</tr>
                  <?php   }  ?> 
              </tbody>
          </table>
      </div>
  </div>
</div>
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