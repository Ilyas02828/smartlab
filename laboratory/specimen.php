<?php include 'includes/connect.php'; ?>
<?php include 'includes/header.php'; ?>
        <!-- End Topbar header -->
<?php include 'includes/sidebar.php'; ?>
        <div class="page-wrapper"> 
            <div class="container-fluid">
<form  method="post">
   <div class="card-header bg-info">
    <h4 class="mb-0 text-white">ADD SPECIMEN</h4>
</div>
    <div class="card-body">
       <!--  <h4 class="card-title">ADD MAIN TEST </h4> -->
    </div>
    <hr>
    <div class="form-body">
        <div class="card-body">
    <div class="row" id="new_row">
      <div class="col-md-12" id="row1" style="border-bottom: solid 1px;">
            <div class="row pt-3">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Specimen</label>
                        <input type="text" name="speci" class="form-control form-control-danger" placeholder="Enter Specimen">
                         </div>
                </div>
</div>
    <!--/row-->
   </div>
          </div>
      </div>
        </div>
        <div class="form-actions">
            <div class="card-body">
                <input type="submit" class="btn btn-success" name="save" value="Submit"> 
                <button type="button" class="btn btn-dark">Cancel</button>
            </div>
</div>
</form>         
            </div>
        </div>


<?php include 'includes/footer.php'; ?>
       
<?php
if (isset($_POST['save']))
 {
    $speci=$_POST['speci'];

	  	$query="INSERT INTO specimen(`speci`) VALUES ('$speci')";
          $result=mysqli_query($connection,$query);


  }
?>

