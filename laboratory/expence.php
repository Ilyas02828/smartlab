<?php include 'includes/connect.php'; ?>
<?php include 'includes/header.php'; ?>
        <!-- End Topbar header -->
  
<?php include 'includes/sidebar.php'; ?>

        <!-- End Left Sidebar   -->

      
        <div class="page-wrapper">
            <div class="container-fluid">
<div class="card-header bg-info">
    <h4 class="mb-0 text-white">ADD EXPANCES  </h4>
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
                        <label class="control-label">Expance Name</label>
                        <input type="text" name="expancename[]" id="expancename1" class="form-control form-control-danger" placeholder="">
                      </div>
                    </div>

                   <div class="col-md-2">
                    <div class="form-group">

                        <label class="control-label">Amount</label>
                        <input type="text" name="amount[]" id="amount1" class="form-control form-control-danger" placeholder="">
                         </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">

                        <label class="control-label">Discription</label>
                        <input type="text" name="discription[]" id="discription1" class="form-control form-control-danger" placeholder="">
                         </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">

                        <label class="control-label">Person Name</label>
                        <input type="text" name="pname[]" id="pname1" class="form-control form-control-danger" placeholder="">
                         </div>
                </div>
                

<div class="col-md-2" style="margin-top: 30px">
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
      url:'ajax_expance.php',
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
$date=date('Y-m-d');
if (isset($_POST['save'])) {
	  // $=$_POST[''][$i];
	$count=count($_POST['row']);

	  for ($i=0; $i < $count ; $i++) { 
// SELECT `id`, `test_id`, `equip` FROM `eqiupment` WHERE 1
	  	$query="INSERT INTO `expances`(`exp_name`, `expance`, `discription`, `pname`, `created_at`) 
       VALUES ( '".$_POST['expancename'][$i]."', '".$_POST['amount'][$i]."','".$_POST['discription'][$i]."','".$_POST['pname'][$i]."','$date')";
$result=mysqli_query($connection,$query);
  }

}
?>

