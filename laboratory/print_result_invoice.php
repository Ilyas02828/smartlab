<?php
 include 'includes/connect.php'; 
if (isset($_GET['id'])) {
      $id= $_GET['id'];
// SELECT `id`, `name`, `contact`, `address`, `gender`, `age`, `doctor_id`, `careof_id`, `created_at` FROM `patient` WHERE 1
$query=mysqli_query($connection,"SELECT * FROM patient WHERE id='$id' ");
while ($row=mysqli_fetch_array($query)) {
            $pname=$row['name'];
           $pcontact=$row['contact'];
           $paddress=$row['address'];
           $pgender=$row['gender'];

           $page=$row['age'];
           $doctor_id=$row['doctor_id'];
           $careof_id=$row['careof_id'];
 ?>          

  
<style >

#shakeel {
  border-radius: 25px;
  border: 2px solid #73AD21;
  padding: 10px; 
  width: 100%;
  height: 80px;  
}
  #invoice-POS{
  /*box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);*/
  padding:2mm;
  margin: 0 auto;
  width: 65%;
  margin-top: 200px;
  background: #FFF;
  
  
::selection {background: #f31544; color: #FFF;}
::moz-selection {background: #f31544; color: #FFF;}
h1{
  font-size: 1.5em;
  color: #222;
}
h2{font-size: .9em;}
h3{
  font-size: 1.2em;
  font-weight: 300;
  line-height: 2em;
}
p{
  font-size: .7em;
  color: #666;
  line-height: 1.2em;
}
 
#top, #mid,#bot{ /* Targets all id with 'col-' */
  border-bottom: 1px solid #EEE;
}

#top{min-height: 100px;}
#mid{min-height: 80px;} 
#bot{ min-height: 50px;}

#top .logo{
  //float: left;
  height: 60px;
  width: 60px;
  background: url(Login-screen.jpg) no-repeat;

  background-size: 60px 60px;
}
.clientlogo{
  float: left;
  height: 60px;
  width: 60px;
  background: url(Login-screen.jpg) no-repeat;
  background-size: 60px 60px;
  border-radius: 50px;
}
.info{
  display: block;
  float:left;
  margin-left: 0;
}
td{
  padding: 5px 0 5px 15px;
  border: 1px solid #EEE
}

#legalcopy{
  margin-top: 5mm;
}
}

   @media print
    {
        #non-printable { display: none; }
        #printable { display: block; }
    }
</style>

<div id="printableArea">
  <div id="invoice-POS">
    
    <center id="top">
      <div class="logo"></div>
      <div class="info"> 
        <h2>SMART MEDICAL LABPRATORY</h2>
      </div><!--End Info-->
    </center><!--End InvoiceTop-->
    <hr>
    <!-- border="1" -->
    <div id="shakeel">
      <table style="width:100%;" class="table-responsive">
        <thead >
        <tr>
          <th>Name:</th><td><?php  echo $pname  ;?></td>  
          <th>Contact: <td><?php  echo $pcontact   ;?></td></th></tr>

        <tr>
          <th>Address:</th> <td><?php  echo $paddress   ;?></td> 
          <th>Gender:</th> <td><?php  echo $pgender   ;?></td> </tr>

          <tr>
          <th>Age:</th>
            <td><?php  echo $page   ;?> Years</td></tr>
  
        </thead>
        
        
      </table>
    </div>
    <div id="bot">
          <div id="table"  >
            <table   style="width:100%;">
              <thead>
              <tr>
                <th>#</th>
                <th>Tests</th>
               <th>Result</th>
               <th>Range</th>
               <th>Unit</th>
              </tr>
              </thead>
              <tbody>
          <hr>


<?php   
 $date=date('Y-m-d');
 $counter=0;
 $query1="
 SELECT result.result,result.created_at,main_test.title,
sub_test.name,sub_test.rangi,sub_test.unit
FROM result

INNER JOIN main_test ON result.main_test_id=main_test.id
INNER JOIN sub_test ON result.sub_test_id=sub_test.id

WHERE   result.p_id='$id' ";
    
$result=mysqli_query($connection,$query1);

           while ($row2=mysqli_fetch_array($result)) {
           $counter++;
            ?>
              <tr style="text-align: center;" >
                <td ><?php  echo $counter   ;?> </td>
                <td><?php  echo $row2['name']   ;?></td>              
                <td><?php  echo $row2['result']   ;?></td>              
                <td><?php  echo $row2['rangi']   ;?></td>              
                <td><?php  echo $row2['unit']   ;?></td>              
                           
              </tr>
<?php  
} 


?>
<!-- <tr><td colspan="4"><hr></td></tr> -->

</tbody>


            </table>
          </div><!--End Table-->
<hr>
          <div id="legalcopy" style="text-align: center;">
            <p class="legal"><strong>Thank you for your Payment!</strong></p>
          </div>

        </div><!--End InvoiceBot-->


<p style="text-align: center;">Design & Develop By:<a href="https://wa.me/+923339739504"> www.<strong >isisoftwaresolution</strong>.com</a> P#0333-9739504</p>
          <div class="form-actions" id="non-printable">
      <div class="card-footer">
    <a href="patient_test_list.php?id=<?php echo $getid;?>" class="btn btn-responsive button-alignment btn-primary" data-toggle="tooltip"
     title="Back" data-original-title="Back"><span style="color:#black;">
           <i class="fa fa-fw fa-arrow-left"></i>Back
        </span>  
        </a>


 

             <input  class="btn-primary-info" type="button" onclick="printDiv('printableArea')" value="Print" style="float: right;" />
</div>
</div>
  </div><!--End Invoice-->

</div>

<script src="js/app.js" type="text/javascript"></script>

  <script type="text/javascript">
              document.onkeyup = function(e) {

if (e.which == 13) {
window.print();
}
if (e.which == 27) {
window.location.href = "add_sales.php";
}
  };


  function printDiv(printableArea) {
     var printContents = document.getElementById(printableArea).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
            </script>




            <?php 
            }
}
?>