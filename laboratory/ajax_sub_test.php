    <?php  

    $data='';
    if (isset($_GET['count'])) {
     
      $count=$_GET['count'];

    $data='  <div class="col-md-12" id="row'. $count.'" style="border-bottom: solid 1px;">

        <input type="hidden"  name="row[]" value="'. $count.'" id="total_fields">

            <div class="row pt-3">
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" name="subtest[]" id="subtest'.$count.'" class="form-control form-control-danger" placeholder="Sub Tesr Name">
                         </div>
                </div>

                  <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" name="testrange[]" id="testrange'.$count.'" class="form-control form-control-danger" placeholder=" Sub Test Range">
                         </div>
                </div>

                  <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" name="testunit[]" id="testunit'.$count.'" class="form-control form-control-danger" placeholder="Sub Test Unit ">
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
         