<?php include 'includes/connect.php'; ?>
<?php include 'includes/header.php'; ?>
        <!-- End Topbar header -->
  
<?php include 'includes/sidebar.php'; ?>

        <!-- End Left Sidebar   -->

      
        <div class="page-wrapper">
            <div class="container-fluid">

<div class="card-header bg-info">
    <h4 class="mb-0 text-white">ADD TEST EQUIPMENT</h4>
</div>


<form action="" method="post">

    <div class="form-body">
        <div class="card-body">



        <div class="col-md-3">
                      <div class="form-group">
                          <label class="control-label"> Main Test</label>
                           <select class="form-control select2"  name="maintest" id="maintest">
                            <option>SELECT Test</option>
                           <?php 
                           $test=mysqli_query($connection,"SELECT * FROM main_test");
                           while ($row1=mysqli_fetch_array($test)) {?>
                    <option value="<?php echo $row1['id'];?>"><?php echo $row1['title'];?> </option>
                       <?php    }  ?>
                           </select>
                      </div>
                </div>


    <div class="row" id="new_row">
      <div class="col-md-12" id="row1" style="border-bottom: solid 1px;">

        <input type="hidden"  name="row[]" value="1" id="total_fields">
            <div class="row pt-3">
                <!--/span-->
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label"> Test Equipment</label>
                        <input type="text" name="testequipment[]" id="testequipment1" class="form-control form-control-danger" placeholder="">
                      </div>
                    </div>

                   <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Range</label>
                        <input type="text" name="range[]" id="range1" class="form-control form-control-danger" placeholder="">
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
            <div class="card-body">
                <button type="submit" class="btn btn-success" name="save"> <i class="fa fa-check"></i> Submit</button>
                <button type="button" class="btn btn-dark">Cancel</button>
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
      url:'ajax_equipment.php',
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
// SELECT `id`, `test_id`, `equip` FROM `eqiupment` WHERE 1
      $query="INSERT INTO `eqiupment`( `test_id`, `equip`,`unit`) 
       VALUES ( '".$_POST['maintest']."', '".$_POST['testequipment'][$i]."','".$_POST['range'][$i]."')";
$result=mysqli_query($connection,$query);
  }

}
?>

