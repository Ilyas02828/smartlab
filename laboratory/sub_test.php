<?php include 'includes/connect.php'; 
include 'includes/header.php';
include 'includes/sidebar.php'; ?>

        <!-- End Left Sidebar   -->

      
        <div class="page-wrapper">
            <div class="container-fluid">



<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-header bg-info">
    <h4 class="mb-0 text-white">ADD SUB TESTS CREDENTIAL</h4>
</div>
<form action="" method="post">
    <div class="form-body">
        <div class="card-body">
    <div class="row" id="new_row">
      <div class="col-md-12" id="row1" style="border-bottom: solid 1px;">

        <input type="hidden"  name="row[]" value="1" id="total_fields">


                     <div class="row pt-3">

                  <div class="col-md-3">
                            <div class="form-group">
                                    <label class="control-label">Main  Test Name</label>
                                <select class="form-control custom-select select2" id="test" name="test">
                                       
                                  <option>SELECT</option>
                                    <?php
                                          $getname="SELECT * FROM main_test";
                                         $var= mysqli_query($connection,$getname);
                                          while($row=mysqli_fetch_array($var)){
                                          $test=$row['title'];  
                                          $id=$row['id'];  
                                    ?>
                                        <option value="<?php echo $id;?>"><?php echo $test;?></option>
                                      <?php } ?>
                                    </select>
                             </div>
                  </div>
              </div>

            <div class="row pt-3">

                <!--/span-->
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Sub  Test Name</label>
                        <input type="text" name="subtest[]" id="subtest1" class="form-control form-control-danger" placeholder="">
                         </div>
                </div>

                  <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Normal Range  </label>
                        <input type="text" name="testrange[]" id="testrange1" class="form-control form-control-danger" placeholder="">
                         </div>
                </div>

                  <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Units</label>
                        <input type="text" name="testunit[]" id="testunit1" class="form-control form-control-danger" placeholder="">
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
            <div class="card-body">
                <button type="submit" class="btn btn-success" name="save"> <i class="fa fa-check"></i> Submit</button>
                <button type="button" class="btn btn-dark">Cancel</button>
            </div>
</div>
</form>
</div>
</div>
</div>

               
<?php include 'includes/service_pannel.php'; ?>


                
            </div>
        </div>
<?php include 'includes/footer.php'; ?>

     
<script type="text/javascript">
  $(document).ready(function(){
    $(".select2").select2({
        theme: "bootstrap",
        placeholder: "Select"
    });
  });
</script>


<script type="text/javascript">
  var count=0;
   var count=$('#total_fields').val();
    function add_row() {
        count++;

   $.ajax({
      url:'ajax_sub_test.php',
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
// SELECT `id`, `test_id`, `name`, `rangi`, `unit` FROM `sub_test` WHERE 1
	  for ($i=0; $i < $count ; $i++) { 

	  	$query="INSERT INTO `sub_test`(  `test_id`, `name`, `rangi`, `unit`) 
       VALUES ( '".$_POST['test']."','".$_POST['subtest'][$i]."','".$_POST['testrange'][$i]."','".$_POST['testunit'][$i]."'   )";
$result=mysqli_query($connection,$query);
  }

}

?>



