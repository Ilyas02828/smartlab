<?php
 include 'includes/connect.php'; 
if (isset($_GET['id'])) {
      $id= $_GET['id'];
// SELECT `id`, `name`, `contact`, `address`, `gender`, `age`, `doctor_id`, `careof_id`, `created_at` FROM `patient` WHERE 1
$query=mysqli_query($connection,"SELECT * FROM patient WHERE id='$id'");
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


  #invoice-POS{
  box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
  padding:2mm;
  margin: 0 auto;
  width: 70mm;
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
</style>
  <div id="invoice-POS">
    
    <center id="top">
      <div class="logo"></div>
      <div class="info"> 
        <h2>Bashir Medical Lab</h2>
      </div><!--End Info-->
    </center><!--End InvoiceTop-->
    <hr>
    <div id="bot">
          <div id="table"  >
            <table  border="1">
              <thead>
              <tr>
                <th>#</th>
                <th>T.Name:</th>
               <th>Cost</th>
              </tr>
              </thead>
              <tbody>
<?php  

if (isset($_GET['id'])) {
      $gid= $_GET['id']; 
 $date=date('Y-m-d');
 $counter=0;
 $tcost=0;
 $query1="
 SELECT  patient_test.pid as ptid,patient_test.test_id,patient_test.created_at,
  main_test.title,patient.name,main_test.cost

FROM `patient_test` 
INNER JOIN patient ON patient_test.pid=patient.id
INNER JOIN main_test on patient_test.test_id=main_test.id
WHERE   patient_test.pid='$gid' AND patient_test.created_at='$date'";
    
$result=mysqli_query($connection,$query1);
           while ($row2=mysqli_fetch_array($result)) {

           $title= $row2['title'];        
           $cost= $row2['cost'];        

           $tcost+=$cost;

           $counter++;
            ?>
              <tr style="text-align: center;" >
                <td ><?php  echo $counter   ;?> </td>
                <td><?php  echo $title   ;?></td>              
                <td><?php  echo $row2['cost']   ;?></td>              
              </tr>
<?php  
} 
}  

?>
<!-- <tr><td colspan="4"><hr></td></tr> -->

</tbody>

<tfoot>

              <tr>
<td>Discount:</td>
                 <td><?php 
$queryz=mysqli_query($connection,"SELECT discount FROM patient_payment WHERE p_id='$id'");
$rowz=mysqli_fetch_array($queryz);
echo $rowz['discount'];
 ?></td>

                <td>Paid:</td>
                 <td><?php 
$queryz=mysqli_query($connection,"SELECT paid FROM patient_payment WHERE p_id='$id'");
$rowz=mysqli_fetch_array($queryz);
echo $rowz['paid'];
 ?></td>
              </tr>

              <tr>

               <td>Dues:</td>
                  <td><?php 
$queryz1=mysqli_query($connection,"SELECT dues FROM patient_payment WHERE p_id='$id'");
$rowz1=mysqli_fetch_array($queryz1);
echo $rowz1['dues'];
 ?></td>
                <td>Total:</td>
                 <td><?php 
$queryz2=mysqli_query($connection,"SELECT total FROM patient_payment WHERE p_id='$id'");
$rowz2=mysqli_fetch_array($queryz2);
echo $rowz2['total'];
 ?></td>
              </tr>
</tfoot>
            </table>
          </div><!--End Table-->
<hr>
          <div id="legalcopy">
            <p class="legal"><strong>Thank you for your Payment!</strong></p>
          </div>

        </div><!--End InvoiceBot-->
  </div><!--End Invoice-->



  <div id="invoice-POS">
    
    <center id="top">
      <div class="logo"></div>
      <div class="info"> 
        <h2>Bashir Medical Lab</h2>
      </div><!--End Info-->
    </center><!--End InvoiceTop-->
    <hr>
    <div id="bot">
          <div id="table"  >
            <table  border="1">
              <thead>
              <tr>
                <th>#</th>
                <th>T.Name:</th>
               <th>Cost</th>
              </tr>
              </thead>
              <tbody>
<?php  

if (isset($_GET['id'])) {
      $gid= $_GET['id']; 
 $date=date('Y-m-d');
 $counter=0;
 $tcost=0;
 $query1="
 SELECT  patient_test.pid as ptid,patient_test.test_id,patient_test.created_at,
  main_test.title,patient.name,main_test.cost

FROM `patient_test` 
INNER JOIN patient ON patient_test.pid=patient.id
INNER JOIN main_test on patient_test.test_id=main_test.id
WHERE   patient_test.pid='$gid' AND patient_test.created_at='$date'";
    
$result=mysqli_query($connection,$query1);
           while ($row2=mysqli_fetch_array($result)) {

           $title= $row2['title'];        
           $cost= $row2['cost'];        

           $tcost+=$cost;

           $counter++;
            ?>
              <tr style="text-align: center;" >
                <td ><?php  echo $counter   ;?> </td>
                <td><?php  echo $title   ;?></td>              
                <td><?php  echo $row2['cost']   ;?></td>              
              </tr>
<?php  
} 
}  

?>
<!-- <tr><td colspan="4"><hr></td></tr> -->

</tbody>

<tfoot>

              <tr>
<td>Discount:</td>
                 <td><?php 
$queryz=mysqli_query($connection,"SELECT discount FROM patient_payment WHERE p_id='$id'");
$rowz=mysqli_fetch_array($queryz);
echo $rowz['discount'];
 ?></td>

                <td>Paid:</td>
                 <td><?php 
$queryz=mysqli_query($connection,"SELECT paid FROM patient_payment WHERE p_id='$id'");
$rowz=mysqli_fetch_array($queryz);
echo $rowz['paid'];
 ?></td>
              </tr>

              <tr>

               <td>Dues:</td>
                  <td><?php 
$queryz1=mysqli_query($connection,"SELECT dues FROM patient_payment WHERE p_id='$id'");
$rowz1=mysqli_fetch_array($queryz1);
echo $rowz1['dues'];
 ?></td>
                <td>Total:</td>
                 <td><?php 
$queryz2=mysqli_query($connection,"SELECT total FROM patient_payment WHERE p_id='$id'");
$rowz2=mysqli_fetch_array($queryz2);
echo $rowz2['total'];
 ?></td>
              </tr>
</tfoot>
            </table>
          </div><!--End Table-->
<hr>
          <div id="legalcopy">
            <p class="legal"><strong>Thank you for your Payment!</strong></p>
          </div>

        </div><!--End InvoiceBot-->
  </div><!--End Invoice-->

<script src="js/app.js" type="text/javascript"></script>

  <script type="text/javascript">
              document.onkeyup = function(e) {

if (e.which == 13) {
window.print();
}
// if (e.which == 27) {
// window.location.href = "add_sales.php";
// }
  };
            </script>




            <?php }}?>