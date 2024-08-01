<?php include 'includes/connect.php'; ?>
<?php include 'includes/header.php'; ?>
        <!-- End Topbar header -->
  
<?php include 'includes/sidebar.php'; ?>

        <!-- End Left Sidebar   -->

      
        <div class="page-wrapper">
            <div class="container-fluid">

<div class="card-header bg-info">
    <h4 class="mb-0 text-white">PATIENT TESTS</h4>
</div>

<form action="" method="post" style="margin-top:20px;">
<div class="card-body">   

<div class="row ">
             <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Name</label>
                        <input type="text" name="pname" class="form-control form-control-danger" placeholder="">
                         </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label"> Contact:No</label>
                        <input type="text" name="pcontact" class="form-control form-control-danger" placeholder="">
                         </div>
                </div>


                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Address</label>
                        <input type="text" name="paddress" class="form-control form-control-danger" placeholder="">
                         </div>
                </div>

                <div class="col-md-3">
                      <div class="form-group">
                          <label class="control-label"> GENDER</label>
                          <select class="form-control custom-select select2"  name="pgender"
                          style="height: 100%;">
                            <option>SELECT GENDER</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                           </select>
                      </div>
                </div>


                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Age</label>
                        <input type="text" name="page" class="form-control form-control-danger" placeholder="">
                         </div>
                </div>

    <div class="col-md-3" >
        <div class="form-group" style="width: 90%; height: 100px;">
            <label class=""> Reffered By</label>
             <select class="form-control select2"  name="preffer">
              <option>SELECT Doctor</option>
             <?php 
             $doctor=mysqli_query($connection,"SELECT * FROM doctor");
             while ($row1=mysqli_fetch_array($doctor)) {?>
             <option value="<?php echo $row1['id'];?>">
              <?php echo $row1['name'];?> </option>
         <?php    }  ?>
             </select>
        </div>
    </div>

                 <div class="col-md-3" >
                      <div class="form-group">
                          <label class="control-label"> Care-Of</label>
                        <input type="text" name="pcareof" class="form-control form-control-danger" placeholder="Care-of">
                      </div>
                </div>

              </div>
</div>
<hr>

    <div class="row" id="new_row">
      <div class="col-md-12" id="row1" style="border-bottom: solid 1px;">

        <input type="hidden"  name="row[]" value="1" id="total_fields">

<div class="row pt-3">
    <div class="col-md-6">
    <div class="form-group" style="width: 95%">
    <label  for="control-label">Select Test</label>
    <select class="form-control select2" onchange="get_product(1)" name="test[]" id="test1">
    <option>SELECT TEST</option>
    <?php 
    $fetch=mysqli_query($connection,"SELECT * FROM main_test");
    while ($row=mysqli_fetch_array($fetch)) {?>
    <option value="<?php echo $row['id'];?>"><?php echo $row['title'];?> </option>
    <?php    }  ?>
    </select>
    </div>
    </div>
<div class="col-md-2" >
<div class="form-group">
    <label  for="control-label">Cost</label>
    <input type="text" name="total[]" id="total1" class="form-control" readonly>
</div>
</div>

<div class="col-md-2">
<div class="form-group" style="margin-top: 30px">
<button type="button" onclick="add_row();" class="btn btn_3d btn-primary pull-right btn-icon  btn-round m-r-50"><i class="icon fa fa-plus" aria-hidden="true"></i></button>
</div>
</div>
 
</div>

            <!--/row-->
   </div>
          </div>

  <div class="row" >
      <div class="col-md-12" style="border-bottom: solid 1px;">

        <div class="row pt-3">

          <div class="col-md-2">
          <div class="form-group">
              <label class="control-label"> Grand Total</label>
              <input type="text" name="grand" id="grand" readonly class="form-control form-control" placeholder="">
               </div>

             </div>
              <div class="col-md-2">
              <div class="form-group">
                <label class="control-label"> Discount</label>
                <input type="text" name="discount" id="discount" class="form-control form-control" placeholder="">
                 </div>
                      </div>
                      
           <div class="col-md-2">
           <div class="form-group">
              <label class="control-label"> Total</label>
              <input type="text" name="afterdiscount" readonly id="afterdiscount" class="form-control form-control" placeholder="">
               </div>
           </div>
           <div class="col-md-2">
           <div class="form-group">
              <label class="control-label"> Paid</label>
              <input type="text" name="paid" id="paid" class="form-control form-control" placeholder="">
               </div>
           </div>

           <div class="col-md-2">
           <div class="form-group">
              <label class="control-label"> Dues</label>
              <input type="text" name="dues" id="dues" readonly class="form-control form-control" placeholder="">
               </div>
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
      url:'ajax_select_test_row.php',
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
        calculate_grand_total();
    }


