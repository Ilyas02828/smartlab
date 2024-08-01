<?php include 'includes/connect.php'; ?>
<?php include 'includes/header.php'; ?>
        <!-- End Topbar header -->
<?php include 'includes/sidebar.php'; ?>
        <!-- End Left Sidebar   -->
        <div class="page-wrapper"> 
            <div class="container-fluid">
<form action="" method="post">
            <div class="card-header bg-info">
    <h4 class="mb-0 text-white">ADD MAIN TESTS</h4>
</div>
    <div class="card-body">
     
    </div>
    <hr>
    <div class="form-body">
        <div class="card-body">
    <div class="row" id="new_row">
      <div class="col-md-12" id="row1" style="border-bottom: solid 1px;">

        <input type="hidden"  name="row[]" value="1" id="total_fields">

            <div class="row pt-3">
               
                <!--/span-->
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Main Test Name</label>
                        <input type="text" name="testname[]" id="testname1" class="form-control form-control-danger" placeholder="">
                         </div>
                </div>

                <div class="col-md-3">
                      <div class="form-group" style="width: 90%;">
                          <label class="control-label"> Specimen</label>
                           <select class="form-control select2"  name="specimen[]" id="specimen1">
                            <option>SELECT</option>
                             <?php
                                          $getname="SELECT * FROM specimen";
                                         $var= mysqli_query($connection,$getname);
                                          while($row=mysqli_fetch_array($var)){
                                          $spec=$row['speci'];  
                                          $id=$row['id'];  
                                    ?>
                              <option value="<?php echo $id;?>"><?php echo $spec;?></option>
                                      <?php } ?>
                          

                           </select>
                      </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label"> Cost</label>
                        <input type="text" name="cost[]" id="cost1" class="form-control form-control-danger" placeholder="">
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
      url:'ajax_test.php',
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

	  	$query="INSERT INTO `main_test`( `title`, `specimen`, `cost` ) 
       VALUES ( '".$_POST['testname'][$i]."' ,'".$_POST['specimen'][$i]."' ,'".$_POST['cost'][$i]."' )";
$result=mysqli_query($connection,$query);
  }

}
?>

