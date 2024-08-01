    <?php  
 include 'includes/connect.php'; 
 
    $data='';
    if (isset($_GET['count'])) {
     
      $count=$_GET['count'];

    $data.='  <div class="col-md-12" id="row'. $count.'" style="border-bottom: solid 1px;">

        <input type="hidden"  name="row[]" value="'. $count.'" id="total_fields">

            <div class="row pt-3">
                <div class="col-md-6">
                    <div class="form-group" style="width: 95%">
                    <select class="form-control select2" onchange="get_product('. $count.')" id="test'.$count.'" name="test[]">
                            <option>SELECT TEST</option>';
                              
                           $fetch=mysqli_query($connection,"SELECT * FROM main_test");
                           while ($row=mysqli_fetch_array($fetch)) {
                   $data.='<option value='.$row['id'].'>'.$row['title'].'</option>';
                      };  
                  

$data.='    </select></div></div>
<div class="col-md-2">
<div class="form-group">
    <input type="text" name="total[]" id="total'. $count.'" class="form-control" readonly>
</div>
</div>


<div class="col-md-2">
<div class="form-group">
<button type="button" onclick="remove_item('.$count.');" class="btn btn_3d btn-primary pull-right btn-icon  btn-round m-r-50"><i class="icon fa fa-minus" aria-hidden="true"></i></button>
</div>
</div>     

                  

               
  </div>       
   </div>
          
   </div>';


   echo $data;
 }
 ?>
         
<script src="assets/node_modules/jquery/jquery-3.2.1.min.js"></script>

 <script type="text/javascript">
  $(document).ready(function(){
    $(".select2").select2({
        theme: "bootstrap",
        placeholder: "Select"
    });
  });
</script>