function get_product(id)
{
   var test=$('#test'+id).find(':selected').val();
      var total=0;
        $.ajax({
        type : 'POST',
        url : 'add_sales_process.php',
        dataType:"json",
        data  : {test_id:test},
        success : function (data)
            {
                 price=$('#total'+id).val(data.price);

                calculate_grand_total();

}
});
}
function calculate_grand_total()
        {
            var grand_total_amount = 0;
            $("input[name^='row']").each(function () {
               var total_amount_input = "#total" + $(this).val();
               grand_total_amount += parseInt($(total_amount_input).val());
            
            });

            Number($('#grand').val(grand_total_amount));
            Number($('#afterdiscount').val(grand_total_amount));
        }




//Ishti Script

$("#discount").keyup(function(){
var total= $('#grand').val();
var disc=$('#discount').val();
 aftdisc=total - ( total*disc/100 );
$('#afterdiscount').val(aftdisc);

dues
});


$("#paid").keyup(function(){
var aftrdisc= $('#afterdiscount').val();
var paid=$('#paid').val();
 aftpaid=aftrdisc - paid;
$('#dues').val(aftpaid);


});



</script>


<?php

    $date=date('Y-m-d');
        if(isset($_POST['save'])){
          
        	$pname=$_POST['pname'];
        	$pcontact=$_POST['pcontact'];
        	$paddress=$_POST['paddress'];
          $pgender=$_POST['pgender'];
          $page=$_POST['page'];
          $preffer=$_POST['preffer'];
        	$pcareof=$_POST['pcareof'];
          $grand=$_POST['grand'];
          $discount=$_POST['discount'];
          $total=$_POST['afterdiscount'];
          $paid=$_POST['paid'];
          $dues=$_POST['dues'];
 

$query="INSERT INTO patient(`name`,`contact`,`address`,`gender`,`age`,`doctor_id`, `careof_id`, `created_at`) 
        	VALUES ('$pname','$pcontact','$paddress','$pgender','$page','$preffer','$pcareof','$date')";
        	if(mysqli_query($connection,$query)){

 $p_id=$connection->insert_id;

 $payment="INSERT INTO patient_payment(`p_id`, `grand`, `discount`, `paid`, `dues`, `total`, `created_at`, `updated_at`)
  VALUES('$p_id','$grand','$discount','$paid','$dues','$total','$date','$date')";
 mysqli_query($connection,$payment);

$username= $_SESSION['username'];
  $payment2="INSERT INTO patient_payment_history( `p_id`,`userName`, `grand`, `paid`, `dues`, `total`, `created_at`)
                                       VALUES('$p_id', '$username', '$grand','$paid','$dues','$total','$date')";
 mysqli_query($connection,$payment2);


	$count=count($_POST['row']);
	  for ($i=0; $i < $count ; $i++) { 
	  	$queryx="INSERT INTO `patient_test`(  `pid`, `test_id`, `created_at`) 
                          VALUES ( '".$p_id."','".$_POST['test'][$i]."','".$date."')";
$resultx=mysqli_query($connection,$queryx);
  }


     // $cus_profit = "Sales";
     //  $random = mt_rand(1,2000);

     //  $profit = "INSERT INTO profit(sale_id,name, debit,  credit,created_date)
     //             values ('$random','$cus_profit','$dues','$paid','$date') ";
     //  $run_profit = mysqli_query($connection,$profit);                
                   
  

echo "<script>window.open('invoice.php?id=".$p_id."')</script>";

      }
        
        }
        ?>
