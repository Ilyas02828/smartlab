<?php
include 'includes/connect.php';
$output = "";
$serial = 0;

if(isset($_POST['test_id']))
 {
  $test_id = $_POST['test_id'];

  $select_name =  "SELECT main_test.title AS Test,
              doctor.name AS Doctor,patient.name AS Pname, contact,  patient.created_at
FROM patient 

INNER JOIN patient_test ON patient.id=patient_test.pid

INNER  JOIN main_test ON patient_test.test_id=main_test.id

INNER  JOIN doctor ON patient.doctor_id=doctor.id

WHERE patient.id=patient_test.pid AND
patient_test.test_id='$test_id' AND
patient.doctor_id=doctor.id
GROUP BY patient.created_at";

  
  $run_name = mysqli_query($connection,$select_name);
  
  while($row=mysqli_fetch_array($run_name))
      {

        $serial++;
        $Doctor = $row['Doctor'];
        $Test = $row['Test'];
        $Contact = $row['contact'];
        $Pname = $row['Pname'];
        $created_at = $row['created_at'];
                                 
                                  $output = '<tr>

                                        <td>'.$serial.'</td>
                                        <td>'.$Doctor.'</td>
                                        <td>'.$Pname.'</td>
                                        <td>'.$Contact.'</td>
                                        <td>'.$Test.'</td>
                                        <td>'.$created_at.'</td>';

          echo $output;
        
        }

}
?>