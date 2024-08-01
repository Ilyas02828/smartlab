    <?php  

    $data='';
    if (isset($_GET['count'])) {
     
      $count=$_GET['count'];

    $data='  <div class="col-md-12" id="row'. $count.'" style="border-bottom: solid 1px;">
        <input type="hidden"  name="row[]" value="'. $count.'" id="total_fields">
            <div class="row pt-3">                
             
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" name="expancename[]" id="expancename'.$count.'" class="form-control form-control-danger" placeholder="Expance Name">
                        </div>
                        </div>

                  <div class="col-md-2">
                    <div class="form-group">
                        <input type="text" name="amount[]" id="amount'.$count.'" class="form-control form-control-danger" placeholder="Amount">
                         </div>
                </div>
                
                 <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" name="discription[]" id="discription'.$count.'" class="form-control form-control-danger" placeholder="Discription">
                         </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">

                        <input type="text" name="pname[]" id="pname'.$count.'" class="form-control form-control-danger" placeholder="Person Name">
                         </div>
                </div>

                

<div class="col-md-2" >
<div class="form-group">
<button type="button" onclick="remove_item('.$count.');" class="btn btn_3d btn-primary pull-right btn-icon  btn-round m-r-50"><i class="icon fa fa-minus" aria-hidden="true"></i></button>
</div>
</div>     

   </div>
   </div>
   ';


   echo $data;
 }
 ?>
         