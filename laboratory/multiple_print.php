<?php
 include 'includes/connect.php';

$Main_test_ids=unserialize($_GET['Main_test_ids']);
$Patient_ids=unserialize($_GET['Patient_ids']);

if ($Main_test_ids >0 AND $Patient_ids > 0) {

      $id=$Patient_ids[0];

$query=mysqli_query($connection,"SELECT * FROM patient WHERE id='$id' ");
while ($row=mysqli_fetch_array($query)) {
            $pname=$row['name'];
           $pcontact=$row['contact'];
           $paddress=$row['address'];
           $pgender=$row['gender'];
           $page=$row['age'];
           $doctor_id=$row['doctor_id'];
           $careof_id=$row['careof_id'];
         }
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
        <h2>BASHIR CLINICAL LEB</h2>
      </div><!--End Info-->
    </center><!--End InvoiceTop-->
    <hr>
    <div>
      <table>
        <thead>
        <tr>
          <th>Name</th>
          <th>Contact</th>
        </tr>
        <tr>
            <td><?php  echo $pname  ;?></td>  
            <td><?php  echo $pcontact   ;?></td> 
            </tr>
        <tr>
          <th>Address</th>
          <th>Gender</th>
          <th>Age</th>
        </tr>
        <tr> 
            <td><?php  echo $paddress   ;?></td>  
            <td><?php  echo $pgender   ;?></td>  
            <td><?php  echo $page   ;?></td>
          </tr>
        </thead>
        
        
      </table>
    </div>
    <div id="bot">
          <div id="table"  >
            <table  border="1">
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

<?php   
 $date=date('Y-m-d');
 $counter=0;
   foreach ($Main_test_ids as $Tids) {
           $Tids;

 $query1="
 SELECT result.result,result.created_at,main_test.title,
sub_test.name,sub_test.rangi,sub_test.unit
FROM result
INNER JOIN main_test ON result.main_test_id=main_test.id
INNER JOIN sub_test ON result.sub_test_id=sub_test.id
WHERE   result.p_id='$id' AND
 result.main_test_id='$Tids'";
    
$result=mysqli_query($connection,$query1);


// if (!$result) {
//     printf("Error: %s\n", mysqli_error($connection));
//     exit();
// }
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
<?php } } ?>
<!-- <tr><td colspan="4"><hr></td></tr> -->

</tbody>


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
if (e.which == 27) {
window.location.href = ".php";
}
  };
</script>




<?php  }  ?>



