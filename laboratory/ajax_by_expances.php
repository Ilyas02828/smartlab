<?php
include 'includes/connect.php';
$output = "" ;
$serial = 0;

if( isset($_POST['start_date']) && isset($_POST['end_date'])  )
 {
 
  $start_date = $_POST['start_date'];
  $end_date = $_POST['end_date'];

  $select_name = "SELECT * FROM expances WHERE created_at BETWEEN '$start_date' AND '$end_date'  ORDER by created_at DESC ";

// SELECT `id`, `exp_name`, `expance`, `discription`, `pname`, `created_at` FROM `expances` WHERE 1


  
  $run_name = mysqli_query($connection,$select_name);
  
  while($row=mysqli_fetch_array($run_name))
    {

      $serial++;
        $name = $row['exp_name'];
        $expance = $row['expance'];
          $pname = $row['pname'];
          $discription = $row['discription'];          
          $created_at = $row['created_at'];
          $output = '
              <tr>
                <td>'.$serial.'</td>
                <td>'.$name.'</td>
                <td>'.$expance.'</td>
                <td>'.$pname.'</td>
                <td>'.$discription.'</td>
                <td>'.$created_at.'</td>
                </tr>';
            echo $output;
      
      }//while (supp,com, date)

}
?>