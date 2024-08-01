<?php include 'includes/connect.php'; ?>
<?php include 'includes/header.php'; ?>
        <!-- End Topbar header -->
  
<?php include 'includes/sidebar.php'; ?>

        <!-- End Left Sidebar   -->

      
        <div class="page-wrapper"> 
            <div class="container-fluid">

<div class="card-header bg-info">
    <h4 class="mb-0 text-white">ADD DOCTOR</h4>
</div>


<form action="" method="post">
    <div class="form-body">
        <div class="card-body">
    <div class="row" id="new_row">
      <div class="col-md-12" id="row1" style="border-bottom: solid 1px;">

        <input type="hidden"  name="row[]" value="1" id="total_fields">

            <div class="row pt-3">
               
                <!--/span-->
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Doctor Name</label>
                        <input type="text" name="doctor[]" id="doctor1" class="form-control form-control-danger" placeholder="">
                         </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label"> Hospital</label>
                        <input type="text" name="hospital[]" id="hospital1" class="form-control form-control-danger" placeholder="">
                         </div>
                </div>

<div class="col-md-2">
<div class="form-group">
<button type="button" onclick="add_row();" class="btn btn_3d btn-primary pull-right btn-icon  btn-round m-r-50"><i class="icon fa fa-plus" aria-hidden="true"></i></button>
</div>
</div>
 
</div>

            <!--/row-->
   </div>
          </div>
      </div>
        </div>

        
        <div class="form-actions">
            <div class="card-footer">
                  <button  type="submit" name="save" class="btn btn-responsive button-alignment btn-success" data-toggle="tooltip" title="" data-original-title="Submit"><span style="color:#fff;">
           <i class="fa fa-fw fa-check"></i>Submit 
        </span>  
        </button>
            </div>
</div>

</form>


                
            </div>
        </div>


<?php include 'includes/footer.php'; ?>

        <!-- footer -->


           <script type="text/javascript">
  var count=0;
var count=$('#total_fields').val();
    function add_row() {
        count++;

   $.ajax({
      url:'ajax_doctor.php',
      type:'get',
      data:{'count':count},
      
      success(data){
      $('#new_row').append(data);
      }
   });
}

 function remove_item(id){
        var div = '#row'+id;
        $(div).remove();
    }

</script>

<?php
if (isset($_POST['save'])) {
	  // $=$_POST[''][$i];
	$count=count($_POST['row']);

	  for ($i=0; $i < $count ; $i++) { 
// SELECT `id`, `name`, `hospital` FROM `doctor` WHERE 1
	  	$query="INSERT INTO `doctor`(`name`, `hospital`) 
       VALUES ( '".$_POST['doctor'][$i]."' ,'".$_POST['hospital'][$i]."' )";
$result=mysqli_query($connection,$query);
  }

}
?>

