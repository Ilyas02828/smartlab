    <?php  

    $data='';
    if (isset($_GET['count'])) {
     
      $count=$_GET['count'];

    $data='  <div class="col-md-12" id="row'. $count.'" style="border-bottom: solid 1px;">

        <input type="hidden"  name="row[]" value="'. $count.'" id="total_fields">

            <div class="row pt-3">
                
             
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label"> Test Name</label>
                        <input type="text" name="testunit[]" id="testunit1'.$count.'" class="form-control form-control-danger" placeholder="">
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
         