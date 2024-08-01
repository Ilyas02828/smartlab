<?php
include 'includes/connect.php';
$output = "" ;
$serial = 0;

if(isset($_POST['test_id']) && isset($_POST['dateone'])  )
 {
	$test_id = $_POST['test_id'];
  $dateone = $_POST['dateone'];


	$general = "SELECT main_test.title AS Test,
                doctor.name AS Doctor, patient.created_at
FROM patient 

INNER JOIN patient_test ON patient.id=patient_test.pid

INNER  JOIN main_test ON patient_test.test_id=main_test.id

INNER  JOIN doctor ON patient.doctor_id=doctor.id

WHERE patient.id=patient_test.pid AND
patient_test.test_id='$test_id' AND
patient.doctor_id=doctor.id AND 
patient.created_at='$dateone'
GROUP BY patient.created_at ";

                            $run = mysqli_query($connection,$general);
                            while($row=mysqli_fetch_array($run))
                            {

                              $serial++;
                              $tname=$row['Test'];
                              $Doctor = $row['Doctor'];
                              $created_at = $row['created_at'];

                                  $output = '<tr>

                                        <td>'.$serial.'</td>
                                        <td>'.$Doctor.'</td>
                                        <td>'.$tname.'</td>
                                        <td>'.$created_at.'</td>';
                                    echo $output;
      
      }//while (supp,com, date)

}
?>