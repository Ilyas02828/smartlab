<?php
include 'includes/connect.php';
if (isset($_GET['id'])) {
      $id= $_GET['id'];

$query=mysqli_query($connection,"SELECT * FROM  sales_due_history WHERE id='$id'");
while ($row=mysqli_fetch_array($query)) {
           $customer=$row['customer'];
           $gtotal=$row['grand_total_amount'];
           $pold=$row['paid_amount'];
           $dold=$row['due_amount'];
           $pnew=$row['paid_new'];
           $dnew=$row['due_new'];
           $created=$row['created_date'];
           $updated=$row['updated_at'];

}
}
         

?>
  
<style >
  #invoice-POS{
  box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
  padding:2mm;
  margin: 0 auto;
  width: 70mm;
  background: #FFF;
  
  
/*::selection {background: #f31544; color: #FFF;}
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
}*/
 
/*#top, #mid,#bot{ 
  border-bottom: 1px solid #EEE;
}

#top{min-height: 100px;}
#mid{min-height: 80px;} 
#bot{ min-height: 50px;}*/

/*#top .logo{
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

#legalcopy{
  margin-top: 5mm;
}*/

 
  
}
</style>
  <div id="invoice-POS">
    
    <center id="top">
      <div class="logo"></div>
      <div class="info"> 
        <h2>Dr Asma Arif</h2>
      </div><!--End Info-->
    </center><!--End InvoiceTop-->
    
    <div id="mid">
      <div class="info">
        <p> 
            Address : GT Road Aman Ghar,</br>
            Email   : asmaarif2@gmail.com</br>
            Phone   : 0300-555-5555</br>
        </p>
      </div>
    </div><!--End Invoice Mid-->
    <hr>
  <div class="">
        <p> 
         Customer:<?php echo $customer;?>  Operator: zeshan   
        </p>
      </div>
    
    <hr>



    <div id="bot">
          <div id="table"  >
            <table  border="1" style="text-align: center;">
           
              <tr>
                <th>Customer</th>
                <th>Total</th>
              </tr>
              <tr>
                <td><?php echo $customer;?></td>
                <td><?php echo $gtotal;?></td>
              </tr>
              <tr>
                <th>Paid Old</th>
                <th>Due Old</th>
              </tr>
              <tr>
                <td><?php echo $pold;?></td>
                <td><?php echo $dold;?></td>
              </tr>
              <tr>
                <th>Paid New</th>
                <th>Due New</th>
              </tr>
              <tr>
                <td><?php echo $pnew;?></td>
                <td><?php echo $dnew;?></td>
              </tr>
              <tr>
                <th>Purchase</th>
                <th>Date</th>
              </tr>
               <tr>
                <td><?php echo $created;?></td>
                <td><?php echo $updated;?></td>
              </tr>
              
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
window.location.href = "index.php";
}



            

            };
            </script> 