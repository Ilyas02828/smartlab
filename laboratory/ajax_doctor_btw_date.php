<?php
include 'includes/connect.php';
$output = "" ;
$serial = 0;

if(isset($_POST['doctor']) && isset($_POST['dateone']) && isset($_POST['dateone'])  )
 {
	$doctor_id = $_POST['doctor'];
  $dateone = $_POST['dateone'];
  $datetwo = $_POST['datetwo'];


	$general = "SELECT  GROUP_CONCAT(main_test.title) AS Test,
                doctor.name AS Doctor, patient.created_at
FROM patient 

INNER JOIN patient_test ON patient.id=patient_test.pid

INNER  JOIN main_test ON patient_test.test_id=main_test.id

INNER  JOIN doctor ON patient.doctor_id=doctor.id

WHERE patient.id=patient_test.pid AND
patient_test.test_id=main_test.id AND
patient.doctor_id='$doctor_id' AND 
patient.created_at  BETWEEN '$dateone' AND '$datetwo'
GROUP BY patient.created_at ";

                            $run = mysqli_query($connection,$general);
                            while($row=mysqli_fetch_array($run))
                            {

                              $serial++;

                              $Test = $row['Test'];
                              $tname=explode(',', $Test);

                                  $Doctor = $row['Doctor'];
                                  $created_at = $row['created_at'];
                                 
                                  $output = '<tr>

                                        <td>'.$serial.'</td>
                                        <td>'.$Doctor.'</td><td>';

                    foreach($tname as $testi)
                    {$output.=$testi."<hr>";}  
                    $output.='</td>

                                        <td>'.$created_at.'</td>';
                                    echo $output;
      
      }//while (supp,com, date)

}
?>